//testimonial
$(document).ready(function() {
    //carousel options
    $('#quote-carousel').carousel({
      pause: true, interval: 10000,
    });
  });


$(function () {
    $('input, select').on('focus', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#80bdff');
    });
    $('input, select').on('blur', function () {
        $(this).parent().find('.input-group-text').css('border-color', '#ced4da');
    });
});
