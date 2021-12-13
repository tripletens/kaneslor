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

     <!-- +"user_id": 1 -->
                        <!-- +"code": "KAN-kMSwf228"
                    +"name": "test"
                    +"email": "tripletens.kc@gmail.com"
                    +"position": "teacher"
                    +"category": "16"
                    +"dob": "2021-12-08"
                    +"phone": "09038883483483"
                    +"altphone": "0949394394093"
                    +"nokphone": "094909043904903904"
                    +"gender": "male"
                    +"marital_status": "single"
                    +"social_media": "linkedin"
                    +"salary": "900000"
                    +"address": "esiri crescent"
                    +"history": "aladdin"
                    +"qualification": "bsc csc"
                    +"certification": "ican"
                    +"qualified": null
                    +"referees": "Mr Okafor"
                    +"status": 2
                    +"created_at": "2021-12-07 20:59:52"
                    +"updated_at": "2021-12-07 20:59:52"
                    +"category_name": "PHARMACISTS" -->
    <div class="row">
        <div class="col-md-6 col-xs-12 col-lg-6">
            <div class="card ">
                <h4 class="card-title p-4 mb-0 pb-0 text-center">Full Application Details</h4>
                <div class="card-body">
                    <table class="table table-striped">
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
                    <table class="table table-striped">
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
</div>
<!-- /.container-fluid -->

@endsection