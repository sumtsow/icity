@extends('layouts.app')

@section('scripts')
<script src="/js/uploadFileChangeName.js"></script>
@endsection

@section('breadcrumb')
<div class="row" id="breadcrumbs">
    <nav class="nav my-0 py-0">
        <ol class="breadcrumb m-0 text-truncate">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">{{ __('app.categories admin')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.show', ['id' => $category->id]) }}">{{ __('app.category') }} {{ $category->$name }}</a></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')

<h2 class="mt-3">{{ __('app.category') }} <em>{{ $category->$name }}</em></h2>

<form action="{{ route('category.update', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    
            <div class="form-group row">
                <label class="col-2" for="id">{{ __('app.id') }}</label>
                <div class="col-10">
                    <input value="{{ $category->id }}" type="text" name="id" id="id" class="form-control" disabled />
                </div>
            </div>
    
            @foreach(config('app.locales') as $locale)
            
            <div class="form-group row">
                <label class="col-2" for="{{ "name_$locale" }}">{{ __('app.name') }} ({{ __('app.current language', [], $locale) }})</label>
                <div class="col-10">
                    <input value="{{ $category->{"name_$locale"} }}" type="text" name="{{ "name_$locale" }}" id="{{ "name_$locale" }}" class="form-control @error('{{ "name_$locale" }}') is-invalid @enderror" autofocus required />
                                                                                            
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

                    <div class="custom-file">
                        <input type="file" id="customFile" name="image" class="custom-file-input @error('image') is-invalid @enderror" autofocus>
                        <label class="custom-file-label" for="customFile">{{ $category->image }}</label>
                    </div>
                    
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
                    <input value="{{ $category->options }}" type="text" name="options" id="options" class="form-control @error('options') is-invalid @enderror" autofocus />
                                                                                                            
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
                    <input value="{{ $category->created_at->format('d.m.Y H:i:s') }}" type="datetime" id="created_at" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="updated_at">{{ __('app.updated at') }}</label>
                <div class="col-10">
                    <input value="{{ $category->updated_at->format('d.m.Y H:i:s') }}" type="datetime" id="updated_at" class="form-control" disabled />
                </div>
            </div>

<div class="row">
    <div class="col">
        <button type="submit" href="{{ route('category.update', ['id' => $category->id]) }}" class="btn btn-success">{{ __('app.save') }}</button>
        <a href="{{ route('category.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

</form> 
<script>
$(document).ready(function(){
    $("#customFile").on("change", function(e){
      var name = e.target.value.split( '\\' ).pop();
      $('.custom-file-label').text(name);
    })
  })
</script>
@endsection