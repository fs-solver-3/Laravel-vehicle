<div class="section-bottom-side--scroll">
    @if(count($postsObjects) == 0)

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
                <th>@lang('global.post.fields.name')</th>
                <th>@lang('global.date')</th>
                <th>@lang('global.news.fields.image')</th>
                <th>@lang('global.posts.fields.publish')</th>
            </tr>
        </thead>
        <tbody class="section-data-container">
            @foreach($postsObjects as $posts)
            <tr class="section-data-container--item">
                <td>
                    <div class="section-body-checkbox__input">
                        <input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $posts->id }}">
                    </div>
                </td>
                <td class="section-tbody--icon section-tbody--show__popup">
                    <svg class="icon icon-burger ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
                    </svg>
                    <div class="section-tbody--modal--table">
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
                </td>
                <td>{{ $posts->name }}</td>
                <td>{{date('d.m.yy',strtotime($posts->created_at))}}</td>
                <td>
                    @if($posts->publish)
                     Да
                    @else
                     Нет    
                    @endif
                 </td>
                 <td>
                    @if(!is_null($posts->image))
                        <div class="table-td--img"
                            style="background-image:url('{{ asset($posts->image) }}');">
                        </div>
                    @endif
                </td>
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