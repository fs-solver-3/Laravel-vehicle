@if(count($demandObjects) > 0)
@foreach($demandObjects as $item)

<tr class="@if($item->archive) in @else out  @endif personal-pay--header--childen__item">
    <td class="support_links " data-id="{{ $item->id }}">
        <span>
            <a href="{{ route('profile', ['locale' => app()->getLocale(), 'demand_id' => $item->id]) }}" class="links" title="support">
                {{ $item->name }}
            </a>
        </span>
        <chat-notification-component 
            type="support" 
            demandid="{{ $item->id }}"
        >
        </chat-notification-component>
    </td>
    <td>
        {{-- {{ $item->created_at }} --}}
        {{ date('d.m.yy h:i', strtotime($item->created_at)) }}
    </td>
    <td class="@if($item->indicatorUser() > 1) pg-balence @else pp-price @endif">
        @if($item->indicatorUser() > 1)
            Ожидается ответ от пользователя
        @else
            Ожидается ответ от поддержки
        @endif
    </td>
</tr>
@endforeach
@else
    <tr>
        <td colspan="3" class="text-center">@lang('global.no_data')</td>
    </tr>
@endif