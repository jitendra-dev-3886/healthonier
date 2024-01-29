<!-- ======= Header ======= -->

<header id="header" class="header fixed-top d-flex align-items-center">



    <div class="d-flex align-items-center justify-content-between">
        @if(auth()->user()->type == 'super-admin')

        <i class="bi bi-list toggle-sidebar-btn"></i>
        <a href="{{ route('super.admin.dashboard') }}" class="logo d-flex align-items-center">
            @else
            <a href="{{ route('doctor.dashboard') }}" class="logo d-flex align-items-center">
                @endif



                <img src="{{ asset('doctordata/logo/1694002120.png')}}" alt="">



            </a>


    </div>





    <nav class="header-nav ms-auto mr-3">

        <ul class="d-flex align-items-center">
            @if(auth()->user()->type == 'doctor')
            <li>
                <div class="col-md-12 font-weight-bold">
                    <select class="form-select" id="status_dropdown" name="status_available">
                        @foreach($DoctorStatusData as $item)
                        <option value="{{$item->id}}" @if ($item->id== auth()->user()->doctor->available_status) selected @endif>
                            {{$item->status}}
                        </option>
                        @endforeach
                    </select>
                </div>
            </li>

            @endif




            <li class="nav-item dropdown">


                @if(auth()->user()->type == 'super-admin')

                @else
                <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">

                    <i class="bi bi-bell"></i>

                    <span class="badge bg-theme badge-number">{{$count}}</span>

                </a>
                @endif


                {{-- <div class="col-md-12 font-weight-bold">
                    <label for="status_dropdown">Select Status</label>
                    <select class="form-select" id="status_dropdown" name="status_available">
                        @foreach($DoctorStatusData as $item)
                            <option value="{{$item->id}}"
                @if ($item->id== auth()->user()->doctor->available_status) selected @endif>
                {{$item->status}}
                </option>
                @endforeach
                </select>
                </div> --}}




                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">



                    <li class="dropdown-header">

                        You have {{$count}} notifications

                        <a href="{{ route('doctor.all.notifications.markAsRead', auth()->user()->id) }}"><span class="badge rounded-pill bg-primary p-2 ms-2">Read all</span></a>

                    </li>

                    <li>

                        <hr class="dropdown-divider">

                    </li>



                    <?php use Carbon\Carbon; ?>

                    @foreach($notifications as $notification)
                    @if($notification->read != 1)
                    <li class="notification-item">
                        @if($notification->type=='Staff Added' or $notification->type=='Staff Updated'or
                        $notification->type=='Staff Deleted')
                        <i class="bi bi-person"></i>
                        @elseif($notification->type=='Clinic Added' or $notification->type=='Clinic Updated'or
                        $notification->type=='Clinic Status' or $notification->type=='Clinic Deleted')
                        <i class="bi bi-building"></i>
                        @elseif($notification->type=='Timeslot Added' or $notification->type=='Timeslot Changed'or
                        $notification->type=='Timeslot Status Changed' or $notification->type=='Timeslot Deleted')
                        <i class="bi bi-watch"></i>
                        @elseif($notification->type=='New Booking')
                        <i class="bi bi-calendar"></i>
                        @else
                        <i class="bi bi-exclamation-circle text-warning"></i>
                        @endif




                        <div>

                            <h4>{{ $notification->type }}</h4>
                            @if($notification->read)
                            <p>{{ $notification->message }}</p>
                            @else
                            <a href="{{ route('doctor.notifications.markAsRead', $notification->id) }}">
                                <p>{{ $notification->message }} </p>(Unread - Mark as Read)
                            </a>
                            @endif


                            <p>{{ Carbon::parse($notification->created_at)->diffForHumans() }}</p>

                        </div>

                    </li>

                    @endif

                    @endforeach



                    <li>

                        <hr class="dropdown-divider">

                    </li>



                    <li>

                        <hr class="dropdown-divider">

                    </li>

                    <li class="dropdown-footer">

                        <a href="{{ route('list.notifications') }}">Show all notifications</a>

                    </li>



                </ul><!-- End Notification Dropdown Items -->



            </li><!-- End Notification Nav -->







        </ul>

    </nav><!-- End Icons Navigation -->



</header><!-- End Header -->
