<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
    <label>@lang('global.post.fields.name'):</label>
    <input class="input-main" name="h1_header" id="h1_header" type="text" value="{{ old('h1_header', optional($posts)->h1_header) }}" placeholder="Title..." required>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
    <label>@lang('global.post.fields.title'):</label>
    <input class="input-main" type="text" name="name" id="name" value="{{ old('name', optional($posts)->name) }}" placeholder="Title..." required>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
    <label>@lang('global.post.fields.url'):</label>
    <input class="input-main" type="text" name="url" id="url" value="{{ old('url', optional($posts)->url) }}" placeholder="Url страницы..." required>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
    <label>@lang('global.post.fields.keywords'):</label>
    <input class="input-main" type="text" name="keywords" id="keywords" value="{{ old('keywords', optional($posts)->keywords) }}" placeholder="Key-words...">
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 section-input-wrap">
    <label>@lang('global.post.fields.des'):</label>
    <textarea class="textarea-input" name="short_des" id="short_des" cols="5" rows="4" placeholder="К сотрудничесвту">{{ old('short_des', optional($posts)->short_des) }}</textarea>
</div>
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 section-input-wrap2 d-flex">
    @if(Route::currentRouteName() == 'admin.posts.edit')
        @if(empty($posts->image))
            <img src="{{asset($posts->image)}}" class="uploaded_image" style="max-width: 50px; display: none;">
        @else    
            <img src="{{asset($posts->image)}}" class="uploaded_image" style="max-width: 50px;">
        @endif
    @else
        <img src="#" class="uploaded_image" style="max-width: 50px; display: none;">
    @endif
    <div class="section-file-info-add2">
        <svg class="icon icon-skrepka2 ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#skrepka')}}"></use>
        </svg><span id="filename_image">@lang('global.news.fields.image')</span>
        <input class="section-file-info-add__input2" type="file" name="image" id="image">
    </div>
    <input type="hidden" name="delete_image" id="delete_image">
    @if(Route::currentRouteName() == 'admin.posts.edit')
        <div class="section-file-info-add2 delete-img-btn remove_avatar" style="margin-left: 10px;">
            <span class="">@lang('global.delete_image')</span>
        </div>
    @endif
</div>

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-tiny-wrap">
    <label>@lang('global.post.fields.seo_text')</label>
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
                    <use xlink:href="static/img/svg/symbol/sprite_admin.svg#font"></use>
                </svg>
            </div>
            <div class="section-text-option__item" data-edit-type="fontsize-bigger">
                <svg class="icon icon-line ">
                    <use xlink:href="static/img/svg/symbol/sprite_admin.svg#line"></use>
                </svg>
            </div>
        </div>
        <div class="textarea-text-option--wrap">
            <input type="hidden" name="seo_text" id="seo_text">
            <div class="textarea-text-option" contenteditable="true" id="seotext">{!! old('seo_text', optional($posts)->seo_text) !!}</div>
        </div>
    </div>
</div>
<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
    <div class="checkbox-input--tab__item">
        <div class="checkbox-input @if(old('publish', optional($posts)->publish) == true) {{ 'checked' }} @endif"></div>
        <input class="checkbox-input--tab" type="checkbox" name="publish" id="publish" @if(old('publish', optional($posts)->publish) == true) {{ 'checked' }} @endif><span>@lang('global.post.fields.published')</span>
    </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#image').change(function(e) {
            var filename = $('#image').val().replace(/C:\\fakepath\\/i, '');
            // var filename = filename.slice(0, 5) + "...";
            $('#filename_image').html(filename);
            var files = e.target.files,
                filesLength = files.length;
            for (var i = 0; i < filesLength; i++) {
                var f = files[i]
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                var file = e.target;
                $('.uploaded_image').attr('src', e.target.result).show(); 
                });
                fileReader.readAsDataURL(f);
            }
        });

        $(".remove_avatar").click(function(){
            $('.uploaded_image').hide(); 
            $('#delete_image').val('delete');
            // $('#files').val('deleted_image');
        });
    })
</script>