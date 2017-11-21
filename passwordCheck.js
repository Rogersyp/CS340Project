//Written by Connor Sedwick
//This file checks the password entry for "login2.php" and uses AJAX to supply 
//the user with info on whether their password and username match.
function checkPassword(x) {

  	if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    	var xhr=new XMLHttpRequest();
  	} else {  // code for IE6, IE5
    	var xhr=new ActiveXObject("Microsoft.XMLHTTP");
  	}
    document.getElementById('success').style.display = "none";
    document.getElementById('failure').style.display = "none";
  xhr.onreadystatechange=function() {
    if (xhr.readyState==4 && xhr.status==200) {
      var result = xhr.responseText;
      //document.getElementById('ack2').innerHTML = result;
      if(result == 1){
        document.getElementById('success').style.display = "block";
        return true;
      }
      document.getElementById('failure').style.display = "block";
      return false;
    }
  }
  var pass = document.getElementById(x).value;
  var user = document.getElementById('userName').value;
  xhr.open("GET","passwordCheck.php?pass="+pass+"&user="+user,true);
  xhr.send();
  
}