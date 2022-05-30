

    <div class="row">
        <div class="col-lg-12" style="margin-bottom:15px;margin-top:15px;">
            	@foreach($qr_codes as $key => $qr_code)
                    <span style="margin:15px;margin-bottom:15px;margin-top:15px;display:inline-block;">
               		   {!! QrCode::size(80)->generate($qr_code['qr_code']); !!}
                    </span>
               	@endforeach
        </div>
    </div>




    <script>
        window.print();    
    </script>

