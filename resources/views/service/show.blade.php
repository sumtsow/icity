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

<h2 class="mt-3">
    {{ __('app.service') }} <em>{{ $service->{'name_'.app()->getLocale()} }}</em>
    <button class="btn btn-danger" data-toggle="modal" data-target="#Modal">{{ __('app.delete') }}</button>
</h2>
   
<div class="table-responsive">
    <table class="table table-sm bg-white table-striped">
        <tr>
            <th>{{ __('app.id') }}:</th><td>{{ $service->id }}</td>
        </tr>
        <tr>
            <th>{{ __('app.category') }}:</th><td>{{ $service->category->{'name_'.app()->getLocale()} }}</td>
        </tr>
        <tr>
            <th>{{ __('app.company') }}:</th><td>{{ $service->company->{'name_'.app()->getLocale()} }}</td>
        </tr>
        
        @foreach(config('app.locales') as $locale)
        <tr>
            <th>{{ __('app.name') }} ({{ __('app.current language', [], $locale) }}):</th><td>{{ $service->{"name_$locale"} }}</td>
        </tr>
        @endforeach
        
        @foreach(config('app.locales') as $locale)
        <tr>        
            <th>{{ __('app.description') }} ({{ __('app.current language', [], $locale) }}):</th><td>{!! nl2br($service->{"description_$locale"}) !!}</td>
        </tr>
        @endforeach
        
        <tr>
            <th>{{ __('app.price') }}:</th><td>{{ $service->price }} {{ __('app.hrn') }}</td>
        </tr>       
        <tr>
            <th>
                <p>{{ __('app.unit') }}</p>
                <ul class="list-group">
                @foreach(config('app.locales') as $locale)
                    <li class="list-group-item font-weight-normal">{{ __('app.current language', [], $locale) }}</li>
                @endforeach
                </ul>
            </th>
            <td>
                <p>&nbsp;</p>
                <ul class="list-group">
                @foreach(config('app.locales') as $locale)
                    <li class="list-group-item">{{ $service->{"unit_$locale"} }}</li>
                @endforeach
                </ul>
            </td>
        </tr> 
        <tr>
            <th>
                <p>{{ __('app.order') }}</p>
                <ul class="list-group">
                    <li class="list-group-item">{{ __('app.from') }}:</li>
                    <li class="list-group-item">{{ __('app.to') }}:</li>
                </ul>
            </th>
            <td>
                <p>&nbsp;</p>
                <ul class="list-group">                
                    <li class="list-group-item">{{ $service->minimum_batch }}</li>
                    <li class="list-group-item">{{ $service->maximum_batch }}</li>
                </ul>
            </td>
        </tr>
        <tr>
            <th>{{ __('app.discount') }}:</th><td>{{ $service->discount }}%</td>
        </tr>         
        <tr>
            <th>{{ __('app.image') }}:</th>
            <td>
                <img src="/storage/img/service/{{ $service->image }}" alt="none"> 
            </td>
        </tr>
        <tr>
            <th>{{ __('app.options') }}:</th><td>{{ $service->options }}</td>
        </tr>
        <tr>
            <th>{{ __('app.created at') }}:</th><td>{{ $service->created_at->format('d.m.Y H:i:s') }}</td>
        </tr>
        <tr>
            <th>{{ __('app.updated at') }}:</th><td>{{ $service->updated_at->format('d.m.Y H:i:s') }}</td>
        </tr>    
    </table>
</div>

<div class="row">
    <div class="col">
        <a href="{{ route('service.edit', ['id' => $service->id]) }}"class="btn btn-success">{{ __('app.edit') }}</a>
        <a href="{{ route('service.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
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
          @if(count($service->orders))
          <p>{{__('app.service is not empty')}}</p>
          @else
          <p>{{__('app.completly remove')}} <b>{{ $service->{'name_'.app()->getLocale()} }}?</b></p>
          @endif
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('app.cancel')}}</button>
            @if(!count($service->orders))
            <form action="{{ route('service.destroy', ['id' => $service->id]) }}" method="post">        
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