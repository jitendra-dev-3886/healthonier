@extends('Healthonier.header')
@section('content')
<div class="boxed_wrapper">

    <!-- preloader -->
    {{-- <div class="preloader"></div> --}}
    <!-- preloader -->
    @include('Healthonier.nav')
    @include('Healthonier.banner')
    @include('Healthonier.what-do-we-offer')
    @include('Healthonier.department')
    @include('Healthonier.how-we-work')
    @include('Healthonier.client')
    @include('Healthonier.panels')
    @include('Healthonier.start-free-trial-today')
    @include('Healthonier.want-to-know-more')
    @include('Healthonier.footer')
    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fa fa-arrow-up"></span>
    </button>
</div>
@endsection
