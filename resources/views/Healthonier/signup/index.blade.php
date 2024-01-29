@extends('Healthonier.header')
@section('content')
<div class="boxed_wrapper">
    <section class="registration-section bg-color-2">
        <div class="pattern">
            <div class="pattern-1" style="background-image: url(assets/images/shape/shape-85.png);"></div>
            <div class="pattern-2" style="background-image: url(assets/images/shape/shape-86.png);"></div>
        </div>
        <div class="auto-container">
            <div class="row tabs-box">
                <div class="col-md-12 m-auto">
                    <div class="content-box m-auto text-center">
                        <div class="inner registration">
                            <figure class="logo"><a href="/"><img src="{{asset('Healthonier/assets/images/logo.png')}}" alt="" style="height: 80px;" class="mb-4"></a></figure>
                            <ul class="tab-btns tab-buttons clearfix">
                                <li class="tab-btn active-btn" data-tab="#tab-1">
                                    <div class="align-items-center">
                                        <div class="mb-3 signup-icon">
                                            1
                                        </div>
                                        <div>
                                            <h5 class="m-0">About Yourself</h5>
                                            <p>Personal Details</p>

                                        </div>
                                    </div>
                                </li>
                                <li class="tab-btn" data-tab="#tab-2">
                                    <div class="align-items-center">
                                        <div class="signup-icon mb-3">
                                            2
                                        </div>
                                        <div>
                                            <h5 class="m-0"> Create your Website </h5>
                                            <p>Basic info about you </p>

                                        </div>
                                    </div>
                                </li>

                                <li class="tab-btn" data-tab="#tab-3">
                                    <div class="align-items-center">
                                        <div class="signup-icon mb-3">
                                            3
                                        </div>
                                        <div>
                                            <h5 class="m-0"> Subscription plan </h5>
                                            <p>Select Subscription Plan </p>

                                        </div>
                                    </div>
                                </li>

                            </ul>
                            <h5 class="mt-3">Already have an account? <a href="/login"> Click here to Login</a></h5>
                        </div>
                    </div>
                    <div class="content-box mt-4">
                        <form action="#" method="post" class="registration-form" id="form-tab-3">
                            <div class="inner">
                                <div class="col-md-12 tabs-content">
                                    <div class="tab active-tab" id="tab-1">
                                        <div class="row clearfix">

                                            <h3 class="mb-3">Personal Information</h3>
                                            <div class="row clearfix">
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                    <label>Fast name</label>
                                                    <input type="text" id="first_name" class="form-control" name="fname" placeholder="Enter your name" autocomplete="off">
                                                    <span id="error_fname" class="text-danger "></span>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                                    <label>Last name</label>
                                                    <input type="text" id="last_name" class="form-control" name="lname" placeholder="Enter your name" autocomplete="off">
                                                    <span id="error_last_name" class="text-danger "></span>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <label>Email</label>
                                                    <input type="email" id="email" class="form-control" name="email" placeholder="Enter your email" autocomplete="off">
                                                    <span id="error_email" class="text-danger "></span>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <label>Department</label>
                                                    <select name="speciality" id="speciality">
                                                        @foreach($speciality as $data)
                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <label>Password</label>
                                                    <input type="password" id="password" class="form-control" name="password" placeholder="Your password" autocomplete="off">
                                                    <span id="error_password" class="text-danger "></span>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <label>Confirm password</label>
                                                    <input type="password" class="form-control" name="cpassword" placeholder="Confirm password" autocomplete="off">
                                                    <span id="error_confirmpassword" class="text-danger "></span>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                                    <div class="custom-check-box">
                                                        <div class="custom-controls-stacked">
                                                            <label class="custom-control material-checkbox">
                                                                <input type="checkbox" class="material-control-input" checked>
                                                                <span class="material-control-indicator"></span>
                                                                <span class="description">I accept <a href="#">terms</a> and <a href="#">conditions</a> and general
                                                                    policy</span>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                                    <a href="#tab-2" class="theme-btn-one continueBtn">Continue <i class="icon-Arrow-Right"></i></a>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab" id="tab-2">
                                        <div class="">
                                            <h3 class="mb-3">Create your website </h3>
                                            <div class="card mb-3">
                                                <div class="card-body py-4 cb-grid">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="">
                                                                <div class="stepper-nav text-center">

                                                                    <!--begin::Step 2-->
                                                                    <div class="stepper-item current" data-kt-stepper-element="nav">
                                                                        <i class="fa fa-check-circle"></i>
                                                                        <h3 class="stepper-title">Create account </h3>
                                                                    </div>
                                                                    <!--begin::Step 2-->
                                                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                                                        <i class="fa fa-globe-asia"></i>
                                                                        <h3 class="stepper-title">Add domain</h3>
                                                                    </div>
                                                                    <!--end::Step 2-->
                                                                    <!--begin::Step 3-->
                                                                    <div class="stepper-item" data-kt-stepper-element="nav">
                                                                        <i class="fa fa-upload"></i>
                                                                        <h3 class="stepper-title">Upload logo</h3>
                                                                    </div>
                                                                    <!--end::Step 3-->
                                                                    <!--begin::Step 4-->

                                                                    <div class="stepper-item " data-kt-stepper-element="nav">
                                                                        <i class="fab fa-android"></i>
                                                                        <h3 class="stepper-title">Setup Android app </h3>
                                                                    </div>

                                                                    <!--end::Step 4-->
                                                                    <!--begin::Step 5-->

                                                                    <div class="stepper-item " data-kt-stepper-element="nav">
                                                                        <i class="fab fa-app-store-ios"></i>
                                                                        <h3 class="stepper-title">Setup IOS app</h3>
                                                                    </div>

                                                                    <!--end::Step 6-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="card card-xl-stretch bg-body border-0 mb-5 mb-xl-0 w-100">

                                                <div class="card-body">
                                                    <div class="row w-100">
                                                        <div class="col-md-8">
                                                            <h4>Have you purchased a domain for your branded Clinic website ?</h4>

                                                        </div>
                                                        <div class="col-md-4">
                                                        </div>

                                                    </div>

                                                    <div class="row mt-4 border-bottom pb-4" id="notMyDomain">

                                                        <div class="col-md-8">
                                                            <div class="mb-10">
                                                                <label class="label-font">Enter domain of your
                                                                    choice</label>
                                                                <div class="d-flex align-items-baseline">
                                                                    <input class="w-225px form-control form-control-solid mt-3 me-3" placeholder="myclinic" type="text" id="SubDomainName" name="SubDomainName" value="">
                                                                    <span class="subdomain-url">.healthonier.com</span>
                                                                    <span id="tg"></span>
                                                                </div>
                                                                <div class="mt-3 d-flex align-items-center">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                        <path d="M7 0.5C5.71442 0.5 4.45772 0.881218 3.3888 1.59545C2.31988 2.30968 1.48676 3.32484 0.994786 4.51256C0.502816 5.70028 0.374095 7.00721 0.624899 8.26809C0.875703 9.52896 1.49477 10.6872 2.40381 11.5962C3.31285 12.5052 4.47104 13.1243 5.73192 13.3751C6.99279 13.6259 8.29973 13.4972 9.48744 13.0052C10.6752 12.5132 11.6903 11.6801 12.4046 10.6112C13.1188 9.54229 13.5 8.28558 13.5 7C13.4983 5.2766 12.813 3.62426 11.5944 2.40563C10.3757 1.18701 8.7234 0.501655 7 0.5ZM6.875 3.5C7.02334 3.5 7.16834 3.54399 7.29168 3.6264C7.41502 3.70881 7.51115 3.82594 7.56791 3.96299C7.62468 4.10003 7.63953 4.25083 7.61059 4.39632C7.58165 4.5418 7.51022 4.67544 7.40533 4.78033C7.30044 4.88522 7.16681 4.95665 7.02132 4.98559C6.87583 5.01453 6.72503 4.99968 6.58799 4.94291C6.45095 4.88614 6.33381 4.79001 6.2514 4.66668C6.16899 4.54334 6.125 4.39834 6.125 4.25C6.125 4.05109 6.20402 3.86032 6.34467 3.71967C6.48532 3.57902 6.67609 3.5 6.875 3.5ZM7.5 10.5H7C6.86739 10.5 6.74022 10.4473 6.64645 10.3536C6.55268 10.2598 6.5 10.1326 6.5 10V7C6.36739 7 6.24022 6.94732 6.14645 6.85355C6.05268 6.75979 6 6.63261 6 6.5C6 6.36739 6.05268 6.24021 6.14645 6.14645C6.24022 6.05268 6.36739 6 6.5 6H7C7.13261 6 7.25979 6.05268 7.35356 6.14645C7.44732 6.24021 7.5 6.36739 7.5 6.5V9.5C7.63261 9.5 7.75979 9.55268 7.85356 9.64645C7.94732 9.74021 8 9.86739 8 10C8 10.1326 7.94732 10.2598 7.85356 10.3536C7.75979 10.4473 7.63261 10.5 7.5 10.5Z" fill="#B5B5C3"></path>
                                                                    </svg>
                                                                    <span class="ps-4 info-text">This domain will be
                                                                        used by patients to access your online
                                                                        Clinic website </span>
                                                                </div>

                                                            </div>

                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="sidebar-box">
                                                                <p class="in-header">Don't have a domain?</p>
                                                                <p class="in-text">Don't worry. You can use our
                                                                    free domain.</p>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="row mt-4 border-bottom pb-4">
                                                        <div class="col-md-8">
                                                            <h4>Add your clinic logo
                                                            </h4>
                                                            <label for=""> Clinic Logo</label>
                                                            <input type="file" class="form-control" name="logo" id="logo">
                                                            <div class="mt-3 d-flex align-items-center">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                                                                    <path d="M7 0.5C5.71442 0.5 4.45772 0.881218 3.3888 1.59545C2.31988 2.30968 1.48676 3.32484 0.994786 4.51256C0.502816 5.70028 0.374095 7.00721 0.624899 8.26809C0.875703 9.52896 1.49477 10.6872 2.40381 11.5962C3.31285 12.5052 4.47104 13.1243 5.73192 13.3751C6.99279 13.6259 8.29973 13.4972 9.48744 13.0052C10.6752 12.5132 11.6903 11.6801 12.4046 10.6112C13.1188 9.54229 13.5 8.28558 13.5 7C13.4983 5.2766 12.813 3.62426 11.5944 2.40563C10.3757 1.18701 8.7234 0.501655 7 0.5ZM6.875 3.5C7.02334 3.5 7.16834 3.54399 7.29168 3.6264C7.41502 3.70881 7.51115 3.82594 7.56791 3.96299C7.62468 4.10003 7.63953 4.25083 7.61059 4.39632C7.58165 4.5418 7.51022 4.67544 7.40533 4.78033C7.30044 4.88522 7.16681 4.95665 7.02132 4.98559C6.87583 5.01453 6.72503 4.99968 6.58799 4.94291C6.45095 4.88614 6.33381 4.79001 6.2514 4.66668C6.16899 4.54334 6.125 4.39834 6.125 4.25C6.125 4.05109 6.20402 3.86032 6.34467 3.71967C6.48532 3.57902 6.67609 3.5 6.875 3.5ZM7.5 10.5H7C6.86739 10.5 6.74022 10.4473 6.64645 10.3536C6.55268 10.2598 6.5 10.1326 6.5 10V7C6.36739 7 6.24022 6.94732 6.14645 6.85355C6.05268 6.75979 6 6.63261 6 6.5C6 6.36739 6.05268 6.24021 6.14645 6.14645C6.24022 6.05268 6.36739 6 6.5 6H7C7.13261 6 7.25979 6.05268 7.35356 6.14645C7.44732 6.24021 7.5 6.36739 7.5 6.5V9.5C7.63261 9.5 7.75979 9.55268 7.85356 9.64645C7.94732 9.74021 8 9.86739 8 10C8 10.1326 7.94732 10.2598 7.85356 10.3536C7.75979 10.4473 7.63261 10.5 7.5 10.5Z" fill="#B5B5C3"></path>
                                                                </svg>
                                                                <span class="ps-4 info-text"> This logo will be used to create branded clinic website and mobile applications. </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-4">
                                                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                                                            <a href="#tab-3" class="theme-btn-one continueBtn">Continue <i class="icon-Arrow-Right"></i></a>
                                                        </div>

                                                    </div>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="tab" id="tab-3">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <div class="switch-wrapper">
                                                    <input id="monthly" type="radio" name="switch" checked>
                                                    <input id="yearly" type="radio" name="switch">
                                                    <label for="monthly">Monthly</label>
                                                    <label for="yearly">Yearly</label>
                                                    <span class="highlighter"></span>
                                                </div>
                                                <div class="table-wrapper">
                                                    <table>
                                                        <thead>
                                                            <tr>
                                                                @foreach($plans as $plan)
                                                                <th>
                                                                    <div class="">
                                                                        <label class="custom-radio">
                                                                            <input type="radio" name="selected_plan" value="{{ $plan->id }}" data-amount="{{ $plan->monthly_price }}" checked>
                                                                            <span class="radio-btn">
                                                                                <div class="hobbies-icon">
                                                                                    <div class="table-header">
                                                                                        <h4 class="mb-3">{{ $plan->name }}</h4>
                                                                                        <div class="price monthly">
                                                                                            <div class="amount text-danger">$ {{ $plan->monthly_price }}</div>
                                                                                        </div>
                                                                                        <div class="price yearly hide">
                                                                                            <div class="text-danger amount"> $ {{ $plan->yearly_price }}</div>
                                                                                        </div>
                                                                                        <p class="m-0">Save 2 months subscription fees on annual billing</p>
                                                                                    </div>
                                                                                </div>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </th>
                                                                @endforeach

                                                            </tr>
                                                        </thead>

                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="clinic-info">
                                                    <div class="clini_box">

                                                        <div class="an_month">
                                                            <span>2 Weeks Free Trial. Save additional 2 months'
                                                                subscription fees on annual billing</span>
                                                        </div>

                                                        <div class="cl_list selected">
                                                            <ul>
                                                                <li>

                                                                    Clinic website
                                                                </li>
                                                                <li>

                                                                    Clinic App (Android + IOS)
                                                                </li>
                                                                <li>

                                                                    Clinic Admin
                                                                </li>
                                                                <li>

                                                                    Doctor App
                                                                </li>
                                                                <li>

                                                                    One Payment Gateway Integration
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <button class="theme-btn-one" onclick="submitForm()">Submit</button>
                                        </div>

                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


</div>


</div>

</section>
</div>
@endsection
@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('input[name="selected_plan"]').change(function() {

            $('.custom-radio').css('background-color', '');
            $(this).closest('.custom-radio').css('background-color', '#e6f7ff');
        });
    });

</script>
<script>
    const tableWrapper = document.querySelector(".table-wrapper");
    const switchInputs = document.querySelectorAll(".switch-wrapper input");
    const prices = tableWrapper.querySelectorAll(".price");
    const toggleClass = "hide";

    for (const switchInput of switchInputs) {
        switchInput.addEventListener("input", function() {
            for (const price of prices) {
                price.classList.add(toggleClass);
            }
            const activePrices = tableWrapper.querySelectorAll(`.price.${switchInput.id}`);
            for (const activePrice of activePrices) {
                activePrice.classList.remove(toggleClass);
            }
        });
    }

</script>
<script>
    $(document).ready(function() {
        $(".continueBtn").on("click", function(event) {
            event.preventDefault();
            var nextTabId = $(this).attr("href");

            var first_name = $('#first_name').val();
            var last_name = $('#last_name').val();

            $(".error").remove();

            if (first_name.length < 1) {
                $('#first_name').after('<span class="error">This field is required</span>');
            }
            if (last_name.length < 1) {
                $('#last_name').after('<span class="error">This field is required</span>');


            } else {
                switchToTab(nextTabId);
            }

        });

        function switchToTab(tabId) {
            $(".tab").removeClass("active-tab");
            $(".tab-btn").removeClass("active-btn");
            $(tabId).addClass("active-tab");
            var correspondingTabButton = $(".tab-btn[data-tab='" + tabId + "']");
            correspondingTabButton.addClass("active-btn")
        }
    });

    function submitForm() {
        // Prevent the default form submission
        event.preventDefault();

        // Get all form data using FormData
        var formData = new FormData(document.getElementById('form-tab-3'));

        // Add any additional data you want to include in the form
        var selectedPlanId = $('input[name="selected_plan"]:checked').val();
        var selectedPlanAmount = $('input[name="selected_plan"]:checked').data('amount');


        formData.append('planId', selectedPlanId);
        formData.append('amount', selectedPlanAmount);

        // Add the CSRF token to the form data
        formData.append('_token', $('meta[name="csrf-token"]').attr('content'));

        // Example using jQuery for AJAX
        $.ajax({
            url: '/handleStep1'
            , type: 'POST'
            , data: formData
            , processData: false
            , contentType: false
            , success: function(data) {
                if (data.success) {
                    // Redirect to Razorpay payment page
                    redirectToRazorpay(data.orderId, selectedPlanAmount);
                } else {
                    if (data.errors) {
                        var errorMessage = '';
                        $.each(data.errors, function(key, value) {
                            errorMessage += value + '\n';
                        });
                        Swal.fire({
                            icon: 'error'
                            , title: 'Validation Error'
                            , text: errorMessage
                        , });
                    } else {
                        console.error('Error while storing data');
                    }
                }
            }
            , error: function() {
                console.error('Error while storing data');
            }
        });
    }

    function redirectToRazorpay(orderId, selectedPlanAmount) {
        var options = {
            key: 'rzp_test_xgQxpWz8ZSR9Hd'
            , amount: selectedPlanAmount
            , currency: 'INR'
            , name: 'Helathonier'
            , description: 'Membership Payment'
            , order_id: orderId
            , handler: function(response) {
                // Handle success, e.g., update the backend with payment details
                updateBackendWithPaymentDetails(response, orderId, selectedPlanAmount);
            }
            , prefill: {
                name: 'Customer Name'
                , email: 'customer@example.com'
                , contact: 'XXXXXXXXXX'
            }
            , theme: {
                color: '#3399cc'
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    }

    function updateBackendWithPaymentDetails(response, orderId, amount) {
        // Perform AJAX request to store payment details in the backend
        $.ajax({
            url: '/handlePayment'
            , type: 'POST'
            , data: {
                orderId: orderId
                , amount: amount
                , razorpayPaymentId: response.razorpay_payment_id
                , razorpayOrderId: response.razorpay_order_id
                , razorpaySignature: response.razorpay_signature
                , _token: $('meta[name="csrf-token"]').attr('content')
            }
            , success: function(data) {
                // Handle success, e.g., redirect to a thank you page
                window.location.href = '/login';
            }
            , error: function() {
                console.error('Error while updating backend with payment details');
            }
        });
    }

</script>
@endpush
