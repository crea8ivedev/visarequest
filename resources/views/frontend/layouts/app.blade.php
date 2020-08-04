<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="@yield('page_description', $metaData->keywords ?? '')">
    <meta name="description" content="@yield('page_description', $metaData->description ?? '')">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>{{ config('app.name') }} | @yield('title', $page_title ?? '')</title>
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shortcodes.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/megamenu.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <div class="page">
        <header id="masthead" class="header cmt-header-style-03">
            <meta name="csrf-token" content="{{ csrf_token() }}" />
            @include('frontend.layouts.header')
            @include('frontend.layouts.menu')
        </header>
        @yield('content')
        <a id="totop" href="#top">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
    @include('frontend.common.auth-modal')
    <script>
        var url = '{{route("home")}}';
    </script>
        {!! JsValidator::formRequest('App\Http\Requests\Frontend\AuthRequest','#loginForm') !!}
        {!! JsValidator::formRequest('App\Http\Requests\Frontend\SignupRequest','#signupForm') !!}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.js') }}"></script>
    <script src="{{ asset('js/jquery-waypoints.js') }}"></script>
    <script src="{{ asset('js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/numinate.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.min.js') }}"></script>
    <script src="{{ asset('js/jquery-isotope.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/auth.js') }}" type="text/javascript"></script>
    @foreach(config('layout.resources.validate_js') as $script)
    <script src="{{ asset($script) }}" type="text/javascript"></script>
    @endforeach
    @yield('scripts')
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>