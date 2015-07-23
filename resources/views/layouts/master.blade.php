<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>conférence PHP</title>
    <meta content="conférence PHP" name="description">
    <meta content="Antoine AFUP" name="author">
    <meta content="Paris, France" name="geo.placename">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <link rel="stylesheet" href="/assets/vendor/normalize.min.css">
    <link rel="stylesheet" href="/assets/css/app.min.css">
</head>
<body>
<div id="main" role="main">

    @include('blog.includes.header')
    @yield('content')
    @include('blog.includes.aside')
    @include('blog.includes.footer')

</div>

</body>
</html>