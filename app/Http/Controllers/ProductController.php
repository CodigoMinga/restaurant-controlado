<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;
use Illuminate\Http\Request;
use App\Company;
use App\Producttype;
use App\Prescription;
class ProductController extends Controller
{
    public function add(){

        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();

        $producttypes = Producttype::whereIn('company_id',$companies_id)->get();
        return view('products.add',compact('producttypes'));
    }

    /* NO SE ESTA USANDO
    public function getdata(){

        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();

        $products = Product::whereIn('company_id',$companies_id)->get();
        return DataTables::of($products)->make(true);
    }*/

    public function list(){

        $companies_id       = Auth::user()->companies()->pluck('company_id')->toArray();
        $producttypes_id    = Producttype::whereIn('company_id',$companies_id)->pluck('id')->toArray();

        $products = Product::whereIn('producttype_id',$producttypes_id)->get();
        return view('products.list',compact('products'));
    }

    public function addProcess(Request $request){

        Product::create($request->all());
        return redirect()->route('products.list')->with('success', 'Producto Creado correctamente');
    }

    public function details($product_id)
    {
        //se asigana un valor a la variable $product buscando el producto asociado a la variable.
        $product = Product::find($product_id);


        //prescriptions resive las recetas  que pertenescan al producto con el mismo id que el que se esta resiviendo y lo pagina.
        $prescriptions = Prescription::where('product_id','=',$product_id)->latest()->paginate();

        return view('products.details', compact('product','prescriptions'));
    }

    public function editprocess($product_id, Request $request)
    {
        $product = Product::findOrFail($product_id);
        $product->update($request->all());
        return redirect()->route('products.list')->with('success', 'Producto editado correctamente');
    }

    public function delete($product_id)
    {
        $product = product::findOrFail($product_id);
        $product->delete();
        return redirect()->route('products.list')->with('success', 'Producto eliminado correctamente');
    }
}
