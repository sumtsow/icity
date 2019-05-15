@extends('layouts.app')

@section('content')

<h1 class="mt-3">{{ __('app.User') }} <em>{{ $user->getFullName() }}</em></h1>

@include('errors')

<form action="{{ route('user.update', ['id' => $user->id]) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('put') }}
    
            <div class="form-group row">
                <label class="col-2" for="id">{{ __('app.id') }}</label>
                <div class="col-10">
                    <input value="{{ $user->id }}" type="text" name="id" id="id" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="lastname">{{ __('auth.lastname') }}</label>
                <div class="col-10">
                    <input value="{{ $user->lastname }}" type="text" name="lastname" id="lastname" class="form-control" />
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-2" for="firstname">{{ __('auth.firstname') }}</label>
                <div class="col-10">
                    <input value="{{ $user->firstname }}" type="text" name="firstname" id="firstname" class="form-control" />
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-2" for="patronymic">{{ __('auth.patronymic') }}</label>
                <div class="col-10">
                    <input value="{{ $user->patronymic }}" type="text" name="patronymic" id="patronymic" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="email">{{ __('auth.E-Mail Address') }}</label>
                <div class="col-10"><input value="{{$user->email}}" type="email" name="email" id="email" class="form-control" /></div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="email_verified_at">{{ __('app.email verified at') }}</label>
                <div class="col-10">
                    <input name="email_verified_at" id="email_verified_at" type="checkbox" @if($user->email_verified_at) checked="checked" @endif />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="role">{{ __('app.role') }}</label>
                <div class="col-10">
                    <select class="form-control" name="role" id="role">
                        @foreach($user->getRoles() as $role)
                        <option value="{{ $role }}" @if($user->role == $role) selected @endif>{{ ucfirst( $role ) }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2" for="company">{{ __('app.company') }}</label>
                <div class="col-10">
                    <select class="form-control" name="company" id="company">
                        <option selected>{{ __('app.select company') }}</option>
                        @foreach(App\Company::all() as $company)
                            @if($user->company)
                            <option value="{{ $company->id }}" @if($user->company->id == $company->id) selected @endif>{{ $company->$name }}</option>
                            @else
                            <option value="{{ $company->id }}">{{ $company->$name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div> 
    
            <div class="form-group row">
                <label class="col-2" for="birthdate">{{ __('app.birthdate') }}</label>
                <div class="col-10">
                    <input value="{{ $user->birthdate }}" type="date" name="birthdate" id="birthdate" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="city">{{ __('app.city') }}</label>
                <div class="col-10">
                    <select class="form-control" name="city" id="city">
                        <option selected>{{ __('app.select city') }}</option>
                        @foreach(App\City::all() as $city)
                            @if($user->city)
                            <option value="{{ $city->id }}" @if($user->city->id == $city->id) selected @endif>{{ $city->$name }}</option>
                            @else
                            <option value="{{ $city->id }}">{{ $city->$name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="phone">{{ __('app.phone') }}</label>
                <div class="col-10">
                    <input value="{{ $user->phone }}" type="tel" name="phone" id="phone" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="skype">Skype</label>
                <div class="col-10">
                    <input value="{{ $user->skype }}" type="text" name="skype" id="skype" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="twitter">Twitter</label>
                <div class="col-10">
                    <input value="{{ $user->twitter }}" type="text" name="twitter" id="twitter" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="viber">Viber</label>
                <div class="col-10">
                    <input value="{{ $user->viber }}" type="text" name="viber" id="viber" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="loyality_card">{{ __('app.loyality card') }}</label>
                <div class="col-10">
                    <input value="{{ $user->loyality_card }}" type="text" name="loyality_card" id="loyality_card" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="options">{{ __('app.options') }}</label>
                <div class="col-10">
                    <input value="{{ $user->options }}" type="text" name="options" id="options" class="form-control" />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="last_ip">{{ __('app.last IP') }}</label>
                <div class="col-10">
                    <input value="{{ $user->last_ip }}" type="tetx" name="last_ip" id="last_ip" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="created_at">{{ __('app.created at') }}</label>
                <div class="col-10">
                    <input value="{{ $user->created_at->format('d.m.Y H:i:s') }}" type="datetime" name="created_at" id="created_at" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="updated_at">{{ __('app.updated at') }}</label>
                <div class="col-10">
                    <input value="{{ $user->updated_at->format('d.m.Y H:i:s') }}" type="datetime" name="updated_at" id="updated_at" class="form-control" disabled />
                </div>
            </div>

<div class="row">
    <div class="col">
        <button type="submit" href="{{ route('user.update', ['id' => $user->id]) }}" class="btn btn-success">{{ __('app.save') }}</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

</form> 

@endsection


