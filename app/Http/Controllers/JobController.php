<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Auth;

class JobController extends Controller
{

    public function allJobs()
    {
        $jobs = Job::all();
        return view('all-jobs', ['jobs'=>$jobs]);
    }
    
    public function createJob()
    {
        return view('create-job');
    }

    public function postCreateJob(Request $request)
    {
        $data = $request->except('_token');
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
