<?php

namespace App\Http\Controllers\Master;

use App\DiscountEvent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DiscountEventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('master data');
        $discount_events = DiscountEvent::all();

        return view('master.discount_events.index', compact('discount_events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('master.discount_events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'phone_number' => 'required',
            'messages' => 'required'
        ]);

        $code = preg_replace('/\s+/', '_', $request->code);
        $phone_number = self::phone_number($request->phone_number);

        $encoded_messages = rawurlencode($request->messages);
        $url = "https://wa.me/".$phone_number."?text=".$encoded_messages;

        $discount_event = DiscountEvent::create([
            'code' => $code,
            'name' => $request->name,
            'discount' => $request->discount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'phone_number' => $phone_number,
            'messages' => $request->messages,
            'url' => $url,
        ]);

        return redirect()->route('discount-events.show', $discount_event->id);
    }

    public static function phone_number($phone_number)
    {
        $phone_number = str_replace(" ","",$phone_number);
        $phone_number = str_replace("(","",$phone_number);
        $phone_number = str_replace(")","",$phone_number);
        $phone_number = str_replace(".","",$phone_number);

        if(!preg_match('/[^+0-9]/',trim($phone_number))){
            if(substr(trim($phone_number), 0, 3)=='+62'){
                $phone_number = trim($phone_numberohp,"+");
            }elseif(substr(trim($phone_number), 0, 1)=='0'){
                $phone_number = '62'.substr(trim($phone_number), 1);
            }
        }
        return $phone_number;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DiscountEvent  $discountEvent
     * @return \Illuminate\Http\Response
     */
    public function show(DiscountEvent $discount_event)
    {
        return view('master.discount_events.show', compact('discount_event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DiscountEvent  $discountEvent
     * @return \Illuminate\Http\Response
     */
    public function edit(DiscountEvent $discount_event)
    {
        return view('master.discount_events.create', compact('discount_event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DiscountEvent  $discountEvent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DiscountEvent $discount_event)
    {
        $request->validate([
            'code' => 'required',
            'name' => 'required',
            'discount' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'phone_number' => 'required',
            'messages' => 'required'
        ]);

        $encoded_messages = rawurlencode($request->messages);

        $url = "https://wa.me/".$request->phone_number."?text=".$encoded_messages;

        $discount_event->update([
            'code' => $code,
            'name' => $request->name,
            'discount' => $request->discount,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'phone_number' => $phone_number,
            'messages' => $request->messages,
            'url' => $url,
        ]);

        return redirect()->route('discount-events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DiscountEvent  $discountEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiscountEvent $discount_event)
    {
        $discount_event->delete();
        return back();
    }

    public function print($id)
    {
        $discount_event = DiscountEvent::find($id);

        return view('master.discount_events.print', compact('discount_event'));
    }
}
