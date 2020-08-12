<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Medi</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('user/img/favicon.png') }}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/gijgo.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->
    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo-img">
                                <a href="/">
                                    <img src="{{Storage::url(App\Company::all()->first()->logo)}}" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="menu_wrap d-none d-lg-block">
                                <div class="menu_wrap_inner d-flex align-items-center justify-content-end">
                                    <div class="main-menu">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a href="{{url('/')}}">home</a></li>
                                                <li><a href="{{url('/about')}}">About</a></li>
                                                @if (session()->get('role')=='admin')
                                                <li><a>Admin <i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="{{url('/admin')}}">Admin</a></li>
                                                        <li class="ml-2">
                                                            <form action="{{ route('logout') }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Logout</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                                @elseif(session()->get('role')=='user')
                                                <li><a>User <i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        <li><a href="{{route('booking.show',Auth::user()->id)}}">Profile</a></li>
                                                        <li class="ml-2">
                                                            <form action="{{ route('logout') }}" method="POST">
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger">Logout</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                                @endif

                                               
                                                @guest
                                                    <li><a href="{{url('/login')}}">Login</a></li>
                                                    <li><a href="{{url('/register')}}">Register</a></li>
                                                @endguest
                                            </ul>
                                        </nav>
                                    </div>
                                    @auth
                                        <div class="book_room">
                                            <div class="book_btn">
                                                <a class="popup-with-form" href="#test-form">Book Appointment</a>
                                            </div>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
