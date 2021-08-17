@extends('layouts.user_app')
@section('title', 'Главная страница')
@section('content')
<div class="content">
    <section class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs--list">
                <a class="breadcrumbs--item" href="/">@lang('front.profile.home')
                    <svg class="icon icon-arrow-right3 ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                    </svg>
                </a>
                <a class="breadcrumbs--item" href="{{ route('search', app()->getLocale()) }}">@lang('front.header.find')<span>&nbsp @lang('front.header.trip')</span></a>
            </ul>
        </div>
    </section>
    <section class="add-photo">
        <div class="container">
            <form id="upload_image_form" action="javascript:void(0)" enctype="multipart/form-data">
                <div class="add-photo--wrap">
                    <h1 class="col-xl-8 col-lg-8 main-section--title text-center m-0-auto mb-5">@lang('front.add_photo.add') <span>@lang('front.add_photo.to_your_profile')</span> @lang('front.add_photo.photo'). <span>@lang('front.add_photo.passengers_will').</span></h1>
                    <div class="add-photo--content">
                        <div class="add-photo--info m-0-auto">
                            @if(Auth::user()->avatar)
                            <div class="add-photo--icon" style="background-image:url('{{ asset(Auth::user()->avatar) }}');">
                            </div>
                            @else
                            <div class="add-photo--icon" style="background-image:url('static/img/general/photo.png');">
                            </div>
                            @endif
                            <input class="add-photo--input" id="upload_image" type="file" name="upload_image">
                            <label for="add-photo">@lang('front.add_photo.select_photo')</label>
                            <input type="hidden" name="return" id="return" value="">
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        </div>
                        {{-- /<div class="add-photo--info--buttons"> --}}
                            <div class="trip-stops--places--buttons">
                                <a class="gogocar-gray-button m-0-auto-none mr-4" href="{{ route('chooseCarPassenger', app()->getLocale()) }}">@lang('front.trip_stops_places.back')</a>
                                <button class="gogocar-yellow-button m-0-auto-none" type="submit">@lang('front.suggest_late_to.continue')</button>
                            </div>
                        {{-- </div> --}}
                        {{-- <div class="add-photo--info--buttons m3">
                            <button  class="gogocar-gray-button continue-without-photo">
                                We can't search address you input. Please 
                            </button>
                        </div> --}}
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="modal fade" id="popup-go-back" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
            <div class="modal-content popup-content">
                <div class="popup-header">
                    <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                        <svg class="icon icon-close ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#close') }}"></use>
                        </svg>
                    </div>
                </div>
                <div class="popup-covid--wrap popup-icon-size">
                    <svg class="icon icon-want-go-back ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#want-go-back') }}"></use>
                    </svg>
                    <h3 class="main-section--title font-size-25 mb-5">@lang('front.add_photo.going_back') <span>@lang('front.add_photo.post_feedback')!</span></h3>
                    <div class="popup-covid--buttons">
                        <div class="gogocar-yellow-button mb-4" onclick="setpublish(1)">@lang('front.add_photo.i_will_post')</div>
                        <div class="gogocar-gray-button" onclick="setpublish(0)">@lang('front.add_photo.i_will_later')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="popup-input-value2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('message.invalid_address')</p>
            </div>
        </div>
    </div>
</div>

<script>
    // $( document ).ready(function() {
    //     console.log( "ready!" );
    // });
    function goback() {
        $('.add-photo--info--buttons').html('<button type="submit" class="gogocar-gray-button continue-without-photo">Нет, спасибо, я продолжу без фото</button>');
        $('.add-photo--icon').attr('style', 'background-image:url("")');
        $('.add-photo--info label,.continue-without-photo').fadeIn(150);
    }
    function setpublish(value) {
            $("#return").val(value);
            $("#popup-go-back").modal("hide");
    }
    $(document).ready(function() {
        $('#upload_image_form').submit(function(e) {
            e.preventDefault();
 
            var formData = new FormData($("#upload_image_form")[0]);
            var token = $("#token").val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("uploadphoto", app()->getLocale()) }}',
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if(data.state == 'success'){
                        if (data.result == 1) {
                            window.location.href = '{{ route("setReturn", app()->getLocale()) }}';
                        }
                        else if(data.result == 0){
                            window.location.href = '{{ route("addComment", app()->getLocale()) }}';
                        }
                    }
                    else{
                        $('#popup-input-value2').modal('show');
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    })
</script>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection