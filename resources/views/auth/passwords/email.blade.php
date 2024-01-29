@extends('auth.Login.header')

@section('content')
<style>
    .logo img {
        max-height: 78px;
        margin-right: 6px;
    }
body {
        background-size: cover;
    background-image:url({{ asset('assests/img/login.jpg')}});
    
}
</style>
<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="#" class="logo d-flex align-items-center w-auto">
                            <img src="{{ asset('assests/img/logo/logo.png')}} " class="" alt="">
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <h5 class="card-title text-center pb-0">  Forgot Password </h5>
                                
                    

                            @if(session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                                {{-- <p class="text-center small">Enter your username & password to login</p> --}}
                            </div>

                            <form class="row g-3 needs-validation" method="POST" action="{{ route('password.email') }}" novalidate>
                                @csrf

                                <div class="col-md-12">
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

                                <div class="col-md-12">
                                <button type="submit" class="btn btn-theme w-100">
                                    {{ __('Submit') }}
                                </button>
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
