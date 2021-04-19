<?php

namespace App\Http\Controllers;
use Auth;
use App\Client;
use App\Commune;
use App\Region;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function delete($client_id)
    {
        $client = client::findOrFail($client_id);
        $client->delete();
        return redirect()->route('clients.list')->with('success', 'Cliente eliminado correctamente');
    }

    public function editprocess($client_id, Request $request)
     {
         $client = Client::findOrFail($client_id);
         $client->update($request->all());
         return redirect()->route('clients.list')->with('success', 'Cliente editado correctamente');
     }

     public function addProcess(Request $request){

        Client::create($request->all());
        return redirect()->route('clients.list')->with('success', 'Cliente Creado correctamente');
    }

    public function list()
    {
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        $clients = Client::whereIn('company_id',$companies_id)->get();
        foreach ($clients as $key => $client) {
            $client -> commune-> region;
        }
        return view('clients.list',compact('clients'));
    }

    public function add(){
       
        $client = new Client;  //se crea la variable 
        $regions=Region::all();
        $communes = Commune::all();

        return view('clients.add' , compact('client', 'communes','regions')); // para luego pasarla con compact
    }

    public function details($client_id)
    {
        $communes = Commune::all();
        $regions=Region::all();
        return view('clients.details',compact('regions' ,'communes') , [
            'client' => Client::find($client_id)
        ]);
    }
    
    public function getdata()
    {   
        $companies_id = Auth::user()->companies()->pluck('company_id')->toArray();
        $clients = Client::whereIn('company_id',$companies_id)->get();

        foreach ($clients as $key => $client) {
            $client -> commune -> region;
        }
        
        $aux['clients']=$clients;
        $aux['regions']=Region::all();
        $aux['communes']=Commune::all();

        return json_encode($aux);
    }

    public function store(Request $request){
        $id = $request->id;
        if($id){
            //Si encuentra el ID edita
            $client = Client::findOrFail($request->id);
            $client->update($request->all());
            $client->commune->region;
            return $client;
        }else{
            //Si no, Crea un Item
            $client = Client::create($request->all());
            $client->commune->region;
            return $client;
        }
    }
}
