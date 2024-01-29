@extends('Profile.Physiotherapis.header')
@section('content')

    <!-- main header -->
    @include('Profile.Physiotherapis.nav')
    <!-- main-header end -->

    <!-- banner-section -->
    @include('Profile.Physiotherapis.banner')
    <!-- banner-section end -->

    <!-- about-section -->
    @include('Profile.Physiotherapis.about')
    <!-- about-section end -->


    <!-- process-section -->
   @include('Profile.Dentiest.process')
    <!-- process-section end -->


    <!-- working-hours-section -->
    @include('Profile.Physiotherapis.working')
    <!-- working-hours-section end -->


    <!-- testimonial-section -->
    @include('Profile.Physiotherapis.testimonial')
    <!-- testimonial-section end -->

    {{-- contact --}}
    @include('Profile.Physiotherapis.contact')
    @include('Profile.Physiotherapis.footer')
    @endsection  
