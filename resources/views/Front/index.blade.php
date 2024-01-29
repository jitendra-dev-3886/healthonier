@extends('Front.header')

@section('content')
<section class="section">
    <div class="row align-items-top">
        <div class="col-lg-12">
            <div class="row">

                <div class="col-md-12">
                    <!-- Card with header and footer -->
                    @foreach($data as $item)
                    <div class="card">
                        <div class="col-md-4">
                            <img src="@if($item){{ $item->image_path != '' ? $item->image_path  : 'assests/img/' }} @endif" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{$item->name}}</h5>
                            <h6 class="card-title">{{$item->doctor_name}}</h6>
                            {{$item->about}}

                        </div>
                        <div class="card-footer">
                            <p class="card-text"><a href="#" class="btn btn-primary">Book Appointment</a></p>
                        </div>
                    </div><!-- End Card with header and footer -->
                    @endforeach

                </div>
            </div>

        </div>

    </div>
</section>

@endsection
