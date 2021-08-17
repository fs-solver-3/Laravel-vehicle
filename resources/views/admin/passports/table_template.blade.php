@if(count($passports) == 0)
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
			<th>@lang('global.passport.fields.user')</th>
			<th>@lang('global.passport.fields.series')</th>
			<th>@lang('global.passport.fields.issue_date')</th>
			<th>@lang('global.passport.fields.issued_by')</th>
			<th>@lang('global.passport.fields.address')</th>
			<th>@lang('global.passport.fields.verified')</th>
			<th>@lang('global.passport.fields.scan')</th>
		</tr>
	</thead>
	<tbody class="section-data-container">
		@foreach($passports as $passport)
		<tr class="section-data-container--item">
			<td>
				<div class="section-body-checkbox__input">
					<input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $passport->id }}">
				</div>
			</td>
			<td class="section-tbody--icon section-tbody--show__popup">
				<svg class="icon icon-burger ">
					<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
				</svg>
				<div class="section-tbody--modal--table">
					<a href="{{ route('admin.passport.show', ['locale' => app()->getLocale(), 'id' => $passport->id]) }}"
						class="links" title="Show Passport">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-paper ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
							</svg><span>@lang('global.app_view')</span>
						</div>
					</a>
					<a href="{{ route('admin.passport.edit', ['locale' => app()->getLocale(), 'id' => $passport->id]) }}"
						class="links" title="Edit Passport">
						<div class="section-tbody--modal--item">
							<svg class="icon icon-pen ">
								<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
							</svg><span>@lang('global.app_edit')</span>
						</div>
					</a>
					<form method="POST"
						action="{!! route('admin.passport.destroy', ['locale' => app()->getLocale(), 'id' => $passport->id]) !!}"
						accept-charset="UTF-8">
						<input name="_method" value="DELETE" type="hidden">
						{{ csrf_field() }}
						<button type="submit" title="Delete trip"
							onclick="return confirm(&quot;Click Ok to delete passport.&quot;)">
							<div class="section-tbody--modal--item">
								<svg class="icon icon-delete-red ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete-red')}}">
									</use>
								</svg>
								<span>@lang('global.app_delete')</span>
							</div>
						</button>
					</form>
				</div>
			</td>
			<td>{{ $loop->index + 1 }}</td>
			<td><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($passport->user)->id, 'tab' => 'main']) }}">{{ optional($passport->user)->name }}</a></td>
			<td>{{ $passport->series }} {{ $passport->department_code }}</td>
			<td>{{ $passport->issued_date }}</td>
			<td>{{ $passport->issued_by }}</td>
			<td>{{ $passport->place_residence }}</td>
			<td>
				@if($passport->verified)
				 Да
				@else
				 Нет    
				@endif
			 </td>
			<td>
				<div class="section-file-scan">
					@if (!is_null($passport->pdf1))
					<a class="section-user-files" href="/{{$passport->pdf1}}" target="_blank">
						<svg class="icon icon-pdf ">
							<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}"></use>
						</svg><span>
							{{substr(substr($passport->pdf1, 0, -20), 13)}}.{{$passport->pdf1_extension}}
						</span>
					</a>
					@endif
					@if (!is_null($passport->pdf2))
					<a class="section-user-files" href="/{{$passport->pdf2}}" target="_blank">
						<svg class="icon icon-pdf ">
							<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pdf')}}"></use>
						</svg><span>
							{{substr(substr($passport->pdf2, 0, -20), 13)}}.{{$passport->pdf2_extension}}
						</span>
					</a>
					@endif
				</div>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endif