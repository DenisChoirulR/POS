<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Grade;
use App\Brand;
use App\QrItem;
use App\Item;
use App\Photo;
use App\Invoice;
use App\InvoiceItem;
use App\Customer;
use App\Cashier;
use Illuminate\Support\Str;
use DB;
use Auth;

class CashierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $customers = Customer::all();
        return view('cashier.index', compact('customers'));
    }

    public function create()
    {
        return view('cashier.create');
    }

    public function store(Request $request)
    {
    	$total = 0;
        if ($request->is_reseller == 1) {
            foreach ($request->item_id as $key => $item_id) {
                $item = Item::find($item_id);
                $total = $total+$item->reseller_price;
            }
        } else {
        	foreach ($request->item_id as $key => $item_id) {
        		$item = Item::find($item_id);
        		$total = $total+$item->price;
        	}
        }

        $price_total = $total;
        $redemption_point = isset($request->point) ? $request->point : 0;

        $total = $total - ($request->discount / 100 * $total);        

        if ($request->is_new == 1) {
            $customer = Customer::create([
                'name' => $request->name,
                'phone_number' => $request->phone_number, 
                'email' => $request->email,
                'is_reseller' => $request->is_reseller,
                'join_date' => $request->is_reseller ? date("Y-m-d") : NULL,
                'point' => $total > 500000 ? 10000 : 0,
                'point_count' => $total > 500000 ? 1 : 0,
            ]);
        } elseif ($request->is_new == 0) {
            $customer = Customer::
                withCount(['invoices AS total' => function ($query) {
                    $query->select(DB::raw('SUM(total) as total'));
                }])
                ->find($request->customer_id);

            $shopping_total = $customer->total + $total;
            $point_count = intdiv($shopping_total, 500000);
            $remaining_points = $point_count - $customer->point_count;

            if ($customer->is_reseller == 1) {
                $is_reseller = 1;
            } else {
                $is_reseller = $request->is_reseller;

                if ($is_reseller == 1) {
                    $customer->update([
                        'join_date' => date("Y-m-d"),
                    ]);
                }
            }

            $customer->update([
                'is_reseller' => $is_reseller,
            ]);

            if ($remaining_points > 0) {
                $point = $remaining_points * 10000;
                $customer->update([
                    'point' => $customer->point + $point,
                    'point_count' => $customer->point_count + $remaining_points,
                    'is_member' => $shopping_total > 500000 ? 1 : 0,
                ]);
            }

            $customer = Customer::find($request->customer_id);

            $customer->update([
                'point' => $customer->point - $redemption_point,
            ]);
        }

    	$invoice = Invoice::create([
            'uuid' => Str::uuid(),
    		'user_id' => 1,
    		'customer_id' => $customer->id,
    		'discount' => $request->discount ?? 0,
            'point' => $redemption_point,
            'price_total' => $price_total,
    		'total' => $total - $redemption_point,
            'type' => $request->is_reseller == 1 ? "reseller" : "regular",
            'payment_method' => $request->payment_method,
            'cashier_id' => Auth::user()->id,
    	]);

    	foreach ($request->item_id as $key => $item_id) {
    		$invoice_item = InvoiceItem::create([
    			'invoice_id' => $invoice->id,
    			'item_id' => $item_id
    		]);

            $item = Item::find($item_id)->update([
                'is_sold' => 1
            ]);
    	}

        return redirect(route('cashier.note', $invoice->id));
    }

    public function note($invoice_id)
    {
    	$invoice = Invoice::with('invoice_items')->find($invoice_id);
        $phone_number = $invoice->customer->phone_number;
        function hp($nohp) {
            $nohp = str_replace(" ","",$nohp);
            $nohp = str_replace("(","",$nohp);
            $nohp = str_replace(")","",$nohp);
            $nohp = str_replace(".","",$nohp);

            if(!preg_match('/[^+0-9]/',trim($nohp))){
                if(substr(trim($nohp), 0, 3)=='62'){
                    $hp = trim($nohp);
                }
                elseif(substr(trim($nohp), 0, 1)=='0'){
                    $hp = '62'.substr(trim($nohp), 1);
                }
            }
            return $hp;
        }

        $link = url('/').'/note/'.$invoice->uuid;

        $phone_number = hp($phone_number);

        $url = "https://wa.me/".$phone_number."?text=".
        "NGADI-NGADI STORE RECEIPT%0A%0A".
        "Terima kasih sudah berbelanja di Ngadi-Ngadi Store!%0A%0A".
        "Nota pembelian Anda :%0A".
        "*Date* : " .rawurlencode(date('d F Y', strtotime($invoice->created_at))). "%0A".
        "*Cashier* : " .rawurlencode($invoice->cashier->name). "%0A".
        "*Name* : ".rawurlencode($invoice->customer->name)."%0A".
        "*Shoping List* : %0A";

        if ($invoice->type == 'reseller') {
           foreach ($invoice->invoice_items as $key => $item) {
                $url = $url.'%2D '.rawurlencode($item->item->category->name)." %28".rawurlencode($item->item->brand->name)."%29%20%3A%20"."Rp ".rawurlencode(number_format($item->item->reseller_price,0,'.','.'))."%0A";
            }
        } else {
            foreach ($invoice->invoice_items as $key => $item) {
                $url = $url.'%2D'.rawurlencode($item->item->category->name)." %28".rawurlencode($item->item->brand->name)."%29%20%3A%20"."Rp ".rawurlencode(number_format($item->item->price,0,'.','.'))."%0A";
            }
        }

        $url = $url."*Subtotal* %3A%20Rp ".rawurlencode(number_format($invoice->price_total,0,'.','.'))."%0A";

        if ($invoice->discount) {
            $url = $url."*Discount* %3A%20".rawurlencode(number_format($invoice->discount))."%25%0A";
        }

        if ($invoice->point > 0) {
            $url = $url."*Redemption Point* %3A%20Rp ".rawurlencode(number_format($invoice->point,0,'.','.'))."%0A";
        }

        $url = $url."*Total* %3A%20Rp ".number_format($invoice->total,0,'.','.')."%0A%0A".rawurlencode($link)."%0A%0AFollow%20our%20instagram%0A%40ngadingadi_store";
        
        return view('cashier.note', compact('invoice','url'));
    }

    public function get_item(Request $request)
    {	
    	$qr_id = QrItem::where('code', $request->code)->value('id');
        $item = Item::with('category','brand','grade')->where('qr_id', $qr_id)
        ->where('is_sold', '!=' , 1)
        ->first();

        return $item;
    }

    public function get_customer(Request $request)
    {   
        $customers = Customer::where('name', 'like', '%'.$request->customer_search.'%')
        ->orWhere('phone_number', 'like', '%'.$request->customer_search.'%')
        ->orWhere('email', 'like', '%'.$request->customer_search.'%')
        ->get();

        return $customers;
    }
}
