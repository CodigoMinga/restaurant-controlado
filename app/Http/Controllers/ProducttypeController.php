<?php

namespace App\Http\Controllers;

use Auth;
use App\Producttype;
use App\Company;
use App\Orderdetail;
use Illuminate\Http\Request;

class ProducttypeController extends Controller
{   
    public function add(){
        $companys = Auth::user()->companies()->get();
        return view('producttypes.add',compact('companys'));
    }
   
    public function addProcess(Request $request){
        Producttype::create($request->all());
        return redirect()->route('producttypes.list')->with('success', 'Categoria Creada correctamente');
    }

    public function list(){
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        $producttypes = Producttype::whereIn('company_id',$companies_id)->get();
        return view('producttypes.list',compact('producttypes'));
    }

    /* NO SE ESTA USANDO
    public function getdata(){
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        $producttypes = Producttype::whereIn('company_id',$companies_id)->get();
        return DataTables::of($producttypes)->make(true);
    }
    */
    public function details($producttype_id)
    {
        return view('producttypes.details', [
            'producttype' => Producttype::find($producttype_id)
        ]);
    }

    public function editprocess($producttype_id, Request $request)
    {
        //busca la orden en la base de datos con el id que se le pasa desde la URL
        $producttype = Producttype::findOrFail($producttype_id);

        $producttype->update($request->all());

        return redirect()->route('producttypes.list')->with('success', 'Categoria editada correctamente');
    }

    public function delete($producttype_id)
    {
        $producttype = Producttype::findOrFail($producttype_id);
        $producttype->delete();
        return redirect()->route('producttypes.list')->with('success', 'Categoria eliminada correctamente');
    }
}
