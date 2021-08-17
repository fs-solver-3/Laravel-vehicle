@extends('layouts.app')
@section('title', 'Роли')
@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $roles->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $roles->id])}}">
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
            <a class="back_to_link" href="{{ route('admin.roles.index', app()->getLocale()) }}">
                <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
            </a>
            <span class="pull-left admin-form-title">
                <h4>{{ isset($roles->title) ? $roles->title : 'Roles' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('admin.roles.destroy', ['locale' => app()->getLocale(), 'id' => $roles->id]) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('admin.roles.create', app()->getLocale()) }}" class="btn btn-add " title="Create New roles">
                            <img src="{{asset('admin/plus.svg')}}" alt="for you">
                        </a>
                        <a href="{{ route('admin.roles.edit', ['locale' => app()->getLocale(), 'id' => $roles->id]) }}" class="btn btn-add " title="Edit roles">
                                <img src="{{asset('admin/pencil.svg')}}" alt="for you">
                        </a>
                        <button type="submit" title="Delete roles" onclick="return confirm(&quot;Click Ok to delete roles.?&quot;)" class="btn btn-add">
                            <img src="{{asset('admin/delete.svg')}}" alt="for you">
                        </button>
                        {{-- <a href="{{ route('admin.roles.index', app()->getLocale()) }}" class="btn btn-primary" title="Show All Roles">
                            <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                        </a>

                        <a href="{{ route('admin.roles.create', app()->getLocale()) }}" class="btn btn-success" title="Create New Roles">
                            <img src="{{asset('admin/plus.svg')}}" alt="for you">
                        </a>
                        
                        <a href="{{ route('admin.roles.edit', ['locale' => app()->getLocale(), 'id' => $roles->id] ) }}" class="btn btn-primary" title="Edit Roles">
                            <img src="{{asset('admin/pencil.svg')}}" alt="for you">
                        </a>

                        <button type="submit" class="btn btn-danger" title="Delete Roles" onclick="return confirm(&quot;Click Ok to delete Roles.?&quot;)">
                            <img src="{{asset('admin/delete.svg')}}" alt="for you">
                        </button> --}}
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>@lang('global.roles.fields.title')</dt>
                <dd>{{ $roles->title }}</dd>
                <dt>@lang('global.roles.fields.permission')</dt>
                <dd>
                    @foreach ($roles->permission as $singlePermission)
					<div class="section-role--table__item"><span>{{ $singlePermission->title }}</span>
					</div>
                    @endforeach
                </dd>

            </dl>

        </div>
    </div>
</section>
@endsection