@extends('layouts.dashboard-admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View All Jobs Categories</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" 
            data-toggle="modal" data-target="#addcategryModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add Category</a>
            <!-- Logout Modal-->
            <!-- <a class="modal btn btn-danger" href="#" >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a> -->
        <div class="modal fade" id="addcategryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a New Category</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('admin.add-category')}}">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input name="name" class="form-control"  placeholder="Enter Category Name"/>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" name="description" placeholder="Enter Category Description"></textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- <button class="btn btn-primary" type="submit">Add</button> -->
                        
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button class="btn bg-success text-white" type="submit">Add</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
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
                                <th>Status</th>
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
                                    <div class="btn-group" role="group" aria-label="Basic outlined example" >
                                        <a href="#" title="View Category Details" data-toggle="modal" data-target="#editcategoryModal{{$category->id}}">
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        <div class="modal fade" id="editcategoryModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('admin.update-category',$category->id)}}">
                                                            @csrf
                                                            <input name="category_id" type="hidden" value="{{$category->id}}"/>
                                                            <div class="form-group">
                                                                <label for="name">Name:</label>
                                                                <input name="name" class="form-control" value="{{$category->name}}"  placeholder="Enter Category Name"/>
                                                                @error('title')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description">Description:</label>
                                                                <textarea class="form-control" name="description" placeholder="Enter Category Description">{{$category->description}}</textarea>
                                                                @error('description')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <button class="btn bg-success text-white" type="submit">Update</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <a href="#" data-toggle="modal" data-target="#deletecategryModal{{$category->id}}">
                                            <button type="button" class="btn btn-sm btn-primary mx-2">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                        
                                        <div class="modal fade" id="deletecategryModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Category - {{$category->name}} </h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert alert-warning">Are you Sure you want to Deactivate this category - {{$category->name}}? </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <form method="POST" action="{{route('admin.delete-category',$category->id)}}">
                                                            @csrf
                                                            <button class="btn bg-danger text-white" type="submit">Yes! Delete</button>
                                                        </form>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{route('admin.view-test-category',$category->id)}}" title="View Assessments">
                                            <button type="button" class="btn btn-sm btn-success mx-2">
                                            <i class="fa fa-book"></i>
                                            </button>
                                        </a>
                                    </div>
                                </th>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @else
                    <span class="text-center alert alert-info m-5"> Sorry No categories available <a href="{{route('apply-jobs')}}" class="btn btn-link">apply here</a></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection