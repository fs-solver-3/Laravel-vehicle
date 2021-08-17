@extends('layouts.app')
@section('title', 'цвет')
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

        <div class="lang @if(app()->getLocale() == 'en')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'en', 'id' => $colors->id])}}">

            <div class="flag-select"></div>
            <img src="{{asset('img/flags/en.png')}}" alt="en">
            <span class="lang-txt">@lang('global.en')</span>
        </div>
        <div class="lang @if(app()->getLocale() == 'ru')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $colors->id])}}">
            <div class="flag-select"></div>
            <img src="{{asset('img/flags/ru.png')}}" alt="ru">
            <span class="lang-txt">@lang('global.ru')</span>
        </div>

        <div class="lang @if(app()->getLocale() == 'tj')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'tj', 'id' => $colors->id])}}">
            <div class="flag-select"></div>
            <img src="{{asset('img/flags/tj.png')}}" alt="tj">
            <span class="lang-txt">@lang('global.tj')</span>
        </div>

        <div class="lang @if(app()->getLocale() == 'uz')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $colors->id])}}">
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

        <div class="section-top-side">
            <div class="section-top-block--back">
                <a href="{{ route('admin.colors.index', app()->getLocale()) }}">
                    <div class="section-top-block--back__item">
                        <svg class="icon icon-arrow-left ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
                        </svg>
                    </div>
                </a>
                <div class="section-block--title">{{ isset($colors->name) ? $colors->name : 'Color' }}</div>
            </div>
        </div>

        {{-- <div class="pull-right">

            <form method="POST" action="{!! route('admin.colors.destroy', [$colors->id, app()->getLocale()]) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('admin.colors.index', app()->getLocale()) }}" class="btn btn-primary" title="Show All Color">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('admin.colors.create', app()->getLocale()) }}" class="btn btn-success" title="Create New Color">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('admin.colors.edit', ['locale' => app()->getLocale(), 'id' => $colors->id]) }}" class="btn btn-primary" title="Edit Color">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Color" onclick="return confirm(&quot;Click Ok to delete Car.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div> --}}

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Color</dt>
            <dd>{{ $colors->color }}</dd>

        </dl>

    </div>
</div>
</section>
@endsection