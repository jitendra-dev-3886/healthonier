@extends('Profile.Pediatrics.header')
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
    @include('Profile.Pediatrics.nav')
    <!-- main-header end -->
    <!-- banner -->
    @include('Profile.Pediatrics.banner')
    <!-- banner -->
    <!-- about -->
    @include('Profile.Pediatrics.about')
    <!-- about -->
    <!-- process -->
    @include('Profile.Dentiest.process')
    <!-- process -->
    <!-- working -->
    @include('Profile.Pediatrics.working')
    <!-- working -->

    <!-- working -->
    @include('Profile.Pediatrics.testimonial')
    <!-- working -->
    <!-- working -->
    @include('Profile.Pediatrics.contact')
    <!-- working -->
    <!-- working -->
    @include('Profile.Pediatrics.footer')
    <!-- working -->


</div>
@endsection
