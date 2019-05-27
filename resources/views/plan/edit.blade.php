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
            <li class="breadcrumb-item"><a href="{{ route('plan.show', ['id' => $plan->id]) }}">{{ __('app.plan') }} {{ $plan->{'description_'.app()->getLocale()} }}</a></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')

<h2 class="mt-3">{{ __('app.plan') }} <em>{{ $plan->{'description_'.app()->getLocale()} }}</em></h2>

<form action="{{ route('plan.update', ['id' => $plan->id]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('put') }}
    
            <div class="form-group row">
                <label class="col-2" for="id">{{ __('app.id') }}</label>
                <div class="col-10">
                    <input value="{{ $plan->id }}" type="text" name="id" id="id" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group p-2 border border-light rounded">
                <label class="col-2 font-weight-bold px-0">{{ __('app.name') }}</label>
            @foreach(config('app.locales') as $locale)
                <div class="form-group row">
                    <label class="col-2" for="{{ "name_$locale" }}">{{ __('app.current language', [], $locale) }}</label>
                    <div class="col-10">
                        <input value="{{ $plan->{"name_$locale"} }}" type="text" name="{{ "name_$locale" }}" id="{{ "name_$locale" }}" class="form-control @error('{{ "name_$locale" }}') is-invalid @enderror" autofocus required />

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
{{ $plan->{"description_$locale"} }}
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
                    <input value="{{ $plan->price }}" type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" autofocus min="0.00" max="99999999.99" step="0.01" />
                                                                                                            
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
                    <input value="{{ $plan->validity }}" type="number" name="validity" id="validity" class="form-control @error('validity') is-invalid @enderror" autofocus min="1" max="60" />
                                                                                                            
                    @error('validity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="created_at">{{ __('app.created at') }}</label>
                <div class="col-10">
                    <input value="{{ $plan->created_at->format('d.m.Y H:i:s') }}" type="datetime" id="created_at" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="updated_at">{{ __('app.updated at') }}</label>
                <div class="col-10">
                    <input value="{{ $plan->updated_at->format('d.m.Y H:i:s') }}" type="datetime" id="updated_at" class="form-control" disabled />
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