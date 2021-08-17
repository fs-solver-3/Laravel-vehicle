@extends('layouts.app')
@section('title', 'Модель автомобиля')
@section('admin_lang')
<div class="translate_wrapper">
    <div class="current_lang">
        <div class="lang">
            <img src="{{asset('img/flags/'.app()->getLocale().'.png')}}" alt="arroba" id="flag_img">
            <img src="{{asset('admin/arrow-down.svg')}}" alt="arrow" id="flag-down">
        </div>
    </div>

    <div class="more_lang">

        <h5 class="text-center">@lang('global.select_lang')</h5>

        <div class="lang @if(app()->getLocale() == 'en')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'en', 'id' => $car->id])}}">

            <div class="flag-select"></div>
            <img src="{{asset('img/flags/en.png')}}" alt="en">
            <span class="lang-txt">@lang('global.en')</span>
        </div>
        <div class="lang @if(app()->getLocale() == 'ru')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $car->id])}}">
            <div class="flag-select"></div>
            <img src="{{asset('img/flags/ru.png')}}" alt="ru">
            <span class="lang-txt">@lang('global.ru')</span>
        </div>

        <div class="lang @if(app()->getLocale() == 'tj')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'tj', 'id' => $car->id])}}">
            <div class="flag-select"></div>
            <img src="{{asset('img/flags/tj.png')}}" alt="tj">
            <span class="lang-txt">@lang('global.tj')</span>
        </div>

        <div class="lang @if(app()->getLocale() == 'uz')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $car->id])}}">
            <div class="flag-select"></div>
            <img src="{{asset('img/flags/uz.png')}}" alt="uz">
            <span class="lang-txt">@lang('global.uz')</span>
        </div>
    </div>
</div>
@endsection
@section('content')
<section class="section-1">
<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4>{{ isset($car->name) ? $car->name : 'Car' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('admin.car.destroy', [$car->id, app()->getLocale()]) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.car.index', app()->getLocale()) }}" class="btn btn-primary" title="Show All Car">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('admin.car.create', app()->getLocale()) }}" class="btn btn-success" title="Create New Car">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('admin.car.edit', ['locale' => app()->getLocale(), 'id' => $car->id]) }}" class="btn btn-primary" title="Edit Car">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Car" onclick="return confirm(&quot;Click Ok to delete Car.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Model</dt>
            <dd>{{ $car->model }}</dd>
            <dt>Name</dt>
            <dd>{{ $car->name }}</dd>
            <dt>Color</dt>
            <dd>{{ $car->color }}</dd>
            <dt>Year</dt>
            <dd>{{ $car->year }}</dd>
            <dt>Type</dt>
            <dd>{{ $car->type }}</dd>
            <dt>Number</dt>
            <dd>{{ $car->number }}</dd>
            <dt>Body Type</dt>
            <dd>{{ $car->body_type }}</dd>

        </dl>

    </div>
</div>
</section>
@endsection