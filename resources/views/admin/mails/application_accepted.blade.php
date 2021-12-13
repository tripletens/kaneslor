@extends('layouts.mail')

@section('content')

<div class="container-fluid">

    <span class="alert alert-info text-start">
        <p>Hello {{$name}},<br/></p>
        <p>Congratulations, your job application for the post of a {{$post}} on {{$date}} has been accepted.</p>
        <br/>
        <p>You will be contacted immediately for the next phase of the application process. </p>
        <p>If not contacted within the next 24 - 48hrs. Please reach out to us with the application code - {{$code}}</p>
    </span>
</div>

@endsection