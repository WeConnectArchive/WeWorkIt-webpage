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
