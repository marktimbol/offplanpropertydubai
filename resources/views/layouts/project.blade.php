<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="{{ str_limit(strip_tags($project->description), 300) }}">
    <title>@yield('pageTitle') | {{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    <link href="/css/carousel.css" rel="stylesheet">

    @yield('header_styles')

    <!-- Scripts -->
    <script>
        window.App = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="@yield('bodyClass')">

    @include('layouts.nav._project')

    @yield('content')

    @include('layouts._footer')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
    <script src="{{ elixir('js/carousel.js') }}"></script>

    @yield('footer_scripts')

    @include('flash')

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-87012829-1', 'auto');
      ga('send', 'pageview');

    </script>
</body>
</html>
