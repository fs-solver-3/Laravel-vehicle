<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.pay_tab.payment')</h3>
        <div class="personal-pay--header">
            <div class="gogocar-yellow-button m-0 mr-4 tab-pane payment-state-filter active" data-active="1">@lang('front.profile.pay_tab.recent')</div>
            <div class="gogocar-gray-button m-0 payment-state-filter" data-active="0">@lang('front.profile.pay_tab.active')</div>
        </div>
    </div>
    <div class="personal-content--body personal-content--body-order">
        <div class="gogocar-ready-plan--covid personal-pay--book--wrap mb-4">
            <div class="personal-pay--book">
                <div class="gogocar-gray-icons">

                    <svg class="icon icon-info ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#info')}}"></use>
                    </svg>
                </div>
                <div class="gogocar-ready-plan--covid--info">
                    <div class="gogocar-ready-plan--covid--title">@lang('front.profile.pay_tab.you_will')</div>
                    <div class="gogocar-ready-plan--covid--desc">@lang('front.profile.pay_tab.as_well').</div>
                </div>
            </div>
            <div class="personal-pay--to__book">@lang('front.profile.pay_tab.all')</div>
        </div>
        <div class="personal-pay--filter--wrap gogocar-box">
            <div class="personal-pay--filter--top">
                <div class="personal-filter--title">@lang('front.profile.pay_tab.filter')</div>
                <div class="personal-filter--icon">
                    <svg class="icon icon-arrow-right ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#arrow-right')}}"></use>
                    </svg>
                </div>
            </div>
            <div class="personal-pay--filter--top personal-pay--filter--top--mobile">
                <div class="personal-filter--title">
                    @lang('front.profile.support_tab.filter')
                    {{-- {{ count($bookings)}} @lang('front.profile.pay_tab.3_transaction') --}}
                </div>
                <div class="gogocar-yellow-icons">
                    <svg class="icon icon-filter ">
                        <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#filter')}}"></use>
                    </svg>
                </div>
            </div>
            <div class="personal-pay--filter--bottom--footer">
                <div class="personal-pay--filter--bottom">
                    <div class="personal-pay--filter--bottom--wrap row payment-filter">
                        <div class="col-xl-4 personal-pay-inputs">
                            <div class="all-trip--popup__col">
                                <label>@lang('front.profile.pay_tab.detail'):</label>
                                <input class="gogocar-input--filter" type="text" placeholder="" id="details">
                            </div>
                        </div>
                        <div class="col-xl-8 personal-pay-inputs personal-pay-inputs--flex">
                            <div class="all-trip--popup__col">
                                <label>@lang('front.profile.pay_tab.amount'):</label>
                                <div class="all-trip--popup__time">
                                    <input class="gogocar-input--filter" type="number" placeholder="от" id="from_amount" min="0"><span
                                        class="all-trip--space">–</span>
                                    <input class="gogocar-input--filter" type="number" placeholder="до" id="to_amount" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 personal-pay-inputs">
                            <div class="all-trip--popup__col">
                                <label>@lang('front.profile.pay_tab.interval'):</label>
                                <select class="gogocar-select4" id="period">
                                    <option value="today" selected>@lang('front.profile.pay_tab.today')</option>
                                    <option value="day">@lang('front.profile.pay_tab.week')</option>
                                    <option value="month">@lang('front.profile.pay_tab.month')</option>
                                    <option value="year">@lang('front.profile.pay_tab.year')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-8 personal-pay-inputs personal-pay-inputs--flex">
                            <div class="all-trip--popup__col">
                                <label>@lang('front.profile.pay_tab.date'):</label>
                                <div class="all-trip--popup__time all-trip--popup__time--mobile">
                                    <div class="notific-input-icon personal-w">
                                        <input class="gogocar-input--filter personal-calendar" type="text"
                                            readonly="readonly" id="to_date">
                                        <div class="notific-calendar-icon">
                                            <svg class="icon icon-calendar2 ">
                                                <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#calendar2')}}"></use>
                                            </svg>
                                        </div>
                                    </div><span class="all-trip--space">–</span>
                                    <div class="notific-input-icon personal-w">
                                        <input class="gogocar-input--filter personal-calendar" type="text"
                                            readonly="readonly" id="from_date">
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
                        <div class="gogocar-yellow-button w-100 m-0 mr-4" id="find">@lang('front.profile.pay_tab.find')</div>
                        <div class="gogocar-gray-button w-100" id="cancel">@lang('front.profile.pay_tab.cancel')</div>
                    </div>
                    <div class="gogocar-gray-icons" data-toggle="modal" data-target="#settingModal">
                        <svg class="icon icon-setting-car ">
                            <use xlink:href="{{ asset('static/img/svg/symbol/sprite.svg#setting-car')}}"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="personal-pay--header personal-pay--header__mobile">
            <div class="gogocar-yellow-button m-0 mr-4">@lang('front.profile.pay_tab.recent')</div>
            <div class="gogocar-gray-button m-0">@lang('front.profile.pay_tab.active')</div>
        </div>
        <div class="panel-body panel-body-with-table d-none d-sm-block">
            <div class="table-responsive">
                @if(count($bookings) > 0)
                <table class="table datatable no-border table-borderless" data-module="sticky-table">
                    <thead>
                        <tr>
                            <th>@lang('front.profile.pay_tab.date')</th>
                            <th>@lang('front.profile.pay_tab.detail')</th>
                            <th>@lang('front.profile.pay_tab.des')</th>
                            <th>@lang('front.profile.pay_tab.amount')</th>
                        </tr>
                    </thead>
                    <tbody id="demand_table_body" class="personal-pay--header--childen__item">
                        @include('profile.bookings_table')
                    </tbody>
                </table>
                @else
                <p class="plan-trip--desc">@lang('global.no_data')</p>
                @endif
            </div>
        </div>
        <div class="personal-pay--data--mobile">
            <ul class="personal-pay--header" id="table_data_mobile">
                @if(count($bookings) > 0)
                @include('profile.bookings_table_mobile')
                @endif
            </ul>
        </div>
    </div>
</div>
<div class="modal fade" id="popup-input-value-amount" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('message.max_bigger')</p>
                <div class="gogocar-yellow-button w-170" data-dismiss="modal">@lang('front.profile.photo_tab.ok')</div>
            </div>
        </div>
    </div>
</div>
@include('includes.admin_setting_modal')
<script>
    function setdate2(get_data) {
        var dateString = $('#from_date').datepicker("getDate");
        if(get_data == 'today'){
            dateString.setDate(dateString.getDate());
        $('#to_date').datepicker('setDate', dateString);
        }
        else if(get_data == 'day'){
            dateString.setDate(dateString.getDate()-7);
        $('#to_date').datepicker('setDate', dateString);
        }
        else if(get_data == 'month'){
            dateString.setMonth(dateString.getMonth()-1);
        $('#to_date').datepicker('setDate', dateString);
        }
        else if(get_data == 'year'){
            dateString.setYear(dateString.getFullYear()-1);
        $('#to_date').datepicker('setDate', dateString);
        }
    }
    $(document).ready(function() {
        
        // $('#period').on('change', function(){
        //     var get_data = $(this).val();
        //     setdate(get_data);
        // });
        $('#from_date').on('change', function(){
            var get_data = $('#period').val();
            // setdate2(get_data);
        });
        $('#cancel').on('click', function(){
            $('.personal-pay--filter--bottom--footer').hide();
            var token = $("#token").val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("filter_booking", app()->getLocale()) }}',
                data: {
                },
                success: (data) => {
                    $('#demand_table_body').html(data['template']);
                    $('#table_data_mobile').html(data['template_mobile']);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
        $('#find').on('click', function(){
            let details = $('#details').val();
            let from_amount = $('#from_amount').val();
            let to_amount = $('#to_amount').val();
            if(from_amount > to_amount){
                $('#popup-input-value-amount').modal('show');
                $('#from_amount').val('');
                return false;
            }
            let from_date = $('#from_date').val();
            let to_date = $('#to_date').val();
            let token = $("#token").val();
            let active = $(".payment-state-filter.active").data('active');
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("filter_booking", app()->getLocale()) }}',
                data: {
                    details: details,
                    from_amount: from_amount,
                    from_date: from_date,
                    to_date: to_date,
                    to_amount: to_amount,
                    active: active
                },
                success: (data) => {
                    $('#demand_table_body').html(data['template']);
                    $('#table_data_mobile').html(data['template_mobile']);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });

        function updateFilters() {
            // dataTable.api().column(2).visible(false);
            $('#settingModal .checkbox-block input').each(function() {
                var index = $(this).data('filter-id');
                if (this.checked) {
                    $('.personal-pay--filter--bottom--footer .all-trip--popup__col').eq(index).show();
                } else {
                    $('.personal-pay--filter--bottom--footer .all-trip--popup__col').eq(index).hide();
                }
            })
        }
        $('#apply_filters').click(function(e) {
            e.stopPropagation();
            e.preventDefault()
            $('#settingModal').modal('toggle');
            $('#settingModal #close_modal').trigger('click');
            updateFilters();
        })

        $('#select_all_filters').click(function() {
            $('#settingModal .checkbox-block input:checkbox').prop("checked", true);
            // $('.settings-panel .form-group').show();
        });
        $('#remove_all_filters').click(function() {
            $('#settingModal .checkbox-block input:checkbox').prop("checked", false);
            // $('.settings-panel .form-group').hide();

        });


        var inputs = [],
        visible = [],
        hidden = [];
        var checkboxes = document.getElementById("settings-dropdown-menu");
        var tbutton = document.getElementById("table-button");

        function setCheckboxes_Settings() {
            inputs = [];
            visible = [];
            checkboxes.innerHTML = "";
            var fragment = document.createDocumentFragment();
            var isVisible = false;

            // document.onclick = function(e) {
            //     if (!tbutton.contains(e.target.parentNode)) {
            //         // checkboxes.style.cssText = "display:none;";
            //         isVisible = false;
            //     }
            // };
            if (tbutton != null){

                tbutton.onclick = function(e) {
                    if (checkboxes.contains(e.target)) {
                        return true;
                    }
                    if (!isVisible) {
                        checkboxes.style.cssText = "display:block;";
                        isVisible = true;
                    } else {
                        // checkboxes.style.cssText = "display:none;";
                        isVisible = false;
                    }
                };
            }
            var fields = $('.payment-filter label');
            fields.each(function(i) {
                var checkbox = document.createElement("div");
                checkbox.className = "checkbox-block";
                var block = document.createElement("div");
                block.className = "checkbox-block-container col-md-4";
                var input = document.createElement("input");
                input.type = "checkbox";
                input.id = "checkbox-filter" + i;
                input.name = "checkbox";
                input.checked = true;
                input.setAttribute('data-filter-id', i);
                var label = document.createElement("label");
                label.htmlFor = "checkbox-filter" + i;
                label.className = "checkbox-label";
                label.appendChild(
                    document.createTextNode($(this).text())
                );

                // IE 8 supports `Object.defineProperty` on DOM nodes so no p!
                if (Object.defineProperty) {
                    Object.defineProperty(input, "idx", {
                        value: i,
                        writable: false,
                        configurable: true,
                        enumerable: true
                    });
                } else if (input.__defineGetter__) {
                    input.__defineGetter("idx", function() {
                        return i;
                    })
                }

                // if (dataTable.api().columns().visible($(this).cellIndex)) {
                //     input.checked = true;
                //     visible.push(i);
                // } else {
                //     if (hidden.indexOf(i) < 0) {
                //         hidden.push(i);
                //     }
                // }
                block.appendChild(checkbox)
                checkbox.appendChild(input)
                checkbox.appendChild(label)

                fragment.appendChild(block);

                inputs.push(input);
            });
            checkboxes.appendChild(fragment);

            updateFilters();
        }

        setCheckboxes_Settings();

        $('.payment-state-filter').click(function(){
            $('.payment-state-filter').toggleClass('active');
            $('.payment-state-filter').toggleClass('gogocar-yellow-button');
            $('.payment-state-filter').toggleClass('gogocar-gray-button');
            $('#find').trigger('click');
            // $(this).toggleClass('active');
        })

    });
</script>