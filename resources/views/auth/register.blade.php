@extends('layouts.web.auth')

@section('title')

@endsection

@section('content')
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
        <div>
            <div class="logo">
                <span class="db"><img src="../../assets/images/logo-icon.png" alt="logo" /></span>
                <h5 class="font-medium m-b-20">Sign Up to Admin</h5>
            </div>
            <!-- Form -->
            <div class="row">
                <div class="col-12">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-12 ">
                                <input class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    type="text" id="name" name="name" placeholder="Name" />

                                @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 ">
                                <input class="form-control form-control-lg @error('email') is-invalid @enderror"
                                    type="text" id="email" name="email" placeholder="Email" />

                                @error('email')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 ">
                                <input id="password" name=" password" type="password"
                                    class=" form-control form-control-lg @error('password') is-invalid @enderror"
                                    required autocomplete="new-password" placeholder="Password" />

                                @error('password')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12 ">
                                <input type="password" id="password_confirmation" name="password_confirmation"
                                    class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                    required autocomplete="new-password" placeholder="Re-Type Password" />

                                @error('password_confirmation')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group text-center ">
                            <div class="col-xs-12 p-b-20 ">
                                <button class="btn btn-block btn-lg btn-info " type="submit ">SIGN UP</button>
                            </div>
                        </div>

                        <div class="form-group m-b-0 m-t-10 ">
                            <div class="col-sm-12 text-center ">
                                Already have an account?
                                <a href="{{ route('login') }}" class="text-info m-l-5 ">
                                    <b>Sign In</b>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection