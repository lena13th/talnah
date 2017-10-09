$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        margin: 0,
        loop: true,
        items: 1,
        nav: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
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