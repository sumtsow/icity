@extends('layouts.app')

@section('content')

<h1 class="mt-3">{{ __('app.add') }} {{ __('app.User') }}</h1>

<form action="{{ route('user.store') }}" method="post" id="user-form">
    {{ csrf_field() }}
    
            <div class="form-group row">
                <label class="col-2" for="lastname">{{ __('auth.lastname') }} *</label>
                <div class="col-10">
                    <input value required autocomplete="lastname" type="text" name="lastname" id="lastname" class="form-control @error('lastname') is-invalid @enderror" autofocus />
                    
                    @error('lastname')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                    
                </div>
            </div>
                                
            <div class="form-group row">
                <label class="col-2" for="firstname">{{ __('auth.firstname') }} *</label>
                <div class="col-10">
                    <input value required autocomplete="firstname" type="text" name="firstname" id="firstname" class="form-control @error('firstname') is-invalid @enderror" autofocus />
                                        
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
                    <input value type="text" name="patronymic" id="patronymic" class="form-control @error('patronymic') is-invalid @enderror" autofocus />
                                                            
                    @error('patronymic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                    
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="email">{{ __('auth.E-Mail Address') }} *</label>
                <div class="col-10">
                    <input value required autocomplete="email" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" autofocus />
                                        
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror   
                    
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="role">{{ __('app.role') }} *</label>
                <div class="col-10">
                    <select class="form-control @error('role') is-invalid @enderror" name="role" id="role" autofocus>
                        @foreach($user->getRoles() as $key => $role)
                        <option value="{{ $key }}">{{ $role }}</option>
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
                    <input value="" type="text" name="company" id="company" class="form-control @error('company') is-invalid @enderror" autofocus />
                                                            
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
                    <input value="" type="date" name="birthdate" id="birthdate" class="form-control @error('birthdate') is-invalid @enderror" autofocus />
                                                            
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
                    <input value="" type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" autofocus />
                                                            
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
                    <input value="" type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" autofocus />
                                                            
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
                    <input value="" type="text" name="skype" id="skype" class="form-control @error('skype') is-invalid @enderror" autofocus />
                                                            
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
                    <input value="" type="text" name="twitter" id="twitter" class="form-control @error('twitter') is-invalid @enderror" autofocus />
                                                            
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
    
<div class="row">
    <div class="col">
        <button form="user-form" type="submit" href="{{ route('user.store') }}" class="btn btn-success">{{ __('app.save') }}</button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

</form> 

<div class="row my-5"></div>

@endsection


