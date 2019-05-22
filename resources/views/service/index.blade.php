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
<h2 class="mt-3">{{ __('app.services admin')}} <a href="{{ route('service.create') }}"  class="btn btn-success mb-3">{{ __('app.add') }}</a></h2>

<div class="table-responsive">
<table class="table table-sm bg-white table-striped">
    <thead class="thead-pat">
        <tr>
            <th scope="col">{{ __('app.id') }}</th>
            <th scope="col">{{ __('app.category') }}</th>
            <th scope="col">{{ __('app.company') }}</th>
            <th scope="col">{{ __('app.name') }}</th>
            <th scope="col">{{ __('app.image') }}</th>
            <th scope="col">{{ __('app.orders number') }}</th>
            <th scope="col">{{ __('app.date') }}</th>              
        </tr>
    </thead>
    <tbody>
@foreach($services as $service)
        <tr>
            <td>{{ $service->id }}</td>
                <td>{{ $service->category->{'name_'.app()->getLocale()} }}</td>
                <td>{{ $service->company->{'name_'.app()->getLocale()} }}</td>
                <td>
                    <a href="{{ route('service.show', ['id' => $service->id]) }}">{{ $service->{'name_'.app()->getLocale()} }}</a>
                </td>
                <td>
                    <a href="{{ route('service.show', ['id' => $service->id]) }}">
                        <img class="w-25" src="/storage/img/service/{{ $service->image }}" alt="{{ $service->{'name_'.app()->getLocale()} }}">
                    </a>
                </td>
                <td>{{ count($service->orders) }}</td>
                <td>{{ $service->created_at->format('d.m.Y H:i:s') }}</td>
        </tr>        
@endforeach
    </tbody>
</table>
</div>

@endsection


