@extends('layouts.user_app')
@section('content')
    <div class="content">
        <section class="suggest-late">
            <div class="container">
                <div class="suggest-late--wrap">
                    <h1 class="main-section--title text-center mb-5">Откуда <span>везем груз ?</span></h1>
                    <div class="col-xl-8 col-lg-8 suggest-late--inputs">
                        <div class="gogocar-input--wrapper">
                            <div class="gogocar-gray-icons">
                                <svg class="icon icon-map2 ">
                                    <use xlink:href="static/img/svg/symbol/sprite.svg#map2"></use>
                                </svg>
                            </div>
                            <input class="gogocar-input-v1 suggest-late--input--from" type="text" placeholder="Например, Медресе Абулкосим, Ташкент">
                        </div>
                        <ul class="suggest-late--result--list">
                            <li class="suggest-late--result--item">
                                <div class="suggest-late--result--item__left">
                                    <div class="gogocar-gray-icons">
                                        <svg class="icon icon-wall-clock ">
                                            <use xlink:href="static/img/svg/symbol/sprite.svg#wall-clock"></use>
                                        </svg>
                                    </div><span>Медресе Абулкосим, Ташкент</span>
                                </div>
                                <div class="gogocar-gray-icons2">
                                    <svg class="icon icon-arrow-right3 ">
                                        <use xlink:href="static/img/svg/symbol/sprite.svg#arrow-right3"></use>
                                    </svg>
                                </div>
                            </li>
                            <li class="suggest-late--result--item">
                                <div class="suggest-late--result--item__left">
                                    <div class="gogocar-gray-icons">
                                        <svg class="icon icon-wall-clock ">
                                            <use xlink:href="static/img/svg/symbol/sprite.svg#wall-clock"></use>
                                        </svg>
                                    </div><span>Медресе Абулкосим, Ташкент</span>
                                </div>
                                <div class="gogocar-gray-icons2">
                                    <svg class="icon icon-arrow-right3 ">
                                        <use xlink:href="static/img/svg/symbol/sprite.svg#arrow-right3"></use>
                                    </svg>
                                </div>
                            </li>
                            <li class="suggest-late--result--item">
                                <div class="suggest-late--result--item__left">
                                    <div class="gogocar-gray-icons">
                                        <svg class="icon icon-wall-clock ">
                                            <use xlink:href="static/img/svg/symbol/sprite.svg#wall-clock"></use>
                                        </svg>
                                    </div><span>Медресе Абулкосим, Ташкент</span>
                                </div>
                                <div class="gogocar-gray-icons2">
                                    <svg class="icon icon-arrow-right3 ">
                                        <use xlink:href="static/img/svg/symbol/sprite.svg#arrow-right3"></use>
                                    </svg>
                                </div>
                            </li>
                            <div class="gogocar-yellow-button mt-5">Продолжить</div>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="header-panel--fixed"><a class="header-panel--fixed--item" href="/trip.html">
            <svg class="icon icon-car-f ">
                <use xlink:href="static/img/svg/symbol/sprite.svg#car-f"></use>
            </svg><span>Поездки</span></a><a class="header-panel--fixed--item" href="/find-trip.html">
            <svg class="icon icon-search-f ">
                <use xlink:href="static/img/svg/symbol/sprite.svg#search-f"></use>
            </svg><span>Поиск</span></a><a class="header-panel--fixed--item hpfi-main" href="/type-trip.html">
            <svg class="icon icon-gogocar-f ">
                <use xlink:href="static/img/svg/symbol/sprite.svg#gogocar-f"></use>
            </svg></a><a class="header-panel--fixed--item" href="/personal-message.html">
            <svg class="icon icon-chat-f ">
                <use xlink:href="static/img/svg/symbol/sprite.svg#chat-f"></use>
            </svg><span>Диалоги</span></a>
        <div class="header-panel--fixed--item gogocar-show-menu">
            <svg class="icon icon-menu-f ">
                <use xlink:href="static/img/svg/symbol/sprite.svg#menu-f"></use>
            </svg><span>Меню</span>
        </div>
    </div>
@endsection