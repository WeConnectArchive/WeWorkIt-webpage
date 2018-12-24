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
