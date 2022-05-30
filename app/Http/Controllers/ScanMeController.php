<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DiscountEvent;

class ScanMeController extends Controller
{
    public function index()
    {
        return view('scan_me.index');
    }

    public function redirect($code)
    {
    	$discount_event = DiscountEvent::where('code', $code)->first();

        return redirect($discount_event->url);
    }

    public function qr_check(Request $request)
    {
    	$discount_event = DiscountEvent::where('code', $request->code)->first();

    	return $discount_event;
    }
}
