@extends('layouts.app')
@section('title', 'Грузовое Авто')
@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'en', 'id' => $truck->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'en', 'id' => $truck->id])}}">
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
                <a href="{{ route('admin.truck.index', app()->getLocale()) }}" class="back_to_link" title="Show All Trucks">
                    <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                </a>
                <span class="pull-left admin-form-title">
                    <h4 >{{ !empty($truck->name) ? $truck->name : 'Truck' }}</h4>
                </span>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('admin.truck.create', app()->getLocale()) }}" class="btn btn-add" title="Create New Truck">
                    <img src="{{asset('admin/plus.svg')}}" alt="for you">
                </a>

            </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.truck.update', ['locale' => app()->getLocale(), 'id' => $truck->id]) }}" id="edit_truck_form" name="edit_truck_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.trucks.form', [
                                        'truck' => $truck,
                                      ])

                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_update')</button>
                        <a href="{{ route('admin.truck.index', app()->getLocale()) }}">
                            <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
</section>
@endsection