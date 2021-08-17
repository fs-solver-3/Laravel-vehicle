@if(count($passports) == 0)
<div class="panel-body text-center">
	<h4>@lang('global.no_data').</h4>
</div>
@else
@foreach($passports as $passport)
<div class="section-bottom-side--mobile__item--wrap section-data-container--item">
	<div class="section-bottom-side--mobile__item">
		<div class="section-bottom-side--mobile__item--name">{{ optional($passport->user)->name }}</div>
		<div class="section-bottom-side--mobile__item--attr">
			<div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
				<svg class="icon icon-dots ">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
				</svg>
				<div class="section-tbody--modal--table__mobile">
					<a href="{{ route('admin.passport.show', ['locale' => app()->getLocale(), 'id' => $passport->id]) }}"
						class="links" title="Show Passport">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-paper ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
							</svg><span>@lang('global.app_view')</span>
						</div>
					</a>
					<a href="{{ route('admin.passport.edit', ['locale' => app()->getLocale(), 'id' => $passport->id]) }}"
						class="links" title="Edit Passport">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-pen ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
							</svg><span>@lang('global.app_edit')</span>
						</div>
					</a>
					<form method="POST"
						action="{!! route('admin.passport.destroy', ['locale' => app()->getLocale(), 'id' => $passport->id]) !!}"
						accept-charset="UTF-8">
						<input name="_method" value="DELETE" type="hidden">
						{{ csrf_field() }}
						<button type="submit" title="Delete trip"
							onclick="return confirm(&quot;Click Ok to delete trip.&quot;)">
							<div class="section-tbody--modal--item">
								<svg class="icon icon-delete-red ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
									</use>
								</svg>
								<span>@lang('global.app_delete')</span>
							</div>
						</button>
					</form>
					{{-- <div class="section-tbody--modal--item">
						<svg class="icon icon-delete-red ">
							<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}"></use>
						</svg><span>Удалить</span>
					</div> --}}
				</div>
			</div>
			<div class="section-arrow-mobile-table section-top-added gogocar-arrow-button">
				<svg class="icon icon-arrow-down-mobile ">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile')}}"></use>
				</svg>
			</div>
		</div>
	</div>
	<ul class="section-bottom-side--mobile__item--content">
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">ID:</div>
			<div class="section-mobile-table--item__right">{{$loop->index + 1}}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.passport.fields.user'):</div>
			<div class="section-mobile-table--item__right"><a class="color-yellow" href="/">{{ optional($passport->user)->name }}</a></div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.passport.fields.series'):</div>
			<div class="section-mobile-table--item__right">{{ $passport->series }} {{ $passport->department_code }}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.passport.fields.issue_date'):</div>
			<div class="section-mobile-table--item__right">{{ $passport->issued_date }}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.passport.fields.issued_by'):<span class="ml-1">{{ $passport->issued_by }}</span></div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.passport.fields.address'):<span class="ml-1">{{ $passport->place_residence }}</span></div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.passport.fields.verified'):<span class="ml-1">@if($passport->verified)
				Да
			   @else
				Нет    
			   @endif</span></div>
		</li>
		<li class="section-mobile-table--item d-flex flex-column">
			<div class="section-mobile-table--item__left mb-2">@lang('global.passport.fields.scan'):</div>
			<div class="section-file-scan d-flex flex-wrap">
				@if (!is_null($passport->pdf1))
				<a class="section-user-files mb-2" href="/{{$passport->pdf1}}">
					<svg class="icon icon-pdf ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}"></use>
					</svg><span>
						{{substr(substr($passport->pdf1, 0, -20), 13)}}.{{$passport->pdf1_extension}}
					</span>
				</a>
				@endif
				@if (!is_null($passport->pdf2))
				<a class="section-user-files" href="/{{$passport->pdf2}}">
					<svg class="icon icon-pdf ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}"></use>
					</svg><span>
						{{substr(substr($passport->pdf2, 0, -20), 13)}}.{{$passport->pdf2_extension}}
					</span>
				</a>
				@endif
			</div>
		</li>
	</ul>
</div>
@endforeach
@endif