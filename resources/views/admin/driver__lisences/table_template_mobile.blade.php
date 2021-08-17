@if(count($driverLisences) == 0)
<div class="panel-body text-center">
	<h4>@lang('global.no_data').</h4>
</div>
@else
@foreach ($driverLisences as $driverLisence)
<div class="section-bottom-side--mobile__item--wrap section-data-container--item">
	<div class="section-bottom-side--mobile__item">
		<div class="section-bottom-side--mobile__item--name">{{ optional($driverLisence->user)->name }}</div>
		<div class="section-bottom-side--mobile__item--attr">
			<div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
				<svg class="icon icon-dots ">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
				</svg>
				<div class="section-tbody--modal--table__mobile">
					<a href="{{ route('admin.driver__lisence.show', ['locale' => app()->getLocale(), 'id' => $driverLisence->id]) }}"
						class="links" title="Show Driver License">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-paper ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
							</svg><span>@lang('global.app_view')</span>
						</div>
					</a>
					<a href="{{ route('admin.driver__lisence.edit', ['locale' => app()->getLocale(), 'id' => $driverLisence->id]) }}"
						class="links" title="Edit Driver License">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-pen ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
							</svg><span>@lang('global.app_edit')</span>
						</div>
					</a>
					<form method="POST"
						action="{!! route('admin.driver__lisence.destroy', ['locale' => app()->getLocale(), 'id' => $driverLisence->id]) !!}"
						accept-charset="UTF-8">
						<input name="_method" value="DELETE" type="hidden">
						{{ csrf_field() }}
						<button type="submit" title="Delete trip"
							onclick="return confirm(&quot;Click Ok to delete Driver License.&quot;)">
							<div class="section-tbody--modal--item">
								<svg class="icon icon-delete-red ">
									<use
										xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
									</use>
								</svg>
								<span>@lang('global.app_delete')</span>
							</div>
						</button>
					</form>
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
			<div class="section-mobile-table--item__right">{{ $loop->index + 1 }}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.license.fields.user'):</div>
			<div class="section-mobile-table--item__right"><a class="color-yellow" href="/">{{ optional($driverLisence->user)->name }}</a></div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.license.fields.number'):</div>
			<div class="section-mobile-table--item__right">{{ $driverLisence->document_no }}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.license.fields.category'):</div>
			<div class="section-mobile-table--item__right">
				@foreach ($driverLisence->lisence_categories as $singlePermission)
				{{ $singlePermission->title }}
				@endforeach
			</div>
		</li>
	</ul>
</div>
@endforeach
@endif