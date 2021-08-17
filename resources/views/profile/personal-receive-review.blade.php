<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.received_tab.feedback_received')</h3>
    </div>
    <div class="personal-content--body">
        <div class="personal-review--wrap personal-review--wrap--content--wrap">
            <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12 personal-review--wrap--content gogocar-box">
                <div class="personal-review--circule">
                    <div class="personal-review--circule--wrap">
                        <div class="personal-review--circule--name">@lang('front.profile.received_tab.average_rating')</div>
                        <div class="personal-review--circule--desc">@lang('front.profile.received_tab.total')</div>
                    </div>
                    @php
                        $total_score = $reviews->sum('score');
                        if(count($reviews) == 0){
                            $average_score = 0;
                        }
                        else{
                            $average_score = $total_score / count($reviews);
                        }
                    @endphp
                    <div class="personal-rev-circule" data-value="{{ round($average_score, 2)}}"><strong></strong></div>
                </div>
                <div class="col-xl-9 col-lg-8 col-md-12 col-sm-12 personal-review--rating-score">
                    <ul class="personal-review--rating-score--list">
                        @foreach ($reviews_scores as $key => $item)
                            <li class="personal-review--rating-score--item">
                                <div class="personal-review--rating-line-start">@lang('front.profile.received_tab.grade') {{$key}}</div>
                                <div class="personal-review--rating-line-center">
                                    @if( count($reviews) > 0)
                                    <div class="personal-review--rating-line-center--after" style="width:{{ $item / count($reviews) * 100 }}%;"></div>
                                    @else
                                    <div class="personal-review--rating-line-center--after" style="width:0%;"></div>
                                    @endif
                                </div>
                                <div class="personal-review--rating-line-end">{{$item}}</div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="personal-content--header personal-content--header--mobile">
        <h3 class="personal-content--header--title">@lang('front.profile.received_tab.review')</h3>
    </div>
    <div class="personal-content--body">
        @if(count($reviews) > 0 )
        <ul class="col-xl-10 col-lg-10 personal-reviews--list" id="personal-reviews--list">
                @foreach ($showreviews as $item)
                    <li class="personal-reviews--item">
                        <div class="personal-reviews--item--wrap">
                            <div class="personal-reviews--item--top">
                                <div class="chat-content--review__trip--info">
                                     <div class="chat-content--review__trip--info__img" @if(is_null(optional($item->writer)->avatar))
                                         style="background-image:url('{{ asset('/static/img/content/drivers-avatar/driver1.png') }}');"
                                         @else
                                         style="background-image:url('/{{ $item->writer->avatar }}');"
                                         @endif
                                         >
                                    </div>
                                        
                                    <div class="chat-content--review__trip--name__trip"><span
                                            class="chat-content--review__trip--name">{{ optional($item->writer)->name}}</span><span
                                            class="chat-content--review__trip--trip">{{ date('d.m.yy', strtotime($item->created_at)) }}</span></div>
                                </div>
                                <div class="personal-reviews--trip--rating">
                                    <div class="personal-reviews--trip">
                                        @if(!is_null($item->booking))
                                        {{ optional(optional($item->booking->listing)->location)->full }} @if(!is_null(optional($item->booking)->listing)) → @endif {{ optional(optional($item->booking->listing)->destination)->full }}
                                        @endif
                                    </div>
                                    <div class="gogocar-trips-category--rating green-rating">
                                        <svg class="icon icon-green-star ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#green-star')}}"></use>
                                        </svg><span>{{ $item->score }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="personal-reviews--trip personal-reviews--trip--moble">
                                @if(!is_null($item->booking))
                                        {{ optional(optional($item->booking->listing)->location)->full }} @if(!is_null(optional($item->booking)->listing)) → @endif {{ optional(optional($item->booking->listing)->destination)->full }}
                                @endif
                            </div>
                            <div class="personal-reviews--item--bottom">
                                <p class="personal-reviews--item--text">{{ $item->comment }}
                                </p>
                            </div>
                        </div>
                    </li>
                @endforeach
        </ul>
        @if($reviews->count() > 10)
        <div class="col-xl-10 col-lg-10" >
            <div class="gogocar-yellow-button" id="load_more_button">@lang('front.profile.received_tab.show_more')</div>
        </div>
        @endif
        @else
            <p style="color: #fff" class="personal-add--car--desc">@lang('front.profile.received_tab.no_review')</p>
        @endif
    </div>
</div>
<script>
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function load_data() {
            var totalCurrentResult = $("#personal-reviews--list .personal-reviews--item").length;
            $.ajax({
                url: "{{ route('more_reviews')}}", 
                method: "POST", 
                data: {
                    skip: totalCurrentResult
                }, 
                success: function(data) {
                    $('#load_more_button').html('Показать еще');
                    $('#personal-reviews--list').append(data);
                }
            })
        }

        $(document).on('click', '#load_more_button', function() {
            var id = $(this).data('id');
            $('#load_more_button').html('<b>Loading...</b>');
            load_data();
        });

    });
</script>