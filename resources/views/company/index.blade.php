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
            <th scope="col">{{ __('app.image') }}</th>
            <th scope="col">{{ __('app.name') }}</th>            
            <th scope="col">{{ __('app.city') }}</th>
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
            <td>
                <a href="{{ route('company.show', ['id' => $company->id]) }}">
                    <img class="w-25" src="/storage/img/company/{{ $company->image }}" alt="{{ $company->{'name_'.app()->getLocale()} }}">
                </a>
            </td>
            <td>
                <a href="{{ route('company.show', ['id' => $company->id]) }}">{{ $company->{'name_'.app()->getLocale()} }}</a>
            </td>            
            <td>{{ $company->city->{'name_'.app()->getLocale()} }}</td>
            <td>{{ $company->payment_state }}</td>
            <td>{{ $company->expired }}</td>
            <td>{{ $company->enabled }}</td>
            <td>{{ $company->created_at->format('d.m.Y H:i:s') }}</td>
        </tr>        
@endforeach
    </tbody>
</table>
</div>

@endsection


