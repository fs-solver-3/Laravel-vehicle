$(document).ready(function () {
    AOS.init();
    $('.popular-trip-slider-js').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        appendDots: '.popular-dots--wrap',
        rows: 0,
        variableWidth: true,
        centerMode: false,
        customPaging: function () {
            return '<a class="js-popular-slider__dots"></a>';
        },
        responsive: [
            {
                breakpoint: 576,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: false,
                    centerMode: true
                }
            },

        ]
    });

    $('.chat-content--info__driver--review--js').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: true,
        appendDots: '.chat-dots--wrap',
        rows: 0,
        customPaging: function () {
            return '<a class="js-popular-slider__dots"></a>';
        },
    });

    var now = Date.now();
    $('.popup-show-calendar-click').click(function () {
        var calen_h = $(window).height();
        var calen_et = $('.active .calendar-zone-height').offset().top; // Растояние от верха страницы до блока #scroll
        var calen_c = $('.datepicker-dropdown').height();
        var calen_mc = $('.active .calendar-zone-height').outerHeight();
        var calen_ch = parseInt(calen_et - calen_c - 28);
        var calen_ch2 = parseInt(calen_et + calen_mc + 10);
        height = $('.active .calendar-zone-height').offset().top + $('.active .calendar-zone-height').height()/2 - calen_h/2;

        var get_id = $('.datepicker-dropdown').attr('id');
        if ($(document).scrollTop() >= height){
            ch = calen_ch2
            $('#'+get_id).offset({top:ch})
        } else {
            ch = calen_ch
            $('#'+get_id).offset({top:ch})

        }
    });

    $(window).scroll(function () {
         $('.datepicker-dropdown').each(function () {
            var get_id2 = $(this).attr('id');
            var calen_h = $(window).height();
            var calen_et = $('.active .calendar-zone-height').offset().top; // Растояние от верха страницы до блока #scroll
            var calen_c = $('.datepicker-dropdown').height();
            var calen_mc = $('.calendar-zone-height').outerHeight();
            var calen_ch = parseInt(calen_et - calen_c - 28);
            var calen_ch2 = parseInt(calen_et + calen_mc + 10);
            height = $('.active .calendar-zone-height').offset().top + $('.active .calendar-zone-height').height()/2 - calen_h/2;
            if ($(document).scrollTop() >= height){
                ch = calen_ch2
                $('#'+get_id2).offset({top:ch})

            } else {
                ch = calen_ch
                $('#'+get_id2).offset({top:ch})

            }
            return false;

        });
    });

    $('.popup-show-calendar').each(function(i){
        $(this).datepicker({
            autoShow: false,
            autoPick: true,
            language: 'ru-RU',
            autoHide: true,
            autoclose: true,
            //trigger: '.data-exam-popup',
            container: '.popup-calendar',
            pickedClass: 'picked-day-gogocar',
            highlightedClass: 'today-day-gogocar',
            zIndex: 1050,
            startDate: function(date){
                date.valueOf() < now ? true : false;
            },
            template: '<div class="datepicker-container" id="datepicker-id-'+ (i) +'">' + '<div class="datepicker-panel" data-view="years picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="years prev">&lsaquo;</li>' + '<li data-view="years current"></li>' + '<li data-view="years next">&rsaquo;</li>' + '</ul>' + '<ul data-view="years"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="months picker">' + '<ul>' + '<li data-view="year prev">&lsaquo;</li>' + '<li data-view="year current"></li>' + '<li data-view="year next">&rsaquo;</li>' + '</ul>' + '<ul data-view="months"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="days picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="month prev" class="gogocar-calendar-prev"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M9,17,1,9,9,1" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '<li data-view="month current" class="gogocar-calendar-current"></li>' + '<li data-view="month next" class="gogocar-calendar-next"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M1,1,9,9,1,17" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '</ul>' + '<ul data-view="week"></ul>' + '<ul data-view="days"></ul>' + '</div>' + '</div>',
        });
    });




    $('.personal-calendar').each(function(){
        $(this).datepicker({
            autoShow: false,
            autoPick: true,
            language: 'ru-RU',
            autoHide: true,
            //trigger: '.data-exam-popup',
            container: '.popup-calendar',
            pickedClass: 'picked-day-gogocar',
            highlightedClass: 'today-day-gogocar',
            zIndex: 1050,
            format: 'dd.mm.yyyy',
        });
    });
    $('.personal-calendar-today').each(function(){
        $(this).datepicker({
            autoShow: false,
            autoPick: true,
            language: 'ru-RU',
            autoHide: true,

            //trigger: '.data-exam-popup',
            container: '.popup-calendar',
            pickedClass: 'picked-day-gogocar',
            highlightedClass: 'today-day-gogocar',
            zIndex: 1050,
            endDate: function(date){
                date.valueOf() < now ? true : false;
            },
            format: 'dd.mm.yyyy',
        });
    });
    $('.calendar-passport').each(function(){
        $(this).datepicker({
            //autoShow: true,
            autoPick: false,
            language: 'ru-RU',
            autoHide: true,
            //trigger: '.data-exam-popup',
            inline: true,
            //container: '.trip-show-calendar',
            pickedClass: 'picked-day-gogocar',
            highlightedClass: 'today-day-gogocar',
            zIndex: 1050,
            format: 'yyyy-mm-dd',
            template: '<div class="datepicker-container" id="datepicker-id-trip">' + '<div class="datepicker-panel" data-view="years picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="years prev">&lsaquo;</li>' + '<li data-view="years current"></li>' + '<li data-view="years next">&rsaquo;</li>' + '</ul>' + '<ul data-view="years"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="months picker">' + '<ul>' + '<li data-view="year prev">&lsaquo;</li>' + '<li data-view="year current"></li>' + '<li data-view="year next">&rsaquo;</li>' + '</ul>' + '<ul data-view="months"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="days picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="month prev" class="gogocar-calendar-prev"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M9,17,1,9,9,1" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '<li data-view="month current" class="gogocar-calendar-current"></li>' + '<li data-view="month next" class="gogocar-calendar-next"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M1,1,9,9,1,17" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '</ul>' + '<ul data-view="week"></ul>' + '<ul data-view="days"></ul>' + '</div>' + '</div>',
        });

    });


    $('.trip-show-calendar').each(function(){
        $(this).datepicker({
            autoShow: true,
            autoPick: false,
            language: 'ru-RU',
            // autoHide: true,
            //trigger: '.data-exam-popup',
            inline: true,
            //container: '.trip-show-calendar',
            pickedClass: 'picked-day-gogocar',
            highlightedClass: 'today-day-gogocar',
            zIndex: 1050,
            pick: function (e) {
                var date = $(this).datepicker('getDate', true);
                $('.when-trip-show-date').val(date);
            },
            startDate: function(date){
                date.valueOf() < now ? true : false;
            },
            template: '<div class="datepicker-container" id="datepicker-id-trip">' + '<div class="datepicker-panel" data-view="years picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="years prev">&lsaquo;</li>' + '<li data-view="years current"></li>' + '<li data-view="years next">&rsaquo;</li>' + '</ul>' + '<ul data-view="years"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="months picker">' + '<ul>' + '<li data-view="year prev">&lsaquo;</li>' + '<li data-view="year current"></li>' + '<li data-view="year next">&rsaquo;</li>' + '</ul>' + '<ul data-view="months"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="days picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="month prev" class="gogocar-calendar-prev"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M9,17,1,9,9,1" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '<li data-view="month current" class="gogocar-calendar-current"></li>' + '<li data-view="month next" class="gogocar-calendar-next"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M1,1,9,9,1,17" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '</ul>' + '<ul data-view="week"></ul>' + '<ul data-view="days"></ul>' + '</div>' + '</div>',
        });

    });



    function month() {
        var D = new Date();
        D.setMonth(D.getMonth() + 1);
        console.log(D);
    }

    $('.when-trip-calendar').each(function () {
        var D = new Date();
        D.setDate('01');
        D.setMonth(D.getMonth() + 1);

        $(this).datepicker({

            autoShow: true,
            //autoPick: true,
            language: 'ru-RU',
            // autoHide: true,
            //trigger: '.data-exam-popup',
            inline: true,
            //container: '.trip-show-calendar',
            pickedClass: 'picked-day-gogocar',
            highlightedClass: 'today-day-gogocar',
            zIndex: 1050,
            //format: 'dd/mm/yyyy',
            yearSuffix: '',
            pick: function (e) {
                var date = $(this).datepicker('getDate', true);
                $('.when-trip-show-date').val(date);
            },
            //date: D,
            startDate: D,
            template: '<div class="datepicker-container" id="datepicker-id-when">' + '<div class="datepicker-panel" data-view="years picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="years prev">&lsaquo;</li>' + '<li data-view="years current"></li>' + '<li data-view="years next">&rsaquo;</li>' + '</ul>' + '<ul data-view="years"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="months picker">' + '<ul>' + '<li data-view="year prev">&lsaquo;</li>' + '<li data-view="year current"></li>' + '<li data-view="year next">&rsaquo;</li>' + '</ul>' + '<ul data-view="months"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="days picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="month prev" class="gogocar-calendar-prev"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M9,17,1,9,9,1" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '<li data-view="month current" class="gogocar-calendar-current"></li>' + '<li data-view="month next" class="gogocar-calendar-next"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M1,1,9,9,1,17" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '</ul>' + '<ul data-view="week"></ul>' + '<ul data-view="days"></ul>' + '</div>' + '</div>',
        });

    });







    $(function () {

        $('.main-section-search--input__peoples').click(function () {
            $('.main-section-search--peoples__count--wrap').fadeToggle(150);
        });

        $(document).click(function (e) {
            if (!$(e.target).closest(".main-section-search--input__peoples,.main-section-search--peoples__count--wrap").length) {
                $('.main-section-search--peoples__count--wrap').fadeOut(150);
            }
            e.stopPropagation();
        });

        $('.main-section-search--plus').click(function () {
            if ($(this).prev().text() != 8) {
                $(this).prev().text(+$(this).prev().text() + 1);
            }
            if ($(this).prev().text() >= 8){
                $('.main-section-search--plus').addClass('people-count-end');
            }
            if ($(this).prev().text() > 1){
                $('.main-section-search--minus').removeClass('people-count-start');
            }


            var getPeoleCount = $('.main-section-search-count-div').text();
            if(getPeoleCount == 1){
                $('.main-section-search--input__peoples').val(getPeoleCount + ' пассажир');
            }
            if(getPeoleCount == 2 || getPeoleCount == 3 || getPeoleCount == 4){
                $('.main-section-search--input__peoples').val(getPeoleCount + ' пассажира');
            }
            if(getPeoleCount == 5 || getPeoleCount == 6 || getPeoleCount == 7 || getPeoleCount == 8){
                $('.main-section-search--input__peoples').val(getPeoleCount + ' пассажиров');
            }
        });
        $('.main-section-search--minus').click(function () {
            if ($(this).next().text() > 1) {
                if ($(this).next().text() > 1) $(this).next().text(+$(this).next().text() - 1);

            }
            if ($(this).next().text() <= 1){
                $(this).addClass('people-count-start');
            }
            if ($(this).next().text() < 8 ){
                $('.main-section-search--plus').removeClass('people-count-end');
            }
            var getPeoleCount = $('.main-section-search-count-div').text();

            if(getPeoleCount == 1){
                $('.main-section-search--input__peoples').val(getPeoleCount + ' пассажир');
            }
            if(getPeoleCount == 2 || getPeoleCount == 3 || getPeoleCount == 4){
                $('.main-section-search--input__peoples').val(getPeoleCount + ' пассажира');
            }
            if(getPeoleCount == 5 || getPeoleCount == 6 || getPeoleCount == 7 || getPeoleCount == 8){
                $('.main-section-search--input__peoples').val(getPeoleCount + ' пассажиров');
            }

        });

    });

    // $('.gogocar-how-work--item .gogocar-how-work--number').each(function(i,elem) {
    //     v = i+1;
    //     v = '0'+v;
    //     $(elem).text(v);
    // });



    // SELECT OPTIONS
    (function ( $ ) {
        var elActive = '';
        $.fn.selectCF2 = function( options ) {

            // option
            var settings = $.extend({

                change: function( ){ }, // event change
            }, options );

            return this.each(function(){

                var selectParent = $(this);
                list = [],
                    html = '';


                $(selectParent).hide();
                if( $(selectParent).children('option').length == 0 ){ return; }
                $(selectParent).children('option').each(function(ndx){
                    if( $(this).is(':selected') ){ s = 1; title = $(this).text(); }else{ s = 0; }
                    list.push({
                        value: $(this).attr('value'),
                        text: $(this).text(),
                        selected: s,
                    });

                });

                // style

                html += "<ul class='selectCF'>";
                html += 	"<li class='select gogocar-input--wrapper when-trip-date--wrapper'>";
                html +=         "<div class='gogocar-gray-icons'><svg class='icon icon-clock'><use xlink:href='/static/img/svg/symbol/sprite.svg#clock'></use></svg></div>";
                html +=         "<div class='titleCF'>"+title+"</div>";
                html +=         "<div class='append-icon'><svg class='icon icon-arrow-right'><use xlink:href='/static/img/svg/symbol/sprite.svg#arrow-right'></use></svg></div>";
                html += 		"<ul class='select-options when-trip-date--option row'>";
                $.each(list, function(k, v){ s = (v.selected == 1)? "selected":"";
                    html += 			"<li value='"+v.value+"' class='"+s+"'>"+v.text+"</li>";});
                html += 		"</ul>";
                html += 	"</li>";
                html += "</ul>";


                $(selectParent).after(html);
                var customSelect = $(this).next('ul.selectCF'); // add Html
                var seachEl = $(this).next('ul.selectCF').children('li').children('.searchCF');
                var seachElOption = $(this).next('ul.selectCF').children('li').children('ul').children('li');
                var seachElInput = $(this).next('ul.selectCF').children('li').children('.searchCF').children('input');


                // handle active select
                $(customSelect).unbind('click').bind('click',function(e){
                    e.stopPropagation();
                    if($(this).hasClass('onCF')){
                        elActive = '';
                        $(this).removeClass('onCF');
                        $(this).children().find('.icon-arrow-down').removeClass('arrow-rotate');
                        $(this).removeClass('searchActive'); $(seachElInput).val('');
                        $(seachElOption).show();
                    }else{
                        if(elActive != ''){
                            $(elActive).removeClass('onCF');
                            $(elActive).children().find('.icon-arrow-down').removeClass('arrow-rotate');
                            $(seachElOption).show();
                        }
                        elActive = $(this);
                        $(this).addClass('onCF');
                        $(this).children().find('.icon-arrow-down').addClass('arrow-rotate');
                        $(seachEl).children('input').focus();
                    }
                });

                // handle choose option
                var optionSelect = $(customSelect).children('li').children('ul').children('li');
                $(optionSelect).bind('click', function(e){
                    var value = $(this).attr('value');
                    if( $(this).hasClass('selected') ){
                        //
                    }else{
                        $(optionSelect).removeClass('selected');
                        $(this).addClass('selected');
                        $(customSelect).children('li').children('.titleCF').html($(this).html());
                        $(selectParent).val(value);
                        settings.change.call(selectParent); // call event change
                    }
                });

                // handle search
                $(seachEl).children('input').bind('keyup', function(e){
                    var value = $(this).val();
                    if( value ){
                        $(customSelect).addClass('searchActive');
                        $(seachElOption).each(function(){
                            if( $(this).text().search(new RegExp(value, "i")) < 0 ) {
                                // not item
                                $(this).fadeOut();
                            }else{
                                // have item
                                $(this).fadeIn();
                            }
                        })
                    }else{
                        $(customSelect).removeClass('searchActive');
                        $(seachElOption).fadeIn();
                    }
                })

            });
        };
        $(document).click(function(){
            if(elActive != ''){
                $(elActive).removeClass('onCF');
                $(elActive).children().find('.icon-arrow-down').removeClass('arrow-rotate');
            }
        })
    }( jQuery ));

    $(function(){
        $( ".gogocar-select-when-trip" ).selectCF2({
            color: "#FFF",
            backgroundColor: "#663052",

            change: function () {
                var value = $(this).val();
                var text = $(this).children('option:selected').html();
                $(this).next().next('.select_option_dms').val(text);
                // event_change.html(value+' : '+text);


            }

        });

    });


    // Select
    (function ( $ ) {
        var elActive = '';
        $.fn.selectCF = function( options ) {

            // option
            var settings = $.extend({

                change: function( ){ }, // event change
            }, options );

            return this.each(function(){

                var selectParent = $(this);
                list = [],
                    html = '';


                $(selectParent).hide();
                if( $(selectParent).children('option').length == 0 ){ return; }
                $(selectParent).children('option').each(function(ndx){
                    if( $(this).is(':selected') ){ s = 1; title = $(this).text(); }else{ s = 0; }
                    list.push({
                        value: $(this).attr('value'),
                        text: $(this).text(),
                        selected: s,
                    });

                });

                // style

                html += "<ul class='selectCF'>";
                html += 	"<li class='select'>";
                html +=         "<div class='titleCF select-input'>"+title+"</div>";
                html += 		"<div class='append-icon'><svg class='icon icon-arrow-right'><use xlink:href='static/img/svg/symbol/sprite.svg#arrow-right'></use></svg></div>";
                html += 		"<ul class='select-options'>";
                $.each(list, function(k, v){ s = (v.selected == 1)? "selected":"";
                    html += 			"<li value='"+v.value+"' class='"+s+"'>"+v.text+"</li>";});
                html += 		"</ul>";
                html += 	"</li>";
                html += "</ul>";


                $(selectParent).after(html);
                var customSelect = $(this).next('ul.selectCF'); // add Html
                var seachEl = $(this).next('ul.selectCF').children('li').children('.searchCF');
                var seachElOption = $(this).next('ul.selectCF').children('li').children('ul').children('li');
                var seachElInput = $(this).next('ul.selectCF').children('li').children('.searchCF').children('input');


                // handle active select
                $(customSelect).unbind('click').bind('click',function(e){
                    e.stopPropagation();
                    // alert(e);
                    if($(this).hasClass('onCF')){
                        elActive = '';
                        $(this).removeClass('onCF');
                        $(this).children().find('.icon-arrow-down').removeClass('arrow-rotate');
                        $(this).removeClass('searchActive'); 
                        $(seachElInput).val('');
                        $(seachElOption).show();
                    }else{
                        if(elActive != ''){
                            $(elActive).removeClass('onCF');
                            $(elActive).children().find('.icon-arrow-down').removeClass('arrow-rotate');
                            $(seachElOption).show();
                        }
                        elActive = $(this);
                        $(this).addClass('onCF');
                        $(this).children().find('.icon-arrow-down').addClass('arrow-rotate');
                        $(seachEl).children('input').focus();
                    }
                });

                // handle choose option
                var optionSelect = $(customSelect).children('li').children('ul').children('li');
                $(optionSelect).bind('click', function(e){
                    var value = $(this).attr('value');
                    if( $(this).hasClass('selected') ){
                        //
                    }else{
                        $(optionSelect).removeClass('selected');
                        $(this).addClass('selected');
                        $(customSelect).children('li').children('.titleCF').html($(this).html());
                        $(selectParent).val(value);
                        $(selectParent.children()).each(function(){
                            if ($(this).text() == value)
                              $(this).attr("selected","selected").trigger("change");
                        })
                        settings.change.call(selectParent); // call event change
                    }
                });

                // handle search
                $(seachEl).children('input').bind('keyup', function(e){
                    var value = $(this).val();
                    if( value ){
                        $(customSelect).addClass('searchActive');
                        $(seachElOption).each(function(){
                            if( $(this).text().search(new RegExp(value, "i")) < 0 ) {
                                // not item
                                $(this).fadeOut();
                            }else{
                                // have item
                                $(this).fadeIn();
                            }
                        })
                    }else{
                        $(customSelect).removeClass('searchActive');
                        $(seachElOption).fadeIn();
                    }
                })

            });
        };
        $(document).click(function(){
            if(elActive != ''){
                $(elActive).removeClass('onCF');
                $(elActive).children().find('.icon-arrow-down').removeClass('arrow-rotate');
            }
        })
    }( jQuery ));

    $(function(){
        $( ".gogocar-select" ).selectCF({
            color: "#FFF",
            backgroundColor: "#663052",

            change: function () {
                var value = $(this).val();
                var text = $(this).children('option:selected').html();
                $(this).next().next('.select_option_dms').val(text);
                // event_change.html(value+' : '+text);


            }

        });

    });

    function headerScroll() {

        if ($(window).scrollTop() > 0) {
            $('.header-container').addClass('header-fix');
            $('.header-profile--menu,.header-profile--menu__mobile,.header-sandwich-menu').css('background','rgba(255, 255, 255, 0.11)');
        } else {
            $('.header-container').removeClass('header-fix');
            $('.header-profile--menu,.header-profile--menu__mobile,.header-sandwich-menu').css('background','#363d4a');

        }
    }

    headerScroll();

    $(window).scroll(function () {
        headerScroll();
    });

    $('.header-profile--menu').click(function () {
        $('.header-profile--menu--list').fadeToggle(150);
    });

    $(document).click(function (e) {
        if (!$(e.target).closest(".header-profile--menu,.header-profile--menu--list").length) {
            $('.header-profile--menu--list').fadeOut(150);
        }
        e.stopPropagation();
    });
    $('.header-profile--menu__mobile,.header-sandwich-menu,.gogocar-show-menu').click(function () {
        $('.header-mobile-menu').toggleClass('active');
        if($('.header-mobile-menu').hasClass('active')){
            $('body').css('overflow','hidden');
        } else {
            $('body').css('overflow','scroll');
        }
    });



    $('.popup-reg--link').click(function () {
        $('#popup-login, .modal-backdrop').hide();
    });
    $('.popup-login--link').click(function () {
        $('#popup-register,.modal-backdrop').hide();
        $('#popup-login').show().modal('show');
        $('.header-profile--login').trigger('click')
    });
    // $('.gogocar-active-reg').click(function () {
    //     $('#popup-register,.modal-backdrop').hide();
    // });
    // $('.personal-appeal--step2').click(function () {
    //     $('#popup-appear-step1,.modal-backdrop').hide();
    // });


    // Показать пароль в popup
    $('.popup-show-pass').on('click', function() {
        var $showpass = $(this).prev();
        $(this).toggleClass('active');
        if ($showpass.attr('psswd-shown') == 'false') {

            $showpass.removeAttr('type');
            $showpass.attr('type', 'text');

            $showpass.removeAttr('psswd-shown');
            $showpass.attr('psswd-shown', 'true');


        }else {

            $showpass.removeAttr('type');
            $showpass.attr('type', 'password');

            $showpass.removeAttr('psswd-shown');
            $showpass.attr('psswd-shown', 'false');


        }

    });

    $('.find-trips-tab').click(function () {
        var tabs = $(this).attr('data-trip');
        $(this).addClass('active').siblings().removeClass('active');
        $('.find-trip-form--wrapper .' + tabs).addClass('active').siblings().removeClass('active');

    });

    $('.find-trip-change').click(function () {
        var from = $('.gogocar-from').val();
        var to =  $('.gogocar-to').val();

        $('.gogocar-from').val(to);
        $('.gogocar-to').val(from);


        if ($(this).children().css("transform")=='none') {
            $(this).children().css("transform", "rotate(180deg)");
        }
        else {
            $(this).children().css("transform","")
        }
    });

    $('.find-trip-change--cargo').click(function () {
        var from = $('.gogocar-from--cargo').val();
        var to =  $('.gogocar-to--cargo').val();

        $('.gogocar-from--cargo').val(to);
        $('.gogocar-to--cargo').val(from);


        if ($(this).children().css("transform")=='none') {
            $(this).children().css("transform", "rotate(180deg)");
        }
        else {
            $(this).children().css("transform","")
        }
    });


    var items = [];
    var itemstring = '';
    var items_html = [];
    $('.popup-gogocar-type-cargo--item__wrap').on('click',function (e) {
        e.preventDefault();
        var type_cargo = $(this).children().children('span').text();
        $(this).toggleClass('active');
        if($(this).hasClass('active')){
            $(this).children().children('.popup-gogocar-cargo--checkbox').html('<svg class="icon icon-check ">\n' +
            '<use xlink:href="/static/img/svg/symbol/sprite.svg#check"></use>\n' +
            '</svg>'
            );
            var type_cargo = $(this).children().children('span').text();
            items.push(type_cargo);
            itemstring = itemstring + ' ' + type_cargo;
            items_html.push('<div class="ggc-cargo--item">'+type_cargo+'<svg class="icon icon-close ggc-cargo-delete ">\n' +
                '                      <use xlink:href="/static/img/svg/symbol/sprite.svg#close"></use>\n' +
                '                    </svg></div>');
            //console.log(items);

        } else if(!$(this).hasClass('active')) {
            $(this).children().children('.popup-gogocar-cargo--checkbox').html('');
            var type_cargo = $(this).children().children('span').text();
            for (var i = 0; i < items.length; i++) {
                if (items[i] == type_cargo) {
                    items.splice(i, 1);
                    items_html.splice(i,1);
                }
            }

        }
    });

    $('.popup-go-jaloba').on('click', function (e) {
        e.preventDefault();
        $(this).addClass('active').siblings().removeClass('active');
    });

    $('.type-cargo-choise').click(function (e) {
        e.preventDefault();
        $('.ggc-type-cargo').val(itemstring);
        $('.gogocar-input-hidden-cargo-find').html(items_html);

        if($('.gogocar-input-hidden-cargo-find').find('div').length > 0){
            $('.gogocar-input-hidden-cargo-find').attr('style','top:5px');
        } else {
            $('.gogocar-input-hidden-cargo-find').attr('style','top:auto');
        }
    });

    $('.gogocar-input-hidden-cargo-find').on('click','.ggc-cargo-delete',function (e) {
        e.preventDefault();
        // for (var i = 0; i < items.length; i++) {
        //     if (items[i] == type_cargo) {
        //         items.splice(i, 1);
        //         items_html.splice(i,1);
        //     }
        // }
        $(this).parent().remove();

    });

    $('.all-trip--filter--button').click(function () {
        $(this).toggleClass('active');
        $('.all-trip--popup--wrap').slideToggle(150);
    });
    $('.trips-category--buttons .gogocar-gray-button').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });

    // Чат


    //$('.chat-container-message--name--button').click(showChangeMsg);
    // var x = document.getElementsByClassName("chat-container-message--name--button")
    // if (x.length > 0)
    //     for (let item of x)
    //         item.addEventListener("click", showChangeMsg);
    // function showChangeMsg(){ // Изменить или удалить сообщение
    //     $('.chat-container-option--message').fadeOut(200);
    //     $('.chat-container-message--name--button').removeClass('active');
    //     $(this).toggleClass('active');
    //     $(this).next().fadeToggle(200).toggleClass('active');
    //     if($(this).hasClass('active') && $(window).width() < 576){
    //         $('body').css('overflow','hidden');
    //     } else {
    //         $('body').css('overflow-y','scroll');
    //     }
    //     if($(this).hasClass('active')){
    //         $('.header-panel--fixed').addClass('anim-bottom');
    //     }
    //     // if($('.header-panel--fixed').hasClass('anim-bottom')){
    //     //     $('.personal-absolute-chat--container').css('height','100%');
    //     // }
    // }


    $('.chat-container-option--message--item--cancel,.chat-change-message,.chat-answer-message').click(function () {
        $('.chat-container-option--message,.chat-delete-out-msg').fadeOut(200);
        $('.chat-container-message--name--button').removeClass('active');
        $('body').css('overflow-y','scroll');
        $('.header-panel--fixed').removeClass('anim-bottom');

    });


    $(document).click(function (e) {
        if (!$(e.target).closest(".chat-container-option--message,.chat-container-message--name--button").length) {
            $('.chat-container-option--message').fadeOut(200);
            $('.chat-container-message--name--button').removeClass('active');
            // $('body').css('overflow-y','scroll');
        }
        e.stopPropagation();
    });


    var x = document.getElementsByClassName("chat-container-option--message--item--cancel")
    if (x.length > 0)
        for (let item of x)
            item.addEventListener("click", closeActionChat);
    function closeActionChat() {
        $('.chat-container-option--message').fadeOut(150);
        $('body').css('overflow-y','scroll');
        $('.header-panel--fixed').removeClass('anim-bottom');

    }


    var x = document.getElementsByClassName("cab-chat-emoji")
    if (x.length > 0)
        for (let item of x)
            item.addEventListener("click", handleClickEmoji);

    function handleClickEmoji() {

        var x = document.getElementById("chat-get-text");
        if (x) {
            var img = document.createElement("img");
            img = this.cloneNode(true);
            img.className = 'gogocar-emoji--in-input';
            x.appendChild(img);
        }

    }

    $('.chat-container-footer--smiles').on('click',function () {
        $('.chat-container-footer--emoji--list').fadeToggle(200).css('display','flex');
    });

    $(document).click(function (e) {
        if (!$(e.target).closest(".chat-container-footer--smiles,.chat-container-footer--emoji--list").length) {
            $('.chat-container-footer--emoji--list').fadeOut(200);
        }
        e.stopPropagation();
    });
    $(document).click(function (e) {
        if (!$(e.target).closest(".chat-container--edit--message--file--add").length) {
            $('.chat-container--edit--message--file--add').removeClass('active');
        }
        e.stopPropagation();
    });




    // // Иконки
    // $(function () {
    //     let emojis = {};
    //     let output = {};
    //     var categoryes = [{"order":1,"category":"people","category_label":"Smileys & People","category_rus":"Смайлы"},{"order":2,"category":"nature","category_label":"Animals & Nature","category_rus":"Животные и природа"},{"order":3,"category":"food","category_label":"Food & Drink","category_rus":"Еда и напитки"},{"order":4,"category":"activity","category_label":"Activity","category_rus":"Спорт"},{"order":5,"category":"travel","category_label":"Travel & Places","category_rus":"Путешествия"},{"order":6,"category":"objects","category_label":"Objects","category_rus":"Объекты"},{"order":7,"category":"symbols","category_label":"Symbols","category_rus":"Символы"},{"order":8,"category":"flags","category_label":"Flags","category_rus":"Флаги"}];
    //
    //     function render() {
    //         document.querySelector('#chat-container-emoji').innerHTML = '';
    //
    //         for (var i = 0; i < categoryes.length; i++) {
    //             var div = document.createElement('div');
    //             var div2 = document.createElement('div');
    //
    //             $('<span class="gogocar-emoji--category__title">'+categoryes[i].category_rus+'</span>').appendTo(div2);
    //             div2.className = 'gogocar-emoji--category--wrapper';
    //             div.className = 'gogocar-emoji--category gogocar-emoji--'+ categoryes[i].category +'';
    //             for (let emoji in output) {
    //                 if (categoryes[i].category == emojis[emoji].category) {
    //                     let el = document.createElement('img');
    //                     el.className = 'gogocar-emoji';
    //                     el.src = 'https://cdn.jsdelivr.net/gh/joypixels/emoji-assets@master/png/64/' + emoji + '.png';
    //                     el.alt = emojis[emoji].name;
    //                     el.title = emojis[emoji].name;
    //
    //                     div.appendChild(el);
    //                     div2.appendChild(div);
    //                 }
    //
    //             }
    //
    //             document.querySelector('#chat-container-emoji').appendChild(div2);
    //         }
    //
    //         $('.gogocar-emoji').click(function () {
    //             var get_emoji = $(this).attr('src');
    //             $('.chat-container-footer--input__text').append('<img class="gogocar-emoji--in-input" src='+get_emoji+' />');
    //         });
    //
    //
    //     }
    //
    //     function filter(event) {
    //        if (event.target.value == '') {
    //            output = emojis;
    //            render();
    //            return;
    //        }
    //        let val = event.target.value.split(' ');
    //        let newout = {};
    //        for (let emoji in emojis) {
    //            let condition = true;
    //            for (let i = 0; i < val.length; i++) {
    //                condition = condition && emojis[emoji].name.includes(val[i]);
    //            }
    //            if (condition) {
    //                newout[emoji] = emojis[emoji];
    //            }
    //        }
    //        output = newout;
    //        render();
    //    }
    //    $('.chat-container-footer--smiles').on('click',function () {
    //        fetch('https://cdn.jsdelivr.net/gh/joypixels/emoji-assets@master/emoji.json')
    //            .then(res => res.json())
    //            .then(data => {
    //                emojis = output = data;
    //                render();
    //            })
    //    });
    //
    //        //.catch(err => alert('Иконки не загрузились: ' + err.message));
    //
    //    document.querySelector('#gogocar-search-emoji').addEventListener('input', filter);
    // });

    $('.chat-container-footer--input__text').click(function () {
        $('.chat-container-footer--placeholder').fadeOut(150);
    });
    if (!$('.chat-container-footer--input__text').is(':empty')){
        $('.chat-container-footer--placeholder').fadeOut(200);
    }


    $(document).click(function (e) {

        if (!$(e.target).closest(".chat-container-footer--input__text,.chat-container-footer--file__input,.chat-container-footer--smiles,.gogocar-emoji,.chat-container-footer--emoji").length) {
            $('.chat-container-footer--placeholder').fadeIn(200);
        }
        if ($('.chat-container-footer--input__text').html()) {
            $('.chat-container-footer--placeholder').hide();
        }
        e.stopPropagation();
    });
    //


    $(function () {


        $('.chat-answer-message').on('click',function () {
            $('#chat-edit-msg').fadeIn(150).css('display','flex');
        });
        $('#chat-edit-close').click(function () {
            $('#chat-edit-msg').fadeOut(150).removeClass('chat-edit-now');

        });



        var x = document.getElementsByClassName("chat-change-message")
        if (x.length > 0)
            for (let item of x)
                item.addEventListener("click", changeMsg);
        function changeMsg(){ // Удаление сообщений отправителя
            $('#chat-edit-msg').fadeIn(150).css('display','flex');
            var get_text_edit = $(this).parents('.chat-container-message--date__name').next().text();
            $('#chat-edit-text').text(get_text_edit);
            $('.chat-show-message-out--mobile').fadeOut(150);
            $('.header-panel--fixed').removeClass('anim-bottom');
        }

        var x = document.getElementsByClassName("chat-answer-message")
        if (x.length > 0)
            for (let item of x)
                item.addEventListener("click", shareMsg);
        function shareMsg(){ // Удаление сообщений отправителя
            $('#chat-edit-msg').fadeIn(150).css('display','flex').addClass('chat-edit-now');

            var get_text_share = $(this).parents('.chat-container-message--date__name').next().text();
            var get_name_share = $(this).parents('.chat-container-option--message').next().text();
            $('#chat-edit-text').text(get_text_share);
            $('.chat-container--edit--title').text(get_name_share);

        }



        var x = document.getElementsByClassName("chat-delete-message")
        if (x.length > 0)
            for (let item of x)
                item.addEventListener("click", deleteMsg);
        function deleteMsg(){ // Удаление сообщений отправителя
            $(this).parents('.chat-container-message-out').remove();
            $('.header-panel--fixed').removeClass('anim-bottom');
        }

        $('.chat-container-option-dot').click(function () {
            $('.chat-container-header--delete__message').fadeOut(200);
            $(this).next('.chat-container-header--delete__message').fadeIn(200).css('display','flex');
            $('.chat-container-option-dot').removeClass('chat-close-delete__window');
            $(this).toggleClass('chat-close-delete__window');
        });

        $(document).click(function (e) {
            if (!$(e.target).closest(".chat-container-option-dot,.chat-container-header--delete__message").length) {
                $('.chat-container-header--delete__message').fadeOut(200);
                $('.chat-container-option-dot').removeClass('chat-close-delete__window');

            }
            e.stopPropagation();
        });


        // $('.chat-container-header--delete__message').click(cdm);
        function cdm(){
            $(this).fadeOut(100);
            $('.chat-container-header--option-delete__panel').css('display','flex');
            $('.gogocar-go-back-chat--mobile').addClass('active');
            $('.chat-container-option-dot').css('display','none');
            $('.chat-container-message--wrap--delete__check--wrap').css('display','flex');
        }

        // $('.chat-container-header--option-delete--back').click(cdmb);
        function cdmb(){
            $('.chat-container-header--option-delete__panel').css('display','none');
            $('.chat-container-option-dot').css('display','flex');
            $('.chat-container-message--wrap--delete__check--wrap').css('display','none');
            $('.gogocar-go-back-chat--mobile').removeClass('active');
            $('.chat-delete-out-msg').removeClass('active');
            $('.header-panel--fixed').removeClass('anim-bottom');
        }

        // $('.chat-container-header--option-delete--delete').click(showDelMsg);
        function showDelMsg(){ // Изменить или удалить сообщение
            $('.chat-delete-out-msg').addClass('active');

            if($(window).width() < 576){
                $('body').css('overflow','hidden');
                $('.chat-delete-out-msg').fadeIn(200);
            } else {
                $('body').css('overflow-y','scroll');
            }
            if($('.chat-delete-out-msg').hasClass('active')){
                $('.header-panel--fixed').addClass('anim-bottom');
            }
        }

        var x = document.getElementsByClassName("chat-container-message--wrap--delete__check")
        if (x.length > 0)
            for (let item of x)
                item.addEventListener("click", deleteAllMsg);
        function deleteAllMsg(){ // Удаление сообщений отправителя
            $(this).toggleClass('checked');
            if($(this).hasClass('checked')){
                $(this).html('<svg class="icon icon-ok-del "><use xlink:href="static/img/svg/symbol/sprite.svg#ok-del"></use></svg>')
                $(this).parents('.chat-container-message-out').addClass('checked-delete-msg');
            } else {
                $(this).html('');
                $(this).parents('.chat-container-message-out').removeClass('checked-delete-msg');
            }

        }

        // $('.chat-container-message--wrap--delete__check').click(function () {
        //     $(this).toggleClass('checked');
        //     if($(this).hasClass('checked')){
        //         $(this).html('<svg class="icon icon-ok-del "><use xlink:href="static/img/svg/symbol/sprite.svg#ok-del"></use></svg>')
        //         $(this).parents('.chat-container-message-out').addClass('checked-delete-msg');
        //     } else {
        //         $(this).html('');
        //         $(this).parents('.chat-container-message-out').removeClass('checked-delete-msg');
        //     }
        //
        // });
        $('.delete-choise-chat-msg,.chat-choise-delet-msg').click(function () {
            $('.checked-delete-msg').remove();
        });
        $('.chat-choise-delet-msg').click(function () {
            $('.chat-delete-out-msg').fadeOut(150);
            $('.header-panel--fixed').removeClass('anim-bottom');
        });

        // Добавить сообщение
        var today = new Date();
        var getDate = today.getDate();
        var time = today.getHours() + ":" + today.getMinutes();



        // $('.chat-container-footer--submit').click(printMsg);
        function printMsg() {
            var contents = $('#chat-get-text').html();

            var c_name = $('.chat-container--edit--title').text();
            var c_text = $('.chat-container--edit--text').text();
            var content_share = '<div class="chat-message--share--info"><div class="chat-message--share--info__name">'+ c_name +'</div><div class="chat-message--share--info__text">'+ c_text +'</div></div>'

            $('.chat-container-main--info').append(

                '<div class="chat-container-people-messages chat-container-message-out">\n' +
                '                        <div class="chat-container-message--wrapper">\n' +
                '                          <div class="chat-container--message--status">\n' +
                '                            <svg class="icon icon-not-looked ">\n' +
                '                              <use xlink:href="static/img/svg/symbol/sprite.svg#not-looked"></use>\n' +
                '                            </svg>\n' +
                '                          </div>\n' +
                '                          <div class="chat-container-message--wrap">\n' +
                '                            <div class="chat-container-message--info__message">\n' +
                '                              <div class="chat-container-message--date__name"><span>'+ time +'</span>\n' +
                '                                <div class="chat-container-message--name--wrap">\n' +
                '                                  <div class="chat-container-message--name--button">\n' +
                '                                    <svg class="icon icon-arrow-right ">\n' +
                '                                      <use xlink:href="static/img/svg/symbol/sprite.svg#arrow-right"></use>\n' +
                '                                    </svg>\n' +
                '                                  </div>\n' +
                '                                  <div class="chat-container-option--message chat-show-message-out chat-show-message-out--mobile">\n' +
                '                                    <div class="chat-container-option--message--wrap">\n' +
                '                                      <div class="chat-container-option--message--wrap--buttons">\n' +
                '                                        <div class="chat-container-option--message--item chat-change-message">\n' +
                '                                          <svg class="icon icon-pen ">\n' +
                '                                            <use xlink:href="static/img/svg/symbol/sprite.svg#pen"></use>\n' +
                '                                          </svg><span>Изменить</span>\n' +
                '                                        </div>\n' +
                '                                        <div class="chat-container-option--message--item chat-delete-message">\n' +
                '                                          <svg class="icon icon-delete ">\n' +
                '                                            <use xlink:href="static/img/svg/symbol/sprite.svg#delete"></use>\n' +
                '                                          </svg><span>Удалить</span>\n' +
                '                                        </div>\n' +
                '                                      </div>\n' +
                '                                      <div class="chat-container-option--message--item--cancel">Отмена</div>\n' +
                '                                    </div>\n' +
                '                                  </div>\n' +
                '                                  <div class="chat-container-message--name">Татьяна Гусева</div>\n' +
                '                                </div>\n' +
                '                              </div>\n' +
                '                              <p class="chat-container--message">'+ contents  +'</p>\n' +
                '                            </div>\n' +
                `                          <div class='chat-container-message--img' style='background-image:url("/static/img/content/drivers-avatar/driver2.png");'></div>\n` +
                '                          </div>\n' +
                '                          <div class="chat-container-message--wrap--delete__check--wrap">\n' +
                '                            <div class="chat-container-message--wrap--delete__check"></div>\n' +
                '                          </div>\n' +
                '                        </div>\n' +
                '                      </div>'
            )
            var x = document.getElementsByClassName("chat-container-message--name--button")
            if (x.length > 0)
                for (let item of x)
                    item.addEventListener("click", showChangeMsg);
            var x = document.getElementsByClassName("chat-delete-message")
            if (x.length > 0)
                for (let item of x)
                    item.addEventListener("click", deleteMsg);
            var x = document.getElementsByClassName("chat-container-message--wrap--delete__check")
            if (x.length > 0)
                for (let item of x)
                    item.addEventListener("click", deleteAllMsg);
            var x = document.getElementsByClassName("chat-change-message")
            if (x.length > 0)
                for (let item of x)
                    item.addEventListener("click", changeMsg);
            var x = document.getElementsByClassName("chat-container-option--message--item--cancel")
            if (x.length > 0)
                for (let item of x)
                    item.addEventListener("click", closeActionChat);



        }

    });


    $('.chat-container--archive').click(function () {
        $(this).next().fadeIn(200);
        $('.chat-container--archive').removeClass('active');
        $(this).toggleClass('active');
    });

    $(document).click(function (e) {
        if (!$(e.target).closest(".chat-all-archive,.chat-all-messages,.chat-container--archive").length) {
            $('.chat-all-archive,.chat-all-messages').fadeOut(200);
            $('.chat-container--archive').removeClass('active');
        }
        e.stopPropagation();
    });

    $('.chat-all-archive').click(function () {
        $('.perspective-chat').removeClass('front-side-chat');
        $('.perspective-chat').addClass('back-side-chat');
        $('.chat-content--info--frontside').addClass('active');
        $('.chat-content--info--backside').removeClass('active');
    });

    $('.chat-all-messages').click(function () {
        $('.chat-content--info--frontside').removeClass('active');
        $('.chat-content--info--backside').addClass('active');
        $('.perspective-chat').removeClass('back-side-chat');


    });




    $('.chat-message-to-archive--arrow-wrap').click(function () {
        $('.chat-to-archive').fadeOut(200);
        $(this).next().fadeIn(200);
        $('.chat-message-to-archive--arrow-wrap').removeClass('active');
        $(this).toggleClass('active');
    });

    $(document).click(function (e) {
        if (!$(e.target).closest(".chat-to-archive,.chat-message-to-archive--arrow-wrap").length) {
            $('.chat-to-archive').fadeOut(200);
            $('.chat-message-to-archive--arrow-wrap').removeClass('active');
        }
        e.stopPropagation();
    });

    $('.chat-to-archive').click(function () {
        $(this).toggleClass('chat-archived');
        $(this).fadeOut(200);
    });




    // $('.car-place--svg--places').click(function () {
    //     $(this).toggleClass('active');
    //     $('.car-place--booked').removeClass('active');
    // });

    // при вводе текста в поиске выполнить
    $(".suggest-late--input--from,.suggest-late--input--to").on('keydown',function() {
        if ($(this).val().length) {
            $(this).addClass('active');
            $('.suggest-late--result--list').slideDown(200);
        } else {
            $(this).removeClass('active');
            $('.suggest-late--result--list').slideUp(200);
        }
    });

    $(document).click(function (e) {
        if (!$(e.target).closest(".suggest-late--result--list,.suggest-late--input--from,.suggest-late--input--to").length) {
            $('.suggest-late--result--list').slideUp(200);
            $('.suggest-late--input--from,.suggest-late--input--to').removeClass('active');
        }
        e.stopPropagation();
    });

    $('.trip-stops--item').on('click',function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        if($(this).hasClass('active')){
            $(this).children().next('.popup-gogocar-cargo--checkbox').html('<svg class="icon icon-check ">\n' +
                '<use xlink:href="/static/img/svg/symbol/sprite.svg#check"></use>\n' +
                '</svg>'
            );

        } else if(!$(this).hasClass('active')) {
            $(this).children().next('.popup-gogocar-cargo--checkbox').html('');
        }
    });


    $('.trip-stops--places--item').on('click',function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        if($(this).hasClass('active')){
            $(this).children('.popup-gogocar-cargo--checkbox').html('<svg class="icon icon-check ">\n' +
                '<use xlink:href="/static/img/svg/symbol/sprite.svg#check"></use>\n' +
                '</svg>'
            );

        } else if(!$(this).hasClass('active')) {
            $(this).children('.popup-gogocar-cargo--checkbox').html('');
        }
    });
    // Modal Covid
    setTimeout(function(){$('#popup-covid,#popup-go-back').modal('show');}, 3000);

    $('.trip-select-car').click(function () {
        $(this).toggleClass('active');
        $(this).siblings('.trip-select-car--list').slideToggle(200);
    });
    $(document).click(function (e) {
        if (!$(e.target).closest(".trip-select-car,.trip-select-car--item").length) {
            $('.trip-select-car').removeClass('active');
        }
        e.stopPropagation();
    });
    $('.trip-select-car--item').click(function () {
        var get_car_id = $(this).children().children().children('.trip-select-car-name--id').val();
        var get_car_model = $(this).children().children().children('.trip-select-car-name--number1').text();
        var get_car_number = $(this).children().children().children('.trip-select-car-name--number2').text();
        $('.trip-select--car--id').val(get_car_id);
        // $('.trip-select--car--name1').text(get_car_model);
        $('.trip-select--car--name .trip-select--car--name2').text(get_car_number);
        $('.trip-select-car--list').slideUp(200);

    });


    $('.trip-choise-car--count--plus').click(function () {
        if ($(this).prev().children().next().val() != 40) {
            $(this).prev().children().next().val(+$(this).prev().children().next().val() + 1);
        }
        if ($(this).prev().children().next().val() >= 40){
            $('.trip-choise-car--count--plus').addClass('people-count-end');
        }
        if ($(this).prev().children().next().val() > 1){
            $('.trip-choise-car--count--minus').removeClass('people-count-start');
        }

    });
    $('.trip-choise-car--count--minus').click(function () {
        if ($(this).next().children('.trip-choise-car--count--input').val() > 1) {
            if ($(this).next().children('.trip-choise-car--count--input').val() > 1) $(this).next().children('.trip-choise-car--count--input').val(+$(this).next().children('.trip-choise-car--count--input').val() - 1);

        }
        if ($(this).next().children('.trip-choise-car--count--input').val() <= 1){
            $(this).addClass('people-count-start');
        }
        if ($(this).next().children('.trip-choise-car--count--input').val() < 40 ){
            $('.trip-choise-car--count--plus').removeClass('people-count-end');
        }

    });

    
    $('.remove-change--price--plus').click(function() {
        let current_currency = $('.fci-choised .currency-gocar').attr('data-currency');
        var get_rem_price = parseInt($('.remove-change--price-text').attr('data-change-price'));
        var x = $(this).prev().text();
        var c = $(this).prev().attr('data-change-currency');
        x = parseInt(x) + get_rem_price;
        var ratio = $(this).prev().attr('data-change-ratio');
        console.log('current_currency', current_currency);
        if(current_currency == 'RUB'){
            $(this).prev().attr('data-currency-rub', x);
            $(this).prev().attr('data-currency-uzs', (x * ratio).toFixed(0));
        }
        else{
            $(this).prev().attr('data-currency-rub', (x / ratio).toFixed(1));
            $(this).prev().attr('data-currency-uzs', x);
        }
        $(this).prev().text(x + ' '+ c +'');
    });
    $('.remove-change--price--minus').click(function() {
        let current_currency = $('.fci-choised .currency-gocar').attr('data-currency');
        var get_rem_price = parseInt($('.remove-change--price-text').attr('data-change-price'));
        var q = $(this).next().text();
        var c = $(this).next().attr('data-change-currency');
        q = parseInt(q) - get_rem_price;
        var ratio = $(this).next().attr('data-change-ratio');
        if (q < 0) q = 0;
        if(current_currency == 'RUB'){
            $(this).next().attr('data-currency-rub', q);
            $(this).next().attr('data-currency-uzs', (q * ratio).toFixed(0));
        }
        else{
            $(this).next().attr('data-currency-rub', (q / ratio).toFixed(1));
            $(this).next().attr('data-currency-uzs', q);
        }
        $(this).next().text(q + ' '+ c +'');
    });






    // проверить на заполненость
    $(".gogocar-placeholder .gogocar-input-v1").on('keydown',function() {
        if ($(this).val().length) {
            $(this).next('label').fadeOut(200);

        } else {
            $(this).next('label').fadeIn(200);
        }
    });

    $("#upload_image").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.add-photo--icon').attr('style', 'background-image:url("'+ e.target.result +'")');
            };
            reader.readAsDataURL(this.files[0]);
        }
        $('.add-photo--info label,.continue-without-photo').fadeOut(150);
        $('.add-photo--info--buttons').html('<div class="gogocar-gray-button m-0-auto-none mr-5" onclick="goback()">Назад</div><button type="submit" class="gogocar-yellow-button m-0-auto-none">Сохранить</button>')

    });

    // Фильтр цена
    $(function () {
        $('.filter-slider').slider({
            animate: true,
            range: true,
            min: 20000,
            max: 50000,
            values: [20000, 50000],
            slide: function (event, ui) {

                $('.ui-slider-handle:eq(0) .price-range-min').html(ui.values[0]);
                $('.ui-slider-handle:eq(1) .price-range-max').html(ui.values[1]);
                $('.price-range-both').html('<i>' + ui.values[0] + ' - </i>' + ui.values[1]);
                // $('#filter-dot-slide1').val(ui.values[0]);
                // $('#filter-dot-slide2').val(ui.values[1]);
                $(this).next().children('.hidden1').text(ui.values[0]);
                $(this).next().children('.hidden2').text(ui.values[1]);


            },
        });

        $("input.sliders-filters").change(function () {
            var $this = $(this);
            $(".filter-slider").slider("values", $this.data("index"), $this.val());
        });

        var min = $(".filter-slider").slider("option", "min");
        var max = $(".filter-slider").slider("option", "max");
        $(".min-values").text(min);
        $(".max-values").text(max);

    });

    $('.gogocar-you-trip--wrap .gogocar-gray-button').click(function () {
        var blocks = $(this).attr('data-gogocar');
        $(this).addClass('active').siblings().removeClass('active');
        $('.you-trip--content .' + blocks).addClass('active').siblings().removeClass('active');
    });

    $('.you-trip-chat-content .chat-content--info__driver--review--content').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });

    $("#acc-img").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.account-control--panel__img').attr('style', 'background-image:url("'+ e.target.result +'");border: 1px solid transparent;background-color:#3B4351;');

            };
            reader.readAsDataURL(this.files[0]);
        }

    });

    $('.mask-phone').mask('(+998) 000-00-00');
    // $('.mask-phone-choise').mask('(+900 00) 000-00-00');
    if($('.mask-phone-choise').val().length > 0){
        if($('.mask-phone-choise').val().includes('+7')){
            $('.mask-phone-choise').mask('+7 (000) 000-00-00');
        }
        else if($('.mask-phone-choise').val().includes('+9')){
            $('.mask-phone-choise').mask('(+900 00) 000-00-00');
        }
        else{
            $('.mask-phone-choise').mask('(+900 00) 000-00-00');
        }
    }
    $('.mask-year').mask('0000');


    $('html').on({
        dragleave: function() {
            $('.dropzone-drag').css('background-color', 'transparent');
        },
        dragover: function(){
            $('.dropzone-drag').css('background-color', '#fdab3e7a');
        },
        drop: function() {
            $('.dropzone-drag').css('background-color', 'transparent');

        }
    });

    $("#personal-photo").change(function () {

        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.personal-photo--dropzone__img').attr('style', 'background-image:url("'+ e.target.result +'");background-color:#303743;');

            };
            reader.readAsDataURL(this.files[0]);
        }

    });




    $('.personal-content--prefes--item__rules__item').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });

    $('.choise-country--gogocar').click(function () {
        $(this).toggleClass('active');
        $('.choise-country--gogocar--list').fadeToggle(100);
    });

    $(document).click(function (e) {
        if (!$(e.target).closest(".choise-country--gogocar,.choise-country--gogocar--list").length) {
            $('.choise-country--gogocar--list').fadeOut(100);
        }
        e.stopPropagation();
    });

    $('.choise-country--gogocar--list .choise-country--gogocar--item').click(function () {
        var get_img_country = $(this).children('.choise-country--flag').attr('style');
        var get_data_code = $(this).children('.choise-country--code').attr('data-code');
        var get_data_place = $(this).children('.choise-country--code').attr('data-placeholder')

        $('.choise-country--gogocar .choise-country--flag').attr('style',get_img_country);
        $('.choise-country--gogocar .choise-country--code').text(get_data_code);
        $('.ccp--gogocar').attr('placeholder',get_data_place);

    });
    $('.personal-add--car--mark--item').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });


    // при вводе текста в поиске выполнить
    // $(".personal-search-car--input").on('keydown',function() {
    //     if ($(this).val().length) {
    //         $(this).addClass('active');
    //         $(this).parent().next().slideDown(200);
    //     } else {
    //         $(this).removeClass('active');
    //         $(this).parent().next().slideUp(200);
    //     }
    // });

    $(document).click(function (e) {
        if (!$(e.target).closest(".personal-search-car--input,.personal-add--car--mark").length) {
            // $('.personal-add--car--mark').slideUp(200);
            $('.personal-search-car--input').removeClass('active');
        }
        e.stopPropagation();
    });
    $('.personal-type-car--item').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        $(this).siblings().children('.personal-type-car--item__checkbox').html("");
        $(this).children('.personal-type-car--item__checkbox').html("<svg class='icon icon-ok'><use xlink:href='static/img/svg/symbol/sprite.svg#ok'></use></svg>");

    });

    $(function () {
        $('.personal-color-car--item').each(function () {
            var get_color_car = $(this).attr('data-car-color');
            $(this).css('background-color',get_color_car);
            // $(this).attr('style','background-color:#'+ get_color_car +'');
        });

        $('.personal-color-car--item').click(function () {
            var get_color_car = $(this).attr('data-car-color');
            $(this).addClass('active').siblings().removeClass('active');
            $('.personal-color-car--item').css('box-shadow','0px 0px 0px 6px rgba(255, 255, 255, 0.1)');
            $(this).css('box-shadow','0px 0px 0px 6px '+ get_color_car +'');

        });


    });

    $('.personal-rev-circule').circleProgress({
        startAngle: -1,
        lineCap: 'round',
        fill: {color: '#FDAB3E'}
    }).on('circle-animation-progress', function(event, progress, stepValue) {
        $(this).find('strong').text(stepValue.toFixed(1));
        //$(this).find('strong').html(Math.round(100 * progress) + '<i>%</i>');
    });

    $('.personal-filter--icon,.personal-pay--filter--top--mobile .gogocar-yellow-icons').click(function () {
        $('.personal-pay--filter--bottom--footer').slideToggle(150);
    });


    $('.personal-notific--checkbox--item--check').on('click',function () {
        $(this).toggleClass('checked');
        var $listSort = $(this);
        if ($listSort.children('.personal-notific--checkbox--input').attr('checked')) {
            $listSort.children('.personal-notific--checkbox--input').removeAttr('checked', false);
        } else {
            $listSort.children('.personal-notific--checkbox--input').attr('checked', true);
        }

    });
    $('.popup-input--money--item').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        $('.popup-input--money--item input').removeAttr('checked',true);
        $(this).children('input').attr('checked',true);
        $('.popup-input--money--checkbox').html("")
        $(this).children('.popup-input--money--checkbox').html("<svg class='icon icon-ok'><use xlink:href='static/img/svg/symbol/sprite.svg#ok'></use></svg>")
    });

    $('.personal-appear--radio--item').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        $('.personal-appear--radio--item input').removeAttr('checked',true);
        $(this).children('input').attr('checked',true);
    });





    // создём массив ВНЕ функции, чтобы он каждый раз не затирался
    var array_files = [];


    // $(function () {


    //     $('.personal-upload-files--input,.chat-container-footer--input__file').on('change', function (e) {
    //         // $('.chat-container--edit--message--file--add').addClass('active');
    //         //var array_files = e.target.files;
    //         //var array_files.push(e.target.files[0]);
    //         array_files = [];
    //         // пушим файлы в массив
    //         for (var i = 0; i < e.target.files.length; i++) {
    //             array_files.push(e.target.files[i]);
    //         }

    //         var data = new FormData(); var count = 0;
    //         $.each(array_files, function(i, file){
    //             data.append(count, file);
    //             count++;
    //         });

    //         // удаляем все старые иконки файлов на JS
    //         var x = document.getElementsByClassName("personal-appear--file--wrap");
    //         for (var i = 0; i < x.length; i++) {
    //             // удаляем с конца!!!
    //             for (var y = x[i].childNodes.length - 1; y >= 0; y--) {
    //                 if (x[i].childNodes[y].className == "personal-loaded--file")
    //                     x[i].removeChild(x[i].childNodes[y]);

    //             }
    //         }

    //         // здесь ты получал расширение только певого файла
    //         // поэтому иконки для всех файлов были одинаковые


    //         Array.from(array_files).forEach(file => {



    //             var file_name = file.name;
    //             var substr = file_name.split('.').shift().substring(0,15);

    //             // теперь расширение файла получается здесь
    //             // поэтому иконки файлов правильные
    //             var ext = file_name.split('.').pop();
    //             var file_format = ext;


    //             if(file_format == 'pdf'){
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file active"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-pdf"><use xlink:href="/static/img/svg/symbol/sprite.svg#pdf"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             } else if(file_format == 'png'){
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file active"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-png"><use xlink:href="/static/img/svg/symbol/sprite.svg#png"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             } else if(file_format == 'jpg' || 'jpeg'){
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file active"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-jpg"><use xlink:href="/static/img/svg/symbol/sprite.svg#jpg"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             } else if(file_format == 'docx'){
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file active"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-doc"><use xlink:href="/static/img/svg/symbol/sprite.svg#doc"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             } else if(file_format == 'zip'){
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file active"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-zip"><use xlink:href="/static/img/svg/symbol/sprite.svg#zip"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             } else if(file_format == 'txt'){
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file active"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-txt"><use xlink:href="/static/img/svg/symbol/sprite.svg#txt"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             }
    //         });

    //     });

    // });

    // $('.personal-loaded--file__icon').click(function () {
    //     $('.personal-loaded--file').remove();
    //     array_files = [];
    //     // $(".chat-container-footer")[0].reset();
    //     $('.chat-container--edit--message--file--add').removeClass('active');
    // });

    $('.footer-country-list').click(function () {
        $(this).toggleClass('active');
        $('.footer-country-list--block').fadeToggle(100);
    });

    $(document).click(function (e) {
        if (!$(e.target).closest(".footer-country-list--block,.footer-country-list").length) {
            $('.footer-country-list--block').fadeOut(100);
        }
        e.stopPropagation();
    });

    $('.fci-choise').click(function () {
        var get_lang = $(this).children('.footer-country-item__img').attr('style');
        var get_name = $(this).children('span').text();
        let currency = $(this).data('currency');
        $('.fci-choised').children('.footer-country-item__img').attr('style',get_lang);
        $('.fci-choised').children('span').text(get_name);
        $('.fci-choised').children('div').attr('data-currency', currency);
    });


    $('.footer-country-item2').click(function () {
        $(this).toggleClass('active');
        $('.footer-country-choise--list').fadeToggle(100);
    });

    $(document).click(function (e) {
        if (!$(e.target).closest(".footer-country-choise--list,.footer-country-item2").length) {
            $('.footer-country-choise--list').fadeOut(100);
        }
        e.stopPropagation();
    });

    $('.footer-country-choise--item').click(function () {
        var get_lang2 = $(this).children('.footer-country-item__img').attr('style');
        $('.footer-country-item2').children('.footer-country-item__img').attr('style',get_lang2);

    });

    $('.all-trip--sort').click(function () {
        $(this).toggleClass('active');
        $('.all-trip--sort--select').fadeToggle(150);
    });
    $('.all-trip--sort--select__item').click(function () {
        var get_text = $(this).text();
        var a = $(this).data('type');
        $('.all-trip--sort span').text(get_text);
        $('.all-trip--sort span').data('type',a);var sort_by = $(".all-trip--sort span").data("type");console.log(sort_by);
        search_ride();
    });
    $(document).click(function (e) {
        if (!$(e.target).closest(".all-trip--sort,.all-trip--sort--select").length) {
            $('.all-trip--sort--select').fadeOut(150);
            $('.all-trip--sort').removeClass('active');
        }
        e.stopPropagation();
    });


    // @media Slick
    $('.popular-trip--list').slick({
        centerMode: true,
        arrows: false,
        responsive: [
            {
                breakpoint: 9999,
                settings: "unslick"
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                }
            },

        ]
    });

    $('.how-work--list').slick({
        arrows: false,
        responsive: [
            {
                breakpoint: 9999,
                settings: "unslick"
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: true,
                    appendDots: '.how-dots--wrap',
                    customPaging: function () {
                        return '<a class="js-how-slider__dots"></a>';
                    },
                }
            },

        ]
    });

    $('.why-choise-list').slick({
        arrows: false,
        responsive: [
            {
                breakpoint: 9999,
                settings: "unslick"
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: true,
                    appendDots: '.why-dots--wrap',
                    customPaging: function () {
                        return '<a class="js-why-slider__dots"></a>';
                    },
                }
            },

        ]
    });

    $('.blog-main--bottom').slick({
        arrows: false,
        responsive: [
            {
                breakpoint: 9999,
                settings: "unslick"
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: true,
                    appendDots: '.blog-main-dots--wrap',
                    customPaging: function () {
                        return '<a class="js-blog-main-slider__dots"></a>';
                    },
                }
            },

        ]
    });

    $('.blog-main--bottom2').slick({
        arrows: false,
        responsive: [
            {
                breakpoint: 9999,
                settings: "unslick"
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: true,
                    appendDots: '.blog-main-dots--wrap2',
                    customPaging: function () {
                        return '<a class="js-blog-main-slider__dots"></a>';
                    },
                }
            },

        ]
    });

    $('.blog-main--bottom3').slick({
        arrows: false,
        responsive: [
            {
                breakpoint: 9999,
                settings: "unslick"
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: true,
                    appendDots: '.blog-main-dots--wrap3',
                    customPaging: function () {
                        return '<a class="js-blog-main-slider__dots"></a>';
                    },
                }
            },

        ]
    });

    $('.blog-main--bottom4').slick({
        arrows: false,
        responsive: [
            {
                breakpoint: 9999,
                settings: "unslick"
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: true,
                    appendDots: '.blog-main-dots--wrap4',
                    customPaging: function () {
                        return '<a class="js-blog-main-slider__dots"></a>';
                    },
                }
            },

        ]
    });



    $('.drivers-nearby--list').slick({
        arrows: false,
        responsive: [
            {
                breakpoint: 9999,
                settings: "unslick"
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    dots: true,
                    appendDots: '.how-dots--wrap',
                    customPaging: function () {
                        return '<a class="js-how-slider__dots"></a>';
                    },
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    centerMode: true,
                    dots: true,
                    appendDots: '.how-dots--wrap',
                    customPaging: function () {
                        return '<a class="js-how-slider__dots"></a>';
                    },
                }
            },

        ]
    });

    $('.you-trip-chat-content--slick').slick({
        arrows: false,
        responsive: [
            {
                breakpoint: 9999,
                settings: "unslick"
            },

            {
                breakpoint: 576,
                settings: {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    centerMode: true,
                    variableWidth: true,
                    dots: false,
                    infinite: false,
                    focusOnSelect: true,

                }
            },

        ]
    });


    var chat_go = function() {
        if ($(window).width() < 992) {
            $(document).on("click", '.chat-fixed--click', function(e){
                e.stopImmediatePropagation();
                e.preventDefault();
                console.log('clicked')
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
    chat_go();

    $(window).resize(chat_go);


    var chat_go2 = function() {
        if ($(window).width() > 576) {
            $('.chat-container-header--option-delete--delete').attr('data-toggle','modal').attr('data-target','#popup-del-msg');

        }
    };
    chat_go2();

    $('#datepicker-id-when .gogocar-calendar-days').removeClass('picked-day-gogocar');

    $('#datepicker-id-trip').on('click','.gogocar-calendar-days',function () {
        $(this).addClass('picked-day-gogocar').siblings().removeClass('picked-day-gogocar');
        $('#datepicker-id-when .gogocar-calendar-days').removeClass('picked-day-gogocar');
    });



    $('#datepicker-id-when').on('click','.gogocar-calendar-days',function () {

        $(this).addClass('picked-day-gogocar').siblings().removeClass('picked-day-gogocar');
        $('#datepicker-id-trip .gogocar-calendar-days').siblings().removeClass('picked-day-gogocar');

    });

    $('.wtda-arrow--next').on('click',clickNext);

    function clickNext(){
        $('.gogocar-calendar-next').trigger('click');
        $('#datepicker-id-trip .gogocar-calendar-days').removeClass('picked-day-gogocar');
        $('#datepicker-id-when .gogocar-calendar-days').removeClass('picked-day-gogocar');
    };

    $('.wtda-arrow--prev').on('click',clickPrev);

    function clickPrev(){
        $('.gogocar-calendar-prev').trigger('click');
        $('#datepicker-id-trip .gogocar-calendar-days').removeClass('picked-day-gogocar');
        $('#datepicker-id-when .gogocar-calendar-days').removeClass('picked-day-gogocar');

    };






    $('.gogocar-select-country,.gogocar-select-country-reg').click(function () {
        $(this).toggleClass('active');
        $('.gogocar-select-country__list,.gogocar-select-country__list-reg').slideToggle(150);
    });
    $('.gogocar-select-country__item').click(function () {
        var get_code = $(this).attr('data-mask-phone');
        var get_flag = $(this).children('.gogocar-select-country__item--flag').attr('style');
        var get_name = $(this).children().next().text();
        var get_place = $(this).attr('data-placeholder');

        $('.gogocar-select-country--flag').attr('style',get_flag);
        $('.gogocar-select-country--name').text(get_name);
        $(this).parents('.gogocar-select-country').next('.mask-phone-choise').mask(get_code);
        $(this).parents('.gogocar-select-country-reg').next().children('.mask-phone-choise').mask(get_code);
        $(this).parents('.gogocar-select-country-reg').next().children('.mask-phone-choise').attr('placeholder', get_place);

    });

    var wrap_filter = function() {
        if ($(window).width() < 576) {
            $('.all-trip--filter--wrap, .all-trip--popup--wrap').wrapAll('<div class="all-trip-filter-popup--wrap"></div>');
            $('.all-trip--filter--button').click(function () {
                $('.all-trip-filter-popup--wrap').toggleClass('filter-fixed');
            });
        }
    };
    wrap_filter();

    // var items = $(".gogocar-trip-pagination--item");
    // var numItems = items.length;
    // var perPage = 10;

    // items.slice(perPage).hide();

    // $('.gogocar-panination').pagination({
    //     items: numItems,
    //     itemsOnPage: perPage,
    //     ellipsePageSet: false,
    //     displayedPages: 4,
    //     edges: 2,
    //     prevText: false,
    //     nextText: false,
    //     onPageClick: function (pageNumber) {
    //         var showFrom = perPage * (pageNumber - 1);
    //         var showTo = showFrom + perPage;
    //         items.hide().slice(showFrom, showTo).show();
    //         $('.catalog-pag-show-items').text(showFrom);
    //     }

    // });

    var chat_msg_show = function() {
        if ($(window).width() < 991) {
            $('.chat-content-user-show-msg--add').addClass('chat-content-user-show-msg')
        }
    };
    chat_msg_show();

    $('.chat-content-show--992,.chat-content-user-show-msg').click(function (e) {
        e.stopImmediatePropagation();
        e.preventDefault();
        $('.chat-container-992').toggleClass('active');
        if($('.chat-container-992').hasClass('active')){
            $('.header-panel--fixed').css('bottom','-65px');
        } else if(!$('.chat-container-992').hasClass('active')) {
            $('.header-panel--fixed').css('bottom','0');
        }
        $('body').css('overflow','hidden');
    });
    $('.chat-gogocar-back--992').click(function () {
        $('.chat-container-992').removeClass('active');
        $('.header-panel--fixed').css('bottom','0');
    });

    $('.blog-comment-item-depth--count').click(function () {
        $(this).toggleClass('active');
        $(this).next().slideToggle(200);
    });

    $('.car-select-car--list .choise-car-tab').click(function (e) {
        e.stopImmediatePropagation();
        e.preventDefault();
        var get_tab = $(this).attr('data-car-choise');
        $('#template').val(get_tab);
        $(this).addClass('active').siblings().removeClass('active');
        $('.car-place--content .'+ get_tab).addClass('active').siblings().removeClass('active');
    });

});

function copyReferal() {
    var copyText = document.getElementById("copy-rf-input");

    copyText.select();
    copyText.setSelectionRange(0, 99999);
    document.execCommand("copy");

}