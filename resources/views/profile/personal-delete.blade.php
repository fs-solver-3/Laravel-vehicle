<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.close_tab.close_account')</h3>
    </div>
    <div class="personal-content--body">
        <div class="personal-delete--info">
            <div class="gogocar-gray-icons">
                <svg class="icon icon-info ">
                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#info')}}"></use>
                </svg>
            </div>
            <div class="gogocar-ready-plan--covid--info">
                <div class="gogocar-ready-plan--covid--title">@lang('front.profile.close_tab.closing')</div>
                <div class="gogocar-ready-plan--covid--desc">@lang('front.profile.close_tab.if_you')</div>
            </div>
        </div>
        <ul class="personal-delete--text--wrap">
            <li class="personal-delete--text">– @lang('front.profile.close_tab.change') <a
                    href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'personal_data']) }}">@lang('front.profile.close_tab.profile')</a></li>
            <li class="personal-delete--text">– @lang('front.profile.close_tab.to_solve') <a href="{{ route('contact', app()->getLocale()) }}"> @lang('front.profile.close_tab.to_no')</a></li>
            <li class="personal-delete--text">– @lang('front.profile.close_tab.if_to')<a
                    href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'alerts']) }}"> @lang('front.profile.close_tab.notification_setting')</a></li>
            <li class="personal-delete--text">– @lang('front.profile.close_tab.if_this')<a
                    href="{{ route('contact', app()->getLocale()) }}"> @lang('front.profile.close_tab.contact_us')</a> – @lang('front.profile.close_tab.if_cant') <span>создать новый</span></li>
        </ul>
        <div class="personal-add--car--title personal-delete--title mb-4">@lang('front.profile.close_tab.if_account').</div>
        <form id="close_account_form" action="javascript:void(0)" enctype="multipart/form-data">
            <div class="personal-delete-zone row">
                <div class="col-xl-6 col-lg-6 pl-0 all-trip--popup__col personal-content--select personal-mb">
                    <label>@lang('front.profile.close_tab.reason'):</label>
                    <select class="gogocar-select" name="reason_id">
                        @foreach ($reasons as $item)
                        <option value="{{$item->id}}">{{$item->text}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-6 col-lg-6 pr-0 all-trip--popup__col personal-mb">
                    <label>@lang('front.profile.close_tab.would_you')?</label>
                    <input class="gogocar-input--filter personal-content--input" type="text" name="recommend_text">
                    {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> --}}
                </div>
                <div class="col-xl-12 col-lg-12 p-0 all-trip--popup__col">
                    <label>@lang('front.profile.close_tab.what_do')?</label>
                    <textarea class="personal-textarea" cols="10" rows="5" name="reason_text"></textarea>
                </div>
            </div>
            <div class="modal fade" id="close-account" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
                    <div class="modal-content popup-content">
                        <div class="popup-covid--wrap popup-icon-size">
                            <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('front.profile.close_tab.will_you_close')</h3>
                            <div class="delete-chat-msg notific-icons">
                                <button type="submit" class="gogocar-red-button gogocar-mobile-m-0-auto" id="close_btn">@lang('front.profile.close_tab.close_account')</button>
                                <div class="gogocar-gray-button" data-dismiss="modal" aria-label="Close">@lang('global.app_cancel')</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<button class="gogocar-red-button gogocar-mobile-m-0-auto" id="close_btn" data-toggle="modal" data-target="#close-account" >@lang('front.profile.close_tab.close_account')</button>


<script>
    $(document).ready(function() {
        $('#close_account_form').submit(function(e) {
            e.preventDefault();
 
            var formData = new FormData($("#close_account_form")[0]);
            var token = $("#token").val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("close_account", app()->getLocale()) }}',
                data: formData,
                cache:false,
                contentType: false,
                processData: false,
                success: (data) => {
                    if(data.state == 'success'){
                        window.location.href = "{{ route('logout', app()->getLocale()) }}";
                    }
                    else{
                        $('#popup-input-value').modal('show');
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    })
</script>