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
        $company = session('company');
        $producttypes = Producttype::where('enabled',1)->where('company_id',$company->id)->get();
        return view('producttypes.list',compact('producttypes'));
    }

    public function add(){
        $producttype = new Producttype;
        return view('producttypes.form',compact('producttype'));
    }
   
    public function details($producttype_id)
    {
        $producttype = Producttype::find($producttype_id);
        return view('producttypes.form',compact('producttype'));
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
