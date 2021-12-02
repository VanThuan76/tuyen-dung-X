@extends('layouts.staticIndex')
<!-- end Header -->
@section('title')
    <title>
        {{'For Employees - EmployingX'}}
    </title>
@endsection
<!-- Hero section -->
@section('content')
    <div class="section-xl bg-image parallax" data-bg-src="{{asset('/static/assets/images/photo-1522071820081-009f0129c71c.jpg')}}">
        <div class="bg-black-06">
            <div class="container text-center">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                        <h1 class="display-4 margin-0">For employees</h1>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end bg-black-* -->
    </div>

    <div class="section">
        <div class="container">
            <div class="row col-spacing-40">
                <div class="col-12 col-lg-6">
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                </div>
                <div class="col-12 col-lg-6">
                    <p>Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus.</p>
                </div>
            </div><!-- end row -->


        </div><!-- end container -->
    </div>



    <!-- Services section -->
    <div class="section padding-top-0">
        <div class="container">
            <div class="row">
                <!-- Service box 1 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                          <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Service title</h5>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                </div>
                <!-- Service box 2 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
{{--                            <i class="fas fa-heart"></i>--}}
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Service title</h5>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                </div>
                <!-- Service box 3 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Service title</h5>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                </div>
                <!-- Service box 4 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Service title</h5>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                </div>
                <!-- Service box 5 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Service title</h5>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                </div>
                <!-- Service box 6 -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="feature-box dark">
                        <div class="feature-box-icon">
                            <img src="{{asset('/static/assets/images/x-logo.png')}}" style="width:25px; margin-top:25%; margin-left:3px">
                        </div>
                        <h5 class="font-weight-normal">Service title</h5>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                    </div>
                </div>
            </div><!-- end row -->
            <div class="row d-flex justify-content-center">
                <a class="button button-lg button-radius button-dark margin-top-40" href="{{route('register')}}">Register now!</a>

            </div>

        </div><!-- end container -->
    </div>
    <!-- end Services section -->




    <!-- Scroll to top button -->
    <div class="scrolltotop">
        <a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="ti-arrow-up"></i></a>
    </div>
    <!-- end Scroll to top button -->


@endsection
