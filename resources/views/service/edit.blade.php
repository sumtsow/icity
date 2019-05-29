@extends('layouts.app')

@section('scripts')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=xs70r0zwazereyn8rtwn65o53caspvj14u5eo1t0xl77kt8v"></script>
<script>tinymce.init({selector:'textarea'});</script>
<script src="/js/uploadFileChangeName.js"></script>
@endsection

@section('breadcrumb')
<div class="row" id="breadcrumbs">
    <nav class="nav my-0 py-0">
        <ol class="breadcrumb m-0 text-truncate">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('service.index') }}">{{ __('app.services admin')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('service.show', ['id' => $service->id]) }}">{{ __('app.service') }} {{ $service->{'name_'.app()->getLocale()} }}</a></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')

<h2 class="mt-3">{{ __('app.service') }} <em>{{ $service->{'name_'.app()->getLocale()} }}</em></h2>

<form action="{{ route('service.update', ['id' => $service->id]) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    
            <div class="form-group row">
                <label class="col-2 pl-4" for="id">{{ __('app.id') }}</label>
                <div class="col-10">
                    <input value="{{ $service->id }}" type="text" name="id" id="id" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group p-2 border border-light rounded">
                <label class="col-2 font-weight-bold px-0">{{ __('app.name') }}</label>
            @foreach(config('app.locales') as $locale)
                <div class="form-group row">
                    <label class="col-2" for="{{ "name_$locale" }}">{{ __('app.current language', [], $locale) }}</label>
                    <div class="col-10">
                        <input value="{{ $service->{"name_$locale"} }}" type="text" name="{{ "name_$locale" }}" id="{{ "name_$locale" }}" class="form-control @error('{{ "name_$locale" }}') is-invalid @enderror" autofocus required />

                        @error("name_$locale")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
            @endforeach
            </div>
    
            <div class="form-group row">
                <label class="col-2 pl-4" for="company">{{ __('app.company') }}</label>
                <div class="col-10">
                    <select class="form-control @error('company') is-invalid @enderror" name="company" id="company">
                        <option>{{ __('app.select company') }}</option>
                        @foreach(App\Company::all() as $company)
                            @if($service->company)
                            <option value="{{ $company->id }}" @if($service->company->id == $company->id) selected @endif>{{ $company->{'name_'.app()->getLocale()} }}</option>
                            @else
                            <option value="{{ $company->id }}">{{ $company->{'name_'.app()->getLocale()} }}</option>
                            @endif
                        @endforeach
                    </select>
                                                                                                            
                    @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2 pl-4" for="category">{{ __('app.category') }}</label>
                <div class="col-10">
                    <select class="form-control @error('category') is-invalid @enderror" name="category" id="category">
                        <option>{{ __('app.select category') }}</option>
                        @foreach(App\Category::all() as $category)
                            @if($service->category)
                            <option value="{{ $category->id }}" @if($service->category->id == $category->id) selected @endif>{{ $category->{'name_'.app()->getLocale()} }}</option>
                            @else
                            <option value="{{ $category->id }}">{{ $category->{'name_'.app()->getLocale()} }}</option>
                            @endif
                        @endforeach
                    </select>
                                                                                                            
                    @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group p-2 border border-light rounded">
                <label class="col-2 font-weight-bold px-0">{{ __('app.description') }}</label>
            @foreach(config('app.locales') as $locale)
                <div class="form-group row">
                    <label class="col-2" for="{{ "description_$locale" }}">{{ __('app.current language', [], $locale) }}</label>
                    <div class="col-10">
                        <textarea rows="5" name="{{ "description_$locale" }}" id="{{ "description_$locale" }}" class="form-control @error('{{ "description_$locale" }}') is-invalid @enderror" autofocus>
{{ $service->{"description_$locale"} }}
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
                    <input value="{{ $service->price }}" type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror" autofocus required />
                                                                                                            
                    @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="unit">{{ __('app.unit') }}</label>
                <div class="col-10">
                    <select class="form-control @error('unit') is-invalid @enderror" name="unit" id="unit" required>
                        @foreach($service->getUnits(app()->getLocale()) as $key => $unit)
                        <option value="{{ $key }}" @if($service->{'unit_'.app()->getLocale()} == $unit) selected @endif>{{ ucfirst( $unit ) }}</option>
                        @endforeach
                    </select>
                                                                                                            
                    @error('unit')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
    
            <div class="form-row">
                <label class="col-2">{{ __('app.order') }}</label>
                <div class="form-group inline mx-2">
                    <label for="minimum_batch">{{ __('app.from') }}</label>
                        <input value="{{ $service->minimum_batch }}" type="number" name="minimum_batch" id="minimum_batch" class="form-control @error('minimum_batch') is-invalid @enderror" autofocus required />

                        @error('minimum_batch')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group inline ml-2">
                    <label for="maximum_batch">{{ __('app.to') }}</label>
                        <input value="{{ $service->maximum_batch }}" type="number" name="maximum_batch" id="maximum_batch" class="form-control @error('maximum_batch') is-invalid @enderror" autofocus required />

                        @error('maximum_batch')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>  
    
            <div class="form-group row">
                <label class="col-2" for="discount">{{ __('app.discount') }}</label>
                <div class="col-10">
                    <input value="{{ $service->discount }}" type="number" min="0" max="100" name="discount" id="discount" class="form-control @error('discount') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('discount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                
                <label class="col-2" for="image">{{ __('app.image') }}</label>
                
                <div class="col-10">
                    
                    <div class="custom-file">
                        
                        <input type="file" id="customFile" name="image" class="custom-file-input @error('image') is-invalid @enderror" autofocus >
                        <label class="custom-file-label" for="customFile">{{ $service->image }}</label>
                    
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    
                    </div>   
                    
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-2" for="options">{{ __('app.options') }}</label>
                <div class="col-10">
                    <input value="{{ $service->options }}" type="text" name="options" id="options" class="form-control @error('options') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('options')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="created_at">{{ __('app.created at') }}</label>
                <div class="col-10">
                    <input value="{{ $service->created_at->format('d.m.Y H:i:s') }}" type="datetime" id="created_at" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="updated_at">{{ __('app.updated at') }}</label>
                <div class="col-10">
                    <input value="{{ $service->updated_at->format('d.m.Y H:i:s') }}" type="datetime" id="updated_at" class="form-control" disabled />
                </div>
            </div>

<div class="row">
    <div class="col">
        <button type="submit" href="{{ route('service.update', ['id' => $service->id]) }}" class="btn btn-success">{{ __('app.save') }}</button>
        <a href="{{ route('service.show', ['id' => $service->id]) }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

</form> 

@endsection