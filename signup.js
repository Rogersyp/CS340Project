function init() {
	var valForm = document.getElementById("valForm");
	valForm.onsubmit = checkPass;
}

function checkPass(e){
	var password1 = document.getElementById("password1");
	var password2 = document.getElementById("password2");
	var email = document.getElementById("email");
	var testExp = /^[A-Z][a-z|A-Z|0-9]{0,10}[0-9][0-9]$/;
	var emailExp = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
	
	if(password1.value != password2.value){
		document.getElementById('error').innerHTML = "passwords do not match re-enter";
		e.preventDefault();
		return false;
	} else if(!testExp.test(password1.value)) {
		document.getElementById('error').innerHTML = "not acceptable re-enter";
		e.preventDefault();
		return false;
	} else if(!emailExp.test(email.value)) {
		document.getElementById('error').innerHTML = "invalid email";
		e.preventDefault();
		return false;
	} else {
		return true;
	}
}

window.onload = init;