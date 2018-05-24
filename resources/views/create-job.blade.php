@extends('layouts.app')

@section('subtitle', 'Create Job')

@section('content')
    <div class="container">
        <h1>Create Job</h1>
        <form method="POST" action="{{ action('JobController@createJob') }}">
            @csrf
            <p>Title: <input type="text" name="title" class="form-control" /></p>
            <p>
                <span>Category: </span>
                <select name="category" class="form-control">
                    <option value="Clerical">Clerical</option>
                    <option value="IT">IT</option>
                    <option value="Arts">Arts</option>
                    <option value="Marketing">Marketing</option>
                </select>
            </p>
            <p>
                <span>Type: </span>
                <select name="type" class="form-control">
                    <option value="Full Time">Full Time</option>
                    <option value="Part Time">Part Time</option>
                    <option value="Contractual">Contractual</option>
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
            <p>Logo/Banner: <input type="file" name="logo_banner" class="form-control" /></p>
            <p>Website: <input type="text" name="website" class="form-control" /></p>
            <p>Phone: <input type="text" name="phone" class="form-control" /></p>
            <p>Email: <input type="text" name="email" class="form-control" /></p>
            <p><button type="submit" class="btn btn-primary">Submit</button></p>
        </form>
    </div>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
    <script>
        $(document).ready(function() {
            $('#full_detail').ckeditor();
            // $('.textarea').ckeditor(); // if class is prefered.
        });
    </script>
@endsection