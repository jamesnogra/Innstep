@extends('layouts.master')

@section('subtitle', 'Find Jobs, Employment, and Career Opportunities')

@section('content')

    <div id="center-large-image-container">
        <div id="large-image-text">Find Jobs, Employment, & Career Opportunities</div>
    </div>

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

    <div class="container">

        <h3>Featured Jobs</h3>
        @foreach($jobs as $job)
            <div class="row job-each-container">
                <div class="col-sm-3">
                    <div class="job-each-logo">
                        <img src="{{ ($job->logo_banner) ? $job->logo_banner : 'images/sample.png' }}" height="100%" width="100%" />
                    </div>
                </div>
                <div class="col-sm-7 job-each-info">
                    <div class="job-each-title">{{ $job->title }}</div>
                    <div class="job-each-bottom-container">
                        <div class="row">
                            <div class="col-md-3"><span class="glyphicon glyphicon-map-marker light-blue-text" aria-hidden="true"></span> Location</div>
                            <div class="col-md-3"><span class="glyphicon glyphicon-th-list light-blue-text" aria-hidden="true"></span> {{ $job->category }}</div>
                            <div class="col-md-4">
                                @if ($job->salary)
                                    <span class="glyphicon glyphicon-usd light-blue-text" aria-hidden="true"></span> {{ $job->salary }}
                                @endif
                            </div>
                            <div class="col-md-2">&nbsp;</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-2 job-each-right-button-container">
                    @if ($job->type=='Full Time')
                        <div class="job-each-right-buttons job-each-right-buttons-ft">{{ $job->type }}</div>
                    @elseif ($job->type=='Part Time')
                        <div class="job-each-right-buttons job-each-right-buttons-pt">{{ $job->type }}</div>
                    @elseif ($job->type=='Seasonal')
                        <div class="job-each-right-buttons job-each-right-buttons-s">{{ $job->type }}</div>
                    @endif
                </div>
            </div>
        @endforeach

        @if ($paginate)
            <center>{{ $jobs->links() }}</center>
        @else
            <div class="index-bottom-button"><a class="large-button" href="{{ action('JobController@indexAll') }}">View All Jobs</a></div>
        @endif

    </div>

@endsection