@extends('layouts.app')

@can('admin', 'App\User')
    @section('breadcrumb')
    <div class="row" id="breadcrumbs">
        <nav class="nav my-0 py-0">
            <ol class="breadcrumb m-0 text-truncate">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth.Dashboard')}}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('company.index') }}">{{ __('app.companies admin')}}</a></li>
            </ol>
        </nav>
    </div>
    @endsection
@endcan

@section('content')

<h2 class="mt-3">
    {{ __('app.company') }}: <em>{{ $company->{'name_'.app()->getLocale()} }}</em>
    @can('admin', 'App\User')
    <button class="btn btn-danger" data-toggle="modal" data-target="#Modal">{{ __('app.delete') }}</button>
    @endcan
</h2>
   
<div class="table-responsive">
    <table class="table table-sm bg-white table-striped">
        @can('admin', 'App\User')
        <tr>
            <th>{{ __('app.id') }}:</th><td>{{ $company->id }}</td>
        </tr>
        @endcan
        <tr>
            <th>{{ __('app.image') }}:</th>
            <td>
                <img src="/storage/img/company/{{ $company->image }}" alt="none"> 
            </td>
        </tr>
        <tr>
            <th>{{ __('app.city') }}:</th><td>{{ $company->city->{'name_'.app()->getLocale()} }}</td>
        </tr>
        <tr>
            <th>{{ __('app.tariff plan') }}:</th><td>{{ $company->plan->{'name_'.app()->getLocale() } }}</td>
        </tr>
        @can('admin', 'App\User')
            @foreach(config('app.locales') as $locale)
        <tr>
            <th>{{ __('app.name') }} ({{ __('app.current language', [], $locale) }}):</th><td>{{ $company->{"name_$locale"} }}</td>
        </tr>
            @endforeach
        @else
        <tr>
            <th>{{ __('app.name') }}:</th><td>{{ $company->{'name_'.app()->getLocale()} }}</td>
        </tr>        
        @endcan
        <tr>
            <th>{{ __('app.address') }}:</th><td>{{ $company->address }}</td>
        </tr>
        <tr>
            <th>{{ __('app.phone') }}:</th><td>{{ $company->phone }}</td>
        </tr>
        <tr>
            <th>{{ __('auth.E-Mail Address') }}:</th><td>{{ $company->email }}</td>
        </tr>
        @can('admin', 'App\User')
        <tr>
            <th>{{ __('app.payment') }}:</th>
            <td>
               <form id="payment_state-form" action="{{ url('/company/switchstate', ['id' => $company->id, 'property' => 'payment_state']) }}">
                    @csrf
                    <div class="custom-control custom-switch"> 
                        <input type="checkbox" class="custom-control-input" id="payment" @if($company->payment_state) checked="checked" @endif onClick="this.form.submit();" />
                        <label class="custom-control-label" for="payment">&nbsp;</label>       
                    </div>       
                </form>
            </td>
        </tr>
         <tr>
            <th>{{ __('app.expired') }}:</th>
            <td>
               <form id="expired-form" action="{{ url('/company/switchstate', ['id' => $company->id, 'property' => 'expired']) }}">
                    @csrf
                    <div class="custom-control custom-switch"> 
                        <input type="checkbox" class="custom-control-input" id="expired" @if($company->expired) checked="checked" @endif onClick="this.form.submit();" />
                        <label class="custom-control-label" for="expired">&nbsp;</label>
                    </div>
                </form>
            </td>
        </tr>
        <tr>
            <th>{{ __('app.enabled') }}:</th>
            <td>
               <form id="enabled-form" action="{{ url('/company/switchstate', ['id' => $company->id, 'property' => 'enabled']) }}">
                    @csrf
                    <div class="custom-control custom-switch"> 
                        <input type="checkbox" class="custom-control-input" id="enabled" @if($company->enabled) checked="checked" @endif onClick="this.form.submit();" />
                        <label class="custom-control-label" for="enabled">&nbsp;</label>       
                    </div>       
                </form>
            </td>
        </tr>
        @foreach(config('app.locales') as $locale)
        <tr>        
            <th>{{ __('app.description') }} ({{ __('app.current language', [], $locale) }}):</th><td>{!! nl2br($company->{"description_$locale"}) !!}</td>
        </tr>
        @endforeach
        @else
        <tr>        
            <th>{{ __('app.description') }}:</th><td>{!! nl2br($company->{'name_'.app()->getLocale()}) !!}</td>
        </tr>        
        @endcan
        <tr>
            <th>{{ __('app.work time') }}:</th>
            <td>{{ __('app.lead time period', [
                        'begin' => \Carbon\Carbon::createFromFormat('H:i:s', $company->work_begin)->format('H:i'),
                        'finish' => \Carbon\Carbon::createFromFormat('H:i:s', $company->work_finish)->format('H:i'),        
                    ]) }}
            </td>
        </tr>       
        <tr>
            <th>{{ __('app.map') }}</th><td>{{ $company->map }}</td>
        </tr>
        <tr>
            <th>{{ __('app.website') }}</th><td><a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></td>
        </tr>
        <tr>
            <th>Skype</th><td>{{ $company->skype }}</td>
        </tr>
        <tr>
            <th>Twitter</th><td>{{ $company->twitter }}</td>
        </tr>
        <tr>
            <th>Viber</th><td>{{ $company->viber }}</td>
        </tr>   
        @can('admin', 'App\User')
        <tr>
            <th>{{ __('app.options') }}:</th><td>{{ $company->options }}</td>
        </tr>
        <tr>
            <th>{{ __('app.created at') }}:</th><td>{{ $company->created_at->format('d.m.Y H:i:s') }}</td>
        </tr>
        <tr>
            <th>{{ __('app.updated at') }}:</th><td>{{ $company->updated_at->format('d.m.Y H:i:s') }}</td>
        </tr>
        @endcan
    </table>
</div>

@can('admin', 'App\User')
<div class="row">
    <div class="col">
        <a href="{{ route('company.edit', ['id' => $company->id]) }}"class="btn btn-success">{{ __('app.edit') }}</a>
        <a href="{{ route('company.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
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
          @if(count($company->service))
          <p>{{__('app.company')}} <strong>{{ $company->{'name_'.app()->getLocale()} }}</strong> {{__('app.is not empty')}}!</p>
          @else
          <p>{{__('app.completly remove')}} <strong>{{ $company->{'name_'.app()->getLocale()} }}?</strong></p>
          @endif
      </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('app.cancel')}}</button>
            @if(!count($company->service))
            <form action="{{ route('company.destroy', ['id' => $company->id]) }}" method="post">        
                <button type="button" class="btn btn-danger" onclick="this.form.submit();">{{__('app.yes')}}</button>
                {{csrf_field()}}
                {{method_field('delete')}}
            </form>
            @endif
      </div>
    </div>
  </div>
</div>
@endcan

@endsection