<div class="section-bottom-side--mobile__list">
    <!-- Элемент мобильной таблицы-->
    @if (count($blogsObjects) == 0)
    <div class="panel-body text-center">
        <h4>@lang('global.no_data').</h4>
    </div>
    @else
        @foreach($blogsObjects as $blogs)
            <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
                <div class="section-bottom-side--mobile__item">
                    <div class="section-bottom-side--mobile__item--name">{{ $blogs->title }}</div>
                    <div class="section-bottom-side--mobile__item--attr">
                        <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                            <svg class="icon icon-dots ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
                            </svg>
                            <div class="section-tbody--modal--table__mobile">
                                <a href="{{ route('admin.news.show', ['locale' => app()->getLocale(), 'id' => $blogs->id]) }}" class="links" title="Edit news">
                                    <div class="section-tbody--modal--item">
                                        <svg class="icon icon-paper ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
                                        </svg><span>@lang('global.app_view')</span>
                                    </div>
                                </a>
                                <a href="{{ route('admin.news.edit', ['locale' => app()->getLocale(), 'id' => $blogs->id]) }}" class="links" title="Edit news">
                                    <div class="section-tbody--modal--item">
                                        <svg class="icon icon-pen ">
                                            <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
                                        </svg><span>@lang('global.app_edit')</span>
                                    </div>
                                </a>
                                <form method="POST"
                                    action="{!! route('admin.news.destroy', ['locale' => app()->getLocale(), 'id' => $blogs->id]) !!}"
                                    accept-charset="UTF-8">
                                    <input name="_method" value="DELETE" type="hidden">
                                    {{ csrf_field() }}
                                    <button type="submit" title="Delete trip"
                                        onclick="return confirm(&quot;Click Ok to delete News .&quot;)">
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
                        <div class="section-mobile-table--item__left">@lang('global.news.fields.name'):<span class="mr-1">25 миллионов пользователей в России!</span></div>
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