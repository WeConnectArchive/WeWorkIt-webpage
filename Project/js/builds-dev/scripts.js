function check_pass() {
    if (document.getElementById('zpassword').value ==
            document.getElementById('rpassword').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}
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
function check() {
    document.getElementById("switch").checked = true;
}

function uncheck() {
    document.getElementById("switch").checked = false;
}

function checkeded(){

    var visable = document.getElementById("switch");
    var private = document.getElementById("private");
    var company = document.getElementById("company");

      if(visable.checked == false) {
        private.style.display="block";
            company.style.display="none";

      }
      else {
            private.style.display="none";
            company.style.display="block";
      }
}

$(document).ready(function () {

    

    var service_item1 = $(".yourChoiceEmployer");
    var service_item2 = $(".yourChoiceEmployee");
    

      $(".yourChoiceEmployerTitle").click(function(){

        if (!(service_item1.hasClass("open"))) {
          
          service_opened1 = $(this).parents(".yourChoiceEmployer");
          service_opened1.addClass("open");
        }

      });

      

      $(".yourChoiceEmployeeTitle").click(function() {

        if (!(service_item2.hasClass("open"))) {
          service_opened2 = $(this).parents(".yourChoiceEmployee");
          service_opened2.addClass("open");
        }
      });

      $(".yourChoiceEmployeeTitle").click(function(){

      if (!(service_item2.hasClass("open"))) {
        
        service_opened2 = $(this).parents(".yourChoiceEmployee");
        service_opened2.addClass("open");
      }

      });

      $(".glyphicon2").click(function() {

              service_opened2.removeClass("open");
              
            });

            $(".glyphicon1").click(function() {

              service_opened1.removeClass("open");
              
            });
    }); 