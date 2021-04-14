<?php

namespace App\Http\Controllers;

use App\Measureunit;
use App\Company;
use Illuminate\Http\Request;

class MeasureunitController extends Controller
{
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
