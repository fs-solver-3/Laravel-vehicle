@extends('layouts.app')
@section('title', 'Статьи в блог')
@section('content')
<section>
<div class="panel panel-default">

    <div class="section-top-side">
        <div class="section-top-block--back">
            <a href="{{ route('admin.news.index', app()->getLocale()) }}">
                <div class="section-top-block--back__item">
                    <svg class="icon icon-arrow-left ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
                    </svg>
                </div>
            </a>
            <div class="section-block--title">{{ isset($news->title) ? $news->title : 'News' }}</div>
        </div>
    </div>
    <div class="section-bottom-side row pr-0 pl-0 m-0">
        <dl class="dl-horizontal">
            <dt>H1:</dt>
            <dd>{{ $news->h1 }}</dd>
            <dt>Url:</dt>
            <dd>{{ $news->url }}</dd>
            <dt>Page Included:</dt>
            <dd>{{ $news->page_included }}</dd>
            <dt>H1 Header:</dt>
            <dd>{{ $news->h1_header }}</dd>
            <dt>Title:</dt>
            <dd>{{ $news->title }}</dd>
            <dt>Url of the page:</dt>
            <dd>{{ $news->page_url }}</dd>
            <dt>Key-words:</dt>
            <dd>{{ $news->keywords }}</dd>
            <dt>Description:</dt>
            <dd>{{ $news->description }}</dd>
            <dt>Date of publication:</dt>
            <dd>{{ $news->date }}</dd>
            <dt>Photo:</dt>
            <dd>
                @if (!is_null($news->image))
                {{substr($news->image, 8)}}
                @else
                No File
                @endif
            </dd>
            <dt>Published by:</dt>
            <dd>{{ $news->publish_author }}</dd>
            <dt>Article author:</dt>
            <dd>{{ $news->author }}</dd>
            <dt>Short description:</dt>
            <dd>{{ $news->short_des }}</dd>
            <dt>SEO text:</dt>
            <dd>{{ $news->seo_text }}</dd>
            <dt>Published by:</dt>
            <dd>{{ $news->publish }}</dd>
        </dl>
    </div>
</div>
</section>
@endsection