@extends('layouts.web.auth')

@section('title')

@endsection

@section('content')
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Login box.scss -->
<!-- ============================================================== -->
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center"
    style="background:url(assets/adminbite/assets/images/big/auth-bg.jpg) no-repeat center center;">
    <div class="auth-box">
        <div id="loginform">

            <div class="logo">
                <span class="db">
                    <img src="../../assets/images/logo-icon.png" alt="logo" />
                </span>
                <h5 class="font-medium m-b-20">Sign In to Admin</h5>
            </div>
            <!-- Form -->

            <div class="row">
                <div class="col-12">

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                            </div>
                            <input type="email" name="email" id="email" placeholder="Email" aria-label="Email"
                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                aria-describedby="basic-addon1" value="{{ old('email') }}">

                            @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                            </div>
                            <input type="password" name="password" id="password" placeholder="Password"
                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                aria-label="Password" aria-describedby="basic-addon1">

                            @error('password')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    <a href="javascript:void(0)" id="to-recover" class="text-dark float-right">
                                        <i class="fa fa-lock m-r-5"></i> Forgot pwd?
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                            <div class="social">
                                <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title=""
                                    data-original-title="Login with Facebook">
                                    <i aria-hidden="true" class="fab  fa-facebook"></i>
                                </a>
                                <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title=""
                                    data-original-title="Login with Google">
                                    <i aria-hidden="true" class="fab  fa-google-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="form-group m-b-0 m-t-10">
                        <div class="col-sm-12 text-center">
                            Don't have an account?
                            <a href="{{ route('register') }}" class="text-info m-l-5">
                                <b>Sign Up</b>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection