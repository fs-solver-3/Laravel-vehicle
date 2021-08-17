@extends('layouts.app')
@section('title', 'Отзывы')
@section('admin_lang')
    @include('includes.admin_flag')
@endsection
@section('content')
    <section class="section-1">
        @if (Session::has('success_message'))
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok"></span>
                {!! session('success_message') !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        @endif
    </section>
    <section class="section-2 section-content-main--table">
        <div class="section-content--main__wrap box-bg2">
            <div class="section-content--main">
                <div class="section-top-side">
                    <div class="section-block-title-question">
                        <div class="section-block--title">@lang('global.review.fields.info')</div>
                    </div>
                </div>
                <div class="table-content">
                    @include('admin.info.table_template')
                </div>
            </div>
        </div>
    </section>
    <!-- .section-content-main--table-->
    <section class="section3 section-content-main-mobile--table">
        <div class="section-content--main-mobile__wrap">
            <div class="section-content--main box-bg2 pb-20px">
                <div class="section-top-side box-bg-mobile2">
                    <div class="section-block--title">@lang('global.review.fields.info')</div>
                </div>
                <div class="table-content-mobile">
                    @include('admin.info.table_template_mobile')
                </div>
            </div>
        </div>
    </section>
    <script>
        window.route_mass_crud_entries_destroy = '{{ route('admin.info.mass_destroy', app()->getLocale()) }}';
    </script>
    @include('includes.admin_column_modal')
    @include('includes.admin_setting_modal')
@endsection
