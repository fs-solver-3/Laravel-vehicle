<div class="section-bottom-side--scroll">
    @if(count($usersObjects) == 0)
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
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#settings') }}"></use>
                    </svg>
                </th>
                <th>@lang('global.users.fields.login')</th>
                <th>@lang('global.users.fields.activity')</th>
                <th>@lang('global.users.fields.date_of_change')</th>
                <th>@lang('global.users.fields.name')</th>
                <th>@lang('global.users.fields.surname')</th>
                <th>@lang('global.users.fields.email')</th>
                <th>@lang('global.users.fields.phone')</th>
                <th>@lang('global.users.fields.last_login')</th>
                <th>@lang('global.users.fields.id')</th>
                <th>@lang('global.users.fields.role')</th>
            </tr>
        </thead>
        <tbody class="section-data-container">
            @foreach($usersObjects as $users)
            <tr class="section-data-container--item">
                <td>
                    <div class="section-body-checkbox__input">
                        <input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $users->id }}">
                    </div>
                </td>
                <td class="section-tbody--icon section-tbody--show__popup">
                    <svg class="icon icon-burger ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#burger') }}"></use>
                    </svg>
                    <div class="section-tbody--modal--table">
                        <div class="section-tbody--modal--item">
                            <a href="{{ route('admin.users.chat', ['locale' => app()->getLocale(), 'id' => $users->id]) }}">
                                <svg class="icon icon-chat ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#chat') }}">
                                    </use>
                                </svg><span>@lang('global.message')</span>
                            </a>
                        </div>
                        <div class="section-tbody--modal--item">
                            <a href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => $users->id, 'tab' => 'main']) }}" class="links" title="Edit Users">
                                <svg class="icon icon-pen ">
                                    <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}"></use>
                                </svg><span>@lang('global.app_edit')</span>
                            </a>
                        </div>
                        <div class="section-tbody--modal--item">
                            <form method="POST" action="{!! route('admin.users.destroy', ['locale' => app()->getLocale(), 'id' => $users->id]) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}
                                <button type="submit" title="Delete Users" onclick="return confirm(&quot;Click Ok to delete Users.&quot;)">
                                    <img src="{{asset('admin/delete.svg')}}" alt="for you">
                                    <span class="action-label">@lang('global.app_delete')
                                </button>
                            </form>
                        </div>
                        @can('login_as_user')
                        <div class="section-tbody--modal--item">
                            <form action='{{ route("loginAs") }}' method='post'>
                                {{ csrf_field() }}
                                <input name="user_id" value="{{ $users->id }}" type="hidden">
                                <button type="submit" onclick="event.stopPropagation();">
                                    <svg class="icon icon-pen ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}">
                                        </use>
                                    </svg><span>@lang('global.users.fields.auth')</span>
                                </button>
                            </form>
                        </div>
                        @endcan
                    </div>
                </td>
                <td>{{ $users->email }}</td>
                <td>
                    @if($users->active)
                    <span class="checkbox-icon">Да</span>
                    @else
                    <span class="uncheckbox-icon">нет</span>
                    @endif
                </td>
                <td>{{ $users->created_at }}</td>
                <td>{{ $users->name }}</td>
                <td>{{ $users->surname }}</td>
                <td>{{ $users->email }}</td>
                <td>{{ $users->phone }}</td>
                <td>{{ $users->last_login_at }}</td>
                <td>{{ $users->id }}</td>
                @if(is_null($users->role))
                <td></td>
                @else
                @foreach ($users->role as $singleRole)
                <td data-search="{{ $singleRole->title }}">
                    <span class="label label-info label-many">{{ $singleRole->title }}</span>
                </td>
                @endforeach
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
