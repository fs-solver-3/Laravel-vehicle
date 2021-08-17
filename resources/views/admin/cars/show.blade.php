@extends('layouts.app')
@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $car->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $car->id])}}">
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-uz.png') }}');">
        </div>
        <div class="choise-lang--item__text">UZ</div>
    </li>
</ul>
@endsection
@section('content')
<section class="section-1">
<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <a class="back_to_link" href="{{ route('admin.car.index', app()->getLocale()) }}">
            <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
        </a>

        <span class="pull-left">
            <h4>{{ isset($car->name) ? $car->name : 'Car' }}</h4>
        </span>
    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('global.car.fields.model'):</dt>
            <dd>{{ $car->model }}</dd>
            <dt>@lang('global.car.fields.brand'):</dt>
            <dd>{{ $car->name }}</dd>
            <dt>@lang('global.car.fields.color'):</dt>
            <dd>{{ $car->color }}</dd>
            <dt>@lang('global.car.fields.year'):</dt>
            <dd>{{ $car->year }}</dd>
            <dt>@lang('global.car.fields.number'):</dt>
            <dd>{{ $car->number }}</dd>
            <dt>@lang('global.car.fields.body_type')</dt>
            <dd>{{ $car->body_type }}</dd>

        </dl>

    </div>
</div>
</section>
@endsection