var currentItem = 1;
var sign = '-';

(function ($) {

    var nextSlide = function () {

        if ($(document).scrollTop() > 0) {
            return;
        }
        
        $('.home_slider_item').animate({
            left: sign+'=100%'
        }, 700, 'easeInOutCirc');
        
        currentItem = (sign == '+' ? currentItem-1 : currentItem+1);

        if (currentItem == 1 || currentItem >= $('.home_slider_item').length) {
            sign = (sign == '+' ? '-' : '+');
        }
    }

    $('.show-menu, .menu').mouseover(function () {
        $('.menu').show(0)
    })

    $('.show-menu, .menu').mouseout(function () {
        $('.menu').hide(0)
    })

    setInterval(nextSlide, 3000)

    $('.home_button, .link_adherer').click(function () {
        $('.overlay').fadeIn(500);
    })

    $('form input#birthdate').datepicker();

    $('.adherer_popup .close').click(function (e) {
        e.preventDefault()
        
        $('.overlay').fadeOut(500);
    })
   
}) (jQuery);
