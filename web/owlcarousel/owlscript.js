$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        margin: 0,
        loop: true,
        items: 1,
        nav: true,
        navText: ['<','>'],
        responsive : {
            // breakpoint from 0 up
            0 : {
                items: 1
            },
            // breakpoint from 480 up
            768 : {
            },
            1200 : {
                width: 600
            }
        }

    })
});