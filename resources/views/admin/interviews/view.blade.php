@extends('layouts.dashboard-admin')

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
        <!-- <div class="col-md-12 col-xs-12 col-lg-12"> -->
            @if(count($interviews) > 0)
                @foreach($interviews as $interview)
                <div class="col-md-6 col-xs-12 col-lg-6 "> 
                    <div class="card p-2 my-3">
                        <div class="card-body ">
                            <!-- `title`, `application_code`, `type`, `link`, `address`, `time`, `date`, `status`, -->
                            <table class="table table-responsive table-striped">
                                <tr>
                                    <td>Title <td>
                                    <td  colspan="2"> {{$interview->title}} with {{$interview->name}}</td>
                                </tr>
                                <tr>
                                    <td>Application Code<td>
                                    <td> <span class="badge badge-danger">{{$interview->application_code}}</span></td>
                                </tr>
                                <tr>
                                    <td>Meeting Type<td>
                                    <td><span class="badge badge-info">@if($interview->type == "virtual") {{$interview->type}} @else In-Person @endif </span><td>
                                </tr>
                                <tr>
                                    <td>Meeting Details<td>
                                    <td>  @if($interview->type == "virtual")
                                        <a href="{{$interview->link}}" class="btn btn-link btn-light btn-sm text-danger">Open meeting link here</a>
                                        @else
                                            <div class="alert alert-info p-3">{{$interview->address}}</div>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Time<td>
                                    <td>{{$interview->time}}<td>
                                </tr>
                                <tr>
                                    <td>Interview Date<td>
                                    <td>{{niceday1($interview->date)}}<td>
                                </tr>
                                <tr>
                                    <td>Date Created<td>
                                    <td>{{niceday1($interview->created_at)}}<td>
                                </tr>
                                <tr>
                                    <td>Status <td>
                                    <td>@if($interview->status == '1')<span class="badge badge-success">Active</span>@else
                                        <span class="badge badge-danger">Inactive</span>
                                        @endif
                                    <td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <a class="btn btn-danger btn-sm  d-flex flex-row justify-content-center  text-white" data-toggle="modal" data-target="#deleteinterviewModal{{$interview->id}}" style="text-decoration: none;" >Delete </a>
                                        <div class="modal fade" id="deleteinterviewModal{{$interview->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Interview Details - {{$interview->title}} </h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="alert alert-warning">Are you Sure you want to delete this Job Interview - {{$interview->title}}? </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                        <form method="POST" action="{{route('admin.delete-interview',$interview->interview_id)}}">
                                                            @csrf
                                                            <button class="btn bg-success text-white" type="submit">Yes! Delete</button>
                                                        </form>
                                                    </div>
                                                    <!-- </form> -->
                                                </div>
                                            </div>
                                        </div>
                                    <td>
                                </tr>
                            </table>
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
        <!-- </div> -->
        <div class="d-flex justify-content-center">{{ $interviews->links() }}</div>
    </div>
</div>
<!-- /.container-fluid -->
@endsection