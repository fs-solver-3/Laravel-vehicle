<div class="section-top-side box-bg-mobile2">
	<div class="section-block--title">@lang('global.page.title')</div>
	<section-block-added-csv>
		<form method="POST" action="{{ route('admin.pages.import', app()->getLocale()) }}" accept-charset="UTF-8" enctype="multipart/form-data" class="form-horizontal">
			{{ csrf_field() }}
			<div class="section-upper-modal">
				<div class="section-csv-green"><span id="filename2">@lang('global.import_csv')</span>
					<input type="file" name="file" id="file2">
					<input type="hidden" name="table" value="pages">
				</div>
				<button class="section-csv-yellow" type="submit">@lang('global.export_csv')</button>
			</div>
			<div class="section-csv--wrap">
				<div class="section-csv-green">@lang('global.import_csv')</div>
				<div class="section-csv-yellow">@lang('global.export_csv')</div>
			</div>
			<div class="filter-side--right">
				<div class="section-dotted-mobile gogocar-arrow-button">
					<svg class="icon icon-dots ">
						<use
							xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}">
						</use>
					</svg>
				</div>
				<a href="{{ route('admin.pages.create', app()->getLocale()) }}" title="Create New Page Info">
					<div class="section-top-added gogocar-arrow-button">
						<svg class="icon icon-plus ">
							<use
								xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}">
							</use>
						</svg>
					</div>
				</a>
			</div>
		</form>
	</section-block-added-csv>
</div>
<div class="section-bottom-side--mobile__list">
	<!-- Элемент мобильной таблицы-->
	@if(count($pagesObjects) == 0)
	<div class="panel-body text-center">
		<h4>@lang('global.no_data').</h4>
	</div>
	@else
	@foreach ($pagesObjects as $item)
	<div class="section-bottom-side--mobile__item--wrap section-data-container--item">
		<div class="section-bottom-side--mobile__item">
			<div class="section-bottom-side--mobile__item--name">{{$item->title}}</div>
			<div class="section-bottom-side--mobile__item--attr">
				<div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
					<svg class="icon icon-dots ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
					</svg>
					<div class="section-tbody--modal--table__mobile">
						<a href="{{ route('admin.pages.show', ['locale' => app()->getLocale(), 'id' => $item->id]) }}"
                            class="links" title="Show listing">
							<div class="section-tbody--modal--item">
								<svg class="icon icon-car2 ">
									<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#car2')}}"></use>
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
                                onclick="return confirm(&quot;Click Ok to delete Page Info.&quot;)">
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
				<div class="section-mobile-table--item__left">@lang('global.page.fields.menu_item'):</div>
				<div class="section-mobile-table--item__right">{{$item->title}}</div>
			</li>
			<li class="section-mobile-table--item">
				<div class="section-mobile-table--item__left">@lang('global.page.fields.info_page'):</div>
				<div class="section-mobile-table--item__right">{{$item->des}}</div>
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