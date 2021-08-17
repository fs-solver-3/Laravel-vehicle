@inject('request', 'Illuminate\Http\Request')
@extends('layouts.user_app')
@section('title', 'Оставите комментарий')
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
    <section class="trip-comment">
        <div class="container">
            <form id="comment_form" action="javascript:void(0)" enctype="multipart/form-data">
                <div class="trip-comment--wrap">
                    <h1 class="main-section--title text-center mb-5">@lang('front.trip_comment.leave_comment') <span>@lang('front.trip_comment.about_trip')?</span></h1>
                    <div class="col-xl-8 col-lg-8 trip-comment--content">
                        <label>@lang('front.trip_comment.comment'):</label>
                        <textarea class="trip-comment--textarea" rows="5" cols="10" id="comment" name="comment"
                            placeholder="Здравствуйте! Я еду по работе, в багажнике много места. В салоне будем только мы."></textarea>
                        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                        <input type="hidden" name="return" id="return" value="">
                    </div>
                    <div class="trip-stops--places--buttons">
                        @if(Auth::user()->avatar == null)
                            <a class="gogocar-gray-button m-0-auto-none mr-4" href="{{ route('addPhoto', app()->getLocale()) }}">@lang('front.trip_stops_places.back')</a>
                        @else
                            <a class="gogocar-gray-button m-0-auto-none mr-4" href="{{ route('chooseCarPassenger', app()->getLocale()) }}">@lang('front.trip_stops_places.back')</a>
                        @endif
                        <button class="gogocar-yellow-button m-0-auto-none find-trip-submit" type="submit">@lang('front.trip_comment.publish')</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div class="modal" id="popup-go-back2" tabindex="-1" role="dialog" aria-hidden="true">
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
                        <div class="gogocar-yellow-button mb-4" id="return_trip_now">@lang('front.add_photo.i_will_post')</div>
                        <div class="gogocar-gray-button" id="return_trip_later">@lang('front.add_photo.i_will_later')</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="popup-trip-finish" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
            <div class="modal-content popup-content">
                <div class="popup-covid--wrap popup-icon-size">
                    <svg class="icon icon-finish ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#finish')}}"></use>
                    </svg>
                    <h3 class="main-section--title font-size-25 mb-5">@lang('front.trip_comment.trip_published')!</h3>
                    <p class="popup-trip-finish">@lang('front.trip_comment.thank')!</p>
                    <div class="gogocar-yellow-button w-170" id="finish">@lang('front.header.your_trips')</div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="popup-input-value2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
            <div class="modal-content popup-content">
                <div class="popup-covid--wrap popup-icon-size">
                    <p class="popup-trip-finish">@lang('front.carbook.something_wrong')</p>
                    <div class="gogocar-yellow-button w-170" data-dismiss="modal">@lang('front.search_page.ok')</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function setpublish(value) {
        $("#return").val(value);
        // $("#popup-go-back").modal("hide");
    }

    $(document).ready(function() {

        @if($request->date == null)
            setTimeout(function(){$('#popup-go-back2').modal('show');}, 500);
        @endif
        $('#return_trip_now').click(function(){
            window.location.href = '{{ route("setReturn", app()->getLocale()) }}';
        })

        $('#comment_form').submit(function(e) {
            e.preventDefault();
            var formData = new FormData($("#comment_form")[0]);
            var token = $("#token").val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("saveComment", app()->getLocale()) }}',
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if (data.state == 'success' && data.message == 'ok') {
                        $('#popup-trip-finish').modal('show');
                    }
                    else if(data.state == 'success' && data.message == 'existing_trip'){
                        window.location.href = '{{ route("trips.exist", app()->getLocale()) }}';
                    }
                    else {
                        $('#popup-input-value2').modal('show');
                        // window.location.href = '{{ route("addComment", app()->getLocale()) }}';
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

        

        $( "#finish" ).click(function() {
            $('#popup-trip-finish').modal('hide');
            window.location.href = '{{ route("trips", app()->getLocale()) }}';
        });

        $( "#return_trip_later" ).click(function() {
            $('#popup-go-back2').modal('hide');
        });
    })
</script>
@endsection