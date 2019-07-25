@extends('layouts.app')

@section('content')

<div class="row mt-5">
    <div class="col-1 border-right border-dark align-items-start d-none d-xs-none d-sm-none d-md-flex d-lg-flex d-xl-flex" style="min-height: 18em; min-width: 7em">
        <h3 class="h3 text-uppercase font-weight-bold m-3" style="transform: rotate(270deg) translateX(-5em)">{{ __('app.categories') }}</h3>   
    </div>

    <div class="col">

        <div class="row mb-2">

            @foreach($categories as $category)
            <div class="col d-flex p-3 border-0" >
                <a href="{{ route('category', ['id' => $category->id]) }}">
                    <img src="/storage/img/category/{{ $category->image }}" class="img-fluid" style="min-width: 80px" alt="{{ $category->{'name_'.app()->getLocale()} }}" title="{{ $category->{'name_'.app()->getLocale()} }} ({{ count($category->service) }})">
                </a>
            </div>

            @endforeach

        </div>
    </div>

</div>

<div class="row mt-5">
    <div class="col-1 border-right border-dark align-items-start d-none d-xs-none d-sm-none d-md-flex d-lg-flex d-xl-flex" style="min-height: 14em; min-width: 7em">
        <h3 class="h3 text-uppercase font-weight-bold" style="transform: rotate(270deg) translateX(-3em);">{{ __('app.actions') }}</h3>   
    </div>

    <div class="col">
        &nbsp;
    </div>
</div>

@endsection