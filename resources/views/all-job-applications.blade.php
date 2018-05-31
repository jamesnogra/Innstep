@extends('layouts.app')

@section('subtitle', 'All Jobs')

@section('content')
        <h3>All Applicants</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Company</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($job_applications as $ja)
                    <tr>
                        <td>
                            <a href="{{ action("JobController@jobApplications", ["id"=>$ja->_job->id, "code"=>$ja->_job->code]) }}" title="Show all applicants for this job title.">
                                {{ $ja->_job->title }}
                            </a>
                        </td>
                        <td>{{ $ja->_job->company }}</td>
                        <td>{{ $ja->first_name }} {{ $ja->last_name }}</td>
                        <td>{{ $ja->email_address }}</td>
                        <td>{{ $ja->mobile_number }}</td>
                        <td>
                            @if ($ja->house_street)
                                <span>{{ $ja->house_street }}, </span>
                            @endif
                            @if ($ja->city)
                                <span>{{ $ja->city }}, </span>
                            @endif
                            @if ($ja->state)
                                <span>{{ $ja->state }}, </span>
                            @endif
                            @if ($ja->zip_code)
                                <span>{{ $ja->zip_code }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($ja->resume)
                                <a target="_blank" href="{{ asset($ja->resume) }}" />Resume / CV</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@endsection