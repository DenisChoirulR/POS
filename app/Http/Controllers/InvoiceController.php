<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $invoices = Invoice::latest();
        
        $date = Invoice::get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d');
        });

        $month = Invoice::get('created_at')->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m');
        });

        $year = Invoice::get()->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('Y');
        });

        if ($request->has('date')) {
            if ($request->date != "") {
                $invoices->whereDay('created_at', '=', $request->date);
            }
        }

        if ($request->has('month')) {
            if ($request->month != "") {
                $invoices->whereMonth('created_at', '=', $request->month);
            }
        }

        if ($request->has('year')) {
            if ($request->year != "") {
                $invoices->whereYear('created_at', '=', $request->year);
            }
        }

        $invoices = $invoices->get();

        return view('invoices.index', compact('invoices','date','month','year'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
