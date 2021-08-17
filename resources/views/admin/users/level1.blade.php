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
            
                <div class="lang @if(app()->getLocale() == 'en')selected @endif " data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'en', 'id' => $id])
                        }}'>
                    <div class="flag-select"></div>
                    <img src="{{asset('img/flags/en.png')}}" alt="en">
                    <span class="lang-txt">@lang('global.en')</span> 
                </div>
                <div class="lang @if(app()->getLocale() == 'ru')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $id])}}">
                    <div class="flag-select"></div>
                    <img src="{{asset('img/flags/ru.png')}}" alt="ru">
                    <span class="lang-txt">@lang('global.ru')</span> 
                </div>

                <div class="lang @if(app()->getLocale() == 'tj')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'tj', 'id' => $id])}}">
                    <div class="flag-select"></div>
                    <img src="{{asset('img/flags/tj.png')}}" alt="tj">
                    <span class="lang-txt">@lang('global.tj')</span> 
                </div>

                <div class="lang @if(app()->getLocale() == 'uz')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $id])}}">
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
            <h4>Level 1</h4>
        </span>

    </div>
    <div class="panel-body panel-body-with-table">
        <div class="table-responsive" id="original_table">
            <table class="table datatable dataTable">
                <thead>
                <tr>
                    <th>@lang('global.users.fields.name')</th>
                    <th>@lang('global.users.fields.status')</th>
                    <th>@lang('global.users.fields.people_count')</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($levelOneUsers as $user)
                    <tr>
                        <td>
                            <a href="{{ route('admin.users.level1', ['locale' => app()->getLocale(), 'id' => $user
                            ->id]) }}" class="btn btn-info" title="Show Users">
                                    {{ $user->name }}
                            </a>
                        </td>
                        <td>@lang('global.users.fields.curator_count')Curator, passed all courses</td>
                        <td>{{ array_sum($levelTotal[$user->id]) }}</td>
                    </tr>   
                @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

@endsection