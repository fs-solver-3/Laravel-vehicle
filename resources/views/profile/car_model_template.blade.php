{{-- <div class="personal-car-mark--title">Популярные марки</div>
@foreach ($carModels as $item)
<div class="personal-add--car--mark--item"><span class="personal-add--car--mark--name">{{ $item->name }}</span>
    <div class="personal-add--car--mark--arrow">
        <svg class="icon icon-arrow-right3 ">
            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
        </svg>
    </div>
</div>
@endforeach --}}
@if(count($carModels) > 0)
@foreach ($carModels as $key => $item)
    <div class="personal-add--car--mark--item @if(isset($car) && $car->model == $item->name) active @endif" data-model="{{ $item->id }}">
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