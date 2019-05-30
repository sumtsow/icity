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
<h2 class="my-3">{{ __('app.user admin')}} <a href="{{ route('user.create') }}"  class="btn btn-success mb-3">{{ __('app.add') }}</a></h2>

<div class="flex-center">{{ $users->links() }}</div>

<div class="table-responsive">
<table class="table table-sm bg-white table-striped">
    <thead class="thead-pat">
        <tr>
            <th scope="col">{{ __('app.id') }}</th>
            <th scope="col">{{ __('auth.lastname') }}, {{ __('auth.firstname') }}, {{ __('auth.patronymic') }}</th>
            <th scope="col">{{ __('auth.E-Mail Address') }}</th>
            <th scope="col">{{ __('app.role') }}</th>              
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
            <td>{{ $user->created_at->format('d.m.Y') }}</td>
            <td>
                
                <form id="switch-form" action="{{ route('switchstate', ['id' => $user->id]) }}">
                @csrf    
                <div class="custom-control custom-switch">    
                    <input type="checkbox" class="custom-control-input" id="customSwitch{{ $user->id }}" @if($user->email_verified_at) checked="checked" @endif onClick="this.form.submit();" />
                    <label class="custom-control-label" for="customSwitch{{ $user->id }}">&nbsp;</label>
                </div>    
                </form>
                
            </td>
</tr>        
@endforeach
    </tbody>
</table>
</div>
    
<div class="flex-center">{{ $users->links() }}</div>
@endsection


