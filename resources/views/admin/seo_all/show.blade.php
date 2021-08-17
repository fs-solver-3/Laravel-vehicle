@extends('layouts.app')
@section('title', 'Список городов')
@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item"
        data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $seoAll->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item"
        data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' => $seoAll->id])}}">
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

            <a class="back_to_link" href="{{ route('admin.seo_all.index', app()->getLocale()) }}">
                <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
            </a>

            <span class="pull-left">
                <h4>{{ isset($seoAll->name) ? $seoAll->name : 'Seo All' }}</h4>
            </span>

            <div class="pull-right">

                <form method="POST" action="{!! route('admin.seo_all.destroy', ['locale' => app()->getLocale(), 'id' => $seoAll->id]) !!}" accept-charset="UTF-8">
                <input name="_method" value="DELETE" type="hidden">
                {{ csrf_field() }}
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('admin.seo_all.create', app()->getLocale()) }}" class="btn btn-add " title="Create New seo_all">
                            <img src="{{asset('admin/plus.svg')}}" alt="for you">
                        </a>
                        <a href="{{ route('admin.seo_all.edit', ['locale' => app()->getLocale(), 'id' => $seoAll->id]) }}" class="btn btn-add "
                            title="Edit seo_all">
                            <img src="{{asset('admin/pencil.svg')}}" alt="for you">
                        </a>
                        <button type="submit" title="Delete seo_all" onclick="return confirm(&quot;Click Ok to delete seo_all.?&quot;)"
                            class="btn btn-add">
                            <img src="{{asset('admin/delete.svg')}}" alt="for you">
                        </button>
                    </div>
                </form>

            </div>

        </div>

        <div class="panel-body">
            <dl class="dl-horizontal">
                <dt>Name</dt>
                <dd>{{ $seoAll->name }}</dd>
                <dt>Indexing</dt>
                <dd>{{ $seoAll->indexing }}</dd>
                <dt>Area1</dt>
                <dd>{{ $seoAll->area1 }}</dd>
                <dt>Area2</dt>
                <dd>{{ $seoAll->area2 }}</dd>
                <dt>Fias Code</dt>
                <dd>{{ $seoAll->fias_code }}</dd>
                <dt>Settlement</dt>
                <dd>{{ $seoAll->settlement }}</dd>
                <dt>Page Title</dt>
                <dd>{{ $seoAll->page_title }}</dd>
                <dt>Des</dt>
                <dd>{{ $seoAll->des }}</dd>
                <dt>H1 Header</dt>
                <dd>{{ $seoAll->h1_header }}</dd>
                <dt>Url</dt>
                <dd>{{ $seoAll->url }}</dd>
                <dt>Keywords</dt>
                <dd>{{ $seoAll->keywords }}</dd>
                <dt>Seo Text</dt>
                <dd>{{ $seoAll->seo_text }}</dd>

            </dl>

        </div>
    </div>
</section>
@endsection