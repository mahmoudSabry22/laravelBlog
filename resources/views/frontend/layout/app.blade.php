<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Stack Multipurpose HTML Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Site Description Here">
        <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('frontend/css/stack-interface.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('frontend/css/socicon.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('frontend/css/lightbox.min.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('frontend/css/flickity.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('frontend/css/iconsmind.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('frontend/css/jquery.steps.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('frontend/css/theme.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:200,300,400,400i,500,600,700%7CMerriweather:300,300i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <style media="screen">
            .page-item{
                display: inline-block;
            }
        </style>
    </head>
    <body class=" ">
        <a id="start"></a>

        @include('frontend.includes.header')


        @include('frontend.includes.nav')

        <div class="main-container">
            
            @yield('content')

            @include('frontend.includes.footer')
        </div>

        <div class="loader"></div>

        <a class="back-to-top inner-link" href="#start" data-scroll-class="100vh:active">
            <i class="stack-interface stack-up-open-big"></i>
        </a>

        <script src="{{ asset('frontend/js/jquery-3.1.1.min.js') }}"></script>
        <script src="{{ asset('frontend/js/flickity.min.js') }}"></script>
        <script src="{{ asset('frontend/js/easypiechart.min.js') }}"></script>
        <script src="{{ asset('frontend/js/parallax.js') }}"></script>
        <script src="{{ asset('frontend/js/typed.min.js') }}"></script>
        <script src="{{ asset('frontend/js/datepicker.js') }}"></script>
        <script src="{{ asset('frontend/js/isotope.min.js') }}"></script>
        <script src="{{ asset('frontend/js/ytplayer.min.js') }}"></script>
        <script src="{{ asset('frontend/js/lightbox.min.js') }}"></script>
        <script src="{{ asset('frontend/js/granim.min.js') }}"></script>
        <script src="{{ asset('frontend/js/jquery.steps.min.js') }}"></script>
        <script src="{{ asset('frontend/js/countdown.min.js') }}"></script>
        <script src="{{ asset('frontend/js/twitterfetcher.min.js') }}"></script>
        <script src="{{ asset('frontend/js/spectragram.min.js') }}"></script>
        <script src="{{ asset('frontend/js/smooth-scroll.min.js') }}"></script>
        <script src="{{ asset('frontend/js/scripts.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.loader').addClass('hidden');
            });
        </script>
    </body>
</html>
