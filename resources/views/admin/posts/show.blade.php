@extends('layouts.app')
@section('title', 'Новости')
@section('content')
<section>
<div class="panel panel-default">

    <div class="section-top-side">
        <div class="section-top-block--back">
            <a href="{{ route('admin.posts.index', app()->getLocale()) }}">
                <div class="section-top-block--back__item">
                    <svg class="icon icon-arrow-left ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
                    </svg>
                </div>
            </a>
            <div class="section-block--title">{{ isset($posts->name) ? $posts->name : 'Pages' }}</div>
        </div>
    </div>
    <div class="section-bottom-side row pr-0 pl-0 m-0">
        <dl class="dl-horizontal">
            <dt>@lang('global.post.fields.name')</dt>
            <dd>{{ $posts->name }}</dd>
            <dt>@lang('global.post.fields.h1_header')</dt>
            <dd>{{ $posts->h1_header }}</dd>
            <dt>@lang('global.post.fields.url')</dt>
            <dd>{{ $posts->url }}</dd>
            <dt>@lang('global.post.fields.keywords')</dt>
            <dd>{{ $posts->keywords }}</dd>
            <dt>@lang('global.post.fields.seo_text')</dt>
            <dd>{{ $posts->seo_text }}</dd>
            <dt>@lang('global.post.fields.des')</dt>
            <dd>{{ $posts->short_des }}</dd>
            <dt>@lang('global.post.fields.published')</dt>
            <dd>{{ $posts->publish }}</dd>

        </dl>
    </div>
</div>
</section>
@endsection