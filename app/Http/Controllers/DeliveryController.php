<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
        
    public function list(){
        $company = session('company');
        $deliverys = Delivery::where('company_id',$company->id)->get();
        return view('deliverys.list',compact('deliverys'));
    }

    public function add(){
        $delivery = new Delivery;
        return view('deliverys.form',compact('delivery'));
    }

    public function details($delivery_id)
    {
        $delivery = Delivery::find($delivery_id);
        return view('deliverys.form',compact('delivery'));
    }

    public function process(Request $request)
    {
        $id = $request->id;
        if($id){
            $delivery = Delivery::findOrFail($request->id);
            $delivery->update($request->all());
            return redirect()->route('deliverys.list')->with('success', 'Delivery editado correctamente');
        }else{
            $delivery = Delivery::create($request->all());
            return redirect()->route('deliverys.list')->with('success', 'Delivery Creado correctamente');
        }
    }

    public function delete($delivery_id)
    {
        $delivery = Delivery::findOrFail($delivery_id);
        $delivery->enabled=0;
        $delivery->save();
        return redirect()->route('deliverys.list')->with('success', 'Delivery eliminado correctamente');
    }
}
