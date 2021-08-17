<div class="header-panel--fixed">
    <a class="header-panel--fixed--item" @if(Auth::user()) href="{{ route('choosetype', app()->getLocale()) }}" @else href="/" data-toggle="modal" data-target="#popup-login" @endif>
        <svg class="icon icon-car-f ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#car-f')}}"></use>
        </svg><span>@lang('front.mobile_footer.trip')</span>
    </a>
    <a class="header-panel--fixed--item" href="{{ route('search', app()->getLocale()) }}">
        <svg class="icon icon-search-f ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#search-f')}}"></use>
        </svg><span>@lang('front.mobile_footer.search')</span>
    </a>
    <a class="header-panel--fixed--item hpfi-main" @if(Auth::user()) href="{{ route('choosetype', app()->getLocale()) }}" @else href="/" data-toggle="modal" data-target="#popup-login" @endif>
        <svg class="icon icon-gogocar-f ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#gogocar-f')}}"></use>
        </svg>
    </a>
    <a class="header-panel--fixed--item" @if(Auth::user()) href="{{ route('personal-message', app()->getLocale()) }}" @else href="/" data-toggle="modal" data-target="#popup-login" @endif>
        <svg class="icon icon-chat-f ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#chat-f')}}"></use>
        </svg><span>@lang('front.mobile_footer.message')</span>
    </a>
    <div class="header-panel--fixed--item @if(Auth::user()) gogocar-show-menu @endif" @if(!Auth::user()) data-toggle="modal" data-target="#popup-login" @endif>
        <svg class="icon icon-menu-f ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#menu-f')}}"></use>
        </svg><span>@lang('front.mobile_footer.menu')</span>
    </div>
</div>