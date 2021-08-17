@extends('layouts.app')
@section('title', 'жаловаться')
@section('admin_lang')
@include('includes.admin_flag')
@endsection

@section('content')
<section class="section-1">
    @if(Session::has('success_message'))
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
        <div class="section-content--main table-content">
            @include('admin.complains.table_all')
        </div>
    </div>
</section>
<!-- .section-content-main--table-->
<section class="section3 section-content-main-mobile--table">
    <div class="section-content--main-mobile__wrap">
        <div class="section-content--main box-bg2 pb-20px table-content-mobile">
            {{-- @include('admin.complains.table_mobile_all') --}}
        </div>
    </div>
</section>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')

@endsection