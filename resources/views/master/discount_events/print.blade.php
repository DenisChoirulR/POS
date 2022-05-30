

    <div class="row">
        <div class="col-lg-12" style="margin-bottom:15px;margin-top:15px;">
                <div style="margin:15px;margin-bottom:15px;margin-top:15px;display:inline-block;">
                    <center>
                        <span>
               		       {!! QrCode::size(400)->generate(url('/').'/scan-me/'.$discount_event['code']) !!}
                        </span>
                        <h2>scan me for get discount</h2>
                    </center>
                    <br>
                    <!-- <center>{{$discount_event['name']}}</center> -->
                </div>
        </div>
    </div>




    <script>
        window.print();    
    </script>

