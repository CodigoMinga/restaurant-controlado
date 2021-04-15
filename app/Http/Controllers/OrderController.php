<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Orderdetail;
use App\Ordertype;
use App\Table;
use App\Producttype;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function tables()
    {
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        $tables = Table::whereIn('company_id',$companies_id)->get();
        return view('main.tableselection', compact('tables'));
    }

    public function tableorder($table_id){
        $table = Table::findOrFail($table_id);
        $order = Order::where('table_id', $table->id)->first();
        if (!isset($order)) {
            return view('main.orderstart', compact('table'));
        }else{
            $ordertypes = Ordertype::all();
            return view('main.orderdetails', compact('order','ordertypes'));
        }
    }

    public function orderstart($table_id)
    {
        $table = Table::findOrFail($table_id);
        $order = Order::where('table_id', $table->id)->first();
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
        $ordertypes = Ordertype::all();
        return view('main.orderdetails', compact('order','ordertypes'));
    }
    
    public function orderdetails($order_id){
        $order = Order::findOrFail($order_id);
        $ordertypes = Ordertype::all();
        return view('main.orderdetails', compact('order','ordertypes'));
    }

    public function productselection($order_id)
    {
        $order = Order::findOrFail($order_id);
        $producttypes = Producttype::where('company_id',$order->company_id)->get();
        return view('main.productselection', compact('producttypes','order'));
    }

    public function productattach(Request $request)
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

        $order->Total=$order->Total;
        return $order;
    }

    public function changetable($order_id)
    {
        $order = Order::findOrFail($order_id);
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        $tables = Table::whereIn('company_id',$companies_id)->get();
        return view('main.changetable', compact('tables','order'));
    }
    
    public function changetableProcess($order_id,$table_id)
    {
        $order  = Order::findOrFail($order_id);
        $table  = Table::findOrFail($table_id);
        $order->table_id = $table->id;
        $order->save();
        return redirect('/orderdetails/'.$order->id)->with('success', 'Mesa cambiada correctamente');;
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
}
