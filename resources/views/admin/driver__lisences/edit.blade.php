@extends('layouts.app')
@section('title', 'Водительские права')
@section('admin_lang')
<ul class="choise-lang--list">
	<li class="choise-lang--item"
		data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'ru', 'id' => $driverLisence->id])}}'>
		<div class="choise-lang--item__img"
			style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
		</div>
		<div class="choise-lang--item__text">RU</div>
	</li>
	<li class="choise-lang--item"
		data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), ['locale' => 'uz', 'id' =>$driverLisence->id])}}">
		<div class="choise-lang--item__img"
			style="background-image:url('{{ asset('/static/img/general/lang/lang-uz.png') }}');">
		</div>
		<div class="choise-lang--item__text">UZ</div>
	</li>
</ul>
@endsection
@section('content')
<section class="section-1">
	<div class="section-content--main__wrap box-bg2 pb-0">
		<div class="section-content--main">
			<div class="section-top-side">
				<div class="section-block--title">
					<a class="back_to_link" href="{{ route('admin.driver__lisence.index', app()->getLocale()) }}">
						<img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
					</a>
					<span class="pull-left admin-form-title">@lang('global.license.fields.edit')</span></div>
			</div>

			<form method="POST" action="{{ route('admin.driver__lisence.store_lisence', app()->getLocale()) }}"
				id="edit_lisence_form" name="edit_lisence_form" accept-charset="UTF-8">
				{{ csrf_field() }}
				<div class="section-bottom-side">
					<div class="section-users-tab--content">
						<div class="section-inputs--wrapper row">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.license.fields.document_no'):</label>
								<input class="input-main" type="text" placeholder="" name="document_no"
									value="{{ $driverLisence->document_no }}">
							</div>
							<input type="hidden" name="lisence_id" value="{{$driverLisence->id}}">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.license.fields.category'):</label>
								<div
									class="section-select--input2 section-select--input__show section-driver-rules--category justify-content-between">
									<div class="section-yellow-bg--wrap">
										@foreach ($driverLisence->lisence_categories as $item)
										<div class="section-yellow-bg--content"><span>{{$item->title}}</span>
											<div class="section-yellow-bg--content__icon">
												<svg class="icon icon-close ">
													<use
														xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#close')}}">
													</use>
												</svg>
											</div>
										</div>
										@endforeach
									</div>
									<input type="hidden" id="cargotypes" name="categories"
										value="@foreach ($driverLisence->lisence_categories as $item) {{$item->title}}@endforeach">
									<ul class="section-select--popup__list">
										@foreach ($categories as $item)
										<li class="section-select--popup__item hover-text-color">{{$item->title}}</li>
										@endforeach
									</ul>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap section-user-flex row">
								@if (!is_null($driverLisence->pdf))
								<div class="section-user-flex--item">
									<a class="section-user-files" href="/{{$driverLisence->pdf}}" download="">
										<svg class="icon icon-pdf ">
											<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}">
											</use>
										</svg>
										<span>
											{{substr(substr($driverLisence->pdf, 0, -20), 13)}}.{{$driverLisence->pdf_extension}}
										</span>
									</a>
								</div>
								@endif
							</div>
							@if (!is_null($driverLisence->pdf))
							<div
								class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap justify-content-center mb-0">
								<div class="checkbox-input--tab__item">
									<div
										class="checkbox-input @if($driverLisence->verified == true) {{ 'checked' }} @endif">
									</div>
									<input class="checkbox-input--tab" type="checkbox" name="lisence_verified"
										@if($driverLisence->verified == true) {{ 'checked' }} @endif>
									<span>@lang('global.license.fields.verified')</span>
								</div>
							</div>
							@endif
						</div>
					</div>
				</div>
				<div class="section-footer-side">
					<div class="section-buttons--wrap">
						<button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_update')</button>
						<a href="{{ route('admin.driver__lisence.index', app()->getLocale()) }}">
							<div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>
@endsection