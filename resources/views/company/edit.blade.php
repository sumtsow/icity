@extends('layouts.app')

@section('scripts')
<script src="https://cloud.tinymce.com/5/tinymce.min.js?apiKey=xs70r0zwazereyn8rtwn65o53caspvj14u5eo1t0xl77kt8v"></script>
<script>tinymce.init({selector:'textarea'});</script>
<script src="/js/uploadFileChangeName.js"></script>
@endsection

@section('breadcrumb')
<div class="row" id="breadcrumbs">
    <nav class="nav my-0 py-0">
        <ol class="breadcrumb m-0 text-truncate">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('auth.Dashboard')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('company.index') }}">{{ __('app.companies admin')}}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('company.show', ['id' => $company->id]) }}">{{ __('app.company') }} {{ $company->{'name_'.app()->getLocale()} }}</a></li>
        </ol>
    </nav>
</div>
@endsection

@section('content')

<h2 class="mt-3">{{ __('app.company') }} <em>{{ $company->{'name_'.app()->getLocale()} }}</em></h2>

<form action="{{ route('company.update', ['id' => $company->id]) }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    {{ method_field('put') }}
    
            <div class="form-group row">
                <label class="col-2" for="id">{{ __('app.id') }}</label>
                <div class="col-10">
                    <input value="{{ $company->id }}" type="text" name="id" id="id" class="form-control" disabled />
                </div>
            </div>
    
            @foreach(config('app.locales') as $locale)
            
            <div class="form-group row">
                <label class="col-2" for="{{ "name_$locale" }}">{{ __('app.name') }} ({{ __('app.current language', [], $locale) }})</label>
                <div class="col-10">
                    <input value="{{ $company->{"name_$locale"} }}" type="text" name="{{ "name_$locale" }}" id="{{ "name_$locale" }}" class="form-control @error('{{ "name_$locale" }}') is-invalid @enderror" autofocus required />
                    @error("name_$locale")
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>            

            @endforeach
        
            <div class="form-group row">
                <label class="col-2" for="image">{{ __('app.image') }}</label>
                
                <div class="col-10">

                    <div class="custom-file">
                        <input type="file" id="customFile" name="image" class="custom-file-input @error('image') is-invalid @enderror" autofocus>
                        <label class="custom-file-label" for="customFile">{{ $company->image }}</label>
                    
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror  
                    
                    </div>
               
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-2" for="city">{{ __('app.city') }}</label>
                <div class="col-10">
                    <select class="form-control @error('city') is-invalid @enderror" name="city" id="city">
                        <option>{{ __('app.select city') }}</option>
                        @foreach(App\City::all() as $city)
                            @if($company->city)
                            <option value="{{ $city->id }}" @if($company->city->id == $city->id) selected @endif>{{ $city->{'name_'.app()->getLocale()} }}</option>
                            @else
                            <option value="{{ $city->id }}">{{ $city->{'name_'.app()->getLocale()} }}</option>
                            @endif
                        @endforeach

                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </select>                
                </div>
            </div>
                
            <div class="form-group row">
                <label class="col-2" for="city">{{ __('app.plan') }}</label>
                <div class="col-10">
                    <select class="form-control @error('plan') is-invalid @enderror" name="plan" id="plan">
                        <option>{{ __('app.select plan') }}</option>
                        @foreach(App\Plan::all() as $plan)
                            @if($company->plan)
                            <option value="{{ $plan->id }}" @if($company->plan->id == $plan->id) selected @endif>{{ $plan->{'name_'.app()->getLocale()} }}</option>
                            @else
                            <option value="{{ $plan->id }}">{{ $plan->{'name_'.app()->getLocale()} }}</option>
                            @endif
                        @endforeach
                    @error('plan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror                        
                    </select>
                </div>
            </div>
             
            <div class="form-group row">
                <label class="col-2" for="address">{{ __('app.address') }}</label>
                <div class="col-10">
                    <input value="{{ $company->address }}" type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
             
            <div class="form-group row">
                <label class="col-2" for="phone">{{ __('app.phone') }}</label>
                <div class="col-10">
                    <input value="{{ $company->phone }}" type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
             
            <div class="form-group row">
                <label class="col-2" for="email">{{ __('auth.E-Mail Address') }}</label>
                <div class="col-10">
                    <input value="{{ $company->email }}" type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
             
            <div class="form-group row">
                <label class="col-2" for="payment">{{ __('app.payment') }}</label>
                <div class="form-check col-10">
                    <input type="checkbox" name="payment" id="payment" class="ml-2 form-check-input @error('payment') is-invalid @enderror" autofocus @if($company->payment_state) checked="checked" @endif />
                           
                    @error('payment')
                        <span class="ml-5 invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
             
            <div class="form-group row">
                <label class="col-2" for="expired">{{ __('app.expired') }}</label>
                <div class="form-check col-10">
                    <input type="checkbox" name="expired" id="expired" class="ml-2 form-check-input @error('expired') is-invalid @enderror" autofocus @if($company->expired) checked="checked" @endif />
                           
                    @error('expired')
                        <span class="ml-5 invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
             
            <div class="form-group row">
                <label class="col-2" for="enabled">{{ __('app.enabled') }}</label>
                <div class="form-check col-10">
                    <input type="checkbox" name="enabled" id="enabled" class="ml-2 form-check-input @error('enabled') is-invalid @enderror" autofocus @if($company->enabled) checked="checked" @endif />
                           
                    @error('enabled')
                        <span class="ml-5 invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
            
            <div class="form-group p-2 border border-light rounded">
                <label class="col-2 font-weight-bold px-0">{{ __('app.description') }}</label>
                @foreach(config('app.locales') as $locale)

                <div class="form-group row">
                    <label class="col-2" for="{{ "description_$locale" }}">{{ __('app.current language', [], $locale) }}</label>
                    <div class="col-10">
                        <textarea rows="5" name="{{ "description_$locale" }}" id="{{ "description_$locale" }}" class="form-control @error('{{ "description_$locale" }}') is-invalid @enderror" autofocus>
    {{ $company->{"description_$locale"} }}
                        </textarea>

                        @error("description_$locale")
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
                @endforeach                
            </div>

            <div class="form-group p-2 border border-light rounded">
                <label class="col-2 font-weight-bold px-0">{{ __('app.work time') }}</label>

                <div class="form-group row">
                    <label class="col-2" for="work_begin">{{ __('app.work begin') }}</label>
                    <div class="col-10">
                        <input value="{{ \Carbon\Carbon::createFromFormat('H:i:s', $company->work_begin)->format('H:i') }}" type="time" name="work_begin" id="work_begin" class="form-control @error('work_begin') is-invalid @enderror" autofocus />

                        @error('work_begin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2" for="work_finish">{{ __('app.work finish') }}</label>
                    <div class="col-10">
                        <input value="{{ \Carbon\Carbon::createFromFormat('H:i:s', $company->work_finish)->format('H:i') }}" type="time" name="work_finish" id="work_finish" class="form-control @error('work_finish') is-invalid @enderror" autofocus />

                        @error('work_finish')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>

            </div>
             
            <div class="form-group row">
                <label class="col-2" for="map">{{ __('app.map') }}</label>
                <div class="col-10">
                    <input value="{{ $company->map }}" type="text" name="map" id="map" class="form-control @error('map') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('map')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
             
            <div class="form-group row">
                <label class="col-2" for="website">{{ __('app.website') }}</label>
                <div class="col-10">
                    <input value="{{ $company->website }}" type="url" name="website" id="website" class="form-control @error('website') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('website')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
                         
            <div class="form-group row">
                <label class="col-2" for="skype">Skype</label>
                <div class="col-10">
                    <input value="{{ $company->skype }}" type="text" name="skype" id="skype" class="form-control @error('skype') is-invalid @enderror" autofocus />
                                                                                                            
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
                    <input value="{{ $company->twitter }}" type="text" name="twitter" id="twitter" class="form-control @error('twitter') is-invalid @enderror" autofocus />
                                                                                                            
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
                    <input value="{{ $company->viber }}" type="text" name="viber" id="viber" class="form-control @error('viber') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('viber')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-2" for="options">{{ __('app.options') }}</label>
                <div class="col-10">
                    <input value="{{ $company->options }}" type="text" name="options" id="options" class="form-control @error('options') is-invalid @enderror" autofocus />
                                                                                                            
                    @error('options')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="created_at">{{ __('app.created at') }}</label>
                <div class="col-10">
                    <input value="{{ $company->created_at->format('d.m.Y H:i:s') }}" type="datetime" id="created_at" class="form-control" disabled />
                </div>
            </div>
    
            <div class="form-group row">
                <label class="col-2" for="updated_at">{{ __('app.updated at') }}</label>
                <div class="col-10">
                    <input value="{{ $company->updated_at->format('d.m.Y H:i:s') }}" type="datetime" id="updated_at" class="form-control" disabled />
                </div>
            </div>

<div class="row">
    <div class="col">
        <button type="submit" href="{{ route('company.update', ['id' => $company->id]) }}" class="btn btn-success">{{ __('app.save') }}</button>
        <a href="{{ route('company.index') }}" class="btn btn-secondary ml-2">{{ __('app.cancel') }}</a>
    </div>
</div>

</form> 
<script>
$(document).ready(function(){
    $("#customFile").on("change", function(e){
      var name = e.target.value.split( '\\' ).pop();
      $('.custom-file-label').text(name);
    })
  })
</script>
@endsection