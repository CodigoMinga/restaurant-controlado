<?php

namespace App\Http\Controllers;

use Auth;
use App\Table;
use App\Tabletype;
use App\Company;
use Illuminate\Http\Request;

class TableController extends Controller
{
    
    public function list(){
        $company = session('company');
        $tables = Table::where('company_id',$company->id)->get();
        foreach ($tables as $key => $table) {
            $table->tabletype;
        }
        return view('tables.list',compact('tables'));
    }

    public function add(){
        $tabletypes = Tabletype::all();
        $table = new Table;
        return view('tables.form',compact('table','tabletypes'));
    }

    public function details($table_id)
    {   
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