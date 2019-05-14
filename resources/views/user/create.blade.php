@extends('layouts.app')

@section('content')

<h1 class="mt-3">{{ __('app.add') }} {{ __('app.User') }}</h1>

@include('errors')

<form action="{{ route('user.create') }}" method="post">
    {{ csrf_field() }}
    
            <div class="form-group row">
                <label class="col-2" for="user-lastname">{{ __('auth.lastname') }}</label>
                <div class="col-10">
                    <input value="" type="text" name="lastname" id="user-lastname" class="form-control" />
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-2" for="user-firstname">{{ __('auth.firstname') }}</label>
                <div class="col-10">
                    <input value="" type="text" name="firstname" id="user-firstname" class="form-control" />
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-2" for="user-patronymic">{{ __('auth.patronymic') }}</label>
                <div class="col-10">
                    <input value="" type="text" name="patronymic" id="user-patronymic" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-email">{{ __('auth.E-Mail Address') }}</label>
                <div class="col-10"><input value="" type="email" name="email" id="user-email" class="form-control" /></div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-role">{{ __('app.role') }}</label>
                <div class="col-10">
                    <select class="form-control" name="role" id="user-role">
                        <option value="Select Role" selected="selected">{{ __('app.select role') }}</option>
                        <option value="guest">Guest</option>
                        <option value="client">Client</option>
                        <option value="operator">Operator</option>
                        <option value="manager">Manager</option>
                        <option value="administrator">Administrator</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2" for="user-company">{{ __('app.company') }}</label>
                <div class="col-10">
                    <input value="" type="text" name="company" id="user-company" class="form-control" />
                </div>
            </div> 
    
            <div class="form-group row">
                <label class="col-2" for="user-birthdate">{{ __('app.birthdate') }}</label>
                <div class="col-10">
                    <input value="" type="date" name="birthdate" id="user-birthdate" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-city">{{ __('app.city') }}</label>
                <div class="col-10">
                    <input value="" type="text" name="city" id="user-city" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-phone">{{ __('app.phone') }}</label>
                <div class="col-10">
                    <input value="" type="tel" name="phone" id="user-phone" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-skype">Skype</label>
                <div class="col-10">
                    <input value="" type="text" name="skype" id="user-skype" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="user-twitter">Twitter</label>
                <div class="col-10">
                    <input value="" type="text" name="twitter" id="user-twitter" class="form-control" />
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
    
<div class="row">
    <div class="col">
        <button type="submit" href="{{ route('user.store', ['id' => $user->id]) }}" class="btn btn-success">{{ __('app.save') }}</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

</form> 

<div class="row my-5"></div>

@endsection


