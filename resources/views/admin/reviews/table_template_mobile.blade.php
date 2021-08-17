<div class="section-bottom-side--mobile__list">
	<!-- Элемент мобильной таблицы-->
	@if (count($reviewsObjects) == 0)
	<div class="panel-body text-center">
		<h4>@lang('global.no_data')</h4>
	</div>
	@else
	@foreach($reviewsObjects as $reviews)
	<div class="section-bottom-side--mobile__item--wrap section-data-container--item">
		<div class="section-bottom-side--mobile__item">
			<div class="section-bottom-side--mobile__item--name">{{ optional($reviews->receiver)->name }} </div>
			<div class="section-bottom-side--mobile__item--attr">
				<div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
					<svg class="icon icon-dots ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
					</svg>
					<div class="section-tbody--modal--table__mobile">
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
				<div class="section-mobile-table--item__right">{{ $loop->index+1 }}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.date'):</div>
				<div class="section-mobile-table--item__right">{{ $reviews->created_at }}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.review.fields.author'):</div>
				<div class="section-mobile-table--item__right"><a class="color-yellow"
						href="/">{{ optional($reviews->writer)->name }}</a></div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.review.fields.user'):</div>
				<div class="section-mobile-table--item__right"><a class="color-yellow"
						href="/">{{ optional($reviews->receiver)->name }}</a></div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.review.fields.comment'):<span
						class="ml-1">{{ $reviews->comment }}</span></div>
			</li>
		</ul>
	</div>
	@endforeach
	@endif
</div>
<div class="section-bottom-pagination--wrap mt-20px">
	<!--.section-bottom--delete.gogocar-arrow-button-->
	<!--    +icon('delete')-->
	<div class="section-bottom-pagination"></div>
</div>