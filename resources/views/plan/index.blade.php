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
<h2 class="mt-3">{{ __('app.plans admin')}} <a href="{{ route('plan.create') }}"  class="btn btn-success mb-3">{{ __('app.add') }}</a></h2>

<div class="table-responsive">
<table class="table table-sm bg-white table-striped">
    <thead class="thead-pat">
        <tr>
            <th scope="col">{{ __('app.id') }}</th>
            <th scope="col">{{ __('app.name') }}</th>
            <th scope="col">{{ __('app.price') }}</th>
            <th scope="col">{{ __('app.validity') }}</th>
            <th scope="col">{{ __('app.date') }}</th>
        </tr>
    </thead>
    <tbody>
@foreach($plans as $plan)
        <tr>
            <td>{{ $plan->id }}</td>
            <td><a href="{{ route('plan.show', ['id' => $plan->id]) }}">{{ $plan->{'name_'.app()->getLocale()} }}</a></td>
            <td>{{ $plan->price }} {{ __('app.hrn') }}</td>
            <td>{{ $plan->validity }} {{ __('app.month(s)') }}</td>
            <td>{{ $plan->created_at->format('d.m.Y H:i:s') }}</td>
        </tr>        
@endforeach
    </tbody>
</table>
</div>

@endsection


