@extends('layouts.dashboard')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Apply for a Job</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->

    </div>
    <div class="row">
        <div class="col-md-6 col-xs-12 col-lg-6">
            <div class="card p-5">
                <h4 class="card-title"> Fill the form below to apply for a Job</h4>
                <form class="" method="POST" action="{{route('save-application')}}">
                    @csrf
                    <!-- <div class="row">
                        <div class="col"></div>
                        <div class="col"></div>
                    </div> -->
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="name"> Name:</label>
                                <input type="text" required class="form-control" value="{{Auth('web')->user()->name}}" name="name" />
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="email"> Email:</label>
                                <input type="email" required class="form-control" value="{{Auth('web')->user()->email}}" name="email" />
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror    
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="position"> What position are you applying for?</label>
                        <input type="text" class="form-control" required placeholder="Write your position title here " name="position" />
                        @error('position')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category"> Category:</label>
                        <select class="form-control" name="category" required>
                            <option name="category[]" value=""> -- Select a Category --</option>
                            @foreach($category as $item)
                            <option name="category[]" value="{{$item->id}}"> {{$item->name}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="dob"> Date of Birth</label>
                                <div class="input-group mb-3">
                                    <input type="date" class="form-control" name="dob" placeholder="Date of Birth" aria-label="dob" aria-describedby="basic-addon1">
                                </div>
                                @error('dob')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="phone"> Phone Number</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1">+234</span>
                                    <input type="number" class="form-control" min="0" name="phone" placeholder="Phone Number i.e 9012345678" aria-label="phone" aria-describedby="basic-addon1">
                                </div>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="altphone"> Alternate Phone Number</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" required id="basic-addon1">+234</span>
                                    <input type="number" class="form-control" min="0" name="altphone" placeholder="Phone Number i.e 9012345678" aria-label="phone" aria-describedby="basic-addon1">
                                    @error('altphone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="altphone"> Next of Kin Phone Number</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" required id="basic-addon1">+234</span>
                                    <input type="number" class="form-control" min="0" name="nokphone" placeholder="Phone Number i.e 9012345678" aria-label="phone" aria-describedby="basic-addon1">
                                    @error('nokphone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <label for="gender">Gender:</label>
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="gender" value="male" id="gendermale">
                                <label class="form-check-label" for="gender">
                                    Male
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="gender" value="male" id="genderfemale">
                                <label class="form-check-label" for="gender">
                                    Female
                                </label>
                            </div>
                        </div>
                        <div class="col">
                            <label for="gender">Marital Status:</label>
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="marital_status" value="married" id="married">
                                <label class="form-check-label" for="marital_status">
                                    Married
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="marital_status" value="single" id="single">
                                <label class="form-check-label" for="marital_status">
                                    Single
                                </label>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="form-group">
                        <label for="social_media"> Social Media Handle: </label>
                        <div class="input-group mb-3">
                            <input type="text" multiple required class="form-control" name="social_media" placeholder="Social Media Handle i.e linkedin, facebook or twitter" aria-label="social_media" aria-describedby="basic-addon1">
                        </div>
                        @error('social_media')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary Expectation: </label>
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">NGN</span>
                            <input type="number" required class="form-control" min="0" name="salary" placeholder="Salary Expectation" aria-label="salary" aria-describedby="basic-addon1">
                        </div>
                        @error('salary')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
            </div>
        </div>
        <div class="col-md-6 col-xs-12 col-lg-6">
            <div class="card p-5">
                <h4 class="card-title"> </h4>
                <div class="form-group">
                    <label for="address"> Residential Address: </label>
                    <textarea class="form-control" required name="address" placeholder="Enter Residential Address"></textarea>
                </div>
                <div class="form-group">
                    <label for="address"> Employment History (in reverse chronological order): </label>
                    <textarea class="form-control" required name="history" placeholder="Enter Employment History"></textarea>
                </div>
                <div class="form-group">
                    <label for="qualification">Educational Qualifications with dates: </label>
                    <textarea class="form-control" required name="qualification" placeholder="Enter Educational Qualifications with dates"></textarea>
                </div>
                <div class="form-group">
                    <label for="certification"> Professional Certification and Awards: </label>
                    <textarea class="form-control" name="certification" placeholder="Enter Professional Certification and Awards"></textarea>
                </div>
                <div class="form-group">
                    <label for="qualified">Why are you best qualified for the Job? </label>
                    <textarea class="form-control" required name="qualified" required placeholder="Why are you best qualified for the Job?"></textarea>
                </div>
                <div class="form-group">
                    <label for="referees">Referees </label>
                    <textarea class="form-control" required name="referees" required placeholder="Enter your referees details i.e name, status"></textarea>
                </div>
                <button class="btn btn-outline-danger" type="submit">Save Application</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->
@endsection