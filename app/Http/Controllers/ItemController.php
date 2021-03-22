<?php

namespace App\Http\Controllers;

use App\Item;
use App\Company;
use App\Measureunit;
use App\Prescriptiondetail;
use Illuminate\Http\Request;

class ItemController extends Controller
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
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
    public function add(){

       
        $prescriptiondetails = Prescriptiondetail::all();
        $measureunits = Measureunit::all();
        $companys = Company::all();
        return view('items.add',compact('prescriptiondetails', 'measureunits', 'companys'));
    }

    public function addProcess( Request $request){
       
        Item::create($request->all());

        return redirect()->route('items.list')->with('success', 'Insumo Creado Correctamente');
    }

    public function list(){
        return view('items.list', [
            'items' => Item::latest()->paginate()

        ]);
    }

    public function getdata(){
       
        $item = Item::all();

        return DataTables::of($item)->make(true);
}

    public function details($item_id){
    $measureunits = Measureunit::all();
    return view('items.details', [
        'item' => Item::find($item_id)
    ],compact('measureunits'));
}

    public function editprocess($item_id, Request $request)
{
    //busca la orden en la base de datos con el id que se le pasa desde la URL
    $item = Item::findOrFail($item_id);

    $item->update($request->all());

    return redirect()->route('items.list')->with('success', 'Insumo editada correctamente');
}

    public function delete($item_id)
{
    $item = Item::findOrFail($item_id);
    $item->delete();
    return redirect()->route('items.list')->with('success', 'Insumo eliminada correctamente');
}
}
