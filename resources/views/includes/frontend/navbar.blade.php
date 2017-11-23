<nav class="navbar navbar-default navbar-fixed-top" style="height:60px;">
            <div class="container">
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
                        <img src="../images/logo.png" height="50px" style="margin-top:-8px;">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                        <li><a href="/posts/background">Background</a></li>
                        <li><a href="/posts/venue">Venue</a></li>
                        <li><a href="/posts/speaker">Speaker</a></li>
                        <li><a href="/posts/topics">Topics</a></li>
                        <li><a href="/posts/event">Event</a></li>
                        <li><a href="/posts/scheduled">Scheduled</a></li>
                        <li><a href="/posts/organization">Organization</a></li>
                        <li><a href="/posts/contact">Contact</a></li>

                    </ul>
                    {{-- <form action="#" class="navbar-form navbar-left">
                        <div class="form-group">
                          <input type="" name="" class="form-control" placeholder="Search">      
                        </div>
                        <button class="btn btn-default">Submit</button>
                    </form> --}}

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Registrasi</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

