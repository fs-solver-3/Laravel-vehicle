@extends('layouts.app')
@section('title', 'Инфо страницы')
@section('content')
<section class="section-1">
    <div class="section-content--main__wrap box-bg2 pb-0">
        <div class="section-content--main">
            <form method="POST" action="{{ route('admin.pages.update', ['locale' => app()->getLocale(), 'id' => $pages->id]) }}" id="edit_pages_form" enctype="multipart/form-data"
                name="edit_pages_form" accept-charset="UTF-8" class="form-horizontal" onsubmit="return validateForm()">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PUT">
                <div class="section-top-side">
                    <div class="section-top-block--back">
						<a href="{{ route('admin.pages.index', app()->getLocale()) }}">
                            <div class="section-top-block--back__item">
                                <svg class="icon icon-arrow-left ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-left')}}"></use>
                                </svg>
                            </div>
						</a>
                        <div class="section-block--title">{{ !empty($pages->name) ? $pages->name : 'Pages' }}</div>
                    </div>
                </div>
                <div class="section-bottom-side row pr-0 pl-0 m-0">
                    @include ('admin.pages.form', [
                    'pages' => $pages,
                    ])
                </div>
                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_update')</button>
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
    $(document).ready(function () {
        $('.section-delete__img').click(function () {
            // $('#user-photo').remove();
            $('#delete_image').val('delete');
            $('#user-photo').prop("value", "");
            $('.section-user--dropdown__img--zone').removeAttr('style');
        });
    })
</script>
@endsection