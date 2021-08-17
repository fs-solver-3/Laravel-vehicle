<div class="section-top-side">
	<div class="section-block-title-question">
		<div class="section-block--title">@lang('global.complain.title')</div>
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
				<th>ID</th>
				<th>@lang('global.sidebar.complain_category')</th>
				<th>@lang('global.complain.fields.text')</th>
				<th>@lang('global.review.fields.author')</th>
				<th>@lang('global.review.fields.user')</th>
			</tr>
		</thead>
		@if(count($complains) == 0)
		<div class="panel-body text-center">
			<h4>@lang('global.no_data')</h4>
		</div>
		@else
		<tbody class="section-data-container">
			@foreach($complains as $complain)
			<tr class="section-data-container--item">
				<td>
					<div class="section-body-checkbox__input">
						<input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $complain->id }}">
					</div>
				</td>
				<td>{{ $loop->index + 1 }}</td>
				<td>{{ $complain->complain->title }}</td>
				<td>{{ $complain->comment }}</td>
				<td><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($complain->writer)->id, 'tab' => 'main']) }}">{{ optional($complain->writer)->name }}</a></td>
				<td><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($complain->receiver)->id, 'tab' => 'main']) }}">{{ optional($complain->receiver)->name }}</a></td>
				<td></td>
			</tr>
			@endforeach
		</tbody>
		@endif
	</table>
</div>
{{-- <div class="section-bottom-pagination--wrap">
	<div class="section-bottom--delete gogocar-arrow-button">
		<svg class="icon icon-delete ">
			<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete')}}"></use>
		</svg>
	</div>
	<div class="section-bottom-pagination"></div>
</div> --}}