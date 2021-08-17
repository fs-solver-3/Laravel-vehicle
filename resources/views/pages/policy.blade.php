@extends('layouts.user_app')
@section('header')
    @component('layouts.header')
    @endcomponent
@endsection

@section('content')
<!--конец навигационной панели-->
<section class="breadcrumbs">
    <div class="container">
        <ul class="breadcrumbs--list">
            <a class="breadcrumbs--item" href="/">@lang('front.profile.home')
                <svg class="icon icon-arrow-right3 ">
                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                </svg>
            </a>
            <a class="breadcrumbs--item" href="{{ route('search', app()->getLocale()) }}">@lang('front.header.find')<span>&nbsp @lang('front.header.trip')</span></a>
        </ul>
    </div>
</section>
<!--шапка сайта-->
<section class="main-section">

    <!--информацця о проекте-->
    <div class="container">
        <div class="main-section--wrap-2">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="main-section--title text-center">Policy</h1>
                </div>
                <div class="col-md-8 offset-2 ">
                        <p class="section-desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p class="section-desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                        <p class="section-desc">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                </div>
            </div>
        </div>
    </div>
    <!--конец инфомации о проекте-->

</section>
@endsection
