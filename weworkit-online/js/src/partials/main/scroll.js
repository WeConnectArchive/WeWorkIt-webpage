jQuery(function($){
    //zresetuj scrolla
    $.scrollTo(0);

    $('#aboutus').click(function() { $.scrollTo($('#aboutFirm'), 500); });
    $('#main').click(function() { $.scrollTo($('#mainpage'), 500); });

    $('#signin').click(function() { $.scrollTo($('#yourChoice'), 500); });
    
    }
);

$(document).ready(function () {

    var wrap = $('#wrap');
    var x = screen.height - 230;
      $(window).on('scroll', 500, function(e) {
      
        if ($(this).scrollTop() > x) {
          wrap.addClass("flex-nav");
        } else {
          wrap.removeClass("flex-nav");
        }
      
      });
});      