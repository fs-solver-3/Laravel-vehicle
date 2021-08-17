@if(count($comment->replies) > 0)
    @foreach ($comment->replies as $item)
    <div class="blog-comment--item">
        <div class="blog-comment--item__top">
            @if(is_null($item->user->avatar))
                <a class="blog-comment--img" href="/" style="background-image:url('{{asset('static/img/content/drivers-avatar/driver1.png')}}');"></a>
            @else
                <a class="blog-comment--img" href="/" style="background-image:url('{{asset($item->user->avatar)}}');"></a>
            @endif
          <div class="blog-comment--item__right">
            <div class="blog-comment--item__name">{{ $item->user->name }}</div>
            <div class="blog-comment--item__date">
              {{ Helper::niceShort($item->created_at) }}
            </div>
          </div>
        </div>
        <div class="blog-comment-item__bottom">
          <p> {{ $item->des }} </p>
        </div>
      </div>
    @endforeach
@endif