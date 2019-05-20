@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header bg-success text-light">{{ __('auth.Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="{{ route('user.index') }}"><h5>{{ __('app.user admin') }}</h5></a>
                    <a href="{{ route('category.index') }}"><h5>{{ __('app.categories admin') }}</h5></a>
                    <a href="{{ route('service.index') }}"><h5>{{ __('app.services admin') }}</h5></a>
                    <a href="{{ url('/order') }}"><h5>{{ __('app.orders admin') }}</h5></a>
                    <a href="{{ url('/password') }}"><h5>{{ __('app.change my password') }}</h5></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
