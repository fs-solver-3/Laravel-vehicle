<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.passport_tab.passport_data')</h3>
    </div>
    <div class="personal-content--body">
        <div class="personal-password--list">

            <form id="edit_passport_form" action="javascript:void(0)" enctype="multipart/form-data" onsubmit="return validateForm()">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <div class="section-bottom-side">
                    <div class="section-users-tab--content">
                        <div class="section-inputs--wrapper row">
                            @if (Auth::user()->passport)
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.series'):</label>
                                <input type="hidden" id="passport_id" name="passport_id" value="{{Auth::user()->passport->id}}">
                                <input class="input-main mask-seria" type="text" name="passport_series"
                                    placeholder="__ __" value="{{Auth::user()->passport->series}}" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.no'):</label>
                                <input class="input-main mask-number" type="text" name="passport_room"
                                    placeholder="__ __ __ __" value="{{Auth::user()->passport->room}}" required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.department_code'):</label>
                                <input class="input-main mask-code" type="text" name="passport_department_code"
                                    placeholder="___-___" value="{{Auth::user()->passport->department_code}}" required>
                            </div>
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.issued_by'):</label>
                                <input class="input-main" type="text" placeholder="" name="passport_issued_by"
                                    value="{{Auth::user()->passport->issued_by}}" required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.issued_date'):</label>
                                <input class="input-main calendar-passport calendar-zone-height text-left" type="text"
                                    name="passport_issued_date" value="{{Auth::user()->passport->issued_date}}" required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.registration_address'):</label>
                                <input class="input-main" type="text" name="passport_place_residence"
                                    value="{{Auth::user()->passport->place_residence}}" placeholder="" required>
                            </div>
                            <div class="section-checkbox-files">
                                <div
                                    class="col-xl-12 col-lg-12 col-md-6 col-sm-6 section-input-wrap section-user-flex row">
                                    <div class="section-user-flex--item">
                                        @if (is_null(Auth::user()->passport->pdf1))
                                        <a class="section-user-files" href="#">
                                            <svg class="icon icon-pdf ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}"></use>
                                            </svg>
                                            <span id="filename_pdf1">
                                                @lang('front.profile.passport_tab.no_file')
                                            </span>
                                        </a>
                                        @else
                                        <a class="section-user-files" href="/{{Auth::user()->passport->pdf1}}" target="_blank">
                                            <svg class="icon icon-pdf ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}"></use>
                                            </svg>
                                            <span id="filename_pdf1">
                                                {{substr(substr(Auth::user()->passport->pdf1, 0, -20), 13)}}.{{Auth::user()->passport->pdf1_extension}}
                                            </span>
                                        </a>
                                        @endif
                                        {{-- <a class="section-user-files"
                                            href="@if (!is_null(Auth::user()->passport->pdf1)) /{{Auth::user()->passport->pdf1}} @else # @endif" target="_blank">
                                            <svg class="icon icon-pdf ">
                                                <use
                                                    xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}">
                                                </use>
                                            </svg>
                                            <span id="filename_pdf1">
                                                @if (!is_null(Auth::user()->passport->pdf1))
                                                {{substr(substr(Auth::user()->passport->pdf1, 0, -20), 13)}}.{{Auth::user()->passport->pdf1_extension}}
                                                @else
                                                @lang('front.profile.passport_tab.no_file')
                                                @endif
                                            </span>
                                        </a> --}}
                                        <div class="section-user-files--more gogocar-arrow-button">
                                            <input type="file" name="pdf1" id="pdf1" accept="image/*,.pdf">
                                            <label for="pdf1" id="filename_pdf1">
                                                <svg class="icon icon-dots ">
                                                    <use
                                                        xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}">
                                                    </use>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="section-user-flex--item">
                                        @if (is_null(Auth::user()->passport->pdf2))
                                        <a class="section-user-files" href="#">
                                            <svg class="icon icon-pdf ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}"></use>
                                            </svg>
                                            <span id="filename_pdf2">
                                                @lang('front.profile.passport_tab.no_file')
                                            </span>
                                        </a>
                                        @else
                                        <a class="section-user-files" href="/{{Auth::user()->passport->pdf2}}" target="_blank">
                                            <svg class="icon icon-pdf ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}"></use>
                                            </svg>
                                            <span id="filename_pdf2">
                                                {{substr(substr(Auth::user()->passport->pdf2, 0, -20), 13)}}.{{Auth::user()->passport->pdf2_extension}}
                                            </span>
                                        </a>
                                        @endif


                                        {{-- <a class="section-user-files"
                                            href="@if (!is_null(Auth::user()->passport->pdf2)) /{{Auth::user()->passport->pdf2}} @else # @endif" target="_blank">
                                            <svg class="icon icon-pdf ">
                                                <use
                                                    xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}">
                                                </use>
                                            </svg>
                                            <span id="filename_pdf2">
                                                @if (!is_null(Auth::user()->passport->pdf2))
                                                {{substr(substr(Auth::user()->passport->pdf2, 0, -20), 13)}}.{{Auth::user()->passport->pdf1_extension}}
                                                @else
                                                @lang('front.profile.passport_tab.no_file')
                                                @endif
                                            </span>
                                        </a> --}}
                                        <div class="section-user-files--more gogocar-arrow-button">
                                            <input type="file" name="pdf2" id="pdf2" accept="image/*,.pdf">
                                            <label for="pdf2" id="label_pdf2">
                                                <svg class="icon icon-dots ">
                                                    <use
                                                        xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}">
                                                    </use>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.series'):</label>
                                <input type="hidden" name="passport_id">
                                <input class="input-main mask-seria" type="text" name="passport_series"
                                    placeholder="__ __" required>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.no'):</label>
                                <input class="input-main mask-number" type="text" name="passport_room"
                                    placeholder="__ __ __ __" required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.department_code'):</label>
                                <input class="input-main mask-code" type="text" name="passport_department_code"
                                    placeholder="___-___" required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.issued_by'):</label>
                                <input class="input-main" type="text" name="passport_issued_by" placeholder="" required>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.issued_date'):</label>
                                <input class="input-main calendar-passport calendar-zone-height text-left" type="text"
                                    name="passport_issued_date" required>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
                                <label>@lang('front.profile.passport_tab.registration_address'):</label>
                                <input class="input-main" type="text" name="passport_place_residence" placeholder="" >
                            </div>
                            <div class="section-checkbox-files">
                                <div
                                    class="col-xl-8 col-lg-8 col-md-6 col-sm-6 section-input-wrap section-user-flex row">
                                    <div class="section-user-flex--item">
                                        <a class="section-user-files" href="#">
                                            <svg class="icon icon-pdf ">
                                                <use
                                                    xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}">
                                                </use>
                                            </svg><span id="filename_pdf1">@lang('front.profile.passport_tab.no_file')</span></a>
                                        <div class="section-user-files--more gogocar-arrow-button">
                                            <input type="file" name="pdf1" id="pdf1" accept="image/*,.pdf">
                                            <label for="pdf1" id="label_pdf1">
                                                <svg class="icon icon-dots ">
                                                    <use
                                                        xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}">
                                                    </use>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="section-user-flex--item">
                                        <a class="section-user-files" href="#">
                                            <svg class="icon icon-pdf ">
                                                <use
                                                    xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}">
                                                </use>
                                            </svg><span id="filename_pdf2">@lang('front.profile.passport_tab.no_file')</span></a>
                                        <div class="section-user-files--more gogocar-arrow-button">
                                            <input type="file" name="pdf2" id="pdf2" accept="image/*,.pdf">
                                            <label for="pdf2" id="label_pdf2">
                                                <svg class="icon icon-dots ">
                                                    <use
                                                        xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}">
                                                    </use>
                                                </svg>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div
                                    class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap justify-content-center mb-0">
                                    <div class="checkbox-input--tab__item">
                                        <div class="checkbox-input"></div>
                                        <input class="checkbox-input--tab" type="checkbox"
                                            name="passport_verified"><span>Проверен</span>
                                    </div>
                                </div> --}}
                            </div>
                            <input type="hidden" id="passport_id" name="passport_id_2" value="0">
                            @endif
                        </div>
                    </div>
                </div>
                {{-- <div class="section-footer-side"> --}}
                <div class="section-buttons--wrap">
                    <button class="gogocar-yellow-button" type="submit">@lang('front.profile.passport_tab.save')</button>
                    {{-- <div class="section-button--gray w-100px">Отменить</div> --}}
                </div>
                {{-- </div> --}}
            </form>

        </div>
    </div>
</div>
<div class="modal fade" id="popup-input-image" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('message.passport_upload')</p>
                <div class="gogocar-yellow-button w-170" data-dismiss="modal">@lang('front.profile.photo_tab.ok')</div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popup-passport-wrong" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('message.something_wrong')</p>
                <div class="gogocar-yellow-button w-170" data-dismiss="modal">@lang('front.profile.photo_tab.ok')</div>
            </div>
        </div>
    </div>
</div>
<script>
    function validateForm() {
        const front = $('#pdf1').val();
        const back = $('#pdf2').val();
        const passport_id = $('#passport_id').val();
        if (passport_id == 0 && (front == "" || back == "")) {
            $('#popup-input-image').modal('show');
            return false;
        }
    }

    $(document).ready(function() {
        $('.mask-seria').mask('AA AA');
        $('.mask-number').mask('00 00 00 00');
        $('.mask-code').mask('000-000');
        $('#pdf1').change(function() {
            var filename = $('#pdf1').val().replace(/C:\\fakepath\\/i, '');
            $('#filename_pdf1').html(filename);
        });
        $('#pdf2').change(function() {
            var filename = $('#pdf2').val().replace(/C:\\fakepath\\/i, '');
            $('#filename_pdf2').html(filename);
        });
        $('#edit_passport_form').submit(function(e) {
            e.preventDefault();
 
            var formData = new FormData($("#edit_passport_form")[0]);
            var token = $("#token").val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("upload_passport", app()->getLocale()) }}',
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if(data.state == 'success'){
                        $("#success_msg").css('display', 'block');
                        // $('#success_msg_content').html('Your Passport data has been updated successfully!');
                        $('#success_msg_content').html("@lang('message.passport_success_upload')");
                    }
                    else{
                        $('#popup-passport-wrong').modal('show');
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    })
</script>