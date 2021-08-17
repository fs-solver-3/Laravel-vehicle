@foreach($demandObjects as $item)
<li class="personal-pay--header--childen__item">
    <a href="{{ route('profile', ['locale' => app()->getLocale(), 'demand_id' => $item->id]) }}" class="links chat-fixed--click2"
        title="support">
        {{ $item->name }}
    </a>
    <div class="personal-pay--header--child"><span class="pp-date">{{ date('d.m.yy', strtotime($item->created_at)) }} {{ date('h.i', strtotime($item->created_at)) }}</span>
        <div class="font-family-m-500 @if($item->indicatorUser() > 1) pg-balence @else pp-price @endif">
            @if($item->indicatorUser() > 1) Ожидается ответ от пользователя @else Ожидается ответ от поддержки @endif
        </div>
    </div>
</li>
@endforeach