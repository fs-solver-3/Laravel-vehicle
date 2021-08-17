@inject('request', 'Illuminate\Http\Request')
@section('title', 'Права доступа')
@extends('layouts.app')
@section('admin_lang')
@include('includes.admin_flag')
@endsection
@section('content')
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
</section>
<section class="section2 section-content-main--table">
  <div class="section-content--main__wrap box-bg2">
    <div class="section-content--main">
      <div class="section-top-side">
        <div class="section-block--title">@lang('global.permissions.title')</div>
        <div class="filter-side--right">
          <div class="section-top-added gogocar-arrow-button">
            <a href="{{ route('admin.permissions.create', app()->getLocale()) }}" 
              title="Create New Permissions">
              <svg class="icon icon-plus ">
                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
              </svg>
            </a>
          </div>
        </div>
      </div>
      @if(count($permissionsObjects) == 0)
      <div class="panel-body text-center">
        <h4>@lang('global.no_data').</h4>
      </div>
      @else
      <div class="section-bottom-side--scroll">
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
              <th>@lang('global.permissions.fields.title')</th>
              <th>@lang('global.permissions.fields.description')</th>
            </tr>
          </thead>
          <tbody class="section-data-container">
            @foreach($permissionsObjects as $permissions)
            <tr class="section-data-container--item" >
              <td>
                <div class="section-body-checkbox__input">
                  <input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $permissions->id }}">
                </div>
              </td>
              <td class="section-tbody--icon section-tbody--show__popup">
                <svg class="icon icon-burger ">
                  <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
                </svg>
                <div class="section-tbody--modal--table">
                  <div class="section-tbody--modal--item">
                    <a href="{{ route('admin.permissions.show',['locale' => app()->getLocale(), 'id' => $permissions->id]) }}"
                      class="links" title="Show Permissions">
                      <svg class="icon icon-paper ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
                      </svg><span>@lang('global.app_view')</span>
                    </a>
                  </div>
                  <div class="section-tbody--modal--item">
                    <a href="{{ route('admin.permissions.edit', ['locale' => app()->getLocale(), 'id' => $permissions->id] ) }}"
                      class="links" title="Edit Permissions">
                      <svg class="icon icon-pen ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
                      </svg><span>@lang('global.app_edit')</span>
                    </a>
                  </div>
                  <div class="section-tbody--modal--item">
                    <form method="POST"
                      action="{!! route('admin.permissions.destroy', ['locale' => app()->getLocale(), 'id' => $permissions->id]) !!}"
                      accept-charset="UTF-8">
                      <input name="_method" value="DELETE" type="hidden">
                      {{ csrf_field() }}
                      <button type="submit" title="Delete Users"
                        onclick="return confirm(&quot;Click Ok to delete Users.&quot;)">
                        <img src="{{asset('admin/delete.svg')}}" alt="for you">
                        <span class="action-label">@lang('global.app_delete')</span>
                      </button>
                    </form>
                  </div>
                </div>
              </td>
              <td>{{ $permissions->title }}</td>
              <td>{{ str_limit($permissions->des, 30)}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      @endif
      <div class="section-bottom-pagination--wrap">
        <div class="section-bottom--delete gogocar-arrow-button">
          <svg class="icon icon-delete ">
            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#delete')}}"></use>
          </svg>
        </div>
        <div class="section-bottom-pagination"></div>
      </div>
    </div>
  </div>
</section>
<section class="section3 section-content-main-mobile--table">
  <div class="section-content--main-mobile__wrap">
    <div class="section-content--main box-bg2 pb-20px">
      <div class="section-top-side box-bg-mobile2">
        <div class="section-block--title">@lang('global.permissions.title')</div>
        <div class="filter-side--right">
          <div class="section-top-added gogocar-arrow-button">
            <svg class="icon icon-plus ">
              <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#plus')}}"></use>
            </svg>
          </div>
        </div>
      </div>
      @if(count($permissionsObjects) == 0)
          <div class="panel-body text-center">
              <h4>@lang('global.no_data').</h4>
          </div>
      @else
      <div class="section-bottom-side--mobile__list">
        <!-- Элемент мобильной таблицы-->
        @foreach($permissionsObjects as $permissions)
        <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
          <div class="section-bottom-side--mobile__item">
            <div class="section-bottom-side--mobile__item--name"> {{ $permissions->title }}</div>
            <div class="section-bottom-side--mobile__item--attr">
              <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                <svg class="icon icon-dots ">
                  <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
                </svg>
                <div class="section-tbody--modal--table__mobile">
                  <div class="section-tbody--modal--item">
                    <a href="{{ route('admin.permissions.show',['locale' => app()->getLocale(), 'id' => $permissions->id]) }}" class="links" title="Show Permissions">
                      <svg class="icon icon-paper ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
                      </svg><span>Просмотр</span>
                    </a>
                  </div>
                  <div class="section-tbody--modal--item">
                    <a href="{{ route('admin.permissions.edit', ['locale' => app()->getLocale(), 'id' => $permissions->id] ) }}" class="links" title="Edit Permissions">
                      <svg class="icon icon-pen ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
                      </svg><span>Изменить</span>
                    </a>
                  </div>
                  <div class="section-tbody--modal--item">
                    <form method="POST"
                      action="{!! route('admin.permissions.destroy', ['locale' => app()->getLocale(), 'id' => $permissions->id]) !!}"
                      accept-charset="UTF-8">
                      <input name="_method" value="DELETE" type="hidden">
                      {{ csrf_field() }}
                      <button type="submit" title="Delete Users"
                        onclick="return confirm(&quot;Click Ok to delete Users.&quot;)">
                        <img src="{{asset('admin/delete.svg')}}" alt="for you">
                        <span class="action-label">@lang('global.app_delete')</span>
                      </button>
                    </form>
                  </div>
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
              <div class="section-mobile-table--item__left">@lang('global.permissions.fields.title'):</div>
              <div class="section-mobile-table--item__right">{{ $permissions->title }}</div>
            </li>
            <li class="section-mobile-table--item">
              <div class="section-mobile-table--item__left">@lang('global.permissions.fields.description'): <span>{{ str_limit($permissions->des, 30)}}</span></div>
            </li>
          </ul>
        </div>
        @endforeach
      </div>
      @endif
      <div class="section-bottom-pagination--wrap mt-20px">
        <!--.section-bottom--delete.gogocar-arrow-button-->
        <!--    +icon('delete')-->
        <div class="section-bottom-pagination"></div>
      </div>
    </div>
  </div>
</section>

<script>
  window.route_mass_crud_entries_destroy = '{{ route('admin.permissions.mass_destroy', app()->getLocale()) }}';

</script>
@include('includes.admin_column_modal')
@include('includes.admin_setting_modal')
@endsection
