@extends('layouts.app_master')

@section('content')
    <div class="container-fluid">
        <!-- Input -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            {{ isset($user->id) ? "Edit" : "Create" }} User Data
                            <small>Please make sure to enter a valid data!</small>
                        </h2>
                    </div>
                    <form method="post" action="{{ isset($user->id) ? route('users.update',$user->id) : route('users.store') }}" accept-charset="UTF-8">
                    	@csrf
                        @method( isset($user->id) ? 'PUT' : 'POST' )
	                    <div class="body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                    @foreach ($errors->all() as $error)
                                        @if($error == 'The email field is required.')
                                            <li>The username field is required.</li>
                                        @elseif($error == 'The email has already been taken.')
                                            <li>The username has already been taken.</li>
                                        @else
                                            <li>{{ $error }}</li>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
	                        <div class="row clearfix">
	                            <div class="col-sm-12">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="email" class="form-control" value="{{ isset($user->email) ? $user->email : '' }}" placeholder="Username"/>
	                                    </div>
	                                </div>
	                            </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" name="name" class="form-control" value="{{ isset($user->name) ? $user->name : '' }}" placeholder="Name"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <label>Role</label>
                                            <select name="role_id" class="form-control show-tick">
                                                <option value="" selected>-- Select Role --</option>
                                                @foreach($roles as $key => $role)
                                                    <option value="{{$role->id}}" {{isset($user->role_id) ? $user->role_id == $role->id ? 'selected' : '' : ''}}>{{$role->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                @if(!isset($user))
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="password" class="form-control" value="" placeholder="Password"/>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <div>
                                        @if(isset($user->is_active))
                                            <input name="is_active" type="checkbox" value="1" id="md_checkbox1" class="filled-in chk-col-cyan" {{$user->is_active == 1 ? 'checked' : ''}}>
                                            <label for="md_checkbox1">Active</label>
                                        @else
                                            <input name="is_active" type="checkbox" value="1" id="md_checkbox1" class="filled-in chk-col-cyan">
                                            <label for="md_checkbox1">Active</label>
                                        @endif
                                        </div>
                                    </div>
                                </div>
	                        </div>
                   		<button type="submit" class="btn bg-light-green waves-effect"> Simpan </button>
	                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection