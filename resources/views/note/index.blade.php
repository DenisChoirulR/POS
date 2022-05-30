@extends('layouts.app_home')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header" style="text-align: center;">
                    <img style="width: 50%;" src="{{ asset('images/logo/logo.jpg') }}">
                    <h1>
                        NGADI-NGADI STORE Receipt
                    </h1>
                </div>
                <div class="body">
                    <div>
                        <table class="table" style="border:0px; font-size: 10px">
                            <thead>
                                <tr>
                                    <th>{{date_format($invoice->created_at,"Y F d")}}</th>
                                    <th style="text-align:right">{{date_format($invoice->created_at,"H:i")}}</th>
                                </tr>
                                <tr>
                                    <th>Customer</th>
                                    <th style="text-align:right">{{$invoice->customer->name}}</th>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <th style="text-align:right">{{$invoice->customer->phone_number}}</th>
                                </tr>
                                <tr>
                                    <th>Cashier</th>
                                    <th style="text-align:right">{{$invoice->cashier->name}}</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr>
                                    <th colspan="2"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $subtotal = 0; @endphp
                                @if($invoice->type == 'reseller')
                                @foreach($invoice->invoice_items as $item)
                                <tr>
                                    <td>{{$item->item->category->name}} - {{$item->item->brand->name}}</td>
                                    <td style="text-align:right">{{ 'Rp '.number_format($item->item->reseller_price,0,'.','.')}}</td>
                                    @php $subtotal = $subtotal + $item->item->reseller_price; @endphp
                                </tr>
                                @endforeach
                                @else
                                @foreach($invoice->invoice_items as $item)
                                <tr>
                                    <td>{{$item->item->category->name}} - {{$item->item->brand->name}}</td>
                                    <td style="text-align:right">{{ 'Rp '.number_format($item->item->price,0,'.','.')}}</td>
                                    @php $subtotal = $subtotal + $item->item->price; @endphp
                                </tr>
                                @endforeach
                                @endif
                                <tr>
                                    <th>Subtotal</th>
                                    <th style="text-align:right">{{'Rp '.number_format($subtotal,0,'.','.')}}</th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th>Discount</th>
                                    <th style="text-align:right">{{isset($invoice->discount) ? $invoice->discount."%" : '-'}}</th>
                                </tr>
                                <tr>
                                    <th>Redemption Point</th>
                                    <th style="text-align:right">{{'Rp '.number_format($invoice->point,0,'.','.')}}</th>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <th style="text-align:right">{{'Rp '.number_format($invoice->total,0,'.','.')}}</th>
                                </tr>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle;" height="50px" colspan="2">Terima Kasih</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"></div>
    </div> 
@endsection