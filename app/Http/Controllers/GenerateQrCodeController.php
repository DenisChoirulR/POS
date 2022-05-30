<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use QrCode;
use Illuminate\Support\Collection;
use App\QrItem;

class GenerateQrCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('generate_qrcode.index');
    }

    public function print(Request $request)
    {
    	$qty = $request->qty;

    	$qr_codes = new Collection;

    	for ($x = 1; $x <= $qty; $x++) {
		  	$num = self::lastSequence();
            $code = url('/').'/price/'.$num;
		  	$qr_item = QrItem::create([
		  		'code' => $code
		  	]);

		  	$qr_codes->push([
                'qr_code' => $code
            ]);
		}

        return view('generate_qrcode.print', compact('qr_codes'));
    }

    public static function lastSequence()
    {
        $qr = QrItem::orderBy('id', 'DESC')->first();
        if ($qr) {
        	$num = $qr->id + 1;
        } else {
        	$num = 1;
        }

        return $num;
    }
}
