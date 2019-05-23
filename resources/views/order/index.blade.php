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
<h2 class="mt-3">{{ __('app.orders admin')}} <a href="{{ route('order.create') }}"  class="btn btn-success mb-3">{{ __('app.add') }}</a></h2>

<div class="table-responsive">
<table class="table table-sm bg-white table-striped">
    <thead class="thead-pat">
        <tr>
            <th scope="col">{{ __('app.id') }}</th>
            <th scope="col">{{ __('app.User') }}</th>
            <th scope="col">{{ __('app.order state') }}</th>
            <th scope="col">{{ __('app.payment') }}</th>
            <th scope="col">{{ __('app.price') }}</th>
            <th scope="col">{{ __('app.lead time') }}</th>
            <th scope="col">{{ __('app.discount') }}</th>
            <th scope="col">{{ __('app.date') }}</th>              
        </tr>
    </thead>
    <tbody>
@foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->getFullName() }}</td>
            <td>{{ $order->state }}</td>
            <td>{{ $order->payment }} %</td>
            <td>{{ $order->price }}</td>
            <td>From {{ $order->lead_time_begin->format('H:i:s d.m.Y') }} to {{ $order->lead_time_finish->format('H:i:s d.m.Y') }}</td>
            <td>{{ $order->discount }} %</td>
            <td>{{ $order->created_at->format('d.m.Y H:i:s') }}</td>
        </tr>        
@endforeach
    </tbody>
</table>
</div>

@endsection


