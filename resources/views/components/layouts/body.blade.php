@props([
    'title' => ''
])
<x-layouts.header title="{{ $title }}"/>

<body>
    <header>
        <!--====== NAVBAR ONE PART START ======-->
        <section class="navbar-area navbar-one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="/">
                                <img src="{{asset('img/logo.png')}}" alt="Event Company"/>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarOne" aria-controls="navbarOne" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                                <ul class="navbar-nav m-auto">
                                    <li class="nav-item">
                                        <a class="{{ request()->routeIs('home.index') ? 'active' : ''  }}" href="{{ route('home.index')  }}">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ request()->routeIs('about.index') ? 'active' : ''  }}" href="{{ route('about.index')  }}">About Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="{{ request()->routeIs('events.index') ? 'active' : ''  }}" href="{{ route('events.index')  }}">Events</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="navbar-btn d-none d-sm-inline-block">
                                @if(user())
                                    <ul>
                                        <li>
                                            <a class="btn primary-btn-outline" href="#">Logout</a>
                                        </li>
                                    </ul>
                                @endif
                            </div>
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </section>
        <!--====== NAVBAR ONE PART ENDS ======-->
    </header>
    {{ $slot }}
    <x-layouts.footer/>
</body>

