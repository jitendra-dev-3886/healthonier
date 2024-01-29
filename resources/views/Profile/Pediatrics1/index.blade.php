@extends('Profile.Pediatrics.header')
@section('content')


<div class="boxed_wrapper">

    <!-- preloader -->
    {{-- <div class="preloader"></div> --}}
    <!-- preloader -->


    <!-- main header -->
    @include('Profile.Pediatrics.nav')
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    @include('Profile.Pediatrics.mobilenav')
    <!-- End Mobile Menu -->

    <!-- banner-section -->
    @include('Profile.Pediatrics.banner')
    <!-- banner-section end -->

    <!-- about-section -->
    @include('Profile.Pediatrics.about')
    <!-- about-section end -->

    <!-- Appointment-section -->
    @include('Profile.Pediatrics.appoitnment')
    <!-- Appointment-section end -->

    <!-- process-section -->
    @include('Profile.Pediatrics.process')
    <!-- process-section end -->


    <!-- working-hours-section -->
    @include('Profile.Pediatrics.working')
    <!-- working-hours-section end -->


    <!-- testimonial-section -->
    @include('Profile.Pediatrics.testimonials')
    <!-- testimonial-section end -->

    {{-- contact --}}
    @include('Profile.Pediatrics.contact')
    @endsection
