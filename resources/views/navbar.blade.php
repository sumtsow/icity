<div class="col-8">
    
    <div class="row">
        
        <nav class="col-4 navbar navbar-dark p-0">
            
            <button class="navbar-toggler" type="button" data-toggle="dropdown" aria-haspopup="true" aria-label="Toggle navigation" id="navbarDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdown">

                <a class="nav-link text-light" href="#">{{ __('app.poster & tickets') }}</a>

                <a class="nav-link text-light" href="#">{{ __('app.city news') }}</a>

                <a class="nav-link text-light" href="#">{{ __('app.weather forecast') }}</a>

                <a class="nav-link text-light" href="#">{{ __('app.services map') }}</a>

                <a class="nav-link text-light" href="#">{{ __('app.companies list') }}</a>

                <a class="nav-link text-light" href="#">{{ __('app.delivery & payment') }}</a>

                <a class="nav-link text-light" href="#">{{ __('app.support') }}</a>

            </div>

            <a class="navbar-brand text-center text-uppercase" href="/">
                <span class="h1 font-weight-bold text-light">iCity</span><br>
                <span class="h6 text-dark font-weight-bold"><sup>{{ __('app.online city') }}</sup></span>
            </a>

            <a class="mx-3 mt-0" href="#"><img src="/img/map.png" alt="map" /></a>


        </nav>

        <div class="col-8 d-flex align-items-center">
            
            <form class="form my-2 my-lg-0 w-100">   
                
                <div class="row w-100 justify-content-end">

                    <div class="col-8">
                        <input class="form-control d-flex mr-2 " type="search" placeholder="{{ __('app.find service') }}" aria-label="{{ __('app.search') }}">
                    </div>
                    
                    <div class="col-2">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">{{ __('app.search') }}</button>
                    </div>
                
                </div>
                
            </form>
            
        </div>
        
    </div>
    
</div>

<div class="col-1">&nbsp;</div>

<div class="col-3">
    
    <div class="dropdown mt-1">
        <a class="mx-3 my-1" href="#"><img src="/img/cart.png" alt="map" /></a> 
        <a class="mx-3" href="#" data-toggle="dropdown" aria-haspopup="true" aria-label="User Parameters" id="userDropdown"><img src="/img/user.png" alt="map" /></a>
        <div class="dropdown-menu bg-success mt-5 mr-5" aria-labelledby="userDropdown">
        @if (Route::has('login'))
            @auth
            <a class="dropdown-item bg-success text-light">{{ Auth::user()->lastname.' '.Auth::user()->firstname  }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item bg-success text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('auth.Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>   
                
            @else
            <a class="dropdown-item bg-success text-light" href="{{ route('login') }}">{{ __('auth.login') }}</a>
            @if (Route::has('register'))
            <a class="dropdown-item bg-success text-light" href="{{ route('register') }}">{{ __('auth.register') }}</a>
            @endif
            @endauth
        @endif
            <a class="dropdown-item bg-success text-light" href="/setlocale/ru">{{ __('auth.locale') }}</a>
        </div>

    </div>

</div>
