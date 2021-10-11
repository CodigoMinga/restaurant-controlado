<?php

namespace App\Http\Controllers;

use App\Company;
use App\Region;
use App\Commune;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function add(){
        $regions    = Region::all();
        $communes   = Commune::all();
        $company    = new Company;
        return view('companys.form',compact('company','regions','communes'));
    }


    public function details($company_id)
    {        
        $regions    = Region::all();
        $communes   = Commune::all();
        $company    = Company::findOrFail($company_id);
        return view('companys.form',compact('company','regions','communes'));
    }


    public function list(){
        $companys = Company::all();
        return view('companys.list',compact('companys'));
    }


    public function store(Request $request)
    {
        if($request->id){
            $company = Company::findOrFail($request->id);
            $company->update($request->all());
            return redirect()->route('companys.list')->with('success', 'Compañia editada correctamente');
        }else{
            Company::create($request->all());
            return redirect()->route('companys.list')->with('success', 'Compañia Ingresada correctamente');
        }
    }
    

    public function delete($company_id)
    {
        $company = company::findOrFail($company_id);
        $company->delete();
        return redirect()->route('companys.list')->with('success', 'Compañia eliminada correctamente');
    }
}
