$(document).ready(function() {
    $('.chat-user').on('click', function() {
        console.log('dd');
        $(this).prev().css('border', 'none');
    })
})