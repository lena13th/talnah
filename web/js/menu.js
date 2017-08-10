$(document).ready(function(){
    $('body').on('click', '.navbar-toggle', function(){
        $('.menu_container').toggleClass('show');
    });
    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.window').removeClass('show');
            $('.submenu').removeClass('show_submenu');
        }
    });
    $('.close_window, .overlay').click(function(){
        $(this).closest('.window').removeClass('show');
    });
    $('.submenu_expand').click(function(event){
        if ($(window).width() <= '768') {
            $(this).next('.submenu').toggleClass('show_submenu');
            event.stopPropagation();
        }
    });
    $('.menu li').hover(function(event){
        if ($(window).width() > '768') {
            $(this).find('.submenu').toggleClass('show_submenu');
        }
    });
    $(document).click(function() {
        $('.submenu').removeClass('show_submenu');
    });
});