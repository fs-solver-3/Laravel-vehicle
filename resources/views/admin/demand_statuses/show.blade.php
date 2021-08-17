@extends('layouts.app')
@section('title', 'Статусы')

@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $demandStatus->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $demandStatus->id])}}">
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
        <div class="pull-left">
            <a href="{{ route('admin.demand_status.index', app()->getLocale()) }}" class="back_to_link" title="Show All Lessons">
                <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
            </a>
            <span class="pull-left admin-form-title">
                <h4>{{ !empty($demandStatus->title) ? $$demandStatus->title : 'Status' }}</h4>
            </span>
        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('global.demand_categories.fields.title'):</dt>
            <dd>{{ $demandStatus->name }}</dd>
            <dt>@lang('global.demand_categories.fields.description'):</dt>
            <dd>{{ $demandStatus->description }}</dd>
            <dt>@lang('global.demand_categories.fields.grade'):</dt>
            <dd>{{ $demandStatus->grade }}</dd>

        </dl>

    </div>
</div>
</section>
@endsection