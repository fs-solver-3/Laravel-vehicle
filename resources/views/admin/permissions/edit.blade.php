@extends('layouts.app')
@section('title', 'Права доступа')
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

                <div class="pull-left">
                    <a class="back_to_link" href="{{ route('admin.permissions.index', app()->getLocale()) }}">
                        <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                    </a>
                    <span class="pull-left admin-form-title">
                        <h4 >{{ !empty($permissions->title) ? $permissions->title : 'Permissions' }}</h4>
                    </span>
                </div>
                <div class="btn-group btn-group-sm pull-right" role="group">

                    {{-- <a href="{{ route('admin.users.index', app()->getLocale()) }}" class="btn btn-primary" title="Show All Users">
                        <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                    </a>

                    <a href="{{ route('admin.users.create', app()->getLocale()) }}" class="btn btn-success" title="Create New Users">
                        <img src="{{asset('admin/plus.svg')}}" alt="for you">
                    </a> --}}

                        <div class="btn-group btn-group-sm pull-right" role="group">
                                <a href="{{ route('admin.permissions.create', app()->getLocale()) }}"  class="btn btn-add " title="Create New Users">
                                    <img src="{{asset('admin/plus.svg')}}" alt="for you">
                                </a>
                        </div>

                </div>
            </div>
    
            {{-- <div class="panel-heading clearfix">

                <div class="pull-left">
                    <h4 class="mt-5 mb-5">{{ !empty($permissions->title) ? $permissions->title : 'Permissions' }}</h4>
                </div>
                <div class="btn-group btn-group-sm pull-right" role="group">

                    <a href="{{ route('admin.permissions.index', app()->getLocale()) }}" class="btn btn-primary" title="Show All Permissions">
                        <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                    </a>

                    <a href="{{ route('admin.permissions.create', app()->getLocale()) }}" class="btn btn-success" title="Create New Permissions">
                        <img src="{{asset('admin/plus.svg')}}" alt="for you">
                    </a>

                </div>
            </div> --}}

            <div class="panel-body">

                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ route('admin.permissions.update', ['locale' => app()->getLocale(), 'id' => $permissions->id]) }}" id="edit_permissions_form" name="edit_permissions_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                @include ('admin.permissions.form', [
                                            'permissions' => $permissions,
                                        ])

                    <div class="section-footer-side">
                        <div class="section-buttons--wrap">
                            <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_update')</button>
                            <a href="{{ route('admin.permissions.index', app()->getLocale()) }}">
                                <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                            </a>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </section>
@endsection