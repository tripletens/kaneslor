@extends('layouts.dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">View Jobs Application Details</h1>
        <a class="btn btn-outline-danger text-red" style="text-decoration: none;" href="{{route('view-applications')}}">View all Applications</a>
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

@endsection