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
                    <h4>{{ !empty($demandScore->name) ? $demandScore->name : 'demandCategory' }}</h4>
                </span>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('admin.demand_categories.create', app()->getLocale()) }}" class="btn btn-add" title="Create New demandCategory">
                    <img src="{{asset('admin/plus.svg')}}" alt="for you">
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif

            <form method="POST" action="{{ route('admin.demand_score.update', ['locale' => app()->getLocale(), 'id' => $demandScore->id]) }}" id="edit_demand_status_form" name="edit_demand_status_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('admin.demand_scores.form', [
                'demandScore' => $demandScore,
                ])

                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_update')</button>
                         <a href="{{ route('admin.demand_score.index', app()->getLocale()) }}">
                             <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                         </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
@endsection
