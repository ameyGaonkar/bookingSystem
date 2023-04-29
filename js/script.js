
// Checking whether the entered password and confirm password matches and enable the submit button on success.
function comparePassword(){
	if (document.getElementById('confirm-password').value === document.getElementById('password').value)
	{
		document.getElementById("sign-up-button").disabled = false;
	} else {
		document.getElementById("sign-up-button").disabled = true;
	}
}

