@extends('layouts.app')

@section('content')
<h2 class="mt-3">{{ __('app.cart') }}</h2>
@if(isset($cart))
<form action="{{ route('cart.update', ['id' => $cart->id]) }}" method="post" id="cart-form">
    {{ csrf_field() }}
    {{ method_field('put') }}
    
    <div class="form-group">
        <div class="col-10">
        
            @foreach($cart->services as $service)
            <div class="mx-2 w-100 alert alert-success alert-dismissible fade show" role="alert">
                <h6 class="font-weight-bold">
                    <a href="{{ url('/service/view', ['id' => $service->id] ) }}" target="_blank">
                    {{ $service->{'name_'.app()->getLocale()} }}
                    </a>
                </h6>
                <p class="card-text">{{ __('app.price per unit', [
                    'price' => $service->price, 
                    'unit' => $service->{ 'unit_'.app()->getLocale() },
                ]) }}</p>
                <div class="form-row">
                    <div class="col-1">
                        <input class="form-control px-1" type="number" name="service_{{ $service->id }}_number" value="{{ $service->pivot->number }}" />
                    </div>
                    <div class="col-10">
                        {{ $service->{ 'unit_'.app()->getLocale() } }} x
                        {{ $service->price }} {{ __('app.hrn') }} =
                        {{ $service->pivot->number * $service->price }} {{ __('app.hrn') }}
                        @if($service->discount)
                        - {{ __('app.discount') }} {{ $service->discount }}% =
                        <del>{{ $cart->getItemCost($service->id) }} {{ __('app.hrn') }}</del>
                        {{ $cart->getDiscountItemCost($service->id) }} {{ __('app.hrn') }}
                        @endif
                    </div>
                </div>
                
                <a type="button" form="service-form" class="close text-dark" href="{{ url('/cart/remove-service', ['id' => $cart->id, 'id_service' => $service->id ]) }}" >&times;</a>
                
            </div>   
            @endforeach
            
        </div>
        
    </div>

<div class="row">
    <div class="col">
        <button type="submit" href="{{ route('cart.update', ['id' => $cart->id]) }}" class="btn btn-success">{{ __('app.update') }}</button>
    </div>
</div>

</form> 
@endif

@endsection


