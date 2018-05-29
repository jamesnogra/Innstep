<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Auth;

class JobController extends Controller
{

    public $job_categories = ["Marketing", "Sales", "IT", "Teaching"];

    public function index()
    {
        $jobs = Job::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('index', ['job_categories'=>$this->job_categories, 'jobs'=>$jobs, 'paginate'=>false]);
    }

    public function indexAll()
    {
        $jobs = Job::orderBy('created_at', 'DESC')->paginate(5);
        return view('index', ['job_categories'=>$this->job_categories, 'jobs'=>$jobs, 'paginate'=>true]);
    }

    public function allJobs()
    {
        $jobs = Job::all();
        return view('all-jobs', ['jobs'=>$jobs]);
    }
    
    public function createJob()
    {
        return view('create-job', ['job_categories'=>$this->job_categories]);
    }

    public function postCreateJob(Request $request)
    {
        $data = $request->except('_token');
        //upload first the logo
        $data['logo_banner'] = '';
        if ($request->logo_banner) {
            $this->validate($request, [
                'logo_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8148',
            ]);
            $filename = $request->logo_banner->store('logo_banner');
            $data['logo_banner'] = $filename;
        }
        $data['code'] = bin2hex(random_bytes(8));
        $data['user_id'] = Auth::user()->id;
        $data['show_salary'] = (isset($data['show_salary'])) ? 1 : 0;
        Job::create($data);
        return redirect(action('JobController@allJobs'));;
    }

    public function deleteJob(Request $request)
    {
        Job::where('id', $request->id)->where('code', $request->code)->delete();
        return redirect(action('JobController@allJobs'));;
    }

}
