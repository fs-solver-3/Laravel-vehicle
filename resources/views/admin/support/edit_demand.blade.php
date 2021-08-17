@extends('layouts.app')
@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $demand->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $demand->id])}}">
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
                <a href="{{ route('admin.support.appeal', app()->getLocale()) }}" class="back_to_link" title="Show All transactions">
                    <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                </a>
                <span class="pull-left admin-form-title">
                    <h4 >@lang('global.support.demand.edit_title')</h4>
                </span>
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

            <form method="POST" action="{{ route('admin.demand.update', ['locale' => app()->getLocale(), 'id' => $demand->id]) }}" id="edit_transactions_form" name="edit_transactions_form" accept-charset="UTF-8" class="form-horizontal">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <div class="form-row">
                    <div class="form-group  col-md-6 {{ $errors->has('title') ? 'has-error' : '' }}">
                        <label for="state" class="control-label">@lang('global.support.demand.state')</label>
                        <select class="form-control chosen-select select2" id="state" name="state" placeholder="Учителя...">
                            @foreach ($demandStatuses as $key => $item)
                            <option value="{{ $key }}" {{ $demand->demand_status_id == $key ? 'selected' : ''}}>
                                {{ $item }}
                            </option>
                            @endforeach
                        </select>
                        {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                    </div>

                    <div class="form-group  col-md-6 {{ $errors->has('date') ? 'has-error' : '' }}" id="data_2">
                        <label for="complexity" class="control-label">@lang('global.support.demand.level_difficulty')</label>
                        <select class="form-control chosen-select select2" id="complexity" name="complexity" placeholder="Учителя...">
                            @foreach ($demandComplexities as $key => $item)
                            <option value="{{ $key }}" {{ $demand->demand_complexity_id == $key ? 'selected' : ''}}>
                                {{ $item }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group  col-md-6 {{ $errors->has('description') ? 'has-error' : '' }}">
                        <label for="manager" class="control-label">@lang('global.support.demand.responsible')</label>
                        <select class="form-control chosen-select select2" id="manager" name="manager" multiple placeholder="Учителя...">
                            @foreach ($managers as $key => $manager)
                            <option value="{{ $key }}" {{ $demand->support_id == $key ? 'selected' : ''}}>
                                {{ $manager }}
                            </option>
                            @endforeach
                        </select>
                        {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6 {{ $errors->has('user_id') ? 'has-error' : '' }}">
                        <label for="criticality" class="control-label">@lang('global.support.demand.criticality')</label>
                        <select class="form-control chosen-select select2" id="criticality" name="criticality" placeholder="Учителя...">
                            @foreach ($demandCriticalities as $key => $item)
                            <option value="{{ $key }}" {{ $demand->demand_criticality_id == $key ? 'selected' : ''}}>
                                {{ $item }}
                            </option>
                            @endforeach
                        </select>
                        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                    </div>
                    <div class="form-group col-md-12 {{ $errors->has('user_id') ? 'has-error' : '' }}">
                        <label for="support_level" class="control-label">@lang('global.support.demand.support_level')</label>
                        <select class="form-control chosen-select select2" id="support_level" name="support_level" placeholder="Учителя...">
                            @foreach ($supportLevelsObjects as $key => $item)
                                <option value="{{ $key }}" {{ $demand->demand_level_id == $key ? 'selected' : ''}}>
                                    {{ $item }}
                                </option>
                            @endforeach
                        </select>
                        {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3 filter-checkbox-form {{ $errors->has('publish') ? 'has-error' : '' }}">
                        <input name="archive" type="hidden" value="0">
                        <input name="archive" id="archive" type="checkbox" value="1" @if ($demand->archive ) checked @endif>
                        <label for="archive" class="control-label">@lang('global.support.category.close_appeal')</label>
                        @if($errors->has('publish'))
                        <p class="help-block">
                            {{ $errors->first('publish') }}
                        </p>
                        @endif
    
                    </div>
                </div>
                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_update')</button>
                        <a href="{{ route('admin.support.appeal', app()->getLocale()) }}">
                            <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                        </a>
                    </div>
                </div>
                {{-- <div class="form-group ">
                    <div class="col-md-12 form-actions">
                        <input class="btn btn-yellow" type="submit" value="@lang('global.app_update')">
                    </div>
                </div> --}}
            </form>

        </div>
    </div>
</section>
@endsection
@section('add_custom_script')
{{-- <script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script> --}}
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
</script>
@endsection