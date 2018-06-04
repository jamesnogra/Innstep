@extends('layouts.app')

@section('subtitle', 'Edit Job')

@section('content')
    <h3>Edit Job</h3>
    <form method="POST" action="{{ action('JobController@postEditJob') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $job->id }}" />
        <input type="hidden" name="code" value="{{ $job->code }}" />
        <p>Title: <input type="text" name="title" class="form-control" value="{{ $job->title }}" /></p>
        <p>Company: <input type="text" name="company" class="form-control" value="{{ $job->company }}" /></p>
        <p>
            <span>Category: </span>
            <select name="category" class="form-control">
                @foreach ($job_categories as $job_category)
                    <option value="{{ $job_category }}" {{ ($job->category==$job_category) ? 'selected' : '' }}>{{ $job_category }}</option>
                @endforeach
            </select>
        </p>
        <p>
            <span>Type: </span>
            <select name="type" class="form-control">
                <option value="Full Time" {{ ($job->type=='Full Time') ? 'selected' : '' }}>Full Time</option>
                <option value="Part Time" {{ ($job->type=='Part Time') ? 'selected' : '' }}>Part Time</option>
                <option value="Seasonal" {{ ($job->type=='Seasonal') ? 'selected' : '' }}>Seasonal</option>
            </select>
        </p>
        <p>
            <span>Job Level: </span>
            <select name="level" class="form-control">
                @foreach ($job_levels as $job_level)
                    <option value="{{ $job_level }}" {{ ($job->level==$job_level) ? 'selected' : '' }}>{{ $job_level }}</option>
                @endforeach
            </select>
        </p>
        <p>
            <span>Monthly Salary:</span>
            <input type="text" name="salary" class="form-control" value="{{ $job->salary }}" />
            <span><input type="checkbox" name="show_salary" id="show_salary" {{ ($job->show_salary==1) ? 'checked' : '' }}/> <label for="show_salary">Display this in the job listings?</label></span>
        </p>
        <p>City: <input type="text" name="city" class="form-control" value="{{ $job->city }}" /></p>
        <p>State: <input type="text" name="state" class="form-control" value="{{ $job->state }}" /></p>
        <p>House & Street: <input type="text" name="house_street" class="form-control" value="{{ $job->house_street }}" /></p>
        <p>Zip Code: <input type="text" name="zip_code" class="form-control" value="{{ $job->zip_code }}" /></p>
        <p>
            <span>Full Detail:</span>
            <textarea id="full_detail" name="full_detail">{{ $job->full_detail }}</textarea>
        </p>
        <p>
            Current Logo/Banner<br />
            <img src="{{ ($job->logo_banner) ? asset($job->logo_banner) : asset('images/sample.png') }}" width="50px" />
        </p>
        <p>
            <span>New Logo/Banner: <input type="file" name="logo_banner" class="form-control custom-text-input-height-auto" /></span>
            @if ($errors->has('logo_banner'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('logo_banner') }}</strong>
                </span>
            @endif
        </p>
        <p>Website: <input type="text" name="website" class="form-control" value="{{ $job->website }}" /></p>
        <p>Phone: <input type="text" name="phone" class="form-control" value="{{ $job->phone }}" /></p>
        <p>Email: <input type="text" name="email" class="form-control" value="{{ $job->email }}" /></p>
        <p><button type="submit" class="large-button">Submit</button></p>
    </form>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#full_detail').ckeditor();
            // $('.textarea').ckeditor(); // if class is prefered.
        });
    </script>
@endsection