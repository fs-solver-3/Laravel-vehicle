<div class="section-top-side">
	<div class="section-block-title-question">
		<div class="section-block--title">@lang('global.truck.title')</div>
	</div>
	<div class="filter-side--right">
		<div class="section-top-added gogocar-arrow-button">
			<a href="{{ route('admin.truck.create', app()->getLocale()) }}" class="" title="Create New Car">
				<svg class="icon icon-plus ">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
				</svg>
			</a>
		</div>
	</div>
</div>
<div class="section-bottom-side--scroll">
	@if(count($trucks) == 0)
		<div class="panel-body text-center">
			<h4>@lang('global.no_data')</h4>
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
					<th>Id</th>
					<th>@lang('global.car.fields.owner')</th>
					<th>@lang('global.car.fields.model')</th>
					<th>@lang('global.car.fields.year')</th>
					<th>@lang('global.car.fields.color')</th>
					<th>@lang('global.car.fields.body_type')</th>
					<th>@lang('global.car.fields.number')</th>
					<th>@lang('global.truck.fields.car_case')</th>
					<th>@lang('global.truck.fields.capacity')</th>
					<th>@lang('global.truck.fields.place')</th>
					<th>@lang('global.truck.fields.max_size')</th>
				</tr>
			</thead>
			
			<tbody class="section-data-container">
				@foreach($trucks as $truck)
				<tr class="section-data-container--item">
					<td>
						<div class="section-body-checkbox__input">
							<input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $truck->id }}">
						</div>
					</td>
					<td class="section-tbody--icon section-tbody--show__popup">
						<svg class="icon icon-burger ">
							<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
						</svg>
						<div class="section-tbody--modal--table">
							<a href="{{ route('admin.truck.show', ['locale' => app()->getLocale(), 'id' => $truck->id]) }}"
								class="links" title="Show listing">
								<div class="section-tbody--modal--item">
									<svg class="icon icon-car2 ">
										<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#car2')}}"></use>
									</svg><span>@lang('global.app_view')</span>
								</div>
							</a>
							<a href="{{ route('admin.truck.edit', ['locale' => app()->getLocale(), 'id' => $truck->id]) }}"
								class="links" title="Edit car">
								<div class="section-tbody--modal--item">
									<svg class="icon icon-pen ">
										<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
									</svg><span>@lang('global.app_edit')</span>
								</div>
							</a>
							<form method="POST"
								action="{!! route('admin.truck.destroy', ['locale' => app()->getLocale(), 'id' => $truck->id]) !!}"
								accept-charset="UTF-8">
								<input name="_method" value="DELETE" type="hidden">
								{{ csrf_field() }}
								<button type="submit" title="Delete Truck"
									onclick="return confirm(&quot;Click Ok to delete Cars.&quot;)">
									<div class="section-tbody--modal--item">
										<svg class="icon icon-delete-red ">
											<use
												xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
											</use>
										</svg><span>@lang('global.app_delete')</span>
									</div>
								</button>
							</form>
						</div>
					</td>
					<td>{{ $loop->index + 1 }}</td>
					<td>{{ optional($truck->user)->name }}</td>
					<td>{{ $truck->model }}</td>
					<td>{{ $truck->year }}</td>
					<td>{{ $truck->color }}</td>
					<td>{{ optional($truck->bodyType)->name }}</td>
					<td>{{ $truck->number }}</td>
					<td>{{ $truck->carcase_type }}</td>
					<td>{{ $truck->capacity }}</td>
					<td>{{ $truck->place }}</td>
					<td>{{ $truck->max_size }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	@endif
</div>
<div class="section-bottom-pagination--wrap">
	<div class="section-bottom--delete gogocar-arrow-button">
		<svg class="icon icon-delete ">
			<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete')}}"></use>
		</svg>
	</div>
	<div class="section-bottom-pagination"></div>
</div>