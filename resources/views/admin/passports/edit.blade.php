@extends('layouts.app')
@section('title', 'Паспорт')
@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $passport->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $passport->id])}}">
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-uz.png') }}');">
        </div>
        <div class="choise-lang--item__text">UZ</div>
    </li>
</ul>
@endsection
@section('content')
<section class="section-1">
    @if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif
    <div class="section-content--main__wrap box-bg2 pb-0">
        <div class="section-content--main">
            <div class="section-top-side">
                <div class="section-top-block--back">
                    <a href="{{ route('admin.passport.index', app()->getLocale()) }}">
                        <div class="section-top-block--back__item">
                            <svg class="icon icon-arrow-left ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-left')}}"></use>
                            </svg>
                        </div>
                    </a>
                    <div class="section-block--title">@lang('global.passport.fields.edit')</div>
                </div>
            </div>
            <form class="section-support-form" method="POST" action="{{ route('admin.passport.store_passport', app()->getLocale()) }}" accept-charset="UTF-8" id="create_passport_form" name="create_passport_form">
                {{ csrf_field() }}
                <div class="section-bottom-side">
                    <div class="section-users-tab--content">
                        <div class="section-inputs--wrapper row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
                                <label>@lang('global.users.fields.name'):</label>
                                <input class="input-main" type="text" placeholder="Введите имя" value="{{$users->name}}">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
                                <label>@lang('global.users.fields.surname'):</label>
                                <input class="input-main" type="text" placeholder="Введите фамилию" value="{{$users->surname}}">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
                                <label>@lang('global.users.fields.middlename'):</label>
                                <input class="input-main" type="text" placeholder="Введите отчество">
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 section-input-wrap">
                                <label>@lang('global.passport.fields.series'):</label>
                                <input type="hidden" name="passport_id" value="{{$passport->id}}">
                                <input class="input-main mask-seria" type="text" name="passport_series" placeholder="__ __" value="{{$passport->series}}">
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('global.passport.fields.number'):</label>
                                <input class="input-main mask-number" type="text" name="passport_room" placeholder="__ __ __ __" value="{{$passport->room}}">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
                                <label>@lang('global.passport.fields.department_code'):</label>
                                <input class="input-main mask-code" type="text" name="passport_department_code" placeholder="___-___" value="{{$passport->department_code}}">
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-input-wrap">
                                <label>@lang('global.passport.fields.issued_by'):</label>
                                <input class="input-main" type="text" name="passport_issued_by" placeholder="" value="{{$passport->issued_by}}">
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
                                <label>@lang('global.passport.fields.issue_date'):</label>
                                <input class="input-main calendar-passport calendar-zone-height text-left" type="text" name="passport_issued_date" value="{{$passport->issued_date}}">
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
                                <label>@lang('global.passport.fields.address'):</label>
                                <input class="input-main" type="text" name="passport_place_residence" placeholder="" value="{{$passport->place_residence}}">
                            </div>
                            <div class="section-checkbox-files">
                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-input-wrap section-user-flex row">
                                    <div class="section-user-flex--item">
                                        @if (!is_null($passport->pdf1))
                                        <a class="section-user-files" href="/{{$passport->pdf1}}" target="_blank" download="">
                                            <svg class="icon icon-pdf ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#pdf')}}"></use>
                                            </svg><span>
                                                {{substr(substr($passport->pdf1, 0, -20), 13)}}.{{$passport->pdf1_extension}}
                                            </span>
                                        </a>
                                        @endif
                                    </div>
                                    <div class="section-user-flex--item">
                                        @if (!is_null($passport->pdf2))
                                        <a class="section-user-files" href="/{{$passport->pdf2}}" target="_blank" download="">
                                            <svg class="icon icon-pdf ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#pdf')}}"></use>
                                            </svg><span>
                                                {{substr(substr($passport->pdf2, 0, -20), 13)}}.{{$passport->pdf2_extension}}
                                            </span>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                @if (!is_null($passport->pdf1) || !is_null($passport->pdf2))
                                <div class="col-xl-4 col-lg-4 col-md-2 col-sm-6 section-input-wrap justify-content-center mb-0">
                                    <div class="checkbox-input--tab__item">
                                        <div class="checkbox-input @if($passport->verified == true) {{ 'checked' }} @endif"></div>
                                        <input class="checkbox-input--tab" type="checkbox" name="passport_verified" @if($passport->verified == true) {{ 'checked' }} @endif><span>Проверен</span>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_update')</button>
                        <a href="{{ route('admin.passport.index', app()->getLocale()) }}">
                            <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection