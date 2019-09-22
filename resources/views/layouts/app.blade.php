<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>iCity</title>
        
        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        @yield('styles')
        
        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="/js/footer.js"></script>
        @yield('scripts')
        
    </head>
    
    <body>
        
        <div class="container-fluid m-0 p-0">
            
            <div class="row mx-0 d-none d-xs-none d-sm-none d-md-flex d-lg-flex d-xl-flex">
                @auth
                <div class="col">
                    {{ __('app.your city') }} - {{ (Auth::user()->city) ? Auth::user()->city->{'name_'.app()->getLocale()} : null }}?
                </div>
                @endauth
                
            </div>
                
            <div class="d-flex row mx-0 bg-success">
                
                @include('navbar')
            
            </div>
            
            <div class="container-fluid">
                
                @yield('breadcrumb')
                
                @yield('content')
                
            </div>
            
            <div class="row w-75" id="padding">
                <div class="col my-5">
                    &nbsp;
                </div>
            </div>
                
            <div class="row mx-0 fixed-bottom d-none d-xs-none d-sm-none d-md-flex d-lg-flex d-xl-flex">

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
            
            <div class="row pt-2 align-items-center mx-0 text-light bg-success fixed-bottom d-flex d-xs-flex d-sm-flex d-md-none d-lg-none d-xl-none">
                
                <div class="col">
                    <h5 id="city">
                @auth
                    {{ (Auth::user()->city) ? Auth::user()->city->{'name_'.app()->getLocale()} : null }}
                @endauth
                    </h5>                
                </div>
                
                <div class="col" id=Clock>
                    <h5><span id="hours"></span>:<span id="min"></span></h5>
                </div>
                
                <div class="col">
                    <h5 id="temp"></h5>
                </div>
                                
                <div class="col">
                    <img src="" id="weatherImg" class="center-block">
                </div>
                
            </div>
            
        </div>
                
    </body>
    
</html>
