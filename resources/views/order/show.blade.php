@extends('layouts.app')
@can('admin', 'App\User')
@section('breadcrumb')
<div class="row" id="breadcrumbs">
    <nav class="nav my-0 py-0">
        <ol class="breadcrumb m-0 text-truncate">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('order.index') }}">{{ __('app.orders admin')}}</a></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')

<h2 class="mt-3">
    {{ __('app.order') }} #<em>{{ $order->id }}</em>
</h2>
   
<div class="table-responsive">
    <table class="table table-sm bg-white table-striped">

       <tr>
            <th>{{ __('app.price') }}:</th>
            <td>
                <ol>
                @foreach($order->services as $service)
                <li>
                    <h6 class="font-weight-bold">
                        <a href="{{ url('/service/view', ['id' => $service->id] ) }}" target="_blank">
                        {{ $service->{'name_'.app()->getLocale()} }}
                        </a>
                    </h6>
                <p>
                    {{ $service->pivot->number }}
                    {{ $service->{'unit_'.app()->getLocale()} }} x
                    {{ $service->price }} {{ __('app.hrn') }} =
                    {{ $order->getItemCost($service->id) }} {{ __('app.hrn') }}
                    @if($service->discount)
                    - {{ __('app.discount') }} {{ $service->discount }}% =
                    <del>{{ $order->getItemCost($service->id) }} {{ __('app.hrn') }}</del>
                    {{ $order->getDiscountItemCost($service->id) }} {{ __('app.hrn') }}
                    @endif
                </p>
                </li>
                @endforeach
                </ol>
                <hr>
                <h6 class="font-weight-bold">{{ __('app.total') }}: {{ $order->getTotalCosts() }} {{ __('app.hrn') }}</h6>
            </td>
        </tr>
        
        <tr>
            <th>
                {{ __('app.User') }}:
            </th>
            <td>
                <p>{{ $order->user->getFullName() }}</p>
                <p>{{ __('auth.E-Mail Address')}}: <a href="mailto://{{ $order->user->email }}">{{ $order->user->email }}</a></p>
                <p>{{ __('app.phone')}}: {{ $order->user->phone }}</p>
                <p>{{ __('app.address')}}: {{ $order->user->address }}</p>
            </td>
        </tr>
        
        <tr>
            <th>
                {{ __('app.order state') }}:
            </th>
            <td>
                {{ __('app.'.$order->state) }}
            </td>
        </tr>
        
        <tr>
            <th>
                {{ __('app.payment') }}:
            </th>
            <td>
                {{ $order->payment }}% = {{ 0.01 * $order->payment * $order->getTotalCosts() }} {{ __('app.hrn') }}
            </td>
        </tr>
        
        <tr>
            <th>
                {{ __('app.lead time begin') }}:
            </th>
            <td>
                {{ $order->lead_time_begin->format('H:i d.m.Y') }}
            </td>
        </tr>
        
        <tr>
            <th>
                {{ __('app.lead time finish') }}:
            </th>
            <td>
                {{ $order->lead_time_finish->format('H:i d.m.Y') }}
            </td>
        </tr>
        
        <tr>
            <th>
                {{ __('app.description') }}:
            </th>
            <td>
                {!! $order->description !!}
            </td>
        </tr>
        
        <tr>
            <th>
                {{ __('app.options') }}:
            </th>
            <td>
                {{ $order->options }}
            </td>
        </tr>
        
        <tr>
            <th>
                {{ __('app.created at') }}:
            </th>
            <td>
                {{ $order->created_at->format('d.m.Y H:i:s') }}
            </td>
        </tr>
        
        <tr>
            <th>
                {{ __('app.updated at') }}:
            </th>
            <td>
                {{ $order->updated_at->format('d.m.Y H:i:s') }}
            </td>
        </tr>    
    </table>
</div>

<div class="row">
    <div class="col">
        <a href="{{ route('order.edit', ['id' => $order->id]) }}"class="btn btn-success">{{ __('app.edit') }}</a>
        <a href="{{ route('order.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

@endsection
@endcan