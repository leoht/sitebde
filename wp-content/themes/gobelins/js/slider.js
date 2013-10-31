var currentItem = 1
var sign = '-'
var auto = true;

(function ($) {

    var showSlide = function (slide) {
        var diff = currentItem - slide

        // go back
        if (diff > 0) {
            $('.home_slider_item').animate({
                left: '+='+(diff*100)+'%'
            }, 700, 'easeInOutCirc');
        } 
        // go forward
        else if (diff < 0) {
            $('.home_slider_item').animate({
                left: '-='+(-diff*100)+'%'
            }, 700, 'easeInOutCirc');
        }

        currentItem = slide
    }

    var nextSlide = function () {

        if ($(document).scrollTop() > 0 || !auto) {
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


    // $('.show-menu, .menu').mouseover(function () {
    //     $('.menu').show(0)
    // })

    // $('.show-menu, .menu').mouseout(function () {
    //     $('.menu').hide(0)
    // })

    setInterval(nextSlide, 5000)

    $('.home_button, .link_adherer').click(function () {
        $('.overlay').fadeIn(500);
        $('.adherer_popup form input[name="last_name"]').focus();
    })

    $('form input#birthdate').datepicker();

    $('.adherer_popup .close').click(function (e) {
        e.preventDefault()

        $('.overlay').fadeOut(500);
    })

    $('.slider_controls_button').click(function () {
        // cut the auto sliding
        auto = false

        var slide = $(this).attr('data-slide')
        showSlide(slide)
    })
   
}) (jQuery);
