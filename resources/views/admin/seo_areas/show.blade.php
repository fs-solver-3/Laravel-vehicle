@extends('layouts.app')
@section('title', 'SEO')
@section('content')
<section class="section-1">
<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <a class="back_to_link" href="{{ route('admin.seo_area.index', app()->getLocale()) }}">
            <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
        </a>

        <span class="pull-left">
            <h4>{{ isset($seoArea->title) ? $seoArea->title : 'Seo Area' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('admin.seo_area.destroy', ['locale' => app()->getLocale(), 'id' => $seoArea->id]) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">

                   <a href="{{ route('admin.seo_area.create', app()->getLocale()) }}" class="btn btn-add " title="Create New seo_area">
                    <img src="{{asset('admin/plus.svg')}}" alt="for you">
                    </a>
                    <a href="{{ route('admin.seo_area.edit', ['locale' => app()->getLocale(), 'id' => $seoArea->id]) }}" class="btn btn-add "
                        title="Edit seo_area">
                        <img src="{{asset('admin/pencil.svg')}}" alt="for you">
                    </a>
                    <button type="submit" title="Delete seo_area" onclick="return confirm(&quot;Click Ok to delete seo_area.?&quot;)"
                        class="btn btn-add">
                        <img src="{{asset('admin/delete.svg')}}" alt="for you">
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>@lang('global.seo_area.fields.name'):</dt>
            <dd>{{ $seoArea->title }}</dd>
            <dt>@lang('global.seo_area.fields.des'):</dt>
            <dd>{{ $seoArea->des }}</dd>
            <dt>@lang('global.seo_area.fields.heading_h1'):</dt>
            <dd>{{ $seoArea->h1_header }}</dd>
            <dt>@lang('global.seo_area.fields.url'):</dt>
            <dd>{{ $seoArea->url }}</dd>
            <dt>@lang('global.seo_area.fields.keywords'):</dt>
            <dd>{{ $seoArea->keywords }}</dd>
            <dt>@lang('global.seo_area.fields.seo_text'):</dt>
            <dd>{{ $seoArea->seo_text }}</dd>
            <dt>@lang('global.seo_area.fields.type'):</dt>
            <dd>{{ $seoArea->type }}</dd>

        </dl>

    </div>
</div>
</section>
@endsection