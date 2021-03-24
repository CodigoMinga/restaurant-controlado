<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Company;
use App\Orderdetail;
use App\Producttype;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    public function add(){

        $orderdetails = Orderdetail::all();
        $producttypes = Producttype::all();
        return view('products.add',compact('producttypes', 'orderdetails'));
        
    }
    public function getdata(){
       
        $product = Product::all();

        return DataTables::of($product)->make(true);
}
    public function list(){

        $products = Product::all();
        return view('products.list',compact('products'));
    }
    public function addProcess(Request $request){
        
        Product::create($request->all());
   
        return redirect()->route('products.list')->with('success', 'Producto Creado correctamente');
    }
    public function details($product_id)
{
    return view('products.details', [
        'product' => Product::find($product_id)
    ]);
}
public function editprocess($product_id, Request $request)
{
    //busca la orden en la base de datos con el id que se le pasa desde la URL
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
