$(document).ready(function(){
    $('body').on('click', '.navbar-toggle', function(){
        $('.menu_container').toggleClass('show');
    });
    // $('body').on('click', '.show_cats_button', function(){
    //     $('.nav_menu').addClass('show_nav_menu');
    //     $('.overlay').fadeIn(300);
    // });
    // $('.close_nav, .overlay').click(function(){
    //     $('.nav_menu').removeClass('show_nav_menu');
    //     $('.overlay').fadeOut(300);
    // });
    $(document).keyup(function(e) {
        if (e.keyCode === 27) {
            $('.window').removeClass('show');
        }
    });
    $('.close_window, .overlay').click(function(){
        $(this).parent('.window').removeClass('show');
    });
});

