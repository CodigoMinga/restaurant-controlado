<?php

namespace App\Http\Controllers;

use Auth;
use App\Table;
use App\Tabletype;
use App\Company;
use Illuminate\Http\Request;

class TableController extends Controller
{
    
    public function add(){

        //Array de las Compañias del Usuario
        $companys = Auth::user()->companies()->get();

        $tabletypes = Tabletype::all();

        $table = new Table;

        return view('tables.form',compact('table','companys','tabletypes'));
    }

    public function list(){

        //Array de las Compañias del Usuario
        $companies_id       = Auth::user()->companies()->pluck('company_id')->toArray();

        //Mesas que pertenecesn a el Usuario
        $tables = Table::whereIn('company_id',$companies_id)->get();
        foreach ($tables as $key => $table) {
            $table->tabletype;
        }
        return view('tables.list',compact('tables'));
    }
    public function details($table_id)
    {
        //Array de las Compañias del Usuario
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();

        $tabletypes = Tabletype::all();

        $table = Table::find($table_id);
        return view('tables.form',compact('tabletypes','table'));
    }

    public function process(Request $request)
    {

        $id = $request->id;
        if($id){
            $table = Table::findOrFail($request->id);
            $table->update($request->all());
            return redirect()->route('tables.list')->with('success', 'Mesa editado correctamente');
        }else{
            $table = Table::create($request->all());
            return redirect('/tables/'.$table->id)->with('success', 'Mesa Creado correctamente');
        }
    }

    public function delete($table_id)
    {
        $table = Table::findOrFail($table_id);
        $table->enabled=0;
        $table->save();
        return redirect()->route('tables.list')->with('success', 'Mesa eliminado correctamente');
    }
}