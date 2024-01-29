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

                <div class="col-lg-5 col-md-6 flex-column align-items-center justify-content-center">
 
                    <div class="card mb-3"> 
                        <div class="card-body"> 

                            <div class="pt-4 pb-2">
                    <div class="d-flex justify-content-center py-4">

                        <a href="#" class="logo d-flex align-items-center w-auto">

                            <img src="{{ asset('assests/img/logo/logo.png')}} " class="" alt="">

                        </a>

                    </div><!-- End Logo -->
 
                            </div>
                            @if(session('error'))

                            <div class="alert alert-danger">

                                {{ session('error') }}

                            </div>

                            @endif



                            <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}" novalidate>

                                @csrf



                                <div class="col-12">

                                    <label for="yourUsername" class="form-label">Email</label>

                                    <div class="input-group has-validation">

                                        {{-- <span class="input-group-text" id="inputGroupPrepend">@</span> --}}

                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>



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

                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">



                                    @error('password')

                                    <span class="invalid-feedback" role="alert">

                                        <strong>{{ $message }}</strong>

                                    </span>

                                    @enderror

                                    {{-- <input type="password" name="password" class="form-control" id="yourPassword" required> --}}

                                    <div class="invalid-feedback">Please enter your password!</div>

                                </div>



                                <div class="col-12">

                                    <div class="form-check">

                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        {{-- <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe"> --}}

                                        <label class="form-check-label" for="remember">Remember me</label>

                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <button class="btn btn-theme w-100" type="submit">Login</button>

                                </div>

                                @if (Route::has('password.request'))

                                <a class="btn btn-link" href="{{ route('password.request') }}">

                                    {{ __('Forgot Your Password?') }}

                                </a>

                                @endif

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
