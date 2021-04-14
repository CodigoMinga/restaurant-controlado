<?php

namespace App\Http\Controllers;

use App\Company;
use App\Orderdetail;
use App\Producttype;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function add(){

        $orderdetails = Orderdetail::all();
        $producttypes = Producttype::all();
        return view('companys.add',compact('producttypes', 'orderdetails'));
        
    }
    public function getdata(){
       
        $company = Company::all();

        return DataTables::of($company)->make(true);
    }
    public function list(){

        $companys = Company::all();
        return view('companys.list',compact('companys'));
    }
    public function addProcess(Request $request){
            
        Company::create($request->all());

        return redirect()->route('companys.list')->with('success', 'Compañia Ingresada correctamente');
    }
    public function details($company_id)
    {
        return view('companys.details', [
            'company' => Company::find($company_id)
        ]);
    }
    public function editprocess($company_id, Request $request)
    {
        //busca la orden en la base de datos con el id que se le pasa desde la URL
        $company = Company::findOrFail($company_id);

        $company->update($request->all());

        return redirect()->route('companys.list')->with('success', 'Compañia editada correctamente');
    }
    public function delete($company_id)
    {
        $company = company::findOrFail($company_id);
        $company->delete();
        return redirect()->route('companys.list')->with('success', 'Compañia eliminada correctamente');
    }
}
