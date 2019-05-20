@extends('layouts.app')

@section('breadcrumb')
<div class="row" id="breadcrumbs">
    <nav class="nav my-0 py-0">
        <ol class="breadcrumb m-0 text-truncate">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.index') }}">{{ __('app.categories admin')}}</a></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')

<h2 class="mt-3">
    {{ __('app.category') }} <em>{{ $category->$name }}</em>
    <button class="btn btn-danger" data-toggle="modal" data-target="#Modal">{{ __('app.delete') }}</button>
</h2>
   
<div class="table-responsive">
    <table class="table table-sm bg-white table-striped">
        <tr>
            <th>{{ __('app.id') }}:</th><td>{{ $category->id }}</td>
        </tr>
        @foreach(config('app.locales') as $locale)
        <tr>
            <th>{{ __('app.name') }} ({{ __('app.current language', [], $locale) }}):</th><td>{{ $category->{"name_$locale"} }}</td>
        </tr>            
        @endforeach
       
        <tr>
            <th>{{ __('app.image') }}:</th>
            <td>
                <img class="w-25" src="/img/{{ $category->image }}" alt="{{ $category->$name }}"> 
                <a class="btn btn-success ml-3" href="#">{{ __('app.edit') }}</a>
            </td>
        </tr>
        <tr>
            <th>{{ __('app.options') }}:</th><td>{{ $category->options }}</td>
        </tr>
        <tr>
            <th>{{ __('app.created at') }}:</th><td>{{ $category->created_at->format('d.m.Y H:i:s') }}</td>
        </tr>
        <tr>
            <th>{{ __('app.updated at') }}:</th><td>{{ $category->updated_at->format('d.m.Y H:i:s') }}</td>
        </tr>    
    </table>
</div>

<div class="row">
    <div class="col">
        <a href="{{ route('category.edit', ['id' => $category->id]) }}"class="btn btn-success">{{ __('app.edit') }}</a>
        <a href="{{ route('category.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

<div class="modal" id="Modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{__('app.warning')}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          @if(count($category->service))
          <p>{{__('app.category is not empty')}}</p>
          @else
          <p>{{__('app.completly remove')}} <b>{{ $category->$name }}?</b></p>
          @endif
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('app.cancel')}}</button>
            @if(!count($category->service))
            <form action="{{ route('category.destroy', ['id' => $category->id]) }}" method="post">        
                <button type="button" class="btn btn-danger" onclick="this.form.submit();">{{__('app.yes')}}</button>
                {{csrf_field()}}
                {{method_field('delete')}}
            </form>
            @endif
      </div>
    </div>
  </div>
</div>

@endsection