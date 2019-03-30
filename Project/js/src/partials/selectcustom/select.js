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


