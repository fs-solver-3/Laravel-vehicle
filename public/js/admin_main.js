
$(document).ready(function () {
    // =============== Смена языка в админ панели ===============//
    $('.header-right-choise--lang').click(function () {
        $('.choise-lang--list').slideToggle(150);
    });
    $('.choise-lang--item').click(function () {
        var get_lang = $(this).children('.choise-lang--item__img').attr('style');
        var get_text = $(this).children('.choise-lang--item__text').text();
        $('.choise-lang__img').attr('style', get_lang);
        $('.header-right-choise--lang').attr('data-lang', get_text);
        $('.choise-lang--list').slideUp(150);
    });
    // ***********************************************************//

    // ================= Sidebar Меню ================= //
    $(function () {
        $('.nav-sidebar-menu--list li ul').hide();
        $('.nav-sidebar-menu--list li.active ul').show();

        $('.nav-sidebar-menu--item--wrap').on('click', function () {
            $(this).parent().toggleClass('active').siblings().removeClass('active');
            $(this).next().slideToggle(200);
        });

        $('.nav-sidebar-menu--item--depth2--wrap').on('click', function () {
            $(this).parent().toggleClass('active').siblings().removeClass('active');
            $(this).next().slideToggle(200);
        });

        $('.nav-sidebar-menu--item').click('next', function () {
            $(this).prevAll().children('.nav-sidebar-menu--list--depth2').slideUp(200);

        });

        $('.nav-sidebar-menu--item').click('prev', function () {
            $(this).nextAll().children('.nav-sidebar-menu--list--depth2').slideUp(200);
        });

        $('.nav-sidebar-menu--item--depth2').click('next', function () {
            $(this).prevAll().children('.nav-sidebar-menu--list--depth3').slideUp(200);

        });

        $('.nav-sidebar-menu--item--depth2').click('prev', function () {
            $(this).nextAll().children('.nav-sidebar-menu--list--depth3').slideUp(200);
        });

    });
    // ************************************************ //

    // ================== Открыть - Закрыть фильтр =================== //
    $('.filter-show-and-hide').click(function () {
        $('.filter-bottom-side').slideToggle(200);
        $(this).toggleClass('filter-active');
    });
    // *************************************************************** //
    // ================== Открыть - Закрыть фильтр =================== //
    $('.filter-show-and-hide').click(function () {
        $('.filter-balance-bottom').slideToggle(200);
    });
    // *************************************************************** //
    // ================= Choise Select Users ======================//
    $('.section-select--input__show').on('click', function () {
        $(this).children('.section-select--popup__list').slideToggle(200);
        $(this).children('.section-select--popup__icon').toggleClass('active');
    });
    $('.section-select--popup__item,.section-select--popup__item2').click(function () {
        var get_user = $(this).text();
        var get_data = $(this).data('type');
        //$('.section-select--input__show span').text(get_user);
        $(this).parents('.section-select--input__show').children('span').data('type', get_data);
        // $('#listing_type').val(get_data);
        $(this).parents('.section-select--input__show').children('#listing_type').val(get_data);
        $(this).parents('.section-select--input__show').children('span').text(get_user);
    });
    $('.language-select').click(function () {
        var get_user = $(this).text();
        var data = $(this).data('type');
        //$('.section-select--input__show span').text(get_user);
        $(this).parents('.section-select--input__show').children('span').text(get_user);
        $(this).parents('.section-select--input__show').children('input').val(data);
    });
    // *************************************************************** //
    // ================= Choise Select Users ======================//
    // function addItem() {
    //     var get_user = $(this).text();
    //     $('.section-bg-text--content').remove();
    //     $(this).parent().prevAll('.section-yellow-bg--wrap').append('<div class="section-yellow-bg--content"><span>'+ get_user +'</span><div class="section-yellow-bg--content__icon"><svg class="icon icon-close "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#close"></use></svg></div></div>');
        
    //     $('#cargotypes').val($('#cargotypes').val() + ' ' + get_user).trigger('change');
    //     $(this).off('click');
    // }
    var selected_item = true;
    function addItem() {
        var get_user = $(this).text();
        $('.section-yellow-bg--wrap .section-yellow-bg--content span').each(function(){
            let selected_text = $(this).html();
            if(selected_text == get_user){
                selected_item = false;
            }
        })
        if(selected_item){
            $('.section-bg-text--content').remove();
            $(this).parent().prevAll('.section-yellow-bg--wrap').append('<div class="section-yellow-bg--content"><span>' + get_user + '</span><div class="section-yellow-bg--content__icon"><svg class="icon icon-close "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#close"></use></svg></div></div>');

            $('#lisence_categories').val($('#lisence_categories').val() + ' ' + get_user);
            $('#cargotypes').val($('#cargotypes').val() + ' ' + get_user).trigger('change');
            $(this).off('click');
        }
        selected_item = true;
    }
    $('.section-select--popup__item').on('click', addItem);


    function removeItem(e) {
        e.stopPropagation();
        var get_text = $(this).parents('.section-yellow-bg--wrap').nextAll().children('.section-select--popup__item');
        var get_click_text = $(this).prev().text();
        for (let item of get_text) {
            if ($(item).text() === get_click_text) {
                $(item).on('click', addItem);
            }
        }
        var text = $('#cargotypes').val();console.log(text);
        if(text != undefined){
            text = text.replace(get_click_text,'');
            $('#cargotypes').val(text).trigger('change');
        }
        $(this).parent().remove();


    }
    $('.section-yellow-bg--wrap').on('click', '.section-yellow-bg--content__icon', removeItem);

    // $(document).on('click', '.section-yellow-bg--content__icon', function (e) {
    //     e.stopImmediatePropagation();
    //     e.preventDefault();
    //     e.stopPropagation();
    //     $('.section-select--popup__list').slideToggle(0);
    //     console.log('clicked');
    //     // var get_text = $(this).parents('.section-yellow-bg--wrap').nextAll().children('.section-select--popup__item');
    //     // var get_click_text = $(this).prev().text();
    //     // for (let item of get_text) {
    //     //     if ($(item).text() === get_click_text) {
    //     //         $(item).on('click', addItem);
    //     //     }
    //     // }
    //     // var text = $('#cargotypes').val();
    //     // if (text != undefined) {
    //     //     text = text.replace(get_click_text, '');
    //     //     $('#cargotypes').val(text).trigger('change');
    //     // }
    //     // $(this).parent().remove();
    //     // e.stopPropagation();
    //     // e.preventDefault();
    //     // do something
    // });

    $(document).click(function (e) {
        if (!$(e.target).closest(".section-select--popup__list,.section-select--popup__icon,.section-select--input__show,.section-yellow-bg--content__icon").length) {
            $('.section-select--popup__list').slideUp(150);
            $('.section-select--popup__icon').removeClass('active');
        }
        e.stopPropagation();
    });

    // *************************************************************** //
    // ================= Checked Inputs ====================//

    // $('.section-body-checkbox__input').on('click', function () {
    //     console.log('checked');
    //     $(this).toggleClass('checked');
    //     var $checked = $(this);
    //     if ($checked.children('.section-body-checkbox').attr('checked')) {
    //         $checked.children('.section-body-checkbox').removeAttr('checked', false);
    //     } else {
    //         $checked.children('.section-body-checkbox').attr('checked', true);
    //     }

    // });

    // $('.section-body-checkbox__input').on('click', function () {
    $(document).on('click', '.section-body-checkbox__input', function () {
        $(this).toggleClass('checked');
        var $checked = $(this);
        if ($checked.children('.section-body-checkbox').attr('checked')) {
            $checked.children('.section-body-checkbox').removeAttr('checked', false);
        } else {
            $checked.children('.section-body-checkbox').attr('checked', true);
        }

    });

    $('.section-thead-checkbox__input').on('click', function () {
        // $(this).toggleClass('checked');
        var $checked = $(this);
        if ($checked.children('.section-thead-checkbox').attr('checked')) {
            $checked.children('.section-thead-checkbox').removeAttr('checked', false);
        } else {
            $checked.children('.section-thead-checkbox').attr('checked', true);
        }

    });

    $(function () {
        function checkAll1() {

            var inputs = document.querySelectorAll('.section-body-checkbox');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].checked = true;
            }
            $('.section-body-checkbox__input').addClass('checked');

            this.onclick = uncheckAll1;
        }

        function uncheckAll1() {
            var inputs = document.querySelectorAll('.section-body-checkbox');
            for (var i = 0; i < inputs.length; i++) {
                inputs[i].checked = false;
            }
            $('.section-body-checkbox__input').removeClass('checked');
            this.onclick = checkAll1;
        }

        $(document).on('click', '.section-table #check-all', function () {
            if ($(this).hasClass('checked')){
                $(this).removeClass('checked');
                uncheckAll1();
            }
            else{
                $(this).addClass('checked');
                checkAll1();
            }
        });

        // var el1 = document.getElementById("check-all");
        // el1.onclick = checkAll1;
    });
    // *************************************************************** //
    // ======================== Pagination =======================//

    $(function () {
        var items_wrap = $('.section-content--main');
        for (let item of items_wrap) {
            let items = $(item).find('.section-data-container--item');
            let numItems = items.length;
            let perPage = 10;

            items.slice(perPage).hide();

            if (numItems > perPage) {
                $(item).find('.section-bottom-pagination').pagination({
                    items: numItems,
                    itemsOnPage: perPage,
                    ellipsePageSet: false,
                    displayedPages: 4,
                    edges: 0,
                    prevText: '<div class="section-bottom-paginationprev gogocar-arrow-button-pagination"><svg class="icon icon-arrow-left "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#arrow-left"></use></svg></div>',
                    nextText: '<div class="section-bottom-paginationnext gogocar-arrow-button-pagination"><svg class="icon icon-arrow-left arrow-rotate "><use xlink:href="/static/img/svg/symbol/sprite_admin.svg#arrow-left"></use></svg></div>',
                    onPageClick: function (pageNumber) {
                        let showFrom = perPage * (pageNumber - 1);
                        let showTo = showFrom + perPage;
                        items.hide().slice(showFrom, showTo).show();
                        //$('.catalog-pag-show-items').text(showFrom);
                    }

                });
            } else if (numItems <= perPage) {
                // $(item).find('.section-bottom-pagination--wrap').css('display', 'none');
            }
        }

    });


    // $(function () {
    //     if($('.section-table tr th').length <= 4){
    //         $('.section-table').css('width','100%')
    //     }
    // });
    // ********************************************************** //
    // ======================= User tabs list ==================//
    $('.section-users--tab').click(function () {
        var tabs = $(this).attr('data-tab-users');
        $(this).addClass('active').siblings().removeClass('active');
        $('.section-user--dropdown__wrap.' + tabs).addClass('active').siblings().removeClass('active');
        if ($('.section-user--dropdown__wrap.users-balance').hasClass('active')) {
            $('.section-balance--filter,.section-operation ').css('display', 'block');
        } else {
            $('.section-balance--filter,.section-operation ').css('display', 'none');
        }
        if ($('.section-user--dropdown__wrap.users-chat').hasClass('active')) {
            $('.section-chat').css('display', 'block');
        } else {
            $('.section-chat').css('display', 'none');
        }
    });
    // *********************************************************//
    // ======================= Add Photo User ================== //
    $('html').on({
        dragleave: function () {
            $('.section-user--dropdown__img--wrap').css('background-color', 'transparent');
        },
        dragover: function () {
            $('.section-user--dropdown__img--wrap').css('background-color', '#fdab3e7a');
        },
        drop: function () {
            $('.section-user--dropdown__img--wrap').css('background-color', 'transparent');

        }
    });

    $("#user-photo").change(function () {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.section-user--dropdown__img--zone').attr('style', 'background-image:url("' + e.target.result + '");background-color:#303743;');

            };
            reader.readAsDataURL(this.files[0]);
        }


    });

    // $('.section-delete__img').click(function () {
    //     console.log('delete');
    //     // $('#user-photo').val('');
    //     // $('#edit_users_form')[0].reset();
    //     let myForm = document.getElementById('edit_users_form');
    //     let formData = new FormData(myForm);
    //     formData.delete('upload_image');
    //     $('.section-user--dropdown__img--zone').removeAttr('style');
    // });
    $('.section-user--more').click(function () {
        $('.section-user--more--popup').fadeToggle(200);
    })
    $(document).click(function (e) {
        if (!$(e.target).closest(".section-user--more,.section-user--more--popup").length) {
            $('.section-user--more--popup').fadeOut(200);
        }
        e.stopPropagation();
    });
    // ********************************************************** //
    // ======================= Checkbox-tabs active  ================== //
    $('.checkbox-input').on('click', function () {
        $(this).toggleClass('checked');
        var $checked = $(this);
        if ($checked.next('.checkbox-input--tab').attr('checked')) {
            $checked.next('.checkbox-input--tab').removeAttr('checked', false);
        } else {
            $checked.next('.checkbox-input--tab').attr('checked', true);
        }
    });
    // ********************************************************** //
    // ======================= Calendar Yandex Google =====================//
    $('.srrc-date-1,.srrc-date-2').each(function () {
        $(this).datepicker({
            autoShow: false,
            autoPick: true,
            language: 'ru-RU',
            autoHide: true,
            //inline: true,
            offset: 20,
            container: '.popup-calendar',
            pickedClass: 'picked-day-gogocar',
            highlightedClass: 'today-day-gogocar',
            zIndex: 1050,
        });
    });
    // ********************************************************** //
    // ======================= Calendar filter ===================//
    $('.calendar-filter').each(function () {
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

    $('.calendar-filter-today').each(function () {
        $(this).datepicker({
            //autoShow: true,
            autoPick: true,
            language: 'ru-RU',
            autoHide: true,
            //trigger: '.data-exam-popup',
            inline: true,
            //container: '.trip-show-calendar',
            pickedClass: 'picked-day-gogocar',
            highlightedClass: 'today-day-gogocar',
            format: 'dd.mm.yyyy',
            zIndex: 1050,
            startDate: function (date) {
                date.valueOf() < now ? true : false;
            },
            template: '<div class="datepicker-container" id="datepicker-id-trip">' + '<div class="datepicker-panel" data-view="years picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="years prev">&lsaquo;</li>' + '<li data-view="years current"></li>' + '<li data-view="years next">&rsaquo;</li>' + '</ul>' + '<ul data-view="years"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="months picker">' + '<ul>' + '<li data-view="year prev">&lsaquo;</li>' + '<li data-view="year current"></li>' + '<li data-view="year next">&rsaquo;</li>' + '</ul>' + '<ul data-view="months"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="days picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="month prev" class="gogocar-calendar-prev"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M9,17,1,9,9,1" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '<li data-view="month current" class="gogocar-calendar-current"></li>' + '<li data-view="month next" class="gogocar-calendar-next"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M1,1,9,9,1,17" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '</ul>' + '<ul data-view="week"></ul>' + '<ul data-view="days"></ul>' + '</div>' + '</div>',
        });

    });
    $('.calendar-filter-transaction').each(function () {
        $(this).datepicker({
            //autoShow: true,
            autoPick: true,
            language: 'ru-RU',
            autoHide: true,
            //trigger: '.data-exam-popup',
            inline: true,
            //container: '.trip-show-calendar',
            pickedClass: 'picked-day-gogocar',
            highlightedClass: 'today-day-gogocar',
            format: 'dd.mm.yyyy',
            zIndex: 1050,
            endDate: function (date) {
                date.valueOf() < now ? true : false;
            },
            template: '<div class="datepicker-container" id="datepicker-id-trip">' + '<div class="datepicker-panel" data-view="years picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="years prev">&lsaquo;</li>' + '<li data-view="years current"></li>' + '<li data-view="years next">&rsaquo;</li>' + '</ul>' + '<ul data-view="years"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="months picker">' + '<ul>' + '<li data-view="year prev">&lsaquo;</li>' + '<li data-view="year current"></li>' + '<li data-view="year next">&rsaquo;</li>' + '</ul>' + '<ul data-view="months"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="days picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="month prev" class="gogocar-calendar-prev"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M9,17,1,9,9,1" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '<li data-view="month current" class="gogocar-calendar-current"></li>' + '<li data-view="month next" class="gogocar-calendar-next"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M1,1,9,9,1,17" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '</ul>' + '<ul data-view="week"></ul>' + '<ul data-view="days"></ul>' + '</div>' + '</div>',
        });

    });
    $('.calendar-passport').each(function () {
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
            format: 'dd.mm.yyyy',
            template: '<div class="datepicker-container" id="datepicker-id-trip">' + '<div class="datepicker-panel" data-view="years picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="years prev">&lsaquo;</li>' + '<li data-view="years current"></li>' + '<li data-view="years next">&rsaquo;</li>' + '</ul>' + '<ul data-view="years"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="months picker">' + '<ul>' + '<li data-view="year prev">&lsaquo;</li>' + '<li data-view="year current"></li>' + '<li data-view="year next">&rsaquo;</li>' + '</ul>' + '<ul data-view="months"></ul>' + '</div>' + '<div class="datepicker-panel" data-view="days picker">' + '<ul class="gogocar-ul-navbar">' + '<li data-view="month prev" class="gogocar-calendar-prev"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M9,17,1,9,9,1" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '<li data-view="month current" class="gogocar-calendar-current"></li>' + '<li data-view="month next" class="gogocar-calendar-next"><svg xmlns="http://www.w3.org/2000/svg" class="icon" id="Слой_1" data-name="Слой 1" viewBox="0 0 10 18">\n' +
                '  <path d="M1,1,9,9,1,17" style="fill: none;stroke: #fff;stroke-linecap: round;stroke-linejoin: round;stroke-width: 2px"/>\n' +
                '</svg></li>' + '</ul>' + '<ul data-view="week"></ul>' + '<ul data-view="days"></ul>' + '</div>' + '</div>',
        });

    });
    // ***********************************************************//
    // ======================== Off balance operation checkbox =======================//
    // $('.section-body-checkbox__input__off').on('click', function () {
    //     $(this).toggleClass('checked');

    //     var $checked = $(this);
    //     if ($checked.children('.section-body-checkbox__off').attr('checked')) {
    //         $checked.children('.section-body-checkbox__off').removeAttr('checked', false);
    //         $checked.parents('.section-data-container--item').children('td').removeAttr('style');
    //         $checked.parents('.section-data-container--item').children().children('.color-yellow').removeAttr('style');
    //         $checked.parents('.section-bottom-side--mobile__item--wrap').find('.section-bottom-side--mobile__item--name,.section-mobile-table--item__left,.section-mobile-table--item__right,.section-mobile-table--item__left span,.section-mobile-table--item__right .color-yellow').removeAttr('style');
    //     } else {
    //         $checked.children('.section-body-checkbox__off').attr('checked', true);
    //         $checked.parents('.section-data-container--item').children('td').attr('style', 'color:#7B818C');
    //         $checked.parents('.section-data-container--item').children('td').attr('style', 'color:#7B818C');
    //         $checked.parents('.section-data-container--item').children().children('.color-yellow').attr('style', 'color:#7B818C');
    //         $checked.parents('.section-bottom-side--mobile__item--wrap').find('.section-bottom-side--mobile__item--name,.section-mobile-table--item__left,.section-mobile-table--item__right,.section-mobile-table--item__left span,.section-mobile-table--item__right .color-yellow').attr('style', 'color:#7B818C');
    //         // $checked.parents('.section-bottom-side--mobile__item--wrap').find('.section-mobile-table--item__left').attr('style','color:#7B818C');
    //     }

    // });
    // *******************************************************************************//
    // ====================== Popup burger-attr ========================= //
    // $('.section-tbody--show__popup').on('click', function () {
    //     console.log('main.js');
    //     $(this).children('.section-tbody--modal--table,.section-tbody--modal--table__mobile').fadeToggle();
    // });

    // $('.section-tbody--show__popup').click(function () {
    //     console.log('main.js');
    //     $(this).children('.section-tbody--modal--table,.section-tbody--modal--table__mobile').fadeToggle(200);
    // });

    // $('document').on('click', '.section-tbody--show__popup', function () {
    //     // do something
    //     console.log('main.js');
    //     $(this).children('.section-tbody--modal--table,.section-tbody--modal--table__mobile').fadeToggle(200);
    // });


    var ss2 = function () {
        if ($(window).width() > 768) {
            $(document).on('click', '.section-tbody--show__popup', function () {
                $(this).children('.section-tbody--modal--table,.section-tbody--modal--table__mobile').fadeToggle(200);
                $(this).parent().prevAll().children().children('.section-tbody--modal--table,.section-tbody--modal--table__mobile').fadeOut(200);
                $(this).parent().nextAll().children().children('.section-tbody--modal--table,.section-tbody--modal--table__mobile').fadeOut(200);
            });
        }
    };

    ss2();

    // $(window).resize(ss2);
    var ss = function () {
        if ($(window).width() < 768) {
            $('.section-tbody--show__popup').on('click', function () {
                $(this).parent().addClass('active').siblings().removeClass('active');
            });
        }
    };
    ss();

    // $(window).resize(ss);


    var ss3 = function () {
        if ($(window).width() > 768) {
            $('.section-tbody--show__popup').click('next', function () {
                $(this).parent().prevAll().children().children('.section-tbody--modal--table,.section-tbody--modal--table__mobile').fadeOut(200);
            });
            $('.section-tbody--show__popup').click('prev', function () {
                $(this).parent().nextAll().children().children('.section-tbody--modal--table,.section-tbody--modal--table__mobile').fadeOut(200);
            });

            $(document).click(function (e) {
                if (!$(e.target).closest(".section-tbody--show__popup,.section-tbody--modal--table,.section-tbody--modal--table__mobile").length) {
                    $('.section-tbody--modal--table,.section-tbody--modal--table__mobile').fadeOut(200);
                }
                e.stopPropagation();
            });
        }
    };
    ss3();
    
    // ******************************************************************//
    // ====================== Popup-Modal buttons price ========================= //
    $('.popup-balance--button').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        var get_price = $(this).text();
        $(this).parent().prev().children().val(get_price);
    });
    // ******************************************************************//
    // ====================== Popup-Modal checkboxes ========================= //
    $('.popup-balance-checkbox').on('click', function () {
        $(this).toggleClass('checked');
        var $checked = $(this);
        if ($checked.next('.popup-balance-checkbox__input').attr('checked')) {
            $checked.next('.popup-balance-checkbox__input').removeAttr('checked', false);
        } else {
            $checked.next('.popup-balance-checkbox__input').attr('checked', true);
        }

    });
    // ******************************************************************//
    // ========================== Chat ======================================//

    // var x = document.getElementsByClassName("chat-container-message--name--button")
    // if (x.length > 0)
    //     for (let item of x)
    //         item.addEventListener("click", showChangeMsg);
    // function showChangeMsg() { // Изменить или удалить сообщение
    //     $('.chat-container-option--message').fadeOut(200);
    //     $('.chat-container-message--name--button').removeClass('active');
    //     $(this).toggleClass('active');
    //     $(this).next().fadeToggle(200).toggleClass('active');
    //     // if($(this).hasClass('active') && $(window).width() < 576){
    //     //     $('body').css('overflow','hidden');
    //     // } else {
    //     //     $('body').css('overflow-y','scroll');
    //     // }
    //     if ($(this).hasClass('active')) {
    //         $('.header-panel--fixed').addClass('anim-bottom');
    //     }
    // }
    $(document).click(function (e) {
        if (!$(e.target).closest(".chat-container-option--message,.chat-container-message--name--button").length) {
            $('.chat-container-option--message').fadeOut(200);
            $('.chat-container-message--name--button').removeClass('active');
            //$('body').css('overflow-y','scroll');
        }
        e.stopPropagation();
    });
    $('.chat-container-option--message--item--cancel,.chat-change-message,.chat-answer-message').click(function () {
        $('.chat-container-option--message,.chat-delete-out-msg').fadeOut(200);
        $('.chat-container-message--name--button').removeClass('active');
        //$('body').css('overflow-y','scroll');
        $('.header-panel--fixed').removeClass('anim-bottom');

    });
    var x = document.getElementsByClassName("chat-change-message")
    if (x.length > 0)
        for (let item of x)
            item.addEventListener("click", changeMsg);
    function changeMsg() { // Удаление сообщений отправителя
        $('#chat-edit-msg').fadeIn(150).css('display', 'flex');
        var get_text_edit = $(this).parents('.chat-container-message--date__name').next().text();
        $('#chat-edit-text').text(get_text_edit);
        $('.chat-show-message-out--mobile').fadeOut(150);
        $('.header-panel--fixed').removeClass('anim-bottom');
    }
    var x = document.getElementsByClassName("chat-delete-message")
    if (x.length > 0)
        for (let item of x)
            item.addEventListener("click", deleteMsg);
    function deleteMsg() { // Удаление сообщений отправителя
        $(this).parents('.chat-container-message-out').remove();
        $('.header-panel--fixed').removeClass('anim-bottom');
    }
    var x = document.getElementsByClassName("chat-answer-message")
    if (x.length > 0)
        for (let item of x)
            item.addEventListener("click", shareMsg);
    function shareMsg() { // Удаление сообщений отправителя
        $('#chat-edit-msg').fadeIn(150).css('display', 'flex').addClass('chat-edit-now');

        var get_text_share = $(this).parents('.chat-container-message--date__name').next().text();
        var get_name_share = $(this).parents('.chat-container-option--message').next().text();
        $('#chat-edit-text').text(get_text_share);
        $('.chat-container--edit--title').text(get_name_share);

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
    $('.chat-container-footer--input__text').click(function () {
        $('.chat-container-footer--placeholder').fadeOut(150);
    });
    if (!$('.chat-container-footer--input__text').is(':empty')) {
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
    // создём массив ВНЕ функции, чтобы он каждый раз не затирался
    var array_files = [];


    // $(function () {


    //     $('.personal-upload-files--input,.chat-container-footer--input__file').on('change', function (e) {
    //         $('.chat-container--edit--message--file--add').addClass('active');

    //         // пушим файлы в массив
    //         for (var i = 0; i < e.target.files.length; i++) {
    //             array_files.push(e.target.files[i]);
    //         }

    //         var data = new FormData(); var count = 0;
    //         $.each(array_files, function (i, file) {
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
    //             var substr = file_name.split('.').shift().substring(0, 15);

    //             // теперь расширение файла получается здесь
    //             // поэтому иконки файлов правильные
    //             var ext = file_name.split('.').pop();
    //             var file_format = ext;


    //             if (file_format == 'pdf') {
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-pdf"><use xlink:href="/static/img/svg/symbol/sprite.svg#pdf"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             } else if (file_format == 'png') {
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-png"><use xlink:href="/static/img/svg/symbol/sprite.svg#png"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             } else if (file_format == 'jpg' || 'jpeg') {
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-jpg"><use xlink:href="/static/img/svg/symbol/sprite.svg#jpg"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             } else if (file_format == 'docx') {
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-doc"><use xlink:href="/static/img/svg/symbol/sprite.svg#doc"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             } else if (file_format == 'zip') {
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-zip"><use xlink:href="/static/img/svg/symbol/sprite.svg#zip"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             } else if (file_format == 'txt') {
    //                 $('.personal-appear--file--wrap').append('<div class="personal-loaded--file"><div class="gogocar-gray-icons personal-icon-loaded--appeal"><svg class="icon icon-txt"><use xlink:href="/static/img/svg/symbol/sprite.svg#txt"></use></svg></div><span class="personal-loaded--file__name">' + substr + '</span></div>')
    //             }
    //         });

    //     });

    // });

    $('.personal-loaded--file__icon').click(function () {
        $('.personal-loaded--file').remove();
        array_files = [];
        // $(".chat-container-footer")[0].reset();
        $('.chat-container--edit--message--file--add').removeClass('active');
    });



    $('.chat-answer-message').on('click', function () {
        $('#chat-edit-msg').fadeIn(150).css('display', 'flex');
    });
    $('#chat-edit-close').click(function () {
        $('#chat-edit-msg').fadeOut(150).removeClass('chat-edit-now');

    });
    $('.chat-container-footer--smiles').on('click', function () {
        $('.chat-container-footer--emoji--list').fadeToggle(200).css('display', 'flex');
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
    $(function () {


        $('.chat-answer-message').on('click', function () {
            $('#chat-edit-msg').fadeIn(150).css('display', 'flex');
        });
        $('#chat-edit-close').click(function () {
            $('#chat-edit-msg').fadeOut(150).removeClass('chat-edit-now');

        });



        var x = document.getElementsByClassName("chat-change-message")
        if (x.length > 0)
            for (let item of x)
                item.addEventListener("click", changeMsg);
        function changeMsg() { // Удаление сообщений отправителя
            $('#chat-edit-msg').fadeIn(150).css('display', 'flex');
            var get_text_edit = $(this).parents('.chat-container-message--date__name').next().text();
            $('#chat-edit-text').text(get_text_edit);
            $('.chat-show-message-out--mobile').fadeOut(150);
            $('.header-panel--fixed').removeClass('anim-bottom');
        }

        var x = document.getElementsByClassName("chat-answer-message")
        if (x.length > 0)
            for (let item of x)
                item.addEventListener("click", shareMsg);
        function shareMsg() { // Удаление сообщений отправителя
            $('#chat-edit-msg').fadeIn(150).css('display', 'flex').addClass('chat-edit-now');

            var get_text_share = $(this).parents('.chat-container-message--date__name').next().text();
            var get_name_share = $(this).parents('.chat-container-option--message').next().text();
            $('#chat-edit-text').text(get_text_share);
            $('.chat-container--edit--title').text(get_name_share);

        }



        var x = document.getElementsByClassName("chat-delete-message")
        if (x.length > 0)
            for (let item of x)
                item.addEventListener("click", deleteMsg);
        function deleteMsg() { // Удаление сообщений отправителя
            $(this).parents('.chat-container-message-out').remove();
            $('.header-panel--fixed').removeClass('anim-bottom');
        }

        $('.chat-container-option-dot').click(function () {
            $('.chat-container-header--delete__message').fadeOut(200);
            $(this).next('.chat-container-header--delete__message').fadeIn(200).css('display', 'flex');
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


        $('.chat-container-header--option-delete--back').click(cdmb);
        function cdmb() {
            $('.chat-container-header--option-delete__panel').css('display', 'none');
            $('.chat-container-option-dot').css('display', 'flex');
            $('.chat-container-message--wrap--delete__check--wrap').css('display', 'none');
            $('.gogocar-go-back-chat--mobile').removeClass('active');
            $('.chat-delete-out-msg').removeClass('active');
            $('.header-panel--fixed').removeClass('anim-bottom');
        }

        $('.chat-container-header--option-delete--delete').click(showDelMsg);
        function showDelMsg() { // Изменить или удалить сообщение
            $('.chat-delete-out-msg').addClass('active');

            if ($(window).width() < 576) {
                $('body').css('overflow', 'hidden');
                $('.chat-delete-out-msg').fadeIn(200);
            }
            // else {
            //     $('body').css('overflow-y','scroll');
            // }
            if ($('.chat-delete-out-msg').hasClass('active')) {
                $('.header-panel--fixed').addClass('anim-bottom');
            }
        }

        var x = document.getElementsByClassName("chat-container-message--wrap--delete__check")
        if (x.length > 0)
            for (let item of x)
                item.addEventListener("click", deleteAllMsg);
        function deleteAllMsg() { // Удаление сообщений отправителя
            $(this).toggleClass('checked');
            if ($(this).hasClass('checked')) {
                $(this).html('<svg class="icon icon-ok-del "><use xlink:href="static/img/svg/symbol/sprite.svg#ok-del"></use></svg>')
                $(this).parents('.chat-container-message-out').addClass('checked-delete-msg');
            } else {
                $(this).html('');
                $(this).parents('.chat-container-message-out').removeClass('checked-delete-msg');
            }

        }

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
            var content_share = '<div class="chat-message--share--info"><div class="chat-message--share--info__name">' + c_name + '</div><div class="chat-message--share--info__text">' + c_text + '</div></div>'

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
                '                              <div class="chat-container-message--date__name"><span>' + time + '</span>\n' +
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
                '                                          <svg class="icon icon-delete-red ">\n' +
                '                                            <use xlink:href="static/img/svg/symbol/sprite.svg#delete-red"></use>\n' +
                '                                          </svg><span>Удалить</span>\n' +
                '                                        </div>\n' +
                '                                      </div>\n' +
                '                                      <div class="chat-container-option--message--item--cancel">Отмена</div>\n' +
                '                                    </div>\n' +
                '                                  </div>\n' +
                '                                  <div class="chat-container-message--name">Татьяна Гусева</div>\n' +
                '                                </div>\n' +
                '                              </div>\n' +
                '                              <p class="chat-container--message">' + contents + '</p>\n' +
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
    // **********************************************************************//
    // =========================== Edit Text =============================//
    var fontSize = 3;
    //editor
    var x = document.getElementsByClassName("section-text-option__item");

    if (x.length > 0) {
        for (let item of x)
            item.addEventListener("click", clickFormatButton);
    }
    if (x.length > 0) {
        for (let item of x)
            item.addEventListener("mousedown", function (e) {
                e.preventDefault();
            });
    }
    function format(command, value) {
        document.execCommand(command, false, value);
    }

    function clickFormatButton(e) {
        e.preventDefault();
        let command = this.getAttribute("data-edit-type");
        let value = this.getAttribute("data-edit-value");
        if (command == "fontsize-bigger") {
            if (fontSize < 7) fontSize++;
            format("fontsize", fontSize);
        } else if (command == "fontsize-smaller") {
            if (fontSize > 2) fontSize--;
            format("fontsize", fontSize);
        } else {
            if (value == null) {
                format(command);
            } else {
                format(command, value);
            }
        }
    }
    // ******************************************************************//

    // =========================== Support Toggle .section-select--input__time =============================//
    $('.section-select--input__time').click(function () {
        $(this).children('.section-select--input__time__list').slideToggle(200);
    });
    $('.section-select--input__time__item').click(function () {
        var get_user = $(this).text();
        //$('.section-select--input__show span').text(get_user);
        $(this).parents('.section-select--input__time').children('.section-select--input__time--text').text(get_user);
    });
    // *************************** RateYo Rating ***************************//
    $(function () {
        if($("#rateYo").length > 0){
            $("#rateYo").rateYo({
                "ratedFill": "#FDAB3E",
                "starWidth": "26px",
                "spacing": "8px",
                "starSvg": '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">\n' +
                    '<path d="M19.9713 7.70552C19.9024 7.49337 19.7191 7.33876 19.4984 7.30673L13.2983 6.40576L10.5254 0.787538C10.4268 0.587539 10.223 0.460938 10 0.460938C9.77699 0.460938 9.57332 0.587539 9.47461 0.787538L6.70165 6.40576L0.501673 7.30673C0.281009 7.33876 0.0976117 7.49337 0.0287057 7.70548C-0.0402394 7.91763 0.0172604 8.15048 0.176986 8.30614L4.66322 12.6793L3.60432 18.8544C3.56658 19.0743 3.65697 19.2964 3.8374 19.4275C3.93947 19.5016 4.06037 19.5394 4.18185 19.5394C4.27513 19.5394 4.36873 19.5172 4.45443 19.4721L10 16.5565L15.5453 19.472C15.7428 19.5758 15.982 19.5586 16.1624 19.4275C16.3428 19.2964 16.4333 19.0742 16.3956 18.8543L15.3363 12.6793L19.823 8.3061C19.9827 8.15048 20.0403 7.91763 19.9713 7.70552Z"/>\n' +
                    '</svg>',
            }).on("rateyo.change", function (e, data) {
                var rating = data.rating;
                $(this).parent().find('.rateyo-hidden').val(rating);
    
            });
        }
    });

    // $(".reviews-slider-comment-rating").each( function() {
    //     var rating = $(this).attr("data-rating");
    //     $(this).rateYo(
    //         {
    //             rating: 5, //rating
    //             // "ratedFill": "#FF4141",
    //             multiColor: {
    //
    //                 "startColor": "#f35a28", //RED
    //                 "endColor"  : "#FDC630"  //GREEN
    //             },
    //             "starWidth": "26px",
    //             "spacing": "10px",
    //             "starSvg": '<svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">\n' +
    //                 '<path d="M19.9713 7.70552C19.9024 7.49337 19.7191 7.33876 19.4984 7.30673L13.2983 6.40576L10.5254 0.787538C10.4268 0.587539 10.223 0.460938 10 0.460938C9.77699 0.460938 9.57332 0.587539 9.47461 0.787538L6.70165 6.40576L0.501673 7.30673C0.281009 7.33876 0.0976117 7.49337 0.0287057 7.70548C-0.0402394 7.91763 0.0172604 8.15048 0.176986 8.30614L4.66322 12.6793L3.60432 18.8544C3.56658 19.0743 3.65697 19.2964 3.8374 19.4275C3.93947 19.5016 4.06037 19.5394 4.18185 19.5394C4.27513 19.5394 4.36873 19.5172 4.45443 19.4721L10 16.5565L15.5453 19.472C15.7428 19.5758 15.982 19.5586 16.1624 19.4275C16.3428 19.2964 16.4333 19.0742 16.3956 18.8543L15.3363 12.6793L19.823 8.3061C19.9827 8.15048 20.0403 7.91763 19.9713 7.70552Z"/>\n' +
    //                 '</svg>',
    //             readOnly: true
    //         }
    //     );
    // });
    // ==================================================================== //
    // *************************** reports trip ***************************//
    $('.section-reports-date-item').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
    });
    // ==================================================================== //

    // ********************* Mobile Menu ========================//
    $('.header-nav-left-menu').click(function () {
        $('.left-side,.left-and-right-side').toggleClass('active');
    });
    $('.section-dotted-mobile,.section-dotted-mobile2').click(function () {
        $('.section-upper-modal,.left-and-right-side').toggleClass('active');
    });
    $('.section-mobile-calendar__popup').click(function () {
        $('.section-upper-modal__calendar,.left-and-right-side').toggleClass('active');
    });

    $('.section-tbody--show__popup').click(function () {
        $('.section-tbody--modal--table,.left-and-right-side').addClass('active');
        $(this).children('.section-tbody--modal--table__mobile').addClass('active');
    });



    (function ($) {
        $.fn.swipeDetector = function (options) {
            // States: 0 - no swipe, 1 - swipe started, 2 - swipe released
            var swipeState = 0;
            // Coordinates when swipe started
            var startX = 0;
            var startY = 0;
            // Distance of swipe
            var pixelOffsetX = 0;
            var pixelOffsetY = 0;
            // Target element which should detect swipes.
            var swipeTarget = this;
            var defaultSettings = {
                // Amount of pixels, when swipe don't count.
                swipeThreshold: 50,
                // Flag that indicates that plugin should react only on touch events.
                // Not on mouse events too.
                useOnlyTouch: true
            };

            // Initializer
            (function init() {
                options = $.extend(defaultSettings, options);
                // Support touch and mouse as well.
                swipeTarget.on("mousedown touchmove", swipeStart);
                $("html").on("mouseup touchmove", swipeEnd);
                $("html").on("mousemove touchmove", swiping);
            })();

            function swipeStart(event) {
                if (options.useOnlyTouch && !event.originalEvent.touches) return;

                if (event.originalEvent.touches) event = event.originalEvent.touches[0];

                if (swipeState === 0) {
                    swipeState = 1;
                    startX = event.clientX;
                    startY = event.clientY;
                }
            }

            function swipeEnd(event) {
                if (swipeState === 2) {
                    swipeState = 0;

                    if (
                        Math.abs(pixelOffsetX) > Math.abs(pixelOffsetY) &&
                        Math.abs(pixelOffsetX) > options.swipeThreshold
                    ) {
                        // Horizontal Swipe
                        if (pixelOffsetX < 0) {
                            swipeTarget.trigger($.Event("swipeLeft.sd"));
                            //console.log("Left");
                        } else {
                            swipeTarget.trigger($.Event("swipeRight.sd"));
                            //console.log("Right");
                        }
                    } else if (Math.abs(pixelOffsetY) > options.swipeThreshold) {
                        // Vertical swipe
                        if (pixelOffsetY < 0) {
                            swipeTarget.trigger($.Event("swipeUp.sd"));
                            //console.log("Up");
                        } else {
                            swipeTarget.trigger($.Event("swipeDown.sd"));
                            //console.log("Down");
                        }
                    }
                }
            }

            function swiping(event) {
                // If swipe don't occuring, do nothing.
                if (swipeState !== 1) return;

                if (event.originalEvent.touches) {
                    event = event.originalEvent.touches[0];
                }

                var swipeOffsetX = event.clientX - startX;
                var swipeOffsetY = event.clientY - startY;


                if (
                    Math.abs(swipeOffsetX) > options.swipeThreshold ||
                    Math.abs(swipeOffsetY) > options.swipeThreshold
                ) {
                    swipeState = 2;
                    pixelOffsetX = swipeOffsetX;
                    pixelOffsetY = swipeOffsetY;

                }
            }

            return swipeTarget; // Return element available for chaining.
        };
    })(jQuery);


    $(".left-side,.left-and-right-side,.section-upper-modal").swipeDetector().on("swipeLeft.sd", function (event) {
        if (event.type === "swipeLeft") {
            $('.left-side,.left-and-right-side').removeClass('active');
            //$('body').css('overflow-y','scroll');
        } else if (event.type === "swipeRight") {
            message.text("Swipe Right");
        } else if (event.type === "swipeUp") {
            message.text("Swipe Up");
        } else if (event.type === "swipeDown") {
            //$('.section-upper-modal,.left-and-right-side').removeClass('active');
        }
    });
    $(".left-and-right-side,.section-upper-modal,.section-upper-modal__calendar,.section-tbody--modal--table,.section-tbody--modal--table__mobile").swipeDetector().on("swipeDown.sd", function (event) {
        if (event.type === "swipeLeft") {
            // $('.left-side,.left-and-right-side').removeClass('active');
            //$('body').css('overflow-y','scroll');
        } else if (event.type === "swipeRight") {
            message.text("Swipe Right");
        } else if (event.type === "swipeUp") {
            message.text("Swipe Up");
        } else if (event.type === "swipeDown") {
            $('.section-upper-modal,.section-data-container--item,.section-upper-modal__calendar,.left-and-right-side,.section-tbody--modal--table__mobile').removeClass('active');
        }
    });


    // ===========================================================//
    $('.section-users--tab[data-tab-users="users-chat"]').click(function () {
        $('.personal-fixed-chat--container').removeClass('active-hide');
    });
    $('.gogocar-go-back-chat--mobile').click(function () {
        $('.personal-fixed-chat--container').addClass('active-hide');
    });

    $('.section-reports-right--calendar').click(function () {
        $('.section-reports-right--calendar__popup').slideToggle(200).css('display', 'flex');
    });

    $('.section-select-calendar .section-select--popup__item2').click(function () {
        $(this).addClass('active').siblings().removeClass('active');
        if ($('.section-select-calendar span').text() == 'День') {
            var get_attr = $(this).attr('data-calendar-selector', 'calendar-selector-day');
            $('.calendar-selector-data').addClass(get_attr)
        }
        if ($('.section-select-calendar span').text() == 'Месяц') {
            var get_attr = $(this).attr('data-calendar-selector', 'calendar-selector-month');
            $('.calendar-selector-data').addClass(get_attr)
        }
        if ($('.section-select-calendar span').text() == 'Год') {
            var get_attr = $(this).attr('data-calendar-selector', 'calendar-selector-year');
            $('.calendar-selector-data').addClass(get_attr)
        }
    });
    document.execCommand("defaultParagraphSeparator", false, "p");

    $('.accordion').click(function () {
        $(this).next().slideToggle(200);
    });

    if($('.phone-mask').length > 0){
        // $('.phone-mask').mask('9 (000) 000-00-00');
        if($('.phone-mask').val().includes('+7')){
            $('.phone-mask').mask('+7 (000) 000-00-00');
        }
        else if($('.phone-mask').val().includes('+9')){
            $('.phone-mask').mask('(+900 00) 000-00-00');
        }
        else{
            $('.phone-mask').mask('(+900 00) 000-00-00');
        }
    }
    if($('.mask-seria').length > 0){
        $('.mask-seria').mask('AA AA');
    }
    if($('.mask-number').length > 0){
        $('.mask-number').mask('00 00 00 00');
    }
    if($('.mask-code').length > 0){
        $('.mask-code').mask('000-000');
    }

    $('.section-arrow-mobile-table').click(function () {
        $(this).toggleClass('active');
        $(this).parents('.section-bottom-side--mobile__item').next().slideToggle(200).css('display', 'flex');
    });

     $('.header-nav-left--back').click(function () {
        $(this).toggleClass('active');
        $('.left-side').toggleClass('active-desctop');
        $('.right-side').toggleClass('active-desctop');
     });

});