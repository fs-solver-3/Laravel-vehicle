@extends('layouts.app')
@section('title', 'Модель автомобиля')
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
            @include('admin.car_models.table_template')
        </div>
    </div>
</section>
<!-- .section-content-main--table-->
<section class="section3 section-content-main-mobile--table">
    <div class="section-content--main-mobile__wrap">
        <div class="section-content--main box-bg2 pb-20px table-content-mobile">
            @include('admin.car_models.table_template_mobile')
        </div>
    </div>
</section>
<script>
    window.route_mass_crud_entries_destroy = '{{ route('admin.car.mass_destroy', app()->getLocale()) }}';
</script>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')

@endsection