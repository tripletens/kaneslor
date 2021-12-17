@extends('layouts.dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View All Job Interviews</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="row">
            @if(count($interviews) > 0)
                @foreach($interviews as $interview)
                <div class="col-md-4 col-xs-12 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <!-- `title`, `application_code`, `type`, `link`, `address`, `time`, `date`, `status`, -->
                            <div class="row">
                                <div class="col-6">
                                    <h4> {{$interview->title}}</h4>
                                </div>
                                <div class="col-6">
                                    <span class="alert alert-danger">{{$interview->application_code}}</span>
                                </div>
                            <div>
                            <div class="row">
                                <div class="col-6">
                                    <h4> @if($interview->type == "virtual") {{$interview->type}} @else 'In-Person' @endif</h4>
                                </div>
                                <div class="col-6">
                                    @if($interview->type == "virtual")
                                        <a href="{{$interview->link}}">Open meeting link here {{$interview->link}}</a>
                                    @else
                                        <div class="alert alert-info">{{$interview->address}}</div>
                                    @endif
                                </div>
                            <div>
                            <div class="row">
                                <div class="col-6">
                                    <h4> Time: </h4>
                                </div>
                                <div class="col-6">
                                    <span class="alert alert-danger">{{$interview->time}}</span>
                                </div>
                            <div>
                            <div class="row">
                                <div class="col-6">
                                    <h4> Date: </h4>
                                </div>
                                <div class="col-6">
                                    <span class="alert alert-danger">{{niceday($interview->date)}}</span>
                                </div>
                            <div>
                            <div class="row">
                                <div class="col-6">
                                    <h4> Status: </h4>
                                </div>
                                <div class="col-6">
                                    @if($interview->status == '1')
                                        <span class="alert alert-success">Active</span>
                                    @else
                                        <span class="alert alert-danger">Expired</span>
                                    @endif
                                </div>
                            <div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="col-md-12 col-xs-12 col-lg-12">
                <div class="d-flex card justify-content-center">
                    <span class="text-center alert alert-info m-5"> Sorry No Interviews Available </span>
                </div>
            </div>
            @endif
    </div>
</div>
<!-- /.container-fluid -->
@endsection