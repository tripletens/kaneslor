@extends('layouts.dashboard-admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View All Jobs Categories</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>
    <div class="row">
        <div class="col-md-12 col-xs-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(count($categories) > 0)
                    <table id="category_table" class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th> Status</th>
                                <th>Date Registered</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($categories as $key => $category)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td> {{$category->name}}</td>
                                <td> {{$category->description}}</td>
                                <td> @if($category->status == 1)
                                    <span class="badge badge-success">Approved</span>
                                    @elseif($category->status == 0)
                                    <span class="badge badge-danger">Rejected</span>
                                    @else
                                    <span class="badge badge-info">Pending</span>
                                    @endif
                                </td>
                                <td>{{date( $category->created_at)}}</td>
                                <th>
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Dropdown
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right animated--grow-in" aria-labelledby="navbarDropdown">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="#" title="View category Details">
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <a href="#">
                                            <button type="button" class="btn btn-sm btn-primary mx-2">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                        </a>

                                        <a href="#" title="View Assessments">
                                            <button type="button" class="btn btn-sm btn-success mx-2">
                                            <i class="fa fa-book"></i>
                                            </button>
                                        </a>

                                        <!-- <button type="button" class="btn btn-outline-primary">Right</button> -->
                                    </div>
                                </th>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    @else
                    <span class="text-center alert alert-info m-5"> Sorry No categorys available <a href="{{route('apply-jobs')}}" class="btn btn-link">apply here</a></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection