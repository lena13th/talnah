/**
 * Created by Rustam on 13.08.2017.
 */
$('.event_link').click(function(event){
    $('.show_event').removeClass('show_event');
    $(this).next('.event_item').toggleClass('show_event');
    event.stopPropagation();
});
$(document).keyup(function(e) {
    if (e.keyCode === 27) {
        $('.event_item').removeClass('show_event');
    }
});
$(document).click(function() {
    $('.event_item').removeClass('show_event');
});

$('.month_before_button').click(function(event){
    $(this).parents('.month').removeClass('active_month');
    $(this).parents('.month').addClass('disable_month');
    $(this).parents('.month').prev('.month').removeClass('disable_month').addClass('active_month');
});
$('.month_after_button').click(function(event){
    $(this).parents('.month').removeClass('active_month');
    $(this).parents('.month').addClass('disable_month');
    $(this).parents('.month').next('.month').removeClass('disable_month').addClass('active_month');
});