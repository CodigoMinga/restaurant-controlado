<?php

namespace App\Http\Controllers;

use App\Table;
use App\Tabletype;
use Illuminate\Http\Request;

class TableController extends Controller
{
    
    public function add(){

        //Array de las Compañias del Usuario
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();

        //Tipos de Productos que pertenecesn a las conpañias del Usuario
        $tabletypes = Tabletype::whereIn('company_id',$companies_id)->get();

        $product = new Product;

        return view('products.form',compact('producttypes','product'));
    }
}
