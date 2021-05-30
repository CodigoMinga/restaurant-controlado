<?php

namespace App\Http\Controllers;

use Auth;
use App\Producttype;
use App\Company;
use App\Orderdetail;
use Illuminate\Http\Request;

class ProducttypeController extends Controller
{   
    public function list(){
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        $producttypes = Producttype::whereIn('company_id',$companies_id)->get();
        return view('producttypes.list',compact('producttypes'));
    }

    public function add(){
        $companys = Auth::user()->companies()->get();
        $producttype = new Producttype;
        return view('producttypes.form',compact('companys','producttype'));
    }
   
    public function details($producttype_id)
    {
        $companys = Auth::user()->companies()->get();
        $producttype = Producttype::find($producttype_id);
        return view('producttypes.form',compact('companys','producttype'));
    }

    public function process(Request $request)
    {
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $producttype = Producttype::findOrFail($request->id);
            $producttype->update($request->all());
            return redirect()->route('producttypes.list')->with('success', 'Categoria editada correctamente');
        }else{
            //Si no, Crea un Item
            Producttype::create($request->all());
            return redirect()->route('producttypes.list')->with('success', 'Categoria Agregada correctamente');
        }
    }

    public function delete($producttype_id)
    {
        $producttype = Producttype::findOrFail($producttype_id);
        $producttype->enabled=0;
        $producttype->save();
        return redirect()->route('producttypes.list')->with('success', 'Categoria eliminada correctamente');
    }
}
