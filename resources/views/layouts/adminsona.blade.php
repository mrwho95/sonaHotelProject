<?php date_default_timezone_set('Asia/Kuala_Lumpur');?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sona Project</title>

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Section Begin -->
    <!-- <div class="offcanvas-menu-overlay"></div>
    <div class="canvas-open">
        <i class="icon_menu"></i>
    </div>
    <div class="offcanvas-menu-wrapper">
        <div class="canvas-close">
            <i class="icon_close"></i>
        </div>
        <div class="search-icon  search-switch">
            <i class="icon_search"></i>
        </div>
        <div class="header-configure-area">
            <div class="language-option">
                <img src="{{ asset('img/flag.jpg') }}" alt="">
                <span>EN <i class="fa fa-angle-down"></i></span>
                <div class="flag-dropdown">
                    <ul>
                        <li><a href="#">Zi</a></li>
                        <li><a href="#">Fr</a></li>
                    </ul>
                </div>
            </div>
            <a href="#" class="bk-btn">Booking Now</a>
        </div>
        <nav class="mainmenu mobile-menu">
            <ul>
                <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./rooms.html">Rooms</a></li>
                <li><a href="./about-us.html">About Us</a></li>
                <li><a href="./pages.html">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./room-details.html">Room Details</a></li>
                        <li><a href="#">Deluxe Room</a></li>
                        <li><a href="#">Family Room</a></li>
                        <li><a href="#">Premium Room</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">News</a></li>
                <li><a href="./contact.html">Contact</a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="top-social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-tripadvisor"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
        </div>
        <ul class="top-widget">
            <li><i class="fa fa-phone"></i> (12) 345 67890</li>
            <li><i class="fa fa-envelope"></i> info.colorlib@gmail.com</li>
        </ul>
    </div> -->
    <!-- Offcanvas Menu Section End -->

    <!-- Header Section Begin -->
    <header class="header-section">
        <div class="top-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <ul class="tn-left">
                            <li><i class="fa fa-phone"></i> (03) 118888989</li>
                            <li><i class="fa fa-envelope"></i> sonaProperty@gmail.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-7">
                        <div class="tn-right">
                            <!-- <div class="top-social">
                                <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.tripadvisor.com.my/"><i class="fa fa-tripadvisor"></i></a>
                                <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                            </div>
                            <a href="#" class="bk-btn">Booking Now</a> -->
                        <!-- <div class="language-option">
                                <img src="{{ asset('img/flag.jpg') }}" alt="">
                                <span>EN <i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="#">Zi</a></li>
                                        <li><a href="#">Fr</a></li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- Authentication Links -->
                            @guest
                                <a href="{{ route('login') }}" class="bk-btn">{{ __('Login') }}</a>
                                @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bk-btn">{{ __('Register') }}</a>
                                @endif
                            @else
                            <div class="language-option">
                                <span>{{ Auth::user()->name }}<i class="fa fa-angle-down"></i></span>
                                <div class="flag-dropdown">
                                    <ul>
                                        <li><a href="{{route('profile')}}">My Profile</a></li>
                                        <li><a href="{{route('myBooking')}}">My Bookings</a></li>
                                        <li><a href="#">Inbox</a></li>
                                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form></li>
                                    </ul>
                                </div>
                            </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="menu-item">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="logo">
                            <a href="{{route('adminEditRoom.index')}}">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="nav-menu">
                            <nav class="mainmenu">
                                <ul>
                                    <!-- request::is('') == url pattern -->
                                    <!-- request::routeIs('') == route name pattern-->
                                    <li class="{{ Request::is('adminDashboard*') ? 'active' : '' }}"><a href="{{route('adminDashboard')}}">Dashboard</a></li>
                                    <li class="{{ Request::is('adminEditRoom*') ? 'active' : '' }}"><a href="{{route('adminEditRoom.index')}}">Room</a>
                                        <ul class="dropdown">
                                            <li class="{{ Request::routeIs('addDataIndex') ? 'active' : '' }}"><a href="{{route('addDataIndex')}}">Add Room</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ Request::is('adminCustomer*') ? 'active' : '' }}"><a href="{{route('adminCustomer.index')}}">Customer</a>
                                        <ul class="dropdown">
                                            <li class="{{ Request::routeIs('adminCustomerBooking') ? 'active' : '' }}"><a href="{{route('adminCustomerBooking')}}">Booking</a></li>
                                        </ul>
                                    </li>
                                    <li class="{{ Request::routeIs('promotion') ? 'active' : '' }}"><a href="{{route('promotion')}}">Promotion</a></li>
                                    <!-- <li class="{{ Request::is('blog_details*') ? 'active' : '' }}"><a href="{{route('blog_details')}}">Pages</a>
                                        <ul class="dropdown">
                                            <li class="{{ Request::is('blog_details*') ? 'active' : '' }}"><a href="{{route('blog_details')}}">Blog Details</a></li>
                                            <li><a href="{{route('room_details')}}">Room Details</a></li>
                                            <li><a href="#">Family Room</a></li>
                                            <li><a href="#">Premium Room</a></li>
                                        </ul>
                                    </li> -->
                                    <!-- <li class="{{ Request::is('blogs*') ? 'active' : '' }}"><a href="{{route('blogs')}}">Blog</a></li>
                                     -->
                                </ul>
                            </nav>
                            <div class="nav-right search-switch">
                                <i class="icon_search"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    
    <div id = "app">
        <main class="">
            @yield('content')
        </main>
    </div>
    
    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-text">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="ft-about">
                            <div class="logo">
                                <a href="#">
                                    <img src="{{ asset('img/footer-logo.png') }}" alt="">
                                </a>
                            </div>
                            <p>We inspire and reach millions of travelers<br /> across 90 local websites</p>
                            <div class="fa-social">
                                <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                                <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.tripadvisor.com.my/"><i class="fa fa-tripadvisor"></i></a>
                                <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
                                <a href="https://www.youtube.com/"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-contact">
                            <h6>Contact Us</h6>
                            <ul>
                                <li> (03) 118888989</li>
                                <li> sonaProperty@gmail.com</li>
                                <li>Jalan Bukit Ria, Taman Bukit Mewah, 43000 Kajang, Selangor</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="ft-newslatter">
                            <h6>New latest</h6>
                            <p>Get the latest updates and offers.</p>
                            <form action="#" class="fn-form">
                                <input type="text" placeholder="Email">
                                <button type="submit"><i class="fa fa-send"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-option">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <ul>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Environmental Policy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-5">
                        <div class="co-text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>


    @include('sweetalert::alert')

</body>

</html>

<script>
    $(document).ready(function(){

        $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('adminCustomer.index') }}",
            },
            columns: [
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'gender',
                name: 'gender'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'phonenumber',
                name: 'phonenumber'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false
            }
            ]
        });

    });
</script>