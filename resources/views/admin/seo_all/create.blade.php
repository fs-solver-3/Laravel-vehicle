@extends('layouts.app')
@section('title', 'Список городов')
@section('admin_lang')
@include('includes.admin_flag')
@endsection
@section('content')
<section class="section-1">
    <div class="panel panel-default">

        <div class="section-top-side">
            <div class="section-top-block--back">
                <a href="{{ route('admin.seo_all.index', app()->getLocale()) }}" title="Show All Seo">
                <div class="section-top-block--back__item">
                    <svg class="icon icon-arrow-left ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
                    </svg>
                </div>
                </a>
                <div class="section-block--title">Добавить</div>
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

            <form method="POST" action="{{ route('admin.seo_all.store', app()->getLocale()) }}" accept-charset="UTF-8" id="create_posts_form" name="create_posts_form" class="form-horizontal" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include ('admin.seo_all.form', [
                'seoAll' => null,
                ])

                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">Сохранить</button>
                         <a href="{{ route('admin.seo_all.index', app()->getLocale()) }}" title="Show All Seo">
                            <div class="section-button--gray w-100px">Отменить</div>
                         </a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</section>
@endsection



