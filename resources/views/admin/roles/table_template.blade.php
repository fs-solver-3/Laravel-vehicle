<table class="section-table w-100" id="tblMain">
	<thead>
		<tr>
			<th class="w-50px">
				<div class="section-thead-checkbox__input" id="check-all">
					<input class="section-thead-checkbox" type="checkbox">
				</div>
			</th>
			<th class="section-thead--icon w-50px">
				<svg class="icon icon-settings " data-toggle="modal" data-target="#myModal">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#settings')}}"></use>
				</svg>
			</th>
			<th>@lang('global.roles.fields.title')</th>
			<th>@lang('global.roles.fields.permission')</th>
		</tr>
	</thead>
	<tbody class="section-data-container">
		@foreach($rolesObjects as $roles)
		<tr class="section-data-container--item">
			<td>
				<div class="section-body-checkbox__input">
					<input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $roles->id }}">
				</div>
			</td>
			<td class="section-tbody--icon section-tbody--show__popup">
				<svg class="icon icon-burger ">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
				</svg>
				<div class="section-tbody--modal--table">
					<div class="section-tbody--modal--item">
						<a href="{{ route('admin.roles.show',['locale' => app()->getLocale(), 'id' => $roles->id]) }}"
							class="links" title="Show roles">
							<svg class="icon icon-paper ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
							</svg><span>@lang('global.app_view')</span>
						</a>
					</div>
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
			</td>
			<td>{{ $roles->title }}</td>
			<td class="section-role--row">
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
			</td>
		</tr>
		@endforeach
	</tbody>
</table>