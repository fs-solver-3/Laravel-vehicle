@extends('layouts.app')
@section('title', 'Поездки')
@section('add_css')
<link href="{{asset('css/dashboard.css')}}" rel="stylesheet">
<link href="{{asset('css/plugins/daterangepicker-bs3.css')}}" rel="stylesheet">
@endsection
@section('content')
    <section class="section1">
        <div class="filter-main box-bg2">
            <div class="section-top-side">
                <div class="section-reports-left">
                    <div class="section-block--title">Поездки</div>
                    <div class="section-reports-date-list" id="period_list">
                        <div class="section-reports-date-item date-type" data-type="all" id="all_data">Все дни</div>
                        <div class="section-reports-date-item date-type active" data-type="today">Сегодня</div>
                        <div class="section-reports-date-item date-type" data-type="week">Неделя</div>
                        <div class="section-reports-date-item date-type" data-type="month">Месяц</div>
                        <div class="section-reports-date-item date-type" data-type="year">Год</div>
                    </div>
                </div>
                <div class="section-reports-right">
                    <div class="section-reports-mobile--wrap">
                        <div class="section-reports-mobile section-mobile-calendar__popup">
                            <svg class="icon icon-calendar ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar') }}"></use>
                            </svg>
                        </div>
                        <div class="section-reports-mobile section-dotted-mobile2 mr-0">
                            <svg class="icon icon-sort ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#sort') }}"></use>
                            </svg>
                        </div>
                        <div class="section-upper-modal">
                            <div class="section-reports-date-list section-reports-date-list__mobile">
                               <div class="section-reports-date-item date-type" data-type="all" id="all_data_mobile">Все дни</div>
                                <div class="section-reports-date-item date-type active" data-type="today">Сегодня</div>
                                <div class="section-reports-date-item date-type" data-type="week">Неделя</div>
                                <div class="section-reports-date-item date-type" data-type="month">Месяц</div>
                                <div class="section-reports-date-item date-type" data-type="year">Год</div>
                            </div>
                            
                        </div>
                        <div class="section-upper-modal__calendar">
                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 section-balance-filter--date p-0">
                                <label>Укажите интервал:</label>
                                <div class="section-balance-filter--date__wrap">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pl-0 pr-0">
                                        <div class="section-balance-filter-date__wrap">
                                            <input class="input-main calendar-filter-today calendar-zone-height" type="text">
                                            <div class="section-balance-date--icon">
                                                <svg class="icon icon-calendar ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar') }}"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 section-input-wrap pr-0">
                                        <div class="section-balance-filter-date__wrap">
                                            <input class="input-main calendar-filter calendar-zone-height" type="text">
                                            <div class="section-balance-date--icon">
                                                <svg class="icon icon-calendar ">
                                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar') }}"></use>
                                                </svg>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-reports-right--calendar">
                        <div class="section-reports-right--calendar__date">
                            <div class="srrc-date-1" id="from_date">07 сен 2019</div> - 
                            <div class="srrc-date-2" id="to_date">02 ноя 2019</div>
                        </div>
                        <div class="section-reports-right--calendar__icon">
                            <svg class="icon icon-calendar ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar') }}"></use>
                            </svg>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="trip_filter" value="car_body">
            </div>
        </div>
    </section>
    <div class="section-reports-wrap row m-15 table-content">
        @include('admin.dashboard.trip_template')
    </div>
@endsection
@section('add_custom_script')
{{-- <script src="{{ asset('js/bootstrap.min.js')}}"></script> --}}
{{-- <script src="{{asset('js/jquery-3.4.1.js')}}" type="text/javascript"></script> --}}
<script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
<script src="{{ asset('js/plugins/chartJs/Chart.min.js')}}"></script>
<!-- Morris -->
<script src="{{ asset('js/plugins/morris/raphael-2.1.0.min.js')}}"></script>
<script src="{{ asset('js/plugins/morris/morris.js')}}"></script>

<!-- Custom and plugin javascript -->
{{-- <script src="{{ asset('js/inspinia.js')}}"></script> --}}
<script src="{{ asset('js/plugins/pace/pace.min.js')}}"></script>
<script src="{{ asset('js/bootstrap-datepicker.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/plugins/fullcalendar/moment.min.js')}}"></script>
<script src="{{ asset('js/plugins/daterangepicker/daterangepicker.js')}}" type="text/javascript"></script>
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<!-- Morris demo data-->
{{-- <script src="{{ asset('js/demo/morris-demo.js')}}"></script> --}}
<script>
    // $(function() {
    var start = $('from_date').html();
    var end = $('to_date').html();
    function filter_trip(){
        var from_date = $('#from_date').html();
        var to_date = $('#to_date').html();
        var type = $('#trip_filter').val();
        var user_id = $('#user_id').val();
        var body_type = $('#body_type').val();
        $.ajax({
            type:'GET',
            headers: {
                'X-CSRF-TOKEN': _token
            },
            url: "{{ route('admin.dashboard.trips', app()->getLocale()) }}",
            data: {
                from_date: from_date,
                to_date: to_date,
                type: type,
                user_id: user_id,
                body_type: body_type
            },
            success: (data) => {
                $('.table-content').html(data['template']);
                // $('.table-content-mobile').html(data['template_mobile']);
            },
            error: function(data){
                console.log(data);
            }
        });
    }

    $(document).ready(function() {
        $('.select2').select2();
        window._token = '{{ csrf_token() }}';
        filter_trip();
        var dateString = new Date();
        $('#from_date').datepicker('setDate', dateString);
        setdate('today');

        function setdate(get_data) {
            var dateString = $('#from_date').datepicker("getDate");
            if(get_data == 'today'){
                dateString.setDate(dateString.getDate());
            $('#to_date').datepicker('setDate', dateString);
            }
            else if(get_data == 'week'){
                dateString.setDate(dateString.getDate()+7);
            $('#to_date').datepicker('setDate', dateString);
            }
            else if(get_data == 'month'){
                dateString.setMonth(dateString.getMonth()+1);
            $('#to_date').datepicker('setDate', dateString);
            }
            else if(get_data == 'year'){
                dateString.setYear(dateString.getFullYear()+1);
            $('#to_date').datepicker('setDate', dateString);
            }
            else if(get_data == 'all'){
                $('#to_date').html('');
            }
        }
        $('.date-type').click(function () {
            var get_data = $(this).data('type');
            setdate(get_data);
        });

        $('#all_data').click(function () {
            filter_trip();
        });

        $('#all_data_mobile').click(function () {
            filter_trip();
        });

        $('#from_date').on('DOMSubtreeModified',function() {
            var currentval = $('#from_date').html();
            if(currentval != '' && start != currentval){
                filter_trip();
            }
        })

        $('#to_date').on('DOMSubtreeModified',function() {
            var currentval = $('#to_date').html();
            if(currentval != '' && end != currentval){
                filter_trip();
            }
        })

        $('#to_date').on('change', function(){
            filter_trip();
        });

       $(document).on('click', '.trip_filter', function() {
           $('.trip_filter').removeClass('section-block--title').removeClass('section-reports-date-item');
           $(this).addClass('section-block--title');
           $('#trip_filter').val($(this).data('filter'));
           filter_trip();
            // $('.trip_filter').removeClass(' section-reports-date-item');
       });

       $(document).on('change', '#user_id', function() {
            filter_trip();
       });

       $(document).on('click', '.body-type', function() {
            var body_type = $(this).data('type');
            $('#body_type').val(body_type);
            filter_trip();
            // console.log('body_type', body_type);
        })

        $(document).on('click', '.section-select--input__show', function() {
            $(this).children('.section-select--popup__list').slideToggle(200);
            $(this).children('.section-select--popup__icon').toggleClass('active');
        });
    });
</script>

@endsection