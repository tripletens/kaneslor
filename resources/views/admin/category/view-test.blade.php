@extends('layouts.dashboard-admin')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 my-3">View Category Assessment Questions</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" 
            data-toggle="modal" data-target="#addquestionModal"><i
                class="fas fa-plus fa-sm text-white-50"></i> Add question</a>
            <!-- Logout Modal-->
            <!-- <a class="modal btn btn-danger" href="#" >
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a> -->
        <div class="modal fade" id="addquestionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a new Question</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('admin.add-question')}}">
                            @csrf
                            <input name="category_id" type="hidden" value="{{$category[0]->id}}"/>
                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input name="title" class="form-control"  placeholder="Enter question Title"/>
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" name="description" placeholder="Enter question Description"></textarea>
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
        <div class="col-md-4 col-xs-12 col-lg-4">
            <div class="card mb-3">
                <div class="card-title">
                    <h4 class="text-start mx-4 mt-4"> Category: {{ucwords($category[0]->name)}}</h4>
                </div>
                <hr/>
                <div class="card-body">
                    <p class="text-start">{{ucfirst($category[0]->description)}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-xs-12 col-lg-8">
            <div class="card">
                <div class="card-body">
                    @if(count($questions) > 0)
                    <table id="question_table" class="table table-responsive table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>title</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Date Registered</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($questions as $key => $question)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td> {{$question->title}}</td>
                                <td> {{$question->description}}</td>
                                <td> @if($question->status == 1)
                                    <span class="badge badge-success">Approved</span>
                                    @else
                                    <span class="badge badge-info">Inactive</span>
                                    @endif
                                </td>
                                <td>{{date( $question->created_at)}}</td>
                                <th>
                                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                                        <a href="#" title="View question Details" data-toggle="modal" data-target="#editquestionModal{{$question->id}}">
                                            <button type="button" class="btn btn-sm btn-danger">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </a>

                                        <div class="modal fade" id="editquestionModal{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Question</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('admin.update-question',$question->id)}}">
                                                            @csrf
                                                            <input name="category_id" type="hidden" value="{{$category[0]->id}}"/>
                                                            <div class="form-group">
                                                                <label for="title">Title:</label>
                                                                <input name="title" class="form-control" value="{{$question->title}}"  placeholder="Enter question Title"/>
                                                                @error('title')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="description">Description:</label>
                                                                <textarea class="form-control" name="description" placeholder="Enter question Description">{{$question->description}}</textarea>
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
                                        <a href="#" data-toggle="modal" data-target="#deletequestionModal{{$question->id}}">
                                            <button type="button" class="btn btn-sm btn-primary mx-2">
                                            <i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                        
                                        <div class="modal fade" id="deletequestionModal{{$question->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete question - {{$question->title}} </h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert alert-warning">Are you Sure you want to delete this question? - {{$question->title}}? </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <form method="POST" action="{{route('admin.delete-question',$question->id)}}">
                                                            @csrf
                                                            <button class="btn bg-danger text-white" type="submit">Yes! Delete</button>
                                                        </form>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </th>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    @else
                    <span class="text-center alert alert-info m-auto d-flex flex-row justify-content-center"> Sorry no Questions Available</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@endsection