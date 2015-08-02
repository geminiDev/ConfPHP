<!doctype html>
<html class="no-js" lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard - ConfPHP</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->
    <link rel="stylesheet" href="{{asset('assets/vendor/normalize.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-theme.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome.min.css')}}"/>

    @yield('css')
    <link rel="stylesheet" href="{{asset('assets/css/appDash.min.css')}}"/>
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgradeyour
    browser</a> to improve your experience.</p>
<![endif]-->

<div id="wrapper">
@include('dashboard.partials.menu')
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
</div>

<!----- SCRIPT PLUGINS ----->
<script src="{{asset('assets/js/vendor/jquery-1.11.3.min.js')}}"></script>
<script src="{{asset('assets/js/vendor/boostrap.min.js')}}"></script>
@yield('script')

<!----- SCRIPT Perso ----->
<script src="{{asset('assets/js/plugins.min.js')}}"></script>
<script src="{{asset('assets/js/main.min.js')}}"></script>

</body>
</html>