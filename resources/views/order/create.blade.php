@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="justify-center">{{__('app.new order')}}</h1>
    <form method="post" action="{{ route('order') }}">
    {{csrf_field()}}
    {{ method_field('put') }}
    @include('errors')
        <div class="card mb-3">
            <div class="card-body">           
                <textarea class="form-control" id="" name="order" rows="3"></textarea>
            </div>
        </div>            
        <input type="submit" class="btn btn-success" value="{{ __('app.save') }}" />
        <input type="button" class="btn btn-warning" value="{{ __('app.cancel') }}" name="cancel" onclick="history.back();" />
    </form>     
</div>
@endsection

