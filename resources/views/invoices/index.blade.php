@extends('layouts.app_invoice')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <form method="GET" action="" accept-charset="UTF-8">
                    <div class="body">
                        <div class="row clearfix">
                            {{--<div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Date</label>
                                        <select class="form-control show-tick" name="date">
                                            <option value="">-- All --</option>
                                            @foreach($date as $key => $d)
                                                <option value="{{$key}}" {{$key == (isset($_GET['date']) ? $_GET['date'] : '') ? 'selected' : ''}}>{{$key}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Month</label>
                                        <select class="form-control show-tick" name="month">
                                            <option value="">-- All --</option>
                                            @foreach($month as $key => $m)
                                                <option value="{{$key}}" {{$key == (isset($_GET['month']) ? $_GET['month'] : '') ? 'selected' : ''}}>{{$m[0]->created_at->format('F')}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>--}}
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Date</label>
                                        <select class="form-control show-tick" name="date">
                                            <option value="">-- All --</option>
                                            @for($key = 1; $key<32; $key++)
                                                <option value="{{$key}}" {{$key == (isset($_GET['date']) ? $_GET['date'] : '') ? 'selected' : ''}}>{{$key}}</option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Month</label>
                                        <select class="form-control show-tick" name="month">
                                            <option value="">-- All --</option>
                                            @for($key = 1; $key<13; $key++)
                                                <option value="{{$key}}" {{$key == (isset($_GET['month']) ? $_GET['month'] : '') ? 'selected' : ''}}>
                                                    @if($key == 1)
                                                        January
                                                    @elseif($key == 2)
                                                        February
                                                    @elseif($key == 3)
                                                        March
                                                    @elseif($key == 4)
                                                        April
                                                    @elseif($key == 5)
                                                        May
                                                    @elseif($key == 6)
                                                        June
                                                    @elseif($key == 7)
                                                        July
                                                    @elseif($key == 8)
                                                        August
                                                    @elseif($key == 9)
                                                        September
                                                    @elseif($key == 10)
                                                        October
                                                    @elseif($key == 11)
                                                        November
                                                    @elseif($key == 12)
                                                        December
                                                    @endif
                                                </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Year</label>
                                        <select class="form-control show-tick" name="year">
                                            <option value="" selected>-- All --</option>
                                            @foreach($year as $key => $y)
                                                <option value="{{$key}}" {{$key == (isset($_GET['year']) ? $_GET['year'] : '') ? 'selected' : ''}}>{{$key}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <button type="submit" class="btn bg-light-green waves-effect"> Filter </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="header">
                    <h2>
                        Invoices Data
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table id="invoices" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Phone Number</th>
                                    <th>Jenis Transaksi</th>
                                    <th>Cashier</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Subtotal</th>
                                    <th>Discount</th>
                                    <th>Redemption Point</th>
                                    <th>Total</th>
                                    <th>Date</th>
                                    <th width="60px;"></th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($invoices as $key => $invoice)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$invoice->customer->name}}</td>
                                    <td>{{$invoice->customer->phone_number}}</td>
                                    <td>{{$invoice->type}}</td>
                                    <td>{{$invoice->cashier->name}}</td>
                                    <td>{{$invoice->payment_method}}</td>
                                    <td>{{'Rp '.number_format($invoice->price_total,0,'.','.')}}</td>
                                    <td>{{$invoice->discount}}%</td>
                                    <td>{{'Rp '.number_format($invoice->point,0,'.','.')}}</td>
                                    <td>{{'Rp '.number_format($invoice->total,0,'.','.')}}</td>
                                    <td>{{date('d-m-Y', strtotime($invoice->created_at))}}</td>
                                    <td>
                                    	<a href="{{route('invoices.show',$invoice->id)}}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float">
		                                    <i class="material-icons">remove_red_eye</i>
		                                </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>    
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
             $(document).ready( function () {
                $('#invoices').DataTable({
                    "bLengthChange": false,
                });
            } );
        });
    </script>
@endpush