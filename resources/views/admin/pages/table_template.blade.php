<div class="section-top-side">
	<div class="section-block-title-question">
		<div class="section-block--title">@lang('global.page.title')</div>
	</div>
	
		<div class="section-block-added-csv">
			<div class="section-upper-modal">
				<div class="section-csv-green">@lang('global.import_csv')</div>
				<div class="section-csv-yellow">@lang('global.export_csv')</div>
			</div>
			<form method="POST" action="{{ route('admin.pages.import', app()->getLocale()) }}" accept-charset="UTF-8"
				enctype="multipart/form-data" class="form-horizontal">
				{{ csrf_field() }}
				<div class="d-flex">
					<button class="section-csv-yellow upload-apply" type="submit" style="display: none; margin-left: 10px; border: 0px;">@lang('global.app_apply')</button>
					<div class="section-csv--wrap">
						<div class="section-csv-green"><span id="filename1">@lang('global.import_csv')</span>
							<input type="file" name="file" id="file1" class="section-csv-green">
							<input type="hidden" name="table" value="pages">
						</div>
					</div>
				</div>
			</form>
			<form method="POST" action="{{ route('admin.pages.export', app()->getLocale()) }}" accept-charset="UTF-8"
				enctype="multipart/form-data" class="form-horizontal">
				{{ csrf_field() }}
				<div class="section-csv--wrap">
					{{-- <input type="file" name="file" id="file1" class="section-csv-green"> --}}
					<input type="hidden" name="table" value="pages">
					<button class="section-csv-yellow" type="submit">@lang('global.export_csv')</button>
				</div>
			</form>
			<div class="filter-side--right">
				<div class="section-dotted-mobile gogocar-arrow-button">
					<svg class="icon icon-dots ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
					</svg>
				</div>
				<a href="{{ route('admin.pages.create', app()->getLocale()) }}" title="Create New Page Info">
					<div class="section-top-added gogocar-arrow-button">
						<svg class="icon icon-plus ">
							<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
						</svg>
					</div>
				</a>
			</div>
		</div>
</div>
<div class="section-bottom-side--scroll">
	@if(count($pagesObjects) == 0)
	<div class="panel-body text-center">
		<h4>@lang('global.no_data').</h4>
	</div>
	@else
	<table class="section-table">
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
				<th>@lang('global.page.fields.title')</th>
				<th>@lang('global.page.fields.des')</th>
			</tr>
		</thead>
		<tbody class="section-data-container" id="tblMain">
			@foreach ($pagesObjects as $item)
			<tr class="section-data-container--item">
				<td>
					<div class="section-body-checkbox__input">
						<input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $item->id }}">
					</div>
				</td>
				<td class="section-tbody--icon section-tbody--show__popup">
					<svg class="icon icon-burger ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
					</svg>
					<div class="section-tbody--modal--table">
						<a href="{{ route('admin.pages.show', ['locale' => app()->getLocale(), 'id' => $item->id]) }}"
                            class="links" title="Show listing">
							<div class="section-tbody--modal--item">
								<svg class="icon icon-paper ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
								</svg><span>@lang('global.app_view')</span>
							</div>
						</a>
                        <a href="{{ route('admin.pages.edit', ['locale' => app()->getLocale(), 'id' => $item->id]) }}"
                            class="links" title="Edit listing">
							<div class="section-tbody--modal--item">
								<svg class="icon icon-pen ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
								</svg><span>@lang('global.app_edit')</span>
							</div>
                        </a>
                        <form method="POST"
                            action="{!! route('admin.pages.destroy', ['locale' => app()->getLocale(), 'id' => $item->id]) !!}"
                            accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            {{ csrf_field() }}
                            <button type="submit" title="Delete trip"
                                onclick="return confirm(&quot;Click Ok to delete Page .&quot;)">
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
				<td>{{$item->title}}</td>
				<td>{{$item->des}}</td>
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