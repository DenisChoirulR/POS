@extends('layouts.app_login')

@section('content')

<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);"><b>Ngadi-Ngadi Store</b></a>
    </div>
    <div class="card">
        <div class="body">
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="msg">Sign In</div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">mail_outline</i>
                    </span>
                    <div class="form-line">
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <!-- <input type="checkbox" name="remember" id="remember" class="filled-in chk-col-blue" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember Me</label> -->
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-light-blue waves-effect" type="submit">SIGN IN</button>
                    </div>
                    <div class="col-xs-4">
                        <!-- <input type="checkbox" name="remember" id="remember" class="filled-in chk-col-blue" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember">Remember Me</label> -->
                    </div>
                </div>
                <!-- <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a href="#"></a>
                    </div>
                    <div class="col-xs-6 align-right">
                        <a href="{{ route('password.request') }}">Forgot Password?</a>
                    </div>
                </div> -->
            </form>
        </div>
    </div>
</div>
@endsection
