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
    public function list(){

        //Array de las Compañias del Usuario
        $companies_id       = Auth::user()->companies()->pluck('company_id')->toArray();
        
        //Tipos de Productos que pertenecesn a las conpañias del Usuario
        $producttypes_id    = Producttype::whereIn('company_id',$companies_id)->pluck('id')->toArray();

        //Productos que pertenecesn a los tipos de producto de las conpañias del Usuario
        $products = Product::whereIn('producttype_id',$producttypes_id)->get();
        foreach ($products as $key => $product) {
            $product->producttype;
        }
        return view('products.list',compact('products'));
    }

    public function add(){
        //Array de las Compañias del Usuario
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();

        //Tipos de Productos que pertenecesn a las conpañias del Usuario
        $producttypes = Producttype::whereIn('company_id',$companies_id)->get();

        $product = new Product;

        return view('products.form',compact('producttypes','product'));
    }

    public function details($product_id)
    {
        //Array de las Compañias del Usuario
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();

        //Tipos de Productos que pertenecesn a las conpañias del Usuario
        $producttypes = Producttype::whereIn('company_id',$companies_id)->get();

        $product = Product::find($product_id);
        return view('products.form',compact('producttypes','product'));
    }

    public function process(Request $request)
    {

        $id = $request->id;
        if($id){
            $product = Product::findOrFail($request->id);
            $product->update($request->all());
            return redirect()->route('products.list')->with('success', 'Producto editado correctamente');
        }else{
            $product = Product::create($request->all());
            return redirect('/products/'.$product->id)->with('success', 'Producto Creado correctamente');
        }
    }

    public function delete($product_id)
    {
        $product = product::findOrFail($product_id);
        $product->enabled=0;
        $product->save();
        return redirect()->route('products.list')->with('success', 'Producto eliminado correctamente');
    }
}
