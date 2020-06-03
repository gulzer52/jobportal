@extends('layouts.main')
@section('content')
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
            @foreach($companies as $company)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    @if(empty(Auth::user()->company->logo))
                        <img class="card-img-top" style="border-radius: 50px;width: 100%" src="{{asset('avatar/man.jpg')}}" width="100" height="200">
                    @else
                        <img class="card-img-top" src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100" height="200">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$company->cname}}</h5>
                        <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Visit Company</a>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>
@endsection