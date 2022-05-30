<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;

class CustomerInvoiceController extends Controller
{
    public function index($uuid)
    {
    	$invoice = Invoice::with('invoice_items')->where('uuid', $uuid)->first();
        
        return view('note.index', compact('invoice'));
    }
}
