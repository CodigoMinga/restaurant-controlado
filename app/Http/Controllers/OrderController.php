<?php

namespace App\Http\Controllers;

use Auth;
use App\Client;
use App\Order;
use App\Orderdetail;
use App\Ordertype;
use App\Table;
use App\Tabletype;
use App\Producttype;
use App\Discount;
use App\Delivery;
use App\Product;
use App\Cashregister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function tables()
    {
        $company = session('company');
        //busco ultima caja registrada de la compañia
        $cashregister = Cashregister::where('company_id',$company->id)->orderBy('id', 'desc')->first();

        if(!$cashregister){
            $cashregister = new Cashregister;
            $cashregister->closed = 'not null';
        }
        if($cashregister->closed==null){

            $tabletypes = Tabletype::with(['tables'=>function($query) use($company){
                $query->where('company_id',$company->id)->where('enabled',1);
            }])->get();

            return view('orders.tableselection', compact('tabletypes'));
        }else{
            return view('cashregister.notfound');
        }
    }
    
    public function list(){
        $company = session('company');
        $orders = Order::where('enabled','=',1)->where('company_id',$company->id)->get();
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
            $cashregister = Cashregister::where('company_id',$table->company_id)->whereNull('closed')->orderBy('id', 'desc')->first();
            $order->cashregister_id = $cashregister->id;
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
        if($order->dte_token==null){
            $producttypes = Producttype::where('company_id',$order->company_id)->get();
            return view('orders.products', compact('producttypes','order'));
        }else{
            return back()->with('error','No se puede agregar más productos, la boleta ya fue emitida');
        }
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
        $company = session('company');
        $order = Order::findOrFail($order_id);
        $tabletypes = Tabletype::with(['tables'=>function($query) use($company){
            $query->where('company_id',$company->id)->where('enabled',1);
        }])->get();
        return view('orders.changetable', compact('tabletypes','order'));
    }
    
    public function changetableProcess($order_id,$table_id)
    {
        $order  = Order::findOrFail($order_id);
        $table  = Table::findOrFail($table_id);
        $order->table_id = $table->id;
        $order->save();
        return redirect('/orders/'.$order->id)->with('success', 'Mesa cambiada correctamente');
    }

    public function command($order_id)
    {
        $order = Order::findOrFail($order_id);
        $orderdetails = $order->orderdetails;
        foreach ($orderdetails as $key => $orderdetail) {
            $orderdetail->product;
            if($orderdetail->command==0  && $orderdetail->enabled){
                $orderdetail->command=1;
                $orderdetail->save();
            }
        }
        return $orderdetails;
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

    
    public function history($order_id)
    {
        $order = Order::findOrFail($order_id);
        
        if($order->client_id){
            $client = Client::findOrFail($order->client_id);
            foreach ($client->orders as $key => $order_item) {
                foreach ($order_item->orderdetails as $key => $orderdetail) {
                    $orderdetail->product;
                }
            }
            return $client->orders;
        }else{
            return 'necesita seleccionar cliente';
        }
    }

    
    
    public function repeat($order_id,$order_id_old)
    {
        $order      = Order::findOrFail($order_id);
        $order_old  = Order::findOrFail($order_id_old);
        foreach ($order_old->orderdetails as $key => $orderdetail_old) {

            $product    = Product::findOrFail($orderdetail_old->product_id);
            $orderdetail = new Orderdetail();
            $orderdetail->product_id    = $product->id;
            $orderdetail->order_id      = $order->id;
            $orderdetail->quantity      = $orderdetail_old->quantity;
            $orderdetail->description   = $orderdetail_old->description;
            $orderdetail->unit_ammount  = $product->price;
            $orderdetail->total_ammount = intval($orderdetail_old->quantity) * intval($product->price);
            $orderdetail->save();
            $this->substock($orderdetail);
        }
        return redirect('/orders/'.$order->id)->with('success', 'Orden Repetida');
    }
}
