var tnum = 'en';

$(document).ready(function() {

    $('a.curator_chat_link').on('click', function(e) {
        window.localStorage.setItem('activeTab', '#v-pills-dialog');
    });

    $(document).click(function(e) {
        $('.translate_wrapper, .more_lang').removeClass('active');
    });

    $('.translate_wrapper .current_lang').click(function(e) {
        e.stopPropagation();
        $(this).parent().toggleClass('active');

        setTimeout(function() {
            $('.more_lang').toggleClass('active');
        }, 5);
    });


    /*TRANSLATE*/
    // translate(tnum);

    $('.more_lang .lang').click(function() {
        $(this).addClass('selected').siblings().removeClass('selected');
        $('.more_lang').removeClass('active');

        var img = $(this).find('img').attr('src');
        var lang = $(this).attr('data-value');
        var tnum = lang;
        translate(tnum);

        // $('.current_lang .lang-txt').text(lang);
        $('.current_lang img').attr('src', img);

        if (lang == 'ar') {
            $('body').attr('dir', 'rtl');
        } else {
            $('body').attr('dir', 'ltr');
        }

    });

    // payment select
    $('.method').click(function() {
        $(this).addClass('selected').siblings().removeClass('selected');
        $(this).siblings().find('.selected_method').val($(this).data('method'))
        $('#replenishMoneyModal .method').removeClass('active');

    });

    $(".dropdown-toggle").click(function (event) {
        // event.stopPropagation();
        // $(".dropdown-menu").removeClass('show');
        // $(this).parents().children(".dropdown-menu").addClass('show');
        $('.more_lang').removeClass('active');
    });

    $('.dropdown  .user_account').click(function(e){
        // event.stopPropagation();
        // $(".dropdown-menu").removeClass('show');
        // $(this).parents().children(".dropdown-menu").addClass('show');
        $('.more_lang').removeClass('active');
    })

    $('.current_lang').click(function(){
        $(".dropdown-menu").removeClass('show');
        // $('.more_lang').addClass('active');
    })


});

function translate(tnum) {
    window.location.href = tnum
}
// sticky menu

// Get the header
var header = document.getElementById("header");

if (header) {
    window.onscroll = function() { myFunction() };
    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }
}