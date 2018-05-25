@extends('layouts.app')

@section('subtitle', 'All Jobs')

@section('content')
    <div class="container">
        <h1>Recent Jobs</h1>
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Title</th>
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
                        <td>{{ $job->created_at }}</td>
                        <td>
                            <button type="button" class="btn btn-warning">Edit</button>
                            <button type="button" class="btn btn-danger" onClick="if(confirm('Are you sure you want to delete this?')){ window.location='{{ action("JobController@deleteJob", ["id"=>$job->id, "code"=>$job->code]) }}'; }">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection