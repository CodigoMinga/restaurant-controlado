<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Company;
use App\Orderdetail;
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

        $companys = Company::all();
        $orderdetails = Orderdetail::all();
        return view('products.add',compact('companys', 'orderdetails'));
    }
    public function getdata(){
       
        $product = Product::all();

        return DataTables::of($product)->make(true);
}
    public function list(){

        return view('products.list', [
            'products' => Product::latest()->paginate()

        ]);
    }
    public function addProcess(Request $request){
        
        Product::create($request->all());
        
   
        return redirect()->route('products.add')->with('success', 'Producto Creado correctamente');
    }
    public function details($product_id)
{
    return view('products.details', [
        'product' => Product::find($product_id)
    ]);
}
public function delete($product_id)
{
    $product = product::findOrFail($product_id);
    $product->delete();
    return redirect()->route('products.list')->with('success', 'Producto eliminado correctamente');
}
}
