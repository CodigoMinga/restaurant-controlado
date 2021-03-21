<?php

namespace App\Http\Controllers;

use App\Measureunit;
use App\Company;
use Illuminate\Http\Request;

class MeasureunitController extends Controller
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
     * @param  \App\Measureunit  $measureunit
     * @return \Illuminate\Http\Response
     */
    public function show(Measureunit $measureunit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Measureunit  $measureunit
     * @return \Illuminate\Http\Response
     */
    public function edit(Measureunit $measureunit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Measureunit  $measureunit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Measureunit $measureunit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Measureunit  $measureunit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Measureunit $measureunit)
    {
        //
    }

    public function add(){
        
        $companys = Company::all();
        return view('measureunits.add', compact('companys'));
    }
   
    public function addProcess(Request $request){
        
        Measureunit::create($request->all());
        return redirect()->route('measureunits.add')->with('success', 'Unidad de medida Creada correctamente');
    }

    public function list(){

        return view('measureunits.list', [
            'measureunits' => Measureunit::latest()->paginate()

        ]);
    }

    public function details($measureunit_id)
    {
        return view('measureunits.details', [
            'measureunit' => Measureunit::find($measureunit_id)
        ]);
    }
    
        public function editprocess($measureunit_id, Request $request)
    {
        //busca la orden en la base de datos con el id que se le pasa desde la URL
        $measureunit = Measureunit::findOrFail($measureunit_id);
    
        $measureunit->update($request->all());
    
        return redirect()->route('measureunits.list')->with('success', 'Unidad de Medida editada correctamente');
    }
    
        public function delete($measureunit_id)
    {
        $measureunit = Measureunit::findOrFail($measureunit_id);
        $measureunit->delete();
        return redirect()->route('measureunits.list')->with('success', 'Unidad de Medida eliminada correctamente');
    }
}
