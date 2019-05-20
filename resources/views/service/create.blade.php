@extends('layouts.app')

@section('breadcrumb')
<div class="row" id="breadcrumbs">
    <nav class="nav my-0 py-0">
        <ol class="breadcrumb m-0 text-truncate">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('service.index') }}">{{ __('app.services admin')}}</a></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')

<h2 class="mt-3">{{ __('app.add') }} {{ __('app.service') }}</h2>

<form action="{{ route('service.store') }}" method="post" id="service-form">
    {{ csrf_field() }}
    
            @foreach(config('app.locales') as $locale)
            
            <div class="form-group row">
                <label class="col-2" for="{{ "name_$locale" }}">{{ __('app.name') }} ({{ __('app.current language', [], $locale) }}) *</label>
                <div class="col-10">
                    <input value="{{ old("name_$locale") }}" autocomplete="{{ "name_$locale" }}" name="{{ "name_$locale" }}" id="{{ "name_$locale" }}" class="form-control @error('{{ "name_$locale" }}') is-invalid @enderror" autofocus required />
                                                                                            
                    @error("name_$locale")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>            

            @endforeach
        
            <div class="form-group row">
                <label class="col-2" for="image">{{ __('app.image') }}</label>
                <div class="col-10">
                    <input value="{{ old('image') }}" autocomplete="image" type="text" name="image" id="image" class="form-control @error('image') is-invalid @enderror" autofocus required />
                                                                                                            
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-2" for="options">{{ __('app.options') }}</label>
                <div class="col-10">
                    <input value="{{ old('options') }}" autocomplete="options" type="text" name="options" id="options" class="form-control @error('options') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('options')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>

<div class="row">
    <div class="col">
        <button type="submit" href="{{ route('service.store') }}" class="btn btn-success">{{ __('app.save') }}</button>
        <a href="{{ route('service.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

</form> 

@endsection