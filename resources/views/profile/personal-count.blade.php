<div class="personal-content--main">
    <div class="personal-content--header">
        <h3 class="personal-content--header--title">@lang('front.profile.account_tab.account')</h3>
    </div>
    <div class="personal-content--body">
        <div class="col-xl-5 col-lg-5 personal-count--balance--wrap gogocar-box">
            <div class="personal-count--left">
                <div class="personal-count--title">@lang('front.profile.account_tab.my_balance')</div>
                <div class="personal-count--balance">
                    <span class="car-to-book--during--right money" data-currency-rub="{{Helper::convertCurrency(Auth::user()->balance, 'UZS', 'RUB')}}" data-currency-uzs="{{Auth::user()->balance}}">
                        {{ Auth::user()->balance }} UZS
                    </span>
                </div>
            </div>
            <div class="personal-count--right">
                <div class="gogocar-gray-icons" data-toggle="modal" data-target="#popup-input-money">
                    <svg class="icon icon-money ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#money')}}"></use>
                    </svg>
                    <div class="personal-count--plus">
                        <svg class="icon icon-plus2 ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#plus2')}}"></use>
                        </svg>
                    </div>
                </div>
                @if(!is_null(Auth::user()->paypal_email))
                <div class="gogocar-gray-icons" data-toggle="modal" data-target="#popup-output-money">
                    <svg class="icon icon-money ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#money')}}"></use>
                    </svg>
                    <div class="personal-count--minus">
                        <svg class="icon icon-minus2 ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#minus2')}}"></use>
                        </svg>
                    </div>
                </div>
                @else
                    <a class="" href="{{ route('profile', ['locale' => app()->getLocale(), 'tab' => 'payment_method']) }}">
                    <div class="gogocar-gray-icons">
                        <svg class="icon icon-money ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#money')}}"></use>
                        </svg>
                        <div class="personal-count--minus">
                            <svg class="icon icon-minus2 ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#minus2')}}"></use>
                            </svg>
                        </div>
                    </div>
                    </a>
                @endif
            </div>
        </div>
        <div class="personal-pay--filter--wrap gogocar-box">
            <div class="personal-pay--filter--top">
                <div class="personal-filter--title">@lang('front.profile.account_tab.filter')</div>
                <div class="personal-filter--icon">
                    <svg class="icon icon-arrow-right ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-right')}}"></use>
                    </svg>
                </div>
            </div>
            <div class="personal-pay--filter--top personal-pay--filter--top--mobile">
                <div class="personal-filter--title">@lang('front.profile.support_tab.filter')</div>
                <div class="gogocar-yellow-icons">
                    <svg class="icon icon-filter ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#filter')}}"></use>
                    </svg>
                </div>
            </div>
            <div class="personal-pay--filter--bottom--footer">
                <div class="personal-pay--filter--bottom">
                    <div class="personal-pay--filter--bottom--wrap row payment-filter-2">
                        <div class="col-xl-4 personal-pay-inputs">
                            <div class="all-trip--popup__col">
                                <label>@lang('front.profile.account_tab.operation_type'):</label>
                                {{-- <input class="gogocar-input--filter" type="text" placeholder="" id="detail_transaction"> --}}
                                <select class="gogocar-select3" id="detail_transaction">
                                    <option value="">@lang('front.profile.account_tab.operation_type')</option>
                                    <option value="Completed">@lang('front.profile.account_tab.completed')</option>
                                    <option value="Pending">@lang('front.profile.account_tab.pending')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-8 personal-pay-inputs personal-pay-inputs--flex">
                            <div class="all-trip--popup__col">
                                <label>@lang('front.profile.account_tab.amount'):</label>
                                <div class="all-trip--popup__time">
                                    <input class="gogocar-input--filter" type="number" placeholder="от" id="from_amount_transaction" min="0"><span
                                        class="all-trip--space">–</span>
                                    <input class="gogocar-input--filter" type="number" placeholder="до" id="to_amount_transaction" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 personal-pay-inputs">
                            <div class="all-trip--popup__col">
                                <label>@lang('front.profile.account_tab.interval'):</label>
                                <select class="gogocar-select3" id="period_transaction">
                                    <option value="today">@lang('front.profile.account_tab.today')</option>
                                    <option value="day">@lang('front.profile.pay_tab.week')</option>
                                    <option value="month">@lang('front.profile.account_tab.month')</option>
                                    <option value="year">@lang('front.profile.account_tab.year')</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-8 personal-pay-inputs personal-pay-inputs--flex">
                            <div class="all-trip--popup__col">
                                <label>@lang('front.profile.account_tab.date'):</label>
                                <div class="all-trip--popup__time">
                                    <div class="notific-input-icon personal-w">
                                        <input class="gogocar-input--filter personal-calendar" type="text"
                                        readonly="readonly" id="to_date_transaction">
                                        <div class="notific-calendar-icon">
                                            <svg class="icon icon-calendar2 ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar2')}}"></use>
                                            </svg>
                                        </div>
                                    </div><span class="all-trip--space">–</span>
                                    <div class="notific-input-icon personal-w">
                                        <input class="gogocar-input--filter personal-calendar" type="text"
                                            readonly="readonly" id="from_date_transaction">
                                        <div class="notific-calendar-icon">
                                            <svg class="icon icon-calendar2 ">
                                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#calendar2')}}"></use>
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
                        <div class="gogocar-yellow-button w-100 m-0 mr-4" id="find_transaction">@lang('front.profile.account_tab.find')</div>
                        <div class="gogocar-gray-button w-100" id="cancel_transaction">@lang('front.profile.account_tab.cancel')</div>
                    </div>
                    <div class="gogocar-gray-icons" data-toggle="modal" data-target="#settingModal2">
                        <svg class="icon icon-setting-car ">
                            <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#setting-car')}}"></use>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body panel-body-with-table d-none d-sm-block">
            <div class="table-responsive">
                @if(count($transactions) > 0)
                <table class="table datatable no-border table-borderless" data-module="sticky-table">
                    <thead>
                        <tr>
                            <th>@lang('front.profile.account_tab.date')</th>
                            <th>@lang('front.profile.account_tab.des')</th>
                            <th>@lang('front.profile.account_tab.state')</th>
                            <th>@lang('front.profile.account_tab.balance')</th>
                            <th>@lang('front.profile.account_tab.amount')</th>
                        </tr>
                    </thead>
                    <tbody id="demand_table_body_transaction" class="personal-pay--header--childen__item">
                        @include('profile.transactions_table')
                    </tbody>
                </table>
                @else
                    <p class="plan-trip--desc">@lang('global.no_data')</p>
                @endif
            </div>
        </div>
        <div class="personal-pay--data--mobile">
            <ul class="personal-pay--header" id="table_data_mobile_transaction">
                @if(count($transactions) > 0)
                @include('profile.transactions_table_mobile')
                @endif
            </ul>
        </div>
        @if(Auth::user()->transactions->count() > 10)
        <div class="gogocar-yellow-button" id="load_more_transaction_btn">Показать еще</div>
        @endif
    </div>
</div>
<div class="modal fade" id="popup-output-money" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap modal-770" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#close')}}"></use>
                    </svg>
                </div>
            </div>
            <div class="popup-covid--wrap popup-modal--money popup-icon-size">
                <form class="w3-card-4" method="POST" id="payment-form-withdraw" action="{!! route('withdrawwithpaypal') !!}">
                    {{ csrf_field() }}
                    <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('front.profile.account_tab.withdraw')</h3>
                    <div class="plan-trip--location__wrap popup-output--money--wrap">
                        <div class="plan-trip--location__icon gogocar-gray-icons">
                            <svg class="icon icon-money ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#money')}}"></use>
                            </svg>
                        </div>
                        <input class="gogocar-input-v1" type="number" min="0" placeholder="Укажите сумму вывода..." name="amount" required max="{{ Auth::user()->balance }}">
                        <button class="gogocar-yellow-icons" type="submit" style="border: 0px">
                            <svg class="icon icon-arrow-right ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#arrow-right')}}"></use>
                            </svg>
                        </button>
                    </div>
                    <div class="popup-output--money--title">@lang('front.profile.account_tab.available') <span>{{ Auth::user()->balance }} UZS</span> из <span>{{ Auth::user()->balance }} UZS</span></div>
                    <ul class="popup-output--list">
                        <li class="popup-output--item">
                            <div class="popup-output--item--name">@lang('front.profile.account_tab.repleshiment') – <span>{{ Auth::user()->balance }} UZS</span></div>
                            <div class="popup-output--item--value poiv--green">Доступно</div>
                            <div class="popup-output--item--value--icon popup-icon-green">
                                <svg class="icon icon-ok ">
                                    <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#ok')}}"></use>
                                </svg>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="popup-input-money" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-header">
                <div class="popup-modal-close close" data-dismiss="modal" aria-label="Close">
                    <svg class="icon icon-close ">
                        <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#close')}}"></use>
                    </svg>
                </div>
            </div>
            {{-- <form class="popup-covid--wrap popup-modal--money popup-icon-size"> --}}
                <h3 class="main-section--title--v2 font-size-25 mb-5">@lang('front.profile.account_tab.select')</h3>
                <div class="popup-input--money--wrap">
                    <div class="popup-input--money--item">
                        <div class="popup-input--money--checkbox"></div>
                        <input type="radio">
                        <div class="popup-input--money--logo" style="background-image:url('/static/img/general/cash/cash1.png');"></div>
                        <div class="popup-input--money--name">UZCard</div>
                    </div>
                    <div class="popup-input--money--item">
                        <div class="popup-input--money--checkbox"></div>
                        <input type="radio">
                        <div class="popup-input--money--logo" style="background-image:url('/static/img/general/cash/cash2.png');"></div>
                        <div class="popup-input--money--name">Click Evolution</div>
                    </div>
                    <div class="popup-input--money--item">
                        <div class="popup-input--money--checkbox"></div>
                        <input type="radio">
                        <div class="popup-input--money--logo" style="background-image:url('/static/img/general/cash/cash3.png');"></div>
                        <div class="popup-input--money--name">PayPal</div>
                    </div>
                    {{-- <div class="gogocar-input--wrapper popup-input--money--cash">
                        <div class="gogocar-input-icon gogocar-gray-icons">
                            <svg class="icon icon-money ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#money')}}"></use>
                            </svg>
                        </div>
                        <input class="gogocar-input-v1 gogocar-from" type="text" placeholder="Укажите сумму..." required pattern="[0-9]">
                    </div> --}}
                </div>
                <form class="w3-card-4" method="POST" id="payment-form" action="{!! route('paywithpaypal') !!}">
                    {{ csrf_field() }}
                    <div class="gogocar-input--wrapper popup-input--money--cash">
                        <div class="gogocar-input-icon gogocar-gray-icons">
                            <svg class="icon icon-money ">
                                <use xlink:href="{{asset('static/img/svg/symbol/sprite.svg#money')}}"></use>
                            </svg>
                        </div>
                        <input class="gogocar-input-v1 gogocar-from" type="text" id="input_amount" name="input_amount" placeholder="Укажите сумму..." required>
                        <input class="gogocar-input-v1 gogocar-from" type="hidden" id="output_amount" name="amount" placeholder="Укажите сумму..." >
                        <input type="hidden" name="pay_type" value="replenishment">
                    </div>
                    <input type="hidden" value="paypal" name="payment_method">
                    <div class="button_container">
                        <button class="gogocar-yellow-button" type="submit" id="withdraw_approve" style="display: none">Продолжить</button>
                    </div>
                </form>
                {{-- <form method="post" action="/your-after-payment-url">
                    <script src="https://my.click.uz/pay/checkout.js" class="uzcard_payment_button" data-service-id="MERCHANT_SERVICE_ID" data-merchant-id="MERCHANT_ID" data-transaction-param="MERCHANT_TRANS_ID" data-merchant-user-id="MERCHANT_USER_ID" data-amount="MERCHANT_TRANS_AMOUNT" data-card-type="MERCHANT_CARD_TYPE" data-label="Pay" <!-- Payment button title -->
                        >
                    </script>
                </form> --}}
            {{-- </form> --}}
        </div>
    </div>
</div>
<div class="modal fade" id="popup-input-value-amount-2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered popup-modal--wrap" role="document">
        <div class="modal-content popup-content">
            <div class="popup-covid--wrap popup-icon-size">
                <p class="popup-trip-finish">@lang('message.max_bigger')</p>
                <div class="gogocar-yellow-button w-170" data-dismiss="modal">@lang('front.profile.photo_tab.ok')</div>
            </div>
        </div>
    </div>
</div>
<div class="modal settings-filter-column fade" id="settingModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated fadeIn popup-content">
            <div class="modal-header">
                <div class="pull-left">
                    <h4 class="modal-title">@lang('global.app_column_setting')</h4>
                </div>
                <div class="pull-right d-flex">
                    <button type="button" class="section-button--yellow mr-3" id="select_all_filters">@lang('global.app_select_all')</button>
                    <button type="button" class="section-button--gray gogocar-gray-button " id="remove_all_filters">@lang('global.app_deselect_all')</button>
                </div>
                {{-- <small class="font-bold">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</small> --}}
            </div>
            <div class="modal-body clearfix" id="settings-dropdown-menu-2">
            </div>
            <div class="modal-footer">
                <div class="pull-left d-flex">
                    <button class="section-button--yellow w-100px mr-3" id="apply_filters_2">@lang('global.app_apply')</button>
                    <button class="section-button--gray gogocar-gray-button w-100px" id="close_modal" data-dismiss="modal">@lang('global.app_cancel')</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const input_amount = document.querySelector('#input_amount');
    const output_amount = document.querySelector('#output_amount');

    function convertCurrency() {
        const input_currency1 = 'RUB';
        const output_currency1 = 'USD';
        output_amount.value = (input_amount.value / 10290).toFixed(2);
        $('#withdraw_approve').show();

        // fetch(`https://api.exchangerate-api.com/v4/latest/${input_currency1}`)
        //     .then(res => res.json())
        //     .then(res => {
        //         const new_rate = res.rates[output_currency1];
        //         // rate.innerText = `1 ${input_currency1} = ${new_rate} ${output_currency1}`
        //         // output_amount.value = (input_amount.value * new_rate).toFixed(0);
        //         output_amount.value = (input_amount.value / 10290).toFixed(2);
        //         $('#withdraw_approve').show();
        //     })
    }
    function setdate1(get_data) {
        var dateString = $('#from_date_transaction').datepicker("getDate");
        if(get_data == 'today'){
            dateString.setDate(dateString.getDate());
        $('#to_date_transaction').datepicker('setDate', dateString);
        }
        else if(get_data == 'day'){
            dateString.setDate(dateString.getDate()-7);
        $('#to_date_transaction').datepicker('setDate', dateString);
        }
        else if(get_data == 'month'){
            dateString.setMonth(dateString.getMonth()-1);
        $('#to_date_transaction').datepicker('setDate', dateString);
        }
        else if(get_data == 'year'){
            dateString.setYear(dateString.getFullYear()-1);
        $('#to_date_transaction').datepicker('setDate', dateString);
        }
    }
    $(document).ready(function()
    {
        $('#input_amount').change(function(){
            convertCurrency();
            $('#withdraw_approve').show();
        })
        // $('#period_transaction').on('change', function(){
        //     var get_data = $(this).val();
        //     setdate(get_data);
        // });
        $('#from_date_transaction').on('change', function(){
            var get_data = $('#period_transaction').val();
            // setdate1(get_data);
        });
        $('#cancel_transaction').on('click', function(){
            $('.personal-pay--filter--bottom--footer').hide();
            var token = $("#token").val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("filter_transaction", app()->getLocale()) }}',
                data: {
                },
                success: (data) => {
                    $('#demand_table_body_transaction').html(data['template']);
                    $('#table_data_mobile_transaction').html(data['template_mobile']);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
        $('#find_transaction').on('click', function(){
            let details = $('#detail_transaction').val();
            let from_amount = $('#from_amount_transaction').val();
            let to_amount = $('#to_amount_transaction').val();
            if(from_amount > to_amount){
                $('#popup-input-value-amount-2').modal('show');
                $('#from_amount_transaction').val('');
                return false;
            }

            let from_date = $('#from_date_transaction').val();
            let to_date = $('#to_date_transaction').val();
            let token = $("#token").val();
            $.ajax({
                type:'POST',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                url: '{{ route("filter_transaction", app()->getLocale()) }}',
                data: {
                    details: details,
                    from_amount: from_amount,
                    from_date: from_date,
                    to_date: to_date,
                    to_amount: to_amount
                },
                success: (data) => {
                    $('#demand_table_body_transaction').html(data['template']);
                    $('#table_data_mobile_transaction').html(data['template_mobile']);
                },
                error: function(data){
                    console.log(data);
                }
            });
        });


        // load more button
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function load_data() {
            var totalCurrentResult = $("#demand_table_body_transaction tr").length;
            $.ajax({
                url: "{{ route('more_transactions')}}", 
                method: "POST", 
                data: {
                    skip: totalCurrentResult,
                }, 
                success: function(data) {
                    $('#load_more_transaction_btn').html('Показать еще');
                    $('#demand_table_body_transaction').append(data);
                }
            })
        }

        $(document).on('click', '#load_more_transaction_btn', function() {
            var id = $(this).data('id');
            $('#load_more_transaction_btn').html('<b>Loading...</b>');
            load_data();
        });

        function updateFilters2() {
            // dataTable.api().column(2).visible(false);
            $('#settingModal2 .checkbox-block input').each(function() {
                var index = $(this).data('filter-id');
                if (this.checked) {
                    $('.payment-filter-2 .all-trip--popup__col').eq(index).show();
                } else {
                    $('.payment-filter-2 .all-trip--popup__col').eq(index).hide();
                }
            })
        }
        $('#apply_filters_2').click(function(e) {
            e.stopPropagation();
            e.preventDefault()
            $('#settingModal2').modal('toggle');
            $('#settingModal2 #close_modal').trigger('click');
            updateFilters2();
        })

        $('#settingModal2 #select_all_filters').click(function() {
            $('#settingModal2 .checkbox-block input:checkbox').prop("checked", true);
            // $('.settings-panel .form-group').show();
        });
        $('#settingModal2 #remove_all_filters').click(function() {
            $('#settingModal2 .checkbox-block input:checkbox').prop("checked", false);
            // $('.settings-panel .form-group').hide();

        });


        var inputs = [],
        visible = [],
        hidden = [];
        var checkboxes = document.getElementById("settings-dropdown-menu-2");
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
            var fields = $('.payment-filter-2 label');
            fields.each(function(i) {
                var checkbox = document.createElement("div");
                checkbox.className = "checkbox-block";
                var block = document.createElement("div");
                block.className = "checkbox-block-container col-md-4";
                var input = document.createElement("input");
                input.type = "checkbox";
                input.id = "checkbox-filter-2" + i;
                input.name = "checkbox";
                input.checked = true;
                input.setAttribute('data-filter-id', i);
                var label = document.createElement("label");
                label.htmlFor = "checkbox-filter-2" + i;
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

            updateFilters2();
        }

        setCheckboxes_Settings();

    });
    // convertCurrency();
</script>