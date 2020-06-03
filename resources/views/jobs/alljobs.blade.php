@extends('layouts.main')

@section('content')
    <hr>
   <div class="site-section bg-light">
       <div class="container">
           <div class="row">
               <h1>Recent Jobs</h1>
              <div class="col-md-12">
                  <form action="{{route('alljobs')}}" method="get">
                      <div class="form-inline">
                          <div class="form-group">

                              <input placeholder="Keyword" type="text" name="title" class="form-control">
                          </div>&nbsp;&nbsp;
                          <div class="form-group">
                              <select name="type" class="form-control">
                                  <option>Select Type</option>
                                  <option value="fullTime">Full time</option>
                                  <option value="partTime">Part time</option>
                                  <option value="Casual">Casual</option>
                              </select>
                          </div>&nbsp;&nbsp;
                          <div class="form-group">
                              <select name="category_id" class="form-control">
                                  <option>Select Category</option>
                                  @foreach(App\Category::all() as $cat)
                                      <option value="{{$cat->id}}">{{$cat->name}}</option>
                                  @endforeach
                              </select>
                          </div>&nbsp;&nbsp;
                          <div class="form-group">
                              <input placeholder="Address" type="text" name="address" class="form-control">
                          </div>&nbsp;&nbsp;
                          <div class="form-group">
                              <button class="btn btn-outline-dark">Search</button>
                          </div>
                      </div>
                  </form>
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



















