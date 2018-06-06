<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/home', 'HomeController@index')->name('home');


Auth::routes();

Route::get('/', 'JobController@index');
Route::get('/all', 'JobController@indexAll');
Route::get('/job-details/{unique_title}', 'JobController@showJobDetails');
Route::get('/about', 'JobController@about');
Route::get('/contact', 'JobController@contact');

Route::get('/jobs', 'JobController@allJobs')->middleware('auth');
Route::post('/jobs/apply', 'JobController@applyJob');
Route::get('/jobs/apply-success', 'JobController@applyJobSuccess');
Route::get('/jobs/create-job', 'JobController@createJob')->middleware('auth');
Route::post('/jobs/create-job', 'JobController@postCreateJob')->middleware('auth');
Route::get('/jobs/delete-job/{id}/{code}', 'JobController@deleteJob')->middleware('auth');
Route::get('/jobs/edit-job', 'JobController@editJob')->middleware('auth');
Route::post('/jobs/post-edit-job', 'JobController@postEditJob')->middleware('auth');
Route::get('/jobs/applications/{id}/{code}', 'JobController@jobApplications')->middleware('auth');
Route::get('/jobs/applications-all/', 'JobController@allJobApplications')->middleware('auth');
Route::get('/jobs/all-admins', 'JobController@allAdmins')->middleware('auth');
Route::get('/jobs/delete-admin-user/{id}', 'JobController@deleteAdminUser')->middleware('auth');
Route::get('/jobs/add-admin-user', 'JobController@addAdminUser')->middleware('auth');
Route::post('/jobs/add-admin-user', 'JobController@postAddAdminUser')->middleware('auth');


//route for the images
Route::get('/logo_banner/{filename}', function ($filename)
{
    $path = storage_path() . '/app/logo_banner/' . $filename;
    //return $path;
    if(!File::exists($path)) abort(404);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});

//route for the resume
Route::get('/resume/{filename}', function ($filename)
{
    $path = storage_path() . '/app/resume/' . $filename;
    //return $path;
    if(!File::exists($path)) abort(404);
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});