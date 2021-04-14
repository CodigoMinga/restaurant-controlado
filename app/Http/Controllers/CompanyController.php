<?php

namespace App\Http\Controllers;

use App\Company;
use App\Orderdetail;
use App\Producttype;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
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
