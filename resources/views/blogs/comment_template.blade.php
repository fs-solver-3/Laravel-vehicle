<div class="blog-comments--title">Комментарии:</div>@forelse($blog->comments as $comment)
<div class="blog-comment--item">
    <div class="blog-comment--item__top">
        @if(is_null(optional($comment->user)->avatar))
         <a class="blog-comment--img" href="/" style="background-image:url('{{asset('static/img/content/drivers-avatar/driver1.png')}}');"></a>
        @else
            <a class="blog-comment--img" href="/" style="background-image:url('{{asset(optional($comment->user)->avatar)}}');"></a>
        @endif
        <div class="blog-comment--item__right">
            <div class="blog-comment--item__name">{{ optional($comment->user)->name }}</div>
            <div class="blog-comment--item__date">
              {{ Helper::niceShort($comment->created_at) }}
            </div>
        </div>
    </div>

    <div class="blog-comment-item__bottom">
        <p>{{ $comment->des }}</p>
        <div class="blog-comment-item-depth--wrap">
          <div class="blog-comment-item-depth--count comment-link">
            <span>Комментарии (<span class="comment-reply-count" style="margin-right: 0px;">{{count($comment->replies)}}</span>)</span>
            <svg class="icon icon-arrow-down ">
              <use xlink:href="static/img/svg/symbol/sprite.svg#arrow-down"></use>
            </svg>
          </div>
          <div class="blog-comment-item-depth2--item">
            <form class="blog_comment_reply blog-comments--form" action="javascript:void(0)" enctype="multipart/form-data">
                <div class="blog-textarea">
                    <textarea class="blog-comments--textarea @if(!Auth::user()) login @endif" name="des" cols="4" rows="3" required placeholder="Ваш комментарий..."></textarea>
                </div>
                <input type="hidden" name="comment_blogs_id" class="blog_id" value="{{ $comment->id }}">
                <div class="button_container">
                    <button type="submit" class="gogocar-yellow-button w-170 m-0">Оставить</button>
                </div>
            </form>
            <div class="replies-block">
                @include('blogs.reply_template')
            </div>
          </div>
        </div>
      </div>
</div>

@empty
@endforelse