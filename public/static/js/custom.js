
var currentLatitude = 0;
var currentLongitude = 0;

function search_ride(type = 'all'){
    var token = $("#token").val();
    var before_time = $('#before_time').val();
    var after_time = $('#after_time').val();
    var selected_date = $('#selected_date').val();
    var all_trip_checkbox = $('#all_trip_checkbox').val();
    var distance_from_you = $('#distance_from_you').val();
    var from_position = $('#address1-component').val();
    var to_position = $('#address2-component').val();
    var from_price = $('#from_price').val();
    var to_price = $('#to_price').val();
    var allow_counts = $('#allow_counts').val();
    var capacity = $('#capacity').val();
    var place = $('#place').val();
    var driver_rating = $('#driver_rating').val();
    var truck_type = $("#truck_type").val();
    var sort_by = $(".all-trip--sort span").data("type");
    if($('#address1-input').val() == ''){
        from_position = 0;
    }
    if($('#address2-input').val() == ''){
        to_position = 0;
    }
    if(sort_by == undefined) sort_by = 'distance';
    // if(from_position ==0 || to_position == 0){
    //     alert("Please input from and to locations.");
    //     return;
    // }
    $.ajax({
        type:'POST',
        headers: {
            'X-CSRF-TOKEN': token
        },
        url: searchtrip_url,
        data: {
            before_time: before_time,
            after_time: after_time,
            selected_date: selected_date,
            all_trip_checkbox: all_trip_checkbox,
            distance_from_you: distance_from_you,
            from_position: from_position,
            to_position: to_position,
            from_price: from_price,
            to_price: to_price,
            allow_counts: allow_counts,
            driver_rating: driver_rating,
            current_lat: currentLatitude,
            current_lng: currentLongitude,
            sort_by: sort_by,
            capacity: capacity,
            truck_type: truck_type,
            place: place,
            type: type
        },
        success: (data) => {
            // $('.trips-category').html('<div class="main-section--title--v2 text-center">No result.</div>');
            $('.trips-category').html(data['template']);
            $('.all-trip--result').html('('+ data['result'] +' подходящие поездки)');
        },
        error: function(data){
            console.log(data);
        }
    });
}

$(document).ready(function() 
{
    function mylocation(){
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position){ console.log('current location:');
                var currentLatitude_s = position.coords.latitude;
                var currentLongitude_s = position.coords.longitude;
                currentLatitude = currentLatitude_s;
                currentLongitude = currentLongitude_s;console.log(currentLatitude,currentLongitude);
                $('.current_lat').val(currentLatitude);
                $('.current_lng').val(currentLongitude);
            });
        }else {
            alert("Geolocation is not supported by this browser.");
        }
    }
    mylocation();
    $('#filter_trip').click(function() {
        search_ride();
    })
    // $('.all-trip--sort span').on('DOMSubtreeModified',function() {
    //     search_ride();
    // })

    $(".gogocar-select3").selectCF({
        color: "#FFF",
        backgroundColor: "#663052",

        change: function () {
            var get_data = $(this).val();
            setdate1(get_data);
        }

    });
    $(".gogocar-select4").selectCF({
        color: "#FFF",
        backgroundColor: "#663052",

        change: function () {
            var get_data = $(this).val();
            setdate2(get_data);
        }

    });
    $(".gogocar-select5").selectCF({
        color: "#FFF",
        backgroundColor: "#663052",

        change: function () {
            var get_data = $(this).val();
            setdate3(get_data);
        }

    });
    // add car

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var event_change = $('#event-change');
    var car_type = $('#car_type').val();

    $(".gogocar-select2").selectCF({
        color: "#FFF",
        backgroundColor: "#663052",

        change: function () {
            // alert('d');
            car_type = $(this).val();
            var text = $(this).children('option:selected').html();
            $(this).next().next('.select_option_dms').val(text);
            // event_change.html(value+' : '+text);
            // if (car_type == 'Грузовая') $('#truck_body_type').show();
            if (car_type == 'Грузовая'){
                $('#type_vehicle').addClass('show');
            }
            else{
                $('#type_vehicle').removeClass('show');
            }

        }

    });

    var car_body_type = $('#car_body_type .active .personal-type-car--item--name').html();
    car_body_type == undefined && (car_body_type = $('#car_body_type .personal-type-car--item--name').first().html());
    $('#body_type #car_body_type .personal-type-car--item__checkbox').click(function () {
        car_body_type = $(this).parent().find('.personal-type-car--item--name').html();
    })

    var body_type_id = $('#body_type .active .personal-type-car--item__checkbox').data('id');
    body_type_id == undefined && (body_type_id = $('#body_type #truck_body_type .personal-type-car--item__checkbox').first().data('id'));
    $('#body_type #truck_body_type .personal-type-car--item__checkbox').click(function () {
        console.log('truck', $(this).data('id'));
        // body_type_id = $(this).parent().find('.personal-type-car--item--name').html();
        body_type_id = $(this).data('id');
    })

    

    var car_color = $('.personal-color-car--item.active').data('car-color');
    car_color == undefined && (car_color = $('.personal-color-car--item').first().data('car-color'));
    $('.personal-color-car--item').click(function () {
        car_color = $(this).data('car-color');
    })

    $(document).on('click', '#car_brand_blocks .personal-add--car--mark--item', function(){
        $('#car_brand').val($(this).find('.personal-add--car--mark--name').html());
        $('#car_brand_blocks').slideUp(200);
    } )

    $(document).on('click', '#car_model_blocks .personal-add--car--mark--item', function () {
        $('#car_model').val($(this).find('.personal-add--car--mark--name').html());
        $('#car_model_blocks').slideUp(200);
    })

    $('#gogocar-number').change(function(){
        let number = $('#gogocar-number').val();
        if (car_number_check(number)) {
            $('#number-valid').hide();
        } else{
            $('#number-valid').show();
            $('#number-valid span').show();
            return false;
        }
    })

    function car_number_check(number) {
        let car_number_country = $('.car-number-flag').html();
        if(car_number_country == 'RU'){
            var number_reg_exp =
                /^[A-Z]{1}-\d{3}-[A-Z]{2}-\d{2,3}$/;
        }else{
            var number_reg_exp =
                /\d{2}-[A-Z]{1}-\d{3}-[A-Z]{2}$/;
        }
        return (number_reg_exp.test(number));
    }

    // $('.personal-add--car--mark--item').click(function(){
    //     $('#car_brand').val($(this).find('.personal-add--car--mark--name').html());
    // })

    $("#add_car").on('submit', function (e) {
        e.preventDefault();

        const car_number = $('#gogocar-number').val();
        // const car_brand = $('#car_brand').val();
        const car_brand = $("#selected_brand_name").text();
        const car_brand_id = $("#selected_brand_name").attr('data-id');
        const car_model = $('#selected_model_name').text();
        const car_model_id = $("#selected_model_name").attr('data-id');
        const car_year = $('#car_year').val();
        const action_url = $('#action_url').val();
        let url = '/add_car';

        if(car_brand_id == 0 || car_model_id == 0){
            $('#popup-input-car-data').modal('show');
            return false;
        }
        
        const formData = new FormData();
        if (action_url == 'profile.car.edit' || action_url == 'profile.truck.edit'){
            url = update_car_url;
            let car_id = $('#car_id').val();
            formData.append('id', car_id);
            car_type = $('#car_type').val();
        }

        var cargo_type_id = [];
        
        $('#cargo_type .active .personal-type-car--item__checkbox').each(function(){
            let id = $(this).data('id');
            cargo_type_id.push(id);
        })
        
        if(car_type == 'Грузовая'){
            if(cargo_type_id == []){
                $('#popup-input-car-data .popup-trip-finish').html("Выберите тип груза")
                $('#popup-input-car-data').modal('show');
                return false;
            }
        }

        if(car_color === undefined){
            $('#popup-input-car-data .popup-trip-finish').html("Выберите цвет")
            $('#popup-input-car-data').modal('show');
            return false;
        }

        let number = $('#gogocar-number').val();
        if (car_number_check(number)) {
            $('#number-valid').hide();
        } else{
            $('#number-valid').show();
            $('#number-valid span').show();
            $('html, body').animate({
            scrollTop: 0
            }, 800, function(){
            // window.location.hash = hash;
            });
            return false;
        }
       
        var template = $('#template').val();

        if(template == ""){
            $('#popup-input-car-data').modal('show');
            return false;
        }

        // var formData = new FormData(this);
        var country = $('.car-number-flag').html();
        formData.append('car_type', car_type);
        formData.append('car_number', car_number);
        formData.append('car_brand', car_brand);
        formData.append('car_model', car_model);
        formData.append('car_model_id', car_model_id);
        formData.append('car_body_type', car_body_type);
        formData.append('body_type_id', body_type_id);
        formData.append('car_color', car_color);
        formData.append('car_year', car_year);
        formData.append('cargo_type_id', cargo_type_id);
        formData.append('country', country);
        formData.append('template', template);
        $.ajax({
            type: 'POST',
            url: url,
            data: formData,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                // alert(data);
                if (data.state == 'success') {
                    window.location.replace(profile_url);
                } else{
                    $('#popup-input-car-wrong').modal('show');
                }
            },
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                $("#success_msg").css('display', 'block');
                $('#success_msg_content').html("Something Wrong");
            }

        });

    });

    

    var get_color_car_selected = $('.personal-color-car--item.active').attr('data-car-color');
    $('.personal-color-car--list .active').css('box-shadow', '0px 0px 0px 6px #' + get_color_car_selected + '');

    // end add car

    // complains
    $('#popup-jaloba .popup-gogocar-type-cargo--item').click(function(){
        $('#complain_id').val($(this).data('entry-id'))
    })
    
    // $('#toast_complain').toast('show');
     // end complains


    //  support module
    $('#personal-appeal--step2').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var support_heading;
        var demand_category_id;

        support_heading = $('#support_heading').val();
        if (support_heading === "") {
            $('#support_heading').focus();
            return;
        }
        demand_category_id = $("#popup-appear-step1 input[name='demandCategory']:checked").val();
        $("#popup-appear-step1").modal('hide');
        $('#popup-appear-step2').modal('show');

        if (window.File && window.FileList && window.FileReader) {
            $("#supportaddFile").on("change", function (e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i];
                    var fileReader = new FileReader();
                    fileReader.onload = (function (e) {
                        $('.uploaded_image').attr('src', e.target.result).show();
                        $('#supportDetailModal .file-preview').show();
                        $('#supportDetailModal .file-name').text(f.name);
                    });

                    fileReader.readAsDataURL(f);
                }
            });
            $(".remove").click(function () {
                $('.uploaded_image').hide();
                $('#files').val('deleted_image');
                $('#delete_image').val('delete');
                // $(this).parent(".pip").remove();
            });
        } else {
            alert("Your browser doesn't support to File API")
        };

        var window_width = $(window).width();

        $("#demand_submit").on('click', function (e) {
            // let submit = true
            e.preventDefault();
            $('#popup-appear-step2').modal('hide');
            let description = $('#support_des').val();
            if (description == "") {
                $('#support_des').focus();
                return;
            }
            const formData = new FormData();
            const file_data = $('#supportaddFile').prop('files')[0];
            formData.append('support_heading', support_heading);
            formData.append('demand_category_id', demand_category_id);
            formData.append('description', description);
            if (window_width < 900) {
                formData.append('device', 'mobile');
            }
            else {
                formData.append('device', 'desktop');
            }
            // formData.append('address', address);
            if (file_data) {
                formData.append('file', file_data);
            } else {
                formData.append('file', null);
                // alert('Select avatar');
            }
            $.ajax({
                type: 'POST'
                , url: "/demandRegister"
                , data: formData
                , contentType: false
                , cache: false
                , processData: false
                , success: function (data) {
                    // $('#popup-appear-step2').modal('toggle');
                    $('#support_heading').val('');
                    $('#support_des').val('');
                    if (data.state === undefined) {
                        $('#demand_success_message').show();
                        $('#demand_success_message .success_message').show();
                        $('#demand_table_body_support').html('');
                        if (window_width < 900) {
                            $('#table_data_mobile_support').html(data);
                        }
                        else {
                            $('#demand_table_body_support').html(data);
                        }

                    } else {
                        $('#demand_success_message .error-block span strong').html(data.message).css('color', '#dc3545');
                        $('#demand_success_message .error-block span').show();
                        $('#demand_success_message').show();
                        $('#demand_success_message .success_message').hide();
                    }
                }
                , error: function (XMLHttpRequest, textStatus, errorThrown) {
                    console.log('Error');
                }

            });

        });

    })

    // booking
    var book_way = 'escow';
    $('.book_way .popup-input--money--item').click(function() {
        book_way = $(this).data('way');
    });

    $('#book_trip').click(function (e) {
        e.preventDefault();
        if(book_way == 'directly'){
            $('#popup-input-book-directly').modal('show');
        }
        else{
            $('#popup-input-money').modal('show');
        }
    })

    $('#direct_book').click(function(){
        const formData = new FormData();
        const trip_id = $('#trip_id').val();
        const trip_place = $('#place').val();
        formData.append('trip_id', trip_id);
        formData.append('way', 'direct');
        formData.append('trip_place', trip_place);
        $.ajax({
            type: 'POST', 
            url: "/book", 
            data: formData, 
            contentType: false, 
            cache: false, 
            processData: false, 
            success: function (data) {
                if(data.state == 'success'){
                    window.location.href = window.booking_link;
                }
                else if (data.state == 'error'){
                    $('#popup-input-value-2').modal('show');
                }
            }, 
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('Error');
            }
        });
    })

    $(function () {
        $("#rateYo").rateYo({
            "ratedFill": "#FDAB3E",
            "starWidth": "26px",
            "spacing": "8px",
            "precision": 0,
            "starSvg": '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">\n' +
                '<path d="M19.9713 7.70552C19.9024 7.49337 19.7191 7.33876 19.4984 7.30673L13.2983 6.40576L10.5254 0.787538C10.4268 0.587539 10.223 0.460938 10 0.460938C9.77699 0.460938 9.57332 0.587539 9.47461 0.787538L6.70165 6.40576L0.501673 7.30673C0.281009 7.33876 0.0976117 7.49337 0.0287057 7.70548C-0.0402394 7.91763 0.0172604 8.15048 0.176986 8.30614L4.66322 12.6793L3.60432 18.8544C3.56658 19.0743 3.65697 19.2964 3.8374 19.4275C3.93947 19.5016 4.06037 19.5394 4.18185 19.5394C4.27513 19.5394 4.36873 19.5172 4.45443 19.4721L10 16.5565L15.5453 19.472C15.7428 19.5758 15.982 19.5586 16.1624 19.4275C16.3428 19.2964 16.4333 19.0742 16.3956 18.8543L15.3363 12.6793L19.823 8.3061C19.9827 8.15048 20.0403 7.91763 19.9713 7.70552Z"/>\n' +
                '</svg>',
        }).on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.rateyo-hidden').val(rating);

        });
    });

    $('#success_msg .close').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        console.log('close');
        $(this).parents().find('#success_msg').hide();
    })

    $('.personal-sidebar--list a.personal-sidebar--item').click(function(event){
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
            scrollTop: 0
            }, 800, function(){
            // window.location.hash = hash;
            });
        } // End if
    })

    $( "#finish" ).click(function() {
        $('#popup-input-value').modal('hide');
    });

    $( "#finish2" ).click(function() {
        $('#popup-input-car-data').modal('hide');
    });

    // flag.js
    $('.footer-country-choise--item').click(function (e) {
        // let language = $(this).children('.choise-lang--item__text').html();
        let lang = $(this).attr('data-lang');
        var url = window.location.href;
        var new_url = "";
        if(lang == 'ru'){
            new_url = url.replace("/uz/", "/ru/");
        }
        else if(lang == 'uz'){
            new_url = url.replace("/ru/", "/uz/");
        }
        if(url != new_url){
            translate(new_url);
        }
        $('.footer-country-choise--list').hide();
    })
    function translate(tnum) {
        window.location.href = tnum
    }
    $('.notific-calendar-icon').click(function(e){
        e.stopPropagation();
        e.preventDefault()
        // $('#personal_data #birthday').trigger('focus');
        $(this).siblings('input').trigger('focus');
    })

    var current_currency = $('.fci-choised .currency-gocar').data('currency');
    $('.money').each(function(){
        if(current_currency == 'RUB'){
            $(this).html($(this).data('currency-rub') + ' RUB');
        }
        else{
            $(this).html($(this).data('currency-uzs') + ' UZS');
        }
    })

    $('.money-input').each(function(){
        if(current_currency == 'RUB'){
            $(this).val($(this).data('currency-rub'));
        }
        else{
            $(this).val($(this).data('currency-uzs'));
        }
    })

    $('.remove-change--price-text').each(function(){
        if(current_currency == 'RUB'){
            $(this).attr('data-change-currency', 'RUB');
            $(this).attr('data-change-price', 50);
        }
        else{
            $(this).attr('data-change-currency', 'UZS');
            $(this).attr('data-change-price', 5000);
        }
    })

    $('.currency-gocar').click(function (e) {
        let currency = $(this).data('currency');
        $('.money-input').each(function(){
            if(currency == 'RUB'){
                $(this).val($(this).data('currency-rub'));
            }
            else{
                $(this).val($(this).data('currency-uzs'));
            }
        })

        $('.remove-change--price-text').each(function(){
            if(currency == 'RUB'){
                $(this).attr('data-change-currency', 'RUB');
                $(this).attr('data-change-price', 50);
            }
            else{
                $(this).attr('data-change-currency', 'UZS');
                $(this).attr('data-change-price', 5000);
            }
        })

        $('.money').each(function(){
            if(currency == 'RUB'){
                console.log($(this).attr('data-currency-rub'));
                $(this).html($(this).attr('data-currency-rub') + ' RUB');
            }
            else{
                console.log($(this).attr('data-currency-uzs'));
                $(this).html($(this).attr('data-currency-uzs') + ' UZS');
            }
        })
    

        e.preventDefault();
        $.ajax({
            type: 'POST', 
            url: "/currency_save", 
            data: {
                currency: currency
            }, 
            success: function (data) {
               console.log(data);
            }, 
            error: function (XMLHttpRequest, textStatus, errorThrown) {
                console.log('Error');
            }

        });
    })

    // address listing

    $('#next_page').css('opacity', 0.5);
    $("#next_page").prop('disabled', true);

    var timerAddress;

    $('#address-input').change(function(){
        $('#address-component').val(0);
        $('#next_page').css('opacity', 0.5);
        timerAddress = setInterval(showNext, 500);
    })

    function showNext(){
        if($('#address-component').val() != 0){
            $("#next_page").prop('disabled', false);
            $("#next_page").css('opacity', 1);
            clearInterval(timerAddress);
        }
        else{
            $('#next_page').css('opacity', 0.5);
            $("#next_page").prop('disabled', true);
        }
    }

    // multiple cargo

    $('.personal-type-car--item-2').click(function () {
        $(this).toggleClass('active');
        // $(this).siblings().children('.personal-type-car--item__checkbox').html("");
        $(this).children('.personal-type-car--item__checkbox').html("<svg class='icon icon-ok'><use xlink:href='static/img/svg/symbol/sprite.svg#ok'></use></svg>");

    });

    $('.personal-filter--icon').click(function () {
        $(this).toggleClass('filter-active');
    });

    // driver message
    $(document).on("click", '.you-trip-driver-chat .chat-fixed--click-2', function(e){
        if ($(window).width() < 992) {
            e.stopImmediatePropagation();
            e.preventDefault();
            $(this).parents('.personal-fixed-chat--wrap .you-trip-driver-chat').prev().toggleClass('active');
            $('body').css('overflow','hidden');
            if($('.personal-fixed-chat--container').hasClass('active')){
                $('.header-panel--fixed').css('bottom','-70px');
            } else {

            }
        }

    });

    $('.gogocar-go-back-chat--mobile').click(function () {
        $('.personal-fixed-chat--container').removeClass('active');
        $('body').css('overflow','scroll');
        if(!$('.personal-fixed-chat--container').hasClass('active')){
            $('.header-panel--fixed').css('bottom','0');
        }
    });

    var chat_go2 = function() {
        if ($(window).width() < 992) {
            $(document).on("click", '.chat-fixed--click2', function(e){
                $(this).parents('.personal-fixed-chat--wrap .personal-people--list').next().toggleClass('active');
                $('body').css('overflow','hidden');
                if($('.personal-fixed-chat--container').hasClass('active')){
                    $('.header-panel--fixed').css('bottom','-70px');
                } else {

                }

            });

            $('.gogocar-go-back-chat--mobile').click(function () {
                $('.personal-fixed-chat--container').removeClass('active');
                $('body').css('overflow','scroll');
                if(!$('.personal-fixed-chat--container').hasClass('active')){
                    $('.header-panel--fixed').css('bottom','0');
                }
            });
        }
    };
    chat_go2();
    
});

