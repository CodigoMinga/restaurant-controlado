<?php

namespace App\Http\Controllers;

use App\Producttype;
use App\Company;
use App\Orderdetail;
use Illuminate\Http\Request;

class ProducttypeController extends Controller
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
     * @param  \App\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function show(Producttype $producttype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function edit(Producttype $producttype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producttype $producttype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producttype  $producttype
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producttype $producttype)
    {
        //
    }
    public function add(){

        $companys = Company::all();
        $orderdetails = Orderdetail::all();
        return view('producttypes.add',compact('companys, orderdetails'));
    }
    public function addProcess($companys, $orderdetails, Request $request){
        
        Producttype::create($request->all());

        return redirect()->route('items.add');
    }
}
