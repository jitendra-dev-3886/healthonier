 <!-- Header 
    ============================================= -->
 <header id="home">

     <!-- Start Navigation -->
     <nav class="navbar navbar-default attr-border navbar-fixed dark no-background bootsnav">

         <!-- Start Top Search -->
         <div class="container">
             <div class="row">
                 <div class="top-search">
                     <div class="input-group">
                         <form action="#">
                             <input type="text" name="text" class="form-control" placeholder="Search">
                             <button type="submit">
                                 <i class="fas fa-search"></i>
                             </button>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
         <!-- End Top Search -->

         <div class="container">
             <!-- Start Header Navigation -->
             <div class="navbar-header">
                 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                     <i class="fa fa-bars"></i>
                 </button>
                 <div class="bg-color"></div>
                 <a class="navbar-brand" href="#home">
                     <img src=" @if($data) {{$data->logo_path != '' ? asset($data->logo_path) : asset('doctordata/logo/1694002120.png')}} @endif " class="logo" alt="Logo">
                 </a>
             </div>
             <!-- End Header Navigation -->

             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="collapse navbar-collapse" id="navbar-menu">
                 <ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
                     <li>
                         <a class="smooth-menu" href="#home">Home</a>
                     </li>
                     <li>
                         <a class="smooth-menu" href="#about">About</a>
                     </li>
                     <li>
                         <a class="smooth-menu" href="#appointment">Appointment</a>
                     </li>
                     <li>
                         <a class="smooth-menu" href="#working">Working Hours</a>
                     </li>
                     <li>
                         <a class="smooth-menu" href="#testimonials">Testimonials</a>
                     </li>
                     <li>
                         <a class="smooth-menu" href="#contact">contact</a>
                     </li>
                 </ul>
             </div><!-- /.navbar-collapse -->
         </div>
     </nav>
     <!-- End Navigation -->

 </header>
 <!-- End Header -->
