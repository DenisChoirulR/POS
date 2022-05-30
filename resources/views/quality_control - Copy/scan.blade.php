@extends('layouts.app_home')

@section('content')
 
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    
<div class="row">
  <div class="col-lg-12">
    <div class="row clearfix">
      <div class="col-sm-3"></div>
        <center>
          <video id="preview" class="col-sm-6 col-xs-12"></video>
        </center>  
      <div class="col-sm-3"></div>
    </div>
    <div class="row clearfix" style="margin-top:25px;margin-bottom:25px;">
      <div class="col-sm-3"></div>
      <div class="col-sm-6">
        <center>
          <a href="{{route('qc.index')}}" class="btn bg-amber click-modal waves-effect" style="border-radius:2px;">
              <i class="material-icons">check_circle</i>
              <span>Selesai</span>
          </a>
        </center>  
      </div>
      <div class="col-sm-3"></div>
    </div>
  </div>
</div>

    <script type="text/javascript">
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview'),mirror: false });
      scanner.addListener('scan', function (content) {
        //alert(content);
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.ajax({
          url: "{{ route('item.check') }}",
          type: "POST",
          data: {
            "_token": "{{ csrf_token() }}",
            "code" : content
          },
          dataType: "json",
          success: function(data) {
            let code = data.code;
            var category = {!! json_encode($_GET['category']) !!};
            var grade = {!! json_encode($_GET['grade']) !!};
            var brand = {!! json_encode($_GET['brand']) !!};
            
            let url = "/quality-control/create-item?"+"category="+category+"&grade="+grade+"&brand="+brand+"&code="+code;
            //var url = "{{ route('qc.create', ['category' => '"+category"', 'grade' => '"+grade"', 'brand' => '"+brand"', 'code' => '"+code"']) }}";
            console.log(url);

            window.location.href=url;
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
   

@endsection

@push('scripts')

@endpush