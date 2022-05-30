<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  {{--<title>Ngadi-ngadi Store</title>--}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style type="text/css">
    @page {
      margin: 90px 25px;
    }

    header {
      position: relative;
      top: -70px;
      left: 100px;
      right: -20px;
      height: -25px;
    }
    main {
      position: relative;
      top: 50px
    }

    footer {
      position: fixed; 
      bottom: -60px; 
      left: 0px; 
      right: 0px;
      height: 50px; 
    }

    body {
        font-size: 14px;
    }

    .table tr td,
    .table tr th {
      padding: 1px !important;
    }

    .table {
      width: 100%;

    }

    .table tr th {
      font-size: 14px;
    }

    .table-bottom {
      font-size: 16px;
    }

    .table-bottom tr td {
      padding: 1px;
    }

    .table-detail-bottom tr td {
      border: 2px solid transparent;
    }
  </style>

</head>
<body style="max-width: 100%;padding: 0">
  <header>
    <table class="table table-detail-bottom" style="text-align: left;">
      <tr>
        {{--<td style="height: 1%"><center>
          <strong style="font-size: 12px;">Ngadi-ngadi Store</strong>
          </center>
        </td>
        <td rowspan="5" style="width: 18%;vertical-align: middle;" >
          <img src="{{ public_path('images/kooc_logo.jpg') }}" alt="" width="90">
        </td>--}}
      </tr>
      {{--<tr>
        <td style="height: 1%"><center>
          <strong style="font-size: 10px">Home Decoration and Furnitures</strong>
        </td></center>
      </tr>
      <tr>
        <td style="height: 1%"><center>
          <small style="font-size: 7">JL. IMOGIRI BARAT KM.5 NO.4, YOGYAKARTA, INDONESIA 55187</small>
        </td></center>
      </tr>
      <tr>
        <td style="height: 1%"><center>
          <small style="font-size: 7">Phone (+62)274 - 370300, 445530, Fax (+62)274 - 370300</small>
        </td></center>
      </tr>
      <tr>
        <td style="height: 1%"><center>
          <small style="font-size: 7">website: www.kleointerior.com | email: marketing.ptkoockreasi@gmail.com</small>
        </td></center>
      </tr>--}}
    </table>
  </header>

  {{--<footer>
    <table class="table table-detail-bottom">
      <tr>
        <td style="width: 10%;vertical-align: middle">
          <img src="{{ public_path('images/kooc_logo5.png') }}" alt="" width="60">
        </td>
        <td style="vertical-align: middle">
          <img src="{{ public_path('images/kooc_logo6.png') }}" alt="" width="60">
        </td>
      </tr>
    </table>
  </footer>--}}

  <main>
      <div class="row">
          <div class="col-lg-12">
            {{--<table class="table table-middle-left table-bordered">
              <thead>
              <tr>
                <th style="text-align: center;" colspan="30"></th>
              </tr>
              </thead>
              <tbody>
              <tr>
                <td width="19%">CONSIGNE</td>
                <td width="1%" align="center">:</td>
                <td width="35%" colspan="16" ></td>
              
                <td width="10%" rowspan="2" colspan="4">PROFORMA INVOICE NO</td>
                <td width="1%" rowspan="2">:</td>
                <td width="10%" rowspan="2" colspan="7"></td>
              </tr>
              <tr width="100%">
                <td width="19%" colspan="1">ADDRESS</td>
                <td width="1%" align="center">:</td>
                <td width="10%" colspan="20"></td>
              </tr>
              <tr>
                <td width="19%">COUNTRY</td>
                <td width="1%" align="center">:</td>
                <td width="30%" colspan="16"></td>
                 
                <td width="19%" colspan="4">ORDER DATE</td>
                <td width="1%">:</td>
                <td width="10%" colspan="7"></td>
              </tr>
              <tr>
                <td width="19%">PHONE/ FAX</td>
                <td width="1%" align="center">:</td>
                <td width="30%" colspan="16"></td>
                 
                <td width="19%" colspan="4">PO NUMBER</td>
                <td width="1%">:</td>
                <td width="10%" colspan="7"></td>
              </tr>
              <tr>
                <td width="19%">EMAIL</td>
                <td width="1%" align="center">:</td>
                <td width="30%" colspan="16"></td>
                
                <td width="19%" colspan="4">EST DATE OF STUFFING</td>
                <td width="1%">:</td>
                <td width="10%" colspan="7"></td>
              </tr>
              <tr>
                <td width="19%">CONTACT PERSON</td>
                <td width="1%" align="center">:</td>
                <td width="30%" colspan="16"></td>
                 
                <td width="19%" colspan="4">FEEDER</td>
                <td width="1%">:</td>
                <td width="10%" colspan="7"></td>
              </tr>
              <tr>
                <td width="19%">CONTAINER NO.</td>
                <td width="1%" align="center">:</td>
                <td width="30%" colspan="16"></td>
               
                <td width="19%" colspan="4">CONNECTING</td>
                <td width="1%">:</td>
                <td width="10%" colspan="7"></td>
              </tr>
              <tr>
                <td width="19%">SEAL NO.</td>
                <td width="1%" align="center">:</td>
                <td width="30%" colspan="16"></td>
                
                <td width="19%" colspan="4">ETA.</td>
                <td width="1%">:</td>
                <td width="10%" colspan="7"></td>
              </tr>
              </tbody>
            </table>--}}
            <center><h3>Report Invoices Ngadi-ngadi Store</h3></center>
            <center><p style="font-size:14px;"><strong>{{date('d F Y', strtotime($_GET['start_date']))}} - {{date('d F Y', strtotime($_GET['end_date']))}}</strong></p></center>
            <table class="table table-simetris table-bordered">
              <thead style="text-align: center;">
                  <tr>
                    <th rowspan="2" class="rotate">
                      <div><span> NO </span></div>
                    </th>
                    <th rowspan="2" class="rotate">
                      <div><span> Tanggal </span></div>
                    </th>
                    <th rowspan="2" class="rotate">
                      <div><span> Nama Customer </span></div>
                    </th>
                    <th rowspan="2" class="rotate">
                      <div><span> No. Telp </span></div>
                    </th>
                    <th rowspan="2" class="rotate">
                      <div><span> Type </span></div>
                    </th>
                    <th rowspan="2" class="rotate">
                      <div><span> Metode Pembayaran </span></div>
                    </th>
                    <th rowspan="2" class="rotate">
                      <div><span> Total Item </span></div>
                    </th>
                    <th rowspan="2" class="rotate">
                      <div><span> Harga Total </span></div>
                    </th>
                    <th rowspan="2" class="rotate">
                      <div><span> Diskon </span></div>
                    </th>
                    <th rowspan="2" class="rotate">
                      <div><span> Redemption Point </span></div>
                    </th>
                    <th rowspan="2" class="rotate">
                      <div><span> Total Pembelanjaan </span></div>
                    </th>
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
                      <td>{{ 'Rp '.number_format($grand_price_total) }}</td>
                      <td></td>
                      <td></td>
                      <td>{{ 'Rp '.number_format($grand_total) }}</td>
                  </tr>
              </tbody>
            </table>
          </div>
        </div>
  </main>

  <script type="text/javascript">
      window.print();
  </script>
</body>

</html>