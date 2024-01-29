     <!-- main header -->
     <style>
         body {
             top: 0 !important;
         }

         .goog-te-menu-value {
             display: none;
         }

         .goog-te-menu-frame.skiptranslate {
             display: none;
         }

         .goog-te-gadget-icon {
             background-image: url(your_icon_url);
         }

         .VIpgJd-ZVi9od-ORHb-OEVmcd {
             display: none !important;
         }

         .goog-te-gadget .goog-te-combo {
             border: none !important;
             padding: 10px !important;
             border-radius: 50px;
             margin-top: 20px !important;
         }

         .goog-te-gadget {
             color: transparent !important;
         }

         .skiptranslate.goog-te-gadget span {
             display: none !important;
         }

         .select2-container {
             width: 400px !important;
             font-family: Arial, sans-serif !important;

         }

         .select2-selection {
             border: 1px solid #ccc !important;
             border-radius: 35px !important;
             background-color: #fff !important;
             color: #333 !important;
             height: 38px !important;
             line-height: 38px !important;
         }

         .select2-selection__placeholder {
             color: #888 !important;
         }

         .select2-selection__arrow {
             border-color: #333 transparent transparent !important;
         }

         .select2-dropdown {
             border: 1px solid #ccc !important;
             border-radius: 4px !important;
         }

         .select2-results__option {
             padding: 8px 12px !important;
             cursor: pointer !important;
         }

         .select2-search__field {
             border: none;
             outline: none;
             box-shadow: none;
             font-family: Arial, sans-serif;
         }

         .select2-selection__clear {
             cursor: pointer;
         }

     </style>

     <header class="main-header style-two">

         <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
         <!-- header-lower -->
         <div class="header-lower">
             <div class="auto-container">
                 <div class="outer-box">
                     <div class="logo-box">
                         <figure class="logo"><a href="/"><img src="{{asset('Healthonier/assets/images/logo.png')}}" alt=""></a>
                         </figure>
                     </div>
                     <div class="menu-area">
                         <!--Mobile Navigation Toggler-->
                         <div class="mobile-nav-toggler">
                             <i class="icon-bar"></i>
                             <i class="icon-bar"></i>
                             <i class="icon-bar"></i>
                         </div>
                         <nav class="main-menu navbar-expand-md navbar-light">
                             <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                 <ul class="navigation clearfix">
                                     <li class="current"><a href="/">Home</a>

                                     </li>
                                     <li class="dropdown"><a href="/">Platform</a>
                                         <ul>
                                             <li><a href="{{route('clinic.app')}}">Clinic App</a></li>
                                             <li><a href="#">Clinic Website</a></li>
                                             <li><a href="#">Doctor App</a></li>
                                             <li><a href="#">Admin Portal</a></li>
                                         </ul>
                                     </li>

                                     <li class="dropdown"><a href="/">Specialties</a>
                                         <div class="megamenu">
                                             <div class="row clearfix">
                                                 <div class="col-lg-3 col-md-12 col-sm-12 column">
                                                     <ul>
                                                         <li><a href="{{route('speciality')}}">Childcare Clinic</a></li>
                                                         <li><a href="#"> Dentist Clinic</a></li>
                                                         <li><a href="#"> Eyecare Clinic</a></li>
                                                         <li><a href="#"> Physiotherapist Clinic</a></li>
                                                     </ul>
                                                 </div>
                                                 <div class="col-lg-3 col-md-12 col-sm-12 column">
                                                     <ul>
                                                         <li><a href="#"> Cardiologist Clinic</a></li>
                                                         <li><a href="#"> Pediatricianst Clinic</a></li>
                                                         <li><a href="#"> Chiropractor Clinic</a></li>
                                                         <li><a href="#"> Maternity Clinic</a></li>

                                                     </ul>
                                                 </div>
                                                 <div class="col-lg-3 col-md-12 col-sm-12 column">
                                                     <ul>
                                                         <li><a href="#"> ENT Clinic</a></li>
                                                         <li><a href="#"> Psychiatrist Clinic</a></li>
                                                         <li><a href="#"> Massage Clinic</a></li>
                                                     </ul>
                                                 </div>
                                                 <div class="col-lg-3 col-md-12 col-sm-12 column text-center">
                                                     <img src="{{asset('Healthonier/assets/images/banner/app.png')}}" alt="" class="img-fluid mb-4">
                                                     <a href="#" class="theme-btn">
                                                         Download our profile
                                                     </a>
                                                 </div>
                                             </div>
                                         </div>
                                     </li>

                                     <li class=""><a href="{{route('demo')}}">Demo</a>
                                     </li>
                                     <li class=""><a href="{{route('price')}}">Pricing</a>
                                     </li>
                                 </ul>
                             </div>
                         </nav>
                     </div>
                     <div class="btn-box">
                         <a href="/login" class="theme-btn-one mr-1"> Sign In</a>
                         <a href="{{route('clinic.signup')}}" class="theme-btn mr-1 mb-0"> Sign Up Free</a>
                         <div class="dropdown">
                             {{-- <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <a href="/"><img src="{{asset('Healthonier/assets/images/banner/eng.png')}}" class="flag" alt="">
                             ENG</a>
                             </span>
                             <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                 <a class="dropdown-item" href="#"><img src="{{asset('Healthonier/assets/images/banner/eng.png')}}" class="flag" alt=""> ENG</a>
                                 <a class="dropdown-item" href="#"><img src="{{asset('Healthonier/assets/images/banner/uae.png')}}" class="flag" alt=""> UAE</a>
                                 <a class="dropdown-item" href="#"><img src="{{asset('Healthonier/assets/images/banner/spain.png')}}" class="flag" alt=""> ES</a>
                                 <a class="dropdown-item" href="#"><img src="{{asset('Healthonier/assets/images/banner/german.png')}}" class="flag" alt=""> DE</a>
                                 <a class="dropdown-item" href="#"><img src="{{asset('Healthonier/assets/images/banner/dutch.png')}}" class="flag" alt=""> NL </a>
                                 <a class="dropdown-item" href="#"><img src="{{asset('Healthonier/assets/images/banner/ind.png')}}" class="flag" alt=""> Hindi</a>

                             </div> --}}
                             {{-- <div class="">
                             <select class="form-controlss changeLang">
                             <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                             <option value="fr" {{ session()->get('locale') == 'fr' ? 'selected' : '' }}>France</option>
                             <option value="it" {{ session()->get('locale') == 'it' ? 'selected' : '' }}>Italian</option>
                             <option value="ja" {{ session()->get('locale') == 'ja' ? 'selected' : '' }}>Japanese</option>
                             <option value="pt" {{ session()->get('locale') == 'pt' ? 'selected' : '' }}>Portuguese</option>
                             <option value="es" {{ session()->get('locale') == 'es' ? 'selected' : '' }}>Spanish</option>
                             </select>

                         </div> --}}
                         <div id="google_translate_element"></div>
                     </div>
                 </div>
             </div>
         </div>
         </div>

         <!--sticky Header-->
         <div class="sticky-header">
             <div class="auto-container">
                 <div class="outer-box">
                     <div class="logo-box">
                         <figure class="logo"><a href="/"><img src="{{asset('Healthonier/assets/images/logo.png')}}" alt=""></a>
                         </figure>
                     </div>
                     <div class="menu-area">
                         <nav class="main-menu clearfix">
                             <!--Keep This Empty / Menu will come through Javascript-->
                         </nav>
                     </div>

                     <div class="btn-box">
                         <a href="/login" class="theme-btn-one mr-1"> Sign In</a>
                         <a href="{{route('clinic.signup')}}" class="theme-btn mr-1 mb-0"> Sign Up Free</a>
                         {{-- <div class="dropdown">
                             <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <a href="index.html"><img src="{{asset('Healthonier/assets/images/banner/eng.png')}}" class="flag" alt="">
                         ENG</a>
                         </span>
                         <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                             <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/eng.png')}}" class="flag" alt=""> ENG</a>
                             <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/uae.png')}}" class="flag" alt=""> UAE</a>
                             <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/spain.png')}}" class="flag" alt=""> ES</a>
                             <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/german.png')}}" class="flag" alt=""> DE</a>
                             <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/dutch.png')}}" class="flag" alt=""> NL </a>
                             <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/ind.png')}}" class="flag" alt=""> Hindi</a>

                         </div>
                     </div> --}}
                 </div>
             </div>
         </div>
         </div>
     </header>
     <!-- main-header end -->

     <!-- Mobile Menu  -->
     <div class="mobile-menu">
         <div class="menu-backdrop"></div>
         <div class="close-btn"><i class="fas fa-times"></i></div>

         <nav class="menu-box">
             <div class="nav-logo"><a href="/"><img src="{{asset('Healthonier/assets/images/logo-2.png')}}" alt="" title=""></a>
             </div>
             <div class="menu-outer">
                 <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
             </div>
             <div class="contact-info">
                 <div class="btn-box">
                     <a href="/login" class="theme-btn-one mr-1"> Sign In</a>
                     <a href="{{route('clinic.signup')}}" class="theme-btn mr-1 mb-0"> Sign Up Free</a>
                     {{-- <div class="dropdown">
                         <span class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                             <a href="/"><img src="{{asset('Healthonier/assets/images/banner/eng.png')}}" class="flag" alt="">
                     ENG</a>
                     </span>
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                         <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/eng.png')}}" class="flag" alt=""> ENG</a>
                         <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/uae.png')}}" class="flag" alt=""> UAE</a>
                         <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/spain.png')}}" class="flag" alt=""> ES</a>
                         <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/german.png')}}" class="flag" alt=""> DE</a>
                         <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/dutch.png')}}" class="flag" alt=""> NL </a>
                         <a class="dropdown-item" href="index.html"><img src="{{asset('Healthonier/assets/images/banner/ind.png')}}" class="flag" alt=""> Hindi</a>

                     </div>
                 </div> --}}
             </div>
     </div>
     <script type="text/javascript">
         var url = "{{ route('changeLang') }}";

         $(".changeLang").change(function() {
             window.location.href = url + "?lang=" + $(this).val();
         });

         function googleTranslateElementInit() {
             new google.translate.TranslateElement({
                 pageLanguage: 'en'
                 , includedLanguages: 'en,hi,fr,it,ja,pt,es'
                 , autoDisplay: false
             , }, 'google_translate_element');
         }

     </script>
     </nav>
     </div><!-- End Mobile Menu -->
