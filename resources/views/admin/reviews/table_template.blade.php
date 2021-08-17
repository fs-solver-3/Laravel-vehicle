
<div class="section-bottom-side--scroll">
	@if (count($reviewsObjects) == 0)
	<div class="panel-body text-center">
		<h4>No Review Available.</h4>
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
				<th class="section-thead--icon" data-toggle="modal" data-target="#myModal">
					<svg class="icon icon-settings ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#settings')}}"></use>
					</svg>
				</th>
				<th>@lang('global.id')</th>
				<th>@lang('global.date')</th>
				<th>@lang('global.review.fields.author')</th>
				<th>@lang('global.review.fields.user')</th>
				<th>@lang('global.review.fields.comment')</th>
				<th>@lang('global.review.rating')</th>
			</tr>
		</thead>
		<tbody class="section-data-container">
			@foreach($reviewsObjects as $reviews)
			<tr class="section-data-container--item">
				<td>
					<div class="section-body-checkbox__input">
						<input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $reviews->id }}">
					</div>
				</td>
				<td class="section-tbody--icon section-tbody--show__popup">
					<svg class="icon icon-burger ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
					</svg>
					<div class="section-tbody--modal--table">
						<a href="{{ route('admin.users.chat', ['locale' => app()->getLocale(), 'id' => $reviews->receiver_id]) }}">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-chat ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#chat')}}"></use>
							</svg><span>@lang('global.message')</span>
						</div>
						</a>
						<a href="{{ route('admin.reviews.edit', ['locale' => app()->getLocale(), 'id' => $reviews->id]) }}" class="links"
							title="Edit Reviews">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-pen ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
							</svg><span>@lang('global.app_edit')</span>
						</div>
						</a>
					</div>
				</td>
				<td>{{ $loop->index+1 }}</td>
				<td>{{ $reviews->created_at }}</td>
				<td><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($reviews->writer)->id, 'tab' => 'main']) }}">{{ optional($reviews->writer)->name }}</a></td>
				<td><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($reviews->receiver)->id, 'tab' => 'main']) }}">{{ optional($reviews->receiver)->name }}</a></td>
				<td>{{ $reviews->comment }}</td>
				<td>{{ $reviews->score }}</td>
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
