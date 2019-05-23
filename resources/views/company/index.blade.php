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
<h2 class="mt-3">{{ __('app.companies admin')}} <a href="{{ route('company.create') }}"  class="btn btn-success mb-3">{{ __('app.add') }}</a></h2>

<div class="table-responsive">
<table class="table table-sm bg-white table-striped">
    <thead class="thead-pat">
        <tr>
            <th scope="col">{{ __('app.id') }}</th>
            <th scope="col">{{ __('app.city') }}</th>
            <th scope="col">{{ __('app.name') }}</th>
            <th scope="col">{{ __('app.payment') }}</th>
            <th scope="col">{{ __('app.expired') }}</th>
            <th scope="col">{{ __('app.enabled') }}</th>
            <th scope="col">{{ __('app.date') }}</th>              
        </tr>
    </thead>
    <tbody>
@foreach($companies as $company)
        <tr>
            <td>{{ $company->id }}</td>
            <td>{{ $company->city->{'name_'.app()->getLocale()} }}</td>
            <td>
                <a href="{{ route('company.show', ['id' => $company->id]) }}">{{ $company->{'name_'.app()->getLocale()} }}</a>
            </td>
            <td>
               <form id="payment_state-form" action="#">
                    @csrf
                    <input type="checkbox" @if($company->payment_state) checked="checked" @endif onClick="this.form.submit();" />
                </form>
            </td>
            <td>
               <form id="expired-form" action="#">
                    @csrf
                    <input type="checkbox" @if($company->expired) checked="checked" @endif onClick="this.form.submit();" />
                </form>
            </td>
            <td>
                <form id="enabled-form" action="#">
                    @csrf
                    <input type="checkbox" @if($company->enabled) checked="checked" @endif onClick="this.form.submit();" />
                </form>               
            </td>
            <td>{{ $company->created_at->format('d.m.Y H:i:s') }}</td>
        </tr>        
@endforeach
    </tbody>
</table>
</div>

@endsection


