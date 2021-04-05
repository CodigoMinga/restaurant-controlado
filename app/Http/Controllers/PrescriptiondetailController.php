<?php

namespace App\Http\Controllers;

use App\Prescriptiondetail;
use Illuminate\Http\Request;
use App\Prescription;
use App\Item;

class PrescriptiondetailController extends Controller
{
    public function details($prescription_id)
    {
        return view('prescriptiondetails.details', [
            'prescription' => Prescription::find($prescription_id)
        ]);
    }


    public function add($prescription_id){
        $prescription = Prescription::findOrFail($prescription_id);
        $item = Item::all();
        return view('prescriptiondetails.add', compact('prescription','item'));
    }

    public function addProcess( Request $request,$prescription_id){
        Prescriptiondetail::create($request->all()  + ['prescription_id' => $prescription_id]);
        return redirect()->route('prescriptiondetails.add',$prescription_id)->with('success', 'Reseta Creada Correctamente');
    }

    
    public function create(Request $request){
        $prescriptiondetail = Prescriptiondetail::create($request->all());
        return $prescriptiondetail;
    }

    public function update(Request $request){
        $prescriptiondetail = Prescriptiondetail::findOrFail($request->id);
        $prescriptiondetail->fill($request->all());
        $prescriptiondetail->save();
        return $prescriptiondetail;
    }
}
