<div class="collapse navbar-collapse" id="app-navbar-collapse">
    <!-- Left Side Of Navbar -->
    <ul class="nav navbar-nav">
        <li><a href="/">@lang('nav.home')</a></li>
        <li><a href="{{ route('projects.index') }}">@lang('nav.projects')</a></li>
        <li><a href="/communities">@lang('nav.communities')</a></li>
        <li><a href="/developers">@lang('nav.developers')</a></li>
        <li><a href="/compares">@lang('nav.compare-projects')</a></li>
        <li><a href="/floorplans">@lang('nav.floorplans')</a></li>
        <li><a href="/contact">@lang('nav.contact-us')</a></li>
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                @lang('nav.language') <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="/language/en">English</a></li>
                <li><a href="/language/ar">Arabic</a></li>
            </ul>
        </li>
        
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ url('/login') }}">Login</a></li>
        @else
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
                        <a href="/dashboard">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        @endif
    </ul>
</div>