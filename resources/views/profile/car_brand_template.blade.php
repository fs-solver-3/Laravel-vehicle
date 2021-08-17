{{-- <div class="personal-car-mark--title">Популярные марки</div>
@foreach ($carBrands as $item)
    <div class="personal-add--car--mark--item"><span class="personal-add--car--mark--name">{{ $item->name }}</span>
        <div class="personal-add--car--mark--arrow">
            <svg class="icon icon-arrow-right3 ">
                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
            </svg>
        </div>
    </div>
@endforeach --}}
@if(count($carBrands) > 0)
@foreach ($carBrands as $key => $item)
    <div class="personal-add--car--mark--item @if(isset($car) && $car->name == $item->name) active @endif" data-brand="{{ $item->id }}">
        <span class="personal-add--car--mark--name">{{ $item->name }}</span>
        <div class="personal-add--car--mark--arrow">
            <svg class="icon icon-arrow-right3 ">
                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
            </svg>
        </div>
    </div>
@endforeach
@else
<span class="brand-no-result personal-add--car--mark--name">Безрезультатно</span>
@endif