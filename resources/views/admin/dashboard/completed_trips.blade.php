@extends('layouts.app')
@section('title', 'Завершено поездок')
@section('add_css')
<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
@endsection
@section('content')
<section class="section-1">
    <div class="filter-main box-bg2">
        <div class="section-top-side">
            <div class="section-block--title">Завершено поездок</div>
        </div>
        <div class="section-bottom-side filter-balance-bottom row m-0">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0">
                <label>Пользователь:</label>
                <select class="form-control select2" id="user_id">
                </select>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                <label>Кол-во поездок:</label>
                <input class="input-main" type="number" placeholder="" id="max_trips">
            </div>
        </div>
    </div>
</section>
<div id="completed_template">
    @include('admin.dashboard.completed_trips_template')
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
            var max_trips = $('#max_trips').val();
        $.ajax({
            type:'GET',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            url: "{{ route('admin.dashboard.completed_trips', app()->getLocale()) }}",
            data: {
                user_id: user_id,
                max_trips: max_trips
            },
            success: (data) => {
                $('#completed_template').html(data['template']);
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
        $("#max_trips").keyup(function(){
            filter_trip();
        });
        $(document).on("click", '.section-arrow-mobile-table', function(){
            $(this).toggleClass('active');
            $(this).parents('.section-bottom-side--mobile__item').next().slideToggle(200).css('display','flex');
        });
        $(document).on("click", '.section-tbody--show__popup', function(){
            $('.section-tbody--modal--table,.left-and-right-side').addClass('active');
            $(this).children('.section-tbody--modal--table__mobile').addClass('active');
        });
    });
</script>
@endsection