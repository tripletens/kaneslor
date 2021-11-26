
@extends('layouts.landing')

@section('content')
          
<section class="banner" id="top" style="background-image: url(img/homepage-banner-image-1920x700.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="banner-caption">
                        <div class="line-dec"></div>
                        <h2>Easy Access to Jobs </h2>
                        <div class="blue-button">
                            <a href="{{route('contact-page')}}">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main>
        @include('const.landing-ourservices')

        @include('const.landing-featured-jobs')

        @include('const.landing-blog-posts')

        <section id="video-container">
            <div class="video-overlay"></div>
            <div class="video-content">
                <div class="inner">
                      <div class="section-heading">
                          <span>Contact Us</span>
                          <h2>Vivamus nec vehicula felis</h2>
                      </div>
                      <!-- Modal button -->

                      <div class="blue-button">
                        <a href="contact.html">Talk to us</a>
                      </div>
                </div>
            </div>
        </section>

        @include('const.landing-testimonials')
    </main>
@endsection