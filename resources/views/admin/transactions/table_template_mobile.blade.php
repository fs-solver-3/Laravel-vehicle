<div class="section-top-side box-bg-mobile2">
	<div class="section-block--title">@lang('global.transactions.title')</div>
	<div class="section-users-balance--right">
		<div class="section-users-balance--plus section-users-balance--icon" data-toggle="modal"
			data-target="#popup-add">
			<svg class="icon icon-money-bag ">
				<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#money-bag')}}"></use>
			</svg>
		</div>
		<div class="section-users-balance--minus section-users-balance--icon" data-toggle="modal"
			data-target="#popup-rem">
			<svg class="icon icon-money-bag ">
				<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#money-bag')}}"></use>
			</svg>
		</div>
	</div>
</div>
<div class="section-bottom-side--mobile__list">
	@if (count($transactionsObjects) == 0)	
		<div class="panel-body text-center">
			<h4>@lang('global.no_data').</h4>
		</div>
	@else
	@foreach($transactionsObjects as $transactions)
	<div class="section-bottom-side--mobile__item--wrap section-data-container--item">
		<div class="section-bottom-side--mobile__item">
			<div class="section-bottom-side--mobile__item--name">one</div>
			<div class="section-bottom-side--mobile__item--attr">
				<div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
					<svg class="icon icon-dots ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
					</svg>
					<div class="section-tbody--modal--table__mobile">
						<a href="{{ route('admin.transactions.show', ['locale' => app()->getLocale(), 'id' => $transactions->id]) }}"
							class="links" title="Show transaction">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-paper ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}">
								</use>
							</svg><span>@lang('global.app_view')</span>
						</div>
						</a>
						<a href="{{ route('admin.transactions.edit', ['locale' => app()->getLocale(), 'id' => $transactions->id]) }}"
							class="links" title="Edit transaction">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-pen ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}">
								</use>
							</svg><span>@lang('global.app_edit')</span>
						</div>
						</a>
						<form method="POST"
							action="{!! route('admin.transactions.destroy', ['locale' => app()->getLocale(), 'id' => $transactions->id]) !!}"
							accept-charset="UTF-8">
							<input name="_method" value="DELETE" type="hidden">
							{{ csrf_field() }}
							<button type="submit" title="Delete trip" onclick="return confirm(&quot;Click Ok to delete Transaction .&quot;)">
								<div class="section-tbody--modal--item">
									<svg class="icon icon-delete-red ">
										<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
										</use>
									</svg><span>@lang('global.app_delete')</span>
								</div>
							</button>
						</form>
						{{-- <div class="section-tbody--modal--item">
							<svg class="icon icon-delete-red ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
								</use>
							</svg><span>Удалить</span>
						</div> --}}
					</div>
				</div>
				<div class="section-arrow-mobile-table section-top-added gogocar-arrow-button">
					<svg class="icon icon-arrow-down-mobile ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-mobile')}}">
						</use>
					</svg>
				</div>
			</div>
		</div>
		<ul class="section-bottom-side--mobile__item--content">
			<li class="section-mobile-table--item" style="align-items:center;">
				<div class="section-mobile-table--item__left">Отклонить:</div>
				<div class="section-mobile-table--item__right">
					<div class="section-body-checkbox__input__off">
						<input class="section-body-checkbox__off" type="checkbox">
					</div>
				</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.transactions.fields.reject'):</div>
				<div class="section-mobile-table--item__right">{{ optional($transactions->user)->name }}
				</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.transactions.fields.amount'):</div>
				<div class="section-mobile-table--item__right">{{ $transactions->amount }} UZS</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.transactions.fields.date'):</div>
				<div class="section-mobile-table--item__right">
					{{date('d.m.yy h:mm',strtotime($transactions->created_at))}}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.transactions.fields.method'):</div>
				<div class="section-mobile-table--item__right">{{ $transactions->method }}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.transactions.fields.operation_type'):</div>
				<div class="section-mobile-table--item__right">@switch($transactions->type)
					@case('book')
						книга
						@break
					@case('withdraw')
						изымать
						@break
					@case('charged from paypal')
						взимается с PayPal
						@break
					@case('charged for booking')
						взимается за бронирование
						@break
					@default
						{{ $transactions->type }} 
				@endswitch
			</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.transactions.fields.status'):</div>
				<div class="section-mobile-table--item__right">{{ $transactions->state }}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.transactions.fields.comment'):
					<span>{{ $transactions->comment }}</span></div>
			</li>
		</ul>
	</div>
	@endforeach
	@endif
</div>
<div class="section-bottom-pagination--wrap">
	<!--.section-bottom--delete.gogocar-arrow-button-->
	<!--    +icon('delete')-->
	<div class="section-bottom-pagination"></div>
</div>