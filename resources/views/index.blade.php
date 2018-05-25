@extends('layouts.master')

@section('subtitle', 'Find Jobs, Employment, and Career Opportunities')

@section('content')

    <div id="center-large-image-container">
        <div id="large-image-text">Find Jobs, Employment, & Career Opportunities</div>
    </div>

    <div class="container">
        <div id="search-filter-container" class="container">
            <div class="row">
                <div class="col-sm-3"><input type="text" class="custom-text-input" name="job_title" id="job_title" placeholder="Job Title" /></div>
                <div class="col-sm-3"><input type="text" class="custom-text-input" name="city_state" id="city_state" placeholder="City / State" /></div>
                <div class="col-sm-3">
                    <select name="job_category" id="job_category" class="custom-text-input">
                        <option value="All" selected>All</option>
                        @foreach ($job_categories as $job_category)
                            <option value="{{ $job_category }}">{{ $job_category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3"><button class="custom-text-input bg-color-logo custom-button" type="button">Filter</button></div>
            </div>
        </div>
        <h2>Featured Jobs</h2>
    </div>

@endsection