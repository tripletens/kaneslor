@extends('layouts.mail')

@section('content')

<div class="container-fluid">

    <span class="alert alert-info text-start">
        <p>Hello {{$name}},<br/></p>
        <p>Sorry, your job application for the post of a {{$post}} on {{$date}} has been rejected.</p>
        <br/>
        <p>We appreciate your efforts during the application process and we wish you best of luck in your endeavours. </p>
        <p>Thanks and Regards. <br/>Kaneslor Vacancy.</p>
    </span>
</div>

@endsection