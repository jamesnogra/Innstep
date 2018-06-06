<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - @yield('subtitle')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{ asset('css/my.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>
<body>
        <!--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>-->

    <div id="top-banner">
        <div id="top-banner-logo"><a href="/"><img src="{{ asset('images/logo.png') }}" height="100%" /></a></div>
        <div id="top-banner-right">
            <div>
                <form  id="logout-form" action="{{ route('logout') }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="job-each-right-buttons job-each-right-buttons-ft">Logout</button>
                </form>
            </div>
        </div>
        <div id="top-banner-right" class="top-banner-with-right-border">
            <div>Welcome,<br /><span id="top-banner-username">{{ \Auth::user()->name }}</span></div>
        </div>
    </div>

    <div class="main-content-container">
        <div id="left-navigation">
            <div class="left-navigation-each-container" onClick="window.location='{{ action('JobController@allJobs') }}';"><span class="glyphicon glyphicon-cog light-blue-text" aria-hidden="true"></span>&nbsp;&nbsp;Dashboard</div>
            <div class="left-navigation-each-container" onClick="window.location='{{ action('JobController@createJob') }}';"><span class="glyphicon glyphicon-plus light-blue-text" aria-hidden="true"></span>&nbsp;&nbsp;Create Job</div>
            <div class="left-navigation-each-container" onClick="window.location='{{ action('JobController@allJobApplications') }}';"><span class="glyphicon glyphicon-user light-blue-text" aria-hidden="true"></span>&nbsp;&nbsp;Applicants</div>
            <div class="left-navigation-each-container" onClick="window.location='{{ action('JobController@allAdmins') }}';"><span class="glyphicon glyphicon-user light-blue-text" aria-hidden="true"></span>&nbsp;&nbsp;Admin Users</div>
        </div>
        <div id="right-navigation">
            <main class="add-padding-20 add-margin-to-bottom">
                @yield('content')
            </main>
        </div>
    </div>

</body>
</html>
