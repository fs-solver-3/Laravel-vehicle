@extends('layouts.app')
@section('title', 'Оценки ответов')

@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $demandScore->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $demandScore->id])}}">
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
                <a href="{{ route('admin.demand_score.index', app()->getLocale()) }}" class="back_to_link" title="Show All Lessons">
                    <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                </a>
                <span class="pull-left admin-form-title">
                    <h4>{{ !empty($demandScore->title) ? $$demandScore->title : 'Status' }}</h4>
                </span>
            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>@lang('global.demand_categories.fields.title'):</dt>
                <dd>{{ $demandScore->name }}</dd>
                <dt>@lang('global.demand_categories.fields.description'):</dt>
                <dd>{{ $demandScore->description }}</dd>
                <dt>@lang('global.demand_categories.fields.grade'):</dt>
                <dd>{{ $demandScore->grade }}</dd>

            </dl>

        </div>
    </div>
</section>
@endsection