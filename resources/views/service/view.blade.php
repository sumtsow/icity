@extends('layouts.app')

@section('content')

<h2 class="h2 text-center mt-5 mb-3">{{ $service->{'name_'.app()->getLocale()} }}</h2>

@if($service->company->enabled)

<h3 class="h3 text-center">{{ __('app.provided by') }}: <a href="{{ route('company.show', ['id' => $service->company->id]) }}">{{ $service->company->{'name_'.app()->getLocale()} }}</a></h3>

<h4 class="h4">{{ __('app.service description') }}</h4>

{!! nl2br($service->{'description_'.app()->getLocale()}) !!}

<p></p>

<h4 class="h4">{{ __('app.price per unit', ['price' => $service->price, 'unit' => '1 '.$service->{'unit_'.app()->getLocale()}]) }}</h4>

<form action="{{ route('cart.store') }}" method="post" id="cart-form" >
        {{ csrf_field() }}
        <input type="hidden" name="number" value="1">
        <input type="hidden" name="id_service" value="{{ $service->id }}">
        <button type="submit" href="{{ route('cart.store') }}" class="btn btn-success">{{ __('app.add to cart') }}</button>
</form> 

@endif

@endsection