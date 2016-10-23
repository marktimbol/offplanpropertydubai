<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    {{-- <link href="{{ elixir('css/admin.css') }}" rel="stylesheet"> --}}
    <link href="/css/admin.css" rel="stylesheet">

    @yield('header_styles')

    <!-- Scripts -->
    <script>
        window.OffPlan = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body class="Dashboard">

    @include('layouts.nav._dashboard')

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <aside>
                    <h3>Navigation</h3>
                    <ul class="list-group">
                        <a href="/dashboard" class="list-group-item">Home</a>
                        <a href="/dashboard/developers" class="list-group-item">Developers</a>                            
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    @include('layouts._dashboard-footer')
