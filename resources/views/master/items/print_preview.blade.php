

    <div class="row">
        <div class="col-lg-12" style="margin-bottom:15px;margin-top:15px;">
            	@foreach($qr_codes as $key => $qr_code)
                    <div style="margin:15px;margin-bottom:15px;margin-top:15px;display:inline-block;">
                        <span>
                   		   {!! QrCode::size(80)->generate($qr_code['code']); !!}
                        </span>
                        <br>
                        <center>{{$qr_code->item->code}}</center>
                        <center><span style="font-size: 10px">Rp {{number_format($qr_code->item->price,0,'.','.')}}</span></center>
                    </div>
                    
               	@endforeach
        </div>
    </div>




    <script>
        window.print();    
    </script>

