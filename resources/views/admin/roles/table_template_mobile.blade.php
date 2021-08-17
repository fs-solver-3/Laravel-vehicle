@foreach($rolesObjects as $roles)
<div class="section-bottom-side--mobile__item--wrap section-data-container--item">
	<div class="section-bottom-side--mobile__item">
		<div class="section-bottom-side--mobile__item--name"> {{ $roles->title }}</div>
		<div class="section-bottom-side--mobile__item--attr">
			<div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
				<svg class="icon icon-dots ">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
				</svg>
				<div class="section-tbody--modal--table__mobile">
					<a href="{{ route('admin.roles.show',['locale' => app()->getLocale(), 'id' => $roles->id]) }}"
						class="links" title="Show roles">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-paper ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
							</svg><span>@lang('global.app_view')</span>
						</div>
					</a>
					<a href="{{ route('admin.roles.edit', ['locale' => app()->getLocale(), 'id' => $roles->id] ) }}"
						class="links" title="Edit roles">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-pen ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
							</svg><span>@lang('global.app_edit')</span>
						</div>
					</a>
					<form method="POST"
						action="{!! route('admin.roles.destroy', ['locale' => app()->getLocale(), 'id' => $roles->id]) !!}"
						accept-charset="UTF-8">
						<input name="_method" value="DELETE" type="hidden">
						{{ csrf_field() }}
						<button type="submit" title="Delete Users"
							onclick="return confirm(&quot;Click Ok to delete Users.&quot;)">
							<div class="section-tbody--modal--item">
								<svg class="icon icon-delete-red ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
									</use>
								</svg><span>@lang('global.app_delete')</span>
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
			<div class="section-mobile-table--item__left">@lang('global.roles.fields.title'):</div>
			<div class="section-mobile-table--item__right">{{ $roles->title }}</div>
		</li>
		<li class="section-mobile-table--item flex-column">
			<div class="section-mobile-table--item__left">@lang('global.roles.fields.permission'):</div>
			<div class="section-mobile-table--item__right">
				<div class="section-role--table__list">
					@foreach ($roles->permission as $singlePermission)
					<div class="section-role--table__item"><span>{{ $singlePermission->title }}</span>
						<div class="section-role--table__item--close">
							<svg class="icon icon-close ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#close')}}"></use>
							</svg>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</li>
	</ul>
</div>
@endforeach