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

    <!-- Styles -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">

    <!--override bootsrtap CSS -->
    <link rel="stylesheet" href="{{ asset('css/my.css') }}">    

</head>
<body>

    <div id="app">

        <div class="container">
            <nav class="navbar">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <a class="navbar-brand height-100" href="/"><img src="{{ asset('images/logo.png') }}" height="100%" /></a>
                    </div>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#" class="height-100 nav-li"><div>Job Listings</div></a></li>
                        <li><a href="#" class="height-100 nav-li"><div>About</div></a></li>
                        <li><a href="#" class="height-100 nav-li"><div>Contact</div></a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <main class="py-4" id="index-main-container">
            @yield('content')
        </main>

        <footer class="footer" id="footer-container">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 footer-columns">
                        <img src="{{ asset('images/logo.png') }}" width="50%" />
                        <p>Lorem ipsum dolor sit amet, nulla mazim officiis has id. Et munere alienum signiferumque pri, no augue salutandi referrentur mei, vis quem luptatum in.</p>
                    </div>
                    <div class="col-sm-4 footer-columns">
                        <div class="footer-item-title">Job Seekers</div>
                        <hr class="footer-hr" />
                        <ul>
                            <li>Company Profiles</li>
                            <li>Jobs by Specialization</li>
                            <li>Jobs by Company Name</li>
                            <li>Terms of Use</li>
                            <li>Privacy Policy</li>
                            <li>Safe Job Search Guide</li>
                            <li>Site Map</li>
                        </ul>
                    </div>
                    <div class="col-sm-4 footer-columns">
                        <div class="footer-item-title">Contact Us</div>
                        <hr class="footer-hr" />
                        <p><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;info@innstep.com</p>
                        <p><span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;+1 234 567 8900</p>
                    </div>
                </div>
            </div>
        </footer>

    </div>

</body>
</html>