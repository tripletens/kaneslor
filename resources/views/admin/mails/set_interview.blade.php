@extends('layouts.mail')

@section('content')

<div class="container-fluid">

    <span class="alert alert-info text-start">
        <p>Hello {{$name}},<br/></p>
        <p>Congratulations, we are inviting you to @if($type == 'virtual') a {{$type}} interview. @else an {{$type}} interview. @endif</p>
        <br/>
        <p>Below are the details for the interview</p>
        @if($type == 'virtual')
            <table class="table table-responsive table-striped">
                <tr>
                    <th>Meeting Link</th>
                    <td>{{$link}}</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>{{$time}}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{niceday($date)}}</td>
                </tr>
            </table>
        @else
            <table class="table table-responsive table-striped">
                <tr>
                    <th>Interview Address</th>
                    <td>{{$address}}</td>
                </tr>
                <tr>
                    <th>Time</th>
                    <td>{{$time}}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{niceday($date)}}</td>
                </tr>
            </table>
        @endif
        <br/><br/>
        <p>Incase of any issues or needed changes please reach out to us Immediately, Thanks</p>
        <p>Once Again Congratulations!!!</p>
    </span>
</div>

@endsection