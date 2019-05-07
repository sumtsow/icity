@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-success">
                <div class="card-header bg-success text-light">{{ __('mail.verify email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('mail.link sent') }}
                        </div>
                    @endif

                    {{ __('mail.check email') }}
                    {{ __('mail.if not receive') }}, <a href="{{ route('verification.resend') }}">{{ __('mail.click here') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
