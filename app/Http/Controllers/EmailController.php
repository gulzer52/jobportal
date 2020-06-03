<?php

namespace App\Http\Controllers;


use App\Notifications\SendEmail;
use Illuminate\Http\Request;
use Mail;
class EmailController extends Controller
{
    public function send(Request $request){
        $homeUrl = url('/');
        $jobId = $request->get('job_id');
        $jobSlug = $request->get('job_slug');
        $jobUrl = $homeUrl.'/'.'jobs/'.$jobId.'/'.$jobSlug;

        $data=array(
            'your_name'=>$request->get('your_name'),
            'your_email'=>$request->get('your_email'),
            'friend_name'=>$request->get('friend_name'),
            'friend_email'=>$request->get('friend_email'),
            'job_url'=> $jobUrl,
        );
        $emailTo = $request->get('friend_email');
        Mail::to($emailTo)->Send(new SendEmail($data));
        return redirect()->back()->with('message','Job Send Succesfully');
    }
}
