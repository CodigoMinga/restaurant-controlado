<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function delete($client_id)
    {
        $client = client::findOrFail($client_id);
        $client->delete();
        return redirect()->route('clients.list')->with('success', 'Pedido eliminado correctamente');
    }

    public function editprocess($product_id, Request $request)
     {
         $client = Client::findOrFail($product_id);
         $client->update($request->all());
         return redirect()->route('clients.list')->with('success', 'Pedido editado correctamente');
     }
     public function addProcess(Request $request){

        Client::create($request->all());
        return redirect()->route('clients.list')->with('success', 'Pedido Creado correctamente');
    }
    public function list(){
        $clients = Client::all();
        return view('clients.list',compact('clients'));
    }
    public function add(){

        $clients = Client::all();  //se crea la variable 

        return view('clients.add'); // para luego pasarla con compact
    }
    public function details($client_id)
{
    return view('clients.details', [
        'client' => Client::find($client_id)
    ]);
}

}
