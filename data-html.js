function loadDoc() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       document.getElementById("thisButton").innerHTML = this.responseText;
       document.getElementById('drake').style.display = "block";
      }
    };
    xhttp.open("GET", src="Drake-Hotline-Bling.jpg", true);
    xhttp.send();
  }