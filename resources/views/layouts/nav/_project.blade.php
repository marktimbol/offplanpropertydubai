<nav class="navbar navbar-default navbar-static-top">
<<<<<<< HEAD
    <div class="container">
=======
    <div class="container-fluid">
>>>>>>> d442f8544cd7c633002271aa2830201155c4d758
        <div class="navbar-header">
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ $project->name }}
            </a>
        </div>

        @include('layouts.nav._links')
    </div>
</nav>