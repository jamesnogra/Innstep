@extends('layouts.master')

@section('subtitle', 'Find Jobs, Employment, and Career Opportunities')

@section('content')

    <div id="center-large-image-container" style="background-image:url('{{ asset('images/guy-working.jpg') }}')">
        <div id="large-image-text">Find Jobs, Employment, & Career Opportunities</div>
    </div>

    <div id="search-filter-container" class="container">
        <div class="row">
            <form method="GET" action="{{ action('JobController@indexAll') }}">
                <div class="col-sm-3"><input type="text" class="custom-text-input" name="job_title" id="job_title" placeholder="Job Title" value="{{ (isset($request['job_title'])) ? $request['job_title'] : '' }}" /></div>
                <div class="col-sm-3"><input type="text" class="custom-text-input" name="city_state" id="city_state" placeholder="City / State" value="{{ (isset($request['city_state'])) ? $request['city_state'] : '' }}" /></div>
                <div class="col-sm-3">
                    <select name="job_category" id="job_category" class="custom-text-input">
                        <option value="" selected>All</option>
                        @foreach ($job_categories as $job_category)
                            <option value="{{ $job_category }}" {{ (isset($request['job_category']) && $request['job_category']==$job_category) ? 'selected' : '' }}>{{ $job_category }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-3"><button class="custom-text-input bg-color-logo custom-button" type="submit">Filter</button></div>
            </form>
        </div>
    </div>

    <div class="container">

        <h3>Featured Jobs</h3>
        @foreach($jobs as $job)
        <a href="{{ action('JobController@showJobDetails', ['unique_title'=>$job->unique_title]) }}" class="remove-text-decoration-a">
            <div class="row job-each-container">
                <div class="col-sm-2">
                    <div class="job-each-logo">
                        <img src="{{ ($job->logo_banner) ? asset($job->logo_banner) : asset('images/sample.png') }}" height="100%" width="100%" />
                    </div>
                </div>
                <div class="col-sm-8 job-each-info">
                    <div style="height:10px;">&nbsp;</div>
                    <div class="job-each-title">{{ $job->title }}</div>
                    <div>&nbsp;</div>
                    <div class="job-each-bottom-container">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="glyphicon glyphicon-map-marker light-blue-text" aria-hidden="true"></span>&nbsp;
                                @if ($job->house_street)
                                    <span>{{ $job->house_street }}, </span>
                                @endif
                                @if ($job->city)
                                    <span>{{ $job->city }}, </span>
                                @endif
                                @if ($job->state)
                                    <span>{{ $job->state }}, </span>
                                @endif
                                @if ($job->zip_code)
                                    <span>{{ $job->zip_code }}</span>
                                @endif
                            </div>
                            <div class="col-md-3"><span class="glyphicon glyphicon-th-list light-blue-text" aria-hidden="true"></span> {{ $job->category }}</div>
                            <div class="col-md-3">
                                @if ($job->salary && $job->show_salary==1)
                                    <span class="glyphicon glyphicon-usd light-blue-text" aria-hidden="true"></span> {{ $job->salary }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div class="col-sm-2 job-each-right-button-container">
                    <!--<a href="{{ action('JobController@showJobDetails', ['id'=>$job->id, 'code'=>$job->code, 'title'=>$job->title]) }}" class="remove-text-decoration-a">-->
                        @if ($job->type=='Full Time')
                            <div class="job-each-right-buttons job-each-right-buttons-ft">{{ $job->type }}</div>
                        @elseif ($job->type=='Part Time')
                            <div class="job-each-right-buttons job-each-right-buttons-pt">{{ $job->type }}</div>
                        @elseif ($job->type=='Seasonal')
                            <div class="job-each-right-buttons job-each-right-buttons-s">{{ $job->type }}</div>
                        @endif
                    <!--</a>-->
                </div>
            </div>
        </a>
        @endforeach

        @if ($paginate)
            <center>{{ $jobs->links() }}</center>
        @else
            <div class="index-bottom-button"><a class="large-button" href="{{ action('JobController@indexAll') }}">View All Jobs</a></div>
        @endif

    </div>

@endsection