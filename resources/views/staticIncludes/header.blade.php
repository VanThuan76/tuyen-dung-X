<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <link rel="icon" href="{{asset('/assets/img/logos/logoEmp.jpg')}}" type="image/gif"/>
    <meta property="og:image" content="{{asset('/assets/img/logos/logo-meta.jpg')}}"/>

   @yield('title')
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
    <meta name="description" content="EmployingX - Online Recruitment Platform" />
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
            <a href="{{route('index')}}"> <img class="logo-dark" style="height: 30px" src="{{asset('/assets/img/logos/logo.png')}}" alt=""></a>
{{--            <h3><a href="{{route('index')}}">employingx</a></h3>--}}
            <!--
            <img class="logo-dark" src="../assets/images/your-logo-dark.png" alt="">
            <img class="logo-light" src="../assets/images/your-logo-light.png" alt="">
            -->
        </div>
        <!-- Menu -->
        <div class="header-menu">
            <ul class="nav">

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{route('about')}}">About</a>--}}
{{--                </li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="{{route('employee')}}">For Talents</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('company')}}">For Companies</a>
                </li>
                @if (auth()->user() && auth()->user()->role->name =='user')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('job.list')}}">For Users</a>
                    </li>
                @endif

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{route('contact')}}">Contact</a>--}}
{{--                </li>--}}

            </ul>
        </div>
        <!-- Menu Extra -->
        <div class="header-menu-extra">
            <ul class="list-inline">

                @if(auth()->user())
                    @if(auth()->user()->email_verified_at == null)
                    <a href="https://mail.google.com" target="_blank">
                        <button style="padding-right: 50px; color: red; background: none; border: none; cursor: pointer;">
                            Not verify email
                        </button>
                    </a>
                    @endif
                @endif
                <li><a href="{{route('login')}}">@if (!auth()->guest()) @if (auth()->user()->role->name=='administrator' || auth()->user()->role->name=='user') {{auth()->user()->name. " " . auth()->user()->surname}} @else {{auth()->user()->company->name}} @endif @else Log in @endif </a></li>

            </ul>
        </div>
        <!-- Menu Toggle -->
        <button class="header-toggle">
            <span></span>
        </button>
    </div><!-- end container -->
</div>

