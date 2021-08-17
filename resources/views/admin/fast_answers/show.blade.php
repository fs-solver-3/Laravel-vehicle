@extends('layouts.app')
@section('title', 'Быстрые ответы')

@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $fastAnswer->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $fastAnswer->id])}}">
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-uz.png') }}');">
        </div>
        <div class="choise-lang--item__text">UZ</div>
    </li>
</ul>
@endsection
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <a class="back_to_link" href="{{ route('admin.fast_answers.index', app()->getLocale()) }}">
            <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
        </a>

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($fastAnswer->name) ? $fastAnswer->name : 'Demand Category' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('admin.fast_answers.destroy', ['locale' => app()->getLocale(), 'id' => $fastAnswer->id] ) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">


                    <a href="{{ route('admin.fast_answers.create',['locale' => app()->getLocale(), 'id' => $fastAnswer->id]) }}" class="btn btn-add" title="Create New Demand Category">
                        <img src="{{asset('admin/plus.svg')}}" alt="for you">
                    </a>

                    <a href="{{ route('admin.fast_answers.edit', ['locale' => app()->getLocale(), 'id' => $fastAnswer->id] ) }}" class="btn btn-add" title="Edit Demand Category">
                        <img src="{{asset('admin/pencil.svg')}}" alt="for you">
                    </a>

                    <button type="submit" class="btn btn-add" title="Delete Demand Category" onclick="return confirm(&quot;Click Ok to delete Demand Category.?&quot;)">
                        <img src="{{asset('admin/delete.svg')}}" alt="for you">
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('global.fast_answers.fields.name'):</dt>
            <dd>{{ $fastAnswer->name }}</dd>
            <dt>@lang('global.fast_answers.fields.description'):</dt>
            <dd>{{ $fastAnswer->description }}</dd>

        </dl>

    </div>
</div>

@endsection
