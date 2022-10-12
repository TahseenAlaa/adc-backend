<?php

namespace App\Http\Controllers;

class InvoiceController extends Controller
{
    public function patientInfoInvoice($uuid) {
        return view('invoice-patient-info');
    }

    public function ReceptionInfoInvoice ($uuid) {
        return view('invoice-reception');
    }
}
