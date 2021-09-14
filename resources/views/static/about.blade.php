@extends('layouts.staticIndex')
<!-- end Header -->
@section('title')
    <title>
        {{'About - EmployingX'}}
    </title>
@endsection
<!-- Hero section -->
@section('content')
    <div class="section-xl bg-image parallax" data-bg-src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80">
        <div class="bg-black-06">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <h1 class="display-4 margin-0">About us</h1>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end bg-black-* -->
    </div>

    <!-- About section -->
    <div class="section">
        <div class="container">
            <div class="row align-items-center col-spacing-50">
                <div class="col-12 col-lg-5">
                    <h3 class="font-weight-light">We're a team of professionals who loves what they do</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                    <a class="button button-lg button-rounded button-reveal-right-dark margin-top-30" href="#"><span>Get In Touch</span><i class="ti-arrow-right"></i></a>
                </div>
                <div class="col-12 col-lg-7">
                    <div class="row gallery-wrapper col-spacing-10">
                        <!-- Gallery image box 1 -->
                        <div class="col-6 gallery-box">
                            <div class="gallery-img">
                                <a href="https://images.unsplash.com/photo-1552664730-d307ca884978?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" data-gallery-title="Gallery Image 1">
                                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Gallery image box 2 -->
                        <div class="col-6 gallery-box">
                            <div class="gallery-img">
                                <a href="https://images.unsplash.com/photo-1499540633125-484965b60031?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1951&q=80" data-gallery-title="Gallery Image 2">
                                    <img src="https://images.unsplash.com/photo-1499540633125-484965b60031?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1951&q=80" alt="">
                                </a>
                            </div>
                        </div>
                    </div><!-- end row/gallery-wrapper -->
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    <!-- end About section -->

    <!-- Features section -->
    <div class="section">
        <div class="container">
            <div class="row icon-5xl">
                <div class="col-12 col-md-4">
                    <i class="ti-briefcase text-dark"></i>
                    <h5 class="font-weight-normal margin-top-20">Mission</h5>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                </div>
                <div class="col-12 col-md-4">
                    <i class="ti-settings text-dark"></i>
                    <h5 class="font-weight-normal margin-top-20">Vision</h5>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                </div>
                <div class="col-12 col-md-4">
                    <i class="ti-face-smile text-dark"></i>
                    <h5 class="font-weight-normal margin-top-20">Values</h5>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
    <!-- end Features section -->




    <!-- Services section -->
    <div class="container">
        <div class="row text-center">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <h2 class="font-weight-normal">Our team</h2>
            </div>
        </div>
        <div class="row col-spacing-30 icon-5xl text-center margin-bottom-70">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="border-all border-radius padding-30">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png" style="width:150px; height: 150px" class="rounded-circle" alt="Cinque Terre">
{{--                    <i class="margin-top-10 ti-ruler-pencil text-dark"></i>--}}
                    <h5 class="font-weight-normal margin-top-20">Atdhe Lila</h5>
                    <p class="margin-bottom-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="border-all border-radius padding-30">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png" style="width:150px; height: 150px" class="rounded-circle" alt="Cinque Terre">

                    {{--                    <i class="margin-top-10 ti-camera text-dark"></i>--}}
                    <h5 class="font-weight-normal margin-top-20">Albi Kusari</h5>
                    <p class="margin-bottom-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="border-all border-radius padding-30">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png" style="width:150px; height: 150px" class="rounded-circle" alt="Cinque Terre">

                    {{--                    <i class="margin-top-10 ti-star text-dark"></i>--}}
                    <h5 class="font-weight-normal margin-top-20">Ilir Perolli</h5>
                    <p class="margin-bottom-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
    <!-- end Services section -->

    <!-- Clients Section -->
    @include('staticIncludes.clients')
    <!-- End of Clients Section -->
    <!-- End of Clients Section -->
    <!-- Scroll to top button -->
    <div class="scrolltotop">
        <a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="ti-arrow-up"></i></a>
    </div>
    <!-- end Scroll to top button -->

@endsection
