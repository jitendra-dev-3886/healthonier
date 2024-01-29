@extends('Profile.header')
@section('content')


<div class="boxed_wrapper">

    <!-- preloader -->
    {{-- <div class="preloader"></div> --}}
    <!-- preloader -->


    <!-- main header -->
    @include('Profile.nav')
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    @include('Profile.mobilenav')
    <!-- End Mobile Menu -->

    <!-- banner-section -->
    @include('Profile.banner')
    <!-- banner-section end -->

    <!-- about-section -->
    @include('Profile.about')
    <!-- about-section end -->

    <!-- Appointment-section -->
    @include('Profile.appoitnment')
    <!-- Appointment-section end -->

    <!-- process-section -->
    @include('Profile.process')
    <!-- process-section end -->


    <!-- working-hours-section -->
    @include('Profile.working')
    <!-- working-hours-section end -->


    <!-- testimonial-section -->
    @include('Profile.testimonials')
    <!-- testimonial-section end -->

    {{-- contact --}}
    @include('Profile.contact')
    @endsection
