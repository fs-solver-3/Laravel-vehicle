
<div class="section-bottom-side--scroll">
	@if (count($infoObjects) == 0)
	<div class="panel-body text-center">
		<h4>@lang('global.no_data')</h4>
	</div>
	@else
	<table class="section-table" id="tblMain">
		<thead>
			<tr>
				<th>
					<div class="section-thead-checkbox__input" id="check-all">
						<input class="section-thead-checkbox" type="checkbox" >
					</div>
				</th>
				<th>@lang('global.id')</th>
				<th>@lang('global.review.fields.author')</th>
				<th>@lang('global.date')</th>
				<th>@lang('global.review.fields.type')</th>
				<th>@lang('global.review.fields.comment')</th>
			</tr>
		</thead>
		<tbody class="section-data-container">
			@foreach($infoObjects as $item)
			<tr class="section-data-container--item">
				<td>
					<div class="section-body-checkbox__input">
						<input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $item->id }}">
					</div>
				</td>
				<td>{{ $loop->index + 1 }}</td>
				<td><a class="color-yellow" href="/">{{ optional($item->writer)->name }}</a></td>
				<td>{{ $item->created_at }}</td>
				<td>{{ $item->type }}</td>
				<td>{{ $item->comment }}</td>
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
