@extends('layouts.app')

@can('admin', 'App\User')
@section('breadcrumb')
<div class="row" id="breadcrumbs">
    <nav class="nav my-0 py-0">
        <ol class="breadcrumb m-0 text-truncate">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth.Dashboard')}}</a></li>
        </ol>
    </nav>
</div>
@endsection
@endcan

@section('content')
@can('admin', 'App\User')
<h2 class="mt-3">{{ __('app.orders admin')}} <a href="{{ route('order.create') }}"  class="btn btn-success mb-3">{{ __('app.add') }}</a></h2>
@endcan

<div class="table-responsive">
<table class="table table-sm bg-white table-striped">
    <thead class="thead-pat">
        <tr>
            <th scope="col">{{ __('app.id') }}</th>
            <th scope="col">{{ __('app.User') }}</th>
            <th scope="col">{{ __('app.price') }}</th>            
            <th scope="col">{{ __('app.order state') }}</th>
            <th scope="col">{{ __('app.payment') }}</th>
            <th scope="col">{{ __('app.lead time') }}</th>
            <th scope="col">{{ __('app.date') }}</th>              
        </tr>
    </thead>
    <tbody>
@foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->user->getFullName() }}</td>
            <td>{{ $order->getTotalCosts() }} {{ __('app.hrn') }}</td>             
            <td><a href="{{ route('order.show', ['id' => $order->id]) }}">{{ __('app.'.$order->state) }}</a></td>
            <td>{{ $order->payment }} %</td>
            <td>{{ __('app.lead time period', [
                        'begin' => $order->lead_time_begin->format('H:i d.m.Y'),
                        'finish' => $order->lead_time_finish->format('H:i d.m.Y'),        
                    ]) }}
            </td>
            <td>{{ $order->created_at->format('d.m.Y H:i:s') }}</td>
        </tr>        
@endforeach
    </tbody>
</table>
</div>

@endsection


