@extends('layouts.app')
@section('title', 'Категории')
@section('add_css')
<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('admin_lang')
@include('includes.admin_flag')
@endsection
@section('content')
    <section class="section-1">
        <div class="panel panel-default">

            <div class="section-top-side">
                <div class="section-block--title">@lang('global.demand_categories.create')</div>
            </div>

            <div class="panel-body">
            
                @if ($errors->any())
                    <ul class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif

                <form method="POST" action="{{ route('admin.demand_categories.store', app()->getLocale()) }}" accept-charset="UTF-8" id="create_demand_category_form" name="create_demand_category_form" class="form-horizontal">
                {{ csrf_field() }}
                @include ('admin.demand_categories.form', [
                                            'demandCategory' => null,
                                        ])

                    {{-- <div class="form-group">
                        <div class="col-md-12 form-actions">
                            <input class="btn btn-yellow" type="submit" value="@lang('global.app_create')">
                        </div>
                    </div> --}}

                    <div class="section-footer-side">
                        <div class="section-buttons--wrap">
                            <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_create')</button>
                            <a href="{{ route('admin.demand_categories.index', app()->getLocale()) }}">
                                <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                            </a>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </section>
@endsection


