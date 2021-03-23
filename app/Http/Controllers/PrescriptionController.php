<?php

namespace App\Http\Controllers;

use App\Prescription;
use App\Product;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
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
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }


    public function add(){

        $products = Product::all();
        return view('prescriptions.add',compact('products'));
    }

    public function addProcess( Request $request){
       
        Prescription::create($request->all());

        return redirect()->route('prescriptions.list')->with('success', 'Receta Creada Correctamente');
    }

    public function list(){
        return view('prescriptions.list', [
            'prescriptions' => Prescription::latest()->paginate()

        ]);
    }

    public function getdata(){
       
        $prescription = Prescription::all();

        return DataTables::of($prescription)->make(true);
}

    public function details($prescription_id){
    return view('prescriptions.details', [
        'prescription' => Prescription::find($prescription_id)
    ]);
}

    public function editprocess($prescription_id, Request $request){
    //busca la orden en la base de datos con el id que se le pasa desde la URL
    $prescription = Prescription::findOrFail($prescription_id);

    $prescription->update($request->all());

    return redirect()->route('prescriptions.list')->with('success', 'Receta editada correctamente');
}

    public function delete($item_id){
    $prescription = Prescription::findOrFail($prescription_id);
    $prescription->delete();
    return redirect()->route('prescriptions.list')->with('success', 'Receta eliminada correctamente');
}
}
