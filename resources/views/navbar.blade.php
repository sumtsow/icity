        <nav class="col-1 navbar navbar-dark p-0" style="min-height:  88px">
            
            <button class="navbar-toggler" type="button" data-toggle="dropdown" aria-haspopup="true" aria-label="Toggle navigation" id="navbarDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdown">
                
                <a class="nav-link text-light d-xs-flex d-sm-flex d-md-flex d-lg-none d-xl-none" href="{{ url('/') }}">{{ __('app.main') }}</a>

            @auth
            <a class="nav-link text-light d-xs-flex d-sm-flex d-md-flex d-lg-none d-xl-none"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-2').submit();">{{ __('auth.Logout') }}</a>
            <form id="logout-form-2" action="{{ route('logout') }}" method="post" style="display: none;">@csrf</form>   
                
            @else
            <a class="nav-link text-light d-xs-flex d-sm-flex d-md-flex d-lg-none d-xl-none" href="{{ route('login') }}">{{ __('auth.login') }}</a>
            
            @endauth
                
                <a class="nav-link text-light" href="{{ url('/tickets') }}">{{ __('app.poster & tickets') }}</a>

                <a class="nav-link text-light" href="{{ url('/news') }}">{{ __('app.city news') }}</a>

                <a class="nav-link text-light" href="{{ url('/forecast') }}">{{ __('app.weather forecast') }}</a>

                <a class="nav-link text-light" href="{{ url('/service') }}">{{ __('app.services map') }}</a>

                <a class="nav-link text-light" href="{{ url('/company') }}">{{ __('app.companies list') }}</a>

                <a class="nav-link text-light" href="{{ url('/delivery') }}">{{ __('app.delivery & payment') }}</a>

                <a class="nav-link text-light" href="{{ url('/support') }}">{{ __('app.support') }}</a>

            </div>

        </nav>

        <div class="col-2">
            <a class="navbar-brand text-center text-uppercase d-none d-xs-none d-sm-none  d-md-block d-lg-block d-xl-block" href="/">
                <span class="h1 font-weight-bold text-light">iCity</span><br>
                <span class="h6 text-dark font-weight-bold"><sup>{{ __('app.online city') }}</sup></span>
            </a>
        </div>

        <div class="col my-auto mx-3 d-none d-xs-none d-sm-none d-md-flex d-lg-flex d-xl-flex">
            <a class="" href="#"><img src="/img/map.png" alt="Map" /></a>
        </div>

        <div class="col w-100">
            
            <form class="form my-4">   
                
                <div class="d-inline-flex justify-content-end my-auto">

                    <div class="mr-2">
                        <input class="form-control mr-2" type="search" placeholder="{{ __('app.find service') }}" aria-label="{{ __('app.search') }}">
                    </div>
                    
                    <div class="mr-2">
                        <button title="{{ __('app.search') }}" class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                    </div>
                
                </div>
                
            </form>
            
        </div>

<div class="col-4 d-none d-xs-none d-sm-none d-md-flex d-lg-flex d-xl-flex justify-content-end">
    
    <a class="my-auto" href="{{ route('cart.index') }}"><img src="/img/cart.png" alt="Cart" />
        @auth
        @if(isset(Auth::user()->cart->services))
        <span class="badge badge-pill badge-light position-absolute" style="margin: 4px 0 0 -50px !important">{{ count(Auth::user()->cart->services) }}</span>
        @endif
        @endauth
    </a>
    
    <div class="d-inline dropdown my-auto">
       
        <a class="mx-3" href="#" data-toggle="dropdown" aria-haspopup="true" aria-label="User Parameters" id="userDropdown"><img src="/img/user.png" alt="User" /></a>
        <div class="dropdown-menu bg-success mt-5 mr-2" aria-labelledby="userDropdown">
        @if (Route::has('login'))
            @auth
            <p class="dropdown-item bg-success text-light">{{ Auth::user()->lastname.' '.Auth::user()->firstname  }}</p>
            <div class="dropdown-divider"></div>
            
            <a class="dropdown-item bg-success text-light" href="{{ route('home') }}">{{ __('auth.Dashboard') }}</a>
            <div class="dropdown-divider"></div>

            <a class="dropdown-item bg-success text-light" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('auth.Logout') }}</a>
            <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">@csrf</form>   
                
            @else
            <a class="dropdown-item bg-success text-light" href="{{ route('login') }}">{{ __('auth.login') }}</a>
            
            @if (Route::has('register'))
            <a class="dropdown-item bg-success text-light" href="{{ route('register') }}">{{ __('auth.register') }}</a>
            @endif
            
            @endauth
            
        @endif
            
        </div>
                
    </div>
    
</div>
