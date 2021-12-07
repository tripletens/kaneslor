@extends('layouts.dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View All Jobs Applications</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table id="view_jobs" class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Application Code</th>
                                <th>Job Position</th>
                                <th>Category</th>

                                <th> Status</th>
                                <th>Date Registered</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($applications) > 0)
                            @foreach($applications as $key => $application)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td> {{$application->code}}</td>
                                <td> {{$application->position}}</td>
                                <td> {{$application->category_name}}</td>
                                <td> @if($application->status == 1)
                                    <span class="badge badge-success">Approved</span>
                                    @elseif($application->status == 0)
                                    <span class="badge badge-danger">Rejected</span>
                                    @else
                                    <span class="badge badge-info">Pending</span>
                                    @endif
                                </td>
                                <td>{{date( $application->created_at)}}</td>
                                <th>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="{{route('view-one-application',$application->code)}}" title="View Application Details">
                                            <button type="button" class="btn btn-outline-danger">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                                </svg>
                                            </button>
                                        </a>
                                        <!-- <button type="button" class="btn btn-outline-primary">Delete</button>
                                        <button type="button" class="btn btn-outline-primary">Right</button> -->
                                    </div>
                                </th>
                            </tr>
                            @endforeach
                            @else
                            <span class="text-center alert alert-info"> Sorry No applications available <a href="{{route('pply-jobs')}}" class="btn btn-link">apply here</a></span>
                            @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection