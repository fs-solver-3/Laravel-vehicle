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

        <div class="lang @if(app()->getLocale() == 'en')selected @endif " data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'en', 'id' => $demandCategory->id])
                        }}'>
            <div class="flag-select"></div>
            <img src="{{asset('img/flags/en.png')}}" alt="en">
            <span class="lang-txt">@lang('global.en')</span>
        </div>
        <div class="lang @if(app()->getLocale() == 'ru')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $demandCategory->id])}}">
            <div class="flag-select"></div>
            <img src="{{asset('img/flags/ru.png')}}" alt="ru">
            <span class="lang-txt">@lang('global.ru')</span>
        </div>

        <div class="lang @if(app()->getLocale() == 'tj')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'tj', 'id' => $demandCategory->id])}}">
            <div class="flag-select"></div>
            <img src="{{asset('img/flags/tj.png')}}" alt="tj">
            <span class="lang-txt">@lang('global.tj')</span>
        </div>

        <div class="lang @if(app()->getLocale() == 'uz')selected @endif " data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $demandCategory->id])}}">
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
        <div class="pull-left">
            <a href="{{ route('admin.demand_categories.index', app()->getLocale()) }}" class="back_to_link" title="Show All Lessons">
                <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
            </a>
            <span class="pull-left admin-form-title">
                <h4 class="mt-5 mb-5">{{ !empty($demandCategory->name) ? $demandCategory->name : 'demandCategory' }}</h4>
            </span>
        </div>
        {{-- <div class="btn-group btn-group-sm pull-right" role="group">

            <a href="{{ route('admin.demand_categories.create', app()->getLocale()) }}" class="btn btn-add" title="Create New demandCategory">
                <img src="{{asset('admin/plus.svg')}}" alt="for you">
            </a>

        </div> --}}


    </div>

    <div class="panel-body">

        @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form method="POST" action="{{ route('admin.demand_categories.updateRight', ['locale' => app()->getLocale(), 'id' => $demandCategory->id] ) }}" id="edit_demand_category_form" name="edit_demand_category_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            <div class="form-row">

                {{-- <div class="form-group col-md-12 {{ $errors->has('name') ? 'has-error' : '' }}">

                    <label for="name" class="control-label">@lang('global.demand_categories.fields.title')</label>
                    <input class="form-control" name="name" type="text" id="name" value="{{ old('name', optional($demandCategory)->name) }}" minlength="1" maxlength="255" placeholder="Enter name here...">
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div> --}}
                <div class="table-responsive">
                    <table class="table right-table"> 
                        <thead>
                            <th colspan="2">
                                Пользователи:
                            </th>
                            <th>
                                Может видеть сообщения
                                группы
                            </th>
                            <th>
                                Получает уведомления о новых
                                обращениях в группе
                            </th>
                            <th>
                                Получает уведомления о обновлении
                                обращений в группе
                            </th>
                        </thead>
                        @foreach ($demandCategory->supports as $item)
                        <tr>
                            <td>
                                <div class="right-index support-right">{{ $loop->index }}</div>
                            </td>
                            <td>
                                <div class="support-right"> {{ $item->user->name }} </div>
                            </td>
                            <td>
                                <input type="hidden" name="manager_id[]" value="{{ $item->id }}">
                                <div class="form-row">

                                    <div class="form-group">
                                        <input name="see_message[]" type="hidden" value="0" class="hidden">
                                        <input name="see_message[]" id="see-{{ $loop->index }}" type="checkbox" @if($item->see_message) checked @endif value="1">
                                        <label for="see-{{ $loop->index }}" class="control-label"></label>
        
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-row">

                                    <div class="form-group">
                                        <input name="receive_notification[]" type="hidden" value="0" class="hidden">
                                        <input name="receive_notification[]" id="receive_notification-{{ $loop->index }}" type="checkbox" @if($item->receive_notification) checked @endif value="1">
                                        <label for="receive_notification-{{ $loop->index }}" class="control-label"></label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="form-row">

                                    <div class="form-group">
                                        <input name="receive_update_notification[]" type="hidden" value="0" class="hidden">
                                        <input name="receive_update_notification[]" id="receive_update_notification-{{ $loop->index }}" type="checkbox" @if($item->receive_update_notification) checked @endif value="1">
                                        <label for="receive_update_notification-{{ $loop->index }}" class="control-label"></label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>

            </div>

            <div class="form-group">
                <div class="col-md-12">
                    <input class="btn btn-yellow" type="submit" value="@lang('global.app_update')">
                </div>
            </div>
        </form>

    </div>
</div>
<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $("input[type='checkbox']").each(function() {
            if(this.checked) {
                $(this).parent().find('.hidden').attr('disabled', 'disabled');
            }
        });
        $("input[type='checkbox']").change(function() {
            if(this.checked) {
                $(this).parent().find('.hidden').attr('disabled', 'disabled');
                // $('.hidden').attr('disabled', 'disabled');
            }
            else{
                $(this).parent().find('.hidden').attr('disabled', false);
            }
        });
    })
</script>
@endsection