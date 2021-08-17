@if(count($driverLisences) == 0)
<div class="panel-body text-center">
	<h4>@lang('global.no_data').</h4>
</div>
@else
<table class="section-table" id="tblMain">
	<thead>
		<tr>
			<th>
				<div class="section-thead-checkbox__input" id="check-all">
					<input class="section-thead-checkbox" type="checkbox">
				</div>
			</th>
			<th class="section-thead--icon" data-toggle="modal" data-target="#myModal">
				<svg class="icon icon-settings ">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#settings')}}"></use>
				</svg>
			</th>
			<th>ID</th>
			<th>@lang('global.license.fields.user')</th>
			<th>@lang('global.license.fields.number')</th>
			<th>@lang('global.license.fields.category')</th>
		</tr>
	</thead>
	<tbody class="section-data-container">
		@foreach ($driverLisences as $driverLisence)

		<tr class="section-data-container--item">
			<td>
				<div class="section-body-checkbox__input">
					<input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $driverLisence->id }}">
				</div>
			</td>
			<td class="section-tbody--icon section-tbody--show__popup">
				<svg class="icon icon-burger ">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
				</svg>
				<div class="section-tbody--modal--table">
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
			</td>
			<td>{{ $loop->index + 1 }}</td>
			<td><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($driverLisence->user)->id, 'tab' => 'main']) }}">{{ optional($driverLisence->user)->name }}</a></td>
			<td>{{ $driverLisence->document_no }}</td>
			<td>
				@foreach ($driverLisence->lisence_categories as $singlePermission)
				{{ $singlePermission->title }},
				@endforeach
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif