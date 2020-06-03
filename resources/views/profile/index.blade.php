@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->profile->avatar))
                    <img style="border-radius: 50px;width: 100%" src="{{asset('avatar/man.jpg')}}" width="100" height="200">
                @else
                    <img style="border-radius: 50px;width: 100%" src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" width="100" height="200">
                @endif


                <div class="card">
                    <form enctype="multipart/form-data" action="{{route('profile.avatar')}}" method="post">
                        @csrf
                        <div class="card-header">Change Your Chobi</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="avatar">
                            <br>
                            <button class="btn btn-warning">Update</button>
                        </div>
                    </form>
                    @if($errors->has('avatar'))
                        <div class="error" style="color: red">
                            {{$errors->first('avatar')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update Your Information</div>
                    <div class="card-body">
                        <form action="{{route('profile.store')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea class="form-control" rows="3" name="address">
                                {{Auth::user()->profile->address}}
                            </textarea>
                        </div>
                            @if($errors->has('address'))
                                <div class="error" style="color: red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                        <div class="form-group">
                        <label for="">Phone Number</label>
                            <input value="{{Auth::user()->profile->phone_number}}" type="text" name="phone_number" class="form-control">
                        </div>
                            @if($errors->has('phone_number'))
                                <div class="error" style="color: red">
                                    {{$errors->first('phone_number')}}
                                </div>
                            @endif
                        <div class="form-group">
                            <label for="">Experience</label>
                            <textarea class="form-control" rows="3" name="experience">
                                {{Auth::user()->profile->experience}}
                            </textarea>
                        </div>
                            @if($errors->has('experience'))
                                <div class="error" style="color: red">
                                    {{$errors->first('experience')}}
                                </div>
                            @endif
                        <div class="form-group">
                            <label for="">BIODATA</label>
                            <textarea class="form-control" rows="3" name="bio">
                                {{Auth::user()->profile->bio}}
                            </textarea>
                        </div>
                            @if($errors->has('bio'))
                                <div class="error" style="color: red">
                                    {{$errors->first('bio')}}
                                </div>
                            @endif
                        <div class="form-group">
                            <button class="btn btn-warning">Submit</button>
                        </div>
                            @if(Session::has('message'))
                                <div class="alert alert-success">
                                    {{Session::get('message')}}
                                </div>
                            @endif

                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">User Details</div>
                    <div class="card-body">
                        <p>Name: {{Auth::user()->name}}</p>
                        <p>Email: {{Auth::user()->email}}</p>
                        <p>Address: {{Auth::user()->profile->address}}</p>
                        <p>Phone Number: {{Auth::user()->profile->phone_number}}</p>
                        <p>Experience: {{Auth::user()->profile->experience}}</p>
                        <p>Biodata: {{Auth::user()->profile->bio}}</p>
                        <p>Member Since: {{date('F d Y', strtotime(Auth::user()->profile->created_at))}}</p>
                        @if(!empty(Auth::user()->profile->cover_letter))
                            <p>
                                <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">
                                    Cover Letter
                                </a>
                            </p>
                        @else
                            <p>Please Upload Your Cover Letter</p>
                        @endif

                        @if(!empty(Auth::user()->profile->resume))
                            <p>
                                <a href="{{Storage::url(Auth::user()->profile->resume)}}">
                                    Resume
                                </a>
                            </p>
                        @else
                            <p>Please Upload Your Resume</p>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <form enctype="multipart/form-data" action="{{route('profile.coverletter')}}" method="post">
                        @csrf
                    <div class="card-header">Update Your Cover Letter</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="cover_letter">
                        <br>
                        <button class="btn btn-warning">Update</button>
                    </div>
                    </form>
                    @if($errors->has('cover_letter'))
                        <div class="error" style="color: red">
                            {{$errors->first('cover_letter')}}
                        </div>
                    @endif
                </div>
                <div class="card">
                    <form enctype="multipart/form-data" action="{{route('profile.resume')}}" method="post">
                        @csrf
                    <div class="card-header">Update Your Resume</div>
                    <div class="card-body">
                        <input type="file" class="form-control" name="resume">
                        <br>
                        <button class="btn btn-warning">Update</button>
                    </div>
                    </form>
                    @if($errors->has('resume'))
                        <div class="error" style="color: red">
                            {{$errors->first('resume')}}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
