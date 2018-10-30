<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
    <div class="container">
        <div class="d-flex order-0">
            <a class="navbar-brand mr-1" href="/">Moviefy</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse order-2" id="collapsingNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Böngészés<span class="sr-only">Home</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">Filmajánló</a> <!--TODO Filmajánló route -->
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Keresés" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Keresés</button>
            </form>
        </div>
        {{--<span class="navbar-text small text-truncate mt-1 w-50 text-right order-1 order-md-last"></span>--}}
        <div class="dropdown show order-1 order-md-last">
            <a id="navbarDropdown" class="text-right order-1 order-md-last" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                @guest
                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('Bejelentkezés') }}</a>
                    @if (Route::has('register'))
                        <a class="dropdown-item" href="{{ route('register') }}">{{ __('Regisztráció') }}</a>
                    @endif
                @else

                    <a class="dropdown-item" href="{{ route('profile') }}">Profil</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                        Kijelentkezés
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </div>


</nav>
