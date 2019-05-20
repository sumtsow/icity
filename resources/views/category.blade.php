@extends('layouts.app')

@section('content')

<h1 class="mt-3">
    {{ $category->$name }}
</h1>
   
@foreach($category->service as $service)
    
    @if($service->company->enabled)
    <div class="card d-inline-block mw-50 p-3 border-light">
        <div class="row no-gutters">
            <div class="col-md-2">
                <a href="{{ url('/service/view', ['id' => $service->id]) }}">
                    <img src="/storage/img/service/{{ $service->image }}" class="card-img" alt="{{ $service->$name }}">
                </a>
            </div>
            <div class="col-md-10">
                <div class="card-body">
                    <h5 class="card-title">{{ $service->$name }}</h5>
                    <p class="card-text">{{ __('app.provided by') }}: <a href="#">{{ $service->company->$name }}</a></p>
                    <p class="card-text">{{ __('app.price', ['price' => $service->price, 'unit' => $service->$unit]) }}</p>
                    <a class="btn btn-success" href="{{ url('/service/view', ['id' => $service->id]) }}">{{ __('app.details') }}</a>
                </div>
            </div>
        </div>
    </div>
    @endif
    
@endforeach

@endsection