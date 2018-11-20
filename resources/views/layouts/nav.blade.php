<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">Board game</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                @if (\Illuminate\Support\Facades\Auth::user()['role'] == 'admin')
                    <div class="dropdown">
                        <a class="nav_link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false" href="">{{__('navbar.games')}}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ route('games.index') }}">
                                    {{__('navbar.games')}}
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="dropdown-item" href="{{ ('/games/create') }}">
                                    {{__('navbar.createGame')}}
                                </a>
                            </li>
                        </div>
                    </div>
                @else
                    <li class="nav-item">
                        <a class="nav_link" href="{{ route('games.index') }}">
                            {{__('navbar.games')}}
                        </a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav_link" href="{{ route('players.index') }}">
                        {{__('navbar.players')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav_link" href="{{ route('battles.index') }}">
                        {{__('navbar.battles')}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav_link" href="{{ route('scores.index') }}">
                        {{__('navbar.scores')}}
                    </a>
                </li>

                <div class="dropdown">
                    <a class="nav_link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false" href="">{{__('Language')}}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('battles.index') }}" onclick="event.preventDefault(); document.getElementById('change-language-english').submit();">
                                {{__('English')}}
                            </a>
                            <form id="change-language-english" action="{{ route('languageChange') }}" method="POST" style="display: none;">
                                <input type="text" value="en" name="locale">
                                @csrf
                            </form>
                        </li>

                        <li class="nav-item">
                            <a class="dropdown-item" href="{{ route('languageChange') }}" onclick="event.preventDefault(); document.getElementById('change-language-dutch').submit();">
                                {{__('Nederlands')}}
                            </a>
                            <form id="change-language-dutch" action="{{ route('languageChange') }}" method="POST" style="display: none;">
                                <input type="text" value="nl" name="locale">
                                @csrf
                            </form>
                        </li>
                    </div>
                </div>


                @if (Route::has('login'))
                    @auth
                        <li class="nav-item">
                            <a class="nav_link" href="{{ route('logout') }}"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('navbar.logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav_link" href="{{ route('login') }}">
                                {{__('Login')}}
                            </a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav_link" href="{{ route('register') }}">
                                    {{__('navbar.register')}}
                                </a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>
