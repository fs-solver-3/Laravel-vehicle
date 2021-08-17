 <footer>
     <div class="footer-border">
         <div class="container">
             <div class="footer-wrap">
                 <div class="col-xl-3 col-lg-3 col-md-3 footer-items"><a class="footer-logo" href="/">
                         <svg class="icon icon-logo2 ">
                             <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#logo2')}}"></use>
                         </svg></a>
                     <ul class="footer-copy--social footer-logo-social"><a class="footer-copy--social__item" href="/">
                             <svg class="icon icon-facebook ">
                                 <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#facebook')}}"></use>
                             </svg></a><a class="footer-copy--social__item" href="/">
                             <svg class="icon icon-instagram ">
                                 <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#instagram')}}"></use>
                             </svg></a><a class="footer-copy--social__item" href="/">
                             <svg class="icon icon-twitter ">
                                 <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#twitter')}}"></use>
                             </svg></a><a class="footer-copy--social__item" href="/">
                             <svg class="icon icon-whatsapp ">
                                 <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#whatsapp')}}"></use>
                             </svg></a></ul>
                 </div>
                 <div class="col-xl-6 col-lg-6 col-md-5 footer-items">
                     <div class="footer-pages--wrap">
                         <ul class="footer-pages-list">
                             <a class="footer-pages-item" href="{{ route('about', app()->getLocale()) }}">@lang('front.footer.about')</a>
                            <a class="footer-pages-item" href="{{ route('faq', app()->getLocale()) }}">@lang('front.footer.faq')</a>
                        </ul>
                         <ul class="footer-pages-list">
                             <a class="footer-pages-item" href="{{ route('contact', app()->getLocale()) }}">@lang('front.footer.contact')</a>
                             <a class="footer-pages-item" href="{{ route('looking', app()->getLocale()) }}">@lang('front.footer.looking')</a>
                        </ul>
                         <ul class="footer-pages-list">
                             <a class="footer-pages-item" href="{{ route('terms', app()->getLocale()) }}">@lang('front.footer.terms')</a>
                             <a class="footer-pages-item" href="{{ route('service', app()->getLocale()) }}">@lang('front.footer.service')</a>
                        </ul>
                     </div>
                 </div>
                 <div class="col-xl-3 col-lg-3 col-md-4 footer-items">
                     <div class="footer-select-list">
                         <div class="footer-country-list">
                             <div class="footer-country-item fci-choised">
                                 @if(session()->get('currency') == null || session()->get('currency') == 'UZS')
                                    <div class="footer-country-item__img currency-gocar" data-currency="UZS" style="background-image:url('{{ asset('static/img/general/lang/uz.png')}}');"></div><span>UZS</span>
                                 @else
                                    <div class="footer-country-item__img currency-gocar" data-currency="RUB" style="background-image:url('{{ asset('static/img/general/lang/ru.png')}}');"></div><span>RUB</span>
                                 @endif
                                 <svg class="icon icon-arrow-right3 ">
                                     <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3')}}"></use>
                                 </svg>
                             </div>
                             <div class="footer-country-list--block">
                                 <div class="footer-country-item fci-choise currency-gocar" data-currency="UZS">
                                     <div class="footer-country-item__img"  style="background-image:url('{{ asset('static/img/general/lang/uz.png')}}');"></div><span>UZS</span>
                                 </div>
                                 <div class="footer-country-item fci-choise currency-gocar" data-currency="RUB">
                                     <div class="footer-country-item__img"  style="background-image:url('{{ asset('static/img/general/lang/ru.png')}}');"></div><span>RUB</span>
                                 </div>
                             </div>
                         </div>
                         <div class="footer-country-list2">
                             <div class="footer-country-item2">
                                 @if(app()->getLocale() == 'ru')
                                 <div class="footer-country-item__img" style="background-image:url('{{ asset('static/img/general/lang/ru.png')}}');"></div>
                                 @endif
                                 @if(app()->getLocale() == 'uz')
                                 <div class="footer-country-item__img" style="background-image:url('{{ asset('static/img/general/lang/uz.png')}}');"></div>
                                 @endif
                                 <svg class="icon icon-arrow-right3 ">
                                     <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3')}}"></use>
                                 </svg>
                             </div>
                             @include('includes.user_flag')
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="footer-copyright">
             <div class="container">
                 <div class="footer-copy--wrap">
                     <div class="footer-copy--info">GoGoCar, {{ now()->year }} ©</div>
                     <ul class="footer-copy--social"><a class="footer-copy--social__item" href="/">
                             <svg class="icon icon-facebook ">
                                 <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#facebook')}}"></use>
                             </svg></a><a class="footer-copy--social__item" href="/">
                             <svg class="icon icon-instagram ">
                                 <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#instagram')}}"></use>
                             </svg></a><a class="footer-copy--social__item" href="/">
                             <svg class="icon icon-twitter ">
                                 <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#twitter')}}"></use>
                             </svg></a><a class="footer-copy--social__item" href="/">
                             <svg class="icon icon-whatsapp ">
                                 <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#whatsapp')}}"></use>
                             </svg></a></ul>
                 </div>
             </div>
         </div>
     </div>
    @if($current_time_zone=Session::get('current_time_zone'))@endif
    <input type="hidden" id="hd_current_time_zone" value="{{{$current_time_zone}}}">
    <script type="text/javascript">
        $(document).ready(function(){
            if($('#hd_current_time_zone').val() ==""){ // Check for hidden field is empty. if is it empty only execute the post function
                var current_date = new Date();
                curent_zone = -current_date.getTimezoneOffset() * 60;
                var token = "{{csrf_token()}}";
                $.ajax({
                    method: "POST",
                    url: "{{URL::to('ajax/set_current_time_zone/')}}",
                    data: {  '_token':token, curent_zone: curent_zone } 
                }).done(function( data ){
                });   
            }       
        });
    </script>
 </footer>
