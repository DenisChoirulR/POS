@extends('layouts.app_master')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    {{--<div class="header">
                        <h2>
                            Discount Event Data
                        </h2>
                    </div>--}}
                    <div class="body">
                        <center style="margin-top:25px;margin-bottom:25px;">
                            {!! QrCode::generate(url('/').'/scan-me/'.$discount_event['code']) !!}
                        </center>
                        <a href="{{route('discount-events.edit',$discount_event->id)}}" class="btn bg-amber btn-circle waves-effect waves-circle waves-float" style="margin-bottom:15px;margin-top:15px;">
                            <i class="material-icons">mode_edit</i>
                        </a>
                        <a href="{{route('qrevent.print',$discount_event->id)}}" class="btn bg-blue btn-circle waves-effect waves-circle waves-float" style="margin-bottom:15px;margin-top:15px;">
                            <i class="material-icons">print</i>
                        </a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover col-sm-8">
                                <tbody>
                                    <tr>
                                        <th>Code</th>
                                        <td>{{$discount_event->code}}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th>
                                        <td>{{$discount_event->name}}</td>
                                    </tr>
                                    <tr>
                                        <th>Discount</th>
                                        <td>Rp {{number_format($discount_event->discount,0,'.','.')}}</td>
                                    </tr>
                                    <tr>
                                        <th>Date</th>
                                        <td>{{$discount_event->start_date}} - {{$discount_event->end_date}}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <td>{{$discount_event->phone_number}}</td>
                                    </tr>
                                    <tr>
                                        <th>Messages</th>
                                        <td>{{$discount_event->messages}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
        </div>
    </div>    
@endsection