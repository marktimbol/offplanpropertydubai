<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('pageTitle') | {{ config('app.name') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    @yield('header_styles')
    <!-- Scripts -->
    <script>
        window.OffPlanProperty = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="@yield('bodyClass')">

    @include('layouts.nav._nav')

    @yield('content')

    @include('layouts._footer')

    <!-- Scripts -->
    <script src="/js/app.js"></script>

    @yield('footer_scripts')

    @include('flash')
</body>
</html>
