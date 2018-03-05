var firstName = document.getElementById("input-first_name");
var lastName = document.getElementById("input-last_name");
var email = document.getElementById("input-email");
var messageContainer = document.getElementById("messageContainer");
var captcha = document.getElementById("input-captcha");
function validateForm() {

	var errorMessages = [];

	//prevent showing default error message balloons
	document.querySelector( "form" ).addEventListener( "invalid", function( event ) {
 	       event.preventDefault();
    }, true);

	if(firstName.validity.valueMissing) {
		errorMessages.push("First Name Is Empty");
		firstName.style.border = "1px solid red";
	}

	if(lastName.validity.valueMissing) {
		errorMessages.push("Achternaam is leeg");
		lastName.style.border = "1px solid red";
	}
	messageList = "";
	for(var i=0; i < errorMessages.length; i++) {
	messageList += "<li>" + errorMessages[i] + "</li>";
	messageContainer.innerHTML = messageList;
	}
}
