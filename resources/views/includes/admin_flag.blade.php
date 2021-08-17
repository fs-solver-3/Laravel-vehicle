
<ul class="choise-lang--list">
    <li class="choise-lang--item" data-value='{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), 'ru')}}'>
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-ru.png') }}');">
        </div>
        <div class="choise-lang--item__text">RU</div>
    </li>
    <li class="choise-lang--item" data-value="{{ route(\Illuminate\Support\Facades\Route::currentRouteName(), 'uz')}}">
        <div class="choise-lang--item__img"
            style="background-image:url('{{ asset('/static/img/general/lang/lang-uz.png') }}');">
        </div>
        <div class="choise-lang--item__text">UZ</div>
    </li>
</ul>