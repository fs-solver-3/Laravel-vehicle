<div class="section-bottom-side--mobile__list">
    <!-- Элемент мобильной таблицы-->
    @if (count($postsObjects) == 0)
    <div class="panel-body text-center">
        <h4>No Review Available.</h4>
    </div>
    @else
    @foreach($postsObjects as $posts)
    <div class="section-bottom-side--mobile__item--wrap section-data-container--item">
        <div class="section-bottom-side--mobile__item">
            <div class="section-bottom-side--mobile__item--name">{{ $posts->name }}</div>
            <div class="section-bottom-side--mobile__item--attr">
                <div class="section-tbody--show__popup section-top-added gogocar-arrow-button">
                    <svg class="icon icon-dots ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#dots')}}"></use>
                    </svg>
                    <div class="section-tbody--modal--table__mobile">
                        <a href="{{ route('admin.posts.show', ['locale' => app()->getLocale(), 'id' => $posts->id]) }}" class="links" title="Edit news">
                            <div class="section-tbody--modal--item">
                                <svg class="icon icon-paper ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
                                </svg><span>@lang('global.app_view')</span>
                            </div>
                        </a>
                        <a href="{{ route('admin.posts.edit', ['locale' => app()->getLocale(), 'id' => $posts->id]) }}" class="links" title="Edit news">
                            <div class="section-tbody--modal--item">
                                <svg class="icon icon-pen ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
                                </svg><span>@lang('global.app_edit')</span>
                            </div>
                        </a>
                        <form method="POST" action="{!! route('admin.posts.destroy', ['locale' => app()->getLocale(), 'id' => $posts->id]) !!}"
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
                <div class="section-mobile-table--item__left">Заголовок:<span class="mr-1">{{ $posts->name }}</span></div>
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