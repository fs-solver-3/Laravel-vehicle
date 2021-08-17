<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.alerts_tab.alert')</h3>
    </div>
    <div class="personal-content--body">
        <div class="personal-notific--checkboxes">
            <div class="personal-notific--checkbox">
                <div class="personal-filter--title mb-2">@lang('front.profile.alerts_tab.push_notification')</div>
                <div class="personal-notific--checkbox--item">
                    <div class="personal-notific--checkbox--item--check @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->notification_broswer) checked @endif">
                        <input class="personal-notific--checkbox--input" type="checkbox" name="push_alert" @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->notification_broswer) checked @endif>
                    </div>
                </div>
            </div>
            <div class="personal-notific--checkbox">
                <div class="personal-filter--title mb-2">@lang('front.profile.alerts_tab.email')</div>
                <div class="personal-notific--desc mb-4">Guseva@gmail.com</div>
                <div class="personal-notific--checkbox--item">
                    <div class="personal-notific--checkbox--item--check @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->mailing_news) checked @endif">
                        <input class="personal-notific--checkbox--input" type="checkbox" name="email_news_alert" @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->mailing_news) checked @endif>
                    </div>
                    <label>@lang('front.profile.alerts_tab.news')</label>
                </div>
                <div class="personal-notific--checkbox--item">
                    <div class="personal-notific--checkbox--item--check @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->mailing_messages) checked @endif"">
                        <input class="personal-notific--checkbox--input" type="checkbox" name="email_posts_alert" @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->mailing_messages) checked @endif">
                    </div>
                    <label>@lang('front.profile.alerts_tab.chat')</label>
                </div>
                <div class="personal-notific--checkbox--item">
                    <div class="personal-notific--checkbox--item--check @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->mailing_notification_driver) checked @endif"">
                        <input class="personal-notific--checkbox--input" type="checkbox" name="email_reviews_alert" @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->mailing_notification_driver) checked @endif">
                    </div>
                    <label>@lang('front.profile.alerts_tab.reviews')</label>
                </div>
                <div class="personal-notific--checkbox--item">
                    <div class="personal-notific--checkbox--item--check @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->mailing_notification_trip) checked @endif"">
                        <input class="personal-notific--checkbox--input" type="checkbox" name="email_trips_alert" @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->mailing_notification_trip) checked @endif">
                    </div>
                    <label>@lang('front.profile.alerts_tab.posting')</label>
                </div>
            </div>
            <div class="personal-notific--checkbox">
                <div class="personal-filter--title mb-2">SMS</div>
                <div class="personal-notific--desc mb-4">(+998-90) 904-59-95</div>
                <div class="personal-notific--checkbox--item">
                    <div class="personal-notific--checkbox--item--check @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->sms_notication_message) checked @endif"">
                        <input class="personal-notific--checkbox--input" type="checkbox" name="sms_posts_alert" @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->sms_notication_message) checked @endif">
                    </div>
                    <label>@lang('front.profile.alerts_tab.chat')</label>
                </div>
                <div class="personal-notific--checkbox--item">
                    <div class="personal-notific--checkbox--item--check @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->sms_notification_trip) checked @endif"">
                        <input class="personal-notific--checkbox--input" type="checkbox" name="sms_trips_alert" @if(!is_null(Auth::user()->notifications) && Auth::user()->notifications->sms_notification_trip) checked @endif">
                    </div>
                    <label>@lang('front.profile.alerts_tab.posting')</label>
                </div>
            </div>
        </div>
        <div class="gogocar-yellow-button m-0 gogocar-mobile-m-0-auto" id="alert_save">Сохранить</div>
    </div>
</div>

<div class="modal fade" id="popup-input-value" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('front.profile.photo_tab.sorry').</p>
                <div class="gogocar-yellow-button w-170" id="finish">Ок</div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        
        $('#alert_save').click(function() {
            let notification_browser = $("input[name='push_alert']").is(":checked")? true : false;
            let email_news_alert = $("input[name='email_news_alert']").is(":checked")? true : false;
            let email_posts_alert = $("input[name='email_posts_alert']").is(":checked")? true : false;
            let email_reviews_alert = $("input[name='email_reviews_alert']").is(":checked")? true : false;
            let email_trips_alert = $("input[name='email_trips_alert']").is(":checked")? true : false;
            let sms_posts_alert = $("input[name='sms_posts_alert']").is(":checked")? true : false;
            let sms_trips_alert = $("input[name='sms_trips_alert']").is(":checked")? true : false;
            var token = $("#token").val();
            $.ajax({
                type: 'POST'
                , dataType: "json"
                , headers: {
                    'X-CSRF-TOKEN': token
                }
                , url: '{{ route("save_user_alerts", app()->getLocale()) }}'
                , data: {
                    notification_browser: notification_browser
                    , email_news_alert: email_news_alert
                    , email_posts_alert: email_posts_alert
                    , email_reviews_alert: email_reviews_alert
                    , email_trips_alert: email_trips_alert
                    , sms_posts_alert: sms_posts_alert
                    , sms_trips_alert: sms_trips_alert
                }
                , success: (data) => {
                    if (data.state == 'success') {
                        // alert('Updated successfully.');
                        $("#success_msg").css('display', 'block');
                        $('#success_msg_content').html("@lang('message.notification_success')");
                    } else {
                        $('#popup-input-value').modal('show');
                    }
                }
                , error: function(data) {
                    console.log(data);
                }
            });
        });
    })
</script>