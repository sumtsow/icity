@extends('layouts.app')

@section('scripts')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=xs70r0zwazereyn8rtwn65o53caspvj14u5eo1t0xl77kt8v"></script>
<script>tinymce.init({selector:'textarea'});</script>
@endsection

@section('breadcrumb')
<div class="row" id="breadcrumbs">
    <nav class="nav my-0 py-0">
        <ol class="breadcrumb m-0 text-truncate">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plan.index') }}">{{ __('app.plans admin')}}</a></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')

<h2 class="mt-3">{{ __('app.add') }} {{ __('app.plan') }}</h2>

<form action="{{ route('plan.store') }}" method="post" id="plan-form">
    {{ csrf_field() }}
    
            <div class="form-group p-2 border border-light rounded">
                <label class="col-2 font-weight-bold px-0">{{ __('app.name') }}</label>
            @foreach(config('app.locales') as $locale)
                <div class="form-group row">
                    <label class="col-2" for="{{ "name_$locale" }}">{{ __('app.current language', [], $locale) }}</label>
                    <div class="col-10">
                        <input value="{{ old("name_$locale") }}" type="text" autocomplete="{{ "name_$locale" }}" name="{{ "name_$locale" }}" id="{{ "name_$locale" }}" class="form-control @error('{{ "name_$locale" }}') is-invalid @enderror" autofocus required />

                        @error("name_$locale")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
            @endforeach
            </div>

            <div class="form-group p-2 border border-light rounded">
                <label class="col-2 font-weight-bold px-0">{{ __('app.description') }}</label>
            @foreach(config('app.locales') as $locale)
                <div class="form-group row">
                    <label class="col-2" for="{{ "description_$locale" }}">{{ __('app.current language', [], $locale) }}</label>
                    <div class="col-10">
                        <textarea rows="5" name="{{ "description_$locale" }}" id="{{ "description_$locale" }}" class="form-control @error('{{ "description_$locale" }}') is-invalid @enderror" autofocus>
{{ old("description_$locale") }}
                        </textarea>
                        @error("description_$locale")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
            @endforeach
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="price">{{ __('app.price') }}, {{ __('app.hrn') }}</label>
                <div class="col-10">
                    <input value="{{ old('price') }}" type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" autofocus min="0.00" max="99999999.99" step="0.01" />
                                                                                                            
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>  
    
            <div class="form-group row">
                <label class="col-2" for="validity">{{ __('app.validity') }}, {{ __('app.month(s)') }}</label>
                <div class="col-10">
                    <input value="{{ old('validity') }}" type="number" name="validity" id="validity" class="form-control @error('validity') is-invalid @enderror" autofocus min="1" max="60" />
                                                                                                            
                    @error('validity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>

<div class="row">
    <div class="col">
        <button type="submit" href="{{ route('plan.update', ['id' => $plan->id]) }}" class="btn btn-success">{{ __('app.save') }}</button>
        <a href="{{ route('plan.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

</form>

@endsection