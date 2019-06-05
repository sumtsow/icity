@extends('layouts.app')

@section('content')

<h2 class="h2 text-center mt-5 mb-3">{{ __('app.select category') }}</h2>

<div class="card-columns mb-5">
    
    @foreach($categories as $category)
    <div class="card d-inline-block p-3 border-light" style="max-width: 200px !important;" >
        <a href="{{ route('category', ['id' => $category->id]) }}">
            <img src="/storage/img/category/{{ $category->image }}" class="card-img-top" style="max-width: 167px !important;" alt="{{ $category->{'name_'.app()->getLocale()} }}">
        </a>
        <div class="card-body px-0">
            <p class="card-text text-truncate">{{ $category->{'name_'.app()->getLocale()} }} ({{ count($category->service) }})</p>
        </div>
    </div>
    
    @endforeach
    
</div>

@endsection