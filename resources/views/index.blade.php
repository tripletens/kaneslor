
@extends('layouts.landing')

@section('content')
          
<section class="banner" id="top" style="background-image: url({{asset('img/Kanselor.jfif')}});">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Easy Access to Jobs </h2>
                        <div class="row" style="width:50%;">
                            <div class="col-md-6">
                                <div class="blue-button">
                                    <a href="{{route('register')}}">Register as an Employer</a>
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="blue-button">
                                    <a href="{{route('register')}}">Register as an Applicant</a>
                                </div> 
                            </div>
                            <!-- <div class="blue-button">
                                <a href="{{route('contact-page')}}">Register as an Employer</a>
                            </div> -->
                            <!-- <div class="blue-button">
                                <a href="{{route('contact-page')}}">Register as an Applicant </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        @include('const.landing-ourservices')

        <section class="featured-places">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <span>Why Choose us</span>
                            <h2> We Provide Jobs to over 10 million Nigerians</h2>
                        </div>
                    </div> 
                </div> 
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="featured-item">
                            <div class="down-content"  style="height:200px;">

                                <h2 class="text-center my-3 mx-5">Employers </h2>

                                <p class="text-center">As an employer, we provide you with immediate access to top-quality candidates</p>

                                <div class="blue-button" style="margin-bottom:10px;display:flex; flex-direction:row; align:center;justify-content:center;">
                                    <a href="{{route('register')}}">Get Started</a>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="featured-item" >

                            <div class="down-content" style="height:200px;">
                                <h2 class="text-center my-3">Job Seeker</h2>

                                <p class="text-center mt-4">We make it easier to get jobs that suits you</p>

                                <div class="blue-button mt-5" style="margin-bottom:10px;display:flex; flex-direction:row; align:center;justify-content:center;">
                                    <a href="{{route('register')}}">Get Started</a>
                                </div>
                                <br/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content">
                <div class="inner">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/G8W5hAdSMkc" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      <!-- <div class="section-heading">
                          <span>Contact Us</span>
                          <h2>Let get in touch</h2>
                      </div> -->
                      <!-- Modal button -->

                      <!-- <div class="blue-button">
                        <a href="{{route('contact-page')}}">Talk to us</a>
                      </div> -->
                </div>
            </div>
        </section>

        @include('const.landing-counter')

        @include('const.landing-testimonials')
        @include('const.landing-map')
    </main>
@endsection