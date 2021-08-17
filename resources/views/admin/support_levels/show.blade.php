{{--  --}}
@extends('layouts.app')
@section('title', 'Уровни поддержки')
@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $supportLevels->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $supportLevels->id])}}">
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
        <a class="back_to_link" href="{{ route('admin.support_levels.index', app()->getLocale()) }}">
            <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
        </a>
        <span class="pull-left admin-form-title">
            <h4>{{ isset($supportLevels->name) ? $supportLevels->name : 'Support Levels' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('admin.support_levels.destroy', ['locale' => app()->getLocale(), 'id' => $supportLevels->id]) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">

                    <a href="{{ route('admin.support_levels.create', app()->getLocale()) }}" class="btn btn-add" title="Create New Support Level">
                        <img src="{{asset('admin/plus.svg')}}" alt="for you">
                    </a>

                    <a href="{{ route('admin.support_levels.edit', ['locale' => app()->getLocale(), 'id' => $supportLevels->id] ) }}" class="btn btn-add" title="Edit Support Level">
                        <img src="{{asset('admin/pencil.svg')}}" alt="for you">
                    </a>

                    <button type="submit" class="btn btn-add" title="Delete support_levels" onclick="return confirm(&quot;Click Ok to delete SupportLevels.?&quot;)">
                        <img src="{{asset('admin/delete.svg')}}" alt="for you">
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
           <dt>@lang('global.support_levels.fields.title')</dt>
           <dd>{{ $supportLevels->name }}</dd>
           <dt>@lang('global.support_levels.fields.reaction_time')</dt>
           <dd>{{ $supportLevels->reaction_time }}</dd>
           <dt>@lang('global.support_levels.fields.default_answer')</dt>
           <dd>{{ $supportLevels->default_answer }}</dd>
           <dt>@lang('global.support_levels.fields.description')</dt>
           <dd>{{ $supportLevels->description }}</dd>

        </dl>

    </div>
</div>
</section>
@endsection
{{--  --}}