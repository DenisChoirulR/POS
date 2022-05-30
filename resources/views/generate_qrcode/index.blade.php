@extends('layouts.app_home')

@section('content')

<div class="row">
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
    <div class="card">
        <div class="body">
          <form action="{{route('qrcode.print')}}" method="GET" target="_blank">
              <input type="number" name="qty" class="form-control" placeholder="Number of Prints">
              <center>
                <button onclick="history.go(-1);event.preventDefault();submit()" class="btn bg-amber waves-effect waves-float" style="margin-top:20px;"><i class="material-icons">print</i> Print</button>
              </center>
          </form>
        </div>
    </div>
  </div>
  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
  </div>
</div>
  

@endsection

@push('scripts')
<script type="text/javascript">

  function myFunction() {
    $("form").attr('target', '_blank');
    $("form").submit(function() {
    	return true;
    });
  };
</script>
@endpush