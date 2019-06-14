<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Hotels | Mamaland</title>

    <!-- Favicon -->
    <link rel="icon" href="storage/img/core-img/favicon.png">
  
    <!-- Stylesheet -->
<link href="{{asset('css/bootstrap.css')}}" rel="stylesheet">

    <link href="{{ asset('css/w3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">



</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Search Form -->
        <div class="search-form d-flex align-items-center">
            <div class="container">
                <form action="index.html" method="get">
                    <input type="search" name="search-form-input" id="searchFormInput" placeholder="Type your keyword ...">
                    <button type="submit"><i class="icon_search"></i></button>
                </form>
            </div>
        </div>

        <!-- Top Header Area Start -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">

                    <div class="col-7">
                        <div class="top-header-content">

                            <a href="/"><span><h1 class="text-white"> Mamaland</h1></span></a>
                            <a href="/sites"><span> Attractions</span></a>
                            <a href="/hotels"><span>Hotels</span></a>
                            <a href="/news"><span> News</span></a>
                            <a href="/contact"><span> Contacts</span></a>
                          

                        </div>
                    </div>

                    <div class="col-6">
                        <div class="top-header-content">
                            
                            <!-- Top Social Area -->
                            <div class="top-social-area ml-auto">
                                @guest
                                    <a class="" href="/login">Login</a>
                                    <a class="" href="/create">Register</a>

                                @else
                                    <a class="" href="/dashboard">Dashboard</a>
                                @endguest
                            
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="robertoNav" style="margin: 0">

                        <!-- Logo -->
                        <a href="/hotels/{{ $hotel->id }}"><h3>{{$hotel->name}}</h3></a>
                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="active"><a href="/hotels/{{ $hotel->id }}" title="Hotels">Home</a></li>
                                    {{-- <li><a href="/hotels/rooms/{{ $hotel->id }}" title="View available rooms">Rooms</a></li> --}}
                                    <li><a href="/hotels/about/{{ $hotel->id }}">About Us</a></li>
                                    <li><a href="/hotels/news/{{ $hotel->id }}">News</a></li>
                                    <li><a href="/hotels/contact/{{ $hotel->id }}">Contact</a></li>
                                </ul>

                                
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    @yield('content')

    <!-- Footer Area Start -->
    <footer class="footer-area section-padding-80-0">
            <!-- Main Footer Area -->
            <div class="main-footer-area">
                <div class="container">
                    <div class="row align-items-baseline justify-content-between">
                        <!-- Single Footer Widget Area -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="single-footer-widget mb-80">
                                <!-- Footer Logo -->
    
                                <h4>{{ $hotel->name }}</h4>
                                <span>{{ $hotel->phone_1 }}</span>
                                <span>{{ $hotel->email }}</span>
                            <span>{{ $hotel->address }}</span>
                            </div>
                        </div>
    
                        <!-- Single Footer Widget Area -->
                        <div class="col-12 col-sm-6 col-lg-3">
                            <div class="single-footer-widget mb-80">
                                <!-- Widget Title -->
                                <h5 class="widget-title">Our Blog</h5>
    
                                <!-- Single Blog Area -->
                                <div class="latest-blog-area">
                                    <a href="#" class="post-title">Freelance Design Tricks How</a>
                                    <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> Jan 02, 2019</span>
                                </div>
    
                                <!-- Single Blog Area -->
                                <div class="latest-blog-area">
                                    <a href="#" class="post-title">Free Advertising For Your Online</a>
                                    <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i> Jan 02, 2019</span>
                                </div>
                            </div>
                        </div>
    
                        <!-- Single Footer Widget Area -->
                        <div class="col-12 col-sm-4 col-lg-2">
                            <div class="single-footer-widget mb-80">
                                <!-- Widget Title -->
                                <h5 class="widget-title">Links</h5>
    
                                <!-- Footer Nav -->
                                <ul class="footer-nav">
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> About Us</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Our Room</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> Career</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> FAQs</a></li>
                                </ul>
                            </div>
                        </div>
    
                        <!-- Single Footer Widget Area -->
                        <div class="col-12 col-sm-8 col-lg-4">
                            <div class="single-footer-widget mb-80">
                                <!-- Widget Title -->
                                <h5 class="widget-title">Subscribe Newsletter</h5>
                                <span>Subscribe our newsletter gor get notification about new updates.</span>
    
                                <!-- Newsletter Form -->
                                <form action="index.html" class="nl-form">
                                    <input type="email" class="form-control" placeholder="Enter your email...">
                                    <button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Copywrite Area -->
            <div class="container">
                <div class="copywrite-content">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-8">
                            <!-- Copywrite Text -->
                            <div class="copywrite-text">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <!-- Social Info -->
                            <div class="social-info">
                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer Area End -->
    {{-- 
        <!-- **** All JS Files ***** -->
        <!-- jQuery 2.2.4 -->
        <script src="js/jquery.min.js"></script>
        <!-- Popper -->
        <script src="js/popper.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- All Plugins -->
        <script src="js/roberto.bundle.js"></script>
        <!-- Active -->
        <script src="js/default-assets/active.js"></script> --}}
    
        <script src="{{ asset('js/js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/js/popper.min.js') }}"></script>
        <script src="{{ asset('js/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/js/roberto.bundle.js') }}"></script>
        <script src="{{ asset('js/moment.min.js') }}"></script>
        <script src="{{ asset('js/js/default-assets/active.js') }}"></script>
        <script src="{{ asset('js/daterangepicker.js') }}"></script>

<script>
    // alert()
    $(document).ready(function(){
         //Date range picker
         $('#reservation').daterangepicker({
            dateFormat:'yyyy-mm-dd',
            minDate: new Date()
            });
    });
           
     
</script>
        
    </body>
    
    </html>