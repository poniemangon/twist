$(document).ready(function() {
    var doAnimations = function() {
        var $animatables = $('.animatable');
        var windowTop = $(window).scrollTop();
        var windowBottom = windowTop + $(window).height();

        if ($animatables.length == 0) {
            $(window).off('scroll.animations'); 
        }

        $animatables.each(function() {
            var $animatable = $(this);
            var elementTop = $animatable.offset().top;
            var elementBottom = elementTop + $animatable.height();

            if (elementBottom > windowTop && elementTop < windowBottom) {
                if (!$animatable.hasClass('animated')) {
                    $animatable.addClass('animated');
                }
            } else {
                if ($animatable.hasClass('animated')) {
                    $animatable.removeClass('animated');
                }
            }
        });
    };

    $(window).on('scroll.animations', doAnimations);
    $(window).trigger('scroll.animations');
});