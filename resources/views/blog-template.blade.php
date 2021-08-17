@extends('layouts.user_app')
@section('content')
<div class="content">
    <section class="breadcrumbs breadcrumbs-public-pages">
      <div class="container">
        <ul class="breadcrumbs--list">
            <a class="breadcrumbs--item" href="/">@lang('front.news.home')
                <svg class="icon icon-arrow-right3 ">
                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                </svg>
            </a>
            <a class="breadcrumbs--item" href="{{ route('news-all', app()->getLocale()) }}">@lang('front.index_page.news')
                <svg class="icon icon-arrow-right3 ">
                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right3') }}"></use>
                </svg>
            </a>
            {{-- <a class="breadcrumbs--item" href="{{ route('choosetype', app()->getLocale()) }}">@lang('front.news.suggest_trip')</a> --}}
        </ul>
      </div>
    </section>
    <section class="blog-page pt-0">
      <div class="container">
        <div class="blog-info--wrap">
          <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 blog-info-content--col pl-0">
            <h3 class="blog-main--title fs-25">{{ $blog->h1_header }}</h3>
            <div class="blog-info-article--date">
              <div class="blog-info-date--icon">
                <img src="{{asset('static/img/general/calendar.svg')}}">
              </div>
              <div class="blog-info-date">
                @php
                    $ru_month = array( 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь' );
                    $en_month = array( 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December' );

                    $ru_weekdays = array( 'Понедельник', 'Вторник', 'Среда', 'Четверг', 'Пятница', 'Суббота', 'Воскресенье' );
                    $en_weekdays = array( 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday' );

                    $date = date('F', strtotime ( $blog->date )); 
                    $date_month = str_replace($en_month, $ru_month, $date);
                    $date_day = str_replace($en_weekdays, $ru_weekdays, date('l', strtotime ( $blog->date )));
                @endphp  
                <span>{{ date('j', strtotime ( $blog->date )) }}  {{$date_month}}, {{ date('yy', strtotime ( $blog->date )) }}</span>
                </div>
            </div>
            <div class="blog-info-content--main">
              <p>{{$blog->short_des}}</p>
              @if(is_null($blog->image))
                <img src="{{asset('static/img/content/blog/blog4.png')}}" alt="news" class="news_img">
              @else
                <img src="{{asset($blog->image)}}" alt="news" class="news_img">
              @endif
              <h5>{{$blog->h1}}</h5>
              <p>{!! $blog->seo_text !!}</p>
              <div class="blog-comments--wrap">
                <div class="blog-comments--title">@lang('front.news.our_comment'):</div>
                  <div class="blog-comments--top">
                    <a class="blog-comments--link__profile" href="/">
                        @if(Auth::user() && !is_null(Auth::user()->avatar))
                            <img src="{{asset(Auth::user()->avatar)}}" alt="news" >
                        @else
                            <img src="{{asset('static/img/content/drivers-avatar/driver1.png')}}">
                        @endif
                    </a>
                    <div class="blog-comments--name">@if(Auth::user()) {{ Auth::user()->name }} @endif</div>
                  </div>
                  <form id="blog_comment" class="blog-comments--form">
                    <div class="blog-textarea">
                        <textarea class="blog-comments--textarea @if(!Auth::user()) login @endif"  cols="4" rows="4" placeholder="Комментарий..." required></textarea>
                    </div>
                    <input type="hidden" id="blog_id" value="{{ $blog->id }}">
                    <button class="gogocar-yellow-button w-170 m-0" type="submit">@lang('front.news.submit')</button>
                  </form>
                <div class="blog-block blog-comments--list" id="comment_lists">
                    @include('blogs.comment_template')
                </div>
              </div>
            </div>
          </div>
          @if(count($relatedNews))
          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 blog-info-sidebar--col pr-0">
            <div class="blog-info-sidebar--sticky">
              <div class="blog-info-sidebar--sticky--wrap">
                <div class="blog-info-sidebar--title">@lang('front.news.related')</div>
                <div class="blog-info-sidebar--list">
                    @foreach($relatedNews as $blogs)
                    <a class="blog-info-sidebar--item" href="{{ route('blog', ['locale' => app()->getLocale(), 'id' => $blogs->page_url] ) }}">
                        @if(is_null($blogs->image))
                        <img src="{{asset('static/img/content/blog/blog4.png')}}" alt="news" class="news_img">
                        @else
                        <img src="{{asset($blogs->image)}}" alt="news" class="news_img">
                        @endif
                        <div class="blog-info-sidebar--item__name">{{ str_limit($blogs->title, 40)}}
                        </div>
                    </a>
                    @endforeach
                </div>
              </div>
              <a href="{{route('news-all',  app()->getLocale())}}">
                <div class="gogocar-yellow-button">@lang('front.news.all_news')</div>
              </a>
            </div>
          </div>
          @endif
        </div>
      </div>
    </section>
    <div class="modal fade" id="popup-input-value-3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
            <div class="modal-content popup-content">
                <div class="popup-covid--wrap popup-icon-size">
                    <p class="popup-trip-finish">@lang('message.commented_already')</p>
                    <div class="gogocar-yellow-button w-170" data-dismiss="modal">@lang('front.profile.photo_tab.ok')</div>
                </div>
            </div>
        </div>
    </div>
  </div>
  <script>
    $( document ).ready(function() {
        $('.login-course').on('click', function (event) {
            event.stopPropagation();
            $('#authorization_window').modal('show');
        });
        
        $('.blog-textarea textarea').focus(function(){
            if($(this).hasClass('login'))
            $('#popup-login').modal('show');
        });

        // blog template

        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    // comment form
    $(document).on("submit", '#blog_comment', function(e){
        e.preventDefault();
        let des = $("#blog_comment textarea").val();
        let blog_id = $("#blog_comment #blog_id").val();
        if(des == ""){
            return
        }
        $.ajax({
            type: 'POST', 
            url: '{{ route('blog_comment') }}', 
            data: {des: des, blog_id: blog_id}, 
            success: function(data) {
                if(data.state != 'error'){
                    $("#blog_comment textarea").val('');
                    $('#comment_lists').html('');
                    $('#comment_lists').html(data);
                }
                else{
                    $('#popup-input-value-3').modal('show');
                    // alert('Your commented this blog before');
                }
            }
            , error: function(XMLHttpRequest, textStatus, errorThrown) {
                $('#modal .error-block span strong').html(data.message).css('color', '#dc3545');
                $('#modal .error-block span').show();
            }

        });
    });


    // comment reply form
    $(document).on("submit", '.blog_comment_reply', function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            type:'POST',
            url: '{{ route("comment-reply") }}',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
                $(this).children().find('textarea').val('');
                $(this).next().html('');
                let reply_counts = $(this).parent().siblings('.comment-link').find('.comment-reply-count').html();
                reply_counts = parseInt(reply_counts) + 1;
                $(this).parent().siblings('.comment-link').find('.comment-reply-count').html(reply_counts);
                $(this).next().html(data);
                // if(data.state == 'success'){
                // }
                // else{
                //     alert('Update failed');
                // }
            },
            error: function(data){
                console.log(data);
            }
        });
    });


    });
</script>
@endsection
