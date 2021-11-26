<div class="wrap">
        <header id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <button id="primary-nav-button" type="button">Menu</button>
                        <a href="{{route('landing-page')}}"><div class="logo">
                            <img src="{{asset('images/logo.png')}}" style="height:100px;width:auto;" alt="Kaneslor Logo">
                        </div></a>
                        <nav id="primary-nav" class="dropdown cf">
                            <ul class="dropdown menu">
                                <li class='active'><a href="{{route('landing-page')}}">Home</a></li>

                                <li><a href="{{route('jobs-page')}}">Jobs</a></li>

                                <li>
                                    <a href="#">About</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{route('about-page')}}">About Us</a></li>
                                        <li><a href="{{route('team-page')}}">Team</a></li>
                                        <li><a href="{{route('blog-page')}}">Blog</a></li>
                                        <li><a href="{{route('testimonials-page')}}">Testimonials</a></li>
                                        <li><a href="{{route('terms-page')}}">Terms</a></li>
                                    </ul>
                                </li>

                                <li><a href="{{route('contact-page')}}">Contact Us</a></li>
                            </ul>
                        </nav><!-- / #primary-nav -->
                    </div>
                </div>
            </div>
        </header>
    </div>
      