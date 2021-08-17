<form method="POST" action="{{ route('review.update',['locale' => app()->getLocale(), 'id' => $review->id]) }}" accept-charset="UTF-8" id="create_reviews_user_form" name="create_reviews_form" class="form-horizontal">
    {{ csrf_field() }}

    <div class="form-group {{ $errors->has('comment') ? 'has-error' : '' }}">
        <label for="comment" class="col-md-2 control-label">@lang('front.review.comment'):</label>
        <div class="col-md-10">
            {{-- <input class="form-control" name="comment" type="text" id="comment" value="{{ old('comment', optional($reviews)->comment) }}" minlength="1" placeholder="Enter comment here..."> --}}
            <textarea class="textarea-input form-control" name="comment" id="comment" rows="4">{{ $review->comment }}</textarea>
            {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
        </div>
    </div>

    <div class="form-group {{ $errors->has('score') ? 'has-error' : '' }}">
        <label for="score" class="col-md-2 control-label">@lang('front.review.score')</label>
        {{-- <div class="col-md-10">
                <input class="form-control" name="score" type="text" id="score" value="{{ old('score', optional($reviews)->score) }}" minlength="1" placeholder="Enter score here...">
        {!! $errors->first('score', '<p class="help-block">:message</p>') !!}
    </div> --}}
    <div class="review-rating col-md-10">
        <div class="" id="rateYo" data-rating="0"></div>
        <input class="rateyo-hidden" type="hidden" id="score" name="score" value="{{ $review->score }}">
        {!! $errors->first('score', '<p class="help-block">:message</p>') !!}
    </div>
    </div>

    <div class="section-footer-side col-lg-9 m-0-auto">
        <div class="section-buttons--wrap d-flex">
            <button class="gogocar-yellow-button upload_btn" type="submit">@lang('global.app_create')</button>
            
            <a class="personal-sidebar--item" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'left_feedback']) }}">
            <div class="gogocar-gray-button upload_btn" style="width: 200px; margin-top: 50px;">
                @lang('global.app_cancel')
            </div>
            </a>
        </div>
    </div>
</form>
<script>
     $('document').ready(function() {
        

        $('document').ready(function() {
            var score = $('#score').val();
            $("#rateYo").rateYo({
                "ratedFill": "#FDAB3E",
                "starWidth": "26px",
                "spacing": "8px",
                "rating": score,
                "precision": 0,
                "starSvg": '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">\n' +
                    '<path d="M19.9713 7.70552C19.9024 7.49337 19.7191 7.33876 19.4984 7.30673L13.2983 6.40576L10.5254 0.787538C10.4268 0.587539 10.223 0.460938 10 0.460938C9.77699 0.460938 9.57332 0.587539 9.47461 0.787538L6.70165 6.40576L0.501673 7.30673C0.281009 7.33876 0.0976117 7.49337 0.0287057 7.70548C-0.0402394 7.91763 0.0172604 8.15048 0.176986 8.30614L4.66322 12.6793L3.60432 18.8544C3.56658 19.0743 3.65697 19.2964 3.8374 19.4275C3.93947 19.5016 4.06037 19.5394 4.18185 19.5394C4.27513 19.5394 4.36873 19.5172 4.45443 19.4721L10 16.5565L15.5453 19.472C15.7428 19.5758 15.982 19.5586 16.1624 19.4275C16.3428 19.2964 16.4333 19.0742 16.3956 18.8543L15.3363 12.6793L19.823 8.3061C19.9827 8.15048 20.0403 7.91763 19.9713 7.70552Z" />\n' +
                    '</svg>',
                }).on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $('#score').val(rating);

            });
        });
    });
</script>