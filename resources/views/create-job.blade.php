@extends('layouts.app')

@section('subtitle', 'Create Job')

@section('content')
    <h3>Create Job</h3>
    <form method="POST" action="{{ action('JobController@createJob') }}" enctype="multipart/form-data">
        @csrf
        <p>Title: <input type="text" name="title" class="form-control" /></p>
        <p>Company: <input type="text" name="company" class="form-control" /></p>
        <p>
            <span>Category: </span>
            <select name="category" class="form-control">
                @foreach ($job_categories as $job_category)
                    <option value="{{ $job_category }}">{{ $job_category }}</option>
                @endforeach
            </select>
        </p>
        <p>
            <span>Type: </span>
            <select name="type" class="form-control">
                <option value="Full Time">Full Time</option>
                <option value="Part Time">Part Time</option>
                <option value="Seasonal">Seasonal</option>
            </select>
        </p>
        <p>
            <span>Monthly Salary:</span>
            <input type="text" name="salary" class="form-control" />
            <span><input type="checkbox" name="show_salary" id="show_salary" /> <label for="show_salary">Display this in the job listings?</label></span>
        </p>
        <p>City: <input type="text" name="city" class="form-control" /></p>
        <p>State: <input type="text" name="state" class="form-control" /></p>
        <p>House & Street: <input type="text" name="house_street" class="form-control" /></p>
        <p>Zip Code: <input type="text" name="zip_code" class="form-control" /></p>
        <p>
            <span>Full Detail:</span>
            <textarea id="full_detail" name="full_detail"></textarea>
        </p>
        <p>
            <span>Logo/Banner: <input type="file" name="logo_banner" class="form-control custom-text-input-height-auto" /></span>
            @if ($errors->has('logo_banner'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('logo_banner') }}</strong>
                </span>
            @endif
        </p>
        <p>Website: <input type="text" name="website" class="form-control" /></p>
        <p>Phone: <input type="text" name="phone" class="form-control" /></p>
        <p>Email: <input type="text" name="email" class="form-control" /></p>
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