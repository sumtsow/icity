<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>iCity</title>
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
    </head>
    
    <body>
        
        <div class="container-fluid m-0 p-0">
            
            <div class="row mx-0">
                
                <div class="col">
                    Ваше місто - Харків?
                </div>
                
            </div>
                
            <div class="row mx-0 bg-success">
                
                <nav class="navbar navbar-dark">
                    <button class="navbar-toggler" type="button" data-toggle="dropdown" aria-haspopup="true" aria-label="Toggle navigation">
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

                </nav>
            
                <a class="navbar-brand text-center text-uppercase" href="#">
                    <span class="h1 font-weight-bold text-light">iCity</span><br>
                    <span class="h6 text-dark font-weight-bold"><sup>Місто онлайн</sup></span>
                </a>
                
                <button class="btn btn-outline-light rounded-circle mx-3 my-2 px-3 py-1"><i class="h1 fas fa-map-marked-alt"></i></button>

                
                <form class="form-inline my-2 my-lg-0">

                    <input class="form-control mr-sm-2" type="search" placeholder="Знайти послугу або компанію" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>

                </form>
                
                <div class="col-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/') }}">Main</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                @endif
                </div>
                
                <button class="btn btn-outline-light rounded-circle mx-3 my-2 px-3 py-1"><i class="h1 fas fa-shopping-cart"></i></button>

                <button class="btn btn-outline-light rounded-circle mx-3 my-2 px-3 py-1"><i class="h1 fas fa-user"></i></button>
                
            </div>
            
            <div class="container-fluid">
                
                @yield('content')
                
            </div>
                
            <div class="row mx-0 fixed-bottom">

                <div class="col text-light bg-success p-3">
                    &copy; iCity 2019
                </div>

            </div>
            
        </div>
                
    </body>
    
</html>
