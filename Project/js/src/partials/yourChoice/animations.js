$(document).ready(function () {

    

    var service_item1 = $(".yourChoiceEmployer");
    var service_item2 = $(".yourChoiceEmployee");
    

      $(".yourChoiceEmployerTitle").click(function(){

        if (!(service_item1.hasClass("open"))) {
          
          service_opened1 = $(this).parents(".yourChoiceEmployer");
          service_opened1.removeClass("closed");
          service_opened1.addClass("open");
          
          
        }

      });


      $(".yourChoiceEmployeeTitle").click(function(){

      if (!(service_item2.hasClass("open"))) {
        
        service_opened2 = $(this).parents(".yourChoiceEmployee");
        service_opened2.removeClass("closed");
        service_opened2.addClass("open");
      }

      });

      $(".glyphicon2").click(function() {
        service_opened2.removeClass("open");
            service_opened2.addClass("closed");
              
              
              
            });

            $(".glyphicon1").click(function() {

              service_opened1.removeClass("open");
              service_opened1.addClass("closed");
              
            });
    }); 