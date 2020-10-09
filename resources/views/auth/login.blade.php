@extends('layout.basic')

@section('content')

<div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" >
            <div class="login-form text-center p-7 position-relative overflow-hidden">
                <!--end::Login Header-->
                <!--begin::Login Sign in form-->
                <div class="login-signin">
                    <div class="mb-10">
                        <h3>Sign In To Admin</h3>
                        <div class="text-muted font-weight-bold">Enter your details to login to your account:</div>
                    </div>
                    <form method="POST" class="form" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group mb-5">
                            <input id="email" type="email" class="form-control h-auto form-control-solid py-4 px-8 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="E-mail">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group mb-5">
                            <input id="password" type="password" class="form-control h-auto form-control-solid py-4 px-8 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                            <div class="checkbox-inline">
                                <label class="checkbox m-0 text-muted">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span></span>Remember me</label>
                            </div>
                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                        </div>
                        <button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Sign In</button>
                        <div class="mt-10">
                            <span class="opacity-70 mr-4">Don't have an account yet?</span>
                            <a href="javascript:;" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Sign Up!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
