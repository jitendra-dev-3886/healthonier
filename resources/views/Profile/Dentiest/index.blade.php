@extends('Profile.Dentiest.header')
@section('content')


<div class="page-wrapper">
    @include('Profile.Dentiest.nav')
    @include('Profile.Dentiest.banner')
    @include('Profile.Dentiest.about')
    @include('Profile.Dentiest.process')

    <!-- Video section -->
    <section class="video-section style-two mt-5 ">
        <div class="auto-container">
            <div class="video-box">
                <img src="{{asset('Dentiest/assets/images/resource/image-22.jpg')}}" alt="">
                <div class="video-btn">
                    <a href="{{asset('Dentiest/assets/images/demo.mp4')}}" class="overlay-link play-now ripple" data-fancybox="gallery" data-caption=""><i class="fas fa-play"></i></a></div>
            </div>
        </div>
    </section>

    @include('Profile.Dentiest.working')
    @include('Profile.Dentiest.testimonial')
    @include('Profile.Dentiest.contact')
    @include('Profile.Dentiest.footer')
</div>

@endsection
