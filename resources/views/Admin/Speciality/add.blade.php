@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h3>Add Doctor Department</h3>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form class="row g-3" action="{{ route('submit.speciality') }}" method="POST" id="adddoctor">
                        @csrf
                        @if(session('success'))
                        <div class="alert alert-success" id="success-message">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if($errors->any())
                        <div class="alert alert-danger" id="error-message">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <div class="form-group">
                            <label for="Speciality" class="form-label">Speciality</label>
                            <input name="speciality" type="text" class="form-control" id="Speciality" required>
                        </div>
                        @foreach($theme as $theme)

                        <div class="col-md-3 theme_previeww">
                            <label>
                                <input type="radio" name="theme" value="{{$theme->id}}">
                                <br>
                                {{-- <div class="theme_previeww"> --}}
                                <img src="@if($theme->thumb_path != ''){{ asset($theme->thumb_path) }}@else{{ asset('assets/img/') }}@endif" class="img-fluid theme_thumb" alt="">
                                <div class="theme_pre">
                                    <img src="@if($theme->image_path != ''){{ asset($theme->image_path) }}@else{{ asset('assets/img/') }}@endif" class="img-fluid" alt="...">
                                    {{-- <img src="assets/img/childcare.png" class="img-fluid" alt=""> --}}
                                </div>
                                <div class="subheading">
                                    <p>{{$theme->theme_name}}</p>
                                </div>
                                {{-- </div> --}}
                                <label>
                        </div>
                        @endforeach
                        <div class="text-center">
                            <button type="submit" class="btn btn-theme">Submit</button>
                            <button type="reset" class="btn theme-btn-three">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>









@endsection
