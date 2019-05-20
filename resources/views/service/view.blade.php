@extends('layouts.app')

@section('content')

<h2 class="h2 text-center mt-5 mb-3">{{ $service->$name }}</h2>

@if($service->company->enabled)

<h3 class="h3 text-center">{{ __('app.provided by') }}: <a href="#">{{ $service->company->$name }}</a></h3>

<h4 class="h4">{{ __('app.service description') }}</h4>

{{ $service->$description }}

<h4 class="h4">{{ __('app.price', ['price' => $service->price, 'unit' => $service->$unit]) }}</h4>

<a href="{{ url('/order') }}" class="btn btn-success mt-1 mb-5">{{ __('app.add to cart') }}</a>

<p>&nbsp;</p>

@endif

@endsection