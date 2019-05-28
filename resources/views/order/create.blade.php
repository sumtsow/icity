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
            <li class="breadcrumb-item"><a href="{{ route('company.index') }}">{{ __('app.orders admin')}}</a></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')

<h2 class="mt-3">{{ __('app.add') }} {{ __('app.order') }}</h2>

<form action="{{ route('order.store') }}" method="post" id="order-form">
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
            
                <div class="form-group">
                    <label class="col-2" for="{{ 'description' }}">{{ __('app.current language', [], $locale) }}</label>
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
                        
            <div class="form-group p-2 border border-light rounded">
                <label class="col-2 font-weight-bold px-0">{{ __('app.lead time') }}</label>

                <div class="form-group row">
                    <label class="col-2" for="lead_time_begin">{{ __('app.lead time begin') }}</label>
                    <div class="col-10">
                        <input value="{{ old('lead_time_begin') }}" type="time" name="lead_time_begin" id="lead_time_begin" class="form-control @error('lead_time_begin') is-invalid @enderror" autofocus />

                        @error('lead_time_begin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
				
				<div class="form-group row">
                    <label class="col-2" for="lead_time_finish">{{ __('app.lead time finish') }}</label>
                    <div class="col-10">
                        <input value="{{ old('lead_time_finish') }}" type="time" name="lead_time_finish" id="lead_time_finish" class="form-control @error('lead_time_finish') is-invalid @enderror" autofocus />

                        @error('lead_time_finish')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
				
            </div>
			
            <div class="form-group row">
                <label class="col-2" for="discount">{{ __('app.discount') }}</label>
                <div class="col-10">
                    <input value="{{ old('discount') }}" autocomplete="discount" min="0" max="99" type="number" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('discount')
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
        <button type="submit" href="{{ route('company.store') }}" class="btn btn-success">{{ __('app.save') }}</button>
        <a href="{{ route('company.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

</form> 

@endsection