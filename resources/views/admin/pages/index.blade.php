@extends('layouts.app')
@section('title', 'Инфо страницы')
@section('content')
@section('admin_lang')
@include('includes.admin_flag')
@endsection

<section class="section-1">
	@if(Session::has('success_message'))
	<div class="alert alert-success">
		<span class="glyphicon glyphicon-ok"></span>
		{!! session('success_message') !!}

		<button type="button" class="close" data-dismiss="alert" aria-label="close">
			<span aria-hidden="true">&times;</span>
		</button>

	</div>
	@endif
	@if ($errors->any())
		<ul class="alert alert-danger">
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif
	<div class="filter-main box-bg2">
		<div class="section-top-side">
			<div class="section-block--title">@lang('global.filter_name')</div>
			<div class="filter-side--right">
				<div class="filter-settings gogocar-arrow-button" data-toggle="modal" data-target="#settingModal">
					<svg class="icon icon-settings ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#settings')}}"></use>
					</svg>
				</div>
				<div class="filter-show-and-hide gogocar-arrow-button">
					<svg class="icon icon-arrow-down-white ">
						<use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
					</svg>
				</div>
			</div>
		</div>
		<div class="section-bottom-side filter-balance-bottom row m-0">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-6 section-input-wrap p-0">
				<label>@lang('global.page.fields.menu_item'):</label>
				{{-- <div class="section-select--input2 section-select--input__show"><span>Пункт меню...</span>
          <div class="section-select--popup__icon">
            <svg class="icon icon-arrow-down-white ">
              <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
				</svg>
			</div>
			<ul class="section-select--popup__list section-select--popup__list__show">
				<li class="section-select--popup__item2 hover-text-color">1</li>
				<li class="section-select--popup__item2 hover-text-color">2</li>
				<li class="section-select--popup__item2 hover-text-color">3</li>
			</ul>
		</div> --}}
		<input class="input-main" type="text" id="menu_item" value="" placeholder="Пункт меню...">
	</div>
	</div>
	</div>
</section>
<section class="section-2 section-content-main--table">
	<div class="section-content--main__wrap box-bg2">
		<div class="section-content--main table-content">
			@include('admin.pages.table_template')
		</div>
	</div>
</section>
<!-- .section-content-main--table-->
<section class="section3 section-content-main-mobile--table">
	<div class="section-content--main-mobile__wrap">
		<div class="section-content--main box-bg2 pb-20px table-content-mobile">
			@include('admin.pages.table_template_mobile')
		</div>
	</div>
</section>
<script>
  window.route_mass_crud_entries_destroy = '{{ route('admin.pages.mass_destroy', app()->getLocale()) }}';
</script>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
@section('add_custom_script')
<script>
	window._token = '{{ csrf_token() }}';
        $("#menu_item").keyup(function() {
            filter_data();
        });
	function filter_data() {
		var menu_item = $('#menu_item').val();
		$.ajax({
			type: 'GET'
			, headers: {
				'X-CSRF-TOKEN': _token
			}
			, url: "{{ route('admin.pages.index', app()->getLocale()) }}"
			, data: {
				menu_item: menu_item
			}
			, success: (data) => {
				$('.table-content').html(data['template']);
				$('.table-content-mobile').html(data['template_mobile']);
				pagination_table();
			}
			, error: function(data) {
				console.log(data);
			}
		});
	}

	function pagination_table() {
		var items_wrap = $('.section-content--main');
		for (let item of items_wrap) {
			let items = $(item).find('.section-data-container--item');
			let numItems = items.length;
			let perPage = 10;

			items.slice(perPage).hide();

			if (numItems > perPage) {
				$(item).find('.section-bottom-pagination').pagination({
					items: numItems
					, itemsOnPage: perPage
					, ellipsePageSet: false
					, displayedPages: 4
					, edges: 0
					, prevText: '<div class="section-bottom-paginationprev gogocar-arrow-button-pagination"><svg class="icon icon-arrow-left "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#arrow-left"></use></svg></div>'
					, nextText: '<div class="section-bottom-paginationnext gogocar-arrow-button-pagination"><svg class="icon icon-arrow-left arrow-rotate "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#arrow-left"></use></svg></div>'
					, onPageClick: function(pageNumber) {
						let showFrom = perPage * (pageNumber - 1);
						let showTo = showFrom + perPage;
						items.hide().slice(showFrom, showTo).show();
						//$('.catalog-pag-show-items').text(showFrom);
					}

				});
			} else if (numItems <= perPage) {
				// $(item).find('.section-bottom-pagination--wrap').css('display', 'none');
			}
		}
	}
	$(document).on("click", '.section-arrow-mobile-table', function() {
		$(this).toggleClass('active');
		$(this).parents('.section-bottom-side--mobile__item').next().slideToggle(200).css('display', 'flex');
	});
	$(document).on("click", '.section-tbody--show__popup', function() {
		$('.section-tbody--modal--table,.left-and-right-side').addClass('active');
		$(this).children('.section-tbody--modal--table__mobile').addClass('active');
	});
	$(document).on("click", '.section-dotted-mobile,.section-dotted-mobile2', function() {
        $('.section-upper-modal,.left-and-right-side').toggleClass('active');
	});
	$(document).on("change", '#file1', function() {
		var filename = $('#file1').val().replace(/C:\\fakepath\\/i, '');
		$("#filename1").html(filename);
		$(".upload-apply").css("display", "flex");
	});
	$(document).on("change", '#file2', function() {
		var filename = $('#file2').val().replace(/C:\\fakepath\\/i, '');
		$("#filename2").html(filename);
	});
	$(document).ready( function() {
		filter_data();
	});
</script>

@endsection