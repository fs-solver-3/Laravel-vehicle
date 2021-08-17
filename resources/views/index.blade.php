@extends('layouts.user_app')
@section('title', 'Главная страница')
@section('content')
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
<script>
    if (window.localStorage.getItem('user_location') === null || window.localStorage.getItem('user_location') === 0) showPosition();

    function showPosition() {
        var currentLatitude = 0;
        var currentLongitude = 0;
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){ 
                var currentLatitude_s = position.coords.latitude;
                var currentLongitude_s = position.coords.longitude;
                currentLatitude = currentLatitude_s;
                currentLongitude = currentLongitude_s;console.log(currentLatitude,currentLongitude);

                var token = $("#token").val();
                $.ajax({
                    type: 'POST', 
                    headers: {
                        'X-CSRF-TOKEN': token
                    }, 
                    url: '{{ route("saveLocation")}}', 
                    dataType: 'json', 
                    data: {lang: currentLatitude, long: currentLongitude}, 
                    success: (data) => {
                        window.localStorage.setItem('user_location', true);
                        location.reload();
                    }, 
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
        }else {
            alert("Geolocation is not supported by this browser.");
        }
    }
</script>
{{-- @if(Session::has('user-lang')) --}}
@php
    use Hashids\Hashids;
    $hashids = new Hashids();
@endphp
<div class="content">
    <section class="main-section">
        <div class="container">
            <div class="main-section--wrap">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 main-section--info">
                    <h1 class="main-section--title">@lang('front.index_page.safe_travel') <span> @lang('front.index_page.best_price')</span></h1>
                    <p class="main-section--desc">@lang('front.index_page.get_to_right')</p>
                    <div class="main-section--mobile-platform"><a class="main-section--ios main-section--platforms" href="/">
                            <div class="main-section--icon--ios main-section--icons">
                                <svg class="icon icon-iostore ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#iostore') }}">
                                    </use>
                                </svg>
                            </div>
                            <div class="main-section--info-platform"><span class="main-section--available">Available on
                                    the</span><span class="main-section--name-platform">Apple Store</span></div>
                        </a><a class="main-section--android main-section--platforms" href="/">
                            <div class="main-section--icon--android main-section--icons">
                                <svg class="icon icon-androidi ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#androidi') }}">
                                    </use>
                                </svg>
                            </div>
                            <div class="main-section--info-platform"><span class="main-section--available">Android App
                                    on</span><span class="main-section--name-platform">GOOGLE PLAY</span></div>
                        </a></div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 main-section--car">
                    <div class="main-section--illustration">
                        <div class="main-section--illustration__bg main-section-svg">
                            <svg id="main" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 0 519.694 278.5172">
                                <defs>
                                    <mask id="mask" x="87.3426" y="65.1154" width="102.4454" height="99.5039" maskunits="userSpaceOnUse">
                                        <g transform="translate(-37.9446 -41.7022)">
                                            <g id="mask0">
                                                <path d="M126.8476,117.9114h93.22v71.1269h-93.22Z" style="fill: #c4c4c4;"></path>
                                            </g>
                                        </g>
                                    </mask>
                                    <mask id="mask-2" x="0.2234" y="138.4673" width="445.3378" height="111.1697" maskunits="userSpaceOnUse">
                                        <g transform="translate(-37.9446 -41.7022)">
                                            <g id="mask0-2" data-name="mask0">
                                                <path d="M483.5059,291.3392V233.07a16.657,16.657,0,0,0-14.326-16.5319,170.4777,170.4777,0,0,0-26.048-1.7051s-55.327-34.0027-75.609-34.0027l-127.097-.6508a106.9,106.9,0,0,0-49.066,11.1778L134.7561,219.52,59.5013,235.994S43.9149,240.22,40.57,250.3512c-3.3364,10.1317-2.2243,21.268-2.2243,21.268h165.28s7.448-23.4178,31.289-23.4178c23.832,0,30.291,28.7388,28.8,43.1378h124.881s-.495-42.7013,31.782-41.21,29.797,41.21,29.797,41.21Z" style="fill: #fdab3e;"></path>
                                            </g>
                                        </g>
                                    </mask>
                                    <mask id="mask-3" x="377.9472" y="60.2378" width="10.8828" height="23.2854" maskunits="userSpaceOnUse">
                                        <g transform="translate(-37.9446 -41.7022)">
                                            <g id="mask0-3" data-name="mask0">
                                                <path d="M416.2378,110.2793l-.1938,14.9461,10.7307-1.84-.7819-21.445Z" style="fill: #ebb28b;"></path>
                                            </g>
                                        </g>
                                    </mask>
                                </defs>
                                <g id="town">
                                    <g>
                                        <path d="M476.4123,229.9492h38.1059v47.2331h-38.106Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M213.8435,205.4876h66.4278V269.47H213.8435Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M390.1244,213.55H428.23v47.233h-38.106Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M318.0264,239.1092h38.1069v47.2329H318.0264Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M525.9758,257.8368a155.4568,155.4568,0,0,1-29.5187,44.4373,186.944,186.944,0,0,1-14.7683,14.1309c-.9123.7744-1.8337,1.5488-2.7821,2.2971l-60.5186-.2-13.82-.0435-58.0438-.1914-13.6573-.0435-63.1291-.2089-138.1271-.4524-4.4531-.0174s-.6322-.27-1.77-.8092c-1.5716-.74-4.11-1.9926-7.3254-3.75-3.7937-2.0883-8.5359-4.8813-13.7116-8.3967L95.7423,298.35v-.0087a146.9656,146.9656,0,0,1-12.42-10.7373l-3.866-3.9156a116.1652,116.1652,0,0,1-10.9656-13.3651,96.5937,96.5937,0,0,1-7.4519-12.4864Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M536.8059,210.6063a120.7543,120.7543,0,0,1-1.2917,14.0961,134.2574,134.2574,0,0,1-9.5384,33.1344H514.5224v-47.23Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M351.3807,173.0266c-3.1987-12.851,5.0229-25.7668,18.3634-28.8482s26.7481,4.8387,29.9468,17.69-5.0228,25.7667-18.3632,28.8481h-.0011c-13.3387,3.082-26.7455-4.8361-29.9448-17.6855v0Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M375.5475,162.0248a5.7487,5.7487,0,1,1,.0006,0Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <polygon points="366.623 123.797 366.623 276.756 308.58 276.565 308.58 123.797 366.623 123.797" style="fill: #99a3b5;"></polygon>
                                        <path d="M385.1691,176.5533H396.71v21.8741h-11.541Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M356.1337,176.5533h11.541v21.8741h-11.541Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M385.1691,209.8956H396.71V231.77h-11.541Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M356.1337,209.8956h11.541V231.77h-11.541Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M385.1691,243.2448H396.71v21.8741h-11.541Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M356.1337,243.2448h11.541v21.8741h-11.541Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M385.1691,276.5873H396.71v21.8741h-11.541Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M356.1337,276.5873h11.541v21.8741h-11.541Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M332.8671,129.8325v188.391l-63.1291-.2088V150.9505c2.1226-2.4538,4.1911-4.9771,6.2235-7.544v-.0609h.0451c2.4207-3.0628,4.7783-6.1779,7.0816-9.2929q1.5446-2.0883,3.2427-4.22Z" transform="translate(-37.9446 -41.7022)" style="fill: #99a3b5;"></path>
                                        <path d="M318.0264,143.3466h8.61v8.2923h-8.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M296.9984,143.3466h8.6091v8.2923h-8.6091Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <rect x="238.0168" y="101.6433" width="8.6081" height="8.2923" style="fill: #ccd1da;"></rect>
                                        <path d="M318.0264,157.9891h8.61v8.293h-8.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M296.9984,157.9891h8.6091v8.293h-8.6091Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M275.9627,157.9891h8.609v8.293h-8.609Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M318.0264,172.6325h8.61v8.2923h-8.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M296.9984,172.6325h8.6091v8.2923h-8.6091Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M275.9627,172.6325h8.609v8.2923h-8.609Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M318.0264,187.2828h8.61v8.2923h-8.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M296.9984,187.2828h8.6091v8.2923h-8.6091Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M275.9627,187.2828h8.609v8.2923h-8.609Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M318.0264,201.9253h8.61v8.2923h-8.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M296.9984,201.9253h8.6091v8.2923h-8.6091Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M275.9627,201.9253h8.609v8.2923h-8.609Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M318.0264,216.5678h8.61v8.2931h-8.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M296.9984,216.5678h8.6091v8.2931h-8.6091Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M275.9627,216.5678h8.609v8.2931h-8.609Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M318.0264,231.2109h8.61v8.2923h-8.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M296.9984,231.2109h8.6091v8.2923h-8.6091Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M275.9627,231.2109h8.609v8.2923h-8.609Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M318.0264,245.8536h8.61v8.2923h-8.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M296.9984,245.8536h8.6091v8.2923h-8.6091Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M275.9627,245.8536h8.609v8.2923h-8.609Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M318.0264,260.5039h8.61v8.2923h-8.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M296.9984,260.5039h8.6091v8.2923h-8.6091Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M275.9627,260.5039h8.609v8.2923h-8.609Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M318.0264,275.1464h8.61V283.44h-8.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M296.9984,275.1464h8.6091V283.44h-8.6091Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M275.9627,275.1464h8.609V283.44h-8.609Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M318.0264,289.79h8.61v8.2923h-8.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M296.9984,289.79h8.6091v8.2923h-8.6091Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M275.9627,289.79h8.609v8.2923h-8.609Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M131.6109,182.3185V317.5622l-4.4531-.0174s-.6323-.27-1.77-.8092c-1.5717-.74-4.11-1.9926-7.3255-3.75-3.7937-2.0883-8.5358-4.8814-13.7115-8.3967L95.7423,298.35v-.0087a146.9525,146.9525,0,0,1-12.42-10.7374l-3.8659-3.9156a116.1489,116.1489,0,0,1-10.9657-13.3651V182.3185Z" transform="translate(-37.9446 -41.7022)" style="fill: #99a3b5;"></path>
                                        <path d="M116.7815,195.8257h8.6094v8.2923h-8.6094Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M95.7454,195.8257h8.6093v8.2923H95.7454Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M74.7167,195.8257h8.6094v8.2923H74.7167Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M116.7815,210.469h8.6094v8.2923h-8.6094Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M95.7454,210.469h8.6093v8.2923H95.7454Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M74.7167,210.469h8.6094v8.2923H74.7167Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M116.7815,225.1185h8.6094v8.2932h-8.6094Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M95.7454,225.1185h8.6093v8.2932H95.7454Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M74.7167,225.1185h8.6094v8.2932H74.7167Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M116.7815,239.7618h8.6094v8.2923h-8.6094Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M95.7454,239.7618h8.6093v8.2923H95.7454Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M74.7167,239.7618h8.6094v8.2923H74.7167Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M116.7815,254.4043h8.6094v8.2923h-8.6094Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M95.7454,254.4043h8.6093v8.2923H95.7454Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M74.7167,254.4043h8.6094v8.2923H74.7167Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M116.7815,269.0468h8.6094V277.34h-8.6094Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M95.7454,269.0468h8.6093V277.34H95.7454Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M74.7167,269.0468h8.6094V277.34H74.7167Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M116.7815,283.69h8.6094v8.2923h-8.6094Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M95.7454,283.69h8.6093v8.2923H95.7454Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <polygon points="45.378 245.902 45.378 241.986 41.512 241.986 45.378 245.902" style="fill: #ccd1da;"></polygon>
                                        <path d="M116.7815,298.34h8.6094v8.2932h-8.6094Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <polygon points="57.798 256.648 57.798 256.639 66.406 256.639 66.406 262.886 57.798 256.648" style="fill: #ccd1da;"></polygon>
                                        <path d="M125.3874,312.9854v3.75c-1.5717-.74-4.11-1.9926-7.3255-3.75Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M496.4571,129.8325V302.2741a186.928,186.928,0,0,1-14.7684,14.1309c-.9123.7744-1.8336,1.5488-2.782,2.2971l-60.5187-.2V129.8325Z" transform="translate(-37.9446 -41.7022)" style="fill: #99a3b5;"></path>
                                        <path d="M482.9894,160.3759h5.2688V258.64h-5.2688Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M468.889,160.3759h5.2687V258.64H468.889Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M454.7805,160.3759h5.2679V258.64h-5.2679Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M440.68,160.3759h5.2679V258.64H440.68Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M426.5783,160.3759h5.2687V258.64h-5.2687Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                        <path d="M418.3857,140.3437h78.0727V150.85H418.3857Z" transform="translate(-37.9446 -41.7022)" style="fill: #e9edfd;"></path>
                                    </g>
                                    <path d="M536.8059,210.6063a120.7543,120.7543,0,0,1-1.2917,14.0961,134.2574,134.2574,0,0,1-9.5384,33.1344,155.4582,155.4582,0,0,1-29.5187,44.4373,186.9621,186.9621,0,0,1-14.7683,14.1309c-.9123.7744-1.8337,1.5488-2.7821,2.2971l-60.5186-.2-13.82-.0435-58.0438-.1915-13.6573-.0435-63.1291-.2088-138.1271-.4524-4.4531-.0174s-.6322-.27-1.77-.8092c-1.5716-.74-4.11-1.9926-7.3254-3.75-3.7937-2.0883-8.5359-4.8814-13.7116-8.3967-2.773-1.8708-5.6634-3.9591-8.6081-6.2388v-.0087a146.9668,146.9668,0,0,1-12.42-10.7374q-1.9511-1.8924-3.866-3.9155a116.1577,116.1577,0,0,1-10.9656-13.3652,96.5858,96.5858,0,0,1-7.4519-12.4863,82.4835,82.4835,0,0,1-8.8791-39.53c1.7884-66.3558,74.5553-97.21,123.9548-56.245,41.1888,34.1525,70.2649,15.95,93.6233-11.1115,2.1227-2.4537,4.1912-4.9771,6.2235-7.544a.2676.2676,0,0,1,.0452-.0609c2.4207-3.0628,4.7782-6.1779,7.0815-9.2929q1.5446-2.0883,3.2428-4.22c26.9714-33.8218,82.4589-73.2821,154.35-53.9043C512.201,95.21,538.5853,160.5219,536.8059,210.6063Z" transform="translate(-37.9446 -41.7022)" style="fill: #67758e;opacity: 0.20000000298023224;isolation: isolate;"></path>
                                    <g style="opacity: 0.20000000298023224;">
                                        <path d="M548.9931,157.0076a3.853,3.853,0,1,0,0-.0494Z" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #a9b7f2;stroke-miterlimit: 10;stroke-width: 1.2771999835968018px;">
                                        </path>
                                        <path d="M73.6824,73.0639a3.8606,3.8606,0,1,0,0-.05C73.6821,73.0308,73.6822,73.0474,73.6824,73.0639Z" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #a9b7f2;stroke-miterlimit: 10;stroke-width: 1.2771999835968018px;">
                                        </path>
                                        <path d="M261.8917,113.8818a3.9956,3.9956,0,1,0,0-.0494Z" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #a9b7f2;stroke-miterlimit: 10;stroke-width: 1.2771999835968018px;">
                                        </path>
                                        <path d="M499.9784,60.3563H470.8463" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #a9b7f2;stroke-miterlimit: 10;stroke-width: 0.9984999895095825px;">
                                        </path>
                                        <path d="M69.3441,146.7652H44.0666" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #a9b7f2;stroke-miterlimit: 10;stroke-width: 0.9984999895095825px;">
                                        </path>
                                        <path d="M281.4021,42.2014H237.3879" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #a9b7f2;stroke-miterlimit: 10;stroke-width: 0.9984999895095825px;">
                                        </path>
                                    </g>
                                </g>
                                <g id="phone">
                                    <path d="M207.4824,320.2194H128.31A18.4734,18.4734,0,0,1,110.01,301.5762V86.8988A18.4735,18.4735,0,0,1,128.31,68.2553h79.1728A18.4733,18.4733,0,0,1,225.781,86.8988V301.5762A18.4732,18.4732,0,0,1,207.4824,320.2194Z" transform="translate(-37.9446 -41.7022)" style="fill: #424b5b;"></path>
                                    <path d="M213.09,320.2194H133.9173a18.4735,18.4735,0,0,1-18.2994-18.6432V86.8988a18.4736,18.4736,0,0,1,18.2994-18.6435H213.09a18.4734,18.4734,0,0,1,18.2987,18.6435V301.5762A18.4733,18.4733,0,0,1,213.09,320.2194Z" transform="translate(-37.9446 -41.7022)" style="fill: #5b677d;"></path>
                                    <path d="M213.5728,314.4732H134.18a12.7181,12.7181,0,0,1-12.6-12.828V87.9782a12.7181,12.7181,0,0,1,12.6-12.828h79.393a12.7178,12.7178,0,0,1,12.6,12.828V301.653A12.7111,12.7111,0,0,1,213.5728,314.4732Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;"></path>
                                    <path d="M190.6607,83.0113H157.9492a2.9631,2.9631,0,0,1-2.934-2.9883V75.15h38.5795V80.023A2.9631,2.9631,0,0,1,190.6607,83.0113Z" transform="translate(-37.9446 -41.7022)" style="fill: #77849c;"></path>
                                    <path d="M183.0768,79.08H165.5331" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #312220;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.868399977684021px;opacity: 0.23000000417232513;isolation: isolate;">
                                    </path>
                                    <g style="mask: url(#mask);">
                                        <g>
                                            <path d="M126.8476,117.9114h93.22v71.1269h-93.22Z" transform="translate(-37.9446 -41.7022)" style="fill: #d8dffd;"></path>
                                            <polyline points="88.905 86.188 138.715 124.498 168.405 147.338" style="fill: none;stroke: #fff;stroke-miterlimit: 10;stroke-width: 5.125999927520752px;">
                                            </polyline>
                                            <line x1="188.2254" y1="162.5878" x2="187.8354" y2="162.2878" style="fill: none;stroke: #fff;stroke-miterlimit: 10;stroke-width: 5.125999927520752px;">
                                            </line>
                                            <line x1="121.7154" y1="147.3378" x2="88.9054" y2="122.0978" style="fill: none;stroke: #fff;stroke-miterlimit: 10;stroke-width: 5.125999927520752px;">
                                            </line>
                                            <line x1="188.2254" y1="126.7078" x2="187.8354" y2="126.4078" style="fill: none;stroke: #fff;stroke-miterlimit: 10;stroke-width: 5.125999927520752px;">
                                            </line>
                                            <polyline points="182.125 122.008 154.545 100.798 125.475 78.438 122.585 76.208 119.365 73.738 111.165 67.418 111.145 67.408" style="fill: none;stroke: #fff;stroke-miterlimit: 10;stroke-width: 5.125999927520752px;">
                                            </polyline>
                                            <path d="M208.9,117.91,192.49,142.5l-15.83,23.7-6.11,9.16a5.264,5.264,0,0,0,.88,6.84l7.78,6.84" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #fff;stroke-miterlimit: 10;stroke-width: 5.125999927520752px;">
                                            </path>
                                        </g>
                                    </g>
                                    <path d="M141.9687,110.8813c0-9.0519,9.3793-15.8731,18.78-10.93a11.7714,11.7714,0,0,1,4.1105,4.0943,13.27,13.27,0,0,1,.4732,12.5345h.0141l-.0988.1871c-.0425.0863-.0918.1726-.1413.259l-10.7776,19.8595L143.53,116.9975c-.0354-.0648-.0706-.1367-.1059-.2015l-.0495-.0935h.007A12.6811,12.6811,0,0,1,141.9687,110.8813Z" transform="translate(-37.9446 -41.7022)" style="fill: #fdab3e;"></path>
                                    <path d="M152.2331,115.8962a5.6143,5.6143,0,0,1-2.9481-7.2918,5.4379,5.4379,0,0,1,7.1573-3.0035,5.6142,5.6142,0,0,1,2.9479,7.2918A5.4377,5.4377,0,0,1,152.2331,115.8962Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;"></path>
                                </g>
                                <g id="car" data-aos="slide-left" data-aos-duration="2000" data-aos-delay="600">
                                    <path d="M285.0839,250.4511h14.928c14.655,0,26.535,15.37,26.535,34.3321s-11.88,34.332-26.535,34.332h-14.928c-14.655,0-26.534-15.37-26.534-34.332S270.4289,250.4511,285.0839,250.4511Z" transform="translate(-37.9446 -41.7022)" style="fill: #272727;"></path>
                                    <path d="M98.9287,250.4511h14.9274c14.6555,0,26.5348,15.37,26.5348,34.3321s-11.8793,34.332-26.5348,34.332H98.9287c-14.6555,0-26.5348-15.37-26.5348-34.332S84.2732,250.4511,98.9287,250.4511Z" transform="translate(-37.9446 -41.7022)" style="fill: #272727;"></path>
                                    <path d="M169.8339,242.1306H279.87v49.2086H169.8339Z" transform="translate(-37.9446 -41.7022)" style="fill: #272727;"></path>
                                    <path d="M219.7069,319.0322c-14.313,0-25.917-15.017-25.917-33.541s11.604-33.542,25.917-33.542,25.917,15.017,25.917,33.542S234.0209,319.0322,219.7069,319.0322Z" transform="translate(-37.9446 -41.7022)" style="fill: #272727;"></path>
                                    <path d="M234.2879,319.0322h-14.581l-14.903-14.901,14.903-52.1737h14.581Z" transform="translate(-37.9446 -41.7022)" style="fill: #272727;"></path>
                                    <path d="M234.2879,319.0322c-14.313,0-25.916-15.017-25.916-33.541s11.603-33.542,25.916-33.542,25.917,15.017,25.917,33.542S248.6019,319.0322,234.2879,319.0322Z" transform="translate(-37.9446 -41.7022)" style="fill: #424b5b;"></path>
                                    <path d="M234.2709,301.4552a16.998,16.998,0,1,1,17-16.998A16.9994,16.9994,0,0,1,234.2709,301.4552Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;"></path>
                                    <path d="M228.1339,300.3142a16.998,16.998,0,1,0,0-31.714,16.1939,16.1939,0,0,1,2.137-.141,15.998,15.998,0,1,1,0,31.996A16.2052,16.2052,0,0,1,228.1339,300.3142Z" transform="translate(-37.9446 -41.7022)" style="fill: #b8b8c2;fill-rule: evenodd;"></path>
                                    <path d="M355.9889,242.1306h110.036v49.2086H355.9889Z" transform="translate(-37.9446 -41.7022)" style="fill: #272727;"></path>
                                    <path d="M405.8709,319.0322c-14.314,0-25.917-15.017-25.917-33.541s11.603-33.542,25.917-33.542,25.917,15.017,25.917,33.542S420.1849,319.0322,405.8709,319.0322Z" transform="translate(-37.9446 -41.7022)" style="fill: #272727;"></path>
                                    <path d="M420.4519,319.0322h-14.581l-14.911-14.901,14.911-52.1737h14.581Z" transform="translate(-37.9446 -41.7022)" style="fill: #272727;"></path>
                                    <path d="M420.4519,319.0322c-14.313,0-25.917-15.017-25.917-33.541s11.604-33.542,25.917-33.542,25.917,15.017,25.917,33.542S434.7659,319.0322,420.4519,319.0322Z" transform="translate(-37.9446 -41.7022)" style="fill: #424b5b;"></path>
                                    <path d="M422.2709,301.4552a16.998,16.998,0,1,1,17-16.998A16.9994,16.9994,0,0,1,422.2709,301.4552Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;"></path>
                                    <path d="M419.7709,301.2722a17.1775,17.1775,0,0,0,2.5.183,16.998,16.998,0,1,0,0-33.996,17.1778,17.1778,0,0,0-2.5.182,17,17,0,0,1,0,33.631Z" transform="translate(-37.9446 -41.7022)" style="fill: #b8b8c2;fill-rule: evenodd;"></path>
                                    <path d="M483.51,233.07v58.27H450.17a59,59,0,0,0-2.45-18.96c-.07-.25-.15-.5-.23-.75-3.36-10.22-10.8-20.75-27.11-21.5a28.3852,28.3852,0,0,0-11.95,1.83,1.877,1.877,0,0,0-.3.12,22.0113,22.0113,0,0,0-2.67,1.3c-17.19,9.78-16.86,37.96-16.86,37.96H263.71a53.5875,53.5875,0,0,0-2.59-21.3c-3.81-11.43-11.86-21.84-26.21-21.84a30.7916,30.7916,0,0,0-15.11,3.75c-.01,0-.01.01-.02.01-.03.02-.05.03-.08.05h-.01c-11.94,6.64-16.06,19.61-16.06,19.61H38.35a52.6534,52.6534,0,0,1-.17-5.66c.02-1.55.11-3.35.3-5.28a51.0238,51.0238,0,0,1,1.36-7.84c.21-.8.44-1.6.7-2.39.01-.03.02-.07.03-.1,3.34-10.13,18.93-14.36,18.93-14.36l75.26-16.47,39-19.4,17.6-8.76a106.8735,106.8735,0,0,1,49.07-11.18l127.09.65c4.19,0,9.88,1.45,16.27,3.76a226.6626,226.6626,0,0,1,23.37,10.3c18.75,9.36,35.97,19.94,35.97,19.94a170.1572,170.1572,0,0,1,26.05,1.71A16.6545,16.6545,0,0,1,483.51,233.07Z" transform="translate(-37.9446 -41.7022)" style="fill: #eaa947;"></path>
                                    <g style="mask: url(#mask-2);">
                                        <path d="M266.42,206.34l-28.64,15.17-38.92,20.62-18.83,9.97-1.69.9-8.51-.01-32.61-.04-13.43-.01-34.71-.04-17.96-.03-31.28-.03h-.27a12.8743,12.8743,0,0,1,.94-2.39h.03c.01-.03.02-.07.03-.1,3.34-10.13,18.93-14.36,18.93-14.36l75.26-16.47,39-19.4,2.86,3.54,6.64,8.18,1.36,1.67,3.1-.27,21.82-1.91,25.19-2.21Z" transform="translate(-37.9446 -41.7022)" style="fill: #f0c98c;opacity: 0.6000000238418579;isolation: isolate;">
                                        </path>
                                    </g>
                                    <path d="M482.2789,271.6272a7.8909,7.8909,0,0,1,7.892,7.883l.008,3.954a7.8832,7.8832,0,0,1-7.883,7.883h-32.121s.165-10.749-2.685-19.72Z" transform="translate(-37.9446 -41.7022)" style="fill: #cd8634;"></path>
                                    <path d="M428.21,221.08a1.4753,1.4753,0,0,1-1.07.43H265.34a2.308,2.308,0,0,1-1.14-4.32l50.23-28.25a28.51,28.51,0,0,1,13.97-3.66h29.9a41,41,0,0,1,17.43,3.88,39.2287,39.2287,0,0,1,4.45,2.43l16.41,9.31,31.3,17.76A1.5306,1.5306,0,0,1,428.21,221.08Z" transform="translate(-37.9446 -41.7022)" style="fill: #292f39;"></path>
                                    <path d="M396.59,200.9l-36.31,20.61h-41.5l56.95-32.35a39.2287,39.2287,0,0,1,4.45,2.43Z" transform="translate(-37.9446 -41.7022)" style="fill: #5e5e5e;"></path>
                                    <path d="M428.2129,219.8328v20.2633s-43.819-8.822-48.259,41.3911H279.87s2.677-49.0846-15.801-61.0531" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.7860000133514404px;opacity: 0.10000000149011612;isolation: isolate;">
                                    </path>
                                    <path d="M346.5319,221.5131s10.438,4.6293,5.38,59.9741" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.7860000133514404px;opacity: 0.10000000149011612;isolation: isolate;">
                                    </path>
                                    <path d="M330.4349,231.3241h10.059a1.99,1.99,0,0,0,1.993-1.9936v-.9227a1.99,1.99,0,0,0-1.993-1.9936h-10.059a1.99,1.99,0,0,0-1.994,1.9936v.9227A2.0006,2.0006,0,0,0,330.4349,231.3241Z" transform="translate(-37.9446 -41.7022)" style="fill: #424b5b;"></path>
                                    <path d="M405.9779,231.3241h10.059a1.9894,1.9894,0,0,0,1.993-1.9936v-.9227a1.9894,1.9894,0,0,0-1.993-1.9936h-10.059a1.99,1.99,0,0,0-1.994,1.9936v.9227A1.9955,1.9955,0,0,0,405.9779,231.3241Z" transform="translate(-37.9446 -41.7022)" style="fill: #424b5b;"></path>
                                    <path d="M295.3329,190.9946l-57.486,30.5185h-97.736l65.748-32.1494a40.1971,40.1971,0,0,1,17.671-4.0856h70.377A3.036,3.036,0,0,1,295.3329,190.9946Z" transform="translate(-37.9446 -41.7022)" style="fill: #292f39;"></path>
                                    <path d="M223.5709,226.4142H133.1" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.7860000133514404px;opacity: 0.10000000149011612;isolation: isolate;">
                                    </path>
                                    <path d="M276.7149,185.2781l-63.813,36.235h-21.295l63.796-36.235Z" transform="translate(-37.9446 -41.7022)" style="fill: #5e5e5e;"></path>
                                    <path d="M236.9659,185.2781l-63.812,36.235h-6.92l63.795-36.235Z" transform="translate(-37.9446 -41.7022)" style="fill: #5e5e5e;"></path>
                                    <path d="M48.0339,291.3392h147.725a7.8841,7.8841,0,0,0,7.884-7.883l-.017-11.829H38.3377l.1318,10.157A9.5589,9.5589,0,0,0,48.0339,291.3392Z" transform="translate(-37.9446 -41.7022)" style="fill: #cd8634;"></path>
                                    <path d="M88.3822,269.1812H111.197a2,2,0,0,1,2,2v4.115a2,2,0,0,1-2,2H88.3822a2,2,0,0,1-2-2v-4.115A2,2,0,0,1,88.3822,269.1812Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;"></path>
                                    <path d="M144.9959,253.0036H65.96" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.7860000133514404px;opacity: 0.10000000149011612;isolation: isolate;">
                                    </path>
                                    <path d="M130.5711,259.0414H78.6218" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.7860000133514404px;opacity: 0.10000000149011612;isolation: isolate;">
                                    </path>
                                    <path d="M130.5711,265.0462H78.6218" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.7860000133514404px;opacity: 0.10000000149011612;isolation: isolate;">
                                    </path>
                                    <path d="M141.7009,265.96h34.501a5.28,5.28,0,0,0,5.28-5.28V255.73a5.28,5.28,0,0,0-5.28-5.28h-34.501a5.2807,5.2807,0,0,0-5.2807,5.28v4.9505A5.28,5.28,0,0,0,141.7009,265.96Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;"></path>
                                    <path d="M71.96,255.73v4.95a5.2814,5.2814,0,0,1-5.28,5.28H38.16a42.4339,42.4339,0,0,1,1.41-13.12,12.8743,12.8743,0,0,1,.94-2.39H66.68a5.2838,5.2838,0,0,1,4.44,2.42c.02.04.05.08.07.13A5.1711,5.1711,0,0,1,71.96,255.73Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;"></path>
                                    <path d="M181.4819,260.6806H136.42" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.7860000133514404px;opacity: 0.10000000149011612;isolation: isolate;">
                                    </path>
                                    <path d="M71.9572,260.6806h-33.62" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #000;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.7860000133514404px;opacity: 0.10000000149011612;isolation: isolate;">
                                    </path>
                                </g>
                                <g id="man">
                                    <path d="M340.894,73.1047c0-13.4,13.6159-23.5011,27.2593-16.1754a17.3548,17.3548,0,0,1,5.9708,6.06c3.57,6.7145,3.2518,13.3285.6849,18.5621h.0209l-.1453.2732c-.0692.1294-.1315.2516-.2007.3811l-15.643,29.396L343.17,82.1557c-.0554-.1006-.1038-.1941-.1592-.2947l-.0692-.1366h.007A18.9249,18.9249,0,0,1,340.894,73.1047Z" transform="translate(-37.9446 -41.7022)" style="fill: #fdab3e;"></path>
                                    <path d="M358.8271,81.1708a8.2663,8.2663,0,1,1,7.95-8.26A8.1094,8.1094,0,0,1,358.8271,81.1708Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;"></path>
                                    <path d="M424.4085,304.4342H413.2211l-18.5073,10.2873,31.819-.3954Z" transform="translate(-37.9446 -41.7022)" style="fill: #171a1e;"></path>
                                    <path d="M426.6436,318.676l-.1108-4.35-31.8188.3954.1107,4.35Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;"></path>
                                    <path d="M405.4862,308.2237l3.6669,1.0421" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.4565999507904053px;">
                                    </path>
                                    <path d="M409.07,306.3106l3.6669,1.043" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.4565999507904053px;">
                                    </path>
                                    <path d="M412.0382,288.0428H423.44l.9687,16.3914H413.0068Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M404.573,180.3366l7.0363,118.8278h15.8784l-2.7471-118.8278Z" transform="translate(-37.9446 -41.7022)" style="fill: #dde0e6;"></path>
                                    <path d="M450.1246,304.4342H438.9371L420.43,314.7215l31.8192-.3954Z" transform="translate(-37.9446 -41.7022)" style="fill: #171a1e;"></path>
                                    <path d="M452.36,318.676l-.1108-4.35-31.8189.3954.1107,4.35Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;"></path>
                                    <path d="M431.2023,308.2237l3.6675,1.0421" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.4565999507904053px;">
                                    </path>
                                    <path d="M434.7867,306.3106l3.6667,1.043" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 1.4565999507904053px;">
                                    </path>
                                    <path d="M436.62,288.0428h11.4016l2.1038,16.3914H438.723Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M438.204,180.3366,453.75,299.1644H436.3916L413.7885,180.3366Z" transform="translate(-37.9446 -41.7022)" style="fill: #dde0e6;"></path>
                                    <path d="M426.2556,245.88l-8.8763-46.6572-6.4758-4.3857" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #171717;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.6376000046730042px;opacity: 0.20000000298023224;isolation: isolate;">
                                    </path>
                                    <path d="M440.4808,197.7561l-9.7-7.93" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #171717;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.6376000046730042px;opacity: 0.20000000298023224;isolation: isolate;">
                                    </path>
                                    <path d="M401.5841,135.175l-17.67,24.1052a6.52,6.52,0,0,0-.2905,8.0731,5.9411,5.9411,0,0,0,9.16.5821l18.9846-22.8175a7.4764,7.4764,0,0,0,.1938-9.9861A6.8157,6.8157,0,0,0,401.5841,135.175Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M410.2393,126.031s-8.6344,1.1215-15.2486,14.4356l10.1565,12.6528Z" transform="translate(-37.9446 -41.7022)" style="fill: #8f9ee1;"></path>
                                    <path d="M396.0354,160.2717l-24.2221-15.7866-4.8223,5.1755,17.5594,18.692Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M367.932,134.6292l-12.0108,3.6377s0,9.6691,11.0767,11.4164a10.215,10.215,0,0,0,3.7983-1.4235l1.84-5.4565a2.4046,2.4046,0,0,0-.1315-2.9764Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M368.9283,136.2318l-4.2481-5.7944a1.7005,1.7005,0,0,0-2.4284-.381,1.8975,1.8975,0,0,0-.256,2.48l3.9228,6.3551Z" transform="translate(-37.9446 -41.7022)" style="fill: #e9b0a0;"></path>
                                    <path d="M363.7946,140.855l-5.1059-5.2336a1.6064,1.6064,0,0,0-2.3523-.1654,1.8831,1.8831,0,0,0,.0829,2.4371l4.8707,5.8091Z" transform="translate(-37.9446 -41.7022)" style="fill: #e9b0a0;"></path>
                                    <path d="M365.76,137.2816l-4.8223-4.9532a1.6557,1.6557,0,0,0-2.4284-.0719,1.9446,1.9446,0,0,0,.0277,2.5161l4.5662,5.5572Z" transform="translate(-37.9446 -41.7022)" style="fill: #e9b0a0;"></path>
                                    <path d="M357.644,122.0838l-1.9165.1294v13.0409l6.7111,10.9128,2.041-.1728-3.5977-13.7091Z" transform="translate(-37.9446 -41.7022)" style="fill: #424b5b;"></path>
                                    <path d="M368.8868,140.1858l-5.6111,5.4924a1.2332,1.2332,0,0,1-1.9856-.0219l-12.2113-15.8371a1.1354,1.1354,0,0,1,.0138-1.3588l5.8808-5.8446a1.0268,1.0268,0,0,1,1.6535.0143l12.2737,15.9166A1.3691,1.3691,0,0,1,368.8868,140.1858Z" transform="translate(-37.9446 -41.7022)" style="fill: #424b5b;"></path>
                                    <path d="M370.7547,140.0563l-5.6109,5.4927a1.2338,1.2338,0,0,1-1.9857-.0218L350.9467,129.69a1.1353,1.1353,0,0,1,.0139-1.3587l5.8808-5.8446a1.0269,1.0269,0,0,1,1.6536.0143l12.2736,15.9166A1.3687,1.3687,0,0,1,370.7547,140.0563Z" transform="translate(-37.9446 -41.7022)" style="fill: #ccd1da;"></path>
                                    <path d="M371.35,144.5785a5.1132,5.1132,0,0,0,2.0064-4.81,15.6024,15.6024,0,0,0-2.1449-6.233c-.588-1.143-1.266-1.6966-2.2208-1.56a1.8727,1.8727,0,0,0-1.5083,2.0849l1.0724,2.48s-1.1831,3.1416,1.2938,7.9006Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M426.4908,123.4785a58.8323,58.8323,0,0,1,11.1874,4.0259c2.9336,1.5384,3.2586,4.86,2.8924,8.2458l-2.3666,44.5864H404.58L402.2275,137.26c-.3251-4.7232,2.3455-9.353,6.6627-10.877,4.8361-1.7111,7.8872-3.3357,10.4609-3.4867Z" transform="translate(-37.9446 -41.7022)" style="fill: #a9b7f2;"></path>
                                    <path d="M402.9332,150.3658l-.7126-13.106" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #171717;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.6376000046730042px;opacity: 0.20000000298023224;isolation: isolate;">
                                    </path>
                                    <path d="M426.4908,123.4786l3.875,1.1072s-2.8781,5.7663-13.3394,4.7885c-7.3337-.683-4.38-4.4146-4.38-4.4146l3.6461-1.3733Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M458.2685,149.0715,440.9024,175.635l4.677,5.32,19.165-19.5185Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M424.948,176.85l7.4309-3.9249-.7265-1.6966a1.5328,1.5328,0,0,1,.4015-1.7691,1.3937,1.3937,0,0,1,1.7913-.0288l7.3133,5.9671,4.4209,5.5577c-4.0127,3.5723-6.6347,3.5225-8.143,2.8322-.173.0576-.3528.1291-.5325.18l-6.1719,1.8406a1.1547,1.1547,0,0,1-1.5151-.5682c-.2007-.4171-.2763-1.0927.9137-1.7184l-1.19.6257a1.1945,1.1945,0,0,1-1.5848-.6187,1.4754,1.4754,0,0,1,.7609-1.7395l-.9062.3736a1.2429,1.2429,0,0,1-1.6813-.7689,1.3724,1.3724,0,0,1,.6786-1.6251l1.3143-.69-1.557.3954a1.3471,1.3471,0,0,1-1.75-.913A1.4629,1.4629,0,0,1,424.948,176.85Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M427.1207,179.2726l4.3864-2.15" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #171717;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.4140999913215637px;opacity: 0.30000001192092896;isolation: isolate;">
                                    </path>
                                    <path d="M428.2964,181.71l4.2345-1.8337" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #171717;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.4140999913215637px;opacity: 0.30000001192092896;isolation: isolate;">
                                    </path>
                                    <path d="M429.7359,183.68l3.5912-1.4671" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #171717;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.4140999913215637px;opacity: 0.30000001192092896;isolation: isolate;">
                                    </path>
                                    <path d="M433.9149,141.7542l22.0776,19.7908a5.9227,5.9227,0,0,0,7.7416.7908,6.481,6.481,0,0,0,1.1136-9.4678L444.0853,131.79a6.8094,6.8094,0,0,0-9.5825-.8053A7.4481,7.4481,0,0,0,433.9149,141.7542Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M432.9189,125.4486s11.5259,2.3436,20.9765,14.7951l-10.0175,13.573-14.3637-10.69Z" transform="translate(-37.9446 -41.7022)" style="fill: #a9b7f2;"></path>
                                    <path d="M439,150.1869l-8.337-6.1984" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #171717;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.6376000046730042px;opacity: 0.20000000298023224;isolation: isolate;">
                                    </path>
                                    <path d="M408.6273,86.0455s-3.8883,3.609-.6643,11.7254l5.3412-10.949Z" transform="translate(-37.9446 -41.7022)" style="fill: #15181d;"></path>
                                    <path d="M430.4212,87.0305s4.5452-.51,5.5765,6.765-4.1168,11.6319-9.8319,15.1545Z" transform="translate(-37.9446 -41.7022)" style="fill: #15181d;"></path>
                                    <path d="M420.9493,110.1932c-7.1988,0-13.0346-6.2056-13.0346-13.8606s5.8358-13.86,13.0346-13.86,13.0345,6.2055,13.0345,13.86S428.1478,110.1932,420.9493,110.1932Z" transform="translate(-37.9446 -41.7022)" style="fill: #15181d;"></path>
                                    <path d="M406.44,102.7293a3.4994,3.4994,0,0,1,1.4956-4.6047,3.251,3.251,0,0,1,4.4314,1.5545,3.4994,3.4994,0,0,1-1.4956,4.6047A3.2509,3.2509,0,0,1,406.44,102.7293Z" transform="translate(-37.9446 -41.7022)" style="fill: #dd8161;"></path>
                                    <path d="M416.2378,110.2793l-.1938,17.5643,10.7307-1.84-.7819-24.0633Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <g style="mask: url(#mask-3);">
                                        <path d="M416.134,117.8494l7.5344-7.6564-7.7766,1.4163Z" transform="translate(-37.9446 -41.7022)" style="fill: #171717;opacity: 0.20000000298023224;isolation: isolate;">
                                        </path>
                                    </g>
                                    <path d="M409.4714,89.676s-2.9059,12.0417-1.5913,16.6642c1.3076,4.6226,4.7669,7.6205,10.537,6.6355,0,0,6.6561-.1294,8.62-10.3306C429.9988,87.2965,416.6321,81.6818,409.4714,89.676Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M425.1765,102.6446s-4.2618-10.1654.367-12.15c1.3907-.5967,2.2-.8986,2.8571,4.1984s-1.0582,5.931-1.0582,5.931Z" transform="translate(-37.9446 -41.7022)" style="fill: #15181d;"></path>
                                    <path d="M431.0645,103.81a3.39,3.39,0,0,1-4.331,2.236,3.5848,3.5848,0,0,1-2.1519-4.5008,3.39,3.39,0,0,1,4.3313-2.236A3.5858,3.5858,0,0,1,431.0645,103.81Z" transform="translate(-37.9446 -41.7022)" style="fill: #ebb28b;"></path>
                                    <path d="M429.3966,101.6887a2.4837,2.4837,0,0,0-3.2308,2.02" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #171717;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.3944000005722046px;">
                                    </path>
                                    <path d="M411.8514,101.293l-.74,2.6027a.3779.3779,0,0,0,.2628.4314l.8372.1438" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #1e0b07;stroke-linecap: round;stroke-linejoin: round;stroke-width: 0.37279999256134033px;">
                                    </path>
                                    <path d="M417.068,100.4814a.8433.8433,0,0,1-.7748.9059.8343.8343,0,0,1-.8718-.8053.8434.8434,0,0,1,.7749-.9059A.8343.8343,0,0,1,417.068,100.4814Z" transform="translate(-37.9446 -41.7022)" style="fill: #171717;"></path>
                                    <path d="M410.1563,100.2872a.7813.7813,0,0,1-.7195.8413.773.773,0,0,1-.81-.7478.7665.7665,0,1,1,1.529-.0935Z" transform="translate(-37.9446 -41.7022)" style="fill: #171717;"></path>
                                    <path d="M414.688,94.665l6.2268,2.0708a7.5906,7.5906,0,0,0-3.1826-2.5668A3.2874,3.2874,0,0,0,414.688,94.665Z" transform="translate(-37.9446 -41.7022)" style="fill: #171717;"></path>
                                    <path d="M411.194,94.5138l-3.2794,1.1s.56-1.4595,1.5082-1.7687S411.194,94.5138,411.194,94.5138Z" transform="translate(-37.9446 -41.7022)" style="fill: #171717;"></path>
                                    <path d="M416.2446,105.11a11.3306,11.3306,0,0,1-4.587,1.215S414.778,108.6766,416.2446,105.11Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;"></path>
                                    <path d="M426.9267,90.61s-3.4659,3.0985-12.0381,1.3084c-8.5721-1.7972-8.9111-7.8361-7.88-9.9568,0,0,3.1549,2.5449,8.3577,1.15,2.8989-.7764,9.3746-3.6089,13.263-.5751a4.6919,4.6919,0,0,1,1.7989,4.486A4.6113,4.6113,0,0,1,426.9267,90.61Z" transform="translate(-37.9446 -41.7022)" style="fill: #15181d;"></path>
                                    <path d="M465.9546,248.3232h22.3195v-49.69a8.8283,8.8283,0,0,0-8.6545-8.9938h-5.0163a8.8284,8.8284,0,0,0-8.6554,8.9938v49.69Z" transform="translate(-37.9446 -41.7022)" style="fill: none;stroke: #424b5b;stroke-miterlimit: 10;stroke-width: 2.868499994277954px;">
                                    </path>
                                    <path d="M483.4988,314.9135a5.3956,5.3956,0,0,1,3.8574-6.4742,5.1766,5.1766,0,0,1,6.2307,4.0077,5.3964,5.3964,0,0,1-3.8574,6.4751A5.1778,5.1778,0,0,1,483.4988,314.9135Z" transform="translate(-37.9446 -41.7022)" style="fill: #424b5b;"></path>
                                    <path d="M462.0292,317.49a5.5353,5.5353,0,0,1,0-7.6158,5.0457,5.0457,0,0,1,7.3284,0,5.5351,5.5351,0,0,1,0,7.6158A5.0457,5.0457,0,0,1,462.0292,317.49Z" transform="translate(-37.9446 -41.7022)" style="fill: #424b5b;"></path>
                                    <path d="M459.3964,312.4217H494.84a9.3466,9.3466,0,0,0,9.16-9.5184V240.7756a9.346,9.346,0,0,0-9.16-9.5184H459.3964a9.3468,9.3468,0,0,0-9.161,9.5184v62.1277A9.3473,9.3473,0,0,0,459.3964,312.4217Z" transform="translate(-37.9446 -41.7022)" style="fill: #a9b7f2;"></path>
                                    <path d="M492.8134,299.1714V245.1175a.9829.9829,0,1,1,1.9644,0v54.0539a.9829.9829,0,1,1-1.9644,0Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;opacity: 0.30000001192092896;isolation: isolate;"></path>
                                    <path d="M482.3726,299.1714V245.1175a.9833.9833,0,1,1,1.9652,0v54.0539a.9833.9833,0,1,1-1.9652,0Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;opacity: 0.30000001192092896;isolation: isolate;"></path>
                                    <path d="M471.9326,299.1714V245.1175a.9833.9833,0,1,1,1.9652,0v54.0539a.9833.9833,0,1,1-1.9652,0Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;opacity: 0.30000001192092896;isolation: isolate;"></path>
                                    <path d="M461.4926,299.1714V245.1175a.9829.9829,0,1,1,1.9644,0v54.0539a.9829.9829,0,1,1-1.9644,0Z" transform="translate(-37.9446 -41.7022)" style="fill: #fff;opacity: 0.30000001192092896;isolation: isolate;"></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <form class="main-section-search calendar-zone-height active" id="main-page-search" method="GET" action="{{ route('searchcar', app()->getLocale()) }}" onsubmit="return validateForm1()">
                <div class="main-section-search--from main-section-search--wrap__input col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="main-section-search--icon">
                        <svg class="icon icon-map2 ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2') }}"></use>
                        </svg>
                    </div>
                    <input class="main-section-search--input__from map-input" type="text" id="address1-input" name="fc" placeholder="Откуда..." required>
                    <input type="hidden" name="address1_latitude" id="address1-latitude" value="0" />
                    <input type="hidden" name="address1_longitude" id="address1-longitude" value="0" />
                    <input type="hidden" name="address1_component" id="address1-component" value="0" />
                </div>
                <div class="main-section-search--to main-section-search--wrap__input col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="main-section-search--icon">
                        <svg class="icon icon-map2 ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2') }}"></use>
                        </svg>
                    </div>
                    <input class="main-section-search--input__to map-input" type="text" name="dc" id="address2-input" placeholder="Куда..." required>
                    <input type="hidden" name="address2_latitude" id="address2-latitude" value="0" />
                    <input type="hidden" name="address2_longitude" id="address2-longitude" value="0" />
                    <input type="hidden" name="address2_component" id="address2-component" value="0" />
                    <input type="hidden" name="current_lat" class="current_lat" value="0" />
                    <input type="hidden" name="current_lng" class="current_lng" value="0" />
                    <input type="hidden" name="hour" id="client_hours" value="0" />
                </div>
                <div class="main-section-search--calendar main-section-search--wrap__input col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="main-section-search--icon">
                        <svg class="icon icon-calendar ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#calendar') }}"></use>
                        </svg>
                    </div>
                    <input class="main-section-search--input__calendar popup-show-calendar popup-show-calendar-click calendar-zone-height" name="date" type="text" readonly required>
                </div>
                <div class="main-section-search--peoples main-section-search--wrap__input col-xl-3 col-lg-6 col-md-6 col-sm-6">
                    <div class="main-section-search--icon">
                        <svg class="icon icon-man ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#man') }}"></use>
                        </svg>
                    </div>
                    <input class="main-section-search--input__peoples" type="text" name="count" value="1 пассажир" readonly required>
                    <div class="main-section-search--peoples__count--wrap">
                        <div class="main-section-search--peoples__count">
                            <div class="main-section-search--minus main-section-search--controls people-count-start">
                                <svg class="icon icon-minus ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#minus') }}"></use>
                                </svg>
                            </div>
                            <div class="main-section-search-count-div">1</div>
                            <div class="main-section-search--plus main-section-search--controls">
                                <svg class="icon icon-add ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#add') }}"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <button class="main-section-search--submit" type="submit">
                        <svg class="icon icon-search ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#search') }}"></use>
                        </svg><span class="main-section-search--submit--found">Найти</span>
                    </button>
                </div>
            </form>
            <form class="find-trip-form find-trip-form--peoples trip-peoples active" method="GET"
                        action="{{ route('searchcar', app()->getLocale()) }}" id="mobile-main-page-search" onsubmit="return validateFormPassenger()">
                        <div class="find-trip-change--wrap">
                            <div class="gogocar-input--wrapper">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-map2 ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1 gogocar-from map-input" id="address4-input" type="text"
                                    name="fc" placeholder="Откуда...">
                                <input type="hidden" name="address1_latitude" id="address4-latitude" value="0" />
                                <input type="hidden" name="address1_longitude" id="address4-longitude" value="0" />
                                <input type="hidden" name="address1_component" id="address4-component" value="0" />
                                <input type="hidden" name="current_lat" class="current_lat" value="0" />
                                <input type="hidden" name="current_lng" class="current_lng" value="0" />
                            </div>
                            <div class="gogocar-input--wrapper">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-map2 ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#map2')}}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1 gogocar-to map-input" id="address5-input" type="text"
                                    name="dc" placeholder="Куда...">
                                <input type="hidden" name="address2_latitude" id="address5-latitude" value="0" />
                                <input type="hidden" name="address2_longitude" id="address5-longitude" value="0" />
                                <input type="hidden" name="address2_component" id="address5-component" value="0" />
                            </div>
                            <div class="find-trip-change gogocar-yellow-icons">
                                <svg class="icon icon-sort ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#sort')}}"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="find-trip-data__count">
                            <div class="gogocar-input--wrapper w-48">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-calendar ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar')}}"></use>
                                    </svg>
                                </div>
                                <input
                                    class="gogocar-input-v1 popup-show-calendar"
                                    name="date" type="text" readonly>
                                <input type="hidden" name="hour" id="client_hours" value="0" />
                            </div>
                            <div class="gogocar-input--wrapper w-48 position-relative">
                                <div class="gogocar-input-icon gogocar-gray-icons">
                                    <svg class="icon icon-man ">
                                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#man')}}"></use>
                                    </svg>
                                </div>
                                <input class="gogocar-input-v1 main-section-search--input__peoples" type="text"
                                    name="count" value="1 пассажир" readonly>
                                <div class="main-section-search--peoples__count--wrap">
                                    <div class="main-section-search--peoples__count">
                                        <div
                                            class="main-section-search--minus main-section-search--controls people-count-start">
                                            <svg class="icon icon-minus ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#minus')}}">
                                                </use>
                                            </svg>
                                        </div>
                                        <div class="main-section-search-count-div">1</div>
                                        <div class="main-section-search--plus main-section-search--controls">
                                            <svg class="icon icon-add ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#add')}}">
                                                </use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="gogocar-yellow-button find-trip-submit" type="submit">@lang('front.search_page.find')</button>
            </form>
        </div>
    </section>
    <section class="plan-trip">
        <div class="container">
            <div class="plan-trip--wrap">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 plan-trip--baner">
                    <svg class="icon" id="svg2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewbox="0 0 413.617 197.2431">
                        <defs>
                            <mask id="mask" x="29.617" y="9.1198" width="361.9557" height="180.1658" maskunits="userSpaceOnUse">
                                <g transform="translate(-0.3404 -23.1702)">
                                    <g id="mask0">
                                        <path d="M335.9829,211.6172s57.2389-23.905,55.9074-72.1312-55.58-70.6509-92.41-40.8756-60.661,4.808-79.7442-20.3572c-19.0779-25.16-61.6433-56.9148-117.4893-42.2407C43.7551,51.3846,25.7537,107.0179,31.5452,144.1378c4.1606,26.6659,19.3828,49.2736,40.13,66.6458.6768.5623,1.3646,1.1247,2.0747,1.6722Z" style="fill: #67758e;"></path>
                                    </g>
                                </g>
                            </mask>
                            <lineargradient id="Безымянный_градиент_2" data-name="Безымянный градиент 2" x1="174.9787" y1="155.3603" x2="174.9787" y2="171.8244" gradienttransform="matrix(1, 0, 0, -1, 0, 222)" gradientunits="userSpaceOnUse">
                                <stop offset="0" stop-color="#f7fbfe"></stop>
                                <stop offset="0.997" stop-color="#e1f1fb"></stop>
                            </lineargradient>
                            <lineargradient id="Безымянный_градиент_2-2" x1="73.1915" y1="165.5731" x2="73.1915" y2="182.0371" xlink:href="#Безымянный_градиент_2">
                                <lineargradient id="Безымянный_градиент_2-3" x1="330.5532" y1="173.9146" x2="330.5532" y2="195.7439" xlink:href="#Безымянный_градиент_2">
                                    <mask id="mask-2" x="82.1011" y="3.6904" width="87.0369" height="179.0405" maskunits="userSpaceOnUse">
                                        <g transform="translate(-0.3404 -23.1702)">
                                            <g id="mask0-2" data-name="mask0">
                                                <path d="M151.9512,26.8606H99.8869A17.2262,17.2262,0,0,0,82.4415,43.859V188.797a17.2263,17.2263,0,0,0,17.4454,16.9984h52.0643a17.2263,17.2263,0,0,0,17.4453-16.9984V43.859A17.2262,17.2262,0,0,0,151.9512,26.8606Z" style="fill: #cbe3f4;"></path>
                                            </g>
                                        </g>
                                    </mask>
                                    <mask id="mask-3" x="78.0363" y="0.0019" width="95.0849" height="188.1262" maskunits="userSpaceOnUse">
                                        <g transform="translate(-0.3404 -23.1702)">
                                            <g id="mask1">
                                                <path d="M154.7566,23.1722H97.0821A18.47,18.47,0,0,0,78.3768,41.3983v151.674a18.47,18.47,0,0,0,18.7053,18.2261h57.6745a18.47,18.47,0,0,0,18.705-18.2261V41.3983A18.47,18.47,0,0,0,154.7566,23.1722Z" style="fill: #2c4482;"></path>
                                            </g>
                                        </g>
                                    </mask>
                                    <mask id="mask-4" x="123.6772" y="109.1738" width="262.2824" height="73.4594" maskunits="userSpaceOnUse">
                                        <g transform="translate(-0.3404 -23.1702)">
                                            <g id="mask0-3" data-name="mask0">
                                                <path d="M379.71,172.1805s1.1835-12.2782,0-15.202-23.0694-3.508-23.0694-3.508-24.8429-12.2781-38.4479-17.54-69.208-3.508-81.63-2.3384-52.6446,24.5562-52.6446,24.5562c-29.5764.5848-50.28,7.0159-54.42,11.1092-2.9493,2.9152-4.6984,19.1791-5.4608,28.2967a5.7553,5.7553,0,0,0,1.5105,4.3786,5.8961,5.8961,0,0,0,4.2711,1.8919l31.6923.3611a22.6636,22.6636,0,0,1,12.1718-23.9719,22.5056,22.5056,0,0,1,28.5646,7.29,22.7293,22.7293,0,0,1,3.6716,17.1874l97.5113,1.1121a21.8265,21.8265,0,0,1,2.6161-17.3213,22.1955,22.1955,0,0,1,7.6979-7.3989,22.5451,22.5451,0,0,1,20.8258-.8746,22.2643,22.2643,0,0,1,8.3059,6.727,21.8588,21.8588,0,0,1,4.1191,16.8909l38.0384-4.75C389.7662,180.3659,379.71,172.1805,379.71,172.1805Z" style="fill: #fdab3e;fill-rule: evenodd;"></path>
                                            </g>
                                        </g>
                                    </mask>
                                    <mask id="mask-5" x="123.6772" y="109.1738" width="262.2827" height="77.226" maskunits="userSpaceOnUse">
                                        <g transform="translate(-0.3404 -23.1702)">
                                            <g id="mask1-2" data-name="mask1">
                                                <path d="M379.71,172.1805s1.1835-12.2782,0-15.202-23.0694-3.508-23.0694-3.508-24.8429-12.2781-38.4479-17.54-69.208-3.508-81.63-2.3384-52.6446,24.5562-52.6446,24.5562c-29.5764.5848-50.28,7.0159-54.42,11.1092-2.9493,2.9152-4.6984,19.1791-5.4608,28.2967a5.7553,5.7553,0,0,0,1.5105,4.3786,5.8961,5.8961,0,0,0,4.2711,1.8919l31.6923.3611a22.6636,22.6636,0,0,1,12.1718-23.9719,22.5056,22.5056,0,0,1,28.5646,7.29,22.7293,22.7293,0,0,1,3.6716,17.1874l97.5113,1.1121a21.8265,21.8265,0,0,1,2.6161-17.3213,22.1955,22.1955,0,0,1,7.6979-7.3989,22.5451,22.5451,0,0,1,20.8258-.8746,22.2643,22.2643,0,0,1,8.3059,6.727,21.8588,21.8588,0,0,1,4.1191,16.8909l38.0384-4.75C389.7662,180.3659,379.71,172.1805,379.71,172.1805Z" style="fill: #fdab3e;fill-rule: evenodd;"></path>
                                            </g>
                                        </g>
                                    </mask>
                                    <mask id="mask-6" x="201.037" y="114.1601" width="123.5955" height="31.6297" maskunits="userSpaceOnUse">
                                        <g transform="translate(-0.3404 -23.1702)">
                                            <g id="mask2">
                                                <path d="M322.8443,159.61H202.7272a1.2769,1.2769,0,0,1-.7882-.2084,1.2519,1.2519,0,0,1-.4955-.64,1.237,1.237,0,0,1,.0029-.8063,1.2524,1.2524,0,0,1,.5-.637,174.9518,174.9518,0,0,1,37.8554-18.4163s49.9186-3.5351,63.483,0c9.9569,2.5962,17.8668,12.5372,21.3706,17.643a1.9754,1.9754,0,0,1,.0415,2.08,2.0047,2.0047,0,0,1-.7857.75A2.0391,2.0391,0,0,1,322.8443,159.61Z" style="fill: #c4dcf2;"></path>
                                            </g>
                                        </g>
                                    </mask>
                                    <mask id="mask-7" x="41.222" y="176.6185" width="8.4809" height="16.1062" maskunits="userSpaceOnUse">
                                        <g transform="translate(-0.3404 -23.1702)">
                                            <g id="mask0-4" data-name="mask0">
                                                <path d="M47.472,199.7888c-.1712.1761-2.9138,4.0712-3.085,3.8942a7.2431,7.2431,0,0,0-2.0875.3285.9413.9413,0,0,0-.5636.39,1,1,0,0,0-.1646.68c.2534,2.1308.9662,7.5243,1.7879,8.5148,1.0272,1.2369,4.2857,2.831,4.4569,2.1216s-1.886-3.01-1.886-3.01l.1712-7.2577,3.9421-3.7174-2.4-1.9445" style="fill: #ffb49d;"></path>
                                            </g>
                                        </g>
                                    </mask>
                                    <mask id="mask-8" x="51.0748" y="184.584" width="11.4923" height="9.0733" maskunits="userSpaceOnUse">
                                        <g transform="translate(-0.3404 -23.1702)">
                                            <g id="mask1-3" data-name="mask1">
                                                <path d="M51.4153,207.7542c.1712.1761.8559,5.84.8559,5.84a10.3809,10.3809,0,0,0-.5136,2.8327c.1713.5308,11.4847.5308,11.1423,0s-7.7142-3.1857-7.7142-3.3626-.1713-5.31-.1713-5.31Z" style="fill: #ffb49d;"></path>
                                            </g>
                                        </g>
                                    </mask>
                                </lineargradient>
                            </lineargradient>
                        </defs>
                        <title>svg2</title>
                        <g id="town">
                            <g>
                                <g>
                                    <path d="M72.1981,146.5837v35.1884H45.4705c-.8317-1.299-1.6371-2.6145-2.3987-3.9464v-31.242Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M273.0185,122.56H222.2422v83.86h50.7763Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M138.1434,134.364H109.02v35.1916h29.1232Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M193.2445,153.4068H164.1217v35.1916h29.1228Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M384.8753,167.36q-.4465.9-.9193,1.7759a69.5749,69.5749,0,0,1-4.7537,7.63c-1.2607,1.7759-2.5913,3.486-3.9745,5.122a101.7629,101.7629,0,0,1-16.7912,15.654c-.63.4768-1.2695.9454-1.8911,1.3977a128.6213,128.6213,0,0,1-15.4429,9.5123c-.2189.1151-.429.222-.63.3289-2.3024,1.1839-3.9833,1.9485-4.7537,2.2856-.3064.14-.4727.2055-.4727.2055l-105.0982.3371-48.2464.148-10.4354.0329-44.3592.14-10.5667.0329-43.3875.14c-.7091-.5426-1.4008-1.1017-2.0749-1.6608a135.0306,135.0306,0,0,1-14.2-13.6725,116.6143,116.6143,0,0,1-11.4072-14.9961c-.8317-1.299-1.6371-2.6145-2.3987-3.9464A98.1388,98.1388,0,0,1,37.7752,167.36Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M43.0718,132.1713V167.36H37.7752a95.0251,95.0251,0,0,1-6.8022-23.2835,87.7906,87.7906,0,0,1-1.0156-11.9048Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M167.7539,104.1705c2.4434-9.574-3.8406-19.1956-14.0361-21.49s-20.4428,3.6062-22.8862,13.18,3.84,19.1954,14.0362,21.4908S165.31,113.7445,167.7539,104.1705Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M149.2845,95.9734a4.1307,4.1307,0,1,0-4.39-4.1225A4.2632,4.2632,0,0,0,149.2845,95.9734Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <polygon points="171.125 75.391 171.125 188.619 126.766 188.759 126.766 75.391 171.125 75.391" style="fill: #99a3b5;"></polygon>
                                    <path d="M141.9307,106.798h-8.82v16.2983h8.82Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M164.1217,106.798h-8.82v16.2983h8.82Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M141.9307,131.64h-8.82v16.2985h8.82Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M164.1217,131.64h-8.82v16.2985h8.82Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M141.9307,156.4882h-8.82v16.2985h8.82Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M164.1217,156.4882h-8.82v16.2985h8.82Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M141.9307,181.3306h-8.82V197.629h8.82Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M164.1217,181.3306h-8.82V197.629h8.82Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M230.1476,91.96V211.6082l-48.2464.148V71.9893h31.8141c1.9522,2.1869,3.7294,4.3574,5.349,6.4786q1.3656,1.8,2.7751,3.5928c1.1644,1.4881,2.355,2.968,3.5544,4.4232C226.9434,88.35,228.5279,90.1836,230.1476,91.96Z" transform="translate(-0.3404 -23.1702)" style="fill: #99a3b5;"></path>
                                    <path d="M193.2445,82.057h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M209.3161,82.057h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M225.3938,86.4839v1.7512H218.81V82.0607h3.029C223.0038,83.5488,224.1944,85.0287,225.3938,86.4839Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M193.2445,92.967h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M209.3161,92.967h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M225.3938,92.967h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M193.2445,103.877h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M209.3161,103.877h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M225.3938,103.877h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M193.2445,114.7925h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M209.3161,114.7925h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M225.3938,114.7925h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M193.2445,125.7025h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M209.3161,125.7025h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M225.3938,125.7025h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M193.2445,136.6126h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M209.3161,136.6126h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M225.3938,136.6126h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M193.2445,147.5226h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M209.3161,147.5226h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M225.3938,147.5226h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M193.2445,158.4318h-6.58V164.61h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M209.3161,158.4318h-6.58V164.61h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M225.3938,158.4318h-6.58V164.61h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M193.2445,169.3476h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M209.3161,169.3476h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M225.3938,169.3476h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M193.2445,180.2576h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M209.3161,180.2576h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M225.3938,180.2576h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M193.2445,191.1677h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M209.3161,191.1677h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M225.3938,191.1677h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M116.54,71.9893V211.9617l-43.3875.14c-.7091-.5426-1.4008-1.1017-2.0749-1.6608a135.0306,135.0306,0,0,1-14.2-13.6725V71.9893Z" transform="translate(-0.3404 -23.1702)" style="fill: #99a3b5;"></path>
                                    <path d="M67.17,94.7453H63.1432V167.959H67.17Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M77.9464,94.7453H73.92V167.959h4.0264Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M88.729,94.7453H84.7026V167.959H88.729Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M99.5059,94.7453H95.48V167.959h4.0264Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M110.2827,94.7453h-4.0264V167.959h4.0264Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M116.5441,79.82H56.8761v7.8287h59.668Z" transform="translate(-0.3404 -23.1702)" style="fill: #e9edfd;"></path>
                                    <path d="M383.956,111.0911v58.0444a69.5749,69.5749,0,0,1-4.7537,7.63c-1.2607,1.7759-2.5913,3.486-3.9745,5.122a101.7629,101.7629,0,0,1-16.7912,15.654c-.63.4768-1.2695.9454-1.8911,1.3977a128.6213,128.6213,0,0,1-15.4429,9.5123c-.2189.1151-.429.222-.63.3289-2.3024,1.1839-3.9833,1.9485-4.7537,2.2856V111.0911Z" transform="translate(-0.3404 -23.1702)" style="fill: #99a3b5;"></path>
                                    <path d="M347.05,121.1576h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M363.1272,121.1576h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M379.1988,121.1576h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M347.05,132.0677h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M363.1272,132.0677h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M379.1988,132.0677h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M347.05,142.9826h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M363.1272,142.9826h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M379.1988,142.9826h-6.58v6.1786h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M347.05,153.8927h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M363.1272,153.8927h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M379.1988,153.8927h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M347.05,164.8027h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M363.1272,164.8027h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M379.1988,164.8027h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M347.05,175.7128h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M363.1272,175.7128h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M379.2023,175.7128v1.0523c-1.2607,1.7759-2.5913,3.486-3.9745,5.122h-2.6089v-6.1743Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M347.05,186.6228h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M363.1272,186.6228h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M347.05,197.5386h-6.58v6.1785h6.58Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M358.4366,197.5411c-.63.4768-1.2695.9454-1.8911,1.3977v-1.3977Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M341.1026,208.4511c-.2189.1151-.429.222-.63.3289v-.3289Z" transform="translate(-0.3404 -23.1702)" style="fill: #ccd1da;"></path>
                                    <path d="M384.883,167.36q-.4459.9-.9181,1.7759a69.5941,69.5941,0,0,1-4.7479,7.63c-1.2591,1.7759-2.5881,3.486-3.97,5.122a101.682,101.682,0,0,1-16.7705,15.654c-.63.4768-1.2678.9454-1.8887,1.3977a128.4274,128.4274,0,0,1-15.4239,9.5123c-.2186.1151-.4284.222-.63.3289-2.3,1.1839-3.9783,1.9485-4.7478,2.2856-.306.14-.4721.2055-.4721.2055l-104.9686.3371-48.1868.148-10.4225.0329-44.3045.14-10.5537.0329-43.334.14c-.7083-.5426-1.3991-1.1017-2.0723-1.6608A134.9559,134.9559,0,0,1,57.29,196.7682a116.6027,116.6027,0,0,1-11.393-14.9961c-.8307-1.299-1.6351-2.6145-2.3958-3.9464a98.2005,98.2005,0,0,1-5.29-10.4661,95.1152,95.1152,0,0,1-6.7939-23.2835,87.9067,87.9067,0,0,1-1.0143-11.9048c-.6557-36.0106,19.1926-82.0268,71.585-95.765,51.0285-13.3683,90.9437,11.987,111.9462,35.583,1.95,2.1869,3.7248,4.3574,5.3424,6.4786q1.364,1.8,2.7717,3.5928c1.163,1.4881,2.3521,2.968,3.55,4.4232,1.5476,1.8663,3.13,3.7,4.7479,5.4756,17.1814,18.8767,38.5423,30.9707,68.5334,6.7828,28.4434-22.9382,67.2918-14.766,84.0361,12.3488q.5508.8757,1.0492,1.7759a56.6926,56.6926,0,0,1,7.1611,26.58A58.3354,58.3354,0,0,1,384.883,167.36Z" transform="translate(-0.3404 -23.1702)" style="fill: #67758e;opacity: 0.20000000298023224;isolation: isolate;"></path>
                                </g>
                            </g>
                            <path d="M207.1489,220.4133c114.2173,0,206.8085-2.195,206.8085-4.9027s-92.5912-4.9026-206.8085-4.9026S.34,212.803.34,215.5106,92.9317,220.4133,207.1489,220.4133Z" transform="translate(-0.3404 -23.1702)" style="fill: #5b677d;"></path>
                        </g>
                        <path id="obj1" d="M145.5739,66.64h58.81s-11.2017-11.2482-23.3364-5.6237S153.9771,30.0831,145.5739,66.64Z" transform="translate(-0.3404 -23.1702)" style="opacity: 0.30000001192092896;isolation: isolate;fill: url(#Безымянный_градиент_2);">
                        </path>
                        <path id="obg2" d="M102.5963,56.4269h-58.81s11.2023-11.2482,23.337-5.6237S94.1945,19.87,102.5963,56.4269Z" transform="translate(-0.3404 -23.1702)" style="opacity: 0.30000001192092896;isolation: isolate;fill: url(#Безымянный_градиент_2-2);">
                        </path>
                        <path id="obj3" d="M369.5393,48.0854H291.5671s14.8522-14.9137,30.941-7.4572S358.4-.3833,369.5393,48.0854Z" transform="translate(-0.3404 -23.1702)" style="opacity: 0.30000001192092896;isolation: isolate;fill: url(#Безымянный_градиент_2-3);">
                        </path>
                        <g id="phone">
                            <path d="M78.2979,159.757V41.3852a18.2622,18.2622,0,0,1,.15-2.3153,17.4727,17.4727,0,0,1,1.7785-5.7328A18.73,18.73,0,0,1,97.0077,23.17h57.67a18.4623,18.4623,0,0,1,18.71,18.215V192.9233a18.4606,18.4606,0,0,1-18.71,18.2065h-57.67a19.904,19.904,0,0,1-5.67-.8544,18.2633,18.2633,0,0,1-13.04-17.3521V159.757Z" transform="translate(-0.3404 -23.1702)" style="fill: #424b5b;"></path>
                            <path d="M169.3992,43.8629V188.7967c0,.3077-.0089.6067-.0264.9057a17.259,17.259,0,0,1-17.4244,16.0962H99.8868a17.4123,17.4123,0,0,1-17.442-17.0019V43.8629a16.2415,16.2415,0,0,1,.1321-2.0761v-.0086a17.2872,17.2872,0,0,1,17.31-14.9171h52.0616a17.8,17.8,0,0,1,1.9195.1025A17.1734,17.1734,0,0,1,169.3992,43.8629Z" transform="translate(-0.3404 -23.1702)" style="fill: #d8dffd;"></path>
                            <g>
                                <g>
                                    <polygon points="139.502 182.628 136.35 182.628 136.209 182.731 136.191 182.628 132.986 166.532 131.956 161.372 131.445 158.775 131.032 156.716 104.01 126.078 102.593 124.472 105.058 122.404 106.916 124.506 132.696 153.742 134.06 155.289 134.14 155.707 134.325 156.656 134.342 156.741 134.862 159.338 135.892 164.499 139.114 180.697 139.502 182.628" style="fill: #fff;"></polygon>
                                    <path d="M124.3548,138.4407c-.2553.1367-.5019.2734-.7572.41-.6691.3588-1.3471.7262-2.0427,1.1021-4.5079,2.435-9.3769,5.0578-14.2986,7.7235-.9686.5211-1.9371,1.0508-2.9056,1.572-7.66,4.1436-15.32,8.2958-21.9059,11.8756v-3.6225c2.9408-1.5977,6.2865-3.4174,10.1077-5.485.634-.3417,1.2591-.6835,1.893-1.0253.96-.5211,1.9106-1.0337,2.8615-1.5548,9.6235-5.2031,18.6306-10.073,22.892-12.3712.9333-.5126,1.6464-.8886,2.0779-1.1278.317-.1623.4843-.2563.5019-.2649Z" transform="translate(-0.3404 -23.1702)" style="fill: #fff;"></path>
                                    <polygon points="169.138 159.663 169.059 159.723 169.059 163.465 168.495 163.081 166.338 161.628 152.92 152.563 148.65 149.684 146.501 148.232 144.247 146.711 141.536 144.883 134.052 139.825 133.382 139.381 132.088 138.501 131.137 137.86 130.186 135.835 130.186 135.826 129.605 134.605 129.28 133.921 121.215 116.783 119.859 113.895 116.275 106.283 105.771 92.16 95.884 78.866 95.716 78.729 93.718 77.166 92.494 76.209 82.104 68.084 82.104 64.017 94.193 73.475 95.232 74.295 96.456 75.252 98.261 76.662 98.393 76.833 98.402 76.85 98.551 77.046 100.867 80.165 103.324 83.463 108.413 90.306 119.093 104.676 119.163 104.822 119.198 104.907 120.07 106.744 120.563 107.786 132.141 132.392 132.449 133.033 132.933 134.058 132.933 134.066 133.726 135.75 134.765 136.45 135.672 137.065 136.253 137.45 149.301 146.267 151.45 147.719 155.72 150.598 158.423 152.427 161.099 154.229 169.059 159.612 169.138 159.663" style="fill: #fff;"></polygon>
                                    <polygon points="169.059 105.232 169.059 108.487 163.08 107.111 159.858 106.368 137.591 101.259 120.563 107.786 119.823 108.068 119.815 108.068 118.961 108.401 117.772 105.454 119.198 104.907 135.971 98.482 137.345 97.953 137.485 97.987 139.246 98.388 169.059 105.232" style="fill: #fff;"></polygon>
                                    <polygon points="169.059 96.628 169.059 99.849 139.731 94.364 138.084 94.057 137.547 93.954 138.163 90.844 138.56 90.921 140.118 91.212 169.059 96.628" style="fill: #fff;"></polygon>
                                    <polygon points="169.059 71.647 169.059 74.842 142.53 71.185 141.588 71.057 141.395 71.032 141.853 67.896 142.064 67.922 142.909 68.041 169.059 71.647" style="fill: #fff;"></polygon>
                                    <path d="M169.3992,73.9449v3.2039c-2.4389-.3161-4.9218-.6323-7.4311-.94-5.5029-.7091-11.1115-1.41-16.6583-2.11-.1057-.0085-.2113-.0256-.317-.0342-.9685-.1281-1.937-.2477-2.9055-.3673q-2.4565-.3077-4.8778-.6152h-.0088c-1.2062-.1452-2.4037-.299-3.5923-.4442-.7308-.094-1.47-.18-2.1923-.2734h-.0088c-.1145-.0171-.2113-.0257-.3258-.0427-1.1005-.1368-2.1924-.2734-3.2753-.4016q-3.8961-.4871-7.572-.94l-1.7081-.2136,3.4779-18.0783.8276-4.2633.74-3.8616.4842-2.5034,2.9231-15.199h3.3106L126.9522,44.179l-1.25,6.5188-.0088.0085L122.3561,68.05c2.3508.2991,6.9645.863,12.9252,1.6063.7132.0939,1.444.1793,2.1923.2734,1.1535.1452,2.3509.29,3.5835.4527.4931.06.9949.12,1.5056.188,1.0566.1281,2.1307.2649,3.2313.4016,6.2337.7774,13.1189,1.6489,20.0481,2.52.6867.094,1.3647.1794,2.0515.2649C168.3955,73.8253,168.8973,73.8851,169.3992,73.9449Z" transform="translate(-0.3404 -23.1702)" style="fill: #fff;"></path>
                                    <path d="M153.8679,26.9636q-.7,3.9471-1.5056,8.3813c-1.6818,9.3125-3.3986,18.6421-4.7017,25.6394-.1233.7176-.2553,1.41-.3786,2.0761-.229,1.2388-.4491,2.3751-.6339,3.4088-.361,1.9053-.6516,3.4431-.8541,4.5026-.1585.88-.2641,1.4353-.2993,1.5976l-.1849,1.5293L143.496,89.144l-.2465,2.0676-.3786,3.144-2.4125,20.0263-.3874,3.1526-.4842,4.024-.1673,1.41-1.8314-.2136-1.3911-.1623.1145-.94,1.5936-13.26.3786-3.1526L139.93,91.6473v-.0085l2.1571-17.9416.1849-1.4952.0088-.1025.0088-.0512c.088-.487.1849-.9826.2729-1.4781.0969-.4785.1849-.9484.273-1.4268v-.0085c.2113-1.1193.4314-2.2555.6427-3.4089.1321-.6921.2553-1.3841.3962-2.0847v-.0085c2.21-11.8671,4.6577-25.1781,6.7179-36.7717h1.3559A17.8,17.8,0,0,1,153.8679,26.9636Z" transform="translate(-0.3404 -23.1702)" style="fill: #fff;"></path>
                                    <path d="M100.433,103.2963l-.1708,3.1641,39.3755,2.0181.1708-3.1641Z" transform="translate(-0.3404 -23.1702)" style="fill: #fff;"></path>
                                    <path d="M131.4835,71.0567c-4.8628,15.2665-10.0167,32.56-9.99,34.532a1.3237,1.3237,0,0,0-.4364-.8578l-.0075-.0072a1.5785,1.5785,0,0,0-.52-.3221,1.6131,1.6131,0,0,0-.6068-.1032l.0929,3.1667a1.73,1.73,0,0,1-.7792-.162,1.6834,1.6834,0,0,1-.6166-.4916c-.6472-.83-1.0375-1.331,4.4169-19.4544,2.5854-8.5913,5.3122-17.1563,5.34-17.242Z" transform="translate(-0.3404 -23.1702)" style="fill: #fff;"></path>
                                    <polygon points="124.129 64.18 123.715 67.324 121.822 67.084 113.783 66.076 110.2 65.624 107.999 65.35 94.827 63.693 91.34 63.257 82.104 62.095 82.104 58.9 90.407 59.942 93.903 60.386 111.873 62.642 114.065 62.915 117.657 63.368 122.747 64.009 124.129 64.18" style="fill: #fff;"></polygon>
                                    <path d="M98.98,100.5241l-1.5408.41-1.5936.4187-.5283-1.8967-.4227-1.5208-.3609-1.29L91.6809,86.4272l-.9333-3.315-8.3028-29.74v-9.509a16.2415,16.2415,0,0,1,.1321-2.0761l2.1307,7.6038L94.243,83.5565l.9245,3.3064,2.5445,9.0989V95.97l.4226,1.5122.6868,2.4776.0705.2563Z" transform="translate(-0.3404 -23.1702)" style="fill: #fff;"></path>
                                    <polygon points="97.653 127.932 94.642 129.12 94.105 127.821 85.283 106.505 82.104 98.841 82.104 90.374 87.995 104.608 96.967 126.266 97.653 127.932" style="fill: #fff;"></polygon>
                                    <path d="M143.2168,166.7092l-11.33,11.36,2.3315,2.2077,11.33-11.36Z" transform="translate(-0.3404 -23.1702)" style="fill: #fff;"></path>
                                    <polygon points="169.059 126.463 154.549 118.064 159.858 106.368 160.65 104.634 163.626 105.907 163.08 107.111 158.687 116.783 169.059 122.78 169.059 126.463" style="fill: #fff;"></polygon>
                                    <polygon points="169.059 136.698 169.059 142.465 161.099 154.229 160.228 155.519 157.507 153.777 158.423 152.427 163.195 145.361 163.204 145.353 169.059 136.698" style="fill: #fff;"></polygon>
                                </g>
                            </g>
                            <path d="M123.523,51.3661l-2.7009,17.7526,24.3908,3.5036-7.7913,51.2091-17.742,6.3445L133.0917,159.87" transform="translate(-0.3404 -23.1702)" style="fill: none;stroke: #5239ff;stroke-miterlimit: 10;stroke-width: 1.7760000228881836px;">
                            </path>
                            <path d="M126.9522,44.179a3.9156,3.9156,0,0,0-.5459-.76,4.3744,4.3744,0,0,0-2.3509-1.3585,4.071,4.071,0,0,0-.722-.0939,4.297,4.297,0,0,0-1.6993.299,4.6275,4.6275,0,0,0-1.4527.9569,4.7081,4.7081,0,0,0-.9949,1.47,4.8308,4.8308,0,0,0-.3874,1.76c-.0528,1.7514,1.9722,4.6306,3.2049,6.2368.5722.7348.9861,1.2218.9861,1.2388,0,0,.0616-.0683.176-.1965a35.3865,35.3865,0,0,0,2.527-3.0244l.0088-.0085a8.62,8.62,0,0,0,1.9018-3.9728A4.7094,4.7094,0,0,0,126.9522,44.179Zm-2.43,3.7591a1.8228,1.8228,0,0,1-1.3471.5383,1.5909,1.5909,0,0,1-.3434-.0513,1.7018,1.7018,0,0,1-.6956-.3161,1.9543,1.9543,0,0,1-.6691-.9056,2.0317,2.0317,0,0,1-.07-1.1448,1.9788,1.9788,0,0,1,.5458-1,1.7914,1.7914,0,0,1,.9773-.504,1.5236,1.5236,0,0,1,.6516.0086,1.5831,1.5831,0,0,1,.4314.1366,1.9217,1.9217,0,0,1,.8276.7519,2.1031,2.1031,0,0,1,.2818,1.1021A2.0424,2.0424,0,0,1,124.5221,47.9381Z" transform="translate(-0.3404 -23.1702)" style="fill: #fdab3e;"></path>
                            <path d="M134.9893,160.1947a2.2517,2.2517,0,0,0-1.416-2.8929,2.3427,2.3427,0,0,0-2.9691,1.38,2.2516,2.2516,0,0,0,1.4159,2.8929A2.3426,2.3426,0,0,0,134.9893,160.1947Z" transform="translate(-0.3404 -23.1702)" style="fill: #fdab3e;"></path>
                            <path d="M136.4,157.7749a4.0006,4.0006,0,0,0-1.55-1.6745,4.1377,4.1377,0,0,0-2.254-.5468c-.0352,0-.0792.0085-.1145.0085a3.8863,3.8863,0,0,0-1.2062.2905,3.559,3.559,0,0,0-.854.4614,4.0051,4.0051,0,0,0-.8013.7774,3.9312,3.9312,0,0,0-.581,1.0423,3.79,3.79,0,0,0-.1145,2.2555,3.84,3.84,0,0,0,1.1974,1.9309,3.9658,3.9658,0,0,0,2.0955.9654,4.11,4.11,0,0,0,2.1747-.29,3.7061,3.7061,0,0,0,.7836-.4358,3.8842,3.8842,0,0,0,1.4176-1.9394,3.6075,3.6075,0,0,0,.15-.6066A3.7894,3.7894,0,0,0,136.4,157.7749Zm-1.1358,3.8361a3.3739,3.3739,0,0,1-1.5408.94.5786.5786,0,0,1-.1145.0341,3.4425,3.4425,0,0,1-1.9282-.0939,3.3062,3.3062,0,0,1-1.55-1.1192,3.163,3.163,0,0,1-.6515-1.7686,3.1981,3.1981,0,0,1,.4666-1.8283,3.3642,3.3642,0,0,1,1.4263-1.2645.9772.9772,0,0,1,.1673-.0683,3.3151,3.3151,0,0,1,1.25-.2392,3.1935,3.1935,0,0,1,.4931.0341,3.3848,3.3848,0,0,1,2.1835,1.273,3.185,3.185,0,0,1,.6163,2.4008,1.9365,1.9365,0,0,1-.07.3246A3.2135,3.2135,0,0,1,135.2637,161.611Z" transform="translate(-0.3404 -23.1702)" style="fill: #fdab3e;"></path>
                            <g style="opacity: 0.5;">
                                <g style="mask: url(#mask-3);">
                                    <g style="opacity: 0.5;">
                                        <g style="opacity: 0.2800000011920929;">
                                            <polygon points="169.059 22.589 169.059 47.836 165.502 50.322 161.628 53.039 143.156 65.974 142.266 66.597 139.59 68.469 139.59 68.477 121.391 81.216 121.32 81.267 120.783 81.643 119.621 82.454 118.159 83.48 117.164 84.172 108.413 90.306 105.771 92.16 87.995 104.608 85.283 106.505 82.104 108.735 82.104 83.488 92.494 76.209 94.554 74.765 95.232 74.295 97.372 72.8 97.372 72.792 107.999 65.35 111.873 62.642 126.268 52.552 126.277 52.552 130.627 49.502 130.635 49.502 131.067 49.194 131.076 49.194 133.118 47.759 134.941 46.486 143.534 40.471 143.534 40.463 147.32 37.814 169.059 22.589" style="fill: #fff;"></polygon>
                                        </g>
                                        <g style="opacity: 0.2800000011920929;">
                                            <path d="M116.8709,26.8611l-32.1633,22.53-2.2628,1.5806V43.8629a16.2415,16.2415,0,0,1,.1321-2.0761v-.0086a17.2872,17.2872,0,0,1,17.31-14.9171Z" transform="translate(-0.3404 -23.1702)" style="fill: #fff;"></path>
                                        </g>
                                        <g style="opacity: 0.2800000011920929;">
                                            <path d="M169.4784,182.8333l-.0792.06v5.9036c0,.3077-.0089.6067-.0264.9057l-22.9713,16.0962H136.69l-.1409.1025-.0176-.1025H110.3643l22.9624-16.0962,2.9055-2.0334L153.26,175.7336l2.8-1.965,7.4751-5.2373.0088-.0085,5.8551-4.101v18.36Z" transform="translate(-0.3404 -23.1702)" style="fill: #fff;"></path>
                                        </g>
                                        <g style="opacity: 0.2800000011920929;">
                                            <path d="M169.3992,155.5963v2.9646L151.79,170.8894l-2.8,1.965-13.788,9.6543-2.9055,2.0333-30.35,21.2566h-2.06a17.1919,17.1919,0,0,1-1.9987-.1111l33.8978-23.7427,2.4124-1.6831.1233-.094.0176-.0085.3434-.2478,12.1591-8.5094,2.8-1.9651Z" transform="translate(-0.3404 -23.1702)" style="fill: #fff;"></path>
                                        </g>
                                        <g style="opacity: 0.2800000011920929;">
                                            <polygon points="169.059 159.723 169.059 162.688 168.495 163.081 140.585 182.628 136.35 182.628 139.114 180.697 166.338 161.628 169.059 159.723" style="fill: #fff;"></polygon>
                                        </g>
                                        <g style="opacity: 0.2800000011920929;">
                                            <polygon points="169.059 24.401 169.059 27.365 146.308 43.299 142.495 45.965 142.495 45.973 140.717 47.212 138.771 48.57 136.869 49.912 136.86 49.912 128.707 55.627 124.384 58.652 117.657 63.368 113.783 66.076 98.481 76.79 98.402 76.85 97.099 77.764 95.716 78.729 82.104 88.264 82.104 85.299 93.718 77.166 94.977 76.286 96.456 75.252 97.794 74.312 110.2 65.624 114.065 62.915 125.546 54.876 125.555 54.876 129.887 51.843 129.896 51.834 133.268 49.468 135.258 48.066 135.267 48.066 137.133 46.759 143.138 42.556 146.942 39.89 169.059 24.401" style="fill: #fff;"></polygon>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </g>
                        <g id="car">
                            <rect x="148.2396" y="151.1098" width="202.07" height="28.41" style="fill: #eb8e12;"></rect>
                            <path d="M385.03,199.08,347,203.83c.07-.38.12-.76.16-1.14a21.3326,21.3326,0,0,0-.12-5.97,21.871,21.871,0,0,0-4.16-9.78,22.3115,22.3115,0,0,0-8.31-6.73,22.4362,22.4362,0,0,0-15.89-1.23,22.865,22.865,0,0,0-4.94,2.1,22.089,22.089,0,0,0-11.01,17.5,20.8861,20.8861,0,0,0,.11,4.11,20.5484,20.5484,0,0,0,.59,3.11l-38.09-.43-6.97-.08h-.01l-52.44-.6c.12-.66.22-1.33.29-2a22.6789,22.6789,0,0,0-.1-5.27,22.91,22.91,0,0,0-3.86-9.92,22.5143,22.5143,0,0,0-28.57-7.29,22.6234,22.6234,0,0,0-12.19,16.7,21.9594,21.9594,0,0,0-.17,5.78c.04.5.11,1,.19,1.5l-31.69-.37a5.8631,5.8631,0,0,1-5.49-3.92,5.664,5.664,0,0,1-.29-2.35c.02-.3.05-.6.07-.91.16-1.73.34-3.67.55-5.71v-.01c.28-2.58.61-5.3,1-7.92a65.6825,65.6825,0,0,1,2.29-10.81l.01-.01a7.928,7.928,0,0,1,1.54-2.92c4.14-4.1,24.84-10.53,54.42-11.11,0,0,40.22-23.39,52.64-24.56,2.91-.27,8.18-.58,14.72-.82,5.78-.21,12.55-.38,19.56-.42,1.32,0,2.65-.01,3.99-.01,4.1,0,8.24.05,12.26.15,6.86.18,13.4.52,18.88,1.1a55.3607,55.3607,0,0,1,11.73,2.17c.17.05.33.11.49.17,1.59.61,3.32,1.32,5.16,2.09,1.85.78,3.79,1.63,5.78,2.51l.01.01c12.93,5.73,27.5,12.93,27.5,12.93s4.37.12,9.32.51c6.11.48,13.1,1.38,13.75,3a2.469,2.469,0,0,1,.1.29,23.3445,23.3445,0,0,1,.41,5.85c0,.58-.02,1.17-.04,1.75-.13,3.74-.47,7.31-.47,7.31a14.4741,14.4741,0,0,1,2.37,2.72C384.71,178.67,388.22,186.5,385.03,199.08Z" transform="translate(-0.3404 -23.1702)" style="fill: #fdab3e;fill-rule: evenodd;">
                            </path>
                            <g style="mask: url(#mask-4);">
                                <g>
                                    <path d="M267.96,158.39c-.08.41-.15.81-.23,1.22-.1.59-.21,1.17-.3,1.75-.26,1.46-.49,2.92-.71,4.39-.16,1.07-.3,2.14-.44,3.21-.23,1.77-.43,3.55-.6,5.32a176.653,176.653,0,0,0-.56,27.79c.01.2.03.41.04.62.06.89.12,1.79.18,2.68" transform="translate(-0.3404 -23.1702)" style="fill: none;stroke: #cd8634;stroke-miterlimit: 10;stroke-width: 0.4729999899864197px;opacity: 0.6299999952316284;isolation: isolate;">
                                    </path>
                                    <path d="M202.0506,157.5948a87.6162,87.6162,0,0,0-2.8205,47.9269" transform="translate(-0.3404 -23.1702)" style="fill: none;stroke: #cd8634;stroke-miterlimit: 10;stroke-width: 0.4729999899864197px;opacity: 0.6299999952316284;isolation: isolate;">
                                    </path>
                                    <path d="M324.3138,159.5784a175.7253,175.7253,0,0,0-8.7335,36.8721" transform="translate(-0.3404 -23.1702)" style="fill: none;stroke: #cd8634;stroke-miterlimit: 10;stroke-width: 0.4729999899864197px;opacity: 0.6299999952316284;isolation: isolate;">
                                    </path>
                                </g>
                            </g>
                            <path d="M199.0506,160.1106q-28.6389,6.569-56.548,15.8448" transform="translate(-0.3404 -23.1702)" style="fill: none;stroke: #cd8634;stroke-miterlimit: 10;stroke-width: 0.4729999899864197px;opacity: 0.6299999952316284;isolation: isolate;">
                            </path>
                            <g style="mask: url(#mask-5);">
                                <path d="M385.03,199.08,347,203.83c.07-.38.12-.76.16-1.14h-3.08a18.8374,18.8374,0,0,1-2.88,6.8.3508.3508,0,0,0-.05.08l-32.34-.04a19.0622,19.0622,0,0,1-2.91-6.84h-3.06a20.5484,20.5484,0,0,0,.59,3.11l-38.09-.43-6.97-.08,5.45-2.6,1.3-.62,54.21-25.85,4.06-1.94,24.67-11.76,11.01-5.25,6.89-3.29c6.11.48,13.1,1.38,13.75,3a2.469,2.469,0,0,1,.1.29,23.3445,23.3445,0,0,1,.41,5.85h.01a14.1175,14.1175,0,0,1,.96,1.75,15.0468,15.0468,0,0,1,1.2,3.95,14.84,14.84,0,0,1-.31,6.08C384.71,178.67,388.22,186.5,385.03,199.08Z" transform="translate(-0.3404 -23.1702)" style="fill: #f0c98c;opacity: 0.6000000238418579;isolation: isolate;"></path>
                            </g>
                            <path d="M183.7635,179.6032a18.8409,18.8409,0,0,0-10.5265,3.216,19.1186,19.1186,0,0,0,6.8278,34.6021A18.879,18.879,0,0,0,199.5134,209.3a19.2087,19.2087,0,0,0-2.3565-24.1063A18.8672,18.8672,0,0,0,183.7635,179.6032Z" transform="translate(-0.3404 -23.1702)" style="fill: #424b5b;"></path>
                            <path d="M183.7576,188.4834a11.2933,11.2933,0,0,0-6.0139,1.7221,10.3664,10.3664,0,0,0-3.9861,4.5837,9.6769,9.6769,0,0,0-.6151,5.9,10.0483,10.0483,0,0,0,2.9635,5.2283,11.0414,11.0414,0,0,0,5.5432,2.794,11.4309,11.4309,0,0,0,6.2545-.5818,10.7143,10.7143,0,0,0,4.8578-3.7616,9.7132,9.7132,0,0,0,1-9.582,10.1931,10.1931,0,0,0-2.3473-3.3132,10.8876,10.8876,0,0,0-3.5128-2.2133A11.39,11.39,0,0,0,183.7576,188.4834Z" transform="translate(-0.3404 -23.1702)" style="fill: #aeaeae;"></path>
                            <path d="M344.49,198.78a19.1955,19.1955,0,0,1-3.29,10.71.3508.3508,0,0,0-.05.08,19.4879,19.4879,0,0,1-8.69,7.02,19.642,19.642,0,0,1-21.25-4.18,19.3029,19.3029,0,0,1-2.4-2.88,19.0622,19.0622,0,0,1-2.91-6.84l-.03-.15a19.12,19.12,0,0,1,1.11-11.13,19.4111,19.4111,0,0,1,7.18-8.65,20.2024,20.2024,0,0,1,4.13-2.07,19.6424,19.6424,0,0,1,20.49,4.47,19.1066,19.1066,0,0,1,5.71,13.62Z" transform="translate(-0.3404 -23.1702)" style="fill: #424b5b;"></path>
                            <path d="M324.9949,188.0785a10.9226,10.9226,0,0,0-6.019,1.8032,10.7293,10.7293,0,0,0-3.991,4.8053,10.6142,10.6142,0,0,0,2.3473,11.67A10.9019,10.9019,0,0,0,334,204.7328a10.6147,10.6147,0,0,0-1.3469-13.519A10.8956,10.8956,0,0,0,324.9949,188.0785Z" transform="translate(-0.3404 -23.1702)" style="fill: #aeaeae;"></path>
                            <path d="M329.14,158.98a2.357,2.357,0,0,1-.29,1.19,2.3164,2.3164,0,0,1-.86.87,2.3588,2.3588,0,0,1-1.19.32H195.85a1.4641,1.4641,0,0,1-.88-.28c-.01,0-.01-.01-.02-.02a1.4312,1.4312,0,0,1-.5-1.62,1.43,1.43,0,0,1,.55-.73c.75-.52,1.51-1.03,2.27-1.53v-.01q2.355-1.56,4.76-3.05a.01.01,0,0,1,.01-.01,187.0089,187.0089,0,0,1,34.23-16.72s3.94-.3,9.99-.65c5.3-.31,12.23-.66,19.54-.9h.01c1.9-.06,3.83-.12,5.77-.16,4.02-.09,8.06-.13,11.92-.1,8.17.06,15.53.45,20.25,1.4.63.13,1.2.26,1.73.41a27.01,27.01,0,0,1,7.75,3.68,40.9645,40.9645,0,0,1,5.15,4.12,53.6933,53.6933,0,0,1,3.81,3.91,73.3122,73.3122,0,0,1,6.58,8.72A2.2741,2.2741,0,0,1,329.14,158.98Z" transform="translate(-0.3404 -23.1702)" style="fill: #444041;"></path>
                            <path d="M322.8443,159.61H202.7272a1.2769,1.2769,0,0,1-.7882-.2084,1.2519,1.2519,0,0,1-.4955-.64,1.237,1.237,0,0,1,.0029-.8063,1.2524,1.2524,0,0,1,.5-.637,174.9518,174.9518,0,0,1,37.8554-18.4163s49.9186-3.5351,63.483,0c9.9569,2.5962,17.8668,12.5372,21.3706,17.643a1.9754,1.9754,0,0,1,.0415,2.08,2.0047,2.0047,0,0,1-.7857.75A2.0391,2.0391,0,0,1,322.8443,159.61Z" transform="translate(-0.3404 -23.1702)" style="fill: #c4dcf2;"></path>
                            <g style="mask: url(#mask-6);">
                                <path d="M304.88,167.8h2.13l-.94,1.16H303.7a1.12,1.12,0,0,1,.35-.82A1.1728,1.1728,0,0,1,304.88,167.8Z" transform="translate(-0.3404 -23.1702)" style="fill: #daeaf7;"></path>
                            </g>
                            <path d="M214.7571,158.5389c0,2.1018-3.708,3.8-8.2819,3.8s-8.2813-1.7017-8.2813-3.8,3.7079-3.8,8.2813-3.8S214.7571,156.44,214.7571,158.5389Z" transform="translate(-0.3404 -23.1702)" style="fill: #eb8e12;"></path>
                            <path d="M205.5081,161.3636c4.5737,0,8.281-1.7015,8.281-3.8s-3.7073-3.8-8.281-3.8-8.2811,1.7015-8.2811,3.8S200.9346,161.3636,205.5081,161.3636Z" transform="translate(-0.3404 -23.1702)" style="fill: #ffa021;"></path>
                            <path d="M382.08,174.9c-14.5,2.43-19.23-7.69-19.82-10.03-.59-2.32,17.59-1.95,17.96-1.75h.01a14.1175,14.1175,0,0,1,.96,1.75,15.0468,15.0468,0,0,1,1.2,3.95A14.84,14.84,0,0,1,382.08,174.9Z" transform="translate(-0.3404 -23.1702)" style="fill: #daeaf7;"></path>
                            <path d="M125.6526,182.9973s13.9014-1.4619,19.2245-3.2143S153.75,172.18,153.75,172.18H127.959S124.1736,177.4427,125.6526,182.9973Z" transform="translate(-0.3404 -23.1702)" style="fill: #daeaf7;"></path>
                            <g>
                                <polygon points="318.98 126.64 320.19 127.98 313.32 136.44 308.04 136.44 316.58 124.12 317.92 125.45 318.98 126.64" style="fill: #a5cae5;"></polygon>
                                <polygon points="311.32 119.75 297.25 136.44 288.63 136.44 302.26 115.57 304.6 116.21 306.98 117.19 309.11 118.3 311.32 119.75" style="fill: #a5cae5;"></polygon>
                                <polygon points="281.11 114.16 269.25 124.34 268.11 125.33 255.16 136.44 247.98 136.44 268.04 115.8 269.5 114.31 269.63 114.17 281.11 114.16" style="fill: #a5cae5;"></polygon>
                                <polygon points="262.77 114.51 262.76 114.52 231.05 136.44 216.99 136.44 243.52 115.47 262.77 114.51" style="fill: #a5cae5;"></polygon>
                                <path d="M131.86,191.48c.6,2.92-1.3,7.99-7.75,5.16,0,0-1.81-2.83,1.2-6.63C125.31,190.01,131.27,188.55,131.86,191.48Z" transform="translate(-0.3404 -23.1702)" style="fill: #cd8634;"></path>
                            </g>
                            <path d="M268.3122,137.3921s.8759,15.2013-1.1421,22.2178h3.1628a85.8437,85.8437,0,0,1,0-22.28Z" transform="translate(-0.3404 -23.1702)" style="fill: #444041;"></path>
                            <path d="M314.94,168.96a1.1417,1.1417,0,0,1-.35.83,1.1728,1.1728,0,0,1-.83.34h-8.88a1.1779,1.1779,0,0,1-1.18-1.17,1.12,1.12,0,0,1,.35-.82,1.1728,1.1728,0,0,1,.83-.34h8.88a1.1728,1.1728,0,0,1,.83.34A1.12,1.12,0,0,1,314.94,168.96Z" transform="translate(-0.3404 -23.1702)" style="fill: #424b5b;"></path>
                        </g>
                        <path id="car-loc" d="M271.4891,48.0213A27.9952,27.9952,0,0,0,251.63,56.3a28.3557,28.3557,0,0,0-8.2258,19.9856c0,15.6094,28.2615,44.9732,28.0848,44.9732s28.0854-29.3638,28.0854-44.9732A28.3556,28.3556,0,0,0,291.3484,56.3,27.9953,27.9953,0,0,0,271.4891,48.0213Zm.1766,39.8161a12.0109,12.0109,0,0,1-11.0963-7.4623,12.1442,12.1442,0,0,1,2.604-13.1727,11.9694,11.9694,0,0,1,18.48,1.832A12.1411,12.1411,0,0,1,280.16,84.2985a11.9729,11.9729,0,0,1-8.4941,3.5412Z" transform="translate(-0.3404 -23.1702)" style="fill: #fdab3e;"></path>
                        <g id="man">
                            <path d="M79.9992,112.5558l8.0772-7.4911v5.7968l-7.73,4.5483Z" transform="translate(-0.3404 -23.1702)" style="fill: #2c4482;"></path>
                            <path d="M81.3813,114.6961c.3425-.3536-1.0363-1.7838.3424-3.21s2.7638-1.7838,3.109-.7137-1.0363,3.9242-3.109,4.6379S81.3813,114.6961,81.3813,114.6961Z" transform="translate(-0.3404 -23.1702)" style="fill: #ffb49d;"></path>
                            <path d="M63.2012,83.66c.3458,0,8.637.3571,5.5274-9.6314-.7476-2.402-4.8363.3565-4.8363.3565s1.0362-3.5676-1.0364-4.6378c-3.0434-1.571-10.7091,3.9242-10.3638,5.7079A5.1673,5.1673,0,0,0,50.4194,81.52c1.3822,3.924,5.5275,4.6377,5.5275,10.3456S63.2012,83.66,63.2012,83.66Z" transform="translate(-0.3404 -23.1702)" style="fill: #15181d;"></path>
                            <path d="M50.04,201.73l-.15.14-.23.22-.23.22-1.11,1.04-.51.48-1.6,1.52-.11.1-.17,7.26s2.06,2.3,1.89,3.01c-.18.71-3.43-.89-4.46-2.12-.82-.99-1.54-6.39-1.79-8.52a.9706.9706,0,0,1,.17-.68.895.895,0,0,1,.56-.39,7.5154,7.5154,0,0,1,2.09-.33c.04.04.21-.13.46-.42.33-.4.81-1.02,1.26-1.64.29-.39.58-.78.81-1.1.3-.4.51-.69.55-.73h.17l1.67,1.35h.01l.23.19.29.24Z" transform="translate(-0.3404 -23.1702)" style="fill: #ffb49d;"></path>
                            <g style="mask: url(#mask-7);">
                                <g>
                                    <path d="M47.82,215.72c-.18.71-3.43-.89-4.46-2.12-.82-.99-1.54-6.39-1.79-8.52a.9706.9706,0,0,1,.17-.68.895.895,0,0,1,.56-.39,7.5154,7.5154,0,0,1,2.09-.33c.04.04.21-.13.46-.42.33-.4.81-1.02,1.26-1.64.49.64,1.13,1.48,1.7,2.21l-1.6,1.52-.11.1-.17,7.26S47.99,215.01,47.82,215.72Z" transform="translate(-0.3404 -23.1702)" style="fill: #f4eae9;"></path>
                                    <path d="M47.82,215.72c-.18.71-3.43-.89-4.46-2.12-.82-.99-1.54-6.39-1.79-8.52a.9706.9706,0,0,1,.17-.68.895.895,0,0,1,.56-.39,7.5154,7.5154,0,0,1,2.09-.33c.04.04.21-.13.46-.42a16.3691,16.3691,0,0,0,1.36,2.09l-.11.1-.17,7.26S47.99,215.01,47.82,215.72Z" transform="translate(-0.3404 -23.1702)" style="fill: #413e3f;"></path>
                                </g>
                            </g>
                            <path d="M57.68,196.69c-3.87,3.91-7.21,6.72-8.13,6.89h-.01a1.686,1.686,0,0,1-1.22-.23,4.37,4.37,0,0,1-1.4-2.83,9.1592,9.1592,0,0,1-.13-1.09s.78-.92,1.99-2.37a1.2667,1.2667,0,0,1,.11-.13.324.324,0,0,1,.08-.09c2.24-2.7,5.81-7.05,8.75-10.84v-.01c.06-.08.12-.16.19-.25.02-.02.03-.04.06-.07v-.01c2.78-3.62,4.9-6.65,4.58-7.11-.53-.77-2.79-8.69-4.35-14.68a1.5536,1.5536,0,0,1-.05-.23.8331.8331,0,0,1-.04-.15v-.01a41.2314,41.2314,0,0,1-1.39-6.35l-2.38-12.31-.19-.97,4.94-.94,5.35-1.01s.23.83.61,2.23c1.68,6.17,6.33,23.46,7.45,29.81C73.38,178.95,64.68,189.62,57.68,196.69Z" transform="translate(-0.3404 -23.1702)" style="fill: #dde0e6;"></path>
                            <path d="M62.9,216.43c.34.53-10.97.53-11.14,0a10.51,10.51,0,0,1,.51-2.84s-.01-.12-.04-.32c-.07-.54-.21-1.68-.36-2.79-.08-.61-.16-1.21-.24-1.69a5.7873,5.7873,0,0,0-.21-1.04l3.59.01s.01.33.03.83c.02.43.04.99.05,1.57.04,1.08.08,2.24.09,2.7.01.11.01.18.01.2C55.19,213.24,62.56,215.9,62.9,216.43Z" transform="translate(-0.3404 -23.1702)" style="fill: #ffb49d;"></path>
                            <g style="mask: url(#mask-8);">
                                <g>
                                    <path d="M62.9,216.43c.34.53-10.97.53-11.14,0a10.51,10.51,0,0,1,.51-2.84s-.01-.12-.04-.32c-.07-.54-.21-1.68-.36-2.79,1.08-.06,2.15-.16,3.22-.32.04,1.08.08,2.24.09,2.7.01.11.01.18.01.2C55.19,213.24,62.56,215.9,62.9,216.43Z" transform="translate(-0.3404 -23.1702)" style="fill: #f4eae9;"></path>
                                    <path d="M62.9,216.43c.34.53-10.97.53-11.14,0a10.51,10.51,0,0,1,.51-2.84s-.01-.12-.04-.32a4.53,4.53,0,0,0,2.95-.41c.01.11.01.18.01.2C55.19,213.24,62.56,215.9,62.9,216.43Z" transform="translate(-0.3404 -23.1702)" style="fill: #413e3f;"></path>
                                </g>
                            </g>
                            <path d="M59.12,142.61l-.03.3c-.03.36-.09,1.03-.17,1.92-.04.48-.09,1.03-.13,1.63v.01a.3083.3083,0,0,0-.01.1,2.4519,2.4519,0,0,0-.02.27c-.01.05-.01.08-.02.13v.01c-.09,1.18-.19,2.52-.29,3.92-.02.35-.05.7-.07,1.06v.01c-.08,1.21-.15,2.46-.21,3.66v.01c-.01.12-.01.23-.02.35-.11,2.49-.15,4.78-.05,6.27.02.28.03.67.04,1.16a1.5483,1.5483,0,0,1,.01.22v.33c.06,4-.07,12.75-.24,21.41v.36c-.03,1.45-.06,2.9-.09,4.32a.1387.1387,0,0,1,0,.09c-.05,2.29-.1,4.5-.14,6.54-.15,6.47-.27,11.24-.27,11.24a19.9008,19.9008,0,0,1-2.37.66,9.49,9.49,0,0,1-3.41.2,1.9254,1.9254,0,0,1-1.41-.86,19.7746,19.7746,0,0,1-.67-4.35c-.05-.4-.09-.82-.12-1.27-.04-.37-.08-.77-.11-1.17h-.01c-.06-.73-.12-1.51-.19-2.32v-.04c-.04-.6-.09-1.2-.15-1.84v-.1c-1.03-13.45-2.25-34.78-3.56-39.18a43.8589,43.8589,0,0,1-1.42-8.61s-.01,0,0-.01c-.17-2.16-.22-4.14-.22-5.58a14.6109,14.6109,0,0,1,.1-2.26l3.02.28.33.03Z" transform="translate(-0.3404 -23.1702)" style="fill: #dde0e6;"></path>
                            <path d="M53.6346,96.0585s-8.7426-.53-11.6558,5.3114-.5136,21.5958,0,24.9589-.6848,15.4,1.5442,16.9928,21.0842,2.4751,23.1415,0,.1713-31.1542.856-33.2786-.6848-13.2756-8.0578-13.4523S53.6346,96.0585,53.6346,96.0585Z" transform="translate(-0.3404 -23.1702)" style="fill: #a9b7f2;"></path>
                            <path d="M61.4835,96.9113c-.072,2.8409-3.2072,3.19-5.2906,2.7779-2.3192-.4585-5.7723-1.2735-5.7375-4.3608a.1676.1676,0,0,1,.05-.11.1562.1562,0,0,1,.219,0,.1672.1672,0,0,1,.05.11c-.0291,2.6447,2.7483,3.4179,4.7616,3.88,1.9648.452,5.5514.7278,5.6279-2.2982a.1675.1675,0,0,1,.0468-.1167.1562.1562,0,0,1,.2259,0,.1676.1676,0,0,1,.0469.1167Z" transform="translate(-0.3404 -23.1702)" style="fill: #003a70;"></path>
                            <path d="M65.8039,79.7722c.3521-.1561-.3423,7.08-.5136,9.2048a4.6716,4.6716,0,0,1-5.6563,3.8946c-3.0856-.7078-5.8288-3.8946-5.4864-9.5577a2.6528,2.6528,0,0,1-1.1984-2.8322c.5136-1.7714,1.886,1.4144,1.886,1.4144a5.99,5.99,0,0,0,.856-3.009c.1712-2.125,2.2256-3.8946,4.1139-1.9476S64.6039,80.3031,65.8039,79.7722Z" transform="translate(-0.3404 -23.1702)" style="fill: #ffb49d;"></path>
                            <path d="M54.4072,86.8242s.2579,7.8182-2.3129,9.5884c0,0,5.1429,4.2477,8.2279.7072,0,0-.3424-6.0185,0-7.2571S54.4072,86.8242,54.4072,86.8242Z" transform="translate(-0.3404 -23.1702)" style="fill: #ffb49d;"></path>
                            <path d="M58.0743,164.1242a11.1045,11.1045,0,0,0,1.3867-6.026c-.1061-2.3822-.7184-4.705-.921-7.0774-.0148-.1692-.2717-.17-.2574,0,.1844,2.1562.7008,4.2642.8788,6.4205a11.1829,11.1829,0,0,1-1.309,6.5491.1371.1371,0,0,0-.0134.1007.1345.1345,0,0,0,.06.0813.1261.1261,0,0,0,.1757-.0482Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M57.13,156.8969l1.598-1.4138c.1255-.1117-.0572-.2988-.1821-.1879L56.9478,156.71c-.1261.1109.0571.2989.1815.188Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M58.7568,158.8415q.3425-.8838.6849-1.77c.061-.1591-.1872-.2285-.2483-.0711q-.3424.8838-.6848,1.7711C58.4476,158.93,58.6957,158.9981,58.7568,158.8415Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M49.495,150.4633a13.32,13.32,0,0,1,.9336,4.1216c.0725,1.258-.0086,2.7387-1.1117,3.5209-.1358.0957-.0074.326.13.23,2.2763-1.6145,1.1247-5.839.2967-7.9428C49.6816,150.2364,49.4328,150.3047,49.495,150.4633Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M68.0113,176.524h1.2555a.1242.1242,0,0,0,.0907-.039.1352.1352,0,0,0,0-.1871.1241.1241,0,0,0-.0907-.0389H68.0113a.1242.1242,0,0,0-.0908.0389.1352.1352,0,0,0,0,.1871A.1243.1243,0,0,0,68.0113,176.524Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M69.0732,178.29l.3425-.1185c.1563-.0542.09-.31-.0679-.2556l-.3424.1176c-.1564.0542-.0891.3107.0684.2565Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M57.6994,185.48q.2122,5.0718.1176,10.1479a.1355.1355,0,0,0,.0376.094.1253.1253,0,0,0,.1815,0,.1355.1355,0,0,0,.0376-.094q.0948-5.0755-.1175-10.1479A.1284.1284,0,0,0,57.6994,185.48Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M48.7834,197.0856q.5529,2.6362.9193,5.3072c.0234.1685.271.0965.2482-.07q-.3663-2.6718-.92-5.3081C48.9962,196.8477,48.7457,196.918,48.7834,197.0856Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M54.8638,146.8556a27.7024,27.7024,0,0,0,9.5232-1.02.13.13,0,0,0,.0726-.0638.1374.1374,0,0,0,.01-.0978.133.133,0,0,0-.0574-.0784.126.126,0,0,0-.094-.0164,27.4766,27.4766,0,0,1-9.4547,1.0107C54.6983,146.5786,54.6988,146.8444,54.8638,146.8556Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M61.3009,145.7942a4.1546,4.1546,0,0,1,.7749,1.48.1323.1323,0,0,0,.06.08.125.125,0,0,0,.0976.0124.1288.1288,0,0,0,.0775-.0625.1362.1362,0,0,0,.0121-.1007,4.4942,4.4942,0,0,0-.8406-1.597C61.3756,145.4754,61.1947,145.6652,61.3009,145.7942Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M58.4075,146.2516q.2415.525.4834,1.0495c.0708.1544.2928.0194.2221-.1338l-.4829-1.05C58.5588,145.9634,58.3374,146.0983,58.4075,146.2516Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M56.5843,146.3676l.2283.4715c.0741.1525.2956.0182.222-.1344l-.2283-.4714C56.7327,146.0806,56.5107,146.215,56.5843,146.3676Z" transform="translate(-0.3404 -23.1702)" style="fill: #5d78b5;"></path>
                            <path d="M59.7013,92.8292A6.4034,6.4034,0,0,1,56.0958,89.56c-.0376-.0761-.1483-.0088-.1112.0672a6.5374,6.5374,0,0,0,3.6825,3.3295C59.7452,92.9854,59.7812,92.8569,59.7013,92.8292Z" transform="translate(-0.3404 -23.1702)" style="fill: #15181d;"></path>
                            <path d="M61.7865,83.9992a3.7587,3.7587,0,0,0,.0867,1.12c.0383.2822.0691.5651.0879.85.0086.1231.1387,1.1638-.3155.9493-.0754-.0348-.1405.0795-.0652.1149.2906.1367.4669.1273.5376-.2016.1963-.91-.3509-1.8981-.2077-2.7985.0137-.0836-.11-.1178-.1238-.0354Z" transform="translate(-0.3404 -23.1702)" style="fill: #15181d;"></path>
                            <path d="M60.2332,83.49c0,.44-.1142.7967-.2574.7967s-.2568-.3536-.2568-.7967.1141-.7967.2568-.7967S60.2332,83.05,60.2332,83.49Z" transform="translate(-0.3404 -23.1702)" style="fill: #15181d;"></path>
                            <path d="M63.8328,83.49c0,.44-.1141.7967-.2573.7967s-.2568-.3536-.2568-.7961.1141-.7967.2568-.7967S63.8328,83.05,63.8328,83.49Z" transform="translate(-0.3404 -23.1702)" style="fill: #15181d;"></path>
                            <path d="M59.1237,88.9263a3.0923,3.0923,0,0,0,2.0532,1.1075,3.0521,3.0521,0,0,0,2.2269-.6585c.0656-.05,0-.165-.0651-.1143a2.9341,2.9341,0,0,1-2.1449.6391,2.9721,2.9721,0,0,1-1.9788-1.0675c-.057-.0636-.146.03-.0907.0937Z" transform="translate(-0.3404 -23.1702)" style="fill: #15181d;"></path>
                            <path d="M62.6248,118.4039s10.9853-.6753,16.9367-4.8322c0,0,2.75,2.1256,2.3226,3.5358S69.7353,128.54,66.5093,125.0229A15.8024,15.8024,0,0,1,62.6248,118.4039Z" transform="translate(-0.3404 -23.1702)" style="fill: #a9b7f2;"></path>
                            <path d="M46.8745,98.5394s-7.1065,1.1-7.5242,14.0777,2.0207,22.7643,1.3941,25.6236,4.4181,13.6928,4.8364,13.9132,1.7274-2.854,1.7274-2.854-.4337-14.6863.6117-28.764S50.2214,99.1994,46.8745,98.5394Z" transform="translate(-0.3404 -23.1702)" style="fill: #a9b7f2;"></path>
                            <path d="M49.1178,110.0542a10.289,10.289,0,0,1,.3589,3.7863,7.2564,7.2564,0,0,1-1.3833,2.81,7.4587,7.4587,0,0,0-.8617,4.3485c.0331,1.51.0782,3.0213.1638,4.5287.0816,1.43.2608,2.8451.3784,4.2712a18.211,18.211,0,0,1-.2643,4.1746,36.7616,36.7616,0,0,0-.0473,10.0426c.0274.2075-.28.2977-.3082.0879a37.0957,37.0957,0,0,1-.12-8.9149,34.39,34.39,0,0,0,.4759-4.3931c-.0274-1.4839-.2791-2.963-.3817-4.4427-.1-1.4444-.1479-2.8917-.1889-4.3384a15.0517,15.0517,0,0,1,.1632-3.8757,12.7737,12.7737,0,0,1,1.6189-3.0278c.8241-1.55.452-3.3414.0885-4.97C48.7634,109.9352,49.0715,109.8474,49.1178,110.0542Z" transform="translate(-0.3404 -23.1702)" style="fill: #003a70;"></path>
                            <path d="M67.3516,116.6873c.7419,1.5322.4206,3.1333.2853,4.7686-.1312,1.56.4457,3.2924-.3075,4.73-.0983.1867-.3739.02-.2762-.1668.7013-1.3377.1409-3.0992.2641-4.5635.1308-1.5569.4726-3.1338-.24-4.6018-.0919-.1891.1832-.3536.2756-.1668Z" transform="translate(-0.3404 -23.1702)" style="fill: #003a70;"></path>
                            <path d="M57.2891,131.6966q-4.5688,2.306-8.9714,4.9383a.1558.1558,0,0,1-.1773-.0113.1626.1626,0,0,1-.0413-.0482.1691.1691,0,0,1-.02-.0609.1718.1718,0,0,1,.0037-.0643.1671.1671,0,0,1,.0275-.0579.16.16,0,0,1,.0466-.0426q4.4016-2.6305,8.9715-4.9377C57.3119,131.3189,57.474,131.6036,57.2891,131.6966Z" transform="translate(-0.3404 -23.1702)" style="fill: #003a70;"></path>
                            <path d="M51.7371,137.5348l-2.85,1.591a.1638.1638,0,0,1-.1615-.2846l2.8533-1.591a.1637.1637,0,0,1,.1609.2846Z" transform="translate(-0.3404 -23.1702)" style="fill: #003a70;"></path>
                            <path d="M54.6429,143.4276a24.4371,24.4371,0,0,1-5.3961,0c-.2021-.0223-.2044-.3535,0-.33a24.4371,24.4371,0,0,0,5.3961,0C54.8472,143.0753,54.8455,143.4053,54.6429,143.4276Z" transform="translate(-0.3404 -23.1702)" style="fill: #003a70;"></path>
                        </g>
                    </svg>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 plan-trip--info">
                    <form method="GET" action="javascript:void(0)" id="plantrip" onsubmit="return validateForm2()">
                        <h3 class="plan-trip--title">@lang('front.index_page.plan') <span>@lang('front.index_page.trip')</span> ?</h3>
                        <p class="plan-trip--desc">@lang('front.index_page.plan_trip_notice')</p>

                        <div class="plan-trip--send__location">
                            <h3 class="plan-trip--title--small">@lang('front.index_page.where_leave')</h3>
                            <div class="plan-trip--location__wrap">
                                <div class="plan-trip--location__icon gogocar-gray-icons">
                                    <svg class="icon icon-map2 ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#map2') }}"></use>
                                    </svg>
                                </div>
                                <input class="plan-trip--location__input gogocar-input-v1 map-input" type="text" placeholder="Например: Ташкент" name="fc" id="address3-input">
                                <input type="hidden" name="address1_latitude" id="address3-latitude" value="0" />
                                <input type="hidden" name="address1_longitude" id="address3-longitude" value="0" />
                                <input type="hidden" name="address1_component" id="address3-component" value="0" />
                                <input type="hidden" name="current_lat" class="current_lat" value="0" />
                                <input type="hidden" name="current_lng" class="current_lng" value="0" />
                                @if(Auth::user())
                                <button class="plan-trip--location--submit gogocar-yellow-icons" >
                                    <svg class="icon icon-arrow-right ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                                    </svg>
                                </button>
                                @else
                                <div class="plan-trip--location--submit gogocar-yellow-icons" data-toggle="modal" data-target="#popup-login">
                                    <svg class="icon icon-arrow-right ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                                    </svg>
                                </div>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @if(count($trips) > 0)
    <section class="popular-trip">
        <div class="container">
            <div class="popular-trip--wrap">
                <h3 class="section-title">@lang('front.index_page.popular_destination')</h3>
                <p class="section-desc">@lang('front.index_page.find_trip')</p>
                <div class="popular-trip--list row">
                    @if(count($trips) > 0)
                    @foreach ($trips as $trip)
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 gogocar-trip--item">
                        <div class="gogocar-trip--item__top">
                            <div class="gogocar-trip--item-town__route">
                                <div class="gogocar-trip--item__town">
                                    <span>{{ $trip->sourcecity->city }}</span><span>{{ $trip->destinationcity->city }}</span>
                                </div>
                                <div class="gogocar-trip--item__route">
                                    <div class="gogocar-trip--item__route--start"></div>
                                    <div class="gogocar-trip--item__route--end"></div>
                                </div>
                                @php
                                $seconds = $trip->time;
                                $hours = floor($seconds / 3600);
                                $h = floor($seconds / 3600);
                                $seconds -= $hours * 3600;
                                $minutes = floor($seconds / 60);
                                // $seconds -= $minutes * 60;
                                @endphp
                                <div class="gogocar-trip--item__km">{{ round($trip->distance/1000) }} км  <span>(
                                    {{ $hours }} ч. {{ $minutes }} мин. )</span><p>{{round($trip->distance_from_you)}}km @lang('global.search_page.from_you')</p></div>
                            </div>
                        </div>
                        <div class="gogocar-trip--item__bottom">
                            <div class="gogocar-trip--item__price money" data-currency-rub="{{Helper::convertCurrency($trip->price_per_seat, 'UZS', 'RUB')}}" data-currency-uzs="{{$trip->price_per_seat}}">от {{ $trip->price_per_seat }} UZS</div>
                            @php
                            if($trip->car_id != null)
                            $trip_type2 = "passenger";
                            elseif($trip->truck_id != null)
                            $trip_type2 = "cargo";
                            else
                            $trip_type2 = null;
                            @endphp
                            @if(Auth::user())
                                @if(!is_null($trip->user) && $trip->user->id != optional(Auth::user())->id)
                                <a href="{{ route('tripplan', [app()->getLocale(), 't_id'=>$hashids->encode($trip->id), 'type'=>$trip_type2]) }}" class="trip-plan">
                                    <div class="gogocar-gray-icons2">
                                        <svg class="icon icon-arrow-right3 ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </a>
                                @else
                                <a href="{{ route('trip-detail', [app()->getLocale(), 't_id'=>$hashids->encode($trip->id)]) }}" class="trip-detail">
                                    <div class="gogocar-gray-icons2">
                                        <svg class="icon icon-arrow-right3 ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </a>
                                @endif
                            @else
                                <a href="#"  data-toggle="modal" data-target="#popup-login">
                                    <div class="gogocar-gray-icons2">
                                        <svg class="icon icon-arrow-right3 ">
                                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}">
                                            </use>
                                        </svg>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
                <a class="gogocar-yellow-button 222" href="{{ route('search', app()->getLocale()) }}">@lang('front.index_page.find')</a>
            </div>
        </div>
    </section>
    @endif
    <section class="how-work">
        <div class="container">
            <div class="how-work--wrap">
                <h3 class="section-title">@lang('front.index_page.how_it_works')</h3>
                <p class="section-desc">@lang('front.index_page.3_simple_words')</p>
                <div class="how-work--list row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 gogocar-how-work--item">
                        <div class="gogocar-how-work--item__wrap">
                            <div class="gogocar-how-work--top">
                                <div class="gogocar-gray-icons how-work-item--icon">
                                    <svg class="icon icon-loupe ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#loupe') }}"></use>
                                    </svg>
                                </div>
                                <div class="gogocar-how-work--number">01</div>
                            </div>
                            <div class="gogocar-how-work--bottom"><span>@lang('front.index_page.just')</span>
                                <p>@lang('front.index_page.3_text_1')</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 gogocar-how-work--item">
                        <div class="gogocar-how-work--item__wrap">
                            <div class="gogocar-how-work--top">
                                <div class="gogocar-gray-icons how-work-item--icon">
                                    <svg class="icon icon-location ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#location') }}"></use>
                                    </svg>
                                </div>
                                <div class="gogocar-how-work--number">02</div>
                            </div>
                            <div class="gogocar-how-work--bottom"><span>@lang('front.index_page.quick')</span>
                                <p>@lang('front.index_page.3_text_2')</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 gogocar-how-work--item">
                        <div class="gogocar-how-work--item__wrap">
                            <div class="gogocar-how-work--top">
                                <div class="gogocar-gray-icons how-work-item--icon">
                                    <svg class="icon icon-taxi ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#taxi') }}"></use>
                                    </svg>
                                </div>
                                <div class="gogocar-how-work--number">03</div>
                            </div>
                            <div class="gogocar-how-work--bottom"><span>@lang('front.index_page.no_hassle')</span>
                                <p>@lang('front.index_page.3_text_3')</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="how-dots--wrap"></div>
                {{-- <div class="gogocar-yellow-button">@lang('front.index_page.more_details')</div> --}}
            </div>
        </div>
    </section>
    <section class="why-choise">
        <div class="container">
            <div class="why-choise--wrap">
                <h3 class="section-title">@lang('front.index_page.why_people') ?</h3>
                <p class="section-desc">@lang('front.index_page.convenient')!</p>
                <div class="why-choise-list">
                    <div class="why-choise-item">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 why-choise-item--baner">
                            <svg class="icon icon-illu3 ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#illu3') }}">
                                </use>
                            </svg>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 why-choise-item--info">
                            <div class="why-choise-item--title">1) <span>@lang('front.index_page.community')</span></div>
                            <p class="why-choise-item--desc">@lang('front.index_page.we_want_to').</p>
                        </div>
                    </div>
                    <div class="why-choise-item">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 why-choise-item--baner">
                            <svg class="icon icon-illu4 ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#illu4') }}">
                                </use>
                            </svg>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 why-choise-item--info">
                            <div class="why-choise-item--title">2) <span>@lang('front.index_page.nearby')</span></div>
                            <p class="why-choise-item--desc">@lang('front.index_page.forget_having').</p>
                        </div>
                    </div>
                    <div class="why-choise-item">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 why-choise-item--baner">
                            <svg class="icon icon-illu5 ">
                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#illu5') }}"></use>
                            </svg>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 why-choise-item--info">
                            <div class="why-choise-item--title">3) <span>@lang('front.index_page.speed')</span></div>
                            <p class="why-choise-item--desc">@lang('front.index_page.60_kids')</p>
                        </div>
                    </div>
                </div>
                <div class="why-dots--wrap"></div>
            </div>
        </div>
    </section>
    <section class="blog-main">
        <div class="container">
            <div class="blog-main--wrap">
                <div class="blog-main-list tab-content clearfix">
                    <div class="blog-main--top ">
                        <h3 class="blog-main--title">@lang('front.index_page.blog')</h3>
                        <ul class="blog-main--tabs nav nav-pills">
                            <li><a class="blog-main--link active" href="#all_blog" data-toggle="tab">@lang('front.index_page.all')</a></li>
                            <li><a class="blog-main--link" href="#news_blog" data-toggle="tab">@lang('front.index_page.news')</a></li>
                            <li><a class="blog-main--link" href="#posts_blog" data-toggle="tab">@lang('front.index_page.posts')</a></li>
                        </ul>
                    </div>
                    <div id="news_blog" class="tab-pane">
                        @if(count($newsObjects) == 0)
                        <div class="panel-body text-center">
                            <h4>@lang('global.no_data')</h4>
                        </div>
                        @else
                        <div class="blog-main--bottom row">
                            @foreach($newsObjects as $posts)
                            @switch($loop->index)
                            @case(0)
                            <a class="col-xl-6 col-lg-8 col-md-12 col-sm-12 blog-main--item__wrap" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $posts->page_url] ) }}">
                                <div class="blog-main--item">
                                    @if(is_null($posts->image))
                                    <div class="blog-main--item__img" style="background-image: url('{{ asset('images/news/news_01.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img" style="background-image: url('{{ asset($posts->image) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{ $posts->date }}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <div class="blog-main--item__content">
                                        <h3 class="blog-main--item__title">
                                            {{ str_limit($posts->title, 40) }}</h3>
                                        <p class="blog-main--item__desc">
                                            {{ str_limit($posts->description, 100) }}</p>
                                    </div>
                                </div>
                                
                            </a>
                            @break
                            @case(1)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $posts->page_url] ) }}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->image))
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset('images/news/news_01.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset($posts->image) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{ $posts->date }}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->title, 40) }}
                                    </h3>
                                </div>
                            </a>
                            @break
                            @case(2)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $posts->page_url] ) }}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->image))
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset('static/img/content/blog/blog3.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset($posts->image) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{ $posts->date }}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->title, 40) }}
                                    </h3>
                                </div>
                            </a>
                            @break
                            @case(3)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $posts->page_url] ) }}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->image))
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset('static/img/content/blog/blog4.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset($posts->image) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{ $posts->date }}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->title, 40) }}
                                    </h3>
                                </div>
                            </a>
                            @break
                            @case(4)
                            <a class="col-xl-6 col-lg-8 col-md-12 col-sm-12 blog-main--item__wrap" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $posts->page_url] ) }}">
                                <div class="blog-main--item">
                                    @if(is_null($posts->image))
                                    <div class="blog-main--item__img" style="background-image: url('{{ asset('static/img/content/blog/blog5.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img" style="background-image: url('{{ asset($posts->image) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{ $posts->date }}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <div class="blog-main--item__content">
                                        <h3 class="blog-main--item__title">
                                            {{ str_limit($posts->title, 40) }}</h3>
                                        <p class="blog-main--item__desc">
                                            {{ str_limit($posts->description, 40) }}</p>
                                    </div>
                                </div>
                            </a>
                            @break
                            @endswitch
                            @endforeach

                            @endif
                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 blog-main--item__wrap blog-read-all-articles" href="/">
                                <div class="blog-main--item--v2 blog-main--item--show">
                                    <svg class="icon icon-megafon ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#megafon') }}"></use>
                                    </svg>
                                    <h3 class="gogocar-blog--title">GoGoBlog</h3>
                                    <p class="gogocar-blog--desc">Больше новостей и статей в нашем блоге!</p><a class="gogocar-yellow-button" href="{{route('news-all',  app()->getLocale())}}">Читать</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-main-dots--wrap"></div>
                    </div>
                    <div id="posts_blog" class="tab-pane">
                        @if(count($postsObjects) == 0)
                        <div class="panel-body text-center">
                            <h4>@lang('global.no_data')</h4>
                        </div>
                        @else
                        <div class="blog-main--bottom2 row">
                            @foreach($postsObjects as $posts)
                            @switch($loop->index)
                            @case(0)
                            <a class="col-xl-6 col-lg-8 col-md-12 col-sm-12 blog-main--item__wrap" href="{{ route('post', ['locale' => app()->getLocale(), 'id' => $posts->url])}}">
                                <div class="blog-main--item">
                                    @if(is_null($posts->img_url))
                                    <div class="blog-main--item__img"
                                        style="background-image: url('{{ asset('images/news/news_01.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img"
                                        style="background-image: url('{{ asset($posts->img_url) }}');">
                                    </div>
                                    @endif
                                    <!-- <div class="blog-main--item__img"
                                                            style="background-image: url('/static/img/content/blog/blog1.png');"></div> -->
                                    <div class="blog-main--item__date">{{date('d.m.yy',strtotime($posts->created_at))}}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <div class="blog-main--item__content">
                                        <h3 class="blog-main--item__title">
                                            {{ str_limit($posts->name, 40) }}</h3>
                                        <p class="blog-main--item__desc">
                                            {{ str_limit($posts->short_des, 100) }}</p>
                                    </div>
                                </div>
                            </a>
                            @break
                            @case(1)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('post', ['locale' => app()->getLocale(), 'id' => $posts->url])}}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->img_url))
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset('images/news/news_01.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset($posts->img_url) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{date('d.m.yy',strtotime($posts->created_at))}}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->name, 40) }}
                                    </h3>
                                </div>
                            </a>
                            @break
                            @case(2)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('post', ['locale' => app()->getLocale(), 'id' => $posts->url])}}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->img_url))
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset('static/img/content/blog/blog3.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset($posts->img_url) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{date('d.m.yy',strtotime($posts->created_at))}}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->name, 40) }}
                                    </h3>
                                </div>
                            </a>
                            @break
                            @case(3)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('post', ['locale' => app()->getLocale(), 'id' => $posts->url])}}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->img_url))
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset('static/img/content/blog/blog4.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset($posts->img_url) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{date('d.m.yy',strtotime($posts->created_at))}}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->name, 40) }}
                                    </h3>
                                </div>
                            </a>
                            @break
                            @case(4)
                            <a class="col-xl-6 col-lg-8 col-md-12 col-sm-12 blog-main--item__wrap" href="{{ route('post', ['locale' => app()->getLocale(), 'id' => $posts->url])}}">
                                <div class="blog-main--item">
                                    @if(is_null($posts->img_url))
                                    <div class="blog-main--item__img"
                                        style="background-image: url('{{ asset('/static/img/content/blog/blog5.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img"
                                        style="background-image: url('{{ asset($posts->img_url) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{date('d.m.yy',strtotime($posts->created_at))}}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <div class="blog-main--item__content">
                                        <h3 class="blog-main--item__title">
                                            {{ str_limit($posts->name, 40) }}</h3>
                                        <p class="blog-main--item__desc">
                                            {{ str_limit($posts->short_des, 40) }}</p>
                                    </div>
                                </div>
                            </a>
                            @break
                            @endswitch
                            @endforeach

                            @endif
                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 blog-main--item__wrap blog-read-all-articles"
                                href="/">
                                <div class="blog-main--item--v2 blog-main--item--show">
                                    <svg class="icon icon-megafon ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#megafon') }}"></use>
                                    </svg>
                                    <h3 class="gogocar-blog--title">GoGoBlog</h3>
                                    <p class="gogocar-blog--desc">Больше новостей и статей в нашем блоге!</p><a
                                        class="gogocar-yellow-button" href="{{route('news-all',  app()->getLocale())}}">Читать</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-main-dots--wrap2"></div>
                    </div>
                        
                    <div id="all_blog" class="tab-pane  active">
                        @if(count($newsObjects) == 0)
                        <div class="panel-body text-center">
                            <h4>@lang('global.no_data')</h4>
                        </div>
                        @else
                        <div class="blog-main--bottom3 row">
                            @foreach($newsObjects as $posts)
                            @switch($loop->index)
                            @case(0)
                            <a class="col-xl-6 col-lg-8 col-md-12 col-sm-12 blog-main--item__wrap" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $posts->page_url] ) }}">
                                <div class="blog-main--item">
                                    @if(is_null($posts->image))
                                    <div class="blog-main--item__img" style="background-image: url('{{ asset('images/news/news_01.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img" style="background-image: url('{{ asset($posts->image) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{ $posts->date }}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <div class="blog-main--item__content">
                                        <h3 class="blog-main--item__title">
                                            {{ str_limit($posts->title, 40) }}</h3>
                                        <p class="blog-main--item__desc">
                                            {{ str_limit($posts->description, 100) }}</p>
                                    </div>
                                </div>
                                
                            </a>
                            @break
                            @case(1)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $posts->page_url] ) }}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->image))
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset('images/news/news_01.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset($posts->image) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{ $posts->date }}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->title, 40) }}
                                    </h3>
                                </div>
                            </a>
                            @break
                            @case(2)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $posts->page_url] ) }}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->image))
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset('static/img/content/blog/blog3.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset($posts->image) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{ $posts->date }}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->title, 40) }}
                                    </h3>
                                </div>
                            </a>
                            @break
                            @case(3)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $posts->page_url] ) }}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->image))
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset('static/img/content/blog/blog4.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2" style="background-image: url('{{ asset($posts->image) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{ $posts->date }}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->title, 40) }}
                                    </h3>
                                </div>
                            </a>
                            @break
                            @case(4)
                            <a class="col-xl-6 col-lg-8 col-md-12 col-sm-12 blog-main--item__wrap" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $posts->page_url] ) }}">
                                <div class="blog-main--item">
                                    @if(is_null($posts->image))
                                    <div class="blog-main--item__img" style="background-image: url('{{ asset('static/img/content/blog/blog5.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img" style="background-image: url('{{ asset($posts->image) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{ $posts->date }}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <div class="blog-main--item__content">
                                        <h3 class="blog-main--item__title">
                                            {{ str_limit($posts->title, 40) }}</h3>
                                        <p class="blog-main--item__desc">
                                            {{ str_limit($posts->description, 40) }}</p>
                                    </div>
                                </div>
                            </a>
                            @break
                            @endswitch
                            @endforeach

                            @endif
                        </div>
                        <div class="blog-main-dots--wrap3"></div>
                        @if(count($postsObjects) == 0)
                        <div class="panel-body text-center">
                            <h4>@lang('global.no_data')</h4>
                        </div>
                        @else
                        <div class="blog-main--bottom4 row">
                            @foreach($postsObjects as $posts)
                            @switch($loop->index)
                            @case(0)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('post', ['locale' => app()->getLocale(), 'id' => $posts->url])}}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->img_url))
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset('images/news/news_01.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset($posts->img_url) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{date('d.m.yy',strtotime($posts->created_at))}}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->name, 40) }}
                                    </h3>
                                </div>
                            </a>
                            
                            @break
                            @case(1)
                            <a class="col-xl-6 col-lg-8 col-md-12 col-sm-12 blog-main--item__wrap" href="{{ route('post', ['locale' => app()->getLocale(), 'id' => $posts->url])}}">
                                <div class="blog-main--item">
                                    @if(is_null($posts->img_url))
                                    <div class="blog-main--item__img"
                                        style="background-image: url('{{ asset('images/news/news_01.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img"
                                        style="background-image: url('{{ asset($posts->img_url) }}');">
                                    </div>
                                    @endif
                                    <!-- <div class="blog-main--item__img"
                                                            style="background-image: url('/static/img/content/blog/blog1.png');"></div> -->
                                    <div class="blog-main--item__date">{{date('d.m.yy',strtotime($posts->created_at))}}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <div class="blog-main--item__content">
                                        <h3 class="blog-main--item__title">
                                            {{ str_limit($posts->name, 40) }}</h3>
                                        <p class="blog-main--item__desc">
                                            {{ str_limit($posts->short_des, 100) }}</p>
                                    </div>
                                </div>
                            </a>
                            @break
                            @case(2)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('post', ['locale' => app()->getLocale(), 'id' => $posts->url])}}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->img_url))
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset('static/img/content/blog/blog3.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset($posts->img_url) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{date('d.m.yy',strtotime($posts->created_at))}}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->name, 40) }}
                                    </h3>
                                </div>
                            </a>
                            @break
                            @case(3)
                            <a class="col-xl-3 col-lg-4 col-md-4 col-sm-6 blog-main--item__wrap" href="{{ route('post', ['locale' => app()->getLocale(), 'id' => $posts->url])}}">
                                <div class="blog-main--item--v2">
                                    @if(is_null($posts->img_url))
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset('static/img/content/blog/blog4.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img--v2"
                                        style="background-image: url('{{ asset($posts->img_url) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{date('d.m.yy',strtotime($posts->created_at))}}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <h3 class="blog-main--item__title--v2">
                                        {{ str_limit($posts->name, 40) }}
                                    </h3>
                                </div>
                            </a>
                            @break
                            @case(4)
                            <a class="col-xl-6 col-lg-8 col-md-12 col-sm-12 blog-main--item__wrap" href="{{ route('post', ['locale' => app()->getLocale(), 'id' => $posts->url])}}">
                                <div class="blog-main--item">
                                    @if(is_null($posts->img_url))
                                    <div class="blog-main--item__img"
                                        style="background-image: url('{{ asset('/static/img/content/blog/blog5.png') }}');">
                                    </div>
                                    @else
                                    <div class="blog-main--item__img"
                                        style="background-image: url('{{ asset($posts->img_url) }}');">
                                    </div>
                                    @endif
                                    <div class="blog-main--item__date">{{date('d.m.yy',strtotime($posts->created_at))}}</div>
                                    <div class="blog-main--item__date--after"></div>
                                    <div class="blog-main--item__content">
                                        <h3 class="blog-main--item__title">
                                            {{ str_limit($posts->name, 40) }}</h3>
                                        <p class="blog-main--item__desc">
                                            {{ str_limit($posts->short_des, 40) }}</p>
                                    </div>
                                </div>
                            </a>
                            @break
                            @endswitch
                            @endforeach

                        @endif
                            <div class="col-xl-3 col-lg-4 col-md-12 col-sm-12 blog-main--item__wrap blog-read-all-articles"
                                href="/">
                                <div class="blog-main--item--v2 blog-main--item--show">
                                    <svg class="icon icon-megafon ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#megafon') }}"></use>
                                    </svg>
                                    <h3 class="gogocar-blog--title">GoGoBlog</h3>
                                    <p class="gogocar-blog--desc">Больше новостей и статей в нашем блоге!</p><a
                                        class="gogocar-yellow-button" href="{{route('posts-all',  app()->getLocale())}}">Читать</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-main-dots--wrap4"></div>
                    </div>
                    <div class="gogocar-yellow-button go-read-all-articles">Читать все статьи</div>
    </section>
    <div id="address-map-container" style="display: none; ">
        <div style="width: 100%; height: 100%" id="address1-map"></div>
        <div style="width: 100%; height: 100%" id="address2-map"></div>
        <div style="width: 100%; height: 100%" id="address3-map"></div>
        <div style="width: 100%; height: 100%" id="address4-map"></div>
        <div style="width: 100%; height: 100%" id="address5-map"></div>
    </div>
    <input type="hidden" id="current_page" value="home">
</div>

<div class="modal fade" id="popup-input-value" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('front.search_page.input_address')</p>
                <div class="gogocar-yellow-button w-170" id="finish">Ок</div>
            </div>
        </div>
    </div>
</div>

<script>
    function validateForm1() {
        // var lat = $('#address1-latitude').val();
        // var lng = $('#address1-longitude').val();
        const address1 = $('#address1-component').val();
        const address2 = $('#ddress2-component').val();
        if (address1 == 0 || address2 == 0) {
            $('#popup-input-value').modal('show');
            return false;
        }
        currentHours();
    }

    function validateFormPassenger() {
        // var lat = $('#address1-latitude').val();
        // var lng = $('#address1-longitude').val();
        const address1 = $('#address4-component').val();
        const address2 = $('#address5-component').val();
            if (address1 == 0 || address2 == 0) {
                $('#popup-input-value').modal('show');
                return false;
            }
            currentHours();
     }

    function validateForm2() {
        // alert('test');
        const address3 = $('#address3-component').val();
        if (address3 == 0) {
            $('#popup-input-value').modal('show');
            return false;
        }
    }

    function currentHours(){
        let s= new Date().toLocaleString();
        $('#client_hours').val(s);
        $('#client_hours_cargo').val(s);
    }

    $(document).ready(function(){
        $('#plantrip').submit(function(e) {
            e.preventDefault();
            var fc = $('#address3-input').val();
            var lat = $('#address3-latitude').val();
            var lng = $('#address3-longitude').val();
            var address = $('#address3-component').val();
            if (lat == 0 || lng == 0 || address == 0) {
                $('#popup-input-value').modal('show');
                return false;
                // alert("Please input valid address in google map");
            } else {
                var formData = new FormData($("#from_position_passenger")[0]);

                var token = $("#token").val();
                $.ajax({
                    type: 'POST', 
                    headers: {
                        'X-CSRF-TOKEN': token
                    }, 
                    url: '{{ route('suggestToPassenger', app()->getLocale()) }}', 
                    data: {
                        fc: fc,
                        address_latitude: lat,
                        address_longitude: lng,
                        address_component: address
                    }, 
                    success: (data) => {
                        if(data.state == 'success'){
                            if (data.result == 'ok') {
                                window.location.href = '{{ route("suggest_late_to", app()->getLocale()) }}';
                            } else if (data.result == 'failed') {
                                $('#popup-input-value').modal('show');
                            }
                        }
                        else{

                        }
                    }
                    , error: function(data) {
                        console.log(data);
                    }
                });
            }
        });
    })
    
</script>
{{-- @endif --}}
@endsection

@section('user_lang')
    @include('includes.user_flag')
@endsection