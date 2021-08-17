@extends('layouts.user_app')
@section('content')
<div class="content">
    @php
        use Hashids\Hashids;
        $hashids = new Hashids();
    @endphp
    <section class="breadcrumbs">
        <div class="container">
            <ul class="breadcrumbs--list">
                <a class="breadcrumbs--item" href="/">@lang('front.profile.home')
                    <svg class="icon icon-arrow-right3 ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                    </svg>
                </a>
                <a class="breadcrumbs--item" href="{{ route('search', app()->getLocale()) }}">@lang('front.header.find')<span>&nbsp @lang('front.header.trip')</span>
                    <svg class="icon icon-arrow-right3 ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                    </svg>
                </a>
                <a class="breadcrumbs--item" href="{{ route('tripplan', [app()->getLocale(), 't_id'=>$hashids->encode($trip_id), 'type'=>'passenger']) }}">@lang('front.trip_detail.detail')</a>
            </ul>
        </div>
    </section>
    <section class="car-place">
        @if(count($trips) == 0)
        <div class="container">
            <form method="GET" action="{{ route('checkbooking', app()->getLocale()) }}" id="place_form">
                <div class="car-place--wrapper">
                    <h1 class="main-section--title text-center mb-5">@lang('front.car-place.where_is') <span>@lang('front.car-place.you_want') ?</span></h1>
                    {{-- car template --}}
                    
                    <section class="car-place">
                        <div class="container">
                          <div class="car-place--wrapper">
                            <div class="car-place--content">
                                @if(optional($trip->car)->template == 'car-choise-mini-bus')
                                <div class="col-xl-5 car-place--position car-choise-mini-bus @if(optional($trip->car)->template == 'car-choise-mini-bus') active @endif">
                                    <div class="car-place--svg">
                                    <svg class="icon icon-minibus " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 218.93 460.01">
                                        <defs>
                                        <lineargradient id="a" x1="41028.59" y1="18176.21" x2="41047.69" y2="18157.77" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff" stop-opacity="0"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="b" x1="43931.98" y1="16421.75" x2="43559.89" y2="16725.34" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="c" x1="39838.45" y1="25600.8" x2="39759.59" y2="25567.91" xlink:href="#b"></lineargradient>
                                        <lineargradient id="d" x1="41690.6" y1="25465.05" x2="41713.55" y2="22855.35" xlink:href="#b"></lineargradient>
                                        <lineargradient id="e" x1="44901.51" y1="16818.26" x2="41467.02" y2="19113.6" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="0.28" stop-color="#fff" stop-opacity="0.36"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="f" x1="41439.41" y1="16614.53" x2="41824.82" y2="16013.17" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff" stop-opacity="0"></stop>
                                            <stop offset="0.13" stop-color="#fff" stop-opacity="0.63"></stop>
                                            <stop offset="0.51" stop-color="#fff"></stop>
                                            <stop offset="0.85" stop-color="#fff" stop-opacity="0.7"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="g" x1="44431.33" y1="14983.69" x2="44045.93" y2="14382.34" xlink:href="#f"></lineargradient>
                                        <lineargradient id="h" x1="41338.75" y1="17723.01" x2="41338.76" y2="20039.77" xlink:href="#b"></lineargradient>
                                        <lineargradient id="i" x1="45592.51" y1="17739.11" x2="45592.5" y2="20055.88" xlink:href="#b"></lineargradient>
                                        <lineargradient id="j" x1="45613.76" y1="20377.43" x2="45613.75" y2="23246.98" xlink:href="#b"></lineargradient>
                                        <lineargradient id="k" x1="41377" y1="20299.86" x2="41377.01" y2="23169.42" xlink:href="#b"></lineargradient>
                                        <lineargradient id="l" x1="43131.94" y1="19026.95" x2="43131.95" y2="18885.26" xlink:href="#b"></lineargradient>
                                        <lineargradient id="m" x1="40842.84" y1="14663.66" x2="41214.94" y2="14967.25" xlink:href="#b"></lineargradient>
                                        <lineargradient id="n" x1="42586.44" y1="20128.68" x2="42880.58" y2="19754.98" xlink:href="#b"></lineargradient>
                                        <lineargradient id="o" x1="41800.7" y1="18670.23" x2="41497.6" y2="18475.6" xlink:href="#b"></lineargradient>
                                        <lineargradient id="p" x1="45563.01" y1="22826.46" x2="45563" y2="24674.58" xlink:href="#b"></lineargradient>
                                        <lineargradient id="q" x1="41389.49" y1="22826.44" x2="41389.5" y2="24674.56" xlink:href="#b"></lineargradient>
                                        <lineargradient id="r" x1="41588.74" y1="18082.75" x2="40095.72" y2="18082.75" xlink:href="#b"></lineargradient>
                                        <lineargradient id="s" x1="39814.92" y1="18051.13" x2="40781.35" y2="18080.7" xlink:href="#b"></lineargradient>
                                        <lineargradient id="t" x1="43459.35" y1="25405.78" x2="43459.36" y2="25276.69" xlink:href="#b"></lineargradient>
                                        <lineargradient id="u" x1="45172.41" y1="25058.11" x2="45172.41" y2="24642.55" xlink:href="#b"></lineargradient>
                                        <lineargradient id="v" x1="44047.68" y1="26859.47" x2="44126.55" y2="26826.58" xlink:href="#b"></lineargradient>
                                        <lineargradient id="x" x1="45254.89" y1="25417.46" x2="45231.95" y2="22807.76" xlink:href="#b"></lineargradient>
                                        <lineargradient id="y" x1="41773.35" y1="25074.04" x2="41773.34" y2="24658.48" xlink:href="#b"></lineargradient>
                                        <clippath id="aa" transform="translate(0.01 0)">
                                            <path d="M18.19,70.07c7.3-2.24,10.55,0,15.82,0a4.34,4.34,0,0,1,4.44,4.22v63.78A4.34,4.34,0,0,1,34,142.28c-5.27,0-11.48,2.84-15.82,0-6.69-4.36-4.2-70.92,0-72.21Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="ab" x1="41414.04" y1="16577.35" x2="41414.05" y2="18006.93" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5b5b5b"></stop>
                                            <stop offset="1"></stop>
                                        </lineargradient>
                                        <clippath id="ac" transform="translate(0.01 0)">
                                            <path d="M18.59,337.67c7.28-2.34,10.55-.14,15.82-.21a4.35,4.35,0,0,1,4.5,4.16l.81,63.78a4.34,4.34,0,0,1-4.39,4.27c-5.27.07-11.44,3-15.82.2-6.74-4.28-5.1-70.86-.92-72.2Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="ad" x1="41409.89" y1="22723.15" x2="41428.14" y2="24152.61" xlink:href="#ab"></lineargradient>
                                        <clippath id="ae" transform="translate(0.01 0)">
                                            <path d="M201.26,70.07c-7.31-2.24-10.55,0-15.82,0A4.35,4.35,0,0,0,181,74.29v63.78a4.34,4.34,0,0,0,4.45,4.21c5.27,0,11.47,2.84,15.82,0,6.68-4.36,4.2-70.92,0-72.21Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="af" x1="45528.9" y1="16577.34" x2="45528.92" y2="18006.92" xlink:href="#ab"></lineargradient>
                                        <clippath id="ag" transform="translate(0.01 0)">
                                            <path d="M200.72,337.83c-7.24-2.47-10.55-.33-15.82-.49a4.34,4.34,0,0,0-4.57,4.07q-1,31.88-2,63.75a4.34,4.34,0,0,0,4.31,4.35c5.28.17,11.39,3.19,15.82.49,6.82-4.16,6.39-70.75,2.23-72.17Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="ah" x1="45546.42" y1="22805.04" x2="45502.31" y2="24233.93" xlink:href="#ab"></lineargradient>
                                        <lineargradient id="ai" x1="43459" y1="15848.21" x2="43459.03" y2="25453.97" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#ffa406"></stop>
                                            <stop offset="0.34" stop-color="#ffcd60"></stop>
                                            <stop offset="0.64" stop-color="#f2a600"></stop>
                                            <stop offset="0.98" stop-color="#ffaf2c"></stop>
                                            <stop offset="1" stop-color="#ffc971"></stop>
                                        </lineargradient>
                                        <mask id="aj" x="40.54" y="1.5" width="74.78" height="93.04" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="40.53" y="1.5" width="74.78" height="93.04" style="fill:url(#a);"></rect>
                                            </g>
                                        </mask>
                                        <lineargradient id="ak" x1="40239.3" y1="26550.76" x2="43161.02" y2="26550.37" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5e5e5e"></stop>
                                            <stop offset="0.24" stop-color="#211f1d"></stop>
                                            <stop offset="0.7" stop-color="#333"></stop>
                                            <stop offset="0.76" stop-color="#535353"></stop>
                                            <stop offset="1" stop-color="#333"></stop>
                                        </lineargradient>
                                        <mask id="al" x="109.15" y="1.5" width="66.87" height="56.4" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="109.14" y="1.5" width="66.87" height="56.4" style="fill:url(#b);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="am" x="42.95" y="1.52" width="66.87" height="56.4" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="42.94" y="1.52" width="66.87" height="56.4" style="fill:url(#m);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="an" x="62.84" y="452.1" width="92.82" height="6.1" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="62.83" y="452.1" width="92.82" height="6.1" style="fill:url(#t);"></rect>
                                            </g>
                                        </mask>
                                        <lineargradient id="ao" x1="43463.1" y1="23141.43" x2="43463.11" y2="23760.79" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#0b0a08"></stop>
                                            <stop offset="0.37" stop-color="#292929"></stop>
                                            <stop offset="1" stop-color="#1d1d1d"></stop>
                                        </lineargradient>
                                        <lineargradient id="ap" x1="43481.11" y1="18510.86" x2="43481.12" y2="19130.22" xlink:href="#ao"></lineargradient>
                                        <lineargradient id="aq" x1="43480.66" y1="16797.64" x2="43480.68" y2="16456.02" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#212023"></stop>
                                            <stop offset="1" stop-color="#312e34"></stop>
                                        </lineargradient>
                                        <lineargradient id="ar" x1="43482.65" y1="16957.86" x2="43482.68" y2="16539.72" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#4c4c4c"></stop>
                                            <stop offset="1" stop-color="#212023"></stop>
                                        </lineargradient>
                                        <mask id="as" x="163.47" y="426.75" width="28.61" height="18.82" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="163.46" y="426.75" width="28.61" height="18.82" style="fill:url(#u);"></rect>
                                            </g>
                                        </mask>
                                        <lineargradient id="at" x1="45243.87" y1="26270.81" x2="45384.99" y2="26059.52" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="1" stop-color="#1f1b20"></stop>
                                        </lineargradient>
                                        <mask id="au" x="163.22" y="437.48" width="22.07" height="8.41" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="163.21" y="437.48" width="22.07" height="8.41" style="fill:url(#v);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="aw" x="166.8" y="359.34" width="28.56" height="84.96" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="166.79" y="359.34" width="28.56" height="84.96" style="fill:url(#x);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="ax" x="27.51" y="427.44" width="28.61" height="18.82" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="27.5" y="427.44" width="28.61" height="18.82" style="fill:url(#y);"></rect>
                                            </g>
                                        </mask>
                                        <lineargradient id="ay" x1="40593.45" y1="24628.59" x2="40452.32" y2="24417.3" xlink:href="#at"></lineargradient>
                                        <mask id="az" x="34.31" y="438.18" width="22.07" height="8.41" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="34.3" y="438.18" width="22.07" height="8.41" style="fill:url(#c);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="bb" x="24.23" y="360.03" width="28.56" height="84.96" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="24.22" y="360.03" width="28.56" height="84.96" style="fill:url(#d);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="bc" x="34.15" y="65.26" width="151.58" height="60.35" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="34.14" y="65.26" width="151.58" height="60.33" style="fill:url(#e);"></rect>
                                            </g>
                                        </mask>
                                        <lineargradient id="bd" x1="40742.22" y1="17495.48" x2="41060.4" y2="17397.85" gradientTransform="translate(-1629.12 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#171614"></stop>
                                            <stop offset="1" stop-color="#575757"></stop>
                                        </lineargradient>
                                        <lineargradient id="be" x1="40755" y1="17083.67" x2="42090.59" y2="17062.37" xlink:href="#bd"></lineargradient>
                                        <lineargradient id="bf" x1="42909.24" y1="16279.22" x2="42602.86" y2="16151.07" xlink:href="#bd"></lineargradient>
                                        <lineargradient id="bg" x1="42483.09" y1="16776.04" x2="41156.55" y2="16624.64" xlink:href="#bd"></lineargradient>
                                        <lineargradient id="bh" x1="43472" y1="17486.94" x2="43472" y2="17805.45" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#585959"></stop>
                                            <stop offset="1"></stop>
                                        </lineargradient>
                                        <mask id="bi" x="32.47" y="10.26" width="26.39" height="24.17" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="32.46" y="10.26" width="26.39" height="24.14" style="fill:url(#f);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="bj" x="159.53" y="10.25" width="26.39" height="24.16" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="159.52" y="10.25" width="26.39" height="24.14" style="fill:url(#g);"></rect>
                                            </g>
                                        </mask>
                                        <lineargradient id="bk" x1="40913.9" y1="16465.38" x2="40964.87" y2="16664.42" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#c82c2c"></stop>
                                            <stop offset="1" stop-color="#be701c"></stop>
                                        </lineargradient>
                                        <lineargradient id="bl" x1="45358.34" y1="16384.36" x2="45409.31" y2="16583.4" xlink:href="#bk"></lineargradient>
                                        <lineargradient id="bm" x1="40533.75" y1="18483.27" x2="39885.41" y2="18893.29" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#232026"></stop>
                                            <stop offset="1" stop-color="#636363"></stop>
                                        </lineargradient>
                                        <lineargradient id="bn" x1="45079.72" y1="18601.37" x2="44431.38" y2="19011.4" xlink:href="#bm"></lineargradient>
                                        <mask id="bo" x="23.25" y="110.03" width="2.36" height="72.48" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="23.24" y="110.03" width="2.36" height="72.48" style="fill:url(#h);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="bp" x="193.4" y="110.73" width="2.36" height="72.48" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="193.39" y="110.73" width="2.36" height="72.48" style="fill:url(#i);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="bq" x="194.25" y="221.74" width="2.36" height="89.64" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="194.24" y="221.74" width="2.36" height="89.64" style="fill:url(#j);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="br" x="24.78" y="218.38" width="2.36" height="89.64" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="24.77" y="218.38" width="2.36" height="89.64" style="fill:url(#k);"></rect>
                                            </g>
                                        </mask>
                                        <lineargradient id="bs" x1="40322.41" y1="20080.5" x2="43393.01" y2="20080.5" gradientTransform="translate(-1629.12 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#1c1c1c"></stop>
                                            <stop offset="0.43" stop-color="#474747"></stop>
                                            <stop offset="1" stop-color="#515151"></stop>
                                        </lineargradient>
                                        <lineargradient id="bt" x1="41276.69" y1="19225.02" x2="41685.47" y2="19225" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#1d1d1d"></stop>
                                            <stop offset="0.14" stop-color="#434344"></stop>
                                            <stop offset="0.39" stop-color="#555"></stop>
                                            <stop offset="0.52" stop-color="#353637"></stop>
                                            <stop offset="1" stop-color="#1e1e20"></stop>
                                        </lineargradient>
                                        <lineargradient id="bu" x1="41500.59" y1="19609.97" x2="41232.16" y2="19609.97" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#383838"></stop>
                                            <stop offset="0.21" stop-color="#636363"></stop>
                                            <stop offset="0.3" stop-color="#494949"></stop>
                                            <stop offset="0.43" stop-color="#363636"></stop>
                                            <stop offset="1" stop-color="#323232"></stop>
                                        </lineargradient>
                                        <mask id="bv" x="89.9" y="177.7" width="12.51" height="5.36" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="89.89" y="177.7" width="12.51" height="5.36" style="fill:url(#l);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="bw" x="89.9" y="154.81" width="1.63" height="28.26" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="89.89" y="154.81" width="1.63" height="28.26" style="fill:url(#n);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="bx" x="100.3" y="154.81" width="2.11" height="28.26" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="100.29" y="154.81" width="2.11" height="28.26" style="fill:url(#o);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="by" x="192.22" y="334.3" width="2.36" height="57.93" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="192.21" y="334.3" width="2.36" height="57.93" style="fill:url(#p);"></rect>
                                            </g>
                                        </mask>
                                        <mask id="bz" x="25.28" y="334.3" width="2.36" height="57.93" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="25.27" y="334.3" width="2.36" height="57.93" style="fill:url(#q);"></rect>
                                            </g>
                                        </mask>
                                        <lineargradient id="ca" x1="42390.33" y1="18579.3" x2="42394.76" y2="18890.31" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#181818"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="0.79" stop-color="#565656"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="cb" x1="40315.21" y1="19013.45" x2="40482.98" y2="19013.4" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#161616"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="cc" x1="40918.48" y1="19013.34" x2="41086.23" y2="19013.29" xlink:href="#cb"></lineargradient>
                                        <lineargradient id="cd" x1="40518.84" y1="18903.24" x2="40917.72" y2="18903.22" xlink:href="#cb"></lineargradient>
                                        <lineargradient id="ce" x1="40516.29" y1="19230.35" x2="40915.16" y2="19230.36" xlink:href="#cb"></lineargradient>
                                        <lineargradient id="cf" x1="42384.66" y1="18610.83" x2="42387.53" y2="18816.59" xlink:href="#ca"></lineargradient>
                                        <lineargradient id="cg" x1="42400.05" y1="18925.83" x2="42402.24" y2="19070.28" xlink:href="#ca"></lineargradient>
                                        <lineargradient id="ch" x1="40422.94" y1="18681.21" x2="40988.14" y2="18670.02" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#181818"></stop>
                                            <stop offset="0.48" stop-color="#383838"></stop>
                                            <stop offset="0.67" stop-color="#3c3c3c"></stop>
                                            <stop offset="0.79" stop-color="#565656"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="ci" x1="40327.59" y1="19729.49" x2="40754.06" y2="19729.45" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#292929"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="cj" x1="43846.95" y1="18577.69" x2="43851.38" y2="18888.71" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#494949"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="0.79" stop-color="#888"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="ck" x1="41658.5" y1="19013.34" x2="41826.27" y2="19013.29" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#464646"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="cl" x1="42261.77" y1="19013.35" x2="42429.54" y2="19013.3" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="cm" x1="41862.16" y1="18903.06" x2="42261.05" y2="18903.04" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="cn" x1="41859.58" y1="19230.38" x2="42258.47" y2="19230.39" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="co" x1="43841.39" y1="18609.24" x2="43844.26" y2="18815" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="cp" x1="43856.9" y1="18924.11" x2="43859.09" y2="19068.56" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="cq" x1="41766.28" y1="18683.46" x2="42331.49" y2="18672.27" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#494949"></stop>
                                            <stop offset="0.48" stop-color="#696969"></stop>
                                            <stop offset="0.67" stop-color="#6d6d6d"></stop>
                                            <stop offset="0.79" stop-color="#888"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="cr" x1="41670.91" y1="19729.25" x2="42097.38" y2="19729.21" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5a5a5a"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="cs" x1="44754.81" y1="18576.69" x2="44759.24" y2="18887.7" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="ct" x1="42495.82" y1="19013.36" x2="42663.58" y2="19013.31" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="cu" x1="43099.09" y1="19013.37" x2="43266.85" y2="19013.32" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="cv" x1="42699.47" y1="18903.01" x2="43098.36" y2="18902.99" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="cw" x1="42696.9" y1="19230.4" x2="43095.78" y2="19230.41" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="cx" x1="44749.33" y1="18608.25" x2="44752.21" y2="18814.01" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="cy" x1="44764.76" y1="18923.04" x2="44766.95" y2="19067.49" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="cz" x1="42603.62" y1="18684.85" x2="43168.83" y2="18673.66" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="da" x1="42508.23" y1="19729.17" x2="42934.7" y2="19729.13" xlink:href="#cr"></lineargradient>
                                        <mask id="db" x="51.57" y="94.25" width="31.22" height="27.33" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="51.56" y="94.25" width="31.22" height="27.32" style="fill:url(#r);"></rect>
                                            </g>
                                        </mask>
                                        <lineargradient id="dc" x1="40342.29" y1="18083.06" x2="41043.65" y2="18083.06" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#242424"></stop>
                                            <stop offset="0.43" stop-color="#323232"></stop>
                                            <stop offset="0.76" stop-color="#5c5c5c"></stop>
                                            <stop offset="1" stop-color="#292929"></stop>
                                        </lineargradient>
                                        <mask id="dd" x="58.84" y="102.35" width="3.73" height="14.54" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0.01 0)">
                                            <rect x="58.83" y="102.35" width="3.73" height="14.54" style="fill:url(#s);"></rect>
                                            </g>
                                        </mask>
                                        <lineargradient id="de" x1="40249.62" y1="18472.94" x2="40563.1" y2="18472.94" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#171717"></stop>
                                            <stop offset="0.43" stop-color="#1d1d1f"></stop>
                                            <stop offset="0.76" stop-color="#444545"></stop>
                                            <stop offset="1" stop-color="#242424"></stop>
                                        </lineargradient>
                                        <lineargradient id="df" x1="40462.22" y1="18479.38" x2="40873.69" y2="18479.38" xlink:href="#de"></lineargradient>
                                        <lineargradient id="dg" x1="42321.59" y1="18844.33" x2="42532.05" y2="18415.19" gradientTransform="translate(-1629.13 -615.4) scale(0.04)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#292929"></stop>
                                            <stop offset="0.43" stop-color="#373737"></stop>
                                            <stop offset="0.76" stop-color="gray"></stop>
                                            <stop offset="1" stop-color="#292929"></stop>
                                        </lineargradient>
                                        <lineargradient id="dh" x1="40325.37" y1="18689.88" x2="41062.77" y2="18689.88" xlink:href="#de"></lineargradient>
                                        <lineargradient id="di" x1="44601.49" y1="23333.26" x2="44601.51" y2="22892.04" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="dj" x1="43040.19" y1="24411.34" x2="43305.98" y2="24406.79" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="dk" x1="43071.27" y1="24415.09" x2="43228.6" y2="24412.63" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="dl" x1="44563.87" y1="22775.76" x2="44563.84" y2="22907.95" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="dm" x1="44563.3" y1="23514" x2="44563.27" y2="23381.81" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="dn" x1="44239.43" y1="23382.44" x2="44230.99" y2="22808.82" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="do" x1="45109.64" y1="23531.2" x2="45109.62" y2="23079.35" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="dp" x1="45107.25" y1="22762.9" x2="45107.23" y2="23214.75" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="dq" x1="44601.49" y1="24227.35" x2="44601.52" y2="23786.13" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="dr" x1="43041.49" y1="25380.82" x2="43307.28" y2="25376.27" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="ds" x1="43072.37" y1="25384.44" x2="43229.7" y2="25381.99" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="dt" x1="44563.87" y1="23669.86" x2="44563.84" y2="23802.04" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="du" x1="44563.29" y1="24408.09" x2="44563.26" y2="24275.9" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="dv" x1="44238.32" y1="24276.55" x2="44229.88" y2="23702.93" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="dw" x1="45109.64" y1="24425.29" x2="45109.62" y2="23973.44" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="dx" x1="45107.25" y1="23656.99" x2="45107.23" y2="24108.85" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="dy" x1="44601.48" y1="22439.09" x2="44601.51" y2="21997.87" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="dz" x1="43038.9" y1="23441.7" x2="43304.69" y2="23437.15" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="ea" x1="43070.09" y1="23445.48" x2="43227.42" y2="23443.02" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="eb" x1="44564.33" y1="21881.59" x2="44564.3" y2="22013.78" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="ec" x1="44563.32" y1="22619.83" x2="44563.29" y2="22487.64" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="ed" x1="44240.54" y1="22488.25" x2="44232.1" y2="21914.63" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="ee" x1="45109.65" y1="22637.03" x2="45109.63" y2="22185.18" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="ef" x1="45107.25" y1="21868.73" x2="45107.23" y2="22320.58" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="eg" x1="42337.39" y1="23333.02" x2="42337.36" y2="22891.8" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="eh" x1="40308.91" y1="24349.76" x2="40043.12" y2="24345.21" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="ei" x1="40277.66" y1="24358.94" x2="40120.33" y2="24356.48" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="ej" x1="42374.83" y1="22774.96" x2="42374.86" y2="22907.15" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="ek" x1="42375.65" y1="23514.8" x2="42375.68" y2="23382.61" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="el" x1="42698.55" y1="23435.25" x2="42706.99" y2="22861.63" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="em" x1="41829.14" y1="23531.41" x2="41829.17" y2="23079.56" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="en" x1="41831.47" y1="22762.71" x2="41831.5" y2="23214.56" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="eo" x1="42337.39" y1="24227.11" x2="42337.36" y2="23785.89" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="ep" x1="40307.62" y1="25319.36" x2="40041.82" y2="25314.81" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="eq" x1="40276.56" y1="25327.85" x2="40119.23" y2="25325.4" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="er" x1="42374.84" y1="23669.06" x2="42374.86" y2="23801.24" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="es" x1="42375.67" y1="24408.89" x2="42375.7" y2="24276.7" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="et" x1="42699.66" y1="24329.37" x2="42708.1" y2="23755.75" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="eu" x1="41829.14" y1="24425.5" x2="41829.17" y2="23973.65" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="ev" x1="41831.47" y1="23656.8" x2="41831.5" y2="24108.66" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="ew" x1="42337.4" y1="22438.85" x2="42337.37" y2="21997.63" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="ex" x1="40310.2" y1="23380.25" x2="40044.41" y2="23375.7" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="ey" x1="40278.84" y1="23389.34" x2="40121.51" y2="23386.88" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="ez" x1="42375.12" y1="21880.79" x2="42375.15" y2="22012.98" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="fa" x1="42375.63" y1="22620.63" x2="42375.66" y2="22488.44" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="fb" x1="42697.44" y1="22541.07" x2="42705.88" y2="21967.45" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="fc" x1="41829.13" y1="22637.24" x2="41829.16" y2="22185.38" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="fd" x1="41831.48" y1="21868.54" x2="41831.51" y2="22320.39" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="fe" x1="41127.71" y1="20927.54" x2="41568.92" y2="20927.52" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="ff" x1="43098.04" y1="19692.5" x2="43102.58" y2="19426.73" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="fg" x1="43090.26" y1="19656.93" x2="43092.73" y2="19499.6" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="fh" x1="41684.99" y1="20968.19" x2="41552.8" y2="20968.22" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="fi" x1="40945.48" y1="20967.55" x2="41077.67" y2="20967.58" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="fj" x1="41036.36" y1="21248.52" x2="41609.97" y2="21256.97" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="fk" x1="40927.77" y1="20425.35" x2="41379.62" y2="20425.38" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="fl" x1="41698.34" y1="20421.22" x2="41246.49" y2="20421.25" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="fm" x1="40233.62" y1="20927.58" x2="40674.83" y2="20927.56" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="fn" x1="42128.5" y1="19691.28" x2="42133.05" y2="19425.5" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="fo" x1="42120.78" y1="19655.75" x2="42123.24" y2="19498.42" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="fp" x1="40790.9" y1="20967.57" x2="40658.71" y2="20967.6" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="fq" x1="40051.4" y1="20966.82" x2="40183.57" y2="20966.85" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="fr" x1="40142.25" y1="21249.63" x2="40715.87" y2="21258.08" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="fs" x1="40033.68" y1="20425.29" x2="40485.53" y2="20425.32" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="ft" x1="40804.23" y1="20421.4" x2="40352.38" y2="20421.43" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="fu" x1="42021.88" y1="20927.5" x2="42463.09" y2="20927.48" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="fv" x1="44067.69" y1="19693.79" x2="44072.23" y2="19428.01" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="fw" x1="44060.4" y1="19658.11" x2="44062.86" y2="19500.78" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="fx" x1="42579.15" y1="20967.61" x2="42446.97" y2="20967.64" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="fy" x1="41839.65" y1="20966.76" x2="41971.84" y2="20966.79" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="fz" x1="41930.55" y1="21246.66" x2="42504.17" y2="21255.11" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="ga" x1="41821.94" y1="20425.41" x2="42273.8" y2="20425.44" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="gb" x1="42592.51" y1="20421.16" x2="42140.66" y2="20421.19" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="gc" x1="41126.27" y1="22169.1" x2="41567.49" y2="22169.12" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="gd" x1="43063.35" y1="21373.19" x2="43067.89" y2="21638.98" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="ge" x1="43058.49" y1="21408.67" x2="43060.95" y2="21566" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="gf" x1="41684.53" y1="22128.53" x2="41552.34" y2="22128.5" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="gg" x1="40945.94" y1="22129.78" x2="41078.12" y2="22129.75" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="gh" x1="41066.27" y1="21848.75" x2="41639.89" y2="21840.31" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="gi" x1="40929.89" y1="22671.45" x2="41381.74" y2="22671.42" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="gj" x1="41696.23" y1="22675.53" x2="41244.38" y2="22675.5" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="gk" x1="40232.18" y1="22169.06" x2="40673.4" y2="22169.08" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="gl" x1="42093.71" y1="21374.42" x2="42098.26" y2="21640.21" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="gm" x1="42089.01" y1="21409.85" x2="42091.47" y2="21567.18" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="gn" x1="40790.44" y1="22128.99" x2="40658.25" y2="22128.96" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="go" x1="40051.85" y1="22129.76" x2="40184.03" y2="22129.73" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="gp" x1="40172.16" y1="21847.65" x2="40745.79" y2="21839.2" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="gq" x1="40035.8" y1="22671.51" x2="40487.65" y2="22671.48" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="gr" x1="40802.16" y1="22675.35" x2="40350.31" y2="22675.32" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="gs" x1="42740.49" y1="22169.28" x2="43181.71" y2="22169.31" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="gt" x1="44813.77" y1="21370.79" x2="44818.32" y2="21636.58" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="gu" x1="44809.04" y1="21406.67" x2="44811.49" y2="21564" xlink:href="#cj"></lineargradient>
                                        <lineargradient id="gv" x1="43298.76" y1="22128.44" x2="43166.58" y2="22128.41" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="gw" x1="42560.17" y1="22129.81" x2="42692.36" y2="22129.78" xlink:href="#ck"></lineargradient>
                                        <lineargradient id="gx" x1="42680.53" y1="21850.76" x2="43254.15" y2="21842.32" xlink:href="#cq"></lineargradient>
                                        <lineargradient id="gy" x1="42544.13" y1="22671.34" x2="42995.98" y2="22671.31" xlink:href="#cr"></lineargradient>
                                        <lineargradient id="gz" x1="43310.47" y1="22675.64" x2="42858.61" y2="22675.61" xlink:href="#cr"></lineargradient>
                                        </defs>
                                        <path d="M18.19,70.07c7.3-2.24,10.55,0,15.82,0a4.34,4.34,0,0,1,4.44,4.22v63.78A4.34,4.34,0,0,1,34,142.28c-5.27,0-11.48,2.84-15.82,0-6.69-4.36-4.2-70.92,0-72.21Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#aa);">
                                        <path d="M25.72,102.76a8.56,8.56,0,0,1-2.18-1.43l-.07,4.39c.44.33.91.63,1.36,1a42.15,42.15,0,0,0,4.3,3.59,6.86,6.86,0,0,0,1.58-1.25c1.1-1,.69-1.19.7-3.81v-1.38c-.84.59-2.07,2-3.09,1.7-.25-.8-.21-.44.31-1l2.78-2.24V98.22c-.73.31-4.67,4-5.7,4.54ZM40,71H37.17v2.3a5.68,5.68,0,0,0,1.48-1Zm-2.84,71.5h3v-3.34c-.89.37-.72.51-1.4,1.14a6,6,0,0,1-1.58,1.07v1.13Zm-19.11,0h4a26.77,26.77,0,0,0-4-3.36ZM23.12,71H18.28l3.45,3.08a7.71,7.71,0,0,0,1.34.91Zm-6,71.5h.57v-3.77a18.81,18.81,0,0,0-3-2.42v4a21,21,0,0,1,2.45,2.17ZM37.17,93.84v3.41c1.13-.47.84-.58,1.69-1.31,1.59-1.35,1.34-.27,1.35-3.8v-1.3C39.67,91.11,37.17,92.93,37.17,93.84ZM14.66,80.1l3,2.41c.09-1.2.32-3.39-.23-4.23a19,19,0,0,0-2.77-2.2Zm23.45,46.63c2.68-2.41,2.14-.48,2.11-5.8-.94.35-1.14,1.25-3,2.23v4.19l1-.62ZM17.68,112.59c.11-5.28.1-3.76-1.61-5.33-.62-.56-.59-.83-1.39-1.09,0,1.17-.38,3.51.22,4.3Zm-3-14.32,3,2.43.05-4.31-3-2.45Zm22.51-8.66v2a19,19,0,0,0,3-2.35l.09-4.37a14.3,14.3,0,0,0-2.15,1.63c-1.12,1.06-.91,1.34-.91,3.09Zm2.55,24.25c.82-.77.49-3.18.5-4.84-3.51,2.32-3,1.85-3.06,6.72ZM37.17,84.32v1.32a20.94,20.94,0,0,0,3.06-2.33v-4.4c-.37.26-.7.47-1.07.76-2.31,1.79-2,1.81-2,4.65ZM14.65,124.05c.14,5.62-.85,3.38,1.79,5.72.63.56.42.74,1.23,1,0-1.19.41-3.62-.25-4.46,0,0-1.21-1.15-1.35-1.26A8.26,8.26,0,0,0,14.65,124.05Zm.07-6c-.63,5.29.35,4.43,1.7,5.81a3.08,3.08,0,0,0,1.26.94v-4.29c-.93-.79-2-1.75-3-2.46Zm.4-43.13c.05,0,2.4,1.85,2.57,1.92,0-6.5-1-5.58-2.23-4.43-.85.79-1.39,1.59-.34,2.52Zm22,46.77c4.1-2.51,3.08-3.1,3.06-6.72-.7.24-1.47,1.36-3,2.22ZM17.62,94.75c.8-5-.54-4.71-1.57-5.66-.61-.55-.61-.79-1.36-1.1-.19,3.62-.67,3.9,1.59,5.75.45.37,1.1.73,1.34,1ZM37.24,105l-.07,4.78a18.79,18.79,0,0,0,3.06-2.34v-4.67c-.87.38-.75.51-1.42,1.14A6.79,6.79,0,0,1,37.24,105Zm0,30.09v4.82a11.11,11.11,0,0,0,2.9-2.43c.36-.77.17-3.71.08-4.72-.47.53-.9.69-1.48,1.28a3.38,3.38,0,0,1-1.45,1.05ZM14.67,116.44a14.36,14.36,0,0,1,1.5,1.31c.47.46,1.11.82,1.46,1.12.13-.93.26-4-.12-4.72a15.89,15.89,0,0,0-2.85-2.32v4.61ZM37.2,133.6c1.39-.68,1.26-1.19,3-2.33v-4.68C36.54,129,37.08,128.93,37.2,133.6ZM17.7,88.75c0-1.12.3-3.85-.18-4.64a15.48,15.48,0,0,0-2.87-2.36c0,1.16-.3,3.85.21,4.67A13.84,13.84,0,0,0,17.7,88.75Zm19.66-9.07a7.24,7.24,0,0,0,1.41-1.18c.47-.46.92-.73,1.43-1.16V72.56a5.84,5.84,0,0,0-1.44,1.08c-.7.72-.93.77-1.54,1.37a13.1,13.1,0,0,0,.13,4.67Zm-22.71,55A12.6,12.6,0,0,1,16.19,136a6.23,6.23,0,0,0,1.46,1.15c.45-4.25.41-5-3-7.08v4.65Zm22.53-31.16a12.52,12.52,0,0,0,2.71-2.15c.76-.93.31-3.47.35-4.83-4.11,2.34-3,3.36-3.06,6.95Zm-19.48,3.4c-.06-2.59,1.13-5-3.06-7,0,1.21-.3,3.79.23,4.68A13.68,13.68,0,0,0,17.7,106.92Zm6.17,35.56h7.55l-.07-2.25c-2.22,1.61-2,2.48-5.17-.71a19.55,19.55,0,0,0-2.72-2.16c0,1.86-.3,4.28.41,5.12Zm8-40.68,2.72-2.25c2.54-2,2.32-1.37,2.22-5.86l-3.6,2.88c-1.29,1.24-1.33.89-1.43,1.9A20.59,20.59,0,0,0,31.87,101.8Zm-.05,30.1c1.08-.56,4.2-3.54,5-4v-4.09A12.78,12.78,0,0,0,35.23,125c-3.64,3.14-3.57,2.34-3.44,7ZM23.13,87V83l-5-4.13c-.59,5.28.68,4.31,2.95,6.57A8.43,8.43,0,0,0,23.13,87Zm-5.06,26c1.13.82,4.1,3.61,5,4,.15-3.25.45-3.74-1.35-5.17a15.25,15.25,0,0,1-1.81-1.49A8.4,8.4,0,0,0,18.06,109v4ZM35.19,75.2l1.6-1.31V71H34.34c-3,3.48-2.53-.16-2.58,6.89Zm-3.43,67.28h2.66a15.35,15.35,0,0,1,1.3-1.25c.77-.56,1-.38,1.1-1.39v-4.15l-2.63,2a12,12,0,0,1-2.44,1.94Zm.07-50.79v4.46c1-.52,4.36-3.64,5-4v-4.4c-.86.41-3.79,3.32-5,4Zm-13.75,35.2c-.13,4.37-.36,3.84,1.17,5.34l3.86,3-.06-4.47-3.83-3c-.51-.48-.47-.67-1.14-.91Zm13.7-.64c.71-.3,4-3.27,5-4l-.06-4.39-4.24,3.5c-1.16,1.09-.75,1.86-.74,4.93Zm0-6c1.08-.54,3.87-3.31,5-4v-4.39c-.86.47-1.46,1.22-2.77,2.19-.6.45-.81.8-1.38,1.25-.74.58-.87.34-.87,1.59v3.4Zm-8.67-21c-.09-5.83.57-3.4-3.07-6.9a13.92,13.92,0,0,0-2-1.5c.09,4.08-.55,4.09,1.13,5.26l3.26,2.69c.65.49-.13,0,.69.45Zm8.67-13.53v4.47l3.81-3a2.38,2.38,0,0,0,1.22-2V81.77c-.74.31-.59.46-1.21,1ZM23.13,105.2v-4.5a9.85,9.85,0,0,1-2.49-1.9,29,29,0,0,0-2.57-2c.05,3-.5,4.1,1.08,5.28a49.94,49.94,0,0,0,4,3.12Zm-5.06,15.73c0,3-.5,4,1.17,5.38a40.13,40.13,0,0,0,3.88,3v-4.5c-1.37-.72-4.32-3.68-5-3.9Zm13.7-8.69v2.08l4.39-3.55c.88-.86.63-.55.63-2.55V105.6a35.93,35.93,0,0,0-3.18,2.59c-1.83,1.33-1.9,1.15-1.87,4Zm-13.71-4.86,5.05,4.07v-4.79a10.58,10.58,0,0,1-2.47-2l-2.56-2v4.63Zm.05,7.29c-.11,1.08,0,2.2-.06,3.29,0,1.71,0,1.51,1.11,2.29a48.21,48.21,0,0,0,4,3.12l-.06-4.58-5-4.12Zm0,18.16c-.21,2.69-.43,4.53,1,5.63a44.32,44.32,0,0,0,4,3.12l0-4.58-5-4.15Zm13.71-29.52v4.76c.9-.37.59-.42,1.31-1l3.75-3V99.39c-.87.38-3.74,3.28-5,4Zm-.06,34.86c1.67-1.09,2.56-2.12,4.07-3.2,1.06-.76,1-.82,1-2.42v-3.12c-1.06.67-1.49,1.3-2.47,2a25.88,25.88,0,0,0-2.53,2.15v4.57ZM23.12,93.28V88.5c-1.41-.69-4.17-3.59-5-3.92-.14,4-.43,4.45,1,5.48L22,92.44c.74.7.36.53,1.14.84Zm-5.06-16c1.11.75,4,3.55,5,4,0-5.94.43-4.14-1.23-5.71a9.16,9.16,0,0,0-1.28-1.13,8.48,8.48,0,0,1-1.24-1c-.65-.64-.48-.67-1.25-1v4.84Zm18-1.46-4.25,3.5v4.9c1.9-1.22,2.09-1.72,3.95-3.11S36.44,78,37,75.37c-.75.31-.08,0-.53.26-.06,0-.2.27-.28.13s-.08,0-.12.06ZM23.51,95.37v4.39a13.26,13.26,0,0,1,2,1.66L28.58,99c3.75-3.44,2.69-1.14,2.85-6.78l-2.85,2.33c-.56.52-2.56,2.21-3.07,2.17S24.14,95.72,23.51,95.37ZM29,128.64a11.9,11.9,0,0,0,1.69-1.39c1-1,.7-.62.7-2.32v-2.58c-.86.36-4.54,3.94-5.69,4.54a8.1,8.1,0,0,1-2.21-1.44l0,4.4,2.37,1.68Zm-5.56-21.36c.07,2.92-.52,4,.67,5.17l5,4.14,2.28-1.72v-4.72c-2.7,1.45-.88,2.86-5.09-.56a18,18,0,0,0-2.83-2.31ZM29.12,86.5l2.29-1.71V79.94c-3.13,2.1-1.87,1.89-3.76.47s-2.07-1.82-4.18-3.34c.08,4.13-.59,4.52,1.4,5.93.84.59,1.2,1.13,2,1.72a8.53,8.53,0,0,1,1.12.86C28.65,86.23,28.32,86.1,29.12,86.5ZM31.42,71H27.6a4.61,4.61,0,0,1-2.11,1.56l-2-1.47c0,5.25-.45,4.16,1.43,5.54,1.12.82,3.37,3.25,4.53,3.52a5.56,5.56,0,0,1,2-1.73V73.67a.13.13,0,0,0-.15.1l-1.26,1c-.49.39-.8.83-1.71.58-.13-.85,1-1.59,1.54-2,.88-.63,1.57-.78,1.58-2.36Zm-8,16.55A33.57,33.57,0,0,1,26,89.72c1,1,.25,1.63-1.19.47-.48-.39-.83-.67-1.41-1.07,0,4.84-.61,4.32,2,6.36l5.92-4.73V86.33c-2.17,1.81-2.24,2.25-5.1-.64l-2.81-2.23v4.09Zm0,36.35a7.64,7.64,0,0,1,2,1.67c1.11-.35.54-.44,2.31-1.72.81-.58,1.18-1.13,2-1.72,2.42-1.71,1.61-2.28,1.68-5.73-.88.46-1.07,1.11-2.3,1.57-1.51-.73-4.65-3.94-5.62-4.43-.18,5.15-.16,3.88,2,5.69.4.33,2,2.08.15,1.59-1-.27-1.26-1.25-2.17-1.61v4.69Zm4.81,11.76c-.11-.94,1.35-1.86,2-2.28,1.64-1.17,1.2-1.88,1.15-5.06-1.16.56-4.42,4.08-5.94,4.58l-2-1.48c.1,5.09-.39,4.18,1.55,5.6l4.1,3.41c1-.41.59-.7,2.3-1.71V134c-1.15.47-1.64,2.09-3.14,1.69Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ab);"></path>
                                        </g>
                                        <path d="M18.19,70.07c7.3-2.24,10.55,0,15.82,0a4.34,4.34,0,0,1,4.44,4.22v63.78A4.34,4.34,0,0,1,34,142.28c-5.27,0-11.48,2.84-15.82,0-6.69-4.36-4.2-70.92,0-72.21Z" transform="translate(0.01 0)" style="fill:none;"></path>
                                        <path d="M18.59,337.67c7.28-2.34,10.55-.14,15.82-.21a4.35,4.35,0,0,1,4.5,4.16l.81,63.78a4.34,4.34,0,0,1-4.39,4.27c-5.27.07-11.44,3-15.82.2-6.74-4.28-5.1-70.86-.92-72.2Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#ac);">
                                        <path d="M26.54,370.25a8.47,8.47,0,0,1-2.2-1.4v4.39c.44.33.92.62,1.37,1A41.47,41.47,0,0,0,30,377.77a6.63,6.63,0,0,0,1.57-1.27c1.08-1,.67-1.2.65-3.82V371.3c-.83.6-2,2-3.07,1.74-.25-.8-.21-.44.3-1l2.75-2.28v-4.15c-.72.32-4.62,4.07-5.64,4.61Zm13.88-31.94H37.58l.05,2.3a5.46,5.46,0,0,0,1.47-1ZM38.5,409.83h3l-.07-3.34c-.89.39-.71.52-1.38,1.16a5.93,5.93,0,0,1-1.57,1.1v1.12Zm-19.11.24,4-.05a28.75,28.75,0,0,0-4-3.3v3.35Zm4.14-71.55-4.84.06,3.5,3a7.14,7.14,0,0,0,1.34.9Zm-5.08,71.57H19v-3.78a18,18,0,0,0-3.06-2.37l.06,4a21,21,0,0,1,2.48,2.14Zm19.43-48.91v3.42c1.12-.49.83-.59,1.67-1.33,1.57-1.38,1.34-.29,1.3-3.82v-1.3c-.51.28-3,2.13-3,3ZM15.2,347.73l3,2.38c.08-1.2.28-3.4-.28-4.23a19.52,19.52,0,0,0-2.8-2.16l.06,4Zm24,46.34c2.65-2.45,2.13-.52,2-5.83-.94.36-1.13,1.26-3,2.27v4.19l.94-.63ZM18.62,380.19c.05-5.28.06-3.77-1.67-5.31-.62-.55-.6-.82-1.41-1.08,0,1.17-.33,3.52.28,4.3Zm-3.2-14.28,3,2.39V364l-3-2.41v4.33Zm22.41-9v2a19.82,19.82,0,0,0,2.94-2.39v-4.37a14.85,14.85,0,0,0-2.13,1.66c-1.1,1.07-.89,1.35-.86,3.1Zm2.85,24.22c.81-.77.45-3.18.44-4.84-3.48,2.37-2.95,1.89-3,6.76Zm-2.93-29.5V353a21.41,21.41,0,0,0,3-2.37l-.09-4.4c-.37.27-.69.48-1.06.78-2.23,1.85-1.89,1.87-1.85,4.71Zm-22,40c.21,5.61-.81,3.38,1.87,5.69.63.55.43.74,1.24,1,0-1.2.36-3.63-.3-4.46,0,0-1.24-1.13-1.38-1.24a8.34,8.34,0,0,0-1.43-1Zm0-6c-.56,5.29.41,4.42,1.78,5.78a3.25,3.25,0,0,0,1.27.93v-4.29c-.94-.79-2-1.72-3-2.42Zm-.14-43.14c.05.05,2.42,1.82,2.59,1.89,0-6.5-1.05-5.57-2.29-4.4-.85.86-1.39,1.67-.32,2.58ZM38.22,389c4.07-2.55,3-3.13,3-6.75-.7.25-1.46,1.38-3,2.25ZM18.34,362.35c.74-5.06-.61-4.7-1.65-5.64-.61-.55-.61-.78-1.37-1.08-.14,3.62-.62,3.91,1.67,5.73A16.72,16.72,0,0,1,18.34,362.35Zm19.74,10v4.78a19.13,19.13,0,0,0,3-2.38L41,370.07c-.87.39-.74.52-1.4,1.16a6.55,6.55,0,0,1-1.55,1.11Zm.37,30.09v4.81a11.48,11.48,0,0,0,2.87-2.46c.35-.78.13-3.71,0-4.72-.46.54-.89.7-1.46,1.3a3.51,3.51,0,0,1-1.41,1.06ZM15.66,384.07a14.48,14.48,0,0,1,1.52,1.3c.48.45,1.12.8,1.48,1.1.11-.94.2-4-.18-4.72a16.23,16.23,0,0,0-2.88-2.28Zm22.75,16.87c1.39-.7,1.24-1.2,3-2.36V393.9c-3.66,2.48-3.13,2.38-3,7ZM18.34,356.35c0-1.12.25-3.86-.24-4.63a15.52,15.52,0,0,0-2.9-2.33c0,1.16-.25,3.85.27,4.66A14.14,14.14,0,0,0,18.34,356.35ZM37.89,347a7.23,7.23,0,0,0,1.39-1.2c.47-.47.91-.74,1.42-1.18l-.06-4.78a5.82,5.82,0,0,0-1.42,1.1c-.69.73-.92.78-1.53,1.39A12.87,12.87,0,0,0,37.89,347Zm-22,55.26a11.61,11.61,0,0,1,1.55,1.25,6.05,6.05,0,0,0,1.48,1.13c.39-4.25.35-5-3.08-7l.05,4.65ZM38,370.84a12.54,12.54,0,0,0,2.69-2.18c.74-.94.26-3.48.28-4.84C36.9,366.25,38,367.25,38,370.84Zm-19.44,3.68c-.08-2.59,1.08-5-3.14-7,.05,1.21-.25,3.79.28,4.67a14.29,14.29,0,0,0,2.87,2.33ZM25.19,410l7.56-.1-.1-2.25c-2.2,1.64-2,2.5-5.18-.65a20,20,0,0,0-2.74-2.11C24.78,406.74,24.48,409.17,25.19,410Zm7.47-40.78,2.69-2.29c2.52-2,2.3-1.4,2.14-5.89l-3.56,3c-1.27,1.25-1.32.91-1.41,1.92a23.19,23.19,0,0,0,.14,3.33Zm.34,30.1c1.07-.58,4.14-3.6,5-4.1v-4.09a12.8,12.8,0,0,0-1.57,1.17c-3.61,3.18-3.55,2.38-3.35,7Zm-9.25-44.76-.08-4-5-4.07c-.52,5.29.74,4.3,3,6.53a8.67,8.67,0,0,0,2.09,1.52ZM19,380.64c1.14.8,4.14,3.56,5.06,4,.12-3.25.4-3.75-1.41-5.16a15.07,15.07,0,0,1-1.8-1.48A8.66,8.66,0,0,0,19,376.62Zm16.63-38.07,1.58-1.33v-2.89H34.74c-3,3.51-2.53-.13-2.48,6.92l3.39-2.73ZM33.09,409.9h2.65A14.15,14.15,0,0,1,37,408.59c.76-.57,1-.38,1.08-1.4V403l-2.61,2a11,11,0,0,1-2.4,2v2.85Zm-.58-50.79v4.46c1-.53,4.31-3.7,5-4.09l0-4.4C36.58,355.51,33.69,358.45,32.51,359.11Zm-13.3,35.37c-.07,4.37-.31,3.85,1.23,5.32l3.91,3-.12-4.48-3.87-2.94C19.85,394.91,19.88,394.71,19.21,394.48Zm13.69-.82c.7-.3,3.94-3.31,5-4.1l-.11-4.39-4.2,3.55c-1.15,1.12-.73,1.88-.68,4.94Zm-.06-6c1.06-.54,3.82-3.35,5-4.09l-.09-4.4c-1,.71-1.87,1.47-2.75,2.27-.6.46-.8.81-1.37,1.26-.73.6-.86.36-.85,1.61l.07,3.39ZM23.9,366.77c-.16-5.82.53-3.4-3.16-6.85a13.72,13.72,0,0,0-2-1.47c.14,4.07-.5,4.09,1.2,5.24l3.3,2.65c.64.47-.15.05.68.43Zm8.5-13.63.07,4.47,3.78-3.05a2.37,2.37,0,0,0,1.18-2c0-1.08,0-2.31-.06-3.41-.73.31-.58.47-1.19,1l-3.79,3ZM24,372.73l-.08-4.5a10,10,0,0,1-2.51-1.87,26.28,26.28,0,0,0-2.59-2c.09,3-.45,4.1,1.15,5.26C21.26,370.72,22.61,371.76,24,372.73Zm-4.86,15.79c0,3-.44,4.06,1.24,5.36a36.75,36.75,0,0,0,3.93,3l-.1-4.5c-1.4-.73-4.4-3.64-5.09-3.86Zm13.6-8.87v2.09l4.34-3.61c.87-.87.63-.56.6-2.56V373a33,33,0,0,0-3.15,2.63c-1.81,1.35-1.88,1.17-1.81,4.06ZM19,375l5.1,4-.1-4.81a11.1,11.1,0,0,1-2.5-1.92l-2.59-1.92Zm.14,7.29c-.1,1.08,0,2.2,0,3.29,0,1.72,0,1.51,1.14,2.27a45.72,45.72,0,0,0,4,3.08l-.12-4.58-5-4.06Zm.22,18.17c-.17,2.68-.37,4.53,1.11,5.6a43.84,43.84,0,0,0,4,3.08l-.11-4.6Zm13.33-29.71v4.77c.89-.38.58-.43,1.3-1l3.71-3.06-.09-4.69c-.9.32-3.73,3.23-5,4ZM33,405.59c1.66-1.11,2.53-2.16,4-3.26,1-.77,1-.83,1-2.43,0-1,0-2.08-.09-3.12-1,.69-1.47,1.32-2.45,2.05A25.44,25.44,0,0,0,33,401v4.59Zm-9.19-44.78L23.74,356c-1.42-.67-4.22-3.54-5.07-3.85-.09,4-.37,4.45,1.1,5.46l2.9,2.35c.75.71.33.55,1.16.85ZM18.56,344.9c1.12.74,4,3.51,5.08,4-.05-5.95.38-4.15-1.31-5.7A8.39,8.39,0,0,0,21,342.08a9.57,9.57,0,0,1-1.25-.95c-.66-.63-.49-.66-1.26-1v4.77Zm17.93-1.69-4.2,3.56.06,4.9c1.89-1.25,2.07-1.75,3.91-3.16,2-1.56.64-3.14,1.17-5.75-.75.31-.09,0-.53.26-.06,0-.2.27-.28.13S36.54,343.2,36.49,343.21ZM24.24,362.9v4.38a13.13,13.13,0,0,1,2,1.64l3.11-2.42c3.7-3.49,2.67-1.17,2.76-6.81l-2.82,2.36c-.56.53-2.53,2.24-3,2.21s-1.38-1-2-1.36Zm5.93,33.19a11.87,11.87,0,0,0,1.67-1.41c1-1,.7-.63.68-2.33v-2.57c-.85.36-4.49,4-5.63,4.61A8.82,8.82,0,0,1,24.62,393v4.4L27,399l3.15-2.93Zm-5.82-21.28c.1,2.92-.48,4,.73,5.15l5.05,4,2.26-1.74-.1-4.73c-2.68,1.49-.84,2.87-5.09-.49a18.33,18.33,0,0,0-2.85-2.27ZM29.74,354,32,352.22l-.07-4.86c-3.1,2.14-1.84,1.91-3.75.52s-2.1-1.79-4.22-3.28c.13,4.12-.54,4.53,1.47,5.91.85.58,1.21,1.11,2,1.69a9.17,9.17,0,0,1,1.12.85c.68.64.34.51,1.15.9Zm2.1-15.54H28a4.43,4.43,0,0,1-2.08,1.59l-2-1.44c.08,5.25-.4,4.16,1.5,5.52,1.13.8,3.41,3.2,4.57,3.46A5.56,5.56,0,0,1,32,345.84v-4.75s-.12,0-.14.1l-1.25,1c-.49.4-.79.84-1.71.6-.14-.84,1-1.6,1.52-2,.87-.65,1.56-.81,1.55-2.38ZM24.1,355.07a33.64,33.64,0,0,1,2.63,2.14c1,.93.26,1.61-1.19.48a14.45,14.45,0,0,0-1.42-1.05c.07,4.83-.55,4.32,2.11,6.33l5.86-4.8L32,353.74c-2.14,1.84-2.2,2.28-5.1-.57L24.06,351v4.09Zm.47,36.34a7.73,7.73,0,0,1,2,1.65c1.11-.37.54-.45,2.29-1.75.8-.59,1.17-1.15,2-1.75,2.39-1.74,1.58-2.3,1.61-5.75-.88.47-1.06,1.12-2.28,1.6-1.52-.71-4.71-3.88-5.68-4.35-.12,5.14-.11,3.87,2.07,5.65.41.33,2,2.07.17,1.59-1-.26-1.27-1.23-2.19-1.58l.06,4.69Zm4.95,11.7c-.12-.94,1.33-1.87,1.93-2.31,1.63-1.19,1.18-1.89,1.09-5.07-1.15.58-4.37,4.14-5.88,4.66l-2-1.46c.16,5.09-.34,4.18,1.62,5.58l4.15,3.36c1-.43.57-.71,2.27-1.74l-.06-4.75C31.5,401.87,31,403.49,29.52,403.11Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ad);"></path>
                                        </g>
                                        <path d="M18.59,337.67c7.28-2.34,10.55-.14,15.82-.21a4.35,4.35,0,0,1,4.5,4.16l.81,63.78a4.34,4.34,0,0,1-4.39,4.27c-5.27.07-11.44,3-15.82.2-6.74-4.28-5.1-70.86-.92-72.2Z" transform="translate(0.01 0)" style="fill:none;"></path>
                                        <path d="M201.26,70.07c-7.31-2.24-10.55,0-15.82,0A4.35,4.35,0,0,0,181,74.29v63.78a4.34,4.34,0,0,0,4.45,4.21c5.27,0,11.47,2.84,15.82,0,6.68-4.36,4.2-70.92,0-72.21Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#ae);">
                                        <path d="M193.73,102.76a9,9,0,0,0,2.18-1.43l.07,4.39c-.44.33-.92.63-1.36,1a42.15,42.15,0,0,1-4.3,3.59,6.86,6.86,0,0,1-1.58-1.25c-1.1-1-.69-1.19-.7-3.81v-1.38c.83.59,2.07,2,3.09,1.7.25-.8.21-.44-.31-1l-2.82-2.2V98.22c.73.31,4.67,4,5.7,4.54ZM179.44,71h2.84v2.3a5.68,5.68,0,0,1-1.48-1Zm2.84,71.5h-3.06v-3.34c.89.37.72.51,1.39,1.14a6.09,6.09,0,0,0,1.59,1.07l.05,1.13Zm19.11,0h-4a26.77,26.77,0,0,1,4-3.36ZM196.33,71h4.84l-3.46,3.08a8,8,0,0,1-1.33.91V71Zm6,71.5h-.57v-3.77a18.38,18.38,0,0,1,3-2.42v4a19.49,19.49,0,0,0-2.46,2.17Zm-20-48.65v3.41c-1.14-.47-.84-.58-1.69-1.31-1.59-1.35-1.35-.27-1.35-3.8v-1.3c.49.26,3,2.08,3,3ZM204.78,80.1l-3,2.41c-.1-1.2-.33-3.39.23-4.23a19,19,0,0,1,2.77-2.2Zm-23.44,46.63c-2.69-2.41-2.15-.48-2.11-5.8.94.35,1.14,1.25,3,2.23v4.19l-.94-.62Zm20.43-14.14c-.12-5.28-.11-3.76,1.61-5.33.61-.56.59-.83,1.39-1.09,0,1.17.38,3.51-.23,4.3Zm3-14.32-3,2.43-.05-4.31,3-2.45Zm-22.52-8.66v2a19.41,19.41,0,0,1-3-2.35l-.1-4.37a14.91,14.91,0,0,1,2.16,1.63c1.11,1.06.91,1.34.9,3.09Zm-2.54,24.25c-.82-.77-.5-3.18-.51-4.84,3.51,2.32,3,1.85,3.07,6.72l-2.56-1.88Zm2.55-29.54v1.32a20.94,20.94,0,0,1-3.06-2.33v-4.4c.37.26.7.47,1.07.76,2.3,1.79,2,1.81,2,4.65Zm22.52,39.73c-.14,5.62.85,3.38-1.8,5.72-.63.56-.42.74-1.22,1,0-1.19-.42-3.62.24-4.46,0,0,1.22-1.15,1.36-1.26A8.26,8.26,0,0,1,204.78,124.05Zm-.07-6c.63,5.29-.35,4.43-1.7,5.81a3.17,3.17,0,0,1-1.26.94v-4.29c.94-.79,2-1.75,3-2.46Zm-.41-43.13s-2.39,1.85-2.56,1.92c0-6.5,1-5.58,2.23-4.43.86.79,1.41,1.59.35,2.52Zm-22,46.77c-4.1-2.51-3.08-3.1-3.06-6.72.7.24,1.47,1.36,3,2.22Zm19.54-26.95c-.8-5,.54-4.71,1.57-5.66.61-.55.6-.79,1.36-1.1.18,3.62.67,3.9-1.59,5.75a16.07,16.07,0,0,0-1.34,1ZM182.21,105l.06,4.78a18.71,18.71,0,0,1-3.05-2.34v-4.67c.87.38.75.51,1.41,1.14a7,7,0,0,0,1.56,1.09Zm0,30.09.06,4.82a11.11,11.11,0,0,1-2.9-2.43c-.36-.77-.18-3.71-.08-4.72.47.53.9.69,1.48,1.28a3.35,3.35,0,0,0,1.44,1.05Zm22.56-18.64a14.36,14.36,0,0,0-1.5,1.31c-.48.46-1.11.82-1.47,1.12-.12-.93-.25-4,.13-4.72a15.15,15.15,0,0,1,2.85-2.32v4.61ZM182.25,133.6c-1.4-.68-1.26-1.19-3-2.33v-4.68C182.91,129,182.37,128.93,182.25,133.6Zm19.5-44.85c0-1.12-.3-3.85.18-4.64a15.48,15.48,0,0,1,2.87-2.36c0,1.16.3,3.85-.21,4.67a14.11,14.11,0,0,1-2.84,2.33Zm-19.67-9.07a8,8,0,0,1-1.41-1.18c-.47-.46-.91-.73-1.42-1.16V72.56a5.79,5.79,0,0,1,1.43,1.08c.7.72.94.77,1.55,1.37a12.86,12.86,0,0,1-.14,4.67Zm22.71,55a14.41,14.41,0,0,0-1.53,1.28,6.5,6.5,0,0,1-1.46,1.15c-.45-4.25-.42-5,3-7.08v4.65Zm-22.53-31.16a12.52,12.52,0,0,1-2.71-2.15c-.75-.93-.3-3.47-.35-4.83,4.12,2.34,3,3.36,3.06,6.95ZM201.75,107c.05-2.59-1.14-5,3.05-7,0,1.21.3,3.79-.22,4.68A14.35,14.35,0,0,1,201.75,107Zm-6.17,35.56H188l.07-2.25c2.22,1.61,2,2.48,5.18-.71a20.06,20.06,0,0,1,2.71-2.16c0,1.83.32,4.25-.38,5.09Zm-8-40.68-2.72-2.25c-2.54-2-2.31-1.37-2.21-5.86l3.6,2.88c1.29,1.24,1.33.89,1.43,1.9a21.8,21.8,0,0,1-.1,3.33Zm0,30.1c-1.08-.56-4.19-3.54-5-4v-4.09a12.67,12.67,0,0,1,1.58,1.14c3.65,3.14,3.58,2.34,3.44,7ZM196.31,87V83l5-4.13c.6,5.28-.68,4.31-2.94,6.57A8.48,8.48,0,0,1,196.31,87Zm5.06,26c-1.13.82-4.09,3.61-5,4-.16-3.25-.45-3.74,1.34-5.17a14.33,14.33,0,0,0,1.81-1.49,8.64,8.64,0,0,1,1.88-1.41v4ZM184.25,75.2l-1.59-1.31V71h2.47c3,3.48,2.53-.16,2.57,6.89l-3.43-2.68Zm3.43,67.28H185a15.35,15.35,0,0,0-1.3-1.25c-.77-.56-.95-.38-1.1-1.39v-4.15l2.63,2a12,12,0,0,0,2.43,1.94v2.84Zm-.06-50.79v4.46c-1-.52-4.35-3.64-5-4v-4.4c.86.41,3.78,3.32,5,4Zm13.75,35.2c.13,4.37.36,3.84-1.17,5.34l-3.87,3,.07-4.47,3.82-3c.51-.48.48-.67,1.15-.91Zm-13.7-.64c-.71-.3-4-3.27-5-4l.05-4.39,4.24,3.5c1.17,1.09.76,1.86.75,4.93Zm0-6c-1.07-.54-3.86-3.31-5-4v-4.39c.86.47,1.46,1.22,2.77,2.19.6.45.81.8,1.37,1.25.75.58.87.34.87,1.59v3.36Zm8.67-21c.09-5.83-.57-3.4,3.07-6.9a13.92,13.92,0,0,1,2-1.5c-.09,4.08.55,4.09-1.14,5.26L197,98.8c-.64.49.15,0-.68.45Zm-8.66-13.53v4.47l-3.82-3a2.38,2.38,0,0,1-1.21-2V81.77c.74.31.59.46,1.2,1Zm8.66,19.48v-4.5a10.22,10.22,0,0,0,2.49-1.9,27.5,27.5,0,0,1,2.56-2c0,3,.51,4.1-1.08,5.28a48.21,48.21,0,0,1-4,3.12Zm5.06,15.73c0,3,.5,4-1.17,5.38a39.07,39.07,0,0,1-3.89,3v-4.5c1.37-.72,4.33-3.68,5-3.9Zm-13.71-8.69v2.08l-4.39-3.55c-.88-.86-.63-.55-.63-2.55V105.6a35.93,35.93,0,0,1,3.18,2.59c1.83,1.33,1.89,1.15,1.86,4Zm13.71-4.86-5,4.07v-4.79a10.63,10.63,0,0,0,2.48-2l2.56-2v4.63Zm0,7.29a32.82,32.82,0,0,1,0,3.29c0,1.71,0,1.51-1.11,2.29a47.47,47.47,0,0,1-3.95,3.12l.06-4.58Zm0,18.16c.2,2.69.43,4.53-1,5.63a45.77,45.77,0,0,1-4,3.12l0-4.59,5-4.15Zm-13.71-29.52v4.76c-.9-.37-.59-.42-1.31-1l-3.75-3V99.39c.88.38,3.74,3.28,5,4Zm.06,34.86c-1.67-1.09-2.56-2.12-4.07-3.2-1.06-.76-1-.82-1-2.42v-3.12c1,.67,1.48,1.3,2.47,2a25.88,25.88,0,0,1,2.53,2.15v4.57Zm8.62-44.89V88.5c1.41-.69,4.17-3.59,5-3.92.14,4,.43,4.45-1,5.48l-2.88,2.38c-.74.7-.36.53-1.14.84Zm5.07-16c-1.11.75-4,3.55-5,4,0-5.94-.43-4.14,1.23-5.71A8.56,8.56,0,0,1,199,74.44a8.48,8.48,0,0,0,1.24-1c.65-.64.48-.67,1.25-1v4.84Zm-18-1.46,4.25,3.5v4.9c-1.9-1.22-2.08-1.72-3.94-3.11-2.05-1.53-.68-3.13-1.24-5.74.74.31.08,0,.52.26.07,0,.21.27.28.13S183.4,75.76,183.44,75.82ZM196,95.34v4.39a13.26,13.26,0,0,0-2,1.66L190.86,99c-3.74-3.44-2.69-1.14-2.84-6.78l2.85,2.33c.56.52,2.56,2.21,3.07,2.17s1.36-1,2-1.39Zm-5.51,33.27a11.9,11.9,0,0,1-1.69-1.39c-1-1-.7-.62-.7-2.32v-2.58c.86.36,4.54,3.94,5.69,4.54a8,8,0,0,0,2.2-1.44l.06,4.4-2.37,1.68-3.19-2.89ZM196,107.28c-.06,2.92.53,4-.66,5.17l-5,4.14L188,114.87v-4.72c2.7,1.45.88,2.86,5.09-.56a19,19,0,0,1,2.82-2.31ZM190.32,86.5,188,84.79V79.94c3.12,2.1,1.86,1.89,3.75.47s2.08-1.82,4.18-3.34c-.07,4.13.6,4.52-1.4,5.93-.84.59-1.19,1.13-2,1.72a10.28,10.28,0,0,0-1.11.86c-.67.65-.34.52-1.14.92ZM188,71h3.83A4.57,4.57,0,0,0,194,72.55l2-1.47c0,5.25.46,4.16-1.43,5.54-1.11.82-3.36,3.25-4.52,3.52a5.65,5.65,0,0,0-2-1.73V73.66s.13,0,.15.1l1.27,1c.49.39.79.83,1.71.58.13-.85-1-1.59-1.55-2-.87-.63-1.57-.78-1.58-2.36Zm8,16.54c-1,.88-1.29.9-2.6,2.17-1,1-.24,1.63,1.2.47.48-.39.83-.67,1.41-1.07,0,4.84.6,4.32-2,6.36l-6-4.73V86.32c2.16,1.81,2.23,2.25,5.09-.64L196,83.45Zm0,36.35a8,8,0,0,0-1.94,1.67c-1.11-.35-.54-.44-2.31-1.72-.81-.58-1.19-1.13-2-1.72-2.41-1.71-1.6-2.28-1.67-5.73.88.46,1.06,1.11,2.29,1.57,1.51-.73,4.66-3.94,5.63-4.43.18,5.15.16,3.88-2,5.69-.41.33-2,2.08-.15,1.59,1-.27,1.25-1.25,2.17-1.61v4.69Zm-4.8,11.76c.11-.94-1.36-1.86-2-2.28-1.65-1.17-1.21-1.88-1.16-5.06,1.17.56,4.43,4.08,5.94,4.58l2-1.48c-.1,5.09.39,4.18-1.55,5.6l-4.11,3.41c-1-.41-.58-.7-2.29-1.71V134c1.16.47,1.65,2.09,3.15,1.69Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#af);"></path>
                                        </g>
                                        <path d="M201.26,70.07c-7.31-2.24-10.55,0-15.82,0A4.35,4.35,0,0,0,181,74.29v63.78a4.34,4.34,0,0,0,4.45,4.21c5.27,0,11.47,2.84,15.82,0,6.68-4.36,4.2-70.92,0-72.21Z" transform="translate(0.01 0)" style="fill:none;"></path>
                                        <path d="M200.72,337.83c-7.24-2.47-10.55-.33-15.82-.49a4.34,4.34,0,0,0-4.57,4.07q-1,31.88-2,63.75a4.34,4.34,0,0,0,4.31,4.35c5.28.17,11.39,3.19,15.82.49,6.82-4.16,6.39-70.75,2.23-72.17Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#ag);">
                                        <path d="M192.18,370.26a8.28,8.28,0,0,0,2.22-1.36l-.06,4.39a16.54,16.54,0,0,0-1.39,1,40.94,40.94,0,0,1-4.41,3.46,6.69,6.69,0,0,1-1.54-1.31c-1.07-1-.65-1.21-.58-3.82v-1.38c.82.61,2,2.07,3,1.79.27-.79.22-.43-.28-1l-2.71-2.32.13-4.15c.71.33,4.54,4.15,5.55,4.71Zm-13.3-32.19,2.84.09-.09,2.3a5.68,5.68,0,0,1-1.45-1.07l-1.3-1.32Zm.63,71.55-3-.1.13-3.33c.88.4.7.53,1.36,1.18a5.93,5.93,0,0,0,1.55,1.13v1.12Zm19.1.59-4-.13a29.07,29.07,0,0,1,4.11-3.23l-.1,3.36Zm-2.85-71.62,4.84.15-3.55,3a7.48,7.48,0,0,1-1.36.87Zm3.79,71.65H199l.12-3.77a18.42,18.42,0,0,1,3.1-2.32l-.13,4a19.41,19.41,0,0,0-2.52,2.09ZM181,361l-.11,3.42c-1.12-.52-.82-.61-1.65-1.37-1.55-1.4-1.34-.3-1.24-3.83v-1.3c.55.28,3,2.18,3,3.08Zm22.92-13-3.06,2.33c-.06-1.21-.23-3.41.35-4.23a19.54,19.54,0,0,1,2.84-2.11l-.13,4Zm-24.87,45.89c-2.61-2.49-2.13-.55-1.93-5.86.93.38,1.1,1.29,3,2.32l-.1,4.19-.92-.65Zm20.86-13.5c0-5.28,0-3.76,1.77-5.27.63-.55.61-.82,1.43-1.06,0,1.17.26,3.53-.37,4.3l-2.83,2Zm3.45-14.22-3.05,2.33.08-4.3,3-2.36-.07,4.33Zm-22.23-9.36v2a20.48,20.48,0,0,1-2.9-2.44V352a14.87,14.87,0,0,1,2.1,1.7c1.08,1.09.87,1.37.81,3.11ZM177.84,381c-.8-.79-.4-3.19-.36-4.86,3.44,2.44,2.92,1.95,2.86,6.81L177.83,381Zm3.45-29.45v1.32a21,21,0,0,1-3-2.42l.17-4.4a9.73,9.73,0,0,1,1,.8c2.28,1.8,1.94,1.81,1.84,4.65Zm21.29,40.41c-.31,5.61.75,3.4-2,5.66-.65.54-.44.73-1.26.95,0-1.19-.3-3.63.39-4.45,0,0,1.25-1.11,1.39-1.22a8.56,8.56,0,0,1,1.45-.94Zm.12-6c.46,5.3-.49,4.42-1.88,5.75a3.27,3.27,0,0,1-1.29.91l.12-4.29C200.65,387.54,201.65,386.62,202.7,385.94Zm.92-43.12s-2.45,1.77-2.62,1.84c.15-6.5,1.15-5.55,2.36-4.36C204.18,341.1,204.71,341.92,203.62,342.82Zm-23.47,46.06c-4-2.63-3-3.19-2.85-6.81.7.27,1.43,1.41,3,2.31Zm20.36-26.33c-.64-5.07.69-4.69,1.75-5.61.62-.53.63-.77,1.39-1.06.08,3.63.55,3.93-1.76,5.7a15.15,15.15,0,0,0-1.38,1Zm-19.92,9.63-.08,4.78a18.44,18.44,0,0,1-3-2.43l.16-4.67c.86.41.73.54,1.38,1.18a6.79,6.79,0,0,0,1.52,1.14Zm-.91,30.08-.1,4.81a11.12,11.12,0,0,1-2.82-2.52c-.34-.78-.06-3.71.06-4.71.46.54.88.71,1.45,1.32a3.31,3.31,0,0,0,1.41,1.1Zm23.12-17.94a12.44,12.44,0,0,0-1.54,1.26c-.49.45-1.14.79-1.5,1.08-.1-.94-.13-4,.27-4.71a15.77,15.77,0,0,1,2.91-2.24l-.14,4.61Zm-23.06,16.45c-1.37-.72-1.21-1.22-3-2.41l.14-4.68c3.63,2.5,3.07,2.39,2.82,7.05Zm20.88-44.22c0-1.11-.18-3.86.33-4.63a15.85,15.85,0,0,1,2.94-2.28c-.07,1.16.17,3.86-.36,4.66A13.25,13.25,0,0,1,200.62,356.55Zm-19.37-9.67a8,8,0,0,1-1.38-1.22,17.71,17.71,0,0,0-1.39-1.21l.14-4.78a6.09,6.09,0,0,1,1.4,1.13c.68.74.91.8,1.51,1.41a13.35,13.35,0,0,1-.28,4.67Zm21,55.64a13.28,13.28,0,0,0-1.57,1.23,6.56,6.56,0,0,1-1.5,1.11c-.32-4.26-.26-5,3.2-7l-.13,4.64ZM180.7,370.64a12.54,12.54,0,0,1-2.64-2.23c-.73-1-.2-3.47-.2-4.84C181.86,366.07,180.76,367.05,180.7,370.64Zm19.37,4c.14-2.58-1-5,3.27-6.9-.08,1.21.18,3.79-.37,4.67a13.66,13.66,0,0,1-2.9,2.23ZM192.81,410l-7.55-.23.14-2.26c2.16,1.69,2,2.54,5.19-.55a20.67,20.67,0,0,1,2.78-2.07c-.09,1.85.17,4.29-.56,5.11Zm-6.73-40.91-2.65-2.34c-2.48-2-2.27-1.44-2-5.93l3.5,3c1.26,1.27,1.31.93,1.38,1.94a21.82,21.82,0,0,1-.2,3.33Zm-.88,30.09c-1.06-.6-4.08-3.68-4.88-4.19l.11-4.09a12.09,12.09,0,0,1,1.55,1.2C185.53,395.34,185.48,394.54,185.2,399.18Zm10.05-44.59.15-4,5.12-4c.43,5.3-.81,4.28-3.14,6.47a8.47,8.47,0,0,1-2.13,1.48Zm4.26,26.16c-1.16.79-4.21,3.49-5.14,3.9-.05-3.25-.33-3.75,1.5-5.13a15.3,15.3,0,0,0,1.86-1.43,8.91,8.91,0,0,1,1.92-1.36l-.14,4Zm-15.95-38.36L182,341.06l.07-2.89,2.47.08c2.88,3.56,2.53-.09,2.36,7l-3.35-2.79Zm1.36,67.37-2.66-.09a12.79,12.79,0,0,0-1.26-1.29c-.75-.59-.94-.41-1.06-1.42l.12-4.16,2.57,2.09a11.64,11.64,0,0,0,2.37,2l-.08,2.85Zm1.5-50.78-.1,4.46c-1-.55-4.24-3.77-4.89-4.17l.13-4.4c.85.47,3.68,3.46,4.86,4.13Zm12.65,35.61c0,4.37.25,3.85-1.33,5.3l-4,2.92.21-4.47,3.91-2.87c.53-.47.5-.66,1.18-.88Zm-13.67-1.06c-.7-.32-3.88-3.39-4.91-4.2l.19-4.38,4.13,3.63C185.94,389.71,185.5,390.46,185.4,393.53Zm.17-6c-1-.57-3.76-3.42-4.89-4.19l.16-4.39c.84.5,1.42,1.26,2.7,2.28.58.46.78.82,1.34,1.28.72.61.85.37.82,1.62l-.13,3.4Zm9.31-20.77c.27-5.82-.46-3.41,3.29-6.8a14.84,14.84,0,0,1,2-1.43c-.21,4.07.43,4.1-1.29,5.22l-3.34,2.59c-.66.46.14,0-.7.42ZM186.64,353l-.16,4.46-3.72-3.11a2.41,2.41,0,0,1-1.15-2c0-1.09.09-2.31.13-3.41.72.32.57.48,1.17,1l3.73,3.1Zm8.06,19.74.15-4.5a10,10,0,0,0,2.55-1.83,27.09,27.09,0,0,1,2.63-1.91c-.15,3,.37,4.11-1.25,5.24A49.73,49.73,0,0,1,194.7,372.72Zm4.57,15.88c-.06,3,.37,4.06-1.34,5.33a35.4,35.4,0,0,1-4,2.9l.18-4.49c1.42-.61,4.46-3.47,5.16-3.67Zm-13.43-9.12-.08,2.08L181.48,378c-.85-.89-.61-.57-.55-2.57l.07-2.62a36,36,0,0,1,3.1,2.69c1.79,1.39,1.86,1.21,1.74,4.1Zm13.85-4.43L194.52,379l.15-4.78a11.11,11.11,0,0,0,2.54-1.87l2.62-1.89-.14,4.63Zm-.27,7.28c.08,1.09,0,2.2,0,3.3,0,1.71,0,1.51-1.17,2.25s-1.81,1.66-4.06,3l.21-4.58,5.07-4Zm-.55,18.16c.12,2.69.29,4.54-1.21,5.59a42.78,42.78,0,0,1-4.08,3l.19-4.59Zm-12.79-29.94-.11,4.77c-.88-.4-.57-.44-1.28-1.07L181,371.2l.17-4.69c.86.41,3.64,3.4,4.87,4.11Zm-1,34.86c-1.64-1.15-2.5-2.21-4-3.33-1-.79-1-.86-.94-2.45a21.94,21.94,0,0,1,.15-3.12c1,.7,1.44,1.35,2.41,2.09a30.54,30.54,0,0,1,2.46,2.23l-.11,4.58Zm10-44.61.17-4.77c1.43-.65,4.28-3.47,5.14-3.77,0,4,.29,4.46-1.2,5.44l-3,2.3c-.76.67-.37.52-1.16.8ZM200.63,345c-1.13.72-4.1,3.43-5.15,3.89.15-5.94-.3-4.15,1.41-5.67a8.52,8.52,0,0,1,1.31-1.09,8.28,8.28,0,0,0,1.27-.93c.67-.61.5-.65,1.28-1Zm-17.9-2,4.14,3.63-.15,4.9c-1.86-1.28-2-1.78-3.85-3.23-2-1.6-.58-3.15-1.06-5.77.74.32.08,0,.52.27.06,0,.2.27.28.14S182.69,342.93,182.73,343Zm11.9,19.9-.1,4.39a12.88,12.88,0,0,0-2,1.6l-3.07-2.48c-3.64-3.56-2.65-1.22-2.63-6.86L189.6,362c.55.54,2.5,2.29,3,2.26s1.4-1,2.05-1.32ZM188.08,396a11.2,11.2,0,0,1-1.64-1.44c-1-1-.68-.64-.63-2.34l.08-2.58c.85.38,4.41,4.08,5.55,4.72a8.81,8.81,0,0,0,2.25-1.37l-.08,4.4-2.43,1.6-3.1-3Zm6.22-21.17c-.16,2.91.4,4-.83,5.14l-5.13,4-2.22-1.78.18-4.72c2.65,1.53.79,2.88,5.1-.41a18.35,18.35,0,0,1,2.9-2.21Zm-5-20.95-2.23-1.78.16-4.85c3.06,2.19,1.8,1.94,3.74.59s2.13-1.76,4.28-3.21c-.2,4.12.46,4.54-1.58,5.88-.86.56-1.23,1.09-2.06,1.66a7.81,7.81,0,0,0-1.15.83c-.68.62-.35.51-1.16.88Zm-1.82-15.58,3.83.12a4.56,4.56,0,0,0,2.05,1.63l2.06-1.4c-.17,5.24.33,4.16-1.6,5.48-1.14.79-3.46,3.15-4.63,3.38a5.52,5.52,0,0,0-1.91-1.78l.12-4.75s.12,0,.14.1l1.24,1.05c.48.41.77.86,1.69.64.16-.84-.93-1.62-1.48-2-.86-.66-1.55-.84-1.51-2.41Zm7.44,16.8a28.22,28.22,0,0,0-2.67,2.09c-1,.91-.29,1.61,1.18.5a14,14,0,0,1,1.44-1c-.16,4.83.47,4.32-2.23,6.28l-5.77-4.9.17-4.42c2.11,1.87,2.16,2.32,5.11-.48L195,351l-.11,4.1Zm-1.13,36.33a7.75,7.75,0,0,0-2,1.6c-1.1-.38-.53-.46-2.26-1.79-.79-.6-1.15-1.16-2-1.78-2.36-1.78-1.54-2.32-1.5-5.77.87.48,1,1.13,2.25,1.63,1.53-.68,4.78-3.79,5.76-4.25,0,5.15,0,3.88-2.18,5.62-.41.32-2,2-.2,1.58,1-.23,1.3-1.2,2.22-1.54l-.14,4.69ZM188.63,403c.13-.94-1.3-1.89-1.89-2.34-1.61-1.22-1.15-1.92-1-5.09,1.15.59,4.3,4.21,5.8,4.76l2-1.42c-.26,5.09.26,4.19-1.72,5.55l-4.21,3.29c-1-.45-.57-.72-2.24-1.79l.14-4.74c1.13.5,1.58,2.13,3.09,1.78Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ah);"></path>
                                        </g>
                                        <path d="M200.72,337.83c-7.24-2.47-10.55-.33-15.82-.49a4.34,4.34,0,0,0-4.57,4.07q-1,31.88-2,63.75a4.34,4.34,0,0,0,4.31,4.35c5.28.17,11.39,3.19,15.82.49,6.82-4.16,6.39-70.75,2.23-72.17Z" transform="translate(0.01 0)" style="fill:none;"></path>
                                        <path d="M132.53,459.14v-.09a179.58,179.58,0,0,0,34.74-6.1c17.34-5.07,26-10.9,29.6-38.6,3.26-25.18,1.28-58.79,2.21-95.05.84-32.89,2.65-221.11-2.68-264.14a46,46,0,0,0-10.62-24.61c-8.1-9.54-18.54-15.11-30-19.87-14.52-6-30.72-6.44-46-6.39s-30.92.15-45.06,5.58c-12.12,4.65-23.16,10.25-32,20.68A46,46,0,0,0,22.07,55.09C16.73,98,18.54,286.36,19.38,319.22c.93,36.29-1.05,69.93,2.21,95.13,3.59,27.7,12.26,33.53,29.6,38.6a179.58,179.58,0,0,0,34.74,6.1v.09c7.17.53,14.75.85,22.49.87H110c7.74,0,15.32-.34,22.49-.87Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ai);"></path>
                                        <g style="mask:url(#aj);">
                                        <path d="M43,49.57c1.24-4.27,2.42-8.54,4-12.66,1.71-4.36,3.57-8.91,6.79-12.78,2.64-3.16,6.3-5.76,10.74-8.35C75.64,9.3,105.42,1.67,115,1.78V74.89c-22.91.64-63.83,2.21-68.62,19.36-4.73-1.09-5.61-5.09-5.56-9.93a129.8,129.8,0,0,1,1.51-15.63c1-7,2.92-15.48.69-19.12Z" transform="translate(0.01 0)" style="fill:#c58300;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M55.45,445.77c10.51,5.37,31.78,6.23,53,6.33,22,.1,43.86-.76,54.76-6.32.66-.34.86-.76.58-1.19-.7-1-1.15-1.67-1.83-2.63a2.66,2.66,0,0,0-1.74-.79,6.91,6.91,0,0,0-2.44.16c-19.3,3.78-75.53,3.87-96.94,0a7.42,7.42,0,0,0-2.44-.17,2.62,2.62,0,0,0-1.74.8c-.68.93-1.17,1.72-1.76,2.67-.27.42-.06.84.58,1.17Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ak);"></path>
                                        <path d="M31.9,125.41c-1.29,59.61-1.45,229.41,0,288.36.49,20.52,49.84,25.32,75.31,25.45,27,.14,80.78-6.51,81.26-26.54,1.35-56.41-.11-229-1.37-287.23-38.67,1.32-116.48,1.18-155.16,0Z" transform="translate(0.01 0)" style="fill:#171614;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#al);">
                                        <path d="M109.83,1.78q-.21,11.45-.41,22.87l66.3,33c-.88-6-2.47-13.4-.14-14.7C170.5,18.1,154.07,12.73,135.78,7a184.73,184.73,0,0,0-25.95-5.17Z" transform="translate(0.01 0)" style="fill:#ffdf67;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#am);">
                                        <path d="M109.12,1.8q.21,11.43.41,22.86l-66.31,33c.89-6,2.48-13.41.14-14.7C48.44,18.11,64.88,12.75,83.17,7a186.86,186.86,0,0,1,26-5.17Z" transform="translate(0.01 0)" style="fill:#ffe174;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#an);">
                                        <path d="M63.12,452.38c.36,1.27,1.32,2.21,3.54,2.42,18.65,4.15,66.52,4.15,85.17,0,2.21-.21,3.17-1.15,3.54-2.42A314.51,314.51,0,0,1,110,455.55a315.81,315.81,0,0,1-46.9-3.17Z" transform="translate(0.01 0)" style="fill:#a96100;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M48.15,359.7h122.5c4.71,0,8.52,3.21,8.52,7.17v12.52c0,4-3.81,7.17-8.52,7.17H48.15c-4.71,0-8.53-3.21-8.53-7.17V366.87C39.62,362.91,43.44,359.7,48.15,359.7Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ao);"></path>
                                        <path d="M46.34,158.85H173.9c4.9,0,8.87,3.21,8.87,7.17v12.52c0,4-4,7.17-8.87,7.17H46.34c-4.9,0-8.88-3.21-8.88-7.17V166C37.46,162.06,41.44,158.85,46.34,158.85Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ap);"></path>
                                        <path d="M32.19,125.7c-1.07-13.16-1.7-25.06-2.49-39.4-.37-17-2.15-16.36,14.11-21.68,15.55-3.62,41.11-6,66.46-7.61,25.22,1.5,50.15,4.09,65.07,7.61,16.27,5.32,14.49,4.71,14.11,21.68-.78,14.34-1.42,26.24-2.49,39.4-26.31.53-51.38,6.39-77.27,6.39C84.27,132.09,58,126.22,32.19,125.7Z" transform="translate(0.01 0)" style="fill:#171614;stroke:#171614;stroke-miterlimit:10;stroke-width:0.21601082384586334px;fill-rule:evenodd;"></path>
                                        <path d="M133.38,77.13c-15.33-2.76-31.11-2.44-47.25.05l-3.24,4.61a111.57,111.57,0,0,1,54.41,0C136,80.31,134.68,78.6,133.38,77.13Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#aq);"></path>
                                        <path d="M87.28,80.78a111.08,111.08,0,0,1,45.79,0v-3a339.66,339.66,0,0,0-45.79,0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ar);"></path>
                                        <g style="mask:url(#as);">
                                        <path d="M192.07,426.75c-.35,5.25-.47,10.71-4.74,12.49-4.16,2.47-9,3.62-13.92,4.75-2.73.47-5.45,1-8.2,1.4-4.4.68.42-.72,4.43-2.22a73.54,73.54,0,0,0,11.15-5.23C186.44,435.33,190.35,428.22,192.07,426.75Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#at);"></path>
                                        </g>
                                        <path d="M180.79,437.94c-4.9,2.94-11.2,5.15-16.44,7.12-.57.22-1.2.44-.63.5a128.12,128.12,0,0,0,21.14-7.19c2.58-1.14,3.33-1.61,4.4-3.68a29.47,29.47,0,0,0,2.81-7.94c-1.21.94-5.06,8-11.28,11.19Z" transform="translate(0.01 0)" style="fill:#c82c2c;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#au);">
                                        <path d="M180.79,438c-4.91,2.93-11.2,5.15-16.44,7.12-.57.22-1.2.44-.64.5a128.22,128.22,0,0,0,21.15-7.19l.13-.06-3.88-.59Z" transform="translate(0.01 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#au);">
                                        <path d="M180.79,438c-4.91,2.93-11.2,5.15-16.44,7.12-.57.22-1.2.44-.64.5a128.22,128.22,0,0,0,21.15-7.19l.13-.06-3.88-.59Z" transform="translate(0.01 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#aw);">
                                        <path d="M189.84,423.33c2.83-21.9,2.4-41.8,5.23-63.71-.31,5.84-2.92,67.24-3.06,67.41-2.15,2.51-5.27,6.73-8.88,9.46-3.91,2.95-10.09,5.39-15,7.3-2.68.79.23-.67,1.73-1.55,9.43-5.57,18.79-11.92,20-18.91Z" transform="translate(0.01 0)" style="fill:#ca7a00;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#ax);">
                                        <path d="M27.5,427.44c.35,5.25.47,10.71,4.74,12.49,4.16,2.48,9,3.63,13.92,4.76,2.73.46,5.45,1,8.2,1.39,4.41.69-.42-.72-4.43-2.22a72.54,72.54,0,0,1-11.15-5.22C33.13,436,29.22,428.91,27.5,427.44Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ay);"></path>
                                        </g>
                                        <path d="M38.78,438.64c4.91,2.93,11.2,5.14,16.44,7.12.57.21,1.2.44.63.5a128.47,128.47,0,0,1-21.14-7.2c-2.58-1.13-3.33-1.61-4.4-3.67a29.54,29.54,0,0,1-2.81-7.95C28.72,428.38,32.56,435.48,38.78,438.64Z" transform="translate(0.01 0)" style="fill:#c82c2c;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#az);">
                                        <path d="M38.79,438.68c4.9,2.93,11.19,5.14,16.43,7.12.57.21,1.21.44.64.5a129.52,129.52,0,0,1-21.15-7.2l-.13-.06,3.88-.58Z" transform="translate(0.01 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#az);">
                                        <path d="M38.79,438.68c4.9,2.93,11.19,5.14,16.43,7.12.57.21,1.21.44.64.5a129.52,129.52,0,0,1-21.15-7.2l-.13-.06,3.88-.58Z" transform="translate(0.01 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#bb);">
                                        <path d="M29.73,424c-2.83-21.91-2.39-41.81-5.23-63.71.31,5.83,2.92,67.24,3.06,67.4,2.15,2.52,5.28,6.74,8.88,9.46,3.91,3,10.1,5.39,15,7.31,2.68.79-.23-.67-1.73-1.56C40.25,437.36,30.89,431,29.73,424Z" transform="translate(0.01 0)" style="fill:#ca7a00;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#bc);">
                                        <path d="M41,125.48c-1.94-8.85-3.88-28.84-5.82-39-.92-4.84-1.63-8.4.47-11.12s3.48-4.16,12.75-5.6c37.63-5.82,85.5-5.82,123.13,0,9.27,1.44,10.76,3,12.75,5.6s1.39,6.28.47,11.12c-1.94,10.19-3.88,30.18-5.82,39-21.56-5.66-44.7-9.82-67.56-9.82C88.31,115.66,63.32,120.36,41,125.48Z" transform="translate(0.01 0)" style="fill:#fefefe;stroke:#171614;stroke-miterlimit:10;stroke-width:0.21601082384586334px;fill-rule:evenodd;"></path>
                                        </g>
                                        <polygon points="106.3 67.21 103.69 67.05 103.59 70.05 106.74 70.22 106.3 67.21" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <polygon points="52.96 68.99 53.05 66.31 63.27 64.61 63.42 67.14 52.96 68.99" style="fill-rule:evenodd;fill:url(#bd);"></polygon>
                                        <polygon points="63.42 67.14 63.27 64.61 107.14 67.26 107.18 68.6 63.42 67.14" style="fill-rule:evenodd;fill:url(#be);"></polygon>
                                        <ellipse cx="54.59" cy="67.36" rx="0.88" ry="0.85" style="fill:#575757;"></ellipse>
                                        <polygon points="73.76 71.02 74.9 69.05 138.4 69.76 137.86 71.97 73.76 71.02" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <polygon points="110.1 61.14 112.71 61.24 112.5 64.24 109.35 64.1 110.1 61.14" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <polygon points="162.98 68.11 163.17 65.44 153.18 62.75 152.77 65.26 162.98 68.11" style="fill-rule:evenodd;fill:url(#bf);"></polygon>
                                        <polygon points="152.77 65.26 153.18 62.75 109.25 61.11 109.08 62.44 152.77 65.26" style="fill-rule:evenodd;fill:url(#bg);"></polygon>
                                        <ellipse cx="161.52" cy="66.34" rx="0.88" ry="0.85" style="fill:#575757;"></ellipse>
                                        <polygon points="142.07 68.11 141.14 66.03 77.9 60.55 78.2 62.8 142.07 68.11" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <path d="M88.68,114.43l2.82,5.42c2.38,4.58,9.88,3.91,17.37,3.91s14.32.61,17.84-3.43c1.25-1.43,2.84-4.15,4.11-5.9Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#bh);"></path>
                                        <ellipse cx="175.16" cy="101.2" rx="3.14" ry="3.23" style="fill:#575757;"></ellipse>
                                        <rect x="102.27" y="118.13" width="15.95" height="2.27" style="fill:#1d1c1a;"></rect>
                                        <path d="M32.19,125.7l7.2-5.94H51.31L48.2,113.9q1-6.18,1.94-12.35c1-6.42.51-7,7.33-9.08,5-1.57,12.85-2.28,18.15-2.29,8,0,7.54-.58,9,6.53l3.57,17.72L91,119.85c2.37,4.58,10.38,3.92,17.87,3.92s14.32.6,17.84-3.44c1.25-1.43,2.84-4.15,4.11-5.9l3.92-17c1.2-5.24.55-7.5,6.54-8.19,5.11-.59,12.14,1,18.7,2.09s5.82,2,7.64,8.77l3.8,14.1-.26,6.4,15.9,4.89.39,18.47L31.52,145.23Z" transform="translate(0.01 0)" style="fill:#171614;fill-opacity:0.49019598960876465;fill-rule:evenodd;"></path>
                                        <path d="M83.46,20.43A330.72,330.72,0,0,1,70.21,57.49c3.2-3.51,3.8-4.82,5.72-10.18,2.13-6,3.5-9.63,5.64-15.58C83.45,26.46,83.89,25.06,83.46,20.43Z" transform="translate(0.01 0)" style="fill:#e89300;fill-rule:evenodd;"></path>
                                        <path d="M139.18,20.43a330.72,330.72,0,0,0,13.25,37.06c-3.2-3.51-3.8-4.82-5.72-10.18-2.13-6-3.51-9.63-5.64-15.58C139.18,26.46,138.74,25.06,139.18,20.43Z" transform="translate(0.01 0)" style="fill:#e89300;fill-rule:evenodd;"></path>
                                        <polygon points="33.25 36.03 31.46 34.43 24.83 85.1 28.42 82.56 33.25 36.03" style="fill:#ffc642;fill-rule:evenodd;"></polygon>
                                        <polygon points="185.62 35.54 187.41 33.94 194.04 84.61 190.45 82.08 185.62 35.54" style="fill:#ffc642;fill-rule:evenodd;"></polygon>
                                        <path d="M33.52,20.06,23.17,39c-.19,2.93-.37,5.87-.56,8.8q4.63-10.66,9.25-21.33c-.23,2.35-.45,4.7-.68,7.07-.33,3.33,3.73,1.35,5.13,0s21.76-19.7,21.78-19.71c20.46-8.71,54.23-10,77.59-6.72A95.78,95.78,0,0,1,160.36,14l14.85,13.41c3.53,3.19,6.41,5.81,6.88,6.27a8,8,0,0,0,2.92,1.7,3,3,0,0,0,1.33.15,1.21,1.21,0,0,0,.95-.65,2.48,2.48,0,0,0,.17-1.29l-.61-6.25,9.22,21.26c-.2-3.19-.39-6.38-.61-9.57h0L185.09,20,183,18.44a103.7,103.7,0,0,0-13.17-8.79,14.74,14.74,0,0,0-3.54-1.24,22.77,22.77,0,0,1-3.92-1.29,51.34,51.34,0,0,0-6-2.33,18,18,0,0,0-6-.88h-.14c-7.41.34-10.31-1.49-17.3-3.82-16,.09-31.16.18-47.12.09-7,2.35-9.94,4.16-17.46,3.81-4-.18-8,1.44-12,3.2-3.22,1.42-5,1.25-7.46,2.53C44,12.27,39.7,15.59,33.63,20.05Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <polygon points="113.32 0.28 106.21 0.3 104.83 2.29 106.66 4.29 112.59 4.29 114.77 2.59 113.32 0.28" style="fill:#fefefe;stroke:#2b2a29;stroke-miterlimit:10;stroke-width:0.5669199824333191px;fill-rule:evenodd;"></polygon>
                                        <g style="mask:url(#bi);">
                                        <path d="M55.87,11.09c-5.48,2.08-10.4,4.79-17.45,9.2-2.08,1.3-5.25,2.7-5.48,5-.19,1.89-.18,4.52-.37,6.41-.42,4.13.27,3,3.57.35A242.12,242.12,0,0,0,55.53,14c3-3.07,5.46-4.78.34-2.83Z" transform="translate(0.01 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#bj);">
                                        <path d="M162.49,11.07c5.48,2.08,10.4,4.8,17.45,9.21,2.07,1.3,5.24,2.69,5.48,5,.19,1.89.18,4.51.37,6.4.42,4.14-.27,3-3.57.36-4.39-3.54-7.35-6.83-11.74-10.37l-7.65-7.73c-3-3.08-5.46-4.78-.34-2.84Z" transform="translate(0.01 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M20.91,86.23l.72-.22a.63.63,0,0,1,.59.09.61.61,0,0,1,.27.51v9.66a.61.61,0,0,1-.27.51.65.65,0,0,1-.59.09l-.72-.22a.64.64,0,0,1-.46-.6V86.83A.63.63,0,0,1,20.91,86.23Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <path d="M21.48,95.28l-.06-7.64a.57.57,0,0,0-.22-.47.65.65,0,0,0-.5-.15l-.86.09a.68.68,0,0,0-.46.25l-1.16,1.49a.55.55,0,0,0-.12.35l-.25,4.92a.61.61,0,0,0,.28.55l1.39.93a.67.67,0,0,0,.23.1l.94.2a.64.64,0,0,0,.55-.13A.59.59,0,0,0,21.48,95.28Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#bk);"></path>
                                        <path d="M197.47,86.23l-.73-.22a.61.61,0,0,0-.58.09.61.61,0,0,0-.27.51v9.66a.61.61,0,0,0,.27.51.63.63,0,0,0,.58.09l.73-.22a.64.64,0,0,0,.46-.6V86.83A.63.63,0,0,0,197.47,86.23Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <path d="M196.9,95.28l.06-7.64a.57.57,0,0,1,.22-.47.65.65,0,0,1,.5-.15l.86.09a.59.59,0,0,1,.45.25l1.16,1.49a.56.56,0,0,1,.13.35l.25,4.92a.61.61,0,0,1-.28.55l-1.39.93a.67.67,0,0,1-.23.1l-.94.2a.64.64,0,0,1-.55-.13A.59.59,0,0,1,196.9,95.28Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#bl);"></path>
                                        <path d="M23.08,106.89l-9-.45c-2.16-.11-3.87-.56-5.65.57-2.88,1.84-4.58,3.24-5.87,4.16C-.66,113.49.1,113.07,0,116v1.84C.1,120.48.93,120,2.84,119c3.5-2,6.27-3.4,9.77-5.23,1.77-.93,2-1,.62-2.65h11.5q0-6-.1-12c0-2.71.11-3.93-1.28-2.3l-.27,10.13Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#bm);"></path>
                                        <path d="M195.81,107.22l9-.44c2.16-.11,3.87-.56,5.65.57,2.88,1.83,4.58,3.24,5.87,4.16,3.26,2.32,2.49,1.89,2.56,4.78v1.83c-.1,2.65-.93,2.19-2.84,1.11-3.5-2-6.27-3.39-9.77-5.22-1.77-.93-2-1-.61-2.65H194.16q0-6,.1-12c0-2.71-.11-3.93,1.28-2.3l.27,10.13Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#bn);"></path>
                                        <g style="mask:url(#bo);">
                                        <path d="M24.73,110.4l-.28-.07a.65.65,0,0,0-.54.12.62.62,0,0,0-.25.5l-.13,70.64a.63.63,0,0,0,.2.47.6.6,0,0,0,.48.16h.52a.65.65,0,0,0,.59-.64l-.59-71.14Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#bp);">
                                        <path d="M194.26,111.1l.28-.07a.59.59,0,0,1,.54.12.6.6,0,0,1,.25.49l.13,70.65a.63.63,0,0,1-.2.46.57.57,0,0,1-.48.17h-.52a.63.63,0,0,1-.59-.63l.59-71.15Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#bq);">
                                        <path d="M195.11,222.1h.1a1.16,1.16,0,0,1,.64,0c.21.06.33.16.33.28l.13,88.44c0,.1-.07.18-.22.24a1.15,1.15,0,0,1-.52.07H195c-.3,0-.52-.15-.52-.31l.59-88.62Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#br);">
                                        <path d="M26.26,218.74h-.1a1.16,1.16,0,0,0-.64,0c-.21.06-.33.16-.33.28l-.14,88.44c0,.09.08.18.23.24a1.31,1.31,0,0,0,.52.07l.53,0c.3,0,.52-.16.52-.31l-.59-88.63Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M20.54,160.13v-1.84a.63.63,0,0,0-.26-.5.68.68,0,0,0-.57-.1l-.76.21a.64.64,0,0,0-.45.45l-1,3.7v.17l.41,12.58a.58.58,0,0,0,.06.26l.38.75a.66.66,0,0,0,.73.35.64.64,0,0,0,.51-.62l.12-14a.57.57,0,0,1,.16-.41l.55-.61a.58.58,0,0,0,.16-.42Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <path d="M197.79,160.5v-1.84a.59.59,0,0,1,.26-.49.62.62,0,0,1,.57-.1l.75.2a.65.65,0,0,1,.46.45l1,3.7a.54.54,0,0,1,0,.18l-.41,12.57a.48.48,0,0,1-.07.26l-.37.75a.66.66,0,0,1-.73.35.64.64,0,0,1-.51-.61l-.12-14a.57.57,0,0,0-.16-.41l-.55-.6a.67.67,0,0,1-.16-.43Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <path d="M199.27,228v-1.83a.6.6,0,0,1,.27-.5.63.63,0,0,1,.56-.1l.76.21a.61.61,0,0,1,.45.45l1,3.69v.18l-.41,12.58a.54.54,0,0,1-.06.25l-.38.76a.65.65,0,0,1-.73.34.61.61,0,0,1-.51-.61l-.12-14a.57.57,0,0,0-.1-.42l-.55-.6a.58.58,0,0,1-.16-.43Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <polygon points="18.46 198.01 31.03 193.75 31.03 195.07 18.47 199.35 18.46 198.01" style="fill:#b37100;"></polygon>
                                        <polygon points="200.09 201.97 188.35 197.7 188.36 199.03 200.08 203.31 200.09 201.97" style="fill:#b37100;"></polygon>
                                        <polygon points="198.99 325.1 188.9 320.83 188.91 322.16 198.99 326.44 198.99 325.1" style="fill:#b37100;"></polygon>
                                        <rect x="33.54" y="185.34" width="150.67" height="4.96" style="fill:url(#bs);"></rect>
                                        <path d="M142.94,154.39h1.56a.92.92,0,0,1,.9.94h0v2.43a.92.92,0,0,1-.9.94h-1.56a.92.92,0,0,1-.9-.94h0v-2.43a.92.92,0,0,1,.9-.94Z" transform="translate(0.01 0)" style="fill:#141414;fill-rule:evenodd;"></path>
                                        <path d="M103.61,155.33h1.57a.92.92,0,0,1,.89.95v2.42a.93.93,0,0,1-.86,1h-1.6a.93.93,0,0,1-.89-1v-2.45A.92.92,0,0,1,103.61,155.33Z" transform="translate(0.01 0)" style="fill:#141414;fill-rule:evenodd;"></path>
                                        <path d="M93.84,127.32h4.47c1.81,0,3.27,1.82,3.27,4.08V176c0,2.26-1.46,4.08-3.27,4.08H93.84c-1.8,0-3.26-1.82-3.26-4.08V131.4C90.58,129.14,92,127.32,93.84,127.32Z" transform="translate(0.01 0)" style="stroke:#211f1f;stroke-miterlimit:10;stroke-width:0.5669199824333191px;fill-rule:evenodd;fill:url(#bt);"></path>
                                        <path d="M98.79,141.51a3.48,3.48,0,0,1,1.81,3,4.18,4.18,0,0,1-8.27,0,3.45,3.45,0,0,1,1.8-3,.86.86,0,0,0,.46-.76v-2.07a.86.86,0,0,0-.43-.74,3.24,3.24,0,0,1-1.58-2.71,3.92,3.92,0,0,1,7.76,0,3.24,3.24,0,0,1-1.58,2.71.86.86,0,0,0-.43.74v2.07A.88.88,0,0,0,98.79,141.51Z" transform="translate(0.01 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                        <path d="M96.18,148.06a3.9,3.9,0,0,1-3.84-3.34,3,3,0,0,1,1.55-2.33.75.75,0,0,0,.4-.65v-.34a.85.85,0,0,0,.3-.65v-2.07a.86.86,0,0,0-.43-.74,3.4,3.4,0,0,1-1.46-1.87,3.36,3.36,0,0,1,3.21-2A3.17,3.17,0,0,1,99.27,137a2.68,2.68,0,0,1-.1.69,3.91,3.91,0,0,1-.41.3.86.86,0,0,0-.43.74V139a3.5,3.5,0,0,1-.43.33.74.74,0,0,0-.37.64v1.8a.74.74,0,0,0,.39.65A3,3,0,0,1,99.49,145a3.32,3.32,0,0,1-3.31,3.09Z" transform="translate(0.01 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <path d="M91.79,155.16h9a1.11,1.11,0,0,1,1.18,1l.27,25.65a.92.92,0,0,1-.34.72,1.19,1.19,0,0,1-.84.31H91.52a1.19,1.19,0,0,1-.84-.31,1,1,0,0,1-.34-.72l.28-25.65A1.09,1.09,0,0,1,91.79,155.16Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#bu);"></path>
                                        <g style="mask:url(#bv);">
                                        <polygon points="102.13 182.78 90.19 182.78 91.25 177.98 100.59 177.98 102.13 182.78" style="fill-rule:evenodd;"></polygon>
                                        </g>
                                        <g style="mask:url(#bw);">
                                        <polygon points="90.19 182.78 90.48 155.09 91.25 177.98 90.19 182.78" style="fill-rule:evenodd;"></polygon>
                                        </g>
                                        <g style="mask:url(#bx);">
                                        <polygon points="100.59 177.98 101.84 155.09 102.13 182.78 100.59 177.98" style="fill-rule:evenodd;"></polygon>
                                        </g>
                                        <path d="M92.42,149.15h7.7a.9.9,0,0,1,.69.28.66.66,0,0,1,.17.64l-.07.29a.85.85,0,0,1-.86.61H92.49a.85.85,0,0,1-.87-.61l-.07-.29a.72.72,0,0,1,.18-.64A.9.9,0,0,1,92.42,149.15Z" transform="translate(0.01 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                        <path d="M92.57,152.05h7.63a.91.91,0,0,1,.68.28.66.66,0,0,1,.18.64l-.07.29a.85.85,0,0,1-.86.61H92.64a.85.85,0,0,1-.86-.61l-.07-.29a.66.66,0,0,1,.18-.64A.91.91,0,0,1,92.57,152.05Z" transform="translate(0.01 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                        <path d="M92.28,149.42h6.56a.77.77,0,0,1,.59.24.57.57,0,0,1,.15.54l-.06.25a.73.73,0,0,1-.74.52H92.34a.71.71,0,0,1-.73-.52l-.06-.25a.57.57,0,0,1,.15-.54A.75.75,0,0,1,92.28,149.42Z" transform="translate(0.01 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <path d="M92.48,152.32H99a.75.75,0,0,1,.58.24.57.57,0,0,1,.15.54l-.06.25a.71.71,0,0,1-.73.52h-6.4a.73.73,0,0,1-.74-.52l-.06-.25a.59.59,0,0,1,.16-.54A.75.75,0,0,1,92.48,152.32Z" transform="translate(0.01 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <path d="M92.28,149.42h6.56a.77.77,0,0,1,.59.24.57.57,0,0,1,.15.54l-.06.25a.73.73,0,0,1-.74.52H92.34a.71.71,0,0,1-.73-.52l-.06-.25a.57.57,0,0,1,.15-.54A.75.75,0,0,1,92.28,149.42Z" transform="translate(0.01 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#by);">
                                        <path d="M193.09,334.63h.09a1.78,1.78,0,0,1,.65,0c.2,0,.32.1.32.18l.14,57c0,.06-.08.11-.23.15a1.51,1.51,0,0,1-.52,0H193c-.3,0-.52-.1-.51-.2l.59-57.08Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#bz);">
                                        <path d="M26.76,334.63h-.1a1.72,1.72,0,0,0-.64,0c-.21,0-.33.1-.33.18l-.13,57c0,.06.08.11.23.15a1.46,1.46,0,0,0,.51,0h.53c.31,0,.52-.1.52-.2l-.59-57.08Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M103.69,155.14h2.17a.48.48,0,0,1,.52.45v3.2a.48.48,0,0,1-.52.45h-2.17a.48.48,0,0,1-.52-.45v-3.2A.48.48,0,0,1,103.69,155.14Z" transform="translate(0.01 0)" style="fill:#ff1a1d;fill-rule:evenodd;"></path>
                                        <path d="M86.9,155.14h2.16a.48.48,0,0,1,.52.45v3.2a.48.48,0,0,1-.52.45H86.9a.48.48,0,0,1-.52-.45v-3.2A.48.48,0,0,1,86.9,155.14Z" transform="translate(0.01 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        <path d="M50.56,160.63a6.3,6.3,0,0,1,3,.47c-3.87-6.92-5-16.49-4.24-27.87.48-4.39,3.41-6.37,7.48-7.3,5-1.14,15.29-1.14,20.25,0,4.06.93,7,2.91,7.48,7.3.75,11.38-.37,20.94-4.24,27.87a6.3,6.3,0,0,1,3-.47c1.76.26,1.85,1,1.8,2.23-.28,6.76-.62,13.44-2.22,17.93-1.19,3.37-2.16,4.26-5.44,5.3-5.24,1.66-15.79,1.66-21,0-3.29-1-4.25-1.93-5.45-5.3-1.59-4.49-1.93-11.17-2.21-17.93C48.71,161.61,48.79,160.89,50.56,160.63Z" transform="translate(0.01 0)" style="fill:#0f0f0f;fill-rule:evenodd;"></path>
                                        <path d="M57.23,159.94a114.49,114.49,0,0,0,19.42.09c.15.46.31,1,.48,1.43s.41.93.92.91c1.52,0,5-1.75,5.14-1.73s.25.06.25.21c-.62,5.83.27,12.76-4.15,16.41a9.8,9.8,0,0,1-2.61,1.3c-.16-.62-.26-2.54-2.28-2.76a82.36,82.36,0,0,0-13.87,0c-2.19.23-2.11,1.76-2.39,2.8a10.67,10.67,0,0,1-3-1.35c-4.39-3.72-4-10.35-4.67-16.32,0-.16.2-.18.39-.21s2.74,1.27,4.33,1.66,1.51-1.32,2-2.42ZM54.91,164c-.27.63-.12,5.61-.11,6.93,0,1.72-.28,3.33,1.37,4.19a3.2,3.2,0,0,0,2.11.19,60.34,60.34,0,0,1,17.7,0,1.38,1.38,0,0,0,1.33-.19c1.53-.87,1.52-2.47,1.52-4.2,0-1.06-.07-6.67-.23-6.93-1.71-2.69-14.33-3.34-20.46-1.9-1.74.4-2.92,1.16-3.23,1.87Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ca);"></path>
                                        <path d="M52.81,157.73c-2.37-5.49-3.25-12.31-3-20.16a24.83,24.83,0,0,1,.43-5.09A6.78,6.78,0,0,1,53.62,128a.76.76,0,0,1,1,.26.54.54,0,0,1,.05.11l2.42,5.91a.75.75,0,0,1-.17.84,2.14,2.14,0,0,0-.7,1.59V145A2.46,2.46,0,0,0,58,147.3a2.44,2.44,0,0,0-1.65,2.3v8.25a2.15,2.15,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.58,1.6a.75.75,0,0,1-1,.47.74.74,0,0,1-.38-.29,18.69,18.69,0,0,1-2.47-4.29Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cb);"></path>
                                        <path d="M81.07,157.73c2.37-5.49,3.25-12.31,3-20.16a24.15,24.15,0,0,0-.44-5.09A6.76,6.76,0,0,0,80.26,128a.76.76,0,0,0-1,.26.54.54,0,0,0,0,.11l-2.43,5.91a.76.76,0,0,0,.18.84,2.14,2.14,0,0,1,.69,1.59V145a2.46,2.46,0,0,1-1.71,2.3,2.44,2.44,0,0,1,1.65,2.3v8.25a2.15,2.15,0,0,1-.68,1.58.75.75,0,0,0-.19.8l.58,1.6a.76.76,0,0,0,1,.46.82.82,0,0,0,.36-.28,18.72,18.72,0,0,0,2.48-4.29Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cc);"></path>
                                        <path d="M59.25,135a84,84,0,0,1,15.54,0,2.15,2.15,0,0,1,2,2.14v7.72a2.1,2.1,0,0,1-2,2.15H59.25a2.1,2.1,0,0,1-2-2.15v-7.72A2.15,2.15,0,0,1,59.25,135Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cd);"></path>
                                        <path d="M59.19,159.57a85.81,85.81,0,0,0,15.54,0,2.15,2.15,0,0,0,2-2.14v-7.68a2.09,2.09,0,0,0-2-2.14H59.19a2.09,2.09,0,0,0-2,2.14v7.68A2.16,2.16,0,0,0,59.19,159.57Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ce);"></path>
                                        <path d="M77.86,165c.06,2.1,0,5.31,0,7.42a2.08,2.08,0,0,1-1.94,2.2h-.17a61.5,61.5,0,0,0-17.87,0,2.07,2.07,0,0,1-2.12-2,1.08,1.08,0,0,1,0-.18V165C55.68,161,77.78,161.8,77.86,165Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cf);"></path>
                                        <path d="M61.53,176.6h11.9a2.78,2.78,0,0,1,2.51,2.79v3.42a2.49,2.49,0,0,1-2.51,2.45H61.53A2.48,2.48,0,0,1,59,182.81h0v-3.42A2.79,2.79,0,0,1,61.53,176.6Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cg);"></path>
                                        <path d="M75.21,134.35a.73.73,0,0,0,.75-.44c.67-1.45,1.33-2.91,2-4.36.35-.78,1.07-1.89,0-2.37-3.45-1.5-18.18-1.5-21.62,0-1.11.48-.39,1.59,0,2.37.67,1.45,1.33,2.91,2,4.36a.75.75,0,0,0,.76.44,87.67,87.67,0,0,1,16.2,0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ch);"></path>
                                        <path d="M52,182.79c-3.14-6.11-2.89-13.69-3.25-19.7-.11-1.83.2-2.19,1.85-2.47.88,6.89,0,15.78,7.53,18-.36,4.95-.22,7.56,3,7.57,2,0,3.47,0,5.09-.05h0c2.9-.09,4.75.14,7.65,0s3.08-2.62,2.76-7.57c6.78-2.18,6-11,6.77-17.91,1.49.28,1.73.78,1.64,2.44-.32,6-.06,13.57-2.89,19.68a4.94,4.94,0,0,1-3,2.83c-3.18,1.57-6.56,1.68-9.91,1.66h0c-4.66,0-9.49.35-14-1.64-1.71-.76-2.44-1.13-3.32-2.83Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ci);"></path>
                                        <path d="M108.82,160.63a6.3,6.3,0,0,1,3,.47c-3.88-6.92-5-16.49-4.24-27.87.47-4.39,3.41-6.37,7.47-7.3,5-1.14,15.3-1.14,20.26,0,4.06.93,7,2.91,7.47,7.3.76,11.38-.37,20.94-4.24,27.87a6.3,6.3,0,0,1,3-.47c1.77.26,1.85,1,1.8,2.23-.27,6.76-.62,13.44-2.21,17.93-1.2,3.37-2.16,4.26-5.45,5.3-5.24,1.66-15.78,1.66-21,0-3.29-1-4.26-1.93-5.45-5.3-1.59-4.49-1.94-11.17-2.21-17.93,0-1.25,0-2,1.79-2.23Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M115.5,159.94a114.38,114.38,0,0,0,19.41.09c.15.46.32,1,.48,1.43s.42.93.93.91c1.52,0,5-1.75,5.14-1.73s.25.06.24.21c-.61,5.83.27,12.76-4.15,16.41a9.74,9.74,0,0,1-2.6,1.3c-.16-.62-.26-2.54-2.28-2.76a82.36,82.36,0,0,0-13.87,0c-2.19.23-2.11,1.76-2.39,2.8a10.28,10.28,0,0,1-3-1.35c-4.39-3.72-4-10.35-4.67-16.32,0-.16.2-.18.38-.21s2.74,1.27,4.34,1.66,1.51-1.32,2-2.42ZM113.18,164c-.27.63-.12,5.61-.12,6.93,0,1.72-.27,3.33,1.38,4.19a3.17,3.17,0,0,0,2.1.19,60.41,60.41,0,0,1,17.71,0,1.37,1.37,0,0,0,1.32-.19c1.53-.87,1.53-2.47,1.53-4.2,0-1.06-.07-6.67-.23-6.93-1.71-2.69-14.33-3.34-20.47-1.9-1.74.4-2.91,1.16-3.22,1.87Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cj);"></path>
                                        <path d="M111.07,157.73c-2.37-5.49-3.25-12.31-3-20.16a23.5,23.5,0,0,1,.43-5.09,6.73,6.73,0,0,1,3.42-4.48.73.73,0,0,1,1,.26.39.39,0,0,1,.06.11l2.43,5.91a.76.76,0,0,1-.18.84,2.18,2.18,0,0,0-.69,1.59V145a2.46,2.46,0,0,0,1.72,2.3,2.45,2.45,0,0,0-1.66,2.3v8.25a2.19,2.19,0,0,0,.68,1.58.73.73,0,0,1,.19.8l-.57,1.6a.76.76,0,0,1-1.33.18,19.32,19.32,0,0,1-2.48-4.29Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ck);"></path>
                                        <path d="M139.34,157.73c2.37-5.49,3.25-12.31,3-20.16a23.5,23.5,0,0,0-.43-5.09,6.73,6.73,0,0,0-3.42-4.48.73.73,0,0,0-1,.26.39.39,0,0,0-.06.11L135,134.28a.76.76,0,0,0,.18.84,2.14,2.14,0,0,1,.69,1.59V145a2.46,2.46,0,0,1-1.72,2.3,2.45,2.45,0,0,1,1.66,2.3v8.25a2.15,2.15,0,0,1-.68,1.58.75.75,0,0,0-.19.8l.57,1.6a.76.76,0,0,0,1.33.18,19.32,19.32,0,0,0,2.48-4.29Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cl);"></path>
                                        <path d="M117.51,135a84.14,84.14,0,0,1,15.55,0,2.15,2.15,0,0,1,2,2.14v7.72a2.07,2.07,0,0,1-2,2.15H117.51a2.1,2.1,0,0,1-2-2.15v-7.72A2.15,2.15,0,0,1,117.51,135Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cm);"></path>
                                        <path d="M117.45,159.57a85.92,85.92,0,0,0,15.55,0,2.15,2.15,0,0,0,2-2.14v-7.68a2.08,2.08,0,0,0-2-2.14H117.45a2.08,2.08,0,0,0-2,2.14v7.68A2.16,2.16,0,0,0,117.45,159.57Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cn);"></path>
                                        <path d="M136.13,165c.06,2.1,0,5.31,0,7.42a2.08,2.08,0,0,1-1.94,2.2H134a61.57,61.57,0,0,0-17.88,0,2.07,2.07,0,0,1-2.11-2V165C113.94,161,136.05,161.8,136.13,165Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#co);"></path>
                                        <path d="M119.8,176.6h11.89a2.79,2.79,0,0,1,2.52,2.79v3.42a2.49,2.49,0,0,1-2.52,2.45H119.8a2.49,2.49,0,0,1-2.52-2.45v-3.42A2.79,2.79,0,0,1,119.8,176.6Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cp);"></path>
                                        <path d="M133.47,134.35a.73.73,0,0,0,.76-.44c.67-1.45,1.33-2.91,2-4.36.36-.78,1.07-1.89,0-2.37-3.45-1.5-18.18-1.5-21.63,0-1.1.48-.38,1.59,0,2.37l2,4.36a.75.75,0,0,0,.76.44,87.56,87.56,0,0,1,16.19,0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cq);"></path>
                                        <path d="M110.29,182.79c-3.15-6.11-2.89-13.69-3.25-19.7-.11-1.83.19-2.19,1.85-2.47.88,6.89,0,15.78,7.52,18-.36,4.95-.21,7.56,3.06,7.57,2,0,3.47,0,5.08-.05h0c2.9-.09,4.76.14,7.65,0s3.09-2.62,2.76-7.57c6.78-2.18,6-11,6.78-17.91,1.49.28,1.73.78,1.63,2.44-.31,6-.05,13.57-2.89,19.68a4.91,4.91,0,0,1-3,2.83c-3.18,1.57-6.56,1.68-9.9,1.66h0c-4.67,0-9.5.35-14-1.64-1.71-.76-2.44-1.13-3.32-2.83Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cr);"></path>
                                        <path d="M145.14,160.63a6.3,6.3,0,0,1,3,.47c-3.88-6.92-5-16.49-4.24-27.87.47-4.39,3.41-6.37,7.47-7.3,5-1.14,15.3-1.14,20.25,0,4.07.93,7,2.91,7.48,7.3.76,11.38-.37,20.94-4.24,27.87a6.3,6.3,0,0,1,3-.47c1.77.26,1.85,1,1.8,2.23-.27,6.76-.62,13.44-2.21,17.93-1.2,3.37-2.16,4.26-5.45,5.3-5.24,1.66-15.79,1.66-21,0-3.29-1-4.26-1.93-5.45-5.3-1.59-4.49-1.94-11.17-2.21-17.93,0-1.25,0-2,1.79-2.23Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M151.82,159.94a114.38,114.38,0,0,0,19.41.09c.15.46.32,1,.48,1.43s.42.93.93.91c1.52,0,5-1.75,5.14-1.73s.25.06.24.21c-.61,5.83.27,12.76-4.15,16.41a9.74,9.74,0,0,1-2.6,1.3c-.16-.62-.26-2.54-2.28-2.76a82.48,82.48,0,0,0-13.88,0c-2.18.23-2.1,1.76-2.38,2.8a10.28,10.28,0,0,1-3-1.35c-4.39-3.72-4-10.35-4.68-16.32,0-.16.21-.18.39-.21s2.74,1.27,4.34,1.66,1.51-1.32,2-2.42ZM149.5,164c-.27.63-.12,5.61-.12,6.93,0,1.72-.27,3.33,1.38,4.19a3.17,3.17,0,0,0,2.1.19,60.41,60.41,0,0,1,17.71,0,1.37,1.37,0,0,0,1.32-.19c1.53-.87,1.53-2.47,1.53-4.2,0-1.06-.07-6.67-.24-6.93-1.7-2.69-14.32-3.34-20.46-1.9-1.74.4-2.91,1.16-3.22,1.87Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cs);"></path>
                                        <path d="M147.39,157.73c-2.37-5.49-3.25-12.31-3-20.16a23.5,23.5,0,0,1,.43-5.09,6.73,6.73,0,0,1,3.42-4.48.73.73,0,0,1,1,.26.39.39,0,0,1,.06.11l2.43,5.91a.76.76,0,0,1-.18.84,2.14,2.14,0,0,0-.69,1.59V145a2.46,2.46,0,0,0,1.72,2.3,2.45,2.45,0,0,0-1.66,2.3v8.25a2.15,2.15,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.57,1.6a.76.76,0,0,1-1.33.18,19.32,19.32,0,0,1-2.48-4.29Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ct);"></path>
                                        <path d="M175.66,157.73c2.37-5.49,3.25-12.31,3-20.16a23.5,23.5,0,0,0-.43-5.09,6.73,6.73,0,0,0-3.42-4.48.73.73,0,0,0-1,.26.39.39,0,0,0-.06.11l-2.43,5.91a.76.76,0,0,0,.18.84,2.18,2.18,0,0,1,.69,1.59V145a2.46,2.46,0,0,1-1.72,2.3,2.45,2.45,0,0,1,1.66,2.3v8.25a2.19,2.19,0,0,1-.68,1.58.73.73,0,0,0-.19.8l.57,1.6a.76.76,0,0,0,1.33.18,19.32,19.32,0,0,0,2.48-4.29Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cu);"></path>
                                        <path d="M153.83,135a84.14,84.14,0,0,1,15.55,0,2.15,2.15,0,0,1,2,2.14v7.72a2.07,2.07,0,0,1-2,2.15H153.83a2.07,2.07,0,0,1-2-2.15v-7.72A2.15,2.15,0,0,1,153.83,135Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cv);"></path>
                                        <path d="M153.77,159.57a85.92,85.92,0,0,0,15.55,0,2.15,2.15,0,0,0,2-2.14v-7.68a2.08,2.08,0,0,0-2-2.14H153.77a2.08,2.08,0,0,0-2,2.14v7.68A2.16,2.16,0,0,0,153.77,159.57Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cw);"></path>
                                        <path d="M172.45,165c.05,2.1,0,5.31,0,7.42a2.08,2.08,0,0,1-1.94,2.2h-.17a61.57,61.57,0,0,0-17.88,0,2.07,2.07,0,0,1-2.11-2V165C150.26,161,172.35,161.83,172.45,165Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cx);"></path>
                                        <path d="M156.12,176.6H168a2.79,2.79,0,0,1,2.52,2.79v3.42a2.49,2.49,0,0,1-2.52,2.45H156.12a2.49,2.49,0,0,1-2.52-2.45v-3.42A2.79,2.79,0,0,1,156.12,176.6Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cy);"></path>
                                        <path d="M169.79,134.35a.75.75,0,0,0,.76-.44l2-4.36c.35-.78,1.07-1.89,0-2.37-3.45-1.5-18.18-1.5-21.63,0-1.1.48-.38,1.59,0,2.37l2,4.36a.75.75,0,0,0,.76.44,87.56,87.56,0,0,1,16.19,0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#cz);"></path>
                                        <path d="M146.61,182.79c-3.15-6.11-2.89-13.69-3.25-19.7-.11-1.83.19-2.19,1.85-2.47.88,6.89,0,15.78,7.52,18-.36,4.95-.21,7.56,3.06,7.57,2,0,3.47,0,5.08-.05h0c2.9-.09,4.76.14,7.65,0s3.09-2.62,2.76-7.57c6.78-2.18,6-11,6.78-17.91,1.49.28,1.73.78,1.63,2.44-.31,6-.05,13.57-2.89,19.68a4.91,4.91,0,0,1-3,2.83c-3.18,1.57-6.56,1.68-9.9,1.66h0c-4.66,0-9.49.35-14-1.64-1.72-.76-2.44-1.13-3.32-2.83Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#da);"></path>
                                        <path d="M45.25,97.63a3.17,3.17,0,1,1-3.08,3.26v-.09A3.14,3.14,0,0,1,45.25,97.63Z" transform="translate(0.01 0)" style="fill:#201f21;fill-opacity:0.16862699389457703;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#db);">
                                        <path d="M60.54,121.43a24.48,24.48,0,0,1-5.24-3.05c-4.11-2.75-4-4.51-3.44-9.25,1-8.1-.3-12.1,7.78-14,3.64-.87,10.07-.61,14-.85,4.55-.29,6.88,3.31,7.62,7.42.51,2.84.38,5.1,1,7.5.88,3.15,1,6.39-3.25,8.81a35.69,35.69,0,0,1-6.56,3.38,107.91,107.91,0,0,1-11.93,0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dc);"></path>
                                        </g>
                                        <path d="M74.77,102.09q-1.48,6.76-3,13.53c.78,1,.9.29,1.33-1.54l1.32-5.61a15.1,15.1,0,0,0,.33-6.38Z" transform="translate(0.01 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#dd);">
                                        <path d="M59.3,102.63q1.48,6.77,3,13.54c-.78,1-.9.28-1.33-1.55L59.63,109a15.1,15.1,0,0,1-.33-6.38Z" transform="translate(0.01 0)" style="fill:#4d4d4d;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M58.77,120.05l-.45.5a3.26,3.26,0,0,1-2,1.44l-3.69,1.16c-2.19.69-2,.22-2.79.43a4.51,4.51,0,0,0-2,1.64c.14,2,.63,2.06,1.91,1.36.34-.19.91-.4,1.35-.66,1.16-.69.07-.82,1.24-1.18l4.51-1.36a4,4,0,0,0,2.32-1.49l1.55-1.46a3.94,3.94,0,0,1-2-.38Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#de);"></path>
                                        <path d="M75,119.45c-2.77,1.23-6,1-8.93,1s-6.79.44-9-1.24c2,3.14,3.27,6.21,3,9.13H73.51c-.86-3.38.15-6.18,1.45-8.9Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#df);"></path>
                                        <path d="M49,131.22c-.4,3.25,3.77,4.51,9.92,4.9a120.89,120.89,0,0,0,16.15,0c6.15-.39,10.31-1.65,9.91-4.9-2.19-7.11-33.86-6.87-36,0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dg);"></path>
                                        <path d="M67.16,128.54c8.85,0,16,1.64,16,3.66s-7.17,3.65-16,3.65-16-1.64-16-3.65S58.32,128.54,67.16,128.54Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dh);"></path>
                                        <path d="M54.07,127.67a52.11,52.11,0,0,1,25.28-.21c-3.85-2.1-9.08-2.91-13.24-2.83-4.47.08-7.87,1.19-12,3Z" transform="translate(0.01 0)" style="fill:#464546;fill-rule:evenodd;"></path>
                                        <path d="M75,130.89l-2.38,1.85a.63.63,0,0,0-.2.86,1,1,0,0,0,1,.45l6.13-.39a1,1,0,0,0,.77-.4c.9-1.32-4.36-3.08-5.27-2.37Z" transform="translate(0.01 0)" style="fill:#4f4f4f;fill-rule:evenodd;"></path>
                                        <path d="M62,130.1a.61.61,0,0,0,.1.77l1.68,1.8a1,1,0,0,0,.77.31H70a1,1,0,0,0,.74-.28l1.68-1.7a.64.64,0,0,0,.14-.78C72,129.19,62.42,129.36,62,130.1Z" transform="translate(0.01 0)" style="fill:#252525;fill-rule:evenodd;"></path>
                                        <path d="M59.06,130.63l2.38,1.85a.63.63,0,0,1,.2.86,1,1,0,0,1-1,.45l-6.13-.39a1,1,0,0,1-.77-.4c-.9-1.32,4.36-3.08,5.27-2.37Z" transform="translate(0.01 0)" style="fill:#252525;fill-rule:evenodd;"></path>
                                        <path d="M67.39,131.34c2,0,3.54.71,3.54,1.59s-1.58,1.58-3.54,1.58-3.53-.71-3.53-1.58S65.44,131.34,67.39,131.34Z" transform="translate(0.01 0)" style="fill:#1d1d1f;fill-rule:evenodd;"></path>
                                        <path d="M67.42,132c1.6,0,2.91.47,2.91,1.06s-1.31,1.07-2.91,1.07-2.92-.48-2.92-1.07S65.81,132,67.42,132Z" transform="translate(0.01 0)" style="fill:#8e8a95;fill-rule:evenodd;"></path>
                                        <path d="M142.24,155.14h2.17a.48.48,0,0,1,.52.45v3.2a.48.48,0,0,1-.52.45h-2.17a.48.48,0,0,1-.52-.45v-3.2A.48.48,0,0,1,142.24,155.14Z" transform="translate(0.01 0)" style="fill:#ff1a1d;fill-rule:evenodd;"></path>
                                        <path d="M147.47,378.58c-7.83,0-10-3.29-10.52-9.24-.21-2.32-.33-5.81-.34-9.31h0v-.12h0c0-3.51.13-7,.34-9.31.54-6,2.69-9.24,10.52-9.24.79-.07,18.21-.76,18.25-.76,1.95.11,3.9.25,5.75.47,10.34,1.25,12.85,3.59,13,16v5.73c-.16,12.45-2.67,14.78-13,16-1.85.23-3.8.37-5.75.48,0,0-17.46-.69-18.25-.76Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M164.34,368.3a65.16,65.16,0,0,0,0-17.2,2.21,2.21,0,0,0-2.17-2.25,1.45,1.45,0,0,0-.36,0H147c-1.9,0-2.06,1-2.06,2.23v17.2c0,1.22.16,2.23,2.06,2.23h14.77a2.21,2.21,0,0,0,2.54-1.82A2.83,2.83,0,0,0,164.34,368.3Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#di);"></path>
                                        <path d="M165.47,370.29a156,156,0,0,0,.16-20.74c.89-.65,2.07-.86,1.75-2.33-.15-.66-.61-3.62-.77-4.65s12.63.35,13.87,3.83c.28.77.59,2.21.91,3.15-1.14.26-2.64.4-2.82,2.53a111,111,0,0,0,0,14.59,2.6,2.6,0,0,0,2.55,2.65h.31a17.91,17.91,0,0,1-1.62,3.7c-2.36,3.27-7.63,4.39-13.09,4.27.68-2.93.46-2.07,1-4.54.32-1.59-1.31-1.75-2.2-2.45Zm3.37,2.28c.52.29,4.63.13,5.71.13,1.42,0,2.74.29,3.46-1.45a4.26,4.26,0,0,0,.16-2.21,80.61,80.61,0,0,1,0-18.63A1.79,1.79,0,0,0,178,349c-.72-1.61-2-1.6-3.46-1.6a54.41,54.41,0,0,0-5.71.24c-2.22,1.8-2.76,15.07-1.58,21.52.34,1.83,1,3.07,1.55,3.39Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dj);"></path>
                                        <path d="M170,348.5c1.61-.06,4.06,0,5.68,0a1.92,1.92,0,0,1,1.69,2.13s0,0,0,.06a87.24,87.24,0,0,0,0,18.56,1.91,1.91,0,0,1-1.6,2.18H170C166.92,371.53,167.56,348.58,170,348.5Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dk);"></path>
                                        <path d="M165.31,346.4c-4.31-2.4-10.07-3.4-16.82-3.33-1.94,0-4.66-.09-6.4.93a5.47,5.47,0,0,0-1.94,2,.55.55,0,0,0-.05.47.7.7,0,0,0,.34.34l3.87,2.12a.57.57,0,0,0,.65-.13,4,4,0,0,1,1.94-.82h16.38a1.69,1.69,0,0,1,1.22.51.61.61,0,0,0,.63.15l1.23-.43a.56.56,0,0,0,.39-.46.55.55,0,0,0-.24-.54l-1.16-.8h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dl);"></path>
                                        <path d="M165.31,373.29c-4.34,2.44-10.07,3.42-16.82,3.33-1.94,0-4.66.1-6.4-.92a5.47,5.47,0,0,1-1.94-2,.55.55,0,0,1-.05-.47.63.63,0,0,1,.34-.34l3.87-2.13a.57.57,0,0,1,.65.14,4,4,0,0,0,1.94.82c6.79,0,9.51-.05,16.38-.05a1.69,1.69,0,0,0,1.22-.51.59.59,0,0,1,.63-.14l1.23.43a.56.56,0,0,1,.15,1l-1.16.8h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dm);"></path>
                                        <path d="M140.52,371.28l3.25-1.82a.84.84,0,0,0,.35-.78c-.21-2.94-.31-5.88-.32-8.82h0q0-4.41.32-8.82a.84.84,0,0,0-.35-.78l-3.25-1.82c-.94-.53-1.48-1.28-1.94.35-.57,2-.79,6.51-.76,11.08s.19,9.09.76,11.08c.46,1.63,1,.87,1.94.35Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dn);"></path>
                                        <path d="M180.15,376.48c-3,1.88-7.78,2.31-13.52,2.68-1.54.1.33-.12.07-1.88,6.89-1,10.74-2.41,11.76-5.75.07-.22-.17-6.37-.14-12.32v-.07h6.18v7.21a20.28,20.28,0,0,1-1.28,6.2,7,7,0,0,1-3.07,3.93Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#do);"></path>
                                        <path d="M180.05,343.4c-3-1.87-7.78-2.31-13.52-2.68-1.54-.1.33.12.07,1.88,6.89,1,10.74,2.41,11.76,5.75.07.23-.17,6.37-.14,12.33v.07h6.18v-7.22a20.28,20.28,0,0,0-1.28-6.2,7.15,7.15,0,0,0-3.07-3.93Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dp);"></path>
                                        <path d="M147.47,417.36c-7.83,0-10-3.29-10.52-9.24-.21-2.31-.33-5.81-.34-9.31h0v-.12h0c0-3.51.13-7,.34-9.31.54-6,2.69-9.24,10.52-9.24.79-.07,18.21-.76,18.25-.76,1.95.11,3.9.25,5.75.47,10.34,1.25,12.85,3.59,13,16v5.73c-.16,12.45-2.67,14.78-13,16-1.85.23-3.8.37-5.75.48,0,0-17.46-.69-18.25-.76Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M164.34,407.08a65.16,65.16,0,0,0,0-17.2,2.2,2.2,0,0,0-2.15-2.24,1.59,1.59,0,0,0-.38,0H147c-1.9,0-2.06,1-2.06,2.22v17.2c0,1.22.16,2.23,2.06,2.23h14.77a2.21,2.21,0,0,0,2.54-1.82A2.83,2.83,0,0,0,164.34,407.08Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dq);"></path>
                                        <path d="M165.47,409.07a156,156,0,0,0,.16-20.74c.89-.64,2.07-.86,1.75-2.32-.15-.67-.61-3.63-.77-4.66s12.63.35,13.87,3.83c.28.78.59,2.21.91,3.15-1.14.26-2.64.4-2.82,2.53a111,111,0,0,0,0,14.59,2.58,2.58,0,0,0,2.52,2.65,1.9,1.9,0,0,0,.34,0,18.54,18.54,0,0,1-1.62,3.71c-2.36,3.26-7.63,4.38-13.09,4.26.68-2.93.46-2.07,1-4.54.32-1.59-1.31-1.75-2.2-2.45Zm3.37,2.28c.52.29,4.63.13,5.71.13,1.42,0,2.74.29,3.46-1.45a4.26,4.26,0,0,0,.16-2.21,80.61,80.61,0,0,1,0-18.63,1.77,1.77,0,0,0-.16-1.39c-.72-1.61-2-1.6-3.46-1.6a51.83,51.83,0,0,0-5.71.25c-2.22,1.79-2.76,15.06-1.58,21.51.34,1.84,1,3.07,1.55,3.39Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dr);"></path>
                                        <path d="M170,387.28c1.61-.06,4.06,0,5.68,0a1.92,1.92,0,0,1,1.69,2.13s0,0,0,.06a87.24,87.24,0,0,0,0,18.56,1.91,1.91,0,0,1-1.6,2.18H170C166.94,410.31,167.58,387.36,170,387.28Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ds);"></path>
                                        <path d="M165.31,385.18c-4.34-2.43-10.07-3.41-16.82-3.33-1.94,0-4.66-.09-6.4.93a5.47,5.47,0,0,0-1.94,2,.55.55,0,0,0-.05.47.63.63,0,0,0,.34.34l3.87,2.12a.57.57,0,0,0,.65-.13,4,4,0,0,1,1.94-.82c6.79,0,9.51.05,16.38.05a1.65,1.65,0,0,1,1.22.51.61.61,0,0,0,.63.14l1.23-.43a.56.56,0,0,0,.15-1l-1.16-.8Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dt);"></path>
                                        <path d="M165.31,412.08c-4.34,2.43-10.07,3.41-16.82,3.33-1.94,0-4.66.09-6.4-.93a5.47,5.47,0,0,1-1.94-2,.55.55,0,0,1-.05-.47.63.63,0,0,1,.34-.34l3.87-2.13a.57.57,0,0,1,.65.14,4,4,0,0,0,1.94.82h16.38a1.65,1.65,0,0,0,1.22-.51.61.61,0,0,1,.63-.14l1.23.43a.56.56,0,0,1,.15,1l-1.16.8Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#du);"></path>
                                        <path d="M140.52,410.06l3.25-1.82a.84.84,0,0,0,.35-.78c-.21-2.94-.31-5.88-.32-8.82h0q0-4.41.32-8.82a.84.84,0,0,0-.35-.78l-3.25-1.82c-.94-.52-1.48-1.28-1.94.35-.57,2-.79,6.51-.76,11.08s.19,9.09.76,11.08c.46,1.63,1,.88,1.94.35Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dv);"></path>
                                        <path d="M180.15,415.26c-3,1.88-7.78,2.31-13.52,2.68-1.54.1.33-.11.07-1.88,6.89-1,10.74-2.41,11.76-5.75.07-.22-.17-6.37-.14-12.32v-.07h6.18v7.22a20.16,20.16,0,0,1-1.28,6.19,7,7,0,0,1-3.07,3.93Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dw);"></path>
                                        <path d="M180.05,382.18c-3-1.87-7.78-2.31-13.52-2.68-1.54-.09.33.12.07,1.88,6.89,1,10.74,2.41,11.76,5.76.07.22-.17,6.37-.14,12.32v.07h6.18v-7.22a20.28,20.28,0,0,0-1.28-6.2,7.15,7.15,0,0,0-3.07-3.93Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dx);"></path>
                                        <path d="M147.47,339.79c-7.83,0-10-3.28-10.52-9.24-.21-2.31-.33-5.8-.34-9.31h0v-.12h0c0-3.5.13-7,.34-9.31.54-5.95,2.69-9.24,10.52-9.24.79-.07,18.21-.76,18.25-.76,1.95.11,3.9.25,5.75.48,10.34,1.25,12.85,3.58,13,16V324c-.16,12.44-2.67,14.78-13,16-1.85.22-3.8.36-5.75.47,0,0-17.46-.69-18.25-.76Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M164.34,329.51a64.25,64.25,0,0,0,0-17.19,2.21,2.21,0,0,0-2.17-2.25,1.45,1.45,0,0,0-.36,0H147c-1.9,0-2.06,1-2.06,2.23v17.19c0,1.23.16,2.23,2.06,2.23h14.77a2.21,2.21,0,0,0,2.54-1.82A2.83,2.83,0,0,0,164.34,329.51Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dy);"></path>
                                        <path d="M165.47,331.5a155.87,155.87,0,0,0,.16-20.73c.89-.65,2.07-.86,1.75-2.33-.15-.66-.61-3.62-.77-4.66s12.63.36,13.87,3.83c.28.78.59,2.21.91,3.15-1.14.26-2.64.41-2.82,2.53a111,111,0,0,0,0,14.59,2.58,2.58,0,0,0,2.5,2.65,2.17,2.17,0,0,0,.36,0,18,18,0,0,1-1.62,3.71c-2.36,3.26-7.63,4.39-13.09,4.27.68-2.93.46-2.07,1-4.55.32-1.58-1.31-1.75-2.2-2.45Zm3.37,2.29c.52.28,4.63.12,5.71.12,1.42,0,2.74.29,3.46-1.45a4.26,4.26,0,0,0,.16-2.21,80.53,80.53,0,0,1,0-18.62,1.8,1.8,0,0,0-.16-1.4c-.72-1.6-2-1.6-3.46-1.6a54.41,54.41,0,0,0-5.71.25c-2.22,1.8-2.76,15.06-1.58,21.52.34,1.83,1,3.06,1.55,3.39Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#dz);"></path>
                                        <path d="M170,309.71c1.61-.06,4.06,0,5.68,0a1.94,1.94,0,0,1,1.69,2.15v.05a87.14,87.14,0,0,0,0,18.55,1.92,1.92,0,0,1-1.61,2.19h-.07c-1.62,0-4.07-.05-5.68,0C166.92,332.74,167.56,309.8,170,309.71Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ea);"></path>
                                        <path d="M165.31,307.62c-4.34-2.44-10.07-3.42-16.82-3.33-1.94,0-4.66-.1-6.4.92a5.47,5.47,0,0,0-1.94,2,.55.55,0,0,0-.05.47.63.63,0,0,0,.34.34l3.87,2.13A.56.56,0,0,0,145,310a4,4,0,0,1,1.94-.82c6.79,0,9.51.05,16.38.05a1.69,1.69,0,0,1,1.22.51.59.59,0,0,0,.63.14l1.23-.43a.56.56,0,0,0,.15-1l-1.16-.8h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#eb);"></path>
                                        <path d="M165.31,334.51c-4.34,2.43-10.07,3.41-16.82,3.33-1.94,0-4.66.09-6.4-.93a5.47,5.47,0,0,1-1.94-2,.55.55,0,0,1-.05-.47.7.7,0,0,1,.34-.34l3.87-2.12a.57.57,0,0,1,.65.13,4,4,0,0,0,1.94.82c6.79,0,9.51-.05,16.38-.05a1.65,1.65,0,0,0,1.22-.51.63.63,0,0,1,.63-.14l1.23.43a.56.56,0,0,1,.39.46.55.55,0,0,1-.24.54l-1.16.8h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ec);"></path>
                                        <path d="M140.52,332.49l3.25-1.81a.86.86,0,0,0,.35-.79c-.21-2.94-.31-5.88-.32-8.82h0q0-4.41.32-8.82a.84.84,0,0,0-.35-.78c-1.09-.6-2.17-1.21-3.25-1.82s-1.48-1.27-1.94.36c-.57,2-.79,6.5-.76,11.07s.19,9.1.76,11.08c.46,1.63,1,.88,1.94.35Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ed);"></path>
                                        <path d="M180.15,337.7c-3,1.87-7.78,2.31-13.52,2.68-1.54.09.33-.12.07-1.88,6.89-1,10.74-2.41,11.76-5.76.07-.22-.17-6.37-.14-12.32v-.07h6.18v7.22a20.28,20.28,0,0,1-1.28,6.2,7.15,7.15,0,0,1-3.07,3.93Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ee);"></path>
                                        <path d="M180.05,304.62c-3-1.88-7.78-2.31-13.52-2.68-1.54-.1.33.12.07,1.88,6.89,1,10.74,2.41,11.76,5.75.07.22-.17,6.37-.14,12.32V322h6.18v-7.22a20.16,20.16,0,0,0-1.28-6.19,7,7,0,0,0-3.07-3.93Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ef);"></path>
                                        <path d="M71.82,378.58c7.83,0,10-3.29,10.52-9.24.21-2.32.33-5.81.34-9.31h0v-.12h0c0-3.51-.13-7-.34-9.31-.54-6-2.69-9.24-10.52-9.24-.79-.07-18.22-.76-18.25-.76-2,.11-3.9.25-5.75.47-10.34,1.25-12.85,3.59-13,16v5.73c.16,12.45,2.67,14.78,13,16,1.85.23,3.8.37,5.75.48,0,0,17.46-.69,18.25-.76Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M55,368.3a64.32,64.32,0,0,1,0-17.2,2.21,2.21,0,0,1,2.17-2.25,1.45,1.45,0,0,1,.36,0H72.25c1.9,0,2.06,1,2.06,2.23v17.2c0,1.22-.16,2.23-2.06,2.23H57.48A2.21,2.21,0,0,1,55,368.61,1.62,1.62,0,0,1,55,368.3Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#eg);"></path>
                                        <path d="M53.82,370.29a156,156,0,0,1-.16-20.74c-.89-.65-2.07-.86-1.75-2.33.15-.66.61-3.62.77-4.65s-12.63.35-13.88,3.83c-.27.77-.58,2.21-.9,3.15,1.14.26,2.64.4,2.82,2.53a111,111,0,0,1,0,14.59,2.6,2.6,0,0,1-2.55,2.65h-.31A17.16,17.16,0,0,0,39.5,373c2.36,3.27,7.63,4.39,13.09,4.27-.68-2.93-.47-2.07-1-4.54-.32-1.59,1.3-1.75,2.19-2.45Zm-3.37,2.28c-.52.29-4.63.13-5.71.13-1.42,0-2.75.29-3.46-1.45a4.26,4.26,0,0,1-.16-2.21,80.61,80.61,0,0,0,0-18.63,1.77,1.77,0,0,1,.16-1.39c.71-1.61,2-1.6,3.46-1.6a54.41,54.41,0,0,1,5.71.24c2.22,1.8,2.76,15.07,1.58,21.52-.34,1.83-1,3.07-1.55,3.39Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#eh);"></path>
                                        <path d="M49.31,348.5c-1.61-.06-4.07,0-5.68,0A1.92,1.92,0,0,0,42,350.67v0a87.24,87.24,0,0,1,0,18.56,1.91,1.91,0,0,0,1.6,2.18h5.76C52.37,371.53,51.73,348.58,49.31,348.5Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ei);"></path>
                                        <path d="M54,346.4c4.32-2.4,10-3.4,16.8-3.33,1.94,0,4.66-.09,6.4.93a5.47,5.47,0,0,1,1.94,2,.55.55,0,0,1,0,.47.61.61,0,0,1-.33.34L75,348.91a.55.55,0,0,1-.65-.13,4,4,0,0,0-1.94-.82H56a1.73,1.73,0,0,0-1.23.51.58.58,0,0,1-.62.15l-1.24-.43a.58.58,0,0,1-.38-.46.55.55,0,0,1,.24-.54l1.15-.8h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ej);"></path>
                                        <path d="M54,373.29c4.34,2.44,10.07,3.42,16.82,3.33,1.94,0,4.66.1,6.4-.92a5.47,5.47,0,0,0,1.94-2,.55.55,0,0,0,0-.47.58.58,0,0,0-.33-.34L75,370.78a.57.57,0,0,0-.65.14,4,4,0,0,1-1.94.82c-6.79,0-9.52-.05-16.38-.05a1.73,1.73,0,0,1-1.23-.51.57.57,0,0,0-.62-.14l-1.24.43a.56.56,0,0,0-.38.46.55.55,0,0,0,.24.54l1.15.8h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ek);"></path>
                                        <path d="M78.77,371.28l-3.25-1.82a.84.84,0,0,1-.35-.78c.21-2.94.31-5.88.32-8.82h0q0-4.41-.32-8.82a.84.84,0,0,1,.35-.78l3.25-1.82c.94-.53,1.48-1.28,1.94.35.57,2,.79,6.51.76,11.08S81.28,369,80.71,371c-.46,1.63-1,.87-1.94.35Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#el);"></path>
                                        <path d="M39.14,376.48c3,1.88,7.78,2.31,13.52,2.68,1.54.1-.33-.12-.07-1.88-6.89-1-10.75-2.41-11.77-5.75-.06-.22.18-6.37.15-12.32v-.07H34.79v7.21a20.28,20.28,0,0,0,1.28,6.2A7,7,0,0,0,39.14,376.48Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#em);"></path>
                                        <path d="M39.24,343.4c3-1.87,7.78-2.31,13.52-2.68,1.54-.1-.33.12-.07,1.88-6.89,1-10.75,2.41-11.77,5.75-.06.23.18,6.37.15,12.33v.07H34.89v-7.22a20.28,20.28,0,0,1,1.28-6.2A7.15,7.15,0,0,1,39.24,343.4Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#en);"></path>
                                        <path d="M71.82,417.36c7.83,0,10-3.29,10.52-9.24.21-2.31.33-5.81.34-9.31h0v-.12h0c0-3.51-.13-7-.34-9.31-.54-6-2.69-9.24-10.52-9.24-.79-.07-18.22-.76-18.25-.76-2,.11-3.9.25-5.75.47-10.34,1.25-12.85,3.59-13,16v5.73c.16,12.45,2.67,14.78,13,16,1.85.23,3.8.37,5.75.48,0,0,17.46-.69,18.25-.76Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M55,407.08a64.32,64.32,0,0,1,0-17.2,2.2,2.2,0,0,1,2.15-2.24,1.59,1.59,0,0,1,.38,0H72.25c1.9,0,2.06,1,2.06,2.22v17.2c0,1.22-.16,2.23-2.06,2.23H57.48A2.21,2.21,0,0,1,55,407.39,1.62,1.62,0,0,1,55,407.08Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#eo);"></path>
                                        <path d="M53.82,409.07a156,156,0,0,1-.16-20.74c-.89-.64-2.07-.86-1.75-2.32.15-.67.61-3.63.77-4.66s-12.63.35-13.88,3.83c-.27.78-.58,2.21-.9,3.15,1.14.26,2.64.4,2.82,2.53a111,111,0,0,1,0,14.59,2.58,2.58,0,0,1-2.52,2.65,1.9,1.9,0,0,1-.34,0,18,18,0,0,0,1.62,3.71c2.36,3.26,7.63,4.38,13.09,4.26-.68-2.93-.47-2.07-1-4.54-.32-1.59,1.3-1.75,2.19-2.45Zm-3.37,2.28c-.52.29-4.63.13-5.71.13-1.42,0-2.75.29-3.46-1.45a4.26,4.26,0,0,1-.16-2.21,80.61,80.61,0,0,0,0-18.63,1.77,1.77,0,0,1,.16-1.39c.71-1.61,2-1.6,3.46-1.6a51.83,51.83,0,0,1,5.71.25c2.22,1.79,2.76,15.06,1.58,21.51-.34,1.84-1,3.07-1.55,3.39Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ep);"></path>
                                        <path d="M49.31,387.28c-1.61-.06-4.07,0-5.68,0A1.92,1.92,0,0,0,42,389.45v0A87,87,0,0,1,42,408a1.91,1.91,0,0,0,1.6,2.18h5.76c3.06.09,2.42-22.86,0-22.94Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#eq);"></path>
                                        <path d="M54,385.18c4.34-2.43,10.07-3.41,16.82-3.33,1.94,0,4.66-.09,6.4.93a5.47,5.47,0,0,1,1.94,2,.55.55,0,0,1,0,.47.58.58,0,0,1-.33.34L75,387.69a.55.55,0,0,1-.65-.13,4,4,0,0,0-1.94-.82c-6.79,0-9.52.05-16.38.05a1.72,1.72,0,0,0-1.23.51.59.59,0,0,1-.62.14L52.92,387a.56.56,0,0,1-.38-.46.55.55,0,0,1,.24-.54l1.15-.8h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#er);"></path>
                                        <path d="M54,412.08c4.34,2.43,10.07,3.41,16.82,3.33,1.94,0,4.66.09,6.4-.93a5.47,5.47,0,0,0,1.94-2,.55.55,0,0,0,0-.47.58.58,0,0,0-.33-.34L75,409.56a.57.57,0,0,0-.65.14,4,4,0,0,1-1.94.82H56A1.72,1.72,0,0,1,54.8,410a.59.59,0,0,0-.62-.14l-1.24.43a.56.56,0,0,0-.38.46.55.55,0,0,0,.24.54l1.15.8h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#es);"></path>
                                        <path d="M78.77,410.06l-3.25-1.82a.84.84,0,0,1-.35-.78c.21-2.94.31-5.88.32-8.82h0q0-4.41-.32-8.82a.84.84,0,0,1,.35-.78l3.25-1.82c.94-.52,1.48-1.28,1.94.35.57,2,.79,6.51.76,11.08s-.19,9.09-.76,11.08c-.46,1.63-1,.88-1.94.35Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#et);"></path>
                                        <path d="M39.14,415.26c3,1.88,7.78,2.31,13.52,2.68,1.54.1-.33-.11-.07-1.88-6.89-1-10.75-2.41-11.77-5.75-.06-.22.18-6.37.15-12.32v-.07H34.79v7.22a20.16,20.16,0,0,0,1.28,6.19,7,7,0,0,0,3.07,3.93Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#eu);"></path>
                                        <path d="M39.24,382.18c3-1.87,7.78-2.31,13.52-2.68,1.54-.09-.33.12-.07,1.88-6.89,1-10.75,2.41-11.77,5.76-.06.22.18,6.37.15,12.32v.07H34.89v-7.22a20.28,20.28,0,0,1,1.28-6.2,7.15,7.15,0,0,1,3.07-3.93Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ev);"></path>
                                        <path d="M71.82,339.79c7.83,0,10-3.28,10.52-9.24.21-2.31.33-5.8.34-9.31h0v-.12h0c0-3.5-.13-7-.34-9.31-.54-5.95-2.69-9.24-10.52-9.24-.79-.07-18.22-.76-18.25-.76-2,.11-3.9.25-5.75.48-10.34,1.25-12.85,3.58-13,16V324c.16,12.44,2.67,14.78,13,16,1.85.22,3.8.36,5.75.47,0,0,17.46-.69,18.25-.76Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M55,329.51a64.25,64.25,0,0,1,0-17.19,2.21,2.21,0,0,1,2.17-2.25,1.45,1.45,0,0,1,.36,0H72.25c1.9,0,2.06,1,2.06,2.23v17.19c0,1.23-.16,2.23-2.06,2.23H57.48A2.21,2.21,0,0,1,55,329.82,1.62,1.62,0,0,1,55,329.51Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ew);"></path>
                                        <path d="M53.82,331.5a155.87,155.87,0,0,1-.16-20.73c-.89-.65-2.07-.86-1.75-2.33.15-.66.61-3.62.77-4.66s-12.63.36-13.88,3.83c-.27.78-.58,2.21-.9,3.15,1.14.26,2.64.41,2.82,2.53a111,111,0,0,1,0,14.59,2.58,2.58,0,0,1-2.5,2.65,2.17,2.17,0,0,1-.36,0,18,18,0,0,0,1.62,3.71c2.36,3.26,7.63,4.39,13.09,4.27-.68-2.93-.47-2.07-1-4.55-.32-1.58,1.3-1.75,2.19-2.45Zm-3.37,2.29c-.52.28-4.63.12-5.71.12-1.42,0-2.75.29-3.46-1.45a4.26,4.26,0,0,1-.16-2.21,80.53,80.53,0,0,0,0-18.62,1.8,1.8,0,0,1,.16-1.4c.71-1.6,2-1.6,3.46-1.6a54.41,54.41,0,0,1,5.71.25c2.22,1.8,2.76,15.06,1.58,21.52-.34,1.83-1,3.06-1.55,3.39Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ex);"></path>
                                        <path d="M49.31,309.71c-1.61-.06-4.07,0-5.68,0a1.94,1.94,0,0,0-1.69,2.15v.05a87.14,87.14,0,0,1,0,18.55,1.92,1.92,0,0,0,1.61,2.19h.07c1.61,0,4.07-.05,5.68,0C52.37,332.74,51.73,309.8,49.31,309.71Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ey);"></path>
                                        <path d="M54,307.62c4.34-2.44,10.07-3.42,16.82-3.33,1.94,0,4.66-.1,6.4.92a5.47,5.47,0,0,1,1.94,2,.55.55,0,0,1,0,.47.58.58,0,0,1-.33.34L75,310.13a.57.57,0,0,1-.65-.14,4,4,0,0,0-1.94-.82c-6.79,0-9.52.05-16.38.05a1.73,1.73,0,0,0-1.23.51.57.57,0,0,1-.62.14l-1.24-.43a.56.56,0,0,1-.38-.46.55.55,0,0,1,.24-.54l1.15-.8h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ez);"></path>
                                        <path d="M54,334.51c4.34,2.43,10.07,3.41,16.82,3.33,1.94,0,4.66.09,6.4-.93a5.47,5.47,0,0,0,1.94-2,.55.55,0,0,0,0-.47.61.61,0,0,0-.33-.34L75,332a.55.55,0,0,0-.65.13,4,4,0,0,1-1.94.82c-6.79,0-9.52-.05-16.38-.05a1.72,1.72,0,0,1-1.23-.51.61.61,0,0,0-.62-.14l-1.24.43a.58.58,0,0,0-.38.46.55.55,0,0,0,.24.54l1.15.8h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fa);"></path>
                                        <path d="M78.77,332.49l-3.25-1.81a.86.86,0,0,1-.35-.79c.21-2.94.31-5.88.32-8.82h0q0-4.41-.32-8.82a.84.84,0,0,1,.35-.78l3.25-1.82c.94-.52,1.48-1.27,1.94.36.57,2,.79,6.5.76,11.07s-.19,9.1-.76,11.08c-.46,1.63-1,.88-1.94.35Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fb);"></path>
                                        <path d="M39.14,337.7c3,1.87,7.78,2.31,13.52,2.68,1.54.09-.33-.12-.07-1.88-6.89-1-10.75-2.41-11.77-5.76-.06-.22.18-6.37.15-12.32v-.07H34.79v7.22a20.28,20.28,0,0,0,1.28,6.2A7.15,7.15,0,0,0,39.14,337.7Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fc);"></path>
                                        <path d="M39.24,304.62c3-1.88,7.78-2.31,13.52-2.68,1.54-.1-.33.12-.07,1.88-6.89,1-10.75,2.41-11.77,5.75-.06.22.18,6.37.15,12.32V322H34.89v-7.22a20.16,20.16,0,0,1,1.28-6.19,7,7,0,0,1,3.07-3.93Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fd);"></path>
                                        <path d="M75.35,229.27c0,7.83,3.29,10,9.24,10.52,2.31.21,5.81.33,9.31.34H94c3.51,0,7-.13,9.31-.34,6-.54,9.24-2.69,9.24-10.52.07-.79.76-18.21.76-18.25-.11-2-.25-3.9-.47-5.75-1.25-10.34-3.59-12.85-16-13H91.1c-12.45.16-14.78,2.67-16,13-.23,1.85-.37,3.8-.48,5.75,0,0,.69,17.46.76,18.25Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M85.63,212.4a64.32,64.32,0,0,1,17.2,0,2.2,2.2,0,0,1,2.24,2.15,1.59,1.59,0,0,1,0,.38V229.7c0,1.9-1,2.06-2.22,2.06H85.63c-1.22,0-2.23-.16-2.23-2.06V214.93a2.21,2.21,0,0,1,1.87-2.51Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fe);"></path>
                                        <path d="M83.64,211.27a157.73,157.73,0,0,1,20.74-.16c.64-.89.86-2.07,2.33-1.75.66.15,3.62.61,4.65.77s-.35-12.63-3.83-13.87c-.78-.28-2.21-.59-3.15-.91-.26,1.14-.4,2.64-2.53,2.82a107.63,107.63,0,0,1-14.59,0,2.58,2.58,0,0,1-2.65-2.52,1.9,1.9,0,0,1,0-.34,17.91,17.91,0,0,0-3.7,1.62c-3.27,2.36-4.39,7.63-4.27,13.09,2.93-.68,2.07-.46,4.54-1,1.59-.32,1.75,1.3,2.45,2.2Zm-2.28-3.37c-.29-.52-.13-4.63-.13-5.71,0-1.42-.29-2.74,1.45-3.46a4.26,4.26,0,0,1,2.21-.16,80.61,80.61,0,0,0,18.63,0,1.74,1.74,0,0,1,1.39.15c1.61.72,1.6,2,1.6,3.46a54.41,54.41,0,0,1-.24,5.71c-1.8,2.22-15.07,2.76-21.52,1.58-1.84-.34-3.07-1-3.39-1.55Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ff);"></path>
                                        <path d="M105.43,206.76c.06-1.61,0-4.06,0-5.68a1.92,1.92,0,0,0-2.13-1.69h-.06a87.24,87.24,0,0,1-18.56,0A1.91,1.91,0,0,0,82.5,201s0,.05,0,.08v5.68C82.4,209.82,105.35,209.18,105.43,206.76Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fg);"></path>
                                        <path d="M107.53,211.43c2.43,4.34,3.41,10.07,3.33,16.82,0,1.94.09,4.66-.93,6.4a5.47,5.47,0,0,1-2,1.94.55.55,0,0,1-.47,0,.7.7,0,0,1-.34-.34L105,232.43a.57.57,0,0,1,.13-.65,4,4,0,0,0,.82-1.94V213.46a1.65,1.65,0,0,0-.51-1.22.61.61,0,0,1-.14-.63l.43-1.23a.55.55,0,0,1,.7-.37.51.51,0,0,1,.3.22l.8,1.16h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fh);"></path>
                                        <path d="M80.63,211.43c-2.43,4.34-3.41,10.07-3.32,16.82,0,1.94-.1,4.66.92,6.4a5.47,5.47,0,0,0,2,1.94.55.55,0,0,0,.47,0,.63.63,0,0,0,.34-.34l2.13-3.87a.57.57,0,0,0-.14-.65,4,4,0,0,1-.82-1.94V213.41a1.69,1.69,0,0,1,.51-1.22.61.61,0,0,0,.14-.63l-.43-1.23A.56.56,0,0,0,82,210a.55.55,0,0,0-.54.24l-.8,1.16h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fi);"></path>
                                        <path d="M82.65,236.22,84.47,233a.82.82,0,0,1,.78-.34q4.41.3,8.82.31h0q4.41,0,8.82-.31a.82.82,0,0,1,.78.34l1.82,3.25c.53.94,1.28,1.48-.35,1.94-2,.57-6.51.79-11.08.77s-9.09-.2-11.08-.77C81.37,237.7,82.13,237.16,82.65,236.22Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fj);"></path>
                                        <path d="M77.45,196.59c-1.88,3-2.31,7.78-2.68,13.52-.1,1.54.12-.33,1.88-.07,1-6.89,2.41-10.74,5.75-11.76.22-.07,6.37.17,12.32.14h.07v-6.18H87.57a20.16,20.16,0,0,0-6.19,1.28,7,7,0,0,0-3.93,3.07Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fk);"></path>
                                        <path d="M110.53,196.69c1.87,3,2.31,7.78,2.68,13.52.1,1.54-.12-.33-1.88-.07-1-6.89-2.41-10.74-5.76-11.76-.22-.07-6.37.17-12.32.14h-.07v-6.18h7.22a20.28,20.28,0,0,1,6.2,1.28,7.15,7.15,0,0,1,3.93,3.07Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fl);"></path>
                                        <path d="M36.57,229.27c0,7.83,3.29,10,9.24,10.52,2.31.21,5.81.33,9.31.34h.12c3.51,0,7-.13,9.31-.34,6-.54,9.24-2.69,9.24-10.52.07-.79.76-18.21.76-18.25-.11-2-.25-3.9-.47-5.75-1.26-10.34-3.59-12.85-16-13H52.32c-12.45.16-14.78,2.67-16,13-.23,1.85-.37,3.8-.48,5.75,0,0,.69,17.46.76,18.25Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M46.85,212.4a64.32,64.32,0,0,1,17.2,0,2.2,2.2,0,0,1,2.24,2.15,1.59,1.59,0,0,1,0,.38V229.7c0,1.9-1,2.06-2.22,2.06H46.85c-1.23,0-2.23-.16-2.23-2.06V214.93a2.21,2.21,0,0,1,1.87-2.51Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fm);"></path>
                                        <path d="M44.86,211.27a157.73,157.73,0,0,1,20.74-.16c.64-.89.86-2.07,2.32-1.75.67.15,3.63.61,4.66.77s-.36-12.63-3.83-13.87c-.78-.28-2.21-.59-3.15-.91-.26,1.14-.4,2.64-2.53,2.82a107.63,107.63,0,0,1-14.59,0,2.58,2.58,0,0,1-2.65-2.52,1.9,1.9,0,0,1,0-.34A18.55,18.55,0,0,0,42.13,197c-3.26,2.36-4.38,7.63-4.27,13.09,2.94-.68,2.08-.46,4.55-1,1.59-.32,1.75,1.3,2.45,2.2Zm-2.29-3.37c-.28-.52-.12-4.63-.12-5.71,0-1.42-.29-2.74,1.45-3.46a4.26,4.26,0,0,1,2.21-.16,81.65,81.65,0,0,0,18.62,0,1.76,1.76,0,0,1,1.4.15c1.6.72,1.6,2,1.6,3.46a51.83,51.83,0,0,1-.25,5.71c-1.79,2.22-15.06,2.76-21.51,1.58-1.84-.34-3.07-1-3.4-1.55Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fn);"></path>
                                        <path d="M66.65,206.76c.06-1.61,0-4.06,0-5.68a1.92,1.92,0,0,0-2.13-1.69h-.06a87.24,87.24,0,0,1-18.56,0,1.91,1.91,0,0,0-2.18,1.6s0,.05,0,.08v5.68C43.62,209.82,66.57,209.18,66.65,206.76Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fo);"></path>
                                        <path d="M68.75,211.43c2.43,4.34,3.41,10.07,3.33,16.82,0,1.94.09,4.66-.93,6.4a5.47,5.47,0,0,1-2,1.94.55.55,0,0,1-.47,0,.63.63,0,0,1-.34-.34l-2.12-3.87a.57.57,0,0,1,.13-.65,4,4,0,0,0,.82-1.94V213.41a1.65,1.65,0,0,0-.51-1.22.61.61,0,0,1-.14-.63l.43-1.23a.56.56,0,0,1,1-.15l.8,1.16h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fp);"></path>
                                        <path d="M41.85,211.43c-2.43,4.34-3.41,10.07-3.33,16.82,0,1.94-.09,4.66.93,6.4a5.47,5.47,0,0,0,2,1.94.55.55,0,0,0,.47,0,.63.63,0,0,0,.34-.34l2.12-3.87a.57.57,0,0,0-.13-.65,4,4,0,0,1-.82-1.94c0-6.79,0-9.51,0-16.38a1.65,1.65,0,0,1,.51-1.22.61.61,0,0,0,.14-.63l-.43-1.23a.56.56,0,0,0-1-.15l-.8,1.16h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fq);"></path>
                                        <path d="M43.87,236.22,45.69,233a.82.82,0,0,1,.78-.34q4.41.3,8.82.31h0q4.41,0,8.82-.31a.82.82,0,0,1,.78.34l1.82,3.25c.52.94,1.28,1.48-.35,1.94-2,.57-6.51.79-11.08.77s-9.1-.2-11.08-.77C42.59,237.7,43.34,237.16,43.87,236.22Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fr);"></path>
                                        <path d="M38.67,196.59c-1.88,3-2.32,7.78-2.68,13.52-.1,1.54.11-.33,1.87-.07,1-6.89,2.41-10.74,5.76-11.76.22-.07,6.37.17,12.32.14H56v-6.18H48.79a20.28,20.28,0,0,0-6.2,1.28,7.05,7.05,0,0,0-3.92,3.07Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fs);"></path>
                                        <path d="M71.75,196.69c1.87,3,2.31,7.78,2.67,13.52.1,1.54-.11-.33-1.87-.07-1-6.89-2.41-10.74-5.76-11.76-.22-.07-6.37.17-12.32.14H54.4v-6.18h7.22a20.28,20.28,0,0,1,6.2,1.28,7.15,7.15,0,0,1,3.93,3.07Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ft);"></path>
                                        <path d="M114.14,229.27c0,7.83,3.28,10,9.24,10.52,2.31.21,5.8.33,9.31.34h.12c3.5,0,7-.13,9.31-.34,5.95-.54,9.24-2.69,9.24-10.52.07-.79.76-18.21.76-18.25-.11-2-.25-3.9-.48-5.75-1.25-10.34-3.58-12.85-16-13h-5.73c-12.44.16-14.78,2.67-16,13-.22,1.85-.36,3.8-.47,5.75,0,0,.69,17.46.76,18.25Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M124.42,212.4a64.25,64.25,0,0,1,17.19,0,2.21,2.21,0,0,1,2.25,2.17,1.45,1.45,0,0,1,0,.36V229.7c0,1.9-1,2.06-2.23,2.06H124.42c-1.23,0-2.23-.16-2.23-2.06V214.93a2.21,2.21,0,0,1,1.87-2.51Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fu);"></path>
                                        <path d="M122.43,211.27a157.58,157.58,0,0,1,20.73-.16c.65-.89.86-2.07,2.33-1.75.66.15,3.62.61,4.66.77s-.36-12.63-3.83-13.87c-.78-.28-2.22-.59-3.16-.91-.25,1.14-.4,2.64-2.52,2.82a107.63,107.63,0,0,1-14.59,0,2.58,2.58,0,0,1-2.65-2.5,2.17,2.17,0,0,1,0-.36A18,18,0,0,0,119.7,197c-3.27,2.36-4.39,7.63-4.27,13.09,2.93-.68,2.07-.46,4.55-1,1.58-.32,1.74,1.3,2.45,2.2Zm-2.29-3.37c-.29-.52-.12-4.63-.12-5.71,0-1.42-.29-2.74,1.45-3.46a4.26,4.26,0,0,1,2.21-.16,81.65,81.65,0,0,0,18.62,0,1.74,1.74,0,0,1,1.39.15c1.61.72,1.6,2,1.61,3.46a54.41,54.41,0,0,1-.25,5.71c-1.8,2.22-15.07,2.76-21.52,1.58-1.83-.34-3.07-1-3.39-1.55Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fv);"></path>
                                        <path d="M144.22,206.76c.06-1.61,0-4.06,0-5.68a1.94,1.94,0,0,0-2.15-1.69h0a87.14,87.14,0,0,1-18.55,0,1.92,1.92,0,0,0-2.19,1.61s0,.05,0,.07v5.68c-.08,3.06,22.86,2.42,23,0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fw);"></path>
                                        <path d="M146.31,211.43c2.44,4.34,3.42,10.07,3.33,16.82,0,1.94.1,4.66-.93,6.4a5.32,5.32,0,0,1-2,1.94.53.53,0,0,1-.46,0,.63.63,0,0,1-.34-.34l-2.13-3.87a.54.54,0,0,1,.14-.65,4,4,0,0,0,.82-1.94V213.41a1.69,1.69,0,0,0-.51-1.22.59.59,0,0,1-.14-.63l.43-1.23a.55.55,0,0,1,.45-.39.57.57,0,0,1,.55.24l.79,1.16h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fx);"></path>
                                        <path d="M119.42,211.43c-2.43,4.34-3.41,10.07-3.33,16.82,0,1.94-.09,4.66.93,6.4a5.32,5.32,0,0,0,2,1.94.53.53,0,0,0,.46,0,.65.65,0,0,0,.35-.34l2.12-3.87a.57.57,0,0,0-.13-.65,4,4,0,0,1-.82-1.94V213.41a1.69,1.69,0,0,1,.51-1.22.61.61,0,0,0,.15-.63l-.43-1.23a.56.56,0,0,0-.46-.39.55.55,0,0,0-.54.24l-.8,1.16h0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fy);"></path>
                                        <path d="M121.43,236.22c.61-1.08,1.22-2.16,1.82-3.25a.8.8,0,0,1,.79-.34q4.41.3,8.82.31h0q4.41,0,8.83-.31a.82.82,0,0,1,.78.34c.6,1.09,1.21,2.17,1.82,3.25s1.27,1.48-.36,1.94c-2,.57-6.5.79-11.07.77s-9.1-.2-11.08-.77c-1.63-.46-.88-1-.36-1.94Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#fz);"></path>
                                        <path d="M116.23,196.59c-1.87,3-2.31,7.78-2.68,13.52-.1,1.54.12-.33,1.88-.07,1-6.89,2.41-10.74,5.75-11.76.23-.07,6.38.17,12.33.14h.07v-6.18h-7.22a20.28,20.28,0,0,0-6.2,1.28,7.15,7.15,0,0,0-3.93,3.07Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ga);"></path>
                                        <path d="M149.31,196.69c1.88,3,2.31,7.78,2.68,13.52.1,1.54-.12-.33-1.88-.07-1-6.89-2.41-10.74-5.75-11.76-.22-.07-6.37.17-12.32.14h0v-6.18h7.21a20.28,20.28,0,0,1,6.2,1.28,7,7,0,0,1,3.93,3.07Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gb);"></path>
                                        <path d="M75.35,263.8c0-7.83,3.29-10,9.24-10.52,2.31-.21,5.81-.33,9.31-.34H94c3.51,0,7,.13,9.31.34,6,.55,9.24,2.69,9.24,10.52.07.79.76,18.22.76,18.25-.11,2-.25,3.9-.47,5.75-1.25,10.34-3.59,12.85-16,13H91.1c-12.45-.17-14.78-2.68-16-13-.23-1.85-.37-3.8-.48-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M85.63,280.67a64.32,64.32,0,0,0,17.2,0,2.2,2.2,0,0,0,2.24-2.15,1.59,1.59,0,0,0,0-.38V263.37c0-1.9-1-2.06-2.22-2.06H85.63c-1.22,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,1.87,2.51Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gc);"></path>
                                        <path d="M83.64,281.81a157.73,157.73,0,0,0,20.74.15c.64.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.64-3.83,13.88c-.78.27-2.21.58-3.15.9-.26-1.13-.4-2.64-2.53-2.82a111,111,0,0,0-14.59,0,2.58,2.58,0,0,0-2.65,2.53,1.82,1.82,0,0,0,0,.33,17.39,17.39,0,0,1-3.7-1.62c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.36c-.29.52-.13,4.63-.13,5.71,0,1.43-.29,2.75,1.45,3.46a4.26,4.26,0,0,0,2.21.16,80.61,80.61,0,0,1,18.63,0,1.77,1.77,0,0,0,1.39-.16c1.61-.71,1.6-2,1.6-3.46a54.41,54.41,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.58-1.84.34-3.07,1-3.39,1.55Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gd);"></path>
                                        <path d="M105.43,286.31c.06,1.61,0,4.07,0,5.68a1.92,1.92,0,0,1-2.13,1.69h-.06a87.24,87.24,0,0,0-18.56,0,1.91,1.91,0,0,1-2.18-1.6s0,0,0-.07v-5.68c-.09-3.06,22.86-2.41,22.94,0Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#ge);"></path>
                                        <path d="M107.53,281.64c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.47,5.47,0,0,0-2-1.94.55.55,0,0,0-.47,0,.64.64,0,0,0-.34.33L105,260.64a.55.55,0,0,0,.13.65,4,4,0,0,1,.82,1.94v16.38a1.68,1.68,0,0,1-.51,1.23.59.59,0,0,0-.14.62l.43,1.24a.55.55,0,0,0,.7.36.51.51,0,0,0,.3-.22l.8-1.15v-.05Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gf);"></path>
                                        <path d="M80.63,281.64c-2.43-4.34-3.41-10.07-3.32-16.82,0-1.94-.1-4.66.92-6.4a5.47,5.47,0,0,1,2-1.94.55.55,0,0,1,.47,0,.61.61,0,0,1,.34.33l2.13,3.87a.57.57,0,0,1-.14.65,4,4,0,0,0-.82,1.94v16.38a1.73,1.73,0,0,0,.51,1.23.59.59,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-.46.38.55.55,0,0,1-.54-.24l-.8-1.15v-.09Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gg);"></path>
                                        <path d="M82.65,256.85l1.82,3.25a.84.84,0,0,0,.78.35q4.41-.31,8.82-.31h0q4.41,0,8.82.31a.84.84,0,0,0,.78-.35l1.82-3.25c.53-.94,1.28-1.47-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76C81.37,255.38,82.13,255.91,82.65,256.85Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gh);"></path>
                                        <path d="M77.45,296.48c-1.88-3-2.31-7.78-2.68-13.51-.1-1.55.12.32,1.88.06,1,6.89,2.41,10.75,5.75,11.77.22.06,6.37-.18,12.32-.15h.07v6.18H87.57a20.16,20.16,0,0,1-6.19-1.28,7,7,0,0,1-3.93-3.07Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gi);"></path>
                                        <path d="M110.53,296.38c1.87-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.75-5.76,11.77-.22.06-6.37-.18-12.32-.15h-.07v6.18h7.22a20.28,20.28,0,0,0,6.2-1.28A7.15,7.15,0,0,0,110.53,296.38Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gj);"></path>
                                        <path d="M36.57,263.8c0-7.83,3.29-10,9.24-10.52,2.31-.21,5.81-.33,9.31-.34h.12c3.51,0,7,.13,9.31.34,6,.55,9.24,2.69,9.24,10.52.07.79.76,18.22.76,18.25-.11,2-.25,3.9-.47,5.75-1.26,10.34-3.59,12.85-16,13H52.32c-12.45-.17-14.78-2.68-16-13-.23-1.85-.37-3.8-.48-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M46.85,280.67a64.32,64.32,0,0,0,17.2,0,2.2,2.2,0,0,0,2.24-2.15,1.59,1.59,0,0,0,0-.38V263.37c0-1.9-1-2.06-2.22-2.06H46.85c-1.23,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,1.87,2.51Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gk);"></path>
                                        <path d="M44.86,281.81A157.74,157.74,0,0,0,65.6,282c.64.89.86,2.07,2.32,1.75.67-.15,3.63-.61,4.66-.77s-.36,12.64-3.83,13.88c-.78.27-2.21.58-3.15.9-.26-1.13-.4-2.64-2.53-2.82a111,111,0,0,0-14.59,0,2.58,2.58,0,0,0-2.65,2.53,1.82,1.82,0,0,0,0,.33,17.25,17.25,0,0,1-3.71-1.62c-3.26-2.36-4.38-7.63-4.27-13.09,2.94.69,2.08.47,4.55,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.29,3.36c-.28.52-.12,4.63-.12,5.71,0,1.43-.29,2.75,1.45,3.46a4.26,4.26,0,0,0,2.21.16,80.53,80.53,0,0,1,18.62,0,1.8,1.8,0,0,0,1.4-.16c1.6-.71,1.6-2,1.6-3.46a51.83,51.83,0,0,0-.25-5.71C65.69,283,52.42,282.44,46,283.62c-1.84.34-3.07,1-3.4,1.55Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gl);"></path>
                                        <path d="M66.65,286.31c.06,1.61,0,4.07,0,5.68a1.92,1.92,0,0,1-2.13,1.69h-.06a87.24,87.24,0,0,0-18.56,0,1.91,1.91,0,0,1-2.18-1.6s0,0,0-.07v-5.68C43.62,283.25,66.57,283.9,66.65,286.31Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gm);"></path>
                                        <path d="M68.75,281.64c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.47,5.47,0,0,0-2-1.94.55.55,0,0,0-.47,0,.61.61,0,0,0-.34.33l-2.12,3.87a.55.55,0,0,0,.13.65,4,4,0,0,1,.82,1.94v16.38a1.68,1.68,0,0,1-.51,1.23.59.59,0,0,0-.14.62l.43,1.24a.56.56,0,0,0,.46.38.55.55,0,0,0,.54-.24l.8-1.15v-.09Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gn);"></path>
                                        <path d="M41.85,281.64c-2.43-4.34-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.47,5.47,0,0,1,2-1.94.55.55,0,0,1,.47,0,.61.61,0,0,1,.34.33l2.12,3.87a.55.55,0,0,1-.13.65,4,4,0,0,0-.82,1.94c0,6.79,0,9.52,0,16.38a1.68,1.68,0,0,0,.51,1.23.59.59,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-.46.38.55.55,0,0,1-.54-.24l-.8-1.15v-.05Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#go);"></path>
                                        <path d="M43.87,256.85l1.82,3.25a.84.84,0,0,0,.78.35q4.41-.31,8.82-.31h0q4.41,0,8.82.31a.84.84,0,0,0,.78-.35l1.82-3.25c.52-.94,1.28-1.47-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.1.19-11.08.76C42.59,255.38,43.34,255.91,43.87,256.85Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gp);"></path>
                                        <path d="M38.67,296.48c-1.88-3-2.32-7.78-2.68-13.51-.1-1.55.11.32,1.87.06,1,6.89,2.41,10.75,5.76,11.77.22.06,6.37-.18,12.32-.15H56v6.18H48.79a20.28,20.28,0,0,1-6.2-1.28,7.05,7.05,0,0,1-3.92-3.07Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gq);"></path>
                                        <path d="M71.75,296.38c1.87-3,2.31-7.78,2.67-13.52.1-1.54-.11.33-1.87.07-1,6.89-2.41,10.75-5.76,11.77-.22.06-6.37-.18-12.32-.15H54.4v6.18h7.22a20.28,20.28,0,0,0,6.2-1.28A7.15,7.15,0,0,0,71.75,296.38Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gr);"></path>
                                        <path d="M145.37,263.8c0-7.83,3.29-10,9.24-10.52,2.31-.21,5.81-.33,9.31-.34H164c3.51,0,7,.13,9.31.34,6,.55,9.24,2.69,9.24,10.52.07.79.76,18.22.76,18.25-.11,2-.25,3.9-.47,5.75-1.26,10.34-3.59,12.85-16,13h-5.73c-12.45-.17-14.78-2.68-16-13-.23-1.85-.37-3.8-.48-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(0.01 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M155.65,280.67a64.32,64.32,0,0,0,17.2,0,2.2,2.2,0,0,0,2.24-2.15,1.59,1.59,0,0,0,0-.38V263.37c0-1.9-1-2.06-2.22-2.06h-17.2c-1.23,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,1.87,2.51Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gs);"></path>
                                        <path d="M153.66,281.81a157.73,157.73,0,0,0,20.74.15c.64.89.86,2.07,2.32,1.75.67-.15,3.63-.61,4.66-.77s-.35,12.64-3.83,13.88c-.78.27-2.21.58-3.15.9-.26-1.13-.4-2.64-2.53-2.82a111,111,0,0,0-14.59,0,2.58,2.58,0,0,0-2.65,2.53,1.82,1.82,0,0,0,0,.33,17.25,17.25,0,0,1-3.71-1.62c-3.26-2.36-4.38-7.63-4.26-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.36c-.29.52-.13,4.63-.13,5.71,0,1.43-.29,2.75,1.45,3.46a4.26,4.26,0,0,0,2.21.16,80.61,80.61,0,0,1,18.63,0,1.77,1.77,0,0,0,1.39-.16c1.61-.71,1.6-2,1.6-3.46a51.83,51.83,0,0,0-.25-5.71c-1.79-2.22-15.06-2.76-21.51-1.58-1.84.34-3.07,1-3.4,1.55Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gt);"></path>
                                        <path d="M175.45,286.31c.06,1.61,0,4.07,0,5.68a1.92,1.92,0,0,1-2.13,1.69h-.06a87.24,87.24,0,0,0-18.56,0,1.91,1.91,0,0,1-2.18-1.6s0-.05,0-.08v-5.68C152.42,283.25,175.37,283.9,175.45,286.31Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gu);"></path>
                                        <path d="M177.55,281.64c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.47,5.47,0,0,0-2-1.94.55.55,0,0,0-.47,0,.61.61,0,0,0-.34.33L175,260.64a.55.55,0,0,0,.13.65,4,4,0,0,1,.82,1.94c0,6.79,0,9.52,0,16.38a1.68,1.68,0,0,1-.51,1.23.59.59,0,0,0-.14.62l.43,1.24a.56.56,0,0,0,.46.38.55.55,0,0,0,.54-.24l.8-1.15v-.05Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gv);"></path>
                                        <path d="M150.65,281.64c-2.43-4.34-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.47,5.47,0,0,1,2-1.94.55.55,0,0,1,.47,0,.61.61,0,0,1,.34.33l2.12,3.87a.55.55,0,0,1-.13.65,4,4,0,0,0-.82,1.94v16.38a1.68,1.68,0,0,0,.51,1.23.59.59,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-.46.38.55.55,0,0,1-.54-.24l-.8-1.15v-.09Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gw);"></path>
                                        <path d="M152.67,256.85l1.82,3.25a.84.84,0,0,0,.78.35q4.41-.31,8.82-.31h0q4.41,0,8.82.31a.84.84,0,0,0,.78-.35l1.82-3.25c.52-.94,1.28-1.47-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.1.19-11.08.76c-1.63.47-.88,1-.35,1.94Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gx);"></path>
                                        <path d="M147.47,296.48c-1.88-3-2.32-7.78-2.68-13.51-.1-1.55.11.32,1.88.06,1,6.89,2.4,10.75,5.75,11.77.22.06,6.37-.18,12.32-.15h.07v6.18h-7.22a20.28,20.28,0,0,1-6.2-1.28,7.05,7.05,0,0,1-3.92-3.07Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gy);"></path>
                                        <path d="M180.55,296.38c1.87-3,2.31-7.78,2.67-13.52.1-1.54-.11.33-1.87.07-1,6.89-2.41,10.75-5.76,11.77-.22.06-6.37-.18-12.32-.15h-.07v6.18h7.22a20.28,20.28,0,0,0,6.2-1.28A7.15,7.15,0,0,0,180.55,296.38Z" transform="translate(0.01 0)" style="fill-rule:evenodd;fill:url(#gz);"></path>
                                    </svg>
                                    </div>
                                    <!-- Водительский ряд-->
                                    <div class="car-place--svg--places car-place-front-left--minibus minibus-front @if(isset($booking_seats) && in_array('Первое место (Водительский ряд)', $booking_seats)) car-place--booked @endif" data-car-place="Первое место (Водительский ряд)">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-front-right--minibus minibus-front @if(isset($booking_seats) && in_array('1-место', $booking_seats)) car-place--booked @endif" data-car-place="1-место" data-place-booked="Место забронировано">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <!-- Пасажирские места Top-->
                                    <div class="car-place--svg--places car-place-passenger-top--minibus__1 minibus-passanger-1 @if(isset($booking_seats) && in_array('2-место', $booking_seats)) car-place--booked @endif" data-car-place="2-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passenger-top--minibus__2 minibus-passanger-1 @if(isset($booking_seats) && in_array('3-место', $booking_seats)) car-place--booked @endif" data-car-place="3-место" data-place-booked="Место забронировано">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passenger-top--minibus__3 minibus-passanger-1 @if(isset($booking_seats) && in_array('4-место', $booking_seats)) car-place--booked @endif" data-car-place="4-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <!-- Пасажирские места Middle-->
                                    <div class="car-place--svg--places car-place-passenger-middle--minibus__1 minibus-passanger-2 @if(isset($booking_seats) && in_array('5-место', $booking_seats)) car-place--booked @endif" data-car-place="5-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passenger-middle--minibus__2 minibus-passanger-2 @if(isset($booking_seats) && in_array('6-место', $booking_seats)) car-place--booked @endif" data-car-place="6-место" data-place-booked="Место забронировано">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passenger-middle--minibus__3 minibus-passanger-2 @if(isset($booking_seats) && in_array('7-место', $booking_seats)) car-place--booked @endif" data-car-place="7-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <!-- Пасажирские места Левая сторона Bottom-->
                                    <div class="car-place--svg--places car-place-passenger-bottom-left--minibus__1 @if(isset($booking_seats) && in_array('8-место', $booking_seats)) car-place--booked @endif" data-car-place="8-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passenger-bottom-left--minibus__2 @if(isset($booking_seats) && in_array('9-место', $booking_seats)) car-place--booked @endif" data-car-place="9-место" data-place-booked="Место забронировано">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon iicon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passenger-bottom-left--minibus__3 @if(isset($booking_seats) && in_array('10-место', $booking_seats)) car-place--booked @endif" data-car-place="10-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <!-- Пасажирские места Правая сторона Bottom-->
                                    <div class="car-place--svg--places car-place-passenger-bottom-right--minibus__1 @if(isset($booking_seats) && in_array('11-место', $booking_seats)) car-place--booked @endif" data-car-place="11-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passenger-bottom-right--minibus__2 @if(isset($booking_seats) && in_array('12-место', $booking_seats)) car-place--booked @endif" data-car-place="12-место" data-place-booked="Место забронировано">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passenger-bottom-right--minibus__3 @if(isset($booking_seats) && in_array('13-место', $booking_seats)) car-place--booked @endif" data-car-place="13-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                </div>
                                @endif
                                @if(optional($trip->car)->template == 'car-choise-bus')
                                <div class="col-xl-5 car-place--position car-choise-bus @if(optional($trip->car)->template == 'car-choise-bus') active @endif">
                                    <div class="car-place--svg">
                                    <svg class="icon icon-item-bus " xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="Слой_1" data-name="Слой 1" viewBox="0 0 322.39 850.43">
                                        <defs>
                                        <lineargradient id="Безымянный_градиент" x1="7539.62" y1="-742.18" x2="7539.62" y2="-837.96" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_2" x1="6926.66" y1="-850.93" x2="6926.66" y2="-799.97" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_11" x1="8041.14" y1="-6897" x2="8085.37" y2="-6889.15" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_12" x1="7909.84" y1="-6914.08" x2="8001.45" y2="-6905.78" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_13" x1="8076.38" y1="-7004.59" x2="8063.51" y2="-6382.14" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_14" x1="6268.89" y1="-6917.72" x2="6268.89" y2="-6818.6" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_15" x1="6254.9" y1="-6900.83" x2="6210.66" y2="-6892.98" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_16" x1="6386.21" y1="-6917.9" x2="6294.59" y2="-6909.6" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_17" x1="6219.66" y1="-7008.41" x2="6232.53" y2="-6385.96" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_18" x1="7144.76" y1="-4860.56" x2="7144.77" y2="-4985.44" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_19" x1="6886.59" y1="-360.95" x2="6349.68" y2="-360.95" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_20" x1="6256.36" y1="-367.3" x2="6603.91" y2="-377.94" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_3" x1="6825.02" y1="-820.86" x2="6930.79" y2="-686.47" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_4" x1="7038.73" y1="-793.32" x2="6929.73" y2="-723.33" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_5" x1="6516.94" y1="-855.77" x2="6516.94" y2="-949.32" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_6" x1="8617.55" y1="138.19" x2="6571.57" y2="-550.81" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="0.28" stop-color="#fff" stop-opacity="0.36"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_7" x1="6797.34" y1="-50.28" x2="7368.16" y2="-6.78" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff" stop-opacity="0"></stop>
                                            <stop offset="0.13" stop-color="#fff" stop-opacity="0.63"></stop>
                                            <stop offset="0.51" stop-color="#fff"></stop>
                                            <stop offset="0.85" stop-color="#fff" stop-opacity="0.7"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_8" x1="7145.94" y1="-6031.97" x2="7145.94" y2="-6497.57" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_9" x1="7140.97" y1="-6996.79" x2="7140.98" y2="-6966" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_10" x1="8027.15" y1="-6913.89" x2="8027.16" y2="-6814.78" xlink:href="#Безымянный_градиент"></lineargradient>
                                        <clippath id="clip-path" transform="translate(2.61 0)">
                                            <path d="M24.55,88c7.31-2.24,10.55,0,15.82,0a4.35,4.35,0,0,1,4.45,4.21V156a4.35,4.35,0,0,1-4.45,4.21c-5.27,0-11.47,2.84-15.82,0-6.68-4.37-4.2-70.92,0-72.21Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="Безымянный_градиент_21" x1="6112.82" y1="-749.13" x2="6112.82" y2="-1263.24" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5b5b5b"></stop>
                                            <stop offset="1"></stop>
                                        </lineargradient>
                                        <clippath id="clip-path-2" transform="translate(2.61 0)">
                                            <path d="M24.45,552.47c7.3-2.24,10.55,0,15.82,0a4.35,4.35,0,0,1,4.45,4.21v63.79a4.35,4.35,0,0,1-4.45,4.21c-5.27,0-11.48,2.84-15.82,0-6.69-4.37-4.2-70.92,0-72.21Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="Безымянный_градиент_22" x1="6111.96" y1="-4600.21" x2="6111.97" y2="-5114.31" xlink:href="#Безымянный_градиент_21"></lineargradient>
                                        <clippath id="clip-path-3" transform="translate(2.61 0)">
                                            <path d="M24.35,694.6c7.3-2.25,10.55,0,15.82,0a4.34,4.34,0,0,1,4.44,4.21v63.78a4.35,4.35,0,0,1-4.44,4.22c-5.27,0-11.48,2.83-15.82,0-6.69-4.37-4.2-70.92,0-72.21Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="Безымянный_градиент_23" x1="6111.11" y1="-5778.53" x2="6111.12" y2="-6292.63" xlink:href="#Безымянный_градиент_21"></lineargradient>
                                        <clippath id="clip-path-4" transform="translate(2.61 0)">
                                            <path d="M292.6,87.5c-7.31-2.25-10.55,0-15.82,0a4.34,4.34,0,0,0-4.45,4.21v63.78a4.35,4.35,0,0,0,4.45,4.22c5.27,0,11.47,2.83,15.82,0,6.68-4.37,4.2-70.92,0-72.21Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="Безымянный_градиент_24" x1="8181.88" y1="-745.2" x2="8181.88" y2="-1259.31" xlink:href="#Безымянный_градиент_21"></lineargradient>
                                        <clippath id="clip-path-5" transform="translate(2.61 0)">
                                            <path d="M292.5,552c-7.31-2.25-10.55,0-15.83,0a4.34,4.34,0,0,0-4.44,4.21V620a4.35,4.35,0,0,0,4.44,4.22c5.28,0,11.48,2.83,15.83,0,6.68-4.37,4.2-70.92,0-72.21Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="Безымянный_градиент_25" x1="8181.01" y1="-4596.28" x2="8181.02" y2="-5110.38" xlink:href="#Безымянный_градиент_21"></lineargradient>
                                        <clippath id="clip-path-6" transform="translate(2.61 0)">
                                            <path d="M292.4,694.12c-7.31-2.24-10.55,0-15.83,0a4.35,4.35,0,0,0-4.44,4.22v63.78a4.34,4.34,0,0,0,4.44,4.21c5.28,0,11.48,2.84,15.83,0,6.68-4.36,4.2-70.92,0-72.21Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="Безымянный_градиент_26" x1="8180.17" y1="-5774.6" x2="8180.18" y2="-6288.7" xlink:href="#Безымянный_градиент_21"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_27" x1="6171.06" y1="-291" x2="6171.06" y2="-4222.13" gradientTransform="matrix(0.12, 0, 0, -0.12, -700.89, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#ffa406"></stop>
                                            <stop offset="0.34" stop-color="#ffcd60"></stop>
                                            <stop offset="0.64" stop-color="#f2a600"></stop>
                                            <stop offset="0.98" stop-color="#ffaf2c"></stop>
                                            <stop offset="1" stop-color="#ffc971"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_28" x1="8129.77" y1="-241.44" x2="8129.77" y2="-4172.57" xlink:href="#Безымянный_градиент_27"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_29" x1="6009.15" y1="-659.68" x2="6027.49" y2="-731.25" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#c82c2c"></stop>
                                            <stop offset="1" stop-color="#be701c"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_30" x1="8257.81" y1="-660.17" x2="8276.14" y2="-731.75" xlink:href="#Безымянный_градиент_29"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_31" x1="7154.59" y1="-11.03" x2="7154.6" y2="-1144.42" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" xlink:href="#Безымянный_градиент_27"></lineargradient>
                                        <mask id="mask" x="131.45" y="49.72" width="154.1" height="57.66" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id6">
                                                <rect x="128.84" y="49.72" width="154.1" height="57.66" style="fill:url(#Безымянный_градиент);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="Безымянный_градиент_32" x1="7539.61" y1="-867.02" x2="7539.62" y2="-393.69" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#0b0a08"></stop>
                                            <stop offset="0.37" stop-color="#292929"></stop>
                                            <stop offset="1" stop-color="#1d1d1d"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_33" x1="6044.67" y1="-377.75" x2="5898.78" y2="-407.81" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#2b2a29"></stop>
                                            <stop offset="1" stop-color="#fefefe"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_34" x1="8304.9" y1="-381.91" x2="8211.36" y2="-397.5" xlink:href="#Безымянный_градиент_33"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_35" x1="7157.16" y1="-277.9" x2="7157.17" y2="-155.05" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#212023"></stop>
                                            <stop offset="1" stop-color="#312e34"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_36" x1="7157.79" y1="-335.52" x2="7157.8" y2="-185.13" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#4c4c4c"></stop>
                                            <stop offset="1" stop-color="#212023"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_37" x1="6895.37" y1="-622.86" x2="7042.37" y2="-622.85" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#1d1d1d"></stop>
                                            <stop offset="0.14" stop-color="#434344"></stop>
                                            <stop offset="0.39" stop-color="#555"></stop>
                                            <stop offset="0.52" stop-color="#353637"></stop>
                                            <stop offset="1" stop-color="#1e1e20"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_38" x1="6976.16" y1="-749.6" x2="6879.63" y2="-749.6" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#383838"></stop>
                                            <stop offset="0.21" stop-color="#636363"></stop>
                                            <stop offset="0.3" stop-color="#494949"></stop>
                                            <stop offset="0.43" stop-color="#363636"></stop>
                                            <stop offset="1" stop-color="#323232"></stop>
                                        </lineargradient>
                                        <mask id="mask-2" x="128.31" y="101.63" width="12.51" height="5.36" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id8">
                                                <rect x="125.7" y="101.63" width="12.51" height="5.36" style="fill:url(#Безымянный_градиент_2);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="mask-3" x="128.31" y="78.73" width="1.63" height="28.26" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id10">
                                                <rect x="125.7" y="78.73" width="1.63" height="28.26" style="fill:url(#Безымянный_градиент_3);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="mask-4" x="138.71" y="78.73" width="2.11" height="28.26" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id12">
                                                <rect x="136.1" y="78.73" width="2.11" height="28.26" style="fill:url(#Безымянный_градиент_4);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="mask-5" x="42.04" y="97.16" width="86.22" height="27.43" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id14">
                                                <rect x="39.43" y="97.16" width="86.22" height="27.43" style="fill:url(#Безымянный_градиент_5);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="Безымянный_градиент_39" x1="6516.93" y1="-787.03" x2="6516.94" y2="-1009.78" xlink:href="#Безымянный_градиент_32"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_40" x1="6244.28" y1="-998.46" x2="6872.01" y2="-998.46" gradientTransform="matrix(0.12, 0, 0, -0.12, -700.89, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#1c1c1c"></stop>
                                            <stop offset="0.43" stop-color="#474747"></stop>
                                            <stop offset="1" stop-color="#515151"></stop>
                                        </lineargradient>
                                        <mask id="mask-6" x="37.33" y="20.07" width="250.55" height="50.04" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id16">
                                                <rect x="34.72" y="20.07" width="250.55" height="50.04" style="fill:url(#Безымянный_градиент_6);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="mask-7" x="104.62" y="2.8" width="109.23" height="5.42" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id18">
                                                <rect x="102.01" y="2.8" width="109.23" height="5.42" style="fill:url(#Безымянный_градиент_7);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="Безымянный_градиент_41" x1="7581.36" y1="-130.35" x2="7471.18" y2="-84.27" gradientTransform="matrix(0.12, 0, 0, -0.12, -700.89, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#171614"></stop>
                                            <stop offset="1" stop-color="#575757"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_42" x1="7462.53" y1="-111.03" x2="6985.48" y2="-56.58" xlink:href="#Безымянный_градиент_41"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_43" x1="7136.76" y1="-51.73" x2="7136.76" y2="-82.37" gradientTransform="matrix(0.12, 0, 0, -0.12, -700.89, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="1" stop-color="#1f1b20"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_44" x1="6818.93" y1="-131.41" x2="7299.23" y2="-123.75" xlink:href="#Безымянный_градиент_41"></lineargradient>
                                        <mask id="mask-8" x="42.85" y="673.01" width="236.33" height="147.87" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id20">
                                                <rect x="40.24" y="673.02" width="236.33" height="147.87" style="fill:url(#Безымянный_градиент_8);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="Безымянный_градиент_45" x1="7145.91" y1="-5561.28" x2="7145.97" y2="-6782.61" xlink:href="#Безымянный_градиент_32"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_46" x1="7150.42" y1="-1260.23" x2="7150.42" y2="-36379.56" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" xlink:href="#Безымянный_градиент_27"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_47" x1="6397.4" y1="-6934.48" x2="7921.26" y2="-6934.47" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5e5e5e"></stop>
                                            <stop offset="0.24" stop-color="#211f1d"></stop>
                                            <stop offset="0.7" stop-color="#333"></stop>
                                            <stop offset="0.76" stop-color="#535353"></stop>
                                            <stop offset="1" stop-color="#333"></stop>
                                        </lineargradient>
                                        <mask id="mask-9" x="88.19" y="842.49" width="144.46" height="4.24" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id22">
                                                <rect x="85.58" y="842.49" width="144.46" height="4.24" style="fill:url(#Безымянный_градиент_9);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="mask-10" x="244.99" y="825.77" width="44.63" height="12.48" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id24">
                                                <rect x="242.38" y="825.77" width="44.63" height="12.48" style="fill:url(#Безымянный_градиент_10);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="Безымянный_градиент_48" x1="8070.97" y1="-6868.82" x2="8150.13" y2="-6818.42" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" xlink:href="#Безымянный_градиент_43"></lineargradient>
                                        <mask id="mask-11" x="244.76" y="832.8" width="34.1" height="5.77" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id26">
                                                <rect x="242.14" y="832.8" width="34.1" height="5.77" style="fill:url(#Безымянный_градиент_11);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="mask-13" x="250.34" y="780.97" width="44.24" height="56.54" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id30">
                                                <rect x="247.72" y="780.97" width="44.24" height="56.54" style="fill:url(#Безымянный_градиент_13);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="mask-14" x="32.92" y="826.23" width="44.63" height="12.48" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id32">
                                                <rect x="30.31" y="826.23" width="44.63" height="12.48" style="fill:url(#Безымянный_градиент_14);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="Безымянный_градиент_49" x1="6225.07" y1="-6872.64" x2="6145.91" y2="-6822.24" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" xlink:href="#Безымянный_градиент_43"></lineargradient>
                                        <mask id="mask-15" x="43.68" y="833.26" width="34.1" height="5.77" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id34">
                                                <rect x="41.07" y="833.26" width="34.1" height="5.77" style="fill:url(#Безымянный_градиент_15);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="mask-17" x="27.97" y="781.43" width="44.24" height="56.54" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id38">
                                                <rect x="25.35" y="781.43" width="44.24" height="56.54" style="fill:url(#Безымянный_градиент_17);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="mask-18" x="47.05" y="562.15" width="227.66" height="43.82" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id40">
                                                <rect x="44.43" y="562.15" width="227.66" height="43.82" style="fill:url(#Безымянный_градиент_18);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="Безымянный_градиент_50" x1="7144.75" y1="-4642.15" x2="7144.76" y2="-5000.76" xlink:href="#Безымянный_градиент_32"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_51" x1="6558.32" y1="-771.18" x2="6559.91" y2="-883.03" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#181818"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="0.79" stop-color="#565656"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_52" x1="6423.29" y1="-624.1" x2="6483.62" y2="-624.08" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#161616"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_53" x1="6640.23" y1="-624.1" x2="6700.56" y2="-624.08" xlink:href="#Безымянный_градиент_52"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_54" x1="6496.33" y1="-588.31" x2="6639.77" y2="-588.3" xlink:href="#Безымянный_градиент_52"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_55" x1="6495.83" y1="-695.78" x2="6639.27" y2="-695.78" xlink:href="#Безымянный_градиент_52"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_56" x1="6556.42" y1="-782.34" x2="6557.45" y2="-856.33" xlink:href="#Безымянный_градиент_51"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_57" x1="6562.05" y1="-896.36" x2="6562.84" y2="-948.3" xlink:href="#Безымянный_градиент_51"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_58" x1="6456.26" y1="-503.06" x2="6659.52" y2="-499.03" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#181818"></stop>
                                            <stop offset="0.48" stop-color="#383838"></stop>
                                            <stop offset="0.67" stop-color="#3c3c3c"></stop>
                                            <stop offset="0.79" stop-color="#565656"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_59" x1="6427.31" y1="-863.11" x2="6580.68" y2="-863.1" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#292929"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_60" x1="6652.83" y1="-1803.22" x2="6811.51" y2="-1803.23" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#464646"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_61" x1="6721.42" y1="-1911.13" x2="6723.06" y2="-2006.71" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#494949"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="0.79" stop-color="#888"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_62" x1="6719.11" y1="-1923" x2="6720" y2="-1979.57" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_63" x1="6853.42" y1="-1790.51" x2="6805.88" y2="-1790.5" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_64" x1="6587.64" y1="-1790.51" x2="6635.18" y2="-1790.5" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_65" x1="6625.37" y1="-1689.16" x2="6831.65" y2="-1686.12" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#494949"></stop>
                                            <stop offset="0.48" stop-color="#696969"></stop>
                                            <stop offset="0.67" stop-color="#6d6d6d"></stop>
                                            <stop offset="0.79" stop-color="#888"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_66" x1="6581.57" y1="-1971.63" x2="6744.06" y2="-1971.61" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5a5a5a"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_67" x1="6857.92" y1="-1970.79" x2="6695.43" y2="-1970.78" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_68" x1="6331.3" y1="-1803.22" x2="6489.97" y2="-1803.23" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_69" x1="6399.89" y1="-1911.13" x2="6401.53" y2="-2006.71" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_70" x1="6397.58" y1="-1923" x2="6398.47" y2="-1979.57" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_71" x1="6531.89" y1="-1790.51" x2="6484.35" y2="-1790.5" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_72" x1="6266.11" y1="-1790.51" x2="6313.65" y2="-1790.5" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_73" x1="6303.84" y1="-1689.16" x2="6510.12" y2="-1686.12" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_74" x1="6260.03" y1="-1971.63" x2="6422.53" y2="-1971.61" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_75" x1="6536.39" y1="-1970.79" x2="6373.9" y2="-1970.78" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_76" x1="6652.83" y1="-1298.5" x2="6811.51" y2="-1298.49" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_77" x1="6721.42" y1="-1190.58" x2="6723.06" y2="-1095" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_78" x1="6719.11" y1="-1178.72" x2="6720" y2="-1122.14" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_79" x1="6853.42" y1="-1311.2" x2="6805.88" y2="-1311.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_80" x1="6587.64" y1="-1311.2" x2="6635.18" y2="-1311.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_81" x1="6625.37" y1="-1412.55" x2="6831.65" y2="-1415.58" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_82" x1="6581.58" y1="-1130.1" x2="6744.07" y2="-1130.11" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_83" x1="6857.92" y1="-1130.93" x2="6695.43" y2="-1130.94" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_84" x1="6331.3" y1="-1298.5" x2="6489.97" y2="-1298.49" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_85" x1="6399.89" y1="-1190.58" x2="6401.53" y2="-1095" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_86" x1="6397.58" y1="-1178.72" x2="6398.47" y2="-1122.14" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_87" x1="6531.89" y1="-1311.2" x2="6484.35" y2="-1311.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_88" x1="6266.11" y1="-1311.2" x2="6313.65" y2="-1311.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_89" x1="6303.84" y1="-1412.55" x2="6510.12" y2="-1415.58" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_90" x1="6260.04" y1="-1130.1" x2="6422.54" y2="-1130.11" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_91" x1="6536.39" y1="-1130.93" x2="6373.9" y2="-1130.94" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_92" x1="6652.83" y1="-2411.93" x2="6811.51" y2="-2411.94" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_93" x1="6721.42" y1="-2519.84" x2="6723.06" y2="-2615.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_94" x1="6719.11" y1="-2531.7" x2="6720" y2="-2588.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_95" x1="6853.42" y1="-2399.23" x2="6805.88" y2="-2399.22" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_96" x1="6587.64" y1="-2399.23" x2="6635.18" y2="-2399.22" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_97" x1="6625.37" y1="-2297.86" x2="6831.65" y2="-2294.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_98" x1="6581.58" y1="-2580.32" x2="6744.07" y2="-2580.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_99" x1="6857.92" y1="-2579.49" x2="6695.43" y2="-2579.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_100" x1="6331.3" y1="-2411.93" x2="6489.97" y2="-2411.94" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_101" x1="6399.89" y1="-2519.84" x2="6401.53" y2="-2615.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_102" x1="6397.58" y1="-2531.7" x2="6398.47" y2="-2588.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_103" x1="6531.89" y1="-2399.23" x2="6484.35" y2="-2399.22" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_104" x1="6266.11" y1="-2399.23" x2="6313.65" y2="-2399.22" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_105" x1="6303.84" y1="-2297.86" x2="6510.12" y2="-2294.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_106" x1="6260.04" y1="-2580.32" x2="6422.54" y2="-2580.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_107" x1="6536.39" y1="-2579.49" x2="6373.9" y2="-2579.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_108" x1="6652.83" y1="-2981.42" x2="6811.51" y2="-2981.43" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_109" x1="6721.42" y1="-3089.34" x2="6723.06" y2="-3184.92" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_110" x1="6719.11" y1="-3101.2" x2="6720" y2="-3157.78" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_111" x1="6853.42" y1="-2968.72" x2="6805.88" y2="-2968.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_112" x1="6587.64" y1="-2968.72" x2="6635.18" y2="-2968.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_113" x1="6625.37" y1="-2867.36" x2="6831.65" y2="-2864.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_114" x1="6581.58" y1="-3149.82" x2="6744.07" y2="-3149.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_115" x1="6857.92" y1="-3148.99" x2="6695.43" y2="-3148.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_116" x1="6331.3" y1="-2981.42" x2="6489.97" y2="-2981.43" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_117" x1="6399.89" y1="-3089.34" x2="6401.53" y2="-3184.92" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_118" x1="6397.58" y1="-3101.2" x2="6398.47" y2="-3157.78" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_119" x1="6531.89" y1="-2968.72" x2="6484.35" y2="-2968.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_120" x1="6266.11" y1="-2968.72" x2="6313.65" y2="-2968.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_121" x1="6303.84" y1="-2867.36" x2="6510.12" y2="-2864.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_122" x1="6260.04" y1="-3149.82" x2="6422.54" y2="-3149.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_123" x1="6536.39" y1="-3148.99" x2="6373.9" y2="-3148.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_124" x1="6652.83" y1="-3550.91" x2="6811.51" y2="-3550.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_125" x1="6721.42" y1="-3658.84" x2="6723.06" y2="-3754.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_126" x1="6719.11" y1="-3670.7" x2="6720" y2="-3727.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_127" x1="6853.42" y1="-3538.22" x2="6805.88" y2="-3538.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_128" x1="6587.64" y1="-3538.22" x2="6635.18" y2="-3538.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_129" x1="6625.37" y1="-3436.87" x2="6831.65" y2="-3433.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_130" x1="6581.58" y1="-3719.32" x2="6744.07" y2="-3719.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_131" x1="6857.92" y1="-3718.49" x2="6695.43" y2="-3718.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_132" x1="6331.3" y1="-3550.91" x2="6489.97" y2="-3550.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_133" x1="6399.89" y1="-3658.84" x2="6401.53" y2="-3754.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_134" x1="6397.58" y1="-3670.7" x2="6398.47" y2="-3727.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_135" x1="6531.89" y1="-3538.22" x2="6484.35" y2="-3538.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_136" x1="6266.11" y1="-3538.22" x2="6313.65" y2="-3538.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_137" x1="6303.84" y1="-3436.87" x2="6510.12" y2="-3433.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_138" x1="6260.04" y1="-3719.32" x2="6422.54" y2="-3719.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_139" x1="6536.39" y1="-3718.49" x2="6373.9" y2="-3718.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_140" x1="6652.83" y1="-4120.41" x2="6811.51" y2="-4120.42" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_141" x1="6721.42" y1="-4228.34" x2="6723.06" y2="-4323.92" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_142" x1="6719.11" y1="-4240.2" x2="6720" y2="-4296.78" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_143" x1="6853.42" y1="-4107.72" x2="6805.88" y2="-4107.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_144" x1="6587.64" y1="-4107.72" x2="6635.18" y2="-4107.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_145" x1="6625.37" y1="-4006.37" x2="6831.65" y2="-4003.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_146" x1="6581.58" y1="-4288.82" x2="6744.07" y2="-4288.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_147" x1="6857.92" y1="-4287.99" x2="6695.43" y2="-4287.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_148" x1="6331.3" y1="-4120.41" x2="6489.97" y2="-4120.42" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_149" x1="6399.89" y1="-4228.34" x2="6401.53" y2="-4323.92" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_150" x1="6397.58" y1="-4240.2" x2="6398.47" y2="-4296.78" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_151" x1="6531.89" y1="-4107.72" x2="6484.35" y2="-4107.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_152" x1="6266.11" y1="-4107.72" x2="6313.65" y2="-4107.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_153" x1="6303.84" y1="-4006.37" x2="6510.12" y2="-4003.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_154" x1="6260.04" y1="-4288.82" x2="6422.54" y2="-4288.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_155" x1="6536.39" y1="-4287.99" x2="6373.9" y2="-4287.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_156" x1="6652.83" y1="-4689.91" x2="6811.51" y2="-4689.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_157" x1="6721.42" y1="-4797.83" x2="6723.06" y2="-4893.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_158" x1="6719.11" y1="-4809.7" x2="6720" y2="-4866.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_159" x1="6853.42" y1="-4677.22" x2="6805.88" y2="-4677.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_160" x1="6587.63" y1="-4677.22" x2="6635.17" y2="-4677.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_161" x1="6625.37" y1="-4575.87" x2="6831.65" y2="-4572.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_162" x1="6581.58" y1="-4858.32" x2="6744.07" y2="-4858.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_163" x1="6857.92" y1="-4857.49" x2="6695.43" y2="-4857.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_164" x1="6331.3" y1="-4689.91" x2="6489.97" y2="-4689.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_165" x1="6399.89" y1="-4797.83" x2="6401.53" y2="-4893.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_166" x1="6397.58" y1="-4809.7" x2="6398.47" y2="-4866.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_167" x1="6531.89" y1="-4677.22" x2="6484.35" y2="-4677.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_168" x1="6266.1" y1="-4677.22" x2="6313.64" y2="-4677.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_169" x1="6303.84" y1="-4575.87" x2="6510.12" y2="-4572.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_170" x1="6260.04" y1="-4858.32" x2="6422.54" y2="-4858.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_171" x1="6536.39" y1="-4857.49" x2="6373.9" y2="-4857.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_172" x1="6652.83" y1="-5259.41" x2="6811.51" y2="-5259.42" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_173" x1="6721.42" y1="-5367.33" x2="6723.06" y2="-5462.91" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_174" x1="6719.11" y1="-5379.2" x2="6720" y2="-5435.77" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_175" x1="6853.42" y1="-5246.71" x2="6805.88" y2="-5246.7" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_176" x1="6587.64" y1="-5246.71" x2="6635.18" y2="-5246.7" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_177" x1="6625.37" y1="-5145.37" x2="6831.65" y2="-5142.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_178" x1="6581.58" y1="-5427.82" x2="6744.07" y2="-5427.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_179" x1="6857.92" y1="-5426.99" x2="6695.43" y2="-5426.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_180" x1="6331.3" y1="-5259.41" x2="6489.97" y2="-5259.42" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_181" x1="6399.89" y1="-5367.33" x2="6401.53" y2="-5462.91" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_182" x1="6397.58" y1="-5379.2" x2="6398.47" y2="-5435.77" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_183" x1="6531.89" y1="-5246.71" x2="6484.35" y2="-5246.7" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_184" x1="6266.11" y1="-5246.71" x2="6313.65" y2="-5246.7" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_185" x1="6303.84" y1="-5145.37" x2="6510.12" y2="-5142.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_186" x1="6260.04" y1="-5427.82" x2="6422.54" y2="-5427.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_187" x1="6536.39" y1="-5426.99" x2="6373.9" y2="-5426.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_188" x1="6652.83" y1="-5828.91" x2="6811.51" y2="-5828.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_189" x1="6721.42" y1="-5936.83" x2="6723.06" y2="-6032.41" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_190" x1="6719.11" y1="-5948.69" x2="6720" y2="-6005.27" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_191" x1="6853.42" y1="-5816.21" x2="6805.88" y2="-5816.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_192" x1="6587.64" y1="-5816.21" x2="6635.18" y2="-5816.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_193" x1="6625.37" y1="-5714.86" x2="6831.65" y2="-5711.82" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_194" x1="6581.58" y1="-5997.31" x2="6744.07" y2="-5997.3" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_195" x1="6857.92" y1="-5996.48" x2="6695.43" y2="-5996.47" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_196" x1="6331.3" y1="-5828.91" x2="6489.97" y2="-5828.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_197" x1="6399.89" y1="-5936.83" x2="6401.53" y2="-6032.41" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_198" x1="6397.58" y1="-5948.69" x2="6398.47" y2="-6005.27" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_199" x1="6531.89" y1="-5816.21" x2="6484.35" y2="-5816.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_200" x1="6266.11" y1="-5816.21" x2="6313.65" y2="-5816.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_201" x1="6303.84" y1="-5714.86" x2="6510.12" y2="-5711.82" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_202" x1="6260.04" y1="-5997.31" x2="6422.54" y2="-5997.3" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_203" x1="6536.39" y1="-5996.48" x2="6373.9" y2="-5996.47" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_204" x1="7851.66" y1="-1803.22" x2="8010.34" y2="-1803.23" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_205" x1="7920.26" y1="-1911.13" x2="7921.9" y2="-2006.71" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_206" x1="7917.94" y1="-1923" x2="7918.83" y2="-1979.57" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_207" x1="8052.25" y1="-1790.51" x2="8004.71" y2="-1790.5" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_208" x1="7786.47" y1="-1790.51" x2="7834.01" y2="-1790.5" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_209" x1="7824.2" y1="-1689.16" x2="8030.48" y2="-1686.12" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_210" x1="7780.4" y1="-1971.63" x2="7942.89" y2="-1971.61" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_211" x1="8056.75" y1="-1970.79" x2="7894.26" y2="-1970.78" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_212" x1="7530.13" y1="-1803.22" x2="7688.8" y2="-1803.23" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_213" x1="7598.74" y1="-1911.13" x2="7600.38" y2="-2006.71" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_214" x1="7596.41" y1="-1923" x2="7597.3" y2="-1979.57" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_215" x1="7730.72" y1="-1790.51" x2="7683.18" y2="-1790.5" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_216" x1="7464.94" y1="-1790.51" x2="7512.48" y2="-1790.5" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_217" x1="7502.67" y1="-1689.16" x2="7708.95" y2="-1686.12" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_218" x1="7458.86" y1="-1971.63" x2="7621.36" y2="-1971.61" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_219" x1="7735.22" y1="-1970.79" x2="7572.73" y2="-1970.78" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_220" x1="7851.66" y1="-2411.93" x2="8010.34" y2="-2411.94" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_221" x1="7920.26" y1="-2519.84" x2="7921.9" y2="-2615.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_222" x1="7917.94" y1="-2531.7" x2="7918.83" y2="-2588.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_223" x1="8052.25" y1="-2399.23" x2="8004.71" y2="-2399.22" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_224" x1="7786.47" y1="-2399.23" x2="7834.01" y2="-2399.22" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_225" x1="7824.2" y1="-2297.86" x2="8030.48" y2="-2294.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_226" x1="7780.41" y1="-2580.32" x2="7942.9" y2="-2580.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_227" x1="8056.75" y1="-2579.49" x2="7894.26" y2="-2579.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_228" x1="7530.13" y1="-2411.93" x2="7688.8" y2="-2411.94" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_229" x1="7598.74" y1="-2519.84" x2="7600.38" y2="-2615.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_230" x1="7596.41" y1="-2531.7" x2="7597.3" y2="-2588.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_231" x1="7730.72" y1="-2399.23" x2="7683.18" y2="-2399.22" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_232" x1="7464.94" y1="-2399.23" x2="7512.48" y2="-2399.22" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_233" x1="7502.67" y1="-2297.86" x2="7708.95" y2="-2294.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_234" x1="7458.87" y1="-2580.32" x2="7621.37" y2="-2580.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_235" x1="7735.22" y1="-2579.49" x2="7572.73" y2="-2579.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_236" x1="7851.66" y1="-2981.42" x2="8010.34" y2="-2981.43" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_237" x1="7920.26" y1="-3089.34" x2="7921.9" y2="-3184.92" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_238" x1="7917.94" y1="-3101.2" x2="7918.83" y2="-3157.78" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_239" x1="8052.25" y1="-2968.72" x2="8004.71" y2="-2968.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_240" x1="7786.47" y1="-2968.72" x2="7834.01" y2="-2968.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_241" x1="7824.2" y1="-2867.36" x2="8030.48" y2="-2864.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_242" x1="7780.41" y1="-3149.82" x2="7942.9" y2="-3149.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_243" x1="8056.75" y1="-3148.99" x2="7894.26" y2="-3148.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_244" x1="7530.13" y1="-2981.42" x2="7688.8" y2="-2981.43" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_245" x1="7598.74" y1="-3089.34" x2="7600.38" y2="-3184.92" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_246" x1="7596.41" y1="-3101.2" x2="7597.3" y2="-3157.78" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_247" x1="7730.72" y1="-2968.72" x2="7683.18" y2="-2968.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_248" x1="7464.94" y1="-2968.72" x2="7512.48" y2="-2968.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_249" x1="7502.67" y1="-2867.36" x2="7708.95" y2="-2864.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_250" x1="7458.87" y1="-3149.82" x2="7621.37" y2="-3149.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_251" x1="7735.22" y1="-3148.99" x2="7572.73" y2="-3148.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_252" x1="7851.66" y1="-3550.91" x2="8010.34" y2="-3550.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_253" x1="7920.26" y1="-3658.84" x2="7921.9" y2="-3754.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_254" x1="7917.94" y1="-3670.7" x2="7918.83" y2="-3727.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_255" x1="8052.25" y1="-3538.22" x2="8004.71" y2="-3538.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_256" x1="7786.47" y1="-3538.22" x2="7834.01" y2="-3538.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_257" x1="7824.2" y1="-3436.87" x2="8030.48" y2="-3433.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_258" x1="7780.41" y1="-3719.32" x2="7942.9" y2="-3719.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_259" x1="8056.75" y1="-3718.49" x2="7894.26" y2="-3718.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_260" x1="7530.13" y1="-3550.91" x2="7688.8" y2="-3550.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_261" x1="7598.74" y1="-3658.84" x2="7600.38" y2="-3754.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_262" x1="7596.41" y1="-3670.7" x2="7597.3" y2="-3727.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_263" x1="7730.72" y1="-3538.22" x2="7683.18" y2="-3538.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_264" x1="7464.94" y1="-3538.22" x2="7512.48" y2="-3538.21" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_265" x1="7502.67" y1="-3436.87" x2="7708.95" y2="-3433.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_266" x1="7458.87" y1="-3719.32" x2="7621.37" y2="-3719.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_267" x1="7735.22" y1="-3718.49" x2="7572.73" y2="-3718.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_268" x1="7851.66" y1="-4120.41" x2="8010.34" y2="-4120.42" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_269" x1="7920.26" y1="-4228.34" x2="7921.9" y2="-4323.92" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_270" x1="7917.94" y1="-4240.2" x2="7918.83" y2="-4296.78" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_271" x1="8052.25" y1="-4107.72" x2="8004.71" y2="-4107.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_272" x1="7786.47" y1="-4107.72" x2="7834.01" y2="-4107.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_273" x1="7824.2" y1="-4006.37" x2="8030.48" y2="-4003.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_274" x1="7780.41" y1="-4288.82" x2="7942.9" y2="-4288.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_275" x1="8056.75" y1="-4287.99" x2="7894.26" y2="-4287.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_276" x1="7530.13" y1="-4120.41" x2="7688.8" y2="-4120.42" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_277" x1="7598.74" y1="-4228.34" x2="7600.38" y2="-4323.92" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_278" x1="7596.41" y1="-4240.2" x2="7597.3" y2="-4296.78" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_279" x1="7730.72" y1="-4107.72" x2="7683.18" y2="-4107.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_280" x1="7464.94" y1="-4107.72" x2="7512.48" y2="-4107.71" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_281" x1="7502.67" y1="-4006.37" x2="7708.95" y2="-4003.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_282" x1="7458.87" y1="-4288.82" x2="7621.37" y2="-4288.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_283" x1="7735.22" y1="-4287.99" x2="7572.73" y2="-4287.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_284" x1="7851.66" y1="-4689.91" x2="8010.34" y2="-4689.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_285" x1="7920.26" y1="-4797.83" x2="7921.9" y2="-4893.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_286" x1="7917.94" y1="-4809.7" x2="7918.83" y2="-4866.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_287" x1="8052.25" y1="-4677.22" x2="8004.71" y2="-4677.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_288" x1="7786.46" y1="-4677.22" x2="7834" y2="-4677.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_289" x1="7824.2" y1="-4575.87" x2="8030.48" y2="-4572.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_290" x1="7780.41" y1="-4858.32" x2="7942.9" y2="-4858.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_291" x1="8056.75" y1="-4857.49" x2="7894.26" y2="-4857.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_292" x1="7530.13" y1="-4689.91" x2="7688.8" y2="-4689.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_293" x1="7598.74" y1="-4797.83" x2="7600.38" y2="-4893.42" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_294" x1="7596.41" y1="-4809.7" x2="7597.3" y2="-4866.28" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_295" x1="7730.72" y1="-4677.22" x2="7683.18" y2="-4677.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_296" x1="7464.93" y1="-4677.22" x2="7512.47" y2="-4677.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_297" x1="7502.67" y1="-4575.87" x2="7708.95" y2="-4572.83" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_298" x1="7458.87" y1="-4858.32" x2="7621.37" y2="-4858.31" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_299" x1="7735.22" y1="-4857.49" x2="7572.73" y2="-4857.48" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_300" x1="7851.66" y1="-5259.41" x2="8010.34" y2="-5259.42" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_301" x1="7920.26" y1="-5367.33" x2="7921.9" y2="-5462.91" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_302" x1="7917.94" y1="-5379.2" x2="7918.83" y2="-5435.77" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_303" x1="8052.25" y1="-5246.71" x2="8004.71" y2="-5246.7" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_304" x1="7786.47" y1="-5246.71" x2="7834.01" y2="-5246.7" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_305" x1="7824.2" y1="-5145.37" x2="8030.48" y2="-5142.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_306" x1="7780.41" y1="-5427.82" x2="7942.9" y2="-5427.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_307" x1="8056.75" y1="-5426.99" x2="7894.26" y2="-5426.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_308" x1="7530.13" y1="-5259.41" x2="7688.8" y2="-5259.42" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_309" x1="7598.74" y1="-5367.33" x2="7600.38" y2="-5462.91" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_310" x1="7596.41" y1="-5379.2" x2="7597.3" y2="-5435.77" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_311" x1="7730.72" y1="-5246.71" x2="7683.18" y2="-5246.7" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_312" x1="7464.94" y1="-5246.71" x2="7512.48" y2="-5246.7" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_313" x1="7502.67" y1="-5145.37" x2="7708.95" y2="-5142.33" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_314" x1="7458.87" y1="-5427.82" x2="7621.37" y2="-5427.81" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_315" x1="7735.22" y1="-5426.99" x2="7572.73" y2="-5426.98" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_316" x1="7851.66" y1="-5828.91" x2="8010.34" y2="-5828.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_317" x1="7920.26" y1="-5936.83" x2="7921.9" y2="-6032.41" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_318" x1="7917.94" y1="-5948.69" x2="7918.83" y2="-6005.27" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_319" x1="8052.25" y1="-5816.21" x2="8004.71" y2="-5816.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_320" x1="7786.47" y1="-5816.21" x2="7834.01" y2="-5816.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_321" x1="7824.2" y1="-5714.86" x2="8030.48" y2="-5711.82" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_322" x1="7780.41" y1="-5997.31" x2="7942.9" y2="-5997.3" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_323" x1="8056.75" y1="-5996.48" x2="7894.26" y2="-5996.47" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_324" x1="7530.13" y1="-5828.91" x2="7688.8" y2="-5828.92" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_325" x1="7598.74" y1="-5936.83" x2="7600.38" y2="-6032.41" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_326" x1="7596.41" y1="-5948.69" x2="7597.3" y2="-6005.27" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_327" x1="7730.72" y1="-5816.21" x2="7683.18" y2="-5816.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_328" x1="7464.94" y1="-5816.21" x2="7512.48" y2="-5816.2" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_329" x1="7502.67" y1="-5714.86" x2="7708.95" y2="-5711.82" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_330" x1="7458.87" y1="-5997.31" x2="7621.37" y2="-5997.3" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_331" x1="7735.22" y1="-5996.48" x2="7572.73" y2="-5996.47" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_332" x1="6930.7" y1="-6399.57" x2="7089.37" y2="-6399.58" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_333" x1="6999.29" y1="-6507.5" x2="7000.92" y2="-6603.08" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_334" x1="6996.98" y1="-6519.36" x2="6997.86" y2="-6575.94" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_335" x1="7131.29" y1="-6386.88" x2="7083.75" y2="-6386.87" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_336" x1="6865.51" y1="-6386.88" x2="6913.05" y2="-6386.87" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_337" x1="6903.24" y1="-6285.52" x2="7109.52" y2="-6282.49" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_338" x1="6859.44" y1="-6567.98" x2="7021.94" y2="-6567.97" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_339" x1="7135.79" y1="-6567.15" x2="6973.3" y2="-6567.14" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_340" x1="6609.17" y1="-6399.57" x2="6767.84" y2="-6399.58" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_341" x1="6677.76" y1="-6507.5" x2="6679.39" y2="-6603.08" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_342" x1="6675.44" y1="-6519.36" x2="6676.32" y2="-6575.94" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_343" x1="6809.75" y1="-6386.88" x2="6762.22" y2="-6386.87" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_344" x1="6543.98" y1="-6386.88" x2="6591.51" y2="-6386.87" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_345" x1="6581.71" y1="-6285.52" x2="6787.99" y2="-6282.49" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_346" x1="6537.91" y1="-6567.98" x2="6700.41" y2="-6567.97" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_347" x1="6814.26" y1="-6567.15" x2="6651.76" y2="-6567.14" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_348" x1="7578.69" y1="-6399.57" x2="7737.36" y2="-6399.58" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_349" x1="7647.27" y1="-6507.5" x2="7648.9" y2="-6603.08" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_350" x1="7644.96" y1="-6519.36" x2="7645.84" y2="-6575.94" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_351" x1="7779.27" y1="-6386.88" x2="7731.74" y2="-6386.87" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_352" x1="7513.5" y1="-6386.88" x2="7561.03" y2="-6386.87" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_353" x1="7551.22" y1="-6285.52" x2="7757.51" y2="-6282.49" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_354" x1="7507.43" y1="-6567.98" x2="7669.92" y2="-6567.97" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_355" x1="7783.78" y1="-6567.15" x2="7621.28" y2="-6567.14" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_356" x1="7257.16" y1="-6399.57" x2="7415.83" y2="-6399.58" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_357" x1="7325.74" y1="-6507.5" x2="7327.37" y2="-6603.08" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_358" x1="7323.43" y1="-6519.36" x2="7324.31" y2="-6575.94" xlink:href="#Безымянный_градиент_61"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_359" x1="7457.74" y1="-6386.88" x2="7410.21" y2="-6386.87" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_360" x1="7191.97" y1="-6386.88" x2="7239.5" y2="-6386.87" xlink:href="#Безымянный_градиент_60"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_361" x1="7229.69" y1="-6285.52" x2="7435.98" y2="-6282.49" xlink:href="#Безымянный_градиент_65"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_362" x1="7185.9" y1="-6567.98" x2="7348.39" y2="-6567.97" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_363" x1="7462.25" y1="-6567.15" x2="7299.75" y2="-6567.14" xlink:href="#Безымянный_градиент_66"></lineargradient>
                                        <mask id="mask-19" x="75.35" y="32.39" width="31.22" height="27.32" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id42">
                                                <rect x="72.74" y="32.39" width="31.22" height="27.32" style="fill:url(#Безымянный_градиент_19);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="Безымянный_градиент_364" x1="6438.35" y1="-360.96" x2="6690.57" y2="-360.96" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#242424"></stop>
                                            <stop offset="0.43" stop-color="#323232"></stop>
                                            <stop offset="0.76" stop-color="#5c5c5c"></stop>
                                            <stop offset="1" stop-color="#292929"></stop>
                                        </lineargradient>
                                        <mask id="mask-20" x="82.62" y="40.49" width="3.73" height="14.54" maskUnits="userSpaceOnUse">
                                            <g transform="translate(2.61 0)">
                                            <g id="id44">
                                                <rect x="80.01" y="40.49" width="3.73" height="14.54" style="fill:url(#Безымянный_градиент_20);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="Безымянный_градиент_365" x1="6405.02" y1="-490.37" x2="6517.76" y2="-490.37" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#171717"></stop>
                                            <stop offset="0.43" stop-color="#1d1d1f"></stop>
                                            <stop offset="0.76" stop-color="#444545"></stop>
                                            <stop offset="1" stop-color="#242424"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_366" x1="6481.48" y1="-492.54" x2="6629.45" y2="-492.54" xlink:href="#Безымянный_градиент_365"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_367" x1="6540.81" y1="-604.3" x2="6616.44" y2="-450.08" gradientTransform="matrix(0.12, 0, 0, -0.12, -703.51, 2.52)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#292929"></stop>
                                            <stop offset="0.43" stop-color="#373737"></stop>
                                            <stop offset="0.76" stop-color="gray"></stop>
                                            <stop offset="1" stop-color="#292929"></stop>
                                        </lineargradient>
                                        <lineargradient id="Безымянный_градиент_368" x1="6432.26" y1="-562.27" x2="6697.44" y2="-562.27" xlink:href="#Безымянный_градиент_365"></lineargradient>
                                        <lineargradient id="Безымянный_градиент_369" x1="6698.69" y1="-139.03" x2="6813.12" y2="-103.92" xlink:href="#Безымянный_градиент_41"></lineargradient>
                                        </defs>
                                        <path d="M24.55,88c7.31-2.24,10.55,0,15.82,0a4.35,4.35,0,0,1,4.45,4.21V156a4.35,4.35,0,0,1-4.45,4.21c-5.27,0-11.47,2.84-15.82,0-6.68-4.37-4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#clip-path);">
                                        <path id="_1" data-name="1" d="M32.08,120.65a8.49,8.49,0,0,1-2.18-1.43l-.07,4.39c.44.34.92.64,1.36,1a43.74,43.74,0,0,0,4.3,3.59A6.62,6.62,0,0,0,37.07,127c1.1-1,.69-1.19.7-3.8v-1.38c-.84.58-2.07,2-3.09,1.7-.25-.81-.21-.44.31-1l2.78-2.25v-4.14c-.73.31-4.67,4-5.7,4.53ZM46.37,88.89H43.53l0,2.3a5.62,5.62,0,0,0,1.48-1l1.34-1.27Zm-2.84,71.49h3.06l0-3.34c-.89.37-.72.51-1.39,1.15a6.34,6.34,0,0,1-1.59,1.07l0,1.12Zm-19.11,0h4a28.17,28.17,0,0,0-4-3.35Zm5.06-71.49H24.64L28.1,92a7.48,7.48,0,0,0,1.33.91Zm-6,71.49h.57v-3.77a18.59,18.59,0,0,0-3-2.41v4A20.87,20.87,0,0,1,23.49,160.38Zm20.05-48.65v3.42c1.13-.48.84-.59,1.69-1.31,1.59-1.36,1.35-.27,1.36-3.8v-1.3c-.56.27-3.05,2.09-3.05,3ZM21,98l3,2.42c.1-1.2.33-3.39-.23-4.23A19.56,19.56,0,0,0,21,94Zm23.44,46.64c2.69-2.41,2.15-.49,2.11-5.8-.94.35-1.14,1.25-3,2.23l0,4.19ZM24,130.49c.12-5.28.11-3.76-1.61-5.33-.61-.56-.59-.83-1.39-1.1,0,1.17-.38,3.52.23,4.31L24,130.49Zm-3-14.32,3,2.43,0-4.31-3-2.45L21,116.17Zm22.52-8.67v2a20.29,20.29,0,0,0,3-2.35l.1-4.37a15.23,15.23,0,0,0-2.16,1.63c-1.11,1-.91,1.34-.9,3.08Zm2.54,24.25c.82-.76.5-3.17.51-4.84-3.51,2.33-3,1.86-3.07,6.72Zm-2.54-29.54v1.33a21,21,0,0,0,3.06-2.33l0-4.4c-.37.26-.7.47-1.07.76-2.3,1.78-2,1.8-2,4.64ZM21,142c.14,5.62-.85,3.37,1.8,5.72.63.56.42.74,1.23,1,.05-1.19.41-3.63-.25-4.46,0,0-1.22-1.15-1.36-1.26A7.65,7.65,0,0,0,21,142Zm.07-6c-.63,5.29.35,4.43,1.7,5.81a3.3,3.3,0,0,0,1.27.94v-4.29C23.12,137.62,22.07,136.67,21.08,136Zm.41-43.13c.05,0,2.4,1.84,2.56,1.92.06-6.51-1-5.58-2.23-4.43C21,91.09,20.43,91.9,21.49,92.83Zm22,46.76c4.11-2.5,3.08-3.09,3.07-6.72-.71.25-1.48,1.37-3,2.22l0,4.5ZM24,112.65c.8-5.05-.55-4.71-1.58-5.66-.6-.56-.6-.79-1.36-1.1-.18,3.62-.67,3.9,1.6,5.75a14.89,14.89,0,0,1,1.34,1ZM43.6,122.89l-.06,4.78a19.19,19.19,0,0,0,3.05-2.34l0-4.67c-.87.38-.74.51-1.41,1.13a7,7,0,0,1-1.56,1.1Zm0,30.09-.06,4.81a11.17,11.17,0,0,0,2.9-2.43c.37-.77.18-3.71.08-4.72-.47.54-.9.69-1.48,1.29a3.41,3.41,0,0,1-1.44,1ZM21,134.34a13.44,13.44,0,0,1,1.5,1.31A17.75,17.75,0,0,0,24,136.76c.12-.93.25-4-.13-4.71A15.52,15.52,0,0,0,21,129.73v4.61Zm22.54,17.15c1.39-.68,1.25-1.18,3-2.32v-4.68c-3.7,2.43-3.16,2.33-3,7ZM24.06,106.64c0-1.11.3-3.85-.18-4.63A15.9,15.9,0,0,0,21,99.64c0,1.16-.29,3.85.22,4.67a13.69,13.69,0,0,0,2.83,2.33Zm19.67-9.06a8.09,8.09,0,0,0,1.41-1.18c.47-.46.91-.74,1.42-1.16V90.46a5.78,5.78,0,0,0-1.43,1.08c-.71.71-.94.77-1.55,1.37a13,13,0,0,0,.13,4.67ZM21,152.55a12.51,12.51,0,0,1,1.53,1.28A6.54,6.54,0,0,0,24,155c.45-4.25.42-5-3-7.08Zm22.53-31.16a12.92,12.92,0,0,0,2.71-2.15c.75-.93.3-3.47.35-4.83C42.49,116.78,43.6,117.8,43.55,121.39Zm-19.49,3.43c0-2.59,1.14-4.95-3-7,0,1.21-.3,3.78.22,4.68a14.19,14.19,0,0,0,2.84,2.32Zm6.17,35.56h7.56l-.07-2.26c-2.22,1.62-2,2.49-5.18-.7a19.91,19.91,0,0,0-2.71-2.16c0,1.85-.3,4.28.4,5.12Zm8-40.68,2.72-2.25c2.54-2,2.31-1.37,2.22-5.87l-3.6,2.89c-1.29,1.24-1.34.89-1.44,1.9a21.77,21.77,0,0,0,.1,3.33Zm0,30.1c1.08-.57,4.19-3.55,5-4v-4.09a12.17,12.17,0,0,0-1.58,1.14C38,146,38,145.16,38.17,149.8ZM29.5,104.93l0-4-5-4.13c-.6,5.28.68,4.3,2.94,6.57A9,9,0,0,0,29.5,104.93Zm-5.06,26c1.13.81,4.09,3.61,5,4.05.16-3.25.45-3.74-1.34-5.18a14.55,14.55,0,0,1-1.81-1.48,8.66,8.66,0,0,0-1.88-1.42l0,4ZM41.56,93.09l1.59-1.3,0-2.9H40.7c-3,3.48-2.53-.16-2.57,6.89l3.43-2.68Zm-3.43,67.29h2.65a13,13,0,0,1,1.3-1.25c.77-.56,1-.38,1.11-1.39v-4.16l-2.64,2a11.56,11.56,0,0,1-2.43,1.95v2.84Zm.06-50.79,0,4.46c1-.52,4.35-3.64,5-4v-4.39C42.31,106,39.39,109,38.19,109.59ZM24.44,144.78c-.12,4.38-.36,3.85,1.17,5.34l3.87,3-.07-4.47-3.82-3c-.51-.48-.47-.67-1.15-.91Zm13.7-.63c.71-.3,4-3.27,5-4l-.06-4.39-4.24,3.5c-1.17,1.09-.75,1.86-.75,4.93Zm0-6c1.07-.54,3.86-3.31,5-4l0-4.39c-.86.47-1.45,1.22-2.76,2.19-.61.45-.81.8-1.38,1.24-.75.59-.87.35-.87,1.6l0,3.39Zm-8.67-21c-.09-5.82.57-3.4-3.07-6.89a14.69,14.69,0,0,0-2-1.5c.08,4.07-.56,4.09,1.13,5.26l3.26,2.69c.64.48-.14,0,.68.44Zm8.67-13.52v4.47l3.82-3a2.38,2.38,0,0,0,1.21-2c0-1.09,0-2.31,0-3.42-.73.31-.59.46-1.2,1l-3.82,3ZM29.49,123.1l0-4.5A9.87,9.87,0,0,1,27,116.69a29.58,29.58,0,0,0-2.57-2c0,3-.5,4.09,1.08,5.28A48.43,48.43,0,0,0,29.49,123.1Zm-5.06,15.73c0,3-.49,4,1.18,5.38a38,38,0,0,0,3.88,3l0-4.5C28.08,142,25.12,139.05,24.43,138.83Zm13.71-8.69,0,2.08,4.38-3.55c.88-.86.63-.55.64-2.55V123.5A34.35,34.35,0,0,0,40,126.09c-1.84,1.33-1.9,1.15-1.87,4Zm-13.71-4.86,5.05,4.07v-4.79a10.59,10.59,0,0,1-2.47-2l-2.57-2v4.63Zm.05,7.29a32.78,32.78,0,0,0-.06,3.29c0,1.71,0,1.51,1.11,2.29a47.69,47.69,0,0,0,4,3.12l-.06-4.58-4.95-4.12Zm0,18.16c-.21,2.69-.43,4.53,1,5.63a44.83,44.83,0,0,0,4,3.12l0-4.6-5-4.15Zm13.7-29.52,0,4.76c.89-.37.58-.42,1.31-1l3.75-3,0-4.68C42.29,117.63,39.43,120.53,38.17,121.21Zm-.06,34.86c1.67-1.09,2.56-2.12,4.07-3.2,1.06-.76,1-.82,1-2.42,0-1,0-2.09,0-3.12-1,.67-1.48,1.3-2.47,2a27.12,27.12,0,0,0-2.53,2.15l0,4.57Zm-8.62-44.89,0-4.78c-1.41-.69-4.17-3.59-5-3.92-.15,4-.44,4.45,1,5.47l2.88,2.39c.74.69.36.53,1.14.84Zm-5.06-16c1.1.76,4,3.56,5,4,0-5.94.44-4.14-1.23-5.71a8.17,8.17,0,0,0-1.28-1.13,9.55,9.55,0,0,1-1.24-1c-.64-.64-.48-.67-1.25-1l0,4.78Zm18-1.45-4.25,3.5v4.9c1.9-1.22,2.09-1.72,3.94-3.11,2-1.53.69-3.13,1.25-5.74-.75.31-.09,0-.53.26-.07,0-.21.27-.28.13s-.09,0-.13.06Zm-12.5,19.52,0,4.39a12.89,12.89,0,0,1,2,1.66L35,116.94c3.74-3.44,2.69-1.14,2.84-6.78l-2.85,2.33c-.56.52-2.56,2.21-3.06,2.17S30.51,113.62,29.88,113.27Zm5.5,33.27a11.26,11.26,0,0,0,1.69-1.39c1-1,.7-.62.7-2.32v-2.58c-.86.36-4.53,3.94-5.69,4.54a8.22,8.22,0,0,1-2.2-1.44l-.06,4.4,2.37,1.68,3.19-2.89Zm-5.55-21.36c.06,2.92-.53,4,.67,5.17l5,4.14,2.28-1.72,0-4.72c-2.7,1.45-.88,2.86-5.09-.56a18.74,18.74,0,0,0-2.82-2.31Zm5.66-20.78,2.28-1.71V97.84c-3.13,2.1-1.87,1.89-3.76.47S31.93,96.49,29.83,95c.07,4.13-.6,4.52,1.4,5.93.84.59,1.19,1.13,2,1.72a9.11,9.11,0,0,1,1.12.87c.66.64.33.51,1.13.91Zm2.3-15.51H34a4.49,4.49,0,0,1-2.11,1.56l-2-1.47c0,5.25-.46,4.16,1.43,5.54,1.11.82,3.36,3.25,4.52,3.52a5.69,5.69,0,0,1,2-1.73l0-4.75s-.13,0-.15.1l-1.27,1c-.49.39-.79.83-1.71.58-.13-.85,1-1.59,1.55-2,.87-.63,1.57-.78,1.58-2.36Zm-7.95,16.55c1,.88,1.29.9,2.6,2.17,1,1,.24,1.62-1.19.47-.49-.39-.83-.67-1.42-1.07,0,4.84-.6,4.32,2,6.35l5.91-4.72,0-4.43c-2.16,1.81-2.23,2.26-5.09-.63l-2.81-2.23v4.09Zm0,36.35a7.66,7.66,0,0,1,1.94,1.67c1.12-.35.54-.45,2.31-1.72.81-.58,1.19-1.13,2-1.72,2.41-1.71,1.61-2.28,1.68-5.73-.89.46-1.07,1.1-2.3,1.57-1.51-.73-4.66-3.94-5.63-4.43-.18,5.14-.16,3.88,2,5.68.41.34,2,2.09.16,1.59-1-.27-1.26-1.24-2.18-1.61v4.7Zm4.8,11.76c-.1-.94,1.36-1.86,2-2.28,1.65-1.17,1.21-1.89,1.16-5.06-1.17.56-4.43,4.08-5.94,4.58l-2-1.48c.1,5.09-.39,4.18,1.55,5.6l4.11,3.41c1-.41.58-.7,2.29-1.71v-4.75c-1.16.47-1.65,2.09-3.15,1.69Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_21);"></path>
                                        </g>
                                        <path d="M24.55,88c7.31-2.24,10.55,0,15.82,0a4.35,4.35,0,0,1,4.45,4.21V156a4.35,4.35,0,0,1-4.45,4.21c-5.27,0-11.47,2.84-15.82,0-6.68-4.37-4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:none;"></path>
                                        <path d="M24.45,552.47c7.3-2.24,10.55,0,15.82,0a4.35,4.35,0,0,1,4.45,4.21v63.79a4.35,4.35,0,0,1-4.45,4.21c-5.27,0-11.48,2.84-15.82,0-6.69-4.37-4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#clip-path-2);">
                                        <path id="_1-2" data-name="1" d="M32,585.15a8.49,8.49,0,0,1-2.18-1.43l-.07,4.39c.44.34.91.64,1.36,1a42.6,42.6,0,0,0,4.3,3.59A6.62,6.62,0,0,0,37,591.46c1.1-1,.69-1.19.7-3.8v-1.38c-.84.58-2.07,2-3.09,1.7-.25-.81-.21-.44.31-1l2.78-2.25v-4.14c-.73.31-4.67,4-5.7,4.53Zm14.29-31.76H43.43l0,2.3a5.79,5.79,0,0,0,1.48-1l1.34-1.27Zm-2.84,71.49h3l0-3.34c-.89.37-.72.51-1.4,1.15a6.11,6.11,0,0,1-1.58,1.07l0,1.12Zm-19.11,0h4a27.71,27.71,0,0,0-4-3.35Zm5.06-71.49H24.54L28,556.46a7.2,7.2,0,0,0,1.34.91l.05-4Zm-6,71.49H24v-3.77a19,19,0,0,0-3-2.41v4a20.75,20.75,0,0,1,2.45,2.16Zm20.05-48.65v3.42c1.13-.48.83-.58,1.69-1.31,1.59-1.36,1.34-.27,1.35-3.8v-1.3c-.56.27-3.06,2.09-3.06,3ZM20.92,562.49l3,2.42c.09-1.2.32-3.39-.23-4.23a19.56,19.56,0,0,0-2.77-2.2v4Zm23.45,46.64c2.68-2.41,2.14-.49,2.11-5.8-.94.35-1.14,1.25-3,2.23l0,4.19.95-.62ZM23.94,595c.11-5.28.1-3.76-1.61-5.33-.62-.56-.59-.83-1.39-1.1,0,1.17-.38,3.52.23,4.31L23.94,595Zm-3-14.32,3,2.42.06-4.3-3-2.45-.06,4.33ZM43.43,572v2a19.93,19.93,0,0,0,3-2.35l.09-4.37a13.91,13.91,0,0,0-2.15,1.63c-1.11,1.05-.91,1.34-.91,3.08ZM46,596.25c.82-.76.49-3.17.5-4.84-3.51,2.33-3,1.86-3.06,6.72Zm-2.55-29.54V568a21.55,21.55,0,0,0,3.06-2.33l0-4.4c-.38.26-.7.47-1.07.76-2.31,1.79-2,1.8-2,4.65ZM20.91,606.45c.14,5.62-.85,3.37,1.79,5.72.63.56.42.74,1.23,1,.05-1.19.41-3.62-.24-4.46,0,0-1.22-1.15-1.36-1.26A8.37,8.37,0,0,0,20.91,606.45Zm.07-6c-.63,5.29.35,4.43,1.7,5.81a3.19,3.19,0,0,0,1.26.94v-4.29C23,602.13,22,601.17,21,600.46Zm.41-43.13c.05,0,2.39,1.84,2.56,1.92.05-6.5-1-5.58-2.23-4.43C20.87,555.6,20.33,556.4,21.39,557.33Zm22,46.76c4.1-2.5,3.08-3.09,3.06-6.72-.7.25-1.47,1.37-3,2.23l0,4.5ZM23.88,577.15c.8-5-.54-4.71-1.57-5.66-.61-.56-.6-.79-1.36-1.1-.18,3.62-.67,3.9,1.59,5.75a13.57,13.57,0,0,1,1.34,1ZM43.5,587.39l-.07,4.78a18.82,18.82,0,0,0,3.06-2.34l0-4.67c-.87.38-.75.51-1.41,1.13a7,7,0,0,1-1.56,1.1Zm0,30.09,0,4.81a11.17,11.17,0,0,0,2.9-2.43c.36-.77.18-3.7.08-4.71-.47.53-.9.69-1.48,1.28a3.3,3.3,0,0,1-1.45,1.05ZM20.93,598.84a14.39,14.39,0,0,1,1.5,1.31c.47.46,1.11.82,1.47,1.12.12-.94.25-4-.13-4.72a15.26,15.26,0,0,0-2.85-2.32v4.61ZM43.46,616c1.39-.68,1.26-1.18,3-2.32V609C42.8,611.42,43.34,611.32,43.46,616ZM24,571.14c0-1.11.3-3.85-.18-4.63a15.9,15.9,0,0,0-2.87-2.37c0,1.16-.3,3.85.21,4.67A14,14,0,0,0,24,571.14Zm19.66-9.06A7.42,7.42,0,0,0,45,560.9c.47-.46.92-.74,1.43-1.16V555A6,6,0,0,0,45,556c-.7.72-.93.77-1.54,1.37a13,13,0,0,0,.13,4.67Zm-22.7,55a13.31,13.31,0,0,1,1.53,1.28,6.32,6.32,0,0,0,1.46,1.15c.45-4.25.41-5-3-7.08Zm22.52-31.16a12.65,12.65,0,0,0,2.72-2.15c.75-.93.3-3.47.34-4.83C42.39,581.28,43.5,582.3,43.44,585.89ZM24,589.32c-.06-2.59,1.14-5-3.05-7,0,1.21-.3,3.79.22,4.68A14.13,14.13,0,0,0,24,589.32Zm6.17,35.56h7.56l-.08-2.26c-2.21,1.62-2,2.49-5.17-.7a20,20,0,0,0-2.72-2.16c0,1.86-.29,4.28.41,5.12Zm8-40.68L40.83,582c2.54-2,2.32-1.37,2.22-5.87L39.45,579c-1.29,1.24-1.33.89-1.43,1.9a21.73,21.73,0,0,0,.09,3.33Zm0,30.1c1.08-.57,4.19-3.54,5-4l0-4.09a13,13,0,0,0-1.59,1.14C37.86,610.46,37.93,609.66,38.07,614.3Zm-8.68-44.87,0-4-5-4.13c-.6,5.28.68,4.3,2.94,6.57A9.13,9.13,0,0,0,29.39,569.43Zm-5.05,26c1.13.81,4.09,3.61,5,4,.16-3.25.45-3.74-1.34-5.17a14.84,14.84,0,0,1-1.81-1.49,8.66,8.66,0,0,0-1.88-1.42l0,4ZM41.46,557.6l1.59-1.31,0-2.9H40.6c-3,3.48-2.53-.16-2.58,6.89l3.44-2.68ZM38,624.88h2.65a13,13,0,0,1,1.3-1.25c.77-.56,1-.38,1.1-1.39v-4.15l-2.63,2A12.11,12.11,0,0,1,38,622v2.84Zm.06-50.79,0,4.46c1-.52,4.35-3.64,5-4v-4.4C42.21,570.54,39.28,573.45,38.09,574.09Zm-13.75,35.2c-.13,4.37-.36,3.84,1.17,5.34l3.87,3-.07-4.47-3.83-3c-.51-.48-.47-.67-1.14-.92Zm13.7-.64c.71-.3,4-3.27,5-4l0-4.39-4.25,3.5c-1.16,1.09-.75,1.86-.74,4.93Zm0-6c1.07-.54,3.86-3.31,5-4l0-4.39c-.86.47-1.46,1.22-2.77,2.19-.6.45-.81.8-1.38,1.25-.74.58-.87.34-.87,1.59l0,3.4Zm-8.67-21.05c-.09-5.82.57-3.39-3.07-6.89a14.2,14.2,0,0,0-2-1.5c.09,4.08-.55,4.09,1.14,5.26l3.26,2.69c.64.48-.15,0,.68.44Zm8.66-13.52,0,4.47,3.82-3a2.38,2.38,0,0,0,1.21-2c0-1.09,0-2.31,0-3.42-.74.31-.59.46-1.21,1l-3.82,3ZM29.39,587.6l0-4.5a9.86,9.86,0,0,1-2.49-1.91,29.84,29.84,0,0,0-2.56-2c.05,3-.51,4.1,1.08,5.28a48.43,48.43,0,0,0,4,3.12Zm-5.06,15.73c0,3-.5,4,1.17,5.38a39.18,39.18,0,0,0,3.89,3l0-4.5C28,606.51,25,603.55,24.33,603.33ZM38,594.64v2.08l4.39-3.55c.88-.86.63-.55.63-2.55V588a35.82,35.82,0,0,0-3.18,2.59c-1.83,1.33-1.89,1.15-1.86,4Zm-13.71-4.86,5.05,4.07v-4.79a10.64,10.64,0,0,1-2.48-1.95l-2.56-2Zm0,7.29c-.11,1.08,0,2.2-.05,3.29,0,1.71,0,1.51,1.11,2.29a47.16,47.16,0,0,0,3.95,3.12l-.06-4.58-4.95-4.12Zm0,18.17c-.2,2.68-.43,4.52,1,5.62,1.82,1.35,2.17,2,4,3.12l-.05-4.59-5-4.15Zm13.71-29.53,0,4.77c.9-.38.59-.43,1.31-1l3.75-3,0-4.68C42.19,582.13,39.33,585,38.07,585.71ZM38,620.57c1.67-1.09,2.56-2.12,4.07-3.2,1.06-.76,1-.82,1-2.42,0-1,0-2.09-.05-3.12-1,.67-1.48,1.3-2.47,2A27.12,27.12,0,0,0,38,616l0,4.57Zm-8.62-44.89,0-4.78c-1.41-.69-4.17-3.59-5-3.92-.14,4-.43,4.45,1,5.48l2.87,2.38c.75.69.37.53,1.15.84Zm-5.07-16c1.11.75,4,3.55,5,4,0-6,.43-4.15-1.23-5.72a9.18,9.18,0,0,0-1.28-1.13,8.37,8.37,0,0,1-1.24-1c-.65-.64-.48-.67-1.25-1l0,4.78Zm18-1.46L38,561.75v4.9c1.9-1.22,2.08-1.72,3.94-3.11,2.05-1.53.68-3.13,1.24-5.74-.74.31-.08,0-.53.26-.06,0-.2.27-.28.13s-.08,0-.12.06ZM29.77,577.77l0,4.39a13.43,13.43,0,0,1,2,1.66l3.13-2.38c3.75-3.44,2.69-1.14,2.85-6.78L34.84,577c-.56.52-2.56,2.21-3.07,2.17S30.41,578.12,29.77,577.77ZM35.28,611A11.78,11.78,0,0,0,37,609.65c1-.95.7-.62.7-2.32v-2.58c-.86.36-4.54,3.94-5.69,4.54a8.51,8.51,0,0,1-2.21-1.43l-.05,4.39,2.37,1.68Zm-5.55-21.35c.06,2.91-.53,4,.66,5.16l5,4.14,2.29-1.72,0-4.72c-2.7,1.45-.88,2.86-5.09-.56A18.18,18.18,0,0,0,29.73,589.69Zm5.66-20.79,2.28-1.7v-4.86c-3.13,2.1-1.86,1.89-3.75.47s-2.08-1.82-4.18-3.34c.07,4.13-.6,4.52,1.39,5.93.85.59,1.2,1.13,2,1.72a7.82,7.82,0,0,1,1.12.87c.67.64.34.51,1.14.91Zm2.3-15.51H33.86A4.67,4.67,0,0,1,31.75,555l-2-1.47c0,5.24-.45,4.15,1.43,5.53,1.12.82,3.37,3.25,4.53,3.52a5.69,5.69,0,0,1,2-1.73l0-4.74s-.12,0-.15.09l-1.26,1c-.49.39-.8.83-1.71.58-.13-.85,1-1.59,1.54-2,.88-.64,1.57-.79,1.59-2.37Zm-8,16.55a31.59,31.59,0,0,1,2.6,2.18c1,1,.25,1.62-1.19.46-.48-.39-.83-.67-1.41-1.07,0,4.84-.61,4.32,2,6.36l5.92-4.72,0-4.43c-2.16,1.81-2.23,2.25-5.09-.64l-2.81-2.23v4.09Zm0,36.35A7.84,7.84,0,0,1,31.68,608c1.11-.35.54-.44,2.31-1.72.81-.58,1.19-1.13,2-1.72,2.41-1.71,1.6-2.28,1.67-5.73-.88.46-1.06,1.11-2.29,1.57-1.52-.73-4.66-3.94-5.63-4.42-.18,5.14-.16,3.87,2,5.68.4.33,2,2.08.15,1.59-1-.27-1.25-1.25-2.17-1.61v4.69Zm4.8,11.76c-.11-.94,1.36-1.85,2-2.28,1.64-1.17,1.2-1.88,1.15-5.06-1.16.56-4.42,4.08-5.93,4.58l-2-1.48c.1,5.09-.39,4.18,1.55,5.6l4.11,3.42c1-.42.58-.71,2.29-1.72v-4.75c-1.15.47-1.64,2.09-3.14,1.69Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_22);"></path>
                                        </g>
                                        <path d="M24.45,552.47c7.3-2.24,10.55,0,15.82,0a4.35,4.35,0,0,1,4.45,4.21v63.79a4.35,4.35,0,0,1-4.45,4.21c-5.27,0-11.48,2.84-15.82,0-6.69-4.37-4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:none;"></path>
                                        <path d="M24.35,694.6c7.3-2.25,10.55,0,15.82,0a4.34,4.34,0,0,1,4.44,4.21v63.78a4.35,4.35,0,0,1-4.44,4.22c-5.27,0-11.48,2.83-15.82,0-6.69-4.37-4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#clip-path-3);">
                                        <path id="_1-3" data-name="1" d="M31.88,727.28a8.58,8.58,0,0,1-2.18-1.43l-.07,4.39c.43.34.91.63,1.35,1a42.49,42.49,0,0,0,4.3,3.6,6.92,6.92,0,0,0,1.59-1.26c1.09-1,.69-1.19.7-3.81V728.4c-.84.59-2.07,2-3.09,1.7-.25-.8-.22-.44.31-1l2.77-2.24v-4.15c-.72.31-4.66,4-5.69,4.54Zm14.29-31.77H43.33l0,2.3a5.51,5.51,0,0,0,1.48-1l1.34-1.28ZM43.33,767h3.05l0-3.34c-.9.37-.72.51-1.4,1.14a6.15,6.15,0,0,1-1.58,1.08L43.33,767Zm-19.11,0h4a27.77,27.77,0,0,0-4-3.36Zm5.06-71.5H24.44l3.45,3.08a7.73,7.73,0,0,0,1.34.91l.05-4Zm-6,71.5h.57v-3.77a18.12,18.12,0,0,0-3-2.41l0,4A20.81,20.81,0,0,1,23.28,767Zm20-48.65v3.42c1.13-.48.83-.59,1.69-1.32,1.59-1.35,1.34-.26,1.35-3.79v-1.3c-.56.26-3.06,2.08-3.06,3ZM20.82,704.62l3,2.42c.1-1.21.33-3.4-.22-4.24a19.11,19.11,0,0,0-2.78-2.2v4Zm23.45,46.64c2.68-2.42,2.14-.49,2.11-5.8-.94.35-1.14,1.25-3,2.22l0,4.2,1-.63ZM23.84,737.11c.11-5.27.1-3.76-1.61-5.32-.62-.56-.59-.83-1.4-1.1,0,1.17-.37,3.52.23,4.3l2.78,2.12Zm-3-14.32,3,2.43.05-4.3-3-2.45-.06,4.32Zm22.51-8.66v2a19.81,19.81,0,0,0,3-2.35l.09-4.37a13.94,13.94,0,0,0-2.15,1.64c-1.12,1.05-.91,1.34-.91,3.08Zm2.55,24.25c.82-.76.49-3.17.5-4.84-3.51,2.32-3,1.86-3.06,6.72Zm-2.55-29.54v1.33a22.41,22.41,0,0,0,3.06-2.34l0-4.4c-.37.27-.69.47-1.07.77-2.3,1.78-2,1.8-2,4.64ZM20.81,748.58C21,754.19,20,752,22.6,754.3c.63.55.42.74,1.23,1,.05-1.2.41-3.63-.25-4.47,0,0-1.21-1.14-1.35-1.26A8.94,8.94,0,0,0,20.81,748.58Zm.07-6c-.63,5.28.35,4.43,1.7,5.8a3.12,3.12,0,0,0,1.26,1V745C22.92,744.25,21.86,743.3,20.88,742.59Zm.41-43.13s2.39,1.84,2.56,1.91c0-6.5-1-5.58-2.23-4.42C20.77,697.72,20.23,698.53,21.29,699.46Zm22,46.76c4.1-2.51,3.08-3.1,3.06-6.72-.7.25-1.47,1.37-3,2.22l0,4.5Zm-19.54-27c.8-5-.54-4.71-1.57-5.65-.61-.56-.61-.79-1.36-1.1-.19,3.62-.67,3.9,1.59,5.75a15.52,15.52,0,0,1,1.34,1ZM43.4,729.51l-.07,4.78A19.12,19.12,0,0,0,46.39,732l0-4.67c-.87.38-.75.52-1.42,1.14a6.39,6.39,0,0,1-1.55,1.09Zm0,30.1-.05,4.81a11.37,11.37,0,0,0,2.9-2.43c.36-.77.18-3.71.08-4.72-.47.53-.9.69-1.48,1.28a3.3,3.3,0,0,1-1.45,1.05ZM20.83,741a15.69,15.69,0,0,1,1.5,1.31c.47.46,1.11.82,1.46,1.12.13-.93.26-4-.12-4.71a15.71,15.71,0,0,0-2.85-2.33V741Zm22.53,17.16c1.39-.68,1.26-1.19,3-2.33v-4.68C42.7,753.54,43.24,753.45,43.36,758.12Zm-19.5-44.85c0-1.11.3-3.85-.18-4.63a15.49,15.49,0,0,0-2.87-2.37c0,1.16-.3,3.85.21,4.67a14,14,0,0,0,2.84,2.33Zm19.66-9.07A7.73,7.73,0,0,0,44.93,703c.47-.47.92-.74,1.43-1.17v-4.77a5.75,5.75,0,0,0-1.44,1.07c-.7.72-.93.78-1.54,1.37a13.1,13.1,0,0,0,.13,4.68Zm-22.7,55a15.73,15.73,0,0,1,1.53,1.28,6.32,6.32,0,0,0,1.46,1.15c.45-4.25.41-5-3-7.08ZM43.34,728a13,13,0,0,0,2.72-2.15c.75-.93.3-3.47.34-4.84C42.29,723.41,43.4,724.42,43.34,728Zm-19.48,3.43c-.06-2.59,1.14-5-3.05-7,0,1.21-.31,3.78.22,4.68A14.47,14.47,0,0,0,23.86,731.45ZM30,767h7.56l-.08-2.26c-2.21,1.62-2,2.48-5.17-.71a19.21,19.21,0,0,0-2.72-2.15c0,1.85-.29,4.28.41,5.12Zm8-40.68,2.71-2.25c2.54-2,2.32-1.37,2.22-5.87l-3.6,2.88c-1.29,1.24-1.33.89-1.43,1.91a20.6,20.6,0,0,0,.1,3.33ZM38,756.43c1.08-.57,4.19-3.55,5-4l0-4.1a13.06,13.06,0,0,0-1.59,1.15C37.76,752.58,37.83,751.79,38,756.43Zm-8.68-44.88,0-4-5-4.13c-.6,5.28.68,4.31,2.94,6.57A8.57,8.57,0,0,0,29.29,711.55Zm-5.05,26c1.13.82,4.09,3.62,5,4.06.15-3.25.45-3.75-1.34-5.18A13.19,13.19,0,0,1,26.1,735a9,9,0,0,0-1.88-1.41l0,4Zm17.12-37.85L43,698.41l0-2.9H40.5c-3,3.48-2.53-.16-2.58,6.9ZM37.92,767h2.66a14.23,14.23,0,0,1,1.3-1.26c.77-.56.95-.37,1.1-1.38v-4.16l-2.63,2a11.76,11.76,0,0,1-2.43,1.94V767ZM38,716.22l0,4.46c1-.52,4.36-3.64,5-4v-4.4C42.11,712.67,39.18,715.57,38,716.22ZM24.24,751.41c-.13,4.37-.36,3.85,1.17,5.34l3.87,3-.07-4.48-3.83-3c-.51-.48-.47-.68-1.14-.92Zm13.7-.64c.71-.3,4-3.27,5-4l0-4.39-4.25,3.5c-1.16,1.1-.75,1.87-.74,4.93Zm0-6c1.07-.53,3.86-3.3,5-4l0-4.4a34.22,34.22,0,0,0-2.77,2.2c-.6.45-.81.79-1.38,1.24-.74.59-.87.35-.87,1.6l0,3.39Zm-8.67-21c-.09-5.83.56-3.4-3.08-6.9a13.51,13.51,0,0,0-2-1.49c.09,4.07-.55,4.08,1.14,5.26l3.26,2.69C29.25,723.81,28.46,723.37,29.29,723.77ZM38,710.25l0,4.46,3.81-3a2.37,2.37,0,0,0,1.22-2c0-1.09,0-2.32,0-3.42-.74.3-.59.46-1.21,1l-3.82,3Zm-8.66,19.48,0-4.5a10.1,10.1,0,0,1-2.49-1.91,26.31,26.31,0,0,0-2.56-2c.05,3-.51,4.09,1.08,5.27a48.5,48.5,0,0,0,4,3.13Zm-5.06,15.73c0,3-.5,4,1.17,5.37a36.84,36.84,0,0,0,3.89,3l0-4.5C27.88,748.63,24.92,745.68,24.23,745.46Zm13.71-8.7v2.08l4.39-3.54c.88-.87.63-.56.63-2.56l0-2.61a34.89,34.89,0,0,0-3.19,2.59c-1.83,1.33-1.89,1.15-1.86,4ZM24.23,731.9,29.28,736v-4.78a11.2,11.2,0,0,1-2.48-2l-2.56-2Zm0,7.29c-.11,1.09,0,2.2-.05,3.29,0,1.72,0,1.52,1.11,2.29a49,49,0,0,0,4,3.13l-.06-4.58-4.95-4.13Zm0,18.17c-.2,2.68-.43,4.53,1,5.62a43.6,43.6,0,0,0,4,3.13l-.05-4.6ZM38,727.83l0,4.77c.9-.37.59-.43,1.31-1l3.75-3,0-4.69C42.09,724.25,39.23,727.16,38,727.83Zm-.06,34.87c1.67-1.09,2.56-2.13,4.07-3.21,1.06-.76,1-.82,1-2.41,0-1,0-2.09-.05-3.12-1,.66-1.49,1.3-2.47,2a27.23,27.23,0,0,0-2.53,2.16l0,4.57Zm-8.62-44.89,0-4.78c-1.41-.7-4.17-3.6-5-3.92-.14,4-.43,4.45,1,5.47L28.15,717c.74.69.36.53,1.14.84Zm-5.07-16c1.11.76,4,3.56,5,4,0-5.94.43-4.14-1.23-5.71A8.17,8.17,0,0,0,26.74,699a9,9,0,0,1-1.24-1c-.64-.63-.48-.66-1.25-1Zm18-1.46-4.25,3.5v4.9c1.9-1.22,2.08-1.71,3.94-3.1,2.05-1.54.68-3.13,1.24-5.74-.74.3-.08,0-.53.25-.06,0-.2.28-.28.14s-.08,0-.12,0ZM29.67,719.9l0,4.39a12.82,12.82,0,0,1,2,1.66l3.13-2.39c3.75-3.44,2.69-1.13,2.85-6.77l-2.85,2.33c-.56.52-2.56,2.2-3.07,2.16S30.31,720.24,29.67,719.9Zm5.51,33.27a12.49,12.49,0,0,0,1.69-1.39c1-1,.7-.62.7-2.33v-2.57c-.86.35-4.54,3.94-5.69,4.54A8.28,8.28,0,0,1,29.67,750l-.05,4.4L32,756.06Zm-5.55-21.36c.06,2.92-.53,4,.66,5.16l5,4.14,2.29-1.71,0-4.73c-2.7,1.45-.88,2.86-5.09-.56a19.43,19.43,0,0,0-2.82-2.3ZM35.28,711l2.29-1.71v-4.86c-3.13,2.1-1.86,1.89-3.75.48s-2.08-1.83-4.18-3.35c.07,4.13-.6,4.53,1.39,5.93.85.59,1.2,1.13,2,1.72a8.6,8.6,0,0,1,1.12.87c.67.64.34.52,1.13.92Zm2.31-15.51H33.76a4.59,4.59,0,0,1-2.11,1.56l-2-1.47c0,5.25-.45,4.15,1.43,5.54,1.12.82,3.37,3.25,4.53,3.52a5.75,5.75,0,0,1,2-1.73l0-4.75s-.12,0-.15.1l-1.26,1c-.49.4-.8.83-1.71.59-.13-.85,1-1.6,1.54-2,.88-.63,1.57-.78,1.58-2.36Zm-8,16.55a33.31,33.31,0,0,1,2.6,2.17c1,1,.25,1.62-1.19.47-.48-.39-.83-.67-1.41-1.07,0,4.83-.61,4.31,2,6.35l5.92-4.72,0-4.43c-2.16,1.81-2.23,2.25-5.09-.63L29.64,708v4.09Zm0,36.35a8.06,8.06,0,0,1,1.94,1.66c1.11-.35.54-.44,2.31-1.71.81-.59,1.19-1.14,2-1.72,2.42-1.71,1.61-2.28,1.68-5.73-.88.46-1.06,1.1-2.3,1.57-1.51-.73-4.65-3.94-5.62-4.43-.18,5.14-.16,3.87,2,5.68.4.34,2,2.09.15,1.59-1-.27-1.25-1.24-2.17-1.61v4.7Zm4.8,11.75c-.11-.93,1.36-1.85,2-2.28,1.64-1.17,1.2-1.88,1.15-5-1.16.56-4.42,4.08-5.93,4.58l-2-1.49c.1,5.1-.39,4.19,1.55,5.6l4.1,3.42c1-.42.59-.7,2.3-1.71v-4.75c-1.15.47-1.64,2.08-3.14,1.68Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_23);"></path>
                                        </g>
                                        <path d="M24.35,694.6c7.3-2.25,10.55,0,15.82,0a4.34,4.34,0,0,1,4.44,4.21v63.78a4.35,4.35,0,0,1-4.44,4.22c-5.27,0-11.48,2.83-15.82,0-6.69-4.37-4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:none;"></path>
                                        <path d="M292.6,87.5c-7.31-2.25-10.55,0-15.82,0a4.34,4.34,0,0,0-4.45,4.21v63.78a4.35,4.35,0,0,0,4.45,4.22c5.27,0,11.47,2.83,15.82,0,6.68-4.37,4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#clip-path-4);">
                                        <path id="_1-4" data-name="1" d="M285.07,120.18a8.76,8.76,0,0,0,2.18-1.43l.07,4.39c-.44.34-.92.63-1.36,1a42.49,42.49,0,0,1-4.3,3.6,6.88,6.88,0,0,1-1.58-1.26c-1.1-1-.69-1.19-.7-3.81V121.3c.84.59,2.07,2,3.09,1.7.25-.8.21-.44-.31-1l-2.78-2.24v-4.15c.73.31,4.67,4,5.7,4.54ZM270.78,88.41h2.84l0,2.3a5.36,5.36,0,0,1-1.48-1l-1.34-1.28Zm2.84,71.5h-3.06l0-3.34c.89.37.72.51,1.39,1.14a6.12,6.12,0,0,0,1.59,1.08l.05,1.12Zm19.11,0h-4a28.92,28.92,0,0,1,4-3.36Zm-5.06-71.5h4.84l-3.46,3.08a8.05,8.05,0,0,1-1.33.91l-.05-4Zm6,71.5h-.57v-3.77a18.07,18.07,0,0,1,3-2.41v4a21.76,21.76,0,0,0-2.45,2.17Zm-20.06-48.65v3.42c-1.13-.48-.84-.59-1.69-1.32-1.59-1.35-1.34-.26-1.35-3.79v-1.3c.56.27,3.05,2.08,3.05,3Zm22.51-13.74-3,2.42c-.1-1.21-.32-3.4.23-4.23a18.92,18.92,0,0,1,2.77-2.21Zm-23.44,46.64c-2.69-2.42-2.15-.49-2.11-5.8.94.35,1.14,1.25,3,2.22l0,4.2ZM293.11,130c-.12-5.27-.1-3.76,1.61-5.32.62-.56.59-.83,1.39-1.1,0,1.17.38,3.52-.23,4.3L293.11,130Zm3-14.32-3,2.43-.05-4.3,3-2.45.06,4.32ZM273.61,107v2a19,19,0,0,1-3-2.35l-.1-4.37a14,14,0,0,1,2.16,1.64c1.11,1,.91,1.34.9,3.08Zm-2.54,24.25c-.82-.76-.49-3.17-.5-4.84,3.51,2.33,3,1.86,3.06,6.72Zm2.55-29.54v1.33a22.41,22.41,0,0,1-3.06-2.34l0-4.4c.37.27.7.48,1.07.77,2.31,1.78,2,1.8,2,4.64Zm22.52,39.74c-.14,5.62.85,3.37-1.79,5.72-.63.55-.42.74-1.23,1-.05-1.2-.41-3.63.24-4.47l1.36-1.26a8.5,8.5,0,0,1,1.42-1Zm-.07-6c.63,5.28-.35,4.43-1.7,5.8a3.16,3.16,0,0,1-1.27,1v-4.3c.94-.79,2-1.74,3-2.45Zm-.41-43.13c-.05,0-2.39,1.84-2.56,1.91-.06-6.5,1-5.58,2.23-4.43.84.78,1.39,1.58.33,2.51Zm-22,46.76c-4.1-2.51-3.08-3.1-3.07-6.72.71.25,1.48,1.37,3,2.22l0,4.5Zm19.54-26.95c-.8-5,.54-4.71,1.57-5.65.61-.56.6-.79,1.36-1.1.18,3.62.67,3.9-1.59,5.75-.45.37-1.11.72-1.35,1Zm-19.62,10.24.06,4.78a18.61,18.61,0,0,1-3.05-2.34l0-4.67c.87.39.75.52,1.41,1.14a7,7,0,0,0,1.56,1.1Zm0,30.1.06,4.81a11.37,11.37,0,0,1-2.9-2.43c-.36-.77-.18-3.71-.08-4.72.47.54.9.69,1.48,1.28a3.33,3.33,0,0,0,1.44,1.05Zm22.56-18.65a14.56,14.56,0,0,0-1.5,1.31,18.11,18.11,0,0,1-1.47,1.12c-.12-.93-.25-4,.13-4.71a16,16,0,0,1,2.84-2.33v4.61ZM273.59,151c-1.4-.68-1.26-1.18-3-2.32V144c3.7,2.44,3.16,2.34,3,7Zm19.5-44.85c0-1.11-.3-3.85.18-4.63a15.49,15.49,0,0,1,2.87-2.37c0,1.16.29,3.85-.22,4.67a13.69,13.69,0,0,1-2.83,2.33Zm-19.66-9.06A7.81,7.81,0,0,1,272,95.93c-.48-.47-.92-.74-1.43-1.17V90A6.27,6.27,0,0,1,272,91.06c.7.72.93.78,1.54,1.37a13.1,13.1,0,0,1-.13,4.68Zm22.7,55a13.36,13.36,0,0,0-1.53,1.27,6.54,6.54,0,0,1-1.46,1.15c-.45-4.24-.42-5,3-7.07ZM273.6,120.92a12.92,12.92,0,0,1-2.71-2.15c-.75-.93-.3-3.47-.35-4.84C274.66,116.31,273.55,117.33,273.6,120.92Zm19.49,3.43c.05-2.59-1.14-4.95,3.05-7,0,1.21.3,3.78-.22,4.68A14.47,14.47,0,0,1,293.09,124.35Zm-6.17,35.56h-7.56l.07-2.26c2.22,1.62,2.05,2.48,5.18-.71a19.11,19.11,0,0,1,2.71-2.15c0,1.85.3,4.28-.4,5.12Zm-8-40.68L276.21,117c-2.54-2-2.31-1.37-2.21-5.87l3.6,2.88c1.29,1.24,1.33.89,1.43,1.91a20.6,20.6,0,0,1-.1,3.33Zm.05,30.1c-1.08-.57-4.19-3.55-5-4v-4.1a13.2,13.2,0,0,1,1.58,1.15C279.19,145.48,279.12,144.69,279,149.33Zm8.67-44.88,0-4,5-4.13c.6,5.28-.68,4.31-2.94,6.57a8.45,8.45,0,0,1-2.08,1.54Zm5.06,26c-1.13.82-4.09,3.62-5,4.06-.16-3.25-.45-3.75,1.34-5.18a13.82,13.82,0,0,0,1.81-1.49,9,9,0,0,1,1.88-1.41l0,4ZM275.59,92.62,274,91.31l0-2.89h2.47c3,3.47,2.53-.17,2.57,6.89l-3.43-2.69ZM279,159.91h-2.65a14.23,14.23,0,0,0-1.3-1.26c-.77-.56-.95-.37-1.1-1.38l0-4.16,2.64,2a11.51,11.51,0,0,0,2.43,1.94v2.85ZM279,109.12l0,4.46c-1-.52-4.35-3.64-5-4v-4.4C274.84,105.56,277.76,108.47,279,109.12Zm13.75,35.19c.13,4.37.36,3.85-1.17,5.34l-3.87,3,.07-4.48,3.82-3c.51-.48.48-.68,1.15-.92Zm-13.7-.64c-.71-.3-4-3.26-5-4l0-4.39,4.24,3.5c1.17,1.1.75,1.86.75,4.93Zm0-6c-1.07-.53-3.86-3.3-5-4l0-4.4a34.22,34.22,0,0,1,2.77,2.2c.6.45.8.79,1.37,1.24.75.59.87.35.87,1.59l0,3.4Zm8.67-21c.09-5.83-.57-3.4,3.07-6.9a15,15,0,0,1,2-1.5c-.09,4.08.55,4.09-1.14,5.27l-3.26,2.69c-.64.48.14,0-.68.44ZM279,103.15l0,4.46-3.82-3a2.39,2.39,0,0,1-1.21-2c0-1.08,0-2.31,0-3.41.74.3.59.46,1.2,1l3.83,3Zm8.66,19.48,0-4.5a9.87,9.87,0,0,0,2.48-1.91,27.74,27.74,0,0,1,2.57-2c-.05,3,.51,4.09-1.08,5.27A48.5,48.5,0,0,1,287.66,122.63Zm5.06,15.73c0,3,.5,4-1.17,5.37a36.39,36.39,0,0,1-3.89,3l0-4.5c1.37-.72,4.33-3.67,5-3.89ZM279,129.66v2.08l-4.39-3.54c-.88-.87-.63-.56-.64-2.56V123a34.35,34.35,0,0,1,3.18,2.59c1.84,1.33,1.9,1.15,1.87,4Zm13.71-4.86-5.05,4.07v-4.78a11.14,11.14,0,0,0,2.48-2l2.56-2v4.62Zm-.05,7.29a32.84,32.84,0,0,1,.06,3.29c0,1.72,0,1.52-1.11,2.29a49.54,49.54,0,0,1-4,3.13l.07-4.58,4.95-4.13Zm0,18.17c.2,2.68.42,4.53-1,5.62a45,45,0,0,1-4,3.13l0-4.6,5-4.15ZM279,120.73l0,4.77c-.89-.37-.58-.43-1.31-1l-3.75-3,0-4.69c.88.38,3.74,3.29,5,4ZM279,155.6c-1.67-1.09-2.56-2.13-4.07-3.21-1.06-.75-1-.82-1-2.41,0-1,0-2.09.05-3.12,1.05.67,1.48,1.3,2.47,2A27.23,27.23,0,0,1,279,151l0,4.57Zm8.62-44.89,0-4.78c1.41-.7,4.17-3.6,5-3.92.14,4,.43,4.44-1,5.47l-2.88,2.39c-.74.69-.36.53-1.14.84Zm5.06-16c-1.1.76-4,3.56-5,4,0-5.94-.44-4.14,1.23-5.71a8.17,8.17,0,0,1,1.28-1.13,9.63,9.63,0,0,0,1.24-1c.64-.63.48-.66,1.25-1l0,4.77Zm-18-1.46,4.25,3.5v4.9c-1.9-1.22-2.08-1.71-3.94-3.1-2.05-1.54-.69-3.13-1.25-5.74.75.3.09,0,.53.25.07,0,.21.27.28.14s.09,0,.13,0Zm12.51,19.53,0,4.38a12.79,12.79,0,0,0-2,1.67l-3.14-2.39c-3.74-3.44-2.69-1.13-2.84-6.77l2.85,2.33c.56.52,2.56,2.2,3.06,2.16S286.64,113.14,287.28,112.8Zm-5.51,33.27a12.49,12.49,0,0,1-1.69-1.39c-1-1-.7-.62-.7-2.33v-2.57c.86.35,4.54,3.94,5.69,4.54a8.06,8.06,0,0,0,2.2-1.44l.06,4.4L285,149l-3.19-2.88Zm5.55-21.36c-.06,2.92.53,4-.66,5.16l-5,4.14-2.28-1.71,0-4.73c2.7,1.45.88,2.86,5.09-.56a19.43,19.43,0,0,1,2.82-2.3Zm-5.66-20.78-2.28-1.71V97.37c3.13,2.09,1.87,1.88,3.76.47s2.08-1.82,4.18-3.34c-.07,4.12.6,4.52-1.4,5.92-.84.59-1.19,1.13-2,1.73a8.25,8.25,0,0,0-1.11.86C282.13,103.66,282.46,103.53,281.66,103.93Zm-2.3-15.51h3.83A4.54,4.54,0,0,0,285.3,90l2-1.47c0,5.25.45,4.15-1.44,5.53-1.11.83-3.36,3.26-4.52,3.53a5.69,5.69,0,0,0-2-1.73l0-4.75c.05,0,.13,0,.15.1l1.27,1c.49.39.8.83,1.71.59.13-.85-1-1.6-1.55-2-.87-.63-1.57-.78-1.58-2.36Zm8,16.55a31.1,31.1,0,0,0-2.61,2.17c-1,1-.24,1.62,1.2.47.48-.39.83-.67,1.41-1.07,0,4.83.6,4.31-2,6.35l-5.92-4.72,0-4.43c2.16,1.81,2.23,2.25,5.09-.63l2.81-2.23V105Zm0,36.35a7.86,7.86,0,0,0-1.94,1.66c-1.11-.35-.54-.44-2.31-1.72-.81-.58-1.19-1.13-2-1.72-2.41-1.71-1.6-2.27-1.67-5.72.88.45,1.06,1.1,2.29,1.56,1.51-.73,4.66-3.94,5.63-4.42.18,5.14.16,3.87-2,5.68-.41.34-2,2.09-.15,1.59,1-.27,1.25-1.24,2.17-1.61v4.7Zm-4.8,11.75c.1-.94-1.36-1.85-2-2.28-1.65-1.17-1.21-1.88-1.16-5,1.17.55,4.43,4.08,5.94,4.58l2-1.49c-.1,5.09.39,4.18-1.55,5.6l-4.11,3.42c-1-.42-.58-.71-2.29-1.71v-4.75c1.16.47,1.65,2.08,3.15,1.68Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_24);"></path>
                                        </g>
                                        <path d="M292.6,87.5c-7.31-2.25-10.55,0-15.82,0a4.34,4.34,0,0,0-4.45,4.21v63.78a4.35,4.35,0,0,0,4.45,4.22c5.27,0,11.47,2.83,15.82,0,6.68-4.37,4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:none;"></path>
                                        <path d="M292.5,552c-7.31-2.25-10.55,0-15.83,0a4.34,4.34,0,0,0-4.44,4.21V620a4.35,4.35,0,0,0,4.44,4.22c5.28,0,11.48,2.83,15.83,0,6.68-4.37,4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#clip-path-5);">
                                        <path id="_1-5" data-name="1" d="M285,584.68a8.76,8.76,0,0,0,2.18-1.43l.07,4.39c-.44.34-.92.63-1.36,1a42.49,42.49,0,0,1-4.3,3.6A6.88,6.88,0,0,1,280,591c-1.1-1-.69-1.19-.7-3.81V585.8c.83.59,2.07,2,3.09,1.7.24-.8.21-.44-.31-1l-2.78-2.24v-4.15c.73.31,4.67,4,5.7,4.54Zm-14.29-31.77h2.83v2.3a5.21,5.21,0,0,1-1.48-1l-1.34-1.28Zm2.83,71.5h-3.05l0-3.34c.89.37.72.51,1.39,1.14a6.12,6.12,0,0,0,1.59,1.08l0,1.12Zm19.12,0h-4a29,29,0,0,1,4-3.36Zm-5.06-71.5h4.84L289,556a8.05,8.05,0,0,1-1.33.91l-.05-4Zm6,71.5H293v-3.77a18.54,18.54,0,0,1,3-2.41v4a21.88,21.88,0,0,0-2.46,2.17Zm-20.05-48.65v3.42c-1.13-.48-.83-.59-1.68-1.32-1.6-1.35-1.35-.26-1.36-3.79v-1.3c.55.27,3.05,2.08,3.05,3ZM296,562l-3,2.42c-.1-1.21-.33-3.4.22-4.23A19.57,19.57,0,0,1,296,558v4Zm-23.45,46.64c-2.68-2.42-2.14-.49-2.1-5.8.94.35,1.14,1.25,3,2.22l0,4.2-.95-.62ZM293,594.51c-.12-5.27-.11-3.76,1.61-5.32.61-.56.58-.83,1.39-1.1,0,1.17.38,3.52-.23,4.3L293,594.51Zm3-14.32-3,2.43-.05-4.3,3-2.45.06,4.32Zm-22.52-8.66v2a19,19,0,0,1-3-2.35l-.1-4.37a13.94,13.94,0,0,1,2.15,1.64c1.12,1,.91,1.34.91,3.08ZM271,595.78c-.81-.76-.49-3.17-.5-4.84,3.51,2.33,3,1.86,3.07,6.72Zm2.55-29.54v1.33a21.25,21.25,0,0,1-3.06-2.34l0-4.4c.37.27.69.48,1.07.77C273.86,563.38,273.52,563.4,273.51,566.24ZM296,606c-.14,5.62.85,3.37-1.8,5.72-.63.55-.42.74-1.23,1-.05-1.2-.41-3.63.25-4.47l1.36-1.26a8.11,8.11,0,0,1,1.42-1Zm-.07-6c.63,5.28-.35,4.43-1.7,5.8a3.23,3.23,0,0,1-1.27,1v-4.3c.93-.79,2-1.74,3-2.45Zm-.41-43.13c-.05,0-2.4,1.84-2.56,1.91-.06-6.5,1-5.58,2.22-4.42C296.07,555.12,296.62,555.93,295.56,556.86Zm-22,46.76c-4.1-2.51-3.08-3.1-3.06-6.72.7.25,1.48,1.37,3,2.22Zm19.54-27c-.8-5,.55-4.71,1.58-5.65.6-.56.6-.79,1.35-1.1.19,3.62.67,3.9-1.59,5.75-.45.37-1.1.72-1.34,1Zm-19.61,10.24.06,4.78a18.61,18.61,0,0,1-3.05-2.34v-4.67c.88.39.75.52,1.42,1.14a6.77,6.77,0,0,0,1.56,1.1Zm0,30.1.05,4.81a11.32,11.32,0,0,1-2.89-2.43c-.37-.77-.18-3.71-.09-4.72.48.54.9.69,1.49,1.28a3.27,3.27,0,0,0,1.44,1ZM296,598.36a15.69,15.69,0,0,0-1.51,1.31c-.47.46-1.1.82-1.46,1.12-.13-.93-.25-4,.12-4.71a16.06,16.06,0,0,1,2.85-2.33v4.61Zm-22.54,17.16c-1.39-.68-1.25-1.18-3-2.32v-4.69c3.69,2.44,3.16,2.34,3,7ZM293,570.67c0-1.11-.3-3.85.19-4.63a15.75,15.75,0,0,1,2.86-2.37c0,1.16.3,3.85-.21,4.67a13.75,13.75,0,0,1-2.84,2.33Zm-19.66-9.07a8,8,0,0,1-1.41-1.17c-.47-.47-.92-.74-1.43-1.17v-4.77a6.07,6.07,0,0,1,1.44,1.07c.7.72.93.77,1.55,1.37A13,13,0,0,1,273.32,561.6Zm22.71,55a13.36,13.36,0,0,0-1.53,1.27A6.54,6.54,0,0,1,293,619c-.45-4.25-.42-5,3-7.07ZM273.5,585.42a12.66,12.66,0,0,1-2.71-2.16c-.75-.93-.3-3.46-.35-4.83C274.56,580.81,273.45,581.82,273.5,585.42ZM293,588.85c.06-2.59-1.13-5,3.06-7,0,1.21.3,3.78-.22,4.68a14.54,14.54,0,0,1-2.84,2.32Zm-6.16,35.56h-7.56l.07-2.26c2.22,1.62,2.05,2.48,5.17-.71a19.21,19.21,0,0,1,2.72-2.15c0,1.85.3,4.28-.4,5.12Zm-8-40.68-2.72-2.26c-2.54-2-2.31-1.37-2.22-5.86l3.6,2.88c1.29,1.24,1.33.89,1.43,1.91a20.59,20.59,0,0,1-.09,3.33Zm.05,30.1c-1.08-.57-4.2-3.55-5-4l0-4.1a13.06,13.06,0,0,1,1.59,1.15C279.09,610,279,609.19,278.88,613.83ZM287.55,569l0-4,5-4.13c.59,5.28-.68,4.31-2.94,6.57a8.45,8.45,0,0,1-2.08,1.54Zm5.06,26c-1.13.82-4.1,3.62-5,4.06-.15-3.25-.44-3.75,1.35-5.18a14.51,14.51,0,0,0,1.81-1.49,8.89,8.89,0,0,1,1.87-1.41v4Zm-17.12-37.85-1.6-1.31,0-2.89h2.48c3,3.47,2.53-.17,2.57,6.89l-3.43-2.69Zm3.43,67.29h-2.65a14.23,14.23,0,0,0-1.3-1.26c-.77-.56-1-.37-1.11-1.38v-4.16l2.64,2a11.51,11.51,0,0,0,2.43,1.94v2.85Zm-.06-50.79,0,4.46c-1-.52-4.35-3.64-5-4v-4.4C274.74,570.06,277.66,573,278.86,573.62Zm13.74,35.19c.13,4.37.36,3.85-1.16,5.34l-3.87,3.05.06-4.48,3.83-3c.51-.48.47-.68,1.14-.92Zm-13.69-.64c-.71-.3-4-3.26-5.05-4l.06-4.39,4.24,3.5c1.17,1.1.75,1.86.75,4.93Zm0-6c-1.07-.53-3.86-3.3-5-4l0-4.4a34.41,34.41,0,0,1,2.76,2.2c.6.45.81.79,1.38,1.24.75.59.87.34.87,1.59l0,3.4Zm8.67-21c.09-5.83-.57-3.4,3.07-6.9a15.57,15.57,0,0,1,2-1.5c-.09,4.08.56,4.09-1.13,5.27l-3.26,2.69c-.64.48.14,0-.68.44Zm-8.67-13.52,0,4.46-3.81-3a2.37,2.37,0,0,1-1.21-2c0-1.08,0-2.31,0-3.41.74.3.59.46,1.21,1l3.82,3Zm8.67,19.48v-4.5a9.92,9.92,0,0,0,2.49-1.91,26.47,26.47,0,0,1,2.57-2c-.05,3,.5,4.09-1.08,5.27a50.25,50.25,0,0,1-4,3.13Zm5.06,15.73c0,3,.49,4-1.18,5.37a35.35,35.35,0,0,1-3.88,3l0-4.5c1.37-.72,4.33-3.67,5-3.89Zm-13.71-8.7,0,2.08-4.38-3.54c-.88-.87-.64-.56-.64-2.56v-2.61a35.82,35.82,0,0,1,3.18,2.59c1.83,1.33,1.9,1.15,1.87,4Zm13.71-4.86-5.05,4.07v-4.78a11.14,11.14,0,0,0,2.47-2l2.56-2v4.62Zm-.05,7.29c.12,1.09,0,2.2.06,3.29,0,1.72,0,1.52-1.11,2.29a49.54,49.54,0,0,1-4,3.13l.06-4.58,4.95-4.13Zm0,18.17c.21,2.68.43,4.53-1,5.62a43.5,43.5,0,0,1-4,3.13l.05-4.6,5-4.15Zm-13.7-29.53,0,4.77c-.89-.37-.58-.43-1.31-1l-3.75-3,0-4.69c.88.38,3.74,3.29,5,4Zm.06,34.87c-1.68-1.09-2.56-2.13-4.07-3.21-1.06-.75-1-.82-1-2.41,0-1,0-2.09.06-3.12,1,.67,1.48,1.3,2.47,2a27.23,27.23,0,0,1,2.53,2.16l0,4.57Zm8.62-44.89,0-4.78c1.41-.7,4.18-3.6,5-3.92.14,4,.43,4.44-1,5.47l-2.88,2.39c-.74.69-.36.53-1.14.84Zm5.06-16c-1.1.76-4,3.56-5,4,0-5.94-.44-4.14,1.23-5.71a8.17,8.17,0,0,1,1.28-1.13,8.9,8.9,0,0,0,1.23-1c.65-.63.49-.66,1.26-1l0,4.77Zm-17.95-1.46,4.24,3.5v4.9c-1.9-1.22-2.09-1.71-3.95-3.1-2.05-1.54-.68-3.13-1.24-5.74.75.3.09,0,.53.25.06,0,.21.27.28.14s.08,0,.13,0Zm12.5,19.53,0,4.38a12.79,12.79,0,0,0-2,1.67L282.1,581c-3.75-3.44-2.69-1.13-2.84-6.77l2.84,2.33c.57.52,2.57,2.2,3.07,2.16S286.54,577.64,287.17,577.3Zm-5.51,33.27a12.45,12.45,0,0,1-1.68-1.39c-1-1-.7-.62-.7-2.33v-2.57c.86.35,4.53,3.94,5.69,4.54a8.22,8.22,0,0,0,2.2-1.44l.06,4.4-2.37,1.68-3.19-2.89Zm5.56-21.36c-.07,2.92.52,4-.67,5.16l-5,4.14-2.28-1.71,0-4.73c2.7,1.45.88,2.86,5.09-.56a18.88,18.88,0,0,1,2.82-2.3Zm-5.66-20.78-2.28-1.71v-4.85c3.13,2.09,1.87,1.88,3.76.47s2.08-1.82,4.18-3.34c-.08,4.12.6,4.52-1.4,5.92-.84.59-1.2,1.13-2,1.73a8.34,8.34,0,0,0-1.12.86c-.66.65-.33.52-1.13.92Zm-2.3-15.51h3.83a4.51,4.51,0,0,0,2.1,1.56l2-1.47c0,5.25.45,4.15-1.43,5.53-1.12.83-3.36,3.26-4.52,3.53a5.69,5.69,0,0,0-2-1.73l0-4.75c.05,0,.13,0,.15.1l1.27,1c.49.39.79.83,1.71.59.13-.85-1-1.6-1.55-2-.87-.63-1.57-.78-1.58-2.36Zm7.95,16.55a31.19,31.19,0,0,0-2.6,2.17c-1,1-.24,1.62,1.19.47.49-.39.83-.67,1.41-1.07,0,4.83.61,4.31-2,6.35l-5.92-4.72,0-4.43c2.17,1.81,2.24,2.25,5.1-.63l2.81-2.23v4.09Zm0,36.35a7.86,7.86,0,0,0-1.94,1.66c-1.12-.35-.54-.44-2.32-1.72-.8-.58-1.18-1.13-2-1.72-2.41-1.71-1.61-2.27-1.68-5.72.89.45,1.07,1.1,2.3,1.56,1.51-.73,4.66-3.94,5.63-4.42.18,5.14.16,3.87-2,5.68-.4.34-2,2.09-.15,1.59,1-.27,1.26-1.24,2.17-1.61Zm-4.81,11.75c.11-.94-1.35-1.85-1.95-2.28-1.65-1.17-1.21-1.88-1.16-5,1.16.56,4.42,4.08,5.94,4.58l2-1.49c-.11,5.09.39,4.18-1.55,5.6l-4.11,3.42c-1-.42-.58-.71-2.29-1.71v-4.75c1.15.47,1.65,2.08,3.14,1.68Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_25);"></path>
                                        </g>
                                        <path d="M292.5,552c-7.31-2.25-10.55,0-15.83,0a4.34,4.34,0,0,0-4.44,4.21V620a4.35,4.35,0,0,0,4.44,4.22c5.28,0,11.48,2.83,15.83,0,6.68-4.37,4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:none;"></path>
                                        <path d="M292.4,694.12c-7.31-2.24-10.55,0-15.83,0a4.35,4.35,0,0,0-4.44,4.22v63.78a4.34,4.34,0,0,0,4.44,4.21c5.28,0,11.48,2.84,15.83,0,6.68-4.36,4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#clip-path-6);">
                                        <path id="_1-6" data-name="1" d="M284.86,726.8a8.16,8.16,0,0,0,2.18-1.43l.07,4.39c-.43.34-.91.64-1.35,1a42.38,42.38,0,0,1-4.3,3.59,6.62,6.62,0,0,1-1.58-1.26c-1.1-1-.7-1.19-.7-3.8v-1.38c.83.58,2.07,2,3.09,1.7.24-.81.21-.44-.31-1l-2.78-2.24v-4.15c.73.31,4.66,4,5.69,4.53ZM270.57,695h2.84v2.3a5.67,5.67,0,0,1-1.49-1L270.57,695Zm2.84,71.49h-3.05l0-3.33c.89.37.72.51,1.39,1.14a6.11,6.11,0,0,0,1.58,1.07l.05,1.12Zm19.11,0h-4a28.26,28.26,0,0,1,4-3.35Zm-5-71.49h4.84l-3.46,3.07a8.12,8.12,0,0,1-1.33.92l0-4Zm6,71.49h-.57v-3.76a18.21,18.21,0,0,1,3-2.42l0,4a20.75,20.75,0,0,0-2.45,2.16Zm-20-48.65v3.42c-1.13-.48-.83-.58-1.69-1.31-1.59-1.36-1.34-.27-1.35-3.8v-1.3c.56.27,3.06,2.09,3.06,3Zm22.51-13.73-3,2.41c-.1-1.2-.33-3.39.22-4.23a19.67,19.67,0,0,1,2.78-2.2v4Zm-23.45,46.63c-2.68-2.41-2.14-.48-2.1-5.8.93.35,1.14,1.25,3,2.23l0,4.19-.95-.62Zm20.43-14.14c-.11-5.28-.1-3.76,1.61-5.33.62-.56.59-.83,1.4-1.1,0,1.17.37,3.52-.23,4.31l-2.78,2.12Zm3-14.32-3,2.43-.05-4.31,3-2.45.06,4.33Zm-22.51-8.67v2a19.64,19.64,0,0,1-3-2.35l-.1-4.37a14.56,14.56,0,0,1,2.15,1.63c1.12,1.06.91,1.34.91,3.08Zm-2.55,24.26c-.82-.77-.49-3.18-.5-4.84,3.51,2.32,3,1.85,3.06,6.71Zm2.55-29.54v1.32a20.92,20.92,0,0,1-3.05-2.33l0-4.4c.37.26.69.47,1.07.76C273.76,705.51,273.42,705.53,273.41,708.37Zm22.53,39.73c-.15,5.62.85,3.37-1.8,5.72-.63.56-.42.74-1.23,1-.05-1.19-.41-3.63.25-4.46,0,0,1.21-1.15,1.35-1.26a8.37,8.37,0,0,1,1.42-1Zm-.07-6c.62,5.29-.35,4.43-1.7,5.81a3.3,3.3,0,0,1-1.27.94v-4.29c.93-.79,2-1.75,3-2.46ZM295.46,699s-2.4,1.84-2.56,1.92c-.06-6.5,1-5.58,2.22-4.43C296,697.25,296.52,698.05,295.46,699Zm-22,46.76c-4.1-2.5-3.08-3.09-3.06-6.72.7.25,1.47,1.37,3,2.23ZM293,718.8c-.8-5,.55-4.71,1.57-5.66.61-.56.61-.79,1.36-1.1.19,3.62.67,3.9-1.59,5.75a14.89,14.89,0,0,0-1.34,1ZM273.35,729l.06,4.78a19.26,19.26,0,0,1-3.06-2.34l0-4.67c.87.38.75.51,1.42,1.14a6.82,6.82,0,0,0,1.56,1.09Zm0,30.09.05,4.81a11.17,11.17,0,0,1-2.9-2.43c-.36-.77-.17-3.7-.08-4.71.47.53.9.69,1.48,1.28a3.36,3.36,0,0,0,1.45,1Zm22.56-18.64a14.4,14.4,0,0,0-1.51,1.31c-.47.46-1.11.82-1.46,1.12-.13-.94-.25-4,.12-4.72a15.59,15.59,0,0,1,2.85-2.32v4.61Zm-22.54,17.16c-1.39-.69-1.25-1.19-3-2.33v-4.68c3.69,2.43,3.15,2.33,3,7Zm19.5-44.85c0-1.12-.3-3.86.19-4.64a16.17,16.17,0,0,1,2.86-2.37c0,1.17.3,3.85-.21,4.67a13.48,13.48,0,0,1-2.84,2.34Zm-19.66-9.07a8.09,8.09,0,0,1-1.41-1.18c-.47-.46-.92-.74-1.43-1.16v-4.78a5.84,5.84,0,0,1,1.44,1.08c.7.71.93.77,1.55,1.37A13,13,0,0,1,273.22,703.73Zm22.71,55A12.51,12.51,0,0,0,294.4,760a6.54,6.54,0,0,1-1.46,1.15c-.45-4.25-.42-5,3-7.08ZM273.4,727.54a12.67,12.67,0,0,1-2.71-2.15c-.76-.93-.31-3.47-.35-4.83C274.46,722.93,273.35,724,273.4,727.54ZM292.88,731c.06-2.59-1.13-5,3.06-7,0,1.21.3,3.78-.23,4.68a13.85,13.85,0,0,1-2.83,2.32Zm-6.16,35.56h-7.56l.07-2.26c2.22,1.62,2,2.49,5.17-.7a20,20,0,0,1,2.72-2.16c0,1.86.3,4.28-.41,5.12Zm-8-40.68L276,723.6c-2.54-2-2.31-1.37-2.22-5.87l3.6,2.89c1.29,1.24,1.33.89,1.43,1.9a20.56,20.56,0,0,1-.09,3.33Zm0,30.1c-1.08-.57-4.2-3.55-5-4l0-4.09a13,13,0,0,1,1.59,1.14C279,752.11,278.91,751.31,278.78,756Zm8.67-44.87,0-4,5-4.13c.59,5.28-.68,4.3-2.94,6.57a9.21,9.21,0,0,1-2.08,1.54Zm5.06,26c-1.13.81-4.1,3.61-5,4-.15-3.25-.45-3.74,1.35-5.18a15.32,15.32,0,0,0,1.81-1.48,8.59,8.59,0,0,1,1.87-1.42v4Zm-17.12-37.86-1.6-1.3,0-2.9h2.48c3,3.48,2.53-.16,2.57,6.89l-3.43-2.68Zm3.43,67.29h-2.66a11.84,11.84,0,0,0-1.29-1.25c-.78-.56-1-.38-1.11-1.39v-4.16l2.63,2a11.87,11.87,0,0,0,2.44,2v2.84Zm-.06-50.79,0,4.46c-1-.52-4.36-3.64-5-4v-4.4C274.63,712.19,277.56,715.1,278.76,715.74Zm13.74,35.19c.13,4.38.36,3.85-1.16,5.34l-3.87,3.05.06-4.47,3.83-3c.51-.48.47-.67,1.14-.91Zm-13.69-.63c-.71-.3-4-3.27-5.05-4l.06-4.39,4.24,3.5c1.16,1.09.75,1.86.74,4.93Zm0-6c-1.07-.54-3.86-3.31-5-4l0-4.39c.86.47,1.46,1.22,2.77,2.19.6.45.81.8,1.38,1.24.75.59.87.35.87,1.6l0,3.39Zm8.67-21.05c.09-5.82-.57-3.4,3.07-6.89a14.69,14.69,0,0,1,2-1.5c-.09,4.07.56,4.09-1.13,5.26l-3.26,2.69c-.64.48.14,0-.68.44Zm-8.67-13.52,0,4.47-3.81-3a2.36,2.36,0,0,1-1.21-2c0-1.09,0-2.31,0-3.42.74.31.59.46,1.21,1l3.82,3Zm8.67,19.48v-4.5a9.92,9.92,0,0,0,2.49-1.91,28.13,28.13,0,0,1,2.57-2c0,3,.5,4.09-1.08,5.28a50.18,50.18,0,0,1-4,3.12ZM292.51,745c0,3,.5,4-1.17,5.38a39.11,39.11,0,0,1-3.88,3l0-4.5c1.37-.72,4.33-3.68,5-3.9Zm-13.7-8.69,0,2.08-4.39-3.55c-.88-.86-.63-.55-.63-2.55v-2.62a35.82,35.82,0,0,1,3.18,2.59c1.83,1.33,1.89,1.15,1.86,4Zm13.71-4.86-5,4.07v-4.79a10.59,10.59,0,0,0,2.47-2l2.56-2v4.63Zm0,7.29c.11,1.08,0,2.2.06,3.29,0,1.71,0,1.51-1.11,2.29a47.69,47.69,0,0,1-4,3.12l.06-4.58,5-4.12Zm0,18.16c.21,2.69.43,4.53-1,5.63a43.34,43.34,0,0,1-4,3.12l0-4.6,5-4.15Zm-13.71-29.52,0,4.76c-.9-.37-.59-.42-1.31-1l-3.75-3,0-4.68c.87.38,3.74,3.28,5,4Zm.06,34.86c-1.67-1.09-2.56-2.12-4.07-3.2-1.05-.76-1-.82-1-2.42,0-1,0-2.09.05-3.12,1.06.67,1.49,1.3,2.47,2a25.88,25.88,0,0,1,2.53,2.15l0,4.57Zm8.63-44.89,0-4.78c1.41-.69,4.17-3.59,5-3.92.14,4,.43,4.45-1,5.47l-2.87,2.39c-.74.69-.36.53-1.14.84Zm5.06-16c-1.11.76-4,3.56-5,4,0-5.94-.43-4.14,1.23-5.71a9.18,9.18,0,0,1,1.28-1.13,8.37,8.37,0,0,0,1.24-1c.65-.64.48-.67,1.25-1l0,4.78Zm-17.95-1.45,4.24,3.5v4.9c-1.91-1.22-2.09-1.72-3.95-3.11-2.05-1.53-.68-3.13-1.24-5.74.75.31.08,0,.53.26.06,0,.2.27.28.13s.08,0,.13.06Zm12.5,19.52,0,4.39a13.12,13.12,0,0,0-2,1.66L282,723.09c-3.75-3.44-2.69-1.14-2.85-6.78l2.85,2.33c.56.52,2.56,2.21,3.07,2.17S286.44,719.77,287.07,719.42Zm-5.51,33.27a11.78,11.78,0,0,1-1.69-1.39c-1-.95-.7-.62-.7-2.32V746.4c.86.36,4.54,3.94,5.69,4.54a8.28,8.28,0,0,0,2.21-1.44l.05,4.4-2.37,1.68-3.19-2.89Zm5.56-21.36c-.07,2.92.52,4-.67,5.17l-5,4.14-2.28-1.72,0-4.72c2.69,1.45.88,2.86,5.09-.56a18.23,18.23,0,0,1,2.82-2.31Zm-5.66-20.78-2.29-1.71V704c3.13,2.1,1.87,1.89,3.76.47s2.07-1.82,4.18-3.34c-.08,4.13.59,4.52-1.4,5.93-.84.59-1.2,1.13-2,1.72a8.41,8.41,0,0,0-1.12.87C281.93,710.28,282.26,710.15,281.46,710.55ZM279.16,695H283a4.51,4.51,0,0,0,2.1,1.56l2-1.47c0,5.25.45,4.16-1.43,5.54-1.12.82-3.36,3.25-4.53,3.52a5.57,5.57,0,0,0-2-1.73l0-4.75s.12,0,.15.1l1.26,1c.5.39.8.83,1.72.58.13-.85-1-1.59-1.55-2-.88-.63-1.57-.78-1.58-2.36Zm7.95,16.55a33.31,33.31,0,0,0-2.6,2.17c-1,1-.24,1.62,1.19.47.48-.39.83-.67,1.41-1.07,0,4.84.61,4.32-2,6.35l-5.92-4.72,0-4.43c2.17,1.81,2.24,2.26,5.1-.63l2.81-2.23v4.09Zm0,36.35a7.48,7.48,0,0,0-1.94,1.67c-1.12-.35-.55-.45-2.32-1.72-.81-.58-1.18-1.13-2-1.72-2.41-1.71-1.61-2.28-1.68-5.73.88.46,1.07,1.1,2.3,1.57,1.51-.73,4.65-3.94,5.62-4.43.19,5.14.17,3.88-2,5.68-.4.34-2,2.09-.15,1.59,1-.27,1.26-1.24,2.17-1.61v4.7ZM282.3,759.7c.11-.94-1.35-1.86-2-2.28-1.64-1.17-1.2-1.89-1.15-5.06,1.16.56,4.42,4.08,5.94,4.58l2-1.48c-.1,5.09.39,4.18-1.54,5.6l-4.11,3.41c-1-.41-.59-.7-2.29-1.71V758c1.15.47,1.65,2.09,3.14,1.69Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_26);"></path>
                                        </g>
                                        <path d="M292.4,694.12c-7.31-2.24-10.55,0-15.83,0a4.35,4.35,0,0,0-4.44,4.22v63.78a4.34,4.34,0,0,0,4.44,4.21c5.28,0,11.48,2.84,15.83,0,6.68-4.36,4.2-70.92,0-72.21Z" transform="translate(2.61 0)" style="fill:none;"></path>
                                        <polygon points="63.29 75.72 31.99 30.72 23.57 60.54 28.25 111.18 63.29 75.72" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_27);"></polygon>
                                        <polygon points="259.83 69.74 291.13 24.74 299.54 54.56 294.87 105.2 259.83 69.74" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_28);"></polygon>
                                        <path d="M24.05,83.21l.73-.23a.66.66,0,0,1,.58.09.61.61,0,0,1,.27.51v9.67a.59.59,0,0,1-.27.51.66.66,0,0,1-.58.09l-.73-.23a.62.62,0,0,1-.46-.6V83.81a.63.63,0,0,1,.46-.6Z" transform="translate(2.61 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <path d="M293.2,83.16l-.73-.22a.61.61,0,0,0-.58.09.59.59,0,0,0-.27.51V93.2a.59.59,0,0,0,.27.51.66.66,0,0,0,.58.09l.73-.22a.63.63,0,0,0,.45-.6V83.76a.63.63,0,0,0-.45-.6Z" transform="translate(2.61 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <path d="M24.62,92.26l-.06-7.64a.59.59,0,0,0-.21-.47.68.68,0,0,0-.51-.16l-.86.1a.61.61,0,0,0-.45.25l-1.16,1.49a.49.49,0,0,0-.13.35L21,91.1a.62.62,0,0,0,.28.55l1.39.93a.6.6,0,0,0,.23.1l.94.2a.64.64,0,0,0,.55-.13.59.59,0,0,0,.24-.49Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_29);"></path>
                                        <path d="M292.62,92.21l.06-7.64a.62.62,0,0,1,.22-.47.67.67,0,0,1,.51-.15l.86.09a.61.61,0,0,1,.45.25l1.16,1.49a.65.65,0,0,1,.13.35l.25,4.92a.6.6,0,0,1-.28.55l-1.39.93a.67.67,0,0,1-.23.1l-.94.2a.64.64,0,0,1-.55-.12.59.59,0,0,1-.24-.5Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_30);"></path>
                                        <path d="M159.62,1.64c34,.92,70.78,1.36,104.49,9.08,13.14,3.86,23.32,7.7,24.32,14.12l1.1,4.81,1.16,24.41-1,3.42L288.05,82l3.62,21.84V811.72l-7.16,29.09c-2.34,9.49-17.28.16-27.31.16-76.75,0-131,1.61-207.72,1.61-5.42.21-15.16,3.16-17-3.79l-6.82-27.08,0-703.72,4.74-26.35L28.55,55.45l-.25-.89,1.08-23.84,1.26-5.67C39,.87,135.06,2.79,159.62,1.64Z" transform="translate(2.61 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <path d="M30.64,25.06C33.15,15.6,49.19,10.72,68.69,7L94,4.11c26.24-3,104.58-3,130.82,0,8.45,1,16.9,2.57,25.35,3.53,19.5,3.72,35.54,8,38,17.42-4.58-9.7-24.17-11-48.74-11.81-26.78-.88-59.34-.8-81.64-.8-21.15,0-49,0-74,.76C58,14,35.31,15.53,30.64,25.06Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_31);"></path>
                                        <g style="mask:url(#mask);">
                                        <path d="M141,107.09H270.8a11.88,11.88,0,0,0,11.85-11.85V61.86A11.89,11.89,0,0,0,270.8,50H141a11.9,11.9,0,0,0-11.86,11.86V95.24A11.89,11.89,0,0,0,141,107.09Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_32);"></path>
                                        </g>
                                        <path d="M17.33.36a8.45,8.45,0,0,0-4.22.55c-.35.14-.34.65-.34,1.33l3.49,32,12.82,63,2.37-13.18L30.54,71C27.76,51.8,20.11,19.52,17.33.36Z" transform="translate(2.61 0)" style="stroke:#2b2a29;stroke-miterlimit:2.7651905068030374;stroke-width:0.5668944247978516px;fill-rule:evenodd;fill:url(#Безымянный_градиент_33);"></path>
                                        <path d="M300.56.73a8.61,8.61,0,0,1,4.23.54c.34.15.34.66.34,1.34l-3.5,32-12.82,63-2.37-13.17.91-13.09c2.78-19.17,10.43-51.45,13.21-70.61Z" transform="translate(2.61 0)" style="stroke:#2b2a29;stroke-miterlimit:2.7651905068030374;stroke-width:0.5668944247978516px;fill-rule:evenodd;fill:url(#Безымянный_градиент_34);"></path>
                                        <polygon points="2.97 9.05 30.13 3.25 30.82 5.58 3.66 11.38 2.97 9.05" style="fill:#2b2a29;stroke:#2b2a29;stroke-miterlimit:22.925600051879883;stroke-width:4.699999809265137px;fill-rule:evenodd;"></polygon>
                                        <polygon points="319.44 9.41 292.97 3.61 292.3 5.95 318.77 11.75 319.44 9.41" style="fill:#2b2a29;stroke:#2b2a29;stroke-miterlimit:22.925600051879883;stroke-width:4.699999809265137px;fill-rule:evenodd;"></polygon>
                                        <rect x="8.09" y="4.02" width="15.45" height="3.57" transform="translate(1.68 4.02) rotate(-14.09)" style="fill:#2b2a29;stroke:#2b2a29;stroke-miterlimit:1.4308759843107122;stroke-width:0.2933452925168237px;"></rect>
                                        <rect x="300.29" y="-1.55" width="3.57" height="15.45" transform="translate(225.16 297.66) rotate(-75.91)" style="fill:#2b2a29;stroke:#2b2a29;stroke-miterlimit:1.4308759843107122;stroke-width:0.2933452925168237px;"></rect>
                                        <path d="M183,28.64c-15.33-2.77-31.1-2.44-47.25,0l-3.23,4.62a111.51,111.51,0,0,1,54.4,0C185.65,31.82,184.35,30.11,183,28.64Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_35);"></path>
                                        <path d="M136.94,32.28a111.25,111.25,0,0,1,45.79.06v-3a341.31,341.31,0,0,0-45.79,0v3Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_36);"></path>
                                        <path d="M129.65,51.24h4.47c1.8,0,3.27,1.83,3.27,4.09V100c0,2.25-1.47,4.08-3.27,4.08h-4.47c-1.81,0-3.27-1.83-3.27-4.08V55.33C126.38,53.07,127.84,51.24,129.65,51.24Z" transform="translate(2.61 0)" style="stroke:#211f1f;stroke-miterlimit:2.7651905068030374;stroke-width:0.5668944247978516px;fill-rule:evenodd;fill:url(#Безымянный_градиент_37);"></path>
                                        <path d="M134.6,65.43a3.49,3.49,0,0,1,1.8,3,4.18,4.18,0,0,1-8.27,0,3.5,3.5,0,0,1,1.81-3,.86.86,0,0,0,.46-.75V62.6a.85.85,0,0,0-.43-.73,3.24,3.24,0,0,1-1.58-2.71,3.92,3.92,0,0,1,7.76,0,3.24,3.24,0,0,1-1.58,2.71.85.85,0,0,0-.43.73v2.08a.85.85,0,0,0,.46.75Z" transform="translate(2.61 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                        <path d="M132,72a3.9,3.9,0,0,1-3.84-3.33,3.08,3.08,0,0,1,1.56-2.34.75.75,0,0,0,.39-.65v-.34a.82.82,0,0,0,.31-.64V62.6a.85.85,0,0,0-.43-.73A3.4,3.4,0,0,1,128.51,60a3.34,3.34,0,0,1,3.2-2,3.16,3.16,0,0,1,3.36,2.92,2.61,2.61,0,0,1-.09.69,3.91,3.91,0,0,1-.41.3.85.85,0,0,0-.43.73v.3a3,3,0,0,1-.44.33.74.74,0,0,0-.37.64v1.79a.76.76,0,0,0,.4.66,3,3,0,0,1,1.56,2.56A3.33,3.33,0,0,1,132,72Z" transform="translate(2.61 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <path d="M127.6,79.08h9a1.11,1.11,0,0,1,1.17,1l.27,25.64a.89.89,0,0,1-.34.73,1.22,1.22,0,0,1-.83.31h-9.57a1.24,1.24,0,0,1-.84-.31.92.92,0,0,1-.34-.73l.27-25.64a1.13,1.13,0,0,1,1.18-1Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_38);"></path>
                                        <g style="mask:url(#mask-2);">
                                        <polygon points="140.54 106.71 128.6 106.71 129.66 101.91 139 101.91 140.54 106.71" style="fill-rule:evenodd;"></polygon>
                                        </g>
                                        <g style="mask:url(#mask-3);">
                                        <polygon points="128.6 106.71 128.89 79.02 129.66 101.91 128.6 106.71" style="fill-rule:evenodd;"></polygon>
                                        </g>
                                        <g style="mask:url(#mask-4);">
                                        <polygon points="139 101.91 140.25 79.02 140.54 106.71 139 101.91" style="fill-rule:evenodd;"></polygon>
                                        </g>
                                        <path d="M128.22,73.07h7.71a.89.89,0,0,1,.68.29.66.66,0,0,1,.18.64l-.07.29a.86.86,0,0,1-.87.61h-7.56a.86.86,0,0,1-.86-.61l-.07-.29a.66.66,0,0,1,.17-.64.91.91,0,0,1,.69-.29Z" transform="translate(2.61 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                        <path d="M128.38,76H136a.89.89,0,0,1,.69.28.68.68,0,0,1,.18.64l-.07.29a.86.86,0,0,1-.87.61h-7.48a.87.87,0,0,1-.87-.61l-.07-.29a.7.7,0,0,1,.18-.64.9.9,0,0,1,.69-.28Z" transform="translate(2.61 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                        <path d="M128.09,73.34h6.56a.78.78,0,0,1,.58.25.55.55,0,0,1,.15.54l-.06.25a.72.72,0,0,1-.73.52h-6.44a.75.75,0,0,1-.74-.52l0-.25a.55.55,0,0,1,.15-.54.76.76,0,0,1,.58-.25Z" transform="translate(2.61 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <path d="M128.29,76.24h6.55a.78.78,0,0,1,.59.25.57.57,0,0,1,.15.54l-.06.25a.74.74,0,0,1-.74.52h-6.43a.74.74,0,0,1-.74-.52l-.06-.25a.55.55,0,0,1,.15-.54A.78.78,0,0,1,128.29,76.24Z" transform="translate(2.61 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <path d="M128.09,73.34h6.56a.78.78,0,0,1,.58.25.55.55,0,0,1,.15.54l-.06.25a.72.72,0,0,1-.73.52h-6.44a.75.75,0,0,1-.74-.52l0-.25a.55.55,0,0,1,.15-.54.76.76,0,0,1,.58-.25Z" transform="translate(2.61 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#mask-5);">
                                        <path d="M40.66,97.45h83.75a1,1,0,0,1,1,1v25a1,1,0,0,1-1,1H40.66a1,1,0,0,1-.95-1v-25A1,1,0,0,1,40.66,97.45Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_39);"></path>
                                        </g>
                                        <rect x="42.32" y="121.31" width="85.65" height="3.26" style="fill:url(#Безымянный_градиент_40);"></rect>
                                        <g style="mask:url(#mask-6);">
                                        <path d="M35.86,69.85l-.93-13.76-.21.41c.21-5.92.87-11.51,1-18.17.47-16.51,22.06-17.23,44.79-17.44,26.48-.24,52.77-.82,79.31-.82,28.09,0,55.88.46,83.93.87,21.11.31,40.14,1.9,40.58,17.4.12,6.12.69,11.34.94,16.75l-2.23,15C276,41.91,43.15,45.05,35.86,69.85Z" transform="translate(2.61 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                        </g>
                                        <polygon points="242.66 3.44 248.16 3.44 246.89 13.01 242.66 13.01 242.66 3.44" style="fill:#2b2a29;fill-rule:evenodd;"></polygon>
                                        <path d="M71.47,6.67c31.15-4.08,58.55-5.08,86.88-5,20.73,0,43,.79,65.76,2.53,6.88.53,13.63,2,20.64,2.5V9.22l-86.41-.58-86.87.58V6.67Z" transform="translate(2.61 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#mask-7);">
                                        <path d="M102.29,4.59c3.81,1,8.25,2.07,12.06,3.11H126.7c8-.6,12.13-.56,20.11-1.16H167c6.71.68,12.79.72,19.51,1.4h11C201.82,7,206.71,6,211,5.07c-18.79-.75-35.15-1.9-52.74-2C140.4,3,121.35,4,102.29,4.59Z" transform="translate(2.61 0)" style="fill:#fff;fill-rule:evenodd;"></path>
                                        </g>
                                        <polygon points="111.79 8.31 160.33 7.67 204.52 8.31 200.15 9.86 160.4 9.23 116.35 9.86 111.79 8.31" style="fill:#2b2a29;fill-rule:evenodd;"></polygon>
                                        <polygon points="118.69 8.77 197.96 8.77 199.23 13.15 117.42 13.15 118.69 8.77" style="fill:#2b2a29;fill-rule:evenodd;"></polygon>
                                        <polygon points="215.24 19.62 215.44 16.95 205.45 14.26 205.04 16.76 215.24 19.62" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_41);"></polygon>
                                        <polygon points="205.04 16.76 205.45 14.26 161.52 12.62 161.35 13.95 205.04 16.76" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_42);"></polygon>
                                        <ellipse cx="213.79" cy="17.84" rx="0.88" ry="0.85" style="fill:#575757;"></ellipse>
                                        <polygon points="194.34 19.61 193.41 17.54 130.16 12.05 130.46 14.31 194.34 19.61" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <polygon points="151.56 7.94 167.66 7.94 168.93 12.45 150.93 12.45 151.56 7.94" style="fill:#2b2a29;stroke:#2b2a29;stroke-miterlimit:2.7651905068030374;stroke-width:0.5668944247978516px;fill-rule:evenodd;"></polygon>
                                        <polygon points="153.16 8.76 166.66 8.76 167.3 10.97 152.52 10.97 153.16 8.76" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_43);"></polygon>
                                        <polygon points="158.56 18.72 155.96 18.56 155.85 21.56 159 21.73 158.56 18.72" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <polygon points="115.68 18.65 115.53 16.12 159.41 18.77 159.44 20.11 115.68 18.65" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_44);"></polygon>
                                        <polygon points="162.37 12.65 164.98 12.75 164.76 15.74 161.61 15.61 162.37 12.65" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <polygon points="126.03 22.53 127.17 20.56 190.66 21.26 190.13 23.48 126.03 22.53" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <g style="mask:url(#mask-8);">
                                        <path d="M79.85,673.3H237a39.45,39.45,0,0,1,39.33,39.33v68.65A39.44,39.44,0,0,1,237,820.6H79.85a39.44,39.44,0,0,1-39.33-39.32V712.63A39.45,39.45,0,0,1,79.85,673.3Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_45);"></path>
                                        </g>
                                        <path d="M287.71,98.77l2.15-5.86,2.4,12.29q-.3,353.25-.59,706.51L284,844.65c-1.3,5.29-246.66,11.27-251.46-3.65-2.51-9.76-4.39-19.52-6.9-29.28V108l2.57-14.33,1.39,5.11V773c0,32.52-4.48,54,35.63,54H245.76c44.71,0,41.95-16,41.95-54.23V98.77Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_46);"></path>
                                        <path d="M73.91,838.39c16.39,3.56,49.57,4.13,82.62,4.19,34.26.07,68.41-.49,85.42-4.19,1-.22,1.34-.5.89-.78-1.08-.7-1.79-1.11-2.85-1.74a7,7,0,0,0-2.71-.53,25.35,25.35,0,0,0-3.81.1c-30.11,2.51-117.82,2.57-151.2,0a25.32,25.32,0,0,0-3.8-.11,7.18,7.18,0,0,0-2.73.52c-1,.62-1.82,1.14-2.75,1.77-.41.28-.08.56.92.78Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_47);"></path>
                                        <g style="mask:url(#mask-9);">
                                        <path d="M85.86,842.77c.58.85,2.07,1.47,5.52,1.61,29.1,2.75,103.76,2.75,132.85,0,3.46-.14,5-.76,5.53-1.61-24.54,1.53-47.59,2.08-70.74,2.1-23.88,0-47.85-.53-73.16-2.1Z" transform="translate(2.61 0)" style="fill:#a96100;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#mask-10);">
                                        <path d="M287,825.77c-.55,3.48-.74,7.1-7.4,8.29-6.48,1.64-14.09,2.4-21.71,3.15-4.26.31-8.51.64-12.79.93-6.87.45.65-.48,6.91-1.48,6.11-1,11.93-2.11,17.39-3.46,8.82-1.73,14.91-6.45,17.6-7.43Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_48);"></path>
                                        </g>
                                        <path d="M269.41,833.2c-7.65,1.94-17.46,3.41-25.64,4.72-.89.14-1.87.29-1,.33,10-1,21.78-2.67,33-4.77,4-.75,5.19-1.07,6.86-2.44a15.59,15.59,0,0,0,4.39-5.27c-1.9.62-7.9,5.33-17.6,7.43Z" transform="translate(2.61 0)" style="fill:#c82c2c;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#mask-11);">
                                        <path d="M269.4,833.22c-7.65,1.95-17.46,3.42-25.64,4.73-.89.14-1.87.29-1,.33,10-1,21.78-2.67,33-4.78l.21,0-6-.39-.51.14Z" transform="translate(2.61 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#mask-11);">
                                        <path d="M269.4,833.22c-7.65,1.95-17.46,3.42-25.64,4.73-.89.14-1.87.29-1,.33,10-1,21.78-2.67,33-4.78l.21,0-6-.39-.51.14Z" transform="translate(2.61 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#mask-13);">
                                        <path d="M283.52,823.51c4.42-14.53,3.74-27.73,8.16-42.26-.48,3.87-4.55,44.6-4.77,44.71-3.36,1.67-8.23,4.47-13.85,6.27-6.1,2-15.74,3.58-23.34,4.85-4.19.52.35-.44,2.68-1,14.72-3.7,29.31-7.9,31.12-12.54Z" transform="translate(2.61 0)" style="fill:#ca7a00;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#mask-14);">
                                        <path d="M30.31,826.23c.55,3.49.73,7.11,7.39,8.29,6.49,1.64,14.1,2.4,21.72,3.15,4.26.31,8.5.65,12.78.93,6.88.45-.65-.48-6.9-1.48S53.36,835,47.91,833.66c-8.82-1.73-14.92-6.45-17.6-7.43Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_49);"></path>
                                        </g>
                                        <path d="M47.91,833.66c7.65,1.94,17.46,3.41,25.63,4.72.9.15,1.88.29,1,.33-10-1-21.78-2.67-33-4.77-4-.75-5.19-1.07-6.85-2.44a15.48,15.48,0,0,1-4.39-5.27c1.89.62,7.89,5.33,17.6,7.43Z" transform="translate(2.61 0)" style="fill:#c82c2c;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#mask-15);">
                                        <path d="M47.91,833.69c7.65,1.94,17.46,3.41,25.64,4.72.89.14,1.88.29,1,.33-10-1-21.77-2.67-33-4.77l-.21,0,6-.39.51.15Z" transform="translate(2.61 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#mask-15);">
                                        <path d="M47.91,833.69c7.65,1.94,17.46,3.41,25.64,4.72.89.14,1.88.29,1,.33-10-1-21.77-2.67-33-4.77l-.21,0,6-.39.51.15Z" transform="translate(2.61 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#mask-17);">
                                        <path d="M33.79,824c-4.42-14.53-3.74-27.73-8.15-42.26.47,3.87,4.55,44.6,4.77,44.71,3.35,1.67,8.22,4.47,13.85,6.27,6.1,2,15.74,3.58,23.34,4.85,4.18.52-.36-.44-2.69-1-14.72-3.7-29.31-7.9-31.12-12.54Z" transform="translate(2.61 0)" style="fill:#ca7a00;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#mask-18);">
                                        <path d="M56.26,562.44h204A11.58,11.58,0,0,1,271.81,574v20.16a11.58,11.58,0,0,1-11.55,11.54h-204a11.57,11.57,0,0,1-11.54-11.54V574a11.57,11.57,0,0,1,11.54-11.54Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_50);"></path>
                                        </g>
                                        <rect x="201.21" y="117.02" width="83.01" height="69.18" style="fill:#100f0e;stroke:#2b2a29;stroke-miterlimit:2.7651905068030374;stroke-width:0.5668944247978516px;"></rect>
                                        <rect x="203.75" y="126.15" width="16.39" height="60.04" style="fill:#2b2a29;"></rect>
                                        <rect x="231.67" y="126.15" width="16.39" height="60.04" style="fill:#2b2a29;"></rect>
                                        <rect x="258.32" y="126.15" width="16.39" height="60.04" style="fill:#2b2a29;"></rect>
                                        <path d="M107.39,85.68h2.17a.49.49,0,0,1,.52.46v3.19a.49.49,0,0,1-.52.45h-2.17a.49.49,0,0,1-.52-.45V86.14A.49.49,0,0,1,107.39,85.68Z" transform="translate(2.61 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        <path d="M71.11,93.3a6.22,6.22,0,0,1,3,.47c-3.87-6.92-5-16.49-4.24-27.87.48-4.39,3.41-6.37,7.48-7.3,5-1.14,15.29-1.14,20.25,0,4.06.93,7,2.91,7.48,7.3.75,11.38-.37,20.95-4.24,27.87a6.22,6.22,0,0,1,3-.47c1.76.26,1.85,1,1.79,2.23-.27,6.76-.62,13.44-2.21,17.93-1.19,3.37-2.16,4.26-5.45,5.3-5.23,1.66-15.78,1.66-21,0-3.29-1-4.25-1.93-5.45-5.3-1.59-4.49-1.93-11.17-2.21-17.93,0-1.25,0-2,1.8-2.23Z" transform="translate(2.61 0)" style="fill:#0f0f0f;fill-rule:evenodd;"></path>
                                        <path d="M77.78,92.61a114.49,114.49,0,0,0,19.42.09c.15.46.31,1,.48,1.42s.41.94.92.92c1.52,0,5-1.75,5.14-1.74s.25.07.25.22c-.62,5.83.26,12.76-4.15,16.4a9.82,9.82,0,0,1-2.61,1.31c-.16-.62-.26-2.54-2.28-2.76a81.29,81.29,0,0,0-13.87,0c-2.19.22-2.11,1.75-2.39,2.8a10.57,10.57,0,0,1-3-1.35c-4.39-3.72-4-10.35-4.67-16.32,0-.16.2-.18.39-.21s2.74,1.27,4.33,1.66,1.51-1.33,2-2.42Zm-2.32,4.06c-.27.63-.12,5.61-.12,6.93,0,1.72-.27,3.33,1.38,4.19a3.17,3.17,0,0,0,2.1.19,60.41,60.41,0,0,1,17.71,0,1.38,1.38,0,0,0,1.33-.19c1.53-.87,1.52-2.47,1.52-4.2,0-1.06-.07-6.67-.23-6.93C97.44,94,84.82,93.36,78.69,94.8,76.94,95.2,75.77,96,75.46,96.67Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_51);"></path>
                                        <path d="M73.35,90.4c-2.36-5.49-3.25-12.31-3-20.16a24,24,0,0,1,.43-5.09,6.76,6.76,0,0,1,3.42-4.48.74.74,0,0,1,1.07.37L77.67,67a.76.76,0,0,1-.18.84,2.17,2.17,0,0,0-.69,1.59v8.3A2.45,2.45,0,0,0,78.52,80a2.46,2.46,0,0,0-1.66,2.3v8.25a2.16,2.16,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.57,1.6a.76.76,0,0,1-1.33.19,19,19,0,0,1-2.48-4.3Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_52);"></path>
                                        <path d="M101.62,90.4c2.37-5.49,3.25-12.31,3-20.16a23.34,23.34,0,0,0-.43-5.09,6.78,6.78,0,0,0-3.41-4.48.75.75,0,0,0-1.08.37L97.3,67a.76.76,0,0,0,.18.84,2.13,2.13,0,0,1,.69,1.59v8.3A2.45,2.45,0,0,1,96.46,80a2.46,2.46,0,0,1,1.65,2.3v8.25a2.16,2.16,0,0,1-.68,1.58.75.75,0,0,0-.19.8l.58,1.6a.76.76,0,0,0,1.33.19,19,19,0,0,0,2.47-4.3Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_53);"></path>
                                        <path d="M79.79,67.65a84.14,84.14,0,0,1,15.55,0,2.16,2.16,0,0,1,2,2.14v7.73a2.09,2.09,0,0,1-2,2.14H79.79a2.09,2.09,0,0,1-2-2.14V69.79A2.15,2.15,0,0,1,79.79,67.65Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_54);"></path>
                                        <path d="M79.73,92.24a85,85,0,0,0,15.55,0,2.15,2.15,0,0,0,2-2.14V82.42a2.08,2.08,0,0,0-2-2.14H79.73a2.09,2.09,0,0,0-2,2.14V90.1A2.16,2.16,0,0,0,79.73,92.24Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_55);"></path>
                                        <path d="M98.41,97.64c.06,2.1,0,5.31,0,7.42a2.07,2.07,0,0,1-2.11,2.2,61.92,61.92,0,0,0-17.88,0,2.07,2.07,0,0,1-2.11-2.2c0-2.11,0-5.32,0-7.42-.08-4,22-3.16,22.1,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_56);"></path>
                                        <path d="M82.08,109.27H94a2.79,2.79,0,0,1,2.51,2.79v3.42A2.49,2.49,0,0,1,94,117.93H82.08a2.49,2.49,0,0,1-2.51-2.45v-3.42A2.79,2.79,0,0,1,82.08,109.27Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_57);"></path>
                                        <path d="M95.76,67a.73.73,0,0,0,.75-.44c.67-1.45,1.33-2.91,2-4.36.36-.78,1.07-1.89,0-2.37-3.45-1.5-18.18-1.5-21.62,0-1.11.48-.39,1.59,0,2.37l2,4.36a.75.75,0,0,0,.76.44,87.56,87.56,0,0,1,16.19,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_58);"></path>
                                        <path d="M72.57,115.46c-3.14-6.11-2.89-13.69-3.25-19.7-.11-1.83.19-2.19,1.85-2.47.88,6.9,0,15.78,7.52,18-.36,5-.21,7.57,3.06,7.57,2,.05,3.47,0,5.09,0v0c2.89-.09,4.75.14,7.65,0s3.08-2.62,2.75-7.57c6.79-2.18,6-11,6.78-17.9,1.49.27,1.73.77,1.64,2.43-.32,6-.06,13.57-2.89,19.68a4.94,4.94,0,0,1-3,2.84c-3.18,1.56-6.55,1.67-9.9,1.65h0c-4.67,0-9.49.35-14-1.64-1.71-.76-2.44-1.13-3.32-2.83Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_59);"></path>
                                        <path d="M88.37,212.54c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.32-.35H107c3.5,0,7,.14,9.31.35,6,.54,9.24,2.69,9.24,10.52.07.78.76,18.21.76,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.44-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M98.64,229.4a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.23-2.52V212.11c0-1.9-1-2.06-2.23-2.06H98.64c-1.22,0-2.22.16-2.22,2.06v14.77a2.19,2.19,0,0,0,2.22,2.52Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_60);"></path>
                                        <path d="M96.65,230.54a159.5,159.5,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.78s-.35,12.64-3.82,13.88c-.78.28-2.22.59-3.16.91-.25-1.14-.4-2.64-2.53-2.82a109.08,109.08,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,18,18,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.31,2.45-2.2Zm-2.28,3.36c-.29.52-.12,4.63-.12,5.72,0,1.42-.29,2.74,1.45,3.46a4.23,4.23,0,0,0,2.21.15,81.66,81.66,0,0,1,18.62,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55.08,55.08,0,0,0-.24-5.72c-1.8-2.21-15.07-2.75-21.52-1.57-1.83.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_61);"></path>
                                        <path d="M118.45,235.05c0,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.14,87.14,0,0,0-18.55,0,1.92,1.92,0,0,1-2.2-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_62);"></path>
                                        <path d="M120.54,230.38c2.44-4.35,3.42-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.5.5,0,0,0-.46-.05.64.64,0,0,0-.34.33L118,209.38a.54.54,0,0,0,.13.64A4.17,4.17,0,0,1,119,212c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.58.58,0,0,0-.14.62l.43,1.24a.58.58,0,0,0,.45.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_63);"></path>
                                        <path d="M93.65,230.38c-2.44-4.35-3.42-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.34,5.34,0,0,1,2-1.94.5.5,0,0,1,.46-.05.64.64,0,0,1,.34.33l2.13,3.88A.53.53,0,0,1,96,210,4.26,4.26,0,0,0,95.2,212c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.58.58,0,0,1,.14.62l-.43,1.24a.58.58,0,0,1-.45.39.54.54,0,0,1-.54-.24l-.8-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_64);"></path>
                                        <path d="M95.66,205.59c.61,1.08,1.22,2.16,1.82,3.24a.79.79,0,0,0,.78.35c2.94-.2,5.88-.31,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35c.61-1.08,1.22-2.16,1.82-3.24s1.28-1.48-.35-1.94c-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.87,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_65);"></path>
                                        <path d="M90.46,245.22c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.23.07,6.37-.17,12.33-.14h.06v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28A7.15,7.15,0,0,1,90.46,245.22Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_66);"></path>
                                        <path d="M123.54,245.12c1.88-3,2.31-7.79,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.22.07-6.37-.17-12.32-.14h-.07v6.18h7.22a20.16,20.16,0,0,0,6.19-1.28,7.12,7.12,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_67);"></path>
                                        <path d="M49.59,212.54c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.31-.35h.13c3.5,0,7,.14,9.31.35,6,.54,9.23,2.69,9.23,10.52.08.78.77,18.21.76,18.25-.1,2-.24,3.9-.47,5.75-1.25,10.34-3.58,12.85-16,13H65.33c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M59.86,229.4a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.23-2.52V212.11c0-1.9-1-2.06-2.23-2.06H59.86c-1.22,0-2.22.16-2.22,2.06v14.77a2.19,2.19,0,0,0,2.22,2.52Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_68);"></path>
                                        <path d="M57.87,230.54a159.5,159.5,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.78s-.35,12.64-3.82,13.88c-.78.28-2.22.59-3.16.91-.25-1.14-.4-2.64-2.53-2.82a109.08,109.08,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,18,18,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.31,2.45-2.2Zm-2.28,3.36c-.29.52-.12,4.63-.12,5.72,0,1.42-.29,2.74,1.44,3.46a4.24,4.24,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55.08,55.08,0,0,0-.24-5.72c-1.8-2.21-15.07-2.75-21.52-1.57-1.83.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_69);"></path>
                                        <path d="M79.67,235.05c0,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61.05-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_70);"></path>
                                        <path d="M81.76,230.38c2.43-4.35,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.5.5,0,0,0-.46-.05.7.7,0,0,0-.35.33l-2.12,3.88a.54.54,0,0,0,.13.64A4.16,4.16,0,0,1,80.2,212c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.6.6,0,0,0-.15.62l.43,1.24a.61.61,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_71);"></path>
                                        <path d="M54.87,230.38c-2.44-4.35-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.42,5.42,0,0,1,2-1.94.52.52,0,0,1,.47-.05.64.64,0,0,1,.34.33l2.13,3.88a.53.53,0,0,1-.14.64,4.16,4.16,0,0,0-.82,1.95c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.58.58,0,0,1,.14.62l-.43,1.24a.58.58,0,0,1-.46.39.56.56,0,0,1-.54-.24l-.79-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_72);"></path>
                                        <path d="M56.88,205.59l1.82,3.24a.79.79,0,0,0,.78.35c2.94-.2,5.88-.31,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35l1.82-3.24c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_73);"></path>
                                        <path d="M51.68,245.22c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14H69v6.18H61.81a20.16,20.16,0,0,1-6.2-1.28A7.15,7.15,0,0,1,51.68,245.22Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_74);"></path>
                                        <path d="M84.76,245.12c1.87-3,2.31-7.79,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.37-.17-12.33-.14h-.06v6.18h7.21a20.16,20.16,0,0,0,6.2-1.28,7.15,7.15,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_75);"></path>
                                        <path d="M88.37,166.61c0,7.83,3.28,10,9.23,10.52,2.32.21,5.81.33,9.32.34H107c3.5,0,7-.13,9.31-.34,6-.54,9.24-2.69,9.24-10.52.07-.79.76-18.21.76-18.25-.11-2-.25-3.9-.48-5.75-1.25-10.34-3.58-12.85-16-13h-5.73c-12.44.16-14.78,2.67-16,13-.22,1.85-.36,3.8-.47,5.75,0,0,.69,17.47.76,18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M98.64,149.74a64.74,64.74,0,0,1,17.2,0,2.21,2.21,0,0,1,2.23,2.53V167c0,1.9-1,2.06-2.23,2.06H98.64c-1.22,0-2.22-.16-2.22-2.06V152.27A2.21,2.21,0,0,1,98.64,149.74Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_76);"></path>
                                        <path d="M96.65,148.61a157.75,157.75,0,0,1,20.74-.16c.65-.89.86-2.07,2.33-1.75.66.15,3.62.61,4.65.77s-.35-12.63-3.82-13.87c-.78-.28-2.22-.59-3.16-.91-.25,1.14-.4,2.64-2.53,2.82a110.78,110.78,0,0,1-14.58,0,2.58,2.58,0,0,1-2.64-2.86,17,17,0,0,0-3.71,1.62c-3.27,2.36-4.39,7.63-4.27,13.09,2.93-.68,2.07-.46,4.54-1,1.59-.32,1.75,1.3,2.45,2.2Zm-2.28-3.37c-.29-.52-.12-4.63-.12-5.71,0-1.42-.29-2.74,1.45-3.46a4.13,4.13,0,0,1,2.21-.15,81.66,81.66,0,0,0,18.62,0,1.78,1.78,0,0,1,1.39.15c1.61.72,1.6,2,1.6,3.46a54.74,54.74,0,0,1-.24,5.71c-1.8,2.22-15.07,2.76-21.52,1.58C95.93,146.45,94.69,145.83,94.37,145.24Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_77);"></path>
                                        <path d="M118.45,144.1c0-1.61,0-4.06,0-5.67a1.93,1.93,0,0,0-2.2-1.69,87.14,87.14,0,0,1-18.55,0,1.92,1.92,0,0,0-2.2,1.69c0,1.61,0,4.06,0,5.67-.09,3.06,22.86,2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_78);"></path>
                                        <path d="M120.54,148.77c2.44,4.34,3.42,10.07,3.33,16.82,0,1.94.09,4.66-.93,6.4a5.42,5.42,0,0,1-2,1.94.53.53,0,0,1-.46,0,.64.64,0,0,1-.34-.33L118,169.77a.56.56,0,0,1,.13-.65,4.09,4.09,0,0,0,.83-1.94c0-6.79,0-9.51,0-16.38a1.71,1.71,0,0,0-.51-1.22.59.59,0,0,1-.14-.63l.43-1.23a.56.56,0,0,1,.45-.39.54.54,0,0,1,.54.24l.8,1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_79);"></path>
                                        <path d="M93.65,148.77c-2.44,4.34-3.42,10.07-3.33,16.82,0,1.94-.09,4.66.93,6.4a5.42,5.42,0,0,0,2,1.94.53.53,0,0,0,.46,0,.64.64,0,0,0,.34-.33l2.13-3.88a.54.54,0,0,0-.14-.65,4.18,4.18,0,0,1-.82-1.94c0-6.79,0-9.51,0-16.38a1.71,1.71,0,0,1,.51-1.22.59.59,0,0,0,.14-.63l-.43-1.23a.56.56,0,0,0-.45-.39.54.54,0,0,0-.54.24l-.8,1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_80);"></path>
                                        <path d="M95.66,173.56c.61-1.08,1.22-2.16,1.82-3.25a.81.81,0,0,1,.78-.34q4.41.3,8.82.31h0q4.41,0,8.82-.31a.81.81,0,0,1,.78.34l1.82,3.25c.53.94,1.28,1.48-.35,1.94-2,.57-6.51.79-11.08.77S98,176.07,96,175.5c-1.63-.46-.87-1-.35-1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_81);"></path>
                                        <path d="M90.46,133.93c-1.87,3-2.31,7.78-2.68,13.52-.1,1.54.12-.33,1.88-.07,1-6.89,2.41-10.74,5.75-11.76.23-.07,6.37.17,12.33.14h.06v-6.18h-7.21a20.16,20.16,0,0,0-6.2,1.28,7.15,7.15,0,0,0-3.93,3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_82);"></path>
                                        <path d="M123.54,134c1.88,3,2.31,7.78,2.68,13.52.1,1.54-.12-.33-1.88-.07-1-6.89-2.41-10.74-5.75-11.76-.22-.07-6.37.17-12.32.14h-.07v-6.18h7.22a20.16,20.16,0,0,1,6.19,1.28,7.12,7.12,0,0,1,3.93,3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_83);"></path>
                                        <path d="M49.59,166.61c0,7.83,3.28,10,9.23,10.52,2.32.21,5.81.33,9.31.34h.13c3.5,0,7-.13,9.31-.34,6-.54,9.23-2.69,9.23-10.52.08-.79.77-18.21.76-18.25-.1-2-.24-3.9-.47-5.75-1.25-10.34-3.58-12.85-16-13H65.33c-12.45.16-14.78,2.67-16,13-.22,1.85-.36,3.8-.47,5.75,0,0,.69,17.47.76,18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M59.86,149.74a64.74,64.74,0,0,1,17.2,0,2.21,2.21,0,0,1,2.23,2.53V167c0,1.9-1,2.06-2.23,2.06H59.86c-1.22,0-2.22-.16-2.22-2.06V152.27A2.21,2.21,0,0,1,59.86,149.74Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_84);"></path>
                                        <path d="M57.87,148.61a157.75,157.75,0,0,1,20.74-.16c.65-.89.86-2.07,2.33-1.75.66.15,3.62.61,4.65.77s-.35-12.63-3.82-13.87c-.78-.28-2.22-.59-3.16-.91-.25,1.14-.4,2.64-2.53,2.82a110.78,110.78,0,0,1-14.58,0,2.58,2.58,0,0,1-2.64-2.86,17,17,0,0,0-3.71,1.62c-3.27,2.36-4.39,7.63-4.27,13.09,2.93-.68,2.07-.46,4.54-1,1.59-.32,1.75,1.3,2.45,2.2Zm-2.28-3.37c-.29-.52-.12-4.63-.12-5.71,0-1.42-.29-2.74,1.44-3.46a4.14,4.14,0,0,1,2.21-.15,81.74,81.74,0,0,0,18.63,0,1.78,1.78,0,0,1,1.39.15c1.61.72,1.6,2,1.6,3.46a54.74,54.74,0,0,1-.24,5.71C78.7,147.43,65.43,148,59,146.79,57.15,146.45,55.91,145.83,55.59,145.24Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_85);"></path>
                                        <path d="M79.67,144.1c0-1.61,0-4.06,0-5.67a1.93,1.93,0,0,0-2.2-1.69,87.23,87.23,0,0,1-18.56,0,1.92,1.92,0,0,0-2.19,1.69c0,1.61.05,4.06,0,5.67-.09,3.06,22.86,2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_86);"></path>
                                        <path d="M81.76,148.77c2.43,4.34,3.41,10.07,3.33,16.82,0,1.94.09,4.66-.93,6.4a5.42,5.42,0,0,1-2,1.94.53.53,0,0,1-.46,0,.7.7,0,0,1-.35-.33l-2.12-3.88a.56.56,0,0,1,.13-.65,4.08,4.08,0,0,0,.82-1.94c0-6.79,0-9.51,0-16.38a1.71,1.71,0,0,0-.51-1.22.61.61,0,0,1-.15-.63l.43-1.23a.59.59,0,0,1,.46-.39.54.54,0,0,1,.54.24l.8,1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_87);"></path>
                                        <path d="M54.87,148.77c-2.44,4.34-3.42,10.07-3.33,16.82,0,1.94-.1,4.66.92,6.4a5.5,5.5,0,0,0,2,1.94.56.56,0,0,0,.47,0,.64.64,0,0,0,.34-.33l2.13-3.88a.54.54,0,0,0-.14-.65,4.08,4.08,0,0,1-.82-1.94c0-6.79,0-9.51,0-16.38a1.71,1.71,0,0,1,.51-1.22.59.59,0,0,0,.14-.63l-.43-1.23a.56.56,0,0,0-1-.15l-.79,1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_88);"></path>
                                        <path d="M56.88,173.56l1.82-3.25a.81.81,0,0,1,.78-.34q4.41.3,8.82.31h0q4.41,0,8.82-.31a.81.81,0,0,1,.78.34l1.82,3.25c.52.94,1.28,1.48-.35,1.94-2,.57-6.51.79-11.08.77s-9.09-.2-11.08-.77c-1.63-.46-.88-1-.35-1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_89);"></path>
                                        <path d="M51.68,133.93c-1.88,3-2.31,7.78-2.68,13.52-.1,1.54.12-.33,1.88-.07,1-6.89,2.41-10.74,5.75-11.76.22-.07,6.37.17,12.32.14H69v-6.18H61.81a20.16,20.16,0,0,0-6.2,1.28,7.15,7.15,0,0,0-3.93,3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_90);"></path>
                                        <path d="M84.76,134c1.87,3,2.31,7.78,2.68,13.52.1,1.54-.12-.33-1.88-.07-1-6.89-2.41-10.74-5.75-11.76-.23-.07-6.37.17-12.33.14h-.06v-6.18h7.21a20.16,20.16,0,0,1,6.2,1.28A7.15,7.15,0,0,1,84.76,134Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_91);"></path>
                                        <path d="M88.37,286c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.32-.35H107c3.5,0,7,.14,9.31.35,6,.54,9.24,2.69,9.24,10.52.07.78.76,18.21.76,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.44-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M98.64,302.82a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.23-2.52V285.53c0-1.9-1-2.06-2.23-2.06H98.64c-1.22,0-2.22.16-2.22,2.06V300.3A2.19,2.19,0,0,0,98.64,302.82Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_92);"></path>
                                        <path d="M96.65,304a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77S124,317.73,120.55,319c-.78.28-2.22.59-3.16.91-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,18,18,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.31,2.45-2.2Zm-2.28,3.36c-.29.52-.12,4.63-.12,5.72,0,1.42-.29,2.74,1.45,3.46a4.34,4.34,0,0,0,2.21.15,81.09,81.09,0,0,1,18.62,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.82,54.82,0,0,0-.24-5.72c-1.8-2.22-15.07-2.76-21.52-1.57C95.93,306.12,94.69,306.74,94.37,307.32Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_93);"></path>
                                        <path d="M118.45,308.47c0,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.14,87.14,0,0,0-18.55,0,1.92,1.92,0,0,1-2.2-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_94);"></path>
                                        <path d="M120.54,303.8c2.44-4.35,3.42-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.5.5,0,0,0-.46-.05.64.64,0,0,0-.34.33L118,282.8a.56.56,0,0,0,.13.65,4.09,4.09,0,0,1,.83,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.58.58,0,0,0-.14.62l.43,1.24a.56.56,0,0,0,.45.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_95);"></path>
                                        <path d="M93.65,303.8c-2.44-4.35-3.42-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.34,5.34,0,0,1,2-1.94.5.5,0,0,1,.46-.05.64.64,0,0,1,.34.33l2.13,3.88a.54.54,0,0,1-.14.65,4.18,4.18,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.58.58,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-.45.39.54.54,0,0,1-.54-.24l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_96);"></path>
                                        <path d="M95.66,279c.61,1.08,1.22,2.16,1.82,3.24a.79.79,0,0,0,.78.35c2.94-.2,5.88-.31,8.82-.31h0c2.94,0,5.88.11,8.82.31a.79.79,0,0,0,.78-.35c.61-1.08,1.22-2.16,1.82-3.24s1.28-1.48-.35-1.94c-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.87,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_97);"></path>
                                        <path d="M90.46,318.64c-1.87-3-2.31-7.79-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.23.07,6.37-.17,12.33-.14h.06V323h-7.21a19.86,19.86,0,0,1-6.2-1.27,7.19,7.19,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_98);"></path>
                                        <path d="M123.54,318.54c1.88-3,2.31-7.79,2.68-13.52.1-1.54-.12.33-1.88.06-1,6.9-2.41,10.75-5.75,11.77-.22.07-6.37-.18-12.32-.14h-.07v6.17h7.22a19.85,19.85,0,0,0,6.19-1.27,7.16,7.16,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_99);"></path>
                                        <path d="M49.59,286c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.31-.35h.13c3.5,0,7,.14,9.31.35,6,.54,9.23,2.69,9.23,10.52.08.78.77,18.21.76,18.25-.1,2-.24,3.9-.47,5.75-1.25,10.34-3.58,12.85-16,13H65.33c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M59.86,302.82a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.23-2.52V285.53c0-1.9-1-2.06-2.23-2.06H59.86c-1.22,0-2.22.16-2.22,2.06V300.3A2.19,2.19,0,0,0,59.86,302.82Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_100);"></path>
                                        <path d="M57.87,304a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.87c-.78.28-2.22.59-3.16.91-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,18,18,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.31,2.45-2.2Zm-2.28,3.36c-.29.52-.12,4.63-.12,5.72,0,1.42-.29,2.74,1.44,3.46a4.35,4.35,0,0,0,2.21.15,81.18,81.18,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.82,54.82,0,0,0-.24-5.72c-1.8-2.22-15.07-2.76-21.52-1.57C57.15,306.12,55.91,306.74,55.59,307.32Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_101);"></path>
                                        <path d="M79.67,308.47c0,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61.05-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_102);"></path>
                                        <path d="M81.76,303.8c2.43-4.35,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.5.5,0,0,0-.46-.05.7.7,0,0,0-.35.33l-2.12,3.88a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.6.6,0,0,0-.15.62l.43,1.24a.59.59,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_103);"></path>
                                        <path d="M54.87,303.8c-2.44-4.35-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.42,5.42,0,0,1,2-1.94.52.52,0,0,1,.47-.05.64.64,0,0,1,.34.33l2.13,3.88a.54.54,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38A1.71,1.71,0,0,0,57,303a.58.58,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-1,.15l-.79-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_104);"></path>
                                        <path d="M56.88,279l1.82,3.24a.79.79,0,0,0,.78.35c2.94-.2,5.88-.31,8.82-.31h0c2.94,0,5.88.11,8.82.31a.79.79,0,0,0,.78-.35L79.74,279c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_105);"></path>
                                        <path d="M51.68,318.64c-1.88-3-2.31-7.79-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14H69V323H61.81a19.86,19.86,0,0,1-6.2-1.27,7.19,7.19,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_106);"></path>
                                        <path d="M84.76,318.54c1.87-3,2.31-7.79,2.68-13.52.1-1.54-.12.33-1.88.06-1,6.9-2.41,10.75-5.75,11.77-.23.07-6.37-.18-12.33-.14h-.06v6.17h7.21a19.86,19.86,0,0,0,6.2-1.27,7.19,7.19,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_107);"></path>
                                        <path d="M88.37,354.65c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.32-.35H107c3.5,0,7,.14,9.31.35,6,.54,9.24,2.69,9.24,10.52.07.78.76,18.21.76,18.25-.11,2-.25,3.9-.48,5.74-1.25,10.35-3.58,12.86-16,13h-5.73c-12.44-.16-14.78-2.67-16-13-.22-1.84-.36-3.79-.47-5.74,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M98.64,371.51a63.91,63.91,0,0,0,17.2,0,2.2,2.2,0,0,0,2.23-2.52V354.22c0-1.9-1-2.06-2.23-2.06H98.64c-1.22,0-2.22.16-2.22,2.06V369A2.19,2.19,0,0,0,98.64,371.51Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_108);"></path>
                                        <path d="M96.65,372.65a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.87c-.78.28-2.22.59-3.16.91-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86A17.52,17.52,0,0,1,93.93,387c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.3,2.45-2.19ZM94.37,376c-.29.51-.12,4.62-.12,5.71,0,1.42-.29,2.74,1.45,3.46a4.34,4.34,0,0,0,2.21.15,81.66,81.66,0,0,1,18.62,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55,55,0,0,0-.24-5.72c-1.8-2.21-15.07-2.76-21.52-1.57C95.93,374.81,94.69,375.43,94.37,376Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_109);"></path>
                                        <path d="M118.45,377.16c0,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.14,87.14,0,0,0-18.55,0,1.92,1.92,0,0,1-2.2-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_110);"></path>
                                        <path d="M120.54,372.49c2.44-4.34,3.42-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.53.53,0,0,0-.46-.05.64.64,0,0,0-.34.33L118,351.49a.54.54,0,0,0,.13.64,4.17,4.17,0,0,1,.83,1.95c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.58.58,0,0,0-.14.62l.43,1.24a.56.56,0,0,0,.45.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_111);"></path>
                                        <path d="M93.65,372.49c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.34,5.34,0,0,1,2-1.94.53.53,0,0,1,.46-.05.64.64,0,0,1,.34.33l2.13,3.88a.53.53,0,0,1-.14.64,4.26,4.26,0,0,0-.82,1.95c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.58.58,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-.45.39.54.54,0,0,1-.54-.24l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_112);"></path>
                                        <path d="M95.66,347.7c.61,1.08,1.22,2.16,1.82,3.24a.79.79,0,0,0,.78.35q4.41-.3,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35c.61-1.08,1.22-2.16,1.82-3.24s1.28-1.48-.35-1.94c-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.87,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_113);"></path>
                                        <path d="M90.46,387.33c-1.87-3-2.31-7.79-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.23.07,6.37-.17,12.33-.14h.06v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.15,7.15,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_114);"></path>
                                        <path d="M123.54,387.23c1.88-3,2.31-7.79,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.22.07-6.37-.17-12.32-.14h-.07v6.17h7.22a19.85,19.85,0,0,0,6.19-1.27,7.12,7.12,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_115);"></path>
                                        <path d="M49.59,354.65c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.31-.35h.13c3.5,0,7,.14,9.31.35,6,.54,9.23,2.69,9.23,10.52.08.78.77,18.21.76,18.25-.1,2-.24,3.9-.47,5.74-1.25,10.35-3.58,12.86-16,13H65.33c-12.45-.16-14.78-2.67-16-13-.22-1.84-.36-3.79-.47-5.74,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M59.86,371.51a63.91,63.91,0,0,0,17.2,0A2.2,2.2,0,0,0,79.29,369V354.22c0-1.9-1-2.06-2.23-2.06H59.86c-1.22,0-2.22.16-2.22,2.06V369A2.19,2.19,0,0,0,59.86,371.51Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_116);"></path>
                                        <path d="M57.87,372.65a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.87c-.78.28-2.22.59-3.16.91-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86A17.52,17.52,0,0,1,55.15,387c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.3,2.45-2.19ZM55.59,376c-.29.51-.12,4.62-.12,5.71,0,1.42-.29,2.74,1.44,3.46a4.35,4.35,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46A55,55,0,0,0,80.5,376c-1.8-2.21-15.07-2.76-21.52-1.57C57.15,374.81,55.91,375.43,55.59,376Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_117);"></path>
                                        <path d="M79.67,377.16c0,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61.05-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_118);"></path>
                                        <path d="M81.76,372.49c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.53.53,0,0,0-.46-.05.7.7,0,0,0-.35.33l-2.12,3.88a.54.54,0,0,0,.13.64,4.16,4.16,0,0,1,.82,1.95c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.6.6,0,0,0-.15.62l.43,1.24a.59.59,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_119);"></path>
                                        <path d="M54.87,372.49c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.42,5.42,0,0,1,2-1.94.56.56,0,0,1,.47-.05.64.64,0,0,1,.34.33l2.13,3.88a.53.53,0,0,1-.14.64,4.16,4.16,0,0,0-.82,1.95c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.58.58,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-1,.15l-.79-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_120);"></path>
                                        <path d="M56.88,347.7l1.82,3.24a.79.79,0,0,0,.78.35q4.41-.3,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35l1.82-3.24c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_121);"></path>
                                        <path d="M51.68,387.33c-1.88-3-2.31-7.79-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14H69v6.18H61.81a20.16,20.16,0,0,1-6.2-1.28,7.15,7.15,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_122);"></path>
                                        <path d="M84.76,387.23c1.87-3,2.31-7.79,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.37-.17-12.33-.14h-.06v6.17h7.21a19.86,19.86,0,0,0,6.2-1.27,7.15,7.15,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_123);"></path>
                                        <path d="M88.37,423.34c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.32-.34H107c3.5,0,7,.13,9.31.34,6,.54,9.24,2.69,9.24,10.52.07.78.76,18.21.76,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.44-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M98.64,440.2a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.23-2.52V422.91c0-1.9-1-2.07-2.23-2.07H98.64c-1.22,0-2.22.17-2.22,2.07v14.77A2.2,2.2,0,0,0,98.64,440.2Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_124);"></path>
                                        <path d="M96.65,441.34a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,17.52,17.52,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.51-.12,4.63-.12,5.71,0,1.42-.29,2.74,1.45,3.46a4.23,4.23,0,0,0,2.21.15,81.66,81.66,0,0,1,18.62,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.58C95.93,443.5,94.69,444.12,94.37,444.71Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_125);"></path>
                                        <path d="M118.45,445.85c0,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.14,87.14,0,0,0-18.55,0,1.92,1.92,0,0,1-2.2-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_126);"></path>
                                        <path d="M120.54,441.18c2.44-4.34,3.42-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.53.53,0,0,0-.46,0,.64.64,0,0,0-.34.33L118,420.18a.56.56,0,0,0,.13.65,4.09,4.09,0,0,1,.83,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.58.58,0,0,0-.14.62l.43,1.24a.56.56,0,0,0,.45.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_127);"></path>
                                        <path d="M93.65,441.18c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.34,5.34,0,0,1,2-1.94.53.53,0,0,1,.46,0,.64.64,0,0,1,.34.33l2.13,3.88a.54.54,0,0,1-.14.65,4.18,4.18,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.58.58,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-.45.39.54.54,0,0,1-.54-.24l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_128);"></path>
                                        <path d="M95.66,416.39c.61,1.08,1.22,2.16,1.82,3.24a.79.79,0,0,0,.78.35q4.41-.3,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35c.61-1.08,1.22-2.16,1.82-3.24s1.28-1.48-.35-1.94c-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.87,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_129);"></path>
                                        <path d="M90.46,456c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.23.07,6.37-.17,12.33-.14h.06v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28A7.15,7.15,0,0,1,90.46,456Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_130);"></path>
                                        <path d="M123.54,455.92c1.88-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.22.07-6.37-.17-12.32-.14h-.07v6.18h7.22a20.16,20.16,0,0,0,6.19-1.28,7.12,7.12,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_131);"></path>
                                        <path d="M49.59,423.34c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.31-.34h.13c3.5,0,7,.13,9.31.34,6,.54,9.23,2.69,9.23,10.52.08.78.77,18.21.76,18.25-.1,2-.24,3.9-.47,5.75-1.25,10.34-3.58,12.85-16,13H65.33c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M59.86,440.2a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.23-2.52V422.91c0-1.9-1-2.07-2.23-2.07H59.86c-1.22,0-2.22.17-2.22,2.07v14.77A2.2,2.2,0,0,0,59.86,440.2Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_132);"></path>
                                        <path d="M57.87,441.34a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,17.52,17.52,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.51-.12,4.63-.12,5.71,0,1.42-.29,2.74,1.44,3.46a4.24,4.24,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71C78.7,442.52,65.43,442,59,443.16,57.15,443.5,55.91,444.12,55.59,444.71Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_133);"></path>
                                        <path d="M79.67,445.85c0,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61.05-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_134);"></path>
                                        <path d="M81.76,441.18c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.53.53,0,0,0-.46,0,.7.7,0,0,0-.35.33l-2.12,3.88a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.6.6,0,0,0-.15.62l.43,1.24a.59.59,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_135);"></path>
                                        <path d="M54.87,441.18c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.42,5.42,0,0,1,2-1.94.56.56,0,0,1,.47,0,.64.64,0,0,1,.34.33l2.13,3.88a.54.54,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.58.58,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-1,.15l-.79-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_136);"></path>
                                        <path d="M56.88,416.39l1.82,3.24a.79.79,0,0,0,.78.35q4.41-.3,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35l1.82-3.24c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_137);"></path>
                                        <path d="M51.68,456c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14H69v6.18H61.81a20.16,20.16,0,0,1-6.2-1.28A7.15,7.15,0,0,1,51.68,456Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_138);"></path>
                                        <path d="M84.76,455.92c1.87-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.37-.17-12.33-.14h-.06v6.18h7.21a20.16,20.16,0,0,0,6.2-1.28,7.15,7.15,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_139);"></path>
                                        <path d="M88.37,492c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.32-.34H107c3.5,0,7,.13,9.31.34,6,.54,9.24,2.69,9.24,10.52.07.79.76,18.21.76,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.44-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M98.64,508.9a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V491.6c0-1.9-1-2.06-2.23-2.06H98.64c-1.22,0-2.22.16-2.22,2.06v14.77A2.21,2.21,0,0,0,98.64,508.9Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_140);"></path>
                                        <path d="M96.65,510a156,156,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0A2.58,2.58,0,0,0,97.64,526a17,17,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.52-.12,4.63-.12,5.71,0,1.42-.29,2.74,1.45,3.46a4.24,4.24,0,0,0,2.21.16,81.09,81.09,0,0,1,18.62,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.58C95.93,512.19,94.69,512.81,94.37,513.4Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_141);"></path>
                                        <path d="M118.45,514.54c0,1.61,0,4.06,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.14,87.14,0,0,0-18.55,0,1.92,1.92,0,0,1-2.2-1.68c0-1.61,0-4.07,0-5.68-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_142);"></path>
                                        <path d="M120.54,509.87c2.44-4.34,3.42-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46,0,.63.63,0,0,0-.34.34L118,488.87a.56.56,0,0,0,.13.65,4.09,4.09,0,0,1,.83,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.59.59,0,0,0-.14.63l.43,1.23a.55.55,0,0,0,1,.15l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_143);"></path>
                                        <path d="M93.65,509.87c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.42,5.42,0,0,1,2-1.94.53.53,0,0,1,.46,0A.63.63,0,0,1,94,485l2.13,3.87a.54.54,0,0,1-.14.65,4.18,4.18,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.59.59,0,0,1,.14.63l-.43,1.23a.55.55,0,0,1-1,.15l-.8-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_144);"></path>
                                        <path d="M95.66,485.08c.61,1.08,1.22,2.16,1.82,3.25a.83.83,0,0,0,.78.35c2.94-.21,5.88-.31,8.82-.32h0c2.94,0,5.88.11,8.82.32a.83.83,0,0,0,.78-.35l1.82-3.25c.53-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.87,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_145);"></path>
                                        <path d="M90.46,524.71c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.23.07,6.37-.17,12.33-.14h.06v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.15,7.15,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_146);"></path>
                                        <path d="M123.54,524.61c1.88-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.22.07-6.37-.17-12.32-.14h-.07V529h7.22a20.16,20.16,0,0,0,6.19-1.28,7.07,7.07,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_147);"></path>
                                        <path d="M49.59,492c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.31-.34h.13c3.5,0,7,.13,9.31.34,6,.54,9.23,2.69,9.23,10.52.08.79.77,18.21.76,18.25-.1,2-.24,3.9-.47,5.75-1.25,10.34-3.58,12.85-16,13H65.33c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M59.86,508.9a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V491.6c0-1.9-1-2.06-2.23-2.06H59.86c-1.22,0-2.22.16-2.22,2.06v14.77A2.21,2.21,0,0,0,59.86,508.9Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_148);"></path>
                                        <path d="M57.87,510a156,156,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0A2.58,2.58,0,0,0,58.86,526a17,17,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.52-.12,4.63-.12,5.71,0,1.42-.29,2.74,1.44,3.46a4.25,4.25,0,0,0,2.21.16,81.17,81.17,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.58C57.15,512.19,55.91,512.81,55.59,513.4Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_149);"></path>
                                        <path d="M79.67,514.54c0,1.61,0,4.06,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61.05-4.07,0-5.68-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_150);"></path>
                                        <path d="M81.76,509.87c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46,0,.68.68,0,0,0-.35.34l-2.12,3.87a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.61.61,0,0,0-.15.63l.43,1.23a.57.57,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_151);"></path>
                                        <path d="M54.87,509.87c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47,0,.63.63,0,0,1,.34.34l2.13,3.87a.54.54,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.59.59,0,0,1,.14.63l-.43,1.23a.55.55,0,0,1-.46.39.56.56,0,0,1-.54-.24l-.79-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_152);"></path>
                                        <path d="M56.88,485.08l1.82,3.25a.83.83,0,0,0,.78.35c2.94-.21,5.88-.31,8.82-.32h0c2.94,0,5.88.11,8.82.32a.83.83,0,0,0,.78-.35l1.82-3.25c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_153);"></path>
                                        <path d="M51.68,524.71c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14H69v6.18H61.81a20.16,20.16,0,0,1-6.2-1.28,7.15,7.15,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_154);"></path>
                                        <path d="M84.76,524.61c1.87-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.37-.17-12.33-.14h-.06V529h7.21a20.16,20.16,0,0,0,6.2-1.28,7.11,7.11,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_155);"></path>
                                        <path d="M88.37,560.72c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.32-.34H107c3.5,0,7,.13,9.31.34,6,.54,9.24,2.69,9.24,10.52.07.79.76,18.21.76,18.25-.11,1.95-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.44-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M98.64,577.59a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V560.29c0-1.9-1-2.06-2.23-2.06H98.64c-1.22,0-2.22.16-2.22,2.06v14.77A2.21,2.21,0,0,0,98.64,577.59Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_156);"></path>
                                        <path d="M96.65,578.72a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86A17,17,0,0,1,93.93,593c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.52-.12,4.63-.12,5.71,0,1.42-.29,2.74,1.45,3.46a4.13,4.13,0,0,0,2.21.15,81.66,81.66,0,0,1,18.62,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55,55,0,0,0-.24-5.72c-1.8-2.22-15.07-2.76-21.52-1.57-1.83.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_157);"></path>
                                        <path d="M118.45,583.23c0,1.61,0,4.06,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.14,87.14,0,0,0-18.55,0,1.92,1.92,0,0,1-2.2-1.68c0-1.61,0-4.07,0-5.68-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_158);"></path>
                                        <path d="M120.54,578.56c2.44-4.34,3.42-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46,0,.63.63,0,0,0-.34.34L118,557.56a.56.56,0,0,0,.13.65,4.09,4.09,0,0,1,.83,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.59.59,0,0,0-.14.63l.43,1.23a.56.56,0,0,0,.45.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_159);"></path>
                                        <path d="M93.65,578.56c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.42,5.42,0,0,1,2-1.94.53.53,0,0,1,.46,0,.63.63,0,0,1,.34.34l2.13,3.87a.54.54,0,0,1-.14.65,4.18,4.18,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.59.59,0,0,1,.14.63l-.43,1.23A.56.56,0,0,1,95,580a.54.54,0,0,1-.54-.24l-.8-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_160);"></path>
                                        <path d="M95.66,553.77c.61,1.08,1.22,2.16,1.82,3.25a.83.83,0,0,0,.78.35q4.41-.32,8.82-.31h0q4.41,0,8.82.31a.83.83,0,0,0,.78-.35l1.82-3.25c.53-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76c-1.63.46-.87,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_161);"></path>
                                        <path d="M90.46,593.4c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.77.23.06,6.37-.18,12.33-.15h.06v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.15,7.15,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_162);"></path>
                                        <path d="M123.54,593.3c1.88-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.77-.22.06-6.37-.18-12.32-.15h-.07v6.18h7.22a20.16,20.16,0,0,0,6.19-1.28,7.12,7.12,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_163);"></path>
                                        <path d="M49.59,560.72c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.31-.34h.13c3.5,0,7,.13,9.31.34,6,.54,9.23,2.69,9.23,10.52.08.79.77,18.21.76,18.25-.1,1.95-.24,3.9-.47,5.75-1.25,10.34-3.58,12.85-16,13H65.33c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M59.86,577.59a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V560.29c0-1.9-1-2.06-2.23-2.06H59.86c-1.22,0-2.22.16-2.22,2.06v14.77A2.21,2.21,0,0,0,59.86,577.59Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_164);"></path>
                                        <path d="M57.87,578.72a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86A17,17,0,0,1,55.15,593c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.52-.12,4.63-.12,5.71,0,1.42-.29,2.74,1.44,3.46a4.14,4.14,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55,55,0,0,0-.24-5.72c-1.8-2.22-15.07-2.76-21.52-1.57-1.83.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_165);"></path>
                                        <path d="M79.67,583.23c0,1.61,0,4.06,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61.05-4.07,0-5.68-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_166);"></path>
                                        <path d="M81.76,578.56c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46,0,.68.68,0,0,0-.35.34l-2.12,3.87a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.61.61,0,0,0-.15.63l.43,1.23a.59.59,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_167);"></path>
                                        <path d="M54.87,578.56c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47,0,.63.63,0,0,1,.34.34l2.13,3.87a.54.54,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.59.59,0,0,1,.14.63l-.43,1.23a.56.56,0,0,1-1,.15l-.79-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_168);"></path>
                                        <path d="M56.88,553.77,58.7,557a.83.83,0,0,0,.78.35q4.41-.32,8.82-.31h0q4.41,0,8.82.31a.83.83,0,0,0,.78-.35l1.82-3.25c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_169);"></path>
                                        <path d="M51.68,593.4c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.77.22.06,6.37-.18,12.32-.15H69v6.18H61.81a20.16,20.16,0,0,1-6.2-1.28,7.15,7.15,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_170);"></path>
                                        <path d="M84.76,593.3c1.87-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.77-.23.06-6.37-.18-12.33-.15h-.06v6.18h7.21a20.16,20.16,0,0,0,6.2-1.28,7.15,7.15,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_171);"></path>
                                        <path d="M88.37,629.41c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.32-.34H107c3.5,0,7,.13,9.31.34,6,.54,9.24,2.69,9.24,10.52.07.79.76,18.22.76,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.44-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M98.64,646.28a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V629c0-1.9-1-2.06-2.23-2.06H98.64c-1.22,0-2.22.16-2.22,2.06v14.77A2.21,2.21,0,0,0,98.64,646.28Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_172);"></path>
                                        <path d="M96.65,647.41a156,156,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.64-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a109.1,109.1,0,0,0-14.58,0,2.57,2.57,0,0,0-2.64,2.85,17,17,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.52-.12,4.63-.12,5.71,0,1.42-.29,2.74,1.45,3.46a4.24,4.24,0,0,0,2.21.16,81.09,81.09,0,0,1,18.62,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55.08,55.08,0,0,0-.24-5.72c-1.8-2.21-15.07-2.75-21.52-1.57-1.83.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_173);"></path>
                                        <path d="M118.45,651.92c0,1.61,0,4.07,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.14,87.14,0,0,0-18.55,0,1.92,1.92,0,0,1-2.2-1.68c0-1.61,0-4.07,0-5.68-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_174);"></path>
                                        <path d="M120.54,647.25c2.44-4.34,3.42-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46-.05.63.63,0,0,0-.34.34L118,626.25a.56.56,0,0,0,.13.65,4.09,4.09,0,0,1,.83,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.59.59,0,0,0-.14.63l.43,1.23a.55.55,0,0,0,1,.15l.8-1.15,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_175);"></path>
                                        <path d="M93.65,647.25c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.42,5.42,0,0,1,2-1.94.53.53,0,0,1,.46-.05.63.63,0,0,1,.34.34l2.13,3.87a.54.54,0,0,1-.14.65,4.18,4.18,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.59.59,0,0,1,.14.63l-.43,1.23a.55.55,0,0,1-1,.15l-.8-1.15Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_176);"></path>
                                        <path d="M95.66,622.46l1.82,3.25a.83.83,0,0,0,.78.35q4.41-.31,8.82-.31h0q4.41,0,8.82.31a.83.83,0,0,0,.78-.35l1.82-3.25c.53-.94,1.28-1.47-.35-1.94-2-.57-6.51-.79-11.08-.76S98,620,96,620.52c-1.63.47-.87,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_177);"></path>
                                        <path d="M90.46,662.09c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.75,5.75,11.77.23.06,6.37-.18,12.33-.15h.06v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.11,7.11,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_178);"></path>
                                        <path d="M123.54,662c1.88-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.75-5.75,11.77-.22.06-6.37-.18-12.32-.15h-.07v6.18h7.22a20.16,20.16,0,0,0,6.19-1.28,7.07,7.07,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_179);"></path>
                                        <path d="M49.59,629.41c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.31-.34h.13c3.5,0,7,.13,9.31.34,6,.54,9.23,2.69,9.23,10.52.08.79.77,18.22.76,18.25-.1,2-.24,3.9-.47,5.75-1.25,10.34-3.58,12.85-16,13H65.33c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M59.86,646.28a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V629c0-1.9-1-2.06-2.23-2.06H59.86c-1.22,0-2.22.16-2.22,2.06v14.77A2.21,2.21,0,0,0,59.86,646.28Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_180);"></path>
                                        <path d="M57.87,647.41a156,156,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.64-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a109.1,109.1,0,0,0-14.58,0,2.57,2.57,0,0,0-2.64,2.85,17,17,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.52-.12,4.63-.12,5.71,0,1.42-.29,2.74,1.44,3.46a4.25,4.25,0,0,0,2.21.16,81.17,81.17,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55.08,55.08,0,0,0-.24-5.72c-1.8-2.21-15.07-2.75-21.52-1.57-1.83.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_181);"></path>
                                        <path d="M79.67,651.92c0,1.61,0,4.07,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61.05-4.07,0-5.68-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_182);"></path>
                                        <path d="M81.76,647.25c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46-.05.68.68,0,0,0-.35.34l-2.12,3.87a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.61.61,0,0,0-.15.63l.43,1.23a.57.57,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.15Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_183);"></path>
                                        <path d="M54.87,647.25c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47-.05.63.63,0,0,1,.34.34l2.13,3.87a.54.54,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.22.59.59,0,0,1,.14.63l-.43,1.23a.55.55,0,0,1-.46.39.56.56,0,0,1-.54-.24l-.79-1.15Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_184);"></path>
                                        <path d="M56.88,622.46l1.82,3.25a.83.83,0,0,0,.78.35q4.41-.31,8.82-.31h0q4.41,0,8.82.31a.83.83,0,0,0,.78-.35l1.82-3.25c.52-.94,1.28-1.47-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76c-1.63.47-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_185);"></path>
                                        <path d="M51.68,662.09c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.75,5.75,11.77.22.06,6.37-.18,12.32-.15H69v6.18H61.81a20.16,20.16,0,0,1-6.2-1.28,7.11,7.11,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_186);"></path>
                                        <path d="M84.76,662c1.87-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.75-5.75,11.77-.23.06-6.37-.18-12.33-.15h-.06v6.18h7.21a20.16,20.16,0,0,0,6.2-1.28A7.11,7.11,0,0,0,84.76,662Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_187);"></path>
                                        <path d="M88.37,698.1c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.32-.34H107c3.5,0,7,.13,9.31.34,6,.54,9.24,2.69,9.24,10.52.07.79.76,18.22.76,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.44-.17-14.78-2.68-16-13-.22-1.85-.36-3.79-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M98.64,715a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V697.67c0-1.9-1-2.06-2.23-2.06H98.64c-1.22,0-2.22.16-2.22,2.06v14.77A2.21,2.21,0,0,0,98.64,715Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_188);"></path>
                                        <path d="M96.65,716.11a157.75,157.75,0,0,0,20.74.15c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0A2.58,2.58,0,0,0,97.64,732a17,17,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.36c-.29.52-.12,4.63-.12,5.71,0,1.42-.29,2.75,1.45,3.46a4.24,4.24,0,0,0,2.21.16,80.53,80.53,0,0,1,18.62,0,1.75,1.75,0,0,0,1.39-.16c1.61-.71,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.57-1.83.33-3.07,1-3.39,1.54Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_189);"></path>
                                        <path d="M118.45,720.61c0,1.61,0,4.07,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.14,87.14,0,0,0-18.55,0,1.92,1.92,0,0,1-2.2-1.68c0-1.61,0-4.06,0-5.68-.09-3.06,22.86-2.41,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_190);"></path>
                                        <path d="M120.54,715.94c2.44-4.34,3.42-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46,0,.63.63,0,0,0-.34.34L118,694.94a.55.55,0,0,0,.13.65,4.09,4.09,0,0,1,.83,1.94c0,6.79,0,9.51,0,16.38a1.75,1.75,0,0,1-.51,1.23.57.57,0,0,0-.14.62l.43,1.24a.55.55,0,0,0,.45.38.54.54,0,0,0,.54-.24l.8-1.15,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_191);"></path>
                                        <path d="M93.65,715.94c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.42,5.42,0,0,1,2-1.94.53.53,0,0,1,.46,0,.63.63,0,0,1,.34.34l2.13,3.87a.54.54,0,0,1-.14.65,4.18,4.18,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.75,1.75,0,0,0,.51,1.23.57.57,0,0,1,.14.62L95.47,717a.55.55,0,0,1-.45.38.54.54,0,0,1-.54-.24l-.8-1.15Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_192);"></path>
                                        <path d="M95.66,691.15c.61,1.08,1.22,2.16,1.82,3.25a.83.83,0,0,0,.78.35c2.94-.21,5.88-.31,8.82-.32h0c2.94,0,5.88.11,8.82.32a.83.83,0,0,0,.78-.35l1.82-3.25c.53-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76c-1.63.46-.87,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_193);"></path>
                                        <path d="M90.46,730.78c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.75,5.75,11.77.23.06,6.37-.18,12.33-.15h.06v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.11,7.11,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_194);"></path>
                                        <path d="M123.54,730.68c1.88-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.77-.22.06-6.37-.18-12.32-.15h-.07V735h7.22a20.16,20.16,0,0,0,6.19-1.28,7.12,7.12,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_195);"></path>
                                        <path d="M49.59,698.1c0-7.83,3.28-10,9.23-10.52,2.32-.21,5.81-.33,9.31-.34h.13c3.5,0,7,.13,9.31.34,6,.54,9.23,2.69,9.23,10.52.08.79.77,18.22.76,18.25-.1,2-.24,3.9-.47,5.75-1.25,10.34-3.58,12.85-16,13H65.33c-12.45-.17-14.78-2.68-16-13-.22-1.85-.36-3.79-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M59.86,715a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V697.67c0-1.9-1-2.06-2.23-2.06H59.86c-1.22,0-2.22.16-2.22,2.06v14.77A2.21,2.21,0,0,0,59.86,715Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_196);"></path>
                                        <path d="M57.87,716.11a157.75,157.75,0,0,0,20.74.15c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0A2.58,2.58,0,0,0,58.86,732a17,17,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.36c-.29.52-.12,4.63-.12,5.71,0,1.42-.29,2.75,1.44,3.46a4.25,4.25,0,0,0,2.21.16,80.62,80.62,0,0,1,18.63,0,1.75,1.75,0,0,0,1.39-.16c1.61-.71,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.57-1.83.33-3.07,1-3.39,1.54Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_197);"></path>
                                        <path d="M79.67,720.61c0,1.61,0,4.07,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61.05-4.06,0-5.68-.09-3.06,22.86-2.41,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_198);"></path>
                                        <path d="M81.76,715.94c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46,0,.68.68,0,0,0-.35.34l-2.12,3.87a.55.55,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38a1.75,1.75,0,0,1-.51,1.23.59.59,0,0,0-.15.62l.43,1.24a.58.58,0,0,0,.46.38.54.54,0,0,0,.54-.24l.8-1.15Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_199);"></path>
                                        <path d="M54.87,715.94c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47,0,.63.63,0,0,1,.34.34l2.13,3.87a.54.54,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.75,1.75,0,0,0,.51,1.23.57.57,0,0,1,.14.62L56.69,717a.55.55,0,0,1-.46.38.56.56,0,0,1-.54-.24L54.9,716Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_200);"></path>
                                        <path d="M56.88,691.15l1.82,3.25a.83.83,0,0,0,.78.35c2.94-.21,5.88-.31,8.82-.32h0c2.94,0,5.88.11,8.82.32a.83.83,0,0,0,.78-.35l1.82-3.25c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_201);"></path>
                                        <path d="M51.68,730.78c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.75,5.75,11.77.22.06,6.37-.18,12.32-.15H69v6.18H61.81a20.16,20.16,0,0,1-6.2-1.28,7.11,7.11,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_202);"></path>
                                        <path d="M84.76,730.68c1.87-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.77-.23.06-6.37-.18-12.33-.15h-.06V735h7.21a20.16,20.16,0,0,0,6.2-1.28,7.15,7.15,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_203);"></path>
                                        <path d="M233,212.54c0-7.83,3.29-10,9.24-10.52,2.32-.21,5.81-.33,9.31-.35h.13c3.5,0,7,.14,9.31.35,5.95.54,9.23,2.69,9.23,10.52.08.78.77,18.21.77,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M243.24,229.4a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.23-2.52V212.11c0-1.9-1-2.06-2.23-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06v14.77a2.2,2.2,0,0,0,2.23,2.52Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_204);"></path>
                                        <path d="M241.25,230.54a159.5,159.5,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.78s-.35,12.64-3.82,13.88c-.78.28-2.22.59-3.16.91-.25-1.14-.4-2.64-2.53-2.82a109.08,109.08,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,18,18,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.31,2.45-2.2ZM239,233.9c-.29.52-.13,4.63-.13,5.72,0,1.42-.28,2.74,1.45,3.46a4.24,4.24,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55.08,55.08,0,0,0-.24-5.72c-1.8-2.21-15.07-2.75-21.52-1.57-1.83.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_205);"></path>
                                        <path d="M263.05,235.05c.05,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_206);"></path>
                                        <path d="M265.14,230.38c2.43-4.35,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.5.5,0,0,0-.46-.05.7.7,0,0,0-.35.33l-2.12,3.88a.54.54,0,0,0,.13.64,4.16,4.16,0,0,1,.82,1.95c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.6.6,0,0,0-.15.62l.43,1.24a.61.61,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_207);"></path>
                                        <path d="M238.25,230.38c-2.44-4.35-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.42,5.42,0,0,1,2-1.94.52.52,0,0,1,.47-.05.64.64,0,0,1,.34.33l2.13,3.88a.54.54,0,0,1-.14.64,4.16,4.16,0,0,0-.82,1.95c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.6.6,0,0,1,.14.62l-.43,1.24a.58.58,0,0,1-.46.39.56.56,0,0,1-.54-.24l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_208);"></path>
                                        <path d="M240.26,205.59l1.82,3.24a.79.79,0,0,0,.78.35c2.94-.2,5.88-.31,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35l1.82-3.24c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_209);"></path>
                                        <path d="M235.06,245.22c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14h.07v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28A7.12,7.12,0,0,1,235.06,245.22Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_210);"></path>
                                        <path d="M268.14,245.12c1.87-3,2.31-7.79,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.37-.17-12.33-.14h-.06v6.18H258a20.16,20.16,0,0,0,6.2-1.28,7.15,7.15,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_211);"></path>
                                        <path d="M194.18,212.54c0-7.83,3.29-10,9.24-10.52,2.31-.21,5.81-.33,9.31-.35h.12c3.51,0,7,.14,9.31.35,6,.54,9.24,2.69,9.24,10.52.07.78.76,18.21.76,18.25-.11,2-.25,3.9-.47,5.75-1.25,10.34-3.59,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.23-1.85-.37-3.8-.48-5.75,0,0,.69-17.47.77-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M204.46,229.4a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.22-2.52V212.11c0-1.9-1-2.06-2.22-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06v14.77a2.2,2.2,0,0,0,2.23,2.52Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_212);"></path>
                                        <path d="M202.47,230.54a159.5,159.5,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.78s-.35,12.64-3.83,13.88c-.77.28-2.21.59-3.15.91-.26-1.14-.4-2.64-2.53-2.82a109.08,109.08,0,0,0-14.58,0,2.6,2.6,0,0,0-2.65,2.86,18.19,18.19,0,0,1-3.7-1.62c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.31,2.45-2.2Zm-2.28,3.36c-.29.52-.13,4.63-.13,5.72,0,1.42-.29,2.74,1.45,3.46a4.23,4.23,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.79,1.79,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55.08,55.08,0,0,0-.24-5.72c-1.8-2.21-15.07-2.75-21.52-1.57-1.84.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_213);"></path>
                                        <path d="M224.26,235.05c.06,1.61,0,4.06,0,5.67a1.92,1.92,0,0,1-2.19,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,22.94,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_214);"></path>
                                        <path d="M226.36,230.38c2.43-4.35,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.52.52,0,0,0-.47-.05.64.64,0,0,0-.34.33l-2.12,3.88a.54.54,0,0,0,.13.64,4.16,4.16,0,0,1,.82,1.95c0,6.79-.05,9.51-.05,16.38a1.67,1.67,0,0,1-.51,1.22.6.6,0,0,0-.14.62l.43,1.24a.59.59,0,0,0,.46.39.56.56,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_215);"></path>
                                        <path d="M199.46,230.38c-2.43-4.35-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.42,5.42,0,0,1,2-1.94.52.52,0,0,1,.47-.05.64.64,0,0,1,.34.33l2.12,3.88a.54.54,0,0,1-.13.64A4.16,4.16,0,0,0,201,212c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.6.6,0,0,1,.14.62l-.43,1.24a.58.58,0,0,1-.46.39.56.56,0,0,1-.54-.24l-.8-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_216);"></path>
                                        <path d="M201.48,205.59c.6,1.08,1.21,2.16,1.82,3.24a.79.79,0,0,0,.78.35c2.94-.2,5.88-.31,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35c.6-1.08,1.21-2.16,1.82-3.24s1.28-1.48-.35-1.94c-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_217);"></path>
                                        <path d="M196.28,245.22c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14h.07v6.18H206.4a20.16,20.16,0,0,1-6.19-1.28A7.12,7.12,0,0,1,196.28,245.22Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_218);"></path>
                                        <path d="M229.36,245.12c1.87-3,2.31-7.79,2.68-13.52.09-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.38-.17-12.33-.14H212v6.18h7.22a20.22,20.22,0,0,0,6.2-1.28,7.19,7.19,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_219);"></path>
                                        <path d="M233,286c0-7.83,3.29-10,9.24-10.52,2.32-.21,5.81-.33,9.31-.35h.13c3.5,0,7,.14,9.31.35,5.95.54,9.23,2.69,9.23,10.52.08.78.77,18.21.77,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M243.24,302.82a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.23-2.52V285.53c0-1.9-1-2.06-2.23-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06V300.3a2.2,2.2,0,0,0,2.23,2.52Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_220);"></path>
                                        <path d="M241.25,304a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.87c-.78.28-2.22.59-3.16.91-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,18,18,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.31,2.45-2.2ZM239,307.32c-.29.52-.13,4.63-.13,5.72,0,1.42-.28,2.74,1.45,3.46a4.35,4.35,0,0,0,2.21.15,81.18,81.18,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.82,54.82,0,0,0-.24-5.72c-1.8-2.22-15.07-2.76-21.52-1.57C240.53,306.12,239.29,306.74,239,307.32Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_221);"></path>
                                        <path d="M263.05,308.47c.05,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_222);"></path>
                                        <path d="M265.14,303.8c2.43-4.35,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.5.5,0,0,0-.46-.05.7.7,0,0,0-.35.33l-2.12,3.88a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38A1.71,1.71,0,0,1,263,303a.6.6,0,0,0-.15.62l.43,1.24a.59.59,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_223);"></path>
                                        <path d="M238.25,303.8c-2.44-4.35-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.42,5.42,0,0,1,2-1.94.52.52,0,0,1,.47-.05.64.64,0,0,1,.34.33l2.13,3.88a.56.56,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.6.6,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-1,.15l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_224);"></path>
                                        <path d="M240.26,279l1.82,3.24a.79.79,0,0,0,.78.35c2.94-.2,5.88-.31,8.82-.31h0c2.94,0,5.88.11,8.82.31a.79.79,0,0,0,.78-.35l1.82-3.24c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_225);"></path>
                                        <path d="M235.06,318.64c-1.87-3-2.31-7.79-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14h.07V323h-7.21a19.86,19.86,0,0,1-6.2-1.27,7.16,7.16,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_226);"></path>
                                        <path d="M268.14,318.54c1.87-3,2.31-7.79,2.68-13.52.1-1.54-.12.33-1.88.06-1,6.9-2.41,10.75-5.75,11.77-.23.07-6.37-.18-12.33-.14h-.06v6.17H258a19.86,19.86,0,0,0,6.2-1.27,7.19,7.19,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_227);"></path>
                                        <path d="M194.18,286c0-7.83,3.29-10,9.24-10.52,2.31-.21,5.81-.33,9.31-.35h.12c3.51,0,7,.14,9.31.35,6,.54,9.24,2.69,9.24,10.52.07.78.76,18.21.76,18.25-.11,2-.25,3.9-.47,5.75-1.25,10.34-3.59,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.23-1.85-.37-3.8-.48-5.75,0,0,.69-17.47.77-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M204.46,302.82a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.22-2.52V285.53c0-1.9-1-2.06-2.22-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06V300.3a2.2,2.2,0,0,0,2.23,2.52Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_228);"></path>
                                        <path d="M202.47,304a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.83,13.87c-.77.28-2.21.59-3.15.91-.26-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.6,2.6,0,0,0-2.65,2.86,18.19,18.19,0,0,1-3.7-1.62c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.31,2.45-2.2Zm-2.28,3.36c-.29.52-.13,4.63-.13,5.72,0,1.42-.29,2.74,1.45,3.46a4.34,4.34,0,0,0,2.21.15,81.18,81.18,0,0,1,18.63,0,1.79,1.79,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.82,54.82,0,0,0-.24-5.72c-1.8-2.22-15.07-2.76-21.52-1.57C201.74,306.12,200.51,306.74,200.19,307.32Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_229);"></path>
                                        <path d="M224.26,308.47c.06,1.61,0,4.06,0,5.67a1.92,1.92,0,0,1-2.19,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,22.94,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_230);"></path>
                                        <path d="M226.36,303.8c2.43-4.35,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.52.52,0,0,0-.47-.05.64.64,0,0,0-.34.33l-2.12,3.88a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79-.05,9.51-.05,16.38a1.67,1.67,0,0,1-.51,1.22.6.6,0,0,0-.14.62l.43,1.24a.57.57,0,0,0,.46.39.56.56,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_231);"></path>
                                        <path d="M199.46,303.8c-2.43-4.35-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.42,5.42,0,0,1,2-1.94.52.52,0,0,1,.47-.05.64.64,0,0,1,.34.33L202,282.8a.56.56,0,0,1-.13.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.6.6,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-1,.15l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_232);"></path>
                                        <path d="M201.48,279c.6,1.08,1.21,2.16,1.82,3.24a.79.79,0,0,0,.78.35c2.94-.2,5.88-.31,8.82-.31h0c2.94,0,5.88.11,8.82.31a.79.79,0,0,0,.78-.35c.6-1.08,1.21-2.16,1.82-3.24s1.28-1.48-.35-1.94c-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_233);"></path>
                                        <path d="M196.28,318.64c-1.88-3-2.31-7.79-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14h.07V323H206.4a19.85,19.85,0,0,1-6.19-1.27,7.16,7.16,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_234);"></path>
                                        <path d="M229.36,318.54c1.87-3,2.31-7.79,2.68-13.52.09-1.54-.12.33-1.88.06-1,6.9-2.41,10.75-5.75,11.77-.23.07-6.38-.18-12.33-.14H212v6.17h7.22a19.92,19.92,0,0,0,6.2-1.27A7.23,7.23,0,0,0,229.36,318.54Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_235);"></path>
                                        <path d="M233,354.65c0-7.83,3.29-10,9.24-10.52,2.32-.21,5.81-.33,9.31-.35h.13c3.5,0,7,.14,9.31.35,5.95.54,9.23,2.69,9.23,10.52.08.78.77,18.21.77,18.25-.11,2-.25,3.9-.48,5.74-1.25,10.35-3.58,12.86-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.22-1.84-.36-3.79-.47-5.74,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M243.24,371.51a63.91,63.91,0,0,0,17.2,0,2.2,2.2,0,0,0,2.23-2.52V354.22c0-1.9-1-2.06-2.23-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06V369a2.2,2.2,0,0,0,2.23,2.52Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_236);"></path>
                                        <path d="M241.25,372.65a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.87c-.78.28-2.22.59-3.16.91-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,17.52,17.52,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.3,2.45-2.19ZM239,376c-.29.51-.13,4.62-.13,5.71,0,1.42-.28,2.74,1.45,3.46a4.35,4.35,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55,55,0,0,0-.24-5.72c-1.8-2.21-15.07-2.76-21.52-1.57C240.53,374.81,239.29,375.43,239,376Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_237);"></path>
                                        <path d="M263.05,377.16c.05,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_238);"></path>
                                        <path d="M265.14,372.49c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.53.53,0,0,0-.46-.05.7.7,0,0,0-.35.33l-2.12,3.88a.54.54,0,0,0,.13.64,4.16,4.16,0,0,1,.82,1.95c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.6.6,0,0,0-.15.62l.43,1.24a.59.59,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_239);"></path>
                                        <path d="M238.25,372.49c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.42,5.42,0,0,1,2-1.94.56.56,0,0,1,.47-.05.64.64,0,0,1,.34.33l2.13,3.88a.54.54,0,0,1-.14.64,4.16,4.16,0,0,0-.82,1.95c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.6.6,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-1,.15l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_240);"></path>
                                        <path d="M240.26,347.7l1.82,3.24a.79.79,0,0,0,.78.35q4.41-.3,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35l1.82-3.24c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_241);"></path>
                                        <path d="M235.06,387.33c-1.87-3-2.31-7.79-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14h.07v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.12,7.12,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_242);"></path>
                                        <path d="M268.14,387.23c1.87-3,2.31-7.79,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.37-.17-12.33-.14h-.06v6.17H258a19.86,19.86,0,0,0,6.2-1.27,7.15,7.15,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_243);"></path>
                                        <path d="M194.18,354.65c0-7.83,3.29-10,9.24-10.52,2.31-.21,5.81-.33,9.31-.35h.12c3.51,0,7,.14,9.31.35,6,.54,9.24,2.69,9.24,10.52.07.78.76,18.21.76,18.25-.11,2-.25,3.9-.47,5.74-1.25,10.35-3.59,12.86-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.23-1.84-.37-3.79-.48-5.74,0,0,.69-17.47.77-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M204.46,371.51a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.22-2.52V354.22c0-1.9-1-2.06-2.22-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06V369a2.2,2.2,0,0,0,2.23,2.52Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_244);"></path>
                                        <path d="M202.47,372.65a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.83,13.87c-.77.28-2.21.59-3.15.91-.26-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.6,2.6,0,0,0-2.65,2.86,17.65,17.65,0,0,1-3.7-1.62c-3.27-2.36-4.39-7.63-4.27-13.09,2.93.68,2.07.46,4.54,1,1.59.32,1.75-1.3,2.45-2.19ZM200.19,376c-.29.51-.13,4.62-.13,5.71,0,1.42-.29,2.74,1.45,3.46a4.34,4.34,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.79,1.79,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55,55,0,0,0-.24-5.72c-1.8-2.21-15.07-2.76-21.52-1.57C201.74,374.81,200.51,375.43,200.19,376Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_245);"></path>
                                        <path d="M224.26,377.16c.06,1.61,0,4.06,0,5.67a1.92,1.92,0,0,1-2.19,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,22.94,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_246);"></path>
                                        <path d="M226.36,372.49c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.56.56,0,0,0-.47-.05.64.64,0,0,0-.34.33l-2.12,3.88a.54.54,0,0,0,.13.64,4.16,4.16,0,0,1,.82,1.95c0,6.79-.05,9.51-.05,16.38a1.67,1.67,0,0,1-.51,1.22.6.6,0,0,0-.14.62l.43,1.24a.57.57,0,0,0,.46.39.56.56,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_247);"></path>
                                        <path d="M199.46,372.49c-2.43-4.34-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.42,5.42,0,0,1,2-1.94.56.56,0,0,1,.47-.05.64.64,0,0,1,.34.33l2.12,3.88a.54.54,0,0,1-.13.64,4.16,4.16,0,0,0-.82,1.95c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.6.6,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-1,.15l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_248);"></path>
                                        <path d="M201.48,347.7c.6,1.08,1.21,2.16,1.82,3.24a.79.79,0,0,0,.78.35q4.41-.3,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35c.6-1.08,1.21-2.16,1.82-3.24s1.28-1.48-.35-1.94c-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_249);"></path>
                                        <path d="M196.28,387.33c-1.88-3-2.31-7.79-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14h.07v6.18H206.4a20.16,20.16,0,0,1-6.19-1.28,7.12,7.12,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_250);"></path>
                                        <path d="M229.36,387.23c1.87-3,2.31-7.79,2.68-13.52.09-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.38-.17-12.33-.14H212v6.17h7.22a19.92,19.92,0,0,0,6.2-1.27A7.19,7.19,0,0,0,229.36,387.23Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_251);"></path>
                                        <path d="M233,423.34c0-7.83,3.29-10,9.24-10.52,2.32-.21,5.81-.33,9.31-.34h.13c3.5,0,7,.13,9.31.34,5.95.54,9.23,2.69,9.23,10.52.08.78.77,18.21.77,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.47.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M243.24,440.2a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.23-2.52V422.91c0-1.9-1-2.07-2.23-2.07h-17.2c-1.22,0-2.23.17-2.23,2.07v14.77a2.2,2.2,0,0,0,2.23,2.52Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_252);"></path>
                                        <path d="M241.25,441.34a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,17.52,17.52,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19ZM239,444.71c-.29.51-.13,4.63-.13,5.71,0,1.42-.28,2.74,1.45,3.46a4.24,4.24,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.58C240.53,443.5,239.29,444.12,239,444.71Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_253);"></path>
                                        <path d="M263.05,445.85c.05,1.61,0,4.06,0,5.67a1.93,1.93,0,0,1-2.2,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_254);"></path>
                                        <path d="M265.14,441.18c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.34,5.34,0,0,0-2-1.94.53.53,0,0,0-.46,0,.7.7,0,0,0-.35.33l-2.12,3.88a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.6.6,0,0,0-.15.62l.43,1.24a.59.59,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_255);"></path>
                                        <path d="M238.25,441.18c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.42,5.42,0,0,1,2-1.94.56.56,0,0,1,.47,0,.64.64,0,0,1,.34.33l2.13,3.88a.56.56,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.6.6,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-1,.15l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_256);"></path>
                                        <path d="M240.26,416.39l1.82,3.24a.79.79,0,0,0,.78.35q4.41-.3,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35l1.82-3.24c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_257);"></path>
                                        <path d="M235.06,456c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14h.07v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.12,7.12,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_258);"></path>
                                        <path d="M268.14,455.92c1.87-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.37-.17-12.33-.14h-.06v6.18H258a20.16,20.16,0,0,0,6.2-1.28,7.15,7.15,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_259);"></path>
                                        <path d="M194.18,423.34c0-7.83,3.29-10,9.24-10.52,2.31-.21,5.81-.33,9.31-.34h.12c3.51,0,7,.13,9.31.34,6,.54,9.24,2.69,9.24,10.52.07.78.76,18.21.76,18.25-.11,2-.25,3.9-.47,5.75-1.25,10.34-3.59,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.23-1.85-.37-3.8-.48-5.75,0,0,.69-17.47.77-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M204.46,440.2a63.91,63.91,0,0,0,17.2,0,2.19,2.19,0,0,0,2.22-2.52V422.91c0-1.9-1-2.07-2.22-2.07h-17.2c-1.22,0-2.23.17-2.23,2.07v14.77a2.2,2.2,0,0,0,2.23,2.52Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_260);"></path>
                                        <path d="M202.47,441.34a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.83,13.88c-.77.27-2.21.58-3.15.9-.26-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.6,2.6,0,0,0-2.65,2.86,17.65,17.65,0,0,1-3.7-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.51-.13,4.63-.13,5.71,0,1.42-.29,2.74,1.45,3.46a4.23,4.23,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.79,1.79,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.58C201.74,443.5,200.51,444.12,200.19,444.71Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_261);"></path>
                                        <path d="M224.26,445.85c.06,1.61,0,4.06,0,5.67a1.92,1.92,0,0,1-2.19,1.69,87.23,87.23,0,0,0-18.56,0,1.92,1.92,0,0,1-2.19-1.69c0-1.61,0-4.06,0-5.67-.09-3.06,22.86-2.42,22.94,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_262);"></path>
                                        <path d="M226.36,441.18c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.56.56,0,0,0-.47,0,.64.64,0,0,0-.34.33l-2.12,3.88a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79-.05,9.51-.05,16.38a1.67,1.67,0,0,1-.51,1.22.6.6,0,0,0-.14.62l.43,1.24a.57.57,0,0,0,.46.39.56.56,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_263);"></path>
                                        <path d="M199.46,441.18c-2.43-4.34-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.42,5.42,0,0,1,2-1.94.56.56,0,0,1,.47,0,.64.64,0,0,1,.34.33l2.12,3.88a.56.56,0,0,1-.13.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.6.6,0,0,1,.14.62l-.43,1.24a.56.56,0,0,1-1,.15l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_264);"></path>
                                        <path d="M201.48,416.39c.6,1.08,1.21,2.16,1.82,3.24a.79.79,0,0,0,.78.35q4.41-.3,8.82-.31h0q4.41,0,8.82.31a.79.79,0,0,0,.78-.35c.6-1.08,1.21-2.16,1.82-3.24s1.28-1.48-.35-1.94c-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_265);"></path>
                                        <path d="M196.28,456c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14h.07v6.18H206.4a20.16,20.16,0,0,1-6.19-1.28,7.12,7.12,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_266);"></path>
                                        <path d="M229.36,455.92c1.87-3,2.31-7.78,2.68-13.52.09-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.38-.17-12.33-.14H212v6.18h7.22a20.22,20.22,0,0,0,6.2-1.28A7.19,7.19,0,0,0,229.36,455.92Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_267);"></path>
                                        <path d="M233,492c0-7.83,3.29-10,9.24-10.52,2.32-.21,5.81-.33,9.31-.34h.13c3.5,0,7,.13,9.31.34,5.95.54,9.23,2.69,9.23,10.52.08.79.77,18.21.77,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M243.24,508.9a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V491.6c0-1.9-1-2.06-2.23-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,2.23,2.53Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_268);"></path>
                                        <path d="M241.25,510a156,156,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,17,17,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19ZM239,513.4c-.29.52-.13,4.63-.13,5.71,0,1.42-.28,2.74,1.45,3.46a4.25,4.25,0,0,0,2.21.16,81.17,81.17,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.58C240.53,512.19,239.29,512.81,239,513.4Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_269);"></path>
                                        <path d="M263.05,514.54c.05,1.61,0,4.06,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61,0-4.07,0-5.68-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_270);"></path>
                                        <path d="M265.14,509.87c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46,0,.68.68,0,0,0-.35.34l-2.12,3.87a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.61.61,0,0,0-.15.63l.43,1.23a.57.57,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_271);"></path>
                                        <path d="M238.25,509.87c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47,0,.63.63,0,0,1,.34.34l2.13,3.87a.56.56,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.61.61,0,0,1,.14.63l-.43,1.23a.55.55,0,0,1-.46.39.56.56,0,0,1-.54-.24l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_272);"></path>
                                        <path d="M240.26,485.08l1.82,3.25a.83.83,0,0,0,.78.35c2.94-.21,5.88-.31,8.82-.32h0c2.94,0,5.88.11,8.82.32a.83.83,0,0,0,.78-.35l1.82-3.25c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_273);"></path>
                                        <path d="M235.06,524.71c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14h.07v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.12,7.12,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_274);"></path>
                                        <path d="M268.14,524.61c1.87-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.37-.17-12.33-.14h-.06V529H258a20.16,20.16,0,0,0,6.2-1.28,7.11,7.11,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_275);"></path>
                                        <path d="M194.18,492c0-7.83,3.29-10,9.24-10.52,2.31-.21,5.81-.33,9.31-.34h.12c3.51,0,7,.13,9.31.34,6,.54,9.24,2.69,9.24,10.52.07.79.76,18.21.76,18.25-.11,2-.25,3.9-.47,5.75-1.25,10.34-3.59,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.23-1.85-.37-3.8-.48-5.75,0,0,.69-17.46.77-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M204.46,508.9a64.74,64.74,0,0,0,17.2,0,2.2,2.2,0,0,0,2.22-2.53V491.6c0-1.9-1-2.06-2.22-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,2.23,2.53Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_276);"></path>
                                        <path d="M202.47,510a156,156,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.83,13.88c-.77.27-2.21.58-3.15.9-.26-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.6,2.6,0,0,0-2.65,2.86,17.15,17.15,0,0,1-3.7-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.52-.13,4.63-.13,5.71,0,1.42-.29,2.74,1.45,3.46a4.24,4.24,0,0,0,2.21.16,81.17,81.17,0,0,1,18.63,0,1.79,1.79,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.58C201.74,512.19,200.51,512.81,200.19,513.4Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_277);"></path>
                                        <path d="M224.26,514.54c.06,1.61,0,4.06,0,5.68a1.92,1.92,0,0,1-2.19,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61,0-4.07,0-5.68-.09-3.06,22.86-2.42,22.94,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_278);"></path>
                                        <path d="M226.36,509.87c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.5,5.5,0,0,0-2-1.94.56.56,0,0,0-.47,0,.63.63,0,0,0-.34.34l-2.12,3.87a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79-.05,9.51-.05,16.38a1.67,1.67,0,0,1-.51,1.22.61.61,0,0,0-.14.63l.43,1.23a.56.56,0,0,0,1,.15l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_279);"></path>
                                        <path d="M199.46,509.87c-2.43-4.34-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47,0,.63.63,0,0,1,.34.34l2.12,3.87a.56.56,0,0,1-.13.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.61.61,0,0,1,.14.63l-.43,1.23a.55.55,0,0,1-.46.39.56.56,0,0,1-.54-.24l-.8-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_280);"></path>
                                        <path d="M201.48,485.08l1.82,3.25a.83.83,0,0,0,.78.35c2.94-.21,5.88-.31,8.82-.32h0c2.94,0,5.88.11,8.82.32a.83.83,0,0,0,.78-.35c.6-1.09,1.21-2.17,1.82-3.25s1.28-1.48-.35-1.94c-2-.57-6.51-.79-11.08-.77s-9.09.2-11.08.77c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_281);"></path>
                                        <path d="M196.28,524.71c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.76.22.07,6.37-.17,12.32-.14h.07v6.18H206.4a20.16,20.16,0,0,1-6.19-1.28,7.12,7.12,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_282);"></path>
                                        <path d="M229.36,524.61c1.87-3,2.31-7.78,2.68-13.52.09-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.76-.23.07-6.38-.17-12.33-.14H212V529h7.22a20.22,20.22,0,0,0,6.2-1.28,7.14,7.14,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_283);"></path>
                                        <path d="M233,560.72c0-7.83,3.29-10,9.24-10.52,2.32-.21,5.81-.33,9.31-.34h.13c3.5,0,7,.13,9.31.34,5.95.54,9.23,2.69,9.23,10.52.08.79.77,18.21.77,18.25-.11,1.95-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M243.24,577.59a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V560.29c0-1.9-1-2.06-2.23-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,2.23,2.53Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_284);"></path>
                                        <path d="M241.25,578.72a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,17,17,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19ZM239,582.09c-.29.52-.13,4.63-.13,5.71,0,1.42-.28,2.74,1.45,3.46a4.14,4.14,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55,55,0,0,0-.24-5.72c-1.8-2.22-15.07-2.76-21.52-1.57-1.83.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_285);"></path>
                                        <path d="M263.05,583.23c.05,1.61,0,4.06,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61,0-4.07,0-5.68-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_286);"></path>
                                        <path d="M265.14,578.56c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46,0,.68.68,0,0,0-.35.34l-2.12,3.87a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.61.61,0,0,0-.15.63l.43,1.23a.59.59,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_287);"></path>
                                        <path d="M238.25,578.56c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47,0,.63.63,0,0,1,.34.34l2.13,3.87a.56.56,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.61.61,0,0,1,.14.63l-.43,1.23a.56.56,0,0,1-1,.15l-.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_288);"></path>
                                        <path d="M240.26,553.77l1.82,3.25a.83.83,0,0,0,.78.35q4.41-.32,8.82-.31h0q4.41,0,8.82.31a.83.83,0,0,0,.78-.35l1.82-3.25c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_289);"></path>
                                        <path d="M235.06,593.4c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.77.22.06,6.37-.18,12.32-.15h.07v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.12,7.12,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_290);"></path>
                                        <path d="M268.14,593.3c1.87-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.77-.23.06-6.37-.18-12.33-.15h-.06v6.18H258a20.16,20.16,0,0,0,6.2-1.28,7.15,7.15,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_291);"></path>
                                        <path d="M194.18,560.72c0-7.83,3.29-10,9.24-10.52,2.31-.21,5.81-.33,9.31-.34h.12c3.51,0,7,.13,9.31.34,6,.54,9.24,2.69,9.24,10.52.07.79.76,18.21.76,18.25-.11,1.95-.25,3.9-.47,5.75-1.25,10.34-3.59,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.23-1.85-.37-3.8-.48-5.75,0,0,.69-17.46.77-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M204.46,577.59a64.74,64.74,0,0,0,17.2,0,2.2,2.2,0,0,0,2.22-2.53V560.29c0-1.9-1-2.06-2.22-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,2.23,2.53Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_292);"></path>
                                        <path d="M202.47,578.72a157.75,157.75,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.83,13.88c-.77.27-2.21.58-3.15.9-.26-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.6,2.6,0,0,0-2.65,2.86,17.15,17.15,0,0,1-3.7-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.52-.13,4.63-.13,5.71,0,1.42-.29,2.74,1.45,3.46a4.13,4.13,0,0,0,2.21.15,81.74,81.74,0,0,1,18.63,0,1.79,1.79,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55,55,0,0,0-.24-5.72c-1.8-2.22-15.07-2.76-21.52-1.57-1.84.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_293);"></path>
                                        <path d="M224.26,583.23c.06,1.61,0,4.06,0,5.68a1.92,1.92,0,0,1-2.19,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61,0-4.07,0-5.68-.09-3.06,22.86-2.42,22.94,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_294);"></path>
                                        <path d="M226.36,578.56c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.5,5.5,0,0,0-2-1.94.56.56,0,0,0-.47,0,.63.63,0,0,0-.34.34l-2.12,3.87a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79-.05,9.51-.05,16.38a1.67,1.67,0,0,1-.51,1.22.61.61,0,0,0-.14.63l.43,1.23a.57.57,0,0,0,.46.39.56.56,0,0,0,.54-.24l.8-1.16,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_295);"></path>
                                        <path d="M199.46,578.56c-2.43-4.34-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47,0,.63.63,0,0,1,.34.34l2.12,3.87a.56.56,0,0,1-.13.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.61.61,0,0,1,.14.63l-.43,1.23a.56.56,0,0,1-1,.15l-.8-1.16Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_296);"></path>
                                        <path d="M201.48,553.77,203.3,557a.83.83,0,0,0,.78.35q4.41-.32,8.82-.31h0q4.41,0,8.82.31a.83.83,0,0,0,.78-.35c.6-1.09,1.21-2.17,1.82-3.25s1.28-1.48-.35-1.94c-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_297);"></path>
                                        <path d="M196.28,593.4c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.74,5.75,11.77.22.06,6.37-.18,12.32-.15h.07v6.18H206.4a20.16,20.16,0,0,1-6.19-1.28,7.12,7.12,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_298);"></path>
                                        <path d="M229.36,593.3c1.87-3,2.31-7.78,2.68-13.52.09-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.77-.23.06-6.38-.18-12.33-.15H212v6.18h7.22a20.22,20.22,0,0,0,6.2-1.28,7.19,7.19,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_299);"></path>
                                        <path d="M233,629.41c0-7.83,3.29-10,9.24-10.52,2.32-.21,5.81-.33,9.31-.34h.13c3.5,0,7,.13,9.31.34,5.95.54,9.23,2.69,9.23,10.52.08.79.77,18.22.77,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.22-1.85-.36-3.8-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M243.24,646.28a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V629c0-1.9-1-2.06-2.23-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,2.23,2.53Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_300);"></path>
                                        <path d="M241.25,647.41a156,156,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.64-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a109.1,109.1,0,0,0-14.58,0,2.57,2.57,0,0,0-2.64,2.85,17,17,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19ZM239,650.78c-.29.52-.13,4.63-.13,5.71,0,1.42-.28,2.74,1.45,3.46a4.25,4.25,0,0,0,2.21.16,81.17,81.17,0,0,1,18.63,0,1.78,1.78,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55.08,55.08,0,0,0-.24-5.72c-1.8-2.21-15.07-2.75-21.52-1.57-1.83.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_301);"></path>
                                        <path d="M263.05,651.92c.05,1.61,0,4.07,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61,0-4.07,0-5.68-.09-3.06,22.86-2.42,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_302);"></path>
                                        <path d="M265.14,647.25c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46-.05.68.68,0,0,0-.35.34l-2.12,3.87a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,1-.51,1.22.61.61,0,0,0-.15.63l.43,1.23a.57.57,0,0,0,.46.39.54.54,0,0,0,.54-.24l.8-1.15,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_303);"></path>
                                        <path d="M238.25,647.25c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47-.05.63.63,0,0,1,.34.34l2.13,3.87a.56.56,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.61.61,0,0,1,.14.63l-.43,1.23a.55.55,0,0,1-.46.39.56.56,0,0,1-.54-.24l-.8-1.15,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_304);"></path>
                                        <path d="M240.26,622.46l1.82,3.25a.83.83,0,0,0,.78.35q4.41-.31,8.82-.31h0q4.41,0,8.82.31a.83.83,0,0,0,.78-.35l1.82-3.25c.52-.94,1.28-1.47-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76c-1.63.47-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_305);"></path>
                                        <path d="M235.06,662.09c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.75,5.75,11.77.22.06,6.37-.18,12.32-.15h.07v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.07,7.07,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_306);"></path>
                                        <path d="M268.14,662c1.87-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.75-5.75,11.77-.23.06-6.37-.18-12.33-.15h-.06v6.18H258a20.16,20.16,0,0,0,6.2-1.28,7.11,7.11,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_307);"></path>
                                        <path d="M194.18,629.41c0-7.83,3.29-10,9.24-10.52,2.31-.21,5.81-.33,9.31-.34h.12c3.51,0,7,.13,9.31.34,6,.54,9.24,2.69,9.24,10.52.07.79.76,18.22.76,18.25-.11,2-.25,3.9-.47,5.75-1.25,10.34-3.59,12.85-16,13h-5.73c-12.45-.16-14.78-2.67-16-13-.23-1.85-.37-3.8-.48-5.75,0,0,.69-17.46.77-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M204.46,646.28a64.74,64.74,0,0,0,17.2,0,2.2,2.2,0,0,0,2.22-2.53V629c0-1.9-1-2.06-2.22-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,2.23,2.53Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_308);"></path>
                                        <path d="M202.47,647.41a156,156,0,0,0,20.74.16c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.64-3.83,13.88c-.77.27-2.21.58-3.15.9-.26-1.14-.4-2.64-2.53-2.82a109.1,109.1,0,0,0-14.58,0,2.59,2.59,0,0,0-2.65,2.85,17.15,17.15,0,0,1-3.7-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.37c-.29.52-.13,4.63-.13,5.71,0,1.42-.29,2.74,1.45,3.46a4.24,4.24,0,0,0,2.21.16,81.17,81.17,0,0,1,18.63,0,1.79,1.79,0,0,0,1.39-.15c1.61-.72,1.6-2,1.6-3.46a55.08,55.08,0,0,0-.24-5.72c-1.8-2.21-15.07-2.75-21.52-1.57-1.84.34-3.07,1-3.39,1.55Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_309);"></path>
                                        <path d="M224.26,651.92c.06,1.61,0,4.07,0,5.68a1.92,1.92,0,0,1-2.19,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61,0-4.07,0-5.68-.09-3.06,22.86-2.42,22.94,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_310);"></path>
                                        <path d="M226.36,647.25c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.5,5.5,0,0,0-2-1.94.56.56,0,0,0-.47-.05.63.63,0,0,0-.34.34l-2.12,3.87a.56.56,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79-.05,9.51-.05,16.38a1.67,1.67,0,0,1-.51,1.22.61.61,0,0,0-.14.63l.43,1.23a.56.56,0,0,0,1,.15l.8-1.15,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_311);"></path>
                                        <path d="M199.46,647.25c-2.43-4.34-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47-.05.63.63,0,0,1,.34.34l2.12,3.87a.56.56,0,0,1-.13.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.67,1.67,0,0,0,.51,1.22.61.61,0,0,1,.14.63l-.43,1.23a.55.55,0,0,1-.46.39.56.56,0,0,1-.54-.24l-.8-1.15Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_312);"></path>
                                        <path d="M201.48,622.46l1.82,3.25a.83.83,0,0,0,.78.35q4.41-.31,8.82-.31h0q4.41,0,8.82.31a.83.83,0,0,0,.78-.35l1.82-3.25c.52-.94,1.28-1.47-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76c-1.63.47-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_313);"></path>
                                        <path d="M196.28,662.09c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.75,5.75,11.77.22.06,6.37-.18,12.32-.15h.07v6.18H206.4a20.16,20.16,0,0,1-6.19-1.28,7.07,7.07,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_314);"></path>
                                        <path d="M229.36,662c1.87-3,2.31-7.78,2.68-13.52.09-1.54-.12.33-1.88.07-1,6.89-2.41,10.75-5.75,11.77-.23.06-6.38-.18-12.33-.15H212v6.18h7.22a20.22,20.22,0,0,0,6.2-1.28,7.14,7.14,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_315);"></path>
                                        <path d="M233,698.1c0-7.83,3.29-10,9.24-10.52,2.32-.21,5.81-.33,9.31-.34h.13c3.5,0,7,.13,9.31.34,5.95.54,9.23,2.69,9.23,10.52.08.79.77,18.22.77,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.85-16,13h-5.73c-12.45-.17-14.78-2.68-16-13-.22-1.85-.36-3.79-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M243.24,715a64.74,64.74,0,0,0,17.2,0,2.21,2.21,0,0,0,2.23-2.53V697.67c0-1.9-1-2.06-2.23-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,2.23,2.53Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_316);"></path>
                                        <path d="M241.25,716.11a157.75,157.75,0,0,0,20.74.15c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.82,13.88c-.78.27-2.22.58-3.16.9-.25-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.58,2.58,0,0,0-2.64,2.86,17,17,0,0,1-3.71-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19ZM239,719.47c-.29.52-.13,4.63-.13,5.71,0,1.42-.28,2.75,1.45,3.46a4.25,4.25,0,0,0,2.21.16,80.62,80.62,0,0,1,18.63,0,1.75,1.75,0,0,0,1.39-.16c1.61-.71,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.57-1.83.33-3.07,1-3.39,1.54Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_317);"></path>
                                        <path d="M263.05,720.61c.05,1.61,0,4.07,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61,0-4.06,0-5.68-.09-3.06,22.86-2.41,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_318);"></path>
                                        <path d="M265.14,715.94c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46,0,.68.68,0,0,0-.35.34l-2.12,3.87a.55.55,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79,0,9.51,0,16.38a1.75,1.75,0,0,1-.51,1.23.59.59,0,0,0-.15.62l.43,1.24a.58.58,0,0,0,.46.38.54.54,0,0,0,.54-.24l.8-1.15,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_319);"></path>
                                        <path d="M238.25,715.94c-2.44-4.34-3.42-10.07-3.33-16.82,0-1.94-.1-4.66.92-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47,0,.63.63,0,0,1,.34.34l2.13,3.87a.56.56,0,0,1-.14.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.23.59.59,0,0,1,.14.62l-.43,1.24a.55.55,0,0,1-.46.38.56.56,0,0,1-.54-.24l-.8-1.15,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_320);"></path>
                                        <path d="M240.26,691.15l1.82,3.25a.83.83,0,0,0,.78.35c2.94-.21,5.88-.31,8.82-.32h0c2.94,0,5.88.11,8.82.32a.83.83,0,0,0,.78-.35l1.82-3.25c.52-.94,1.28-1.48-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_321);"></path>
                                        <path d="M235.06,730.78c-1.87-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.75,5.75,11.77.22.06,6.37-.18,12.32-.15h.07v6.18h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.07,7.07,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_322);"></path>
                                        <path d="M268.14,730.68c1.87-3,2.31-7.78,2.68-13.52.1-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.77-.23.06-6.37-.18-12.33-.15h-.06V735H258a20.16,20.16,0,0,0,6.2-1.28,7.15,7.15,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_323);"></path>
                                        <path d="M194.18,698.1c0-7.83,3.29-10,9.24-10.52,2.31-.21,5.81-.33,9.31-.34h.12c3.51,0,7,.13,9.31.34,6,.54,9.24,2.69,9.24,10.52.07.79.76,18.22.76,18.25-.11,2-.25,3.9-.47,5.75-1.25,10.34-3.59,12.85-16,13h-5.73c-12.45-.17-14.78-2.68-16-13-.23-1.85-.37-3.79-.48-5.75,0,0,.69-17.46.77-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M204.46,715a64.74,64.74,0,0,0,17.2,0,2.2,2.2,0,0,0,2.22-2.53V697.67c0-1.9-1-2.06-2.22-2.06h-17.2c-1.22,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,2.23,2.53Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_324);"></path>
                                        <path d="M202.47,716.11a157.75,157.75,0,0,0,20.74.15c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.65-.77s-.35,12.63-3.83,13.88c-.77.27-2.21.58-3.15.9-.26-1.14-.4-2.64-2.53-2.82a110.78,110.78,0,0,0-14.58,0,2.6,2.6,0,0,0-2.65,2.86,17.15,17.15,0,0,1-3.7-1.62c-3.27-2.36-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.32,1.75-1.3,2.45-2.19Zm-2.28,3.36c-.29.52-.13,4.63-.13,5.71,0,1.42-.29,2.75,1.45,3.46a4.24,4.24,0,0,0,2.21.16,80.62,80.62,0,0,1,18.63,0,1.75,1.75,0,0,0,1.39-.16c1.61-.71,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.07-2.76-21.52-1.57-1.84.33-3.07,1-3.39,1.54Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_325);"></path>
                                        <path d="M224.26,720.61c.06,1.61,0,4.07,0,5.68a1.92,1.92,0,0,1-2.19,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61,0-4.06,0-5.68-.09-3.06,22.86-2.41,22.94,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_326);"></path>
                                        <path d="M226.36,715.94c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.5,5.5,0,0,0-2-1.94.56.56,0,0,0-.47,0,.63.63,0,0,0-.34.34l-2.12,3.87a.55.55,0,0,0,.13.65,4.08,4.08,0,0,1,.82,1.94c0,6.79-.05,9.51-.05,16.38a1.71,1.71,0,0,1-.51,1.23.59.59,0,0,0-.14.62l.43,1.24a.56.56,0,0,0,1,.14l.8-1.15,0,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_327);"></path>
                                        <path d="M199.46,715.94c-2.43-4.34-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.5,5.5,0,0,1,2-1.94.56.56,0,0,1,.47,0,.63.63,0,0,1,.34.34l2.12,3.87a.55.55,0,0,1-.13.65,4.08,4.08,0,0,0-.82,1.94c0,6.79,0,9.51,0,16.38a1.71,1.71,0,0,0,.51,1.23.59.59,0,0,1,.14.62l-.43,1.24a.55.55,0,0,1-.46.38.56.56,0,0,1-.54-.24l-.8-1.15Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_328);"></path>
                                        <path d="M201.48,691.15l1.82,3.25a.83.83,0,0,0,.78.35c2.94-.21,5.88-.31,8.82-.32h0c2.94,0,5.88.11,8.82.32a.83.83,0,0,0,.78-.35c.6-1.09,1.21-2.17,1.82-3.25s1.28-1.48-.35-1.94c-2-.57-6.51-.79-11.08-.76s-9.09.19-11.08.76c-1.63.46-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_329);"></path>
                                        <path d="M196.28,730.78c-1.88-3-2.31-7.78-2.68-13.52-.1-1.54.12.33,1.88.07,1,6.89,2.41,10.75,5.75,11.77.22.06,6.37-.18,12.32-.15h.07v6.18H206.4a20.16,20.16,0,0,1-6.19-1.28,7.07,7.07,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_330);"></path>
                                        <path d="M229.36,730.68c1.87-3,2.31-7.78,2.68-13.52.09-1.54-.12.33-1.88.07-1,6.89-2.41,10.74-5.75,11.77-.23.06-6.38-.18-12.33-.15H212V735h7.22a20.22,20.22,0,0,0,6.2-1.28,7.19,7.19,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_331);"></path>
                                        <path d="M121.88,766.93c0-7.83,3.29-10,9.24-10.51,2.31-.21,5.81-.34,9.31-.35h.12c3.51,0,7,.14,9.31.35,6,.54,9.24,2.68,9.24,10.51.07.79.76,18.22.76,18.25-.11,2-.25,3.9-.47,5.75-1.25,10.34-3.58,12.86-16,13h-5.73c-12.45-.16-14.78-2.68-16-13-.22-1.85-.37-3.79-.48-5.75,0,0,.69-17.46.77-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M132.16,783.8a64.74,64.74,0,0,0,17.2,0,2.2,2.2,0,0,0,2.22-2.53V766.5c0-1.9-1-2.06-2.22-2.06h-17.2c-1.23,0-2.23.16-2.23,2.06v14.77A2.21,2.21,0,0,0,132.16,783.8Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_332);"></path>
                                        <path d="M130.17,784.94a157.73,157.73,0,0,0,20.74.15c.64.89.86,2.07,2.32,1.75.67-.15,3.63-.61,4.66-.77s-.35,12.64-3.83,13.88c-.78.28-2.21.58-3.15.9-.26-1.13-.4-2.63-2.53-2.82a109.25,109.25,0,0,0-14.59,0,2.58,2.58,0,0,0-2.64,2.85,17.47,17.47,0,0,1-3.71-1.62c-3.26-2.35-4.38-7.62-4.27-13.09,2.94.69,2.08.47,4.55,1,1.59.33,1.75-1.3,2.45-2.19Zm-2.28,3.36c-.29.52-.13,4.63-.13,5.71,0,1.43-.29,2.75,1.45,3.46a4.24,4.24,0,0,0,2.21.16,80.53,80.53,0,0,1,18.62,0,1.77,1.77,0,0,0,1.4-.16c1.6-.71,1.6-2,1.6-3.46a51.83,51.83,0,0,0-.25-5.71c-1.79-2.22-15.06-2.76-21.51-1.57-1.84.33-3.07,1-3.4,1.54Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_333);"></path>
                                        <path d="M152,789.44c.06,1.61,0,4.07,0,5.68a1.92,1.92,0,0,1-2.19,1.68,87.23,87.23,0,0,0-18.56,0,1.91,1.91,0,0,1-2.19-1.68c0-1.61,0-4.06,0-5.68-.09-3.06,22.86-2.41,22.94,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_334);"></path>
                                        <path d="M154.06,784.77c2.43-4.34,3.41-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.5,5.5,0,0,0-2-1.94.55.55,0,0,0-.47,0,.64.64,0,0,0-.34.33l-2.12,3.87a.55.55,0,0,0,.13.65,4.12,4.12,0,0,1,.82,1.94c0,6.79-.05,9.52-.05,16.38a1.69,1.69,0,0,1-.51,1.23.59.59,0,0,0-.14.62l.43,1.24a.56.56,0,0,0,1,.14l.8-1.15,0-.05Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_335);"></path>
                                        <path d="M127.16,784.77c-2.43-4.34-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.5,5.5,0,0,1,2-1.94.55.55,0,0,1,.47,0,.64.64,0,0,1,.34.33l2.12,3.87a.55.55,0,0,1-.13.65,4.12,4.12,0,0,0-.82,1.94c0,6.79.05,9.52.05,16.38a1.69,1.69,0,0,0,.51,1.23.59.59,0,0,1,.14.62l-.43,1.24a.55.55,0,0,1-.46.38A.56.56,0,0,1,128,786l-.8-1.15Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_336);"></path>
                                        <path d="M129.18,760l1.82,3.25a.83.83,0,0,0,.78.35q4.41-.32,8.82-.31h0q4.41,0,8.82.31a.83.83,0,0,0,.78-.35L152,760c.52-.93,1.27-1.47-.35-1.94-2-.57-6.51-.79-11.08-.76s-9.1.19-11.08.76c-1.63.47-.88,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_337);"></path>
                                        <path d="M124,799.61c-1.88-3-2.31-7.78-2.68-13.51-.1-1.55.11.33,1.88.06,1,6.89,2.41,10.75,5.75,11.77.22.07,6.37-.18,12.32-.15h.07V804H134.1a20.28,20.28,0,0,1-6.2-1.28,7.08,7.08,0,0,1-3.92-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_338);"></path>
                                        <path d="M157.06,799.51c1.87-3,2.31-7.78,2.67-13.51.1-1.55-.11.33-1.87.06-1,6.89-2.41,10.75-5.76,11.77-.22.07-6.37-.18-12.32-.15h-.07v6.18h7.22a20.28,20.28,0,0,0,6.2-1.28,7.14,7.14,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_339);"></path>
                                        <path d="M83.1,766.93c0-7.83,3.28-10,9.24-10.51,2.31-.21,5.8-.34,9.31-.35h.12c3.51,0,7,.14,9.31.35,6,.54,9.24,2.68,9.24,10.51.07.79.76,18.22.76,18.25-.11,2-.25,3.9-.47,5.75-1.25,10.34-3.59,12.86-16,13H98.85c-12.45-.16-14.78-2.68-16-13-.23-1.85-.37-3.79-.48-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M93.38,783.8a64.66,64.66,0,0,0,17.19,0,2.2,2.2,0,0,0,2.23-2.53V766.5c0-1.9-1-2.06-2.23-2.06H93.38c-1.23,0-2.23.16-2.23,2.06v14.77A2.21,2.21,0,0,0,93.38,783.8Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_340);"></path>
                                        <path d="M91.39,784.94a157.59,157.59,0,0,0,20.73.15c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.66-.77s-.36,12.64-3.83,13.88c-.78.28-2.21.58-3.15.9-.26-1.13-.4-2.63-2.53-2.82A109.25,109.25,0,0,0,95,798a2.58,2.58,0,0,0-2.64,2.85,17.47,17.47,0,0,1-3.71-1.62c-3.26-2.35-4.38-7.62-4.27-13.09,2.93.69,2.07.47,4.55,1,1.59.33,1.75-1.3,2.45-2.19ZM89.1,788.3c-.28.52-.12,4.63-.12,5.71,0,1.43-.29,2.75,1.45,3.46a4.24,4.24,0,0,0,2.21.16,80.53,80.53,0,0,1,18.62,0,1.77,1.77,0,0,0,1.4-.16c1.6-.71,1.6-2,1.6-3.46a54.44,54.44,0,0,0-.25-5.71c-1.79-2.22-15.06-2.76-21.51-1.57-1.84.33-3.07,1-3.4,1.54Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_341);"></path>
                                        <path d="M113.18,789.44c.06,1.61,0,4.07,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.14,87.14,0,0,0-18.55,0,1.92,1.92,0,0,1-2.2-1.68c0-1.61,0-4.06,0-5.68-.08-3.06,22.87-2.41,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_342);"></path>
                                        <path d="M115.27,784.77c2.44-4.34,3.42-10.07,3.33-16.82,0-1.94.1-4.66-.92-6.4a5.5,5.5,0,0,0-2-1.94.55.55,0,0,0-.47,0,.61.61,0,0,0-.34.33l-2.13,3.87a.57.57,0,0,0,.14.65,4.12,4.12,0,0,1,.82,1.94c0,6.79,0,9.52,0,16.38a1.69,1.69,0,0,1-.51,1.23.59.59,0,0,0-.14.62l.43,1.24a.55.55,0,0,0,.46.38.56.56,0,0,0,.54-.24l.79-1.15S115.27,784.79,115.27,784.77Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_343);"></path>
                                        <path d="M88.38,784.77C86,780.43,85,774.7,85.05,768c0-1.94-.09-4.66.93-6.4a5.42,5.42,0,0,1,2-1.94.55.55,0,0,1,.47,0,.64.64,0,0,1,.34.33l2.12,3.87a.55.55,0,0,1-.13.65,4.12,4.12,0,0,0-.82,1.94c0,6.79,0,9.52,0,16.38A1.69,1.69,0,0,0,90.5,784a.59.59,0,0,1,.14.62l-.43,1.24a.58.58,0,0,1-.46.38.56.56,0,0,1-.54-.24l-.8-1.15Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_344);"></path>
                                        <path d="M90.4,760l1.81,3.25a.86.86,0,0,0,.79.35q4.41-.32,8.82-.31h0c3,0,5.88.1,8.83.31a.83.83,0,0,0,.78-.35l1.81-3.25c.53-.93,1.28-1.47-.35-1.94-2-.57-6.5-.79-11.08-.76s-9.09.19-11.07.76c-1.63.47-.88,1-.36,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_345);"></path>
                                        <path d="M85.19,799.61c-1.87-3-2.31-7.78-2.67-13.51-.1-1.55.11.33,1.87.06,1,6.89,2.41,10.75,5.76,11.77.22.07,6.37-.18,12.32-.15h.07V804H95.32a20.22,20.22,0,0,1-6.2-1.28,7.14,7.14,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_346);"></path>
                                        <path d="M118.27,799.51c1.88-3,2.31-7.78,2.68-13.51.1-1.55-.11.33-1.88.06-1,6.89-2.41,10.75-5.75,11.77-.22.07-6.37-.18-12.32-.15h-.07v6.18h7.22a20.28,20.28,0,0,0,6.2-1.28,7.08,7.08,0,0,0,3.92-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_347);"></path>
                                        <path d="M200,766.93c0-7.83,3.28-10,9.24-10.51,2.31-.21,5.8-.34,9.31-.35h.12c3.51,0,7,.14,9.31.35,6,.54,9.24,2.68,9.24,10.51.07.79.76,18.22.76,18.25-.11,2-.25,3.9-.47,5.75-1.25,10.34-3.59,12.86-16,13h-5.73c-12.45-.16-14.78-2.68-16-13-.23-1.85-.37-3.79-.48-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M210.32,783.8a64.66,64.66,0,0,0,17.19,0,2.21,2.21,0,0,0,2.23-2.53V766.5c0-1.9-1-2.06-2.23-2.06H210.32c-1.23,0-2.23.16-2.23,2.06v14.77A2.21,2.21,0,0,0,210.32,783.8Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_348);"></path>
                                        <path d="M208.33,784.94a157.59,157.59,0,0,0,20.73.15c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.66-.77s-.36,12.64-3.83,13.88c-.78.28-2.22.58-3.15.9-.26-1.13-.41-2.63-2.53-2.82A109.25,109.25,0,0,0,212,798a2.58,2.58,0,0,0-2.64,2.85,17.24,17.24,0,0,1-3.71-1.62c-3.26-2.35-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.55,1,1.58.33,1.74-1.3,2.45-2.19ZM206,788.3c-.29.52-.12,4.63-.12,5.71,0,1.43-.29,2.75,1.45,3.46a4.24,4.24,0,0,0,2.21.16,80.53,80.53,0,0,1,18.62,0,1.75,1.75,0,0,0,1.39-.16c1.61-.71,1.6-2,1.61-3.46a54.44,54.44,0,0,0-.25-5.71c-1.8-2.22-15.06-2.76-21.52-1.57-1.83.33-3.06,1-3.39,1.54Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_349);"></path>
                                        <path d="M230.12,789.44c.06,1.61,0,4.07,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.14,87.14,0,0,0-18.55,0,1.92,1.92,0,0,1-2.2-1.68c0-1.61.05-4.06,0-5.68-.08-3.06,22.86-2.41,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_350);"></path>
                                        <path d="M232.21,784.77c2.44-4.34,3.42-10.07,3.33-16.82,0-1.94.1-4.66-.92-6.4a5.5,5.5,0,0,0-2-1.94.55.55,0,0,0-.47,0,.61.61,0,0,0-.34.33l-2.13,3.87a.56.56,0,0,0,.14.65,4.12,4.12,0,0,1,.82,1.94c0,6.79,0,9.52,0,16.38a1.73,1.73,0,0,1-.51,1.23.57.57,0,0,0-.14.62l.43,1.24a.55.55,0,0,0,.46.38.56.56,0,0,0,.54-.24l.8-1.15,0-.05Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_351);"></path>
                                        <path d="M205.32,784.77c-2.43-4.34-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.42,5.42,0,0,1,2-1.94.55.55,0,0,1,.47,0,.64.64,0,0,1,.34.33l2.12,3.87a.55.55,0,0,1-.13.65,4.12,4.12,0,0,0-.82,1.94c0,6.79,0,9.52,0,16.38a1.7,1.7,0,0,0,.52,1.23.61.61,0,0,1,.14.62l-.43,1.24a.58.58,0,0,1-.46.38.55.55,0,0,1-.54-.24l-.8-1.15Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_352);"></path>
                                        <path d="M207.34,760l1.81,3.25a.86.86,0,0,0,.79.35q4.41-.32,8.82-.31h0q4.41,0,8.82.31a.85.85,0,0,0,.79-.35L230.2,760c.52-.93,1.27-1.47-.36-1.94-2-.57-6.5-.79-11.08-.76s-9.09.19-11.07.76c-1.63.47-.88,1-.36,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_353);"></path>
                                        <path d="M202.13,799.61c-1.87-3-2.31-7.78-2.67-13.51-.1-1.55.11.33,1.87.06,1,6.89,2.41,10.75,5.76,11.77.22.07,6.37-.18,12.32-.15h.07V804h-7.22a20.22,20.22,0,0,1-6.2-1.28,7.14,7.14,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_354);"></path>
                                        <path d="M235.21,799.51c1.88-3,2.31-7.78,2.68-13.51.1-1.55-.12.33-1.88.06-1,6.89-2.41,10.75-5.75,11.77-.22.07-6.37-.18-12.32-.15h-.07v6.18h7.22a20.28,20.28,0,0,0,6.2-1.28,7.08,7.08,0,0,0,3.92-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_355);"></path>
                                        <path d="M161.26,766.93c0-7.83,3.28-10,9.24-10.51,2.31-.21,5.8-.34,9.31-.35h.12c3.5,0,7,.14,9.31.35,5.95.54,9.24,2.68,9.24,10.51.07.79.76,18.22.76,18.25-.11,2-.25,3.9-.48,5.75-1.25,10.34-3.58,12.86-16,13H177c-12.44-.16-14.78-2.68-16-13-.22-1.85-.36-3.79-.47-5.75,0,0,.69-17.46.76-18.25Z" transform="translate(2.61 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M171.54,783.8a64.66,64.66,0,0,0,17.19,0,2.21,2.21,0,0,0,2.23-2.53V766.5c0-1.9-1-2.06-2.23-2.06H171.54c-1.23,0-2.23.16-2.23,2.06v14.77a2.21,2.21,0,0,0,2.23,2.53Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_356);"></path>
                                        <path d="M169.54,784.94a157.76,157.76,0,0,0,20.74.15c.65.89.86,2.07,2.33,1.75.66-.15,3.62-.61,4.66-.77s-.36,12.64-3.83,13.88c-.78.28-2.22.58-3.16.9-.25-1.13-.4-2.63-2.52-2.82a109.25,109.25,0,0,0-14.59,0,2.57,2.57,0,0,0-2.64,2.85,17,17,0,0,1-3.71-1.62c-3.27-2.35-4.39-7.62-4.27-13.09,2.93.69,2.07.47,4.54,1,1.59.33,1.75-1.3,2.45-2.19Zm-2.28,3.36c-.29.52-.12,4.63-.12,5.71,0,1.43-.29,2.75,1.45,3.46a4.24,4.24,0,0,0,2.21.16,80.53,80.53,0,0,1,18.62,0,1.75,1.75,0,0,0,1.39-.16c1.61-.71,1.6-2,1.6-3.46a54.74,54.74,0,0,0-.24-5.71c-1.8-2.22-15.06-2.76-21.52-1.57-1.83.33-3.07,1-3.39,1.54Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_357);"></path>
                                        <path d="M191.34,789.44c0,1.61,0,4.07,0,5.68a1.93,1.93,0,0,1-2.2,1.68,87.14,87.14,0,0,0-18.55,0,1.92,1.92,0,0,1-2.2-1.68c0-1.61.05-4.06,0-5.68-.09-3.06,22.86-2.41,23,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_358);"></path>
                                        <path d="M193.43,784.77c2.44-4.34,3.42-10.07,3.33-16.82,0-1.94.09-4.66-.93-6.4a5.42,5.42,0,0,0-2-1.94.53.53,0,0,0-.46,0,.61.61,0,0,0-.34.33l-2.13,3.87a.55.55,0,0,0,.13.65,4.13,4.13,0,0,1,.83,1.94c0,6.79,0,9.52,0,16.38a1.73,1.73,0,0,1-.51,1.23.59.59,0,0,0-.15.62l.44,1.24a.55.55,0,0,0,.45.38.54.54,0,0,0,.54-.24l.8-1.15,0-.05Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_359);"></path>
                                        <path d="M166.54,784.77c-2.43-4.34-3.41-10.07-3.33-16.82,0-1.94-.09-4.66.93-6.4a5.42,5.42,0,0,1,2-1.94.53.53,0,0,1,.46,0,.63.63,0,0,1,.35.33l2.12,3.87a.55.55,0,0,1-.13.65,4.12,4.12,0,0,0-.82,1.94c0,6.79,0,9.52,0,16.38a1.73,1.73,0,0,0,.51,1.23.59.59,0,0,1,.15.62l-.43,1.24a.58.58,0,0,1-.46.38.54.54,0,0,1-.54-.24l-.8-1.15,0-.05Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_360);"></path>
                                        <path d="M168.55,760l1.82,3.25a.83.83,0,0,0,.78.35q4.41-.32,8.82-.31h0q4.41,0,8.82.31a.83.83,0,0,0,.78-.35l1.82-3.25c.53-.93,1.28-1.47-.35-1.94-2-.57-6.5-.79-11.08-.76s-9.09.19-11.08.76c-1.63.47-.87,1-.35,1.94Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_361);"></path>
                                        <path d="M163.35,799.61c-1.87-3-2.31-7.78-2.68-13.51-.1-1.55.12.33,1.88.06,1,6.89,2.41,10.75,5.75,11.77.23.07,6.37-.18,12.33-.15h.06V804h-7.21a20.16,20.16,0,0,1-6.2-1.28,7.11,7.11,0,0,1-3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_362);"></path>
                                        <path d="M196.43,799.51c1.88-3,2.31-7.78,2.68-13.51.1-1.55-.12.33-1.88.06-1,6.89-2.41,10.75-5.75,11.77-.22.07-6.37-.18-12.32-.15h-.07v6.18h7.21a20.16,20.16,0,0,0,6.2-1.28,7.07,7.07,0,0,0,3.93-3.07Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_363);"></path>
                                        <g style="mask:url(#mask-19);">
                                        <path d="M81.72,59.57a24.73,24.73,0,0,1-5.24-3c-4.11-2.75-4-4.51-3.44-9.25,1-8.1-.3-12.1,7.78-14,3.64-.87,10.07-.61,14-.85,4.55-.29,6.88,3.31,7.62,7.42.51,2.84.38,5.1,1,7.5.88,3.15,1,6.39-3.25,8.81a35.91,35.91,0,0,1-6.56,3.38A107.92,107.92,0,0,1,81.72,59.57Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_364);"></path>
                                        </g>
                                        <path d="M96,40.23Q94.46,47,93,53.76c.78,1,.9.29,1.33-1.54l1.32-5.61A15.09,15.09,0,0,0,96,40.23Z" transform="translate(2.61 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#mask-20);">
                                        <path d="M80.47,40.77q1.5,6.76,3,13.54c-.78,1-.9.28-1.33-1.55l-1.32-5.61a15.08,15.08,0,0,1-.34-6.38Z" transform="translate(2.61 0)" style="fill:#4d4d4d;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M80,58.19l-.45.5a3.29,3.29,0,0,1-2,1.44l-3.69,1.16c-2.19.69-2,.22-2.79.43a4.57,4.57,0,0,0-2,1.64c.13,2,.63,2.06,1.91,1.36.34-.19.91-.4,1.35-.66,1.15-.69.07-.82,1.23-1.17l4.52-1.37c1.38-.42,1.28-.51,2.32-1.49l1.55-1.46a3.93,3.93,0,0,1-2-.38Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_365);"></path>
                                        <path d="M96.14,57.59c-2.77,1.23-6,1-8.93,1s-6.79.44-8.95-1.24c1.95,3.14,3.27,6.21,3,9.13H94.69C93.83,63.11,94.84,60.31,96.14,57.59Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_366);"></path>
                                        <path d="M70.13,69.36c-.4,3.25,3.77,4.51,9.91,4.9a121,121,0,0,0,16.16,0c6.15-.39,10.31-1.65,9.91-4.9-2.19-7.11-33.86-6.87-36,0Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_367);"></path>
                                        <path d="M88.34,66.68c8.85,0,16,1.64,16,3.66S97.19,74,88.34,74s-16-1.64-16-3.65S79.5,66.68,88.34,66.68Z" transform="translate(2.61 0)" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_368);"></path>
                                        <path d="M75.24,65.81a52.15,52.15,0,0,1,25.29-.21c-3.85-2.1-9.09-2.91-13.25-2.83C82.82,62.85,79.42,64,75.24,65.81Z" transform="translate(2.61 0)" style="fill:#464546;fill-rule:evenodd;"></path>
                                        <path d="M96.17,69l-2.38,1.85a.64.64,0,0,0-.21.86,1,1,0,0,0,1,.45l6.13-.39a1,1,0,0,0,.77-.4c.9-1.32-4.36-3.08-5.27-2.37Z" transform="translate(2.61 0)" style="fill:#4f4f4f;fill-rule:evenodd;"></path>
                                        <path d="M83.16,68.24a.61.61,0,0,0,.1.77l1.68,1.8a1,1,0,0,0,.77.31h5.42a1,1,0,0,0,.74-.28l1.73-1.66a.63.63,0,0,0,.14-.78c-.57-1.07-10.14-.9-10.58-.16Z" transform="translate(2.61 0)" style="fill:#252525;fill-rule:evenodd;"></path>
                                        <path d="M80.24,68.77l2.38,1.85a.64.64,0,0,1,.2.86,1,1,0,0,1-.95.45l-6.13-.39a1,1,0,0,1-.77-.4c-.9-1.32,4.36-3.08,5.27-2.37Z" transform="translate(2.61 0)" style="fill:#252525;fill-rule:evenodd;"></path>
                                        <path d="M88.57,69.48c2,0,3.54.71,3.54,1.59s-1.58,1.58-3.54,1.58S85,71.94,85,71.07,86.62,69.48,88.57,69.48Z" transform="translate(2.61 0)" style="fill:#1d1d1f;fill-rule:evenodd;"></path>
                                        <path d="M88.6,70.18c1.6,0,2.91.47,2.91,1.06s-1.31,1.07-2.91,1.07-2.92-.48-2.92-1.07S87,70.18,88.6,70.18Z" transform="translate(2.61 0)" style="fill:#8e8a95;fill-rule:evenodd;"></path>
                                        <polygon points="70.99 3.72 76.5 3.72 76.5 13.3 72.26 13.3 70.99 3.72" style="fill:#2b2a29;fill-rule:evenodd;"></polygon>
                                        <polygon points="105.23 20.5 105.31 17.82 115.53 16.12 115.68 18.65 105.23 20.5" style="fill-rule:evenodd;fill:url(#Безымянный_градиент_369);"></polygon>
                                        <ellipse cx="106.86" cy="18.87" rx="0.88" ry="0.85" style="fill:#575757;"></ellipse>
                                    </svg>
                                    </div>
                                    <!-- Левая сторона-->
                                    <div class="car-place--svg--places car-place-left-left--bus bus-top-first @if(isset($booking_seats) && in_array('1-место', $booking_seats)) car-place--booked @endif" data-car-place="1-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-right--bus bus-top-first @if(isset($booking_seats) && in_array('2-место', $booking_seats)) car-place--booked @endif" data-car-place="2-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-left--bus bus-top-second @if(isset($booking_seats) && in_array('3-место', $booking_seats)) car-place--booked @endif" data-car-place="3-место" data-place-booked="Место забронировано">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-right--bus bus-top-second @if(isset($booking_seats) && in_array('4-место', $booking_seats)) car-place--booked @endif" data-car-place="4-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-left--bus bus-top-three @if(isset($booking_seats) && in_array('5-место', $booking_seats)) car-place--booked @endif" data-car-place="5-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-right--bus bus-top-three @if(isset($booking_seats) && in_array('6-место', $booking_seats)) car-place--booked @endif" data-car-place=6-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-left--bus bus-top-four @if(isset($booking_seats) && in_array('7-место', $booking_seats)) car-place--booked @endif" data-car-place="7-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-right--bus bus-top-four @if(isset($booking_seats) && in_array('8-место', $booking_seats)) car-place--booked @endif" data-car-place="8-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-left--bus bus-top-five @if(isset($booking_seats) && in_array('9-место', $booking_seats)) car-place--booked @endif" data-car-place="9-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-right--bus bus-top-five @if(isset($booking_seats) && in_array('10-место', $booking_seats)) car-place--booked @endif" data-car-place="10-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-left--bus bus-top-six @if(isset($booking_seats) && in_array('11-место', $booking_seats)) car-place--booked @endif" data-car-place="11-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-right--bus bus-top-six @if(isset($booking_seats) && in_array('12-место', $booking_seats)) car-place--booked @endif" data-car-place="12-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-left--bus bus-top-seven @if(isset($booking_seats) && in_array('13-место', $booking_seats)) car-place--booked @endif" data-car-place="13-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-right--bus bus-top-seven @if(isset($booking_seats) && in_array('14-место', $booking_seats)) car-place--booked @endif" data-car-place="14-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-left--bus bus-top-eight @if(isset($booking_seats) && in_array('15-место', $booking_seats)) car-place--booked @endif" data-car-place="15-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-right--bus bus-top-eight @if(isset($booking_seats) && in_array('16-место', $booking_seats)) car-place--booked @endif" data-car-place="16-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-left--bus bus-top-nine @if(isset($booking_seats) && in_array('17-место', $booking_seats)) car-place--booked @endif" data-car-place="17-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-left-right--bus bus-top-nine @if(isset($booking_seats) && in_array('18-место', $booking_seats)) car-place--booked @endif" data-car-place="18-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <!-- Правая сторона-->
                                    <div class="car-place--svg--places car-place-right-left--bus bus-top-second @if(isset($booking_seats) && in_array('19-место', $booking_seats)) car-place--booked @endif" data-car-place="19-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-right--bus bus-top-second @if(isset($booking_seats) && in_array('20-место', $booking_seats)) car-place--booked @endif" data-car-place="20-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-left--bus bus-top-three @if(isset($booking_seats) && in_array('21-место', $booking_seats)) car-place--booked @endif" data-car-place="21-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-right--bus bus-top-three @if(isset($booking_seats) && in_array('22-место', $booking_seats)) car-place--booked @endif" data-car-place="22-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-left--bus bus-top-four @if(isset($booking_seats) && in_array('23-место', $booking_seats)) car-place--booked @endif" data-car-place="23-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-right--bus bus-top-four @if(isset($booking_seats) && in_array('24-место', $booking_seats)) car-place--booked @endif" data-car-place="24-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-left--bus bus-top-five @if(isset($booking_seats) && in_array('25-место', $booking_seats)) car-place--booked @endif" data-car-place="25-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-right--bus bus-top-five @if(isset($booking_seats) && in_array('26-место', $booking_seats)) car-place--booked @endif" data-car-place="26-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-left--bus bus-top-six @if(isset($booking_seats) && in_array('27-место', $booking_seats)) car-place--booked @endif" data-car-place="27-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-right--bus bus-top-six @if(isset($booking_seats) && in_array('28-место', $booking_seats)) car-place--booked @endif" data-car-place="28-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-left--bus bus-top-seven @if(isset($booking_seats) && in_array('29-место', $booking_seats)) car-place--booked @endif" data-car-place="29-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-right--bus bus-top-seven @if(isset($booking_seats) && in_array('30-место', $booking_seats)) car-place--booked @endif" data-car-place="30-место" data-place-booked="Место забронировано">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-left--bus bus-top-eight @if(isset($booking_seats) && in_array('31-место', $booking_seats)) car-place--booked @endif" data-car-place="31-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-right--bus bus-top-eight @if(isset($booking_seats) && in_array('32-место', $booking_seats)) car-place--booked @endif" data-car-place="32-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-left--bus bus-top-nine @if(isset($booking_seats) && in_array('33-место', $booking_seats)) car-place--booked @endif" data-car-place="33-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-right-right--bus bus-top-nine @if(isset($booking_seats) && in_array('34-место', $booking_seats)) car-place--booked @endif" data-car-place="34-место">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <!-- Задние места-->
                                    <div class="car-place--svg--places car-place-back-1--bus @if(isset($booking_seats) && in_array('Заднее место 1', $booking_seats)) car-place--booked @endif" data-car-place="Заднее место 1">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-back-2--bus @if(isset($booking_seats) && in_array('Заднее место 2', $booking_seats)) car-place--booked @endif" data-car-place="Заднее место 2">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-back-3--bus @if(isset($booking_seats) && in_array('Заднее место 3', $booking_seats)) car-place--booked @endif" data-car-place="Заднее место 3">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-back-4--bus @if(isset($booking_seats) && in_array('Заднее место 4', $booking_seats)) car-place--booked @endif" data-car-place="Заднее место 4" data-place-booked="Место забронировано">
                                    <svg class="icon icon-bus-place-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#bus-place-booked')}}"></use>
                                    </svg>
                                    </div>
                                </div>
                                @endif
                                @if(optional($trip->car)->template == 'car-choise-miniven')
                                <div class="col-xl-5 car-place--position car-choise-miniven @if(optional($trip->car)->template == 'car-choise-miniven') active @endif">
                                    <div class="car-place--svg">
                                    <svg class="icon icon-miniven " id="e4fbc52a-caa4-49e0-97d3-1b3e653d5260" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 184.5 377.97">
                                        <defs>
                                        <lineargradient id="bec3d7aa-a4c0-470c-90fa-eb55ca4365a2" x1="4390.31" y1="-3386.1" x2="4390.31" y2="-3208.41" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="a6408973-8235-45e3-8e3a-ff990c1232bb" x1="4296.03" y1="-1809.62" x2="4338.32" y2="-1651.8" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="bedcc77e-d828-4dab-b281-150750ccb995" x1="4384.35" y1="-3386.76" x2="4359.77" y2="-3372.53" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="fbe87ca7-541b-47dd-a4e0-0051b7b79bce" x1="4931.49" y1="-3417.91" x2="4982.4" y2="-3402.85" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="b8c49ad9-50cc-4032-b95f-a6870e75959c" x1="5023.82" y1="-3579.81" x2="5016.54" y2="-2450.5" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="a106ffbb-61df-4b02-ba98-2297b3d92614" x1="4240.22" y1="-1885.6" x2="4229.1" y2="-1913.03" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="ea4a8afe-4607-4466-a01c-b51da22d7a6a" x1="5157.54" y1="-1885.94" x2="5168.66" y2="-1913.36" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="b7769a14-a2be-4e23-a97d-0f52ac5c43d7" x1="3747.56" y1="-1161.45" x2="4429.68" y2="-2281.13" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="b8a30656-f0d2-4a12-a0cf-df9702cff0c9" x1="4337.83" y1="-2701.31" x2="4354.75" y2="-1779.7" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0.43"></stop>
                                        </lineargradient>
                                        <lineargradient id="fb82b36c-7abc-4307-ac03-d445e4ae4041" x1="4240.7" y1="-2172.24" x2="4247.54" y2="-2172.24" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="b73f212a-9ecc-43b7-a9fa-3362e2bfd35a" x1="4242.07" y1="-2688.92" x2="4248.91" y2="-2688.92" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="a4fce8a3-f747-4911-b7ec-004bdb93a3c1" x1="5148.37" y1="-2175.65" x2="5141.53" y2="-2175.65" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="be1aa70c-a9e6-411e-ad11-6ac3586784c0" x1="4720.13" y1="-1584.47" x2="4412.21" y2="-1584.47" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff" stop-opacity="0"></stop>
                                            <stop offset="0.39" stop-color="#fff" stop-opacity="0.4"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="b54ac43c-2747-4cc4-bdf2-987fbe7f6672" x1="5147.93" y1="-2681.26" x2="5141.09" y2="-2681.26" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="b7ff1cae-6528-4dd3-b1e4-6d277638c550" x1="4354.53" y1="-3203.05" x2="4949.69" y2="-3203.05" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="f8f2d6e1-d51a-4aa2-bddd-809cb69a8f9f" x1="4311.24" y1="-1577.11" x2="4405.15" y2="-1400.89" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff" stop-opacity="0"></stop>
                                            <stop offset="0.13" stop-color="#fff" stop-opacity="0.63"></stop>
                                            <stop offset="0.51" stop-color="#fff"></stop>
                                            <stop offset="0.85" stop-color="#fff" stop-opacity="0.7"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="e2e7efbf-1677-4598-a3a4-4b80ac05238b" x1="5079.21" y1="-1577.07" x2="4985.3" y2="-1400.85" xlink:href="#f8f2d6e1-d51a-4aa2-bddd-809cb69a8f9f"></lineargradient>
                                        <lineargradient id="a18be770-b4e6-4441-8e29-2b43b3db282f" x1="6275.35" y1="-1873.3" x2="4346.43" y2="-1873.3" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff" stop-opacity="0.08"></stop>
                                            <stop offset="0.28" stop-color="#fff" stop-opacity="0.04"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="b87a528e-f313-434e-856d-16705630d075" x1="4703.12" y1="-2325.16" x2="4703.13" y2="-2286.99" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="f3583cee-51e0-4452-b365-9553f455715e" x1="4626.97" y1="-2302.63" x2="4706.21" y2="-2201.96" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="f67a91e3-6887-4208-ab19-4f2bf1e02e8f" x1="4787.07" y1="-2282" x2="4705.42" y2="-2229.57" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="a022988c-7238-4985-a138-8ab09163ecba" x1="5095.32" y1="-1809.63" x2="5053.04" y2="-1651.81" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="bd8a7dd0-027f-465b-b1e0-3823e4474b19" x1="5643.8" y1="-1161.45" x2="4961.68" y2="-2281.13" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="b693474b-75bb-4827-819b-44399464f6a8" x1="4998.15" y1="-3417.15" x2="4998.15" y2="-3237.32" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="b26a0bda-94cb-4e90-b6d0-f30e212c64d1" x1="5053.53" y1="-2701.31" x2="5036.61" y2="-1779.7" xlink:href="#b8a30656-f0d2-4a12-a0cf-df9702cff0c9"></lineargradient>
                                        <lineargradient id="a4ad987d-33e4-4d8d-9ead-d2de95863382" x1="4469.22" y1="-3014.62" x2="4481.66" y2="-3016.46" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="a915908f-8017-4c0a-a2a9-e83a791a5783" x1="4925.59" y1="-3008.96" x2="4912.74" y2="-3011" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="ada76512-6eeb-49ee-9dcc-34155ef8ecc4" x1="5129.95" y1="-1405.09" x2="4467.49" y2="-1985.13" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="0.28" stop-color="#fff" stop-opacity="0.36"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="ae3ca18a-c1ef-4aa2-b214-42c89814511a" x1="5674.11" y1="-1870.85" x2="4488.93" y2="-1870.85" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="0.28" stop-color="#fff" stop-opacity="0.5"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="a83156a0-2a54-4c8c-b7a5-52c870bc17bf" x1="4712.24" y1="-1890.35" x2="4384.2" y2="-1890.35" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="b93e7528-662c-445a-823c-9abf7ca195c3" x1="4316.19" y1="-1897.3" x2="4533.77" y2="-1904.19" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="ab35c0a6-6b18-4d6f-9f47-9ce04bade475" x1="4993.34" y1="-1383.15" x2="4902.89" y2="-1459.55" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="bff343f9-8919-47e8-9cfe-1057c735c7d8" x1="4397.32" y1="-1383.22" x2="4487.77" y2="-1459.63" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="fa4d62f0-df00-42ca-b9f5-128a26b09569" x1="4694.03" y1="-3483.97" x2="4694.03" y2="-3441.61" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="fb4bfc22-4982-4778-8d36-c430858b6911" x1="4365.08" y1="-3579.81" x2="4372.35" y2="-2450.5" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <lineargradient id="ba0d4a83-3476-49a7-b8fd-e217ed081ead" x1="5004.64" y1="-3387.27" x2="5029.22" y2="-3373.04" xlink:href="#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2"></lineargradient>
                                        <clippath id="f69a30cc-49e6-457f-b25a-8f49e2c6ba45" transform="translate(0 0)">
                                            <path d="M168.81,61c-7.3-2.24-10.55,0-15.82,0a4.34,4.34,0,0,0-4.45,4.21V129a4.35,4.35,0,0,0,4.45,4.22c5.27,0,11.48,2.83,15.82,0C175.5,128.84,173,62.29,168.81,61Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="a6da8f58-2920-4a6c-b0de-706cd8133372" x1="5089.47" y1="-1683.19" x2="5089.47" y2="-2042.98" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5b5b5b"></stop>
                                            <stop offset="1"></stop>
                                        </lineargradient>
                                        <clippath id="ba633c19-c2a2-49b7-8fa5-7e9a4c1244c8" transform="translate(0 0)">
                                            <path d="M168.91,258.73c-7.27-2.36-10.55-.17-15.82-.25a4.35,4.35,0,0,0-4.51,4.14q-.51,31.89-1,63.77a4.35,4.35,0,0,0,4.37,4.29c5.28.08,11.43,3,15.82.25,6.76-4.25,5.35-70.84,1.17-72.2Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="fb045c1b-9d5d-43ca-b96a-61748fdc228c" x1="5089.61" y1="-2829.64" x2="5083.79" y2="-3189.39" xlink:href="#a6da8f58-2920-4a6c-b0de-706cd8133372"></lineargradient>
                                        <clippath id="b48b552a-202a-4013-85d5-2aea5f0550d2" transform="translate(0 0)">
                                            <path d="M14.59,61c7.31-2.24,10.55,0,15.83,0a4.34,4.34,0,0,1,4.44,4.21V129a4.35,4.35,0,0,1-4.44,4.22c-5.28,0-11.48,2.83-15.83,0C7.91,128.84,10.39,62.29,14.59,61Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="a3a62c40-a3e3-4399-8eea-056f9187cebe" x1="4301.91" y1="-1683.19" x2="4301.92" y2="-2042.98" xlink:href="#a6da8f58-2920-4a6c-b0de-706cd8133372"></lineargradient>
                                        <clippath id="af5fe2a6-5003-4df4-829d-9eb149d54038" transform="translate(0 0)">
                                            <path d="M14.49,258.73c7.27-2.36,10.55-.17,15.82-.25a4.33,4.33,0,0,1,4.51,4.14q.52,31.89,1,63.77a4.36,4.36,0,0,1-4.38,4.29c-5.27.08-11.43,3-15.82.25C8.91,326.68,10.31,260.09,14.49,258.73Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="f32fbea8-54b3-4da3-96e7-896c456c5b39" x1="4301.75" y1="-2829.64" x2="4307.57" y2="-3189.39" xlink:href="#a6da8f58-2920-4a6c-b0de-706cd8133372"></lineargradient>
                                        <lineargradient id="fd003ea2-c4d8-4b3a-bd5f-bfc3fe214604" x1="4693.63" y1="-1488.79" x2="4693.64" y2="-3493.9" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#e99706"></stop>
                                            <stop offset="0.34" stop-color="#fdc855"></stop>
                                            <stop offset="0.64" stop-color="#d89602"></stop>
                                            <stop offset="0.98" stop-color="#eea62b"></stop>
                                            <stop offset="1" stop-color="#ffc664"></stop>
                                        </lineargradient>
                                        <mask id="ec1e50d2-1ffa-4016-9824-3cac04ce275e" x="21.07" y="336.75" width="36" height="32.93" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f86bcf07-8f8c-4195-91f6-d309a78eedcc" data-name="id4">
                                                <rect x="21.07" y="336.75" width="36" height="32.93" style="fill:url(#bec3d7aa-a4c0-470c-90fa-eb55ca4365a2);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="e1424347-4704-40a8-ae12-24c557160f49" x1="4388.13" y1="-3381.2" x2="4344.13" y2="-3289.77" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="1" stop-color="#1f1b20"></stop>
                                        </lineargradient>
                                        <mask id="f8951adc-004b-40fc-82b3-d29585f4d333" x="19.3" y="54.41" width="9.27" height="58.28" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="ace47cfa-0de8-4535-a4ee-e403a36d90d4" data-name="id6">
                                                <rect x="19.3" y="54.41" width="9.27" height="58.28" style="fill:url(#a6408973-8235-45e3-8e3a-ff990c1232bb);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="e0183456-9b7b-4e29-bf74-caf78a5f4088" x1="4294.09" y1="-1734.17" x2="4333.45" y2="-1975.23" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fbd95d"></stop>
                                            <stop offset="1" stop-color="#efa414"></stop>
                                        </lineargradient>
                                        <mask id="be8a1598-70f6-467b-bdb0-ab6b857b36ce" x="25.04" y="2.37" width="72.25" height="93.04" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a06ebdb2-918e-4383-b456-4bededfbf06f" data-name="id8">
                                                <rect x="25.04" y="2.37" width="72.25" height="93.04" style="fill:url(#be1aa70c-a9e6-411e-ad11-6ac3586784c0);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="fbb31a8a-ac97-41c9-be53-808e740f63a9" x1="4347.63" y1="-3310.75" x2="5057.9" y2="-3309.74" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5e5e5e"></stop>
                                            <stop offset="0.24" stop-color="#211f1d"></stop>
                                            <stop offset="0.7" stop-color="#333"></stop>
                                            <stop offset="0.76" stop-color="#535353"></stop>
                                            <stop offset="1" stop-color="#333"></stop>
                                        </lineargradient>
                                        <mask id="f34d8587-75d4-4ed3-b432-1f73423b9903" x="126.11" y="337.08" width="35.44" height="32.36" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="be78feae-2502-4ccc-aa47-07143a5f2832" data-name="id10">
                                                <rect x="126.11" y="337.08" width="35.44" height="32.36" style="fill:url(#b693474b-75bb-4827-819b-44399464f6a8);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="b02917c0-ce4c-4671-a722-785e3dda723a" x1="5000.32" y1="-3381.47" x2="5044.31" y2="-3290.03" xlink:href="#e1424347-4704-40a8-ae12-24c557160f49"></lineargradient>
                                        <mask id="ba45c6a0-5f59-468f-9349-97e696261ba1" x="91.3" y="2.37" width="64.61" height="56.4" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a6452002-214e-4aeb-a79b-24d675035462" data-name="id12">
                                                <rect x="91.31" y="2.37" width="64.61" height="56.4" style="fill:url(#ab35c0a6-6b18-4d6f-9f47-9ce04bade475);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="e5b569ba-8332-4d0c-8a14-02c6dc79552d" x="27.36" y="2.39" width="64.61" height="56.4" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="fd470d1d-7244-4154-b17a-683bec7d5cf6" data-name="id14">
                                                <rect x="27.37" y="2.39" width="64.61" height="56.4" style="fill:url(#bff343f9-8919-47e8-9cfe-1057c735c7d8);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="b1325dd1-fd4c-46a0-a7b6-0ffabedbe843" x="46.58" y="368.77" width="89.67" height="7.78" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b8ae6575-9854-4af0-96e7-38618d9a3c78" data-name="id16">
                                                <rect x="46.58" y="368.77" width="89.67" height="7.78" style="fill:url(#fa4d62f0-df00-42ca-b9f5-128a26b09569);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="b7db0889-a3e5-427d-9d09-409b55bf633c" x="17.44" y="221.39" width="35.84" height="145.68" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b2634b8e-911f-4ece-ae05-5a5887a53a4c" data-name="id18">
                                                <rect x="17.44" y="221.39" width="35.84" height="145.68" style="fill:url(#fb4bfc22-4982-4778-8d36-c430858b6911);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="a943f2cd-b15a-4617-a6a1-0f1bb2b14b63" x="29.93" y="355.66" width="27.2" height="14.04" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="ab6edb6d-8c6d-47f7-9b48-4b4f21f715f4" data-name="id20">
                                                <rect x="29.93" y="355.66" width="27.2" height="14.04" style="fill:url(#bedcc77e-d828-4dab-b281-150750ccb995);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="e82176d9-9386-4cda-ac35-09909e2e997e" x="125.86" y="355.75" width="27.2" height="14.04" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="ef5df9b0-784e-4c90-b10a-6476d03750c7" data-name="id22">
                                                <rect x="125.87" y="355.74" width="27.2" height="14.04" style="fill:url(#ba0d4a83-3476-49a7-b8fd-e217ed081ead);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="ba86ff2d-ec1d-4c4b-8412-61cf9c2ec883" x1="4696.61" y1="-2347.22" x2="4696.61" y2="-2503.09" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#0b0a08"></stop>
                                            <stop offset="0.37" stop-color="#292929"></stop>
                                            <stop offset="1" stop-color="#1d1d1d"></stop>
                                        </lineargradient>
                                        <mask id="b5118f2c-964b-436e-bf7a-5e4f47f7a924" x="129.7" y="221.39" width="35.84" height="145.68" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="bdcbed3e-e182-4fe3-9490-9084a71570d5" data-name="id28">
                                                <rect x="129.7" y="221.39" width="35.84" height="145.68" style="fill:url(#b8c49ad9-50cc-4032-b95f-a6870e75959c);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="fdc443c3-8cf3-4897-8959-a8256bf404fb" x="6.58" y="99.33" width="11.04" height="8.34" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="aaa1d7bd-78d1-4772-b94d-abde165e8a95" data-name="id30">
                                                <rect x="6.59" y="99.33" width="11.04" height="8.34" style="fill:url(#a106ffbb-61df-4b02-ba98-2297b3d92614);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="a194fc3b-feb9-4c1b-876a-53960fe5c581" x="166.88" y="99.39" width="11.04" height="8.34" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="ac2401c5-1704-477b-8f8d-51ddcf0c4a3c" data-name="id32">
                                                <rect x="166.89" y="99.39" width="11.04" height="8.34" style="fill:url(#ea4a8afe-4607-4466-a01c-b51da22d7a6a);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="e69a8f6a-84ec-48a0-ac39-15e6b8f61c49" x="21.94" y="76.41" width="15.96" height="132.75" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a2ec802f-4257-4e22-b905-c25b6dc3a25a" data-name="id34">
                                                <rect x="21.94" y="76.42" width="15.96" height="132.74" style="fill:url(#b7769a14-a2be-4e23-a97d-0f52ac5c43d7);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="a0ceb80e-1f09-4d2f-9c45-9078109d1915" x="22.13" y="75.76" width="17.39" height="243.66" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f7727de7-1700-4cc5-aac4-4cb4de70d0c1" data-name="id36">
                                                <rect x="22.14" y="75.76" width="17.39" height="243.66" style="fill:url(#b8a30656-f0d2-4a12-a0cf-df9702cff0c9);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="f321bc5a-5ba9-4750-9c59-10554d9feeaa" x1="4357.71" y1="-3192.03" x2="4322.73" y2="-1697.26" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5c5c5c"></stop>
                                            <stop offset="0.08" stop-color="#fefefe"></stop>
                                            <stop offset="0.41" stop-color="#c0c1c1"></stop>
                                            <stop offset="0.51" stop-color="#fefefe"></stop>
                                            <stop offset="0.8" stop-color="#d9d9db"></stop>
                                            <stop offset="0.93" stop-color="#fefefe"></stop>
                                            <stop offset="1" stop-color="#b3b3b3"></stop>
                                        </lineargradient>
                                        <lineargradient id="acc52f6a-42f0-4997-8677-4ce80e2fcba9" x1="4250.87" y1="-2129.69" x2="4250.87" y2="-2230.73" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#e99706"></stop>
                                            <stop offset="0.34" stop-color="#ffc157"></stop>
                                            <stop offset="0.64" stop-color="#f0ad1b"></stop>
                                            <stop offset="0.98" stop-color="#eea62b"></stop>
                                            <stop offset="1" stop-color="#ffc664"></stop>
                                        </lineargradient>
                                        <mask id="b42eb0d6-64e8-47eb-863c-46de99584afc" x="12.98" y="144.42" width="1.46" height="11.53" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b2fc8fb8-c8fa-486d-b33c-9b4e783b80b5" data-name="id38">
                                                <rect x="12.99" y="144.42" width="1.46" height="11.53" style="fill:url(#fb82b36c-7abc-4307-ac03-d445e4ae4041);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="bda66af1-90a4-4422-9877-02ec6cb403c5" x1="4252.24" y1="-2646.37" x2="4252.24" y2="-2747.41" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#cd8506"></stop>
                                            <stop offset="0.34" stop-color="#ffbb45"></stop>
                                            <stop offset="0.64" stop-color="#e2a00f"></stop>
                                            <stop offset="0.98" stop-color="#ec9d15"></stop>
                                            <stop offset="1" stop-color="#ffc155"></stop>
                                        </lineargradient>
                                        <mask id="a59e58a4-c89b-4117-8e20-a2e989392fa1" x="13.22" y="233.47" width="1.46" height="11.53" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b27573aa-a920-4e8a-be16-fc3c32b4bd1e" data-name="id40">
                                                <rect x="13.22" y="233.47" width="1.46" height="11.53" style="fill:url(#b73f212a-9ecc-43b7-a9fa-3362e2bfd35a);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="f16db043-b34c-4da6-ba8b-1d063ce64e3f" x1="5138.2" y1="-2133.1" x2="5138.2" y2="-2234.14" xlink:href="#acc52f6a-42f0-4997-8677-4ce80e2fcba9"></lineargradient>
                                        <mask id="fb08fa1c-297f-4cc7-b93f-3ed7f47dae6c" x="168.56" y="145.01" width="1.46" height="11.53" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="fde42799-942f-481c-8ee0-3a68f703a8c5" data-name="id42">
                                                <rect x="168.57" y="145.01" width="1.46" height="11.53" style="fill:url(#a4fce8a3-f747-4911-b7ec-004bdb93a3c1);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="abf904bc-25a5-43de-89e8-5c234f4f3f43" x1="5137.76" y1="-2638.71" x2="5137.76" y2="-2739.75" xlink:href="#acc52f6a-42f0-4997-8677-4ce80e2fcba9"></lineargradient>
                                        <mask id="e8ba9c5d-52e4-41fe-b6ae-466f17e22ab6" x="168.49" y="232.15" width="1.46" height="11.53" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f22783e1-7f8a-47f4-9a89-d7adc2af61d1" data-name="id44">
                                                <rect x="168.49" y="232.15" width="1.46" height="11.53" style="fill:url(#b54ac43c-2747-4cc4-bdf2-987fbe7f6672);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="fd40b5e1-7323-4f3d-bcb5-6b0fc105475a" x="50.75" y="323.74" width="80.94" height="8.2" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="bd29d553-56ad-4b70-8e5e-7ebe57f1df50" data-name="id46">
                                                <rect x="50.75" y="323.74" width="80.94" height="8.2" style="fill:url(#b7ff1cae-6528-4dd3-b1e4-6d277638c550);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="a2d7f455-b8f0-4596-9423-23c521ff911f" x1="4496.19" y1="-3203.05" x2="4945.34" y2="-3203.05" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#303030"></stop>
                                            <stop offset="0.43" stop-color="#575757"></stop>
                                            <stop offset="1" stop-color="#606060"></stop>
                                        </lineargradient>
                                        <lineargradient id="b0a67580-e9f4-4a0e-b440-c43d8458ed5f" x1="4696.09" y1="-1390.12" x2="4859.86" y2="-1291.29" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5c5c5c"></stop>
                                            <stop offset="0.08" stop-color="#cececf"></stop>
                                            <stop offset="0.41" stop-color="#656565"></stop>
                                            <stop offset="0.51" stop-color="#b4b5b5"></stop>
                                            <stop offset="0.8" stop-color="#d9d9db"></stop>
                                            <stop offset="0.93" stop-color="#fefefe"></stop>
                                            <stop offset="1" stop-color="#b3b3b3"></stop>
                                        </lineargradient>
                                        <mask id="bee7681a-a157-48da-9eb1-d7cb896bab3e" x="21.29" y="17.4" width="25.55" height="28.11" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="feae450b-0685-4861-84da-46f88db36417" data-name="id48">
                                                <rect x="21.29" y="17.4" width="25.55" height="28.11" style="fill:url(#f8f2d6e1-d51a-4aa2-bddd-809cb69a8f9f);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="b1b825e6-0c27-499a-a7a1-ee2dec41c531" x="136.41" y="17.39" width="25.55" height="28.11" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="fae7de4e-6487-46e1-ad8e-771eb748ca3f" data-name="id50">
                                                <rect x="136.41" y="17.39" width="25.55" height="28.11" style="fill:url(#e2e7efbf-1677-4598-a3a4-4b80ac05238b);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="a28dc936-1d72-49f9-92e9-7e70789b4715" x="32.71" y="85.26" width="116.17" height="26.81" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a7ebe9f9-2fb7-4450-be57-7ec9d197947c" data-name="id52">
                                                <rect x="32.71" y="85.26" width="116.16" height="26.81" style="fill:url(#a18be770-b4e6-4441-8e29-2b43b3db282f);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="f4087d22-9851-40c1-9ae1-62d6aadf0d7a" x1="4705.22" y1="-1730.31" x2="4705.23" y2="-1644.34" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#212023"></stop>
                                            <stop offset="1" stop-color="#312e34"></stop>
                                        </lineargradient>
                                        <lineargradient id="bd30c044-8f7e-4fb0-a319-3fa40b2c8898" x1="4705.66" y1="-1770.63" x2="4705.66" y2="-1665.39" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#4c4c4c"></stop>
                                            <stop offset="1" stop-color="#212023"></stop>
                                        </lineargradient>
                                        <lineargradient id="e10e3e93-5580-4770-b776-be16709ba621" x1="4673.18" y1="-2154.31" x2="4818.75" y2="-2154.3" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#1d1d1d"></stop>
                                            <stop offset="0.14" stop-color="#434344"></stop>
                                            <stop offset="0.39" stop-color="#555"></stop>
                                            <stop offset="0.52" stop-color="#353637"></stop>
                                            <stop offset="1" stop-color="#1e1e20"></stop>
                                        </lineargradient>
                                        <lineargradient id="b1e706e4-e4f0-47c2-a9d3-19cf20e36311" x1="4740.2" y1="-2249.26" x2="4667.9" y2="-2249.26" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#383838"></stop>
                                            <stop offset="0.21" stop-color="#636363"></stop>
                                            <stop offset="0.3" stop-color="#494949"></stop>
                                            <stop offset="0.43" stop-color="#363636"></stop>
                                            <stop offset="1" stop-color="#323232"></stop>
                                        </lineargradient>
                                        <mask id="baa540e3-ec1a-4305-8eeb-e257267ff1b2" x="86.3" y="172.79" width="13.35" height="5.7" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="ead7714b-80c8-427f-86ef-ad16b1961a1b" data-name="id54">
                                                <rect x="86.31" y="172.79" width="13.35" height="5.7" style="fill:url(#b87a528e-f313-434e-856d-16705630d075);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="bf79db8d-0be1-43d3-a2f9-76728d5713e5" x="86.3" y="148.28" width="1.7" height="30.21" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f5e52d10-684a-49dc-97ae-75cee44f9aee" data-name="id56">
                                                <rect x="86.31" y="148.28" width="1.7" height="30.21" style="fill:url(#f3583cee-51e0-4452-b365-9553f455715e);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="e15ecc16-91f6-4400-a54a-f3e1fb5ee9cf" x="97.43" y="148.28" width="2.22" height="30.21" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f8215a41-8622-4e54-9465-61b162a2abb2" data-name="id58">
                                                <rect x="97.44" y="148.28" width="2.22" height="30.21" style="fill:url(#f67a91e3-6887-4208-ab19-4f2bf1e02e8f);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="a0a7a97b-69b5-4432-9ba8-065c44bf72ee" x="154.83" y="54.41" width="9.27" height="58.28" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b637b698-1103-4efe-a8e1-fa7935403cd4" data-name="id60">
                                                <rect x="154.84" y="54.41" width="9.27" height="58.28" style="fill:url(#a022988c-7238-4985-a138-8ab09163ecba);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="a78af7b8-504d-45ea-9503-6aae109c584a" x1="5097.28" y1="-1734.17" x2="5057.92" y2="-1975.23" xlink:href="#e0183456-9b7b-4e29-bf74-caf78a5f4088"></lineargradient>
                                        <mask id="b49f7076-b28d-4405-9bd2-c8c152579457" x="145.51" y="76.41" width="15.96" height="132.75" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a68cc5c0-9df8-403c-947a-4d6f5d53345f" data-name="id62">
                                                <rect x="145.51" y="76.42" width="15.96" height="132.74" style="fill:url(#bd8a7dd0-027f-465b-b1e0-3823e4474b19);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="ae55766e-5347-43da-8226-4b1d2d776206" x="143.88" y="75.76" width="17.39" height="243.66" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a1c519f8-385e-49d2-833b-e409aa3647c5" data-name="id64">
                                                <rect x="143.88" y="75.76" width="17.39" height="243.66" style="fill:url(#b26a0bda-94cb-4e90-b6d0-f30e212c64d1);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="e5149785-ab30-4ab3-ad8a-176edd593029" x1="5033.65" y1="-3192.03" x2="5068.64" y2="-1697.26" xlink:href="#f321bc5a-5ba9-4750-9c59-10554d9feeaa"></lineargradient>
                                        <mask id="add8e9be-c8b3-4c80-9298-3e309f1005dc" x="34.45" y="260.11" width="16.51" height="67.58" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b45a83cd-16ca-44ce-87f2-efdd5c69a51a" data-name="id66">
                                                <rect x="34.45" y="260.11" width="16.51" height="67.58" style="fill:url(#a4ad987d-33e4-4d8d-9ead-d2de95863382);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="fa5292b5-7616-427e-b27a-d50dc0f2e464" x="133.18" y="259.34" width="17.07" height="66.8" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="fbf9a7d7-067d-410c-984d-c81d22a54528" data-name="id68">
                                                <rect x="133.18" y="259.34" width="17.07" height="66.8" style="fill:url(#a915908f-8017-4c0a-a2a9-e83a791a5783);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="f0e70cef-40bf-4fd8-8128-f3ea604b8e7d" x1="4630.18" y1="-2848.73" x2="4774.7" y2="-2846.78" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#1f1f1f"></stop>
                                            <stop offset="0.48" stop-color="#474747"></stop>
                                            <stop offset="0.67" stop-color="#4c4c4c"></stop>
                                            <stop offset="0.79" stop-color="#6d6d6d"></stop>
                                            <stop offset="1" stop-color="#515151"></stop>
                                        </lineargradient>
                                        <lineargradient id="a7cfd74f-4a5b-4da4-a2d7-cf19af89300e" x1="4835.46" y1="-2847.63" x2="4979.75" y2="-2845.45" xlink:href="#f0e70cef-40bf-4fd8-8128-f3ea604b8e7d"></lineargradient>
                                        <lineargradient id="bbff1f47-20e0-4f16-ae22-314bd3e980d5" x1="4419.84" y1="-2853.52" x2="4564.13" y2="-2851.33" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#515151"></stop>
                                            <stop offset="0.21" stop-color="#6d6d6d"></stop>
                                            <stop offset="0.33" stop-color="#4c4c4c"></stop>
                                            <stop offset="0.52" stop-color="#474747"></stop>
                                            <stop offset="1" stop-color="#1f1f1f"></stop>
                                        </lineargradient>
                                        <mask id="a93d9f17-aaa5-4968-81c7-c717d34d35c4" x="32.54" y="52.56" width="119.11" height="61.19" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="aee02a9f-4280-4202-88f8-3f3761c272ce" data-name="id70">
                                                <rect x="32.54" y="52.56" width="119.11" height="61.19" style="fill:url(#ada76512-6eeb-49ee-9dcc-34155ef8ecc4);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="afe1158f-ea2c-43df-bcf3-ac774ea29e40" x1="4395.41" y1="-1633.08" x2="4472.76" y2="-1608.51" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#171614"></stop>
                                            <stop offset="1" stop-color="#575757"></stop>
                                        </lineargradient>
                                        <lineargradient id="ba44f19d-169b-4560-9a7b-1f05fd38bc86" x1="4476.58" y1="-1627.79" x2="4801.27" y2="-1622.43" xlink:href="#afe1158f-ea2c-43df-bcf3-ac774ea29e40"></lineargradient>
                                        <lineargradient id="a7b6c785-3785-4dde-ae56-8f8a274c81b5" x1="4991.83" y1="-1626.98" x2="4917.35" y2="-1594.73" xlink:href="#afe1158f-ea2c-43df-bcf3-ac774ea29e40"></lineargradient>
                                        <lineargradient id="ea19f3ac-e4d8-4e49-b84c-c83c95ba8cff" x1="4911.61" y1="-1613.51" x2="4589.13" y2="-1575.41" xlink:href="#afe1158f-ea2c-43df-bcf3-ac774ea29e40"></lineargradient>
                                        <mask id="ecf089fb-8e17-4999-9fa8-63ca24c83b1e" x="32.71" y="84.84" width="116.22" height="26.81" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="bfaf568d-3659-495e-8a7a-62985cab0f32" data-name="id72">
                                                <rect x="32.71" y="84.84" width="116.22" height="26.81" style="fill:url(#ae3ca18a-c1ef-4aa2-b214-42c89814511a);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="a9797638-9f2e-4bf6-9e75-4772b037834e" x1="4695.85" y1="-2763.46" x2="4695.86" y2="-2919.36" xlink:href="#ba86ff2d-ec1d-4c4b-8412-61cf9c2ec883"></lineargradient>
                                        <lineargradient id="b4e65bc9-d22b-4680-bab3-f29e45ecc4eb" x1="4523.17" y1="-2230.74" x2="4524.28" y2="-2309.02" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#181818"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="0.79" stop-color="#565656"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="a0e80515-e118-4922-bb8f-19930eb1af98" x1="4428.67" y1="-2127.79" x2="4470.9" y2="-2127.78" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#161616"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="e084a64a-2349-4ab5-8dfe-6c53842e09cb" x1="4580.5" y1="-2127.79" x2="4622.72" y2="-2127.78" xlink:href="#a0e80515-e118-4922-bb8f-19930eb1af98"></lineargradient>
                                        <lineargradient id="b497b40b-fc20-4f9b-aaa5-77ecf1b8d12c" x1="4479.79" y1="-2102.74" x2="4580.17" y2="-2102.74" xlink:href="#a0e80515-e118-4922-bb8f-19930eb1af98"></lineargradient>
                                        <lineargradient id="bb321eea-8c8a-4165-995b-ca5ca4f2b0ed" x1="4479.44" y1="-2177.97" x2="4579.83" y2="-2177.97" xlink:href="#a0e80515-e118-4922-bb8f-19930eb1af98"></lineargradient>
                                        <lineargradient id="fe8fac20-18d9-4919-a53e-62eb38f20637" x1="4521.84" y1="-2238.54" x2="4522.56" y2="-2290.32" xlink:href="#b4e65bc9-d22b-4680-bab3-f29e45ecc4eb"></lineargradient>
                                        <lineargradient id="edbbf500-8dfb-4f53-91a6-88d5d9b02724" x1="4525.79" y1="-2318.34" x2="4526.34" y2="-2354.69" xlink:href="#b4e65bc9-d22b-4680-bab3-f29e45ecc4eb"></lineargradient>
                                        <lineargradient id="e7812be7-95c4-4a20-9997-15fc75a55da3" x1="4451.75" y1="-2043.1" x2="4594" y2="-2040.28" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#181818"></stop>
                                            <stop offset="0.48" stop-color="#383838"></stop>
                                            <stop offset="0.67" stop-color="#3c3c3c"></stop>
                                            <stop offset="0.79" stop-color="#565656"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="e2a159e1-0525-411f-a8cd-8e5a736e39e0" x1="4431.48" y1="-2295.08" x2="4538.82" y2="-2295.07" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#292929"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <mask id="a996287b-ea6b-4ae0-9b94-2569dae0cfdd" x="47.08" y="91.38" width="27.25" height="20.44" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b18f011c-34f3-4914-b27e-1408997f7ddc" data-name="id74">
                                                <rect x="47.08" y="91.38" width="27.25" height="20.44" style="fill:url(#a83156a0-2a54-4c8c-b7a5-52c870bc17bf);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="bba78de1-02ec-4e93-9670-967b410be64e" x1="4436.76" y1="-1890.35" x2="4594.67" y2="-1890.35" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#242424"></stop>
                                            <stop offset="0.43" stop-color="#323232"></stop>
                                            <stop offset="0.76" stop-color="#5c5c5c"></stop>
                                            <stop offset="1" stop-color="#292929"></stop>
                                        </lineargradient>
                                        <mask id="bd79721c-c57c-4c2f-bcac-e9363c6f3a40" x="52.12" y="96.92" width="3.4" height="13.51" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="bad61340-563a-4879-908e-d76a0ece64a5" data-name="id76">
                                                <rect x="52.12" y="96.92" width="3.4" height="13.51" style="fill:url(#b93e7528-662c-445a-823c-9abf7ca195c3);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="f2668e87-1f55-446c-a9cf-4fe538c5b7c0" x1="4429.21" y1="-1964.12" x2="4491.31" y2="-1964.12" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#171717"></stop>
                                            <stop offset="0.43" stop-color="#1d1d1f"></stop>
                                            <stop offset="0.76" stop-color="#444545"></stop>
                                            <stop offset="1" stop-color="#242424"></stop>
                                        </lineargradient>
                                        <lineargradient id="bef123db-63f9-41c0-8238-8d81aa525b5c" x1="4471.32" y1="-1965.35" x2="4552.81" y2="-1965.35" xlink:href="#f2668e87-1f55-446c-a9cf-4fe538c5b7c0"></lineargradient>
                                        <lineargradient id="ae8187a7-c813-49d3-8824-1f66d13359d1" x1="4503.9" y1="-2029.29" x2="4545.56" y2="-1941.35" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#292929"></stop>
                                            <stop offset="0.43" stop-color="#373737"></stop>
                                            <stop offset="0.76" stop-color="gray"></stop>
                                            <stop offset="1" stop-color="#292929"></stop>
                                        </lineargradient>
                                        <lineargradient id="a78fa84d-61a6-4ec6-81a9-71355195558e" x1="4444.21" y1="-2005.11" x2="4590.26" y2="-2005.11" xlink:href="#f2668e87-1f55-446c-a9cf-4fe538c5b7c0"></lineargradient>
                                        <lineargradient id="a6d1213f-bcd6-4627-9f87-ebe4e1c121ed" x1="4876.01" y1="-2230.74" x2="4877.12" y2="-2309.02" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#494949"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="0.79" stop-color="#888"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="a5a830ef-bda0-4fcb-bbe4-290fe7257fc3" x1="4781.51" y1="-2127.79" x2="4823.73" y2="-2127.78" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#464646"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="bff05043-8443-4498-946d-bc1ff1cabe0c" x1="4933.34" y1="-2127.79" x2="4975.56" y2="-2127.78" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="aed16a72-19d6-4bba-a381-e08508b0ae54" x1="4832.62" y1="-2102.74" x2="4933.01" y2="-2102.74" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="bb74b920-8fed-40bb-b495-3ae07f1b0ba9" x1="4832.27" y1="-2177.97" x2="4932.66" y2="-2177.97" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="ff10cca6-246e-4da8-ace7-7f6917e926b2" x1="4874.68" y1="-2238.54" x2="4875.4" y2="-2290.32" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="b2f14aba-6e66-41bc-a0c0-1170238f0449" x1="4878.62" y1="-2318.34" x2="4879.17" y2="-2354.69" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="bfbaeb5e-d38a-4365-a16f-6de14d7f244d" x1="4804.58" y1="-2043.1" x2="4946.83" y2="-2040.28" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#494949"></stop>
                                            <stop offset="0.48" stop-color="#696969"></stop>
                                            <stop offset="0.67" stop-color="#6d6d6d"></stop>
                                            <stop offset="0.79" stop-color="#888"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="aea101cb-f3b4-48d0-b983-36c26a122d24" x1="4784.32" y1="-2295.08" x2="4891.65" y2="-2295.07" gradientTransform="matrix(0.17, 0, 0, -0.17, -717.58, -224.19)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5a5a5a"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="e55659d2-3b3c-4b89-8d88-21b05ea8a314" x1="4487.29" y1="-2621.35" x2="4488.41" y2="-2699.62" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="e18b25c3-1054-4122-a0d9-e488d484a7fe" x1="4392.79" y1="-2518.42" x2="4435.01" y2="-2518.41" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="f7c70483-bd94-464f-8ba8-7dcddee94ed8" x1="4544.61" y1="-2518.42" x2="4586.84" y2="-2518.41" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="ea8d23df-50a5-4822-824e-dc61ad862ca1" x1="4443.9" y1="-2493.35" x2="4544.29" y2="-2493.35" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="ba9c213a-ee2c-4c3b-8533-d3291fb698b2" x1="4443.55" y1="-2568.57" x2="4543.94" y2="-2568.58" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="afd6912b-ea7b-4492-873f-43ef8115f70e" x1="4485.95" y1="-2629.15" x2="4486.67" y2="-2680.94" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="a2e0e8a8-a8a8-4e41-a002-eaf564bcd0b7" x1="4489.9" y1="-2708.95" x2="4490.45" y2="-2745.31" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="badef745-f775-4eca-9732-2eb74db98ce9" x1="4415.86" y1="-2433.71" x2="4558.11" y2="-2430.89" xlink:href="#bfbaeb5e-d38a-4365-a16f-6de14d7f244d"></lineargradient>
                                        <lineargradient id="b350104b-53e5-4418-b422-064a7b33ecab" x1="4395.6" y1="-2685.68" x2="4502.93" y2="-2685.67" xlink:href="#aea101cb-f3b4-48d0-b983-36c26a122d24"></lineargradient>
                                        <lineargradient id="aa04f972-51f8-4f2b-aea6-9a1172cdf532" x1="4698.01" y1="-2621.36" x2="4699.12" y2="-2699.63" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="a5c7d58b-3c54-4092-8e70-897f95d67c4a" x1="4603.52" y1="-2518.42" x2="4645.75" y2="-2518.41" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="f3b80104-712a-4b0b-9765-bca19febca65" x1="4755.35" y1="-2518.42" x2="4797.57" y2="-2518.41" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="b3bc8cbf-6bef-45ed-8b10-9a964b8e31b1" x1="4654.63" y1="-2493.35" x2="4755.02" y2="-2493.35" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="b78449f0-afb5-4e7c-86e4-1be70396f953" x1="4654.29" y1="-2568.57" x2="4754.68" y2="-2568.58" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="e33aad95-1655-4d0b-9387-a8eeb371bfdb" x1="4696.69" y1="-2629.15" x2="4697.41" y2="-2680.94" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="e3430a72-a642-4735-a468-d8f986a0a551" x1="4700.64" y1="-2708.95" x2="4701.19" y2="-2745.31" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="ffb228cd-90de-4644-a854-c568f445ab95" x1="4626.59" y1="-2433.71" x2="4768.85" y2="-2430.89" xlink:href="#bfbaeb5e-d38a-4365-a16f-6de14d7f244d"></lineargradient>
                                        <lineargradient id="a00424c2-34df-44ff-bc79-7bc2474a90e8" x1="4606.33" y1="-2685.68" x2="4713.67" y2="-2685.67" xlink:href="#aea101cb-f3b4-48d0-b983-36c26a122d24"></lineargradient>
                                        <lineargradient id="e8005a80-abb9-49b5-8ca0-6eece26369bc" x1="4908.75" y1="-2621.35" x2="4909.87" y2="-2699.62" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="b1a22dac-6e29-4a99-8696-cc9d897ba1a7" x1="4814.26" y1="-2518.42" x2="4856.48" y2="-2518.41" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="a3382896-a4e4-4433-a894-a193908f4c56" x1="4966.09" y1="-2518.42" x2="5008.31" y2="-2518.41" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="a2121a8f-5f31-4afa-8d5e-e93bf0c355e5" x1="4865.37" y1="-2493.35" x2="4965.76" y2="-2493.35" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="b25ccf39-9222-4316-8de4-e78f60703253" x1="4865.02" y1="-2568.57" x2="4965.41" y2="-2568.58" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="aef3e7ff-0db5-4aee-9f59-cf06e8ce4d5c" x1="4907.43" y1="-2629.15" x2="4908.16" y2="-2680.94" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="f5d40f0a-aa0a-4d4f-9110-b13b28ada7a6" x1="4911.37" y1="-2708.95" x2="4911.92" y2="-2745.31" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="a681e8c9-eb1b-4e67-9452-eb23e9042b92" x1="4837.33" y1="-2433.71" x2="4979.58" y2="-2430.89" xlink:href="#bfbaeb5e-d38a-4365-a16f-6de14d7f244d"></lineargradient>
                                        <lineargradient id="a9a0684d-a6aa-49e6-9420-1707ff111721" x1="4817.07" y1="-2685.68" x2="4924.4" y2="-2685.67" xlink:href="#aea101cb-f3b4-48d0-b983-36c26a122d24"></lineargradient>
                                        <lineargradient id="fb46f047-b4d8-48e7-85e7-5d208d0c3f6b" x1="4487.29" y1="-3011.74" x2="4488.41" y2="-3090.01" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="a99cf960-64eb-49e2-a22f-1c414f2e41ac" x1="4392.79" y1="-2908.81" x2="4435.01" y2="-2908.8" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="b517263d-6095-4f25-9239-2e7bf23dc42d" x1="4544.61" y1="-2908.81" x2="4586.84" y2="-2908.8" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="a5176971-59c0-466c-8ebc-ad317f0683a2" x1="4443.9" y1="-2883.75" x2="4544.29" y2="-2883.74" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="ff36e18b-7d5b-4af9-b973-629cc4265c4d" x1="4443.55" y1="-2958.97" x2="4543.94" y2="-2958.98" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="b5ce0f22-a25d-458e-9e80-56df324cbd33" x1="4485.95" y1="-3019.54" x2="4486.67" y2="-3071.33" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="b79cf42f-8888-4f66-a877-71eeb50620c7" x1="4489.9" y1="-3099.34" x2="4490.45" y2="-3135.7" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="b0946ef6-0867-46b5-ba88-85a63f4f45d4" x1="4415.86" y1="-2824.09" x2="4558.11" y2="-2821.28" xlink:href="#bfbaeb5e-d38a-4365-a16f-6de14d7f244d"></lineargradient>
                                        <lineargradient id="a7b43a36-25a5-49d6-9815-dd9b4b9f13ab" x1="4395.6" y1="-3076.07" x2="4502.93" y2="-3076.06" xlink:href="#aea101cb-f3b4-48d0-b983-36c26a122d24"></lineargradient>
                                        <lineargradient id="bb854d59-3987-4977-8a5f-88683466e8a3" x1="4698.01" y1="-3011.75" x2="4699.12" y2="-3090.02" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="b057071d-e98e-4afb-9d13-ef96534adf83" x1="4603.52" y1="-2908.81" x2="4645.75" y2="-2908.8" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="a8216871-4a4f-4535-8a71-fc5ed8061efa" x1="4755.35" y1="-2908.81" x2="4797.57" y2="-2908.8" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="a9871306-c0d7-433f-8fdb-6292c8ebb32d" x1="4654.63" y1="-2883.75" x2="4755.02" y2="-2883.74" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="faed8616-6c2a-428b-a5fc-fc4933311036" x1="4654.29" y1="-2958.97" x2="4754.68" y2="-2958.98" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="bd5b5607-ed82-4779-955b-be6665a20d3e" x1="4696.69" y1="-3019.54" x2="4697.41" y2="-3071.33" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="b1a56050-8fa8-4390-ae03-69ced06d1937" x1="4700.64" y1="-3099.34" x2="4701.19" y2="-3135.7" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="e7267d9e-6832-47ef-b261-c991b7b6af76" x1="4626.59" y1="-2824.09" x2="4768.85" y2="-2821.28" xlink:href="#bfbaeb5e-d38a-4365-a16f-6de14d7f244d"></lineargradient>
                                        <lineargradient id="eed96ebf-29eb-4d2f-a8b6-b5974bf296c1" x1="4606.33" y1="-3076.07" x2="4713.67" y2="-3076.06" xlink:href="#aea101cb-f3b4-48d0-b983-36c26a122d24"></lineargradient>
                                        <lineargradient id="a7e3abd3-3ec0-49d4-817d-36256fa33fb3" x1="4908.75" y1="-3011.74" x2="4909.87" y2="-3090.01" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="f9288820-9f1a-41ee-9d4d-dc7cdf58a388" x1="4814.26" y1="-2908.81" x2="4856.48" y2="-2908.8" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="a561fec2-0632-4330-bcb0-d52502b1dd58" x1="4966.09" y1="-2908.81" x2="5008.31" y2="-2908.8" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="f5c63e85-3b86-42fa-beb4-476f758f265e" x1="4865.37" y1="-2883.75" x2="4965.76" y2="-2883.74" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="a7e83272-4d6c-4c3f-84e9-ec76bdba5e33" x1="4865.02" y1="-2958.97" x2="4965.41" y2="-2958.98" xlink:href="#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3"></lineargradient>
                                        <lineargradient id="aec4023d-113e-4e5f-928f-11b63673ddf2" x1="4907.43" y1="-3019.54" x2="4908.16" y2="-3071.33" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="a5ba168c-f5d1-4c0b-9301-ac1c54b1fe53" x1="4911.37" y1="-3099.34" x2="4911.92" y2="-3135.7" xlink:href="#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed"></lineargradient>
                                        <lineargradient id="b0741f06-b2dd-45a6-abe1-33343dfc6edb" x1="4837.33" y1="-2824.09" x2="4979.58" y2="-2821.28" xlink:href="#bfbaeb5e-d38a-4365-a16f-6de14d7f244d"></lineargradient>
                                        <lineargradient id="bcd104c1-8d4a-4852-96d6-0b0ad09ed6d3" x1="4817.07" y1="-3076.07" x2="4924.4" y2="-3076.06" xlink:href="#aea101cb-f3b4-48d0-b983-36c26a122d24"></lineargradient>
                                        </defs>
                                        <g id="f957abc5-2d6c-4db0-a282-8b7508cab70b" data-name=" 1901125656960">
                                        <path d="M168.81,61c-7.3-2.24-10.55,0-15.82,0a4.34,4.34,0,0,0-4.45,4.21V129a4.35,4.35,0,0,0,4.45,4.22c5.27,0,11.48,2.83,15.82,0C175.5,128.84,173,62.29,168.81,61Z" transform="translate(0 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#f69a30cc-49e6-457f-b25a-8f49e2c6ba45);">
                                            <path id="aa068a6a-9780-4e5e-b610-4e97c5a7921c" data-name="1" d="M161.28,93.68a8.58,8.58,0,0,0,2.18-1.43l.07,4.39c-.44.34-.92.63-1.36,1a42.49,42.49,0,0,1-4.3,3.6,6.62,6.62,0,0,1-1.58-1.26c-1.1-1-.69-1.19-.7-3.81V94.81c.84.58,2.07,2,3.09,1.69.25-.8.21-.44-.31-1l-2.78-2.24V89.14c.73.31,4.67,4,5.7,4.54ZM147,61.92h2.84l0,2.29a5.36,5.36,0,0,1-1.48-1L147,61.92Zm2.84,71.49h-3.06l0-3.34c.89.37.72.51,1.39,1.14a6.38,6.38,0,0,0,1.59,1.08Zm19.11,0h-4a28.34,28.34,0,0,1,4-3.36Zm-5.06-71.49h4.84L165.26,65a7.48,7.48,0,0,1-1.33.91l-.05-4Zm6,71.49h-.56v-3.77a18.07,18.07,0,0,1,3-2.41v4a20.91,20.91,0,0,0-2.45,2.17ZM149.82,84.76v3.42c-1.13-.48-.84-.59-1.69-1.32-1.59-1.35-1.34-.26-1.35-3.79v-1.3c.56.27,3.06,2.08,3.06,3ZM172.33,71l-3,2.42c-.1-1.2-.33-3.4.23-4.23a18.23,18.23,0,0,1,2.77-2.2v4Zm-23.44,46.64c-2.69-2.42-2.15-.49-2.11-5.8.94.35,1.14,1.25,3,2.22l0,4.2-.94-.62Zm20.43-14.15c-.12-5.27-.1-3.76,1.61-5.32.61-.56.59-.83,1.39-1.1,0,1.17.38,3.52-.23,4.3l-2.77,2.12Zm3-14.32-3,2.43,0-4.3,3-2.45.06,4.32Zm-22.51-8.66v2a18.71,18.71,0,0,1-3-2.35l-.09-4.37a13.94,13.94,0,0,1,2.15,1.64c1.12,1,.91,1.34.91,3.08Zm-2.55,24.25c-.82-.76-.49-3.17-.5-4.84,3.51,2.33,3,1.86,3.06,6.72l-2.56-1.88Zm2.55-29.54v1.33a22.41,22.41,0,0,1-3.06-2.34l0-4.4c.37.27.7.48,1.07.77,2.31,1.78,2,1.8,2,4.64ZM172.35,115c-.14,5.62.86,3.37-1.79,5.72-.63.56-.42.74-1.23,1-.05-1.2-.41-3.63.25-4.46,0,0,1.21-1.15,1.35-1.26a8.37,8.37,0,0,1,1.42-1Zm-.06-6c.62,5.28-.35,4.43-1.71,5.8a3.12,3.12,0,0,1-1.26.95v-4.3C170.24,110.65,171.3,109.7,172.29,109Zm-.41-43.14c0,.05-2.4,1.85-2.57,1.92-.05-6.5,1-5.58,2.23-4.43C172.39,64.12,172.93,64.92,171.88,65.85Zm-22,46.77c-4.1-2.51-3.08-3.1-3.06-6.72.7.24,1.48,1.37,3,2.22Zm19.54-26.95c-.8-5,.55-4.71,1.57-5.66.61-.55.61-.78,1.36-1.1.19,3.62.67,3.91-1.59,5.75-.45.37-1.1.73-1.34,1ZM149.77,95.91l.06,4.78a18.61,18.61,0,0,1-3.05-2.34V93.68c.88.38.75.52,1.42,1.14a6.77,6.77,0,0,0,1.56,1.1Zm0,30.1.05,4.81a11.37,11.37,0,0,1-2.9-2.43c-.36-.77-.17-3.71-.08-4.72.47.53.9.69,1.48,1.28a3.46,3.46,0,0,0,1.45,1.06Zm22.56-18.65a15.69,15.69,0,0,0-1.51,1.31c-.47.46-1.11.82-1.46,1.12-.13-.93-.25-4,.12-4.71a16.06,16.06,0,0,1,2.85-2.33v4.61ZM149.8,124.52c-1.39-.68-1.25-1.19-3-2.33v-4.68c3.69,2.44,3.16,2.34,3,7Zm19.5-44.85c0-1.11-.3-3.85.19-4.64a15.71,15.71,0,0,1,2.86-2.36c0,1.16.3,3.85-.21,4.67a13.75,13.75,0,0,1-2.84,2.33ZM149.64,70.6a8.09,8.09,0,0,1-1.41-1.18c-.47-.46-.92-.73-1.43-1.16V63.48a5.84,5.84,0,0,1,1.44,1.08c.7.72.93.77,1.55,1.37a13,13,0,0,1-.14,4.67Zm22.71,55a13.48,13.48,0,0,0-1.53,1.28,6.54,6.54,0,0,1-1.46,1.15c-.45-4.25-.42-5,3-7.08ZM149.82,94.42a12.42,12.42,0,0,1-2.71-2.16c-.76-.93-.31-3.46-.35-4.83C150.88,89.8,149.77,90.82,149.82,94.42Zm19.48,3.43c.06-2.6-1.13-4.95,3.06-7,0,1.21.3,3.79-.22,4.68a14.19,14.19,0,0,1-2.84,2.32Zm-6.16,35.56h-7.56l.07-2.26c2.22,1.62,2,2.48,5.17-.71a19.21,19.21,0,0,1,2.72-2.15c0,1.85.3,4.27-.4,5.12Zm-8-40.69-2.72-2.25c-2.54-2-2.32-1.37-2.22-5.86l3.6,2.88c1.29,1.24,1.33.89,1.43,1.9a21.89,21.89,0,0,1-.09,3.34Zm0,30.1c-1.08-.56-4.2-3.54-5-4l0-4.09a13.06,13.06,0,0,1,1.59,1.15c3.64,3.13,3.57,2.34,3.44,7ZM163.87,78l0-4,5-4.13c.6,5.28-.67,4.31-2.94,6.57A8.57,8.57,0,0,1,163.87,78Zm5.06,26c-1.13.82-4.1,3.62-5,4-.15-3.25-.45-3.74,1.35-5.17a14.51,14.51,0,0,0,1.81-1.49,8.89,8.89,0,0,1,1.87-1.41ZM151.81,66.12l-1.6-1.31,0-2.9h2.47c3,3.48,2.54-.16,2.58,6.89l-3.43-2.68Zm3.43,67.29h-2.66a14.23,14.23,0,0,0-1.3-1.26c-.77-.56-.95-.37-1.1-1.39v-4.15l2.63,2a11.76,11.76,0,0,0,2.43,1.94v2.85Zm-.07-50.8,0,4.46c-1-.52-4.36-3.64-5-4v-4.4C151.05,79.06,154,82,155.17,82.61Zm13.75,35.2c.13,4.37.36,3.84-1.17,5.34l-3.86,3,.06-4.47,3.83-3c.51-.48.47-.68,1.14-.92Zm-13.7-.64c-.71-.3-4-3.27-5-4l.06-4.39,4.24,3.5c1.16,1.1.75,1.86.74,4.93Zm0-6c-1.08-.53-3.87-3.3-5-4l0-4.4A34.22,34.22,0,0,1,153,105c.6.44.81.79,1.38,1.24.74.58.87.34.87,1.59l0,3.4Zm8.66-21c.09-5.83-.56-3.4,3.08-6.9a13.55,13.55,0,0,1,2-1.5c-.09,4.08.55,4.09-1.14,5.27l-3.26,2.68c-.64.49.15,0-.68.45Zm-8.66-13.52,0,4.46-3.82-3a2.41,2.41,0,0,1-1.21-2c0-1.09,0-2.31,0-3.42.74.31.59.47,1.21,1l3.82,3Zm8.66,19.48,0-4.5a10.1,10.1,0,0,0,2.49-1.91,28,28,0,0,1,2.56-2c-.05,3,.51,4.1-1.08,5.28a48.5,48.5,0,0,1-4,3.13Zm5.06,15.72c0,3,.5,4.05-1.17,5.38a38.05,38.05,0,0,1-3.89,3l0-4.5c1.37-.72,4.32-3.67,5-3.9Zm-13.71-8.69v2.08l-4.39-3.55c-.88-.86-.63-.55-.63-2.55V96.52a35.82,35.82,0,0,1,3.18,2.59C155.19,100.45,155.26,100.26,155.22,103.16Zm13.71-4.86-5,4.07V97.59a11,11,0,0,0,2.48-2l2.56-2Zm0,7.29c.11,1.08,0,2.2.06,3.29,0,1.72,0,1.51-1.11,2.29a49.54,49.54,0,0,1-4,3.13l.06-4.59Zm0,18.17c.2,2.68.43,4.52-1,5.62a42.27,42.27,0,0,1-4,3.13l0-4.6,5-4.15ZM155.19,94.23l0,4.77c-.9-.38-.59-.43-1.31-1l-3.75-3,0-4.68c.88.38,3.74,3.28,5,4Zm.06,34.87c-1.67-1.1-2.56-2.13-4.07-3.21-1.06-.76-1-.82-1-2.42,0-1,0-2.09.05-3.12,1.05.67,1.49,1.3,2.47,2a25.68,25.68,0,0,1,2.53,2.15l0,4.57Zm8.63-44.9,0-4.77c1.41-.7,4.17-3.6,5-3.92.14,4,.43,4.44-1,5.47L165,83.37c-.74.69-.36.52-1.14.83Zm5.06-16c-1.11.76-4,3.56-5,4,0-6-.43-4.14,1.23-5.72a9.76,9.76,0,0,1,1.28-1.12,8.43,8.43,0,0,0,1.24-1c.65-.64.49-.67,1.25-1l0,4.77Zm-18-1.46,4.25,3.5v4.9c-1.9-1.22-2.08-1.72-3.94-3.11-2-1.53-.68-3.13-1.24-5.73.75.3.08,0,.53.25.06,0,.2.27.28.13S150.94,66.75,151,66.77Zm12.51,19.52,0,4.39a13,13,0,0,0-2,1.67L158.42,90c-3.75-3.44-2.69-1.13-2.85-6.77l2.85,2.32c.56.52,2.56,2.21,3.07,2.17s1.37-1,2-1.38ZM158,119.57a13.3,13.3,0,0,1-1.69-1.39c-1-1-.7-.62-.7-2.33v-2.57c.86.35,4.54,3.93,5.69,4.53a8.51,8.51,0,0,0,2.21-1.43l0,4.39-2.37,1.68L158,119.56Zm5.56-21.36c-.07,2.92.52,4-.67,5.16l-5,4.14-2.28-1.71,0-4.73c2.7,1.45.89,2.86,5.1-.56a18.88,18.88,0,0,1,2.82-2.3Zm-5.66-20.79-2.29-1.7V70.86c3.13,2.1,1.87,1.89,3.76.47s2.07-1.82,4.18-3.34c-.08,4.13.59,4.53-1.4,5.93-.85.59-1.2,1.13-2,1.72a7.82,7.82,0,0,0-1.12.87c-.67.64-.34.51-1.13.92Zm-2.3-15.51h3.82a4.52,4.52,0,0,0,2.11,1.56l2-1.46c0,5.24.45,4.15-1.43,5.53-1.12.82-3.37,3.25-4.53,3.52a5.76,5.76,0,0,0-2-1.73l0-4.74s.12,0,.15.09l1.26,1c.49.39.8.83,1.71.58.13-.85-1-1.59-1.54-2-.88-.64-1.57-.79-1.58-2.37Zm7.95,16.56a29.33,29.33,0,0,0-2.6,2.17c-1,1-.25,1.62,1.19.46A17.25,17.25,0,0,1,163.53,80c0,4.83.61,4.31-2,6.35l-5.92-4.72,0-4.43c2.17,1.81,2.24,2.25,5.1-.64l2.81-2.23v4.1Zm0,36.34a8.06,8.06,0,0,0-1.94,1.67c-1.11-.35-.54-.44-2.31-1.72-.81-.58-1.19-1.13-2-1.72-2.42-1.71-1.61-2.28-1.68-5.73.88.46,1.07,1.11,2.3,1.57,1.51-.73,4.65-3.94,5.62-4.42.19,5.14.16,3.87-2,5.68-.4.34-2,2.09-.15,1.59,1-.27,1.26-1.25,2.17-1.61v4.69Zm-4.8,11.76c.11-.94-1.35-1.85-2-2.28-1.64-1.17-1.2-1.88-1.15-5.05,1.16.55,4.42,4.07,5.94,4.57l2-1.48c-.1,5.09.39,4.18-1.55,5.6l-4.1,3.42c-1-.42-.59-.71-2.3-1.72v-4.74c1.15.47,1.65,2.08,3.14,1.68Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a6da8f58-2920-4a6c-b0de-706cd8133372);"></path>
                                        </g>
                                        <path d="M168.81,61c-7.3-2.24-10.55,0-15.82,0a4.34,4.34,0,0,0-4.45,4.21V129a4.35,4.35,0,0,0,4.45,4.22c5.27,0,11.48,2.83,15.82,0C175.5,128.84,173,62.29,168.81,61Z" transform="translate(0 0)" style="fill:none;"></path>
                                        <path d="M168.91,258.73c-7.27-2.36-10.55-.17-15.82-.25a4.35,4.35,0,0,0-4.51,4.14q-.51,31.89-1,63.77a4.35,4.35,0,0,0,4.37,4.29c5.28.08,11.43,3,15.82.25,6.76-4.25,5.35-70.84,1.17-72.2Z" transform="translate(0 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#ba633c19-c2a2-49b7-8fa5-7e9a4c1244c8);">
                                            <path id="e448a1e3-fe58-4e95-93a5-b3b5722f7df5" data-name="1" d="M160.85,291.29a8.85,8.85,0,0,0,2.21-1.39v4.39c-.44.33-.92.62-1.37,1a42.13,42.13,0,0,1-4.35,3.52,6.71,6.71,0,0,1-1.56-1.28c-1.09-1-.68-1.2-.64-3.82v-1.38c.83.6,2,2,3.06,1.75.26-.8.22-.44-.29-1l-2.74-2.29.06-4.15c.72.32,4.6,4.08,5.62,4.63Zm-13.77-32,2.84,0-.06,2.3a5.37,5.37,0,0,1-1.46-1.05l-1.32-1.29Zm1.68,71.53-3-.05.08-3.34c.88.39.71.52,1.38,1.17a6.11,6.11,0,0,0,1.56,1.1l0,1.12Zm19.11.31-4-.07a27.66,27.66,0,0,1,4.06-3.29l0,3.36ZM164,259.57l4.84.08-3.51,3a8,8,0,0,1-1.34.89v-4Zm4.84,71.58h-.57l.06-3.76a18.78,18.78,0,0,1,3.07-2.37l-.07,4A20.1,20.1,0,0,0,168.81,331.15Zm-19.26-49-.07,3.42c-1.12-.5-.82-.6-1.66-1.34-1.57-1.38-1.34-.29-1.29-3.82v-1.3c.55.28,3,2.14,3,3Zm22.72-13.37-3,2.37c-.07-1.21-.27-3.4.3-4.23a19.82,19.82,0,0,1,2.81-2.16l-.07,4Zm-24.19,46.25c-2.65-2.46-2.14-.52-2-5.83.94.36,1.12,1.27,3,2.27l0,4.2Zm20.65-13.81c0-5.28,0-3.76,1.7-5.3.62-.55.6-.82,1.41-1.08,0,1.17.32,3.53-.3,4.3l-2.81,2.08ZM172,287l-3,2.38,0-4.31,3-2.4,0,4.33Zm-22.38-9,0,2a19.41,19.41,0,0,1-2.93-2.4l0-4.37a14.44,14.44,0,0,1,2.13,1.66c1.1,1.08.89,1.36.85,3.1Zm-2.93,24.21c-.81-.78-.44-3.18-.43-4.85,3.47,2.38,2.95,1.91,2.95,6.77l-2.53-1.92Zm3-29.5,0,1.33a21.14,21.14,0,0,1-3-2.38l.11-4.4c.36.27.68.48,1,.78,2.28,1.82,1.93,1.83,1.88,4.67Zm21.88,40.1c-.23,5.62.8,3.39-1.89,5.69-.63.55-.43.73-1.24,1,0-1.19-.35-3.63.32-4.46,0,0,1.23-1.12,1.38-1.24a8.5,8.5,0,0,1,1.43-1Zm0-6c.54,5.3-.42,4.42-1.79,5.78a3.32,3.32,0,0,1-1.29.92l.06-4.29c.95-.78,2-1.72,3-2.41Zm.29-43.13c-.05,0-2.43,1.8-2.59,1.88.05-6.51,1.06-5.57,2.3-4.4.83.79,1.36,1.61.29,2.52ZM149.11,310c-4.06-2.57-3-3.15-3-6.77.7.26,1.45,1.39,3,2.27Zm20-26.63c-.72-5.06.62-4.7,1.67-5.63.61-.55.61-.78,1.37-1.08.13,3.63.61,3.91-1.68,5.73a16,16,0,0,0-1.36,1Zm-19.78,9.93v4.77a18.75,18.75,0,0,1-3-2.39l.1-4.66c.86.39.74.52,1.39,1.15a6.66,6.66,0,0,0,1.54,1.12Zm-.47,30.08,0,4.82a11.5,11.5,0,0,1-2.86-2.48c-.35-.78-.12-3.71,0-4.72.47.54.89.71,1.46,1.31a3.28,3.28,0,0,0,1.43,1.07Zm22.86-18.27a13.81,13.81,0,0,0-1.53,1.28c-.48.45-1.12.81-1.48,1.1-.11-.94-.19-4,.2-4.71a15.23,15.23,0,0,1,2.88-2.28Zm-22.81,16.79c-1.39-.71-1.24-1.21-3-2.38l.06-4.68c3.66,2.49,3.13,2.39,2.93,7.06Zm20.22-44.53c0-1.11-.24-3.86.26-4.63a15.46,15.46,0,0,1,2.9-2.32c0,1.16.24,3.85-.28,4.66a13.76,13.76,0,0,1-2.88,2.29ZM149.59,268a8.3,8.3,0,0,1-1.4-1.2,17.6,17.6,0,0,0-1.4-1.19l.06-4.78a6,6,0,0,1,1.42,1.1c.69.73.92.79,1.53,1.4A13.26,13.26,0,0,1,149.59,268Zm21.81,55.33a13.07,13.07,0,0,0-1.55,1.25,6.54,6.54,0,0,1-1.48,1.13c-.38-4.26-.33-5,3.1-7l-.07,4.65Zm-22-31.52a12.77,12.77,0,0,1-2.68-2.2c-.73-.94-.24-3.47-.27-4.83,4.08,2.44,3,3.44,2.95,7Zm19.42,3.74c.1-2.59-1.05-5,3.17-6.95-.05,1.22.24,3.79-.29,4.68a14.84,14.84,0,0,1-2.87,2.28ZM162.06,331l-7.55-.12.1-2.26c2.2,1.66,2,2.52,5.19-.62a19.08,19.08,0,0,1,2.75-2.11c-.06,1.85.23,4.28-.49,5.11Zm-7.32-40.81-2.69-2.29c-2.5-2-2.29-1.41-2.12-5.9l3.55,2.94c1.27,1.26,1.32.91,1.41,1.92a23.07,23.07,0,0,1-.15,3.33Zm-.44,30.1c-1.07-.58-4.14-3.61-4.94-4.11l0-4.09A12.68,12.68,0,0,1,151,313.3c3.6,3.19,3.54,2.39,3.33,7Zm9.4-44.73.09-4,5.05-4c.51,5.28-.74,4.29-3,6.52a9,9,0,0,1-2.1,1.51Zm4.63,26.1c-1.14.8-4.15,3.55-5.08,4-.1-3.25-.39-3.75,1.43-5.15a14.25,14.25,0,0,0,1.83-1.46,9,9,0,0,1,1.9-1.38l-.08,4Zm-16.51-38.12-1.57-1.34,0-2.9,2.47,0c2.94,3.53,2.53-.12,2.46,6.93l-3.39-2.74Zm2.35,67.33-2.66,0a12.88,12.88,0,0,0-1.28-1.28c-.76-.57-.94-.39-1.08-1.4l.06-4.16,2.6,2.06a12.26,12.26,0,0,0,2.4,2l0,2.84Zm.75-50.79,0,4.46c-1-.53-4.3-3.71-4.95-4.1l.07-4.4c.85.43,3.73,3.38,4.91,4Zm13.18,35.42c.06,4.37.3,3.85-1.25,5.32l-3.92,3,.14-4.47,3.87-2.93c.52-.48.49-.67,1.16-.9Zm-13.69-.86c-.7-.31-3.92-3.33-5-4.12l.12-4.39,4.19,3.57c1.14,1.11.72,1.87.66,4.94Zm.08-6c-1.06-.55-3.8-3.37-5-4.12l.1-4.39a35,35,0,0,1,2.73,2.24c.59.45.8.81,1.36,1.26.73.6.86.36.84,1.61l-.08,3.4Zm9-20.9c.19-5.83-.51-3.41,3.19-6.85a14.12,14.12,0,0,1,2-1.46c-.15,4.07.49,4.09-1.22,5.24l-3.3,2.64c-.65.47.14,0-.69.43Zm-8.44-13.66-.09,4.46-3.77-3.05a2.4,2.4,0,0,1-1.18-2c0-1.08,0-2.31.07-3.41.73.32.58.47,1.19,1l3.77,3.05Zm8.34,19.62.09-4.5a10.11,10.11,0,0,0,2.52-1.87,26.69,26.69,0,0,1,2.6-2c-.1,3,.44,4.1-1.17,5.26a49,49,0,0,1-4,3Zm4.81,15.8c0,3,.43,4.06-1.26,5.36a39.63,39.63,0,0,1-3.93,3l.11-4.5C164.51,312.7,167.52,309.8,168.21,309.58Zm-13.57-8.91,0,2.08-4.33-3.62c-.87-.88-.63-.56-.6-2.56l0-2.62a35.08,35.08,0,0,1,3.14,2.64c1.81,1.36,1.88,1.18,1.8,4.08ZM168.43,296l-5.11,4,.08-4.78a11,11,0,0,0,2.51-1.92l2.59-1.92-.07,4.63Zm-.16,7.29c.09,1.08,0,2.2,0,3.29,0,1.72,0,1.51-1.15,2.27a47,47,0,0,1-4,3.06l.14-4.58,5-4ZM168,321.49c.17,2.68.36,4.53-1.13,5.6a42.88,42.88,0,0,1-4,3.06l.12-4.6,5-4.07Zm-13.22-29.75,0,4.77c-.89-.39-.57-.44-1.29-1.05l-3.7-3.08.1-4.68c.88.39,3.69,3.34,4.94,4Zm-.51,34.86c-1.65-1.11-2.52-2.17-4-3.27-1-.77-1-.84-1-2.43,0-1,0-2.09.1-3.12,1,.68,1.47,1.32,2.44,2.06a25.78,25.78,0,0,1,2.5,2.19l-.05,4.57Zm9.35-44.74.1-4.78c1.43-.67,4.23-3.53,5.08-3.84.08,4,.36,4.45-1.11,5.45L164.76,281c-.76.68-.38.53-1.16.82Zm5.32-15.9c-1.12.74-4,3.5-5.09,4,.07-5.94-.37-4.15,1.33-5.69a8.5,8.5,0,0,1,1.29-1.11,10.58,10.58,0,0,0,1.26-.94c.65-.63.49-.66,1.26-1l-.05,4.78ZM151,264.21l4.19,3.57-.07,4.9c-1.88-1.25-2.06-1.75-3.9-3.17-2-1.56-.63-3.14-1.15-5.75.75.31.09,0,.53.26.06,0,.2.27.28.13S151,264.2,151,264.21Zm12.19,19.73,0,4.39a12.22,12.22,0,0,0-2,1.63l-3.1-2.44c-3.69-3.5-2.67-1.18-2.73-6.82l2.81,2.38c.55.52,2.52,2.24,3,2.21S162.54,284.28,163.18,283.94Zm-6,33.18a12.15,12.15,0,0,1-1.67-1.42c-1-1-.69-.63-.66-2.34l0-2.57c.85.36,4.47,4,5.61,4.63a8.43,8.43,0,0,0,2.23-1.41v4.4l-2.4,1.64-3.15-2.94Zm5.9-21.27c-.12,2.92.46,4-.76,5.15l-5.06,4.06L155,303.31l.12-4.72c2.67,1.49.83,2.87,5.1-.48a18.06,18.06,0,0,1,2.86-2.26ZM157.71,275l-2.25-1.75.08-4.85c3.1,2.15,1.84,1.92,3.75.53s2.11-1.79,4.23-3.27c-.14,4.13.53,4.53-1.49,5.9-.85.58-1.21,1.12-2,1.69a9.27,9.27,0,0,0-1.13.85c-.67.64-.34.51-1.14.9Zm-2.05-15.55,3.83.06a4.45,4.45,0,0,0,2.08,1.6l2-1.43c-.1,5.24.39,4.16-1.52,5.51-1.13.8-3.41,3.19-4.58,3.44a5.7,5.7,0,0,0-1.94-1.76l.05-4.74s.13,0,.15.1l1.25,1c.48.4.78.84,1.7.61.14-.84-.95-1.61-1.51-2-.87-.64-1.56-.81-1.55-2.39Zm7.69,16.68a31.27,31.27,0,0,0-2.64,2.13c-1,.94-.27,1.62,1.19.49.49-.39.84-.66,1.42-1.05-.08,4.84.54,4.33-2.13,6.32l-5.84-4.81.1-4.43c2.14,1.84,2.2,2.29,5.11-.55L163.4,272l-.05,4.09Zm-.59,36.34a7.73,7.73,0,0,0-2,1.64c-1.11-.37-.54-.45-2.29-1.76-.8-.59-1.17-1.15-2-1.75-2.39-1.75-1.57-2.3-1.59-5.75.88.47,1,1.12,2.27,1.6,1.52-.7,4.72-3.86,5.7-4.33.1,5.14.1,3.87-2.09,5.65-.41.33-2,2.05-.18,1.58,1-.25,1.28-1.22,2.2-1.57l-.07,4.69Zm-5,11.68c.13-.94-1.32-1.87-1.92-2.31-1.63-1.2-1.17-1.9-1.07-5.07,1.15.57,4.35,4.15,5.86,4.67l2-1.45c-.18,5.09.32,4.19-1.64,5.57l-4.16,3.36c-1-.44-.57-.72-2.26-1.76l.07-4.74c1.14.49,1.61,2.11,3.11,1.73Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#fb045c1b-9d5d-43ca-b96a-61748fdc228c);"></path>
                                        </g>
                                        <path d="M168.91,258.73c-7.27-2.36-10.55-.17-15.82-.25a4.35,4.35,0,0,0-4.51,4.14q-.51,31.89-1,63.77a4.35,4.35,0,0,0,4.37,4.29c5.28.08,11.43,3,15.82.25,6.76-4.25,5.35-70.84,1.17-72.2Z" transform="translate(0 0)" style="fill:none;"></path>
                                        <path d="M14.59,61c7.31-2.24,10.55,0,15.83,0a4.34,4.34,0,0,1,4.44,4.21V129a4.35,4.35,0,0,1-4.44,4.22c-5.28,0-11.48,2.83-15.83,0C7.91,128.84,10.39,62.29,14.59,61Z" transform="translate(0 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#b48b552a-202a-4013-85d5-2aea5f0550d2);">
                                            <path id="e1741dba-785a-4661-8643-0740c2a0953a" data-name="1" d="M22.13,93.68A8.4,8.4,0,0,1,20,92.25l-.07,4.39c.43.34.91.63,1.35,1a42.49,42.49,0,0,0,4.3,3.6A6.62,6.62,0,0,0,27.11,100c1.1-1,.7-1.19.7-3.81V94.81c-.83.58-2.06,2-3.09,1.69-.24-.8-.21-.44.31-1l2.78-2.24V89.14c-.72.31-4.66,4-5.69,4.54ZM36.42,61.92H33.58l0,2.29a5.51,5.51,0,0,0,1.48-1l1.34-1.27Zm-2.84,71.49h3.05l0-3.34c-.89.37-.71.51-1.39,1.14a6.15,6.15,0,0,1-1.58,1.08Zm-19.11,0h4a28.43,28.43,0,0,0-4-3.36Zm5.06-71.49H14.68L18.14,65a7.2,7.2,0,0,0,1.34.91Zm-6,71.49h.57v-3.77a18.12,18.12,0,0,0-3-2.41l0,4a22.67,22.67,0,0,1,2.45,2.17Zm20-48.65v3.42c1.13-.48.83-.59,1.69-1.32,1.59-1.35,1.34-.26,1.35-3.79v-1.3c-.55.27-3.05,2.08-3.05,3ZM11.07,71l3,2.42c.1-1.2.33-3.4-.22-4.23A18.33,18.33,0,0,0,11.06,67v4Zm23.45,46.64c2.68-2.42,2.14-.49,2.11-5.8-.94.35-1.15,1.25-3,2.22l0,4.2ZM14.09,103.51c.11-5.27.1-3.76-1.61-5.32-.62-.56-.59-.83-1.4-1.1,0,1.17-.37,3.52.23,4.3l2.78,2.12Zm-3-14.32,3,2.43,0-4.3-3-2.45Zm22.51-8.66v2a19,19,0,0,0,3-2.35l.1-4.37a13.94,13.94,0,0,0-2.15,1.64c-1.12,1-.92,1.34-.91,3.08Zm2.55,24.25c.81-.76.49-3.17.5-4.84-3.51,2.33-3,1.86-3.06,6.72ZM33.58,75.24v1.33a21.25,21.25,0,0,0,3.06-2.34l0-4.4c-.37.27-.69.48-1.07.77-2.3,1.78-2,1.8-2,4.64ZM11.05,115c.15,5.62-.85,3.37,1.8,5.72.63.56.42.74,1.23,1,.05-1.2.41-3.63-.25-4.46,0,0-1.21-1.15-1.35-1.26a8.37,8.37,0,0,0-1.42-1Zm.07-6c-.63,5.28.35,4.43,1.7,5.8a3.23,3.23,0,0,0,1.27.95v-4.3C13.17,110.65,12.11,109.7,11.12,109Zm.41-43.14c.05.05,2.4,1.85,2.56,1.92.06-6.5-1-5.58-2.22-4.43C11,64.12,10.47,64.92,11.53,65.85Zm22,46.77c4.1-2.51,3.08-3.1,3.06-6.72-.7.24-1.48,1.37-3,2.22ZM14,85.67c.8-5-.55-4.71-1.58-5.66-.6-.55-.6-.78-1.35-1.1-.19,3.62-.67,3.91,1.59,5.75.45.37,1.1.73,1.34,1ZM33.64,95.91l-.06,4.78a18.61,18.61,0,0,0,3.05-2.34V93.68c-.88.38-.75.52-1.42,1.14a6.77,6.77,0,0,1-1.56,1.1Zm0,30.1-.05,4.81a11.32,11.32,0,0,0,2.89-2.43c.37-.77.18-3.71.09-4.72-.48.53-.9.69-1.48,1.28A3.46,3.46,0,0,1,33.63,126ZM11.07,107.36a14.56,14.56,0,0,1,1.5,1.31c.48.46,1.11.82,1.47,1.12.13-.93.25-4-.12-4.71a16.06,16.06,0,0,0-2.85-2.33v4.61Zm22.54,17.16c1.39-.68,1.25-1.19,3-2.33v-4.68c-3.69,2.44-3.16,2.34-3,7ZM14.1,79.67c0-1.11.31-3.85-.18-4.64a15.45,15.45,0,0,0-2.87-2.36c0,1.16-.29,3.85.22,4.67A13.69,13.69,0,0,0,14.1,79.67ZM33.77,70.6a8.09,8.09,0,0,0,1.41-1.18c.47-.46.91-.73,1.42-1.16V63.48a5.78,5.78,0,0,0-1.43,1.08c-.7.72-.94.77-1.55,1.37a12.81,12.81,0,0,0,.14,4.67Zm-22.71,55a13.48,13.48,0,0,1,1.53,1.28A6.54,6.54,0,0,0,14.05,128c.45-4.25.42-5-3-7.08ZM33.59,94.42a12.66,12.66,0,0,0,2.71-2.16c.75-.93.3-3.46.35-4.83C32.53,89.8,33.64,90.82,33.59,94.42ZM14.1,97.85c0-2.6,1.14-4.95-3-7,0,1.21-.3,3.79.22,4.68a14.41,14.41,0,0,0,2.83,2.32Zm6.17,35.56h7.56l-.07-2.26c-2.22,1.62-2.05,2.48-5.18-.71a19.11,19.11,0,0,0-2.71-2.15c0,1.85-.3,4.27.4,5.12Zm8-40.69L31,90.47c2.54-2,2.31-1.37,2.22-5.86l-3.6,2.88c-1.29,1.24-1.34.89-1.44,1.9a21.9,21.9,0,0,0,.1,3.34Zm-.05,30.1c1.08-.56,4.19-3.54,5-4V114.7a12.92,12.92,0,0,0-1.58,1.15c-3.65,3.13-3.57,2.34-3.44,7ZM19.54,78l0-4-5-4.13c-.59,5.28.68,4.31,2.94,6.57A8.45,8.45,0,0,0,19.54,78Zm-5.06,26c1.13.82,4.1,3.62,5,4,.15-3.25.44-3.74-1.35-5.17a14.51,14.51,0,0,1-1.81-1.49A8.89,8.89,0,0,0,14.47,100v4ZM31.6,66.12l1.6-1.31,0-2.9H30.74c-3,3.48-2.53-.16-2.57,6.89l3.43-2.68Zm-3.43,67.29h2.65a14.23,14.23,0,0,1,1.3-1.26c.77-.56,1-.37,1.11-1.39v-4.15l-2.63,2a11.82,11.82,0,0,1-2.44,1.94v2.85Zm.06-50.8,0,4.46c1-.52,4.35-3.64,5-4v-4.4C32.35,79.06,29.43,82,28.23,82.61Zm-13.74,35.2c-.13,4.37-.36,3.84,1.16,5.34l3.87,3-.07-4.47-3.82-3c-.51-.48-.47-.68-1.14-.92Zm13.69-.64c.72-.3,4-3.27,5-4l-.06-4.39-4.24,3.5c-1.17,1.1-.75,1.86-.75,4.93Zm0-6c1.07-.53,3.86-3.3,5-4l0-4.4a34.41,34.41,0,0,0-2.76,2.2c-.61.44-.81.79-1.38,1.24-.75.58-.87.34-.87,1.59l0,3.4Zm-8.67-21c-.09-5.83.57-3.4-3.07-6.9a14.69,14.69,0,0,0-2-1.5c.09,4.08-.56,4.09,1.13,5.27l3.26,2.68c.64.49-.14,0,.68.45ZM28.2,76.65v4.46l3.82-3a2.39,2.39,0,0,0,1.21-2c0-1.09,0-2.31,0-3.42-.73.31-.58.47-1.2,1l-3.82,3ZM19.53,96.13l0-4.5A10.05,10.05,0,0,1,17,89.72a29.65,29.65,0,0,0-2.57-2c0,3-.5,4.1,1.08,5.28A50.25,50.25,0,0,0,19.53,96.13Zm-5.06,15.72c0,3-.49,4.05,1.18,5.38a38,38,0,0,0,3.88,3l0-4.5c-1.37-.72-4.33-3.67-5-3.9Zm13.71-8.69,0,2.08,4.38-3.55c.88-.86.63-.55.64-2.55V96.52a34.35,34.35,0,0,0-3.18,2.59C28.21,100.45,28.15,100.26,28.18,103.16ZM14.47,98.3l5,4.07V97.59a11.43,11.43,0,0,1-2.48-2l-2.56-2V98.3Zm0,7.29a32.78,32.78,0,0,0-.06,3.29c0,1.72,0,1.51,1.11,2.29a49.54,49.54,0,0,0,4,3.13l-.06-4.59Zm0,18.17c-.21,2.68-.43,4.52,1,5.62a45,45,0,0,0,4,3.13l-.05-4.6-5-4.15Zm13.7-29.53,0,4.77c.89-.38.58-.43,1.31-1l3.75-3,0-4.68c-.88.38-3.74,3.28-5,4Zm-.06,34.87c1.67-1.1,2.56-2.13,4.07-3.21,1.06-.76,1-.82,1-2.42,0-1,0-2.09,0-3.12-1,.67-1.48,1.3-2.47,2a25.68,25.68,0,0,0-2.53,2.15l0,4.57ZM19.53,84.2l0-4.77c-1.41-.7-4.17-3.6-5-3.92-.14,4-.43,4.44,1,5.47l2.88,2.39c.74.69.36.52,1.14.83Zm-5.06-16c1.1.76,4,3.56,5,4,0-6,.44-4.14-1.23-5.72A8.62,8.62,0,0,0,17,65.44a9.63,9.63,0,0,1-1.24-1c-.64-.64-.48-.67-1.25-1Zm18-1.46-4.25,3.5v4.9c1.9-1.22,2.09-1.72,3.94-3.11,2-1.53.69-3.13,1.25-5.73-.75.3-.09,0-.53.25-.07,0-.21.27-.28.13S32.46,66.75,32.42,66.77ZM19.91,86.29l0,4.39a12.79,12.79,0,0,1,2,1.67L25,90c3.75-3.44,2.69-1.13,2.84-6.77L25,85.51c-.56.52-2.56,2.21-3.06,2.17s-1.37-1-2-1.38Zm5.51,33.28a13.3,13.3,0,0,0,1.69-1.39c1-1,.7-.62.7-2.33v-2.57c-.86.35-4.53,3.93-5.69,4.53a8.28,8.28,0,0,1-2.2-1.43l-.06,4.39,2.37,1.68,3.19-2.89ZM19.87,98.21c.06,2.92-.53,4,.67,5.16l5,4.14,2.28-1.71,0-4.73c-2.7,1.45-.88,2.86-5.09-.56a19.43,19.43,0,0,0-2.82-2.3Zm5.66-20.79,2.28-1.7V70.86c-3.12,2.1-1.86,1.89-3.75.47S22,69.51,19.87,68c.07,4.13-.6,4.53,1.4,5.93.84.59,1.19,1.13,2,1.72a8.33,8.33,0,0,1,1.11.87c.67.64.34.51,1.14.92Zm2.3-15.51H24a4.44,4.44,0,0,1-2.1,1.56l-2-1.46c0,5.24-.45,4.15,1.43,5.53,1.12.82,3.36,3.25,4.52,3.52a5.79,5.79,0,0,1,2-1.73l0-4.74s-.13,0-.15.09l-1.26,1c-.5.39-.8.83-1.72.58-.13-.85,1-1.59,1.55-2C27.12,63.64,27.82,63.49,27.83,61.91ZM19.88,78.47a29.33,29.33,0,0,1,2.6,2.17c1,1,.24,1.62-1.2.46A15.68,15.68,0,0,0,19.87,80c0,4.83-.6,4.31,2,6.35l5.92-4.72,0-4.43c-2.16,1.81-2.23,2.25-5.09-.64l-2.82-2.23v4.1Zm0,36.34a7.86,7.86,0,0,1,1.94,1.67c1.12-.35.54-.44,2.32-1.72.8-.58,1.18-1.13,2-1.72,2.41-1.71,1.61-2.28,1.68-5.73-.89.46-1.07,1.11-2.3,1.57-1.51-.73-4.66-3.94-5.63-4.42-.18,5.14-.16,3.87,2,5.68.41.34,2,2.09.16,1.59-1-.27-1.26-1.25-2.18-1.61v4.69Zm4.81,11.76c-.11-.94,1.35-1.85,1.95-2.28,1.65-1.17,1.21-1.88,1.16-5.05-1.17.55-4.43,4.07-5.94,4.57l-2-1.48c.1,5.09-.39,4.18,1.55,5.6l4.11,3.42c1-.42.58-.71,2.29-1.72v-4.74c-1.16.47-1.65,2.08-3.15,1.68Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a3a62c40-a3e3-4399-8eea-056f9187cebe);"></path>
                                        </g>
                                        <path d="M14.59,61c7.31-2.24,10.55,0,15.83,0a4.34,4.34,0,0,1,4.44,4.21V129a4.35,4.35,0,0,1-4.44,4.22c-5.28,0-11.48,2.83-15.83,0C7.91,128.84,10.39,62.29,14.59,61Z" transform="translate(0 0)" style="fill:none;"></path>
                                        <path d="M14.49,258.73c7.27-2.36,10.55-.17,15.82-.25a4.33,4.33,0,0,1,4.51,4.14q.52,31.89,1,63.77a4.36,4.36,0,0,1-4.38,4.29c-5.27.08-11.43,3-15.82.25C8.91,326.68,10.31,260.09,14.49,258.73Z" transform="translate(0 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="clip-path:url(#af5fe2a6-5003-4df4-829d-9eb149d54038);">
                                            <path id="eacfd6d0-6ff1-45b6-8e49-787031eb6409" data-name="1" d="M22.55,291.29a8.61,8.61,0,0,1-2.2-1.39v4.39c.44.33.92.62,1.37,1a43.33,43.33,0,0,0,4.36,3.52,6.71,6.71,0,0,0,1.56-1.28c1.08-1,.67-1.2.64-3.82v-1.38c-.83.6-2,2-3.06,1.75-.26-.8-.22-.44.29-1l2.74-2.29-.07-4.15c-.72.32-4.6,4.08-5.62,4.63Zm13.78-32-2.84,0,0,2.3A5.42,5.42,0,0,0,35,260.59l1.31-1.29Zm-1.69,71.53,3.06-.05-.09-3.34c-.88.39-.71.52-1.37,1.17a6.17,6.17,0,0,1-1.57,1.1l0,1.12Zm-19.11.31,4-.07a27.66,27.66,0,0,0-4.06-3.29Zm3.9-71.57-4.84.08,3.51,3a8.06,8.06,0,0,0,1.35.89v-4ZM14.6,331.15h.57l-.07-3.76A18,18,0,0,0,12,325l.08,4A20.1,20.1,0,0,1,14.6,331.15Zm19.26-49,.06,3.42c1.12-.5.82-.6,1.67-1.34,1.57-1.38,1.34-.29,1.29-3.82l0-1.3c-.55.28-3,2.14-3,3ZM11.13,268.81l3,2.37c.08-1.21.27-3.4-.29-4.23a20.41,20.41,0,0,0-2.81-2.16Zm24.2,46.25c2.64-2.46,2.13-.52,2-5.83-.93.36-1.12,1.27-3,2.27l0,4.2ZM14.67,301.25c0-5.28,0-3.76-1.7-5.3-.62-.55-.6-.82-1.41-1.08,0,1.17-.32,3.53.3,4.3ZM11.42,287l3,2.38,0-4.31-3-2.4Zm22.37-9,0,2a19.58,19.58,0,0,0,2.94-2.4l0-4.37a15,15,0,0,0-2.13,1.66C33.55,275.93,33.76,276.21,33.79,278Zm2.94,24.21c.8-.78.44-3.18.42-4.85-3.47,2.38-2.94,1.91-2.95,6.77l2.53-1.92Zm-3-29.5,0,1.33a21.14,21.14,0,0,0,3-2.38l-.1-4.4c-.37.27-.69.48-1.06.78-2.27,1.82-1.93,1.83-1.88,4.67Zm-21.88,40.1c.24,5.62-.79,3.39,1.89,5.69.64.55.43.73,1.24,1,0-1.19.36-3.63-.31-4.46,0,0-1.24-1.12-1.38-1.24a8.2,8.2,0,0,0-1.44-1Zm0-6c-.55,5.3.42,4.42,1.79,5.78a3.21,3.21,0,0,0,1.28.92l-.06-4.29c-1-.78-2-1.72-3-2.41Zm-.29-43.13c.05,0,2.42,1.8,2.59,1.88,0-6.51-1.07-5.57-2.3-4.4-.83.79-1.37,1.61-.29,2.52ZM34.29,310c4.06-2.57,3-3.15,3-6.77-.7.26-1.46,1.39-3,2.27Zm-20-26.63c.72-5.06-.62-4.7-1.66-5.63-.62-.55-.62-.78-1.38-1.08-.13,3.63-.61,3.91,1.68,5.73a14.56,14.56,0,0,1,1.36,1Zm19.78,9.93v4.77a18.33,18.33,0,0,0,3-2.39L37,291.06c-.87.39-.74.52-1.4,1.15a6.46,6.46,0,0,1-1.54,1.12Zm.47,30.08,0,4.82a11.26,11.26,0,0,0,2.85-2.48c.36-.78.12-3.71,0-4.72-.46.54-.89.71-1.46,1.31a3.28,3.28,0,0,1-1.43,1.07ZM11.72,305.15a13.79,13.79,0,0,1,1.52,1.28c.48.45,1.12.81,1.48,1.1.11-.94.19-4-.2-4.71a15.23,15.23,0,0,0-2.88-2.28Zm22.81,16.79c1.38-.71,1.23-1.21,3-2.38l-.06-4.68c-3.66,2.49-3.12,2.39-2.92,7.06ZM14.3,277.41c0-1.11.24-3.86-.25-4.63a15.53,15.53,0,0,0-2.91-2.32c0,1.16-.23,3.85.29,4.66A13.7,13.7,0,0,0,14.3,277.41ZM33.82,268a8.26,8.26,0,0,0,1.39-1.2,16.12,16.12,0,0,1,1.41-1.19l-.07-4.78a6,6,0,0,0-1.42,1.1c-.69.73-.92.79-1.52,1.4A12.81,12.81,0,0,0,33.82,268ZM12,323.36a13.14,13.14,0,0,1,1.56,1.25A6.28,6.28,0,0,0,15,325.74c.38-4.26.34-5-3.1-7Zm22-31.52a12.28,12.28,0,0,0,2.68-2.2c.74-.94.25-3.47.27-4.83-4.08,2.44-2.95,3.44-2.95,7ZM14.6,295.58c-.1-2.59,1.05-5-3.17-6.95.06,1.22-.24,3.79.3,4.68a14.84,14.84,0,0,0,2.87,2.28ZM21.34,331l7.56-.12-.11-2.26c-2.19,1.66-2,2.52-5.18-.62a19.08,19.08,0,0,0-2.75-2.11c.06,1.85-.23,4.28.48,5.11Zm7.33-40.81,2.68-2.29c2.51-2,2.29-1.41,2.12-5.9L29.92,285c-1.27,1.26-1.32.91-1.4,1.92a20.53,20.53,0,0,0,.15,3.33Zm.43,30.1c1.08-.58,4.14-3.61,4.95-4.11l0-4.09a12.09,12.09,0,0,0-1.57,1.17c-3.59,3.19-3.53,2.39-3.33,7ZM19.71,275.6l-.1-4-5-4c-.51,5.28.75,4.29,3,6.52a8.81,8.81,0,0,0,2.1,1.51Zm-4.64,26.1c1.15.8,4.16,3.55,5.08,4,.1-3.25.39-3.75-1.42-5.15a13.65,13.65,0,0,1-1.84-1.46,9,9,0,0,0-1.9-1.38l.08,4Zm16.51-38.12,1.57-1.34,0-2.9-2.47,0c-2.93,3.53-2.53-.12-2.46,6.93l3.39-2.74Zm-2.34,67.33,2.65,0a14,14,0,0,1,1.28-1.28c.76-.57.95-.39,1.08-1.4L34.19,324l-2.6,2.06a12.26,12.26,0,0,1-2.4,2l0,2.84Zm-.76-50.79,0,4.46c1-.53,4.29-3.71,4.94-4.1l-.06-4.4C32.54,276.51,29.66,279.46,28.48,280.12ZM15.3,315.54c-.05,4.37-.29,3.85,1.26,5.32l3.91,3-.14-4.47-3.87-2.93c-.52-.48-.48-.67-1.16-.9ZM29,314.68c.71-.31,3.93-3.33,5-4.12l-.13-4.39-4.18,3.57c-1.15,1.11-.72,1.87-.67,4.94Zm-.08-6c1.06-.55,3.81-3.37,4.95-4.12l-.09-4.39A33,33,0,0,0,31,302.45c-.59.45-.79.81-1.35,1.26-.74.6-.87.36-.85,1.61l.08,3.4Zm-9-20.9c-.18-5.83.51-3.41-3.18-6.85a14.82,14.82,0,0,0-2-1.46c.15,4.07-.49,4.09,1.22,5.24l3.3,2.64c.65.47-.14,0,.69.43Zm8.45-13.66.09,4.46,3.76-3.05a2.38,2.38,0,0,0,1.18-2c0-1.08-.05-2.31-.07-3.41-.73.32-.58.47-1.19,1l-3.77,3.05ZM20,293.78l-.09-4.5a10.3,10.3,0,0,1-2.52-1.87,26.69,26.69,0,0,0-2.6-2c.1,3-.44,4.1,1.17,5.26a49,49,0,0,0,4,3Zm-4.81,15.8c0,3-.43,4.06,1.26,5.36a38.58,38.58,0,0,0,3.94,3l-.12-4.5C18.89,312.7,15.89,309.8,15.19,309.58Zm13.57-8.91,0,2.08,4.32-3.62c.87-.88.63-.56.6-2.56l0-2.62a35.08,35.08,0,0,0-3.14,2.64c-1.81,1.36-1.88,1.18-1.8,4.08ZM15,296l5.11,4L20,295.24a11,11,0,0,1-2.51-1.92L14.9,291.4,15,296Zm.17,7.29c-.1,1.08,0,2.2,0,3.29,0,1.72,0,1.51,1.15,2.27a48.69,48.69,0,0,0,4,3.06l-.14-4.58-5-4Zm.28,18.17c-.16,2.68-.36,4.53,1.13,5.6a42.88,42.88,0,0,0,4,3.06l-.12-4.6-5-4.07Zm13.23-29.75,0,4.77c.89-.39.58-.44,1.29-1.05l3.7-3.08-.1-4.68c-.87.39-3.69,3.34-4.93,4Zm.5,34.86c1.65-1.11,2.52-2.17,4-3.27,1-.77,1-.84,1-2.43,0-1,0-2.09-.1-3.12-1,.68-1.47,1.32-2.44,2.06A24.54,24.54,0,0,0,29.11,322l0,4.57ZM19.8,281.86l-.1-4.78c-1.42-.67-4.23-3.53-5.08-3.84-.08,4-.36,4.45,1.11,5.45L18.65,281c.75.68.37.53,1.15.82ZM14.48,266c1.12.74,4.05,3.5,5.09,4-.06-5.94.37-4.15-1.32-5.69a9.06,9.06,0,0,0-1.3-1.11,9.72,9.72,0,0,1-1.25-.94c-.66-.63-.5-.66-1.27-1l.05,4.78Zm17.93-1.75-4.19,3.57.07,4.9c1.88-1.25,2.06-1.75,3.9-3.17,2-1.56.63-3.14,1.15-5.75-.75.31-.09,0-.53.26-.06,0-.2.27-.28.13S32.45,264.2,32.41,264.21ZM20.22,283.94l0,4.39a12.22,12.22,0,0,1,2,1.63l3.1-2.44C29,284,28,286.34,28.08,280.7l-2.81,2.38c-.55.52-2.52,2.24-3,2.21s-1.38-1-2-1.35Zm6.05,33.18a12.73,12.73,0,0,0,1.66-1.42c1-1,.69-.63.67-2.34l-.05-2.57c-.85.36-4.47,4-5.61,4.63A8.6,8.6,0,0,1,20.71,314v4.4l2.4,1.64,3.15-2.94Zm-5.9-21.27c.11,2.92-.46,4,.75,5.15l5.07,4.06,2.25-1.75-.11-4.72c-2.68,1.49-.84,2.87-5.1-.48A19,19,0,0,0,20.37,295.85ZM25.69,275l2.25-1.75-.08-4.85c-3.09,2.15-1.84,1.92-3.75.53s-2.11-1.79-4.23-3.27c.14,4.13-.53,4.53,1.49,5.9.85.58,1.21,1.12,2,1.69a9.27,9.27,0,0,1,1.13.85c.67.64.34.51,1.15.9Zm2-15.55-3.83.06a4.45,4.45,0,0,1-2.08,1.6l-2-1.43c.1,5.24-.39,4.16,1.52,5.51,1.13.8,3.41,3.19,4.58,3.44a5.7,5.7,0,0,1,1.94-1.76l0-4.74c-.05,0-.12,0-.15.1l-1.24,1c-.49.4-.79.84-1.71.61-.14-.84.95-1.61,1.52-2,.86-.64,1.55-.81,1.54-2.39Zm-7.69,16.68a31.27,31.27,0,0,1,2.64,2.13c1,.94.27,1.62-1.18.49a17.72,17.72,0,0,0-1.43-1.05c.09,4.84-.54,4.33,2.13,6.32l5.84-4.81-.1-4.43c-2.14,1.84-2.2,2.29-5.1-.55L20,272l.06,4.09Zm.6,36.34a7.83,7.83,0,0,1,2,1.64c1.11-.37.54-.45,2.29-1.76.8-.59,1.17-1.15,2-1.75,2.39-1.75,1.57-2.3,1.59-5.75-.88.47-1,1.12-2.27,1.6-1.53-.7-4.72-3.86-5.7-4.33-.1,5.14-.1,3.87,2.09,5.65.41.33,2,2.05.18,1.58-1-.25-1.28-1.22-2.2-1.57l.07,4.69Zm5,11.68c-.12-.94,1.32-1.87,1.92-2.31,1.63-1.2,1.18-1.9,1.07-5.07-1.15.57-4.35,4.15-5.86,4.67l-2-1.45c.18,5.09-.32,4.19,1.64,5.57l4.16,3.36c1-.44.57-.72,2.26-1.76l-.07-4.74c-1.14.49-1.61,2.11-3.11,1.73Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f32fbea8-54b3-4da3-96e7-896c456c5b39);"></path>
                                        </g>
                                        <path d="M14.49,258.73c7.27-2.36,10.55-.17,15.82-.25a4.33,4.33,0,0,1,4.51,4.14q.52,31.89,1,63.77a4.36,4.36,0,0,1-4.38,4.29c-5.27.08-11.43,3-15.82.25C8.91,326.68,10.31,260.09,14.49,258.73Z" transform="translate(0 0)" style="fill:none;"></path>
                                        <path d="M111.25,377.25v-.07a158.62,158.62,0,0,0,29.67-5c14.81-4.17,22.22-9,25.28-31.77,2.78-20.73,1.09-48.39,1.89-78.24.72-27.07,2.26-182-2.29-217.41a37.24,37.24,0,0,0-9.07-20.26C141.08,6.71,115.18-.08,91.79,0,67.53.08,42.35,5.88,26,24.48a37.22,37.22,0,0,0-9.06,20.2c-4.56,35.31-3,190.36-2.3,217.4.8,29.88-.9,57.56,1.89,78.31C19.56,363.19,27,368,41.78,372.16a158.62,158.62,0,0,0,29.67,5v.07c6.12.44,12.6.7,19.21.72H92C98.65,378,105.13,377.69,111.25,377.25Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#fd003ea2-c4d8-4b3a-bd5f-bfc3fe214604);"></path>
                                        <g style="mask:url(#ec1e50d2-1ffa-4016-9824-3cac04ce275e);">
                                            <path d="M23,337.93,21.35,337c.44,9,.59,18.41,5.88,21.48,5.15,4.25,11.19,6.23,17.24,8.17,3.38.8,6.75,1.67,10.15,2.4,5.46,1.17-.52-1.24-5.48-3.82a81.66,81.66,0,0,1-13.81-9A45.65,45.65,0,0,1,23,337.93Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e1424347-4704-40a8-ae12-24c557160f49);"></path>
                                        </g>
                                        <path d="M27.45,50.44a6.07,6.07,0,0,1,1.12,4c-.24,9.72-5.49,30.6-2.12,37.78.71,1.51,2.34,2.33,4.25,2.93" transform="translate(0 0)" style="fill:none;"></path>
                                        <g style="mask:url(#f8951adc-004b-40fc-82b3-d29585f4d333);">
                                            <path d="M25.52,80.39q1.52-13,3.05-26C27.08,60,25.45,65,24.46,70.17c-2.64,13.88-3.41,27.3-5.16,42.52C21.37,101.93,23.3,89.08,25.52,80.39Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e0183456-9b7b-4e29-bf74-caf78a5f4088);"></path>
                                        </g>
                                        <g style="mask:url(#be8a1598-70f6-467b-bdb0-ab6b857b36ce);">
                                            <path d="M27.45,50.44c1.21-4.27,2.34-8.54,3.9-12.66C33,33.42,34.79,28.87,37.9,25c2.55-3.16,6.09-5.76,10.38-8.35C59,10.17,87.72,2.54,97,2.65l0,73.11C74.85,76.4,35.32,78,30.7,95.12,26.13,94,25.28,90,25.33,85.19a133,133,0,0,1,1.46-15.62c.94-7,2.82-15.49.66-19.13Z" transform="translate(0 0)" style="fill:#aa7100;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M39.46,344.59c10.15,11.44,30.7,13.26,51.17,13.47,21.21.21,42.36-1.6,52.89-13.45a2.59,2.59,0,0,0,.56-2.52c-.68-2.22-1.12-3.56-1.77-5.59a2.58,2.58,0,0,0-1.68-1.69,3.19,3.19,0,0,0-2.36.34c-18.64,8-73,8.24-93.63-.06a3.32,3.32,0,0,0-2.35-.35,2.56,2.56,0,0,0-1.69,1.68c-.66,2-1.13,3.67-1.71,5.69a2.58,2.58,0,0,0,.57,2.48Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#fbb31a8a-ac97-41c9-be53-808e740f63a9);"></path>
                                        <path d="M35.61,113.05q-.3,14.63-.61,29.25l3.57,85.81c.61,26.59-3.61,54.11-3,80.7.48,20.52,29.24,25.32,53.85,25.45,26.12.13,59.12-6.52,59.59-26.54.61-26.52-4.89-53.06-4.28-79.58l3.57-85.81q-.31-14.61-.61-29.24c-37.36,1.32-74.72,1.18-112.08,0Z" transform="translate(0 0)" style="fill:#171614;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#f34d8587-75d4-4ed3-b432-1f73423b9903);">
                                            <path d="M159.91,338l1.64-.89c-.44,9-.58,18.42-5.87,21.48-5.15,4.25-11.19,6.23-17.25,8.18-3.38.8-6.75,1.66-10.15,2.39-5.46,1.18.52-1.23,5.48-3.81a82.2,82.2,0,0,0,13.82-9A42.45,42.45,0,0,0,159.91,338Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b02917c0-ce4c-4671-a722-785e3dda723a);"></path>
                                        </g>
                                        <path d="M147.57,356.33c-6.07,5.05-13.86,8.85-20.35,12.25-.71.37-1.49.75-.79.86a131.64,131.64,0,0,0,26.19-12.38c3.19-1.95,4.12-2.77,5.44-6.31a65.08,65.08,0,0,0,3.49-13.67l-1.64.89A40.16,40.16,0,0,1,147.57,356.33Z" transform="translate(0 0)" style="fill:#c82c2c;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#ba45c6a0-5f59-468f-9349-97e696261ba1);">
                                            <path d="M92,2.65l-.39,22.87,64,33c-.85-6-2.39-13.4-.13-14.7-4.91-24.82-20.78-30.18-38.45-36A175.13,175.13,0,0,0,92,2.65Z" transform="translate(0 0)" style="fill:#fbd95d;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#e5b569ba-8332-4d0c-8a14-02c6dc79552d);">
                                            <path d="M91.3,2.67l.39,22.86-64,33c.85-6,2.39-13.41.14-14.7,4.9-24.82,20.77-30.18,38.44-36A175.42,175.42,0,0,1,91.3,2.67Z" transform="translate(0 0)" style="fill:#fbdc6c;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#b1325dd1-fd4c-46a0-a7b6-0ffabedbe843);">
                                            <path d="M46.86,369.05a3.67,3.67,0,0,0,3.42,3.16c18,5.4,64.26,5.4,82.27,0a3.67,3.67,0,0,0,3.42-3.16,227.12,227.12,0,0,1-43.8,4.13A227.68,227.68,0,0,1,46.86,369.05Z" transform="translate(0 0)" style="fill:#8d5b00;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M35.43,356.31c6.07,5.05,13.86,8.85,20.35,12.25.71.37,1.49.75.79.86A131.64,131.64,0,0,1,30.38,357c-3.19-2-4.12-2.77-5.44-6.32a64.82,64.82,0,0,1-3.49-13.66l1.64.89a46.12,46.12,0,0,0,12.34,18.36Z" transform="translate(0 0)" style="fill:#c82c2c;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#b7db0889-a3e5-427d-9d09-409b55bf633c);">
                                            <path d="M28.43,334.65l-10.71-113q2.05,53.15,4.1,106.3a38.47,38.47,0,0,0,1.45,10.34,39.78,39.78,0,0,0,9.49,15.52c4.93,5.08,12.72,9.27,18.86,12.56,3.38,1.36-.29-1.15-2.17-2.67-11.89-9.58-19.56-17.05-21-29.07Z" transform="translate(0 0)" style="fill:#af6f00;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#a943f2cd-b15a-4617-a6a1-0f1bb2b14b63);">
                                            <path d="M35.43,356.31c6.07,5.05,13.86,8.85,20.35,12.25.71.37,1.49.75.79.86A131.64,131.64,0,0,1,30.38,357l-.16-.1,4.8-1,.4.37Z" transform="translate(0 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#e82176d9-9386-4cda-ac35-09909e2e997e);">
                                            <path d="M147.57,356.4c-6.08,5-13.87,8.85-20.36,12.24-.71.38-1.49.76-.79.87a131.68,131.68,0,0,0,26.19-12.38l.17-.1L148,356l-.4.37Z" transform="translate(0 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#a943f2cd-b15a-4617-a6a1-0f1bb2b14b63);">
                                            <path d="M35.43,356.31c6.07,5.05,13.86,8.85,20.35,12.25.71.37,1.49.75.79.86A131.64,131.64,0,0,1,30.38,357l-.16-.1,4.8-1,.4.37Z" transform="translate(0 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M45.87,180.34h92c3.53,0,6.4,3.22,6.4,7.18V200c0,4-2.87,7.18-6.4,7.18h-92c-3.53,0-6.39-3.21-6.39-7.18V187.52C39.48,183.56,42.34,180.34,45.87,180.34Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ba86ff2d-ec1d-4c4b-8412-61cf9c2ec883);"></path>
                                        <g style="mask:url(#e82176d9-9386-4cda-ac35-09909e2e997e);">
                                            <path d="M147.57,356.4c-6.08,5-13.87,8.85-20.36,12.24-.71.38-1.49.76-.79.87a131.68,131.68,0,0,0,26.19-12.38l.17-.1L148,356l-.4.37Z" transform="translate(0 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#b5118f2c-964b-436e-bf7a-5e4f47f7a924);">
                                            <path d="M154.55,334.65l10.71-113q-2.06,53.15-4.1,106.3a38.47,38.47,0,0,1-1.45,10.34,39.78,39.78,0,0,1-9.49,15.52c-4.93,5.08-12.72,9.27-18.86,12.56-3.38,1.36.29-1.15,2.17-2.67,11.89-9.58,19.56-17.05,21-29.07Z" transform="translate(0 0)" style="fill:#af6f00;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M41.36,231.81l-4.11-83.24c1.1-19.77-7-47.53-11-68.58-.47-2.51-1-3.53-1.48-3.56S24,76.8,24,78.76c-4.59,74.72-.91,148.7,4.15,223.16a32.1,32.1,0,0,0,.56,5.09c.52,2.3,2.58,11.29,5.47,11.85,1.43.27,1.78-3,2-6.49,1.49-26.68,3.75-53.88,5.24-80.56Z" transform="translate(0 0)" style="fill:#070603;fill-rule:evenodd;"></path>
                                        <path d="M14.81,265.85l.75.19a16.34,16.34,0,0,1,4.6,1.6,23,23,0,0,1,1.93,1.28,17.73,17.73,0,0,0,5.16,2.52l.07.51A18.21,18.21,0,0,1,22,269.57c-.64-.45-1.28-1-1.93-1.39a17.23,17.23,0,0,0-4.54-1.83l-.75-.18.06-.32Z" transform="translate(0 0)" style="fill:#8b5800;"></path>
                                        <path d="M14.47,87.51c1.48.31,3,.56,4.42.76s2.89.36,4.33.5l0,.32c-1.44-.14-2.89-.3-4.34-.5s-2.9-.45-4.39-.76v-.32Z" transform="translate(0 0)" style="fill:#8b5800;"></path>
                                        <path d="M25.86,80.88a3.64,3.64,0,0,1,2-2,4.65,4.65,0,0,1,2.71-.2l0,.34a4.71,4.71,0,0,0-2.65.16,4.38,4.38,0,0,0-2.06,2.14l-.07-.47Z" transform="translate(0 0)" style="fill:#8b5800;"></path>
                                        <path d="M19.53,97.45h0c.56,0,1,2.14,1,4.78h0c0,2.64-.45,4.78-1,4.78h0c-.55,0-1-2.14-1-4.78h0C18.52,99.59,19,97.45,19.53,97.45Z" transform="translate(0 0)" style="fill:#201f1b;fill-rule:evenodd;"></path>
                                        <path d="M17.73,98.38c1.53-.41,1.36.68,1.49,2.45a68.74,68.74,0,0,1,.23,7.63c-.13,2.79-.57,3.26-2.87,3.92-3.93,1.12-7.34,2.18-11.28,3.36-2.51.75-4.06.5-4.88-1.71-1.22-3.29.47-4.69,2-6.73,2.68-3.65,7.7-6.88,15.34-8.92Z" transform="translate(0 0)" style="fill:#ffa60d;fill-rule:evenodd;"></path>
                                        <path d="M15.67,112.64c-3.38,1-6.64,2-10,3-1,.28-3.35,1.06-4-.13-.37-.72.35-.75,1-1a62.4,62.4,0,0,1,6.64-2.37l7-2.09c1.27-.41,2.24-.61,2.56-.37,1.12.84-2.14,2.67-3.19,3Z" transform="translate(0 0)" style="fill:#201f1b;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#fdc443c3-8cf3-4897-8959-a8256bf404fb);">
                                            <path d="M6.87,106.45a24.87,24.87,0,0,1,10.4-6.84c0,2.59.05,5.19.07,7.78Z" transform="translate(0 0)" style="fill:#ffe66a;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M165,97.51h0c.55,0,1,2.14,1,4.78h0c0,2.64-.45,4.78-1,4.78h0c-.56,0-1-2.14-1-4.78h0C164,99.65,164.42,97.51,165,97.51Z" transform="translate(0 0)" style="fill:#201f1b;fill-rule:evenodd;"></path>
                                        <path d="M166.78,98.44c-1.53-.41-1.36.68-1.49,2.45a68.94,68.94,0,0,0-.24,7.63c.14,2.79.58,3.26,2.88,3.92,3.92,1.12,7.33,2.18,11.27,3.36,2.52.75,4.07.5,4.89-1.71,1.21-3.29-.47-4.69-2-6.73-2.68-3.65-7.7-6.88-15.34-8.92Z" transform="translate(0 0)" style="fill:#ffa60d;fill-rule:evenodd;"></path>
                                        <path d="M168.84,112.7c3.37,1,6.64,2,10,3,1,.28,3.35,1.06,4-.13.37-.72-.36-.75-1-1a62.4,62.4,0,0,0-6.64-2.37l-7-2.09c-1.28-.41-2.25-.61-2.57-.37-1.11.84,2.15,2.67,3.19,3Z" transform="translate(0 0)" style="fill:#201f1b;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#a194fc3b-feb9-4c1b-876a-53960fe5c581);">
                                            <path d="M177.64,106.5a24.94,24.94,0,0,0-10.4-6.83c0,2.59-.05,5.19-.07,7.78Z" transform="translate(0 0)" style="fill:#ffe66a;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#e69a8f6a-84ec-48a0-ac39-15e6b8f61c49);">
                                            <path d="M22,137.09c-.05,20.62,0,41.24.78,61.81L37.9,209.16c-.85-23.79-1.69-56.78-2.53-80.57C33,113.45,31,107,28.55,91.87c-.67-4.16-1.74-9.09-2.65-13.24a5.37,5.37,0,0,0-.7-1.78c-.66-1-1.17-.25-1.24,2.22-.42,7.85-1,15.67-1.17,23.49-.31,11.51-.44,23-.83,34.53Z" transform="translate(0 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M35.82,129.74c-2-14-7.37-35.23-10-48.94-.17-.88-.34-1.63-.52-2.25a6.81,6.81,0,0,0-.51-1.36c0,.14-.08.37-.14.66a22.72,22.72,0,0,0-.29,3l-1.58,45.7c-1.47,42.51,1,90,3.2,133l.23,4.37c.16,2.52.3,5.86.45,9.61.55,13.16,1.31,31.46,4.07,39,1.73,4.29,2.92,6.13,3.59,5.62.87-.66,1.36-4,1.5-9.88v0l3.69-47.42h0l-2.64,47.51c-.15,6.29-.8,9.92-2,10.81-1.35,1-3.07-1-5.15-6.12v0c-2.84-7.73-3.6-26.17-4.15-39.42-.15-3.71-.29-7-.45-9.58l-.23-4.38c-2.22-43-4.67-90.52-3.2-133.09l1.58-45.71a23.72,23.72,0,0,1,.31-3.23c.18-1,.48-1.59.9-1.74l.07,0c.4-.09.77.16,1.08.72a7.82,7.82,0,0,1,.63,1.63c.18.65.37,1.45.54,2.37,2.63,13.7,6.47,29.7,8.52,43.68l.45,5.51ZM24.85,77h0Z" transform="translate(0 0)" style="fill:#393837;"></path>
                                        <g style="mask:url(#a0ceb80e-1f09-4d2f-9c45-9078109d1915);">
                                            <path d="M35.38,124.22c-2.05-13.94-6.08-29.71-8.71-43.42a22.65,22.65,0,0,0-.52-2.25,6.81,6.81,0,0,0-.51-1.36l-.14.66a22.72,22.72,0,0,0-.29,3l-1.58,45.7c-1.46,42.51,1,90,3.21,133l.22,4.37c.16,2.52.3,5.86.46,9.61.54,13.16,1.3,31.46,4.06,39,6.11,19.06,6.55-47.4,7.94-51.71h0l-1.8,47.51c-.15,6.29-.8,9.92-2,10.81-1.35,1-3.06-1-5.14-6.12v0c-2.83-7.73-3.6-26.17-4.15-39.42-.15-3.71-.29-7-.45-9.58l-.23-4.39c-2.22-43-4.67-90.51-3.2-133.09l1.58-45.7a23.72,23.72,0,0,1,.31-3.23c.71-3.73,1.73-.91,2.21.77a23.78,23.78,0,0,1,.61,2.3l8.15,40.2-.07,3.35ZM25.69,77h0Z" transform="translate(0 0)" style="fill:url(#f321bc5a-5ba9-4750-9c59-10554d9feeaa);"></path>
                                        </g>
                                        <path d="M15,141.8c.36-1,1.23-1,1.87.18a6.07,6.07,0,0,1,.54,3.32c-1.41,2.18-.1,9.72-.14,10.24-.11,1.45-.22,2.91-.32,4.36a1.33,1.33,0,0,1-2.15-.32c-.8-2.57-.69-3.69-.81-6.4-.18-4.23-.76-6.55,1-11.38Z" transform="translate(0 0)" style="fill:#ae6e00;fill-rule:evenodd;"></path>
                                        <path d="M14.86,142.14c.37-1,.74-1.36,1.38-.16a6.07,6.07,0,0,1,.54,3.32c-1.24,4.06-.05,9.07-.14,10.24-.11,1.45-.22,2.91-.32,4.36-.39.5-.87.6-1.6-.43a20,20,0,0,1-1.36-6.29c-.18-4.23-.27-6.21,1.5-11Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#acc52f6a-42f0-4997-8677-4ce80e2fcba9);"></path>
                                        <g style="mask:url(#b42eb0d6-64e8-47eb-863c-46de99584afc);">
                                            <path d="M13.63,155.67a17.06,17.06,0,0,1-.27-2.49c-.14-3.39-.23-5.34.66-8.47.31,1.39,0,2.73,0,4.79s.15,4.52-.4,6.17Z" transform="translate(0 0)" style="fill:#ffe66a;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M15.23,230.85c.37-1,1.24-1,1.88.18a6.07,6.07,0,0,1,.54,3.32c-1.41,2.18-.1,9.72-.14,10.24L17.18,249a1.33,1.33,0,0,1-2.15-.32c-.79-2.57-.68-3.69-.8-6.41-.19-4.22-.77-6.54,1-11.37Z" transform="translate(0 0)" style="fill:#8a5800;fill-rule:evenodd;"></path>
                                        <path d="M15.1,231.19c.37-1,.74-1.36,1.38-.16a6.07,6.07,0,0,1,.54,3.32c-1.25,4.06-.06,9.07-.14,10.24L16.55,249c-.38.5-.86.6-1.6-.43a19.94,19.94,0,0,1-1.35-6.3c-.18-4.22-.27-6.21,1.5-11Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bda66af1-90a4-4422-9877-02ec6cb403c5);"></path>
                                        <g style="mask:url(#a59e58a4-c89b-4117-8e20-a2e989392fa1);">
                                            <path d="M13.87,244.71a15.64,15.64,0,0,1-.27-2.49c-.15-3.39-.23-5.33.65-8.47.32,1.4,0,2.73,0,4.79s.15,4.53-.39,6.17Z" transform="translate(0 0)" style="fill:#ffe35b;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M168,142.39c-.37-1-1.24-1-1.87.18a6,6,0,0,0-.55,3.32c1.41,2.18.11,9.72.15,10.24.1,1.45.21,2.91.32,4.36a1.33,1.33,0,0,0,2.15-.32c.8-2.57.69-3.69.81-6.41.18-4.22.76-6.54-1-11.37Z" transform="translate(0 0)" style="fill:#ae6e00;fill-rule:evenodd;"></path>
                                        <path d="M168.15,142.73c-.37-1-.75-1.36-1.38-.16a6,6,0,0,0-.54,3.32c1.24,4.06.05,9.07.14,10.24.11,1.45.21,2.91.32,4.36.39.5.86.6,1.6-.43a20,20,0,0,0,1.36-6.3c.18-4.22.27-6.21-1.5-11Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f16db043-b34c-4da6-ba8b-1d063ce64e3f);"></path>
                                        <g style="mask:url(#fb08fa1c-297f-4cc7-b93f-3ed7f47dae6c);">
                                            <path d="M169.38,156.26a17.36,17.36,0,0,0,.26-2.5c.15-3.39.24-5.33-.65-8.47-.31,1.4,0,2.73,0,4.79s-.15,4.53.4,6.18Z" transform="translate(0 0)" style="fill:#ffe66a;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M167.94,229.53c-.37-1-1.24-1-1.88.18a6.07,6.07,0,0,0-.54,3.32c1.41,2.18.1,9.71.14,10.24l.33,4.36a1.33,1.33,0,0,0,2.15-.32c.79-2.57.68-3.69.8-6.41.18-4.22.77-6.54-1-11.37Z" transform="translate(0 0)" style="fill:#ae6e00;fill-rule:evenodd;"></path>
                                        <path d="M168.07,229.87c-.37-1-.74-1.36-1.38-.16a6.07,6.07,0,0,0-.54,3.32c1.25,4.06,0,9.07.14,10.24l.33,4.36c.38.5.86.6,1.6-.43a20.28,20.28,0,0,0,1.35-6.3C169.75,236.68,169.84,234.69,168.07,229.87Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#abf904bc-25a5-43de-89e8-5c234f4f3f43);"></path>
                                        <g style="mask:url(#e8ba9c5d-52e4-41fe-b6ae-466f17e22ab6);">
                                            <path d="M169.3,243.39a15.64,15.64,0,0,0,.27-2.49c.15-3.39.23-5.33-.66-8.47-.31,1.4,0,2.73,0,4.79s-.15,4.53.39,6.17Z" transform="translate(0 0)" style="fill:#ffe66a;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M13.77,174.36c3.76,3.39,8.37,6.86,12.29,9.73a137.67,137.67,0,0,0,11.84,7.6l-.13,1.12a139.33,139.33,0,0,1-12-7.86,153.45,153.45,0,0,1-12-9.64v-.95Z" transform="translate(0 0)" style="fill:#8b5800;"></path>
                                        <path d="M37.9,191.69a148.94,148.94,0,0,1-14.36-9.49c0,.45,0,.91.05,1.36a157,157,0,0,0,14.18,9.25c0-.57.11-.54.14-1.12Z" transform="translate(0 0)" style="fill:#272727;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#fd40b5e1-7323-4f3d-bcb5-6b0fc105475a);">
                                            <path d="M50.75,323.74c27.57,1.25,54.48,1.11,80.94,0-1.9,2.93-17.91,8.19-42.89,8.19C68.23,331.94,52.73,326.23,50.75,323.74Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a2d7f455-b8f0-4596-9423-23c521ff911f);"></path>
                                        </g>
                                        <path d="M136.41,17.39C102.06.21,81.19.21,46.84,17.39c-2.19,2.07-18.1,24.1-18.33,28.91-.63-.61-.82-.95-1.61-1.68A78,78,0,0,1,20.26,38c.39-.9.79-1.83,1.22-2.8,2.45-5.52,7.11-10.12,12.84-14.17C36,19.9,44.22,17.71,46,16.63c2.55-1.54,10.12-7.36,12.43-8.24,10.9-4.12,17.75-6.78,25-7.55a84.54,84.54,0,0,1,16.3,0c7.3.78,14.14,3.43,25,7.55,2.31.88,9.88,6.7,12.44,8.25,1.78,1.07,10,3.26,11.67,4.42,5.73,4.06,10.39,8.65,12.84,14.17.43,1,.84,1.9,1.22,2.8a78.13,78.13,0,0,1-6.64,6.6c-.78.72-1,1.06-1.6,1.68-.24-4.82-16.15-26.84-18.33-28.91Z" transform="translate(0 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <path d="M136.79,16.33c-2.46-1.54-6.16-3.95-8.34-5.06-24-12.19-49.62-12.18-73.65,0-2.19,1.11-5.88,3.52-8.35,5,2-1.89,5.07-4.89,7-5.9C65.32,4.2,75.71.44,88.23.35c2.22,0,4.57,0,6.78,0,12.52.09,22.92,3.85,34.79,10.08,1.92,1,5,4,7,5.91Z" transform="translate(0 0)" style="fill:url(#b0a67580-e9f4-4a0e-b440-c43d8458ed5f);"></path>
                                        <path d="M46.25,17.89c-4.5,2.9-11.43,4-15.21,6.89a30,30,0,0,0-10,13.66L28.42,46C32.71,36,39.21,26.74,46.25,17.89Z" transform="translate(0 0)" style="fill:#171614;stroke:#2b2a29;stroke-miterlimit:3.951119999802671;stroke-width:0.5670161138295526px;fill-rule:evenodd;"></path>
                                        <path d="M137,17.88c4.5,2.9,11.42,4,15.21,6.89a30,30,0,0,1,10,13.66L154.83,46C150.54,36,144,26.73,137,17.88Z" transform="translate(0 0)" style="fill:#171614;stroke:#2b2a29;stroke-miterlimit:3.951119999802671;stroke-width:0.5670161138295526px;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#bee7681a-a157-48da-9eb1-d7cb896bab3e);">
                                            <path d="M46.84,17.4c-4.5,2.89-11.8,3.94-15.58,6.86a30,30,0,0,0-10,13.66l7.35,7.58C32.93,35.46,39.8,26.25,46.84,17.4Z" transform="translate(0 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#b1b825e6-0c27-499a-a7a1-ee2dec41c531);">
                                            <path d="M136.41,17.39c4.5,2.9,11.79,3.94,15.57,6.86a29.94,29.94,0,0,1,10,13.66l-7.35,7.58c-4.29-10-11.17-19.25-18.2-28.1Z" transform="translate(0 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M33.82,27a4.26,4.26,0,0,1,.5,5.93,4.16,4.16,0,0,1-5.75,1.3,4.26,4.26,0,0,1-.5-5.93A4.16,4.16,0,0,1,33.82,27Z" transform="translate(0 0)" style="fill:#fefefe;fill-opacity:0.6000000238418579;fill-rule:evenodd;"></path>
                                        <path d="M149.43,27a4.25,4.25,0,0,0-.5,5.93,4.14,4.14,0,0,0,5.74,1.3,4.26,4.26,0,0,0,.51-5.93A4.16,4.16,0,0,0,149.43,27Z" transform="translate(0 0)" style="fill:#fefefe;fill-opacity:0.6000000238418579;fill-rule:evenodd;"></path>
                                        <path d="M35.6,113.34c-2.72-13.38-4-26.06-5.83-39.4-.92-11.44,3.33-18,10.86-21.68,22.65-11,79.53-11,102.18,0,7.53,3.66,11.78,10.24,10.86,21.68-1.83,13.34-2.92,26-5.65,39.39-44.81,1.18-67.61,1.18-112.42,0Z" transform="translate(0 0)" style="fill:#171614;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#a28dc936-1d72-49f9-92e9-7e70789b4715);">
                                            <path d="M32.71,101.33C37.66,95.6,42.48,91.46,48,88.81S59.68,85,67.34,85.3c2.43.09,4.33.21,5.9,1S76.05,88.4,77.09,91a67.07,67.07,0,0,1,2.16,7.14c1,3.8,2,7.51,3.51,9.48,4,5.11,16.13,4.59,19.43.71,3.76-4.43,4.75-8.38,5.82-12.66.36-1.44.73-2.92,1.22-4.48,1.89-6,6.28-5.94,11.15-5.9h.24a44.13,44.13,0,0,1,16.93,4.18,35.26,35.26,0,0,1,11.33,7.64c0,.26-.06.58-.1,1-2.45-2.94-6.7-5.77-11.52-8A43.68,43.68,0,0,0,120.62,86h-.24c-4.6,0-8.75-.07-10.48,5.41-.48,1.54-.85,3-1.21,4.44-1.09,4.36-2.1,8.39-6,12.94-3.61,4.26-16.27,4.7-20.51-.73-1.62-2.09-2.62-5.86-3.64-9.73a65.6,65.6,0,0,0-2.13-7.06c-1-2.43-2.07-3.71-3.5-4.39A14.73,14.73,0,0,0,67.32,86c-7.54-.28-13.62.84-19,3.44s-10.16,6.69-15,12.35l-.53-.46Z" transform="translate(0 0)" style="fill:#636363;"></path>
                                        </g>
                                        <path d="M115.83,66.62c-14.8-2.76-30-2.43-45.64,0l-3.12,4.61a104.28,104.28,0,0,1,52.55,0c-1.26-1.47-2.53-3.18-3.79-4.65Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f4087d22-9851-40c1-9ae1-62d6aadf0d7a);"></path>
                                        <path d="M71.31,70.27a103.72,103.72,0,0,1,44.23.06v-3a318.48,318.48,0,0,0-44.23,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bd30c044-8f7e-4fb0-a319-3fa40b2c8898);"></path>
                                        <path d="M89.9,118.84h6.33a4.5,4.5,0,0,1,4.62,4.37V171a4.5,4.5,0,0,1-4.62,4.37H89.9A4.5,4.5,0,0,1,85.28,171V123.21A4.5,4.5,0,0,1,89.9,118.84Z" transform="translate(0 0)" style="stroke:#211f1f;stroke-miterlimit:3.951119999802671;stroke-width:0.5670161138295526px;fill-rule:evenodd;fill:url(#e10e3e93-5580-4770-b776-be16709ba621);"></path>
                                        <path d="M95.81,134a3.72,3.72,0,0,1,1.93,3.18,4.47,4.47,0,0,1-8.85,0A3.73,3.73,0,0,1,90.83,134a.94.94,0,0,0,.49-.81V131a.92.92,0,0,0-.46-.79,3.46,3.46,0,0,1-1.7-2.9,4.2,4.2,0,0,1,8.32,0,3.46,3.46,0,0,1-1.7,2.9.92.92,0,0,0-.46.79v2.22a.94.94,0,0,0,.49.81Z" transform="translate(0 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                        <path d="M93,141a4.17,4.17,0,0,1-4.11-3.57,3.29,3.29,0,0,1,1.67-2.5.8.8,0,0,0,.42-.69v-.37a.9.9,0,0,0,.33-.69V131a.92.92,0,0,0-.46-.79,3.61,3.61,0,0,1-1.56-2A3.58,3.58,0,0,1,92.72,126a3.39,3.39,0,0,1,3.6,3.12,2.59,2.59,0,0,1-.1.74,3.61,3.61,0,0,1-.44.33.9.9,0,0,0-.46.78v.32a5.55,5.55,0,0,1-.46.35.81.81,0,0,0-.4.68v1.93a.81.81,0,0,0,.42.7,3.23,3.23,0,0,1,1.68,2.74A3.56,3.56,0,0,1,93,141Z" transform="translate(0 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <path d="M88.32,148.64H98a1.2,1.2,0,0,1,1.26,1.09l.29,27.45a1,1,0,0,1-.36.78,1.36,1.36,0,0,1-.9.32H88a1.36,1.36,0,0,1-.9-.32,1,1,0,0,1-.36-.78l.29-27.45a1.2,1.2,0,0,1,1.26-1.09Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b1e706e4-e4f0-47c2-a9d3-19cf20e36311);"></path>
                                        <g style="mask:url(#baa540e3-ec1a-4305-8eeb-e257267ff1b2);">
                                            <polygon points="99.38 178.21 86.59 178.21 87.73 173.07 97.72 173.07 99.38 178.21" style="fill-rule:evenodd;"></polygon>
                                        </g>
                                        <g style="mask:url(#bf79db8d-0be1-43d3-a2f9-76728d5713e5);">
                                            <polygon points="86.59 178.21 86.9 148.57 87.73 173.07 86.59 178.21" style="fill-rule:evenodd;"></polygon>
                                        </g>
                                        <g style="mask:url(#e15ecc16-91f6-4400-a54a-f3e1fb5ee9cf);">
                                            <polygon points="97.72 173.07 99.06 148.57 99.38 178.21 97.72 173.07" style="fill-rule:evenodd;"></polygon>
                                        </g>
                                        <path d="M89,142.21h8.24a1,1,0,0,1,.74.3.74.74,0,0,1,.19.69l-.08.31a.91.91,0,0,1-.92.65h-8.1a.91.91,0,0,1-.92-.65l-.08-.31a.74.74,0,0,1,.19-.69A1,1,0,0,1,89,142.21Z" transform="translate(0 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                        <path d="M89.15,145.31h8.17a1,1,0,0,1,.73.31.7.7,0,0,1,.19.68l-.07.31a.93.93,0,0,1-.93.66h-8a.93.93,0,0,1-.93-.66l-.07-.31a.7.7,0,0,1,.19-.68A1,1,0,0,1,89.15,145.31Z" transform="translate(0 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                        <path d="M88.85,142.5h7a.83.83,0,0,1,.63.26.6.6,0,0,1,.16.58l-.06.26a.78.78,0,0,1-.79.56H88.91a.79.79,0,0,1-.79-.56l-.06-.26a.62.62,0,0,1,.16-.58.84.84,0,0,1,.63-.26Z" transform="translate(0 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <path d="M89.05,145.6h7a.84.84,0,0,1,.63.26.61.61,0,0,1,.16.58l-.06.27a.79.79,0,0,1-.79.55H89.12a.78.78,0,0,1-.79-.55l-.06-.27a.61.61,0,0,1,.16-.58.83.83,0,0,1,.63-.26Z" transform="translate(0 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <path d="M88.85,142.5h7a.83.83,0,0,1,.63.26.6.6,0,0,1,.16.58l-.06.26a.78.78,0,0,1-.79.56H88.91a.79.79,0,0,1-.79-.56l-.06-.26a.62.62,0,0,1,.16-.58.84.84,0,0,1,.63-.26Z" transform="translate(0 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                        <path d="M100,150.76h2.17a.49.49,0,0,1,.52.45v3.19a.49.49,0,0,1-.52.45H100a.49.49,0,0,1-.52-.45v-3.19A.49.49,0,0,1,100,150.76Z" transform="translate(0 0)" style="fill:#ff1a1d;fill-rule:evenodd;"></path>
                                        <path d="M83.16,150.76h2.16a.49.49,0,0,1,.52.45v3.19a.49.49,0,0,1-.52.45H83.16a.49.49,0,0,1-.52-.45v-3.19A.49.49,0,0,1,83.16,150.76Z" transform="translate(0 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                        <path d="M156,50.44a6,6,0,0,0-1.11,4c.23,9.72,5.49,30.6,2.11,37.78-.71,1.51-2.33,2.33-4.25,2.93" transform="translate(0 0)" style="fill:none;"></path>
                                        <g style="mask:url(#a0a7a97b-69b5-4432-9ba8-065c44bf72ee);">
                                            <path d="M157.89,80.39q-1.53-13-3-26C156.32,60,158,65,158.94,70.17c2.64,13.88,3.42,27.3,5.16,42.52-2.07-10.76-4-23.61-6.21-32.3Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a78af7b8-504d-45ea-9503-6aae109c584a);"></path>
                                        </g>
                                        <path d="M142,231.81l4.11-83.24c-1.1-19.77,7-47.53,11-68.58.47-2.51,1-3.53,1.47-3.56s.73.37.77,2.33c4.59,74.72.92,148.7-4.14,223.16a32.1,32.1,0,0,1-.56,5.09c-.53,2.3-2.58,11.29-5.48,11.85-1.42.27-1.77-3-2-6.49-1.49-26.68-3.75-53.88-5.24-80.56Z" transform="translate(0 0)" style="fill:#070603;fill-rule:evenodd;"></path>
                                        <path d="M167.89,265.85l-.71.19a14.87,14.87,0,0,0-4.34,1.6c-.62.38-1.21.82-1.82,1.28a16.43,16.43,0,0,1-4.87,2.52l-.07.51a16.84,16.84,0,0,0,5.06-2.38c.6-.45,1.2-1,1.82-1.39a15.75,15.75,0,0,1,4.28-1.83l.71-.18-.06-.32Z" transform="translate(0 0)" style="fill:#8b5800;"></path>
                                        <path d="M168.14,87.51c-1.34.31-2.7.56-4,.76s-2.63.36-3.93.5l0,.32c1.3-.14,2.62-.3,3.94-.5s2.63-.45,4-.76v-.32Z" transform="translate(0 0)" style="fill:#8b5800;"></path>
                                        <path d="M157.55,80.88a3.69,3.69,0,0,0-2-2,3.88,3.88,0,0,0-2.47-.24l0,.34a3.9,3.9,0,0,1,2.41.2,4.34,4.34,0,0,1,2.06,2.14l.07-.47Z" transform="translate(0 0)" style="fill:#8b5800;"></path>
                                        <g style="mask:url(#b49f7076-b28d-4405-9bd2-c8c152579457);">
                                            <path d="M161.45,137.09c.05,20.62,0,41.24-.78,61.81l-15.16,10.26c.84-23.79,1.68-56.78,2.52-80.57,2.42-15.14,4.41-21.59,6.83-36.72.66-4.16,1.74-9.09,2.64-13.24a5.19,5.19,0,0,1,.71-1.78c.66-1,1.16-.25,1.23,2.22.42,7.85,1,15.67,1.17,23.49.31,11.51.44,23,.84,34.53Z" transform="translate(0 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M147.58,129.74c2-14,7.37-35.23,10-48.94a22.65,22.65,0,0,1,.52-2.25,6.24,6.24,0,0,1,.51-1.36c0,.14.08.37.13.66a19.79,19.79,0,0,1,.29,3l1.58,45.7c1.47,42.51-1,90-3.2,133l-.23,4.37c-.16,2.52-.29,5.86-.45,9.61-.54,13.16-1.3,31.46-4.06,39-1.73,4.29-2.93,6.13-3.6,5.62-.86-.66-1.36-4-1.5-9.88v0l-3.69-47.42h0l2.64,47.51c.16,6.29.8,9.92,2,10.81,1.35,1,3.06-1,5.14-6.12v0c2.83-7.73,3.59-26.17,4.14-39.42.16-3.71.29-7,.46-9.58l.22-4.38c2.22-43,4.68-90.52,3.21-133.09l-1.59-45.71a20.89,20.89,0,0,0-.31-3.23c-.18-1-.48-1.59-.89-1.74l-.08,0c-.4-.09-.76.16-1.08.72a7.89,7.89,0,0,0-.62,1.63c-.19.65-.38,1.45-.55,2.37-2.62,13.7-6.47,29.7-8.52,43.68l-.45,5.51Zm11-52.72h0Z" transform="translate(0 0)" style="fill:#393837;"></path>
                                        <g style="mask:url(#ae55766e-5347-43da-8226-4b1d2d776206);">
                                            <path d="M148,124.22c2-13.94,6.08-29.71,8.7-43.42.17-.88.35-1.63.52-2.25a6.81,6.81,0,0,1,.51-1.36c0,.14.08.37.14.66a21.15,21.15,0,0,1,.29,3l1.58,45.7c1.47,42.51-1,90-3.2,133l-.23,4.37c-.16,2.52-.3,5.86-.45,9.61-.55,13.16-1.3,31.46-4.07,39-6.11,19.06-6.55-47.4-7.94-51.71h0l1.8,47.51c.15,6.29.8,9.92,2,10.81,1.36,1,3.07-1,5.15-6.12v0c2.83-7.73,3.59-26.17,4.14-39.42.15-3.71.29-7,.45-9.58l.23-4.39c2.22-43,4.67-90.51,3.2-133.09l-1.58-45.7a22.21,22.21,0,0,0-.31-3.23c-.71-3.73-1.73-.91-2.21.77a21.4,21.4,0,0,0-.6,2.3L148,120.87l.07,3.35ZM157.72,77h0Z" transform="translate(0 0)" style="fill:url(#e5149785-ab30-4ab3-ad8a-176edd593029);"></path>
                                        </g>
                                        <path d="M169.08,174.43a146.72,146.72,0,0,1-11.73,9.4,135.57,135.57,0,0,1-11.85,7.61l.14,1.12a139.18,139.18,0,0,0,12-7.86,143.74,143.74,0,0,0,11.45-9.32v-.95Z" transform="translate(0 0)" style="fill:#8b5800;"></path>
                                        <path d="M145.55,191.25a121.77,121.77,0,0,0,15.38-10.09c0,.45,0,.9-.05,1.36-4.21,3.13-10.39,7.21-15.26,10.06,0-.58-.05-.75-.07-1.33Z" transform="translate(0 0)" style="fill:#272727;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#add8e9be-c8b3-4c80-9298-3e309f1005dc);">
                                            <path d="M35.12,260.39c.61,6.54-.63,34.81-.34,40.15.71,13.25,2.54,22.59,15.9,26.86,0-6-2.46-15.69-2.49-21.66l.66-45.35Z" transform="translate(0 0)" style="fill:#070603;fill-rule:evenodd;"></path>
                                        </g>
                                        <g style="mask:url(#fa5292b5-7616-427e-b27a-d50dc0f2e464);">
                                            <path d="M150,259.62c-.71,7.59-.76,36.59-1.12,42.44-.7,11.7-2.9,19.8-15.39,23.8,0-6,2-15,2-20.93l.75-45.31Z" transform="translate(0 0)" style="fill:#070603;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M73.18,274.82c0-9.54,3.29-12.15,9.24-12.81a108.23,108.23,0,0,1,18.71,0c6.51.77,9.47,3.63,9.14,13,.11,1.49.9,21.77.88,22.1-.38,8.42-1.05,16.66-4.41,20.2-3.37,2.06-8.62,2.73-14.89,2.65-6.26.08-11.51-.59-14.88-2.65-3.36-3.54-4.16-11.78-4.55-20.2,0,0,.69-21.26.76-22.22Z" transform="translate(0 0)" style="fill:#141414;fill-rule:evenodd;"></path>
                                        <path d="M79.93,264.24a.49.49,0,0,0,0,.58l2.4,5.05a.76.76,0,0,0,.78.41,112.73,112.73,0,0,1,18.19,0,.8.8,0,0,0,.77-.39l2.55-4.93c.1-.19,0-.38,0-.59.22-1.64-22.6-2.35-24.65-.14Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f0e70cef-40bf-4fd8-8128-f3ea604b8e7d);"></path>
                                        <path d="M115.31,263.91a.52.52,0,0,0,0,.6c.8,1.75,1.59,3.5,2.39,5.26a.79.79,0,0,0,.78.42,108,108,0,0,1,18.16,0,.77.77,0,0,0,.77-.41l2.55-5.12c.1-.2,0-.39,0-.61.1-.76-5.53-1.62-11.45-1.58-6.18,0-12.06.18-13.16,1.42Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a7cfd74f-4a5b-4da4-a2d7-cf19af89300e);"></path>
                                        <path d="M109.51,289.32h1.56a1,1,0,0,1,.9,1V293a1,1,0,0,1-.9,1h-1.56a1,1,0,0,1-.89-1v-2.64A1,1,0,0,1,109.51,289.32Z" transform="translate(0 0)" style="fill:#141414;fill-rule:evenodd;"></path>
                                        <path d="M68.24,264.94a.54.54,0,0,1,0,.6l-2.4,5.26a.79.79,0,0,1-.78.43,106.92,106.92,0,0,0-18.16,0,.77.77,0,0,1-.77-.41l-2.55-5.12c-.1-.2,0-.39,0-.61-.09-.76,5.53-1.62,11.45-1.58,6.19,0,12.06.18,13.17,1.42Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bbff1f47-20e0-4f16-ae22-314bd3e980d5);"></path>
                                        <path d="M109.37,218.29h1.56a1,1,0,0,1,.9,1V222a1,1,0,0,1-.9,1h-1.56a1,1,0,0,1-.9-1v-2.64A1,1,0,0,1,109.37,218.29Z" transform="translate(0 0)" style="fill:#141414;fill-rule:evenodd;"></path>
                                        <path d="M72.33,219.32h1.56a1,1,0,0,1,.9,1V223a1,1,0,0,1-.9,1H72.33a1,1,0,0,1-.89-1v-2.64A1,1,0,0,1,72.33,219.32Z" transform="translate(0 0)" style="fill:#141414;fill-rule:evenodd;"></path>
                                        <path d="M109.45,220h1.6a.38.38,0,0,1,.39.35v2.48a.37.37,0,0,1-.39.35h-1.6a.36.36,0,0,1-.38-.35v-2.48A.37.37,0,0,1,109.45,220Z" transform="translate(0 0)" style="fill:#ff1a1d;fill-rule:evenodd;"></path>
                                        <path d="M73,220h1.61a.37.37,0,0,1,.38.35v2.48a.36.36,0,0,1-.38.35H73a.36.36,0,0,1-.38-.35v-2.48A.37.37,0,0,1,73,220Z" transform="translate(0 0)" style="fill:#ff1a1d;fill-rule:evenodd;"></path>
                                        <path d="M109.45,287.31h1.6a.38.38,0,0,1,.39.35v2.49a.38.38,0,0,1-.39.35h-1.6a.37.37,0,0,1-.38-.35v-2.49A.37.37,0,0,1,109.45,287.31Z" transform="translate(0 0)" style="fill:#ff1a1d;fill-rule:evenodd;"></path>
                                        <path d="M73,287.31h1.61a.37.37,0,0,1,.38.35v2.49a.37.37,0,0,1-.38.35H73a.37.37,0,0,1-.38-.35v-2.49A.37.37,0,0,1,73,287.31Z" transform="translate(0 0)" style="fill:#ff1a1d;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#a93d9f17-aaa5-4968-81c7-c717d34d35c4);">
                                            <path d="M37.44,113.12c-1.49-8.85-3-28.84-4.48-39-2.4-16.39,28.4-21.44,59.53-21.24,30.38.2,61.1,5.24,58.76,21.24-1.49,10.19-3.25,30.2-4.75,39-38.13.46-70.92.44-109.06,0Z" transform="translate(0 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                        </g>
                                        <polygon points="89.66 56.71 87.15 56.55 87.05 59.55 90.09 59.72 89.66 56.71" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <polygon points="38.15 58.48 38.23 55.81 48.1 54.11 48.24 56.64 38.15 58.48" style="fill-rule:evenodd;fill:url(#afe1158f-ea2c-43df-bcf3-ac774ea29e40);"></polygon>
                                        <polygon points="48.24 56.64 48.1 54.11 90.48 56.76 90.51 58.1 48.24 56.64" style="fill-rule:evenodd;fill:url(#ba44f19d-169b-4560-9a7b-1f05fd38bc86);"></polygon>
                                        <circle cx="39.72" cy="56.86" r="0.85" style="fill:#575757;"></circle>
                                        <polygon points="58.24 60.52 59.34 58.55 120.67 59.25 120.16 61.47 58.24 60.52" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <polygon points="93.34 50.64 95.86 50.74 95.65 53.73 92.61 53.59 93.34 50.64" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <polygon points="144.41 57.61 144.6 54.94 134.95 52.25 134.55 54.75 144.41 57.61" style="fill-rule:evenodd;fill:url(#a7b6c785-3785-4dde-ae56-8f8a274c81b5);"></polygon>
                                        <polygon points="134.55 54.75 134.95 52.25 92.52 50.61 92.35 51.94 134.55 54.75" style="fill-rule:evenodd;fill:url(#ea19f3ac-e4d8-4e49-b84c-c83c95ba8cff);"></polygon>
                                        <circle cx="143.01" cy="55.83" r="0.85" style="fill:#575757;"></circle>
                                        <polygon points="124.22 57.6 123.32 55.53 62.23 50.04 62.52 52.3 124.22 57.6" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                        <g style="mask:url(#ecf089fb-8e17-4999-9fa8-63ca24c83b1e);">
                                            <path d="M32.71,100.91C37.66,95.18,42.48,91,48,88.39s11.69-3.79,19.35-3.51a15.31,15.31,0,0,1,5.9,1c1.59.76,2.81,2.15,3.85,4.77a67.07,67.07,0,0,1,2.16,7.14c1,3.8,2,7.51,3.51,9.48,4,5.11,16.13,4.59,19.43.71,3.76-4.43,4.75-8.39,5.82-12.66.36-1.44.73-2.92,1.22-4.48,1.89-6,6.28-5.94,11.15-5.9h.24c5.2,0,11.43,1.68,16.93,4.17,4.67,2.12,8.82,4.85,11.39,7.71-.05.37-.08.6-.12.94-2.44-3-6.71-5.81-11.56-8-5.42-2.45-11.55-4.08-16.64-4.11h-.24c-4.6,0-8.75-.06-10.48,5.42-.48,1.54-.85,3-1.21,4.44-1.09,4.36-2.1,8.39-6,12.94-3.61,4.26-16.27,4.7-20.51-.73-1.62-2.09-2.62-5.87-3.64-9.74a65.6,65.6,0,0,0-2.13-7.06c-1-2.43-2.07-3.7-3.5-4.38s-3.28-.8-5.62-.89c-7.54-.28-13.62.84-19,3.44s-10.16,6.69-15,12.35l-.53-.46Z" transform="translate(0 0)" style="fill:#1f1b20;"></path>
                                        </g>
                                        <path d="M44.68,252.08h94.1c3.62,0,6.55,3.22,6.55,7.18v12.51c0,4-2.93,7.18-6.55,7.18H44.68c-3.61,0-6.55-3.21-6.55-7.18V259.26C38.13,255.3,41.07,252.08,44.68,252.08Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a9797638-9f2e-4bf6-9e75-4772b037834e);"></path>
                                        <path d="M45.55,158a6.1,6.1,0,0,1,3,.47c-3.87-6.93-5-16.5-4.24-27.87.47-4.4,3.41-6.38,7.48-7.31,5-1.14,15.29-1.14,20.25,0,4.06.94,7,2.91,7.48,7.31.75,11.37-.37,20.94-4.24,27.87a6.1,6.1,0,0,1,3-.47c1.76.26,1.85,1,1.8,2.22-.28,6.77-.62,13.44-2.22,17.93-1.19,3.37-2.16,4.26-5.44,5.3-5.24,1.66-15.79,1.66-21,0-3.28-1-4.25-1.93-5.45-5.3C44.37,173.7,44,167,43.75,160.26c0-1.25,0-2,1.8-2.22Z" transform="translate(0 0)" style="fill:#0f0f0f;fill-rule:evenodd;"></path>
                                        <path d="M52.22,157.34a113.47,113.47,0,0,0,19.42.09c.15.46.31,1,.48,1.43s.41.93.92.92c1.52,0,5-1.75,5.14-1.74s.25.06.25.22c-.62,5.82.26,12.75-4.15,16.4A10.12,10.12,0,0,1,71.67,176c-.16-.62-.26-2.54-2.28-2.76a81.29,81.29,0,0,0-13.87,0c-2.19.22-2.11,1.75-2.39,2.8a10.86,10.86,0,0,1-3-1.35c-4.39-3.73-4-10.36-4.67-16.33,0-.16.2-.18.39-.21s2.74,1.28,4.33,1.67,1.51-1.33,2-2.43ZM49.9,161.4c-.27.63-.11,5.62-.11,6.93,0,1.73-.28,3.33,1.37,4.2a3.26,3.26,0,0,0,2.11.19,60.35,60.35,0,0,1,17.7,0,1.38,1.38,0,0,0,1.33-.2c1.53-.86,1.52-2.47,1.52-4.19,0-1.06-.07-6.67-.23-6.93-1.71-2.69-14.33-3.35-20.46-1.91-1.75.41-2.92,1.16-3.23,1.87Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b4e65bc9-d22b-4680-bab3-f29e45ecc4eb);"></path>
                                        <path d="M47.79,155.13c-2.36-5.49-3.25-12.3-3-20.16a24,24,0,0,1,.43-5.09,6.79,6.79,0,0,1,3.42-4.48.76.76,0,0,1,1.07.37l2.43,5.91a.75.75,0,0,1-.18.84,2.19,2.19,0,0,0-.69,1.6v8.29a2.45,2.45,0,0,0,1.72,2.3A2.47,2.47,0,0,0,51.3,147v8.26a2.14,2.14,0,0,0,.68,1.57.77.77,0,0,1,.19.81l-.57,1.6a.76.76,0,0,1-1.33.18,19,19,0,0,1-2.48-4.3Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a0e80515-e118-4922-bb8f-19930eb1af98);"></path>
                                        <path d="M76.06,155.13c2.37-5.49,3.25-12.3,3-20.16a24,24,0,0,0-.44-5.09,6.78,6.78,0,0,0-3.41-4.48.77.77,0,0,0-1.08.37l-2.42,5.91a.75.75,0,0,0,.17.84,2.16,2.16,0,0,1,.69,1.6v8.29a2.45,2.45,0,0,1-1.71,2.3,2.47,2.47,0,0,1,1.65,2.3v8.26a2.14,2.14,0,0,1-.68,1.57.77.77,0,0,0-.19.81l.58,1.6a.75.75,0,0,0,1.32.18,18.66,18.66,0,0,0,2.48-4.3Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e084a64a-2349-4ab5-8dfe-6c53842e09cb);"></path>
                                        <path d="M54.24,132.38a84,84,0,0,1,15.54,0,2.16,2.16,0,0,1,2,2.15v7.72a2.09,2.09,0,0,1-2,2.15H54.24a2.1,2.1,0,0,1-2-2.15v-7.72A2.17,2.17,0,0,1,54.24,132.38Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b497b40b-fc20-4f9b-aaa5-77ecf1b8d12c);"></path>
                                        <path d="M54.18,157a84,84,0,0,0,15.54,0,2.14,2.14,0,0,0,2-2.13v-7.69a2.08,2.08,0,0,0-2-2.13H54.18a2.08,2.08,0,0,0-2,2.13v7.69A2.15,2.15,0,0,0,54.18,157Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bb321eea-8c8a-4165-995b-ca5ca4f2b0ed);"></path>
                                        <path d="M72.85,162.37c.06,2.11,0,5.32,0,7.42a2.07,2.07,0,0,1-2.11,2.2,62.21,62.21,0,0,0-17.87,0,2.07,2.07,0,0,1-2.12-2.2c0-2.1,0-5.31,0-7.42C50.67,158.37,72.77,159.21,72.85,162.37Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#fe8fac20-18d9-4919-a53e-62eb38f20637);"></path>
                                        <path d="M56.52,174h11.9a2.79,2.79,0,0,1,2.51,2.78v3.42a2.49,2.49,0,0,1-2.51,2.46H56.52A2.49,2.49,0,0,1,54,180.21v-3.42A2.79,2.79,0,0,1,56.52,174Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#edbbf500-8dfb-4f53-91a6-88d5d9b02724);"></path>
                                        <path d="M70.2,131.76a.73.73,0,0,0,.75-.44L73,127c.35-.77,1.07-1.88,0-2.36-3.45-1.5-18.18-1.5-21.62,0-1.11.48-.39,1.59,0,2.36l2,4.37a.73.73,0,0,0,.75.44,87.67,87.67,0,0,1,16.2,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e7812be7-95c4-4a20-9997-15fc75a55da3);"></path>
                                        <path d="M47,180.19c-3.14-6.11-2.89-13.68-3.25-19.69-.11-1.83.2-2.19,1.85-2.47.88,6.89,0,15.78,7.52,18-.36,4.94-.21,7.56,3.06,7.56,2,.06,3.47,0,5.09,0v0c2.89-.08,4.75.14,7.65.06S72,180.92,71.68,176c6.78-2.18,6-11,6.77-17.91,1.49.28,1.73.78,1.64,2.43-.31,6-.06,13.57-2.89,19.68a5,5,0,0,1-3,2.84c-3.19,1.57-6.56,1.68-9.91,1.66h0c-4.66,0-9.49.35-14-1.64-1.71-.76-2.44-1.13-3.32-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e2a159e1-0525-411f-a8cd-8e5a736e39e0);"></path>
                                        <g style="mask:url(#a996287b-ea6b-4ae0-9b94-2569dae0cfdd);">
                                            <path d="M54.84,111.7a21.89,21.89,0,0,1-4.69-2.84c-3.67-2.53-3.41-2.48-2.48-6.81,1.48-7,5.38-10.67,12.94-10.67,8,0,11.25,3.81,13.1,10.73.78,2.91,1.5,4.16-2.33,6.41a31.86,31.86,0,0,1-5.86,3.13,95.14,95.14,0,0,1-10.68,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bba78de1-02ec-4e93-9670-967b410be64e);"></path>
                                        </g>
                                        <path d="M67.58,97.28l-2.67,12.54c.7.9.81.26,1.19-1.44s.78-3.46,1.18-5.19a14.53,14.53,0,0,0,.3-5.91Z" transform="translate(0 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                        <g style="mask:url(#bd79721c-c57c-4c2f-bcac-e9363c6f3a40);">
                                            <path d="M52.56,97.2l2.67,12.54c-.7.9-.8.26-1.19-1.44s-.78-3.46-1.18-5.19a14.53,14.53,0,0,1-.3-5.91Z" transform="translate(0 0)" style="fill:#4d4d4d;fill-rule:evenodd;"></path>
                                        </g>
                                        <path d="M54.36,111.49c-.11.14-.23.27-.35.41a2.65,2.65,0,0,1-1.54,1.17l-2.9,1a6.29,6.29,0,0,1-2.19.34,3.54,3.54,0,0,0-1.6,1.34c.1,1.67.49,1.68,1.5,1.11.27-.15.71-.32,1.07-.54.9-.56,0-.67,1-1l3.55-1.11c1.09-.34,1-.42,1.83-1.21l1.22-1.19a3,3,0,0,1-1.55-.31Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f2668e87-1f55-446c-a9cf-4fe538c5b7c0);"></path>
                                        <path d="M67.1,111c-2.17,1-4.68.85-7,.82s-5.35.36-7-1c1.54,2.56,2.58,5.06,2.33,7.44H66c-.68-2.75.12-5,1.14-7.25Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bef123db-63f9-41c0-8238-8d81aa525b5c);"></path>
                                        <path d="M46.64,120.59c-.32,2.65,3,3.67,7.8,4a93,93,0,0,0,12.71,0c4.84-.32,8.12-1.34,7.8-4C73.23,114.8,48.3,115,46.64,120.59Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ae8187a7-c813-49d3-8824-1f66d13359d1);"></path>
                                        <path d="M61,118.4c7,0,12.6,1.34,12.6,3s-5.64,3-12.6,3-12.61-1.33-12.61-3S54,118.4,61,118.4Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a78fa84d-61a6-4ec6-81a9-71355195558e);"></path>
                                        <path d="M50.66,117.7a39.69,39.69,0,0,1,19.9-.17,21.56,21.56,0,0,0-10.43-2.31A22.46,22.46,0,0,0,50.66,117.7Z" transform="translate(0 0)" style="fill:#464546;fill-rule:evenodd;"></path>
                                        <path d="M67.13,120.32l-1.88,1.51a.54.54,0,0,0-.16.7.8.8,0,0,0,.75.36l4.83-.31a.77.77,0,0,0,.61-.33c.7-1.07-3.44-2.5-4.15-1.93Z" transform="translate(0 0)" style="fill:#4f4f4f;fill-rule:evenodd;"></path>
                                        <path d="M56.89,119.67a.53.53,0,0,0,.08.64l1.32,1.46a.79.79,0,0,0,.61.26h4.26a.8.8,0,0,0,.58-.23l1.36-1.35a.53.53,0,0,0,.12-.64c-.45-.87-8-.73-8.33-.13Z" transform="translate(0 0)" style="fill:#252525;fill-rule:evenodd;"></path>
                                        <path d="M54.59,120.11l1.88,1.51a.53.53,0,0,1,.15.7.77.77,0,0,1-.74.36l-4.83-.31a.78.78,0,0,1-.61-.33c-.71-1.07,3.43-2.51,4.15-1.93Z" transform="translate(0 0)" style="fill:#252525;fill-rule:evenodd;"></path>
                                        <path d="M61.15,120.69c1.54,0,2.78.58,2.78,1.29s-1.24,1.3-2.78,1.3-2.78-.58-2.78-1.3S59.61,120.69,61.15,120.69Z" transform="translate(0 0)" style="fill:#1d1d1f;fill-rule:evenodd;"></path>
                                        <path d="M61.17,121.26c1.26,0,2.29.38,2.29.86s-1,.87-2.29.87-2.3-.39-2.3-.87S59.9,121.26,61.17,121.26Z" transform="translate(0 0)" style="fill:#8e8a95;fill-rule:evenodd;"></path>
                                        <path d="M106.36,158a6.1,6.1,0,0,1,3,.47c-3.87-6.93-5-16.5-4.24-27.87.47-4.4,3.41-6.38,7.48-7.31,5-1.14,15.29-1.14,20.25,0,4.06.94,7,2.91,7.48,7.31.75,11.37-.37,20.94-4.25,27.87a6.15,6.15,0,0,1,3-.47c1.76.26,1.84,1,1.79,2.22-.27,6.77-.62,13.44-2.21,17.93-1.19,3.37-2.16,4.26-5.45,5.3-5.24,1.66-15.78,1.66-21,0-3.29-1-4.26-1.93-5.45-5.3-1.59-4.49-1.94-11.16-2.21-17.93,0-1.25,0-2,1.79-2.22Z" transform="translate(0 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M113,157.34a113.47,113.47,0,0,0,19.42.09c.15.46.31,1,.47,1.43s.42.93.93.92c1.52,0,5-1.75,5.14-1.74s.25.06.25.22c-.62,5.82.27,12.75-4.15,16.4a10.12,10.12,0,0,1-2.61,1.31c-.16-.62-.26-2.54-2.28-2.76a81.29,81.29,0,0,0-13.87,0c-2.19.22-2.11,1.75-2.39,2.8a10.86,10.86,0,0,1-3-1.35c-4.39-3.73-4-10.36-4.67-16.33,0-.16.2-.18.39-.21s2.74,1.28,4.33,1.67,1.51-1.33,2-2.43Zm-2.32,4.06c-.27.63-.12,5.62-.12,6.93,0,1.73-.27,3.33,1.38,4.2a3.24,3.24,0,0,0,2.1.19,60.41,60.41,0,0,1,17.71,0,1.38,1.38,0,0,0,1.33-.2c1.52-.86,1.52-2.47,1.52-4.19,0-1.06-.07-6.67-.24-6.93-1.7-2.69-14.32-3.35-20.46-1.91-1.74.41-2.91,1.16-3.22,1.87Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a6d1213f-bcd6-4627-9f87-ebe4e1c121ed);"></path>
                                        <path d="M108.61,155.13c-2.37-5.49-3.26-12.3-3-20.16a24,24,0,0,1,.43-5.09,6.79,6.79,0,0,1,3.42-4.48.76.76,0,0,1,1.07.37l2.43,5.91a.75.75,0,0,1-.18.84,2.19,2.19,0,0,0-.69,1.6v8.29a2.45,2.45,0,0,0,1.72,2.3,2.47,2.47,0,0,0-1.65,2.3v8.26a2.16,2.16,0,0,0,.67,1.57.73.73,0,0,1,.19.81l-.57,1.6a.76.76,0,0,1-1.33.18,18.63,18.63,0,0,1-2.47-4.3Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a5a830ef-bda0-4fcb-bbe4-290fe7257fc3);"></path>
                                        <path d="M136.87,155.13c2.37-5.49,3.25-12.3,3-20.16a24,24,0,0,0-.44-5.09,6.78,6.78,0,0,0-3.41-4.48.77.77,0,0,0-1.08.37l-2.43,5.91a.75.75,0,0,0,.18.84,2.16,2.16,0,0,1,.69,1.6v8.29a2.45,2.45,0,0,1-1.71,2.3,2.47,2.47,0,0,1,1.65,2.3v8.26a2.14,2.14,0,0,1-.68,1.57.77.77,0,0,0-.19.81l.58,1.6a.75.75,0,0,0,1.32.18,18.66,18.66,0,0,0,2.48-4.3Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bff05043-8443-4498-946d-bc1ff1cabe0c);"></path>
                                        <path d="M115.05,132.38a84,84,0,0,1,15.54,0,2.16,2.16,0,0,1,2,2.15v7.72a2.09,2.09,0,0,1-2,2.15H115.05a2.1,2.1,0,0,1-2-2.15v-7.72A2.17,2.17,0,0,1,115.05,132.38Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#aed16a72-19d6-4bba-a381-e08508b0ae54);"></path>
                                        <path d="M115,157a84,84,0,0,0,15.54,0,2.14,2.14,0,0,0,2-2.13v-7.69a2.08,2.08,0,0,0-2-2.13H115a2.08,2.08,0,0,0-2,2.13v7.69A2.15,2.15,0,0,0,115,157Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bb74b920-8fed-40bb-b495-3ae07f1b0ba9);"></path>
                                        <path d="M133.66,162.37c.06,2.11,0,5.32,0,7.42a2.07,2.07,0,0,1-2.11,2.2,62.21,62.21,0,0,0-17.87,0,2.07,2.07,0,0,1-2.12-2.2c0-2.1,0-5.31,0-7.42-.08-4,22-3.16,22.1,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ff10cca6-246e-4da8-ace7-7f6917e926b2);"></path>
                                        <path d="M117.33,174h11.9a2.79,2.79,0,0,1,2.51,2.78v3.42a2.49,2.49,0,0,1-2.51,2.46h-11.9a2.49,2.49,0,0,1-2.51-2.46v-3.42a2.79,2.79,0,0,1,2.51-2.78Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b2f14aba-6e66-41bc-a0c0-1170238f0449);"></path>
                                        <path d="M131,131.76a.73.73,0,0,0,.75-.44l2-4.37c.35-.77,1.07-1.88,0-2.36-3.45-1.5-18.18-1.5-21.62,0-1.11.48-.39,1.59,0,2.36l2,4.37a.73.73,0,0,0,.75.44,87.67,87.67,0,0,1,16.2,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bfbaeb5e-d38a-4365-a16f-6de14d7f244d);"></path>
                                        <path d="M107.82,180.19c-3.14-6.11-2.89-13.68-3.25-19.69-.11-1.83.19-2.19,1.85-2.47.88,6.89,0,15.78,7.52,18-.36,4.94-.21,7.56,3.06,7.56,2,.06,3.47,0,5.09,0v0c2.89-.08,4.75.14,7.65.06s3.08-2.62,2.75-7.57c6.79-2.18,6-11,6.78-17.91,1.49.28,1.73.78,1.64,2.43-.32,6-.06,13.57-2.9,19.68a4.9,4.9,0,0,1-3,2.84c-3.18,1.57-6.55,1.68-9.9,1.66h0c-4.67,0-9.5.35-14-1.64-1.71-.76-2.44-1.13-3.32-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#aea101cb-f3b4-48d0-b983-36c26a122d24);"></path>
                                        <path d="M39.36,225.36a6.09,6.09,0,0,1,3,.47c-3.87-6.93-5-16.5-4.24-27.87.48-4.39,3.42-6.37,7.48-7.31,5-1.14,15.29-1.14,20.25,0,4.07.94,7,2.92,7.48,7.31.76,11.37-.37,20.94-4.24,27.87a6.12,6.12,0,0,1,3-.47c1.77.26,1.85,1,1.8,2.22-.28,6.77-.62,13.44-2.21,17.93-1.2,3.37-2.16,4.26-5.45,5.31-5.24,1.66-15.78,1.66-21,0-3.29-1-4.26-1.93-5.45-5.31-1.59-4.49-1.94-11.16-2.21-17.93,0-1.25,0-2,1.79-2.22Z" transform="translate(0 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M46,224.66a113.34,113.34,0,0,0,19.41.09c.15.46.32,1,.48,1.43s.42.93.92.92c1.53,0,5-1.75,5.15-1.74s.25.06.24.22c-.61,5.82.27,12.75-4.15,16.4a10.22,10.22,0,0,1-2.6,1.31c-.17-.62-.26-2.54-2.28-2.76a81.4,81.4,0,0,0-13.88,0c-2.18.22-2.1,1.75-2.38,2.8A10.6,10.6,0,0,1,44,242c-4.39-3.73-4-10.36-4.68-16.33,0-.15.21-.17.39-.2s2.74,1.27,4.34,1.66,1.51-1.33,2-2.43Zm-2.32,4.06c-.28.63-.12,5.62-.12,6.93,0,1.73-.28,3.33,1.38,4.2a3.23,3.23,0,0,0,2.1.19,60.41,60.41,0,0,1,17.71,0,1.33,1.33,0,0,0,1.32-.19c1.53-.86,1.52-2.47,1.52-4.19,0-1.06-.07-6.68-.23-6.93-1.71-2.69-14.33-3.35-20.46-1.91-1.74.41-2.92,1.16-3.22,1.87Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e55659d2-3b3c-4b89-8d88-21b05ea8a314);"></path>
                                        <path d="M41.61,222.45c-2.37-5.49-3.25-12.3-3-20.16a23.25,23.25,0,0,1,.43-5.08,6.76,6.76,0,0,1,3.41-4.48.75.75,0,0,1,1.08.37L45.93,199a.74.74,0,0,1-.18.83,2.17,2.17,0,0,0-.69,1.6v8.3a2.45,2.45,0,0,0,1.72,2.3,2.44,2.44,0,0,0-1.66,2.3v8.25a2.16,2.16,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.58,1.6a.75.75,0,0,1-1.32.18,19,19,0,0,1-2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e18b25c3-1054-4122-a0d9-e488d484a7fe);"></path>
                                        <path d="M69.88,222.45c2.36-5.49,3.25-12.3,3-20.16a23.88,23.88,0,0,0-.43-5.08,6.74,6.74,0,0,0-3.42-4.48.74.74,0,0,0-1.07.37L65.56,199a.74.74,0,0,0,.18.83,2.21,2.21,0,0,1,.69,1.6v8.3a2.46,2.46,0,0,1-1.72,2.3,2.45,2.45,0,0,1,1.66,2.3v8.25a2.2,2.2,0,0,1-.68,1.58.73.73,0,0,0-.19.8l.57,1.6a.76.76,0,0,0,1.33.18,19,19,0,0,0,2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f7c70483-bd94-464f-8ba8-7dcddee94ed8);"></path>
                                        <path d="M48.05,199.7a84.13,84.13,0,0,1,15.55,0,2.16,2.16,0,0,1,2,2.15v7.72a2.09,2.09,0,0,1-2,2.15H48.05a2.09,2.09,0,0,1-2-2.15v-7.72A2.17,2.17,0,0,1,48.05,199.7Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ea8d23df-50a5-4822-824e-dc61ad862ca1);"></path>
                                        <path d="M48,224.29a84.13,84.13,0,0,0,15.55,0,2.14,2.14,0,0,0,2-2.13v-7.69a2.08,2.08,0,0,0-2-2.13H48a2.08,2.08,0,0,0-2,2.13v7.69A2.15,2.15,0,0,0,48,224.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ba9c213a-ee2c-4c3b-8533-d3291fb698b2);"></path>
                                        <path d="M66.67,229.69c0,2.11,0,5.32,0,7.42a2.07,2.07,0,0,1-2.12,2.2,62.21,62.21,0,0,0-17.87,0c-1.15.18-2.11-1-2.11-2.2,0-2.1,0-5.31,0-7.42C44.48,225.69,66.59,226.53,66.67,229.69Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#afd6912b-ea7b-4492-873f-43ef8115f70e);"></path>
                                        <path d="M50.34,241.33H62.23a2.79,2.79,0,0,1,2.52,2.78v3.42A2.5,2.5,0,0,1,62.23,250H50.34a2.5,2.5,0,0,1-2.52-2.46v-3.42A2.79,2.79,0,0,1,50.34,241.33Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a2e0e8a8-a8a8-4e41-a002-eaf564bcd0b7);"></path>
                                        <path d="M64,199.08a.75.75,0,0,0,.76-.44c.66-1.46,1.33-2.91,2-4.37.35-.77,1.07-1.88,0-2.36-3.45-1.5-18.18-1.5-21.63,0-1.1.48-.38,1.59,0,2.36.66,1.46,1.33,2.91,2,4.37a.75.75,0,0,0,.76.44,87.56,87.56,0,0,1,16.19,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#badef745-f775-4eca-9732-2eb74db98ce9);"></path>
                                        <path d="M40.83,247.51c-3.15-6.11-2.89-13.68-3.26-19.69-.11-1.83.2-2.2,1.85-2.47.89,6.89,0,15.78,7.53,18-.36,4.94-.22,7.56,3.06,7.56,2,.06,3.47,0,5.08,0v0c2.9-.09,4.75.14,7.65.05s3.08-2.62,2.76-7.57c6.78-2.18,6-11,6.77-17.91,1.5.28,1.74.78,1.64,2.43-.31,6-.05,13.57-2.89,19.68a4.93,4.93,0,0,1-3,2.84c-3.18,1.57-6.56,1.67-9.91,1.66h0c-4.66,0-9.49.35-14-1.64C42.43,249.59,41.71,249.22,40.83,247.51Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b350104b-53e5-4418-b422-064a7b33ecab);"></path>
                                        <path d="M75.68,225.36a6.09,6.09,0,0,1,3,.47c-3.87-6.93-5-16.5-4.24-27.87.48-4.39,3.42-6.37,7.48-7.31,5-1.14,15.29-1.14,20.25,0,4.07.94,7,2.92,7.48,7.31.76,11.37-.37,20.94-4.24,27.87a6.12,6.12,0,0,1,3-.47c1.77.26,1.85,1,1.8,2.22-.28,6.77-.62,13.44-2.21,17.93-1.2,3.37-2.16,4.26-5.45,5.31-5.24,1.66-15.78,1.66-21,0-3.29-1-4.26-1.93-5.45-5.31-1.59-4.49-1.94-11.16-2.21-17.93,0-1.25,0-2,1.79-2.22Z" transform="translate(0 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M82.36,224.66a113.34,113.34,0,0,0,19.41.09c.15.46.32,1,.48,1.43s.42.93.92.92c1.53,0,5-1.75,5.14-1.74s.26.06.25.22c-.61,5.82.27,12.75-4.15,16.4a10.22,10.22,0,0,1-2.6,1.31c-.17-.62-.26-2.54-2.29-2.76a81.28,81.28,0,0,0-13.87,0c-2.18.22-2.1,1.75-2.38,2.8a10.6,10.6,0,0,1-3-1.35c-4.4-3.73-4-10.36-4.68-16.33,0-.15.21-.17.39-.2s2.74,1.27,4.33,1.66,1.51-1.33,2-2.43ZM80,228.72c-.28.63-.12,5.62-.12,6.93,0,1.73-.28,3.33,1.38,4.2a3.23,3.23,0,0,0,2.1.19,60.41,60.41,0,0,1,17.71,0,1.33,1.33,0,0,0,1.32-.19c1.53-.86,1.52-2.47,1.52-4.19,0-1.06-.07-6.68-.23-6.93-1.71-2.69-14.33-3.35-20.46-1.91-1.74.41-2.92,1.16-3.22,1.87Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#aa04f972-51f8-4f2b-aea6-9a1172cdf532);"></path>
                                        <path d="M77.93,222.45c-2.37-5.49-3.25-12.3-3-20.16a23.25,23.25,0,0,1,.43-5.08,6.76,6.76,0,0,1,3.41-4.48.75.75,0,0,1,1.08.37L82.25,199a.74.74,0,0,1-.18.83,2.17,2.17,0,0,0-.69,1.6v8.3A2.45,2.45,0,0,0,83.1,212a2.44,2.44,0,0,0-1.66,2.3v8.25a2.16,2.16,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.58,1.6a.75.75,0,0,1-1.32.18,19,19,0,0,1-2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a5c7d58b-3c54-4092-8e70-897f95d67c4a);"></path>
                                        <path d="M106.2,222.45c2.36-5.49,3.25-12.3,3-20.16a23.88,23.88,0,0,0-.43-5.08,6.74,6.74,0,0,0-3.42-4.48.74.74,0,0,0-1.07.37L101.88,199a.74.74,0,0,0,.18.83,2.21,2.21,0,0,1,.69,1.6v8.3A2.46,2.46,0,0,1,101,212a2.45,2.45,0,0,1,1.66,2.3v8.25a2.2,2.2,0,0,1-.68,1.58.73.73,0,0,0-.19.8l.57,1.6a.76.76,0,0,0,1.33.18,19,19,0,0,0,2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f3b80104-712a-4b0b-9765-bca19febca65);"></path>
                                        <path d="M84.37,199.7a84.13,84.13,0,0,1,15.55,0,2.16,2.16,0,0,1,2,2.15v7.72a2.09,2.09,0,0,1-2,2.15H84.37a2.09,2.09,0,0,1-2-2.15v-7.72A2.17,2.17,0,0,1,84.37,199.7Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b3bc8cbf-6bef-45ed-8b10-9a964b8e31b1);"></path>
                                        <path d="M84.31,224.29a84.13,84.13,0,0,0,15.55,0,2.14,2.14,0,0,0,2-2.13v-7.69a2.08,2.08,0,0,0-2-2.13H84.31a2.08,2.08,0,0,0-2,2.13v7.69A2.15,2.15,0,0,0,84.31,224.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b78449f0-afb5-4e7c-86e4-1be70396f953);"></path>
                                        <path d="M103,229.69c.05,2.11,0,5.32,0,7.42a2.07,2.07,0,0,1-2.12,2.2,62.21,62.21,0,0,0-17.87,0c-1.15.18-2.11-1-2.11-2.2,0-2.1,0-5.31,0-7.42C80.8,225.69,102.91,226.53,103,229.69Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e33aad95-1655-4d0b-9387-a8eeb371bfdb);"></path>
                                        <path d="M86.66,241.33H98.55a2.79,2.79,0,0,1,2.52,2.78v3.42A2.5,2.5,0,0,1,98.55,250H86.66a2.5,2.5,0,0,1-2.52-2.46v-3.42A2.79,2.79,0,0,1,86.66,241.33Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e3430a72-a642-4735-a468-d8f986a0a551);"></path>
                                        <path d="M100.33,199.08a.75.75,0,0,0,.76-.44c.66-1.46,1.33-2.91,2-4.37.35-.77,1.07-1.88,0-2.36-3.45-1.5-18.18-1.5-21.63,0-1.1.48-.38,1.59,0,2.36.66,1.46,1.33,2.91,2,4.37a.75.75,0,0,0,.76.44,87.56,87.56,0,0,1,16.19,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ffb228cd-90de-4644-a854-c568f445ab95);"></path>
                                        <path d="M77.15,247.51c-3.15-6.11-2.89-13.68-3.26-19.69-.11-1.83.2-2.2,1.85-2.47.89,6.89,0,15.78,7.53,18-.36,4.94-.21,7.56,3.06,7.56,2,.06,3.47,0,5.08,0v0c2.9-.09,4.76.14,7.65.05s3.08-2.62,2.76-7.57c6.78-2.18,6-11,6.77-17.91,1.5.28,1.74.78,1.64,2.43-.31,6,0,13.57-2.89,19.68a4.93,4.93,0,0,1-3,2.84c-3.18,1.57-6.56,1.67-9.9,1.66h0c-4.66,0-9.49.35-14-1.64-1.71-.76-2.43-1.13-3.31-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a00424c2-34df-44ff-bc79-7bc2474a90e8);"></path>
                                        <path d="M112,225.36a6.1,6.1,0,0,1,3,.47c-3.87-6.93-5-16.5-4.24-27.87.48-4.39,3.41-6.37,7.48-7.31,5-1.14,15.29-1.14,20.25,0,4.07.94,7,2.92,7.48,7.31.75,11.37-.37,20.94-4.24,27.87a6.1,6.1,0,0,1,3-.47c1.77.26,1.85,1,1.8,2.22-.28,6.77-.62,13.44-2.21,17.93-1.2,3.37-2.16,4.26-5.45,5.31-5.24,1.66-15.79,1.66-21,0-3.29-1-4.26-1.93-5.45-5.31-1.59-4.49-1.94-11.16-2.21-17.93,0-1.25,0-2,1.79-2.22Z" transform="translate(0 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M118.67,224.66a113.47,113.47,0,0,0,19.42.09c.15.46.32,1,.48,1.43s.42.93.92.92c1.52,0,5-1.75,5.14-1.74s.25.06.25.22c-.62,5.82.27,12.75-4.15,16.4a10.22,10.22,0,0,1-2.6,1.31c-.17-.62-.27-2.54-2.29-2.76a81.28,81.28,0,0,0-13.87,0c-2.18.22-2.1,1.75-2.38,2.8a10.6,10.6,0,0,1-3-1.35c-4.4-3.73-4-10.36-4.68-16.33,0-.15.21-.17.39-.2s2.74,1.27,4.33,1.66,1.51-1.33,2-2.43Zm-2.31,4.06c-.28.63-.12,5.62-.12,6.93,0,1.73-.28,3.33,1.38,4.2a3.23,3.23,0,0,0,2.1.19,60.41,60.41,0,0,1,17.71,0,1.34,1.34,0,0,0,1.32-.19c1.53-.86,1.52-2.47,1.52-4.19,0-1.06-.07-6.68-.23-6.93-1.71-2.69-14.33-3.35-20.46-1.91-1.74.41-2.92,1.16-3.22,1.87Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e8005a80-abb9-49b5-8ca0-6eece26369bc);"></path>
                                        <path d="M114.25,222.45c-2.37-5.49-3.25-12.3-3-20.16a23.89,23.89,0,0,1,.44-5.08,6.76,6.76,0,0,1,3.41-4.48.75.75,0,0,1,1.08.37l2.43,5.91a.74.74,0,0,1-.18.83,2.17,2.17,0,0,0-.69,1.6v8.3a2.46,2.46,0,0,0,1.71,2.3,2.44,2.44,0,0,0-1.65,2.3v8.25a2.16,2.16,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.58,1.6a.75.75,0,0,1-1.33.18,18.56,18.56,0,0,1-2.47-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b1a22dac-6e29-4a99-8696-cc9d897ba1a7);"></path>
                                        <path d="M142.51,222.45c2.37-5.49,3.26-12.3,3-20.16a23.88,23.88,0,0,0-.43-5.08,6.77,6.77,0,0,0-3.42-4.48.74.74,0,0,0-1.07.37L138.2,199a.74.74,0,0,0,.18.83,2.21,2.21,0,0,1,.69,1.6v8.3a2.46,2.46,0,0,1-1.72,2.3,2.44,2.44,0,0,1,1.65,2.3v8.25a2.16,2.16,0,0,1-.68,1.58.72.72,0,0,0-.18.8l.57,1.6a.76.76,0,0,0,1.33.18,18.56,18.56,0,0,0,2.47-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a3382896-a4e4-4433-a894-a193908f4c56);"></path>
                                        <path d="M120.69,199.7a84,84,0,0,1,15.54,0,2.16,2.16,0,0,1,2,2.15v7.72a2.1,2.1,0,0,1-2,2.15H120.69a2.09,2.09,0,0,1-2-2.15v-7.72A2.17,2.17,0,0,1,120.69,199.7Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a2121a8f-5f31-4afa-8d5e-e93bf0c355e5);"></path>
                                        <path d="M120.63,224.29a84.13,84.13,0,0,0,15.55,0,2.14,2.14,0,0,0,2-2.13v-7.69a2.08,2.08,0,0,0-2-2.13H120.63a2.08,2.08,0,0,0-2,2.13v7.69A2.15,2.15,0,0,0,120.63,224.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b25ccf39-9222-4316-8de4-e78f60703253);"></path>
                                        <path d="M139.31,229.69c.05,2.11,0,5.32,0,7.42a2.07,2.07,0,0,1-2.12,2.2,62.21,62.21,0,0,0-17.87,0c-1.15.18-2.11-1-2.11-2.2,0-2.1,0-5.31,0-7.42-.09-4,22-3.16,22.1,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#aef3e7ff-0db5-4aee-9f59-cf06e8ce4d5c);"></path>
                                        <path d="M123,241.33h11.9a2.79,2.79,0,0,1,2.51,2.78v3.42a2.49,2.49,0,0,1-2.51,2.46H123a2.49,2.49,0,0,1-2.51-2.46v-3.42A2.79,2.79,0,0,1,123,241.33Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f5d40f0a-aa0a-4d4f-9110-b13b28ada7a6);"></path>
                                        <path d="M136.65,199.08a.75.75,0,0,0,.76-.44c.66-1.46,1.33-2.91,2-4.37.35-.77,1.07-1.88,0-2.36-3.45-1.5-18.18-1.5-21.63,0-1.1.48-.38,1.59,0,2.36.66,1.46,1.33,2.91,2,4.37a.75.75,0,0,0,.76.44,87.56,87.56,0,0,1,16.19,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a681e8c9-eb1b-4e67-9452-eb23e9042b92);"></path>
                                        <path d="M113.47,247.51c-3.15-6.11-2.89-13.68-3.26-19.69-.11-1.83.2-2.2,1.85-2.47.89,6.89,0,15.78,7.53,18-.36,4.94-.22,7.56,3.06,7.56,1.94.06,3.47,0,5.08,0v0c2.9-.09,4.75.14,7.65.05s3.08-2.62,2.76-7.57c6.78-2.18,6-11,6.77-17.91,1.49.28,1.73.78,1.64,2.43-.31,6,0,13.57-2.89,19.68a4.93,4.93,0,0,1-3,2.84c-3.18,1.57-6.56,1.67-9.91,1.66h0c-4.66,0-9.49.35-14-1.64-1.71-.76-2.44-1.13-3.31-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a9a0684d-a6aa-49e6-9420-1707ff111721);"></path>
                                        <path d="M39.36,292.64a6.09,6.09,0,0,1,3,.47c-3.87-6.93-5-16.5-4.24-27.87.48-4.39,3.42-6.37,7.48-7.3,5-1.14,15.29-1.14,20.25,0,4.07.93,7,2.91,7.48,7.3.76,11.37-.37,20.94-4.24,27.87a6.12,6.12,0,0,1,3-.47c1.77.26,1.85,1,1.8,2.23-.28,6.76-.62,13.44-2.21,17.93-1.2,3.37-2.16,4.26-5.45,5.3-5.24,1.66-15.78,1.66-21,0-3.29-1-4.26-1.93-5.45-5.3-1.59-4.49-1.94-11.17-2.21-17.93,0-1.25,0-2,1.79-2.23Z" transform="translate(0 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M46,291.94a112.34,112.34,0,0,0,19.41.09c.15.46.32,1,.48,1.43s.42.93.92.92c1.53,0,5-1.75,5.15-1.74s.25.06.24.22c-.61,5.83.27,12.76-4.15,16.4a9.9,9.9,0,0,1-2.6,1.31c-.17-.62-.26-2.54-2.28-2.76a81.4,81.4,0,0,0-13.88,0c-2.18.22-2.1,1.75-2.38,2.8a10.33,10.33,0,0,1-3-1.35c-4.39-3.73-4-10.35-4.68-16.33,0-.15.21-.17.39-.2S42.4,294,44,294.37s1.51-1.33,2-2.43ZM43.72,296c-.28.63-.12,5.62-.12,6.94,0,1.72-.28,3.32,1.38,4.19a3.23,3.23,0,0,0,2.1.19,60.42,60.42,0,0,1,17.71,0,1.36,1.36,0,0,0,1.32-.2c1.53-.86,1.52-2.47,1.52-4.19,0-1.06-.07-6.67-.23-6.93-1.71-2.69-14.33-3.35-20.46-1.91-1.74.41-2.92,1.16-3.22,1.87Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#fb46f047-b4d8-48e7-85e7-5d208d0c3f6b);"></path>
                                        <path d="M41.61,289.74c-2.37-5.5-3.25-12.31-3-20.16a23.34,23.34,0,0,1,.43-5.09A6.76,6.76,0,0,1,42.42,260a.75.75,0,0,1,1.08.37l2.43,5.91a.74.74,0,0,1-.18.83,2.17,2.17,0,0,0-.69,1.6V277a2.44,2.44,0,0,0,1.72,2.3,2.45,2.45,0,0,0-1.66,2.3v8.25a2.16,2.16,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.58,1.6a.75.75,0,0,1-1.32.18,18.74,18.74,0,0,1-2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a99cf960-64eb-49e2-a22f-1c414f2e41ac);"></path>
                                        <path d="M69.88,289.74c2.36-5.5,3.25-12.31,3-20.16a24,24,0,0,0-.43-5.09A6.74,6.74,0,0,0,69.06,260a.74.74,0,0,0-1.07.37l-2.43,5.91a.74.74,0,0,0,.18.83,2.21,2.21,0,0,1,.69,1.6V277a2.45,2.45,0,0,1-1.72,2.3,2.46,2.46,0,0,1,1.66,2.3v8.25a2.2,2.2,0,0,1-.68,1.58.73.73,0,0,0-.19.8l.57,1.6a.76.76,0,0,0,1.33.18,18.74,18.74,0,0,0,2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b517263d-6095-4f25-9239-2e7bf23dc42d);"></path>
                                        <path d="M48.05,267a85,85,0,0,1,15.55,0,2.16,2.16,0,0,1,2,2.15v7.72a2.09,2.09,0,0,1-2,2.15H48.05a2.09,2.09,0,0,1-2-2.15v-7.72A2.17,2.17,0,0,1,48.05,267Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a5176971-59c0-466c-8ebc-ad317f0683a2);"></path>
                                        <path d="M48,291.58a85.92,85.92,0,0,0,15.55,0,2.15,2.15,0,0,0,2-2.14v-7.68a2.09,2.09,0,0,0-2-2.14H48a2.08,2.08,0,0,0-2,2.14v7.68A2.16,2.16,0,0,0,48,291.58Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ff36e18b-7d5b-4af9-b973-629cc4265c4d);"></path>
                                        <path d="M66.67,297c0,2.1,0,5.31,0,7.42a2.07,2.07,0,0,1-2.12,2.2,61.85,61.85,0,0,0-17.87,0c-1.15.17-2.11-1-2.11-2.2,0-2.11,0-5.32,0-7.42C44.48,293,66.59,293.81,66.67,297Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b5ce0f22-a25d-458e-9e80-56df324cbd33);"></path>
                                        <path d="M50.34,308.61H62.23a2.79,2.79,0,0,1,2.52,2.78v3.42a2.5,2.5,0,0,1-2.52,2.46H50.34a2.5,2.5,0,0,1-2.52-2.46v-3.42A2.79,2.79,0,0,1,50.34,308.61Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b79cf42f-8888-4f66-a877-71eeb50620c7);"></path>
                                        <path d="M64,266.36a.75.75,0,0,0,.76-.44c.66-1.45,1.33-2.91,2-4.37.35-.77,1.07-1.88,0-2.36-3.45-1.5-18.18-1.5-21.63,0-1.1.48-.38,1.59,0,2.36.66,1.46,1.33,2.91,2,4.37a.75.75,0,0,0,.76.44,87.56,87.56,0,0,1,16.19,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b0946ef6-0867-46b5-ba88-85a63f4f45d4);"></path>
                                        <path d="M40.83,314.79c-3.15-6.11-2.89-13.68-3.26-19.69-.11-1.83.2-2.19,1.85-2.47.89,6.89,0,15.78,7.53,18-.36,5-.22,7.56,3.06,7.57,2,0,3.47,0,5.08-.05v0c2.9-.09,4.75.14,7.65.05s3.08-2.62,2.76-7.57c6.78-2.18,6-11,6.77-17.91,1.5.28,1.74.78,1.64,2.43-.31,6-.05,13.58-2.89,19.68a4.93,4.93,0,0,1-3,2.84c-3.18,1.57-6.56,1.68-9.91,1.66h0c-4.66,0-9.49.35-14-1.64-1.71-.76-2.43-1.13-3.31-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a7b43a36-25a5-49d6-9815-dd9b4b9f13ab);"></path>
                                        <path d="M75.68,292.64a6.09,6.09,0,0,1,3,.47c-3.87-6.93-5-16.5-4.24-27.87.48-4.39,3.42-6.37,7.48-7.3,5-1.14,15.29-1.14,20.25,0,4.07.93,7,2.91,7.48,7.3.76,11.37-.37,20.94-4.24,27.87a6.12,6.12,0,0,1,3-.47c1.77.26,1.85,1,1.8,2.23-.28,6.76-.62,13.44-2.21,17.93-1.2,3.37-2.16,4.26-5.45,5.3-5.24,1.66-15.78,1.66-21,0-3.29-1-4.26-1.93-5.45-5.3-1.59-4.49-1.94-11.17-2.21-17.93,0-1.25,0-2,1.79-2.23Z" transform="translate(0 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M82.36,291.94a112.34,112.34,0,0,0,19.41.09c.15.46.32,1,.48,1.43s.42.93.92.92c1.53,0,5-1.75,5.14-1.74s.26.06.25.22c-.61,5.83.27,12.76-4.15,16.4a9.9,9.9,0,0,1-2.6,1.31c-.17-.62-.26-2.54-2.29-2.76a81.28,81.28,0,0,0-13.87,0c-2.18.22-2.1,1.75-2.38,2.8a10.33,10.33,0,0,1-3-1.35c-4.4-3.73-4-10.35-4.68-16.33,0-.15.21-.17.39-.2s2.74,1.27,4.33,1.66,1.51-1.33,2-2.43ZM80,296c-.28.63-.12,5.62-.12,6.94,0,1.72-.28,3.32,1.38,4.19a3.23,3.23,0,0,0,2.1.19,60.42,60.42,0,0,1,17.71,0,1.36,1.36,0,0,0,1.32-.2C104,306.3,104,304.69,104,303c0-1.06-.07-6.67-.23-6.93-1.71-2.69-14.33-3.35-20.46-1.91-1.74.41-2.92,1.16-3.22,1.87Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bb854d59-3987-4977-8a5f-88683466e8a3);"></path>
                                        <path d="M77.93,289.74c-2.37-5.5-3.25-12.31-3-20.16a23.34,23.34,0,0,1,.43-5.09A6.76,6.76,0,0,1,78.74,260a.75.75,0,0,1,1.08.37l2.43,5.91a.74.74,0,0,1-.18.83,2.17,2.17,0,0,0-.69,1.6V277a2.44,2.44,0,0,0,1.72,2.3,2.45,2.45,0,0,0-1.66,2.3v8.25a2.16,2.16,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.58,1.6a.75.75,0,0,1-1.32.18,18.74,18.74,0,0,1-2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b057071d-e98e-4afb-9d13-ef96534adf83);"></path>
                                        <path d="M106.2,289.74c2.36-5.5,3.25-12.31,3-20.16a24,24,0,0,0-.43-5.09,6.74,6.74,0,0,0-3.42-4.48.74.74,0,0,0-1.07.37l-2.43,5.91a.74.74,0,0,0,.18.83,2.21,2.21,0,0,1,.69,1.6V277a2.45,2.45,0,0,1-1.72,2.3,2.46,2.46,0,0,1,1.66,2.3v8.25a2.2,2.2,0,0,1-.68,1.58.73.73,0,0,0-.19.8l.57,1.6a.76.76,0,0,0,1.33.18,18.74,18.74,0,0,0,2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a8216871-4a4f-4535-8a71-fc5ed8061efa);"></path>
                                        <path d="M84.37,267a85,85,0,0,1,15.55,0,2.16,2.16,0,0,1,2,2.15v7.72a2.09,2.09,0,0,1-2,2.15H84.37a2.09,2.09,0,0,1-2-2.15v-7.72A2.17,2.17,0,0,1,84.37,267Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a9871306-c0d7-433f-8fdb-6292c8ebb32d);"></path>
                                        <path d="M84.31,291.58a85.92,85.92,0,0,0,15.55,0,2.15,2.15,0,0,0,2-2.14v-7.68a2.09,2.09,0,0,0-2-2.14H84.31a2.08,2.08,0,0,0-2,2.14v7.68A2.16,2.16,0,0,0,84.31,291.58Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#faed8616-6c2a-428b-a5fc-fc4933311036);"></path>
                                        <path d="M103,297c.05,2.1,0,5.31,0,7.42a2.07,2.07,0,0,1-2.12,2.2,61.85,61.85,0,0,0-17.87,0c-1.15.17-2.11-1-2.11-2.2,0-2.11,0-5.32,0-7.42C80.8,293,102.91,293.81,103,297Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bd5b5607-ed82-4779-955b-be6665a20d3e);"></path>
                                        <path d="M86.66,308.61H98.55a2.79,2.79,0,0,1,2.52,2.78v3.42a2.5,2.5,0,0,1-2.52,2.46H86.66a2.5,2.5,0,0,1-2.52-2.46v-3.42A2.79,2.79,0,0,1,86.66,308.61Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b1a56050-8fa8-4390-ae03-69ced06d1937);"></path>
                                        <path d="M100.33,266.36a.75.75,0,0,0,.76-.44c.66-1.45,1.33-2.91,2-4.37.35-.77,1.07-1.88,0-2.36-3.45-1.5-18.18-1.5-21.63,0-1.1.48-.38,1.59,0,2.36.66,1.46,1.33,2.91,2,4.37a.75.75,0,0,0,.76.44,87.56,87.56,0,0,1,16.19,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e7267d9e-6832-47ef-b261-c991b7b6af76);"></path>
                                        <path d="M77.15,314.79c-3.15-6.11-2.89-13.68-3.26-19.69-.11-1.83.2-2.19,1.85-2.47.89,6.89,0,15.78,7.53,18-.36,5-.21,7.56,3.06,7.57,2,0,3.47,0,5.08-.05v0c2.9-.09,4.76.14,7.65.05s3.08-2.62,2.76-7.57c6.78-2.18,6-11,6.77-17.91,1.5.28,1.74.78,1.64,2.43-.31,6,0,13.58-2.89,19.68a4.93,4.93,0,0,1-3,2.84c-3.18,1.57-6.56,1.68-9.9,1.66h0c-4.66,0-9.49.35-14-1.64-1.71-.76-2.43-1.13-3.31-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#eed96ebf-29eb-4d2f-a8b6-b5974bf296c1);"></path>
                                        <path d="M112,292.64a6.1,6.1,0,0,1,3,.47c-3.87-6.93-5-16.5-4.24-27.87.48-4.39,3.41-6.37,7.48-7.3,5-1.14,15.29-1.14,20.25,0,4.07.93,7,2.91,7.48,7.3.75,11.37-.37,20.94-4.24,27.87a6.1,6.1,0,0,1,3-.47c1.77.26,1.85,1,1.8,2.23-.28,6.76-.62,13.44-2.21,17.93-1.2,3.37-2.16,4.26-5.45,5.3-5.24,1.66-15.79,1.66-21,0-3.29-1-4.26-1.93-5.45-5.3-1.59-4.49-1.94-11.17-2.21-17.93,0-1.25,0-2,1.79-2.23Z" transform="translate(0 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                        <path d="M118.67,291.94a112.46,112.46,0,0,0,19.42.09c.15.46.32,1,.48,1.43s.42.93.92.92c1.52,0,5-1.75,5.14-1.74s.25.06.25.22c-.62,5.83.27,12.76-4.15,16.4a9.9,9.9,0,0,1-2.6,1.31c-.17-.62-.27-2.54-2.29-2.76a81.28,81.28,0,0,0-13.87,0c-2.18.22-2.1,1.75-2.38,2.8a10.33,10.33,0,0,1-3-1.35c-4.4-3.73-4-10.35-4.68-16.33,0-.15.21-.17.39-.2s2.74,1.27,4.33,1.66,1.51-1.33,2-2.43ZM116.36,296c-.28.63-.12,5.62-.12,6.94,0,1.72-.28,3.32,1.38,4.19a3.23,3.23,0,0,0,2.1.19,60.42,60.42,0,0,1,17.71,0,1.37,1.37,0,0,0,1.32-.2c1.53-.86,1.52-2.47,1.52-4.19,0-1.06-.07-6.67-.23-6.93-1.71-2.69-14.33-3.35-20.46-1.91-1.74.41-2.92,1.16-3.22,1.87Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a7e3abd3-3ec0-49d4-817d-36256fa33fb3);"></path>
                                        <path d="M114.25,289.74c-2.37-5.5-3.25-12.31-3-20.16a24,24,0,0,1,.44-5.09,6.76,6.76,0,0,1,3.41-4.48.75.75,0,0,1,1.08.37l2.43,5.91a.74.74,0,0,1-.18.83,2.17,2.17,0,0,0-.69,1.6V277a2.45,2.45,0,0,0,1.71,2.3,2.46,2.46,0,0,0-1.65,2.3v8.25a2.16,2.16,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.58,1.6a.75.75,0,0,1-1.33.18,18.35,18.35,0,0,1-2.47-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f9288820-9f1a-41ee-9d4d-dc7cdf58a388);"></path>
                                        <path d="M142.51,289.74c2.37-5.5,3.26-12.31,3-20.16a24,24,0,0,0-.43-5.09A6.77,6.77,0,0,0,141.7,260a.74.74,0,0,0-1.07.37l-2.43,5.91a.74.74,0,0,0,.18.83,2.21,2.21,0,0,1,.69,1.6V277a2.45,2.45,0,0,1-1.72,2.3,2.46,2.46,0,0,1,1.65,2.3v8.25a2.16,2.16,0,0,1-.68,1.58.72.72,0,0,0-.18.8l.57,1.6A.76.76,0,0,0,140,294a18.35,18.35,0,0,0,2.47-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a561fec2-0632-4330-bcb0-d52502b1dd58);"></path>
                                        <path d="M120.69,267a84.91,84.91,0,0,1,15.54,0,2.16,2.16,0,0,1,2,2.15v7.72a2.1,2.1,0,0,1-2,2.15H120.69a2.09,2.09,0,0,1-2-2.15v-7.72A2.17,2.17,0,0,1,120.69,267Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f5c63e85-3b86-42fa-beb4-476f758f265e);"></path>
                                        <path d="M120.63,291.58a85.92,85.92,0,0,0,15.55,0,2.15,2.15,0,0,0,2-2.14v-7.68a2.09,2.09,0,0,0-2-2.14H120.63a2.08,2.08,0,0,0-2,2.14v7.68A2.16,2.16,0,0,0,120.63,291.58Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a7e83272-4d6c-4c3f-84e9-ec76bdba5e33);"></path>
                                        <path d="M139.31,297c.05,2.1,0,5.31,0,7.42a2.07,2.07,0,0,1-2.12,2.2,61.85,61.85,0,0,0-17.87,0c-1.15.17-2.11-1-2.11-2.2,0-2.11,0-5.32,0-7.42-.09-4,22-3.17,22.1,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#aec4023d-113e-4e5f-928f-11b63673ddf2);"></path>
                                        <path d="M123,308.61h11.9a2.79,2.79,0,0,1,2.51,2.78v3.42a2.49,2.49,0,0,1-2.51,2.46H123a2.49,2.49,0,0,1-2.51-2.46v-3.42A2.79,2.79,0,0,1,123,308.61Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a5ba168c-f5d1-4c0b-9301-ac1c54b1fe53);"></path>
                                        <path d="M136.65,266.36a.75.75,0,0,0,.76-.44c.66-1.45,1.33-2.91,2-4.37.35-.77,1.07-1.88,0-2.36-3.45-1.5-18.18-1.5-21.63,0-1.1.48-.38,1.59,0,2.36.66,1.46,1.33,2.91,2,4.37a.75.75,0,0,0,.76.44,87.56,87.56,0,0,1,16.19,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b0741f06-b2dd-45a6-abe1-33343dfc6edb);"></path>
                                        <path d="M113.47,314.79c-3.15-6.11-2.89-13.68-3.26-19.69-.11-1.83.2-2.19,1.85-2.47.89,6.89,0,15.78,7.53,18-.36,5-.22,7.56,3.06,7.57,1.94,0,3.47,0,5.08-.05v0c2.9-.09,4.75.14,7.65.05s3.08-2.62,2.76-7.57c6.78-2.18,6-11,6.77-17.91,1.49.28,1.73.78,1.64,2.43-.31,6,0,13.58-2.89,19.68a4.93,4.93,0,0,1-3,2.84c-3.18,1.57-6.56,1.68-9.91,1.66h0c-4.66,0-9.49.35-14-1.64-1.71-.76-2.44-1.13-3.31-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bcd104c1-8d4a-4852-96d6-0b0ad09ed6d3);"></path>
                                        </g>
                                    </svg>
                                    </div>
                                    <!-- Водительский ряд-->
                                    <div class="car-place--svg--places car-place-front-left--miniven @if(isset($booking_seats) && in_array('Первое место (Водительский ряд)', $booking_seats)) car-place--booked @endif" data-car-place="Первое место (Водительский ряд)">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <!---->
                                    <div class="car-place--svg--places car-place-passanger--miniven__1 @if(isset($booking_seats) && in_array('1-место', $booking_seats)) car-place--booked @endif" data-car-place="1-место">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passanger--miniven__2 @if(isset($booking_seats) && in_array('2-место', $booking_seats)) car-place--booked @endif" data-car-place="2-место" data-place-booked="Место забронировано">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passanger--miniven__3 @if(isset($booking_seats) && in_array('3-место', $booking_seats)) car-place--booked @endif" data-car-place="3-место">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passanger--miniven__4 @if(isset($booking_seats) && in_array('4-место', $booking_seats)) car-place--booked @endif" data-car-place="4-место">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passanger--miniven__5 @if(isset($booking_seats) && in_array('5-место', $booking_seats)) car-place--booked @endif" data-car-place="5-место">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passanger--miniven__6 @if(isset($booking_seats) && in_array('6-место', $booking_seats)) car-place--booked @endif" data-car-place="6-место">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                </div>
                                @endif
                                @if(optional($trip->car)->template == 'car-choise-car' || optional($trip->car)->template == null)
                                <div class="col-xl-5 car-place--position car-choise-car @if(optional($trip->car)->template == 'car-choise-car' || optional($trip->car)->template == null) active @endif">
                                    <div class="car-place--svg">
                                    <svg class="icon icon-car " id="ad9bef81-fb93-41c9-9a5d-62b2cf802d1d" data-name="Слой 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 162.86 342.01">
                                        <defs>
                                        <lineargradient id="e17229d5-1d76-4666-83c8-7dd276dbd461" x1="2306.86" y1="-1707.71" x2="2306.86" y2="-1611.8" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="e05f483a-6b82-4570-b002-23b970d780ad" x1="2652.94" y1="-827.1" x2="2548.06" y2="-645.43" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="bbfe1608-7d31-448f-adf6-e9934e99c902" x1="2716.85" y1="-1188.12" x2="2712.73" y2="-1188.12" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="a1fb0fe3-630d-4119-9fa2-32e0d5b6e326" x1="2715.31" y1="-994.87" x2="2721.45" y2="-1010" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="b99e6cbe-c607-4d3f-9666-a78664e8b433" x1="2712.6" y1="-1456.48" x2="2708.48" y2="-1456.48" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="b61fc3ee-cf63-4793-8de7-1d29d335cf24" x1="2983.45" y1="-642.08" x2="2615.27" y2="-1170.98" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="bb2bf3df-dd06-45ac-aee3-470e9cb962ef" x1="2665.44" y1="-1368.82" x2="2656.31" y2="-933.49" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0.43"></stop>
                                        </lineargradient>
                                        <lineargradient id="fba42428-606e-4486-ab4a-5127da5483c1" x1="2293.24" y1="-1812.27" x2="2297.16" y2="-1202.72" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="bf700ed3-367c-44f1-ad00-76a14d34899d" x1="2303.64" y1="-1708.07" x2="2290.37" y2="-1700.39" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="bbc87909-512f-446e-a9e6-557472f7212d" x1="2638.45" y1="-1708.34" x2="2651.72" y2="-1700.66" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="e28947ca-37f5-460c-a4f6-aaabac58e4ca" x1="2598.97" y1="-1724.88" x2="2626.45" y2="-1716.75" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="b6beceb8-8141-4f27-9637-91688ed366bc" x1="2255.97" y1="-856.8" x2="2278.8" y2="-771.61" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="adddd129-70af-449f-9037-391078f3457d" x1="2267.58" y1="-791.77" x2="2294.32" y2="-627.35" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff" stop-opacity="0"></stop>
                                            <stop offset="0.13" stop-color="#fff" stop-opacity="0.63"></stop>
                                            <stop offset="0.51" stop-color="#fff"></stop>
                                            <stop offset="0.85" stop-color="#fff" stop-opacity="0.7"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="fb792827-dc88-495d-9a0b-845dab9b4035" x1="2280.08" y1="-664.98" x2="2273.36" y2="-727.22" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="f0d0903b-f0f1-4707-96a9-8879a8b13671" x1="2675.52" y1="-791.77" x2="2648.78" y2="-627.35" xlink:href="#adddd129-70af-449f-9037-391078f3457d"></lineargradient>
                                        <lineargradient id="baa7ffd7-d031-46b1-a5f3-a30cd00eee1f" x1="2663.02" y1="-664.98" x2="2669.75" y2="-727.22" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="f10bb56d-b582-418b-bdfe-46061c15282f" x1="2474.6" y1="-1238.87" x2="2474.6" y2="-1217.69" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="a70271a1-36bd-40b3-aeee-31ea73c869d2" x1="2437.23" y1="-1227.37" x2="2475.4" y2="-1171.5" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="e48812ca-3f9a-4e8a-a346-faa18ff47656" x1="2516.03" y1="-1215.65" x2="2476.68" y2="-1186.55" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="f31092fd-b921-4f65-812b-efaad37dfc9f" x1="3324.32" y1="-990.59" x2="2283.18" y2="-990.59" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff" stop-opacity="0.08"></stop>
                                            <stop offset="0.28" stop-color="#fff" stop-opacity="0.04"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="adcdde72-e0a2-4248-8ffe-55bf6a210719" x1="2705.93" y1="-737.36" x2="2348.36" y2="-1052.3" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="0.28" stop-color="#fff" stop-opacity="0.36"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="f493620f-b254-4d00-802e-17fd67686eec" x1="2266.41" y1="-1603.67" x2="2624.56" y2="-1603.67" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="af58323e-5310-4e4c-acd9-bf5726a72288" x1="2472.07" y1="-735.27" x2="2325.59" y2="-735.27" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="afc85f7c-ab8c-4e92-bec9-c12344a813e3" x1="2648.81" y1="-1812.27" x2="2644.88" y2="-1202.72" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="bb73b25f-e6dd-4da0-9673-25adb417e4c2" x1="2227.12" y1="-1188.12" x2="2231.24" y2="-1188.12" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="e6a32a8b-ccb2-4c77-84ad-61ab19c44bc4" x1="2228.66" y1="-994.87" x2="2222.52" y2="-1010" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="a423d35c-59af-4fea-b59d-5c468f85e87a" x1="2231.37" y1="-1456.48" x2="2235.49" y2="-1456.48" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="aa4967f9-cb02-4cb7-81de-52cf6c8bdea4" x1="1960.53" y1="-642.08" x2="2328.71" y2="-1170.98" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="ec05a901-b934-44d1-b880-4a15db33ef45" x1="2278.54" y1="-1368.82" x2="2287.67" y2="-933.49" xlink:href="#bb2bf3df-dd06-45ac-aee3-470e9cb962ef"></lineargradient>
                                        <lineargradient id="b2bf6fb6-4e95-4e62-819f-d0bf820eb40c" x1="2999.79" y1="-989.27" x2="2360.09" y2="-989.27" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="0.28" stop-color="#fff" stop-opacity="0.5"></stop>
                                            <stop offset="1" stop-color="#fff" stop-opacity="0"></stop>
                                        </lineargradient>
                                        <lineargradient id="ee95cd89-cc24-4d5f-a586-1396e273065b" x1="2498.72" y1="-1001.82" x2="2301.31" y2="-1001.82" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="f56e7b27-9dfe-4fbf-aa5a-7873157ec00e" x1="2260.39" y1="-1006" x2="2391.32" y2="-1010.15" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="f4a18cb7-e9a1-46c3-a278-bb7efd048c7e" x1="2472.2" y1="-735.31" x2="2325.72" y2="-735.31" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="a32c397f-930e-403c-97ca-6b0c4b2859d6" x1="2283.92" y1="-833.53" x2="2402.68" y2="-638.59" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="e1c45199-c1be-449f-b6ad-c2fa340b55bf" x1="2634.95" y1="-1724.47" x2="2634.95" y2="-1627.4" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="aad89718-614b-43b3-acf9-7d02008415b1" x1="2688.98" y1="-868.72" x2="2664.46" y2="-777.24" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="b1ff810b-8cb1-4a6e-b482-d6ff792d54b9" x1="2631.27" y1="-633.34" x2="2582.44" y2="-681.04" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <lineargradient id="ecdaedc1-eaea-44b0-b7d1-cc8ad8ddd5be" x1="2311.74" y1="-633.39" x2="2360.56" y2="-681.1" xlink:href="#e17229d5-1d76-4666-83c8-7dd276dbd461"></lineargradient>
                                        <clippath id="f0370003-8147-40eb-94fb-7caf2381bf38" transform="translate(0 0)">
                                            <path d="M150.48,234.71c-6.52-2.11-9.46-.15-14.19-.22a3.9,3.9,0,0,0-4,3.71q-.47,28.6-.92,57.2a3.9,3.9,0,0,0,3.92,3.85c4.73.07,10.25,2.71,14.19.22,6.06-3.82,4.8-63.54,1-64.76Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="f1ac78af-a99c-4aa8-8c01-cba46ebfbb60" x1="2683.92" y1="-1407.35" x2="2680.77" y2="-1601.52" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5b5b5b"></stop>
                                            <stop offset="1"></stop>
                                        </lineargradient>
                                        <clippath id="a104ad88-8140-492a-85cd-bf8abdf21598" transform="translate(0 0)">
                                            <path d="M12.18,57.36c6.55-2,9.46,0,14.19,0a3.9,3.9,0,0,1,4,3.78v57.21a3.9,3.9,0,0,1-4,3.78c-4.73,0-10.29,2.54-14.19,0C6.18,118.21,8.41,58.51,12.18,57.36Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="b2fc487f-9be7-409b-96ac-1ea730e8c172" x1="2259.14" y1="-788.56" x2="2259.14" y2="-982.76" xlink:href="#f1ac78af-a99c-4aa8-8c01-cba46ebfbb60"></lineargradient>
                                        <clippath id="a51687f6-a15b-4255-bea2-aa9445e6bc78" transform="translate(0 0)">
                                            <path d="M12.09,234.71c6.52-2.11,9.46-.15,14.19-.22a3.9,3.9,0,0,1,4,3.71q.47,28.6.92,57.2a3.9,3.9,0,0,1-3.92,3.85c-4.73.07-10.25,2.71-14.19.22-6.06-3.82-4.8-63.54-1.05-64.76Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="a9e0869a-0646-47c6-b4d6-73f288fbdd77" x1="2259.05" y1="-1407.35" x2="2262.2" y2="-1601.52" xlink:href="#f1ac78af-a99c-4aa8-8c01-cba46ebfbb60"></lineargradient>
                                        <clippath id="a87ef1cc-c73c-42c8-adc7-4fb00c38a860" transform="translate(0 0)">
                                            <path d="M149.62,59.48c-6.55-2-9.46,0-14.19,0a3.9,3.9,0,0,0-4,3.78v57.21a3.9,3.9,0,0,0,4,3.78c4.73,0,10.29,2.54,14.19,0C155.62,120.33,153.39,60.64,149.62,59.48Z" style="fill:none;"></path>
                                        </clippath>
                                        <lineargradient id="fa41c4c7-aa9a-4fd4-b0c0-f0ed07f76927" x1="2681.15" y1="-795.97" x2="2681.15" y2="-990.17" xlink:href="#f1ac78af-a99c-4aa8-8c01-cba46ebfbb60"></lineargradient>
                                        <lineargradient id="be0f1040-1abb-4c8d-a453-77d5c3158292" x1="2472.22" y1="-675.29" x2="2472.23" y2="-1767.11" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#ffa406"></stop>
                                            <stop offset="0.34" stop-color="#ffcd60"></stop>
                                            <stop offset="0.64" stop-color="#f2a600"></stop>
                                            <stop offset="0.98" stop-color="#ffaf2c"></stop>
                                            <stop offset="1" stop-color="#ffc971"></stop>
                                        </lineargradient>
                                        <mask id="a111c8b0-9a99-4af1-9c45-3edcd0d3d710" x="17.96" y="304.66" width="32.35" height="29.59" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="fb9afc4d-34ed-4c72-9f04-c1a0ebb0c92b" data-name="id4">
                                                <rect x="17.96" y="304.66" width="32.35" height="29.59" style="fill:url(#e17229d5-1d76-4666-83c8-7dd276dbd461);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="b26d7c60-085f-45e0-9dec-7ddf1d54e65d" x1="2305.69" y1="-1705.07" x2="2281.95" y2="-1655.71" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fff"></stop>
                                            <stop offset="1" stop-color="#1f1b20"></stop>
                                        </lineargradient>
                                        <mask id="afbaef2d-7030-4f2b-8bfb-8ae49d7380ad" x="100.61" y="14.96" width="35.87" height="64.7" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f3ca355c-21a1-4478-9a3d-c78c1793dfa9" data-name="id6">
                                                <rect x="100.61" y="14.96" width="35.87" height="64.7" style="fill:url(#e05f483a-6b82-4570-b002-23b970d780ad);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="eeb379c2-3861-4aee-a9f2-e127ac369da9" x1="2574.6" y1="-706.71" x2="2666.26" y2="-867.76" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#fae16c"></stop>
                                            <stop offset="1" stop-color="#e9af2d"></stop>
                                        </lineargradient>
                                        <mask id="a029674c-e0bf-4228-8931-5562e2f4b2ae" x="16.4" y="51.45" width="8.31" height="52.27" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f3b21f14-cf58-46a9-8cc9-d5614679239c" data-name="id8">
                                                <rect x="16.4" y="51.45" width="8.31" height="52.27" style="fill:url(#b6beceb8-8141-4f27-9637-91688ed366bc);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="a698f0cc-a919-448b-92af-97f71b5c9e0c" x1="2254.91" y1="-816.07" x2="2276.16" y2="-946.18" xlink:href="#eeb379c2-3861-4aee-a9f2-e127ac369da9"></lineargradient>
                                        <mask id="a204a4cd-808d-49bf-9586-c9df4c911a1d" x="21.52" y="4.74" width="60.23" height="83.51" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="aaad61b6-3326-403d-979a-1f962ec1e87a" data-name="id10">
                                                <rect x="21.52" y="4.74" width="60.23" height="83.51" style="fill:url(#af58323e-5310-4e4c-acd9-bf5726a72288);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="a3563497-2caa-4f95-9254-ca8d8ed7e467" x="21.4" y="4.61" width="60.48" height="83.79" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a211840d-4d5d-402b-9ecb-9c00c3565ee3" data-name="id12">
                                                <rect x="21.39" y="4.61" width="60.48" height="83.79" style="fill:url(#f4a18cb7-e9a1-46c3-a278-bb7efd048c7e);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="af4c80ab-6f74-43a3-9fd8-63e1ff9ba90a" x1="2283.81" y1="-1672.66" x2="2667.18" y2="-1672.11" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5e5e5e"></stop>
                                            <stop offset="0.24" stop-color="#211f1d"></stop>
                                            <stop offset="0.7" stop-color="#333"></stop>
                                            <stop offset="0.76" stop-color="#535353"></stop>
                                            <stop offset="1" stop-color="#333"></stop>
                                        </lineargradient>
                                        <mask id="b0b5a580-de7d-492b-b185-14629a1e355b" x="25.99" y="14.68" width="36.44" height="65.27" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b01c7f05-333f-410b-8d92-6372a009d412" data-name="id14">
                                                <rect x="25.99" y="14.68" width="36.44" height="65.27" style="fill:url(#a32c397f-930e-403c-97ca-6b0c4b2859d6);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="e7ff88e4-885d-4c00-9fd9-420c638573a7" x1="2369.01" y1="-706.72" x2="2277.36" y2="-867.77" xlink:href="#eeb379c2-3861-4aee-a9f2-e127ac369da9"></lineargradient>
                                        <mask id="b05eb140-a33b-4209-9dcb-63e979a2a714" x="112.21" y="304.99" width="31.79" height="29.03" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b41241ca-050f-4788-8135-06d6b1595fa0" data-name="id16">
                                                <rect x="112.21" y="304.99" width="31.78" height="29.02" style="fill:url(#e1c45199-c1be-449f-b6ad-c2fa340b55bf);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="abc15173-12dc-44df-80fa-8c68de723477" x1="2636.12" y1="-1705.21" x2="2659.87" y2="-1655.86" xlink:href="#b26d7c60-085f-45e0-9dec-7ddf1d54e65d"></lineargradient>
                                        <mask id="a6c55b45-8dfb-4bcd-b9e2-0b3c475bc258" x="137.52" y="51.49" width="8.31" height="52.27" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="af3b683b-989c-459e-af53-d063d413138b" data-name="id18">
                                                <rect x="137.52" y="51.49" width="8.31" height="52.27" style="fill:url(#aad89718-614b-43b3-acf9-7d02008415b1);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="b00c445f-3c57-4dcb-aaf6-0285501c74c0" x1="2686.89" y1="-816.21" x2="2665.65" y2="-946.33" xlink:href="#eeb379c2-3861-4aee-a9f2-e127ac369da9"></lineargradient>
                                        <mask id="be528868-7b1c-4bc4-b8db-88e1dced1d7e" x="80.96" y="4.74" width="58.01" height="58.5" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="af7de330-8245-46d7-9522-c79e976846be" data-name="id20">
                                                <rect x="80.96" y="4.74" width="58.01" height="58.5" style="fill:url(#b1ff810b-8cb1-4a6e-b482-d6ff792d54b9);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="a1dc7f7c-32f0-4664-b566-1c47b7b10e43" x="23.61" y="4.75" width="58.01" height="58.5" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b895f5d6-1595-4293-8ce5-e3428f0b3e5b" data-name="id22">
                                                <rect x="23.6" y="4.76" width="58.01" height="58.5" style="fill:url(#ecdaedc1-eaea-44b0-b7d1-cc8ad8ddd5be);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="e40c5f33-e046-4fda-b96f-56a5ff086649" x1="2710.73" y1="-1164.26" x2="2710.73" y2="-1220.91" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#e7ad17"></stop>
                                            <stop offset="0.34" stop-color="#e7e75a"></stop>
                                            <stop offset="0.64" stop-color="#dfa810"></stop>
                                            <stop offset="0.98" stop-color="#e7c52e"></stop>
                                            <stop offset="1" stop-color="#e7e76e"></stop>
                                        </lineargradient>
                                        <mask id="bcdbbb90-a393-4b95-81d1-a7aee87f945f" x="150.4" y="170.8" width="1.45" height="10.78" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f42a67b3-a2f8-4e87-b058-d6db9ee08bb0" data-name="id24">
                                                <rect x="150.4" y="170.8" width="1.45" height="10.78" style="fill:url(#bbfe1608-7d31-448f-adf6-e9934e99c902);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="e8b2f98d-6798-41d5-a428-760a4e9e6257" x="147.04" y="119.48" width="10.17" height="7.7" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f928487b-cc0a-4a3b-97d9-559ba0f0536e" data-name="id26">
                                                <rect x="147.04" y="119.48" width="10.17" height="7.7" style="fill:url(#a1fb0fe3-630d-4119-9fa2-32e0d5b6e326);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="bcb916e3-1959-4e89-ba8d-a2a697a5bb4b" x1="2706.48" y1="-1432.62" x2="2706.48" y2="-1489.27" xlink:href="#e40c5f33-e046-4fda-b96f-56a5ff086649"></lineargradient>
                                        <mask id="ffbb9fa7-d7da-479c-bb5d-9ab67a38e362" x="149.19" y="247.65" width="1.45" height="10.78" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="bfd00306-cc91-46f9-a65d-cc96804edb2e" data-name="id28">
                                                <rect x="149.18" y="247.66" width="1.45" height="10.78" style="fill:url(#b99e6cbe-c607-4d3f-9666-a78664e8b433);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="eb43ef1c-e2b5-4866-9ffb-839ef3457b2e" x="129.78" y="98.4" width="14.31" height="104.2" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="effd28e0-cfe1-4982-a72c-d258f2256096" data-name="id30">
                                                <rect x="129.78" y="98.4" width="14.31" height="104.2" style="fill:url(#b61fc3ee-cf63-4793-8de7-1d29d335cf24);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="ae9170d4-3ff2-47d6-9ba4-9fdd17175d94" x="128.31" y="97.88" width="15.6" height="191.26" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b596e58c-dae0-41c8-af64-2d458d2f275d" data-name="id32">
                                                <rect x="128.31" y="97.88" width="15.59" height="191.26" style="fill:url(#bb2bf3df-dd06-45ac-aee3-470e9cb962ef);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="a206fb28-a9ac-4efd-9c0b-a9828fbde9bf" x1="2654.71" y1="-1600.38" x2="2673.59" y2="-894.3" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5c5c5c"></stop>
                                            <stop offset="0.08" stop-color="#fefefe"></stop>
                                            <stop offset="0.41" stop-color="#c0c1c1"></stop>
                                            <stop offset="0.51" stop-color="#fefefe"></stop>
                                            <stop offset="0.8" stop-color="#d9d9db"></stop>
                                            <stop offset="0.93" stop-color="#fefefe"></stop>
                                            <stop offset="1" stop-color="#b3b3b3"></stop>
                                        </lineargradient>
                                        <mask id="befbcec7-e6f7-4544-b19e-516539f943ff" x="14.7" y="201.19" width="32.21" height="130.73" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="bd2838a4-8adc-4208-9cfa-5a83ed71dc5b" data-name="id34">
                                                <rect x="14.7" y="201.19" width="32.21" height="130.73" style="fill:url(#fba42428-606e-4486-ab4a-5127da5483c1);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="af6666d1-a490-49de-9841-f5c9ad7a4be1" x="25.91" y="321.62" width="24.45" height="12.66" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="ab8ac525-ec3e-48ab-b68d-2c51c928eea1" data-name="id36">
                                                <rect x="25.91" y="321.62" width="24.45" height="12.66" style="fill:url(#bf700ed3-367c-44f1-ad00-76a14d34899d);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="b6a3223b-d843-43d7-a569-20db22183d6c" x="111.96" y="321.7" width="24.45" height="12.66" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="fa41c5b4-43d9-400c-8e73-03360387d050" data-name="id38">
                                                <rect x="111.96" y="321.7" width="24.45" height="12.66" style="fill:url(#bbc87909-512f-446e-a9e6-557472f7212d);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="fd94ef7c-7e76-4b97-83d7-13763d10c6cb" x1="2474.57" y1="-1277.87" x2="2474.57" y2="-1362" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#0b0a08"></stop>
                                            <stop offset="0.37" stop-color="#292929"></stop>
                                            <stop offset="1" stop-color="#1d1d1d"></stop>
                                        </lineargradient>
                                        <clippath id="aae47d52-61ab-4824-b535-579b3bcb5fb3" transform="translate(0 0)">
                                            <path d="M33.17,20.29c-5.89,3.94-10.08,8.1-11.94,13.56-1.66,4.89-1.78,12.49-1.06,16.57.25,1.4.67,1.56,1.12,1.62,1.14.13,1-1.09,1.36-2.21,2.83-10,3.27-17.32,12-27.35-.09-.94-.2-1.36-.29-1.9S33.75,19.9,33.17,20.29Z" style="fill:none;"></path>
                                        </clippath>
                                        <mask id="aeab539d-eb3b-4573-a770-54265ababb95" x="19.75" y="20.05" width="14.93" height="32" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="bcf65e24-252d-40c1-8e0f-30df96cbb076" data-name="id45">
                                                <rect x="19.75" y="20.05" width="14.93" height="32" style="fill:url(#adddd129-70af-449f-9037-391078f3457d);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="fa9df6b0-c879-4d4d-9674-29899fc9e3d0" x="16.69" y="29.59" width="17.63" height="11.39" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a39efe9c-f167-45e1-b5ab-7d9ffbc5b905" data-name="id48">
                                                <rect x="16.69" y="29.59" width="17.63" height="11.39" style="fill:url(#fb792827-dc88-495d-9a0b-845dab9b4035);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <clippath id="b4ff4e81-72ab-4e2f-b192-9812b09e115d" transform="translate(0 0)">
                                            <path d="M129.43,20.29c5.89,3.94,10.09,8.1,11.94,13.56,1.66,4.89,1.79,12.49,1.06,16.57-.25,1.4-.66,1.56-1.12,1.62-1.13.13-1-1.09-1.36-2.21-2.83-10-3.27-17.32-12-27.35.09-.94.2-1.36.29-1.9s.64-.68,1.22-.29Z" style="fill:none;"></path>
                                        </clippath>
                                        <mask id="e0e039cc-f243-4a69-86ce-3717981e46c0" x="127.92" y="20.05" width="14.93" height="32" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="abaac146-535e-4510-9201-8029be021ecb" data-name="id51">
                                                <rect x="127.92" y="20.05" width="14.93" height="32" style="fill:url(#f0d0903b-f0f1-4707-96a9-8879a8b13671);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="b5b714b5-99f5-48ca-a1d3-748892676f65" x="128.29" y="29.59" width="17.63" height="11.39" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a2f736f3-a859-4af6-98d1-0caf81405b5c" data-name="id54">
                                                <rect x="128.29" y="29.59" width="17.63" height="11.39" style="fill:url(#baa7ffd7-d031-46b1-a5f3-a30cd00eee1f);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="a4672ccb-1c6e-4e06-9c82-6a1437e6a42f" x1="2479.58" y1="-622.46" x2="2390.42" y2="-575.61" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5c5c5c"></stop>
                                            <stop offset="0.08" stop-color="#cececf"></stop>
                                            <stop offset="0.41" stop-color="#656565"></stop>
                                            <stop offset="0.51" stop-color="#b4b5b5"></stop>
                                            <stop offset="0.8" stop-color="#d9d9db"></stop>
                                            <stop offset="0.93" stop-color="#fefefe"></stop>
                                            <stop offset="1" stop-color="#b3b3b3"></stop>
                                        </lineargradient>
                                        <lineargradient id="f5484a9d-1d53-4985-8ce6-83f651957ceb" x1="2460.17" y1="-1144.05" x2="2530.32" y2="-1144.04" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#1d1d1d"></stop>
                                            <stop offset="0.14" stop-color="#434344"></stop>
                                            <stop offset="0.39" stop-color="#555"></stop>
                                            <stop offset="0.52" stop-color="#353637"></stop>
                                            <stop offset="1" stop-color="#1e1e20"></stop>
                                        </lineargradient>
                                        <lineargradient id="b1f8c64a-0a9b-4774-8e20-a2b39eb8cb01" x1="2492.46" y1="-1196.74" x2="2457.62" y2="-1196.74" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#383838"></stop>
                                            <stop offset="0.21" stop-color="#636363"></stop>
                                            <stop offset="0.3" stop-color="#494949"></stop>
                                            <stop offset="0.43" stop-color="#363636"></stop>
                                            <stop offset="1" stop-color="#323232"></stop>
                                        </lineargradient>
                                        <mask id="e84823b2-e0d0-480d-a66f-5f95a1e953fb" x="76.77" y="187.24" width="10.81" height="5.3" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="ba055402-2a06-402f-9b50-9661b37b7298" data-name="id56">
                                                <rect x="76.77" y="187.24" width="10.81" height="5.3" style="fill:url(#f10bb56d-b582-418b-bdfe-46061c15282f);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="a3ed7789-184c-42b5-8355-aa1a2e69fa1c" x="76.77" y="164.64" width="1.48" height="27.9" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="baf4ae3d-b560-40ea-821f-f8da04092ad5" data-name="id58">
                                                <rect x="76.77" y="164.64" width="1.48" height="27.9" style="fill:url(#a70271a1-36bd-40b3-aeee-31ea73c869d2);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="be183c89-2bd3-40a4-8668-a72d51558fd3" x="85.68" y="164.64" width="1.89" height="27.9" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b491b6c4-73b3-4f80-ba2e-36d1fdb88eaf" data-name="id60">
                                                <rect x="85.68" y="164.64" width="1.89" height="27.9" style="fill:url(#e48812ca-3f9a-4e8a-a346-faa18ff47656);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="a71ec249-e39b-40ee-a1c1-7d5e9d4024d6" x="28.44" y="107.59" width="104.19" height="24.05" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="b631e399-e8d8-4e7b-8628-d0353d4a1f17" data-name="id62">
                                                <rect x="28.43" y="107.59" width="104.19" height="24.05" style="fill:url(#f31092fd-b921-4f65-812b-efaad37dfc9f);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="fcb5e314-e531-43bc-a562-124b6699c097" x1="2476.83" y1="-932.15" x2="2476.83" y2="-876.05" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#212023"></stop>
                                            <stop offset="1" stop-color="#312e34"></stop>
                                        </lineargradient>
                                        <lineargradient id="a47a4d74-7720-4005-9b69-ed5ff1a8338e" x1="2477.06" y1="-958.46" x2="2477.07" y2="-889.79" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#4c4c4c"></stop>
                                            <stop offset="1" stop-color="#212023"></stop>
                                        </lineargradient>
                                        <mask id="a03e17f6-ea34-4041-9122-afadb7d04599" x="28.25" y="78.23" width="106.9" height="55.26" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="e6607a73-9db8-4507-8075-843f5bb265e8" data-name="id64">
                                                <rect x="28.25" y="78.24" width="106.9" height="55.26" style="fill:url(#adcdde72-e0a2-4248-8ffe-55bf6a210719);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="ffd39e70-17dc-468a-b7b4-86aa8997ce99" x1="2303.68" y1="-864.76" x2="2345" y2="-850.21" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.09)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#171614"></stop>
                                            <stop offset="1" stop-color="#575757"></stop>
                                        </lineargradient>
                                        <lineargradient id="ad55d23e-5685-4ab1-9cf9-d6499d1735b6" x1="2347.38" y1="-860.55" x2="2522.45" y2="-852.24" xlink:href="#ffd39e70-17dc-468a-b7b4-86aa8997ce99"></lineargradient>
                                        <lineargradient id="f3f487e0-2576-479e-bded-1f6047db3de4" x1="2631.54" y1="-857.64" x2="2591.34" y2="-840.23" xlink:href="#ffd39e70-17dc-468a-b7b4-86aa8997ce99"></lineargradient>
                                        <lineargradient id="b59e4952-0f28-4c9e-92e6-b34fafd82953" x1="2588.24" y1="-850.37" x2="2414.18" y2="-829.8" xlink:href="#ffd39e70-17dc-468a-b7b4-86aa8997ce99"></lineargradient>
                                        <mask id="b3c9d12a-211d-4f06-9873-181bbf5d5d38" x="40.4" y="287.6" width="80.94" height="15.2" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="bc36c309-7dd2-4e26-a71c-4ce0fd0e0443" data-name="id66">
                                                <rect x="40.4" y="287.6" width="80.94" height="15.2" style="fill:url(#f493620f-b254-4d00-802e-17fd67686eec);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="a1bd8076-a93b-4de2-86a4-f8a5377193ac" x1="2351.66" y1="-1603.67" x2="2621.94" y2="-1603.67" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#303030"></stop>
                                            <stop offset="0.43" stop-color="#575757"></stop>
                                            <stop offset="1" stop-color="#606060"></stop>
                                        </lineargradient>
                                        <mask id="fdbd335d-468e-4d4b-b32a-f8226368362b" x="115.4" y="201.19" width="32.21" height="130.73" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="be393524-14c1-40e0-a76c-b035652196d5" data-name="id68">
                                                <rect x="115.4" y="201.19" width="32.21" height="130.73" style="fill:url(#afc85f7c-ab8c-4e92-bec9-c12344a813e3);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="f4e9982e-ca1c-4c01-96e9-3a022e684dcf" x1="2233.24" y1="-1164.26" x2="2233.24" y2="-1220.91" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#e7ad17"></stop>
                                            <stop offset="0.34" stop-color="#e7e65b"></stop>
                                            <stop offset="0.64" stop-color="#e7cb26"></stop>
                                            <stop offset="0.98" stop-color="#e7c52e"></stop>
                                            <stop offset="1" stop-color="#e7e76e"></stop>
                                        </lineargradient>
                                        <mask id="fd0cc9d0-3a3e-4183-a2fd-d2dd0c3b6ee7" x="11" y="170.8" width="1.45" height="10.78" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a12db8cb-9f69-4096-817c-60d5eb5fed82" data-name="id70">
                                                <rect x="11" y="170.8" width="1.45" height="10.78" style="fill:url(#bb73b25f-e6dd-4da0-9673-25adb417e4c2);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="a05e3d64-cbaa-48ff-b18f-8ac88c9a1078" x="5.65" y="119.48" width="10.17" height="7.7" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a7160b33-9a77-4f81-9119-f0a930412be8" data-name="id72">
                                                <rect x="5.64" y="119.48" width="10.17" height="7.7" style="fill:url(#e6a32a8b-ccb2-4c77-84ad-61ab19c44bc4);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="ff7f6303-9bc9-468f-82bb-d968278fe797" x1="2237.49" y1="-1432.62" x2="2237.49" y2="-1489.27" xlink:href="#e40c5f33-e046-4fda-b96f-56a5ff086649"></lineargradient>
                                        <mask id="ac73dfb0-d698-40af-b70d-48c81ed4a074" x="12.22" y="247.65" width="1.45" height="10.78" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f86535ee-a86b-4d21-a966-abd762d96b67" data-name="id74">
                                                <rect x="12.21" y="247.66" width="1.45" height="10.78" style="fill:url(#a423d35c-59af-4fea-b59d-5c468f85e87a);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="b843c766-88f2-4a27-a21e-fe63f726db63" x="18.77" y="98.4" width="14.31" height="104.2" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="ab67cbfe-7314-4402-9c34-30b7b9fefa12" data-name="id76">
                                                <rect x="18.77" y="98.4" width="14.31" height="104.2" style="fill:url(#aa4967f9-cb02-4cb7-81de-52cf6c8bdea4);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <mask id="afe67841-348f-4dff-b375-760da5f121f0" x="18.94" y="97.88" width="15.6" height="191.26" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="be10293b-8b9a-4f5e-b90c-f646ca8f951f" data-name="id78">
                                                <rect x="18.95" y="97.88" width="15.59" height="191.26" style="fill:url(#ec05a901-b934-44d1-b880-4a15db33ef45);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="e07498f2-43cf-4337-a332-c2f18d66c825" x1="2289.26" y1="-1600.38" x2="2270.38" y2="-894.3" xlink:href="#a206fb28-a9ac-4efd-9c0b-a9828fbde9bf"></lineargradient>
                                        <lineargradient id="a448ea28-df03-40c2-873b-55e38ea9d161" x1="2383.91" y1="-1198.37" x2="2384.58" y2="-1245.48" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#181818"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="0.79" stop-color="#565656"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="fbafb08c-88ff-42b9-baee-7cd50e77add1" x1="2327.04" y1="-1136.43" x2="2352.45" y2="-1136.43" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#161616"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="afaa0bac-3d7f-4652-852a-a617868167bd" x1="2418.41" y1="-1136.43" x2="2443.81" y2="-1136.43" xlink:href="#fbafb08c-88ff-42b9-baee-7cd50e77add1"></lineargradient>
                                        <lineargradient id="e5ba3bd0-e61a-4cb3-af7b-fba851a46fb0" x1="2357.8" y1="-1121.35" x2="2418.21" y2="-1121.35" xlink:href="#fbafb08c-88ff-42b9-baee-7cd50e77add1"></lineargradient>
                                        <lineargradient id="ae70a000-9341-4504-8401-9e1ffa9c9e3d" x1="2357.59" y1="-1166.62" x2="2418" y2="-1166.62" xlink:href="#fbafb08c-88ff-42b9-baee-7cd50e77add1"></lineargradient>
                                        <lineargradient id="b348c610-5f97-40b8-9192-cfcc61fb1437" x1="2383.12" y1="-1203.07" x2="2383.55" y2="-1234.23" xlink:href="#a448ea28-df03-40c2-873b-55e38ea9d161"></lineargradient>
                                        <lineargradient id="b8b1e40f-d615-4468-bdff-d6bbc4e367d4" x1="2385.49" y1="-1251.09" x2="2385.82" y2="-1272.97" xlink:href="#a448ea28-df03-40c2-873b-55e38ea9d161"></lineargradient>
                                        <lineargradient id="ac0df9d4-fe63-43d8-95ba-e0e79b1d62f0" x1="2340.93" y1="-1085.45" x2="2426.53" y2="-1083.76" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#181818"></stop>
                                            <stop offset="0.48" stop-color="#383838"></stop>
                                            <stop offset="0.67" stop-color="#3c3c3c"></stop>
                                            <stop offset="0.79" stop-color="#565656"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="ab24a5ed-c21d-48ec-9e23-7bbc0bdcf0d3" x1="2328.73" y1="-1237.1" x2="2393.32" y2="-1237.1" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#292929"></stop>
                                            <stop offset="0.43" stop-color="#383838"></stop>
                                            <stop offset="1" stop-color="#3f3f3f"></stop>
                                        </lineargradient>
                                        <lineargradient id="be71ab6e-87b8-4651-916e-f7029bd45594" x1="2566.84" y1="-1198.37" x2="2567.51" y2="-1245.48" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#494949"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="0.79" stop-color="#888"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="bc2e76a6-359c-4865-bc43-02196d4692ae" x1="2509.97" y1="-1136.43" x2="2535.38" y2="-1136.43" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#464646"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="f996fe5d-21c8-4ba2-a1f9-04018f4ccf40" x1="2601.34" y1="-1136.43" x2="2626.74" y2="-1136.43" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="aeb2691c-0107-4be8-a4ed-cdebd3d3974d" x1="2540.73" y1="-1121.35" x2="2601.14" y2="-1121.35" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="a848a3c3-091e-42cb-bcdb-886fd7a95f04" x1="2540.52" y1="-1166.62" x2="2600.93" y2="-1166.62" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="a63d3162-89dd-41e2-a02d-fd41c815ab4d" x1="2566.04" y1="-1203.07" x2="2566.48" y2="-1234.23" xlink:href="#be71ab6e-87b8-4651-916e-f7029bd45594"></lineargradient>
                                        <lineargradient id="f170c377-52a3-44ca-984c-35dc73d49e59" x1="2568.41" y1="-1251.09" x2="2568.74" y2="-1272.97" xlink:href="#be71ab6e-87b8-4651-916e-f7029bd45594"></lineargradient>
                                        <lineargradient id="e20ab66b-78bf-429d-9d6b-3adab1a8f40d" x1="2523.86" y1="-1085.45" x2="2609.46" y2="-1083.76" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#494949"></stop>
                                            <stop offset="0.48" stop-color="#696969"></stop>
                                            <stop offset="0.67" stop-color="#6d6d6d"></stop>
                                            <stop offset="0.79" stop-color="#888"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="ac4a6383-9347-46d0-938d-f3b6bcd9324d" x1="2511.66" y1="-1237.1" x2="2576.25" y2="-1237.1" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#5a5a5a"></stop>
                                            <stop offset="0.43" stop-color="#696969"></stop>
                                            <stop offset="1" stop-color="#717171"></stop>
                                        </lineargradient>
                                        <lineargradient id="b2a141a8-fe2e-48c2-b690-9b00757b8ac6" x1="2342.54" y1="-1451" x2="2343.21" y2="-1498.1" xlink:href="#be71ab6e-87b8-4651-916e-f7029bd45594"></lineargradient>
                                        <lineargradient id="aa2b34f0-662b-49e6-84f8-d74c3689f451" x1="2285.67" y1="-1389.06" x2="2311.08" y2="-1389.05" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="e71ae7f3-3e79-4383-b583-fdec14f8f0af" x1="2377.03" y1="-1389.06" x2="2402.44" y2="-1389.05" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="f941bdba-ba23-4c0a-a3b9-2b781f9bb388" x1="2316.43" y1="-1373.98" x2="2376.84" y2="-1373.98" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="b4ecdeba-5e6f-4415-a48d-ba614784a9f0" x1="2316.22" y1="-1419.23" x2="2376.63" y2="-1419.23" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="a61c36c2-b582-4d35-b65b-c448023339e4" x1="2341.73" y1="-1455.69" x2="2342.17" y2="-1486.85" xlink:href="#be71ab6e-87b8-4651-916e-f7029bd45594"></lineargradient>
                                        <lineargradient id="b7728ee9-9a15-4f86-a74e-d4338e5ff6ec" x1="2344.1" y1="-1503.71" x2="2344.44" y2="-1525.58" xlink:href="#be71ab6e-87b8-4651-916e-f7029bd45594"></lineargradient>
                                        <lineargradient id="a4dd6ea7-1f45-4e28-be72-8755ab704685" x1="2299.56" y1="-1338.08" x2="2385.16" y2="-1336.39" xlink:href="#e20ab66b-78bf-429d-9d6b-3adab1a8f40d"></lineargradient>
                                        <lineargradient id="a05ec176-214d-4dca-9678-04930971e49c" x1="2287.36" y1="-1489.72" x2="2351.95" y2="-1489.71" xlink:href="#ac4a6383-9347-46d0-938d-f3b6bcd9324d"></lineargradient>
                                        <lineargradient id="bce7593f-ed8b-4fb9-90a7-7c4c105bae5b" x1="2469.35" y1="-1451" x2="2470.02" y2="-1498.1" xlink:href="#be71ab6e-87b8-4651-916e-f7029bd45594"></lineargradient>
                                        <lineargradient id="a95cd6d0-71a8-4591-a065-7a533c96646a" x1="2412.48" y1="-1389.06" x2="2437.89" y2="-1389.05" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="ecd4ee23-4df6-45b5-b860-8bb53f05e236" x1="2503.85" y1="-1389.06" x2="2529.25" y2="-1389.05" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="be439770-2a1e-4d1a-91a1-75ebc07ebb09" x1="2443.24" y1="-1373.98" x2="2503.65" y2="-1373.98" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="a1de8971-aaf2-442c-a744-4ec326c83684" x1="2443.03" y1="-1419.23" x2="2503.44" y2="-1419.23" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="ba043c57-a6cf-40a8-a690-c2d5c27e53d4" x1="2468.56" y1="-1455.69" x2="2468.99" y2="-1486.85" xlink:href="#be71ab6e-87b8-4651-916e-f7029bd45594"></lineargradient>
                                        <lineargradient id="fed54bb9-fef0-4ef5-8415-a31c5120ed2b" x1="2470.93" y1="-1503.72" x2="2471.26" y2="-1525.59" xlink:href="#be71ab6e-87b8-4651-916e-f7029bd45594"></lineargradient>
                                        <lineargradient id="eae15aab-3f25-461b-8cfd-90c45e5a8a0f" x1="2426.37" y1="-1338.08" x2="2511.97" y2="-1336.39" xlink:href="#e20ab66b-78bf-429d-9d6b-3adab1a8f40d"></lineargradient>
                                        <lineargradient id="b354ba3c-773c-4989-91b1-374eab9b2035" x1="2414.17" y1="-1489.72" x2="2478.76" y2="-1489.71" xlink:href="#ac4a6383-9347-46d0-938d-f3b6bcd9324d"></lineargradient>
                                        <lineargradient id="bab83905-ed43-4dbb-85c7-ace1bc9c40c6" x1="2596.17" y1="-1451" x2="2596.84" y2="-1498.1" xlink:href="#be71ab6e-87b8-4651-916e-f7029bd45594"></lineargradient>
                                        <lineargradient id="a119e4dc-516c-4d08-9bc5-cd59ddb79afa" x1="2539.3" y1="-1389.06" x2="2564.71" y2="-1389.05" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="a2d60ce5-5c1b-4d6c-a769-0e9030293994" x1="2630.66" y1="-1389.06" x2="2656.07" y2="-1389.05" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="b4d7644f-a6ef-4b3f-bbf0-a82674f4c429" x1="2570.05" y1="-1373.98" x2="2630.47" y2="-1373.98" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="f599565e-3490-4e71-8db1-530fccc585f5" x1="2569.84" y1="-1419.23" x2="2630.25" y2="-1419.23" xlink:href="#bc2e76a6-359c-4865-bc43-02196d4692ae"></lineargradient>
                                        <lineargradient id="b700e625-7c40-421f-9aaa-6d6633e03ec5" x1="2595.36" y1="-1455.69" x2="2595.8" y2="-1486.85" xlink:href="#be71ab6e-87b8-4651-916e-f7029bd45594"></lineargradient>
                                        <lineargradient id="ba189870-b4af-4515-b3eb-0375a090ac34" x1="2597.74" y1="-1503.72" x2="2598.07" y2="-1525.59" xlink:href="#be71ab6e-87b8-4651-916e-f7029bd45594"></lineargradient>
                                        <lineargradient id="b0c4f286-41bd-45bd-929e-b72ef584c7d9" x1="2553.18" y1="-1338.08" x2="2638.79" y2="-1336.39" xlink:href="#e20ab66b-78bf-429d-9d6b-3adab1a8f40d"></lineargradient>
                                        <lineargradient id="a4638a5b-827b-4923-a6d7-83debde66c1e" x1="2540.99" y1="-1489.72" x2="2605.58" y2="-1489.71" xlink:href="#ac4a6383-9347-46d0-938d-f3b6bcd9324d"></lineargradient>
                                        <mask id="e263821a-8672-4d9b-9fdd-785ce09359e6" x="28.44" y="107.21" width="104.24" height="24.05" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f246c37c-1275-47f3-a3b3-bb9008dba5cd" data-name="id80">
                                                <rect x="28.43" y="107.22" width="104.24" height="24.05" style="fill:url(#b2bf6fb6-4e95-4e62-819f-d0bf820eb40c);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="a42881b7-182a-49e4-81b8-09bce4043e52" x1="2328.42" y1="-1046.2" x2="2365.79" y2="-1046.2" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#171717"></stop>
                                            <stop offset="0.43" stop-color="#1d1d1f"></stop>
                                            <stop offset="0.76" stop-color="#444545"></stop>
                                            <stop offset="1" stop-color="#242424"></stop>
                                        </lineargradient>
                                        <lineargradient id="f0ddf2e0-bfb0-46cb-b17e-e37a47ff82b1" x1="2353.74" y1="-1046.96" x2="2402.78" y2="-1046.96" xlink:href="#a42881b7-182a-49e4-81b8-09bce4043e52"></lineargradient>
                                        <mask id="a3cb9b7c-fd28-4bef-9b57-13b74df85e6d" x="41.61" y="112.61" width="27.26" height="20.44" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="f1463178-7a65-4f79-9958-3f6d61b4ebf5" data-name="id82">
                                                <rect x="41.6" y="112.61" width="27.25" height="20.44" style="fill:url(#ee95cd89-cc24-4d5f-a586-1396e273065b);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="fcdda4a5-4fb6-46e2-8761-f918f6d291d7" x1="2332.94" y1="-1001.82" x2="2427.96" y2="-1001.82" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#242424"></stop>
                                            <stop offset="0.43" stop-color="#323232"></stop>
                                            <stop offset="0.76" stop-color="#5c5c5c"></stop>
                                            <stop offset="1" stop-color="#292929"></stop>
                                        </lineargradient>
                                        <mask id="aafa959a-726f-4674-88f1-dd2035500637" x="46.65" y="118.15" width="3.4" height="13.51" maskUnits="userSpaceOnUse">
                                            <g transform="translate(0 0)">
                                            <g id="a328cbd5-beb2-4581-862e-74c8d4506304" data-name="id84">
                                                <rect x="46.65" y="118.15" width="3.4" height="13.51" style="fill:url(#f56e7b27-9dfe-4fbf-aa5a-7873157ec00e);"></rect>
                                            </g>
                                            </g>
                                        </mask>
                                        <lineargradient id="ac92e2c7-5714-4c15-b4f3-ea0f4107754d" x1="2373.35" y1="-1085.44" x2="2398.42" y2="-1032.52" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#292929"></stop>
                                            <stop offset="0.43" stop-color="#373737"></stop>
                                            <stop offset="0.76" stop-color="gray"></stop>
                                            <stop offset="1" stop-color="#292929"></stop>
                                        </lineargradient>
                                        <lineargradient id="a4cd0049-ed23-496b-b50c-0e2d7da51e1c" x1="2337.42" y1="-1070.88" x2="2425.31" y2="-1070.88" xlink:href="#a42881b7-182a-49e4-81b8-09bce4043e52"></lineargradient>
                                        <lineargradient id="acc82570-d643-460b-826f-634f43f49173" x1="2382.07" y1="-1073.97" x2="2383.11" y2="-1065.94" gradientTransform="matrix(0.29, 0, 0, -0.29, -626.54, -164.08)" gradientUnits="userSpaceOnUse">
                                            <stop offset="0" stop-color="#8b8b8a"></stop>
                                            <stop offset="1" stop-color="#fefefe"></stop>
                                        </lineargradient>
                                        </defs>
                                        <g id="a681a010-4400-4554-b573-50a6119bef46" data-name="Слой_155">
                                        <g id="abf266fd-7eaf-4d10-b792-7cdc9fa0dd8d" data-name=" 1901133984816">
                                            <path d="M150.48,234.71c-6.52-2.11-9.46-.15-14.19-.22a3.9,3.9,0,0,0-4,3.71q-.47,28.6-.92,57.2a3.9,3.9,0,0,0,3.92,3.85c4.73.07,10.25,2.71,14.19.22,6.06-3.82,4.8-63.54,1-64.76Z" transform="translate(0 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                            <g style="clip-path:url(#f0370003-8147-40eb-94fb-7caf2381bf38);">
                                            <path id="a55342cd-7e0b-479c-9379-5f421fb3beaa" data-name="1" d="M143.25,263.92a7.45,7.45,0,0,0,2-1.26v3.94c-.4.3-.83.55-1.23.89a38.35,38.35,0,0,1-3.91,3.16,6.06,6.06,0,0,1-1.4-1.15c-1-.88-.61-1.08-.57-3.43v-1.23c.74.53,1.82,1.83,2.74,1.57.24-.72.2-.39-.26-.88l-2.46-2,.06-3.72C138.85,260.05,142.33,263.43,143.25,263.92Zm-12.35-28.7,2.54,0-.05,2.06a4.84,4.84,0,0,1-1.31-.94l-1.18-1.16Zm1.5,64.16-2.73,0,.07-3c.79.35.63.47,1.23,1.05a5.6,5.6,0,0,0,1.41,1l0,1Zm17.15.28-3.6-.06a25,25,0,0,1,3.64-3l0,3Zm-3.5-64.19,4.34.07-3.15,2.71a7.24,7.24,0,0,1-1.21.8l0-3.58Zm4.33,64.2h-.51l.06-3.38a16.56,16.56,0,0,1,2.75-2.11l-.06,3.6a17.63,17.63,0,0,0-2.24,1.9Zm-17.27-43.92-.06,3.07c-1-.45-.74-.54-1.49-1.21-1.41-1.24-1.2-.26-1.16-3.42V253c.5.25,2.71,1.92,2.7,2.73Zm20.38-12-2.71,2.12c-.07-1.08-.25-3,.26-3.79a17.47,17.47,0,0,1,2.52-1.94Zm-21.7,41.48c-2.37-2.2-1.92-.47-1.81-5.23.84.32,1,1.13,2.68,2l0,3.77-.84-.57Zm18.53-12.39c0-4.73,0-3.37,1.52-4.75.56-.5.54-.74,1.27-1,0,1.06.28,3.17-.27,3.86l-2.52,1.86Zm2.91-12.8-2.71,2.14,0-3.86,2.71-2.16,0,3.88ZM133.17,252l0,1.79a16.67,16.67,0,0,1-2.63-2.15l0-3.92a13.22,13.22,0,0,1,1.91,1.5c1,1,.8,1.21.77,2.78Zm-2.64,21.71c-.72-.7-.39-2.85-.38-4.35,3.12,2.14,2.65,1.71,2.65,6.07l-2.27-1.72Zm2.72-26.45,0,1.18a19.46,19.46,0,0,1-2.71-2.13l.09-4c.33.24.62.44.95.7,2,1.63,1.73,1.65,1.69,4.19Zm19.62,36c-.21,5,.72,3-1.69,5.1-.57.5-.39.66-1.11.87,0-1.07-.32-3.25.28-4,0,0,1.11-1,1.23-1.1a7.29,7.29,0,0,1,1.29-.87Zm0-5.37c.49,4.75-.38,4-1.61,5.18a2.82,2.82,0,0,1-1.15.83l.05-3.85c.85-.7,1.81-1.54,2.71-2.16Zm.26-38.69s-2.17,1.62-2.33,1.69c0-5.84,1-5,2.07-3.94.74.71,1.22,1.44.26,2.26Zm-20.44,41.62c-3.64-2.31-2.72-2.82-2.65-6.07.63.23,1.3,1.25,2.7,2Zm17.91-23.88c-.64-4.54.56-4.22,1.5-5.05.55-.49.55-.7,1.23-1,.11,3.25.54,3.51-1.51,5.14a13.75,13.75,0,0,0-1.22.88Zm-17.74,8.9V270a17,17,0,0,1-2.71-2.14l.08-4.18c.78.35.67.47,1.26,1a5.9,5.9,0,0,0,1.38,1Zm-.43,27,0,4.32a10.23,10.23,0,0,1-2.56-2.23c-.32-.69-.11-3.32,0-4.23.42.48.8.63,1.31,1.17a2.88,2.88,0,0,0,1.28,1Zm20.5-16.4a13.7,13.7,0,0,0-1.36,1.16c-.43.4-1,.72-1.33,1-.1-.84-.17-3.6.18-4.23a14,14,0,0,1,2.59-2l-.08,4.13Zm-20.45,15.07c-1.24-.63-1.11-1.08-2.68-2.14l.06-4.19c3.28,2.23,2.79,2.14,2.62,6.32Zm18.14-40c0-1-.22-3.45.23-4.15a14.2,14.2,0,0,1,2.61-2.08c0,1,.21,3.46-.26,4.19a12.65,12.65,0,0,1-2.58,2Zm-17.51-8.41a7.94,7.94,0,0,1-1.25-1.08c-.41-.42-.81-.67-1.26-1.06l.06-4.29a5.27,5.27,0,0,1,1.27,1c.62.65.83.7,1.37,1.25a11.46,11.46,0,0,1-.19,4.18Zm19.57,49.63a12.41,12.41,0,0,0-1.39,1.12,6,6,0,0,1-1.33,1c-.34-3.81-.3-4.46,2.78-6.3l-.06,4.17ZM133,264.42a11.67,11.67,0,0,1-2.4-2c-.66-.85-.22-3.12-.25-4.34,3.66,2.19,2.65,3.08,2.65,6.31Zm17.42,3.36c.09-2.33-.94-4.46,2.84-6.24-.05,1.09.22,3.4-.27,4.19a12.52,12.52,0,0,1-2.57,2Zm-6,31.8-6.78-.11.09-2c2,1.49,1.8,2.26,4.65-.55a18,18,0,0,1,2.47-1.9c-.06,1.66.21,3.84-.43,4.59ZM137.76,263l-2.4-2.06c-2.25-1.79-2.06-1.27-1.91-5.3l3.19,2.64c1.14,1.13,1.18.82,1.25,1.73a18.66,18.66,0,0,1-.13,3Zm-.39,27c-1-.52-3.71-3.24-4.43-3.68l0-3.68a12,12,0,0,1,1.41,1.06c3.22,2.86,3.17,2.14,3,6.3Zm8.43-40.11.08-3.57,4.54-3.63c.45,4.74-.67,3.85-2.74,5.84a7.8,7.8,0,0,1-1.88,1.36Zm4.16,23.4c-1,.72-3.73,3.19-4.56,3.57-.09-2.92-.35-3.37,1.28-4.63a13,13,0,0,0,1.65-1.3,7.68,7.68,0,0,1,1.7-1.24Zm-14.81-34.19-1.41-1.2,0-2.6,2.22,0c2.64,3.16,2.28-.11,2.21,6.22l-3-2.46Zm2.1,60.39-2.38,0a11.34,11.34,0,0,0-1.15-1.15c-.68-.51-.85-.35-1-1.26l.06-3.73,2.33,1.85a10.7,10.7,0,0,0,2.15,1.77l0,2.55Zm.68-45.55,0,4c-.88-.48-3.85-3.33-4.43-3.69l.06-3.94c.76.38,3.34,3,4.41,3.63Zm11.82,31.76c.05,3.92.27,3.45-1.12,4.77l-3.52,2.68.12-4,3.48-2.63c.46-.42.43-.6,1-.8Zm-12.27-.77c-.64-.28-3.53-3-4.47-3.69l.12-3.94,3.75,3.2c1,1,.65,1.68.6,4.43Zm.07-5.35c-1-.49-3.42-3-4.45-3.69l.09-3.94c.77.44,1.29,1.12,2.45,2,.53.41.71.73,1.22,1.14s.77.32.75,1.44l-.06,3Zm8.08-18.74c.16-5.23-.46-3.06,2.85-6.14a12.48,12.48,0,0,1,1.82-1.32c-.14,3.66.44,3.68-1.09,4.71l-3,2.36c-.59.43.12,0-.62.39Zm-7.58-12.25-.08,4-3.37-2.74a2.14,2.14,0,0,1-1.06-1.83c0-1,0-2.07.06-3.06.66.29.53.42,1.07.9l3.39,2.73Zm7.49,17.59.08-4a8.91,8.91,0,0,0,2.26-1.68,25.28,25.28,0,0,1,2.33-1.75c-.09,2.73.39,3.68-1.05,4.72A42.29,42.29,0,0,1,145.54,266.15Zm4.31,14.18c0,2.73.39,3.64-1.13,4.8a32.63,32.63,0,0,1-3.53,2.66l.11-4c1.24-.62,3.93-3.23,4.55-3.42Zm-12.17-8,0,1.87L133.76,271c-.78-.79-.56-.51-.53-2.3l0-2.35a32,32,0,0,1,2.82,2.37C137.69,269.9,137.75,269.74,137.68,272.33Zm12.37-4.16-4.59,3.58.08-4.29a10.12,10.12,0,0,0,2.25-1.71l2.32-1.72-.06,4.15Zm-.15,6.54a29,29,0,0,1,0,3c0,1.54,0,1.36-1,2a44.12,44.12,0,0,1-3.6,2.75l.12-4.11,4.5-3.63ZM149.65,291c.14,2.41.32,4.07-1,5a40.74,40.74,0,0,1-3.62,2.75l.11-4.13,4.53-3.65Zm-11.87-26.68,0,4.28c-.8-.35-.53-.39-1.16-.94l-3.32-2.76.09-4.2c.78.35,3.31,3,4.42,3.62Zm-.45,31.27c-1.48-1-2.27-1.94-3.6-2.93-.94-.7-.91-.75-.88-2.18,0-.93,0-1.88.1-2.8.93.61,1.31,1.19,2.18,1.84a24.66,24.66,0,0,1,2.24,2l0,4.1Zm8.38-40.13.09-4.29c1.28-.6,3.8-3.16,4.56-3.44.07,3.56.32,4-1,4.89l-2.61,2.1c-.68.61-.34.47-1,.74Zm4.78-14.26c-1,.67-3.64,3.14-4.57,3.56.06-5.33-.33-3.72,1.19-5.1a7,7,0,0,1,1.16-1,7.77,7.77,0,0,0,1.13-.85c.59-.56.44-.59,1.13-.89l0,4.28Zm-16.08-1.57,3.75,3.21-.06,4.39c-1.69-1.12-1.85-1.57-3.5-2.84-1.81-1.41-.56-2.82-1-5.17.67.28.07,0,.47.24.05,0,.18.24.25.12s.07,0,.11,0Zm10.93,17.7,0,3.93a11,11,0,0,0-1.79,1.47l-2.78-2.19c-3.31-3.14-2.4-1.05-2.45-6.12l2.52,2.13c.5.48,2.26,2,2.72,2s1.24-.91,1.81-1.21Zm-5.43,29.76a11.61,11.61,0,0,1-1.49-1.27c-.88-.88-.62-.57-.6-2.1l0-2.31c.77.33,4,3.6,5,4.15a7.32,7.32,0,0,0,2-1.25v3.94l-2.16,1.47-2.81-2.63Zm5.3-19.08c-.1,2.62.41,3.59-.68,4.62L140,276.27l-2-1.57.1-4.23c2.4,1.34.75,2.58,4.57-.43a16.8,16.8,0,0,1,2.56-2Zm-4.78-18.72-2-1.56.08-4.35c2.77,1.92,1.64,1.71,3.36.47s1.89-1.6,3.8-2.93c-.13,3.7.47,4.06-1.34,5.29-.76.52-1.09,1-1.83,1.52a7.41,7.41,0,0,0-1,.76c-.61.57-.31.46-1,.81Zm-1.84-13.94,3.44.05a4,4,0,0,0,1.86,1.43l1.83-1.28c-.08,4.7.35,3.73-1.36,4.94-1,.72-3.06,2.87-4.11,3.09a5.14,5.14,0,0,0-1.74-1.58l.05-4.26s.11,0,.13.1l1.12.92c.43.36.7.76,1.52.55.13-.75-.85-1.44-1.35-1.82C139.2,236.91,138.58,236.76,138.59,235.35Zm6.89,15a27.63,27.63,0,0,0-2.36,1.91c-.89.84-.24,1.45,1.06.43.44-.34.75-.58,1.28-.93-.08,4.33.48,3.88-1.91,5.67l-5.24-4.32.09-4c1.92,1.66,2,2.06,4.58-.49l2.55-2-.05,3.67Zm-.53,32.6a7.09,7.09,0,0,0-1.76,1.46c-1-.33-.48-.4-2.05-1.57-.72-.53-1-1-1.78-1.57-2.14-1.57-1.41-2.07-1.42-5.16.78.42.94,1,2,1.44,1.37-.63,4.24-3.47,5.11-3.89.09,4.62.09,3.48-1.88,5.07-.36.3-1.79,1.84-.15,1.42.88-.22,1.14-1.1,2-1.41l-.07,4.21Zm-4.48,10.47c.12-.84-1.18-1.68-1.72-2.07-1.45-1.08-1.05-1.71-1-4.55,1,.51,3.91,3.72,5.26,4.19l1.8-1.3c-.16,4.56.29,3.75-1.47,5l-3.73,3c-.89-.39-.52-.64-2-1.57l.06-4.25c1,.43,1.45,1.89,2.79,1.55Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f1ac78af-a99c-4aa8-8c01-cba46ebfbb60);"></path>
                                            </g>
                                            <path d="M150.48,234.71c-6.52-2.11-9.46-.15-14.19-.22a3.9,3.9,0,0,0-4,3.71q-.47,28.6-.92,57.2a3.9,3.9,0,0,0,3.92,3.85c4.73.07,10.25,2.71,14.19.22,6.06-3.82,4.8-63.54,1-64.76Z" transform="translate(0 0)" style="fill:none;"></path>
                                            <path d="M12.18,57.36c6.55-2,9.46,0,14.19,0a3.9,3.9,0,0,1,4,3.78v57.21a3.9,3.9,0,0,1-4,3.78c-4.73,0-10.29,2.54-14.19,0C6.18,118.21,8.41,58.51,12.18,57.36Z" transform="translate(0 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                            <g style="clip-path:url(#a104ad88-8140-492a-85cd-bf8abdf21598);">
                                            <path id="a2378fba-6c88-479b-b0b3-a92012693257" data-name="1" d="M18.93,86.67A7.58,7.58,0,0,1,17,85.39l-.07,3.94c.39.3.82.56,1.22.9A36.19,36.19,0,0,0,22,93.45a5.68,5.68,0,0,0,1.41-1.12c1-.87.63-1.07.63-3.42V87.68c-.75.52-1.85,1.8-2.77,1.52-.22-.72-.19-.39.28-.87l2.49-2V82.6C23.39,82.88,19.86,86.19,18.93,86.67ZM31.75,58.18H29.2l0,2.06a4.87,4.87,0,0,0,1.33-.92l1.2-1.14ZM29.2,122.31h2.74l0-3c-.8.34-.65.46-1.25,1a5.3,5.3,0,0,1-1.42,1Zm-17.14,0h3.6a25.44,25.44,0,0,0-3.59-3ZM16.6,58.18H12.25l3.11,2.76a6.42,6.42,0,0,0,1.19.81l.05-3.57Zm-5.38,64.13h.51v-3.38A16.9,16.9,0,0,0,9,116.76v3.6a18.29,18.29,0,0,1,2.2,2Zm18-43.64v3.07c1-.43.75-.53,1.52-1.18,1.42-1.21,1.2-.24,1.21-3.4V76c-.5.24-2.74,1.87-2.74,2.68ZM9,66.35l2.68,2.17c.09-1.08.29-3-.2-3.8a17.29,17.29,0,0,0-2.49-2v3.6Zm21,41.83c2.4-2.17,1.92-.44,1.89-5.21-.85.32-1,1.12-2.71,2l0,3.76.85-.55ZM11.72,95.49c.1-4.73.09-3.37-1.44-4.78-.56-.5-.53-.74-1.25-1,0,1-.34,3.16.2,3.86l2.49,1.9ZM9,82.65l2.68,2.18,0-3.86-2.67-2.2L9,82.65ZM29.2,74.87v1.8a17.17,17.17,0,0,0,2.66-2.11L32,70.64A12.68,12.68,0,0,0,30,72.11C29,73.05,29.2,73.31,29.2,74.87Zm2.29,21.76c.73-.69.44-2.85.45-4.34-3.15,2.08-2.67,1.66-2.75,6ZM29.2,70.13v1.19a18.77,18.77,0,0,0,2.74-2.09l0-4c-.34.24-.63.42-1,.68C28.89,67.56,29.2,67.58,29.2,70.13ZM9,105.77c.13,5-.76,3,1.61,5.13.57.5.38.67,1.1.89,0-1.07.37-3.25-.22-4,0,0-1.09-1-1.22-1.13A7.21,7.21,0,0,0,9,105.77Zm.06-5.37c-.56,4.74.32,4,1.53,5.21a2.81,2.81,0,0,0,1.14.84V102.6c-.84-.71-1.78-1.57-2.67-2.2Zm.37-38.69c.05,0,2.15,1.66,2.3,1.72,0-5.83-.88-5-2-4-.76.7-1.25,1.42-.3,2.25ZM29.2,103.66c3.68-2.25,2.76-2.78,2.74-6-.63.22-1.32,1.23-2.72,2l0,4ZM11.67,79.49c.72-4.53-.49-4.22-1.41-5.07-.55-.5-.54-.71-1.22-1-.17,3.25-.6,3.5,1.43,5.16A14.86,14.86,0,0,1,11.67,79.49Zm17.59,9.19L29.21,93A16.78,16.78,0,0,0,32,90.86l0-4.18c-.78.34-.67.46-1.27,1a6.19,6.19,0,0,1-1.4,1Zm0,27L29.2,120a10.16,10.16,0,0,0,2.6-2.18c.33-.69.16-3.33.08-4.24-.43.48-.81.62-1.33,1.16a3.05,3.05,0,0,1-1.3.94ZM9,99a12.66,12.66,0,0,1,1.35,1.17,15.38,15.38,0,0,0,1.31,1c.11-.83.23-3.59-.11-4.22A13.88,13.88,0,0,0,9,94.81V99Zm20.21,15.39c1.25-.61,1.13-1.07,2.71-2.09v-4.2c-3.31,2.19-2.83,2.1-2.72,6.29ZM11.74,74.11c0-1,.27-3.46-.16-4.16A14.46,14.46,0,0,0,9,67.83c0,1-.26,3.45.19,4.19A12.7,12.7,0,0,0,11.74,74.11ZM29.38,66a7,7,0,0,0,1.26-1.06c.42-.41.82-.66,1.28-1V59.59a5.52,5.52,0,0,0-1.29,1c-.63.64-.83.69-1.39,1.23A11.76,11.76,0,0,0,29.38,66ZM9,115.28a12.66,12.66,0,0,1,1.37,1.15,5.71,5.71,0,0,0,1.31,1c.4-3.81.37-4.45-2.68-6.35Zm20.2-27.94a11,11,0,0,0,2.43-1.93c.68-.84.28-3.11.32-4.34-3.7,2.13-2.7,3.05-2.75,6.27ZM11.74,90.41c-.05-2.32,1-4.44-2.74-6.28,0,1.09-.27,3.4.2,4.2A13.11,13.11,0,0,0,11.74,90.41Zm5.53,31.9h6.78l-.06-2c-2,1.45-1.84,2.23-4.64-.63a17.12,17.12,0,0,0-2.44-1.93C16.94,119.38,16.64,121.55,17.27,122.31Zm7.17-36.49,2.43-2c2.28-1.76,2.08-1.23,2-5.26l-3.22,2.59c-1.16,1.11-1.2.79-1.29,1.7A18.65,18.65,0,0,0,24.44,85.82Zm-.05,27c1-.51,3.76-3.18,4.49-3.62l0-3.67a13.23,13.23,0,0,0-1.43,1C24.2,109.37,24.27,108.66,24.39,112.82ZM16.61,72.57l0-3.57-4.48-3.7c-.53,4.73.61,3.86,2.64,5.89A8,8,0,0,0,16.61,72.57ZM12.07,95.91c1,.73,3.68,3.24,4.5,3.63.14-2.91.41-3.35-1.2-4.64a14.24,14.24,0,0,1-1.63-1.33,7.41,7.41,0,0,0-1.68-1.27l0,3.61ZM27.43,62l1.43-1.17,0-2.6H26.66C24,61.3,24.39,58,24.36,64.36L27.43,62Zm-3.08,60.36h2.38a12.65,12.65,0,0,1,1.17-1.13c.69-.5.85-.33,1-1.24v-3.73L26.54,118a10.61,10.61,0,0,1-2.18,1.74v2.55Zm.06-45.56,0,4c.89-.47,3.91-3.26,4.49-3.61V73.2c-.77.36-3.4,3-4.47,3.55ZM12.08,108.32c-.11,3.92-.32,3.45,1.05,4.79l3.47,2.73-.06-4-3.43-2.69c-.46-.43-.43-.61-1-.82Zm12.29-.57c.64-.27,3.57-2.93,4.52-3.63l-.05-3.93L25,103.32C24,104.31,24.36,105,24.37,107.75Zm0-5.35c1-.48,3.47-3,4.51-3.62l0-3.94c-.77.42-1.3,1.1-2.48,2-.54.4-.72.71-1.24,1.11s-.78.31-.78,1.43ZM16.61,83.53c-.08-5.23.51-3-2.76-6.19A12.28,12.28,0,0,0,12.06,76c.08,3.65-.5,3.66,1,4.72L16,83.13c.57.43-.13,0,.61.39ZM24.38,71.4l0,4,3.42-2.68a2.17,2.17,0,0,0,1.09-1.81c0-1,0-2.07,0-3.06-.66.27-.53.41-1.08.87L24.38,71.4ZM16.61,88.87l0-4a9.09,9.09,0,0,1-2.23-1.71,25.42,25.42,0,0,0-2.3-1.79c0,2.73-.45,3.68,1,4.74a43.55,43.55,0,0,0,3.58,2.8ZM12.07,103c0,2.72-.45,3.63,1,4.82a33.1,33.1,0,0,0,3.49,2.71l0-4c-1.23-.64-3.88-3.29-4.5-3.49Zm12.3-7.8v1.87l3.93-3.19c.79-.77.57-.49.57-2.29V89.23A30.64,30.64,0,0,0,26,91.55C24.4,92.74,24.34,92.58,24.37,95.18Zm-12.3-4.36,4.53,3.65V90.18a9.86,9.86,0,0,1-2.22-1.75l-2.3-1.75v4.15Zm0,6.54c-.1,1,0,2,0,3,0,1.54,0,1.36,1,2a42,42,0,0,0,3.56,2.81l-.06-4.11Zm0,16.29c-.18,2.41-.38,4.07.93,5a38,38,0,0,0,3.58,2.8l-.05-4.12-4.46-3.73ZM24.4,87.17l0,4.27c.8-.33.52-.38,1.17-.92l3.37-2.7,0-4.21c-.78.35-3.35,3-4.48,3.56Zm-.06,31.27c1.5-1,2.3-1.9,3.66-2.87.95-.68.92-.74.9-2.17,0-.93,0-1.87,0-2.8-.95.6-1.33,1.17-2.22,1.81a24.37,24.37,0,0,0-2.27,1.93l0,4.1ZM16.61,78.18l0-4.29c-1.27-.62-3.74-3.23-4.5-3.52-.13,3.56-.39,4,.92,4.91l2.58,2.14c.66.62.32.48,1,.75ZM12.07,63.85c1,.68,3.58,3.19,4.51,3.63,0-5.33.39-3.72-1.11-5.12a8.64,8.64,0,0,0-1.14-1,7.24,7.24,0,0,1-1.12-.86c-.58-.58-.43-.6-1.12-.91l0,4.28Zm16.1-1.31-3.81,3.14v4.39c1.71-1.09,1.87-1.54,3.54-2.78,1.84-1.38.61-2.81,1.11-5.15-.67.27-.07,0-.47.23-.05,0-.18.24-.25.12S28.21,62.52,28.17,62.54ZM17,80.05l0,3.94a10.46,10.46,0,0,1,1.77,1.49l2.82-2.14c3.36-3.09,2.41-1,2.55-6.08l-2.55,2.09c-.51.47-2.3,2-2.76,1.94s-1.22-.93-1.79-1.24Zm4.94,29.84a10.07,10.07,0,0,0,1.51-1.24c.9-.86.63-.56.63-2.09v-2.31c-.77.32-4.07,3.54-5.1,4.07A7.35,7.35,0,0,1,17,107L16.91,111l2.13,1.5Zm-5-19.15c.06,2.61-.47,3.58.6,4.63L22,99.08l2.05-1.54,0-4.24c-2.42,1.3-.79,2.57-4.56-.5a16.88,16.88,0,0,0-2.54-2.07ZM22,72.1,24,70.56V66.21c-2.81,1.88-1.67,1.69-3.37.42s-1.86-1.63-3.75-3c.07,3.71-.53,4.06,1.26,5.32.75.53,1.07,1,1.8,1.54a7.47,7.47,0,0,1,1,.78c.6.58.3.46,1,.82Zm2.06-13.92H20.62a4.21,4.21,0,0,1-1.89,1.41l-1.81-1.32c0,4.7-.4,3.72,1.28,5,1,.74,3,2.92,4.06,3.16A5.12,5.12,0,0,1,24,64.84l0-4.26s-.11,0-.13.09l-1.14.91c-.44.35-.71.74-1.54.52-.11-.76.88-1.43,1.39-1.8.79-.56,1.41-.7,1.42-2.11ZM16.92,73a27.88,27.88,0,0,1,2.33,2c.88.85.22,1.45-1.06.41-.44-.34-.75-.59-1.27-1,0,4.33-.54,3.87,1.82,5.69l5.31-4.23,0-4c-1.94,1.62-2,2-4.57-.57l-2.52-2V73Zm0,32.6a7,7,0,0,1,1.74,1.49c1-.31.49-.39,2.08-1.54.73-.52,1.06-1,1.81-1.54,2.16-1.53,1.44-2,1.5-5.13-.79.4-1,1-2.06,1.4-1.36-.65-4.18-3.53-5-4-.16,4.61-.14,3.48,1.8,5.1.36.3,1.77,1.87.13,1.42-.88-.24-1.12-1.11-1.94-1.44Zm4.31,10.54c-.09-.84,1.22-1.66,1.76-2,1.47-1,1.08-1.69,1-4.53-1.05.49-4,3.65-5.33,4.1l-1.78-1.33c.09,4.57-.35,3.75,1.39,5L22,120.46c.89-.38.52-.63,2.06-1.54v-4.26c-1,.42-1.47,1.87-2.82,1.51Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b2fc487f-9be7-409b-96ac-1ea730e8c172);"></path>
                                            </g>
                                            <path d="M12.18,57.36c6.55-2,9.46,0,14.19,0a3.9,3.9,0,0,1,4,3.78v57.21a3.9,3.9,0,0,1-4,3.78c-4.73,0-10.29,2.54-14.19,0C6.18,118.21,8.41,58.51,12.18,57.36Z" transform="translate(0 0)" style="fill:none;"></path>
                                            <path d="M12.09,234.71c6.52-2.11,9.46-.15,14.19-.22a3.9,3.9,0,0,1,4,3.71q.47,28.6.92,57.2a3.9,3.9,0,0,1-3.92,3.85c-4.73.07-10.25,2.71-14.19.22-6.06-3.82-4.8-63.54-1.05-64.76Z" transform="translate(0 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                            <g style="clip-path:url(#a51687f6-a15b-4255-bea2-aa9445e6bc78);">
                                            <path id="b6d57031-7527-4c1d-ab73-7204c4e60471" data-name="1" d="M19.32,263.92a7.45,7.45,0,0,1-2-1.26v3.94c.4.3.83.55,1.23.89a38.35,38.35,0,0,0,3.91,3.16,6.06,6.06,0,0,0,1.4-1.15c1-.88.6-1.08.57-3.43v-1.23c-.74.53-1.82,1.83-2.75,1.57-.23-.72-.19-.39.27-.88l2.46-2-.06-3.72c-.65.29-4.13,3.67-5.05,4.16Zm12.35-28.7-2.54,0,.05,2.06a5,5,0,0,0,1.31-.94l1.18-1.16Zm-1.51,64.16,2.74,0-.07-3c-.79.35-.64.47-1.23,1.05a5.78,5.78,0,0,1-1.41,1l0,1ZM13,299.66l3.6-.06a25,25,0,0,0-3.64-3Zm3.5-64.19-4.34.07,3.15,2.71a7.59,7.59,0,0,0,1.2.8v-3.58Zm-4.34,64.2h.51l0-3.38a16.61,16.61,0,0,0-2.76-2.11l.07,3.6a17.52,17.52,0,0,1,2.23,1.9Zm17.28-43.92.06,3.07c1-.45.74-.54,1.49-1.21,1.41-1.24,1.2-.26,1.16-3.42V253c-.5.25-2.71,1.92-2.7,2.73Zm-20.39-12,2.72,2.12c.07-1.08.24-3-.26-3.79A17.47,17.47,0,0,0,9,240.15Zm21.71,41.48c2.37-2.2,1.91-.47,1.8-5.23-.84.32-1,1.13-2.67,2l0,3.77.84-.57ZM12.25,272.85c0-4.73,0-3.37-1.52-4.75-.56-.5-.55-.74-1.27-1,0,1.06-.29,3.17.27,3.86l2.52,1.86Zm-2.92-12.8L12,262.19v-3.86l-2.71-2.16ZM29.4,252l0,1.79a17.15,17.15,0,0,0,2.63-2.15l0-3.92a13.79,13.79,0,0,0-1.91,1.5c-1,1-.79,1.21-.76,2.78ZM32,273.67c.72-.7.4-2.85.38-4.35-3.11,2.14-2.64,1.71-2.65,6.07L32,273.67Zm-2.71-26.45v1.18A18.89,18.89,0,0,0,32,246.27l-.09-4c-.33.24-.62.44-.95.7-2,1.63-1.73,1.65-1.68,4.19Zm-19.63,36c.21,5-.71,3,1.69,5.1.58.5.39.66,1.12.87,0-1.07.32-3.25-.29-4,0,0-1.1-1-1.23-1.1a7.29,7.29,0,0,0-1.29-.87Zm0-5.37c-.49,4.75.37,4,1.61,5.18a2.85,2.85,0,0,0,1.14.83L12.37,280c-.85-.7-1.81-1.54-2.7-2.16Zm-.26-38.69s2.17,1.62,2.32,1.69c0-5.84-1-5-2.06-3.94-.75.71-1.23,1.44-.26,2.26Zm20.44,41.62c3.64-2.31,2.71-2.82,2.64-6.07-.62.23-1.3,1.25-2.69,2ZM11.93,256.86c.65-4.54-.55-4.22-1.49-5.05-.55-.49-.55-.7-1.24-1-.11,3.25-.54,3.51,1.52,5.14A12.11,12.11,0,0,1,11.93,256.86Zm17.74,8.9,0,4.28a16.48,16.48,0,0,0,2.7-2.14l-.08-4.18c-.77.35-.66.47-1.25,1a6.11,6.11,0,0,1-1.38,1Zm.43,27,0,4.32a10.11,10.11,0,0,0,2.57-2.23c.31-.69.1-3.32,0-4.23-.41.48-.79.63-1.31,1.17a2.88,2.88,0,0,1-1.28,1ZM9.6,276.35A14.94,14.94,0,0,1,11,277.51c.43.4,1,.72,1.33,1a13.39,13.39,0,0,0-.18-4.23,14.31,14.31,0,0,0-2.59-2l.07,4.13Zm20.46,15.07c1.24-.63,1.11-1.08,2.68-2.14l-.06-4.19c-3.28,2.23-2.8,2.14-2.62,6.32Zm-18.14-40c0-1,.21-3.45-.23-4.15a14.55,14.55,0,0,0-2.61-2.08c0,1-.21,3.46.26,4.19a12.33,12.33,0,0,0,2.57,2Zm17.5-8.41A7.52,7.52,0,0,0,30.67,242c.41-.42.81-.67,1.26-1.06l-.06-4.29a5.27,5.27,0,0,0-1.27,1c-.62.65-.83.7-1.37,1.25a11.46,11.46,0,0,0,.19,4.18ZM9.85,292.69a12.41,12.41,0,0,1,1.39,1.12,6,6,0,0,0,1.33,1c.34-3.81.3-4.46-2.78-6.3ZM29.6,264.42a11.41,11.41,0,0,0,2.4-2c.66-.85.22-3.12.25-4.34C28.59,260.3,29.6,261.19,29.6,264.42Zm-17.42,3.36c-.09-2.33,1-4.46-2.84-6.24.05,1.09-.22,3.4.27,4.19a12.8,12.8,0,0,0,2.57,2Zm6.05,31.8,6.78-.11-.1-2c-2,1.49-1.8,2.26-4.65-.55a18,18,0,0,0-2.47-1.9c.06,1.66-.21,3.84.44,4.59ZM24.8,263l2.4-2.06c2.25-1.79,2.06-1.27,1.91-5.3l-3.19,2.64c-1.14,1.13-1.18.82-1.25,1.73a19.89,19.89,0,0,0,.13,3Zm.39,27c1-.52,3.71-3.24,4.43-3.68l0-3.68a12,12,0,0,0-1.41,1.06c-3.22,2.86-3.17,2.14-3,6.3Zm-8.43-40.11-.08-3.57-4.53-3.63c-.46,4.74.67,3.85,2.73,5.84a7.8,7.8,0,0,0,1.88,1.36Zm-4.16,23.4c1,.72,3.73,3.19,4.56,3.57.09-2.92.35-3.37-1.28-4.63a13,13,0,0,1-1.65-1.3,7.68,7.68,0,0,0-1.7-1.24Zm14.81-34.19,1.41-1.2,0-2.6-2.22,0c-2.63,3.16-2.27-.11-2.21,6.22l3-2.46Zm-2.1,60.39,2.38,0a11.34,11.34,0,0,1,1.15-1.15c.68-.51.85-.35,1-1.26l-.06-3.73-2.33,1.85a10.7,10.7,0,0,1-2.15,1.77Zm-.68-45.55,0,4c.88-.48,3.85-3.33,4.44-3.69L29,250.28c-.76.38-3.34,3-4.41,3.63ZM12.81,285.67c-.05,3.92-.27,3.45,1.13,4.77l3.51,2.68-.12-4-3.48-2.63c-.46-.42-.43-.6-1-.8Zm12.28-.77c.63-.28,3.52-3,4.46-3.69l-.11-3.94-3.76,3.2c-1,1-.65,1.68-.6,4.43ZM25,279.55c1-.49,3.42-3,4.45-3.69l-.09-3.94c-.76.44-1.29,1.12-2.45,2-.53.41-.71.73-1.22,1.14s-.77.32-.75,1.44l.07,3Zm-8.08-18.74c-.16-5.23.47-3.06-2.85-6.14a12.48,12.48,0,0,0-1.82-1.32c.14,3.66-.44,3.68,1.09,4.71l3,2.36c.58.43-.13,0,.61.39Zm7.58-12.25.08,4L28,249.82A2.13,2.13,0,0,0,29,248c0-1,0-2.07-.06-3.06-.66.29-.52.42-1.07.9l-3.39,2.73ZM17,266.15l-.08-4a9.09,9.09,0,0,1-2.26-1.68,24,24,0,0,0-2.33-1.75c.09,2.73-.39,3.68,1.05,4.72A43.92,43.92,0,0,0,17,266.15Zm-4.31,14.18c0,2.73-.38,3.64,1.13,4.8a34.72,34.72,0,0,0,3.53,2.66l-.1-4C16,283.13,13.33,280.52,12.71,280.33Zm12.17-8,0,1.87L28.8,271c.78-.79.56-.51.54-2.3l0-2.35a32,32,0,0,0-2.82,2.37C24.87,269.9,24.81,269.74,24.88,272.33Zm-12.37-4.16,4.59,3.58L17,267.46a9.83,9.83,0,0,1-2.24-1.71L12.45,264l.06,4.15Zm.15,6.54c-.08,1,0,2,0,3,0,1.54,0,1.36,1,2a41.88,41.88,0,0,0,3.59,2.75l-.12-4.11-4.5-3.63ZM12.92,291c-.15,2.41-.32,4.07,1,5a40.74,40.74,0,0,0,3.62,2.75l-.11-4.13L12.92,291Zm11.86-26.68,0,4.28c.8-.35.52-.39,1.16-.94l3.31-2.76-.09-4.2c-.78.35-3.31,3-4.42,3.62Zm.45,31.27c1.49-1,2.27-1.94,3.6-2.93.94-.7.92-.75.88-2.18,0-.93,0-1.88-.09-2.8-.94.61-1.32,1.19-2.19,1.84a24.66,24.66,0,0,0-2.24,2l0,4.1Zm-8.38-40.13-.09-4.29c-1.28-.6-3.79-3.16-4.56-3.44-.07,3.56-.32,4,1,4.89l2.61,2.1c.68.61.34.47,1,.74ZM12.07,241.2c1,.67,3.64,3.14,4.57,3.56-.05-5.33.33-3.72-1.19-5.1a7,7,0,0,0-1.16-1,7.18,7.18,0,0,1-1.12-.85c-.59-.56-.45-.59-1.14-.89l0,4.28Zm16.09-1.57-3.76,3.21.07,4.39c1.68-1.12,1.84-1.57,3.49-2.84,1.82-1.41.57-2.82,1-5.17-.67.28-.07,0-.47.24-.05,0-.18.24-.25.12s-.07,0-.11,0Zm-10.94,17.7,0,3.93a11.23,11.23,0,0,1,1.8,1.47l2.77-2.19c3.31-3.14,2.4-1.05,2.46-6.12l-2.53,2.13c-.49.48-2.26,2-2.72,2s-1.24-.91-1.81-1.21Zm5.43,29.76a11,11,0,0,0,1.49-1.27c.89-.88.62-.57.6-2.1l0-2.31c-.77.33-4,3.6-5,4.15a7.32,7.32,0,0,1-2-1.25l0,3.94,2.15,1.47,2.82-2.63ZM17.36,268c.1,2.62-.42,3.59.67,4.62l4.54,3.64,2-1.57-.1-4.23c-2.4,1.34-.75,2.58-4.58-.43a16.8,16.8,0,0,0-2.56-2Zm4.77-18.72,2-1.56-.08-4.35c-2.77,1.92-1.64,1.71-3.36.47s-1.89-1.6-3.8-2.93c.13,3.7-.47,4.06,1.34,5.29.77.52,1.09,1,1.83,1.52a7.5,7.5,0,0,1,1,.76c.6.57.3.46,1,.81ZM24,235.35l-3.44.05a4,4,0,0,1-1.86,1.43l-1.83-1.28c.09,4.7-.35,3.73,1.36,4.94,1,.72,3.06,2.87,4.11,3.09A5.23,5.23,0,0,1,24.05,242l0-4.26c-.05,0-.12,0-.14.1l-1.12.92c-.43.36-.7.76-1.52.55-.13-.75.85-1.44,1.36-1.82C23.36,236.91,24,236.76,24,235.35Zm-6.89,15a26.15,26.15,0,0,1,2.36,1.91c.89.84.24,1.45-1.06.43-.44-.34-.75-.58-1.28-.93.08,4.33-.48,3.88,1.91,5.67l5.24-4.32-.09-4c-1.92,1.66-2,2.06-4.58-.49l-2.55-2,0,3.67Zm.53,32.6a6.73,6.73,0,0,1,1.76,1.46c1-.33.48-.4,2.05-1.57.72-.53,1-1,1.78-1.57,2.14-1.57,1.41-2.07,1.42-5.16-.78.42-.94,1-2,1.44-1.37-.63-4.23-3.47-5.11-3.89-.09,4.62-.09,3.48,1.88,5.07.36.3,1.8,1.84.16,1.42-.89-.22-1.15-1.1-2-1.41l.07,4.21Zm4.48,10.47c-.11-.84,1.18-1.68,1.72-2.07,1.46-1.08,1.05-1.71,1-4.55-1,.51-3.91,3.72-5.26,4.19l-1.8-1.3c.16,4.56-.29,3.75,1.47,5l3.73,3c.89-.39.52-.64,2-1.57l-.06-4.25c-1,.43-1.45,1.89-2.79,1.55Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a9e0869a-0646-47c6-b4d6-73f288fbdd77);"></path>
                                            </g>
                                            <path d="M12.09,234.71c6.52-2.11,9.46-.15,14.19-.22a3.9,3.9,0,0,1,4,3.71q.47,28.6.92,57.2a3.9,3.9,0,0,1-3.92,3.85c-4.73.07-10.25,2.71-14.19.22-6.06-3.82-4.8-63.54-1.05-64.76Z" transform="translate(0 0)" style="fill:none;"></path>
                                            <path d="M149.62,59.48c-6.55-2-9.46,0-14.19,0a3.9,3.9,0,0,0-4,3.78v57.21a3.9,3.9,0,0,0,4,3.78c4.73,0,10.29,2.54,14.19,0C155.62,120.33,153.39,60.64,149.62,59.48Z" transform="translate(0 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                            <g style="clip-path:url(#a87ef1cc-c73c-42c8-adc7-4fb00c38a860);">
                                            <path id="fdc77fde-8d85-46b4-869a-3756c0f152b6" data-name="1" d="M142.86,88.8a7.49,7.49,0,0,0,2-1.29l.06,3.94c-.39.3-.82.57-1.21.91a37.42,37.42,0,0,1-3.86,3.22,6,6,0,0,1-1.41-1.13c-1-.86-.63-1.06-.63-3.41V89.8c.75.53,1.85,1.8,2.77,1.53.22-.72.19-.4-.28-.87l-2.49-2V84.72c.65.28,4.18,3.6,5.11,4.07ZM130.05,60.3h2.54v2.07a5.1,5.1,0,0,1-1.33-.92L130,60.3Zm2.54,64.13h-2.73l0-3c.8.33.64.46,1.25,1a5.34,5.34,0,0,0,1.42,1Zm17.15,0h-3.6a24.89,24.89,0,0,1,3.59-3ZM145.2,60.3h4.34l-3.1,2.76a7,7,0,0,1-1.19.82Zm5.38,64.13h-.51v-3.38a16.28,16.28,0,0,1,2.72-2.16v3.6A18.24,18.24,0,0,0,150.58,124.43Zm-18-43.63v3.06c-1-.43-.74-.52-1.51-1.17-1.43-1.22-1.2-.24-1.21-3.41V78.12c.5.24,2.74,1.87,2.74,2.68Zm20.19-12.33-2.68,2.17c-.09-1.08-.29-3,.2-3.79a17.47,17.47,0,0,1,2.49-2v3.61Zm-21,41.83c-2.4-2.16-1.92-.43-1.89-5.2.84.31,1,1.12,2.71,2l0,3.76-.85-.56Zm18.33-12.68c-.11-4.74-.09-3.38,1.44-4.78.55-.5.53-.75,1.25-1,0,1.06.34,3.16-.21,3.86l-2.48,1.91Zm2.71-12.85L150.11,87l-.05-3.86,2.68-2.2,0,3.88ZM132.59,77v1.8a17.28,17.28,0,0,1-2.66-2.11l-.09-3.92a13.16,13.16,0,0,1,1.93,1.46C132.78,75.18,132.6,75.44,132.59,77Zm-2.28,21.75c-.73-.68-.44-2.84-.45-4.34,3.15,2.09,2.67,1.67,2.74,6l-2.29-1.69Zm2.29-26.49v1.19a18.85,18.85,0,0,1-2.74-2.1l0-3.94c.34.23.63.42,1,.68C132.91,69.69,132.6,69.71,132.6,72.26Zm20.2,35.64c-.13,5,.76,3-1.61,5.13-.57.5-.38.66-1.1.89-.05-1.07-.37-3.25.22-4,0,0,1.09-1,1.22-1.12a7.21,7.21,0,0,1,1.27-.89Zm-.06-5.37c.56,4.74-.32,4-1.53,5.2a2.8,2.8,0,0,1-1.13.85v-3.85c.84-.71,1.79-1.57,2.67-2.2Zm-.37-38.69c-.05,0-2.15,1.65-2.3,1.72,0-5.83.88-5,2-4,.76.7,1.25,1.42.3,2.25Zm-19.77,42c-3.68-2.25-2.76-2.78-2.74-6,.63.22,1.32,1.22,2.72,2l0,4Zm17.53-24.17c-.72-4.53.49-4.23,1.41-5.07.55-.5.54-.71,1.22-1,.16,3.25.6,3.5-1.43,5.16a12.82,12.82,0,0,0-1.2.9Zm-17.59,9.19.05,4.28a16.3,16.3,0,0,1-2.73-2.1V88.8c.78.34.67.46,1.27,1a6.09,6.09,0,0,0,1.4,1Zm0,27,0,4.31a9.94,9.94,0,0,1-2.6-2.17c-.33-.69-.16-3.33-.08-4.24.43.48.81.62,1.33,1.15a3,3,0,0,0,1.3,1Zm20.23-16.73a14.16,14.16,0,0,0-1.35,1.18,15.38,15.38,0,0,1-1.31,1c-.11-.83-.23-3.59.11-4.22a13.88,13.88,0,0,1,2.55-2.09v4.14Zm-20.21,15.39c-1.25-.61-1.13-1.06-2.71-2.08v-4.2C133.16,112.36,132.68,112.28,132.57,116.46Zm17.49-40.22c0-1-.27-3.46.16-4.16A14.46,14.46,0,0,1,152.8,70c0,1,.26,3.45-.19,4.19A12.7,12.7,0,0,1,150.06,76.24Zm-17.64-8.13a7.39,7.39,0,0,1-1.26-1.06c-.42-.42-.82-.66-1.28-1V61.72a5.49,5.49,0,0,1,1.29,1c.63.65.83.7,1.39,1.23a11.75,11.75,0,0,1-.13,4.19Zm20.37,49.3a12.66,12.66,0,0,0-1.37,1.15,6,6,0,0,1-1.31,1c-.4-3.81-.37-4.45,2.68-6.35Zm-20.2-27.94a11.62,11.62,0,0,1-2.44-1.93c-.67-.84-.27-3.12-.31-4.34C133.53,85.33,132.54,86.24,132.59,89.47Zm17.47,3.07c.05-2.32-1-4.44,2.74-6.28,0,1.09.27,3.39-.2,4.2A13.11,13.11,0,0,1,150.06,92.54Zm-5.53,31.9h-6.78l.06-2c2,1.45,1.84,2.23,4.64-.63a17.12,17.12,0,0,1,2.44-1.93c0,1.66.27,3.83-.36,4.59ZM137.36,88l-2.44-2c-2.27-1.76-2.07-1.23-2-5.26l3.22,2.58c1.16,1.11,1.2.8,1.29,1.71A18.65,18.65,0,0,1,137.36,88Zm0,27c-1-.51-3.76-3.18-4.49-3.62l0-3.67a12,12,0,0,1,1.43,1C137.6,111.5,137.53,110.78,137.41,115Zm7.78-40.25,0-3.57,4.48-3.71c.53,4.74-.61,3.87-2.64,5.9A8,8,0,0,1,145.19,74.7ZM149.73,98c-1,.74-3.68,3.25-4.5,3.64-.14-2.91-.41-3.35,1.2-4.64a13.38,13.38,0,0,0,1.63-1.34,7.68,7.68,0,0,1,1.68-1.26l0,3.6ZM134.37,64.08l-1.43-1.17,0-2.6h2.22c2.68,3.12,2.27-.14,2.3,6.18l-3.07-2.41Zm3.08,60.36h-2.38a12.65,12.65,0,0,0-1.17-1.13c-.69-.51-.85-.34-1-1.24v-3.73l2.36,1.8a10.61,10.61,0,0,0,2.18,1.74v2.55Zm-.06-45.56,0,4c-.89-.47-3.91-3.27-4.49-3.61v-4c.77.37,3.39,3,4.47,3.56Zm12.33,31.57c.11,3.92.32,3.45-1.05,4.79L145.2,118l.06-4,3.43-2.69c.46-.43.43-.61,1-.82Zm-12.29-.58c-.64-.26-3.57-2.93-4.52-3.62l.05-3.93,3.81,3.14c1,1,.67,1.66.67,4.42Zm0-5.34c-1-.48-3.47-3-4.51-3.62l0-3.94a31.16,31.16,0,0,1,2.48,2c.54.4.72.71,1.24,1.11s.78.31.78,1.43l0,3Zm7.77-18.88c.08-5.22-.51-3,2.76-6.18a13.1,13.1,0,0,1,1.79-1.35c-.08,3.66.5,3.67-1,4.73l-2.93,2.41C145.23,85.69,145.93,85.3,145.19,85.65Zm-7.77-12.13,0,4L134,74.84a2.14,2.14,0,0,1-1.09-1.8c0-1,0-2.08,0-3.07.66.28.53.42,1.08.88l3.43,2.68ZM145.19,91l0-4a8.91,8.91,0,0,0,2.23-1.71,23.75,23.75,0,0,1,2.3-1.79c0,2.73.46,3.68-1,4.74a44,44,0,0,1-3.58,2.8Zm4.54,14.11c0,2.72.45,3.63-1,4.82a34.48,34.48,0,0,1-3.49,2.71l0-4c1.23-.64,3.88-3.29,4.5-3.49Zm-12.3-7.8v1.86L133.49,96c-.79-.77-.57-.5-.57-2.29V91.36a30.64,30.64,0,0,1,2.85,2.32c1.64,1.19,1.7,1,1.68,3.62ZM149.73,93,145.2,96.6V92.31a9.86,9.86,0,0,0,2.22-1.75l2.3-1.76V93Zm0,6.54c.1,1,0,2,.05,3,0,1.54,0,1.36-1,2a42,42,0,0,1-3.56,2.81l.06-4.11,4.44-3.7Zm0,16.3c.18,2.4.38,4.06-.93,5a38,38,0,0,1-3.58,2.8l0-4.12ZM137.4,89.3l0,4.28c-.8-.34-.52-.39-1.17-.93L132.89,90l0-4.2c.78.34,3.35,2.94,4.48,3.55Zm.06,31.27c-1.5-1-2.3-1.9-3.66-2.87-1-.68-.92-.74-.9-2.17,0-.93,0-1.87,0-2.79.95.6,1.33,1.16,2.22,1.81a24.37,24.37,0,0,1,2.27,1.93l0,4.1Zm7.73-40.26,0-4.29c1.27-.62,3.74-3.22,4.5-3.51.13,3.55.39,4-.92,4.9l-2.58,2.15C145.55,80.18,145.89,80,145.19,80.31ZM149.73,66c-1,.68-3.58,3.19-4.51,3.63,0-5.33-.39-3.72,1.11-5.12a8.64,8.64,0,0,1,1.14-1,7.24,7.24,0,0,0,1.12-.86c.58-.58.43-.6,1.12-.91l0,4.28Zm-16.1-1.31,3.81,3.14v4.4c-1.7-1.1-1.87-1.54-3.54-2.79-1.84-1.37-.61-2.81-1.11-5.15.67.28.08,0,.47.23.06,0,.19.25.26.12s.07,0,.11,0Zm11.21,17.51,0,3.94a11,11,0,0,0-1.77,1.49l-2.82-2.14c-3.36-3.08-2.41-1-2.55-6.08l2.55,2.09c.51.47,2.3,2,2.76,1.94s1.22-.93,1.79-1.24ZM139.9,112a10.07,10.07,0,0,1-1.51-1.24c-.9-.86-.63-.56-.63-2.09v-2.3c.77.31,4.07,3.53,5.1,4.07a7.62,7.62,0,0,0,2-1.29l0,3.94-2.13,1.5Zm5-19.15c-.06,2.62.47,3.58-.6,4.63l-4.49,3.71-2.05-1.54,0-4.24c2.42,1.3.79,2.57,4.56-.5a17.52,17.52,0,0,1,2.54-2.07Zm-5.08-18.64-2.05-1.54V68.34c2.81,1.88,1.67,1.69,3.37.42s1.86-1.63,3.75-3c-.07,3.71.53,4.06-1.26,5.32-.75.53-1.07,1-1.8,1.55a6.66,6.66,0,0,0-1,.77c-.6.58-.3.46-1,.82Zm-2.06-13.92h3.43a4.08,4.08,0,0,0,1.89,1.41l1.81-1.32c0,4.7.4,3.72-1.29,5-1,.74-3,2.92-4.06,3.16A5.09,5.09,0,0,0,137.77,67l0-4.26s.11,0,.13.09l1.13.91c.45.35.72.74,1.54.52.12-.76-.88-1.43-1.39-1.8C138.38,61.86,137.75,61.73,137.75,60.31Zm7.13,14.85a27.88,27.88,0,0,0-2.33,2c-.88.85-.22,1.45,1.06.42.44-.35.75-.6,1.27-1,0,4.34.54,3.87-1.82,5.7L137.75,78l0-4c1.94,1.62,2,2,4.57-.57l2.52-2v3.67Zm0,32.6a6.76,6.76,0,0,0-1.74,1.5c-1-.32-.49-.4-2.08-1.55-.73-.52-1.06-1-1.81-1.54-2.16-1.53-1.44-2-1.5-5.13.79.41,1,1,2.06,1.4,1.36-.65,4.18-3.53,5.05-4,.16,4.61.14,3.48-1.8,5.1-.36.3-1.77,1.87-.13,1.42.88-.24,1.12-1.11,1.95-1.44v4.21Zm-4.31,10.55c.09-.85-1.22-1.67-1.76-2-1.47-1.05-1.08-1.69-1-4.53,1,.5,4,3.65,5.33,4.1l1.78-1.33c-.09,4.57.35,3.75-1.39,5l-3.68,3.06c-.89-.38-.52-.63-2.06-1.54v-4.26C138.78,117.21,139.23,118.66,140.57,118.31Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#fa41c4c7-aa9a-4fd4-b0c0-f0ed07f76927);"></path>
                                            </g>
                                            <path d="M149.62,59.48c-6.55-2-9.46,0-14.19,0a3.9,3.9,0,0,0-4,3.78v57.21a3.9,3.9,0,0,0,4,3.78c4.73,0,10.29,2.54,14.19,0C155.62,120.33,153.39,60.64,149.62,59.48Z" transform="translate(0 0)" style="fill:none;"></path>
                                            <path d="M99.35,341.37v-.06A142.47,142.47,0,0,0,126,336.8c13.28-3.74,19.93-8,22.67-28.49,2.5-18.6,1-43.41,1.7-70.18.64-24.28,2-163.24-2.05-195A33.37,33.37,0,0,0,140.14,25,78.14,78.14,0,0,0,110.76,5c-1.64-.6-3,.32-4.63-.07C78.68-1.65,84.32-1.65,56.86,5c-1.63.39-3-.53-4.63.07A78.14,78.14,0,0,0,22.85,25a33.38,33.38,0,0,0-8.13,18.12c-4.08,31.67-2.7,170.74-2.06,195,.72,26.8-.8,51.63,1.7,70.24,2.75,20.45,9.39,24.75,22.67,28.49a142.44,142.44,0,0,0,26.62,4.51v.06c5.49.39,11.3.63,17.24.64h1.23c5.93,0,11.75-.25,17.24-.64Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#be0f1040-1abb-4c8d-a453-77d5c3158292);"></path>
                                            <path d="M19.57,52.06c.56,7,2,3.46,3.35-1.33,2.4-8.49,5.55-21.67,12.21-27.91,9.31-8.74,31.2-15.93,43.16-17.56a19.07,19.07,0,0,1,6.35.06c12,1.75,33.52,8.87,42.71,17.5,6.66,6.24,9.81,19.42,12.2,27.91,1.36,4.79,2.79,8.37,3.35,1.33.44-5.53.83-14.42-1.41-19.41-3.86-8.59-13.76-14.68-24.3-20.11-1.35-.69-2.84-.65-4.19-1.34s-3.23-2.95-4.49-3.42c-9.94-3.72-16.71-5.3-23.36-6a25.72,25.72,0,0,0-7.93,0c-6.63.7-13.36,2.28-23.25,6-1.26.47-3.23,2.72-4.49,3.42s-2.85.64-4.2,1.34C34.74,18,24.85,24.06,21,32.65c-2.24,5-1.86,13.88-1.42,19.41Z" transform="translate(0 0)" style="fill:#171614;fill-rule:evenodd;"></path>
                                            <g style="mask:url(#a111c8b0-9a99-4af1-9c45-3edcd0d3d710);">
                                            <path d="M19.71,305.75l-1.47-.8c.4,8.1.53,16.51,5.27,19.27,4.62,3.81,10,5.58,15.47,7.33,3,.72,6.05,1.49,9.1,2.15,4.9,1.05-.46-1.11-4.91-3.43a72.45,72.45,0,0,1-12.39-8.06,40.76,40.76,0,0,1-11.07-16.46Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b26d7c60-085f-45e0-9dec-7ddf1d54e65d);"></path>
                                            </g>
                                            <path d="M30.86,132.77c-2.45-12-3.43-23.37-5.07-35.33C25,87.18,28.78,81.27,35.54,78c20.31-9.87,71.33-9.87,91.64,0,6.75,3.27,10.57,9.18,9.75,19.44-1.64,12-2.63,23.33-5.07,35.33-40.19,1.06-60.81,1.06-101,0Z" transform="translate(0 0)" style="fill:#171614;fill-rule:evenodd;"></path>
                                            <path d="M23.71,47.89a5.4,5.4,0,0,1,1,3.56c-.21,8.72-4.92,27.45-1.9,33.89.64,1.35,2.1,2.09,3.81,2.63" transform="translate(0 0)" style="fill:none;"></path>
                                            <g style="mask:url(#afbaef2d-7030-4f2b-8bfb-8ae49d7380ad);">
                                            <path d="M136.48,79.67a157.27,157.27,0,0,1-9.39-13.93C117.75,49.33,110,31.37,100.61,15c7.91,17.77,14.47,32.86,22.49,49.83,1.55,3.3,2.44,5.46,5.21,8.1C130.53,75,133.74,77.18,136.48,79.67Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#eeb379c2-3861-4aee-a9f2-e127ac369da9);"></path>
                                            </g>
                                            <g style="mask:url(#a029674c-e0bf-4228-8931-5562e2f4b2ae);">
                                            <path d="M22,74.75l2.73-23.3c-1.33,5-2.79,9.48-3.68,14.13C18.66,78,18,90.07,16.4,103.72c1.86-9.65,3.58-21.18,5.57-29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a698f0cc-a919-448b-92af-97f71b5c9e0c);"></path>
                                            </g>
                                            <g style="mask:url(#a204a4cd-808d-49bf-9586-c9df4c911a1d);">
                                            <path d="M23.71,47.89c1.08-3.83,2.09-7.66,3.49-11.36,1.49-3.91,3.09-8,5.88-11.46a34.76,34.76,0,0,1,9.31-7.49C52,11.77,73.14,4.92,81.47,5l0,65.57c-19.85.57-50.67,2-54.82,17.37-4.1-1-4.86-4.57-4.82-8.92a122.11,122.11,0,0,1,1.31-14c.85-6.25,2.53-13.89.6-17.15Z" transform="translate(0 0)" style="fill:#c58800;fill-rule:evenodd;"></path>
                                            </g>
                                            <g style="mask:url(#a3563497-2caa-4f95-9254-ca8d8ed7e467);">
                                            <path d="M23.59,47.85,24,46.34C25,43,25.87,39.7,27.09,36.49c.74-2,1.52-4,2.45-5.91A28.76,28.76,0,0,1,33,25a24.86,24.86,0,0,1,4.09-4,50.5,50.5,0,0,1,5.25-3.56c4.82-2.93,12.56-6.11,20.13-8.54s14.85-4.09,19-4h.13q0,32.91,0,65.81h-.12c-9.92.28-22.58.78-33.28,3.13S28.81,80.36,26.75,88l0,.12-.12,0a5.57,5.57,0,0,1-4.05-3.27,14,14,0,0,1-.87-5.76c0-2.28.22-4.77.47-7.2s.57-4.79.85-6.83c.15-1.12.32-2.25.5-3.4.82-5.39,1.68-11,.11-13.68l0,0,0,0Zm.67-1.44-.41,1.46c1.58,2.75.71,8.4-.11,13.8-.18,1.16-.35,2.31-.5,3.39-.27,2-.59,4.4-.84,6.83s-.45,4.9-.47,7.16a13.92,13.92,0,0,0,.85,5.67,5.28,5.28,0,0,0,3.76,3.09C28.69,80.14,37.43,76,48.12,73.6s23.28-2.84,33.19-3.13l0-65.32c-4.15,0-11.4,1.64-18.81,4s-15.27,5.6-20.07,8.51a54.67,54.67,0,0,0-5.23,3.55,25.18,25.18,0,0,0-4,3.92,28.39,28.39,0,0,0-3.41,5.54c-.94,1.94-1.71,3.94-2.45,5.89-1.21,3.2-2.14,6.51-3.06,9.83Z" transform="translate(0 0)" style="fill:#c58800;"></path>
                                            </g>
                                            <path d="M31.15,297.58c-1.49,7.1-1.16,13.47,2.48,18,17.88,22.24,77.18,22.24,95.06,0,3.64-4.53,4-10.9,2.48-18-1.77,3.14-3.18,6.2-5.5,8.44-15.7,15.18-73.32,15.18-89,0C34.32,303.78,32.92,300.72,31.15,297.58Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#af4c80ab-6f74-43a3-9fd8-63e1ff9ba90a);"></path>
                                            <g style="mask:url(#b0b5a580-de7d-492b-b185-14629a1e355b);">
                                            <path d="M26.27,79.67a159.53,159.53,0,0,0,9.4-13.93C45,49.33,52.81,31.37,62.14,15,54.23,32.73,47.67,47.82,39.65,64.79c-1.55,3.3-2.44,5.46-5.2,8.1C32.23,75,29,77.18,26.28,79.67Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e7ff88e4-885d-4c00-9fd9-420c638573a7);"></path>
                                            </g>
                                            <path d="M31,131q-.27,11.37-.55,22.73,1.61,33.36,3.2,66.71.84,31,1.66,62c.87,32.89,91.1,30.1,91.91-.13l1.65-61.84q1.6-33.36,3.2-66.7L131.56,131c-33.51,1-67,.92-100.53,0Z" transform="translate(0 0)" style="fill:#171614;fill-rule:evenodd;"></path>
                                            <g style="mask:url(#b05eb140-a33b-4209-9dcb-63e979a2a714);">
                                            <path d="M142.52,305.79,144,305c-.39,8.1-.53,16.51-5.27,19.27-4.62,3.81-10,5.58-15.47,7.33-3,.72-6,1.49-9.1,2.15-4.9,1.05.47-1.11,4.92-3.43a72.76,72.76,0,0,0,12.38-8.06,38,38,0,0,0,11.07-16.46Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#abc15173-12dc-44df-80fa-8c68de723477);"></path>
                                            </g>
                                            <g style="mask:url(#a6c55b45-8dfb-4bcd-b9e2-0b3c475bc258);">
                                            <path d="M140.26,74.79q-1.38-11.64-2.74-23.3c1.33,5,2.8,9.48,3.68,14.13,2.37,12.46,3.07,24.49,4.63,38.14-1.86-9.65-3.58-21.18-5.57-29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b00c445f-3c57-4dcb-aaf6-0285501c74c0);"></path>
                                            </g>
                                            <path d="M131.46,322.25c-5.45,4.53-12.44,7.94-18.26,11-.64.33-1.34.67-.71.77A118.06,118.06,0,0,0,136,322.91c2.86-1.75,3.7-2.49,4.88-5.67A57.94,57.94,0,0,0,144,305l-1.46.8a36.16,36.16,0,0,1-11.07,16.46Z" transform="translate(0 0)" style="fill:#c82c2c;fill-rule:evenodd;"></path>
                                            <g style="mask:url(#be528868-7b1c-4bc4-b8db-88e1dced1d7e);">
                                            <path d="M81.59,5q-.16,11.85-.35,23.72L138.69,63c-.77-6.22-2.15-13.91-.13-15.26-4.4-25.75-18.63-31.31-34.48-37.31A137.25,137.25,0,0,0,81.59,5Z" transform="translate(0 0)" style="fill:#fae16c;fill-rule:evenodd;"></path>
                                            </g>
                                            <g style="mask:url(#a1dc7f7c-32f0-4664-b566-1c47b7b10e43);">
                                            <path d="M81,5q.18,11.86.35,23.73L23.89,63c.77-6.21,2.15-13.91.12-15.25C28.41,22,42.65,16.4,58.49,10.41A138.26,138.26,0,0,1,81,5Z" transform="translate(0 0)" style="fill:#fae16c;fill-rule:evenodd;"></path>
                                            </g>
                                            <path d="M41.12,333.66a3.28,3.28,0,0,0,3.07,2.83c16.16,4.85,57.63,4.85,73.79,0a3.28,3.28,0,0,0,3.07-2.83,202.74,202.74,0,0,1-39.29,3.71,203.94,203.94,0,0,1-40.63-3.71Z" transform="translate(0 0)" style="fill:#9d7005;fill-rule:evenodd;"></path>
                                            <path d="M30.87,322.24c5.45,4.52,12.43,7.94,18.26,11,.63.33,1.33.68.7.77a117.5,117.5,0,0,1-23.49-11.1c-2.86-1.75-3.69-2.48-4.88-5.66A58.65,58.65,0,0,1,18.33,305l1.47.8a41.4,41.4,0,0,0,11.07,16.47Z" transform="translate(0 0)" style="fill:#c82c2c;fill-rule:evenodd;"></path>
                                            <path d="M145.31,117.79h0c.51,0,.93,2,.93,4.38h0c0,2.42-.42,4.38-.93,4.38h0c-.51,0-.92-2-.92-4.38h0C144.39,119.75,144.8,117.79,145.31,117.79Z" transform="translate(0 0)" style="fill:#070603;fill-rule:evenodd;"></path>
                                            <path d="M126.66,220.37,130.35,155c2.63-12.94,5.23-26.82,7.28-40,.75-4.87,1.61-9.24,2.61-13.86.42-2,.9-2.77,1.32-2.79s.66.29.69,1.83c4.12,58.65.83,116.72-3.71,175.17a22.45,22.45,0,0,1-.51,4c-.47,1.8-2.31,8.86-4.91,9.3-1.28.21-1.59-2.38-1.76-5.1-1.34-20.94-3.36-42.29-4.7-63.23Z" transform="translate(0 0)" style="fill:#070603;fill-rule:evenodd;"></path>
                                            <path d="M150.91,188.58A128.23,128.23,0,0,1,140.39,196c-3.51,2.25-7,4.1-10.62,6l.12.89q5.48-2.81,10.75-6.17c3.51-2.25,6.88-4.65,10.27-7.31v-.76Z" transform="translate(0 0)" style="fill:#aa7900;"></path>
                                            <path d="M150.78,107.11c-1.32.24-2.66.44-4,.59s-2.6.29-3.88.4l0,.25c1.28-.11,2.58-.23,3.88-.39s2.6-.35,3.94-.6v-.25Z" transform="translate(0 0)" style="fill:#aa7900;"></path>
                                            <path d="M150.08,272.12l-.67.14a16.58,16.58,0,0,0-4.13,1.26c-.59.3-1.15.65-1.73,1a17.08,17.08,0,0,1-4.63,2l-.06.39a17.61,17.61,0,0,0,4.8-1.86c.58-.36,1.15-.8,1.73-1.09a16.45,16.45,0,0,1,4.07-1.44l.67-.15,0-.24Z" transform="translate(0 0)" style="fill:#aa7900;"></path>
                                            <path d="M140.57,101.9a3,3,0,0,0-1.73-1.54,4.21,4.21,0,0,0-2.3-.16l0,.27a4.23,4.23,0,0,1,2.25.12,3.5,3.5,0,0,1,1.74,1.68l.07-.37Z" transform="translate(0 0)" style="fill:#aa7900;"></path>
                                            <path d="M149.85,168.38c-.37-.94-1.24-1-1.88.17a5.31,5.31,0,0,0-.54,3.09c4.27,1.13.1,9.05.14,9.54l.33,4.06a1.37,1.37,0,0,0,2.14-.3c.8-2.39.69-3.43.81-6,.18-3.94.76-6.1-1-10.6Z" transform="translate(0 0)" style="fill:#aa750d;fill-rule:evenodd;"></path>
                                            <path d="M150,168.69c-.37-.93-.74-1.27-1.38-.14a5.31,5.31,0,0,0-.54,3.09,2.13,2.13,0,0,1,1.67,1.93c0,1.49,0,3-.07,4.47a2.07,2.07,0,0,1-.65,1.41c-.86.94-.91.38-.81,1.73l.33,4.06c.38.47.86.56,1.6-.4a17.31,17.31,0,0,0,1.35-5.87c.19-3.93.27-5.78-1.5-10.28Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e40c5f33-e046-4fda-b96f-56a5ff086649);"></path>
                                            <g style="mask:url(#bcdbbb90-a393-4b95-81d1-a7aee87f945f);">
                                            <path d="M151.21,181.3a13.74,13.74,0,0,0,.27-2.33c.15-3.15.23-5-.65-7.89-.32,1.3,0,2.55,0,4.47s-.15,4.21.39,5.75Z" transform="translate(0 0)" style="fill:#e7e775;fill-rule:evenodd;"></path>
                                            </g>
                                            <path d="M148.67,245.56c-.37-.94-.74-1.27-1.38-.15a5.35,5.35,0,0,0-.54,3.1,2.14,2.14,0,0,1,1.67,1.93c0,1.49,0,3-.07,4.47a2.07,2.07,0,0,1-.65,1.41c-.86.94-.92.38-.81,1.73l.33,4.06c.38.47.86.56,1.6-.4a17.31,17.31,0,0,0,1.35-5.87c.19-3.93.27-5.78-1.5-10.28Z" transform="translate(0 0)" style="fill:#e7e70f;fill-rule:evenodd;"></path>
                                            <path d="M147,118.64c-1.45,0-1.25.63-1.37,2.25a61.84,61.84,0,0,0-.21,7c.12,2.55.53,3,2.64,3.58,3.59,1,6.72,2,10.34,3.09,2.3.68,4.33.59,4.48-1.57a5.07,5.07,0,0,0-1-3.16,26.75,26.75,0,0,0-9.12-9.21c-2.41-1.53-2.89-1.89-5.76-2Z" transform="translate(0 0)" style="fill:#f3a601;fill-rule:evenodd;"></path>
                                            <path d="M148.86,131.71c3.09.91,6.08,1.86,9.21,2.76.9.26,3.07,1,3.62-.12.34-.66-.32-.69-.91-.94a57.27,57.27,0,0,0-6.09-2.17l-6.4-1.92c-1.17-.38-2.06-.56-2.35-.34-1,.77,2,2.45,2.92,2.73Z" transform="translate(0 0)" style="fill:#070603;fill-rule:evenodd;"></path>
                                            <g style="mask:url(#e8b2f98d-6798-41d5-a428-760a4e9e6257);">
                                            <path d="M156.93,126a22.84,22.84,0,0,0-9.54-6.27l-.06,7.13,9.6-.86Z" transform="translate(0 0)" style="fill:#ffeb5c;fill-rule:evenodd;"></path>
                                            </g>
                                            <path d="M143.39,194a148,148,0,0,1-13.62,7.93l.08.61a140.14,140.14,0,0,0,13.52-8l0-.53Z" transform="translate(0 0)" style="fill:#201f1f;"></path>
                                            <path d="M148.63,245.23c-.37-.93-1.24-.95-1.88.17a5.33,5.33,0,0,0-.54,3.1c4.28,1.12.1,9.05.14,9.53l.33,4.07a1.39,1.39,0,0,0,2.15-.3c.8-2.39.68-3.43.8-6,.18-3.93.76-6.1-1-10.6Z" transform="translate(0 0)" style="fill:#aa750d;fill-rule:evenodd;"></path>
                                            <path d="M148.76,245.55c-.37-.94-.74-1.27-1.38-.15a5.33,5.33,0,0,0-.54,3.1,2.13,2.13,0,0,1,1.67,1.93c0,1.49,0,3-.07,4.47a2,2,0,0,1-.65,1.41c-.86.94-.91.37-.81,1.73l.33,4.06c.38.47.86.56,1.6-.4a17.31,17.31,0,0,0,1.35-5.87c.19-3.93.27-5.78-1.5-10.28Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bcb916e3-1959-4e89-ba8d-a2a697a5bb4b);"></path>
                                            <g style="mask:url(#ffbb9fa7-d7da-479c-bb5d-9ab67a38e362);">
                                            <path d="M150,258.15a15,15,0,0,0,.26-2.32c.15-3.16.23-5-.65-7.89-.31,1.3,0,2.54,0,4.46s-.15,4.22.4,5.75Z" transform="translate(0 0)" style="fill:#e7e775;fill-rule:evenodd;"></path>
                                            </g>
                                            <g style="mask:url(#eb43ef1c-e2b5-4866-9ffb-839ef3457b2e);">
                                            <path d="M144.07,146c.05,16.19,0,32.38-.7,48.52l-13.59,8.06q1.13-28,2.26-56c2.17-11.88,4-24.16,6.12-36,.6-3.26,1.56-7.13,2.37-10.39a4.07,4.07,0,0,1,.63-1.4c.59-.8,1-.19,1.11,1.74.38,6.16.86,12.3,1,18.44.27,9,.39,18.07.75,27.1Z" transform="translate(0 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                            </g>
                                            <path d="M132.05,146.49c.69-3.91,1.82-7.83,2.51-11.93,1.83-10.94,3.68-22,6-32.72a15.36,15.36,0,0,1,.46-1.77,5.51,5.51,0,0,1,.46-1.07c0,.12.07.29.12.52a14.58,14.58,0,0,1,.26,2.38l1.42,35.87c1.32,33.37-.88,70.64-2.87,104.38l-.21,3.43c-.14,2-.26,4.6-.4,7.54-.49,10.33-1.17,24.7-3.65,30.62-1.55,3.37-2.62,4.81-3.22,4.41-.78-.52-1.22-3.13-1.35-7.76v0l-3.31-37.22h0l2.37,37.29c.14,4.94.72,7.79,1.76,8.49,1.21.82,2.75-.76,4.61-4.8v0c2.54-6.07,3.23-20.54,3.72-30.94.14-2.91.26-5.5.41-7.52l.2-3.44c2-33.76,4.19-71.05,2.87-104.47l-1.41-35.88a16.14,16.14,0,0,0-.28-2.53c-.16-.76-.43-1.25-.81-1.37l-.06,0c-.36-.08-.69.12-1,.56a5.67,5.67,0,0,0-.56,1.28,16.27,16.27,0,0,0-.49,1.86c-2.36,10.75-4.21,21.8-6.05,32.77-.67,4-.87,8.06-1.59,12.16v-.08Zm9.43-47.62h0Z" transform="translate(0 0)" style="fill:#393837;"></path>
                                            <g style="mask:url(#ae9170d4-3ff2-47d6-9ba4-9fdd17175d94);">
                                            <path d="M132.05,146.53c.68-3.91,1.07-7.87,1.75-12,1.84-10.95,3.69-22,6-32.73a18.23,18.23,0,0,1,.47-1.77,4.62,4.62,0,0,1,.46-1.06q0,.17.12.51a14.71,14.71,0,0,1,.26,2.38l1.42,35.87c1.32,33.37-.88,70.65-2.88,104.38l-.2,3.43c-.14,2-.27,4.6-.41,7.55-.49,10.32-1.17,24.69-3.64,30.62-5.48,14.95-5.88-37.21-7.13-40.6h0l1.62,37.29c.13,4.94.72,7.79,1.76,8.5,1.21.81,2.74-.77,4.61-4.81v0c2.54-6.07,3.22-20.54,3.72-30.94.13-2.91.26-5.5.4-7.52l.21-3.44c2-33.75,4.19-71.05,2.87-104.47l-1.42-35.87a16.31,16.31,0,0,0-.27-2.54c-.64-2.93-1.55-.71-2,.6a14.94,14.94,0,0,0-.54,1.81c-3.37,15.42-4.64,29.83-7.25,44.75v0Zm8.67-47.65h0Z" transform="translate(0 0)" style="fill:url(#a206fb28-a9ac-4efd-9c0b-a9828fbde9bf);"></path>
                                            </g>
                                            <g style="mask:url(#befbcec7-e6f7-4544-b19e-516539f943ff);">
                                            <path d="M24.59,302.81,15,201.47q1.83,47.67,3.67,95.34a34.94,34.94,0,0,0,1.3,9.28A35.63,35.63,0,0,0,28.48,320c4.42,4.56,11.41,8.32,16.91,11.27,3,1.22-.25-1-1.94-2.4-10.67-8.59-17.55-15.29-18.86-26.07Z" transform="translate(0 0)" style="fill:#bd810f;fill-rule:evenodd;"></path>
                                            </g>
                                            <g style="mask:url(#af6666d1-a490-49de-9841-f5c9ad7a4be1);">
                                            <path d="M30.87,322.24c5.45,4.52,12.43,7.94,18.26,11,.63.33,1.33.68.7.77a117.5,117.5,0,0,1-23.49-11.1l-.15-.09,4.31-.89Z" transform="translate(0 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                            </g>
                                            <g style="mask:url(#b6a3223b-d843-43d7-a569-20db22183d6c);">
                                            <path d="M131.45,322.32c-5.45,4.52-12.44,7.93-18.26,11-.63.33-1.33.67-.7.77A118.32,118.32,0,0,0,136,323l.14-.09-4.31-.9-.36.34Z" transform="translate(0 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                            </g>
                                            <g style="mask:url(#af6666d1-a490-49de-9841-f5c9ad7a4be1);">
                                            <path d="M30.87,322.24c5.45,4.52,12.43,7.94,18.26,11,.63.33,1.33.68.7.77a117.5,117.5,0,0,1-23.49-11.1l-.15-.09,4.31-.89Z" transform="translate(0 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                            </g>
                                            <path d="M44.2,201.89h75.93c2.92,0,5.28,2.88,5.28,6.44v11.23c0,3.55-2.36,6.43-5.28,6.43H44.2c-2.92,0-5.28-2.88-5.28-6.43V208.33C38.92,204.77,41.28,201.89,44.2,201.89Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#fd94ef7c-7e76-4b97-83d7-13763d10c6cb);"></path>
                                            <g style="mask:url(#b6a3223b-d843-43d7-a569-20db22183d6c);">
                                            <path d="M131.45,322.32c-5.45,4.52-12.44,7.93-18.26,11-.63.33-1.33.67-.7.77A118.32,118.32,0,0,0,136,323l.14-.09-4.31-.9-.36.34Z" transform="translate(0 0)" style="fill:#ff2e31;fill-rule:evenodd;"></path>
                                            </g>
                                            <g style="clip-path:url(#aae47d52-61ab-4824-b535-579b3bcb5fb3);">
                                            <g style="mask:url(#aeab539d-eb3b-4573-a770-54265ababb95);">
                                                <polygon points="19.75 20.05 34.69 20.05 34.69 52.05 19.75 52.05 19.75 20.05" style="fill:#fefefe;fill-rule:evenodd;"></polygon>
                                            </g>
                                            </g>
                                            <g style="clip-path:url(#aae47d52-61ab-4824-b535-579b3bcb5fb3);">
                                            <g style="mask:url(#fa9df6b0-c879-4d4d-9674-29899fc9e3d0);">
                                                <path id="bae586ef-64dc-46b6-bcc5-97fd79b8b4e8" data-name="1" d="M25.5,29.87c4.71,0,8.54,2.42,8.54,5.41s-3.83,5.41-8.54,5.41S17,38.27,17,35.28,20.79,29.87,25.5,29.87Z" transform="translate(0 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                            </g>
                                            </g>
                                            <path d="M33.17,20.29c-5.89,3.94-10.08,8.1-11.94,13.56-1.66,4.89-1.78,12.49-1.06,16.57.25,1.4.67,1.56,1.12,1.62,1.14.13,1-1.09,1.36-2.21,2.83-10,3.27-17.32,12-27.35-.09-.94-.2-1.36-.29-1.9S33.75,19.9,33.17,20.29Z" transform="translate(0 0)" style="fill:none;"></path>
                                            <g style="clip-path:url(#b4ff4e81-72ab-4e2f-b192-9812b09e115d);">
                                            <g style="mask:url(#e0e039cc-f243-4a69-86ce-3717981e46c0);">
                                                <polygon points="127.92 20.05 142.85 20.05 142.85 52.05 127.92 52.05 127.92 20.05" style="fill:#fefefe;fill-rule:evenodd;"></polygon>
                                            </g>
                                            </g>
                                            <g style="clip-path:url(#b4ff4e81-72ab-4e2f-b192-9812b09e115d);">
                                            <g style="mask:url(#b5b714b5-99f5-48ca-a1d3-748892676f65);">
                                                <path id="b84c8ef8-981a-4086-835e-3a1d095b6638" data-name="1" d="M137.1,29.87c-4.71,0-8.53,2.42-8.53,5.41s3.82,5.41,8.53,5.41,8.54-2.42,8.54-5.41S141.82,29.87,137.1,29.87Z" transform="translate(0 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                            </g>
                                            </g>
                                            <path d="M129.43,20.29c5.89,3.94,10.09,8.1,11.94,13.56,1.66,4.89,1.79,12.49,1.06,16.57-.25,1.4-.66,1.56-1.12,1.62-1.13.13-1-1.09-1.36-2.21-2.83-10-3.27-17.32-12-27.35.09-.94.2-1.36.29-1.9s.64-.68,1.22-.29Z" transform="translate(0 0)" style="fill:none;"></path>
                                            <path d="M44.25,13.07c2.24-1.38,5-.9,7-1.9,9.39-4.71,16.62-5.7,28.24-8.42a4.36,4.36,0,0,1,3.14,0c11.92,2.79,19.23,3.76,28.9,8.71,1.84.94,4.34.21,6.39,1.47-2.14-2-4.62-1.75-6.39-3.05C102.88,3.51,97.6,4.14,83.67,1,80.52.24,81.91.18,79.05.84,64.63,4.13,59.19,3.39,50,10.41c-1.56,1.19-3.89,1-5.73,2.66Z" transform="translate(0 0)" style="fill:url(#a4672ccb-1c6e-4e06-9c82-6a1437e6a42f);"></path>
                                            <path d="M79.7,137.51h5.07a3.88,3.88,0,0,1,3.7,4v44.05a3.88,3.88,0,0,1-3.7,4H79.7a3.88,3.88,0,0,1-3.7-4V141.54A3.88,3.88,0,0,1,79.7,137.51Z" transform="translate(0 0)" style="stroke:#211f1f;stroke-miterlimit:6.565829458456051;stroke-width:0.567066616514154px;fill-rule:evenodd;fill:url(#f5484a9d-1d53-4985-8ce6-83f651957ceb);"></path>
                                            <path d="M84.44,151.52a3.55,3.55,0,1,1-4,0,.9.9,0,0,0,.39-.75v-2.05a.86.86,0,0,0-.37-.72,3.33,3.33,0,1,1,3.94,0,.86.86,0,0,0-.37.72v2.05A.88.88,0,0,0,84.44,151.52Z" transform="translate(0 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                            <path d="M82.2,158a3.54,3.54,0,0,1-3.29-3.29,3.08,3.08,0,0,1,1.33-2.31.73.73,0,0,0,.34-.64v-.34a.84.84,0,0,0,.26-.63v-2.05a.88.88,0,0,0-.37-.73,3.3,3.3,0,0,1-1.25-1.85,2.88,2.88,0,0,1,5.63.87,3,3,0,0,1-.08.68,3.37,3.37,0,0,1-.36.3.9.9,0,0,0-.36.73V149a3,3,0,0,1-.38.33.74.74,0,0,0-.32.62v1.78a.75.75,0,0,0,.34.64A3.07,3.07,0,0,1,82.2,158Z" transform="translate(0 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                            <path d="M78.44,165h7.73a1,1,0,0,1,1,1l.23,25.32a.94.94,0,0,1-.29.72,1,1,0,0,1-.71.3h-8.2a1,1,0,0,1-.72-.3,1,1,0,0,1-.29-.72L77.43,166A1,1,0,0,1,78.44,165Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b1f8c64a-0a9b-4774-8e20-a2b39eb8cb01);"></path>
                                            <g style="mask:url(#e84823b2-e0d0-480d-a66f-5f95a1e953fb);">
                                            <polygon points="87.29 192.26 77.06 192.26 77.97 187.52 85.97 187.52 87.29 192.26" style="fill-rule:evenodd;"></polygon>
                                            </g>
                                            <g style="mask:url(#a3ed7789-184c-42b5-8355-aa1a2e69fa1c);">
                                            <polygon points="77.06 192.26 77.31 164.92 77.97 187.52 77.06 192.26" style="fill-rule:evenodd;"></polygon>
                                            </g>
                                            <g style="mask:url(#be183c89-2bd3-40a4-8668-a72d51558fd3);">
                                            <polygon points="85.97 187.52 87.04 164.92 87.29 192.26 85.97 187.52" style="fill-rule:evenodd;"></polygon>
                                            </g>
                                            <path d="M79,159.06h6.61a.71.71,0,0,1,.58.28.75.75,0,0,1,.16.63l-.06.29a.76.76,0,0,1-.74.6H79a.76.76,0,0,1-.74-.6l-.06-.29a.75.75,0,0,1,.15-.63.73.73,0,0,1,.59-.28Z" transform="translate(0 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                            <path d="M79.11,161.92h6.53a.76.76,0,0,1,.74.92l-.06.28a.75.75,0,0,1-.74.61H79.16a.76.76,0,0,1-.74-.61l-.06-.28a.75.75,0,0,1,.16-.64.72.72,0,0,1,.58-.28Z" transform="translate(0 0)" style="fill:#0b0a08;fill-rule:evenodd;"></path>
                                            <path d="M78.86,159.33h5.62a.64.64,0,0,1,.5.23.62.62,0,0,1,.13.54l0,.25a.63.63,0,0,1-.63.51H78.91a.64.64,0,0,1-.63-.51l0-.25a.65.65,0,0,1,.13-.54.65.65,0,0,1,.51-.23Z" transform="translate(0 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                            <path d="M79,162.19h5.61a.63.63,0,0,1,.51.24.63.63,0,0,1,.13.53l0,.25a.65.65,0,0,1-.63.51H79.08a.63.63,0,0,1-.63-.51l0-.25a.6.6,0,0,1,.13-.53.62.62,0,0,1,.5-.24Z" transform="translate(0 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                            <path d="M78.86,159.33h5.62a.64.64,0,0,1,.5.23.62.62,0,0,1,.13.54l0,.25a.63.63,0,0,1-.63.51H78.91a.64.64,0,0,1-.63-.51l0-.25a.65.65,0,0,1,.13-.54.65.65,0,0,1,.51-.23Z" transform="translate(0 0)" style="fill:#444545;fill-rule:evenodd;"></path>
                                            <g style="mask:url(#a71ec249-e39b-40ee-a1c1-7d5e9d4024d6);">
                                            <path d="M28.43,122c4.44-5.14,8.76-8.86,13.7-11.23s10.49-3.4,17.36-3.15a13.4,13.4,0,0,1,5.29.86c1.43.68,2.52,1.92,3.45,4.27a58.34,58.34,0,0,1,1.94,6.4c.9,3.41,1.77,6.74,3.15,8.51,3.57,4.58,14.46,4.12,17.42.63,3.38-4,4.27-7.52,5.23-11.35.32-1.3.65-2.63,1.09-4,1.69-5.36,5.63-5.33,10-5.3h.21a39.82,39.82,0,0,1,15.18,3.75,31.58,31.58,0,0,1,10.17,6.86c0,.23-.05.52-.09.85-2.2-2.64-6-5.18-10.33-7.13a39.23,39.23,0,0,0-14.93-3.7h-.21c-4.12,0-7.84-.05-9.4,4.86-.43,1.38-.76,2.7-1.08,4-1,3.9-1.88,7.51-5.35,11.6-3.25,3.82-14.61,4.22-18.4-.66-1.46-1.87-2.35-5.26-3.27-8.73A58.63,58.63,0,0,0,67.65,113c-.87-2.18-1.86-3.32-3.14-3.93a12.94,12.94,0,0,0-5-.8c-6.76-.25-12.22.75-17.07,3.08s-9.11,6-13.49,11.08l-.48-.41Z" transform="translate(0 0)" style="fill:#636363;"></path>
                                            </g>
                                            <path d="M103,94.86c-13.28-3-26.94-2.65-40.93,0l-2.8,5a77.9,77.9,0,0,1,47.13,0C105.25,98.31,104.11,96.46,103,94.86Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#fcb5e314-e531-43bc-a562-124b6699c097);"></path>
                                            <path d="M63.05,98.81a77.32,77.32,0,0,1,39.67.07V95.61a235.65,235.65,0,0,0-39.67,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a47a4d74-7720-4005-9b69-ed5ff1a8338e);"></path>
                                            <g style="mask:url(#a03e17f6-ea34-4041-9122-afadb7d04599);">
                                            <path d="M32.67,132.86c-1.34-9.27-2.68-21.4-4-32.08C26.5,83.6,54.13,78.32,82.05,78.53c27.24.2,54.81,5.49,52.7,22.25-1.34,10.68-2.68,22.81-4,32.08-34.2.48-63.86.48-98.06,0Z" transform="translate(0 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                            </g>
                                            <polygon points="77.78 81.69 75.52 81.62 75.51 84.32 78.25 84.39 77.78 81.69" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                            <polygon points="31.64 84.72 31.64 82.32 40.45 80.52 40.64 82.78 31.64 84.72" style="fill-rule:evenodd;fill:url(#ffd39e70-17dc-468a-b7b4-86aa8997ce99);"></polygon>
                                            <polygon points="40.64 82.78 40.45 80.52 78.51 81.72 78.58 82.92 40.64 82.78" style="fill-rule:evenodd;fill:url(#ad55d23e-5685-4ab1-9cf9-d6499d1735b6);"></polygon>
                                            <circle cx="33.01" cy="83.22" r="0.77" style="fill:#575757;"></circle>
                                            <polygon points="49.71 85.98 50.64 84.18 105.65 83.12 105.25 85.12 49.71 85.98" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                            <polygon points="82.81 76.53 85.07 76.62 84.89 79.31 82.16 79.19 82.81 76.53" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                            <polygon points="128.62 82.79 128.79 80.39 120.14 77.98 119.78 80.23 128.62 82.79" style="fill-rule:evenodd;fill:url(#f3f487e0-2576-479e-bded-1f6047db3de4);"></polygon>
                                            <polygon points="119.78 80.23 120.14 77.98 82.08 76.51 81.93 77.7 119.78 80.23" style="fill-rule:evenodd;fill:url(#b59e4952-0f28-4c9e-92e6-b34fafd82953);"></polygon>
                                            <circle cx="127.37" cy="81.19" r="0.77" style="fill:#575757;"></circle>
                                            <polygon points="110.51 82.78 109.71 80.92 54.91 76 55.17 78.02 110.51 82.78" style="fill:#171614;fill-rule:evenodd;"></polygon>
                                            <g style="mask:url(#b3c9d12a-211d-4f06-9873-181bbf5d5d38);">
                                            <path d="M40.4,287.6a674.57,674.57,0,0,0,80.94,0c-1.9,4.05-5.78,15.19-43.29,15.19C44.41,302.8,42.38,291,40.4,287.6Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a1bd8076-a93b-4de2-86a4-f8a5377193ac);"></path>
                                            </g>
                                            <path d="M136.58,248.89c-1.46,16.6,2.91,25.5-10,29.87l.06-13.07.47-16.8Z" transform="translate(0 0)" style="fill:#010000;fill-rule:evenodd;"></path>
                                            <g style="mask:url(#fdbd335d-468e-4d4b-b32a-f8226368362b);">
                                            <path d="M137.72,302.81l9.6-101.34q-1.84,47.67-3.68,95.34a34.54,34.54,0,0,1-1.3,9.28A35.63,35.63,0,0,1,133.82,320c-4.42,4.56-11.4,8.32-16.91,11.27-3,1.22.26-1,2-2.4,10.66-8.59,17.54-15.29,18.85-26.07Z" transform="translate(0 0)" style="fill:#bd810f;fill-rule:evenodd;"></path>
                                            </g>
                                            <path d="M129.82,202a90.66,90.66,0,0,0,12.36-7.23c0,.35,0,.71,0,1.06a133.52,133.52,0,0,1-12.25,7c0-.45,0-.4-.07-.86Z" transform="translate(0 0)" style="fill:#272727;fill-rule:evenodd;"></path>
                                            <path d="M17.54,117.79h0c.51,0,.93,2,.93,4.38h0c0,2.42-.42,4.38-.93,4.38h0c-.51,0-.92-2-.92-4.38h0C16.62,119.75,17,117.79,17.54,117.79Z" transform="translate(0 0)" style="fill:#070603;fill-rule:evenodd;"></path>
                                            <path d="M36.19,220.37Q34.35,187.71,32.51,155c-2.63-12.94-5.24-26.82-7.28-40-.76-4.87-1.62-9.24-2.61-13.86-.43-2-.91-2.77-1.33-2.79s-.65.29-.69,1.83c-4.12,58.65-.82,116.72,3.72,175.17a21.56,21.56,0,0,0,.5,4c.47,1.8,2.32,8.86,4.91,9.3,1.28.21,1.59-2.38,1.77-5.1,1.33-20.94,3.36-42.29,4.69-63.23Z" transform="translate(0 0)" style="fill:#070603;fill-rule:evenodd;"></path>
                                            <path d="M11.94,188.58c3.37,2.67,7,5.14,10.52,7.39s7,4.1,10.63,6l-.12.89Q27.5,200,22.22,196.65C18.7,194.4,15.33,192,12,189.34v-.76Z" transform="translate(0 0)" style="fill:#aa7900;"></path>
                                            <path d="M12.07,107.11c1.32.24,2.66.44,4,.59s2.59.29,3.88.4l0,.25c-1.29-.11-2.58-.23-3.89-.39s-2.6-.35-3.94-.6v-.25Z" transform="translate(0 0)" style="fill:#aa7900;"></path>
                                            <path d="M12.78,272.12l.67.14a16.71,16.71,0,0,1,4.13,1.26c.58.3,1.14.65,1.73,1a17,17,0,0,0,4.62,2l.06.39a17.87,17.87,0,0,1-4.8-1.86A20,20,0,0,0,17.46,274a16.45,16.45,0,0,0-4.07-1.44l-.67-.15.06-.24Z" transform="translate(0 0)" style="fill:#aa7900;"></path>
                                            <path d="M22.28,101.9a3.16,3.16,0,0,1,1.83-1.54,4.65,4.65,0,0,1,2.42-.16l0,.27a4.72,4.72,0,0,0-2.38.12,3.67,3.67,0,0,0-1.84,1.68l-.07-.37Z" transform="translate(0 0)" style="fill:#aa7900;"></path>
                                            <path d="M13,168.38c.37-.94,1.24-1,1.87.17a5.23,5.23,0,0,1,.55,3.09c-4.28,1.13-.11,9.05-.14,9.54L15,185.24a1.38,1.38,0,0,1-2.15-.3c-.8-2.39-.69-3.43-.8-6-.19-3.94-.77-6.1,1-10.6Z" transform="translate(0 0)" style="fill:#bc820f;fill-rule:evenodd;"></path>
                                            <path d="M12.87,168.69c.37-.93.75-1.27,1.38-.14a5.23,5.23,0,0,1,.55,3.09,2.12,2.12,0,0,0-1.67,1.93l.06,4.47a2,2,0,0,0,.66,1.41c.86.94.91.38.8,1.73l-.32,4.06c-.39.47-.86.56-1.6-.4A17.57,17.57,0,0,1,11.37,179c-.18-3.93-.27-5.78,1.5-10.28Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f4e9982e-ca1c-4c01-96e9-3a022e684dcf);"></path>
                                            <g style="mask:url(#fd0cc9d0-3a3e-4183-a2fd-d2dd0c3b6ee7);">
                                            <path d="M11.64,181.3a14.84,14.84,0,0,1-.27-2.33c-.14-3.15-.23-5,.66-7.89.31,1.3,0,2.55,0,4.47s.15,4.21-.4,5.75Z" transform="translate(0 0)" style="fill:#ffff82;fill-rule:evenodd;"></path>
                                            </g>
                                            <path d="M14.18,245.56c.37-.94.74-1.27,1.38-.15a5.27,5.27,0,0,1,.54,3.1,2.14,2.14,0,0,0-1.66,1.93l.06,4.47a2,2,0,0,0,.66,1.41c.86.94.91.38.8,1.73l-.33,4.06c-.38.47-.85.56-1.6-.4a17.55,17.55,0,0,1-1.35-5.87c-.18-3.93-.27-5.78,1.5-10.28Z" transform="translate(0 0)" style="fill:#e7e70f;fill-rule:evenodd;"></path>
                                            <path d="M15.88,118.64c1.46,0,1.26.63,1.37,2.25a64.47,64.47,0,0,1,.22,7c-.13,2.55-.53,3-2.64,3.58-3.6,1-6.73,2-10.34,3.09-2.31.68-4.33.59-4.48-1.57a5.06,5.06,0,0,1,1-3.16,26.7,26.7,0,0,1,9.13-9.21c2.41-1.53,2.88-1.89,5.75-2Z" transform="translate(0 0)" style="fill:#f3a601;fill-rule:evenodd;"></path>
                                            <path d="M14,131.71c-3.1.91-6.09,1.86-9.21,2.76-.91.26-3.07,1-3.63-.12-.34-.66.32-.69.91-.94a57.45,57.45,0,0,1,6.1-2.17l6.39-1.92c1.17-.38,2.06-.56,2.35-.34,1,.77-2,2.45-2.92,2.73Z" transform="translate(0 0)" style="fill:#070603;fill-rule:evenodd;"></path>
                                            <g style="mask:url(#a05e3d64-cbaa-48ff-b18f-8ac88c9a1078);">
                                            <path d="M5.93,126a22.81,22.81,0,0,1,9.53-6.27q0,3.57.07,7.13Z" transform="translate(0 0)" style="fill:#ffeb5c;fill-rule:evenodd;"></path>
                                            </g>
                                            <path d="M19.46,194a146.85,146.85,0,0,0,13.63,7.93l-.09.61a138.71,138.71,0,0,1-13.51-8l0-.53Z" transform="translate(0 0)" style="fill:#201f1f;"></path>
                                            <path d="M14.23,245.23c.36-.93,1.23-.95,1.87.17a5.33,5.33,0,0,1,.54,3.1c-4.27,1.12-.1,9.05-.14,9.53l-.32,4.07a1.39,1.39,0,0,1-2.15-.3c-.8-2.39-.69-3.43-.81-6-.18-3.93-.76-6.1,1-10.6Z" transform="translate(0 0)" style="fill:#aa750d;fill-rule:evenodd;"></path>
                                            <path d="M14.09,245.55c.37-.94.74-1.27,1.38-.15a5.33,5.33,0,0,1,.54,3.1,2.11,2.11,0,0,0-1.66,1.93l.06,4.47a2,2,0,0,0,.66,1.41c.86.94.91.37.8,1.73l-.32,4.06c-.39.47-.87.56-1.61-.4a17.8,17.8,0,0,1-1.35-5.87c-.18-3.93-.27-5.78,1.5-10.28Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ff7f6303-9bc9-468f-82bb-d968278fe797);"></path>
                                            <g style="mask:url(#ac73dfb0-d698-40af-b70d-48c81ed4a074);">
                                            <path d="M12.86,258.15a13.73,13.73,0,0,1-.27-2.32c-.15-3.16-.23-5,.66-7.89.31,1.3,0,2.54,0,4.46s.15,4.22-.39,5.75Z" transform="translate(0 0)" style="fill:#e7e775;fill-rule:evenodd;"></path>
                                            </g>
                                            <g style="mask:url(#b843c766-88f2-4a27-a21e-fe63f726db63);">
                                            <path d="M18.78,146c0,16.19,0,32.38.7,48.52l13.6,8.06q-1.12-28-2.26-56c-2.17-11.88-4-24.16-6.13-36-.59-3.26-1.55-7.13-2.37-10.39a3.73,3.73,0,0,0-.63-1.4c-.59-.8-1-.19-1.1,1.74-.38,6.16-.87,12.3-1.05,18.44-.28,9-.4,18.07-.76,27.1Z" transform="translate(0 0)" style="fill:#fefefe;fill-rule:evenodd;"></path>
                                            </g>
                                            <path d="M30.8,146.49c-.68-3.91-1.82-7.83-2.5-11.93-1.84-10.94-3.69-22-6-32.72a17.48,17.48,0,0,0-.47-1.77A5,5,0,0,0,21.33,99c0,.12-.07.29-.12.52A14.58,14.58,0,0,0,21,101.9l-1.42,35.87c-1.32,33.37.88,70.64,2.88,104.38l.2,3.43c.14,2,.27,4.6.41,7.54.49,10.33,1.17,24.7,3.64,30.62,1.56,3.37,2.63,4.81,3.23,4.41.77-.52,1.22-3.13,1.34-7.76v0l3.31-37.22h0l-2.37,37.29c-.13,4.94-.71,7.79-1.76,8.49-1.21.82-2.74-.76-4.61-4.8v0c-2.54-6.07-3.22-20.54-3.72-30.94-.13-2.91-.26-5.5-.4-7.52l-.21-3.44c-2-33.76-4.19-71.05-2.87-104.47L20,101.86a17.45,17.45,0,0,1,.28-2.53c.17-.76.44-1.25.8-1.37l.07,0c.36-.08.69.12,1,.56a5.67,5.67,0,0,1,.56,1.28,18.65,18.65,0,0,1,.49,1.86c2.36,10.75,4.21,21.8,6,32.77.67,4,.87,8.06,1.59,12.16l0-.08ZM21.37,98.87h0Z" transform="translate(0 0)" style="fill:#393837;"></path>
                                            <g style="mask:url(#afe67841-348f-4dff-b375-760da5f121f0);">
                                            <path d="M30.81,146.53c-.69-3.91-1.07-7.87-1.76-12-1.83-10.95-3.68-22-6-32.73-.15-.69-.3-1.28-.46-1.77A5.72,5.72,0,0,0,22.09,99c0,.11-.08.28-.13.51a15.94,15.94,0,0,0-.26,2.38l-1.41,35.87c-1.32,33.37.88,70.65,2.87,104.38l.2,3.43c.15,2,.27,4.6.41,7.55.49,10.32,1.17,24.69,3.65,30.62,5.48,14.95,5.88-37.21,7.12-40.6h0l-1.61,37.29c-.14,4.94-.72,7.79-1.76,8.5-1.22.81-2.75-.77-4.62-4.81v0C24,278,23.32,263.57,22.83,253.17c-.14-2.91-.26-5.5-.41-7.52l-.2-3.44c-2-33.75-4.2-71.05-2.88-104.47l1.42-35.87A15,15,0,0,1,21,99.33c.63-2.93,1.55-.71,2,.6a14.94,14.94,0,0,1,.54,1.81c3.38,15.42,4.64,29.83,7.25,44.75v0ZM22.13,98.88h0Z" transform="translate(0 0)" style="fill:url(#e07498f2-43cf-4337-a332-c2f18d66c825);"></path>
                                            </g>
                                            <path d="M33.05,202a87.5,87.5,0,0,1-12.36-7.23c0,.35,0,.71,0,1.06a133.52,133.52,0,0,0,12.25,7c0-.45,0-.4.07-.86Z" transform="translate(0 0)" style="fill:#272727;fill-rule:evenodd;"></path>
                                            <path d="M27.14,250c1.46,16.59-2.91,25.49,10,29.86l-.06-13.06L36.61,250Z" transform="translate(0 0)" style="fill:#010000;fill-rule:evenodd;"></path>
                                            <rect x="97.67" y="243.96" width="2.33" height="3.43" rx="0.38" style="fill:#ff1a1d;"></rect>
                                            <rect x="61.44" y="243.96" width="2.33" height="3.43" rx="0.38" style="fill:#ff1a1d;"></rect>
                                            <path d="M39.78,176.89a6.13,6.13,0,0,1,3,.48c-3.87-6.93-5-16.5-4.24-27.87.47-4.4,3.41-6.38,7.48-7.31,4.95-1.14,15.29-1.14,20.25,0,4.06.93,7,2.91,7.48,7.31.75,11.37-.37,20.94-4.25,27.87a6.17,6.17,0,0,1,3-.48c1.76.27,1.84,1,1.79,2.23-.27,6.76-.62,13.44-2.21,17.93-1.19,3.37-2.16,4.26-5.45,5.3-5.23,1.66-15.78,1.66-21,0-3.29-1-4.25-1.93-5.45-5.3-1.59-4.49-1.93-11.17-2.21-17.93C37.93,177.87,38,177.15,39.78,176.89Z" transform="translate(0 0)" style="fill:#0f0f0f;fill-rule:evenodd;"></path>
                                            <path d="M46.45,176.2a114.49,114.49,0,0,0,19.42.09c.15.46.31,1,.48,1.43s.42.93.92.92c1.53,0,5-1.75,5.14-1.74s.25.06.25.21c-.62,5.83.27,12.76-4.15,16.41a10.2,10.2,0,0,1-2.6,1.3c-.17-.62-.27-2.54-2.29-2.76a81.28,81.28,0,0,0-13.87,0c-2.19.22-2.1,1.75-2.39,2.8a10.38,10.38,0,0,1-3-1.35c-4.4-3.73-4-10.35-4.68-16.32,0-.16.21-.18.39-.21s2.74,1.27,4.33,1.66,1.51-1.33,2-2.42Zm-2.32,4.06c-.27.63-.11,5.61-.11,6.93,0,1.72-.28,3.33,1.37,4.19a3.2,3.2,0,0,0,2.11.19,60.35,60.35,0,0,1,17.7,0,1.38,1.38,0,0,0,1.33-.19c1.53-.87,1.52-2.47,1.52-4.2,0-1.06-.07-6.67-.23-6.93-1.71-2.69-14.33-3.34-20.46-1.9C45.61,178.8,44.44,179.55,44.13,180.26Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a448ea28-df03-40c2-873b-55e38ea9d161);"></path>
                                            <path d="M42,174c-2.37-5.49-3.25-12.31-3-20.16a24.65,24.65,0,0,1,.43-5.09,6.79,6.79,0,0,1,3.42-4.48.76.76,0,0,1,1.08.37l2.42,5.91a.73.73,0,0,1-.17.84,2.16,2.16,0,0,0-.69,1.6v8.29a2.44,2.44,0,0,0,1.72,2.3,2.46,2.46,0,0,0-1.66,2.3v8.25a2.16,2.16,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.57,1.61a.76.76,0,0,1-1.33.18A18.8,18.8,0,0,1,42,174Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#fbafb08c-88ff-42b9-baee-7cd50e77add1);"></path>
                                            <path d="M70.29,174c2.37-5.49,3.25-12.31,3-20.16a24,24,0,0,0-.43-5.09,6.79,6.79,0,0,0-3.42-4.48.76.76,0,0,0-1.08.37L66,150.54a.75.75,0,0,0,.18.84,2.16,2.16,0,0,1,.69,1.6v8.29a2.44,2.44,0,0,1-1.72,2.3,2.46,2.46,0,0,1,1.66,2.3v8.25a2.16,2.16,0,0,1-.68,1.58.75.75,0,0,0-.19.8l.57,1.61a.76.76,0,0,0,1.33.18A19.17,19.17,0,0,0,70.29,174Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#afaa0bac-3d7f-4652-852a-a617868167bd);"></path>
                                            <path d="M48.47,151.24a84,84,0,0,1,15.54,0,2.15,2.15,0,0,1,2,2.14v7.73a2.09,2.09,0,0,1-2,2.14H48.47a2.09,2.09,0,0,1-2-2.14v-7.73A2.15,2.15,0,0,1,48.47,151.24Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e5ba3bd0-e61a-4cb3-af7b-fba851a46fb0);"></path>
                                            <path d="M48.41,175.83a84,84,0,0,0,15.54,0,2.15,2.15,0,0,0,2-2.14V166a2.09,2.09,0,0,0-2-2.14H48.41a2.09,2.09,0,0,0-2,2.14v7.68A2.15,2.15,0,0,0,48.41,175.83Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ae70a000-9341-4504-8401-9e1ffa9c9e3d);"></path>
                                            <path d="M67.09,181.23c0,2.11,0,5.31,0,7.42a2.08,2.08,0,0,1-2.12,2.2,61.85,61.85,0,0,0-17.87,0,2.07,2.07,0,0,1-2.12-2.2c0-2.11.05-5.31,0-7.42-.08-4,22-3.16,22.11,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b348c610-5f97-40b8-9192-cfcc61fb1437);"></path>
                                            <path d="M50.75,192.87h11.9a2.79,2.79,0,0,1,2.51,2.78v3.42a2.49,2.49,0,0,1-2.51,2.45H50.75a2.49,2.49,0,0,1-2.51-2.45v-3.42A2.79,2.79,0,0,1,50.75,192.87Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b8b1e40f-d615-4468-bdff-d6bbc4e367d4);"></path>
                                            <path d="M64.43,150.61a.73.73,0,0,0,.75-.44c.67-1.45,1.33-2.91,2-4.36.36-.77,1.08-1.88,0-2.37-3.45-1.5-18.18-1.5-21.62,0-1.11.48-.39,1.6,0,2.37l2,4.36a.73.73,0,0,0,.75.44A87.67,87.67,0,0,1,64.43,150.61Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ac0df9d4-fe63-43d8-95ba-e0e79b1d62f0);"></path>
                                            <path d="M41.24,199.05c-3.14-6.11-2.89-13.69-3.25-19.69-.11-1.83.2-2.2,1.85-2.47.89,6.89,0,15.78,7.53,18-.36,4.94-.22,7.56,3.06,7.56,1.94.06,3.47,0,5.08,0v0c2.9-.09,4.76.14,7.65,0s3.08-2.62,2.76-7.56c6.78-2.18,6-11,6.77-17.91,1.49.28,1.73.78,1.64,2.43-.31,6-.06,13.57-2.9,19.69a4.91,4.91,0,0,1-3,2.83c-3.18,1.57-6.55,1.68-9.9,1.66h0c-4.66,0-9.49.35-14-1.64-1.71-.76-2.44-1.13-3.32-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ab24a5ed-c21d-48ec-9e23-7bbc0bdcf0d3);"></path>
                                            <path d="M92.17,176.89a6.13,6.13,0,0,1,3,.48c-3.87-6.93-5-16.5-4.24-27.87.48-4.4,3.41-6.38,7.48-7.31,5-1.14,15.29-1.14,20.25,0,4.06.93,7,2.91,7.48,7.31.75,11.37-.37,20.94-4.24,27.87a6.12,6.12,0,0,1,3-.48c1.76.27,1.85,1,1.79,2.23-.27,6.76-.62,13.44-2.21,17.93-1.19,3.37-2.16,4.26-5.44,5.3-5.24,1.66-15.79,1.66-21,0-3.29-1-4.25-1.93-5.45-5.3-1.59-4.49-1.93-11.17-2.21-17.93C90.32,177.87,90.4,177.15,92.17,176.89Z" transform="translate(0 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                            <path d="M98.84,176.2a114.49,114.49,0,0,0,19.42.09c.15.46.31,1,.48,1.43s.42.93.92.92c1.53,0,5-1.75,5.14-1.74s.26.06.25.21c-.62,5.83.27,12.76-4.15,16.41a10.2,10.2,0,0,1-2.6,1.3c-.17-.62-.27-2.54-2.29-2.76a81.28,81.28,0,0,0-13.87,0c-2.18.22-2.1,1.75-2.38,2.8a10.33,10.33,0,0,1-3-1.35c-4.4-3.73-4-10.35-4.68-16.32,0-.16.21-.18.39-.21s2.74,1.27,4.33,1.66,1.51-1.33,2-2.42Zm-2.32,4.06c-.27.63-.12,5.61-.12,6.93,0,1.72-.27,3.33,1.38,4.19a3.17,3.17,0,0,0,2.1.19,60.41,60.41,0,0,1,17.71,0,1.38,1.38,0,0,0,1.33-.19c1.52-.87,1.52-2.47,1.52-4.2,0-1.06-.07-6.67-.23-6.93-1.71-2.69-14.33-3.34-20.46-1.9C98,178.8,96.83,179.55,96.52,180.26Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#be71ab6e-87b8-4651-916e-f7029bd45594);"></path>
                                            <path d="M94.42,174c-2.37-5.49-3.25-12.31-3-20.16a24,24,0,0,1,.43-5.09,6.79,6.79,0,0,1,3.42-4.48.76.76,0,0,1,1.08.37l2.43,5.91a.75.75,0,0,1-.18.84,2.16,2.16,0,0,0-.69,1.6v8.29a2.44,2.44,0,0,0,1.72,2.3,2.46,2.46,0,0,0-1.66,2.3v8.25a2.16,2.16,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.57,1.61a.76.76,0,0,1-1.33.18A19.17,19.17,0,0,1,94.42,174Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bc2e76a6-359c-4865-bc43-02196d4692ae);"></path>
                                            <path d="M122.68,174c2.37-5.49,3.25-12.31,3-20.16a24,24,0,0,0-.44-5.09,6.78,6.78,0,0,0-3.41-4.48.76.76,0,0,0-1.08.37l-2.43,5.91a.75.75,0,0,0,.18.84,2.16,2.16,0,0,1,.69,1.6v8.29a2.45,2.45,0,0,1-1.72,2.3,2.47,2.47,0,0,1,1.66,2.3v8.25a2.16,2.16,0,0,1-.68,1.58.75.75,0,0,0-.19.8l.57,1.61a.76.76,0,0,0,1.33.18,19.17,19.17,0,0,0,2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f996fe5d-21c8-4ba2-a1f9-04018f4ccf40);"></path>
                                            <path d="M100.86,151.24a84,84,0,0,1,15.54,0,2.15,2.15,0,0,1,2,2.14v7.73a2.09,2.09,0,0,1-2,2.14H100.86a2.09,2.09,0,0,1-2-2.14v-7.73A2.16,2.16,0,0,1,100.86,151.24Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#aeb2691c-0107-4be8-a4ed-cdebd3d3974d);"></path>
                                            <path d="M100.8,175.83a84,84,0,0,0,15.54,0,2.15,2.15,0,0,0,2-2.14V166a2.09,2.09,0,0,0-2-2.14H100.8a2.09,2.09,0,0,0-2,2.14v7.68A2.15,2.15,0,0,0,100.8,175.83Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a848a3c3-091e-42cb-bcdb-886fd7a95f04);"></path>
                                            <path d="M119.48,181.23c0,2.11,0,5.31,0,7.42a2.08,2.08,0,0,1-2.12,2.2,61.85,61.85,0,0,0-17.87,0,2.07,2.07,0,0,1-2.11-2.2c0-2.11,0-5.31,0-7.42-.09-4,22-3.16,22.1,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a63d3162-89dd-41e2-a02d-fd41c815ab4d);"></path>
                                            <path d="M103.14,192.87H115a2.79,2.79,0,0,1,2.51,2.78v3.42a2.49,2.49,0,0,1-2.51,2.45h-11.9a2.49,2.49,0,0,1-2.51-2.45v-3.42A2.79,2.79,0,0,1,103.14,192.87Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f170c377-52a3-44ca-984c-35dc73d49e59);"></path>
                                            <path d="M116.82,150.61a.73.73,0,0,0,.75-.44c.67-1.45,1.33-2.91,2-4.36.35-.77,1.07-1.88,0-2.37-3.44-1.5-18.17-1.5-21.62,0-1.1.48-.39,1.6,0,2.37l2,4.36a.73.73,0,0,0,.75.44A87.67,87.67,0,0,1,116.82,150.61Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e20ab66b-78bf-429d-9d6b-3adab1a8f40d);"></path>
                                            <path d="M93.63,199.05c-3.14-6.11-2.89-13.69-3.25-19.69-.1-1.83.2-2.2,1.85-2.47.89,6.89,0,15.78,7.53,18-.36,4.94-.22,7.56,3.06,7.56,1.94.06,3.47,0,5.08,0v0c2.9-.09,4.76.14,7.65,0s3.08-2.62,2.76-7.56c6.78-2.18,6-11,6.77-17.91,1.49.28,1.74.78,1.64,2.43-.31,6-.06,13.57-2.89,19.69a5,5,0,0,1-3,2.83c-3.19,1.57-6.56,1.68-9.91,1.66h0c-4.66,0-9.49.35-14-1.64-1.71-.76-2.44-1.13-3.32-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ac4a6383-9347-46d0-938d-f3b6bcd9324d);"></path>
                                            <path d="M27.93,249.24a6.13,6.13,0,0,1,3,.48c-3.87-6.93-5-16.5-4.24-27.87.48-4.4,3.41-6.38,7.48-7.31,5-1.14,15.29-1.14,20.25,0,4.06.93,7,2.91,7.48,7.31.75,11.37-.37,20.94-4.24,27.87a6.13,6.13,0,0,1,3-.48c1.76.27,1.85,1,1.79,2.23-.27,6.76-.61,13.44-2.21,17.93-1.19,3.37-2.16,4.26-5.44,5.3-5.24,1.66-15.79,1.66-21,0-3.29-1-4.25-1.93-5.45-5.3-1.59-4.49-1.93-11.17-2.21-17.93C26.08,250.22,26.17,249.5,27.93,249.24Z" transform="translate(0 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                            <path d="M34.6,248.55a114.49,114.49,0,0,0,19.42.09c.15.46.32,1,.48,1.43s.42.93.92.92c1.53,0,5-1.75,5.14-1.74s.26.06.25.22c-.62,5.82.27,12.75-4.15,16.4a10.2,10.2,0,0,1-2.6,1.3c-.17-.61-.27-2.53-2.29-2.76a83.39,83.39,0,0,0-13.87,0c-2.18.23-2.1,1.76-2.38,2.8a10.33,10.33,0,0,1-3-1.35c-4.4-3.72-4-10.35-4.68-16.32,0-.16.21-.18.39-.21S31,250.59,32.56,251s1.51-1.32,2-2.42Zm-2.31,4.06c-.28.63-.12,5.62-.12,6.93,0,1.73-.28,3.33,1.38,4.2a3.3,3.3,0,0,0,2.1.19,60.41,60.41,0,0,1,17.71,0,1.34,1.34,0,0,0,1.32-.19c1.53-.87,1.52-2.47,1.52-4.19,0-1.06-.07-6.68-.23-6.93-1.71-2.7-14.32-3.35-20.46-1.91C33.77,251.15,32.59,251.9,32.29,252.61Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b2a141a8-fe2e-48c2-b690-9b00757b8ac6);"></path>
                                            <path d="M30.18,246.34c-2.37-5.49-3.25-12.3-3-20.16a24.65,24.65,0,0,1,.43-5.09A6.79,6.79,0,0,1,31,216.61a.77.77,0,0,1,1.08.37l2.43,5.92a.74.74,0,0,1-.18.83,2.17,2.17,0,0,0-.69,1.6v8.29a2.48,2.48,0,0,0,1.72,2.31,2.44,2.44,0,0,0-1.66,2.29v8.26a2.17,2.17,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.57,1.6a.76.76,0,0,1-1.33.18,19,19,0,0,1-2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#aa2b34f0-662b-49e6-84f8-d74c3689f451);"></path>
                                            <path d="M58.44,246.34c2.37-5.49,3.25-12.3,3-20.16a24.65,24.65,0,0,0-.43-5.09,6.79,6.79,0,0,0-3.42-4.48.77.77,0,0,0-1.08.37l-2.43,5.92a.74.74,0,0,0,.18.83,2.17,2.17,0,0,1,.69,1.6v8.29a2.48,2.48,0,0,1-1.72,2.31,2.44,2.44,0,0,1,1.66,2.29v8.26a2.17,2.17,0,0,1-.68,1.58.75.75,0,0,0-.19.8l.57,1.6a.76.76,0,0,0,1.33.18,19,19,0,0,0,2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#e71ae7f3-3e79-4383-b583-fdec14f8f0af);"></path>
                                            <path d="M36.62,223.59a84,84,0,0,1,15.54,0,2.16,2.16,0,0,1,2,2.15v7.72a2.1,2.1,0,0,1-2,2.15H36.62a2.09,2.09,0,0,1-2-2.15v-7.72A2.16,2.16,0,0,1,36.62,223.59Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f941bdba-ba23-4c0a-a3b9-2b781f9bb388);"></path>
                                            <path d="M36.56,248.18a84,84,0,0,0,15.54,0,2.15,2.15,0,0,0,2-2.14v-7.68a2.09,2.09,0,0,0-2-2.14H36.56a2.08,2.08,0,0,0-2,2.14V246A2.15,2.15,0,0,0,36.56,248.18Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b4ecdeba-5e6f-4415-a48d-ba614784a9f0);"></path>
                                            <path d="M55.23,253.58c.06,2.11,0,5.32,0,7.42a2.07,2.07,0,0,1-2.11,2.2,62.21,62.21,0,0,0-17.87,0,2.07,2.07,0,0,1-2.12-2.2c0-2.1,0-5.31,0-7.42-.08-4,22-3.16,22.11,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a61c36c2-b582-4d35-b65b-c448023339e4);"></path>
                                            <path d="M38.9,265.22H50.8A2.79,2.79,0,0,1,53.31,268v3.42a2.49,2.49,0,0,1-2.51,2.46H38.9a2.49,2.49,0,0,1-2.51-2.46V268A2.79,2.79,0,0,1,38.9,265.22Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b7728ee9-9a15-4f86-a74e-d4338e5ff6ec);"></path>
                                            <path d="M52.58,223a.76.76,0,0,0,.76-.44l2-4.37c.35-.77,1.07-1.88,0-2.36-3.44-1.51-18.17-1.51-21.62,0-1.1.48-.38,1.59,0,2.36l2,4.37a.76.76,0,0,0,.76.44,87.56,87.56,0,0,1,16.19,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a4dd6ea7-1f45-4e28-be72-8755ab704685);"></path>
                                            <path d="M29.39,271.4c-3.14-6.11-2.89-13.69-3.25-19.69-.11-1.83.2-2.2,1.85-2.47.89,6.89,0,15.78,7.53,18-.36,4.94-.22,7.56,3.06,7.56,2,.06,3.47,0,5.08,0v0c2.9-.09,4.76.14,7.65.05s3.08-2.62,2.76-7.56c6.78-2.18,6-11,6.77-17.91,1.49.28,1.74.78,1.64,2.43-.31,6-.06,13.58-2.89,19.69a5,5,0,0,1-3,2.83c-3.19,1.57-6.56,1.68-9.91,1.66h0c-4.66,0-9.49.35-14-1.64-1.71-.76-2.44-1.13-3.32-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a05ec176-214d-4dca-9678-04930971e49c);"></path>
                                            <path d="M64.25,249.24a6.13,6.13,0,0,1,3,.48c-3.87-6.93-5-16.5-4.24-27.87.47-4.4,3.41-6.38,7.48-7.31,5-1.14,15.29-1.14,20.25,0,4.06.93,7,2.91,7.48,7.31.75,11.37-.37,20.94-4.25,27.87a6.17,6.17,0,0,1,3-.48c1.76.27,1.84,1,1.79,2.23-.27,6.76-.62,13.44-2.21,17.93-1.19,3.37-2.16,4.26-5.45,5.3-5.23,1.66-15.78,1.66-21,0-3.29-1-4.25-1.93-5.45-5.3-1.59-4.49-1.93-11.17-2.21-17.93C62.4,250.22,62.48,249.5,64.25,249.24Z" transform="translate(0 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                            <path d="M70.92,248.55a114.49,114.49,0,0,0,19.42.09c.15.46.31,1,.48,1.43s.42.93.92.92c1.53,0,5-1.75,5.14-1.74s.25.06.25.22c-.62,5.82.27,12.75-4.15,16.4a10.2,10.2,0,0,1-2.6,1.3c-.17-.61-.27-2.53-2.29-2.76a83.39,83.39,0,0,0-13.87,0c-2.19.23-2.11,1.76-2.39,2.8a10.38,10.38,0,0,1-3-1.35c-4.4-3.72-4-10.35-4.68-16.32,0-.16.2-.18.39-.21s2.74,1.28,4.33,1.66,1.51-1.32,2-2.42Zm-2.32,4.06c-.27.63-.12,5.62-.12,6.93,0,1.73-.27,3.33,1.38,4.2a3.3,3.3,0,0,0,2.1.19,60.41,60.41,0,0,1,17.71,0,1.33,1.33,0,0,0,1.32-.19c1.53-.87,1.53-2.47,1.53-4.19,0-1.06-.07-6.68-.23-6.93C90.58,250,78,249.3,71.83,250.74,70.08,251.15,68.91,251.9,68.6,252.61Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bce7593f-ed8b-4fb9-90a7-7c4c105bae5b);"></path>
                                            <path d="M66.5,246.34c-2.37-5.49-3.25-12.3-3-20.16a24,24,0,0,1,.43-5.09,6.76,6.76,0,0,1,3.42-4.48.77.77,0,0,1,1.08.37l2.42,5.92a.74.74,0,0,1-.17.83,2.17,2.17,0,0,0-.69,1.6v8.29a2.47,2.47,0,0,0,1.72,2.31A2.43,2.43,0,0,0,70,238.22v8.26a2.17,2.17,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.58,1.6a.75.75,0,0,1-1.32.18,18.23,18.23,0,0,1-2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a95cd6d0-71a8-4591-a065-7a533c96646a);"></path>
                                            <path d="M94.76,246.34c2.37-5.49,3.25-12.3,3-20.16a24.65,24.65,0,0,0-.43-5.09A6.79,6.79,0,0,0,94,216.61a.77.77,0,0,0-1.08.37l-2.43,5.92a.74.74,0,0,0,.18.83,2.17,2.17,0,0,1,.69,1.6v8.29a2.47,2.47,0,0,1-1.72,2.31,2.43,2.43,0,0,1,1.66,2.29v8.26a2.17,2.17,0,0,1-.68,1.58.75.75,0,0,0-.19.8l.57,1.6a.76.76,0,0,0,1.33.18,19,19,0,0,0,2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ecd4ee23-4df6-45b5-b860-8bb53f05e236);"></path>
                                            <path d="M72.94,223.59a84,84,0,0,1,15.54,0,2.16,2.16,0,0,1,2,2.15v7.72a2.1,2.1,0,0,1-2,2.15H72.94a2.1,2.1,0,0,1-2-2.15v-7.72A2.16,2.16,0,0,1,72.94,223.59Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#be439770-2a1e-4d1a-91a1-75ebc07ebb09);"></path>
                                            <path d="M72.88,248.18a84,84,0,0,0,15.54,0,2.16,2.16,0,0,0,2-2.14v-7.68a2.09,2.09,0,0,0-2-2.14H72.88a2.09,2.09,0,0,0-2,2.14V246A2.15,2.15,0,0,0,72.88,248.18Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a1de8971-aaf2-442c-a744-4ec326c83684);"></path>
                                            <path d="M91.56,253.58c0,2.11,0,5.32,0,7.42a2.07,2.07,0,0,1-2.12,2.2,62.21,62.21,0,0,0-17.87,0,2.07,2.07,0,0,1-2.12-2.2c0-2.1,0-5.31,0-7.42-.08-4,22-3.16,22.11,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ba043c57-a6cf-40a8-a690-c2d5c27e53d4);"></path>
                                            <path d="M75.22,265.22h11.9A2.79,2.79,0,0,1,89.63,268v3.42a2.49,2.49,0,0,1-2.51,2.46H75.22a2.49,2.49,0,0,1-2.51-2.46V268A2.79,2.79,0,0,1,75.22,265.22Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#fed54bb9-fef0-4ef5-8415-a31c5120ed2b);"></path>
                                            <path d="M88.9,223a.75.75,0,0,0,.75-.44l2-4.37c.35-.77,1.07-1.88,0-2.36-3.44-1.51-18.17-1.51-21.62,0-1.11.48-.39,1.59,0,2.36.66,1.46,1.32,2.91,2,4.37a.75.75,0,0,0,.75.44A87.67,87.67,0,0,1,88.9,223Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#eae15aab-3f25-461b-8cfd-90c45e5a8a0f);"></path>
                                            <path d="M65.71,271.4c-3.14-6.11-2.89-13.69-3.25-19.69-.11-1.83.2-2.2,1.85-2.47.89,6.89,0,15.78,7.53,18-.36,4.94-.22,7.56,3.06,7.56,1.94.06,3.47,0,5.08,0v0c2.9-.09,4.75.14,7.65.05s3.08-2.62,2.76-7.56c6.78-2.18,6-11,6.77-17.91,1.49.28,1.73.78,1.64,2.43-.32,6-.06,13.58-2.9,19.69a4.91,4.91,0,0,1-3,2.83c-3.18,1.57-6.55,1.68-9.9,1.66h0c-4.66,0-9.49.35-14-1.64-1.71-.76-2.44-1.13-3.32-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b354ba3c-773c-4989-91b1-374eab9b2035);"></path>
                                            <path d="M100.57,249.24a6.13,6.13,0,0,1,3,.48c-3.87-6.93-5-16.5-4.24-27.87.48-4.4,3.41-6.38,7.48-7.31,5-1.14,15.29-1.14,20.25,0,4.06.93,7,2.91,7.48,7.31.75,11.37-.37,20.94-4.24,27.87a6.12,6.12,0,0,1,3-.48c1.76.27,1.85,1,1.79,2.23-.27,6.76-.61,13.44-2.21,17.93-1.19,3.37-2.16,4.26-5.44,5.3-5.24,1.66-15.79,1.66-21,0-3.29-1-4.25-1.93-5.45-5.3-1.59-4.49-1.93-11.17-2.21-17.93C98.72,250.22,98.8,249.5,100.57,249.24Z" transform="translate(0 0)" style="fill:#404040;fill-rule:evenodd;"></path>
                                            <path d="M107.24,248.55a114.49,114.49,0,0,0,19.42.09c.15.46.31,1,.48,1.43s.42.93.92.92c1.53,0,5-1.75,5.14-1.74s.26.06.25.22c-.62,5.82.27,12.75-4.15,16.4a10.2,10.2,0,0,1-2.6,1.3c-.17-.61-.27-2.53-2.29-2.76a83.39,83.39,0,0,0-13.87,0c-2.18.23-2.1,1.76-2.38,2.8a10.33,10.33,0,0,1-3-1.35c-4.4-3.72-4-10.35-4.68-16.32,0-.16.21-.18.39-.21s2.74,1.28,4.33,1.66,1.51-1.32,2-2.42Zm-2.32,4.06c-.27.63-.12,5.62-.12,6.93,0,1.73-.27,3.33,1.38,4.2a3.3,3.3,0,0,0,2.1.19A60.41,60.41,0,0,1,126,264a1.35,1.35,0,0,0,1.33-.19c1.52-.87,1.52-2.47,1.52-4.19,0-1.06-.07-6.68-.23-6.93-1.71-2.7-14.33-3.35-20.46-1.91C106.4,251.15,105.23,251.9,104.92,252.61Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#bab83905-ed43-4dbb-85c7-ace1bc9c40c6);"></path>
                                            <path d="M102.82,246.34c-2.37-5.49-3.25-12.3-3-20.16a24,24,0,0,1,.43-5.09,6.79,6.79,0,0,1,3.42-4.48.77.77,0,0,1,1.08.37l2.43,5.92a.74.74,0,0,1-.18.83,2.17,2.17,0,0,0-.69,1.6v8.29a2.47,2.47,0,0,0,1.72,2.31,2.43,2.43,0,0,0-1.66,2.29v8.26a2.17,2.17,0,0,0,.68,1.58.75.75,0,0,1,.19.8l-.57,1.6a.76.76,0,0,1-1.33.18,19,19,0,0,1-2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a119e4dc-516c-4d08-9bc5-cd59ddb79afa);"></path>
                                            <path d="M131.08,246.34c2.37-5.49,3.25-12.3,3-20.16a24,24,0,0,0-.44-5.09,6.78,6.78,0,0,0-3.41-4.48.77.77,0,0,0-1.08.37l-2.43,5.92a.74.74,0,0,0,.18.83,2.17,2.17,0,0,1,.69,1.6v8.29a2.48,2.48,0,0,1-1.72,2.31,2.44,2.44,0,0,1,1.66,2.29v8.26a2.17,2.17,0,0,1-.68,1.58.75.75,0,0,0-.19.8l.57,1.6a.76.76,0,0,0,1.33.18,19,19,0,0,0,2.48-4.29Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a2d60ce5-5c1b-4d6c-a769-0e9030293994);"></path>
                                            <path d="M109.25,223.59a84.14,84.14,0,0,1,15.55,0,2.16,2.16,0,0,1,2,2.15v7.72a2.09,2.09,0,0,1-2,2.15H109.25a2.09,2.09,0,0,1-2-2.15v-7.72A2.16,2.16,0,0,1,109.25,223.59Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b4d7644f-a6ef-4b3f-bbf0-a82674f4c429);"></path>
                                            <path d="M109.19,248.18a84.13,84.13,0,0,0,15.55,0,2.15,2.15,0,0,0,2-2.14v-7.68a2.08,2.08,0,0,0-2-2.14H109.19a2.09,2.09,0,0,0-2,2.14V246A2.15,2.15,0,0,0,109.19,248.18Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f599565e-3490-4e71-8db1-530fccc585f5);"></path>
                                            <path d="M127.87,253.58c.06,2.11,0,5.32,0,7.42a2.07,2.07,0,0,1-2.11,2.2,62.21,62.21,0,0,0-17.87,0,2.07,2.07,0,0,1-2.12-2.2c0-2.1,0-5.31,0-7.42-.08-4,22-3.16,22.11,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b700e625-7c40-421f-9aaa-6d6633e03ec5);"></path>
                                            <path d="M111.54,265.22h11.9A2.79,2.79,0,0,1,126,268v3.42a2.49,2.49,0,0,1-2.51,2.46h-11.9a2.49,2.49,0,0,1-2.51-2.46V268A2.79,2.79,0,0,1,111.54,265.22Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ba189870-b4af-4515-b3eb-0375a090ac34);"></path>
                                            <path d="M125.22,223a.74.74,0,0,0,.75-.44l2-4.37c.35-.77,1.07-1.88,0-2.36-3.44-1.51-18.17-1.51-21.62,0-1.1.48-.39,1.59,0,2.36.66,1.46,1.33,2.91,2,4.37a.75.75,0,0,0,.75.44A87.67,87.67,0,0,1,125.22,223Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#b0c4f286-41bd-45bd-929e-b72ef584c7d9);"></path>
                                            <path d="M102,271.4c-3.14-6.11-2.89-13.69-3.25-19.69-.11-1.83.2-2.2,1.85-2.47.88,6.89,0,15.78,7.53,18-.36,4.94-.22,7.56,3,7.56,2,.06,3.47,0,5.09,0v0c2.9-.09,4.75.14,7.65.05s3.08-2.62,2.76-7.56c6.78-2.18,6-11,6.77-17.91,1.49.28,1.73.78,1.64,2.43-.32,6-.06,13.58-2.9,19.69a4.94,4.94,0,0,1-3,2.83c-3.18,1.57-6.56,1.68-9.9,1.66h0c-4.67,0-9.5.35-14-1.64-1.71-.76-2.44-1.13-3.32-2.84Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a4638a5b-827b-4923-a6d7-83debde66c1e);"></path>
                                            <rect x="86.95" y="171.26" width="2.33" height="3.43" rx="0.38" style="fill:#ff1a1d;"></rect>
                                            <rect x="74.73" y="171.26" width="2.33" height="3.43" rx="0.38" style="fill:#ff2e31;"></rect>
                                            <g style="mask:url(#e263821a-8672-4d9b-9fdd-785ce09359e6);">
                                            <path d="M28.43,121.63c4.44-5.14,8.76-8.86,13.7-11.23s10.49-3.4,17.36-3.15a13.4,13.4,0,0,1,5.29.86c1.43.68,2.52,1.92,3.45,4.27a58.34,58.34,0,0,1,1.94,6.4c.9,3.41,1.77,6.74,3.15,8.51,3.57,4.58,14.46,4.12,17.42.63,3.38-4,4.27-7.52,5.23-11.35.32-1.29.65-2.62,1.09-4,1.69-5.36,5.63-5.33,10-5.29h.21A39.62,39.62,0,0,1,122.45,111a31.44,31.44,0,0,1,10.22,6.92c0,.33-.07.53-.1.84-2.19-2.65-6-5.21-10.37-7.18a39,39,0,0,0-14.93-3.69h-.21c-4.12,0-7.84-.06-9.4,4.85-.43,1.38-.76,2.7-1.08,4-1,3.9-1.88,7.52-5.35,11.6-3.25,3.82-14.61,4.22-18.4-.65-1.46-1.87-2.35-5.26-3.27-8.74a60,60,0,0,0-1.91-6.33c-.87-2.18-1.86-3.32-3.14-3.93a13.13,13.13,0,0,0-5-.8c-6.76-.25-12.22.75-17.07,3.09S33.29,117,28.91,122l-.48-.41Z" transform="translate(0 0)" style="fill:#1f1b20;"></path>
                                            </g>
                                            <path d="M27.91,27.75a3.07,3.07,0,0,1-3.59,4.91,3.07,3.07,0,0,1,3.59-4.91Z" transform="translate(0 0)" style="fill:#fefefe;fill-opacity:0.6000000238418579;fill-rule:evenodd;"></path>
                                            <path d="M134.6,27.62a3.07,3.07,0,0,0,3.6,4.91,3.07,3.07,0,0,0-3.6-4.91Z" transform="translate(0 0)" style="fill:#fefefe;fill-opacity:0.6000000238418579;fill-rule:evenodd;"></path>
                                            <path d="M138.62,48a3.85,3.85,0,0,0-.74,1.49,6.48,6.48,0,0,0-.23,2,113.44,113.44,0,0,0,1.28,11.43c1.24,8.57,2.62,18.22.6,22.51A4.05,4.05,0,0,1,138,87.1a6.47,6.47,0,0,1-1.89.88l-.08-.24a6.45,6.45,0,0,0,1.83-.85,3.71,3.71,0,0,0,1.45-1.57c2-4.22.61-13.83-.61-22.36a108.35,108.35,0,0,1-1.3-11.47,6.83,6.83,0,0,1,.24-2.05,4.46,4.46,0,0,1,.79-1.59Z" transform="translate(0 0)" style="fill:#aa7900;"></path>
                                            <path d="M23.94,48a4.15,4.15,0,0,1,.74,1.49,6.8,6.8,0,0,1,.23,2,111,111,0,0,1-1.29,11.43C22.39,71.49,21,81.14,23,85.43a4,4,0,0,0,1.55,1.67,6.35,6.35,0,0,0,1.89.88l.07-.24a6.45,6.45,0,0,1-1.83-.85,3.77,3.77,0,0,1-1.45-1.57c-2-4.22-.61-13.83.62-22.36a110.69,110.69,0,0,0,1.29-11.47,6.83,6.83,0,0,0-.24-2.05,4.15,4.15,0,0,0-.79-1.59Z" transform="translate(0 0)" style="fill:#aa7900;"></path>
                                            <path d="M48.89,132.72l-.35.4A2.65,2.65,0,0,1,47,134.3l-2.9.94a6.75,6.75,0,0,1-2.19.35,3.54,3.54,0,0,0-1.6,1.34c.1,1.66.49,1.67,1.5,1.11.27-.15.72-.33,1.07-.54.91-.56.05-.67,1-1l3.55-1.11c1.09-.34,1-.42,1.83-1.22L50.44,133a3.15,3.15,0,0,1-1.55-.3Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a42881b7-182a-49e4-81b8-09bce4043e52);"></path>
                                            <path d="M61.63,132.23c-2.18,1-4.69.85-7,.83s-5.34.35-7-1c1.53,2.56,2.58,5.06,2.33,7.44h10.6C59.81,136.73,60.61,134.44,61.63,132.23Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#f0ddf2e0-bfb0-46cb-b17e-e37a47ff82b1);"></path>
                                            <g style="mask:url(#a3cb9b7c-fd28-4bef-9b57-13b74df85e6d);">
                                            <path d="M49.37,132.93a21.89,21.89,0,0,1-4.69-2.84c-3.68-2.54-3.41-2.48-2.49-6.81,1.48-7,5.39-10.67,13-10.67,8,0,11.25,3.81,13.1,10.73.78,2.91,1.5,4.16-2.33,6.4a30.7,30.7,0,0,1-5.86,3.13,90.62,90.62,0,0,1-10.68,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#fcdda4a5-4fb6-46e2-8761-f918f6d291d7);"></path>
                                            </g>
                                            <path d="M62.1,118.51q-1.34,6.27-2.66,12.53c.69.91.8.27,1.18-1.43l1.18-5.2A14.13,14.13,0,0,0,62.1,118.51Z" transform="translate(0 0)" style="fill:#2b2a29;fill-rule:evenodd;"></path>
                                            <g style="mask:url(#aafa959a-726f-4674-88f1-dd2035500637);">
                                            <path d="M47.09,118.43,49.76,131c-.7.9-.81.26-1.19-1.43l-1.18-5.2A14.35,14.35,0,0,1,47.09,118.43Z" transform="translate(0 0)" style="fill:#4d4d4d;fill-rule:evenodd;"></path>
                                            </g>
                                            <path d="M41.16,141.82c-.31,2.65,3,3.68,7.81,4a93,93,0,0,0,12.71,0c4.84-.32,8.12-1.34,7.8-4-1.72-5.79-26.65-5.59-28.31,0Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#ac92e2c7-5714-4c15-b4f3-ea0f4107754d);"></path>
                                            <path d="M55.49,139.63c7,0,12.61,1.34,12.61,3s-5.65,3-12.61,3-12.6-1.33-12.6-3S48.53,139.63,55.49,139.63Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#a4cd0049-ed23-496b-b50c-0e2d7da51e1c);"></path>
                                            <path d="M45.18,138.93a39.69,39.69,0,0,1,19.9-.17,21.66,21.66,0,0,0-10.42-2.31A22.47,22.47,0,0,0,45.18,138.93Z" transform="translate(0 0)" style="fill:#464546;fill-rule:evenodd;"></path>
                                            <path d="M61.65,141.55l-1.87,1.51a.54.54,0,0,0-.16.7.76.76,0,0,0,.75.36l4.83-.31a.82.82,0,0,0,.61-.32c.7-1.08-3.44-2.51-4.16-1.93Z" transform="translate(0 0)" style="fill:#4f4f4f;fill-rule:evenodd;"></path>
                                            <path d="M51.42,140.9a.53.53,0,0,0,.07.64c.45.48.89,1,1.32,1.46a.83.83,0,0,0,.61.25h4.27a.8.8,0,0,0,.58-.23l1.36-1.35a.52.52,0,0,0,.11-.64C59.29,140.16,51.76,140.3,51.42,140.9Z" transform="translate(0 0)" style="fill:#252525;fill-rule:evenodd;"></path>
                                            <path d="M49.12,141.34,51,142.85a.54.54,0,0,1,.16.7.78.78,0,0,1-.75.36l-4.83-.31a.8.8,0,0,1-.61-.33c-.7-1.07,3.44-2.51,4.16-1.93Z" transform="translate(0 0)" style="fill:#252525;fill-rule:evenodd;"></path>
                                            <path d="M55.68,141.92c1.53,0,2.78.58,2.78,1.29s-1.25,1.29-2.78,1.29-2.79-.58-2.79-1.29S54.14,141.92,55.68,141.92Z" transform="translate(0 0)" style="fill:#1d1d1f;fill-rule:evenodd;"></path>
                                            <path d="M55.69,142.49c1.27,0,2.29.38,2.29.86s-1,.87-2.29.87-2.29-.39-2.29-.87S54.43,142.49,55.69,142.49Z" transform="translate(0 0)" style="fill-rule:evenodd;fill:url(#acc82570-d643-460b-826f-634f43f49173);"></path>
                                        </g>
                                        </g>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-front-left--car @if(isset($booking_seats) && in_array('Первое место (Водительский ряд)', $booking_seats)) car-place--booked @endif" data-car-place="Первое место (Водительский ряд)">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <!---->
                                    <div class="car-place--svg--places car-place-passanger--car__1 @if(isset($booking_seats) && in_array('Второе место', $booking_seats)) car-place--booked @endif" data-car-place="Второе место">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passanger--car__2 @if(isset($booking_seats) && in_array('Первое место', $booking_seats)) car-place--booked @endif" data-car-place="Первое место" data-place-booked="Место забронировано">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                    <div class="car-place--svg--places car-place-passanger--car__3 @if(isset($booking_seats) && in_array('третье место', $booking_seats)) car-place--booked @endif" data-car-place="третье место">
                                    <svg class="icon icon-kreslo-free ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-free')}}"></use>
                                    </svg>
                                    <svg class="icon icon-kreslo-booked icon-car-place--booked">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#kreslo-booked')}}"></use>
                                    </svg>
                                    </div>
                                </div>
                                @endif
                                <div class="col-xl-7 car-place--info">
                                    {{-- <h3 class="section-title">Выберите место на котором хотите ехать</h3>
                                    <div class="trip-select-car">
                                    <div class="trip-select--icon--car">
                                        <div class="gogocar-gray-icons">
                                        <svg class="icon icon-taxi ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi')}}"></use>
                                        </svg>
                                        </div>
                                        <div class="trip-select--car--name">
                                        <div class="trip-select--car--name2">Автобус</div>
                                        <input class="form-control" name="template" type="hidden" id="template" value="{{ old('template', optional($trip->car)->template) }}">
                                        </div>
                                    </div>
                                    <div class="trip-select--arrow">
                                        <svg class="icon icon-arrow-right ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right')}}"></use>
                                        </svg>
                                    </div>
                                    </div>
                                    <ul class="trip-select-car--list car-select-car--list">
                                        <li class="trip-select-car--item suggest-late--result--item choise-car-tab" data-car-choise="car-choise-mini-bus">
                                            <div class="suggest-late--result--item__left">
                                                <div class="gogocar-gray-icons">
                                                <svg class="icon icon-taxi ">
                                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi')}}"></use>
                                                </svg>
                                                </div>
                                                <div class="trip-select-car-name--number">
                                                <div class="trip-select-car-name--number2">Мини-Автобус</div>
                                                </div>
                                            </div>
                                            <div class="gogocar-gray-icons2">
                                                <svg class="icon icon-arrow-right3 ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3')}}"></use>
                                                </svg>
                                            </div>
                                        </li>
                                    <li class="trip-select-car--item suggest-late--result--item choise-car-tab active" data-car-choise="car-choise-bus">
                                        <div class="suggest-late--result--item__left">
                                        <div class="gogocar-gray-icons">
                                            <svg class="icon icon-taxi ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi')}}"></use>
                                            </svg>
                                        </div>
                                        <div class="trip-select-car-name--number">
                                            <div class="trip-select-car-name--number2">Автобус</div>
                                        </div>
                                        </div>
                                        <div class="gogocar-gray-icons2">
                                        <svg class="icon icon-arrow-right3 ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3')}}"></use>
                                        </svg>
                                        </div>
                                    </li>
                                    <li class="trip-select-car--item suggest-late--result--item choise-car-tab" data-car-choise="car-choise-miniven">
                                        <div class="suggest-late--result--item__left">
                                        <div class="gogocar-gray-icons">
                                            <svg class="icon icon-taxi ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi')}}"></use>
                                            </svg>
                                        </div>
                                        <div class="trip-select-car-name--number">
                                            <div class="trip-select-car-name--number2">Минивен</div>
                                        </div>
                                        </div>
                                        <div class="gogocar-gray-icons2">
                                        <svg class="icon icon-arrow-right3 ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3')}}"></use>
                                        </svg>
                                        </div>
                                    </li>
                                    <li class="trip-select-car--item suggest-late--result--item choise-car-tab active" data-car-choise="car-choise-car">
                                        <div class="suggest-late--result--item__left">
                                        <div class="gogocar-gray-icons">
                                            <svg class="icon icon-taxi ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi')}}"></use>
                                            </svg>
                                        </div>
                                        <div class="trip-select-car-name--number">
                                            <div class="trip-select-car-name--number2">Обычная</div>
                                        </div>
                                        </div>
                                        <div class="gogocar-gray-icons2">
                                        <svg class="icon icon-arrow-right3 ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3')}}"></use>
                                        </svg>
                                        </div>
                                    </li>
                                    </ul> --}}
                                    <input type="hidden" value="{{$trip_id}}" name="trip_id" id="trip_id">
                                    <input type="hidden" value="Переднее правое" name="place" id="place">
                                    <div class="col-xl-12 car-place--info">
                                        {{-- <p class="section-desc">Sapien neque nunc diam mi tortor. Senectus tincidunt mi nec at
                                            lectus
                                            egestas non faucibus. Quisque dui malesuada sed nisi odio nibh in imperdiet ultrices.
                                            Tortor
                                            augue vitae risus tellus mauris.</p> --}}
                                        
                                        <button class="gogocar-yellow-button" id="continue_btn">@lang('front.car-place.continue')</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </section>
                   
                    {{-- end car template --}}
                    <div class="car-place--content">
                        
                      
                    </div>
                </div>
            </form>
        </div>
        @else
        <section class="you-trip">
            <div class="container">
              <div class="you-trip--wrap">
                <h1 class="main-section--title text-center">@lang('front.profile_trips.your') <span>@lang('front.profile_trips.trip')</span></h1>
                <p class="section-desc">Вы являетесь водителем в другой поездке в этот промежуток времени. Отмените поездку, прежде чем забронировать новую!</p>
                
                <div class="col-xl-8 col-lg-8 you-trip--content m-0-auto">
                  <div class="gogocar-trip--item driver active">
                    @if(count($trips) > 0)
                        @foreach ($trips as $trip)
                        <a href="{{ route('trip-detail', [app()->getLocale(), 't_id'=>$hashids->encode($trip->id)]) }}">
                        <div class="driver-trips">
                            <div class="gogocar-trip--item__top">
                              
                            <div class="car-to-book--item--top">
                              <span class="car-to-book--item--date">{{date('d.m.Y',strtotime($trip->starting_date))}} {{date('H:i',strtotime($trip->starting_date))}}</span>
                              @if(!is_null($trip))
                                  <div class="gogocar-trip--item__top">
                                      <div class="gogocar-trip--item-town__route">
                                          <div class="gogocar-trip--item__town">
                                            <div class="gogocar-drivers--time__icon gdt-yellow">
                                              <svg class="icon icon-location2 ">
                                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#location2') }}"></use>
                                              </svg>
                                            </div>
                                            <span class="from_position">{{ $trip->sourcecity->city }}</span>
                                            <div class="gogocar-trip--item__route" style="min-width: 100px; margin-top: 7px;">
                                                <div class="gogocar-trip--item__route--start"></div>
                                                <div class="gogocar-trip--item__route--end"></div>
                                            </div>
                                            <span class="to_position">{{ $trip->destinationcity->city }}</span>
                                            <div class="gogocar-drivers--time__icon gdt-green">
                                              <svg class="icon icon-location2 ">
                                                  <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#location2') }}"></use>
                                              </svg>
                                            </div>
                                          </div>
                                      </div>
                                  </div>
                                @endif
                                <div class="you-trip--companions">
                                  @if(count($trip->bookings) > 0)
                                    <div class="car-to-book--item--profile">
                                      <span>{{count($trip->bookings)}} Пассажир</span>
                                    </div>
                                    {{-- @foreach ($trip->bookings as $book)
                                      @if(!is_null($book->user) && $book->canceled == false)
                                        <div class="car-to-book--item--profile">
    
                                            @if(!is_null($book->user) && !is_null($book->user->avatar))
                                            <div class="header-user-profile--img" style="background-image:url('{{ asset($book->user->avatar) }}');"></div>
                                            @else    
                                            <div class="cat-to-book--item__img" style="background-image:url('{{ asset('/static/img/content/drivers-avatar/driver1.png') }}');"></div>
                                            @endif
                                            <div class="you-trip--companion"><span>{{ $book->user->name}}</span>
                                            <div class="you-trip--com--desc">Попутчик №{{ $book->user->id}}</div>
                                            </div>
                                        </div>
                                      @endif
                                    @endforeach --}}
                                  @else
                                    <div class="car-to-book--item--profile">
                                      <span>@lang('front.profile_trips.no_traveller')</span>
                                    </div>
                                  @endif
                                </div>
                            </div>
                            <div class="car-to-book--item--bottom">
                                <div class="car-to-book--bottom-info">
                                  <div class="car-to-book--place--price">{{ $trip->seats() }} @lang('front.profile_trips.place'): <span class="money" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}">
                                    {{ $trip->price_per_seat }} UZS
                                    </span></div>
                                  <div class="car-to-book--during">@lang('front.profile_trips.payment'): <span>@lang('front.profile_trips.on_the_way')</span></div>
                                </div>
                                <div class="cat-to-book--bottom-how-to-pay">@lang('front.profile_trips.cash')</div>
                            </div>
                            </div>
                            <div class="gogocar-trip--item__bottom">
                            <div class="car-to-book--services">
                                <div class="gogocar-ready-plan--car">
                                  @if(!is_null($trip->car))
                                  <div class="gogocar-gray-icons">
                                      <svg class="icon icon-taxi ">
                                          <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}"></use>
                                      </svg>
                                  </div>
                                  <div class="gogocar-ready-plan--text">
                                      
                                      {{$trip->car->model}}
                                  </div>
                                  @endif
                                  @if(!is_null($trip->truck))
                                  <div class="gogocar-gray-icons">
                                      <svg class="icon icon-cargo ">
                                          <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#cargo') }}"></use>
                                      </svg>
                                  </div>
                                  <div class="gogocar-ready-plan--text">
                                      
                                      {{$trip->truck->model}}
                                  </div>
                                  @endif
                                  </div>
                                <div class="car-to-book--services--left">
                                  <div class="gogocar-gray-icons">
                                      <svg class="icon icon-question ">
                                      <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#question')}}"></use>
                                      </svg>
                                  </div>
                                  <div class="car-to-book--services--left--content">
                                    <span class="car-to-book--place--price">@lang('front.profile_trips.service_charge')</span>
                                    <span class="car-to-book--during">@lang('front.profile_trips.no_ride_fee')</span>
                                  </div>
                                </div>
                                <div class="car-to-book--services--right">
                                  <div class="car-to-book--services--left--content">
                                    <span class="car-to-book--during--right money" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}">
                                    {{ $trip->price_per_seat }} UZS
                                    </span>
                                  </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </a>
                        @endforeach
                    @else
                        <p class="section-desc">@lang('front.profile_trips.no_trip')</p>
                    @endif
                  </div>
                </div>
              </div>
            </div>
        </section>
        @endif
    </section>
</div>
<style>
    .car-place--svg--places .icon-car-place--booked {
        /* display: none; */
    }
    .car-place--svg{
        position: relative;
        left: -7px;
    }
</style>
<script>
    $("#place_form").submit(function(){
        // var seats = []
        // $('.car-place--svg--places.active').each(function(){
        //     seats.push($(this).data('seat'));
        // })
        // $('#place').val(seats);
    });
    $( document ).ready(function() {
        $('.car-place--svg--places').click(function () {
            $(this).toggleClass('active');
            $('.car-place--booked').removeClass('active');
            var seats = []
            $('.car-place--svg--places.active').each(function(){
                seats.push($(this).attr('data-car-place'));
            })
            $('#place').val(seats);
        });
        // $("#continue_btn").prop('disabled', true);
        // $("#continue_btn").css('opacity', 0.5);
        // $('.car-place--svg--places').click(function () {
        //     $(this).addClass('active').siblings().removeClass('active');

        // });

        // $(".car-place--svg--places").click( function() {
        //     if(!$(this).hasClass('booked')){
        //         $(this).toggleClass('active').toggleClass('add');
        //     }
        //     var seats = []
        //     $('.car-place--svg--places.add').each(function(){
        //         seats.push($(this).data('seat'));
        //     })
        //     $('#place').val(seats);
        //     console.log('length', $('.car-place--svg--places.add').length);
        //     if ($('.car-place--svg--places.add').length > 0){
        //         $("#continue_btn").prop('disabled', false);
        //         $("#continue_btn").css('opacity', 1);
        //     }else{
        //         $("#continue_btn").prop('disabled', true);
        //         $("#continue_btn").css('opacity', 0.5);
        //     }
        // });
    });
</script>
@endsection