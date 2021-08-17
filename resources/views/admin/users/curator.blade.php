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
            <h4>Level Structure</h4>
        </span>

    </div>
    <div class="panel-body panel-body-with-table">
        <table class="table datatable dataTable">
            <thead>
            <tr>
                <th>Level</th>
                <th>Counts</th>
                <th>State</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($levelCounts as $key => $value)
                    <tr>
                        <td>Level-{{$key + 1}}</td>
                        <td>{{ $value }}</td>
                        <td>State-{{ $key + 1 }}</td>
                    </tr>   
                @endforeach
                    {{-- <tr>
                        <td></td>
                        <td>Total</td>
                        <td> {{array_sum($levelCounts)}} </td>
                    </tr> --}}
            </tbody>
        </table>
        </div>
    </div>

@endsection