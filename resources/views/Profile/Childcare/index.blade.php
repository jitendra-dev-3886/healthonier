@extends('Profile.Childcare.header')
@section('content')

<div class=" preloder">
    <div class="loader">
        <div class="loader--dot"></div>
        <div class="loader--dot"></div>
        <div class="loader--dot"></div>
        <div class="loader--dot"></div>
        <div class="loader--dot"></div>
        <div class="loader--dot"></div>
        <div class="loader--text"></div>
    </div>
</div>


@include('Profile.Childcare.nav')
@include('Profile.Childcare.banner')
@include('Profile.Childcare.about')
@include('Profile.Dentiest.process')
@include('Profile.Childcare.working')
@include('Profile.Childcare.testimonial')
@include('Profile.Childcare.contact')
@include('Profile.Childcare.footer')

@endsection
