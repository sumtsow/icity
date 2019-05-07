<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>iCity</title>
        
        <!-- Styles -->
        <link rel="stylesheet" href="/css/style.css">
        
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        
    </head>
    
    <body>
        
        <div class="container-fluid m-0 p-0">
            
            <div class="row mx-0">
                @auth
                <div class="col">
                    {{ __('app.your city') }} - {{ Auth::user()->city->$name }}?
                </div>
                @endauth
                
            </div>
                
            <div class="row mx-0 bg-success">
                
                @include('navbar')
            
            </div>
            
            <div class="container-fluid">
                
                @yield('content')
                
            </div>
                
            <div class="row mx-0 fixed-bottom">

                <div class="col text-light bg-success p-3">
                    &copy; iCity 2019
                </div>
                
                <div class="col-2 text-light bg-success p-3">
                    <form method="get" action="/setlocale">
                        @csrf
                        
                        <select class="custom-select custom-select-sm mb-3" name="locale" onChange="this.form.submit();">
                            <option selected>{{ __('app.select language') }}</option>
                            @foreach(config('app.locales') as $locale)
                            <option value="{{ $locale }}">{{ __('app.current language', [], $locale) }}</option>
                            @endforeach
                        </select>
                    </form>
                </div>
                
            </div>
            
        </div>
                
    </body>
    
</html>
