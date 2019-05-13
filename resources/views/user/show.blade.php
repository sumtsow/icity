@extends('layouts.app')

@section('content')

<h1 class="mt-3">{{ __('admin.User') }} <em>{{ $user->getFullName() }}</em></h1>

<div class="table-responsive">
    <table class="table table-sm bg-white table-striped">
        <tr>
            <th>{{ __('admin.id') }}:</th><td>{{ $user->id }}</td>
        </tr>
        <tr>
            <th>{{ __('auth.lastname') }} {{ __('auth.firstname') }} {{ __('auth.patronymic') }}:</th><td>{{ $user->getFullName() }}</td>
        </tr>
        <tr>
            <th>{{ __('auth.E-Mail Address') }}:</th><td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.Role') }}:</th><td>{{ $user->role }}</td>
        </tr>
        <tr>
            <th>{{ __('auth.birthdate') }}:</th><td>{{ $user->birthdate }}</td>
        </tr>
        <tr>
            <th>{{ __('admin.city') }}:</th><td>{{ $user->city->$name }}</td>
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
            <th>{{ __('app.created at') }}:</th><td>{{ $user->created_at }}</td>
        </tr>
        <tr>
            <th>{{ __('app.updated at') }}:</th><td>{{ $user->updated_at }}</td>
        </tr>
        <tr>
            <th>{{ __('app.email verified at') }}:</th><td>{{ $user->email_verified_at }}</td>
        </tr>        
    </table>
</div>

<div class="row">
    <div class="col">
        <a href="{{ url('/user/edit', ['id' => $user->id]) }}"class="btn btn-success">{{ __('app.edit') }}</a>
        <a href="{{ route('user') }}" class="btn btn-secondary">{{ __('app.cancel') }}</a>
    </div>
</div>

<div class="row my-5"></div>

@endsection


