@inject('request', 'Illuminate\Http\Request')
@extends('layouts.app')
@section('title', 'Пользователи')
@section('content')
<section>
	<div class="panel panel-default">
		<div class="panel-heading clearfix">
			<a class="back_to_link" href="{{ route('admin.users.index', app()->getLocale()) }}">
				<img src="{{asset('admin/left-arrow.svg')}}" class="left-arrow" alt="for you">
			</a>
		</div>
	</div>
</section>
<section class="section1">
	@if(Session::has('success_message'))
	<div class="alert alert-success">
		<span class="glyphicon glyphicon-ok"></span>
		{!! session('success_message') !!}
	
		<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
		</button>
	
	</div>
	@endif
	<div class="section-content--main__wrap box-bg2 pb-0">
		<div class="section-content--main">
			<div class="section-top-side section-overflow-top-side2">
				<ul class="section-users--tabs desktop-tab">
					<a href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $users->id, 'tab' => 'main']) }}">
						<li class="section-users--tab @if($request->get('tab') == 'main' ) active @endif"  >@lang('global.users.edit.basic_parameter')</li>
					</a>
					<a href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $users->id, 'tab' => 'passport']) }}">
						<li class="section-users--tab @if($request->get('tab') == 'passport' ) active @endif" >@lang('global.users.edit.passport')</li>
						</a>
					<a href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $users->id, 'tab' => 'driver_license']) }}">
						<li class="section-users--tab @if($request->get('tab') == 'driver_license' ) active @endif" >@lang('global.users.edit.driver_license')</li>
					</a>
					<a href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $users->id, 'tab' => 'auto']) }}">
						<li class="section-users--tab @if($request->get('tab') == 'auto' ) active @endif">@lang('global.users.edit.auto')</li>
					</a>
					<a href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $users->id, 'tab' => 'truck']) }}">
						<li class="section-users--tab @if($request->get('tab') == 'truck' ) active @endif" >@lang('global.users.edit.truck')</li>
					</a>
					<a href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $users->id, 'tab' => 'balance']) }}">
						<li class="section-users--tab @if($request->get('tab') == 'balance' ) active @endif" >@lang('global.users.edit.balance')</li>
					</a>
					<a href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $users->id, 'tab' => 'chat']) }}">
						<li class="section-users--tab @if($request->get('tab') == 'chat' ) active @endif">@lang('global.users.edit.chat')</li>
					</a>

				</ul>
				<ul class="section-users--tabs mobile-tab">
					<li class="section-users--tab" data-tab-users="users-main-param">@lang('global.users.edit.basic_parameter')</li>
					<li class="section-users--tab active" data-tab-users="users-password">@lang('global.users.edit.passport')</li>
					<li class="section-users--tab" data-tab-users="users-drive-rules">@lang('global.users.edit.driver_license')</li>
					<li class="section-users--tab" data-tab-users="users-auto">@lang('global.users.edit.auto')</li>
					<li class="section-users--tab" data-tab-users="users-cargo-car">@lang('global.users.edit.truck')</li>
					<li class="section-users--tab" data-tab-users="users-balance">@lang('global.users.edit.balance')</li>
					<li class="section-users--tab" data-tab-users="users-chat">@lang('global.users.edit.chat')</li>
				  </ul>
			</div>
			<form class="section-user--dropdown__wrap users-main-param @if($request->get('tab') == 'main' ) active @endif" method="POST"
				action="{{ route("admin.users.edit_main", [app()->getLocale(), $users->id]) }}" id="edit_users_form"
				name="edit_users_form" accept-charset="UTF-8" enctype="multipart/form-data">
				{{ csrf_field() }}
				<div class="section-bottom-side">
					<div class="section-users-tab--content">
						<div class="section-user--dropdown__img">
							<label>@lang('global.users.edit.user_photo'):</label>
							<div class="section-user--dropdown-and-more">
								<div class="section-user--dropdown__img--wrap">
									@if($users->avatar)
									<div class="section-user--dropdown__img--zone"
										style="background-image: url('{{asset("$users->avatar") }}');"></div>
									@else
									<div class="section-user--dropdown__img--zone"></div>
									@endif
									<input class="dropdown-img" id="user-photo" name="upload_image" type="file" style="width: 100%">
									<div class="section-user--dropdown__img--info">(@lang('global.users.edit.drag')) <span>@lang('global.users.edit.drag_file')</span></div>
								</div>
								<div class="section-user--more gogocar-arrow-button">
									<svg class="icon icon-dots ">
										<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}">
										</use>
									</svg>
									<div class="section-user--more--popup">
										<label class="section-user--more--popup__item" for="user-photo">
											<svg class="icon icon-download ">
												<use
													xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#download')}}">
												</use>
											</svg><span>@lang('global.users.edit.download')</span>
										</label>
										<div class="section-user--more--popup__item section-delete__img">
											<svg class="icon icon-delete-red ">
												<use
													xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
												</use>
											</svg><span>@lang('global.users.edit.delete')</span>
										</div>
									</div>
								</div>
								<div class="section-users-dropdown--mobile-buttons">
									<label class="section-users-dropdown--mobile__load" for="user-photo">
										<svg class="icon icon-download ">
											<use
												xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#download')}}">
											</use>
										</svg><span>@lang('global.users.edit.download')</span>
									</label>
									<div class="section-users-dropdown--mobile__delete section-delete__img">
										<svg class="icon icon-delete-red ">
											<use
												xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
											</use>
										</svg><span>@lang('global.users.edit.delete')</span>
									</div>
								</div>
							</div>
						</div>
						<div class="section-inputs--wrapper row">
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.name'):</label>
								<input class="input-main" type="text" name="name" id="name" placeholder="Введите имя"
									value="{{ old('name', optional($users)->name) }}" required>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.surname'):</label>
								<input class="input-main" type="text" name="surname" id="surname"
									value="{{ old('surname', optional($users)->surname) }}" placeholder="Введите фамилию">
							</div>
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.middlename'):</label>
								<input class="input-main" name="middle_name" type="text" placeholder="Введите отчество" value="{{$users->middle_name}}">
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.email'):</label>
								<input class="input-main" type="email" name="email" id="email"
									value="{{ old('email', optional($users)->email) }}" placeholder="Введите Email"
									required>
							</div>
							{{-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
								<label>Login:</label>
								<input class="input-main" type="text" placeholder="Логин">
							</div> --}}
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.phone'):</label>
								<input class="input-main phone-mask" type="text" name="phone" id="phone" required
									placeholder="9 (999) ___-__-__" value="{{ old('email', optional($users)->phone) }}">
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.language'):</label>
								<div class="section-select--input2 section-select--input__show">
									@if(($users)->language == 'RU')
									<span id="language">@lang('global.ru')</span>
									<input type="hidden" id="language" name="language" value="RU">
									@elseif(($users)->language == 'UZ')
									<span id="language">@lang('global.uz')</span>
									<input type="hidden" id="language" name="language" value="UZ">
									@elseif(($users)->language == 'EN')
									<span id="language">@lang('global.en')</span>
									<input type="hidden" id="language" name="language" value="EN">
									@else
									<span id="language">@lang('global.not_set')</span>
									<input type="hidden" id="language" name="language" value="EN">
									@endif
									<div class="section-select--popup__icon">
										<svg class="icon icon-arrow-down-white ">
											<use
												xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}">
											</use>
										</svg>
									</div>
									<ul class="section-select--popup__list section-select--popup__list__show">
										<li class="language-select hover-text-color" data-type="RU">@lang('global.ru')</li>
										<li class="language-select hover-text-color" data-type="UZ">@lang('global.uz')</li>
										<li class="language-select hover-text-color" data-type="EN">@lang('global.en')</li>
									</ul>
								</div>
							</div>
							<div class="form-group col-md-6 {{ $errors->has('role_id') ? 'has-error' : '' }}">
								<label for="role_id" class="control-label">@lang('global.users.fields.role')</label>
									<div class="section-select--input2 section-select--input__show"><span>@if(!empty($users) && isset($users->role[0]))
										{{ old('type', optional($users)->role[0]->id)? optional($users)->role[0]->title : 'Role' }}
									@endif</span>
										<input type="hidden"  id="role_id2" name="role_id" value="@if(!empty($users) && isset($users->role[0])){{ old('type', optional($users)->role[0]->id)? optional($users)->role[0]->id : '' }}@endif">
										<div class="section-select--popup__icon">
											<svg class="icon icon-arrow-down-white ">
												<use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-down-white')}}"></use>
											</svg>
										</div>
										<ul class="section-select--popup__list section-select--popup__list__show">
											{{-- <li class="section-select--popup__item2 hover-text-color click_role" data-type="all">All</li> --}}
											@foreach ($roles as $key => $role)
												<li class="section-select--popup__item2 hover-text-color click_role" data-type="{{ $key }}">{{ $role }}</li>
											@endforeach
										</ul>
									</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.password'):</label>
								<input class="input-main" type="password" id="password" name="password"
									placeholder="Введите Пароль">
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.password_confirm'):</label>
								<input class="input-main" type="password" id="confirm_password" name="confirm_password"
									placeholder="Повторите пароль">
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
								<div class="checkbox-input--tab__item">
									<div class="checkbox-input @if($users->active == true) {{ 'checked' }} @endif">
									</div>
									<input class="checkbox-input--tab" id="checkbox-tab" type="checkbox" name="active"
										@if($users->active
									== true) {{ 'checked' }} @endif><span>@lang('global.users.fields.active')</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section-footer-side">
					<div class="section-buttons--wrap">
						<button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_save')</button>
						<a href="{{ route('admin.users.index', app()->getLocale()) }}">
							<div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
						</a>
					</div>
				</div>
			</form>
			<form class="section-user--dropdown__wrap users-password @if($request->get('tab') == 'passport' ) active @endif" method="POST"
				action="{{ route("admin.users.edit_passport", [app()->getLocale(), $users->id]) }}"
				id="edit_passport_form" name="edit_passport_form" accept-charset="UTF-8">
				{{ csrf_field() }}
				<div class="section-bottom-side">
					<div class="section-users-tab--content">
						<div class="section-inputs--wrapper row">
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.name'):</label>
								<input class="input-main" name="name" type="text" placeholder="Введите имя"
									value="{{$users->name}}" readonly>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.surname'):</label>
								<input class="input-main" type="text" name="surname" placeholder="Введите фамилию"
									value="{{$users->surname}}" readonly>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.middlename'):</label>
								<input class="input-main" name="middle_name" type="text" placeholder="Введите отчество" value="{{$users->middle_name}}" readonly>
							</div>
							@if ($passport)
								<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.passport_series'):</label>
									<input type="hidden" name="passport_id" value="{{$passport->id}}">
									<input class="input-main mask-seria" type="text" name="passport_series"
										placeholder="__ __" value="{{$passport->series}}">
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.number'):</label>
									<input class="input-main mask-number" type="text" name="passport_room"
										placeholder="__ __ __ __" value="{{$passport->room}}">
								</div>
								<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.depart_code'):</label>
									<input class="input-main mask-code" type="text" name="passport_department_code"
										placeholder="___-___" value="{{$passport->department_code}}">
								</div>
								<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.issued_by'):</label>
									<input class="input-main" type="text" placeholder="" name="passport_issued_by"
										value="{{$passport->issued_by}}">
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.issued_date'):</label>
									<input class="input-main calendar-passport calendar-zone-height text-left" type="text"
										name="passport_issued_date" value="{{$passport->issued_date}}">
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.passport_place'):</label>
									<input class="input-main" type="text" name="passport_place_residence"
										value="{{$passport->place_residence}}" placeholder="">
								</div>
								<div class="section-checkbox-files">
									@if (!is_null($passport->pdf1) || !is_null($passport->pdf2))
									<div
										class="col-xl-8 col-lg-8 col-md-6 col-sm-6 section-input-wrap section-user-flex row">
										@if (!is_null($passport->pdf1))
										<div class="section-user-flex--item">
											<a class="section-user-files"
												href="/{{$passport->pdf1}}" target="_blank">
												<svg class="icon icon-pdf ">
													<use
														xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}">
													</use>
												</svg>
												<span id="pdf1_verify">
													{{substr(substr($passport->pdf1, 0, -20), 13)}}{{$passport->pdf1_extension}}
												</span>
											</a>
											<div class="section-user-files--more gogocar-arrow-button pdf-passport-menu">
												<svg class="icon icon-dots ">
													<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
												</svg>
												<div class="pdf-menu-options chat-container-option--archive chat-all-archive">
													<div class="section-tbody--modal--item verify-passport-pdf" data-user-id="{{$users->id}}" data-type="pdf1_verify">
														<img src="{{asset('admin/approved-signal.svg')}}" alt="" style="margin-right: 15px">
														@if($passport->pdf1_verify)
														<span>@lang('global.users.fields.verified')</span>
														@else
														<span>@lang('global.users.fields.confirm')</span>
														@endif
													</div>
													<div class="section-tbody--modal--item verify-passport-pdf-delete" data-user-id="{{$users->id}}" data-type="pdf1_verify">
														<svg class="icon icon-delete-red ">
															<use
																xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
															</use>
														</svg>
														<span>@lang('global.app_delete')</span>
													</div>
												</div>
											</div>
										</div>
										@endif
										@if (!is_null($passport->pdf2))
										<div class="section-user-flex--item">
											<a class="section-user-files"
												href="/{{$passport->pdf2}}" target="_blank">
												<svg class="icon icon-pdf ">
													<use
														xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}">
													</use>
												</svg>
												<span id="pdf2_verify">
													{{substr(substr($passport->pdf2, 0, -20), 13)}}{{$passport->pdf2_extension}}
												</span>
											</a>
											<div class="section-user-files--more gogocar-arrow-button pdf-passport-menu">
												<svg class="icon icon-dots ">
													<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
												</svg>
												<div class="pdf-menu-options chat-container-option--archive chat-all-archive">
													<div class="section-tbody--modal--item verify-passport-pdf" data-user-id="{{$users->id}}" data-type="pdf2_verify">
														<img src="{{asset('admin/approved-signal.svg')}}" alt="" style="margin-right: 15px">
														@if($passport->pdf2_verify)
														<span>@lang('global.users.fields.verified')</span>
														@else
														<span>@lang('global.users.fields.confirm')</span>
														@endif
													</div>
													<div class="section-tbody--modal--item verify-passport-pdf-delete" data-user-id="{{$users->id}}" data-type="pdf2_verify">
														<svg class="icon icon-delete-red ">
															<use
																xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
															</use>
														</svg>
														<span>@lang('global.app_delete')</span>
													</div>
												</div>
											</div>
										</div>
										@endif
									</div>
									@endif
									<div
										class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap justify-content-center mb-0">
										<div class="checkbox-input--tab__item">
											<div
												class="checkbox-input @if($passport->verified == true) {{ 'checked' }} @endif">
											</div>
											<input class="checkbox-input--tab" type="checkbox" name="passport_verified"
												@if($passport->verified == true) {{ 'checked' }} @endif><span>@lang('global.users.fields.passport_pass')</span>
										</div>
									</div>
								</div>
							@else
								<div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.passport_series'):</label>
									<input type="hidden" name="passport_id">
									<input class="input-main mask-seria" type="text" name="passport_series"
										placeholder="__ __">
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.number'):</label>
									<input class="input-main mask-number" type="text" name="passport_room"
										placeholder="__ __ __ __">
								</div>
								<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.depart_code'):</label>
									<input class="input-main mask-code" type="text" name="passport_department_code"
										placeholder="___-___">
								</div>
								<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.issued_by'):</label>
									<input class="input-main" type="text" name="passport_issued_by" placeholder="">
								</div>
								<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.issued_date'):</label>
									<input class="input-main calendar-passport calendar-zone-height text-left" type="text"
										name="passport_issued_date">
								</div>
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">
									<label>@lang('global.users.fields.passport_place'):</label>
									<input class="input-main" type="text" name="passport_place_residence" placeholder="">
								</div>
								
								{{-- <div class="section-checkbox-files">
									<div
										class="col-xl-8 col-lg-8 col-md-6 col-sm-6 section-input-wrap section-user-flex row">
									</div>
									<div
										class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap justify-content-center mb-0">
										<div class="checkbox-input--tab__item">
											<div class="checkbox-input"></div>
											<input class="checkbox-input--tab" type="checkbox"
												name="passport_verified"><span>Проверен</span>
										</div>
									</div>
								</div> --}}
								<div class="section-checkbox-files">
									{{-- <div class="col-xl-8 col-lg-8 col-md-6 col-sm-6 section-input-wrap section-user-flex row">
										<div class="section-user-flex--item"><a class="section-user-files" href="/">
											<svg class="icon icon-pdf ">
												<use xlink:href="{{asset('static/img/svg/symbol/admin_sprite.svg#pdf')}}"></use>
											</svg><span>Скан_паспорт_1.pdf</span></a>
											<div class="section-user-files--more gogocar-arrow-button">
											<svg class="icon icon-dots ">
												<use xlink:href="{{asset('static/img/svg/symbol/admin_sprite.svg#dots')}}"></use>
											</svg>
											</div>
										</div>
										<div class="section-user-flex--item"><a class="section-user-files" href="/">
											<svg class="icon icon-pdf ">
												<use xlink:href="{{asset('static/img/svg/symbol/admin_sprite.svg#pdf')}}"></use>
											</svg><span>Скан_паспорт_1.pdf</span></a>
											<div class="section-user-files--more gogocar-arrow-button">
											<svg class="icon icon-dots ">
												<use xlink:href="{{asset('static/img/svg/symbol/admin_sprite.svg#dots')}}"></use>
											</svg>
											</div>
										</div>
									</div> --}}
									
									<div
										class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap justify-content-center mb-0">
										<div class="checkbox-input--tab__item">
											<div
												class="checkbox-input ">
											</div>
											<input class="checkbox-input--tab" type="checkbox" name="passport_verified"
												><span>@lang('global.users.fields.passport_pass')</span>
										</div>
									</div>
								</div>
							@endif
						</div>
					</div>
				</div>
				<div class="section-footer-side">
					<div class="section-buttons--wrap">
						<button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_save')</button>
						<a href="{{ route('admin.users.index', app()->getLocale()) }}">
							<div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
						</a>
					</div>
				</div>
			</form>
			<form class="section-user--dropdown__wrap users-drive-rules @if($request->get('tab') == 'driver_license' ) active @endif" method="POST"
				action="{{ route("admin.users.edit_lisence", [app()->getLocale(), $users->id]) }}"
				id="edit_lisence_form" name="edit_lisence_form" accept-charset="UTF-8">
				{{ csrf_field() }}
				<div class="section-bottom-side">
					<div class="section-users-tab--content">
						<div class="section-inputs--wrapper row">
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.name'):</label>
								<input class="input-main" name="name" type="text" placeholder="Введите имя"
									value="{{$users->name}}" readonly>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.surname'):</label>
								<input class="input-main" name="surname" type="text" placeholder="Введите фамилию"
									value="{{$users->surname}}" readonly>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.fields.middlename'):</label>
								<input class="input-main" type="text" name="middle_name" placeholder="Введите отчество"
									value="{{$users->middle_name}}" readonly>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.edit.document_id'):</label>
								@if ($users->license)
								<input class="input-main" type="text" name="document_no"
									value="{{$users->license->document_no}}">
								<input type="hidden" name="lisence_id" value="{{$users->license->id}}">
								@else
								<input class="input-main" type="text" name="document_no">
								@endif
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
								<label>@lang('global.users.edit.category'):</label>
								<div class="section-select--input2 section-select--input__show justify-content-start">
									<div class="section-yellow-bg--wrap" id="category_box">
										@if ($users->license)
										@foreach ($users->license->lisence_categories as $item)
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
										@endif
									</div>
									<input type="hidden" id="cargotypes" name="categories"
										value="@if ($users->license)@foreach ($users->license->lisence_categories as $category) {{$category->title}}@endforeach @endif">
									<ul class="section-select--popup__list">
										@foreach ($categories as $item)
										<li class="section-select--popup__item hover-text-color">{{$item->title}}</li>
										@endforeach
									</ul>
								</div>
							</div>
							<div class="section-checkbox-files">
								@if (!is_null($users->license) && !is_null($users->license->pdf))
										<div
										class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-input-wrap section-user-flex row">
											<div class="section-user-flex--item">
												<a class="section-user-files"
													href="/{{$users->license->pdf}}" target="_blank">
													<svg class="icon icon-pdf ">
														<use
															xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}">
														</use>
													</svg>
													<span id="driver_license">
														{{substr(substr($users->license->pdf, 0, -20), 13)}}@if(!is_null($users->license)){{$users->license->pdf_extension}}@endif
													</span>
												</a>
												<div class="section-user-files--more gogocar-arrow-button pdf-passport-menu">
													<svg class="icon icon-dots ">
														<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
													</svg>
													<div class="pdf-menu-options chat-container-option--archive chat-all-archive">
														<div class="section-tbody--modal--item verify-passport-pdf" data-user-id="{{$users->id}}" data-type="driver_license">
															<img src="{{asset('admin/approved-signal.svg')}}" alt="" style="margin-right: 15px">
															@if($users->license->verified)
															<span>@lang('global.users.fields.verified')</span>
															@else
															<span>@lang('global.users.fields.confirm')</span>
															@endif
														</div>
														<div class="section-tbody--modal--item verify-passport-pdf-delete" data-user-id="{{$users->id}}" data-type="driver_license">
															<svg class="icon icon-delete-red ">
																<use
																	xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
																</use>
															</svg>
															<span>@lang('global.app_delete')</span>
														</div>
													</div>
												</div>
											</div>
										</div>
								@endif
								<div
									class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap justify-content-center mb-0">
									<div class="checkbox-input--tab__item">
										@if ($users->license)
											@if (!is_null($users->license->pdf))
											<div
												class="checkbox-input @if($users->license->verified == true) {{ 'checked' }} @endif">
											</div>
											<input class="checkbox-input--tab" type="checkbox" name="lisence_verified"
												@if($users->license->verified == true) {{ 'checked' }} @endif>
												<span>@lang('global.users.edit.verify')</span>
											@else
											<div class="checkbox-input @if($users->license->verified == true) {{ 'checked' }} @endif"></div>
											<input class="checkbox-input--tab opopop" type="checkbox"
												name="lisence_verified" @if($users->license->verified == true) {{ 'checked' }} @endif><span>Проверен</span>
											@endif
										@else
										<div class="checkbox-input"></div>
										<input class="checkbox-input--tab" type="checkbox"
											name="lisence_verified"><span>Проверен</span>
										@endif
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="section-footer-side">
					<div class="section-buttons--wrap">
						<button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_save')</button>
						<a href="{{ route('admin.users.index', app()->getLocale()) }}">
							<div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
						</a>
					</div>
				</div>
			</form>
			<form class="section-user--dropdown__wrap users-auto @if($request->get('tab') == 'auto' ) active @endif" method="POST"
				action="{{ route("admin.users.edit_car", [app()->getLocale(), $users->id]) }}" id="edit_car_form"
				name="edit_car_form" accept-charset="UTF-8" onSubmit="return checkform()">
				{{ csrf_field() }}
				<div class="section-bottom-side">
					<div class="section-users-tab--content">
						<div class="section-car-tabs--list row">
							@foreach ($cars as $key => $item)
							<div class="section-car-tabs--item @php if($key == 0) echo" active"; @endphp"
								data-car="user-auto-{{$key+1}}">
								@lang('global.users.edit.car_id'){{$key+1}}</div>
							@endforeach
							<div class="section-car-tabs-added">@lang('global.users.edit.add_car')</div>
						</div>
						<div class="section-car-tab--inputs">
							@foreach ($cars as $key => $item)
							<div class="section-inputs--wrapper section-car-tab--list user-auto-{{$key+1}} @php if($key == 0) echo"
								active"; @endphp row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.brand'):</label>
									{{-- <div class="section-select--input2 section-select--input__show"> --}}
										<input type="hidden" name="car_id{{$key+1}}" value="{{$item->id}}">
										{{-- <input class="input-main" name="name{{$key+1}}" type="text" id="name{{$key+1}}"
											minlength="1" maxlength="255" value="{{$item->name}}"
											placeholder="Enter name here..."> --}}
											<select class="input-main select2 car-brand" name="name{{$key+1}}" id="name{{$key+1}}" data-key="{{$key+1}}">
											<option value="" selected disabled>@lang('global.users.edit.not_selected')</option>
											@foreach ($brands as $user)
											<option value="{{ $user->name }}" @if ($item->name == $user->name){{'selected'}}@endif data-brand-id="{{$user->id}}">
												{{ $user->name }}
											</option>
											@endforeach
										</select>
									{{-- </div> --}}
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.model'):</label>
										<select class="input-main select2" name="model{{$key+1}}" id="model{{$key+1}}" >
											<option value="" selected disabled>@lang('global.users.edit.not_selected')</option>
											@foreach ($models as $user)
											<option value="{{ $user->name }}" @if ($item->model == $user->name){{'selected'}}@endif>
												{{ $user->name }}
											</option>
											@endforeach
										</select>
									{{-- </div> --}}
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.color'):</label>
								<div class="section-select--input2 section-select--input__show">
									<span class="color_part">
										<div style="background-color: {{$item->color}}">{{$item->color}}</div>
									</span>
									<input type="hidden" name="color{{$key+1}}" id="color{{$key+1}}" value="{{$item->color}}" >
									<div class="section-select--popup__icon">
										<svg class="icon icon-arrow-down-white ">
											<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
										</svg>
									</div>
									<ul class="section-select--popup__list section-select--popup__list__show">
										<li class="section-select--popup__item3 hover-text-color click_color" data-type='' data-key='{{$key+1}}'>Not Selected</li>
									@foreach ($colors as $user)
										<li class="section-select--popup__item3 hover-text-color click_color" data-type="{{$user->color}}" data-key='{{$key+1}}'><div style="background-color: {{$user->color}}">{{$user->color}}</div></li>
									@endforeach
									</ul>
								</div>
									{{-- </div> --}}
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.year'):</label>
									<div class="section-select--input2 section-select--input__show">
										<input class="input-main" name="year{{$key+1}}" type="text" id="year{{$key+1}}"
											minlength="1" value="{{$item->year}}" placeholder="Enter year here..." >
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.type'):</label>
									{{-- <div class="section-select--input2 section-select--input__show">
										<input class="input-main" name="type{{$key+1}}" type="text" id="type{{$key+1}}"
											minlength="1" value="{{$item->type}}" placeholder="Enter type here...">
									</div> --}}
									<select class="input-main select2" name="type{{$key+1}}" id="type{{$key+1}}" >
										<option value="" selected disabled>@lang('global.users.edit.not_selected')</option>
										<option value="Хэтчбек" @if ($item->body_type == 'Хэтчбек'){{'selected'}}@endif>Хэтчбек</option>
										<option value="Седан" @if ($item->body_type == 'Седан'){{'selected'}}@endif>Седан</option>
										<option value="Кабриолет" @if ($item->body_type == 'Кабриолет'){{'selected'}}@endif>Кабриолет</option>
										<option value="Универсал" @if ($item->body_type == 'Универсал'){{'selected'}}@endif>Универсал</option>
										<option value="Кроссовер" @if ($item->body_type == 'Кроссовер'){{'selected'}}@endif>Кроссовер</option>
										<option value="Минивен" @if ($item->body_type == 'Минивен'){{'selected'}}@endif>Минивен</option>
									</select>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.number'):</label>
									<div class="section-select--input2 section-select--input__show">
										<input class="input-main" name="number{{$key+1}}" type="text"
											id="number{{$key+1}}" value="{{$item->number}}"
											placeholder="Enter number here..." >
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="section-footer-side">
					<div class="section-buttons--wrap">
						<input type="hidden" value="{{count($cars)}}" name="car_count" id="car_count">
						<button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_save')</button>
						<a href="{{ route('admin.users.index', app()->getLocale()) }}">
							<div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
						</a>
					</div>
				</div>
			</form>
			<form class="section-user--dropdown__wrap users-cargo-car @if($request->get('tab') == 'truck' ) active @endif" method="POST"
				action="{{ route("admin.users.edit_truck", [app()->getLocale(), $users->id]) }}" id="edit_truck_form"
				name="edit_truck_form" accept-charset="UTF-8" onSubmit="return checkform2()">
				{{ csrf_field() }}
				<div class="section-bottom-side">
					<div class="section-users-tab--content">
						<div class="section-car-tabs--list2 row">
							@foreach ($trucks as $key => $item)
							<div class="section-car-tabs--item2 @php if($key == 0) echo" active"; @endphp"
								data-car-cargo="user-auto-cargo-{{$key+1}}">@lang('global.users.edit.car_id'){{$key+1}}</div>
							@endforeach
							<div class="section-car-tabs-added2">@lang('global.users.edit.add_car')</div>
						</div>
						<div class="section-car-tab--inputs2">
							@foreach ($trucks as $key => $item)
							<div class="section-inputs--wrapper section-car-tab--list2 user-auto-cargo-{{$key+1}} @php if($key == 0) echo"
								active"; @endphp row">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.brand'):</label>
									{{-- <div class="section-select--input2 section-select--input__show"> --}}
										<input type="hidden" name="truck_id{{$key+1}}" value="{{$item->id}}">
										{{-- <input class="input-main" name="name{{$key+1}}" type="text" id="name" minlength="1"
											maxlength="255" value="{{$item->name}}" placeholder="Enter name here..."> --}}
										<select class="input-main select2 car-brand" name="name{{$key+1}}" id="truck_name{{$key+1}}" data-key="{{$key+1}}">
											<option value="" selected disabled>@lang('global.users.edit.not_selected')</option>
											@foreach ($brands as $user)
											<option value="{{ $user->name }}" @if ($item->name == $user->name){{'selected'}}@endif data-brand-id="{{$user->id}}">
												{{ $user->name }}
											</option>
											@endforeach
										</select>
									{{-- </div> --}}
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.model'):</label>
										<select class="input-main select2" name="model{{$key+1}}" id="truck_model{{$key+1}}">
											<option value="" selected disabled>@lang('global.users.edit.not_selected')</option>
											@foreach ($models as $user)
											<option value="{{ $user->name }}" @if ($item->model == $user->name){{'selected'}}@endif>
												{{ $user->name }}
											</option>
											@endforeach
										</select>
									{{-- </div> --}}
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.year'):</label>
									<div class="section-select--input2 section-select--input__show">
										<input class="input-main" name="year{{$key+1}}" type="text" id="truck_year{{$key+1}}" minlength="1"
											value="{{$item->year}}" placeholder="Enter year here..." >
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.color'):</label>
									<div class="section-select--input2 section-select--input__show"><span class="color_part"><div style="background-color: {{$item->color}}">{{$item->color}}</div></span>
										<input type="hidden" name="color{{$key+1}}" id="color_truck{{$key+1}}" value="{{$item->color}}">
										<div class="section-select--popup__icon">
											<svg class="icon icon-arrow-down-white ">
												<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
											</svg>
										</div>
										<ul class="section-select--popup__list section-select--popup__list__show">
											<li class="section-select--popup__item3 hover-text-color click_color_truck" data-type='' data-key='{{$key+1}}'>Not Selected</li>
										@foreach ($colors as $user)
											<li class="section-select--popup__item3 hover-text-color click_color_truck" data-type="{{$user->color}}" data-key='{{$key+1}}'><div style="background-color: {{$user->color}}">{{$user->color}}</div></li>
										@endforeach
										</ul>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.body_type'):</label>
									{{-- <div class="section-select--input2 section-select--input__show"> --}}
										<select class="input-main select2" id="truck_body_type_id{{$key+1}}" name="body_type_id{{$key+1}}" >
											<option value="" style="display: none;" disabled selected>Select body type</option>
											@foreach ($body_types as $bodyType)
											<option value="{{ $bodyType->id }}"
												{{ $item->body_type_id == $bodyType->id ? 'selected' : '' }}>
												{{ $bodyType->name }}
											</option>
											@endforeach
										</select>
									{{-- </div> --}}
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.number'):</label>
									<div class="section-select--input2 section-select--input__show">
										<input class="input-main" name="number{{$key+1}}" type="text" id="truck_number{{$key+1}}"
											value="{{$item->number}}" placeholder="Enter number here..." >
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.capacity'):</label>
									<div class="section-select--input2 section-select--input__show">
										<input class="input-main" name="capacity{{$key+1}}" type="number" id="truck_capacity{{$key+1}}"
											minlength="1" value="{{$item->capacity}}" placeholder="Enter capacity here..." >
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.place'):</label>
									<div class="section-select--input2 section-select--input__show">
										<input class="input-main" name="place{{$key+1}}" type="number" id="truck_place{{$key+1}}" minlength="1"
											value="{{$item->place}}" placeholder="Enter place here..." >
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">
									<label>@lang('global.users.edit.max_size'):</label>
									<div class="section-select--input2 section-select--input__show">
										<input class="input-main" name="max_size{{$key+1}}" type="number" id="max_size{{$key+1}}"
											minlength="1" value="{{$item->max_size}}" placeholder="Enter max size here..." >
									</div>
								</div>
				</div>
				@endforeach
				
				</div>
				</div>
				</div>
				<div class="section-footer-side">
					<div class="section-buttons--wrap">
						<input type="hidden" value="{{count($trucks)}}" name="truck_count" id="truck_count">
						<button class="section-button--yellow w-100px mr-3" type="submit">@lang('global.app_save')</button>
						<a href="{{ route('admin.users.index', app()->getLocale()) }}">
							<div class="section-button--gray w-100px">@lang('global.app_cancel')</div>
						</a>
					</div>
				</div>
			</form>
			<div class="section-user--dropdown__wrap users-balance @if($request->get('tab') == 'balance' ) active @endif">
				<div class="section-bottom-side">
					<div class="section-users-balance--content">
						<div class="section-users-balance--left">
							<div class="section-users-balance--title">@lang('global.users.edit.balance'):</div>
							<div class="section-users-balance--count">{{$users->balance}} UZS</div>
						</div>
						<div class="section-users-balance--right">
							<div class="section-users-balance--plus section-users-balance--icon" data-toggle="modal"
								data-target="#popup-add">
								<svg class="icon icon-money-bag ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#money-bag')}}"></use>
								</svg>
							</div>
							<div class="section-users-balance--minus section-users-balance--icon" data-toggle="modal"
								data-target="#popup-rem">
								<svg class="icon icon-money-bag ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#money-bag')}}"></use>
								</svg>
							</div>
						</div>
					</div>
				</div>
				<div class="padding-30">
					<div class="filter-main box-bg2">
						<div class="section-top-side">
							<div class="section-block--title">@lang('global.filter_name')</div>
							<div class="filter-side--right">
								<div class="filter-show-and-hide gogocar-arrow-button">
									<svg class="icon icon-arrow-down-white ">
										<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
									</svg>
								</div>
							</div>
						</div>
						<div class="section-bottom-side filter-balance-bottom row m-0 box-bg2">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
								<label>@lang('global.users.edit.state'):</label>
								<input type="hidden" id="user_id" value="{{$users->id}}">
								<div class="section-select--input2 section-select--input__show"><span>@lang('global.not_set')</span>
									<input type="hidden" id="transaction_status" value="">
									<div class="section-select--popup__icon">
										<svg class="icon icon-arrow-down-white ">
											<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
										</svg>
									</div>
									<ul class="section-select--popup__list section-select--popup__list__show">
										<li class="section-select--popup__item2 hover-text-color click_status" data-type="">@lang('global.all')</li>
										<li class="section-select--popup__item2 hover-text-color click_status" data-type="released">@lang('global.release')
										</li>
										<li class="section-select--popup__item2 hover-text-color click_status" data-type="pending">@lang('global.pending')
										</li>
									</ul>
								</div>
							</div>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
								<label>@lang('global.users.fields.operation_type'):</label>
								<div class="section-select--input2 section-select--input__show"><span>@lang('global.not_set')</span>
									<input type="hidden" id="transaction_method" value="">
									<div class="section-select--popup__icon">
										<svg class="icon icon-arrow-down-white ">
											<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
										</svg>
									</div>
									<ul class="section-select--popup__list section-select--popup__list__show">
										<li class="section-select--popup__item2 hover-text-color click_method" data-type="">@lang('global.all')</li>
										<li class="section-select--popup__item2 hover-text-color click_method" data-type="paypal">Paypal
										</li>
										<li class="section-select--popup__item2 hover-text-color click_method" data-type="UClick">UClick
										</li>
									</ul>
								</div>
							</div>
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap pl-0">
								<label>@lang('global.interval'):</label>
								<div class="section-select--input2 section-select--input__show section-select-calendar"><span>@lang('global.not_set')</span>
									<input type="hidden" id="selected_period" value="">
									<div class="section-select--popup__icon">
										<svg class="icon icon-arrow-down-white ">
											<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
										</svg>
									</div>
									<ul class="section-select--popup__list section-select--popup__list__show">
										<li class="section-select--popup__item2 hover-text-color click_period" data-type="day"
											data-calendar-selector="calendar-selector-day">
											@lang('global.day')</li>
										<li class="section-select--popup__item2 hover-text-color click_period" data-type="month"
											data-calendar-selector="calendar-selector-month">
											@lang('global.month')</li>
										<li class="section-select--popup__item2 hover-text-color click_period" data-type="year"
											data-calendar-selector="calendar-selector-year">
											@lang('global.year')</li>
									</ul>
								</div>
							</div>
							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-balance-filter--date p-0">
								<label>@lang('global.date'):</label>
								<div class="section-balance-filter--date__wrap">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
										<div class="section-balance-filter-date__wrap">
											<input
												class="input-main calendar-filter-transaction calendar-zone-height calendar-selector-data"
												type="text" id="to_date">
											<div class="section-balance-date--icon">
												<svg class="icon icon-calendar ">
													<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#calendar')}}"></use>
												</svg>
											</div>
										</div>
									</div>
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
										<div class="section-balance-filter-date__wrap">
											<input
												class="input-main calendar-filter-transaction calendar-zone-height calendar-selector-data"
												type="text" id="from_date">
											<div class="section-balance-date--icon">
												<svg class="icon icon-calendar ">
													<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#calendar')}}"></use>
												</svg>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="padding-30 section-content-main--table">
					<div class="section-content--main__wrap box-bg2">
						<div class="section-content--main table-content">
							@include('admin.users.transaction_template')
						</div>
					</div>
				</div>
				<section class="section-balance--filter">
					<div class="filter-main box-bg2">
						<div class="section-top-side">
							<div class="section-block--title">@lang('global.filter_name')</div>
							<div class="filter-side--right">
							<div class="filter-show-and-hide gogocar-arrow-button">
								<svg class="icon icon-arrow-down-white ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
								</svg>
							</div>
						</div>
					</div>
					<div class="section-bottom-side filter-balance-bottom row m-0">
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
							<label>@lang('global.users.edit.state'):</label>
							<input type="hidden" id="user_id" value="{{$users->id}}">
							<div class="section-select--input2 section-select--input__show"><span>@lang('global.not_set')</span>
								<input type="hidden" id="transaction_status" value="">
								<div class="section-select--popup__icon">
									<svg class="icon icon-arrow-down-white ">
										<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
									</svg>
								</div>
								<ul class="section-select--popup__list section-select--popup__list__show">
									<li class="section-select--popup__item2 hover-text-color click_status" data-type="">@lang('global.all')</li>
									<li class="section-select--popup__item2 hover-text-color click_status" data-type="released">@lang('global.release')
									</li>
									<li class="section-select--popup__item2 hover-text-color click_status" data-type="pending">@lang('global.pending')
									</li>
								</ul>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
							<label>@lang('global.users.fields.operation_type'):</label>
							<div class="section-select--input2 section-select--input__show"><span>@lang('global.not_set')</span>
								<input type="hidden" id="transaction_method" value="">
								<div class="section-select--popup__icon">
									<svg class="icon icon-arrow-down-white ">
										<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
									</svg>
								</div>
								<ul class="section-select--popup__list section-select--popup__list__show">
									<li class="section-select--popup__item2 hover-text-color click_method" data-type="">@lang('global.all')</li>
									<li class="section-select--popup__item2 hover-text-color click_method" data-type="paypal">Paypal
									</li>
									<li class="section-select--popup__item2 hover-text-color click_method" data-type="UClick">UClick
									</li>
								</ul>
							</div>
						</div>
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 section-input-wrap pl-0">
							<label>@lang('global.interval'):</label>
							<div class="section-select--input2 section-select--input__show section-select-calendar"><span>@lang('global.not_set')</span>
								<input type="hidden" id="selected_period" value="">
								<div class="section-select--popup__icon">
									<svg class="icon icon-arrow-down-white ">
										<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
									</svg>
								</div>
								<ul class="section-select--popup__list section-select--popup__list__show">
									<li class="section-select--popup__item2 hover-text-color click_period" data-type="day"
										data-calendar-selector="calendar-selector-day">
										@lang('global.day')</li>
									<li class="section-select--popup__item2 hover-text-color click_period" data-type="month"
										data-calendar-selector="calendar-selector-month">
										@lang('global.month')</li>
									<li class="section-select--popup__item2 hover-text-color click_period" data-type="year"
										data-calendar-selector="calendar-selector-year">
										@lang('global.year')</li>
								</ul>
							</div>
						</div>
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-balance-filter--date p-0">
							<label>@lang('global.date'):</label>
							<div class="section-balance-filter--date__wrap">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
									<div class="section-balance-filter-date__wrap">
										<input
											class="input-main calendar-filter-transaction calendar-zone-height calendar-selector-data"
											type="text" id="to_date">
										<div class="section-balance-date--icon">
											<svg class="icon icon-calendar ">
												<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#calendar')}}"></use>
											</svg>
										</div>
									</div>
								</div>
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
									<div class="section-balance-filter-date__wrap">
										<input
											class="input-main calendar-filter-transaction calendar-zone-height calendar-selector-data"
											type="text" id="from_date">
										<div class="section-balance-date--icon">
											<svg class="icon icon-calendar ">
												<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#calendar')}}"></use>
											</svg>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</section>
				<section class="section3 section-content-main-mobile--table">
					<div class="section-content--main-mobile__wrap">
						<div class="section-content--main box-bg2 pb-20px table-content-mobile">
							@include('admin.users.transaction_template_mobile')
						</div>
					</div>
				</section>
			</div>
			<div class="section-user--dropdown__wrap users-chat @if($request->get('tab') == 'chat' ) active @endif">
				<div class="padding-30">
					<div id="admin_app">
						<admin-com 
							v-bind:msg="{{ json_encode($messages_dates) }}"
							v-bind:msgtoday="{{ json_encode($today_messages) }}"
							v-bind:receiver="{{ json_encode($users) }}"
							backlink="{{route('admin.users.index', app()->getLocale())}}" 
							archiveadmin="{{$archive}}"
							type="admin">
						</admin-com>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="modal fade" id="popup-add" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form class="modal-content" method="POST"
			action="{{ route("admin.users.replenish", [app()->getLocale(), $users->id]) }}" id="replenish_users_form"
			name="replenish_users_form" accept-charset="UTF-8" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="popup-header">
				<div class="popup-close--icon close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#close')}}"></use>
					</svg>
				</div>
				<h3 class="popup-title">@lang('global.users.edit.balance_replenishment')</h3>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap popup-input--wrap p-0">
				<label>@lang('global.users.edit.amount'):</label>
				<input class="input-main" type="number" placeholder="Введите сумму" name="amount" required>
			</div>
			<div class="popup-balance--buttons row">
				<div class="popup-balance--button">1000</div>
				<div class="popup-balance--button">5000</div>
				<div class="popup-balance--button">10000</div>
				<div class="popup-balance--button">20000</div>
				<div class="popup-balance--button">50000</div>
				<div class="popup-balance--button">100000</div>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap popup-input--wrap p-0">
				<label>@lang('global.users.edit.comment'):</label>
				<textarea class="textarea-input" placeholder="Комментарий..." cols="4" rows="3" name="comment"></textarea>
			</div>
			<div class="popup-balance-checkboxes">
				<div class="popup-balance-checkbox--wrap">
					<div class="popup-balance-checkbox"></div>
					<input class="popup-balance-checkbox__input" for="type" type="checkbox" name="type[]" value="Пополнение баланса"><span>Пополнение баланса</span>
				</div>
				<div class="popup-balance-checkbox--wrap">
					<div class="popup-balance-checkbox"></div>
					<input class="popup-balance-checkbox__input" for="type" type="checkbox" name="type[]" value="Бонус к балансу"><span>Бонус к балансу</span>
				</div>
				<div class="popup-balance-checkbox--wrap">
					<div class="popup-balance-checkbox"></div>
					<input class="popup-balance-checkbox__input" for="type" type="checkbox" name="type[]" value="Бонус по промокоду"><span>Бонус по промокоду</span>
				</div>
			</div>
			<div class="popup-section-button">
				<div class="section-button--gray close" data-dismiss="modal" aria-label="Close">@lang('global.app_cancel')</div>
				<button class="section-button--yellow" type="submit">@lang('global.app_apply')</button>
			</div>
		</form>
	</div>
</div>
<div class="modal fade" id="popup-rem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<form class="modal-content" method="POST"
			action="{{ route("admin.users.withdraw", [app()->getLocale(), $users->id]) }}" id="withdraw_users_form"
			name="withdraw_users_form" accept-charset="UTF-8" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="popup-header">
				<div class="popup-close--icon close" data-dismiss="modal" aria-label="Close">
					<svg class="icon icon-close ">
						<use xlink:href="static/img/svg/symbol/sprite.svg#close"></use>
					</svg>
				</div>
				<h3 class="popup-title">@lang('global.users.edit.magazine_with')</h3>
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap popup-input--wrap p-0">
				<label>@lang('global.users.edit.amount'):</label>
				<input class="input-main" type="number" placeholder="Введите сумму" name="amount" max="{{ $users->balance }}">
			</div>
			<div class="popup-balance--buttons row">
				@if($users->balance > 1000)
					<div class="popup-balance--button pb-red">1000</div>
				@endif
				@if($users->balance > 5000)
					<div class="popup-balance--button pb-red">5000</div>
				@endif
				@if($users->balance > 10000)
					<div class="popup-balance--button pb-red">10000</div>
				@endif
				@if($users->balance > 20000)
					<div class="popup-balance--button pb-red">20000</div>
				@endif
				@if($users->balance > 50000)
					<div class="popup-balance--button pb-red">50000</div>
				@endif
				@if($users->balance > 100000)
					<div class="popup-balance--button pb-red">100000</div>
				@endif
			</div>
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap popup-input--wrap p-0">
				<label>@lang('global.users.edit.comment'):</label>
				<textarea class="textarea-input" placeholder="Комментарий..." cols="4" rows="3" name="comment"></textarea>
			</div>
			<div class="popup-balance-checkboxes">
				<div class="popup-balance-checkbox--wrap">
					<div class="popup-balance-checkbox pbc-red"></div>
					<input class="popup-balance-checkbox__input" for="type" name="type[]" type="checkbox" value="Списание с баланса"><span>Списание с баланса</span>
				</div>
				<div class="popup-balance-checkbox--wrap">
					<div class="popup-balance-checkbox pbc-red"></div>
					<input class="popup-balance-checkbox__input" for="type" name="type[]" type="checkbox" value="Штраф"><span>Штраф</span>
				</div>
			</div>
			<div class="popup-section-button">
				<div class="section-button--gray close" data-dismiss="modal" aria-label="Close">@lang('global.app_cancel')</div>
				<button class="section-button--yellow section-button--red" type="submit">@lang('global.app_apply')</button>
			</div>
		</form>
	</div>
</div>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')
<script src="{{ url('adminlte/js') }}/select2.full.min.js" defer></script>
<script>

	function checkform(){
		// alert('dd');
		let validate = true;
		$('#edit_car_form select').each(function(){
			// console.log('select', $(this).val());
			if ($(this).val() === null) {
				alert("You should input all car info");
				validate = false;
				return false;
			}
		})
		$('#edit_car_form input[type=text]').each(function(){
			if ($(this).val() == "") {
				alert("You should input all car info");
				validate = false;
				return false;
			}
		})
		return validate;
	}

	function checkform2(){
		// alert('dd');
		let validate = true;
		$('#edit_truck_form select').each(function(){
			// console.log('select', $(this).val());
			if ($(this).val() === null) {
				alert("You should input all car info");
				validate = false;
				return false;
			}
		})
		$('#edit_truck_form input[type=text]').each(function(){
			if ($(this).val() == "") {
				alert("You should input all car info");
				validate = false;
				return false;
			}
		})
		return validate;
	}

	$(document).ready(function () {

		$('.verify-passport-pdf').click(function(){
			let user_id = $(this).data('user-id');
			let type = $(this).data('type');
			$.ajax({
				type:'POST',
				headers: {
					'X-CSRF-TOKEN': _token
				},
				url: "{{ route('admin.users.verify_pdf', app()->getLocale()) }}",
				data: {
					user_id: user_id,
					type: type
				},
				success: (data) => {
					$(this).children('span').html("@lang('global.users.fields.verified')");
				},
				error: function(data){
					console.log(data);
				}
			});
		})

		$('.verify-passport-pdf-delete').click(function(){
			let user_id = $(this).data('user-id');
			let type = $(this).data('type');
			$.ajax({
				type:'POST',
				headers: {
					'X-CSRF-TOKEN': _token
				},
				url: "{{ route('admin.users.verify_pdf_delete', app()->getLocale()) }}",
				data: {
					user_id: user_id,
					type: type
				},
				success: (data) => {
					$('#' + type).hide();
					$(this).parents('.section-user-flex--item').children('.section-user-files span').hide();
					// $(this).children('span').html("@lang('global.users.fields.verified')");
				},
				error: function(data){
					console.log(data);
				}
			});
		})

		 $('.section-delete__img').click(function () {
			// $('#edit_users_form #user-photo').remove();
			$('#edit_users_form #user-photo').prop("value", "");
			$('.section-user--dropdown__img--zone').removeAttr('style');
		});

        window._token = '{{ csrf_token() }}';
        $('.select2').select2();
          // ======================= add tabs cars ==================//
		$(function () {
			$('.section-car-tabs--item').click(checkboxInput);
	
			function checkboxInput() {
				var tabs = $(this).attr('data-car');
				$(this).addClass('active').siblings().removeClass('active');
				$('.section-car-tab--list.' + tabs).addClass('active').siblings().removeClass('active');
			}
	
			var i = $(".section-car-tabs--item[data-car]").length + 1;
	
			$('.section-car-tabs-added').click(tabsAdded);
	
			function tabsAdded() {
				var count = i++;
				var car_last_id = $('#edit_car_form .car-brand').last().data('key');
				var new_id = parseInt(car_last_id) + 1;
				console.log('car_last_id', car_last_id);
				$('.section-car-tabs--list').append('<div class="section-car-tabs--item" data-car="user-auto-' + count + '">Авто №' + count + '</div>');
				$('.section-car-tab--inputs').append(
					'<div class="section-inputs--wrapper section-car-tab--list user-auto-' + count + ' row">' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Name:</label>' +
					'<input type="hidden" name="car_id' + count + '"/>' +
					// '<input class="input-main" type="text" name="name' + count + '" placeholder="Enter name here..."/>' +
					'<select class="input-main select2 car-brand" name="name' + count + '" id="name'+ new_id + '" data-key="'+ new_id + '"  >' +
					'<option value="" selected disabled>@lang('global.users.edit.not_selected')</option>' +
					'@foreach ($brands as $user)' +
					'<option value="{{ $user->name }}" data-brand-id="{{$user->id}}">{{ $user->name }}</option>' +
					'@endforeach' +
					'</select>' +
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Model:</label>' +
					// '<input class="input-main" type="text" name="model' + count + '" placeholder="Enter model here..."/>'+
					'<select class="input-main select2" name="model' + count + '" id="model'+ new_id + '">'+
					'<option value="" selected disabled>@lang('global.users.edit.not_selected')</option>'+
					'@foreach ($models as $user)'+
					'<option value="{{ $user->name }}">'+
					'{{ $user->name }}</option>@endforeach</select>'+
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Color:</label>' +
					// '<input class="input-main" type="text" name="color' + count + '" placeholder="Enter color here..."/>' +
					'<div class="section-select--input2 section-select--input__show click_list"><span class="color_part">Not Selected</span>' +
					'<input type="hidden" name="color' + count + '" id="color' + count + '" />' +
					'<div class="section-select--popup__icon">' +
					'<svg class="icon icon-arrow-down-white ">' +
					'<use xlink:href="{{asset("static/img/svg/symbol/sprite_admin.svg#arrow-down-white")}}"></use>' +
					'</svg>' +
					'</div>' +
					'<ul class="section-select--popup__list section-select--popup__list__show">' +
					'<li class="section-select--popup__item3 hover-text-color click_color" data-type="" data-key=' + count + '>Not Selected</li>' +
					'@foreach ($colors as $user)' +
					'<li class="section-select--popup__item3 hover-text-color click_color" data-type="{{$user->color}}" data-key=' + count + '><div style="background-color: {{$user->color}}">{{$user->color}}</div></li>' +
					'@endforeach' +
					'</ul>' +
					'</div>' +
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Year:</label>' +
					'<input class="input-main" type="text" name="year' + count + '" placeholder="Enter year here..." />' +
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Type:</label>' +
					// '<input class="input-main" type="text" name="type' + count + '" placeholder="Enter type here..."/>' +
					'<select class="input-main select2" name="type' + count + '" placeholder="Enter type here..." >' +
					'<option value="" selected disabled>@lang('global.users.edit.not_selected')</option>' +
					'<option value="Хэтчбек">Хэтчбек</option>' +
					'<option value="Седан">Седан</option>' +
					'<option value="Кабриолет">Кабриолет</option>' +
					'<option value="Универсал">Универсал</option>' +
					'<option value="Кроссовер">Кроссовер</option>' +
					'<option value="Минивен">Минивен</option>' +
					'</select>' +
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Number:</label>' +
					'<input class="input-main" type="text" name="text' + count + '" placeholder="Enter number here..." />' +
					'</div>' +
					'</div>');
                  // $('.section-car-tab--inputs').append(
                  //     '<div class="section-inputs--wrapper section-car-tab--list user-auto-' + count + ' row">' +
                  //     '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
                  //     '<label>Марка:</label>' +
                  //     '<input class="input-main" type="text" placeholder="Введите марку машины"/>' +
                  //     '</div>' +
                  //     '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
                  //     '<label>Модель:</label>' +
                  //     '<input class="input-main" type="text" placeholder="Введите модель машины"/>'+
                  //     '</div>' +
                  //     '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
                  //     '<label>Кузов:</label>' +
                  //     '<input class="input-main" type="text" placeholder="Введите кузов машины"/>' +
                  //     '</div>' +
                  //     '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
                  //     '<label>Цвет:</label>' +
                  //     '<input class="input-main" type="text" placeholder="Введите цвет машины"/>' +
                  //     '</div>' +
                  //     '</div>');
				$(".section-car-tabs--item:last-child").after($(".section-car-tabs-added"));
				$("#car_count").val(count);
				$('.select2').select2();
	
				var x = document.getElementsByClassName("section-car-tabs--item")
				if (x.length > 0)
					for (let item of x)
						item.addEventListener("click", checkboxInput);
			}
		});
			// *********************************************************//
		
			// ======================= add tabs cars ==================//
		$(function () {
			$('.section-car-tabs--item2').click(checkboxInputCargo);
	
			function checkboxInputCargo() {
				var tabs = $(this).attr('data-car-cargo');
				$(this).addClass('active').siblings().removeClass('active');
				$('.section-car-tab--list2.' + tabs).addClass('active').siblings().removeClass('active');
			}
	
			var i = $(".section-car-tabs--item2[data-car-cargo]").length + 1;
	
			$('.section-car-tabs-added2').click(tabsAddedCargo);
	
			function tabsAddedCargo() {
				var count = i++;
				var car_last_id = $('#edit_truck_form .car-brand').last().data('key');
				var new_id = parseInt(car_last_id) + 1;

				$('.section-car-tabs--list2').append('<div class="section-car-tabs--item2" data-car-cargo="user-auto-cargo-' + count + '">Авто №' + count + '</div>');
				$('.section-car-tab--inputs2').append(
					'<div class="section-inputs--wrapper section-car-tab--list2 user-auto-cargo-' + count + ' row">' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Brand:</label>' +
					'<input type="hidden" name="truck_id' + count + '"/>' +
					// '<input class="input-main" type="text" name="name' + count + '" placeholder="Введите марку машины"/>' +
					'<select class="input-main select2 car-brand" name="name' + count + '" required id="name'+ new_id + '" data-key="'+ new_id + '">' +
					'<option value="" selected disabled>@lang('global.users.edit.not_selected')</option>' +
					'@foreach ($brands as $user)' +
					'<option value="{{ $user->name }}" data-brand-id="{{$user->id}}">' +
					'{{ $user->name }}' +
					'</option>' +
					'@endforeach' +
					'</select>' +
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Model:</label>' +
					// '<input class="input-main" type="text" name="model' + count + '" placeholder="Введите модель машины"/>' +
					'<select class="input-main select2" name="model' + count + '" required id="truck_model'+ new_id + '">' +
					'<option value="" selected disabled>@lang('global.users.edit.not_selected')</option>' +
					'@foreach ($models as $user)' +
					'<option value="{{ $user->name }}">' +
					'{{ $user->name }}</option>@endforeach</select>' +
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Year:</label>' +
					'<input class="input-main" type="number" min="1900" max="2021" name="year' + count + '" placeholder="Введите кузов машины" required/>' +
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Color:</label>' +
					// '<input class="input-main" type="text" name="color' + count + '" placeholder="Введите цвет машины" required />' +
					'<div class="section-select--input2 section-select--input__show click_list"><span class="color_part">Not Selected</span>' +
					'<input type="hidden" name="color' + count + '" id="color_truck' + count + '"/>' +
					'<div class="section-select--popup__icon">' +
					'<svg class="icon icon-arrow-down-white ">' +
					'<use xlink:href="{{asset("static/img/svg/symbol/sprite_admin.svg#arrow-down-white")}}"></use>' +
					'</svg>' +
					'</div>' +
					'<ul class="section-select--popup__list section-select--popup__list__show">' +
					'<li class="section-select--popup__item3 hover-text-color click_color_truck" data-type="" data-key=' + count + '>Not Selected</li>' +
					'@foreach ($colors as $user)' +
					'<li class="section-select--popup__item3 hover-text-color click_color_truck" data-type="{{$user->color}}" data-key=' + count + '><div style="background-color: {{$user->color}}">{{$user->color}}</div></li>' +
					'@endforeach' +
					'</ul>' +
					'</div>' +
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Body Type:</label>' +
					'<select class="input-main select2" id="body_type_id" name="body_type_id' + count + '" required>' +
					'<option value="" style="display: none;" disabled selected>Select body type</option>' +
					'@foreach ($body_types as $bodyType)'+
					'<option value="{{ $bodyType->id }}">' +
					'{{ $bodyType->name }}</option>@endforeach</select>' +
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Number:</label>' +
					'<input class="input-main" type="text" name="text' + count + '" placeholder="Введите цвет машины" required/>' +
					'</div>' +
					// '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					// '<label>Carcase Type:</label>' +
					// '<input class="input-main" type="text" name="carcase_type' + count + '" placeholder="Введите цвет машины" required/>' +
					// '</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Capacity:</label>' +
					'<input class="input-main" type="number" name="capacity' + count + '" placeholder="Введите цвет машины" required/>' +
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Place:</label>' +
					'<input class="input-main" type="number" name="place' + count + '" placeholder="Введите цвет машины" required/>' +
					'</div>' +
					'<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
					'<label>Max Size:</label>' +
					'<input class="input-main" type="number" name="max_size' + count + '" placeholder="Введите цвет машины" required/>' +
					'</div>' +
					'</div>');
				// $('.section-car-tab--inputs2').append(
				//     '<div class="section-inputs--wrapper section-car-tab--list2 user-auto-cargo-' + count + ' row">' +
				//     '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
				//     '<label>Марка:</label>' +
				//     '<input class="input-main" type="text" placeholder="Введите марку машины"/>' +
				//     '</div>' +
				//     '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
				//     '<label>Модель:</label>' +
				//     '<input class="input-main" type="text" placeholder="Введите модель машины"/>' +
				//     '</div>' +
				//     '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
				//     '<label>Кузов:</label>' +
				//     '<input class="input-main" type="text" placeholder="Введите кузов машины"/>' +
				//     '</div>' +
				//     '<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap">' +
				//     '<label>Цвет:</label>' +
				//     '<input class="input-main" type="text" placeholder="Введите цвет машины"/>' +
				//     '</div>' +
				//     '<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap">' +
				//     '<label>Типы грузов:</label>' +
				//     '<div class="section-select--input2 section-select--input__show2">' +
				//     '<span class="section-bg-text--content"></span>' +
				//     '<div class="section-yellow-bg--wrap"></div>' +
				//     '<ul class="section-select--popup__list2">' +
				//     '<li class="section-select--popup__item3 hover-text-color">Обычный</li>' +
				//     '<li class="section-select--popup__item3 hover-text-color">Ценный</li>' +
				//     '<li class="section-select--popup__item3 hover-text-color">Габаритный</li>' +
				//     '</ul>' +
				//     '</div>' +
				//     '</div>' +
				//     '</div>');
			$(".section-car-tabs--item2:last-child").after($(".section-car-tabs-added2"));
			$("#truck_count").val(count);
			$('.select2').select2();

			// ================= Choise Select Users ======================//
			$('.section-select--input__show2').on('click', function () {
				$(this).children('.section-select--popup__list2').slideToggle(200);
			});
			$('.section-select--popup__item3').click(function () {
				var get_user = $(this).text();
				//$('.section-select--input__show span').text(get_user);
				$(this).parents('.section-select--input__show2').children('span').text(get_user);
			});
			// *************************************************************** //

			function addItem() {
				var get_user = $(this).text();
				$('.section-bg-text--content').remove();
				$(this).parent().prevAll('.section-yellow-bg--wrap').append('<div class="section-yellow-bg--content2"><span>' + get_user + '</span><div class="section-yellow-bg--content__icon2"><svg class="icon icon-close "><use xlink:href="static/img/svg/symbol/sprite_admin.svg#close"></use></svg></div></div>');
				$(this).off('click');
			}

			$('.section-select--popup__item3').on('click', addItem);


			function removeItem() {
				var get_text = $(this).parents('.section-yellow-bg--wrap').nextAll().children('.section-select--popup__item3');
				var get_click_text = $(this).prev().text();
				for (let item of get_text) {
					if ($(item).text() === get_click_text) {
						$(item).on('click', addItem);
					}
				}
				$(this).parent().remove();


			}

			$('.section-yellow-bg--wrap').on('click', '.section-yellow-bg--content__icon2', removeItem);

			$(document).click(function (e) {
				if (!$(e.target).closest(".section-select--popup__list2,.section-select--input__show2,.section-yellow-bg--content__icon2").length) {
					$('.section-select--popup__list2').slideUp(150);
				}
				e.stopPropagation();
			});



			var x = document.getElementsByClassName("section-car-tabs--item2")
			if (x.length > 0)
				for (let item of x)
					item.addEventListener("click", checkboxInputCargo);
			}
		});

		// fetch car models
		$(document).on('change', '#edit_car_form .car-brand', function () {
			var query = $(this).children("option:selected").data('brand-id');
			let id = $(this).data('key');
			 $.ajax({
                url: "/fetch_models?query=" + query,
                success: function (data) {
					$('#model' + id).html('');
					console.log('id-----', $('#model' + id).attr('id'));
					$('#model' + id).html(data);
                    // $('#car_model').html('');
                    // $('#car_model').html(data);
                }
            })
            // fetch_models(query);
		});
		
		// fetch truck models
		$(document).on('change', '#edit_truck_form .car-brand', function () {
			var query = $(this).children("option:selected").data('brand-id');
			let id = $(this).data('key');
			console.log('id', id);
			 $.ajax({
                url: "/fetch_models?query=" + query,
                success: function (data) {
					$('#truck_model' + id).html('');
					console.log('id-----', $('#truck_model' + id).attr('id'));
					$('#truck_model' + id).html(data);
                    // $('#car_model').html('');
                    // $('#car_model').html(data);
                }
            })
            // fetch_models(query);
        });

        function fetch_models(query) {
            $.ajax({
                url: "/fetch_models?query=" + query,
                success: function (data) {
                    $('#car_model').html('');
                    $('#car_model').html(data);
                }
            })
        }
		// end

	});

    function filter_trip(){
        var user_id = $('#user_id').val();
        var status = $('#transaction_status').val();
        var method = $('#transaction_method').val();
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();
        $.ajax({
            type:'POST',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            url: "{{ route('admin.users.transaction_filter', app()->getLocale()) }}",
            data: {
                user_id: user_id,
                status: status,
                method: method,
                from_date: from_date,
                to_date: to_date
            },
            success: (data) => {
                $('.table-content').html(data['template']);
                $('.table-content-mobile').html(data['template_mobile']);
                pagination_table();
            },
            error: function(data){
                console.log(data);
            }
        });
    }
    function pagination_table() {
        var items_wrap = $('.section-content--main');
        for(let item of items_wrap){
            let items = $(item).find('.section-data-container--item');
            let numItems = items.length;
            let perPage = 10;

            items.slice(perPage).hide();

            if(numItems > perPage){
                $(item).find('.section-bottom-pagination').pagination({
                    items: numItems,
                    itemsOnPage: perPage,
                    ellipsePageSet: false,
                    displayedPages: 4,
                    edges: 0,
                    prevText: '<div class="section-bottom-paginationprev gogocar-arrow-button-pagination"><svg class="icon icon-arrow-left "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#arrow-left"></use></svg></div>',
                    nextText: '<div class="section-bottom-paginationnext gogocar-arrow-button-pagination"><svg class="icon icon-arrow-left arrow-rotate "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#arrow-left"></use></svg></div>',
                    onPageClick: function (pageNumber) {
                        let showFrom = perPage * (pageNumber - 1);
                        let showTo = showFrom + perPage;
                        items.hide().slice(showFrom, showTo).show();
                        //$('.catalog-pag-show-items').text(showFrom);
                    }

                });
            } else if(numItems <= perPage){
                $(item).find('.section-bottom-pagination--wrap').css('display','none');
            }
        }

    }
	function setdate(get_data) {
		var dateString = $('#from_date').datepicker("getDate");
		if(get_data == 'day'){
			dateString.setDate(dateString.getDate()-7);
		$('#to_date').datepicker('setDate', dateString);
		}
		else if(get_data == 'month'){
			dateString.setMonth(dateString.getMonth()-1);
		$('#to_date').datepicker('setDate', dateString);
		}
		else if(get_data == 'year'){
			dateString.setYear(dateString.getFullYear()-1);
		$('#to_date').datepicker('setDate', dateString);
		}
	}
	$('.click_method').click(function () {
		var get_data = $(this).data('type');
		$('#transaction_method').val(get_data);
		filter_trip();
	});
	$('.click_status').click(function () {
		var get_data = $(this).data('type');
		$('#transaction_status').val(get_data);
		filter_trip();
	});
	$('.click_period').click(function () {
		var get_data = $(this).data('type');
		$('#selected_period').val(get_data);
		setdate(get_data);
		filter_trip();
	});
    // $('.click_color').click(function () {
    //     var get_data = $(this).data('type');
    //     var key = $(this).data('key');
    //     $('#color'+key).val(get_data);
    // });
	$(document).on("click", '.click_color', function(){
        var get_user = $(this).html();
        var get_data = $(this).data('type');
        var key = $(this).data('key');
        $(this).parents('.section-select--input__show').children('span').html(get_user);
        $('#color'+key).val(get_data);
	});
	$(document).on("click", '.click_color_truck', function(){
        var get_user = $(this).html();
        var get_data = $(this).data('type');
        var key = $(this).data('key');
        $(this).parents('.section-select--input__show').children('span').html(get_user);
        $('#color_truck'+key).val(get_data);
	});
	$(document).on("click", '.section-arrow-mobile-table', function(){
		$(this).toggleClass('active');
		$(this).parents('.section-bottom-side--mobile__item').next().slideToggle(200).css('display','flex');
	});
	$(document).on("click", '.section-tbody--show__popup', function(){
		$('.section-tbody--modal--table,.left-and-right-side').addClass('active');
		$(this).children('.section-tbody--modal--table__mobile').addClass('active');
	});
	$(document).on('click', '.click_list', function(){
        $(this).children('.section-select--popup__list').slideToggle(200);
        $(this).children('.section-select--popup__icon').toggleClass('active');
	}); 

	$(document).ready(function () {
		$('#from_date').on('change', function() {
			var get_data = $('#selected_period').val();
				filter_trip();
				if($('#selected_period').parent().parent().css('display') == 'none'){
				}
				else{
					setdate(get_data);
				}
		});
	
		$(document).on('change', '#to_date', function(){
			filter_trip();
		});

	})


	
</script>
@endsection