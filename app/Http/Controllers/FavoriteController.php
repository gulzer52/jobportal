<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function saveJob($id){
        $jobId=Job::find($id);
        $jobId->favorites()->attach(auth()->user()->id);
        return redirect()->back();
    }
    public function unSaveJob($id){
        $jobId=Job::find($id);
        $jobId->favorites()->detach(auth()->user()->id);
        return redirect()->back();
    }
}
