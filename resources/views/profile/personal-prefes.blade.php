<div class="personal-content--main">
  <div class="personal-content--header">
    <h3 class="personal-content--header--title">@lang('front.profile.preference_tab.preference')</h3>
  </div>
  <div class="personal-content--body">
    <ul class="personal-content--prefes--list row">
      <li class="personal-content--prefes--item">
        <div class="personal-content--prefes--title">Разговорчивость</div>
        <div class="account-control--prefer--item personal-content--prefes--icon">
          <svg class="icon icon-ac-chat ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#ac-chat') }}"></use>
          </svg>
        </div>
        <ul class="personal-content--prefes--item__rules">
          <li class="personal-content--prefes--item__rules__item personal-rules--red @if(Auth::user()->preference != null && Auth::user()->preference->dialog_allowed == 'block') active @endif" data-state="block">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-x">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-x') }}"></use>
              </svg>
            </div>
          </li>
          <li class="personal-content--prefes--item__rules__item personal-rules--orange @if(Auth::user()->preference != null && Auth::user()->preference->dialog_allowed == 'may') active @endif" data-state="may">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-ok ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-ok') }}"></use>
              </svg>
            </div>
          </li>
          <li class="personal-content--prefes--item__rules__item personal-rules--green @if(Auth::user()->preference != null && Auth::user()->preference->dialog_allowed == 'allow') active @endif" data-state="allow">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-ok ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-ok') }}"></use>
              </svg>
            </div>
          </li>
        </ul>
      </li>
      <li class="personal-content--prefes--item">
        <div class="personal-content--prefes--title">Музыка</div>
        <div class="account-control--prefer--item personal-content--prefes--icon">
          <svg class="icon icon-ac-head ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#ac-head') }}"></use>
          </svg>
        </div>
        <ul class="personal-content--prefes--item__rules">
          <li class="personal-content--prefes--item__rules__item personal-rules--red @if(Auth::user()->preference != null && Auth::user()->preference->music_allowed == 'block') active @endif" data-state="block">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-x ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-x') }}"></use>
              </svg>
            </div>
          </li>
          <li class="personal-content--prefes--item__rules__item personal-rules--orange  @if(Auth::user()->preference != null && Auth::user()->preference->music_allowed == 'may') active @endif" data-state="may">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-ok ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-ok') }}"></use>
              </svg>
            </div>
          </li>
          <li class="personal-content--prefes--item__rules__item personal-rules--green @if(Auth::user()->preference != null && Auth::user()->preference->music_allowed == 'allow') active @endif" data-state="allow">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-ok ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-ok') }}"></use>
              </svg>
            </div>
          </li>
        </ul>
      </li>
      <li class="personal-content--prefes--item">
        <div class="personal-content--prefes--title">Животные</div>
        <div class="account-control--prefer--item personal-content--prefes--icon">
          <svg class="icon icon-dog ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#dog') }}"></use>
          </svg>
        </div>
        <ul class="personal-content--prefes--item__rules">
          <li class="personal-content--prefes--item__rules__item personal-rules--red @if(Auth::user()->preference != null && Auth::user()->preference->pet_allowed == 'block') active @endif" data-state="block">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-x ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-x') }}"></use>
              </svg>
            </div>
          </li>
          <li class="personal-content--prefes--item__rules__item personal-rules--orange @if(Auth::user()->preference != null && Auth::user()->preference->pet_allowed == 'may') active @endif" data-state="may">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-ok ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-ok') }}"></use>
              </svg>
            </div>
          </li>
          <li class="personal-content--prefes--item__rules__item personal-rules--green @if(Auth::user()->preference != null && Auth::user()->preference->pet_allowed == 'allow') active @endif" data-state="allow">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-ok ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-ok') }}"></use>
              </svg>
            </div>
          </li>
        </ul>
      </li>
      <li class="personal-content--prefes--item">
        <div class="personal-content--prefes--title">Курение</div>
        <div class="account-control--prefer--item personal-content--prefes--icon">
          <svg class="icon icon-smoke ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#smoke') }}"></use>
          </svg>
        </div>
        <ul class="personal-content--prefes--item__rules">
          <li class="personal-content--prefes--item__rules__item personal-rules--red @if(Auth::user()->preference != null && Auth::user()->preference->smoking_allowed == 'block') active @endif" data-state="block">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-x ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-x') }}"></use>
              </svg>
            </div>
          </li>
          <li class="personal-content--prefes--item__rules__item personal-rules--orange @if(Auth::user()->preference != null && Auth::user()->preference->smoking_allowed == 'may') active @endif" data-state="may">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-ok ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-ok') }}"></use>
              </svg>
            </div>
          </li>
          <li class="personal-content--prefes--item__rules__item personal-rules--green @if(Auth::user()->preference != null && Auth::user()->preference->smoking_allowed == 'allow') active @endif" data-state="allow">
            <div class="account-control--submited--icon">
              <svg class="icon icon-rules-ok ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#rules-ok') }}"></use>
              </svg>
            </div>
          </li>
        </ul>
      </li>
    </ul>
    <div class="gogocar-yellow-button" id="preferences_save">@lang('front.profile.license_tab.save')
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {

      // preferences
    $("#preferences_save").on('click', function (e) {
        e.preventDefault();

        let chat = $('.personal-content--prefes--list .personal-content--prefes--item:eq(0) .personal-content--prefes--item__rules .active').data('state');
        let music = $('.personal-content--prefes--list .personal-content--prefes--item:eq(1) .personal-content--prefes--item__rules .active').data('state');
        let pet = $('.personal-content--prefes--list .personal-content--prefes--item:eq(2) .personal-content--prefes--item__rules .active').data('state');
        let smoke = $('.personal-content--prefes--list .personal-content--prefes--item:eq(3) .personal-content--prefes--item__rules .active').data('state');
        chat == undefined && (chat = 'may');
        music == undefined && (music = 'may');
        pet == undefined && (pet = 'may');
        smoke == undefined && (smoke = 'may');

        const formData = new FormData();
        // var formData = new FormData(this);
        formData.append('chat', chat);
        formData.append('music', music);
        formData.append('pet', pet);
        formData.append('smoke', smoke);
        $.ajax({
            type: 'POST',
            url: '/updatePreference',
            data: formData,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            // data:{user_id:user_id,teacher_id:teacher_id, courses_id:courses_id, _token: token, body:text},
            success: function (data) {
                // alert(data);
                if (data.state == 'success') {
                    $("#success_msg").css('display', 'block');
                    $('#success_msg_content').html("@lang('message.profile.preference_update')");
                    // window.location.replace(profile_url);
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('ajax Error');
            }

        });

    });
    // end preferences

  });
</script>