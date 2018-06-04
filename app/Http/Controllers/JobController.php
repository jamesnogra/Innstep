<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Job;
use App\Job_Application;
use Auth;

class JobController extends Controller
{

    public $job_categories = ["Marketing", "Sales", "IT", "Teaching"];

    public function index()
    {
        $jobs = Job::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('index', ['job_categories'=>$this->job_categories, 'jobs'=>$jobs, 'paginate'=>false]);
    }

    public function indexAll(Request $request)
    {
        $jobs = Job::orderBy('created_at', 'DESC');
        if ($request->job_title) {
            $jobs = $jobs->where('title', 'LIKE', '%'.$request->job_title.'%');
        }
        if ($request->job_category) {
            $jobs = $jobs->where('category', 'LIKE', '%'.$request->job_category.'%');
        }
        if ($request->city_state) {
            $jobs = $jobs->where(function ($query) use ($request) {
                $query->where('city', 'LIKE', '%'.$request->city_state.'%')->orWhere('state', 'LIKE', '%'.$request->city_state.'%');
            });
        }
        $jobs = $jobs->paginate(10);
        $jobs->appends(['job_title'=>$request->job_title]);
        $jobs->appends(['city_state'=>$request->city_state]);
        $jobs->appends(['job_category'=>$request->job_category]);
        return view('index', ['job_categories'=>$this->job_categories, 'jobs'=>$jobs, 'paginate'=>true, 'request'=>$request->all()]);
    }

    public function allJobs()
    {
        $jobs = Job::orderBy('created_at', 'DESC')->paginate(10);
        return view('all-jobs', ['jobs'=>$jobs]);
    }
    
    public function createJob()
    {
        return view('create-job', ['job_categories'=>$this->job_categories]);
    }

    public function postCreateJob(Request $request)
    {
        $data = $request->except('_token');
        $this->validate($request, [
            'title' => 'required',
            'company' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip_code' => 'required',
        ]);
        //upload first the logo
        $data['logo_banner'] = '';
        if ($request->logo_banner) {
            $this->validate($request, [
                'logo_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8148',
            ]);
            $filename = $request->logo_banner->store('logo_banner');
            $data['logo_banner'] = $filename;
        }
        $data['code'] = bin2hex(random_bytes(2));
        $data['unique_title'] = $data['title'];
        //check if there are exactly the same title 
        $test_job = Job::where('title', $data['title'])->first();
        if ($test_job) {
            $data['unique_title'] = $data['title'] . "-" . $data['code'];
        }
        $data['user_id'] = Auth::user()->id;
        $data['show_salary'] = (isset($data['show_salary'])) ? 1 : 0;
        Job::create($data);
        return redirect(action('JobController@allJobs'));
    }

    public function deleteJob(Request $request)
    {
        Job::where('id', $request->id)->where('code', $request->code)->delete();
        return redirect(action('JobController@allJobs'));
    }

    public function editJob(Request $request)
    {
        $job = Job::where('id', $request->id)->where('code', $request->code)->first();
        return view('edit-job', ['job'=>$job, 'job_categories'=>$this->job_categories]);
    }

    public function postEditJob(Request $request)
    {
        $data = $request->except('_token', 'id', 'code', 'logo_banner');
        //update the logo if there is an updated
        if ($request->logo_banner) {
            $this->validate($request, [
                'logo_banner' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8148',
            ]);
            $filename = $request->logo_banner->store('logo_banner');
            $data['logo_banner'] = $filename;
        }
        $data['show_salary'] = (isset($data['show_salary'])) ? 1 : 0;
        Job::where('id', $request->id)->where('code', $request->code)->update($data);
        return redirect(action('JobController@allJobs'));
    }

    public function showJobDetails(Request $request)
    {
        $job = Job::where('unique_title', $request->unique_title)->first();
        return view('show-job-details', ['job'=>$job]);
    }

    public function applyJob(Request $request)
    {
        $data = $request->except('_token');
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email_address' => 'required|email',
            'mobile_number' => 'required',
        ]);
        //upload first the resume
        $data['resume'] = '';
        if ($request->resume) {
            $this->validate($request, [
                'resume' => 'required|mimes:doc,docx,odt,rtf,pdf|max:900',
            ]);
            $filename = $request->resume->store('resume');
            $data['resume'] = $filename;
        }
        $data['code'] = bin2hex(random_bytes(16));
        Job_Application::create($data);
        return redirect(action('JobController@applyJobSuccess'));
    }

    public function jobApplications(Request $request)
    {
        $job = Job::where('id', $request->id)->where('code', $request->code)->first();
        $job_applications = Job_Application::where('job_id', $request->id)->get();
        return view('job-applications', ['job'=>$job, 'job_applications'=>$job_applications]);
    }

    public function allJobApplications() {
        return view('all-job-applications', ['job_applications'=>Job_Application::all()]);
    }

    public function applyJobSuccess()
    {
        return view('apply-job-success');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

}
