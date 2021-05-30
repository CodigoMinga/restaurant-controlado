<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Orderdetail;
use App\Ordertype;
use App\Table;
use App\Producttype;
use App\Discount;
use App\Delivery;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function tables()
    {
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        $tables = Table::whereIn('company_id',$companies_id)->get();
        return view('orders.tableselection', compact('tables'));
    }
    
    public function list(){
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        $orders = Order::where('enabled','=',1)->whereIn('company_id',$companies_id)->get();
        foreach ($orders as $key => $order) {
            $order->total=$order->Total;
            $order->ordertype;
            $order->user;
            $order->table;
        }
        return view('orders.list', compact('orders'));
    }

    public function tableorder($table_id){
        $table = Table::findOrFail($table_id);
        $order = Order::where('table_id', $table->id)->where('closed','!=',1)->first();
        if (!isset($order)) {
            return view('orders.start', compact('table'));
        }else{
            return redirect('/orders/'.$order->id);
        }
    }

    public function start($table_id)
    {
        $table = Table::findOrFail($table_id);
        $order = Order::where('table_id', $table->id)->where('closed','!=',1)->first();
        if (!isset($order)) {
            $order = new Order();
            $order->table_id = $table->id;
            $order->user_id = Auth::user()->id;
            $order->company_id = $table->company_id;
            //Añade el numero interno de la orden, si no hay ninguna la crea como primera
            $last_order = Order::latest('internal_id')->where('company_id','=',$table->company_id)->first();
            if(isset($last_order)){
                $order->internal_id = $last_order->internal_id + 1;
            }else{
                $order->internal_id = 1;
            }
            $order->save();
        }
        return redirect('/orders/'.$order->id)->with('success', 'Order Iniciada');;
    }

    public function close($order_id, Request $request)
    {
        $order  = Order::findOrFail($order_id);
        $order->fill($request->all());
        $order->closed = 1;
        $order->save();
        return $order;
    }
    
    public function details($order_id){
        $order = Order::findOrFail($order_id);
        if($order->table->tabletype_id==1){
            $ordertypes = Ordertype::whereIn('id',[1])->get();
        }else{
            $ordertypes = Ordertype::whereIn('id',[2,3])->get();
        }

        $discounts = Discount::all();
        $deliveries = Delivery::all();
        return view('orders.details', compact('order','ordertypes','discounts','deliveries'));
    }

    public function products($order_id)
    {
        $order = Order::findOrFail($order_id);
        $producttypes = Producttype::where('company_id',$order->company_id)->get();
        return view('orders.products', compact('producttypes','order'));
    }

    public function productAttach(Request $request)
    {
        $input = $request->all();

        $order      = Order::findOrFail($input['order_id']);
        $product    = Product::findOrFail($input['product_id']);

        $orderdetail = new Orderdetail();
        $orderdetail->product_id    = $product->id;
        $orderdetail->order_id      = $order->id;
        $orderdetail->quantity      = $input['quantity'];
        $orderdetail->description   = $input['description'];
        $orderdetail->unit_ammount  = $product->price;
        $orderdetail->total_ammount = intval($input['quantity']) * intval($product->price);
        $orderdetail->save();
        $this->substock($orderdetail);
        $order->Total=$order->Total;
        return $order;
    }


    public function productDetach(Request $request)
    {
        $input = $request->all();
        $orderdetail    = Orderdetail::findOrFail($input['orderdetail_id']);
        $order          = $orderdetail->order;
        if($order->closed==0){
            if($orderdetail->enabled){
                $orderdetail->enabled = 0;
                $orderdetail->save();
                $this->addstock($orderdetail);
                $order->Total=$order->Total;
            }
            return $order;
        }else{
            return "Orden Cerrada, no se puede eliminar";
        }
    }

    public function changetable($order_id)
    {
        $order = Order::findOrFail($order_id);
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        $tables = Table::whereIn('company_id',$companies_id)->get();
        return view('orders.changetable', compact('tables','order'));
    }
    
    public function changetableProcess($order_id,$table_id)
    {
        $order  = Order::findOrFail($order_id);
        $table  = Table::findOrFail($table_id);
        $order->table_id = $table->id;
        $order->save();
        return redirect('/orders/'.$order->id)->with('success', 'Mesa cambiada correctamente');
    }

    public function command(Request $request)
    {
        $orderdetail_ids = $request->orderdetail_id;
        foreach ($orderdetail_ids as $key => $orderdetail_id) {
            $orderdetail = Orderdetail::findOrFail($orderdetail_id);
            $orderdetail->command=1;
            $orderdetail->save();
        }
        return true;
    }

    public function substock($orderdetail){
        //$low_stock=[];
        $prescription= $orderdetail->product->prescriptions->last();
        if($prescription){                
            $prescriptiondetails = $prescription->prescriptiondetails;
            foreach ($prescriptiondetails as $key => $prescriptiondetail) {
                $item=$prescriptiondetail->item;
                $stock = $item->stock;
                $quantity =$prescriptiondetail->quantity * $orderdetail->quantity;
                $item->stock = $stock - ($quantity);
                $item->save();
                /*
                if($item->stock<=$item->warning){
                    $low_stock[]=$item->name;
                }*/
            }
        }
        //return 
    }

    public function addstock($orderdetail){
        $prescription= $orderdetail->product->prescriptions->last();
        if($prescription){                
            $prescriptiondetails = $prescription->prescriptiondetails;
            foreach ($prescriptiondetails as $key => $prescriptiondetail) {
                $item=$prescriptiondetail->item;
                $stock = $item->stock;
                $quantity =$prescriptiondetail->quantity * $orderdetail->quantity;
                $item->stock = $stock + ($quantity);
                $item->save();
            }
        }
    }


}
