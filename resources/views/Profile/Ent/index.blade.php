@extends('Profile.Ent.header')
@section('content')



<!-- preloader -->
<div class="preloader"></div>
<!-- preloader -->
@include('Profile.Ent.nav')

<!-- banner-section -->
@include('Profile.Ent.banner')
<!-- banner-section end -->
<!-- about-section -->
@include('Profile.Ent.about')
<!-- about-section end -->

<!-- Appointment-section -->
@include('Profile.Dentiest.process')
<!-- Appointment-section end -->

<!-- working-hours-section -->
@include('Profile.Ent.working')
<!-- working-hours-section end -->


<!-- testimonial-section -->
@include('Profile.Ent.testimonial')
<!-- testimonial-section end -->
@include('Profile.Ent.contact')


<!-- main-footer -->
@include('Profile.Ent.footer')
<!-- main-footer end -->




@endsection