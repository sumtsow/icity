@extends('layouts.app')

@section('content')

<h2 class="h2 text-center mt-5 mb-3">Оберіть категорію</h2>

<div class="card-columns mb-5">
    
    @foreach($categories as $category)
    
    <div class="card w-50 p-3 border-secondary">
        <a href="{{ url('/', ['id' => $category->id]) }}">
            <img src="/img/{{ $category->image }}" class="card-img-top" alt="{{ $category->name }}">
        </a>
        <div class="card-body">
            <h5 class="card-title">{{ $category->name }} ({{ count($category->service) }})</h5>
        </div>
    </div>
    
    @endforeach
    
</div>

@endsection