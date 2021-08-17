@extends('layouts.app')
@section('add_css')
<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/daterangepicker-bs3.css')}}" rel="stylesheet">
<script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script>
@endsection
@section('admin_lang')
@include('includes.admin_flag')
@endsection
@section('content')
<section class="section-1">
    <div class="filter-main box-bg2">
        <div class="section-top-side">
            <div class="section-block--title">Отчет по отзывам</div>
            <div class="filter-side--right">
                <div class="filter-settings gogocar-arrow-button">
                    <svg class="icon icon-settings ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#settings')}}"></use>
                    </svg>
                </div>
                <div class="filter-show-and-hide gogocar-arrow-button">
                    <svg class="icon icon-arrow-down-white ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite_admin.svg#arrow-down-white')}}"></use>
                    </svg>
                </div>
            </div>
        </div>
        <div class="section-bottom-side filter-balance-bottom row m-0">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                <label>Пользователь:</label>
                <select class="form-control select2" id="user_id">
                </select>
                {{-- <div class="section-select--input2 section-select--input__show"><span>Пользователь...</span>
                    <div class="section-select--popup__icon">
                        <svg class="icon icon-arrow-down-white ">
                            <use xlink:href="static/img/svg/symbol/sprite.svg#arrow-down-white"></use>
                        </svg>
                    </div>
                    <ul class="section-select--popup__list section-select--popup__list__show">
                        <li class="section-select--popup__item2 hover-text-color">1</li>
                        <li class="section-select--popup__item2 hover-text-color">2</li>
                        <li class="section-select--popup__item2 hover-text-color">3</li>
                    </ul>
                </div> --}}
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                <label>Поездка:</label>
                <input class="input-main" type="text" placeholder="" id="location">
            </div>
        </div>
    </div>
</section>
<div id="review_container">
    @include('admin.dashboard.reviews_template')
</div>

@endsection
@section('add_custom_script')
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script>
    function filter_trip(){
        if($('#user_id').parent().css('display') != 'none')
        {
            var user_id = $('#user_id').val();
        }
        var location = $('#location').val();
        $.ajax({
            type:'GET',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            url: "{{ route('admin.dashboard.reviews', app()->getLocale()) }}",
            data: {
                user_id: user_id,
                location: location
            },
            success: (data) => {
                $('#review_container').html(data['template']);
                // $('.table-content-mobile').html(data['template_mobile']);
            },
            error: function(data){
                console.log(data);
            }
        });
    }
    $(document).ready(function() {
        $('.select2').select2();
        $('#user_id').select2({
            minimumInputLength: 1, 
            ajax: {
                url: '{{ route("api.users.search") }}', 
                dataType: 'json', 
            }, 
        });
        window._token = '{{ csrf_token() }}';
        $("#user_id").change(function(){
            filter_trip();
        });
        $("#location").keyup(function(){
            filter_trip();
        });
    });
</script>
@endsection