@extends('layouts.staticIndex')
<!-- end Header -->

<!-- Hero section -->
@section('content')
<div class="owl-carousel owl-nav-overlay owl-dots-overlay" data-owl-nav="false" data-owl-dots="true" data-owl-items="1" data-owl-autoPlay="true">
    <!-- Slider Item 1 -->
    <div class="bg-image" data-bg-src="{{asset('https://images.unsplash.com/photo-1521737852567-6949f3f9f2b5?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1930&q=80')}}">
        <div class="section-xl bg-black-03">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                        <h1>Welcome to EmployingX</h1>
                        <a class="button button-lg button-radius button-white-3 margin-top-20" href="#">Learn more</a>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
    </div>
    <!-- Slider Item 2 -->
    <div class="bg-image" data-bg-src="{{asset('https://images.unsplash.com/photo-1522071820081-009f0129c71c?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')}}">
        <div class="section-xl bg-black-03">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                        <h1>Welcome to EmployingX</h1>
                        <a class="button button-lg button-radius button-white-3 margin-top-20" href="#">Learn more</a>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
    </div>
</div><!-- end owl-carousel -->
<!-- end Hero section -->

<!-- Features section -->
<div class="section">
    <div class="container">
        <div class="row icon-5xl">
            <div class="col-12 col-md-4">
                <i class="ti-briefcase text-dark"></i>
                <h5 class="font-weight-normal margin-top-20">Professional</h5>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>
            <div class="col-12 col-md-4">
                <i class="ti-settings text-dark"></i>
                <h5 class="font-weight-normal margin-top-20">Experienced</h5>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>
            <div class="col-12 col-md-4">
                <i class="ti-face-smile text-dark"></i>
                <h5 class="font-weight-normal margin-top-20">Connected</h5>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end Features section -->

<!-- About section -->
<div class="section padding-top-0">
    <div class="container">
        <div class="row align-items-center col-spacing-50">
            <!-- About Image -->
            <div class="col-12 col-lg-6">
                <img src="{{asset('https://images.unsplash.com/photo-1557425529-b1ae9c141e7d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80')}}" alt="">
            </div>
            <!-- About Content -->
            <div class="col-12 col-lg-6">
                <h3 class="font-weight-light">We believe that teamwork divides the tasks and multiplies the success</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                <a class="button button-lg button-radius button-dark margin-top-40" href="#">Learn more</a>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end About section -->

<!-- Facts section -->
<div class="section-lg bg-image parallax" data-bg-src="{{asset('https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80')}}">
    <div class="bg-dark-grey-07">
        <div class="container text-center margin-bottom-70">
            <div class="row">
                <!-- Counter box 1 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">100</h1>
                    <h6 class="font-small font-weight-normal uppercase">Fact One</h6>
                </div>
                <!-- Counter box 2 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">100</h1>
                    <h6 class="font-small font-weight-normal uppercase">Fact Two</h6>
                </div>
                <!-- Counter box 3 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">100</h1>
                    <h6 class="font-small font-weight-normal uppercase">Fact Three</h6>
                </div>
                <!-- Counter box 4 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">100</h1>
                    <h6 class="font-small font-weight-normal uppercase">Fact Four</h6>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
</div>
<!-- end Facts section -->

<!-- Blog section -->
<div class="section">
    <div class="container">
        <div class="margin-bottom-70">
            <div class="row align-items-end">
                <div class="col-12 col-sm-6">
                    <h2 class="font-weight-normal margin-0">Latest Posts</h2>
                </div>
                <div class="col-12 col-sm-6 text-sm-right">
                    <a class="button-text-1" href="#">Read All Posts</a>
                </div>
            </div>
        </div>
        <div class="owl-carousel" data-owl-nav="false" data-owl-margin="30" data-owl-xs="1" data-owl-sm="1" data-owl-md="1" data-owl-lg="2" data-owl-xl="2" data-owl-autoPlay="true">
            <!-- Blog Slider Item 1 -->
            <div>
                <div class="hoverbox-9">
                    <a href="#">
                        <img src="{{asset('/static/assets/images/col-1.jpg')}}" alt="">
                        <div class="content bg-dark">
                            <span class="font-family-tertiary font-small font-weight-normal uppercase margin-0 text-white">Category</span>
                        </div>
                    </a>
                </div>
                <div class="padding-30">
                    <h5 class="font-weight-normal margin-0"><a href="#">Blog Post Title</a></h5>
                    <span>Apr 29, 2019</span>
                </div>
            </div>
            <!-- Blog Slider Item 2 -->
            <div>
                <div class="hoverbox-9">
                    <a href="#">
                        <img src="{{asset('/static/assets/images/col-1.jpg')}}" alt="">
                        <div class="content bg-dark">
                            <span class="font-family-tertiary font-small font-weight-normal uppercase margin-0 text-white">Category</span>
                        </div>
                    </a>
                </div>
                <div class="padding-30">
                    <h5 class="font-weight-normal margin-0"><a href="#">Blog Post Title</a></h5>
                    <span>Apr 28, 2019</span>
                </div>
            </div>
            <!-- Blog Slider Item 3 -->
            <div>
                <div class="hoverbox-9">
                    <a href="#">
                        <img src="{{asset('/static/assets/images/col-1.jpg')}}" alt="">
                        <div class="content bg-dark">
                            <span class="font-family-tertiary font-small font-weight-normal uppercase margin-0 text-white">Category</span>
                        </div>
                    </a>
                </div>
                <div class="padding-30">
                    <h5 class="font-weight-normal margin-0"><a href="#">Blog Post Title</a></h5>
                    <span>Apr 27, 2019</span>
                </div>
            </div>
        </div><!-- end owl-carousel -->
    </div><!-- end container -->
</div>
<!-- end Blog section -->

<div class="section-xl bg-image parallax" data-bg-src="{{asset('https://images.unsplash.com/photo-1527689368864-3a821dbccc34?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80')}}">
    <div class="bg-black-06">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <h2 class="font-weight-light margin-0">Not yet registered? <br> Register now!</h2>
                </div>
                <div class="col-12 col-lg-6 text-lg-right">
                    <a class="button button-xl button-radius button-white-3" href="#">Register now</a>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
</div>

<!-- Clients section -->
<div class="section border-top">
    <div class="container">
        <div class="margin-bottom-70">
            <div class="row text-center">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h2 class="font-weight-normal">Our Trusted Clients</h2>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                </div>
            </div>
        </div>
        <ul class="clients-grid column-5">
            <li>
                <a href="#"><img src="{{asset('/static/assets/images/col-5.jpg')}}" alt=""></a>
            </li>
            <li>
                <a href="#"><img src="{{asset('/static/assets/images/col-5.jpg')}}" alt=""></a>
            </li>
            <li>
                <a href="#"><img src="{{asset('/static/assets/images/col-5.jpg')}}" alt=""></a>
            </li>
            <li>
                <a href="#"><img src="{{asset('/static/assets/images/col-5.jpg')}}" alt=""></a>
            </li>
            <li>
                <a href="#"><img src="{{asset('/static/assets/images/col-5.jpg')}}" alt=""></a>
            </li>
            <li>
                <a href="#"><img src="{{asset('/static/assets/images/col-5.jpg')}}" alt=""></a>
            </li>
            <li>
                <a href="#"><img src="{{asset('/static/assets/images/col-5.jpg')}}" alt=""></a>
            </li>
            <li>
                <a href="#"><img src="{{asset('/static/assets/images/col-5.jpg')}}" alt=""></a>
            </li>
            <li>
                <a href="#"><img src="{{asset('/static/assets/images/col-5.jpg')}}" alt=""></a>
            </li>
            <li>
                <a href="#"><img src="{{asset('/static/assets/images/col-5.jpg')}}" alt=""></a>
            </li>
        </ul>
    </div><!-- end container -->
</div>
<!-- end Clients section -->



<!-- Scroll to top button -->
<div class="scrolltotop">
    <a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="ti-arrow-up"></i></a>
</div>
<!-- end Scroll to top button -->


@endsection
