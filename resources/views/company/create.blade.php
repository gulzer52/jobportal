@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->company->logo))
                    <img style="border-radius: 50px;width: 100%" src="{{asset('avatar/man.jpg')}}" width="100" height="200">
                @else
                    <img style="border-radius: 50px;width: 100%" src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100" height="200">
                @endif


                <div class="card">
                    <form enctype="multipart/form-data" action="{{route('company.logo')}}" method="post">
                        @csrf
                        <div class="card-header">Change Your Company Chobi</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="logo">
                            <br>
                            <button class="btn btn-warning">Update</button>
                        </div>
                    </form>
                    @if($errors->has('logo'))
                        <div class="error" style="color: red">
                            {{$errors->first('logo')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update Company Information</div>
                    <div class="card-body">
                        <form action="{{route('company.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea class="form-control" rows="3" name="address">

                            </textarea>
                            </div>
                            @if($errors->has('address'))
                                <div class="error" style="color: red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control">
                                </div>
                            @if($errors->has('phone'))
                                <div class="error" style="color: red">
                                    {{$errors->first('phone')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Website</label>
                                <input type="text" name="website" class="form-control">
                            </div>
                            @if($errors->has('website'))
                                <div class="error" style="color: red">
                                    {{$errors->first('website')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Slogan</label>
                                <input type="text" name="slogan" class="form-control">

                            </div>
                            @if($errors->has('slogan'))
                                <div class="error" style="color: red">
                                    {{$errors->first('slogan')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea class="form-control" rows="3" name="description">

                                </textarea>
                            </div>
                            @if($errors->has('description'))
                                <div class="error" style="color: red">
                                    {{$errors->first('description')}}
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
                    <div class="card-header">Employer Details</div>
                    <div class="card-body">
                        <p><b>Name</b> {{Auth::user()->company->cname}}</p>
                        <p><b>Address</b> {{Auth::user()->company->address}}</p>
                        <p><b>Phone</b> {{Auth::user()->company->phone}}</p>
                        <p><b>Website</b> {{Auth::user()->company->website}}</p>
                        <p><b>Slogan</b> {{Auth::user()->company->slogan}}</p>
                        <p><b>Company View</b>
                            <a href="company/{{Auth::user()->company->slug}}">View</a>
                        </p>
                        <p><b>Description</b> {{Auth::user()->company->description}}</p>

                    </div>
                </div>
                <div class="card">
                    <form enctype="multipart/form-data" action="{{route('company.coverphoto')}}" method="post">
                        @csrf
                        <div class="card-header">Update Your Cover Photo</div>
                        <div class="card-body">
                            <input type="file" class="form-control" name="cover_photo">
                            <br>
                            <button class="btn btn-warning">Update</button>
                        </div>
                    </form>
                    @if($errors->has('cover_photo'))
                        <div class="error" style="color: red">
                            {{$errors->first('cover_photo')}}
                        </div>
                    @endif
                </div>


            </div>
        </div>
    </div>
@endsection
