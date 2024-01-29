@extends('auth.Login.header')

@section('content')
<style>
  body {
        background-size: cover;
    background-image:url({{ asset('assests/img/login.jpg')}});
    
}
    .logo img {
        max-height: 78px;
        margin-right: 6px;
    }

</style>
<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
                   
                    <div class="card mb-3">

                        <div class="card-body">
  <div class="d-flex justify-content-center py-4">
                        <a href="#" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('assests/img/logo/logo.png')}} " class="" alt="">
                        </a>
                    </div><!-- End Logo -->
                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Reset Your Password</h5>
                                {{-- <p class="text-center small">Enter your username & password to login</p> --}}
                            </div>

                            <form class="row g-3 needs-validation" method="POST" action="{{ route('password.update') }}" novalidate>
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">

                                <div class="col-12">
                                    <label for="yourUsername" class="form-label">Email</label>
                                    <div class="input-group has-validation">
                                        {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        {{-- <input type="text" name="username" class="form-control" id="yourUsername" required> --}}
                                        <div class="invalid-feedback">Please enter your email.</div>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- <input type="password" name="password" class="form-control" id="yourPassword" required> --}}
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>
                                <div class="col-12">
                                    <label for="yourPassword" class="form-label">Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    {{-- <input type="password" name="password" class="form-control" id="yourPassword" required> --}}
                                    <div class="invalid-feedback">Please enter your password!</div>
                                </div>

                                <div class="col-12">

                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>


                                <div class="col-12">
                                    {{-- <p class="small mb-0">Don't have account? <a href="{{ route('register') }}">Create an account</a></p> --}}
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>

</div>
@endsection
