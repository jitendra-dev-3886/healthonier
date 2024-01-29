@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h3>Change Password </h3>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="p-4">
                    @extends('layouts.admin')
                    @section('content')
                    <div class="pagetitle">
                        {{-- <h3>Add Patient </h3> --}}
                    </div>
                    <section class="section">
                        <div class="row">
                            @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif

                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif


                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">{{ __('Change Password') }}</div>
                                    <div class="p-4">
                                        <form method="POST" action="{{ route('update.password') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="current_password" class="col-md-4 col-form-label text-md-right">{{ __('Current Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="current_password" type="password" class="form-control" name="current_password" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="new_password" type="password" class="form-control" name="new_password" required>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="new_password_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Confirm New Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation" required>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Change Password') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @endsection

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
