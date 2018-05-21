$(document).ready(function () {
    $('#dismiss, .oscurecer').on('click', function () {
        $('#barra').removeClass('active');
        $('.oscurecer').fadeOut();
    });

    $('#esconder').on('click', function () {
        $('#barra').addClass('active');
        $('.oscurecer').fadeIn();
        $('.collapse.in').toggleClass('in');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });
});