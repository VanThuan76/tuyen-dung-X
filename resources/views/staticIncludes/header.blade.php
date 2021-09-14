<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
   @yield('title')
    <!-- Favicon -->
    <link href="{{asset('/static/assets/images/favicon.png')}}" rel="shortcut icon">
    <!-- CSS -->
    <link href="{{asset('/static/assets/plugins/bootstrap/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/owl-carousel/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/owl-carousel/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/magnific-popup/magnific-popup.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/sal/sal.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/css/theme.css')}}" rel="stylesheet">
    <!-- Fonts/Icons -->
    <link href="{{asset('/static/assets/plugins/font-awesome/css/all.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/themify/themify-icons.min.css')}}" rel="stylesheet">
    <link href="{{asset('/static/assets/plugins/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
    @yield('styles')
</head>
<body data-preloader="1">
@if (session('contact_success'))
    <div class="alert alert-success alert-dismissible fade show text-center" style="z-index: 999; position: fixed; width: 100%" role="alert">
        {{session('contact_success')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<!-- Header -->
<div class="header center sticky">
    <div class="container">
        <!-- Logo -->
        <div class="header-logo">
            <h3><a href="{{route('index')}}">employingx</a></h3>
            <!--
            <img class="logo-dark" src="../assets/images/your-logo-dark.png" alt="">
            <img class="logo-light" src="../assets/images/your-logo-light.png" alt="">
            -->
        </div>
        <!-- Menu -->
        <div class="header-menu">
            <ul class="nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{route('about')}}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('employee')}}">For Employees</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('company')}}">For Companies</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('contact')}}">Contact</a>
                </li>

            </ul>
        </div>
        <!-- Menu Extra -->
        <div class="header-menu-extra">
            <ul class="list-inline">
                <li><a href="{{route('login')}}">Log in</a></li>

            </ul>
        </div>
        <!-- Menu Toggle -->
        <button class="header-toggle">
            <span></span>
        </button>
    </div><!-- end container -->
</div>

