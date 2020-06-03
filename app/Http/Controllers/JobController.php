<?php

namespace App\Http\Controllers;

use App\Category;
use App\Company;
use App\Job;
use Illuminate\Http\Request;
use App\Http\Requests\JobPostRequest;
use Auth;
class JobController extends Controller
{
    public function index(){
        $jobs = Job::latest()->limit(10)->get();
        $categories = Category::with('jobs')->get();
        $companies = Company::latest()->limit(12)->get();
        return view('welcome',compact('jobs','companies','categories'));
    }
    public function show($id, Job $job){
        return view('jobs.show',compact('job'));
    }

    public function create(){
        return view('jobs.create');
    }
    public function store(JobPostRequest $request){
        $user_id = auth()->user()->id;
        $company = Company::where('user_id',$user_id)->first();
        $company_id = $company->id;
        Job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' =>request('title'),
            'slug' =>str_slug(request('title')),
            'roles' =>request('roles'),
            'category_id' =>request('category'),
            'description' =>request('description'),
            'position' =>request('position'),
            'address' =>request('address'),
            'type' =>request('type'),
            'status' =>request('status'),
            'last_date' =>request('last_date'),
        ]);
        return redirect()->back()->with('message','Job Posted Successfully');
    }

    public function myjob(){
        $jobs = Job::where('user_id',auth()->user()->id)->get();
        return view('jobs.myjobs',compact('jobs'));
    }

    public function apply(Request $request, $id){
        $jobId = Job::find($id);
        $jobId->users()->attach(Auth::user()->id);
        return redirect()->back()->with('message', 'Job Applied Succesfuuly');
    }

    public function applicants(){
        $applicants = Job::has('users')->where('user_id',auth()->user()->id)->get();
        return view('jobs.applicants',compact('applicants'));
    }

    public function alljobs(Request $request)
    {
        $keyword = request('title');
        $type = request('type');
        $category = request('category_id');
        $address = request('address');
        if ($keyword || $type || $category || $address) {
            $jobs = Job::where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('type', $type)
                ->orWhere('category_id', $category)
                ->orWhere('address', $address)
                ->paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        } else {
            $jobs = Job::paginate(10);
            return view('jobs.alljobs', compact('jobs'));
        }
    }

    public function searchJob(Request $request){
        $keyword = $request->get('keyword');
        $users = Job::where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('position', 'LIKE', '%' . $keyword . '%')
                ->limit(5)->get();
        return response()->json($users);
    }











}
