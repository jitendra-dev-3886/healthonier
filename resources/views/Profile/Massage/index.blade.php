@extends('Profile.Massage.header')
@section('content')

<div class="preloader js-preloader">
    <div class="loader loader-inner-1">
        <div class="loader loader-inner-2">
            <div class="loader loader-inner-3">
            </div>
        </div>
    </div>
</div>

<!-- preloader -->
<div class="page-wrapper">
    <!-- preloader -->
    @include('Profile.Massage.nav')

    <!-- banner-section -->
    @include('Profile.Massage.banner')
    <!-- banner-section end -->
    <!-- about-section -->
    @include('Profile.Massage.about')
    <!-- about-section end -->

    <!-- Appointment-section -->
    @include('Profile.Dentiest.process')
    <!-- Appointment-section end -->

    <!-- working-hours-section -->
    @include('Profile.Massage.working')
    <!-- working-hours-section end -->


    <!-- testimonial-section -->
    @include('Profile.Massage.testimonial')
    <!-- testimonial-section end -->
    @include('Profile.Massage.contact')


    <!-- main-footer -->
    @include('Profile.Massage.footer')
    <!-- main-footer end -->
</div>





@endsection