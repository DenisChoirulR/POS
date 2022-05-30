@extends('layouts.app_home')

@section('content')
 
<form action="{{route('cashier.store')}}" method="post">
    @csrf
    <div class="container-fluid">
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Customer Information
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Transaction Type</label>
                                        <select name="is_reseller" class="form-control show-tick">
                                            <option value="">-- select --</option>
                                            <option value="0">Regular</option>
                                            <option value="1">Reseller</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>New Customer?</label>
                                        <select name="is_new" class="form-control show-tick">
                                            <option value="">-- select --</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="old_customer" class="row clearfix hide">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Search Customer
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <!-- <label>S Customer</label> -->
                                        <!-- <select id="customer_id" name="customer_id" class="form-control show-tick">
                                            <option value="" selected>-- select --</option>
                                            @foreach($customers as $key => $customer)
                                                <option value="{{$customer->id}}">{{$customer->name}} | {{$customer->phone_number}} | {{$customer->email}}</option>
                                            @endforeach
                                        </select> -->
                                        <input type="text" placeholder="Name" name="customer_search" class="form-control" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="" id="customer_result">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <div class="row clearfix hide" id="new_customer">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            New Customer
                        </h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" placeholder="Name" name="name" class="form-control" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" placeholder="Phone Number" name="phone_number" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" placeholder="Email" name="email" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="hide" id="cart">
            <div class="row">
              <div class="col-lg-12">
                <div class="row clearfix">
                  <div class="col-sm-3"></div>
                    <center>
                      <video id="preview" class="col-sm-6 col-xs-12" style="margin-bottom:35px;"></video>
                    </center>  
                  <div class="col-sm-3"></div>
                </div>
              </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Shopping Items
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                              <div class="table-responsive">  
                                <table class="table table-bordered" id="dynamic_field">
                                  <!-- <tr>  
                                      <td><input type="text" name="name[]" class="form-control name_list" /></td>  
                                      <td><input type="text" name="price[]" class="form-control" /></td>  
                                      <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                  </tr> -->  
                                </table>  
                              </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <label>Payment Method</label>
                                        <select name="payment_method" class="form-control show-tick">
                                            <option value="">-- select --</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Debit">Debit</option>
                                            <option value="OVO">OVO</option>
                                            <option value="Shopee Pay">Shopee Pay</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Discount</label>
                                    <div class="form-line">
                                        <select name="discount" class="form-control show-tick">
                                            <option value="0">-- select --</option>
                                            <option value="5">5%</option>
                                            <option value="10">10%</option>
                                            <option value="15">15%</option>
                                            <option value="20">20%</option>
                                            <option value="25">25%</option>
                                            <option value="30">30%</option>
                                            <option value="35">35%</option>
                                            <option value="40">40%</option>
                                            <option value="45">45%</option>
                                            <option value="50">50%</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" value="0" min=0 max=0 onkeyup=imposeMinMax(this) placeholder="Point" name="point" class="form-control" class="form-control"/>
                                       <!--  <input type=number > -->
                                    </div>
                                    <br>
                                    <br>
                                    Usable Point : <span id="usable_point">0</span>
                                </div>   
                            </div>              
                            <input type="submit" name="submit" id="submit" class="btn bg-light-green waves-effect" value="Submit" />  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(function(){      
    var i=1;

    //$('#customer_id').select2();
  });  

  let scanner = new Instascan.Scanner({ video: document.getElementById('preview'),mirror: false });
  scanner.addListener('scan', function (content, i) {
    //alert(content);
    var is_reseller = $('select[name=is_reseller]').val();
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $.ajax({
      url: "{{ route('item.get') }}",
      type: "POST",
      data: {
        "_token": "{{ csrf_token() }}",
        "code" : content,
      },
      dataType: "json",
      success: function(data) {
        let items = $('.items');
        let exist = false;
        for(var a = 0; a < items.length; a++)
        {
            if (data.id == items[a].value) {
                console.log(a);
                exist = true;
            }
        }

        if (exist == true) {
            alert('item sudah berhasil ditambahkan');
        } else {
            i++;

            if (is_reseller == 1) {
                var price = data.reseller_price;
            } else {
                var price = data.price;
            }
            $('select[name=is_reseller]').attr("readonly", true);
            var number_string = price.toString(),
              sisa  = number_string.length % 3,
              rupiah  = number_string.substr(0, sisa),
              ribuan  = number_string.substr(sisa).match(/\d{3}/g);
                
            if (ribuan) {
              separator = sisa ? '.' : '';
              rupiah += separator + ribuan.join('.');
            }

            // Cetak hasil
            let idr_price = rupiah; // Hasil: 23.456.789  

            $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td><input type="hidden" class="items" value="'+data.id+'" name="item_id[]" /><input type="text" disabled value="'+data.category.name+' -  '+data.brand.name+'" class="form-control" /></td><td><input type="text" disabled value="Size '+data.size+'" class="form-control"/></td><td><input type="text" disabled value="Rp. '+idr_price+'" class="form-control"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
            alert('item berhasil ditambahkan'); 
        }
      },
      error: function(data) {
        //console.log(data);
        alert('item tidak ditemukan');
      }
    })
  });
  Instascan.Camera.getCameras().then(function (cameras) {
    if (cameras.length > 0) {
      scanner.start(cameras[1]);
    } else {
      console.error('No cameras found.');
    }
  }).catch(function (e) {
    console.error(e);
  });
</script>
<script type="text/javascript"> 
  $(document).ready(function() {
    $('select[name=is_new]').on('change', function(){
        if ($('select[name=is_new]').val() == 1) {
            $('#new_customer').removeClass('hide');
            $('#old_customer').addClass('hide');
            $('#cart').removeClass('hide'); 
        } else if ($('select[name=is_new]').val() == 0) {
            $('#new_customer').addClass('hide');
            $('#old_customer').removeClass('hide');
            $('#cart').removeClass('hide'); 
        } else {
            $('#new_customer').addClass('hide');
            $('#old_customer').addClass('hide');
            $('#cart').addClass('hide'); 
        }     
    })

    $(document).on('click', '.btn_remove', function(){  
       var button_id = $(this).attr("id");   
       $('#row'+button_id+'').remove();  
    });
  });
</script>

<script type="text/javascript"> 
  $(document).ready(function() {

    //$(".customer_id").change(function() {
    $('.buttoncus').on('click', '.customer_id', function() {
        console.log(1);
    });

    $('input[name=customer_search]').on('change', function(){
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{ route('customer.get') }}",
          type: "POST",
          data: {
            "_token": "{{ csrf_token() }}",
            "customer_search" : $(this).val(),
          },
          dataType: "json",
          success: function(data) {
            //console.log(data);
            $('#customer_result').empty();

            for(var i=0; i< data.length; i++)
            {
                $('#customer_result').append('<input name="customer_id" type="radio" id="item'+i+'" value"1"><label onClick="getPoint('+data[i].point+')"" for="item'+i+'">'+data[i].name+' - '+data[i].email+' - '+data[i].phone_number+'</label><br>');
                $('#item'+i).val(data[i].id);
            }

            if (data.length < 1) {
                alert('customer tidak ditemukan');
            }

          },
          error: function(data) {
            //console.log(data);
            alert('customer tidak ditemukan');
          }
        })  
    })
  });
</script>

<script type="text/javascript">
    function getPoint(point) {
        console.log(point);
        $("input[name=point]").attr({
           "max" : point,        // substitute your own
           "min" : 0          // values (or variables) here
        });

        $("#usable_point").text(point);
    }

    function imposeMinMax(el){
      if(el.value != ""){
        if(parseInt(el.value) < parseInt(el.min)){
          el.value = el.min;
        }
        if(parseInt(el.value) > parseInt(el.max)){
          el.value = el.max;
        }
      }
    }
</script>

@endpush
