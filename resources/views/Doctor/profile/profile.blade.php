@extends('layouts.admin')



@section('content')
<style>
    .subheading {
        margin-top: 10px;
         text-align: center;
     
    }

    .subheading p {
        font-size: 14px;
        color: #777;
        
    }

</style>
<div class="pagetitle">

    <nav>

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('super.admin.dashboard') }}">Home </a></li>
            <li class="breadcrumb-item active">Profile</li>

        </ol>

    </nav>

</div><!-- End Page Title -->
<section class="section profile">
    <div class="row">
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                    @if(session('success'))

                    <div class="alert alert-success" id="success-message">

                        {{ session('success') }}

                    </div>

                    @endif

                    <img src="@if($data){{ $data->image_path != '' ? $data->image_path  : 'assests/img/' }} @endif

                    " alt="Dr.@if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : '' }} @endif" class="rounded-circle default_img">

                    <h2>@if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : '' }} @endif</h2>

                    <h3>@if($data) {{$data->name != '' ? $data->name	  : '' }} @endif</h3>

                    <div class="social-links mt-2">

                        <a href="" @if($data) {{$data->twitter != '' ? $data->twitter	  : '' }} @endif" class="twitter"><i class="bi bi-twitter"></i></a>

                        <a href="" @if($data) {{$data->facebook != '' ? $data->facebook	  : '' }} @endif" class="facebook"><i class="bi bi-facebook"></i></a>

                        <a target="_blank" href="@if($data) {{$data->linkedin != '' ? $data->linkedin	  : '' }} @endif" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        <a target="_blank" href="@if($data) {{$data->linkedin != '' ? $data->linkedin	  : '' }} @endif" class="linkedin"><i class="bi bi-instagram"></i></a>
                    </div>
                    <?php 
                    $current_domain = $_SERVER['HTTP_HOST'];
                    $base_url = 'https://' . $current_domain;
                    $sp=strtolower($data->name);
                    $url = $base_url .'/'.$sp.'/'. $data->slug.'/booking';
                   
                    ?>
                    <h6>Your Website</h6> <a href="<?php echo $url; ?>" target="_blank"><?php echo $url; ?> </a>

                </div>

            </div>



        </div>



        <div class="col-xl-8">
            <div class="card">
                <div class="">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs border_raduis30">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>

                        </li>
                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>

                        </li>

                        {{-- <li class="nav-item">

                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Settings</button>

                        </li> --}}

                        {{-- <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>

                        </li> --}}



                    </ul>

                    <div class="tab-content p-4 pt-0">
                        <div class="tab-pane fade show active profile-overview" id="profile-overview">
                            <h5 class="card-title fw-bold">About Dr. @if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : '' }} @endif</h5>
                            <p class="">@if($data) {{$data->about != '' ? $data->about	  : '' }} @endif</p>

                            <h5 class="card-title fw-bold">Profile Details</h5>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Full Name</div>

                                <div class="col-lg-9 col-md-8">@if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : '' }} @endif</div>

                            </div>



                            <div class="row">

                                <div class="col-lg-3 col-md-4 label">Speciality</div>

                                <div class="col-lg-9 col-md-8">@if($data) {{$data->name != '' ? $data->name	  : '' }} @endif</div>

                            </div>



                            <div class="row">

                                <div class="col-lg-3 col-md-4 label">Degree</div>

                                <div class="col-lg-9 col-md-8">@if($data) {{$data->degree != '' ? $data->degree	  : '' }} @endif</div>

                            </div>



                            <div class="row">

                                <div class="col-lg-3 col-md-4 label">Experience</div>

                                <div class="col-lg-9 col-md-8">@if($data) {{$data->experience != '' ? $data->experience	  : '' }} @endif</div>

                            </div>



                            <div class="row">

                                <div class="col-lg-3 col-md-4 label">Phone</div>

                                <div class="col-lg-9 col-md-8">@if($data) {{$data->mobile != '' ? $data->mobile	  : '' }} @endif</div>

                            </div>



                            <div class="row">

                                <div class="col-lg-3 col-md-4 label">Email</div>

                                <div class="col-lg-9 col-md-8">@if($data) {{$data->email != '' ? $data->email	  : '' }} @endif</div>

                            </div>



                        </div>



                        <div class="tab-pane fade profile-edit pt-5" id="profile-edit">



                            <!-- Profile Edit Form -->

                            <form class="row g-3" action="{{ route('update.doctorprofile',  auth()->user()->id) }}" method="POST" enctype="multipart/form-data">

                                @method('PUT')

                                @csrf



                                <div class="row mb-3">
                                    <div class="row">
                                      

                                        <div class="col-md-12 theme_previeww">
                                            <label>
                                                <input type="radio" name="theme" value="{{$data->themeid}}" @if(isset($data['theme_id']) && $data['theme_id']==$data->themeid) checked @endif>
                                                <br>
                                                {{-- <div class="theme_previeww"> --}}
                                                <img src="@if($data->thumb_path != ''){{ asset($data->thumb_path) }}@else{{ asset('assets/img/') }}@endif" class="img-fluid theme_thumb" alt="">
                                                <div class="theme_pre">
                                                    <img src="@if($data->themepath != ''){{ asset($data->themepath) }}@else{{ asset('assets/img/') }}@endif" class="img-fluid" alt="...">
                                                    {{-- <img src="assets/img/childcare.png" class="img-fluid" alt=""> --}}
                                                </div>
                                                <div class="subheading">
                                                    <p>{{$data->theme_name}}</p>
                                                </div>
                                                {{-- </div> --}}
                                                <label>
                                        </div>
                                       
                                    </div>


                                    <label for="profileImage" class="col-md-3 col-lg-3 col-form-label">Profile Image</label>

                                    <div class="col-md-7 col-lg-7">

                                        <div class="">

                                            <input class="form-control" type="file" name="image">
                                        </div>

                                    </div>
                                    <div class="col-md-2">

                                        <img src="@if($data){{ $data->image_path != '' ? $data->image_path  : asset('doctordata/doctorprofile/default/profile.png') }} @endif" alt="Profile">

                                    </div>

                                </div>

                                <div class="row mb-3">

                                    <label for="bannerImage" class="col-md-3 col-lg-3 col-form-label">Banner Image</label>

                                    <div class="col-md-7 col-lg-7">



                                        <div class="">

                                            <input class="form-control" type="file" name="bannerimage">
                                        </div>

                                    </div>

                                    <div class="col-md-2">
                                        <img src="@if($data){{ $data->doctor_banner_path != '' ? $data->doctor_banner_path  : asset('profile/assets/images/banner/banner-image-1.png') }} @endif" alt="banner-image">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">

                                    <label for="logo" class="col-md-3 col-lg-3 col-form-label">Logo</label>

                                    <div class="col-md-7 col-lg-7">
                                        <div class="">

                                            <input class="form-control" type="file" name="logo">
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <img src="@if($data){{ $data->logo_path != '' ? $data->logo_path  : asset('doctordata/doctorprofile/default/logo.png') }} @endif" alt="banner-image">

                                    </div>

                                </div>

                                <div class="row mb-3 align-items-center">

                                    <label for="bgimg" class="col-md-3 col-lg-3 col-form-label">Background Banner Image</label>

                                    <div class="col-md-7 col-lg-7">
                                        <div class="">

                                            <input class="form-control" type="file" name="bgimg">
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <img src="@if($data){{ $data->doctor_background_banner_path != '' ? $data->doctor_background_banner_path  : asset('doctordata/doctorprofile/default/banner.jpg') }} @endif" alt="banner-image">

                                    </div>

                                </div>
                                {{-- <div class="row mb-3 align-items-center">

                                    <label for="qrcode" class="col-md-3 col-lg-3 col-form-label">Qrcode Image</label>

                                    <div class="col-md-7 col-lg-7">
                                        <div class="">

                                            <input class="form-control" type="file" name="qrcode">
                                        </div>

                                    </div>
                                    <div class="col-md-2">
                                        <img src="@if($data){{ $data->qrcode_path != '' ? $data->qrcode_path  : asset('profile/assets/images/logo-3.png') }} @endif" alt="banner-image">

                        </div>

                    </div> --}}
                    <div class="row mb-3 align-items-center">

                        <label for="fevicon" class="col-md-3 col-lg-3 col-form-label">Fevicon Icon</label>

                        <div class="col-md-7 col-lg-7">
                            <div class="">

                                <input class="form-control" type="file" name="fevicon">
                            </div>

                        </div>
                        <div class="col-md-2">
                            <img src="@if($data){{ $data->fevicon_path != '' ? $data->fevicon_path  : asset('doctordata/doctorprofile/default/fevicon.png') }} @endif" alt="banner-image">

                        </div>

                    </div>



                    <div class="row mb-3">

                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Dr. Name</label>

                        <div class="col-md-8 col-lg-9">

                            <input name="fullName" type="text" class="form-control" id="fullName" value="@if($data) {{$data->doctor_name != '' ? $data->doctor_name	  : '' }} @endif">

                        </div>

                    </div>


                    <div class="row mb-3">

                        <label for="sub_heading" class="col-md-4 col-lg-3 col-form-label">Sub Heading</label>

                        <div class="col-md-8 col-lg-9">

                            <textarea name="sub_heading" class="form-control" id="sub_heading" style="height: 100px" oninput="limitTextarea(this, 50)">@if($data) {{$data->sub_heading != '' ? $data->sub_heading : '' }} @endif</textarea>

                            <small id="charCount" class="form-text text-muted"></small>

                        </div>

                    </div>
                    <div class="row mb-3">

                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Short Description</label>

                        <div class="col-md-8 col-lg-9">

                            <textarea name="shordesc" class="form-control" id="shortdesc" style="height: 100px" oninput="limitTextarea2(this, 100)">@if($data) {{$data->short_desc != '' ? $data->short_desc : '' }} @endif</textarea>

                            <small id="charCount2" class="form-text text-muted"></small>

                        </div>

                    </div>
                    
                    <script>
                        function limitTextarea(element, maxLength) {

                            let text = element.value;

                            if (text.length > maxLength) {

                                element.value = text.slice(0, maxLength);

                            }

                            document.getElementById("charCount").textContent = "Characters remaining: " + (maxLength - element.value.length);

                        }

                        function limitTextarea2(element, maxLength) {

                            let text = element.value;

                            if (text.length > maxLength) {

                                element.value = text.slice(0, maxLength);

                            }

                            document.getElementById("charCount2").textContent = "Characters remaining: " + (maxLength - element.value.length);

                        }

                    </script>



                    <div class="row mb-3">

                        <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>

                        <div class="col-md-8 col-lg-9">

                            <textarea name="about" class="form-control" id="about" style="height: 100px">@if($data) {{$data->about != '' ? $data->about	  : '' }} @endif</textarea>

                        </div>

                    </div>
                    <div class="row mb-3">

                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Working Hour</label>

                        <div class="col-md-8 col-lg-9">

                            <textarea name="workinghour" class="form-control" id="about" style="height: 100px">@if($data) {{$data->working_hour_content != '' ? $data->working_hour_content	  : '' }} @endif</textarea>

                        </div>

                    </div>
                    <div class="row mb-3">

                        <label for="about" class="col-md-4 col-lg-3 col-form-label">Footer</label>

                        <div class="col-md-8 col-lg-9">

                            <textarea name="footer" class="form-control" id="about" style="height: 100px">@if($data) {{$data->footer_content != '' ? $data->footer_content	  : '' }} @endif</textarea>

                        </div>

                    </div>




                    <div class="row mb-3">

                        <label class="col-md-4 col-lg-3 col-form-label">Speciality</label>
                        <div class="col-md-8 col-lg-9">

                            <select class="form-select form-control" name="speciality" aria-label="Default select example">

                                <option selected>select</option>

                                <?php                         

                                        foreach ($speciality as $item) {

                                            if($data){

                                                $ids=$data->speciality_id;



                                            }else{

                                                $ids='';



                                            }

                                            if($item->id === $ids){

                                           echo '<option value="' . $item->id . '" selected>' . $item->name . '</option>';





                                            }else{

                                              

                                                echo '<option value="' . $item->id . '">' . $item->name . '</option>';

                                            }}



                                        

                                       ?>

                                {{-- <option value="{{$timeSlot->id}}">{{ $label }}</option> --}}



                            </select>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="Job" class="col-md-4 col-lg-3 col-form-label">Degree</label>

                        <div class="col-md-8 col-lg-9">

                            <input name="degree" type="text" class="form-control" id="Job" value="@if($data) {{$data->degree != '' ? $data->degree	  : '' }} @endif">

                        </div>

                    </div>



                    <div class="row mb-3">

                        <label for="Country" class="col-md-4 col-lg-3 col-form-label">Exerience</label>

                        <div class="col-md-8 col-lg-9">

                            <input name="experience" type="text" class="form-control" id="Country" value="@if($data) {{$data->experience != '' ? $data->experience	  : '' }} @endif">

                        </div>

                    </div>



                    <div class="row mb-3">

                        <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>

                        <div class="col-md-8 col-lg-9">

                            <input name="phone" type="text" class="form-control" id="Phone" value="@if($data) {{$data->mobile != '' ? $data->mobile	  : '' }} @endif">

                        </div>

                    </div>



                    <div class="row mb-3">

                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>

                        <div class="col-md-8 col-lg-9">

                            <input name="email" type="email" class="form-control" id="Email" value="@if($data) {{$data->email != '' ? $data->email	  : '' }} @endif">

                        </div>

                    </div>



                    <div class="row mb-3">

                        <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>

                        <div class="col-md-8 col-lg-9">

                            <input name="twitter" type="text" class="form-control" id="Twitter" value="@if($data) {{$data->twitter != '' ? $data->twitter	  : '' }} @endif">

                        </div>

                    </div>



                    <div class="row mb-3">

                        <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>

                        <div class="col-md-8 col-lg-9">

                            <input name="facebook" type="text" class="form-control" id="Facebook" value="@if($data) {{$data->facebook != '' ? $data->facebook	  : '' }} @endif">

                        </div>

                    </div>



                    <div class="row mb-3">

                        <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>

                        <div class="col-md-8 col-lg-9">

                            <input name="instagram" type="text" class="form-control" id="Instagram" value="@if($data) {{$data->instagram != '' ? $data->instagram	  : '' }} @endif">

                        </div>

                    </div>



                    <div class="row mb-3">

                        <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>

                        <div class="col-md-8 col-lg-9">

                            <input name="linkedin" type="text" class="form-control" id="Linkedin" value="@if($data) {{$data->linkedin != '' ? $data->linkedin	  : '' }} @endif">

                        </div>

                    </div>



                    <div class="text-center">

                        <button type="submit" class="btn btn-theme">Save Changes</button>

                    </div>

                    </form><!-- End Profile Edit Form -->



                </div>



                <div class="tab-pane fade pt-3" id="profile-settings">



                    <!-- Settings Form -->

                    <form>



                        <div class="row mb-3">

                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email Notifications</label>

                            <div class="col-md-8 col-lg-9">

                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" id="changesMade" checked>

                                    <label class="form-check-label" for="changesMade">

                                        Changes made to your account

                                    </label>

                                </div>

                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" id="newProducts" checked>

                                    <label class="form-check-label" for="newProducts">

                                        Information on new products and services

                                    </label>

                                </div>

                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" id="proOffers">

                                    <label class="form-check-label" for="proOffers">

                                        Marketing and promo offers

                                    </label>

                                </div>

                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>

                                    <label class="form-check-label" for="securityNotify">

                                        Security alerts

                                    </label>

                                </div>

                            </div>

                        </div>



                        <div class="text-center">

                            <button type="submit" class="btn btn-theme">Save Changes</button>

                        </div>

                    </form><!-- End settings Form -->



                </div>



                <div class="tab-pane fade pt-3" id="profile-change-password">

                    <!-- Change Password Form -->

                    <form>



                        <div class="row mb-3">

                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>

                            <div class="col-md-8 col-lg-9">

                                <input name="password" type="password" class="form-control" id="currentPassword">

                            </div>

                        </div>



                        <div class="row mb-3">

                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>

                            <div class="col-md-8 col-lg-9">

                                <input name="newpassword" type="password" class="form-control" id="newPassword">

                            </div>

                        </div>



                        <div class="row mb-3">

                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Confirm Password</label>

                            <div class="col-md-8 col-lg-9">

                                <input name="renewpassword" type="password" class="form-control" id="renewPassword">

                            </div>

                        </div>



                        <div class="text-center">

                            <button type="submit" class="btn btn-theme">Change Password</button>

                        </div>

                    </form><!-- End Change Password Form -->



                </div>



            </div><!-- End Bordered Tabs -->



        </div>

    </div>



    </div>

    </div>

</section>






<script>
    // Automatically remove the success message after 5 seconds (5000 milliseconds)
    setTimeout(function() {
        document.getElementById('success-message').remove();
    }, 1000);

</script>




@endsection
