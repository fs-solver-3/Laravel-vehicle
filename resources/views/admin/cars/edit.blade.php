@extends('layouts.app')
@section('title', 'Машины')
@section('admin_lang')
<ul class="choise-lang--list">
    <li class="choise-lang--item" data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $car->id])}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item" data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $car->id])}}">
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-uz.png') }}');">
        </div>
        <div class="choise-lang--item__text">UZ</div>
    </li>
</ul>
@endsection
@section('content')
<section class="section-1">
    <div class="panel panel-default">

        <div class="panel-heading clearfix">

              <div class="pull-left">
                  <a href="{{ route('admin.car.index', app()->getLocale()) }}" class="back_to_link" title="Show All Cars">
                      <img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
                  </a>
                  <span class="pull-left admin-form-title">
                      <h4 >{{ !empty($car->name) ? $car->name : 'Car' }}</h4>
                  </span>
              </div>
              <div class="btn-group btn-group-sm pull-right" role="group">

                  <a href="{{ route('admin.car.create', app()->getLocale()) }}" class="btn btn-add" title="Create New Car">
                      <img src="{{asset('admin/plus.svg')}}" alt="for you">
                  </a>

              </div>
        </div>

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form method="POST" action="{{ route('admin.car.update', ['locale' => app()->getLocale(), 'id' => $car->id]) }}" id="edit_car_form" name="edit_car_form" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('admin.cars.form', [
                                        'car' => $car,
                                      ])

                <div class="section-footer-side">
                    <div class="section-buttons--wrap">
                        <button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_update')</button>
                        <a href="{{ route('admin.car.index', app()->getLocale()) }}">
                            <div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
                        </a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</section>
@endsection
@section('add_custom_script')
<script>
$(document).on("click", '.click_color', function(){
    var get_user = $(this).html();
    var get_data = $(this).data('type');
    var key = $(this).data('key');
    $(this).parents('.section-select--input__show').children('span').html(get_user);
    $('#color').val(get_data);
});
</script>
@endsection