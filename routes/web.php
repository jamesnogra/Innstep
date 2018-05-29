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
});
Route::get('/home', 'HomeController@index')->name('home');
*/

Auth::routes();

Route::get('/', 'JobController@index');
Route::get('/all', 'JobController@indexAll');

Route::get('/jobs', 'JobController@allJobs');
Route::get('/jobs/create-job', 'JobController@createJob')->middleware('auth');
Route::post('/jobs/create-job', 'JobController@postCreateJob')->middleware('auth');
Route::get('/jobs/delete-job/{id}/{code}', 'JobController@deleteJob')->middleware('auth');


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