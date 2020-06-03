@extends('layouts.main')

@section('content')
    <hr>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <h1>{{$categoryName->name}}</h1>
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
                                    <button type="submit" class="btn btn-success btn-sm">Apply</button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$jobs->links()}}
            </div>


        </div>
    </div>

@endsection



















