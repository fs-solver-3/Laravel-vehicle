@foreach ($moreNews as $item)
    <a class="blog-main--item__wrap" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $item->page_url] ) }}">
        <div class="blog-main--item">
            @if(is_null($item->image))
            <div class="blog-main--item__img"
                style="background-image: url('/static/img/content/blog/blog1.png');">
            </div>
            @else
            <div class="blog-main--item__img" style="background-image: url('{{ asset($item->image) }}');">
            </div>
            @endif
            <div class="blog-main--item__date">{{ $item->date }}</div>
            <div class="blog-main--item__date--after"></div>
            <div class="blog-main--item__content">
                <h3 class="blog-main--item__title">{{ str_limit($item->title, 40) }}
                </h3>
                <p class="blog-main--item__desc">{{ str_limit($item->description, 220) }}</p>
            </div>
        </div>
    </a>
@endforeach