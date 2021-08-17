@extends('layouts.app')
@section('title', 'Инфо страницы')
@section('content')
<section class="section-1">
    <div class="section-content--main__wrap box-bg2 pb-0">
        <div class="section-content--main">
            <form method="POST" action="{{ route('admin.pages.store', app()->getLocale()) }}" accept-charset="UTF-8" id="create_pages_form" enctype="multipart/form-data"
                name="create_pages_form" class="form-horizontal" onsubmit="return validateForm()">
                {{ csrf_field() }}
                <div class="section-top-side">
                    <div class="section-top-block--back">
						<a href="{{ route('admin.pages.index', app()->getLocale()) }}">
                            <div class="section-top-block--back__item">
                                <svg class="icon icon-arrow-left ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
                                </svg>
                            </div>
						</a>
                        <div class="section-block--title">@lang('global.create_new') @lang('global.page.title')</div>
                    </div>
                </div>
                <div class="section-bottom-side row pr-0 pl-0 m-0">
                    @include ('admin.pages.form', [
                    'pages' => null,
                    ])
                </div>
                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_create')</button>
						<a href="{{ route('admin.pages.index', app()->getLocale()) }}">
                            <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
						</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</section>
@endsection
@section('add_custom_script')
<script>
    function validateForm() {
        var seotext = $('#seotext').html();
        $('#seo_text').val(seotext);
    }
</script>
<script>
    $(document).ready(function() {
        $('#page_logo').change(function() {
            var filename = $('#page_logo').val().replace(/C:\\fakepath\\/i, '');
            $('#filename').html(filename);
        });
    })
</script>
@endsection