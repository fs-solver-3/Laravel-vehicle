$(document).ready(function() {
    $('#admin-notification').click(function(){
        $('#admin-notification .notification_modal').toggleClass('active');
    })

    $('.pdf-passport-menu').click(function(){
        $(this).parent().siblings().children().find('.pdf-menu-options').removeClass('active');
        $(this).children('.pdf-menu-options').toggleClass('active');
    })
    // $('.nav-sidebar-menu--list li.active ul').show();

    // model fetch
    $('#car_name').on('change', function () {
        var query = $(this).children("option:selected").data('brand-id');
        fetch_models(query);
    });

    function fetch_models(query) {
        $.ajax({
            url: "/fetch_models?query=" + query,
            success: function (data) {
                $('#car_model').html('');
                $('#car_model').html(data);
            }
        })
    }
    // flag.js
    $('.choise-lang--item').click(function (e) {
        // let language = $(this).children('.choise-lang--item__text').html();
        let language = $(this).attr('data-value');
        translate(language);
    })
    function translate(tnum) {
        window.location.href = tnum
    }

    $("#original_table").scroll(function() {
        scrolled = $("#original_table").scrollLeft();
        // console.log(scrolled);
        $("#sticky-header").scrollLeft(scrolled);
    });
    
    var window_width = $(window).width();

    $('.navbar-header .navbar-minimalize').click(function() {
        if ($("body").hasClass('mini-navbar')) {
            setSidebarState('collapsed');
        } else {
            clearSidebarState()

        }

        if (window_width > 768) {
            if ($("body").hasClass('mini-navbar')) {
                // $(".sidebar-collapse").slimScroll({ destroy: true });
                $('.sidebar-collapse').attr('style', '');
                $("body").removeClass('fixed-sidebar');

            } else {
                $("body").addClass('fixed-sidebar');
            }
        } else {
            if ($("body").hasClass('mini-navbar')) {
                // $("body").removeClass('fixed-sidebar');
            } else {
                $("body").addClass('fixed-sidebar');
            }
        }


    })

    if (window_width < 768) {
        $("body").addClass('fixed-sidebar');
    }

    var sidebarState = sessionStorage.getItem('sidebarState');

    if (sidebarState == "collapsed") {
        collapseSidebar();
    } else {
        expandSidebar()
    }

    function setSidebarState(value) {
        sessionStorage.setItem('sidebarState', value);
    }

    function clearSidebarState() {
        sessionStorage.removeItem('sidebarState');
    }

    function collapseSidebar() {
        if (window_width > 768){
            $("body").removeClass('fixed-sidebar').addClass('mini-navbar');
        }
        // $('#main-section').addClass('sidebar-collapsed').removeClass('sidebar-expanded');
        // $('#toggle-collapse').removeClass('glyphicon-circle-arrow-left').addClass('glyphicon-circle-arrow-right');
    }

    function expandSidebar() {
        if (window_width > 768){
            $("body").removeClass('mini-navbar').addClass('fixed-sidebar');
        }
        // $('#main-section').addClass('sidebar-expanded').removeClass('sidebar-collapsed');
        // $('#toggle-collapse').removeClass('glyphicon-circle-arrow-right').addClass('glyphicon-circle-arrow-left');
    }
    // select box style
    var x, i, j, l, ll, selElmnt, a, b, c;
    /*look for any elements with the class "custom-select":*/
    x = document.getElementsByClassName("custom-select");
    l = x.length;
    for (i = 0; i < l; i++) {
        selElmnt = x[i].getElementsByTagName("select")[0];
        ll = selElmnt.length;
        /*for each element, create a new DIV that will act as the selected item:*/
        a = document.createElement("DIV");
        a.setAttribute("class", "select-selected");
        a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
        x[i].appendChild(a);
        /*for each element, create a new DIV that will contain the option list:*/
        b = document.createElement("DIV");
        b.setAttribute("class", "select-items select-hide");
        for (j = 1; j < ll; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                    if (s.options[i].innerHTML == this.innerHTML) {
                        s.selectedIndex = i;
                        h.innerHTML = this.innerHTML;
                        y = this.parentNode.getElementsByClassName("same-as-selected");
                        yl = y.length;
                        for (k = 0; k < yl; k++) {
                            y[k].removeAttribute("class");
                        }
                        this.setAttribute("class", "same-as-selected");
                        break;
                    }
                }
                h.click();
            });
            b.appendChild(c);
        }
        x[i].appendChild(b);
        a.addEventListener("click", function(e) {
            /*when the select box is clicked, close any other select boxes,
            and open/close the current select box:*/
            e.stopPropagation();
            closeAllSelect(this);
            this.nextSibling.classList.toggle("select-hide");
            this.classList.toggle("select-arrow-active");
        });
    }

    function closeAllSelect(elmnt) {
        /*a function that will close all select boxes in the document,
        except the current select box:*/
        var x, y, i, xl, yl, arrNo = [];
        x = document.getElementsByClassName("select-items");
        y = document.getElementsByClassName("select-selected");
        xl = x.length;
        yl = y.length;
        for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
                arrNo.push(i)
            } else {
                y[i].classList.remove("select-arrow-active");
            }
        }
        for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
                x[i].classList.add("select-hide");
            }
        }
    }
    /*if the user clicks anywhere outside the select box,
    then close all select boxes:*/
    document.addEventListener("click", closeAllSelect);
    // end select box style
    // sticky table header


    // table scroll
    if (document.querySelector('[data-module="sticky-table"]')) {
        var el = document.querySelector('[data-module="sticky-table"]');

        var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

        var thead = el.querySelector('thead');

        var offset = el.getBoundingClientRect();


        // Make sure you throttle/debounce this
        if (window_width > 768) {
            window.addEventListener('scroll', function(event) {
                var rect = el.getBoundingClientRect();

                scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;

                if (rect.top < thead.offsetHeight) {
                    // thead.style.width = rect.width + 'px';
                    // thead.classList.add('thead--is-fixed');
                    $('#sticky-header').addClass('thead--is-fixed');
                } else {
                    // thead.classList.remove('thead--is-fixed');
                    $('#sticky-header').removeClass('thead--is-fixed');
                }
            });
        }
    }

    function table_fixed() {
        var filter_height = $('.wrapper-content .panel-default').first().height();
        var table_height = $('.wrapper-content').height() - filter_height - 100;
        $('.wrapper-content .panel-default').eq(1).find('.table-responsive').css('height', table_height);
    }
    // table_fixed();
    $('#apply_columns').click(function() {
        $('#myModal .modal-footer .btn-black').trigger('click');
        $('#myModal .modal-footer .btn-black').trigger('click');
        table_fixed();
        // window.$('#myModal').modal('toggle');
        $('#myModal').modal('hide');
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
        var fields = $('.section-bottom-side .section-input-wrap label');
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


    // column setting
    function setCheckboxes() {
        var checkboxes = document.getElementById("controls-dropdown-menu");
        var inputs_columns = [],
            visible_columns = [],
            hidden_columns = [];
        checkboxes.innerHTML = "";
        var fragment = document.createDocumentFragment();
        var isVisible = false;

        var fields_columns = $('.section-table thead tr th');
        fields_columns.each(function (i) {
            var checkbox = document.createElement("div");
            checkbox.className = "checkbox-block";
            var block = document.createElement("div");
            block.className = "checkbox-block-container col-md-4";
            var input = document.createElement("input");
            input.type = "checkbox";
            input.id = "checkbox-" + i;
            input.name = "checkbox";
            input.checked = true;
            var label = document.createElement("label");
            label.htmlFor = "checkbox-" + i;
            label.className = "checkbox-label";
            label.appendChild(
                document.createTextNode($(this).text())
                // document.createTextNode(heading.textContent || heading.innerText)
            );
            block.appendChild(checkbox)
            checkbox.appendChild(input)
            checkbox.appendChild(label)

            fragment.appendChild(block);

            inputs_columns.push(input);
        });


        checkboxes.appendChild(fragment);
    }
    if (document.getElementById("controls-dropdown-menu")){
        setCheckboxes();
    }

    $('#apply_columns').click(function () {
        var column_boxes = $('#controls-dropdown-menu input');
        column_boxes.each(function (col, index){
            var tbl = document.getElementById("tblMain");
            if(col > 1){
                if ($(this).prop("checked") == true){
                    if (tbl != null) {
                        for (var i = 0; i < tbl.rows.length; i++) {
                            for (var j = 0; j < tbl.rows[i].cells.length; j++) {
                                if (j == col) {
                                    tbl.rows[i].cells[j].style.display = "table-cell";
                                }
                            }
                        }
                    }
                }
                else{
                    if (tbl != null) {
                        for (var i = 0; i < tbl.rows.length; i++) {
                            for (var j = 0; j < tbl.rows[i].cells.length; j++) {
                                if (j == col){
                                    tbl.rows[i].cells[j].style.display = "none";
                                }
                            }
                        }
                    }
                }
            }
        })
    });

    $('#select_all_column').click(function () {
        visible = [];
        hidden = [];
        $('#controls-dropdown-menu .checkbox-block input:checkbox').prop("checked", true);

    });

    $('#remove_all_column').click(function () {
        visible = [];
        hidden = [];
        $('#controls-dropdown-menu .checkbox-block input:checkbox').prop("checked", false);
    });
    // column settigns
  

    function updateFilters() {
        // dataTable.api().column(2).visible(false);
        $('#settingModal .checkbox-block input').each(function() {
            var index = $(this).data('filter-id');
            if (this.checked) {
                $('.filter-main .section-input-wrap').eq(index).show();
            } else {
                $('.filter-main .section-input-wrap').eq(index).hide();
            }
        })
    }
    if (checkboxes) {
        setCheckboxes_Settings();
    }

    $('#apply_filters').click(function() {
        $('#settingModal .modal-footer .btn-black').trigger('click');
        $('#settingModal .modal-footer .btn-black').trigger('click');
        table_fixed();
        updateFilters();
        filter_trip();
        // window.$('#myModal').modal('toggle');
        // $('#myModal').hide();
    });

    $('#select_all_filters').click(function() {
        $('#settingModal .checkbox-block input:checkbox').prop("checked", true);
        // $('.settings-panel .form-group').show();
    });
    $('#remove_all_filters').click(function() {
        $('#settingModal .checkbox-block input:checkbox').prop("checked", false);
        // $('.settings-panel .form-group').hide();

    });

    // bottom slide
    $('.filter-box .mobile-filter').click(function () {
        // $('#mobile_filter').animate({ height: '300' });
        $('#mobile_filter').slideToggle('1500');

    });
    $('.bottom_slide .bottom_icon').click(function () {
        // $('#mobile_filter').animate({ height: '300' });
        $('#mobile_filter').slideToggle('1500');
        
    });

    // multi select 
    $(document).on('click', '.section-bottom--delete', function () {
        if (confirm('Are you sure')) {
            var ids = [];

            $('.section-body-checkbox__input input:checked').each(function () {
                ids.push($(this).data('entry-id'));
            });

            $.ajax({
                url: window.route_mass_crud_entries_destroy,
                method: 'post',
                data: {
                    _token: _token,
                    ids: ids
                }
            }).done(function () {
                location.reload();
            });

            // $.ajax({
            //     method: 'post',
            //     url: $(this).attr('href'),
            //     data: {
            //         _token: _token,
            //         ids: ids
            //     }
            // }).done(function() {
            //     location.reload();
            // });
        }

        return false;
    });

    // sort table
    function sortTable(n) {
        var table,
          rows,
          switching,
          i,
          x,
          y,
          shouldSwitch,
          dir,
          switchcount = 0;
        table = document.getElementById("tblMain");
        switching = true;
        //Set the sorting direction to ascending:
        dir = "asc";
        /*Make a loop that will continue until
        no switching has been done:*/
        while (switching) {
          //start by saying: no switching is done:
          switching = false;
          rows = table.getElementsByTagName("TR");
          /*Loop through all table rows (except the
          first, which contains table headers):*/
          for (i = 1; i < rows.length - 1; i++) { //Change i=0 if you have the header th a separate table.
            //start by saying there should be no switching:
            shouldSwitch = false;
            /*Get the two elements you want to compare,
            one from current row and one from the next:*/
            x = rows[i].getElementsByTagName("TD")[n];
            y = rows[i + 1].getElementsByTagName("TD")[n];
            /*check if the two rows should switch place,
            based on the direction, asc or desc:*/
            if (dir == "asc") {
              if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            } else if (dir == "desc") {
              if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
                //if so, mark as a switch and break the loop:
                shouldSwitch = true;
                break;
              }
            }
          }
          if (shouldSwitch) {
            /*If a switch has been marked, make the switch
            and mark that a switch has been done:*/
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            //Each time a switch is done, increase this count by 1:
            switchcount++;
          } else {
            /*If no switching has been done AND the direction is "asc",
            set the direction to "desc" and run the while loop again.*/
            if (switchcount == 0 && dir == "asc") {
              dir = "desc";
              switching = true;
            }
          }
        }
      }

    // $('.section-table thead tr th').click(function(){
    $(document).on('click', '.section-table thead tr th', function () {
        var index = $(this).index();
        $('.section-table thead tr th').removeClass('active')
        if($(this).hasClass('sorting_desc')){
            $(this).addClass('sorting_asc').removeClass('sorting_desc');
        }
        else{
            $(this).addClass('sorting_desc').removeClass('sorting_asc');
        }
        $(this).addClass('active');
        if(index > 1){
            sortTable(index)
        }
    })  
      
    // end sort table


    // filter box save
    $(".filter-main select").change(function () {
        const url = window.location.href;
        const input_name = $(this).attr("id");
        const filed_name = url + '-' + input_name;
        localStorage.setItem(filed_name, this.value);
        // $(this).val(storaged_val);
    })

    $(".filter-main select").each(function () {
        const url = window.location.href;
        const input_name = $(this).attr("id");
        const filed_name = url + '-' + input_name;
        let storaged_val = localStorage.getItem(filed_name);
        if (storaged_val != null){
            $(this).val(storaged_val).change();
        }
    })

    $(".section-select--input2 .section-select--popup__item2").click(function () {
        const url = window.location.href;
        const input_name = $(this).parents('.section-select--input2').children('input').attr("id");
        const filed_name = url + '-' + input_name;
        var value = $(this).data('type');
        var html = $(this).html();
        localStorage.setItem(filed_name + 'value', value);
        localStorage.setItem(filed_name + 'html', html);
        // $(this).val(storaged_val);
    })

    $(".section-select--input2 ").each(function () {
        const url = window.location.href;
        const input_name = $(this).children('input').attr("id");
        const filed_name = url + '-' + input_name;
        let storaged_val = localStorage.getItem(filed_name + 'value');
        let storaged_html = localStorage.getItem(filed_name + 'html');
        if (storaged_val != null){
            $(this).children('input').val(storaged_val);
        }
        if (storaged_html != null){
            $(this).children('span').html(storaged_html);
        }
    })

    $("#from_date").change(function () {
        const url = window.location.href;
        const input_name = $(this).attr("id");
        const filed_name = url + '-' + input_name;
        localStorage.setItem(filed_name, this.value);
        // $(this).val(storaged_val);
    })

    $("#to_date").change(function () {
        const url = window.location.href;
        const input_name = $(this).attr("id");
        const filed_name = url + '-' + input_name;
        localStorage.setItem(filed_name, this.value);
        // $(this).val(storaged_val);
    })

    $("#to_date").each(function () {
        const url = window.location.href;
        const input_name = $(this).attr("id");
        const filed_name = url + '-' + input_name;
        let storaged_val = localStorage.getItem(filed_name);
        if (storaged_val != null){
            $(this).datepicker('setDate', storaged_val);
        }
    })

    $("#from_date").change(function () {
        const url = window.location.href;
        const input_name = $(this).attr("id");
        const filed_name = url + '-' + input_name;
        localStorage.setItem(filed_name, this.value);
        // $(this).val(storaged_val);
    })

    $("#from_date").each(function () {
        const url = window.location.href;
        const input_name = $(this).attr("id");
        const filed_name = url + '-' + input_name;
        let storaged_val = localStorage.getItem(filed_name);
        if (storaged_val != null){
            $(this).datepicker('setDate', storaged_val);
        }
    })

    $(".filter-main input[type='text']").keyup(function(){
        const url = window.location.href;
        const input_name = $(this).attr("id");
        const filed_name = url + '-' + input_name;
        localStorage.setItem(filed_name, $(this).val());
    })

    $(".filter-main input[type='text']").each(function(){
        const url = window.location.href;
        const input_name = $(this).attr("id");
        const filed_name = url + '-' +input_name;
        let storaged_val = localStorage.getItem(filed_name);
        if (storaged_val != null) {
            $(this).val(storaged_val);
        }
    })

    $('.section-balance-date--icon').click(function(e){
        e.stopPropagation();
        e.preventDefault()
        $(this).siblings('input').trigger('focus');
    })

    // end filter box

    // car_number mask
    $('.gogocar-car-number').mask('AA-9999-99');

    $('.trip-select-car').click(function () {
        $(this).toggleClass('active');
        $('.trip-select-car--list').slideToggle(200);
    });
    $(document).click(function (e) {
        if (!$(e.target).closest(".trip-select-car,.trip-select-car--item").length) {
            $('.trip-select-car--list').slideUp(200);
            $('.trip-select-car').removeClass('active');
        }
        e.stopPropagation();
    });

    $('.trip-select-car--item').click(function () {
        var get_car_model = $(this).children().children().children('.trip-select-car-name--number1').text();
        var get_car_number = $(this).children().children().children('.trip-select-car-name--number2').text();
        $('.trip-select--car--name1').text(get_car_model);
        $('.trip-select--car--name2').text(get_car_number);
    });

    $('.choise-car-tab').click(function () {
        var get_tab = $(this).attr('data-car-choise');
        $('#template').val(get_tab);
        $(this).addClass('active').siblings().removeClass('active');
        $('.car-place--content .'+ get_tab).addClass('active').siblings().removeClass('active');
    });

    $('.car-place--svg--places').click(function () {
        $(this).toggleClass('active');
        $('.car-place--booked').removeClass('active');
    });

})