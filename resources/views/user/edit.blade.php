@extends('layouts.app')

@section('breadcrumb')
<div class="row" id="breadcrumbs">
    <nav class="nav my-0 py-0">
        <ol class="breadcrumb m-0 text-truncate">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">{{ __('app.user admin')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.show', ['id' => $user->id]) }}">{{ __('app.User') }} {{ $user->getFullName() }}</a></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')

<h2 class="mt-3">{{ __('app.User') }} <em>{{ $user->getFullName() }}</em></h2>

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
                    <input value="{{ $user->lastname }}" type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror" autofocus required />
                                                                                            
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-2" for="firstname">{{ __('auth.firstname') }}</label>
                <div class="col-10">
                    <input value="{{ $user->firstname }}" type="text" name="firstname" id="firstname" class="form-control @error('firstname') is-invalid @enderror" autofocus required />
                                                                                                            
                    @error('firstname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-2" for="patronymic">{{ __('auth.patronymic') }}</label>
                <div class="col-10">
                    <input value="{{ $user->patronymic }}" type="text" name="patronymic" id="patronymic" class="form-control @error('patronymic') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('patronymic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="email">{{ __('auth.E-Mail Address') }}</label>
                <div class="col-10">
                    <input value="{{$user->email}}" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" autofocus required />
                                                                                                            
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="email_verified_at">{{ __('app.email verified at') }}</label>
                <div class="col-10 custom-control custom-switch">
                    <input name="email_verified_at" id="email_verified_at" type="checkbox" class="custom-control-input" @if($user->email_verified_at) checked="checked" @endif />
                    <label class="ml-3 custom-control-label" for="email_verified_at">&nbsp;</label>
                                                                                
                    @error('email_verified_at')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="role">{{ __('app.role') }}</label>
                <div class="col-10">
                    <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" required>
                        @foreach($user->getRoles() as $key => $role)
                        <option value="{{ $key+1 }}" @if($user->role == $role) selected @endif>{{ $role }}</option>
                        @endforeach
                    </select>
                                                                                                            
                    @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2" for="company">{{ __('app.company') }}</label>
                <div class="col-10">
                    <select class="form-control @error('company') is-invalid @enderror" name="company" id="company">
                        <option>{{ __('app.select company') }}</option>
                        @foreach(App\Company::all() as $company)
                            @if($user->company)
                            <option value="{{ $company->id }}" @if($user->company->id == $company->id) selected @endif>{{ $company->{'name_'.app()->getLocale()} }}</option>
                            @else
                            <option value="{{ $company->id }}">{{ $company->{'name_'.app()->getLocale()} }}</option>
                            @endif
                        @endforeach
                    </select>
                                                                                                            
                    @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div> 
    
            <div class="form-group row">
                <label class="col-2" for="birthdate">{{ __('app.birthdate') }}</label>
                <div class="col-10">
                    <input value="{{ $user->birthdate }}" type="date" name="birthdate" id="birthdate" class="form-control @error('birthdate') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('birthdate')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="city">{{ __('app.city') }}</label>
                <div class="col-10">
                    <select class="form-control @error('city') is-invalid @enderror" name="city" id="city">
                        <option>{{ __('app.select city') }}</option>
                        @foreach(App\City::all() as $city)
                            @if($user->city)
                            <option value="{{ $city->id }}" @if($user->city->id == $city->id) selected @endif>{{ $city->{'name_'.app()->getLocale()} }}</option>
                            @else
                            <option value="{{ $city->id }}">{{ $city->{'name_'.app()->getLocale()} }}</option>
                            @endif
                        @endforeach
                    </select>
                                                                                                            
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="phone">{{ __('app.phone') }}</label>
                <div class="col-10">
                    <input value="{{ $user->phone }}" type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="skype">Skype</label>
                <div class="col-10">
                    <input value="{{ $user->skype }}" type="text" name="skype" id="skype" class="form-control @error('skype') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('skype')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="twitter">Twitter</label>
                <div class="col-10">
                    <input value="{{ $user->twitter }}" type="text" name="twitter" id="twitter" class="form-control @error('twitter') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('twitter')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="viber">Viber</label>
                <div class="col-10">
                    <input value="{{ $user->viber }}" type="text" name="viber" id="viber" class="form-control @error('viber') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('viber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="loyality_card">{{ __('app.loyality card') }}</label>
                <div class="col-10">
                    <input value="{{ $user->loyality_card }}" type="text" name="loyality_card" id="loyality_card" class="form-control @error('loyality_card') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('loyality_card')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="options">{{ __('app.options') }}</label>
                <div class="col-10">
                    <input value="{{ $user->options }}" type="text" name="options" id="options" class="form-control @error('options') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('options')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="last_ip">{{ __('app.last IP') }}</label>
                <div class="col-10">
                    <input value="{{ $user->last_ip }}" type="text" id="last_ip" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="created_at">{{ __('app.created at') }}</label>
                <div class="col-10">
                    <input value="{{ $user->created_at->format('d.m.Y H:i:s') }}" type="datetime" id="created_at" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="updated_at">{{ __('app.updated at') }}</label>
                <div class="col-10">
                    <input value="{{ $user->updated_at->format('d.m.Y H:i:s') }}" type="datetime" id="updated_at" class="form-control" disabled />
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


