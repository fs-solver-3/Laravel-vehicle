<div class="personal-content--main">
    @if(!$request->get('demand_id'))
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.support_tab.support')</h3>
    </div>
    <div class="personal-content--body">
        <div class="personal-pay--filter--wrap gogocar-box">
            <div class="personal-pay--filter--top">
                <div class="personal-filter--title">@lang('front.profile.support_tab.filter')</div>
                <div class="personal-filter--icon">
                    <svg class="icon icon-arrow-right ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                    </svg>
                </div>
            </div>
            <div class="personal-pay--filter--top personal-pay--filter--top--mobile">
                <div class="personal-filter--title">@lang('front.profile.support_tab.filter')</div>
                <div class="gogocar-yellow-icons">
                    <svg class="icon icon-filter ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#filter') }}"></use>
                    </svg>
                </div>
            </div>
            <div class="personal-pay--filter--bottom--footer">
                <div class="personal-pay--filter--bottom">
                    <div class="personal-pay--filter--bottom--wrap personal-support-filter--wrap row">
                        <div class="col-xl-6 col-lg-6 personal-mb">
                            <div class="all-trip--popup__col">
                                <label>@lang('front.profile.support_tab.title'):</label>
                                <input class="gogocar-input--filter personal-content--input" type="text"
                                    placeholder="@lang('front.profile.support_tab.title')..." id="demond_id_support">
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 personal-mb">
                            <div class="all-trip--popup__col personal-content--select">
                                <label>Статус:</label>
                                {{-- <input class="gogocar-input--filter personal-content--input" type="text"
                                    placeholder="Статус..." id="status_support"> --}}
                                <select class="gogocar-select5" id="status_support">
                                    <option value="">@lang('front.profile.support_tab.all')</option>
                                    @foreach ($demandstatus as $item)
                                    <option value="{{$item->name}}">{{$item->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 personal-mb">
                            <div class="all-trip--popup__col personal-content--select">
                                <label>@lang('global.interval'):</label>
                                <select class="gogocar-select5" id="period_support">
                                    <option value="today">@lang('global.time.fields.today')</option>
                                    <option value="day">@lang('global.day')</option>
                                    <option value="month">@lang('global.month')</option>
                                    <option value="year">@lang('global.year')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-8 personal-pay-inputs--flex personal-mb">
                            <div class="all-trip--popup__col">
                                <label>@lang('global.date'):</label>
                                <div class="all-trip--popup__time">
                                    <div class="notific-input-icon personal-w">
                                        <input class="gogocar-input--filter personal-calendar personal-content--input"
                                            type="text" readonly="readonly" id="to_date_support">
                                        <div class="notific-calendar-icon">
                                            <svg class="icon icon-calendar2 ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#calendar2') }}"></use>
                                            </svg>
                                        </div>
                                    </div><span class="all-trip--space">–</span>
                                    <div class="notific-input-icon personal-w">
                                        <input class="gogocar-input--filter personal-calendar personal-content--input"
                                            type="text" readonly="readonly" id="from_date_support">
                                        <div class="notific-calendar-icon">
                                            <svg class="icon icon-calendar2 ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#calendar2')}}"></use>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="personal-pay--filter--footer">
                    <div class="personal-pay--filter--buttons">
                        <div class="gogocar-yellow-button w-100 m-0 mr-4" id="find_support">@lang('global.app_save')</div>
                        <div class="gogocar-gray-button w-100" id="cancel_support">@lang('global.app_cancel')</div>
                    </div>
                    {{-- <div class="gogocar-gray-icons">
                        <svg class="icon icon-setting-car ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#setting-car') }}"></use>
                        </svg>
                    </div> --}}
                </div>
            </div>
        </div>
        <div class="gogocar-yellow-button personal-add--appeal personal-add--appeal--desktop m-0" data-toggle="modal"
            data-target="#popup-appear-step1">@lang('front.profile.support_tab.add_ticket')</div>
    </div>
    <div class="personal-content--header personal-content--header--support">
        <h3 class="personal-content--header--title">@lang('front.profile.support_tab.request')</h3>
        <div class="personal-pay--header">
            <button class="gogocar-yellow-button m-0 mr-4" id="active_btn1">@lang('front.profile.support_tab.active')</button>
            <button class="gogocar-gray-button m-0" id="archive_btn1">@lang('front.profile.support_tab.archive')</button>
        </div>
    </div>
    <div class="panel-body panel-body-with-table d-none d-sm-block">
        <div class="table-responsive">
                <table class="table datatable no-border table-borderless" data-module="sticky-table">
                    <thead>
                        <tr>
                            <th>@lang('front.profile.support_tab.title')</th>
                            <th>@lang('global.date')</th>
                            <th>@lang('front.profile.support_tab.state')</th>
                        </tr>
                    </thead>
                    <tbody id="demand_table_body_support" class="personal-pay--header--childen__item">
                        @include('includes.demand_table')
                    </tbody>
                </table>
        </div>
    </div>

    <div class="personal-pay--header personal-pay--header__mobile">
        <button class="gogocar-yellow-button m-0 mr-4" id="active_btn2">@lang('front.profile.support_tab.active')</button>
        <button class="gogocar-gray-button m-0" id="archive_btn2">@lang('front.profile.support_tab.archive')</button>
    </div>
    <div class="personal-pay--data--mobile">
        <ul class="personal-pay--header">
            <li class="personal-pay--header--item">
                <div class="personal-pay--header--item--wrap">
                    <div class="personal-pay--header--item__name">@lang('front.profile.support_tab.title/date')</div>
                    <div class="personal-pay--header--item__name">@lang('front.profile.support_tab.state')</div>
                </div>
                <ul class="personal-pay--header--childen" id="table_data_mobile_support">
                    @if(count($demandObjects) > 0)
                    @include('profile.support_table_mobile')
                    @endif
                </ul>
            </li>
        </ul>
    </div>
    <div class="gogocar-yellow-button personal-add--appeal personal-add--appeal--mobile m-0" data-toggle="modal"
        data-target="#popup-appear-step1">@lang('front.profile.support_tab.add_ticket')</div>
    @else
        <div id="support_chat_block">
            @include('profile.support')
        </div>
    @endif
</div>
 <div class="modal fade" id="popup-appear-step1" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered popup-modal--wrap modal-770" role="document">
         <div class="modal-content popup-content">
             <div class="popup-header">
                 <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                     <svg class="icon icon-close ">
                         <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close') }}"></use>
                     </svg>
                 </div>
             </div>
             <div class="popup-covid--wrap popup-support--appear popup-icon-size">
                 <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('front.profile.support_tab.create_ticket_1')</h3>
                 <div class="plan-trip--location__wrap popup-output--money--wrap">
                     <div class="plan-trip--location__icon gogocar-gray-icons">
                         <svg class="icon icon-support ">
                             <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#support') }}"></use>
                         </svg>
                     </div>
                     <input class="gogocar-input-v1" type="text" id="support_heading" name="support_heading" placeholder="Укажите заголовок обращения">
                     <div class="gogocar-yellow-icons personal-appeal--step2" data-dismiss="modal" data-toggle="modal" data-target="#popup-appear-step2" data-dismiss="modal"  id="personal-appeal--step2">
                         <svg class="icon icon-arrow-right ">
                             <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right') }}"></use>
                         </svg>
                     </div>
                 </div>
                 <div class="personal-appear--radio--list">
                     @foreach ($demandCategories as $item)
                        <div class="personal-appear--radio--item">
                            <div class="personal-appear--radio--input"></div>
                            <input type="radio" id="demand{{$loop->index}}" name="demandCategory" value="{{ $item->id }}" @if($loop->first) checked @endif>
                            <div class="personal-appear--radio--text">{{ $item->name }}</div>
                        </div>
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="modal fade" id="popup-appear-step2" tabindex="-1" role="dialog" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered popup-modal--wrap modal-770" role="document">
         <div class="modal-content popup-content">
             <div class="popup-header">
                 <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                     <svg class="icon icon-close ">
                         <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#close') }}"></use>
                     </svg>
                 </div>
             </div>
             <div class="popup-covid--wrap popup-support--appear popup-icon-size">
                 <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('front.profile.support_tab.create_ticket_2')</h3>
                 <form class="popup-appear-form-step2">
                     <textarea class="input-appear--textarea" rows="5" cols="10" placeholder="Подробно опишите возникшую проблему..." id="support_des"></textarea>
                     <div class="action-buttons">
                         <div class="personal-appear--file--wrap row">
                             <div class="gogocar-yellow-button personal-file-button--added m-0">
                                 <svg class="icon icon-skrepka ">
                                     <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#skrepka')}}"></use>
                                 </svg>
                                 <span>@lang('front.profile.support_tab.add_file')</span>
                                 <input class="personal-upload-files--input" type="file" id="supportaddFile" multiple>
                             </div>
                             <div class="personal-loaded--file">
                                 <div class="gogocar-gray-icons personal-icon-loaded--appeal">
                                     <svg class="icon icon-png">
                                         <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#png')}}">
                                        </use>
                                    </svg>
                                </div>
                             <span class="personal-loaded--file__name">logs</span></div>
                         </div>
                         <div class="personal-form-buttons--appeal">
                             <div class="gogocar-yellow-button" data-dismiss="modal" id="demand_submit">@lang('front.profile.support_tab.send')</div>
                             <div class="gogocar-gray-button" data-dismiss="modal">@lang('front.profile.support_tab.cancel')</div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <script>

    function setdate3(get_data) {
        var dateString = $('#from_date_support').datepicker("getDate");
        if(get_data == 'today'){
            dateString.setDate(dateString.getDate());
        $('#to_date_support').datepicker('setDate', dateString);
        }
        else if(get_data == 'day'){
            dateString.setDate(dateString.getDate()-7);
        $('#to_date_support').datepicker('setDate', dateString);
        }
        else if(get_data == 'month'){
            dateString.setMonth(dateString.getMonth()-1);
        $('#to_date_support').datepicker('setDate', dateString);
        }
        else if(get_data == 'year'){
            dateString.setYear(dateString.getFullYear()-1);
        $('#to_date_support').datepicker('setDate', dateString);
        }
    }
    $(document).ready(function()
    {
        // $('#period_support').on('change', function(){
        //     var get_data = $(this).val();
        //     setdate(get_data);
        // });
        // $('#period_support').on('change', function (e) {
        //     var optionSelected = $("option:selected", this);
        //     var valueSelected = this.value;
        //     alert("success");
        // });
        $('.personal-loaded--file').hide();
        $('#supportaddFile').change(function() {
            var filename = $('#supportaddFile').val().replace(/C:\\fakepath\\/i, '');
            $('.personal-loaded--file .personal-loaded--file__name').html(filename);
            $('.personal-loaded--file').show();
        });

        $('#from_date_support').on('change', function(){
            // var get_data = $('#period_support').val();
            // setdate3(get_data);
        });
        $('#cancel_support').on('click', function(){
            $('.personal-pay--filter--bottom--footer').hide();
            var token = $("#token").val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("filter_support", app()->getLocale()) }}',
                data: {
                },
                success: (data) => {
                    $('#demand_table_body_support').html(data['template']);
                    $('#table_data_mobile_support').html(data['template_mobile']);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
        $('#find_support').on('click', function(){
            filter('active');
        });
        $('#active_btn1').on('click', function(){
            filter('active');
        });
        $('#archive_btn1').on('click', function(){
            filter('archive');
        });
        $('#active_btn2').on('click', function(){
            filter('active');
        });
        $('#archive_btn2').on('click', function(){
            filter('archive');
        });
        function filter(type){
            var details = $('#demond_id_support').val();
            var status_support = $('#status_support').val();
            var from_date = $('#from_date_support').val();
            var to_date = $('#to_date_support').val();
            var type = type;
            var token = $("#token").val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("filter_support", app()->getLocale()) }}',
                data: {
                    details: details,
                    status_support: status_support,
                    from_date: from_date,
                    to_date: to_date,
                    type: type
                },
                success: (data) => {
                    $('#demand_table_body_support').html(data['template']);
                    $('#table_data_mobile_support').html(data['template_mobile']);
                },
                error: function(data){
                    console.log(data);
                }
            });
        }
    });
</script>