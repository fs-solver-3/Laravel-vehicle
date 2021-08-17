
<div class=" row pr-0 pl-0 m-0">
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-6 section-input-wrap">
        <label>Название:</label>
        <input class="input-main" type="text" placeholder="Введите название..." name="name" type="text" id="name" value="{{ old('name', optional($seoAll)->name) }}" minlength="1" maxlength="255">
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-6 section-input-wrap justify-content-center mb-0">
        <div class="checkbox-input--tab__item">
            <div class="checkbox-input"></div>
            <input class="checkbox-input--tab" type="text" name="indexing" value="1"><span>Индексация</span>
        </div>
    </div>
</div>
<div class="section-bottom-side row pr-0 pl-0 m-0 border-none">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
        <label>Введите область:</label>
         <input class="input-main" name="area1" type="text" id="area1" value="{{ old('area1', optional($seoAll)->area1) }}" minlength="1" placeholder="Enter area1 here...">
        {{-- <div class="section-select--input2 section-select--input__show"><span>Введите область...</span>
            <div class="section-select--popup__icon">
                <svg class="icon icon-arrow-down-white ">
                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white"></use>
                </svg>
            </div>
            <ul class="section-select--popup__list section-select--popup__list__show">
                <li class="section-select--popup__item2 hover-text-color">1</li>
                <li class="section-select--popup__item2 hover-text-color">2</li>
                <li class="section-select--popup__item2 hover-text-color">3</li>
            </ul>
        </div> --}}
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
        <label>Введите район:</label>
        {{-- <div class="section-select--input2 section-select--input__show"><span>Введите район...</span>
            <div class="section-select--popup__icon">
                <svg class="icon icon-arrow-down-white ">
                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white"></use>
                </svg>
            </div>
            <ul class="section-select--popup__list section-select--popup__list__show">
                <li class="section-select--popup__item2 hover-text-color">1</li>
                <li class="section-select--popup__item2 hover-text-color">2</li>
                <li class="section-select--popup__item2 hover-text-color">3</li>
            </ul>
        </div> --}}
        <input class="input-main" name="area2" type="text" id="area1" value="{{ old('area1', optional($seoAll)->area1) }}" minlength="1" placeholder="Enter area1 here...">
    </div>
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
        <label>Введите код ФИАС:</label>
        <input class="input-main" type="text" placeholder="Введите код ФИАС..." name="fias_code" value="{{ old('fias_code', optional($seoAll)->fias_code) }}">
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
        <label>Название населенного пункта:</label>
        <input class="input-main" type="text" placeholder="Введите название населенного пункта..." name="settlement" value="{{ old('settlement', optional($seoAll)->settlement) }}">
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
        <label>Title страницы:</label>
        <input class="input-main" type="text" placeholder="Title страницы..." name="page_title" value="{{ old('page_title', optional($seoAll)->page_title) }}">
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
        <label>Discription:</label>
        <textarea class="textarea-input" cols="5" rows="4" placeholder="К сотрудничесвту" name="des" value="{{ old('des', optional($seoAll)->des) }}"></textarea>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
        <label>Заголовок H1:</label>
        <input class="input-main" type="text" placeholder="Title..." name="h1_header" value="{{ old('h1_header', optional($seoAll)->h1_header) }}">
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
        <label>Url страницы:</label>
        <input class="input-main" type="text" placeholder="Url страницы..." name="url" value="{{ old('url', optional($seoAll)->url) }}">
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
        <label>Key-words:</label>
        <input class="input-main" type="text" placeholder="Key-words..." name="keywords" value="{{ old('keywords', optional($seoAll)->keywords) }}">
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-tiny-wrap">
        <label>SEO текст</label>
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
                <div class="textarea-text-option" contenteditable="true" id="seotext">{!! old('seo_text', optional($seoAll)->seo_text) !!}</div>
                <input type="hidden" value="" name="seo_text" id="seo_text">
                {{-- <textarea class="textarea-text-option" contenteditable="true" name="seo_text" style="width: 100%">{!! old('title', optional($seoAll)->seo_text) !!}</textarea> --}}
                {{-- <textarea class="textarea-input" cols="5" rows="4" placeholder="К сотрудничесвту" name="seo_text"></textarea> --}}
            </div>
        </div>
    </div>
</div>

