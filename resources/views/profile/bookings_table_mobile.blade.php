
<li class="personal-pay--header--item">
    <div class="personal-pay--header--item__name">Дата/Детали</div>
    <ul class="personal-pay--header--childen">
        @foreach($bookings as $item)
        @if(!is_null($item->listing))
        <li class="personal-pay--header--childen__item">{{ $item->listing->sourcecity->city }} → {{ $item->listing->destinationcity->city }} <span
                class="pp-date">{{ date('d.m.Y', strtotime($item->created_at)) }}</span></li>
        @endif
        @endforeach
    </ul>
</li>
<li class="personal-pay--header--item text-right">
    <div class="personal-pay--header--item__name">Описание/Сумма</div>
    <ul class="personal-pay--header--childen">
        @foreach($bookings as $item)
        @if(!is_null($item->listing))
        <li class="personal-pay--header--childen__item">В одну сторону <span class="pp-price money" data-currency-rub="{{Helper::convertCurrency($item->amount, 'UZS', 'RUB')}}" data-currency-uzs="{{$item->amount}}">{{ round($item->amount, 2) }}
                UZS</span></li>
        @endif
        @endforeach
    </ul>
</li>