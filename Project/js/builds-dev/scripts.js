function check_pass() {
    if (document.getElementById('zpassword').value ==
            document.getElementById('rpassword').value) {
        document.getElementById('submit').disabled = false;
    } else {
        document.getElementById('submit').disabled = true;
    }
}
$(document).on('ready', function() {

    $('.slick-carousel').slick({
            centerMode: true,
            slidesToShow: 3,
            variableWidth: true,
            centerPadding: '60px',
            responsive: [
              {
                breakpoint: 768,
                settings: {
                  arrows: false,
                  centerMode: true,
                  slidesToShow: 3
                }
              },
              {
                breakpoint: 480,
                settings: {
                  arrows: false,
                  centerMode: true,
                  slidesToShow: 1
                }
              }
            ]

    }); // $('.slick-carousel')

}); // (function)
    var edit = document.getElementById("edit");
    var save = document.getElementById("save");

    function edycja(){
        edit.style.display = "none";
        save.style.display = "block";
    }

    function zapisz(){
        var x = document.getElementById("aContent").value;
        document.getElementById("content").innerHTML = x;
                    
        save.style.display = "none";
        edit.style.display = "block";
    }

    var savedlist = document.getElementById("savedlist");
    var editlist = document.getElementById("editlist");

    function edytujliste() {
        savedlist.style.display = "none";
        editlist.style.display = "block";
    }

    function zapiszliste() {
        
        editlist.style.display = "none";
        savedlist.style.display = "block";
    }


    $(document).ready(function(){

        var buttonAdd = document.getElementById('btnEx');
    
            
         z = 0;  
       
        $('#btnEx').click(function(){
            // clone
            
         
            z++;
            var listofex= $('.aCV-main-content-list-ex').find('li', 'input', 'button').last().clone();
            $('.aCV-main-content-list-ex').append(listofex); 
            i = -1;
            $('.aCV-main-content-list-ex-editing').each(function(){
                i++;
                var newID='nr'+i;
                $(this).attr('id',newID);
                $(this).val(i);
            });
            
        
            if(z == 5){
                
                buttonAdd.disabled = true;
            }
               
        });
        
    
        $('.aCV-main-content-list-ex').on('click', '.delete', function(e){
            $(e.currentTarget).closest('li').remove();
            i = $(this).val(1)
            z--;

            i = -1; // ...i tą zmienną...
            $('.aCV-main-content-list-ex-editing').each(function(){//...tutaj i wszystko działa :/
                i++;
                var newID='nr'+i;
                $(this).attr('id',newID);
                $(this).val(i);
            });

            if(z < 5){
                buttonAdd.disabled = false;
            }


            
            
        });

        

            


        $('#btnEdc').click(function(){
            // clone
            

            var listofedc = $('.aCV-main-content-list-edc').find('li', 'input', 'button').first().clone();
            var edytowany = $('.aCV-main-content-list-edc-el-input').add(i);
            // insert @bottom
            $('.aCV-main-content-list-edc').append(listofedc);
            $('.aCV-main-content-list-edc-el-input').append(edytowany);

            
        });

        $('.aCV-main-content-list-edc').on('click', '.delete', function(e){
            $(e.currentTarget).closest('li', 'input', 'button').remove();
        });

        $('.aCV-main-content-list').on('click', '.zapisz', function(e){
            $(e.currentTarget).closest('li', 'input', 'button').remove();
        });
        
        // $('.delete').click(function(e){
        //     // target's li, remove
        //     $(e.currentTarget).closest('li').remove();
        // }); 
    
    });
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