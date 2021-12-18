@extends('layouts.dashboard-admin')

@section('content')
<style type="text/css" rel="stylesheet">
    .hover-primary:hover{
        color:#fff;
    }
</style>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Jobs Application Details</h1>
        <div class="btn-group" role="group" aria-label="Basic outlined example">
            <a class="btn btn-primary text-white hover-primary" style="text-decoration: none;" href="{{route('admin.job_applications')}}">View all Applications</a>
        
            <a class="btn btn-success text-white" data-toggle="modal" data-target="#ApprovecategryModal" style="text-decoration: none;" >Approve </a>

            <a class="btn btn-danger text-white" data-toggle="modal" data-target="#rejectapplicationModal" style="text-decoration: none;" >Reject </a>
            
            @if($job_application[0]->status == '1')
                <a class="btn btn-dark text-white" data-toggle="modal" data-target="#setInterviewModal" style="text-decoration: none;" >Setup Interview </a>
            @endif
        </div>
       
        
        <div class="modal fade" id="ApprovecategryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Approve Job Application - {{$job_application[0]->name}} </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">Are you Sure you want to Approve this job Application - {{$job_application[0]->name}}? </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form method="POST" action="{{route('admin.approve_job_applications',$job_application[0]->id)}}">
                            @csrf
                            <button class="btn bg-success text-white" type="submit">Yes! Approve</button>
                        </form>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div> 

        <div class="modal fade" id="setInterviewModal" tabindex="-1" role="dialog" aria-labelledby="setInterviewModal"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="setInterviewModal">Setup Interview for {{$job_application[0]->name}} </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{route('admin.save-interview')}}">
                            @csrf
                            <!-- `title`, `application_code`, `type`, `link`, `address`, `time`, `date`, -->
                            <input type="hidden" class="form-control" name="name" value="{{$job_application[0]->name}}"/>
                            <input type="hidden" class="form-control" name="email" value="{{$job_application[0]->email}}"/>
                            <div class="form-group">
                                <label for="title"> Title: </label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Interview Title"/>
                            </div>
                            <div class="form-group">
                                <label for="application_code"> Application Code : </label>
                                <input type="hidden" class="form-control" name="application_code" value="{{$job_application[0]->code}}"/>
                                <input type="text" class="form-control" disabled name="application_code" value="{{$job_application[0]->code}}"/>
                            </div>
                            <div class="form-group">
                                <label for="type"> Type : </label>
                                <select name="type" id="interview_type" class="form-control">
                                    <option name="type[]" value="">-- Select an Interview Type--</option>
                                    <option name="type[]" value="virtual"> Virtual Meeting</option>
                                    <option name="type[]" value="in-person">In-Person Meeting</option>
                                </select>
                            </div>
                            <div class="form-group"  id="address_div">
                                <label for="address"> Address: </label>
                                <textarea class="form-control" name="interview_address" placeholder="Enter Interview Address"></textarea>
                            </div>
                            <div class="form-group" id="link_div">
                                <label for="link"> Meeting Link i.e Google Meet, Zoom etc : </label>
                                <textarea class="form-control" name="meeting_link" placeholder="Enter Interview Meeting link"></textarea>
                            </div>
                            <div class="form-group" >
                                <label for="time"> Time: </label>
                                <input type="time" name="time" class="form-control" placeholder="Enter the time for the interview"/>
                            </div>
                            <div class="form-group" >
                                <label for="date"> Date: </label>
                                <input type="date" name="date" class="form-control" placeholder="Enter the date for the interview"/>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                            <button class="btn bg-success text-white"  type="submit">Yes! Approve</button>
                        </form>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div> 


        <div class="modal fade" id="rejectapplicationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reject Job Application - {{$job_application[0]->name}} </h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-warning">Are you Sure you want to Reject this Job Application - {{$job_application[0]->name}}? </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <form method="POST" action="{{route('admin.reject_job_applications',$job_application[0]->id)}}">
                            @csrf
                            <button class="btn bg-success text-white" type="submit">Yes! Reject</button>
                        </form>
                    </div>
                    <!-- </form> -->
                </div>
            </div>
        </div> 
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>

    <div class="row">
        <div class="col-md-6 col-xs-12 col-lg-6">
            <div class="card ">
                <h4 class="card-title p-4 mb-0 pb-0 text-center">Full Application Details</h4>
                <div class="card-body">
                    <table class="table table-responsive table-striped">
                        <tr>
                            <th>Application Code</th>
                            <td><button disabled class="btn btn-sm btn-danger">{{ucwords($job_application[0]->code)}}</button></td>
                        </tr>
                        <tr>
                            <th>Name: </th>
                            <td>{{ucfirst($job_application[0]->name)}}</td>
                        </tr>
                        <tr>
                            <th>Email: </th>
                            <td>{{$job_application[0]->email}}</td>
                        </tr>
                        <tr>
                            <th>Position Applied: </th>
                            <td>{{ucfirst($job_application[0]->position)}}</td>
                        </tr>
                        <tr>
                            <th>Date of Birth: </th>
                            <td>{{$job_application[0]->dob}}</td>
                        </tr>
                        <tr>
                            <th>Gender: </th>
                            <td>@if($job_application[0]->gender) <span class="badge badge-success"> {{ucfirst($job_application[0]->gender)}}</span> @else "N/A" @endif</td>
                        </tr>
                        <tr>
                            <th>Phone Number: </th>
                            <td>{{$job_application[0]->phone}}</td>
                        </tr>
                        <tr>
                            <th>Alternative Phone Number: </th>
                            <td>{{$job_application[0]->altphone ? $job_application[0]->altphone : "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Next of Kin Phone Number: </th>
                            <td>{{$job_application[0]->nokphone ? $job_application[0]->nokphone : "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Marital Status: </th>
                            <th>@if($job_application[0]->marital_status) <span class="badge badge-success"> {{ucfirst($job_application[0]->marital_status)}}</span> @else "N/A" @endif</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-xs-12 col-lg-6">
            <div class="card ">
                <!-- <h4 class="card-title p-4 mb-0 pb-0 text-center">View Job Application Details</h4> -->
                <div class="card-body">
                    <table class="table table-responsive table-striped">
                        <!-- <tr>
                            <th></th>
                            <td></td>
                        </tr> -->
                        <tr>
                            <th>Social Media : </th>
                            <td>{{ucfirst($job_application[0]->social_media)}}</td>
                        </tr>
                        <tr>
                            <th>Salary Expectation: </th>
                            <td> NGN {{number_format($job_application[0]->salary)}}</td>
                        </tr>
                        <tr>
                            <th>Residential Address: </th>
                            <td>{{ucfirst($job_application[0]->address)}}</td>
                        </tr>
                        <tr>
                            <th>Employment History: </th>
                            <td>{{$job_application[0]->history}}</td>
                        </tr>
                        <tr>
                            <th>Educational Qualification: </th>
                            <td>@if($job_application[0]->qualification) {{ucfirst($job_application[0]->qualification)}} @else "N/A" @endif</td>
                        </tr>
                        <tr>
                            <th>Professional Certifcations: </th>
                            <td>{{$job_application[0]->certification}}</td>
                        </tr>
                        <tr>
                            <th>Why are you qualified for this Job: </th>
                            <td>{{$job_application[0]->qualified ? $job_application[0]->qualified : "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Referees: </th>
                            <td>{{$job_application[0]->referees ? $job_application[0]->referees : "N/A"}}</td>
                        </tr>
                        <tr>
                            <th>Status: </th>
                            <td> @if($job_application[0]->status == 1)
                                    <span class="badge badge-success">Approved</span>
                                    @elseif($job_application[0]->status == 0)
                                    <span class="badge badge-danger">Rejected</span>
                                    @else
                                    <span class="badge badge-info">Pending</span>
                                    @endif
                                </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br/><br/>
    <hr>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-lg-6">
            <div class="card my-5">
                <div class="card-body">
                    <h3 class="text-center mt-0 mb-4">
                        Interview Questions
                    </h3>
                    <table class="table table-responsive table-striped">
                            @if(count($questions) > 0)
                                @foreach($questions as $key => $question)
                                <tr colspan="4">
                                    <th>{{$key+1}}. </td>
                                    <th>{{$question->title}}</th>
                                </tr>
                                @endforeach
                            @else
                                <span class="d-flex justify-content-center text-center ">
                                    No Video Uploaded Yet
                                </span>
                            @endif
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-lg-6">
            
            <div class="card my-5">
                <div class="card-body">
                    <h3 class="text-center mt-0 mb-4">
                        Interview Answers
                    </h3>
                    <table class="table table-responsive table-striped">
                            @if(count($answers) > 0)
                                @foreach($answers as $key => $answer)
                                <tr colspan="4">
                                    <th>{{$key+1}}. </td>
                                    <th><a href="{{Storage::url('videos/' . $answer->video)}}" download>Download Video</a></th>
                                </tr>
                                @endforeach
                            @else
                                <span class="d-flex justify-content-center text-center"> No Video Uploaded Yet</span>
                            @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
@push('head')

@endpush
@endsection