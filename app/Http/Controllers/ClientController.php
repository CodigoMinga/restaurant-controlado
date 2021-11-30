<?php

namespace App\Http\Controllers;
use Auth;
use App\Order;
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
        $company = session('company');
        $clients = Client::where('company_id',$company->id)->get();
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
        $company = session('company');
        $clients = Client::where('company_id',$company->id)->get();
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
        $order = Order::findOrFail($request->order_id);
        if($order->dte_token==null){
            if($id){
                //Si encuentra el ID edita
                $client = Client::findOrFail($request->id);
                $client->update($request->all());
                $client->commune->region;

                //AGREGA CLIENTE A ORDEN
                
                $order->client_id = $client->id;
                $order->save();

                return $client;
            }else{
                //Si no, Crea un Item
                $client = Client::create($request->all());
                $client->commune->region;
                
                //AGREGA CLIENTE A ORDEN
                $order->client_id = $client->id;
                $order->save();

                return $client;
            }
        }else{
            return 'La boleta ya fue emitida, no se puede cambiar al cliente';
        }
    }

    
    public function history($client_id)
    {
        //$order = Order::findOrFail($order_id);
        $client = Client::findOrFail($client_id);
        foreach ($client->orders as $key => $order) {
            $order->orderdetails;
        }
        return $client->orders;
    }
}
