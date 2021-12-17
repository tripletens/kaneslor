@extends('layouts.dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Job Application Test</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="card">
                <h4 class="card-title m-3 mt-3">Please Upload a Video file of your response to the questions below</h4>
                <em class="text-danger ml-3">Please Note you can only take the test once</em>
                <div class="card-body">
                    
                    @if(count($tests) > 0)
                    <form method="POST" enctype="multipart/form-data" action="{{route('process_job_tests')}}">
                        @csrf
                        <!-- `company_id`, `user_id`, `application_code`, `audio`, `video`, `status`, -->
                        <input type="hidden" name="application_code" value="{{$application[0]->code}}"/>
                        <input type="hidden" name="category_id" value="{{$application[0]->category}}"/>
                        @foreach($tests as $key => $value)
                            <div class="alert alert-info">
                                @if($value->title)
                                    <h3>{{ucfirst($value->title)}}</h3>
                                    @if(!empty($value->description))
                                        <p>{{$value->description}}</p>
                                    @endif
                                    <div class="form-group">
                                        <input type="hidden" name="question_id{{$key}}" value="{{$value->id}}">
                                        <input type="file" required name="question{{$key}}" placeholder="Upload a video of your response "/>
                                        <span class="text-danger">*** Only Mp4,AVI formats and max size of 5MB are accepted </span>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                        <button class="btn btn-danger btn block" type="submit">Submit</button>
                                </form>
                    @else
                    <span class="text-center alert d-flex justify-content-center alert-info m-3"> Sorry No Tests available now. Try again later</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection