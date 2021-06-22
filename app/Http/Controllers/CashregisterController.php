<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Carbon\Carbon;
use App\Cashregister;
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
            return view('cashregister.close',compact('cashregister'));
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
        //usuario que cierra caja
        $cashregister->user_id_close = Auth::user()->id;
        $cashregister->closed = Carbon::now();
        $cashregister->save();
        return redirect('/tables');
    }
}
