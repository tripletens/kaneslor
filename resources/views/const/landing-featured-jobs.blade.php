<section class="featured-places">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <span>Featured Jobs</span>
                    <h2>We have jobs suitable for you</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @if(count($jobs))
                @foreach($jobs as $job)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="featured-item">
                        <div class="thumb">
                            <div class="thumb-img">
                                <img src="{{$job->image}}" alt="">
                            </div>

                            <div class="overlay-content">
                                <strong title="Posted on"><i class="fa fa-calendar"></i> {{$job->created_at}}</strong> &nbsp;&nbsp;&nbsp;&nbsp;
                                <!-- <strong title="Type"><i class="fa fa-file"></i> Contract</strong> &nbsp;&nbsp;&nbsp;&nbsp; -->
                                <strong title="Location"><i class="fa fa-map-marker"></i> {{$job->state}}</strong>
                            </div>
                        </div>

                        <div class="down-content ">
                            <h4>{{$job->title}}</h4>

                            <p> {{Str::limit($job->description,30)}}</p>

                            <p><span><strong><sup>&#8358;</sup>{{number_format($job->amount,2)}}</strong></span></p>

                            <div class="text-button">
                                <a href="#">View More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <span class="alert alert-info text-center">No Jobs Available now</span>
            @endif
        </div>
    </div>
</section>