@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center dashboard">
        <div class="col-lg-12">
            <div class="row">
                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="p-3"> 

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <img src="{{ asset('assests/img/d1.png')}}">
                                </div>
                                <div class="ps-3">
                                     <span class="fw-bold">Total Staff</span> 
                                    <h6>  128</h6>
                                   
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card primary-card sales-card">
                        <div class="p-3"> 

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <img src="{{ asset('assests/img/d2.png')}}">
                                </div>
                                <div class="ps-3">
                                     <span class="fw-bold">Total Clinic</span> 
                                    <h6>  8</h6>
                                   
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
                <div class="col-xxl-4 col-md-4">
                    <div class="card success-card sales-card">
                        <div class="p-3"> 
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                  <img src="{{ asset('assests/img/d3.png')}}">
                                </div>
                                <div class="ps-3">
                                     <span class="fw-bold">Today's Appointment </span> 
                                    <h6>  28</h6>
                                   
                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->
  
              
                <!-- Recent Sales -->
                <div class="col-md-12">
                    <div class="overflow-auto">
                        <div class="">
                            <h5 class="info-card card-title p-3 fw-bold">Our Staffs </h5>
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">S.No</th>
                                        <th scope="col">Staff Name</th>
                                        <th scope="col">Email</th> 
                                        <th scope="col">Number</th> 
                                        <th scope="col">Action</th>
                                        <th scope="col">Active Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row"> 1 </td>
                                        <td>Dinesh Sharma</td>
                                        <td>user@gmail.com</td> 
                                        <td>1234567890</td> 
                                        <td class="d-flex"> 
                                       <a href="#" class="icon_btn"> <i class="bi bi-pencil-square"></i> </a>
                                        <button class="icon_btn"><i class="bi bi-trash"></i></button>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_19" data-id="19" checked="">
                            </div>
                            </td>
                                    </tr> 
                                    <tr>
                                        <td scope="row"> 2 </td>
                                         <td>Dinesh Sharma</td>
                                        <td>user@gmail.com</td> 
                                        <td>1234567890</td> 
                                       <td class="d-flex"> 
                                        <a href="#" class="icon_btn"> <i class="bi bi-pencil-square"></i> </a>
                                        <button class="icon_btn"><i class="bi bi-trash"></i></button>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_19" data-id="19" checked="">
                            </div>
                            </td>
                                    </tr> 
                                    <tr>
                                        <td scope="row"> 3 </td>
                                        <td>Dinesh Sharma</td>
                                        <td>user@gmail.com</td> 
                                        <td>1234567890</td> 
                                        <td class="d-flex">  
                                          <a href="#" class="icon_btn"> <i class="bi bi-pencil-square"></i> </a>
                                        <button class="icon_btn"><i class="bi bi-trash"></i></button>
                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="statusSwitch_19" data-id="19" checked="">
                            </div>
                            </td>
                                    </tr> 
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div><!-- End Recent Sales -->
 

            </div>
        </div>
        
       
    </div>
</div>
@endsection
