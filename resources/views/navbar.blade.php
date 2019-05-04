<div class="col-8">
    
    <div class="row">
        
        <nav class="col-4 navbar navbar-dark p-0">
            
            <button class="navbar-toggler" type="button" data-toggle="dropdown" aria-haspopup="true" aria-label="Toggle navigation" id="navbarDropdown">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="dropdown-menu bg-success" aria-labelledby="navbarDropdown">

                <a class="nav-link text-light" href="#">Афіша та квитки</a>

                <a class="nav-link text-light" href="#">Новини міста</a>

                <a class="nav-link text-light" href="#">Прогноз погоди</a>

                <a class="nav-link text-light" href="#">Мапа закладів</a>

                <a class="nav-link text-light" href="#">Список закладів</a>

                <a class="nav-link text-light" href="#">Доставка та оплата</a>

                <a class="nav-link text-light" href="#">Технічна підтримка</a>

            </div>

            <a class="navbar-brand text-center text-uppercase" href="#">
                <span class="h1 font-weight-bold text-light">iCity</span><br>
                <span class="h6 text-dark font-weight-bold"><sup>Місто онлайн</sup></span>
            </a>

            <a class="mx-3 mt-0" href="#"><img src="/img/map.png" alt="map" /></a>


        </nav>

        <div class="col-8 d-flex align-items-center">
            
            <form class="form my-2 my-lg-0 w-100">   
                
                <div class="row w-100 justify-content-end">

                    <div class="col-8">
                        <input class="form-control d-flex mr-2 " type="search" placeholder="Знайти послугу або компанію" aria-label="Search">
                    </div>
                    
                    <div class="col-2">
                        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
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
                <a class="dropdown-item bg-success text-light" href="{{ route('index') }}">Home</a>
            @else
                <a class="dropdown-item bg-success text-light" href="{{ route('login') }}">Login</a>
            @if (Route::has('register'))
                <a class="dropdown-item bg-success text-light" href="{{ route('register') }}">Register</a>
            @endif
            @endauth
        @endif        
        </div>

    </div>

</div>
