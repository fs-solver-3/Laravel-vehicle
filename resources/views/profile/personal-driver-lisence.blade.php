<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.license_tab.driver_license')</h3>
    </div>
    <div class="personal-content--body">
        <div class="personal-password--list">

            <form class="section-user--dropdown__wrap users-drive-rules" id="edit_lisence_form" action="javascript:void(0)" enctype="multipart/form-data">
                {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> --}}
                <div class="section-bottom-side">
                    <div class="section-users-tab--content">
                        <div class="section-inputs--wrapper row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.license_tab.document_no'):</label>
                                @if (Auth::user()->license)
                                <input class="input-main" type="text" name="document_no" value="@if(!is_null(Auth::user()->license)) {{Auth::user()->license->document_no}} @endif" required>
                                @else
                                <input class="input-main" type="text" name="document_no" required>
                                @endif
                            </div>
                            <input type="hidden" name="lisence_id" value="@if(!is_null(Auth::user()->license)) {{Auth::user()->license->id}} @endif">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.license_tab.category'):</label>
                                <div class="section-select--input2 section-select--input__show justify-content-start" id="category_box">
                                    <div class="section-yellow-bg--wrap">
                                        @if (!is_null(Auth::user()->license) && count(Auth::user()->license->lisence_categories) > 0)
                                        @foreach (Auth::user()->license->lisence_categories as $item)
                                        <div class="section-yellow-bg--content">
                                            <span>{{$item->title}}</span>
                                            <div class="section-yellow-bg--content__icon">
                                                <svg class="icon icon-close ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#close')}}"></use>
                                                </svg>
                                            </div>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    @if (!is_null(Auth::user()->license) && count(Auth::user()->license->lisence_categories) > 0)
                                    <input type="hidden" id="lisence_categories" name="categories" value="@foreach (Auth::user()->license->lisence_categories as $item) {{$item->title}}@endforeach">
                                    @else
                                    <input type="hidden" id="lisence_categories" name="categories" value="">
                                    @endif
                                    <ul class="section-select--popup__list">
                                        @foreach ($categories as $item)
                                        <li class="section-select--popup__item hover-text-color">{{$item->title}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="section-checkbox-files">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap section-user-flex row">
                                    @if (Auth::user()->license)
                                    <div class="section-user-flex--item">

                                        @if (is_null(Auth::user()->license->pdf))
                                            <a class="section-user-files" href="#" >
                                                <svg class="icon icon-pdf ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}"></use>
                                                </svg>
                                                <span id="license_pdf">
                                                    @lang('front.profile.passport_tab.no_file')
                                                </span>
                                            </a>
                                        @else
                                            <a class="section-user-files" href="/{{Auth::user()->license->pdf}}" target="_blank">
                                                <svg class="icon icon-pdf ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}"></use>
                                                </svg>
                                                <span id="license_pdf">
                                                    {{substr(substr(Auth::user()->license->pdf, 0, -20), 13)}}{{Auth::user()->license->pdf_extension}}
                                                </span>
                                            </a>
                                        @endif

                                        <div class="section-user-files--more gogocar-arrow-button">
                                            <input type="file" name="pdf" id="pdf">
                                            <label for="pdf" id="label_pdf">
                                                <svg class="icon icon-dots ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                    @else
                                    <div class="section-user-flex--item">
                                        <a class="section-user-files" href="#">
                                            <svg class="icon icon-pdf ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}"></use>
                                            </svg><span id="license_pdf">@lang('front.profile.passport_tab.no_file')</span>
                                        </a>

                                        <div class="section-user-files--more gogocar-arrow-button">
                                            <input type="file" name="pdf" id="pdf">
                                            <label for="pdf2" id="label_pdf2">
                                                <svg class="icon icon-dots ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="section-footer-side"> --}}
                <div class="section-buttons--wrap">
                    <button class="gogocar-yellow-button" type="submit">@lang('front.profile.license_tab.save')</button>
                    {{-- <div class="section-button--gray w-100px">Отменить</div> --}}
                </div>
                {{-- </div> --}}
            </form>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        $('#pdf').change(function() {
            var filename = $('#pdf').val().replace(/C:\\fakepath\\/i, '');
            $('#license_pdf').html(filename);
        });
        $('.section-select--input__show').on('click', function() {
            $(this).children('.section-select--popup__list').slideToggle(200);
            $(this).children('.section-select--popup__icon').toggleClass('active');
        });

        $('#category_box .section-yellow-bg--content span').each(function(){
            let tx1 = $(this).html();
            // console.log(tx1);
            // $('.section-select--popup__list .section-select--popup__item').each(function(){
            //     tx2 = $(this).html();
            //     if(tx1 == tx2){
            //         console.log('ddddddddddddd');
            //         $(this).off('click');
            //     }
            //     console.log(tx2);
            // })
        })

        var selected_item = true;
        function addItem() {
            var get_user = $(this).text();
            $('#category_box .section-yellow-bg--content span').each(function(){
                let selected_text = $(this).html();
                if(selected_text == get_user){
                    selected_item = false;
                }
            })
            if(selected_item){
                $('.section-bg-text--content').remove();
                $(this).parent().prevAll('.section-yellow-bg--wrap').append('<div class="section-yellow-bg--content"><span>' + get_user + '</span><div class="section-yellow-bg--content__icon"><svg class="icon icon-close "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#close"></use></svg></div></div>');
    
                $('#lisence_categories').val($('#lisence_categories').val() + ' ' + get_user);
                $(this).off('click');
            }
            selected_item = true;
        }
        $('.section-select--popup__item').on('click', addItem);


        function removeItem(e) {
            e.stopPropagation();
            var get_text = $(this).parents('.section-yellow-bg--wrap').nextAll().children('.section-select--popup__item');
            var get_click_text = $(this).prev().text();
            for (let item of get_text) {
                if ($(item).text() === get_click_text) {
                    $(item).on('click', addItem);
                }
            }
            var text = $('#lisence_categories').val();
            if (text != undefined) {
                text = text.replace(get_click_text, '');
                console.log(text);
                $('#lisence_categories').val(text);
            }
            $(this).parent().remove();


        }
        $('.section-yellow-bg--wrap').on('click', '.section-yellow-bg--content__icon', removeItem);

        $('#edit_lisence_form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData($("#edit_lisence_form")[0]);
            var token = $("#token").val();
            $.ajax({
                type: 'POST'
                , headers: {
                    'X-CSRF-TOKEN': token
                }
                , url: '{{ route("upload_lisence", app()->getLocale()) }}'
                , data: formData
                , cache: false
                , contentType: false
                , processData: false
                , success: (data) => {
                    if (data.state == 'success') {
                        $("#success_msg").css('display', 'block');
                        $('#success_msg_content').html("@lang('message.license_success_upload')");
                    } else {
                        $('#popup-input-value').modal('show');
                    }
                }
                , error: function(data) {
                    $('#popup-input-value').modal('show');
                }
            });
        });
    })
</script>