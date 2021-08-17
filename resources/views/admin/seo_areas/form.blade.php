
<div class="row pr-0 pl-0 m-0">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
        <label>@lang('global.seo_area.fields.name'):</label>
        <input class="input-main" type="text" placeholder="Введите название..." name="title" type="text" id="title" value="{{ old('title', optional($seoArea)->title) }}" minlength="1" maxlength="255">
    </div>
</div>
<div class="section-bottom-side row pr-0 pl-0 m-0 border-none">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
        <label>@lang('global.seo_area.fields.des'):</label>
        <textarea class="textarea-input" cols="5" rows="4" placeholder="К сотрудничесвту" name="des">{{ old('title', optional($seoArea)->des) }}</textarea>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
        <label>@lang('global.seo_area.fields.heading_h1'):</label>
        <input class="input-main" type="text" placeholder="Title..." name="h1_header" value="{{ old('title', optional($seoArea)->h1_header) }}">
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
        <label>@lang('global.seo_area.fields.url'):</label>
        <input class="input-main" type="text" placeholder="Url страницы..." name="url" value="{{ old('title', optional($seoArea)->url) }}">
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
        <label>@lang('global.seo_area.fields.keywords'):</label>
        <input class="input-main" type="text" placeholder="Key-words..." name="keywords" value="{{ old('title', optional($seoArea)->keywords) }}">
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-tiny-wrap">
        <label>@lang('global.seo_area.fields.seo_text')</label>
        <div class="section-tiny-side">
            <div class="section-text-options">
                <div class="section-text-option__item" data-edit-type="bold">
                    <svg class="icon icon-bold-text ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#bold-text')}}"></use>
                    </svg>
                </div>
                <div class="section-text-option__item" data-edit-type="italic">
                    <svg class="icon icon-cursive ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#cursive')}}"></use>
                    </svg>
                </div>
                <div class="section-text-option__item" data-edit-type="underline">
                    <svg class="icon icon-underline-text ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#underline-text')}}"></use>
                    </svg>
                </div>
                <div class="section-text-option__item" data-edit-type="formatblock" data-edit-value="blockquote">
                    <svg class="icon icon-quote ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#quote')}}"></use>
                    </svg>
                </div>
                <div class="section-text-option__item" data-edit-type="insertunorderedlist">
                    <svg class="icon icon-list ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#list')}}"></use>
                    </svg>
                </div>
                <div class="section-text-option__item" data-edit-type="insertorderedlist">
                    <svg class="icon icon-numbers ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#numbers')}}"></use>
                    </svg>
                </div>
                <div class="section-text-option__item" data-edit-type="fontsize-smaller">
                    <svg class="icon icon-font ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#font')}}"></use>
                    </svg>
                </div>
                <div class="section-text-option__item" data-edit-type="fontsize-bigger">
                    <svg class="icon icon-line ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#line')}}"></use>
                    </svg>
                </div>
            </div>
            <div class="textarea-text-option--wrap">
                <div class="textarea-text-option" contenteditable="true" id="seotext">{!! old('seo_text', optional($seoArea)->seo_text) !!}</div>
                <input type="hidden" value="" name="seo_text" id="seo_text">
                {{-- <textarea class="textarea-text-option" contenteditable="true" name="seo_text" style="width: 100%">{!! old('title', optional($seoArea)->seo_text) !!}</textarea> --}}
                {{-- <input type="hidden" name="seo_text" value="{{ old('title', optional($seoArea)->seo_text) }}"> --}}
            </div>
            <input type="hidden" value="{{$request->type}}" name="type">
        </div>
    </div>
</div>

