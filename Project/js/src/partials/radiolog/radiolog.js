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