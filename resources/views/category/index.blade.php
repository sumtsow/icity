@extends('layouts.app')

@section('breadcrumb')
<div class="row" id="breadcrumbs">
    <nav class="nav my-0 py-0">
        <ol class="breadcrumb m-0 text-truncate">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth.Dashboard')}}</a></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')
<h2 class="mt-3">{{ __('app.categories admin')}} <a href="{{ route('category.create') }}"  class="btn btn-success mb-3">{{ __('app.add') }}</a></h2>

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
                    <img class="w-25" src="/img/{{ $category->image }}" alt="{{ $category->$name }}">
                </a>
			</td>
            <td><a href="{{ route('category.show', ['id' => $category->id]) }}">{{ $category->$name }}</a></td>
            <td>
            @if(count($category->service))
                @foreach($category->service as $service)
                <p><a href="{{ route('service.show', ['id' => $service->id]) }}">{{ $service->$name }}</a></p>
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


