@extends('layouts.app')

@section('content')

<h1 class="mt-3">{{ __('app.User') }} <em>{{ $user->getFullName() }}</em></h1>

<div class="table-responsive">
    <table class="table table-sm bg-white table-striped">
        <tr>
            <th class="w-50">{{ __('app.id') }}:</th><td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>{{ __('auth.lastname') }} {{ __('auth.firstname') }} {{ __('auth.patronymic') }}:</th><td>{{ $user->getFullName() }}</td>
        </tr>
        <tr>
            <th>{{ __('auth.E-Mail Address') }}:</th><td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>{{ __('app.email verified at') }}:</th><td>{{ date('d.m.Y H:i:s', $user->email_verified_at->getTimestamp()) }}</td>
        </tr>
        <tr>
            <th>{{ __('app.role') }}:</th><td>{{ $user->role }}</td>
        </tr>
        <tr>
            <th>{{ __('app.company') }}:</th><td>{{ ($user->company) ? $user->company->$name : '' }}</td>
        </tr>        
        <tr>
            <th>{{ __('app.birthdate') }}:</th><td>{{ date_create_from_format('Y-m-d', $user->birthdate)->format('d.m.Y') }}</td>
        </tr>
        <tr>
            <th>{{ __('app.city') }}:</th><td>{{ $user->city->$name }}</td>
        </tr>
        <tr>
            <th>{{ __('app.phone') }}:</th><td>{{ $user->phone }}</td>
        </tr>
        <tr>
            <th>Skype:</th><td>{{ $user->skype }}</td>
        </tr>
        <tr>
            <th>Twitter:</th><td>{{ $user->twitter }}</td>
        </tr>
        <tr>
            <th>Viber:</th><td>{{ $user->viber }}</td>
        </tr>
        <tr>
            <th>{{ __('app.loyality card') }}:</th><td>{{ $user->loyality_card }}</td>
        </tr>
        <tr>
            <th>{{ __('app.options') }}:</th><td>{{ $user->options }}</td>
        </tr>
        <tr>
            <th>{{ __('app.last IP') }}:</th><td>{{ $user->last_ip }}</td>
        </tr>
        <tr>
            <th>{{ __('app.created at') }}:</th><td>{{ date('d.m.Y H:i:s', $user->created_at->getTimestamp()) }}</td>
        </tr>
        <tr>
            <th>{{ __('app.updated at') }}:</th><td>{{ date('d.m.Y H:i:s', $user->updated_at->getTimestamp()) }}</td>
        </tr>    
    </table>
</div>

<div class="row">
    <div class="col">
        <a href="{{ route('user.edit', ['id' => $user->id]) }}"class="btn btn-success">{{ __('app.edit') }}</a>
        <a href="{{ route('user.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

<div class="row my-5"></div>

@endsection


