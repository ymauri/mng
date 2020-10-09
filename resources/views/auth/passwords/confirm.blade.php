@auth
autenticado
    @extends('layout.default')
@endauth
@guest
invitado
    @extends('layout.basic')
@endguest

@section('content')
<div class="d-flex flex-column flex-root">
    <div class="login login-4 login-signin-on d-flex flex-row-fluid" id="kt_login">
        <div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" >
            <div class="login-form text-center p-7 position-relative overflow-hidden">
                <div class="login-signin">
                    <div class="mb-10">
                        <h3>{{ __('Confirm Password') }}</h3>
                        <div class="text-muted font-weight-bold">{{ __('Please confirm your password before continuing.') }}</div>

                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="form-group mb-5">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">
                                {{ __('Confirm Password') }}
                            </button>
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
