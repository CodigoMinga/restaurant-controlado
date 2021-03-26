<?php

namespace App\Http\Controllers;

use App\Prescription;
use App\Product;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
   


    public function add($product_id){
        $product = Product::findOrFail($product_id);
        return view('prescriptions.add', compact('product'));
    }

    public function addProcess( Request $request,$product_id){
        Prescription::create($request->all()  + ['product_id' => $product_id]);
        return redirect()->route('products.list')->with('success', 'Reseta Creada Correctamente');
    }

    public function list(){
        return view('prescriptions.list', [
            'prescriptions' => Prescription::latest()->paginate()

        ]);
    }

    public function getdata(){

        $prescription = Prescription::all();

        return DataTables::of($prescription)->make(true);
}

    public function details($prescription_id){   
    return view('prescriptions.details', [
        'prescription' => Prescription::find($prescription_id)
    ]);
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
