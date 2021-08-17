<div class="section-top-side">
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
<div class="section-bottom-side--scroll">
	@if (count($transactionsObjects) == 0)	
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
				<th>@lang('global.transactions.fields.reject')</th>
				<th>@lang('global.transactions.fields.user')</th>
				<th>@lang('global.transactions.fields.amount')</th>
				<th>@lang('global.transactions.fields.date')</th>
				<th>@lang('global.transactions.fields.purpose')</th>
				<th>@lang('global.transactions.fields.operation_type'):</th>
				<th>@lang('global.transactions.fields.status')</th>
				<th>@lang('global.transactions.fields.comment')</th>
				<th>@lang('global.transactions.fields.method')</th>
			</tr>
		</thead>
		<tbody class="section-data-container">
			@foreach($transactionsObjects as $transactions)
			<tr class="section-data-container--item @if($transactions->type == 'withdraw' && $transactions->state == 'completed') disabled-transaction @endif">
				<td>
					<div class="section-body-checkbox__input">
						<input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $transactions->id }}">
					</div>
				</td>
				<td class="section-tbody--icon section-tbody--show__popup">
					<svg class="icon icon-burger ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
					</svg>
					<div class="section-tbody--modal--table">
						<a href="{{ route('admin.transactions.show', ['locale' => app()->getLocale(), 'id' => $transactions->id]) }}" class="links"
							title="Show transaction">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-paper ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}">
								</use>
							</svg><span>@lang('global.app_view')</span>
						</div>
						</a>
						<a href="{{ route('admin.transactions.edit', ['locale' => app()->getLocale(), 'id' => $transactions->id]) }}" class="links"
							title="Edit transaction">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-pen ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}">
								</use>
							</svg><span>@lang('global.app_edit')</span>
						</div>
						</a>
						@if(!($transactions->type == 'withdraw' && $transactions->state == 'completed'))
						<form method="POST" action="{!! route('admin.transactions.destroy', ['locale' => app()->getLocale(), 'id' => $transactions->id]) !!}"
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
						@endif
					</div>
				</td>
				<td>
					@if($transactions->type == 'withdraw')
						@if($transactions->state != 'completed')
							<div class="section-body-checkbox__input__off">
								<input class="section-body-checkbox__off" type="checkbox">
							</div>
							<form method="POST" action="{{ route('withdraws.approve') }}" accept-charset="UTF-8" class="approve-form">
								<input name="transaction_id" value="{{ $transactions->id }}" type="hidden">
								{{ csrf_field() }}
							</form>
						@else
							<div class="section-body-checkbox__input__off_completed">
							</div>
						@endif
					@endif
				</td>
				<td>{{ optional($transactions->user)->name }}</td>
				<td>{{ $transactions->amount }} UZS</td>
				<td>{{date('d.m.yy H:i',strtotime($transactions->created_at))}}</td>
				<td>{{ $transactions->method }}</td>
				<td>
					@switch($transactions->type)
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
				</td>
				<td>{{ $transactions->state }}</td>
				<td>{{ $transactions->comment }}</td>
				<td>{{ $transactions->method }}</td>
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