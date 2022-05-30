@extends('layouts.app_invoice')

@section('content')

@push('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $('select[name=report_type]').on('change', function(){
        if ($('select[name=report_type]').val() == "report_customer") {
          $('.if-report-customer-type-selected').removeClass('hide');
          $('.if-report-item-type-selected').addClass('hide'); 
        } 

        else if ($('select[name=report_type]').val() == "report_item") {
          $('.if-report-item-type-selected').removeClass('hide');
          $('.if-report-customer-type-selected').addClass('hide'); 
        } 

        else {
            $('.if-report-customer-type-selected').addClass('hide');
            $('.if-report-item-type-selected').addClass('hide');
        }
      })

      //if load with report type
    if($('select[name=report_type]').val() ==  "report_customer") {
        $('.if-report-customer-type-selected').removeClass('hide');
     }
    if ($('select[name=report_type]').val() ==  "report_item") {
        $('.if-report-item-type-selected').removeClass('hide');
    }
  });
  </script>
@endpush
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <form method="GET" action="" accept-charset="UTF-8">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Report Type</label>
                                        <select class="form-control show-tick" name="report_type">
                                            <option value="">-- Select Report Type --</option>
                                            <option value="report_customer" {{isset($_GET['report_type']) ? $_GET['report_type'] == "report_customer" ? 'selected' : '' :'' }}>Invoices Report by Customer</option>
                                            <option value="report_item" {{isset($_GET['report_type']) ? $_GET['report_type'] == "report_item" ? 'selected' : '' :'' }}>Invoices Report by Item</option>
<!--                                             <option value="report_customer_item">Invoices Report by Customer and Item</option> -->
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row clearfix hide if-report-customer-type-selected">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <form method="GET" action="" accept-charset="UTF-8">
                    <input type="hidden" name="report_type" value="report_customer">
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="row" style="padding-bottom:0;">
                                    <div class="col-sm-6 col-md-6 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Start Date</label>
                                                <input type="date" name="start_date" class="form-control" placeholder="Please choose start date..." value="{{isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>End Date</label>
                                                <input type="date" name="end_date" class="datepicker form-control" placeholder="Please choose end date..." value="{{isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Customer</label>
                                        <select class="form-control show-tick" name="customer">
                                            <option value="all">-- All Customer --</option>
                                            @foreach($customers as $key => $customer)
                                                <option value="{{$customer->id}}" {{isset($_GET['customer']) ? $_GET['customer'] == $customer->id ? 'selected' : '' :'' }}>{{$customer->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Transaction</label>
                                        <select class="form-control show-tick" name="transaction_type">
                                            <option value="all">-- All Transaction Type --</option>
                                            <option value="regular"> Regular </option>
                                            <option value="reseller"> Reseller </option>
                                        </select>
                                    </div>
                                </div>
                            </div>  
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Payment Method</label>
                                        <select class="form-control show-tick" name="payment_method">
                                            <option value="all">-- All Payment Method --</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Debit">Debit</option>
                                            <option value="OVO">OVO</option>
                                            <option value="Shopee Pay">Shopee Pay</option>
                                        </select>
                                    </div>
                                </div>
                            </div>                            
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="submit" class="btn bg-light-green waves-effect" style="margin-top:20px;"> Filter </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="{{isset($_GET['customer']) ? '' : 'hide'}}">
                    <div class="header">
                        <h2>
                            Customer Invoices Data
                        </h2>
                    </div>
                    <div class="body">
                        <a href="/invoices/invoices-report-customer?{{ isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '' }}" class="btn bg-light-blue waves-effect" style="margin-bottom:20px;"><i class="material-icons">print</i><span>PRINT REPORT</span></a>
                        <div class="table-responsive">
                            <table id="invoices" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date</th>
                                        <th>Customer Name</th>
                                        <th>Phone Number</th>
                                        <th>Jenis Transaksi</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Item Total</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Redemption Point</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                        $grand_total = 0; 
                                        $grand_price_total = 0;
                                        $grand_item_total = 0;
                                    @endphp
                                    @foreach($invoices as $invoice_payment)
                                        @if($invoice_payment->invoices_by_payment_method)
                                        <tr>
                                            <th colspan="11">{{$invoice_payment->payment_method}}</th>
                                        </tr>
                                        @php 
                                            $total_all = 0;
                                            $price_total = 0;
                                            $item_total = 0;
                                        @endphp
                                    	@foreach($invoice_payment->invoices_by_payment_method as $key => $invoice)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{@date('d-m-Y', strtotime($invoice->created_at))}}</td>
                                                <td>{{@$invoice->customer->name}}</td>
                                                <td>{{@$invoice->customer->phone_number}}</td>
                                                <td>{{@$invoice->type}}</td>
                                                <td>{{@$invoice->payment_method}}</td>
                                                <td>{{@$invoice->items->count() }}</td>
                                                <td>{{@'Rp '.number_format($invoice->price_total,'0','.','.') }}</td>
                                                <td>{{@$invoice->discount.'%'}}</td>
                                                <td>{{@'Rp. '.number_format($invoice->point,'0','.','.')}}</td>
                                                <td>{{@'Rp. '.number_format($invoice->total,'0','.','.')}}</td>
                                            </tr>
                                            @php 
                                                $total_all += $invoice->total;
                                                $price_total += $invoice->price_total;
                                                $item_total = $item_total + $invoice->items->count();
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="6">Total</td>
                                            <td>{{$item_total}}</td>
                                            <td>{{ 'Rp '.number_format($price_total,'0','.','.') }}</td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ 'Rp '.number_format($total_all,'0','.','.') }}</td>
                                        </tr>
                                        @php 
                                            $grand_total += $total_all;
                                            $grand_price_total += $price_total;
                                            $grand_item_total += $item_total;
                                        @endphp
                                        @endif
                                    <tr>
                                        <td colspan="11"></td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="6">Grand Total</td>
                                        <td>{{$grand_item_total}}</td>
                                        <td>{{ 'Rp '.number_format($grand_price_total,'0','.','.') }}</td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ 'Rp '.number_format($grand_total,'0','.','.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="{{isset($_GET['customer']) ? 'hide' : ''}}" style="padding-bottom:15px; padding-left:15px; padding-right:15px;">
                    <div class="alert alert-info">
                        <strong>Info!</strong> Please Choose Filter for generate Report
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row clearfix hide if-report-item-type-selected">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <form method="GET" action="" accept-charset="UTF-8">
                    <input type="hidden" name="report_type" value="report_item">
                    <div class="body">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="row" style="padding-bottom:0;">
                                    <div class="col-sm-6 col-md-6 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>Start Date</label>
                                                <input type="date" name="start_date" class="form-control" placeholder="Please choose start date..." value="{{isset($_GET['start_date']) ? $_GET['start_date'] : date('Y-m-d')}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-xs-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <label>End Date</label>
                                                <input type="date" name="end_date" class="datepicker form-control" placeholder="Please choose end date..." value="{{isset($_GET['end_date']) ? $_GET['end_date'] : date('Y-m-d')}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Category</label>
                                        <select class="form-control show-tick" name="category">
                                            <option value="all">-- All Category --</option>
                                            @foreach($categories as $key => $category)
                                                <option value="{{$category->id}}" {{isset($_GET['category']) ? $_GET['category'] == $category->id ? 'selected' : '' :'' }}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Grade</label>
                                        <select class="form-control show-tick" name="grade">
                                            <option value="all">-- All Grade --</option>
                                            @foreach($grades as $key => $grade)
                                                <option value="{{$grade->id}}" {{isset($_GET['grade']) ? $_GET['grade'] == $grade->id ? 'selected' : '' :'' }}>{{$grade->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>                         
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="submit" class="btn bg-light-green waves-effect" style="margin-top:20px;"> Filter </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="{{isset($_GET['category']) ? '' : 'hide'}}">
                    <div class="header">
                        <h2>
                            Item Invoices Data
                        </h2>
                    </div>
                    <div class="body">
                        <a href="/invoices/invoices-report-item?{{ isset($_SERVER['QUERY_STRING']) ? $_SERVER['QUERY_STRING'] : '' }}" class="btn bg-light-blue waves-effect" style="margin-bottom:20px;"><i class="material-icons">print</i><span>PRINT REPORT</span></a>
                        <div class="table-responsive">
                            <table id="invoices" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <!-- <th>Date</th> -->
                                        <th>Code</th>
                                        <th>Category</th>
                                        <th>Grade</th>
                                        <th>Brand</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php 
                                        $grand_total_all = 0; 
                                        $grand_total_price = 0; 
                                        $total_row = 0;
                                    @endphp
                                    @foreach($invoices as $key => $invoice_payment)
                                    <tr>
                                        <th colspan="8">{{$invoice_payment->payment_method}}</th>
                                    </tr>
                                        @php 
                                            $total_all = 0; 
                                            $total_price = 0; 
                                            $total_sub_row = 0;
                                        @endphp
                                        @foreach($invoice_payment->invoices_by_payment_method as $key => $invoices_parent)
                                            @foreach($invoices_parent->items as $key => $invoice)
                                                <?php 
                                                    if (@$invoice->invoice->type == 'reseller') {
                                                        @$price = $invoice->reseller_price;
                                                    } else {
                                                        @$price = $invoice->price;
                                                    }

                                                    @$subtotal = $price - ($invoice->price*$invoice->invoice->discount/100);
                                                ?>
                                                <tr>
                                                    <td>{{@$total_sub_row+1}}</td>
                                                    <!-- <td>{{@date('d-m-Y', strtotime($invoice->updated_at))}}</td> -->
                                                    <td>{{@$invoice->code}}</td>
                                                    <td>{{@$invoice->category->name}}</td>
                                                    <td>{{@$invoice->grade->name}}</td>
                                                    <td>{{@$invoice->brand->name}}</td>
                                                    <td>{{@'Rp '.number_format($price,'0','.','.')}}</td>
                                                    <td>{{@$invoice->invoice->discount.'%'}}</td>
                                                    <td>{{@'Rp '.number_format($subtotal,'0','.','.')}}</td>
                                                </tr>
                                                @php 
                                                    @$total_price += $price;
                                                    @$total_all += $subtotal;
                                                    @$total_sub_row++;
                                                    @$total_row++;
                                                @endphp
                                            @endforeach
                                        @endforeach
                                        <tr>
                                            <td colspan="2">Total</td>
                                            <td colspan="3">{{$total_sub_row}}</td>
                                            <td>{{ 'Rp '.number_format($total_price,'0','.','.') }}</td>
                                            <td></td>
                                            <td>{{ 'Rp '.number_format($total_all,'0','.','.') }}</td>
                                        </tr>
                                        @php 
                                            @$grand_total_all += $total_all;
                                            @$grand_total_price += $total_price;
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="2">Grand Total</td>
                                        <td colspan="3">{{ @$total_row }}</td>
                                        <td>{{ 'Rp '.number_format($grand_total_price,'0','.','.') }}</td>
                                        <td></td>
                                        <td>{{ 'Rp '.number_format($grand_total_all,'0','.','.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="{{isset($_GET['category']) ? 'hide' : ''}}" style="padding-bottom:15px; padding-left:15px; padding-right:15px;">
                    <div class="alert alert-info">
                        <strong>Info!</strong> Please Choose Filter for generate Report
                    </div>
                </div>
            </div>
        </div>
    </div>        
@endsection