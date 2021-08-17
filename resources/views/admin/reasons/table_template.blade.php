<div class="section-top-side">
	<div class="section-block-title-question">
		<div class="section-block--title">@lang('global.reason.title')</div>
	</div>
	<div class="filter-side--right">
		<div class="section-top-added gogocar-arrow-button">
			<a href="{{ route('admin.reason.create', app()->getLocale()) }}" class="" title="Create New Car">
				<svg class="icon icon-plus ">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
				</svg>
			</a>
		</div>
	</div>
</div>
<div class="section-bottom-side--scroll">
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
				<th>@lang('global.reason.title')</th>
			</tr>
		</thead>
		@if(count($reasons) == 0)
		<div class="panel-body text-center">
			<h4>@lang('global.no_data')</h4>
		</div>
		@else
		<tbody class="section-data-container">
			@foreach($reasons as $reason)
			<tr class="section-data-container--item">
				<td>
					<div class="section-body-checkbox__input">
						<input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $reason->id }}">
					</div>
				</td>
				<td class="section-tbody--icon section-tbody--show__popup">
					<svg class="icon icon-burger ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
					</svg>
					<div class="section-tbody--modal--table">
						{{-- <a href="{{ route('admin.reason.show', ['locale' => app()->getLocale(), 'id' => $reason->id]) }}"
							class="links" title="Show listing">
							<div class="section-tbody--modal--item">
								<svg class="icon icon-car2 ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#car2')}}"></use>
								</svg><span>Модели</span>
							</div>
						</a> --}}
						<a href="{{ route('admin.reason.edit', ['locale' => app()->getLocale(), 'id' => $reason->id]) }}"
							class="links" title="Edit car">
							<div class="section-tbody--modal--item">
								<svg class="icon icon-pen ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
								</svg><span>@lang('global.app_edit')</span>
							</div>
						</a>
						<form method="POST"
							action="{!! route('admin.reason.destroy', ['locale' => app()->getLocale(), 'id' => $reason->id]) !!}"
							accept-charset="UTF-8">
							<input name="_method" value="DELETE" type="hidden">
							{{ csrf_field() }}
							<button type="submit" title="Delete Car"
								onclick="return confirm(&quot;Click Ok to delete Reason.&quot;)">
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
				<td>{{ $reason->text }}</td>
			</tr>
			@endforeach
		</tbody>
		@endif
	</table>
</div>
<div class="section-bottom-pagination--wrap">
	<div class="section-bottom--delete gogocar-arrow-button">
		<svg class="icon icon-delete ">
			<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete')}}"></use>
		</svg>
	</div>
	<div class="section-bottom-pagination"></div>
</div>