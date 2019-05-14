@extends('layouts.app')

@section('content')

<h1 class="mt-3">{{ __('app.User') }} <em>{{ $user->getFullName() }}</em></h1>

@include('errors')

<form action="{{ route('user.update', ['id' => $user->id]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('put') }}
    
            <div class="form-group row">
                <label class="col-2" for="user-id">{{ __('app.id') }}</label>
                <div class="col-10">
                    <input value="{{ $user->id }}" type="text" name="id" id="user-id" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-lastname">{{ __('auth.lastname') }}</label>
                <div class="col-10">
                    <input value="{{ $user->lastname }}" type="text" name="lastname" id="user-lastname" class="form-control" />
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-2" for="user-firstname">{{ __('auth.firstname') }}</label>
                <div class="col-10">
                    <input value="{{ $user->firstname }}" type="text" name="firstname" id="user-firstname" class="form-control" />
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-2" for="user-patronymic">{{ __('auth.patronymic') }}</label>
                <div class="col-10">
                    <input value="{{ $user->patronymic }}" type="text" name="patronymic" id="user-patronymic" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-email">{{ __('auth.E-Mail Address') }}</label>
                <div class="col-10"><input value="{{$user->email}}" type="email" name="email" id="user-email" class="form-control" /></div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-email_verified_at">{{ __('app.email verified at') }}</label>
                <div class="col-10">
                    <input value="{{ date('d.m.Y H:i:s', $user->email_verified_at->getTimestamp()) }}" type="datetime" name="email_verified_at" id="user-email_verified_at" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-role">{{ __('app.role') }}</label>
                <div class="col-10">
                    <select class="form-control" name="role" id="user-role">
                        <option value="Select Role">{{ __('app.select role') }}</option>
                        <option value="guest" @if($user->role=='guest') selected="selected" @endif>Guest</option>
                        <option value="client" @if($user->role=='client') selected="selected" @endif>Client</option>
                        <option value="operator" @if($user->role=='operator') selected="selected" @endif>Operator</option>
                        <option value="manager" @if($user->role=='manager') selected="selected" @endif>Manager</option>
                        <option value="administrator" @if($user->role=='administrator') selected="selected" @endif>Administrator</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2" for="user-company">{{ __('app.company') }}</label>
                <div class="col-10">
                    <input value="{{ $user->company->$name }}" type="text" name="company" id="user-company" class="form-control" />
                </div>
            </div> 
    
            <div class="form-group row">
                <label class="col-2" for="user-birthdate">{{ __('app.birthdate') }}</label>
                <div class="col-10">
                    <input value="{{ $user->birthdate }}" type="date" name="birthdate" id="user-birthdate" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-city">{{ __('app.city') }}</label>
                <div class="col-10">
                    <input value="{{ $user->city->$name }}" type="text" name="city" id="user-city" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-phone">{{ __('app.phone') }}</label>
                <div class="col-10">
                    <input value="{{ $user->phone }}" type="tel" name="phone" id="user-phone" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-skype">Skype</label>
                <div class="col-10">
                    <input value="{{ $user->skype }}" type="text" name="skype" id="user-skype" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-twitter">Twitter</label>
                <div class="col-10">
                    <input value="{{ $user->twitter }}" type="text" name="twitter" id="user-twitter" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-viber">Viber</label>
                <div class="col-10">
                    <input value="{{ $user->viber }}" type="text" name="viber" id="user-viber" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-loyality_card">{{ __('app.loyality card') }}</label>
                <div class="col-10">
                    <input value="{{ $user->loyality_card }}" type="text" name="loyality_card" id="user-loyality_card" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-options">{{ __('app.options') }}</label>
                <div class="col-10">
                    <input value="{{ $user->options }}" type="text" name="options" id="user-options" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-last_ip">{{ __('app.last IP') }}</label>
                <div class="col-10">
                    <input value="{{ $user->last_ip }}" type="tetx" name="last_ip" id="user-last_ip" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-created_at">{{ __('app.created at') }}</label>
                <div class="col-10">
                    <input value="{{ date('d.m.Y H:i:s', $user->created_at->getTimestamp()) }}" type="datetime" name="created_at" id="user-created_at" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-updated_at">{{ __('app.updated at') }}</label>
                <div class="col-10">
                    <input value="{{ date('d.m.Y H:i:s', $user->updated_at->getTimestamp()) }}" type="datetime" name="updated_at" id="user-updated_at" class="form-control" disabled />
                </div>
            </div>

<div class="row">
    <div class="col">
        <button type="submit" href="{{ route('user.update', ['id' => $user->id]) }}" class="btn btn-success">{{ __('app.save') }}</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

</form> 

<div class="row my-5"></div>

@endsection


