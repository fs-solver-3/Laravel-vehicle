<div class="section-bottom-side--scroll">
    @if(count($listings) == 0)
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
                    <svg class="icon icon-settings " >
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#settings')}}"></use>
                    </svg>
                </th>
                <th>ID</th>
                <th>@lang('global.listing.fields.date')</th>
                <th>@lang('global.listing.fields.author')</th>
                <th>@lang('global.listing.fields.location')</th>
                <th>@lang('global.listing.fields.destination')</th>
                <th>@lang('global.listing.fields.passenger_number')</th>
                {{-- <th>Пассажиры</th> --}}
                <th>@lang('global.listing.fields.car')</th>
                <th>@lang('global.listing.fields.truck')</th>
                <th>@lang('global.listing.fields.collection') (UZS)</th>
            </tr>
        </thead>
        <tbody class="section-data-container">
            @foreach($listings as $listing)
            <tr class="section-data-container--item">
                <td>
                    <div class="section-body-checkbox__input">
                        <input class="section-body-checkbox" type="checkbox" data-entry-id="{{ $listing->id }}">
                    </div>
                </td>
                <td class="section-tbody--icon section-tbody--show__popup">
                    <svg class="icon icon-burger ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#burger')}}"></use>
                    </svg>
                    <div class="section-tbody--modal--table">
                        <a href="{{ route('admin.listing.show', ['locale' => app()->getLocale(), 'id' => $listing->id]) }}"
                            class="links" title="Show listing">
                            <div class="section-tbody--modal--item">
                                <svg class="icon icon-paper ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#paper')}}"></use>
                                </svg><span>@lang('global.app_view')</span>
                            </div>
                        </a>
                        <a href="{{ route('admin.listing.edit', ['locale' => app()->getLocale(), 'id' => $listing->id]) }}"
                            class="links" title="Edit listing">
                            <div class="section-tbody--modal--item">
                                <svg class="icon icon-pen ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#pen')}}"></use>
                                </svg><span>@lang('global.app_edit')</span>
                            </div>
                        </a>
                        <form method="POST"
                            action="{!! route('admin.listing.destroy', ['locale' => app()->getLocale(), 'id' => $listing->id]) !!}"
                            accept-charset="UTF-8">
                            <input name="_method" value="DELETE" type="hidden">
                            {{ csrf_field() }}
                            <button type="submit" title="Delete trip"
                                onclick="return confirm(&quot;Click Ok to delete trip.&quot;)">
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
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $listing->starting_date }}</td>
                <td><a class="color-yellow" href="{{ route('admin.users.edit', ['locale' => app()->getLocale(), 'id' => optional($listing->user)->id, 'tab' => 'main']) }}">{{ optional($listing->user)->name }}</a></td>
                <td>{{ optional($listing->location_address)->city }} {{ optional($listing->location_address)->street }}
                    {{ optional($listing->location_address)->district }}</td>
                <td>
                    {{ optional($listing->destination_address)->city }}
                    {{ optional($listing->destination_address)->street }}
                    {{ optional($listing->destination_address)->district }}
                </td>
                <td>{{ $listing->max_occupants }}</td>
                {{-- <td><a class="color-yellow" href="/">Глеб Кулагин,</a><a class="color-yellow" href="/">Эдуард
                        Мельников</a></td> --}}
                <td>
                    {{ optional($listing->car)->name }}
                </td>
                <td>{{ optional($listing->truck)->name }}</td>
                <td>{{ $listing->price_per_seat }}</td>
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