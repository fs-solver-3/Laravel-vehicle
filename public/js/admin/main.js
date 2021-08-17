$(document).ready(function() {

    var handleCheckboxes = function(html, rowIndex, colIndex, cellNode) {
        var $cellNode = $(cellNode);
        var $check = $cellNode.find(':checked');
        return ($check.length) ? ($check.val() == 1 ? 'Yes' : 'No') : $cellNode.text();
    };

    var activeSub = $(document).find('.active-sub');
    if (activeSub.length > 0) {
        activeSub.parent().show();
        activeSub.parent().parent().find('.arrow').addClass('open');
        activeSub.parent().parent().addClass('open');
    }
    $.fn.dataTable.ext.order['dom-checkbox'] = function(settings, col) {
        return this.api().column(col, { order: 'index' }).nodes().map(function(td, i) {
            return $('input', td).prop('checked') ? '1' : '0';
        });
    }
    window.dtDefaultOptions = {
        stateSave: false,
        retrieve: true,
        // dom: 'lrtip',
        dom: 'fBrtip<"actions">l',
        // dom: 'fBrtip<"actions">l',
        columnDefs: [],
        "iDisplayLength": 100,
        "aaSorting": [],
        language: {
            paginate: {
                next: '<img src="/../admin/next.svg">',
                previous: '<img src="/../admin/previous.svg">'
            }
        },
        buttons: [],

    };
    var dataTable;
    $('.datatable').each(function() {
        if ($('.datatable').hasClass('dt-select')) {
            window.dtDefaultOptions.select = {
                style: 'multi',
                selector: 'td:first-child'
            };

            window.dtDefaultOptions.columnDefs.push({
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            });
        }

        // window.dtDefaultOptions.columnDefs.push({
        //     orderable: false,
        //     className: 'select-checkbox',
        //     targets: 0
        // });

        dataTable = $(this).dataTable(window.dtDefaultOptions);
        $("#searchname").keyup(function() {
            dataTable.fnFilter(this.value, 5);
        });
        $("#searchemail").keyup(function() {
            dataTable.fnFilter(this.value, 7);
        });
        $("#searchphone").keyup(function() {
            dataTable.fnFilter(this.value, 5);
        });
        $("#searchcourse").keyup(function() {
            dataTable.fnFilter(this.value, 6);
        });
        $("#searchlesson").keyup(function() {
            dataTable.fnFilter(this.value, 7);
        });
        $("#searchbox").keyup(function() {
            dataTable.fnFilter(this.value, 2);
        });

        $('#table-filter').on('change', function() {
            // var dataTable = $('.datatable').DataTable({
            //     dom: 'lrtip'
            // });
            var options = [];
            options = $(this).val();
            var types = options.map(function(e) {
                return '^' + e + '\$';
            }).join('|');
            console.log(types);
            //filter in column 0, with an regex, no smart filtering, no inputbox,not case sensitive
            dataTable.fnFilter(types, 10, true, false, false, false);
        });

        $('#active').change(function() {
            if (this.checked) {
                dataTable.fnFilter('^1\$', 9, true, false, false, false);
            } else {
                dataTable.fnFilter('^0\$', 9, true, false, false, false);
            }
        });

        $('#verify').change(function() {
            if (this.checked) {
                dataTable.fnFilter('^1\$', 10, true, false, false, false);
            } else {
                dataTable.fnFilter('^0\$', 10, true, false, false, false);
            }
        });

        $.fn.dataTable.ext.order['dom-checkbox'] = function(settings, col) {
            return this.api().column(col, { order: 'index' }).nodes().map(function(td, i) {
                return $('input', td).prop('checked') ? '1' : '0';
            });
        };

        var table = document.getElementsByTagName("table")[0];
        // var datatable = new dataTable(table, {
        //     perPage: 10,
        // });
        var inputs = [],
            visible = [],
            hidden = [];
        var checkboxes = document.getElementById("controls-dropdown-menu");
        var tbutton = document.getElementById("table-button");


        function setCheckboxes() {
            inputs = [];
            visible = [];
            checkboxes.innerHTML = "";
            var fragment = document.createDocumentFragment();
            var isVisible = false;

            document.onclick = function(e) {
                if (!tbutton.contains(e.target.parentNode)) {
                    // checkboxes.style.cssText = "display:none;";
                    isVisible = false;
                }
            };

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

            [].forEach.call(dataTable.api().columns().header(), function(heading, i) {
                var checkbox = document.createElement("div");
                checkbox.className = "checkbox-block";
                var block = document.createElement("div");
                block.className = "checkbox-block-container col-md-3";
                var input = document.createElement("input");
                input.type = "checkbox";
                input.id = "checkbox-" + i;
                input.name = "checkbox";
                var label = document.createElement("label");
                label.htmlFor = "checkbox-" + i;
                label.className = "checkbox-label";
                label.appendChild(
                    document.createTextNode(heading.textContent || heading.innerText)
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

                if (dataTable.api().columns().visible(heading.cellIndex)) {
                    input.checked = true;
                    visible.push(i);
                } else {
                    if (hidden.indexOf(i) < 0) {
                        hidden.push(i);
                    }
                }
                block.appendChild(checkbox)
                checkbox.appendChild(input)
                checkbox.appendChild(label)

                fragment.appendChild(block);

                inputs.push(input);
            });

            [].forEach.call(inputs, function(input, i) {

                input.onchange = function(e) {
                    if (input.checked) {
                        hidden.splice(hidden.indexOf(input.idx), 1);
                        visible.push(input.idx);
                    } else {
                        visible.splice(visible.indexOf(input.idx), 1);
                        hidden.push(input.idx);
                    }

                    // updateColumns();
                };
            });

            checkboxes.appendChild(fragment);
        }

        function updateColumns() {
            // dataTable.api().column(2).visible(false);
            visible.forEach(function(e) {
                console.log(e);
                try {
                    dataTable.api().column(e).visible(true);
                    $('.filter-column-form').eq(e - 2).parent().show();
                } catch (e) {
                    // console.log(e);
                }

            })
            hidden.forEach(function(e) {
                try {
                    dataTable.api().column(e).visible(false);
                    $('.filter-column-form').eq(e - 2).parent().hide();
                    // dataTable.api().column(e).visible(false);
                } catch (e) {
                    // console.log(e);
                }

            })
        }

        setCheckboxes();

        $('#select_all_column').click(function() {
            visible = [];
            hidden = [];
            $('.checkbox-block input:checkbox').prop("checked", true);
            $('.checkbox-block-container').each(function() {
                let i = $(this).index();
                visible.push(i);
            })

        });
        $('#remove_all_column').click(function() {
            visible = [];
            hidden = [];
            $('.checkbox-block input:checkbox').prop("checked", false);
            $('.checkbox-block-container').each(function() {
                let i = $(this).index();
                if (i > 1) hidden.push(i);
            })
        });
        $('#apply_columns').click(function() {
            updateColumns();
            // $('#myModal .modal-footer .btn-black').trigger('click');
            // $('#myModal .modal-footer .btn-black').trigger('click');
            // window.$('#myModal').modal('toggle');
            // $('#myModal').hide();
        });
    });


    if (typeof window.route_mass_crud_entries_destroy != 'undefined') {
        $('.datatable, .ajaxTable').siblings('.actions').html('<a href="' + window.route_mass_crud_entries_destroy + '" class="btn js-delete-selected" style="margin-top:0.755em;"><img src="/../admin/delete-mass.svg"></a>');
    }



    $(document).on('click', '.js-delete-selected', function() {
        if (confirm('Are you sure')) {
            var ids = [];

            $('.datatable').find('tbody tr.selected').each(function() {
                console.log("selected", $(this).data('entry-id'));
                ids.push($(this).data('entry-id'));
            });

            $.ajax({
                url: $(this).attr('href'),
                method: 'post',
                data: {
                    _token: _token,
                    ids: ids
                }
            }).done(function() {
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

    $(document).on('click', '#select-all', function() {
        var selected = $(this).is(':checked');

        $(this).closest('table.datatable, table.ajaxTable').find('td:first-child').each(function() {
            if (selected != $(this).closest('tr').hasClass('selected')) {
                $(this).click();
            }
        });
    });

    $('.mass').click(function() {
        if ($(this).is(":checked")) {
            $('.single').each(function() {
                if ($(this).is(":checked") == false) {
                    $(this).click();
                }
            });
        } else {
            $('.single').each(function() {
                if ($(this).is(":checked") == true) {
                    $(this).click();
                }
            });
        }
    });

    $('.page-sidebar').on('click', 'li > a', function(e) {

        if ($('body').hasClass('page-sidebar-closed') && $(this).parent('li').parent('.page-sidebar-menu').size() === 1) {
            return;
        }

        var hasSubMenu = $(this).next().hasClass('sub-menu');

        if ($(this).next().hasClass('sub-menu always-open')) {
            return;
        }

        var parent = $(this).parent().parent();
        var the = $(this);
        var menu = $('.page-sidebar-menu');
        var sub = $(this).next();

        var autoScroll = menu.data("auto-scroll");
        var slideSpeed = parseInt(menu.data("slide-speed"));
        var keepExpand = menu.data("keep-expanded");

        if (keepExpand !== true) {
            parent.children('li.open').children('a').children('.arrow').removeClass('open');
            parent.children('li.open').children('.sub-menu:not(.always-open)').slideUp(slideSpeed);
            parent.children('li.open').removeClass('open');
        }

        var slideOffeset = -200;

        if (sub.is(":visible")) {
            $('.arrow', $(this)).removeClass("open");
            $(this).parent().removeClass("open");
            sub.slideUp(slideSpeed, function() {
                if (autoScroll === true && $('body').hasClass('page-sidebar-closed') === false) {
                    if ($('body').hasClass('page-sidebar-fixed')) {
                        menu.slimScroll({
                            'scrollTo': (the.position()).top
                        });
                    }
                }
            });
        } else if (hasSubMenu) {
            $('.arrow', $(this)).addClass("open");
            $(this).parent().addClass("open");
            sub.slideDown(slideSpeed, function() {
                if (autoScroll === true && $('body').hasClass('page-sidebar-closed') === false) {
                    if ($('body').hasClass('page-sidebar-fixed')) {
                        menu.slimScroll({
                            'scrollTo': (the.position()).top
                        });
                    }
                }
            });
        }
        if (hasSubMenu == true || $(this).attr('href') == '#') {
            e.preventDefault();
        }
    });

    $('.select2').select2();

});

function processAjaxTables() {
    $('.ajaxTable').each(function() {
        window.dtDefaultOptions.processing = true;
        window.dtDefaultOptions.serverSide = true;
        if ($(this).hasClass('dt-select')) {
            window.dtDefaultOptions.select = {
                style: 'multi',
                selector: 'td:first-child'
            };

            window.dtDefaultOptions.columnDefs.push({
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            });
        }
        $(this).DataTable(window.dtDefaultOptions);
        if (typeof window.route_mass_crud_entries_destroy != 'undefined') {
            $(this).siblings('.actions').html('<a href="' + window.route_mass_crud_entries_destroy + '" class="btn btn-xs btn-danger js-delete-selected" style="margin-top:0.755em;margin-left: 20px;">Delete selected</a>');
        }
    });

}