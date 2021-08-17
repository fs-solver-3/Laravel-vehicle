@if(Route::currentRouteName()=='admin.pages.edit' )
<div class="section-user--dropdown__img" style="margin-left: 20px">
    <label>@lang('global.page.fields.page_logo')</label>
    <div class="section-user--dropdown-and-more">
        <div class="section-user--dropdown__img--wrap">
            @if($pages->page_logo)
            <div class="section-user--dropdown__img--zone"
                style="background-image: url('{{asset("$pages->page_logo") }}');"></div>
            @else
            <div class="section-user--dropdown__img--zone"></div>
            @endif
            <input class="dropdown-img" id="user-photo" name="page_logo" type="file">
            <div class="section-user--dropdown__img--info">(Drag&Drop) <span>Перетащите
                    файл</span>
            </div>
        </div>
        <div class="section-user--more gogocar-arrow-button">
            <svg class="icon icon-dots ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}">
                </use>
            </svg>
            <div class="section-user--more--popup">
                <label class="section-user--more--popup__item" for="user-photo">
                    <svg class="icon icon-download ">
                        <use
                            xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#download')}}">
                        </use>
                    </svg><span>Загрузить</span>
                </label>
                <div class="section-user--more--popup__item section-delete__img">
                    <svg class="icon icon-delete-red ">
                        <use
                            xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
                        </use>
                    </svg><span>Удалить</span>
                </div>
            </div>
        </div>
        <div class="section-users-dropdown--mobile-buttons">
            <label class="section-users-dropdown--mobile__load" for="user-photo">
                <svg class="icon icon-download ">
                    <use
                        xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#download')}}">
                    </use>
                </svg><span>Загрузить</span>
            </label>
            <div class="section-users-dropdown--mobile__delete section-delete__img">
                <svg class="icon icon-delete-red ">
                    <use
                        xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
                    </use>
                </svg><span>Удалить</span>
            </div>
        </div>
    </div>
    <input type="hidden" class="dropdown-img" id="delete_image" name="delete_image" value="">
</div>
@endif
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
    <label>@lang('global.page.fields.menu_item'):</label>
    <input class="input-main" type="text" name="title" id="title" value="{{ old('title', optional($pages)->title) }}" placeholder="О компании">

</div>
@if(Route::currentRouteName()=='admin.pages.create' )
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap section-load-logo">
    <div class="section-file-info-add">
        <svg class="icon icon-skrepka ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#skrepka')}}"></use>
        </svg><span id="filename">@lang('global.page.fields.page_logo')</span>
        <input class="section-file-info-add__input" type="file" id="page_logo" name="page_logo">
    </div>
</div>
@endif
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
    <label>@lang('global.page.fields.heading_h1'):</label>
    <input class="input-main" name="h1_header" type="text" id="h1_header" placeholder="Title..." value="{{ old('h1_header', optional($pages)->h1_header) }}">
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
    <label>@lang('global.page.fields.title'):</label>
    <input class="input-main" name="page_title" id="page_title" type="text" placeholder="Title..." value="{{ old('page_title', optional($pages)->page_title) }}">
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
    <label>@lang('global.page.fields.url'):</label>
    <input class="input-main" name="url" id="url" type="text" placeholder="Url страницы..." value="{{ old('url', optional($pages)->url) }}">
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
    <label>@lang('global.page.fields.keywords'):</label>
    <input class="input-main" name="keywords" id="keywords" type="text" placeholder="Key-words..." value="{{ old('keywords', optional($pages)->keywords) }}">
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
    <label>@lang('global.page.fields.des'):</label>
    <textarea class="textarea-input" name="des" id="des" cols="5" rows="4" placeholder="К сотрудничесвту">{{ old('des', optional($pages)->des) }}</textarea>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-tiny-wrap">
    <label>@lang('global.page.fields.seo_text')</label>
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
            <div class="textarea-text-option" contenteditable="true" id="seotext">{!! old('seo_text', optional($pages)->seo_text) !!}</div>
            <input type="hidden" value="" name="seo_text" id="seo_text">
        </div>
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
    <div class="checkbox-input--tab__item">
        <div class="checkbox-input @if(old('publish', optional($pages)->publish) == true) {{ 'checked' }} @endif"></div>
        <input class="checkbox-input--tab" type="checkbox" name="publish" id="published" @if(old('publish', optional($pages)->publish) == true) {{ 'checked' }} @endif><span>@lang('global.page.fields.published')</span>
    </div>
</div>
