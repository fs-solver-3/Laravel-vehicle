@extends('layouts.app')

@section('content')
<section>
<div class="panel panel-default">

    <div class="section-top-side">
        <div class="section-top-block--back">
            <a href="{{ route('admin.pages.index', app()->getLocale()) }}">
                <div class="section-top-block--back__item">
                    <svg class="icon icon-arrow-left ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
                    </svg>
                </div>
            </a>
            <div class="section-block--title">{{ isset($pages->title) ? $pages->title : 'Pages' }}</div>
        </div>
    </div>
    <div class="section-bottom-side row pr-0 pl-0 m-0">
        <dl class="dl-horizontal">
            <dt>@lang('global.page.fields.title'):</dt>
            <dd>{{ $pages->title }}</dd>
            <dt>@lang('global.page.fields.des'):</dt>
            <dd>{{ $pages->des }}</dd>
            <dt>@lang('global.page.fields.heading_h1'):</dt>
            <dd>{{ $pages->h1_header }}</dd>
            <dt>@lang('global.page.fields.title'):</dt>
            <dd>{{ $pages->page_title }}</dd>
            <dt>@lang('global.page.fields.page_logo'):</dt>
            <dd>
                @if (!is_null($pages->page_logo))
                {{substr(substr($pages->page_logo, 0, -20), 19)}}.pdf
                @else
                No File
                @endif
            </dd>
            <dt>@lang('global.page.fields.url'):</dt>
            <dd>{{ $pages->url }}</dd>
            <dt>@lang('global.page.fields.keywords'):</dt>
            <dd>{{ $pages->keywords }}</dd>
            <dt>@lang('global.page.fields.seo_text'):</dt>
            <dd>{!! $pages->seo_text !!}</dd>
            <dt>@lang('global.page.fields.published'):</dt>
            <dd>{{ $pages->publish }}</dd>
        </dl>
    </div>
</div>
</section>
@endsection