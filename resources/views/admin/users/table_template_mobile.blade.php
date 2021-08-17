@if(count($usersObjects) == 0)
<div class="panel-body text-center">
	<h4>@lang('global.no_data').</h4>
</div>
@else
@foreach ($usersObjects as $users)
<div class="section-bottom-side--mobile__item--wrap section-data-container--item">
	<div class="section-bottom-side--mobile__item">
		<div class="section-bottom-side--mobile__item--name"> {{ $users->name }} {{ $users->surname }} (Id {{ $users->id }})</div>
		<div class="section-bottom-side--mobile__item--attr">
			<div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
				<svg class="icon icon-dots ">
					<use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#dots') }}"></use>
				</svg>
				<div class="section-tbody--modal--table__mobile">
					<div class="section-tbody--modal--item">
						<svg class="icon icon-chat ">
							<use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#chat') }}"></use>
						</svg><span>@lang('global.message')</span>
					</div>
					<a href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $users->id, 'tab' => 'main']) }}"
						class="links" title="Edit Users">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-pen ">
								<use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}"></use>
							</svg><span>@lang('global.app_edit')</span>
						</div>
					</a>
					<div class="section-tbody--modal--item">
						<form method="POST" action="{!! route('admin.users.destroy', ['locale' => app()->getLocale(), 'id' => $users->id]) !!}" accept-charset="UTF-8">
							<input name="_method" value="DELETE" type="hidden">
							{{ csrf_field() }}
							<button type="submit" title="Delete Users" onclick="return confirm(&quot;Click Ok to delete Users.&quot;)">
								<img src="{{asset('admin/delete.svg')}}" alt="for you">
								<span class="action-label">@lang('global.app_delete')
							</button>
						</form>
					</div>
					<form action='{{ route("loginAs") }}' method='post'>
						{{ csrf_field() }}
						<input name="user_id" value="{{ $users->id }}" type="hidden">
						<button type="submit" onclick="event.stopPropagation();" class="mobile-login">
							<svg class="icon icon-pen ">
								<use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}">
								</use>
							</svg><span>@lang('global.users.fields.auth')</span>
						</button>
					</form>
				</div>
			</div>
			<div class="section-arrow-mobile-table section-top-added gogocar-arrow-button">
				<svg class="icon icon-arrow-down-mobile ">
					<use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile') }}"></use>
				</svg>
			</div>
		</div>
	</div>
	<ul class="section-bottom-side--mobile__item--content">
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.users.fields.email'):</div>
			<div class="section-mobile-table--item__right">{{ $users->email }}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.users.fields.activity'):</div>
			<div class="section-mobile-table--item__right">
				@if($users->active)
				<span class="checkbox-icon">Да</span>
				@else
				<span class="uncheckbox-icon">нет</span>
				@endif
			</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.users.fields.date_of_change'):</div>
			<div class="section-mobile-table--item__right">{{ $users->created_at }}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.users.fields.name'):</div>
			<div class="section-mobile-table--item__right">{{ $users->name }}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.users.fields.surname'):</div>
			<div class="section-mobile-table--item__right">{{ $users->surname }}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.users.fields.email'):</div>
			<div class="section-mobile-table--item__right">{{ $users->email }}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.users.fields.phone'):</div>
			<div class="section-mobile-table--item__right">{{ $users->phone }}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.users.fields.last_login')</div>
			<div class="section-mobile-table--item__right">{{ $users->last_login_at }}</div>
		</li>
		<li class="section-mobile-table--item">
			<div class="section-mobile-table--item__left">@lang('global.users.fields.id'):</div>
			<div class="section-mobile-table--item__right">{{ $users->id }}</div>
		</li>
	</ul>
</div>
@endforeach
@endif