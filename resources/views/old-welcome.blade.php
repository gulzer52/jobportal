@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <search-component></search-component>
            </div>
           <h1>Recent Jobs</h1>
            <table class="table">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody>
                @foreach($jobs as $job)
                    <tr>
                        <td>
                            <img src="{{asset('avatar/man.jpg')}}" width="80">
                        </td>
                        <td>
                            Position: {{$job->position}}
                            <br>
                            {{$job->type}}
                        </td>
                        <td>
                            Address: {{$job->address}}
                        </td>
                        <td>
                            Date: {{$job->created_at->diffForHumans()}}
                        </td>
                        <td>
                            <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                <button class="btn btn-success btn-sm">Apply</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <a href="{{route('alljobs')}}">
                <button style="width: 100%" class="btn btn-warning btn-lg">Browse All Jobs</button>
            </a>
        </div><br><br>
        <h1>Feature Company</h1><br>

        <div class="container">
            <div class="row">
                @foreach($companies as $company)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">{{$company->cname}}</h5>
                            <p class="card-text">{{str_limit($company->description,20)}}</p>
                            <a href="{{route('company.index',[$company->id,$company->slug])}}" class="btn btn-primary">Visit Company</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection



















