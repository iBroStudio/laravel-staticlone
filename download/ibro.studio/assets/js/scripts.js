$(function () {

    $(document).on('click touchstart', 'a[href^="#"].anchor-btn', function(){
        $('html, body').stop().animate({scrollTop:$($(this).attr("href")).offset().top}, 1000,'easeInOutQuad');
    });


    $(".hero a").hover(function() {
        animateex();
    }, function() {
        $('.hero a i').stop(true).removeAttr('style');
    });
    function animateex() {
        $('.hero a i').animate({
            width: '120%',
            height: '120%',
            opacity: 0
        }, 1000, animateback);
    }
    function animateback() {
        $('.hero a i').animate({
            width: '100%',
            height: '100%',
            opacity: 1
        }, 0, animateex);
    }

/*
    var animLengthInit = 600;
    if ( $(window).height() < 945 ) {
        var animLengthCorrection = 945-$(window).height();
        animLengthInit = animLengthInit-animLengthCorrection;
        if( animLengthInit < 0 ){ animLengthInit = 0; }
    }

    function animLength() {
        return animLengthInit;
    }

    $(window).on("resize", function() {
        if ( $(window).height() < 945 ) {
            animLengthCorrection = 945-$(window).height();
            animLengthInit = 600-animLengthCorrection;
            if( animLengthInit < 0 ){ animLengthInit = 0; }
        } else {
            animLengthInit = 600;
        }
    });

        // init controller
        var controller = new ScrollMagic.Controller();

        var posYspace = 748;
        var posYspaceMultiplicator = 36;

        // build tween
        var servDev1 = TweenMax.to(".serv-dev-1", 1, {x:-410, y:posYspace, ease: Linear.easeNone});
        var servDev2 = TweenMax.to(".serv-dev-2", 1, {x:-528, y:posYspace+posYspaceMultiplicator, ease: Linear.easeNone});
        var servDev3 = TweenMax.to(".serv-dev-3", 1, {x:-692, y:posYspace+posYspaceMultiplicator*2, ease: Linear.easeNone});

        // build scene
        var scene1 = new ScrollMagic.Scene({triggerElement: ".trigger", duration: animLength})
            .setTween(servDev1)
            .addIndicators() // add indicators (requires plugin)
            .addTo(controller);

        var scene2 = new ScrollMagic.Scene({triggerElement: ".trigger", duration: animLength})
            .setTween(servDev2)
            .addTo(controller);

        var scene3 = new ScrollMagic.Scene({triggerElement: ".trigger", duration: animLength})
            .setTween(servDev3)
            .addTo(controller);
            
 */

});