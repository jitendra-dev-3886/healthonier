@extends('Profile.Mental.header')
@section('content')



<!-- preloader -->
<div class="se-pre-con"></div>
<!-- preloader -->
@include('Profile.Mental.nav')

<!-- banner-section -->
@include('Profile.Mental.banner')
<!-- banner-section end -->
<!-- about-section -->
@include('Profile.Mental.about')
<!-- about-section end -->

<!-- Appointment-section -->
@include('Profile.Dentiest.process')
<!-- Appointment-section end -->

<!-- working-hours-section -->
@include('Profile.Mental.working')
<!-- working-hours-section end -->


<!-- testimonial-section -->
@include('Profile.Mental.testimonial')
<!-- testimonial-section end -->
@include('Profile.Mental.contact')


<!-- main-footer -->
@include('Profile.Mental.footer')
<!-- main-footer end -->




@endsection