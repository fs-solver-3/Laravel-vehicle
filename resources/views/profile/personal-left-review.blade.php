<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.left_tab.feedback_left')</h3>
    </div>
    <div class="personal-content--body">
        <ul class="personal-reviews--list">
            @if(count($leftreviews) > 0 )
                @foreach ($leftreviews as $item)
                <li class="personal-reviews--item">
                    <div class="personal-reviews--item--wrap">
                        <div class="personal-reviews--item--top">
                            <div class="chat-content--review__trip--info">
                                <div class="chat-content--review__trip--info__img" @if(is_null($item->receiver->avatar))
                                    style="background-image:url('{{ asset('/static/img/content/drivers-avatar/driver1.png') }}');"
                                    @else
                                    style="background-image:url('/{{ $item->receiver->avatar }}');"
                                    @endif
                                    >
                                </div>
                                <div class="chat-content--review__trip--name__trip"><span
                                        class="chat-content--review__trip--name">{{ $item->receiver->name}}</span><span
                                        class="chat-content--review__trip--trip">{{ date('d.m.yy', strtotime($item->created_at)) }}</span></div>
                            </div>
                            <div class="personal-reviews--trip--rating">
                                <div class="personal-reviews--trip">
                                    @if(!is_null($item->booking) && !empty($item->booking->listing))
                                        {{ optional(optional($item->booking->listing)->location_address)->city }}
                                         →
                                        {{ optional(optional($item->booking->listing)->destination_address)->city }}
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
                            @if(!is_null($item->booking) && !empty($item->booking->listing))
                                {{ optional(optional($item->booking->listing)->location_address)->city }}
                                →
                                {{ optional(optional($item->booking->listing)->destination_address)->city }}
                            @endif
                        </div>
                        <div class="personal-reviews--item--bottom">
                            <p class="personal-reviews--item--text">{{ $item->comment }}
                            </p>
                        </div>
                    </div>
                    <div class="personal-review--change--buttons">
                        <div class="gogocar-gray-button mb-4 edit-review" data-id="{{$item->id}}">@lang('front.profile.left_tab.edit')</div>

                        <button type="submit" class="gogocar-gray-button red-c" title="Delete event" data-toggle="modal" id="smallButton" data-target="#popup-del-msg-{{$item->id}}">
                            <span class="action-label">@lang('front.profile.left_tab.delete')</span>
                        </button>

                        <div class="modal fade" id="popup-del-msg-{{$item->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
                                <div class="modal-content popup-content">
                                    <div class="popup-covid--wrap popup-del-msg">
                                        <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('global.app_delete') Отзывы?</h3>
                                        <form method="POST" action="{!! route('review.destroy', ['locale' => app()->getLocale(), 'id' => $item->id]) !!}" accept-charset="UTF-8">
                                            {{ csrf_field() }}
                                            <input name="_method" value="DELETE" type="hidden">
                                            <div class="delete-chat-msg">
                                                <button type="submit" class="delete-choise-chat-msg gogocar-red-button" title="Delete Review" style="border: 0px;">
                                                    <div>
                                                        @lang('global.app_delete')
                                                    </div>
                                                </button>
                                                <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('global.app_cancel')</div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
            @else
                <li>
                    <p style="color: #fff" class="personal-add--car--desc">@lang('front.profile.received_tab.no_review')</p>
                </li>
            @endif
        </ul>
        @if(count($leftreviews) > 0 )
        <div class="gogocar-yellow-button">@lang('front.profile.received_tab.show_more')</div>
        @endif
    </div>
</div>
<script>
    $(document).ready(function() {
        $('.edit-review').click(function(e) {
            e.preventDefault();

            var id = $(this).data('id');
            var token = $("#token").val();
            $.ajax({
                type: 'GET'
                , headers: {
                    'X-CSRF-TOKEN': token
                }
                , url: '{{ route("profile.review.edit", app()->getLocale()) }}'
                , data: { id:id }
                , success: (data) => {
                    // if (data.state == 'success') {
                    //     $("#success_msg").css('display', 'block');
                    //     $('#success_msg_content').html('Mailing address has been updated successfully!');
                    // } else {
                    //     alert('Update failed');
                    // }
                    $('#left_feedback').html('');
                    $('#left_feedback').html(data);
                }
                , error: function(data) {
                    $('#popup-input-value').modal('show');
                }
            });
        });
    })
</script>