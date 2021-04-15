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
}