$(document).ready(function () {
    window.dtDefaultOptions = {
        stateSave: true,
        retrieve: true,
        // dom: 'lrtip',
        dom: 'fBrtipl',
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
    $('.datatable').each(function () {
        dataTable = $(this).dataTable(window.dtDefaultOptions);
    });


    $(".start_date").datepicker({
        todayBtn: "linked",
        setDate: new Date(),
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: "dd.mm.yyyy",
        onSelect: function (date) {
            minDateFilter = new Date(date).getTime();
            dataTable.api().draw();
        }
    }).keyup(function () {
        minDateFilter = new Date(this.value).getTime();
        dataTable.api().draw();
    });


    $("#start_date").change(function () {
        maxDateFilter = new Date(this.value.split(".").reverse().join("-")).getTime();
        // dataTable.api().draw();
        var duration = $('#duration').val();
        // getdate(this.value);
        // var dt = new Date(this.value);
        var dt = this.value.split(".").reverse().join("-");
        document.endDateStart = true;
        if (dt) {
            getdate(dt, duration);
        }
        // dt.setMonth(dt.getMonth() + 2);
        // dt.setDate(dt.getDate() + 3);
        // console.log(dt);

    });

    $("#duration").change(function () {
        dt = $("#start_date").val();
        if (dt) {
            var dt = dt.split(".").reverse().join("-")
            getdate(dt, $(this).val());
            // maxDateFilter = new Date(dt).getTime();
            // dataTable.api().draw();
        }

    });

    $(".end_date").datepicker({
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true,
        format: "dd.mm.yyyy",
        "onSelect": function (date) {
            minDateFilter = new Date(date).getTime();
        }
    }).keyup(function () {
        minDateFilter = new Date(this.value.split(".").reverse().join("-")).getTime();
    });

    function getdate(day, duration) {

        var newdate = new Date(day);
        switch (duration) {
            case "7":
                // code block
                // console.log(7);
                newdate.setDate(newdate.getDate() - 6);
                break;
            case "30":
                // code block
                newdate.setMonth(newdate.getMonth() - 1);
                break;
            case "90":
                // code block
                newdate.setMonth(newdate.getMonth() - 3);
                break;
            case "365":
                // code block
                newdate.setYear(newdate.getFullYear() - 1);
                break;
            default:
            // code block
        }

        var dd = newdate.getDate();
        var mm = newdate.getMonth() + 1;
        var y = newdate.getFullYear();
        var someFormattedDate = dd + '.' + mm + '.' + y;
        $(".end_date").datepicker('setDate', someFormattedDate);
        // document.getElementById('follow_Date').value = someFormattedDate;
    }

    function init() {
        $(".start_date").datepicker("setDate", new Date());
        var duration = $('#duration').val();
        var dt = $("#start_date").val().split(".").reverse().join("-")
        if (dt) {
            getdate(dt, duration);
        }
        // maxDateFilter = new Date($("#start_date").val().split(".").reverse().join("-")).getTime();
        // minDateFilter = new Date($("#end_date").val().split(".").reverse().join("-")).getTime();
        // console.log(maxDateFilter);
        // console.log(minDateFilter);
        // dataTable.api().draw();
    }
    init();

})