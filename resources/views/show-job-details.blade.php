@extends('layouts.master')

@section('subtitle', $job->title)

@section('content')

    <div id="center-large-image-container" style="background-image:url('{{ asset('images/servers.jpg') }}')"></div>

    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="container">
        <div class="row">
            <div class="col-sm-2 right-thick-gray-border">
                <div class="job-each-logo">
                    <img src="{{ ($job->logo_banner) ? asset($job->logo_banner) : asset('images/sample.png') }}" height="100%" width="100%" />
                </div>
            </div>
            <div class="col-sm-7">
                <div class="job-each-title">{{ $job->title }}</div>
                <div><b>{{ $job->company }}</b></div>
                <div><span class="glyphicon glyphicon-education light-blue-text" aria-hidden="true"></span>&nbsp;{{ $job->level }}</div>
                <div>
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
                <div>
                    <span class="glyphicon glyphicon-calendar light-blue-text" aria-hidden="true"></span>&nbsp;{{ date_format($job->created_at, 'F d, Y g:iA') }}
                </div>
            </div>
            <div class="col-sm-3">
                <div>&nbsp;</div>
                <div>&nbsp;</div>
                <div class="job-each-right-button-container">
                    @if ($job->type=='Full Time')
                        <div class="job-each-right-buttons job-each-right-buttons-ft">{{ $job->type }}</div>
                    @elseif ($job->type=='Part Time')
                        <div class="job-each-right-buttons job-each-right-buttons-pt">{{ $job->type }}</div>
                    @elseif ($job->type=='Seasonal')
                        <div class="job-each-right-buttons job-each-right-buttons-s">{{ $job->type }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="container">
        <h3>Details</h3>
        <div class="job-details-custom-hr">&nbsp;</div>
        <div>&nbsp;</div>
        <div>{!! $job->full_detail !!}</div>
    </div>

    <div>&nbsp;</div>
    <div>&nbsp;</div>
    <div class="container">
        <h3>How to Apply</h3>
        <div class="job-details-custom-hr">&nbsp;</div>
        <div>&nbsp;</div>
        <div class="col-sm-12">Fill out the form and send us your resume.</div>
    </div>
    <div>&nbsp;</div>
    <div class="container">
        @if ($errors->any())
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    window.location.hash='#applicant-errors';
                });
            </script>
            <div class="alert alert-danger" id="applicant-errors">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ action('JobController@applyJob') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="job_id" value="{{ $job->id }}" />
            <div class="row add-margin-10">
                <div class="col-sm-6"><input type="text" name="first_name" class="custom-text-input custom-text-input-light-border" placeholder="First Name" /></div>
                <div class="col-sm-6"><input type="text" name="last_name" class="custom-text-input custom-text-input-light-border" placeholder="Last Name" /></div>
            </div>
            <div class="row add-margin-10">
                <div class="col-sm-6"><input type="text" name="email_address" class="custom-text-input custom-text-input-light-border" placeholder="Email Address" /></div>
                <div class="col-sm-6"><input type="text" name="mobile_number" class="custom-text-input custom-text-input-light-border" placeholder="Mobile Number" /></div>
            </div>
            <div class="row add-margin-10">
                <div class="col-sm-6"><input type="text" name="house_street" class="custom-text-input custom-text-input-light-border" placeholder="House/Street" /></div>
                <div class="col-sm-6"><input type="text" name="city" class="custom-text-input custom-text-input-light-border" placeholder="City" /></div>
            </div>
            <div class="row add-margin-10">
                <div class="col-sm-6"><input type="text" name="state" class="custom-text-input custom-text-input-light-border" placeholder="State" /></div>
                <div class="col-sm-6"><input type="text" name="zip_code" class="custom-text-input custom-text-input-light-border" placeholder="Zip Code" /></div>
            </div>
            <div class="row add-margin-10">
                <div class="col-sm-6">
                    <span>Resume / CV</span>
                    <input type="file" name="resume" class="custom-text-input custom-text-input-light-border custom-text-input-height-auto" placeholder="State" />
                    <span><small>Only files with .pdf, .doc, .docx, .odt, or .rtf extensions less than 900kb allowed.</small></span>
                </div>
                <div class="col-sm-6">&nbsp;</div>
            </div>
            <div class="row add-margin-10">
                <div class="col-sm-6">
                    <button type="submit" class="large-button">Submit</button>
                    <p>By clicking the submit button, you confirm that all the data you've given is current and correct to the best of your knowledge.</p>
                </div>
            </div>
        </form>
    </div>

@endsection