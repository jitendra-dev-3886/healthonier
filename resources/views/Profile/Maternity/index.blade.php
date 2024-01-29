@extends('Profile.Maternity.header')
@section('content')



<div class="page-wrapper">
  <!-- preloader -->
  <div class="preloader"></div>
  <!-- preloader -->
  @include('Profile.Maternity.nav')

  <!-- banner-section -->
  @include('Profile.Maternity.banner')
  <!-- banner-section end -->
  <!-- about-section -->
  @include('Profile.Maternity.about')
  <!-- about-section end -->

  <!-- Appointment-section -->
  @include('Profile.Dentiest.process')
  <!-- Appointment-section end -->

  <!-- working-hours-section -->
  {{-- @include('Profile.Maternity.working') --}}
  <!-- working-hours-section end -->


  <!-- testimonial-section -->
  @include('Profile.Maternity.testimonial')
  <!-- testimonial-section end -->
  @include('Profile.Maternity.contact')


  <!-- main-footer -->
  @include('Profile.Maternity.footer')
  <!-- main-footer end -->


  <!--Scroll to top-->
  <button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-arrow-up"></span>
  </button>
</div>


@endsection