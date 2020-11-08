<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{url('/theme')}}/assets/css/page.min.css" rel="stylesheet">
    <link href="{{url('/theme')}}/assets/css/style.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{url('/theme')}}/assets/img/apple-touch-icon.png">
    <link rel="icon" href="{{url('/theme')}}/assets/img/favicon.png">
</head>

<body>


<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
    <div class="container">

        <div class="navbar-left">
            <button class="navbar-toggler" type="button">&#9776;</button>
            <a class="navbar-brand" href="{{route('welcome')}}">
                <img class="logo-dark" src="{{url('/theme')}}/assets/img/logo-dark.png" alt="logo">
                <img class="logo-light" src="{{url('/theme')}}/assets/img/logo-light.png" alt="logo">
            </a>
        </div>

        <section class="navbar-mobile">
            <span class="navbar-divider d-mobile-none"></span>

            <ul class="nav nav-navbar">

            </ul>
        </section>

        <a class="btn btn-xs btn-round btn-success mr-5" href="{{route('login')}}">Login</a>
        <a class="btn btn-xs btn-round btn-success" href="{{route('register')}}">Register</a>

    </div>
</nav><!-- /.navbar -->

@yield('header')

@yield('content')


<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="row gap-y align-items-center">

            <div class="col-6 col-lg-3">
                <a href="{{url('/')}}"><img src="{{url('/theme')}}/assets/img/logo-dark.png" alt="logo"></a>
            </div>

            <div class="col-6 col-lg-3 text-right order-lg-last">
                <div class="social">
                    <a class="social-facebook" href="https://www.facebook.com/mohamedmondy152"><i class="fa fa-facebook"></i></a>
                    <a class="social-instagram" href="https://www.instagram.com/mohamedmondy152/"><i class="fa fa-instagram"></i></a>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="nav nav-bold nav-uppercase nav-trim justify-content-lg-center">
                    <a class="nav-link" href="{{url('')}}">Test</a>

                </div>
            </div>

        </div>
    </div>
</footer><!-- /.footer -->


<!-- Scripts -->
<script src="{{url('/theme')}}/assets/js/page.min.js"></script>
<script src="{{url('/theme')}}/assets/js/script.js"></script>

</body>
</html>
