@extends('layouts.staticIndex')
<!-- end Header -->
@section('title')
    <title>
        {{'Home - EmployingX'}}
    </title>
@endsection
<!-- Hero section -->
@section('content')
<div class="owl-carousel owl-nav-overlay owl-dots-overlay" data-owl-nav="false" data-owl-dots="true" data-owl-items="1" data-owl-autoPlay="true">
    <!-- Slider Item 1 -->
    <div class="bg-image" data-bg-src="{{asset('/static/assets/images/photo-1486406146926-c627a92ad1ab.jpg')}}">
        <div class="section-xl bg-black-03">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                        <h1 style="background: -webkit-linear-gradient(#F8C506, #CDA305);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;">Welcome to EmployingX</h1>
                        <h4 class="font-weight-light letter-spacing-1 margin-bottom-20 text-white">Are you looking for the missing variable to your companies growth? Get in touch!
                        </h4>
                        <a class="button button-lg button-radius button-white-3 margin-top-20" href="{{route('company')}}">Learn more</a>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
    </div>
    <!-- Slider Item 2 -->
    <div class="bg-image" data-bg-src="{{asset('/static/assets/images/photo-1522071820081-009f0129c71c.jpg')}}">
        <div class="section-xl bg-black-03">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-6">
                        <h1 style="background: -webkit-linear-gradient(#F8C506, #CDA305);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;">Welcome to EmployingX</h1>
                        <h4 class="font-weight-light letter-spacing-1 margin-bottom-20 text-white">Join our team and work with the largest companies from the comfort of your own home.
                        </h4>
                        <a class="button button-lg button-radius button-white-3 margin-top-20" href="{{route('employee')}}">Learn more</a>
                    </div>
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
    </div>
</div><!-- end owl-carousel -->
<!-- end Hero section -->

<!-- About section -->
<div class="section padding-top-0">
    <div class="container">
        <div class="row align-items-center margin-top-70 col-spacing-50">
            <!-- About Image -->
            <div class="col-12 col-lg-6">
                <img src="{{asset('/static/assets/images/photo-1454165804606-c3d57bc86b40.jpg')}}" alt="">
            </div>
            <!-- About Content -->
            <div class="col-12 col-lg-6">
                <h3 class="font-weight-light">About EmployingX</h3>
                <p style="  text-align: justify;text-justify: inter-word;">EmployingX is a staffing company that provides staffing services for companies from all over the world. We offer entry, mid-level and senior talents in different professions.  We specialize in finding professional, trustworthy and affordable talent that will work remotely for your company.
                    Companies will not need to directly hire our talent, as such will not have any legal obligations towards them. These are project based talent that can work on short term and long term projects, whether part-time or full-time.
                </p>
{{--                <a class="button button-lg button-radius button-dark margin-top-40" href="{{route('about')}}">Learn more</a>--}}
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end About section -->

<div class="section-lg bg-image bg-image-gradient-top parallax" data-bg-src="../assets/images/background.jpg" style="padding-top: 0px">
    <div class="bg-white-06">
        <div class="container text-center" style="padding:50px">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                    <h1 class="font-weight-light margin-0">What we do</h1>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
</div>

<div class="section padding-top-0">
    <div class="container">
        <div class="row icon-5xl text-center">
            <div class="col-12 col-lg-6">
                <div class="border-all border-radius padding-40 hover-shadow">
                    <div class="circle-box-xl bg-grey margin-bottom-20">
                        <h2 class="font-weight-medium">1</h2>
                    </div>
                    <h5 class="font-weight-normal">Find the Ideal Candidate</h5>
                    <p>We help you find the ideal talent. We host a large database of candidates who have been vetted and trained. We use your job description and company culture to pinpoint the most talent candidates for the position, using our metrics and filters.</p>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="border-all border-radius padding-40 hover-shadow">
                    <div class="circle-box-xl bg-grey margin-bottom-20">
                        <h2 class="font-weight-medium">2</h2>
                    </div>
                    <h5 class="font-weight-normal">Recruiting Process</h5>
                    <p>We assist companies during the recruiting process, once we have identified the ideal potential candidates we assist with providing the necessary documentation, setting up the interviews, onboarding the successful candidate.</p>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="border-all border-radius padding-40 hover-shadow">
                    <div class="circle-box-xl bg-grey margin-bottom-20">
                        <h2 class="font-weight-medium">3</h2>
                    </div>
                    <h5 class="font-weight-normal">Train </h5>
                    <p>All our talents go through our Training Academy, where we work with them on their communication skills; technology skills and remote work, so that when they start working for your company they are already accustomed to remote international work.</p>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="border-all border-radius padding-40 hover-shadow">
                    <div class="circle-box-xl bg-grey margin-bottom-20">
                        <h2 class="font-weight-medium">4</h2>
                    </div>
                    <h5 class="font-weight-normal">Manage Talent </h5>
                    <p>The successful candidate will work remotely for your company, however we will take care of everything, starting from the employment contract, health insurance, vacation days and more. We regularly meet with the company and talents if changes are needed.</p>
                </div>
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>

<div class="section padding-top-0">
    <div class="container">
        <div class="row align-items-center margin-top-30 col-spacing-50">
            <!-- About Image -->

            <!-- About Content -->
            <div class="col-12 col-lg-6">
                <h3 class="font-weight-light">What we offer</h3>
                <p style="  text-align: justify;text-justify: inter-word;"><span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> A transparent, efficient and secure process <br>
                    <span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> A continuous support for our clients <br>
                    <span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> Regular meetings and evaluation of talent performance <br>
                    <span style="color:#daa520; font-weight:bold; font-size:20px"> &#8212;</span> High level talents ready to start on day one
                </p>
                {{--                <a class="button button-lg button-radius button-dark margin-top-40" href="{{route('about')}}">Learn more</a>--}}
            </div>
            <div class="col-12 col-lg-6">
                <img src="{{asset('/static/assets/images/offer.jpg')}}" alt="">
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>

<!-- Facts section -->
<div class="section-lg bg-image parallax" data-bg-src="{{asset('/static/assets/images/photo-1542744173-8e7e53415bb0.jpg')}}">
    <div class="bg-dark-grey-07">
        <div class="container text-center">
            <div class="row">
                <!-- Counter box 1 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">100</h1>
                    <h6 class="font-small font-weight-normal uppercase">Clients</h6>
                </div>
                <!-- Counter box 2 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">100</h1>
                    <h6 class="font-small font-weight-normal uppercase">Employees</h6>
                </div>
                <!-- Counter box 3 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">100</h1>
                    <h6 class="font-small font-weight-normal uppercase">Partners</h6>
                </div>
                <!-- Counter box 4 -->
                <div class="col-12 col-sm-6 col-md-3">
                    <h1 class="font-weight-light counter">100</h1>
                    <h6 class="font-small font-weight-normal uppercase">Satisfaction rate</h6>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
</div>
<!-- end Facts section -->

<!-- Blog section -->
<!-- About section -->
<div class="section-lg">
    <div class="container">
        <div class="row col-spacing-50 align-items-center">
            <div class="col-12 col-lg-6">
                <div class="box-shadow-with-hover">
                    <img src="{{asset('/static/assets/images/256708521_637153220617671_3082657883725688017_n.jpg')}}" alt="">
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <h2 class="font-weight-light">How it works</h2>
                <p style="  text-align: justify;text-justify: inter-word;">Our job is to find you the most suitable candidate to fill your vacancy. Whether you need a short term candidate to work on an assignment; to replace one of your employees on short notice or if you need a candidate for long term we can provide you with them. You can also chose the form of payment whether you wish to pay a fixed salary, per hour or per project.
                    All you have to do is contact us and let us know what kind of job position you need filled, when you need them filled and for how long.
                   <br><br> We will use our vast database to find you the best suitable candidates for you and send you their profiles which we can then review together.  We will also assist you during the recruitment process starting from setting up interviews and providing the necessary documentation.
                    The successful candidates will work for you however will not be employed by you, this way we take care of everything: health insurance, vacation days, medical leave and more.  You will only be preoccupied with the candidates work performance, should you not be happy we will help you find a suitable replacement. </p>
{{--                <a class="button button-lg button-rounded button-reveal-right-outline-grey margin-top-30" href="{{route('about')}}">--}}
{{--                    <i class="ti-arrow-right"></i>--}}
{{--                    <span>Learn more</span>--}}
{{--                </a>--}}
            </div>
        </div><!-- end row -->
    </div><!-- end container -->
</div>
<!-- end About section -->
<!-- end Blog section -->

<div class="section-xl bg-image parallax" data-bg-src="{{asset('/static/assets/images/photo-1527689368864-3a821dbccc34.jpg')}}">
    <div class="bg-black-06">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <h2 class="font-weight-light margin-0">Not yet registered? <br> Register now!</h2>
                </div>
                <div class="col-12 col-lg-6 text-lg-right">
                    <a class="button button-xl button-radius button-white-3" href="{{route('register')}}">Register now</a>
                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
</div>


<!-- Clients section -->
@include('staticIncludes.clients')
<!-- end Clients section -->


<!-- Parallax section -->
<div class="section-xl bg-image parallax" data-bg-src="{{asset('/static/assets/images/photo-1587560699334-cc4ff634909a.jpg')}}">
    <div class="bg-black-06">
        <div class="container text-center">
            <div class="row">
                <div class="col-12 col-md-10 offset-md-1 col-lg-10">
                    <h2>Do you have any questions?</h2>
                    <div class="row">
                        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 text-center">
                            <!-- Contact Form -->
                            <form action="http://127.0.0.1:8000/contact/store" method="POST">
                                <input type="hidden" name="_token" value="J9vUThkahlOJgVfnDzfalohbdeJ4b0APqhEWoMMh">                    <input type="hidden" name="_method" value="POST">                <div class="contact-form">
                                    <form method="post" id="contactform">
                                        <div class="form-row">
                                            <div class="col-12 col-sm-6">

                                                <input type="text" id="name" style="border-color:#D0D0D0; color:white" name="name" autocomplete="off" placeholder="Name" required>

                                            </div>

                                            <div class="col-12 col-sm-6">
                                                <input type="email" id="email" style="border-color:#D0D0D0; color:white" name="email" autocomplete="off" placeholder="E-Mail" required>
                                            </div>
                                        </div>
                                        <input type="text" id="subject" style="border-color:#D0D0D0; color:white" name="subject" autocomplete="off" placeholder="Subject" required>
                                        <textarea name="message" id="message" style="border-color:#D0D0D0; color:white" placeholder="Message"></textarea>
                                        <button class="button button-lg button-rounded button-outline-white-2" type="submit">Send Message</button>
                                    </form>
                                    <!-- Submit result -->


                                </div><!-- end contact-form -->
                            </form>
                        </div>
                    </div><!-- end row -->                </div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div>
</div>
<!-- end Parallax section -->

<!-- Scroll to top button -->
<div class="scrolltotop">
    <a class="button-circle button-circle-sm button-circle-dark" href="#"><i class="ti-arrow-up"></i></a>
</div>
<!-- end Scroll to top button -->


@endsection
