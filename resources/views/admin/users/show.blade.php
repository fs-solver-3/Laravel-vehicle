@extends('layouts.app')
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
            
                <div class="lang @if(app()->getLocale() == 'en')selected @endif " data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'en', 'id' => $users->id])
                        }}'>
                    <div class="flag-select"></div>
                    <img src="{{asset('img/flags/en.png')}}" alt="en">
                    <span class="lang-txt">@lang('global.en')</span> 
                </div>
                <div class="lang @if(app()->getLocale() == 'ru')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ri', 'id' => $users->id])}}">
                    <div class="flag-select"></div>
                    <img src="{{asset('img/flags/ru.png')}}" alt="ru">
                    <span class="lang-txt">@lang('global.ru')</span> 
                </div>

                <div class="lang @if(app()->getLocale() == 'tj')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'tj', 'id' => $users->id])}}">
                    <div class="flag-select"></div>
                    <img src="{{asset('img/flags/tj.png')}}" alt="tj">
                    <span class="lang-txt">@lang('global.tj')</span> 
                </div>

                <div class="lang @if(app()->getLocale() == 'uz')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $users->id])}}">
                    <div class="flag-select"></div>
                    <img src="{{asset('img/flags/uz.png')}}" alt="uz">
                    <span class="lang-txt">@lang('global.uz')</span> 
                </div>
        </div>
    </div>
@endsection
@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">
        <a class="back_to_link" href="{{ route('admin.users.index', app()->getLocale()) }}">
            <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
        </a>
        <span class="pull-left admin-form-title">
            <h4>{{ isset($users->name) ? $users->name : 'Users' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('admin.users.destroy', [$users->id, app()->getLocale()]) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                   
                    {{-- <a href="{{ route('admin.users.create', app()->getLocale()) }}" class="btn btn-success" title="Create New Users">
                        <img src="{{asset('admin/plus.svg')}}" alt="for you">
                    </a> --}}

                    <a href="{{ route('admin.users.create', app()->getLocale()) }}" class="btn btn-add " title="Create New Users">
                        <img src="{{asset('admin/plus.svg')}}" alt="for you">
                    </a>
                    @can('user_edit')
                        <a href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $users->id]) }}" class="btn btn-add " title="Edit Users">
                                <img src="{{asset('admin/pencil.svg')}}" alt="for you">
                        </a>
                    @endcan
                    @can('user_delete')
                        <button type="submit" title="Delete Users" onclick="return confirm(&quot;Click Ok to delete Users.&quot;)" class="btn btn-add ">
                            <img src="{{asset('admin/delete.svg')}}" alt="for you">
                        </button>
                    @endcan
                    {{-- <a href="{{ route('admin.users.edit', [$users->id, app()->getLocale()]) }}" class="btn btn-primary" title="Edit Users">
                         <img src="{{asset('admin/pencil.svg')}}" alt="for you">
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Users" onclick="return confirm(&quot;Click Ok to delete Users.?&quot;)">
                        <img src="{{asset('admin/delete.svg')}}" alt="for you">
                    </button> --}}
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('global.users.fields.name')</dt>
            <dd>{{ $users->name }}</dd>
            <dt>@lang('global.users.fields.email')</dt>
            <dd>{{ $users->email }}</dd>
            <dt>@lang('global.users.fields.phone')</dt>
            <dd>{{ $users->phone }}</dd>
            <dt>@lang('global.users.fields.password')</dt>
            <dd>{{ $users->password }}</dd>
            <dt>@lang('global.users.fields.role')</dt>
            <dd>@foreach ($users->role as $singleRole)
                <span class="label label-info label-many">{{ $singleRole->title }}</span>
            @endforeach</dd>
            <dt>@lang('global.users.fields.course_position')</dt>
            <dd>{{ $users->course_position }}</dd>
            <dt>@lang('global.users.fields.lesson_position')</dt>
            <dd>{{ $users->lesson_position }}</dd>
            <dt>@lang('global.users.fields.verified')</dt>
            <dd>{{ $users->isVerified }}</dd>

        </dl>

    </div>
</div>

@endsection