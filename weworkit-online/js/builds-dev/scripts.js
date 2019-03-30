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
function radiolog() {

    var ppersonRadio = document.getElementById("ppersonRadio");
    var companyRadio = document.getElementById("companyRadio");
    var employeeRadio = document.getElementById("employeeRadio");

    var ppersonSection = document.getElementById("ppersonSection");
    var companySection = document.getElementById("companySection");
    var employeeSection = document.getElementById("employeeSection");

      if(ppersonRadio.checked == true) {
        ppersonSection.style.display="block";
        companySection.style.display="none";
        employeeSection.style.display="none";

      }
      else if(companyRadio.checked == true)  {
            ppersonSection.style.display="none";
            companySection.style.display="block";
            employeeSection.style.display="none";
      }
      else {
            ppersonSection.style.display="none";
            companySection.style.display="none";
            employeeSection.style.display="block";
      }
}
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

function updateSelect(){
	var x, i, j, selElmnt, a, b, c;
	x = document.getElementsByClassName("section-category");

    for (i = 0; i < x.length; i++) {
      selElmnt = x[i].getElementsByTagName("select")[0];
      /* For each element, search for a DIV that contain the option list: */
      b = document.getElementsByClassName("select-items")[i];
      b.innerHTML = "";
      
      for (j = 1; j < selElmnt.length; j++) {
        /* For each option in the original select element,
        create a new DIV that will act as an option item: */
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
          /* When an item is clicked, update the original select box,
          and the selected item: */
          var y, i, k, s, h;
          s = this.parentNode.parentNode.getElementsByTagName("select")[0];
          h = this.parentNode.previousSibling;
          for (i = 0; i < s.length; i++) {
            if (s.options[i].innerHTML == this.innerHTML) {
              s.selectedIndex = i;
              h.innerHTML = "Category";
              y = this.parentNode.getElementsByClassName("same-as-selected");
              for (k = 0; k < y.length; k++) {
                y[k].removeAttribute("class");
              }
              this.setAttribute("class", "same-as-selected");
              break;
            }
          }
            h.click();
        });
        b.appendChild(c);
      } 
	  }
}


var x, i, j, selElmnt, a, b, c;
/* Look for any elements with the class "custom-select": */
x = document.getElementsByClassName("section-category");
for (i = 0; i < x.length; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    /* For each element, create a new DIV that will act as the selected item: */
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /* For each element, create a new DIV that will contain the option list: */
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    b.setAttribute("onclick", "moveOptions("+i+")");
    document.getElementsByClassName('selectedCategory')[i].setAttribute("onchange", "removeOptions("+i+")");

    for (j = 1; j < selElmnt.length; j++) {
        /* For each option in the original select element,
        create a new DIV that will act as an option item: */
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function(e) {
          /* When an item is clicked, update the original select box,
          and the selected item: */
          var y, i, k, s, h;
          s = this.parentNode.parentNode.getElementsByTagName("select")[0];
          h = this.parentNode.previousSibling;
          for (i = 0; i < s.length; i++) {
            if (s.options[i].innerHTML == this.innerHTML) {
              s.selectedIndex = i;
              h.innerHTML = "Programist Language";
              y = this.parentNode.getElementsByClassName("same-as-selected");
              for (k = 0; k < y.length; k++) {
                y[k].removeAttribute("class");
              }
              this.setAttribute("class", "same-as-selected");
              break;
            }
          }
          h.click();
      });
      b.appendChild(c);
    }
    x[i].appendChild(b);

    a.addEventListener("click", function(e) {
      /* When the select box is clicked, close any other select boxes,
      and open/close the current select box: */
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
  }


function closeAllSelect(elmnt) {
  /* A function that will close all select boxes in the document,
  except the current select box: */
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}

/* If the user clicks anywhere outside the select box,
then close all select boxes: */
document.addEventListener("click", closeAllSelect);
var selectedCs = document.getElementsByClassName('selectedCategory');
var selectCategories = document.getElementsByClassName('selectCategory');      

function moveOptions(x) {
const selectedC = selectedCs[x];
const selectCategory = selectCategories[x];
  if (selectCategory.length > 0) {
      for (let i = selectCategory.length-1; i >= 1; i--){
          if (selectCategory.options[i].selected) {
              const newOption = new Option(selectCategory.options[i].firstChild.nodeValue,  selectCategory.options[i].value);
              selectedC[selectedC.length] = newOption;
              selectCategory.options[i].parentElement.removeChild(selectCategory.options[i]);
            }
        }
	updateSelect();
    }
}

function removeOptions(x) {

const selectedC = selectedCs[x];
const selectCategory = selectCategories[x];
    if (selectedC.length > 0) {  
      for (let i=selectedC.length-1; i>=0; i--){
          if (selectedC.options[i].selected) {
              const newOption = new Option(selectedC.options[i].firstChild.nodeValue, selectedC.options[i].value);
              selectCategory[selectCategory.length] = newOption;
              selectedC.options[i].parentElement.removeChild(selectedC.options[i]);
            }
        }
	updateSelect();
    }
}



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