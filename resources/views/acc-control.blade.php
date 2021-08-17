@extends('layouts.user_app')
@section('title', 'Управление аккаунтом')
@section('content')
<div class="content">
    <section class="breadcrumbs">
        <div class="container">
            <div class="breadcrumb--title">@lang('front.management.account_management')</div>
            <ul class="breadcrumbs--list">
                <a class="breadcrumbs--item" href="/">@lang('front.profile.home')
                    <svg class="icon icon-arrow-right3 ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                    </svg>
                </a>
                <a class="breadcrumbs--item" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']) }}">@lang('front.profile.profile_infomation')</a>
            </ul>
        </div>
    </section>
    @if(Session::has('success_message'))
        <div class="container">
            <div class="alert alert-success">
                <span class="glyphicon glyphicon-ok"></span>
                {!! session('success_message') !!}

                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
        </div>
    @endif
    <div class="container" id="success_msg" style="display: none;">
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            <span id="success_msg_content"></span>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
    <section class="account-control pt-0">
        <div class="container">
            <div class="account-control--wrap">
                <div class="account-control--top__panel gogocar-box">
                    <div class="col-xl-4 col-lg-5 pl-0 account-control--top__left">
                        <form id="upload_image_form" action="javascript:void(0)" enctype="multipart/form-data" class="d-flex">
                        <div class="account-control--panel__img--wrap dropzone-drag" @if(!is_null(Auth::user()->avatar)) style="background-image:url('{{ asset(Auth::user()->avatar) }}');"  @endif>
                            <a class="account-control--panel--edit" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'photo']) }}">
                            <div class="account-control--panel__img"></div>
                            {{-- <input class="acc-img" id="acc-img" type="file" name="personal-photo"> --}}
                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                            @if(is_null(Auth::user()->avatar))
                            <div class="account-control--panel__add--img">
                                <svg class="icon icon-add ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add') }}"></use>
                                </svg><span>@lang('front.management.add_photo')</span>
                            </div>
                            </a>
                            @endif
                        </div>
                        <div class="account-control--top-panel__edit">
                            <span class="account-control--panel--name">{{ Auth::user()->name }}</span>
                            {{-- <button class="account-control--panel--edit" type="submit" style="border: 0px; background: none;">применять</button> --}}
                            <a class="account-control--panel--edit" href="{{ route('profile', app()->getLocale()) }}">@lang('front.management.edit_profile')</a>
                        </div>
                        </form>
                    </div>
                    <div class="col-xl-8 col-lg-7 col-md-11 pr-0 account-control--top__right">
                        <div class="account-control--top__right--title"><span>@lang('front.management.your_current_level')</span>
                            <svg class="icon icon-info ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#info') }}"></use>
                            </svg>
                        </div>
                        <ul class="account-control--top__right--level--list">
                            <li class="account-control--top__right--level--item active">@lang('front.management.newbie')
                                <div class="account-control--top--right--line"></div>
                            </li>
                            <li class="account-control--top__right--level--item">@lang('front.management.confident')
                                <div class="account-control--top--right--line"></div>
                            </li>
                            <li class="account-control--top__right--level--item">@lang('front.management.experienced')
                                <div class="account-control--top--right--line"></div>
                            </li>
                            <li class="account-control--top__right--level--item">@lang('front.management.expert')
                                <div class="account-control--top--right--line"></div>
                            </li>
                            <li class="account-control--top__right--level--item">@lang('front.management.ambassadar')
                                <div class="account-control--top--right--line"></div>
                            </li>
                        </ul>
                        <div class="account-control--top__right--level--list__mobile">
                            <div class="account-control--top--right--line__mobile">@lang('front.management.newbie')</div>
                            <div class="account-control--top--right--line__mobile--list">
                                <div class="account-control--top--right--line__mobile_i active">
                                    <div class="actrl_m"></div>
                                </div>
                                <div class="account-control--top--right--line__mobile_i">
                                    <div class="actrl_m"></div>
                                </div>
                                <div class="account-control--top--right--line__mobile_i">
                                    <div class="actrl_m"></div>
                                </div>
                                <div class="account-control--top--right--line__mobile_i">
                                    <div class="actrl_m"></div>
                                </div>
                                <div class="account-control--top--right--line__mobile_i">
                                    <div class="actrl_m"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="account-control--bottom__panel row">
                    <div class="col-xl-4 col-lg-4 col-md-6 account-control--bottom__panel--wrap">
                        <div class="account-control--bottom__panel--content gogocar-box acc-h-100">
                            <div class="account-control--bottom__panel--header">
                                <div class="account-control--title--wrap">
                                    <h3 class="account-control--title">@lang('front.management.preference')</h3>
                                </div>
                            </div>
                            <div class="account-control--bottom__panel--body">
                                <ul class="account-control--prefer--list row">
                                    <div class="account-control--prefer--item @if(Auth::user()->preference != null && Auth::user()->preference->dialog_allowed == 'allow') active @endif">
                                        @if(Auth::user()->preference != null && Auth::user()->preference->dialog_allowed == 'allow')
                                        <svg class="icon icon-ac-chat ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ac-chat') }}"></use>
                                        </svg>
                                        @endif
                                    </div>
                                    <div class="account-control--prefer--item @if(Auth::user()->preference != null && Auth::user()->preference->music_allowed == 'allow') active @endif">
                                        @if(Auth::user()->preference != null && Auth::user()->preference->music_allowed == 'allow')
                                        <svg class="icon icon-ac-head ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ac-head') }}"></use>
                                        </svg>
                                        @endif
                                    </div>
                                    <div class="account-control--prefer--item @if(Auth::user()->preference != null && Auth::user()->preference->pet_allowed == 'allow') active @endif">
                                        @if(Auth::user()->preference != null && Auth::user()->preference->pet_allowed == 'allow')
                                        <svg class="icon icon-dog ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#dog') }}"></use>
                                        </svg>
                                        @endif
                                    </div>
                                    <div class="account-control--prefer--item @if(Auth::user()->preference != null && Auth::user()->preference->smoking_allowed == 'allow') active @endif">
                                        @if(Auth::user()->preference != null && Auth::user()->preference->smoking_allowed == 'allow')
                                        <svg class="icon icon-smoke ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#smoke') }}"></use>
                                        </svg>
                                        @endif
                                    </div>
                                </ul>
                                <a href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'preference']) }}">
                                    <div class="account-control--prefer--choise">@lang('front.management.please_enter')</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 account-control--bottom__panel--wrap">
                        <div class="account-control--bottom__panel--content gogocar-box acc-h-100">
                            <div class="account-control--bottom__panel--body"><span
                                    class="account-control--bottom__panel--body--title">@lang('front.management.verify_id')</span>
                                <p class="account-control--bottom__panel--body--desc">@lang('front.management.our_users').</p>
                                <a href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'passport']) }}">
                                <div class="gogocar-yellow-button gogocar-button--account-control">@lang('front.management.confirm')</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 account-control--bottom__panel--wrap">
                        <div class="account-control--bottom__panel--content gogocar-box acc-h-100">
                            <div class="account-control--bottom__panel--body">
                                <svg class="icon icon-logo2 ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#logo2') }}"></use>
                                </svg><span class="account-control--bottom__panel--body--title">@lang('front.management.tell_me')?</span>
                                <div class="gogocar-yellow-button gogocar-button--account-control" data-toggle="modal" data-target="#popup-gogocar">Ответить</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 account-control--bottom__panel--wrap">
                        <div class="account-control--bottom__panel--content gogocar-box">
                            <div class="account-control--bottom__panel--header">
                                <div class="account-control--title--wrap">
                                    <h3 class="account-control--title">@lang('front.management.data_confirmation')</h3>
                                </div>
                            </div>
                            <div class="account-control--bottom__panel--body">
                                <ul class="account-control--submited--list">
                                    <div class="account-control--submited--item @if(Auth::user()->isVerified) acc-submit @else acc-not-submit  @endif"><span
                                            class="account-control--submited--item--name">@lang('front.management.phone_number')</span>
                                        <div class="account-control--submited--icon">
                                            @if(Auth::user()->isVerified)
                                                <svg class="icon icon-ok ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                                </svg>
                                             @else 
                                                <svg class="icon icon-x ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#x') }}"></use>
                                                </svg>
                                             @endif
                                            
                                        </div>
                                    </div>
                                    <div class="account-control--submited--item @if(!is_null(Auth::user()->email_verified_at)) acc-submit @else acc-not-submit  @endif">
                                        <a href="{{ route('verification.resend') }}" style="color: inherit">
                                        <span class="account-control--submited--item--name">
                                            @lang('front.management.email')
                                        </span>
                                        </a>
                                        <div class="account-control--submited--icon">
                                            @if(!is_null(Auth::user()->email_verified_at))
                                            <svg class="icon icon-ok ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                            </svg>
                                            @else
                                            <svg class="icon icon-x ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#x') }}"></use>
                                            </svg>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="account-control--submited--item @if(!is_null(Auth::user()->passport) && Auth::user()->passport->verified) acc-submit @else acc-not-submit  @endif"><span
                                            class="account-control--submited--item--name">@lang('front.management.confirm_id')</span>
                                        <div class="account-control--submited--icon verified">
                                            @if(!is_null(Auth::user()->passport) && Auth::user()->passport->verified)
                                            <svg class="icon icon-ok ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#ok') }}"></use>
                                            </svg>
                                            @else
                                            <svg class="icon icon-x ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#x') }}"></use>
                                            </svg>
                                            @endif
                                        </div>
                                    </div>
                                </ul>
                                <a href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'passport']) }}">
                                <div class="account-control--prefer--choise">@lang('front.management.complete_confirmation')</div>
                                </a>
                            </div>
                        </div>
                        <div class="account-control--bottom__panel--content gogocar-box">
                            <div class="account-control--bottom__panel--header">
                                <div class="account-control--title--wrap">
                                    <h3 class="account-control--title">@lang('front.management.user_activity')</h3>
                                </div>
                            </div>
                            <div class="account-control--bottom__panel--body">
                                <div class="account-control--date-register">
                                    <div class="account-control--date-register--icon">
                                        <svg class="icon icon-user2 ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#user2') }}"></use>
                                        </svg>
                                    </div>
                                    @php
                                        $ru_month = array( 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' );
                                        $en_month = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );

                                        $date = date('F', strtotime ( Auth::user()->created_at )); 
                                        $date2 = str_replace($en_month, $ru_month, $date);
                                    @endphp   
                                    <span class="account-control--date-register--text">@lang('front.management.registration_date'): {{$date2}} {{date('Y', strtotime ( Auth::user()->created_at ))}}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 account-control--bottom__panel--wrap">
                        <div class="account-control--bottom__panel--content gogocar-box acc-h-100">
                            <div class="account-control--bottom__panel--header">
                                <div class="account-control--title--wrap">
                                    <a class="" href="{{ route('personal-message', app()->getLocale()) }}">
                                        @php
                                            $alerts = 0;
                                            if(!is_null(Auth::user()->passport)){
                                                $alerts +=1;
                                            }
                                            if(is_null(Auth::user()->info)){
                                                $alerts +=1;
                                            }
                                        @endphp
                                        <h3 class="account-control--title">@lang('front.management.alert') ({{ $alerts }})</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="account-control--bottom__panel--body acb-overfrow">
                                <ul class="account-control--notific--list">
                                    @if(!is_null(Auth::user()->passport))
                                        <div class="account-control--notific--item">
                                            <div class="account-control--notific--name__message">
                                                <a href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'verification']) }}">
                                                <span class="account-control--notific--item--name">@lang('front.management.confirm_your_id')</span>
                                                <p class="account-control--notific--item--text">@lang('front.management.our_users_Can').</p>
                                                </a>
                                            </div>
                                            {{-- <div class="account-control--notific--item--delete">
                                                <svg class="icon icon-x ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#x') }}"></use>
                                                </svg>
                                            </div> --}}
                                        </div>
                                    @endif
                                    @if(is_null(Auth::user()->info))
                                    <div class="account-control--notific--item">
                                        <div class="account-control--notific--name__message"  data-toggle="modal" data-target="#popup-gogocar"><span
                                                class="account-control--notific--item--name">@lang('front.management.tell_us')?</span>
                                            {{-- <p class="account-control--notific--item--text">Vitae cursus mattis
                                                fermentum odio at facilisis. Viverra praesent sit nisl tempor amet in
                                                vel id.</p> --}}
                                        </div>
                                        {{-- <div class="account-control--notific--item--delete">
                                            <svg class="icon icon-x ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#x') }}"></use>
                                            </svg>
                                        </div> --}}
                                    </div>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 account-control--bottom__panel--wrap">
                        <div class="account-control--bottom__panel--content gogocar-box acc-h-100">
                            <div class="account-control--bottom__panel--header">
                                <div class="account-control--title--wrap">
                                    <a class="" href="{{ route('personal-message', app()->getLocale()) }}">
                                    <h3 class="account-control--title">@lang('front.management.new_posts') ({{count($messages)}})</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="account-control--bottom__panel--body acb-overfrow">
                                <ul class="account-control--notific--list">
                                    @if(count($messages) > 0)
                                        @foreach ($messages as $item)
                                            <a class="" href="{{ route('personal-message', ['locale' => app()->getLocale(), 'type' => $item->type, 'room' => $item->room_id]) }}">
                                                <div class="account-control--notific--item ">
                                                    <div class="account-control--notific--name__message">
                                                    <div class="account-control--message--profile">
                                                        @if(!is_null($item->user) && !is_null($item->user->avatar))
                                                        <div class="account-control--message--profile__img" style="background-image:url('{{ asset($item->user->avatar) }}');">
                                                        </div>
                                                        @else
                                                        <div class="account-control--message--profile__img" style="background-image:url('{{ asset('static/img/content/drivers-avatar/driver1.png') }}');">
                                                        </div>
                                                        @endif
                                                    <div class="account-control--message--profile--info"><span class="account-control--message--profile--info__name">{{optional($item->user)->name}}</span><span class="account-control--message--profile--info__date">{{$item->created_at}}</span></div>
                                                    </div>
                                                    <p class="account-control--notific--item--text">{{ $item->body }}</p>
                                                </div>
                                                <div class="account-control--notific--item--delete">
                                                    <svg class="icon icon-x ">
                                                    <use xlink:href="static/img/svg/symbol/sprite.svg#x"></use>
                                                    </svg>
                                                </div>
                                                </div>
                                            </a>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade" id="popup-gogocar" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
          <div class="modal-content popup-content">
            <div class="popup-header">
              <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                <svg class="icon icon-close ">
                  <use xlink:href="static/img/svg/symbol/sprite.svg#close"></use>
                </svg>
              </div>
            </div>
            <form  method="POST" action="{{ route("info.save", app()->getLocale()) }}"
                id="withdraw_transactions_form" name="withdraw_transactions_form" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="popup-covid--wrap popup-icon-size">
              <h3 class="main-section--title--v2 font-size-25 mb-4">@lang('front.management.tell_me2'), <span>@lang('front.management.how_did')</span> @lang('front.management.about_gogo')?</h3>
              <p class="main-section--title font-size-20 text-center"><span>@lang('front.management.select')</span> @lang('front.management.finished_version') <span>@lang('front.management.or')</span> @lang('front.management.enter_yours') ?</p>
              <div class="trip-stops--wrap">
                <ul class="trip-stops--list trip-gogocar--knows">
                  <li class="trip-stops--item">
                    <div class="trip-stops--item--name__icon"><span>@lang('front.management.from_friends')</span></div>
                    <div class="popup-gogocar-cargo--checkbox">
                    </div>
                    <input class="popup-gogocar-info" for="type" type="checkbox" name="type[]"
                        value="От друзей">
                  </li>
                  <li class="trip-stops--item">
                    <div class="trip-stops--item--name__icon"><span>@lang('front.management.from_ads')</span></div>
                    <div class="popup-gogocar-cargo--checkbox">
                    </div>
                    <input class="popup-gogocar-info" for="type" type="checkbox" name="type[]"
                        value="Из рекламы">
                  </li>
                  <li class="trip-stops--item">
                    <div class="trip-stops--item--name__icon"><span>@lang('front.management.i_saw_it')</span></div>
                    <div class="popup-gogocar-cargo--checkbox">
                    </div>
                    <input class="popup-gogocar-info" for="type" type="checkbox" name="type[]"
                        value="Увидел в интернете">
                  </li>
                </ul>
                <div class="popup-text-gogocar-tell">
                  <label>Свой вариант</label>
                  <textarea name="comment" class="gogocar-textarea" cols="5" rows="3" placeholder="Опишите проблему подробнее"></textarea>
                </div>
              </div>
              <button class="gogocar-yellow-button" type="submit">@lang('front.management.apply')</button>
            </form>
            </div>
          </div>
        </div>
      </div>
</div>
<div class="modal fade" id="popup-input-value" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('front.management.sorry')</p>
                <div class="gogocar-yellow-button w-170" id="finish">@lang('front.management.ok')</div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#upload_image_form').submit(function(e) {
            e.preventDefault();

            var formData = new FormData($("#upload_image_form")[0]);
            var token = $("#token").val();
            $.ajax({
                type: 'POST'
                , headers: {
                    'X-CSRF-TOKEN': token
                }
                , url: '{{ route("upload_personal_image", app()->getLocale()) }}'
                , data: formData
                , cache: false
                , contentType: false
                , processData: false
                , success: (data) => {
                    if (data.state == 'success') {
                        $("#success_msg").css('display', 'block');
                        $('#success_msg_content').html('Image has been updated successfully!');
                    } else {
                        $('#popup-input-value').modal('show');
                    }
                }
                , error: function(data) {
                    console.log(data);
                }
            });
        });

        $('.popup-gogocar-cargo--checkbox').click(function(){
            $(this).siblings('.popup-gogocar-info').prop( "checked", true );
        })
    })
</script>
@endsection
@section('user_lang')
    @include('includes.user_flag')
@endsection