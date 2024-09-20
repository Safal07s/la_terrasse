<body>
    <!-- Header -->
    <section id="header">
        <div class="header container">
            <div class="nav-bar">
                <div class="brand">
                    <a class="nav-link" href="{{ url('/') }}#hero">
                        <h1 class="text-center" style="font-family:Copperplate; color:whitesmoke;"> The Calm</h1>
                        <span class="sr-only"></span>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <div class="navbar-container">
                        <div class="navbar">
                            <ul>
                                <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="#hero"
                                        data-after="Home">Home</a></li>
                                <li><a href="#projects" data-after="Projects">Menu</a></li>
                                <li><a href="#about" data-after="About">About</a></li>
                                <li><a href="#contact" data-after="Contact">Contact</a></li>
                                <li><a class="{{ Request::is('reservation') ? 'active' : '' }}"
                                        href="{{ url('/reservation') }}" data-after="Service">Reservation</a></li>

                                <!-- Staff Button -->
                                @if (Auth::check() && Auth::user()->role != 'customer')
                                    <li><a class="{{ Request::is('index') ? 'active' : '' }}"
                                            href="{{ url('/sa.index') }}" data-after="Staff">Staff</a></li>
                                @endif

                                <!-- Account Dropdown -->
                                <div class="dropdown">
                                    <button class="dropbtn">
                                        @if (Auth::check())
                                            Welcome, {{ explode(' ', Auth::user()->name)[0] }}
                                            <!-- Display "Welcome, First Name" -->
                                        @else
                                            ACCOUNT
                                        @endif
                                        <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </button>
                                    <div class="dropdown-content">
                                        @if (Auth::check())
                                            <!-- Display for logged-in users -->
                                            <p class="logout-link"
                                                style="font-size:1.3em; margin-left:15px; padding:5px; color:white;">
                                                {{ Auth::user()->name }} <!-- Display the user's name -->
                                            </p>
                                            <p class="logout-link"
                                                style="font-size:1.3em; margin-left:15px; padding:5px; color:white;">
                                                {{ Auth::user()->email }}
                                            </p>
                                            <p class="status-link"
                                                style="font-size:1.3em; margin-left:15px; padding:5px; color:lightgreen;">
                                                Status: Online <!-- Status showing "Online" -->
                                            </p>
                                            <!-- View Reservation Button -->
                                            <a class="view-reservation-link" style="color: white; font-size:1.3em;"
                                                href="{{ url('/viewreservation') }}">View Reservation</a>
                                            <a class="logout-link" style="color: white; font-size:1.3em;"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        @else
                                            <!-- Display for guests (not logged in) -->
                                            <a class="signin-link" style="color: white; font-size:15px;"
                                                href="{{ url('/signin') }}">Sign Up</a>
                                            <a class="login-link" style="color: white; font-size:15px;"
                                                href="{{ url('/user_login') }}">Log In</a>
                                        @endif
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header -->
</body>
