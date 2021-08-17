@extends('layouts.app')
@section('title', 'Грузовое Авто')
@section('content')
<section>
<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <a class="back_to_link" href="{{ route('admin.truck.index', app()->getLocale()) }}">
            <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
        </a>

        <span class="pull-left">
            <h4>{{ isset($truck->name) ? $truck->name : 'Truck' }}</h4>
        </span>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('global.truck.title')</dt>
            <dd>{{ $truck->name }}</dd>
            <dt>@lang('global.car.fields.model')</dt>
            <dd>{{ $truck->model }}</dd>
            <dt>@lang('global.car.fields.year')</dt>
            <dd>{{ $truck->year }}</dd>
            <dt>@lang('global.car.fields.color')</dt>
            <dd>{{ $truck->color }}</dd>
            <dt>@lang('global.car.fields.owner')</dt>
            <dd>{{ optional($truck->user)->name }}</dd>
            <dt>@lang('global.car.fields.body_type')</dt>
            <dd>{{ optional($truck->bodyType)->name }}</dd>
            {{-- <dt>Cargo Type</dt>
            <dd>{{ optional($truck->cargoType)->id }}</dd> --}}
            <dt>@lang('global.car.fields.number')</dt>
            <dd>{{ $truck->number }}</dd>
            <dt>@lang('global.truck.fields.cargo_type')</dt>
            <dd>{{ $truck->carcase_type }}</dd>
            <dt>@lang('global.truck.fields.capacity')</dt>
            <dd>{{ $truck->capacity }}</dd>
            <dt>@lang('global.truck.fields.place')</dt>
            <dd>{{ $truck->place }}</dd>
            <dt>@lang('global.truck.fields.max_size')</dt>
            <dd>{{ $truck->max_size }}</dd>

        </dl>

    </div>
</div>
</section>
@endsection