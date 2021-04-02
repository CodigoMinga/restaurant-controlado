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
}
