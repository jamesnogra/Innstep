@extends('layouts.app')

@section('subtitle', 'All Jobs')

@section('content')
        <h3>Recent Jobs</h3>
        <!--<table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
                    <th>Company</th>
                    <th>Date Added</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>
                            @if ($job->logo_banner)
                                <img height="24" src="{{ asset($job->logo_banner) }}" />
                            @endif
                        </td>
                        <td>{{ $job->title }}</td>
                        <td>{{ $job->company }}</td>
                        <td>{{ $job->created_at }}</td>
                        <td>
                            <button type="button" class="medium-button-blue"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button>&nbsp;
                            <button type="button" class="medium-button-red" onClick="if(confirm('Are you sure you want to delete this?')){ window.location='{{ action("JobController@deleteJob", ["id"=>$job->id, "code"=>$job->code]) }}'; }"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>-->
        @foreach($jobs as $job)
            <div class="row job-each-container">
                <div class="col-sm-2">
                    <div class="job-each-logo">
                        <img src="{{ ($job->logo_banner) ? asset($job->logo_banner) : asset('images/sample.png') }}" height="100%" width="100%" />
                    </div>
                </div>
                <div class="col-sm-7 job-each-info">
                    <div>&nbsp;</div>
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
                <div class="col-sm-3 job-each-right-button-container">
                    <button type="button" class="medium-button-blue" onClick="window.open('{{ action("JobController@showJobDetails", ["unique_title"=>$job->unique_title]) }}', '_blank');"><span class="glyphicon glyphicon-search" aria-hidden="true"></span> View</button>&nbsp;
                    <button type="button" class="medium-button-blue" onClick="window.location='{{ action("JobController@jobApplications", ["id"=>$job->id, "code"=>$job->code]) }}';"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Applicants ({{ $job->_number_of_applicants($job->id) }})</button>&nbsp;
                    <button type="button" class="medium-button-blue" onClick="window.location='{{ action("JobController@editJob", ["id"=>$job->id, "code"=>$job->code]) }}';"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit</button>&nbsp;
                    <button type="button" class="medium-button-red" onClick="if(confirm('Are you sure you want to delete this?')){ window.location='{{ action("JobController@deleteJob", ["id"=>$job->id, "code"=>$job->code]) }}'; }"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete</button>
                </div>
            </div>
        @endforeach
        <center>{{ $jobs->links() }}</center>
@endsection