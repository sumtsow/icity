@extends('layouts.app')

@section('content')

<h2 class="h2 text-center mt-5 mb-3">{{ $service->{'name_'.app()->getLocale()} }}</h2>

@if($service->company->enabled)

<h3 class="h3 text-center">{{ __('app.provided by') }}: <a href="#">{{ $service->company->{'name_'.app()->getLocale()} }}</a></h3>

<h4 class="h4">{{ __('app.service description') }}</h4>

{!! nl2br($service->{'description_'.app()->getLocale()}) !!}

<p></p>

<h4 class="h4">{{ __('app.price per unit', ['price' => $service->price, 'unit' => $service->{'unit_'.app()->getLocale()}]) }}</h4>

<a href="{{ url('/order') }}" class="btn btn-success mt-1 mb-5">{{ __('app.add to cart') }}</a>

<p>&nbsp;</p>

@endif

@endsection