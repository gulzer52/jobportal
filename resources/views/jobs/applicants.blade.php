@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @foreach($applicants as $applicant)
                    <div class="card-header">{{$applicant->title}}</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </thead>
                            <tbody>
                            @foreach($applicant->users as $user)
                                <tr>
                                    <td>Name: {{$user->name}}</td>
                                    <td>Email : {{$user->email}}</td>
                                    <td>Address : {{$user->profile->address}}</td>
                                    <td>Experience : {{$user->profile->experience}}</td>
                                    <td>Biodata : {{$user->profile->bio}}</td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->resume)}}">Resume</a>
                                    </td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->cover_letter)}}">Cover Letter</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
