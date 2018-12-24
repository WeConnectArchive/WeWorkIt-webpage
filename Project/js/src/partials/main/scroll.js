jQuery(function($){
    //zresetuj scrolla
    $.scrollTo(0);

    $('#aboutus').click(function() { $.scrollTo($('#aboutFirm'), 500); });
    $('#main').click(function() { $.scrollTo($('#mainpage'), 500); });

    $('#signin').click(function() { $.scrollTo($('#yourChoice'), 500); });
    
    }
);