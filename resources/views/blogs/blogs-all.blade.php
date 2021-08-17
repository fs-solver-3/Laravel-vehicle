@extends('layouts.user_app')
@section('content')
    <div class="content">
        <section class="breadcrumbs breadcrumbs-public-pages">
            <div class="container">
                <ul class="breadcrumbs--list"><a class="breadcrumbs--item" href="/">Главная
                        <svg class="icon icon-arrow-right3 ">
                            <use xlink:href="static/img/svg/symbol/sprite.svg#arrow-right3"></use>
                        </svg></a><a class="breadcrumbs--item" href="/">Найти поездку
                        <svg class="icon icon-arrow-right3 ">
                            <use xlink:href="static/img/svg/symbol/sprite.svg#arrow-right3"></use>
                        </svg></a><a class="breadcrumbs--item" href="/">Пассажирские поездки</a></ul>
            </div>
        </section>
        <section class="blog-page pt-0">
            <div class="container">
                <div class="blog-main--wrap">
                    <div class="blog-main-list">
                        <div class="blog-main--top">
                            <h3 class="blog-main--title">Блог</h3>
                            <ul class="blog-main--tabs nav-pills nav">
                                <div class="blog-main--link tab-item active" data-tab="blog-news">Новости</div>
                                <div class="blog-main--link tab-item" data-tab="blog-articles">Статьи</div>
                                <div class="blog-main--link tab-item" data-tab="blog-otvet">Ответы</div>
                            </ul>
                        </div>
                        <div class="blog-main--tabs blog-main-list blog-main-list tab-content clearfix">
                            <div class="blog-main-content--tab blog-news tab-pane active" id="blog-news">
                                @if(count($blogsObjects) > 0)
                                    <div class="blog-main--bottom" id="news-blocks">
                                        @foreach ($blogsObjects as $item)
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
                                    </div>
                                    <input type="hidden" value="{{$postsTotal}}" id="news_total">
                                @else
                                    <p class="gogocar-blog--desc">@lang('global.no_data')</p>
                                @endif
                                @if(count($blogsObjects) < $newsTotal)
                                <div class="gogocar-yellow-button go-read-all-articles" id="load_more_news">Показать еще</div>
                                @endif
                            </div>
                            <div class="blog-main-content--tab tab-pane blog-articles" id="blog-articles">
                                @if(count($postsObjects) > 0)
                                <div class="blog-main--bottom row" id="posts-blocks">
                                    @foreach ($postsObjects as $item)
                                    <a class="blog-main--item__wrap" href="{{ route('post', ['locale' => app()->getLocale(), 'id' => $item->url])}}">
                                        <div class="blog-main--item">
                                            <div class="blog-main--item__img"
                                                style="background-image: url('/static/img/content/blog/blog1.png');"></div>
                                            <div class="blog-main--item__date">{{ $item->date }}</div>
                                            <div class="blog-main--item__date--after"></div>
                                            <div class="blog-main--item__content">
                                                <h3 class="blog-main--item__title">{{ str_limit($item->short_des, 40) }}
                                                </h3>
                                                <p class="blog-main--item__desc">{{ str_limit($item->long_des, 100) }}
                                                    ...</p>
                                            </div>
                                        </div>
                                    </a>
                                    @endforeach
                                </div>
                                <input type="hidden" value="{{$postsTotal}}" id="posts_total">
                                @else
                                <p class="gogocar-blog--desc">@lang('global.no_data')</p>
                                @endif
                                @if(count($postsObjects) < $postsTotal)
                                <div class="gogocar-yellow-button go-read-all-articles" id="load_more_posts">Показать еще</div>
                                @endif
                            </div>
                            <div class="blog-main-content--tab tab-pane blog-otvet" id="blog-otvet">
                                <p class="gogocar-blog--desc">@lang('global.no_data')</p>
                                {{-- <div class="blog-main--bottom row">
                                </div>
                                <div class="gogocar-yellow-button go-read-all-articles">Показать еще</div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<script>
    $(document).ready(function(){
        $('.blog-main--tabs .tab-item').click(function(){
            $('.blog-main--tabs .blog-main--link').removeClass('active');
            $(this).tab('show');
            let id = $(this).data('tab');
            $('.blog-main--tabs .blog-main-content--tab').removeClass('active');
            $('#' + id).addClass('active');
        })

        $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function load_data() {
            var totalCurrentResult = $("#blog-news .blog-main--item__wrap").length;
            let newsTotal = $('#news_total').val();
            if(newsTotal < totalCurrentResult || newsTotal == totalCurrentResult){
                $('#load_more_news').hide();
            }else{
                $.ajax({
                    url: "{{ route('more_news')}}", 
                    method: "POST", 
                    data: {
                        skip: totalCurrentResult
                    }, 
                    success: function(data) {
                        $('#news-blocks').append(data);
                        let total = $("#blog-news .blog-main--item__wrap").length;
                        if(newsTotal < total || newsTotal == total){
                            $('#load_more_news').hide();
                        }else{
                            $('#load_more_news').html('Показать еще');
                        }
                    }
                })
            }
        }

        function load_data_posts() {
            var totalCurrentResult = $("#blog-articles .blog-main--item__wrap").length;
            var postsTotal = $('#posts_total').val();
            if(postsTotal < totalCurrentResult || postsTotal == totalCurrentResult){
                $('#load_more_posts').hide();
            }else{
                $.ajax({
                    url: "{{ route('more_posts')}}", 
                    method: "POST", 
                    data: {
                        skip: totalCurrentResult
                    }, 
                    success: function(data) {
                        $('#posts-blocks').append(data);
                        let total = $("#blog-articles .blog-main--item__wrap").length;
                        if(postsTotal < total || postsTotal == total){
                            $('#load_more_posts').hide();
                        }else{
                            $('#load_more_posts').html('Показать еще');
                        }
                    }
                })
            }
        }

        $(document).on('click', '#load_more_news', function() {
            $('#load_more_news').html('<b>Loading...</b>');
            load_data();
        });

        $(document).on('click', '#load_more_posts', function() {
            $('#load_more_posts').html('<b>Loading...</b>');
            load_data_posts();
        });

        });
    })
</script>
@endsection
