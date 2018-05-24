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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/jobs', 'JobController@allJobs');
Route::get('/jobs/create-job', 'JobController@createJob');
Route::post('/jobs/create-job', 'JobController@postCreateJob');
Route::get('/jobs/delete-job/{id}/{code}', 'JobController@deleteJob');