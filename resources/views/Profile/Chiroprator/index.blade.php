@extends('Profile.Chiroprator.header')
@section('content')



<div class="page-wrapper">
      <!-- preloader -->
      <div class="preloader"></div>
        <!-- preloader -->
        @include('Profile.Chiroprator.nav')

        <!-- banner-section -->
        @include('Profile.Chiroprator.banner')
        <!-- banner-section end -->
        <!-- about-section -->
        @include('Profile.Chiroprator.about')
        <!-- about-section end -->

        <!-- Appointment-section -->
        @include('Profile.Dentiest.process')
        <!-- Appointment-section end -->

        <!-- working-hours-section -->
        @include('Profile.Chiroprator.working')
        <!-- working-hours-section end -->


        <!-- testimonial-section -->
        @include('Profile.Chiroprator.testimonial')
        <!-- testimonial-section end -->
        @include('Profile.Chiroprator.contact')
   
        
        <!-- main-footer -->
        @include('Profile.Chiroprator.footer')
        <!-- main-footer end -->


        <!--Scroll to top-->
        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fa fa-arrow-up"></span>
        </button>
</div>


@endsection
