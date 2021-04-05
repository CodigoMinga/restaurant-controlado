<?php

namespace App\Http\Controllers;

use App\Prescription;
use App\Product;
use App\Item;
use App\Measureunit;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
   


    public function add($product_id){
        $product = Product::findOrFail($product_id);
        $company = $product->producttype->company;
        $items = Item::where('company_id',$company->id)->get();
        $measureunits = Measureunit::all();
        return view('prescriptions.add', compact('product','items','measureunits'));
    }

    public function addProcess( Request $request,$product_id){
        Prescription::create($request->all()  + ['product_id' => $product_id]);
        return redirect()->route('products.details',$product_id)->with('success', 'Reseta Creada Correctamente');
    }

    
    public function create(Request $request){
        $prescription = Prescription::create($request->all());
        return $prescription;
    }

    public function list(){
        return view('prescriptions.list', [
            'prescriptions' => Prescription::latest()->paginate()

        ]);
    }

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

    public function editprocess($prescription_id, Request $request){
        //busca la orden en la base de datos con el id que se le pasa desde la URL
        $prescription = Prescription::findOrFail($prescription_id);

        $prescription->update($request->all());

        return redirect()->route('prescriptions.list')->with('success', 'Receta editada correctamente');
    }

    public function delete($item_id){
        $prescription = Prescription::findOrFail($prescription_id);
        $prescription->delete();
        return redirect()->route('prescriptions.list')->with('success', 'Receta eliminada correctamente');
    }
}
