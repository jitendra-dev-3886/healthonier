@extends('Profile.Eyecare.header')
@section('content')
{{-- <div class="preloader js-preloader">
    <div class="loader loader-inner-1">
        <div class="loader loader-inner-2">
            <div class="loader loader-inner-3">
            </div>
        </div>
    </div>
</div> --}}

<div class="page-wrapper">
    <!-- main header -->
    @include('Profile.Eyecare.nav')
    <!-- main-header end -->
    <!-- banner -->
    @include('Profile.Eyecare.banner')
    <!-- banner -->
    <!-- about -->
    @include('Profile.Eyecare.about')
    <!-- about -->
    <!-- process -->
    @include('Profile.Dentiest.process')
    <!-- process -->
    <!-- working -->
    @include('Profile.Eyecare.working')
    <!-- working -->

    <!-- working -->
    @include('Profile.Eyecare.testimonial')
    <!-- working -->
    <!-- working -->
    @include('Profile.Eyecare.contact')
    <!-- working -->
    <!-- working -->
    @include('Profile.Eyecare.footer')
    <!-- working -->


</div>
@endsection
