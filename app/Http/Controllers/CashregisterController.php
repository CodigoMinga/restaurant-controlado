<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Cashregister;
use Illuminate\Http\Request;

class CashregisterController extends Controller
{
    
    public function cashregister()
    {
        $company = session('company');
        $cashregister = Cashregister::where('company_id',$company->id)->orderBy('id', 'desc')->first();
        if(!$cashregister){
            $cashregister = new \App\Cashregister;
            $cashregister->closed = 'not null';
        }
        if($cashregister->closed==null){
            return view('cashregister.close',compact('cashregister'));
        }else{
            return view('cashregister.open');
        }
    }

    public function create(Request $request)
    {
        Client::create($request->all());

    }
}
