<?php

namespace App\Http\Controllers;

use App\Order;
use App\Orderdetail;
use App\Table;
use App\Producttype;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $tables = Table::all();
        return view('main.tableselection', compact('tables'));
    }

    public function productselection($table_id)
    {
        $table = Table::findOrFail($table_id);
        $producttypes = Producttype::where('company_id',$table->company_id)->get();
        return view('main.productselection', compact('table','producttypes'));
    }

    public function productattach(Request $request)
    {
        $input = $request->all();

        $table = Table::findOrFail($input['table_id']);
        $product = Product::findOrFail($input['product_id']);

        $order = Order::where('table_id', $table->id)->first();
        if (!isset($order)) {
            $order = new Order();
            $order->table_id = $table->id;
            $order->company_id = $table->company_id;
            $order->number = 3;

            //Añade el numero interno de la orden, si no hay ninguna la crea como primera
            $last_order = Order::latest('internal_id')->where('company_id','=',$table->company_id)->first();
            if(isset($last_order)){
                $order->internal_id = $last_order->internal_id + 1;
            }else{
                $order->internal_id = 1;
            }

            $order->save();
        }

        $orderdetail = new Orderdetail();
        $orderdetail->product_id    = $product->id;
        $orderdetail->order_id      = $order->id;
        $orderdetail->quantity      = $input['quantity'];
        $orderdetail->unit_ammount  = $product->price;
        $orderdetail->total_ammount = intval($input['quantity']) * intval($product->price);
        $orderdetail->save();

        return $orderdetail;
    }

    public function orderdetails($order_id){
        $order = Order::findOrFail($order_id);
        return view('main.orderdetails', compact('order'));
    }

}
