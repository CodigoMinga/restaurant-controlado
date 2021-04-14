<?php

namespace App\Http\Controllers;

use App\Prescription;
use App\Product;
use App\Item;
use App\Measureunit;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{   

    public function details($prescription_id){   
        $prescription = Prescription::find($prescription_id);

        //BUSCAMOS EL PRODUCTO PARA OBTENER LA COMPAÑIA
        $product = Product::findOrFail($prescription->product_id);
        $company = $product->producttype->company;
        
        //ASI SOLO MOSTRAMOS ITEMS DE LA COMPAÑIA ASOCIADA
        $items = Item::where('company_id',$company->id)->get();

        $measureunits = Measureunit::all();
        return view('prescriptions.details',compact('prescription','items','measureunits'));
    }

    public function store(Request $request){
        $id = $request->id;
        if($id){
            $prescription = Prescription::findOrFail($request->id);
            $prescription->update($request->all());
            return redirect('products/'.$prescription->product_id)->with('success', 'Receta editada correctamente');
        }else{
            $prescription = Prescription::create($request->all());
            return $prescription;
        }
    }

    public function delete($prescription_id){
        $prescription = Prescription::findOrFail($prescription_id);
        $prescription->enabled=0;
        $prescription->save();
        return redirect('products/'.$prescription->product_id)->with('success', 'Receta eliminada correctamente');
    }
}
