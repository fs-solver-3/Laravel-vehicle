@extends('layouts.user_app')
@section('content')
<div class="content">
    <section class="notific-trip">
        <div class="container">
            <div class="notific-trip--wrap">
                <h1 class="main-section--title text-center">@lang('front.review.leave_review')</span></h1>
                <div class="col-xl-9 col-lg-9 notific-trip--list m-0-auto">
                    @if(!is_null($booking->listing))
                    <div class="notific-trip--item gogocar-trip--item">
                        @if(!is_null($booking->listing))
                        <div class="gogocar-trip--item__top">
                            <div class="gogocar-trip--item-town__route">
                                <div class="gogocar-trip--item__town"><span>{{ $booking->listing->sourcecity->city }}</span><span>{{ $booking->listing->destinationcity->city }}</span></div>
                                <div class="gogocar-trip--item__route">
                                    <div class="gogocar-trip--item__route--start"></div>
                                    <div class="gogocar-trip--item__route--end"></div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="gogocar-trip--item__bottom">

                            <div class="gogocar-drivers--profile--wrap">
                                @if($booking->driver->avatar!=null)
                                <div class="gogocar-drivers--profile" style="background-image:url('{{ asset($booking->driver->avatar) }}');">
                                </div>
                                @else
                                <div class="gogocar-drivers--profile" style="background-image:url('{{ asset('static/img/general/photo.png') }}');">
                                </div>
                                @endif
                                <div class="gogocar-trips-category--name__rating--wrap">
                                    <span class="gogocar-trips-category--name">{{ $booking->driver->name }}</span>
                                    <div class="gogocar-trips-category--rating green-rating">
                                        <svg class="icon icon-green-star ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#green-star') }}">
                                            </use>
                                        </svg><span>{{ $booking->driver->rating }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="notific-trip-date-price">
                                <div class="all-trip--popup__col">
                                    <label>@lang('global.date'):</label>
                                    <div class="notific-input-icon">
                                        <input class="gogocar-input--filter popup-show-calendar popup-show-calendar-click calendar-zone-height" type="text" readonly="readonly" value="{{date('d.m.yy',strtotime($booking->listing->starting_date))}}">
                                        <div class="notific-calendar-icon">
                                            <svg class="icon icon-calendar2 ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#calendar2') }}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="all-trip--popup__col noti-price-label">
                                            <label>Цена (UZS):</label>
                                            <div class="notific-range-price">
                                                <div class="filter-slider"></div>
                                                <div class="notific-range-price--text"><span class="min-values hidden1"></span><span class="max-values hidden2"></span></div>
                                            </div>
                                        </div> --}}
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-xl-9 col-lg-9 notific-trip--list m-0-auto">
                   <form method="POST" action="{{ route('review.store',['locale' => app()->getLocale(), 'id' => $booking->id]) }}" accept-charset="UTF-8" id="create_reviews_user_form" name="create_reviews_form" class="form-horizontal">
                       {{ csrf_field() }}

                        {{-- <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title" class="col-md-2 control-label">@lang('front.review.title')</label>
                            <div class="col-md-10">
                                <input class="form-control" name="title" type="text" id="title"  minlength="1" maxlength="255" placeholder="Enter title here...">
                                {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div> --}}

                        <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
                            <label for="comment" class="col-md-2 control-label">@lang('front.review.comment'):</label>
                            <div class="col-md-10">
                                {{-- <input class="form-control" name="comment" type="text" id="comment" value="{{ old('comment', optional($reviews)->comment) }}" minlength="1" placeholder="Enter comment here..."> --}}
                                <textarea class="textarea-input form-control" name="comment" id="comment" rows="4" required></textarea>
                                {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}">
                            <label for="score" class="col-md-2 control-label">@lang('front.review.score')</label>
                            {{-- <div class="col-md-10">
                <input class="form-control" name="score" type="text" id="score" value="{{ old('score', optional($reviews)->score) }}" minlength="1" placeholder="Enter score here...">
                            {!! $errors->first('score', '<p class="help-block">:message</p>') !!}
                        </div> --}}
                            <div class="review-rating col-md-10">
                                <div class="" id="rateYo" data-rating="0"></div>
                                <input class="rateyo-hidden" type="hidden" id="score" name="score">
                                {!! $errors->first('score', '<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="section-footer-side col-lg-9 m-0-auto">
                            <div class="section-buttons--wrap d-flex">
                                <button class="gogocar-yellow-button upload_btn" type="submit">@lang('global.app_create')</button>
                                <button class="gogocar-gray-button upload_btn">@lang('global.app_cancel')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection