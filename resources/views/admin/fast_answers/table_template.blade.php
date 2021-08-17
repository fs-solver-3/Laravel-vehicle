<div class="section-bottom-side--scroll">
    <table class="section-table" data-module="sticky-table" id="tblMain">
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
                <th>ID</th>
                <th>@lang('global.fast_answers.fields.name')</th>
                <th>@lang('global.fast_answers.fields.link')</th>
            </tr>
        </thead>
        <tbody class="section-data-container">
            @foreach ($fastAnswers as $fastAnswer)
                <tr class="section-data-container--item" data-entry-id="{{ $fastAnswer->id }}">
                    <td>
                        <div class="section-body-checkbox__input">
                            <input class="section-body-checkbox" type="checkbox">
                        </div>
                    </td>
                    <td class="section-tbody--icon section-tbody--show__popup">
                        <svg class="icon icon-burger ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#burger') }}"></use>
                        </svg>

                        <div class="section-tbody--modal--table">
                            <a href="{{ route('admin.fast_answers.show', ['locale' => app()->getLocale(), 'id' => $fastAnswer->id]) }}"
                                class="links" title="Show event">
                                <div class="section-tbody--modal--item">
                                    <svg class="icon icon-paper ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#paper') }}">
                                        </use>
                                    </svg><span>@lang('global.app_view')</span>
                                </div>
                            </a>
                            <a href="{{ route('admin.fast_answers.edit', ['locale' => app()->getLocale(), 'id' => $fastAnswer->id]) }}"
                                class="links" title="Edit event">
                                <div class="section-tbody--modal--item">
                                    <svg class="icon icon-pen ">
                                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#pen') }}">
                                        </use>
                                    </svg><span>@lang('global.app_edit')</span>
                                </div>
                            </a>
                            <form method="POST"
                                action="{!!  route('admin.fast_answers.destroy', ['locale' => app()->getLocale(), 'id' => $fastAnswer->id]) !!}"
                                accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}
                                <button type="submit" title="Delete event"
                                    onclick="return confirm(&quot;Click Ok to delete event.&quot;)">
                                    <div class="section-tbody--modal--item">
                                        <svg class="icon icon-delete-red ">
                                            <use
                                                xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#delete-red') }}">
                                            </use>
                                        </svg><span>@lang('global.app_delete')</span>
                                    </div>
                                </button>
                            </form>
                        </div>
                    </td>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $fastAnswer->name }}</td>
                    <td>{{ optional($fastAnswer->demandCategory)->name }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="section-bottom-pagination--wrap">
    <div class="section-bottom--delete gogocar-arrow-button">
        <svg class="icon icon-delete ">
            <use xlink:href="{{ asset('static/img/svg/symbol/sprite_admin.svg#delete') }}"></use>
        </svg>
    </div>
    <div class="section-bottom-pagination"></div>
</div>
