@extends('layouts.main')

@section('content')
    <hr>
   <div class="site-section bg-light">
       <div class="container">
           <div class="col-md-12">
               <div class="company-profile">
                   @if(empty(Auth::user()->company->cover_photo))
                       <img style="border-radius: 50px;width: 100%" src="{{asset('avatar/man.jpg')}}" width="100" height="200">
                   @else
                       <img style="border-radius: 50px;width: 100%" src="{{asset('uploads/coverphoto')}}/{{Auth::user()->company->cover_photo}}" width="100" height="200">
                   @endif
               </div>
               <div class="company-desc"><br>
                   @if(empty(Auth::user()->company->logo))
                       <img style="border-radius: 50px;width: 100%" src="{{asset('avatar/man.jpg')}}" width="100" height="200">
                   @else
                       <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}" width="100" height="200">
                   @endif
                   <h1>{{$company->cname}}</h1>

                   <p> Description-{{$company->description}}&nbsp;</p>
                   <p>Slogan-{{$company->slogan}}&nbsp;Phone-{{$company->phone}}&nbsp;</p>
                   <p>Address-{{$company->address}}&nbsp;Website-{{$company->website}}</p>

               </div>
           </div>
           <table class="table">
               <thead>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               </thead>
               <tbody>
               @foreach($company->jobs as $job)
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
   </div>
@endsection
