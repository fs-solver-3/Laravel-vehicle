@inject('request', 'Illuminate\Http\Request')
@section('title', 'SEO')
@extends('layouts.app')
@section('admin_lang')
@include('includes.admin_flag')
@endsection
@section('content')
<section class="section-1">
    <div class="panel panel-default">

        <div class="section-top-side panel-heading">
            <div class="section-top-block--back">
                <a href="{{ route('admin.seo_area.index', ['locale' => app()->getLocale(), 'type' => $request->type]) }}"  title="Show All Lessons">
                    {{-- <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you"> --}}
                    <div class="section-top-block--back__item">
                        <svg class="icon icon-arrow-left ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
                        </svg>
                    </div>
                    
                </a>
                <div class="section-block--title">
                    @switch($request->type)
                        @case('betweencity')
                            @lang('global.common.fields.betweencity')
                            @break
                        @case('city')
                            @lang('global.common.fields.general_meta')
                            @break
                        @case('card')
                            @lang('global.common.fields.betweencity')
                            @break
                        @case('auto')
                            @lang('global.common.fields.auto')
                            @break
                        @case('destination')
                            @lang('global.common.fields.destination')
                            @break
                        @default
                            
                    @endswitch
                </div>
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

            <form method="POST" action="{{ route('admin.seo_area.store', app()->getLocale()) }}" accept-charset="UTF-8" id="create_posts_form" name="create_posts_form" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include ('admin.seo_areas.form', [
                'seoArea' => null,
                ])

                 <div class="section-footer-side">
                     <div class="section-buttons--wrap">
                         <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_create')</button>
                         <a href="{{ route('admin.seo_area.index', ['locale' => app()->getLocale(), 'type' => $request->type]) }}">
                             <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                         </a>
                     </div>
                 </div>

            </form>

        </div>
    </div>
</section>
@endsection


