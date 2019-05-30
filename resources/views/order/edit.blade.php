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

<h2 class="mt-3">{{ __('app.edit') }} {{ __('app.order') }}</h2>

<form action="{{ route('order.update', ['id' => $order->id]) }}" method="post" id="order-form">
    {{ csrf_field() }}
    {{ method_field('put') }}
    
    <div class="form-group row">

        <label class="col-2" for="services">{{ __('app.price') }}</label>

        <div class="col-10">

            @foreach($order->services as $service)
            <div class="mx-2 w-100 alert alert-success alert-dismissible fade show" role="alert">
                <h6 class="font-weight-bold">
                    <a href="{{ url('/service/view', ['id' => $service->id] ) }}" target="_blank">
                    {{ $service->{'name_'.app()->getLocale()} }}
                    </a>
                </h6>
                <div class="form-row">
                    <div class="col-1">
                        <input class="form-control" type="number" name="service_{{ $service->id }}_number" value="{{ $service->pivot->number }}" />
                    </div>
                    <div class="col-10">
                        {{ $service->{'unit_'.app()->getLocale()} }} x
                        {{ $service->price }} {{ __('app.hrn') }} =
                        {{ $order->getItemCost($service->id) }} {{ __('app.hrn') }}
                        @if($service->discount)
                        - {{ __('app.discount') }} {{ $service->discount }}% =
                        <del>{{ $order->getItemCost($service->id) }} {{ __('app.hrn') }}</del>
                        {{ $order->getDiscountItemCost($service->id) }} {{ __('app.hrn') }}
                        @endif
                    </div>
                </div>
                
                <a type="button" form="service-form" class="close text-dark" href="{{ url('/order/remove-service', ['id' => $order->id, 'id_service' => $service->id ]) }}" >&times;</a>
                
            </div>   
            @endforeach

        </div>
        
    </div>
   
    <div class="form-group row">
        <label class="col-2" for="service">{{ __('app.add to order') }}</label>
        <div class="col-10">
            <select id="service" class="form-control" name="service">
                <option>{{ __('app.select service') }}</option>
                @foreach(App\Service::all() as $service)
                <option value="{{ $service->id }}">{{ $service->{'name_'.app()->getLocale() } }}</option>
                @endforeach
            </select>
                @error('service')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-2" for="user">{{ __('app.User') }}</label>
        <div class="col-10">
            <input value="{{ $order->user->getFullName() }}" type="text" id="user" class="form-control" disabled />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2" for="state">{{ __('app.order state') }}</label>
        <div class="col-10">
            <select class="form-control @error('state') is-invalid @enderror" name="state" id="state">
                <option>{{ __('app.select state') }}</option>
                @foreach(App\Order::getStates() as $state)
                    <option value="{{ $state }}" @if($order->state == $state) selected @endif>{{ __('app.'.$state) }}</option>
                @endforeach
            </select>

            @error('state')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
    
    <div class="form-group row">
        <label class="col-2" for="payment">{{ __('app.payment') }}, %</label>
        <div class="col-10">
            <input value="{{ $order->payment }}" type="number" min="0" max="100" name="payment" id="payment" class="form-control @error('payment') is-invalid @enderror" autofocus />

            @error('payment')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>
    </div>
        
    <div class="form-group row">
        <label class="col-2" for="{{ 'description' }}">{{ __('app.description') }}</label>
        <div class="col-10">
            <textarea rows="5" name="description" id="description" class="form-control @error('description') is-invalid @enderror" autofocus>
{{ $order->description }}
            </textarea>

            @error('description')
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
                <input value="{{ $order->lead_time_begin->format('H:i d.m.Y') }}" type="datetime" name="lead_time_begin" id="lead_time_begin" class="form-control @error('lead_time_begin') is-invalid @enderror" autofocus />
                
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
                <input value="{{ $order->lead_time_finish->format('H:i d.m.Y') }}" type="datetime" name="lead_time_finish" id="lead_time_finish" class="form-control @error('lead_time_finish') is-invalid @enderror" autofocus />

                @error('lead_time_finish')
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
            <input value="{{ $order->options }}" autocomplete="options" type="text" name="options" id="options" class="form-control @error('options') is-invalid @enderror" autofocus />

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
            <input value="{{ $order->created_at->format('d.m.Y H:i:s') }}" type="datetime" id="created_at" class="form-control" disabled />
        </div>
    </div>

    <div class="form-group row">
        <label class="col-2" for="updated_at">{{ __('app.updated at') }}</label>
        <div class="col-10">
            <input value="{{ $order->updated_at->format('d.m.Y H:i:s') }}" type="datetime" id="updated_at" class="form-control" disabled />
        </div>
    </div>

<div class="row">
    <div class="col">
        <button type="submit" href="{{ route('order.update', ['id' => $order->id]) }}" class="btn btn-success">{{ __('app.save') }}</button>
        <a href="{{ route('order.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

</form> 

@endsection