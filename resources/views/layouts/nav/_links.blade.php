<div class="collapse navbar-collapse" id="app-navbar-collapse">
    <!-- Left Side Of Navbar -->
    <ul class="nav navbar-nav">
        <li><a href="/">Home</a></li>
        <li><a href="#">Dubai Off Plan Projects</a></li>
        <li><a href="#">Community</a></li>
        <li><a href="#">Developers</a></li>
        <li><a href="#">Compare Projects</a></li>
        <li><a href="#">Contact Us</a></li>
    </ul>

    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">

        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                Language <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="#">English</a></li>
                <li><a href="#">Arabic</a></li>
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