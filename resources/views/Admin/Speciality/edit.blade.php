@extends('layouts.admin')
@section('content')
<div class="pagetitle">
    <h3>Edit Doctor Department </h3>
</div>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <form class="row g-3" action="{{ route('update.speciality', $speciality->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="speciality" id="name" value="{{ $speciality->name }}" class="form-control" required>
                        </div>
                        @foreach($theme as $theme)

                        <div class="col-md-3 theme_previeww">
                            <label>
                                <input type="radio" name="theme" value="{{$theme->id}}" @if(isset($speciality['theme_id']) && $speciality['theme_id']==$theme->id) checked @endif>
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
                            <button type="submit" class="btn btn-theme">Update</button>
                        </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>









@endsection
