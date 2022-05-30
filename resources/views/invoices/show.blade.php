@extends('layouts.app_invoice')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Invoices Detail
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover col-sm-8">
                                <tbody>
                                    <tr>
                                        <th>Customer Name</th>
                                        <td>{{$invoice->customer->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{$invoice->customer->phone_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Cashier</th>
                                        <td>{{$invoice->cashier->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Transaction Type</th>
                                        <td>{{$invoice->type}}</td>
                                    </tr>
                                    <tr>
                                        <th>Payment Method</th>
                                        <td>{{$invoice->payment_method}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td>{{date('d-m-Y', strtotime($invoice->created_at))}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <br>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover col-sm-8">
                                <thead>
                                    <tr>
                                        <th>Item Name</th>
                                        <th>Size</th>
                                        <th>Colour</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $subtotal = 0; @endphp
                                    @foreach($invoice->invoice_items as $item)
                                    @php $price = $invoice->type == 'reseller' ? $item->item->reseller_price : $item->item->price; @endphp
                                    <tr>
                                        <td>{{$item->item->category->name}} {{$item->item->brand->name}}</td>
                                        <td>{{$item->item->size}}</td>
                                        <td>{{$item->item->colour->name}}</td>
                                        <td>{{'Rp '.number_format($price,0,'.','.')}}</td>
                                        @php $subtotal = $subtotal + $price; @endphp
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th>Subtotal</th>
                                        <th></th>
                                        <th></th>
                                        <th>{{'Rp '.number_format($subtotal,0,'.','.')}}</th>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <th></th>
                                        <th></th>
                                        <th>{{isset($invoice->discount) ? $invoice->discount.'%' : '-'}}</th>
                                    </tr>
                                    <tr>
                                        <th>Redemption Point</th>
                                        <th></th>
                                        <th></th>
                                        <th>{{'Rp. '.number_format($invoice->point,0,'.','.')}}</th>
                                    </tr>
                                    <tr>
                                        <th>Total</th>
                                        <th></th>
                                        <th></th>
                                        <th>{{'Rp. '.number_format($invoice->total,0,'.','.')}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
        </div>
    </div>    
@endsection