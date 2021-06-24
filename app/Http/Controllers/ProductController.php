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
        $company = session('company');
        $producttypes_id    = Producttype::where('enabled',1)->where('company_id',$company->id)->pluck('id')->toArray();
        $products = Product::where('enabled',1)->whereIn('producttype_id',$producttypes_id)->with('producttype')->get();
        return view('products.list',compact('products'));
    }

    public function add(){
        $company = session('company');
        $producttypes = Producttype::where('enabled',1)->where('company_id',$company->id)->get();
        $product = new Product;
        return view('products.form',compact('producttypes','product'));
    }

    public function details($product_id)
    {
        $company = session('company');
        $producttypes = Producttype::where('enabled',1)->where('company_id',$company->id)->get();
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
