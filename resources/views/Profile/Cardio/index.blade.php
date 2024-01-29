@extends('Profile.Cardio.header')
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
    @include('Profile.Cardio.nav')
    <!-- main-header end -->
    <!-- banner -->
    @include('Profile.Cardio.banner')
    <!-- banner -->
    <!-- about -->
    @include('Profile.Cardio.about')
    <!-- about -->
    <!-- process -->
    @include('Profile.Dentiest.process')
    <!-- process -->
    <!-- working -->
    @include('Profile.Cardio.working')
    <!-- working -->

    <!-- working -->
    @include('Profile.Cardio.testimonial')
    <!-- working -->
    <!-- working -->
    @include('Profile.Cardio.contact')
    <!-- working -->
    <!-- working -->
    @include('Profile.Cardio.footer')
    <!-- working -->


</div>
@endsection
