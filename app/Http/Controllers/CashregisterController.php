<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use DB;
use Carbon\Carbon;
use App\Cashregister;
use App\Order;
use Illuminate\Http\Request;

class CashregisterController extends Controller
{
    
    public function form()
    {
        $company = session('company');
        $cashregister = Cashregister::where('company_id',$company->id)->orderBy('id', 'desc')->first();
        if(!$cashregister){
            $cashregister = new Cashregister;
            $cashregister->closed = 'not null';
        }
        if($cashregister->closed==null){
            return $this->details($cashregister->id);
        }else{
            return view('cashregister.open');
        }
    }

    public function open(Request $request)
    {
        $company = session('company');
        $cashregister = new Cashregister;
        $cashregister->fill($request->all());
        //usuario que abre caja
        $cashregister->user_id_open = Auth::user()->id;
        //compañia que abrio caja
        $cashregister->company_id = $company->id;
        $cashregister->save();
        return redirect('/tables');
    }

    public function close(Request $request)
    {
        $cashregister = Cashregister::findOrFail($request->id);
        $orders =  Order::where("cashregister_id",$cashregister->id)->where("enabled",1)->where('closed',0)->get();
        if(COUNT($orders)==0){
            //usuario que cierra caja
            $cashregister->user_id_close = Auth::user()->id;
            $cashregister->closed = Carbon::now();
            $cashregister->save();
            return redirect('/tables');
        }else{
            return back()->with('error','No se puede cerrar la caja, existen '.COUNT($orders).' ordenes sin cerrar');
        }
    }

    public function list()
    {
        $company = session('company');
        $cashregisters = Cashregister::where('company_id',$company->id)->get();
        $cashregisters->each->append('Breakdown');
        return view('cashregister.list',compact('cashregisters'));
    }

    public function details($cashregister_id){
        $cashregister = Cashregister::findOrFail($cashregister_id);

        $deliveries_data = Order::where('enabled',1)
        ->where('cashregister_id',$cashregister->id)
        ->where('delivery','>',0)
        ->select(DB::raw('count(*) as delivery_count'), 'orders.delivery', 'orders.delivery_commission')
        ->groupby('delivery','delivery_commission')
        ->get();

        $orderdetails_data = Db::table('cashregisters')
        ->where('cashregister_id',$cashregister->id)
        ->select(DB::raw('count(orderdetails.quantity) as quantity'), 'orderdetails.unit_ammount', 'products.name')
        ->leftJoin('orders','orders.cashregister_id','cashregisters.id')
        ->leftJoin('orderdetails','orderdetails.order_id','orders.id')
        ->leftJoin('products','products.id','orderdetails.product_id')
        ->where('orders.enabled',1)
        ->where('orderdetails.enabled',1)
        ->groupby('orderdetails.product_id','products.name')
        ->orderBy('quantity', 'DESC')
        ->get();
                    
        return view('cashregister.close',compact('cashregister','deliveries_data','orderdetails_data'));
    }
}
