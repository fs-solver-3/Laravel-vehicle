@inject('request', 'Illuminate\Http\Request')
@section('title', 'Права доступа')
@extends('layouts.app')
@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $permissions->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $permissions->id])}}">
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
            <a class="back_to_link" href="{{ route('admin.permissions.index', app()->getLocale()) }}">
            <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
            </a>
            <span class="pull-left admin-form-title">
                <h4>{{ isset($permissions->title) ? $permissions->title : 'Permissions' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('admin.permissions.destroy',[$permissions->id, app()->getLocale()]) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('admin.permissions.create', app()->getLocale()) }}" class="btn btn-add " title="Create New Permissions">
                            <img src="{{asset('admin/plus.svg')}}" alt="for you">
                        </a>
                        <a href="{{ route('admin.permissions.edit', ['locale' => app()->getLocale(), 'id' => $permissions->id]) }}" class="btn btn-add " title="Edit Permissions">
                                <img src="{{asset('admin/pencil.svg')}}" alt="for you">
                        </a>
                        <button type="submit" title="Delete permissions" onclick="return confirm(&quot;Click Ok to delete Permissions.?&quot;)" class="btn btn-add">
                            <img src="{{asset('admin/delete.svg')}}" alt="for you">
                        </button>
                        
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>@lang('global.permissions.fields.title'):</dt>
                <dd>{{ $permissions->title }}</dd>

            </dl>

        </div>
    </div>
</section>
@endsection