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
        window.App = <?php echo json_encode([
            'csrfToken' => csrf_token(),
            'name'  => config('app.name')
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
<<<<<<< HEAD
                        <a href="/dashboard/developers" class="list-group-item">Developers</a>
                        <a href="/dashboard/inquiries" class="list-group-item">Inquiries</a>
                        <a href="/dashboard/downloads" class="list-group-item">Downloads</a>
                        <a href="/dashboard/countries" class="list-group-item">Countries</a>
=======
                    </ul>
                    <ul class="list-group">
                        <a href="/dashboard/developers" class="list-group-item">Manage Developers</a>
                        <a href="/dashboard/countries" class="list-group-item">Manage Countries</a>
                        <a href="/dashboard/categories" class="list-group-item">Manage Categories</a>
                    </ul>
                    <ul class="list-group">
                        <a href="/dashboard/inquiries" class="list-group-item">Project Inquiries</a>
                        <a href="/dashboard/downloads" class="list-group-item">Brochure Downloads</a>
                        <a href="/dashboard/contacts" class="list-group-item">Contact Messages</a>
                    </ul>

                    <ul class="list-group">
                        <a href="{{ url('/logout') }}"
                            class="list-group-item list-group-item-danger"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
                    </ul>
                </aside>
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>

    @include('layouts._dashboard-footer')
