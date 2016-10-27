$(document).ready(function() {


    // find the div.fade elements and hook the hover event
    $('div.fade').hover(function() {
        // on hovering over, find the element we want to fade *up*
        var fade = $('> div', this);

        // if the element is currently being animated (to a fadeOut)...
        if (fade.is(':animated')) {
            // ...take it's current opacity back up to 1
            fade.stop().fadeTo(250, 1);
        } else {
            // fade in quickly
            fade.fadeIn(250);
        }
    }, function() {
        // on hovering out, fade the element out
        var fade = $('> div', this);
        if (fade.is(':animated')) {
            fade.stop().fadeTo(1500, 0);
        } else {
            // fade away slowly
            fade.fadeOut(1500);
        }
    });



});