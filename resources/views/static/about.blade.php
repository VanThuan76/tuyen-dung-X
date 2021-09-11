@extends('layouts.staticIndex')
<!-- end Header -->

<!-- Hero section -->
@section('content')

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

    <!-- Services section -->
    <div class="container">
        <div class="row col-spacing-30 icon-5xl text-center margin-bottom-70">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="border-all border-radius padding-30">
                    <i class="margin-top-10 ti-ruler-pencil text-dark"></i>
                    <h5 class="font-weight-normal margin-top-20">Graphic Design</h5>
                    <p class="margin-bottom-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="border-all border-radius padding-30">
                    <i class="margin-top-10 ti-camera text-dark"></i>
                    <h5 class="font-weight-normal margin-top-20">Photography</h5>
                    <p class="margin-bottom-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="border-all border-radius padding-30">
                    <i class="margin-top-10 ti-star text-dark"></i>
                    <h5 class="font-weight-normal margin-top-20">Social Marketing</h5>
                    <p class="margin-bottom-10">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
    <!-- end Services section -->




    <!-- Scroll to top button -->
    <div class="scrolltotop">
        <a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="ti-arrow-up"></i></a>
    </div>
    <!-- end Scroll to top button -->

@endsection
