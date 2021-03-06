<?php

namespace App\Http\Controllers;

use App\Prescriptiondetail;
use Illuminate\Http\Request;
use App\Prescription;
use App\Item;

class PrescriptiondetailController extends Controller
{    
    public function select($prescriptiondetail_id){
        $prescriptiondetail = Prescriptiondetail::findOrFail($prescriptiondetail_id);
        $prescriptiondetail->item->measureunit;
        return $prescriptiondetail;
    }

    public function store(Request $request){
        if($request->id){
            $prescriptiondetail = Prescriptiondetail::findOrFail($request->id);
            $prescriptiondetail->fill($request->all());
            $prescriptiondetail->save();
            $prescriptiondetail->item->measureunit;
            return $prescriptiondetail;
        }else{                
            $prescriptiondetail = Prescriptiondetail::create($request->all());
            $prescriptiondetail->item->measureunit;
            return $prescriptiondetail;
        }        
    }
    
    public function delete($prescriptiondetail_id){
        $prescriptiondetail = Prescriptiondetail::findOrFail($prescriptiondetail_id);
        $prescriptiondetail->enabled=0;
        $prescriptiondetail->save();
        return $prescriptiondetail;
    }
}
