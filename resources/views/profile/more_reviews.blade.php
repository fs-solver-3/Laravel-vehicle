@foreach ($moreReviews as $item)
    <li class="personal-reviews--item">
        <div class="personal-reviews--item--wrap">
            <div class="personal-reviews--item--top">
                <div class="chat-content--review__trip--info">
                    <div class="chat-content--review__trip--info__img" @if(is_null($item->writer->avatar))
                        style="background-image:url('{{ asset('/static/img/content/drivers-avatar/driver1.png') }}');"
                        @else
                        style="background-image:url('/{{ $item->writer->avatar }}');"
                        @endif
                        >
                    </div>

                    <div class="chat-content--review__trip--name__trip"><span class="chat-content--review__trip--name">{{ $item->writer->name}}</span><span class="chat-content--review__trip--trip">{{ date('d.m.yy', strtotime($item->created_at)) }}</span></div>
                </div>
                <div class="personal-reviews--trip--rating">
                    <div class="personal-reviews--trip">{{ $item->booking->listing->location() }} → {{ $item->booking->listing->destination() }}</div>
                    <div class="gogocar-trips-category--rating green-rating">
                        <svg class="icon icon-green-star ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#green-star')}}"></use>
                        </svg><span>{{ $item->score }}</span>
                    </div>
                </div>
            </div>
            <div class="personal-reviews--trip personal-reviews--trip--moble">{{ $item->booking->listing->location() }} → {{ $item->booking->listing->destination() }}</div>
            <div class="personal-reviews--item--bottom">
                <p class="personal-reviews--item--text">{{ $item->comment }}
                </p>
            </div>
        </div>
    </li>
@endforeach