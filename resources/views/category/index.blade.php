@extends('layouts.app')

@section('content')
<h2 class="my-5">{{ __('app.categories admin')}}</h2>

<div class="row">
    <div class="col">
        <a href="{{ route('category.create') }}"  class="btn btn-success mb-3">{{ __('app.add') }}</a>
    </div>
</div>

<div class="table-responsive">
<table class="table table-sm bg-white table-striped">
    <thead class="thead-pat">
        <tr>
            <th scope="col">{{ __('app.id') }}</th>
            <th scope="col">{{ __('app.image') }}</th>
            <th scope="col">{{ __('app.name') }}</th>
            <th scope="col">{{ __('app.services') }}</th>
            <th scope="col">{{ __('app.options') }}</th>
            <th scope="col">{{ __('app.date') }}</th>              
        </tr>
    </thead>
    <tbody>
@foreach($categories as $category)
        <tr>
            <td>{{ $category->id }}</td>
			<td>
                <a href="{{ route('category.show', ['id' => $category->id]) }}">
                    <img src="/storage/img/category/{{ $category->image }}" alt="{{ $category->$name }}">
                </a>
			</td>
            <td><a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->$name }}</a></td>
            <td>
            @if(count($category->service))
                @foreach($category->service as $service)
                <p><a class="" href="{{ route('service.show', ['id' => $service->id]) }}">{{ $service->$name }}</a></p>
                @endforeach
            @endif
            </td>
            <td>{{ $category->options }}</td>
            <td>{{ $category->created_at->format('d.m.Y H:i:s') }}</td>
</tr>        
@endforeach
    </tbody>
</table>
</div>

@endsection


