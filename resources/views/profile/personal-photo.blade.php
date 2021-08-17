<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.photo_tab.profile_picture')</h3>
    </div>
    <form id="upload_image_form" action="{{ route("upload_personal_image", app()->getLocale()) }}" enctype="multipart/form-data" method="POST" onsubmit="return validateImage()">
        <div class="personal-content--body">
            {{ csrf_field() }}
            <div class="gogocar-ready-plan--covid personal-info-about-me mb-5">
                <div class="gogocar-gray-icons">
                    <svg class="icon icon-info ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#info') }}"></use>
                    </svg>
                </div>
                <div class="gogocar-ready-plan--covid--info">
                    <div class="gogocar-ready-plan--covid--title">@lang('front.profile.photo_tab.add_photo')!</div>
                    <div class="gogocar-ready-plan--covid--desc">@lang('front.profile.photo_tab.others_will').</div>
                </div>
            </div>
            <div class="personal-photo--content">
                <div class="col-xl-8 col-lg-8 personal-photo--dropzone-photo dropzone-drag">
                    <div class="personal-photo--dropzone">
                        <div class="personal-photo--dropzone__img"></div>
                        <div class="personal-photo--dropzone--place"><span
                                class="personal-photo--dropzone--name">@lang('front.profile.photo_tab.add')</span><span class="personal-photo--dropzone--rule">@lang('front.profile.photo_tab.png')</span></div>
                    </div>
                    <input id="personal-photo" name="personal-photo" type="file" accept="image/x-png,image/gif,image/jpeg">
                    {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> --}}
                    <button class="gogocar-yellow-button">@lang('front.profile.photo_tab.select')</button>
                </div>
                <div class="col-xl-4 col-lg-4 pr-0 personal-photo--photo-rules">
                    <div class="personal-photo--rules gogocar-box">
                        <div class="personal-photo--rules__img acc-submit" style="background-image:url('{{ asset('static/img/general/personal-a1.png') }}');">
                       
                        {{-- <div class="personal-photo--rules__img acc-submit"
                            style="background-image:url('{{asset(Auth::user()->avatar)}}');"> --}}
                            <div class="account-control--submited--icon">
                                <svg class="icon icon-ok ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                </svg>
                            </div>
                        </div><span>@lang('front.profile.photo_tab.tips')</span>
                        <ul class="personal-photo--list">
                            <li class="personal-photo--item acc-submit">
                                <div class="personal-photo--item--text">@lang('front.profile.photo_tab.no_sunglass')</div>
                                <div class="account-control--submited--icon">
                                    <svg class="icon icon-ok ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                    </svg>
                                </div>
                            </li>
                            <li class="personal-photo--item acc-submit">
                                <div class="personal-photo--item--text">@lang('front.profile.photo_tab.camera')</div>
                                <div class="account-control--submited--icon">
                                    <svg class="icon icon-ok ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                    </svg>
                                </div>
                            </li>
                            <li class="personal-photo--item acc-submit">
                                <div class="personal-photo--item--text">@lang('front.profile.photo_tab.only_you')</div>
                                <div class="account-control--submited--icon">
                                    <svg class="icon icon-ok ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                    </svg>
                                </div>
                            </li>
                            <li class="personal-photo--item acc-submit">
                                <div class="personal-photo--item--text">@lang('front.profile.photo_tab.bright')</div>
                                <div class="account-control--submited--icon">
                                    <svg class="icon icon-ok ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                    </svg>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-8">
        <button class="gogocar-yellow-button upload_btn" type="submit">@lang('global.app_save')</button>
        </div>
    </form>
</div>
<div class="modal fade" id="popup-input-value-2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('front.profile.photo_tab.select_photo')</p>
                <div class="gogocar-yellow-button w-170" data-dismiss="modal">@lang('front.profile.photo_tab.ok')</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popup-input-value-3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('front.profile.photo_tab.file_should_be')</p>
                <div class="gogocar-yellow-button w-170" data-dismiss="modal">@lang('front.profile.photo_tab.ok')</div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="popup-input-value" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('front.profile.photo_tab.sorry')</p>
                <div class="gogocar-yellow-button w-170" id="finish">@lang('front.profile.photo_tab.ok')</div>
            </div>
        </div>
    </div>
</div>
<script>
    function validateImage() {
        const file = $('#personal-photo').val();
        if (file == "") {
            $('#popup-input-value-2').modal('show');
            return false;
        }
    }
    if (window.File && window.FileList && window.FileReader) {
        $("#personal-photo").on("change", function(e) {
            var file = e.target.files[0];
            let FileSize = file.size / 1024 / 1024; // in MB
            if (FileSize > 8) {
                $('#popup-input-value-3').modal('show');
                $(this).val('');
                return false;
            }
        })
    } else {
            alert("Your browser doesn't support to File API")
        }
</script>