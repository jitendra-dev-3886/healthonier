<aside id="sidebar" class="sidebar">



    <ul class="sidebar-nav" id="sidebar-nav">

        @auth

        @if(auth()->user()->type == 'super-admin')



        <li class="nav-item">

            <a class="nav-link collapsed " href="{{ route('super.admin.dashboard') }}">

                <i class="bi bi-grid"></i>

                <span>Dashboard</span>

            </a>

        </li><!-- End Dashboard Nav -->

        @elseif(auth()->user()->type == 'doctor')


        <li class="nav-item">

            <a class="nav-link " href="{{ route('doctor.dashboard') }}">

                <i class="bi bi-grid"></i>

                <span>Dashboard</span>

            </a>

        </li> @endif @endauth @auth @if(auth()->user()->type == 'super-admin')
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('list.speciality') }}">

                <i class="bi bi-file-earmark-diff"></i>

                <span>Departments</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('list.doctor') }}">

                <i class="bi bi-people"></i>

                <span>Doctors</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('admin.list.clinic') }}">

                <i class="bi bi-people"></i>

                <span>Clinics</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('admin.doctor.tax.list') }}">

                <i class="bi bi-people"></i>

                <span>Tax Manager</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('admin.doctor.fee.list') }}">

                <i class="bi bi-people"></i>

                <span>Fee Head</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('admin.doctor.fee.concession.list') }}">

                <i class="bi bi-people"></i>

                <span>Fee Consessions</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('admin.doctor.follow.up.list') }}">

                <i class="bi bi-people"></i>

                <span>Follow Up</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('admin.doctor.patient.list') }}">

                <i class="bi bi-people"></i>

                <span>Patient</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('admin.doctor.booking.list') }}">

                <i class="bi bi-people"></i>

                <span>Booking</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('admin.list.doctorrazorpay') }}">

                <i class="bi bi-wallet2"></i>

                <span>Doctor RazorPay</span>

            </a>

        </li>








        @elseif(auth()->user()->type == 'doctor')

        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('list.clinic') }}">

                <i class="bi bi-calendar2-date"></i><span>Clinic</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('doctor.track.token') }}">

                <i class="bi bi-calendar2-date"></i><span>Track Token</span>

            </a>

        </li>


        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('list.tax') }}">

                <i class="bi bi-calendar2-date"></i><span>Manage Tax </span>

            </a>

        </li>

        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('list.fee') }}">

                <i class="bi bi-calendar2-date"></i><span>Fee Head </span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route(('list.fee.concession')) }}">

                <i class="bi bi-calendar2-date"></i><span>Fee Concession </span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route(('list.followup')) }}">

                <i class="bi bi-calendar2-date"></i><span>Follow Up</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route('doctor.list.patient') }}">

                <i class="bi bi-calendar2-date"></i><span>Patient</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route(('doctor.list.clinic.booking')) }}">

                <i class="bi bi-calendar2-date"></i><span>Bookings</span>

            </a>

        </li>


        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route(('change.password')) }}">

                <i class="bi bi-calendar2-date"></i><span>Change Password</span>

            </a>

        </li>





        <li class="nav-item">

            <a class="nav-link collapsed" data-bs-target="#notification-nav" data-bs-toggle="collapse" href="#">
                <style>
                    .notification {
                        display: flex;
                        align-items: center;
                        position: relative;
                    }

                    .count {
                        background-color: #ff4136;
                        /* Choose your desired background color */
                        color: #fff;
                        border-radius: 50%;
                        padding: 4px 8px;
                        font-size: 12px;
                        position: absolute;
                        right: 100px;
                    }

                </style>

                <i class="bi bi-bell"></i><span>Notification</span> <span class="count">{{$count}}</span><i class="bi bi-chevron-down ms-auto"></i>

            </a>

            <ul id="notification-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>

                    <a href="{{ route('list.notifications') }}">

                        <i class="bi bi-circle"></i><span>All Notification</span>

                    </a>

                </li>






            </ul>

        </li><!-- End Components Nav -->
        <li class="nav-item">

            <a class="nav-link collapsed" data-bs-target="#testimonial-nav" data-bs-toggle="collapse" href="#">

                <i class="bi bi-hand-thumbs-up"></i><span>Testimonial</span><i class="bi bi-chevron-down ms-auto"></i>


            </a>

            <ul id="testimonial-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">

                <li>

                    <a href="{{ route('list.testimonial') }}">

                        <i class="bi bi-circle"></i><span>All Testimonial</span>

                    </a>

                </li>
                <li>

                    <a href="{{ route('add.testimonial') }}">

                        <i class="bi bi-circle"></i><span>Add Testimonial</span>

                    </a>

                </li>



            </ul>

        </li><!-- End Components Nav -->
        @elseif(auth()->user()->type == 'patient')
        <li class="nav-item">

            <a class="nav-link " href="{{ route('patient.dashboard') }}">

                <i class="bi bi-grid"></i>

                <span>Dashboard</span>

            </a>

        </li><!-- End Dashboard Nav -->
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route(('patient.profile.view')) }}">

                <i class="bi bi-calendar2-date"></i><span>Profile</span>

            </a>

        </li><!-- End Dashboard Nav -->
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route(('patient.meeting')) }}">

                <i class="bi bi-calendar2-date"></i><span>Appointment</span>

            </a>

        </li><!-- End Dashboard Nav -->
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route(('patient.change.password')) }}">

                <i class="bi bi-calendar2-date"></i><span>Change Password</span>

            </a>

        </li>
        <li class="nav-item">

            <a class="nav-link collapsed" href="{{ route(('patient.list.notifications')) }}">
                <style>
                    .notification {
                        display: flex;
                        align-items: center;
                        position: relative;
                    }

                    .count {
                        background-color: #ff4136;
                        /* Choose your desired background color */
                        color: #fff;
                        border-radius: 50%;
                        padding: 4px 8px;
                        font-size: 12px;
                        position: absolute;
                        right: 100px;
                    }

                </style>

                <i class="bi bi-bell"></i><span>Notification</span> <span class="count">{{$count}}</span>

            </a>








        </li><!-- End Components Nav -->




        @endif

        @endauth

    </ul>



    <li class="nav-item dropdown pe-3">





        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <?php

            use App\Models\Doctor;

            $data = Doctor::join('specialities', 'doctors.speciality_id', '=', 'specialities.id')
                ->where('user_id',  auth()->user()->id)->first();
            ?>
            @if(auth()->user()->type=='doctor')
            <img src="@if($data){{ $data->image_path != '' ? asset($data->image_path)  : asset('assests/img/profile-img.jpg') }} @endif" alt="Profile" class="rounded-circle">

            @else

            <img src="{{ asset('assests/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
            @endif

            <span class="d-md-block dropdown-toggle ps-2"> {{ Auth::user()->name }} </span>

        </a><!-- End Profile Iamge Icon -->



        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">



            @auth

            @if(auth()->user()->type == 'doctor')



            <li>

                <a class="dropdown-item d-flex align-items-center" href="{{route('doctor.doctorprofile') }}">

                    <i class="bi bi-person"></i>

                    <span>My Profile</span>

                </a>

            </li>

            @else

            @endif

            @endauth

            <li>

                <hr class="dropdown-divider">

            </li>



            <li>

                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();logoutConfirmation();

                        document.getElementById('logout-form').submit();">

                    {{ __('Logout') }}

                </a>



                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">

                    @csrf

                </form>

                <script>
                    function logoutConfirmation() {
                        if (confirm('Are you sure you want to logout?')) {
                            document.getElementById('logout-form').submit();
                        }
                    }

                </script>



            </li>



        </ul><!-- End Profile Dropdown Items -->



    </li><!-- End Profile Nav -->







</aside><!-- End Sidebar-->
