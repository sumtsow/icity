@extends('layouts.app')

@section('content')
<h2 class="mt-3">{{ __('app.cart')}}</h2>

<p>{{ Auth::user()->getFullName() }}</p>
@endsection


