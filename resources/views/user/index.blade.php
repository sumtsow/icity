@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
@endsection

@section('content')
<h2 class="my-5">{{ __('app.user admin')}}</h2>

<div class="flex-center">{{ $users->links() }}</div>

<div class="table-responsive">
<table class="table table-sm bg-white table-striped">
    <thead class="thead-pat text-center">
        <tr>
            <th scope="col">{{ __('app.id') }}</th>
            <th scope="col">{{ __('auth.lastname') }}, {{ __('auth.firstname') }}, {{ __('auth.patronymic') }}</th>
            <th scope="col">{{ __('auth.E-Mail Address') }}</th>
            <th scope="col">{{ __('app.Role') }}</th>              
            <th scope="col">{{ __('app.phone') }}</th>
            <th scope="col">{{ __('app.date') }}</th>
            <th scope="col">{{ __('auth.Confirmed') }}</th>                
        </tr>
    </thead>
    <tbody>
@foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td><a href="{{ url('/user', ['id' => $user->id]) }}">{{ $user->getFullName() }}</a></td>
            <td><a href="{{ url('/user', ['id' => $user->id]) }}">{{ $user->email }}</a></td>
            <td @if($user->role =='administrator') class="text-danger" @endif>{{ $user->role }}</td>               
            <td>{{ $user->phone }}</td>
            <td>{{ date('d.m.Y', $user->created_at->getTimestamp()) }}</td>
            <td>
                <form id="switch-form" action="{{ url('/user/switchstate/'.$user->id) }}">
                    @csrf
                    <input type="checkbox" @if($user->email_verified_at) checked="checked" @endif onClick="this.form.submit();" />
                </form>
            </td>
</tr>        
@endforeach
    </tbody>
</table>
</div>
    
<div class="flex-center">{{ $users->links() }}</div>
@endsection


