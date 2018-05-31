@extends('layouts.app')

@section('subtitle', 'All Jobs')

@section('content')
        <h3>Applicants for {{ $job->title }}</h3>
        <table class="table">
            <thead>
                <tr>
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
                        <td>{{ $ja->first_name }} {{ $ja->last_name }}</td>
                        <td>{{ $ja->email_address }}</td>
                        <td>{{ $ja->mobile_number }}</td>
                        <td>
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