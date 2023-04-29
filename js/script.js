
// Checking whether the entered password and confirm password matches and enable the submit button on success.
function comparePassword(){
	if (document.getElementById('confirm-password').value === document.getElementById('password').value)
	{
		document.getElementById("sign-up-button").disabled = false;
	} else {
		document.getElementById("sign-up-button").disabled = true;
	}
}


function displayAvailableChefs(chefs){
	console.log(chefs);
}


var date,time;
function fetchChefs(){
	date = document.getElementById('booking-date').value;
	time = document.getElementById('booking-slot').value;
	var data = new FormData();
	data.append('date', date);
	data.append('slot', time);

	if(time != ""){
		var xmlHttp = new XMLHttpRequest();
		xmlHttp.open("POST", "scripts/get-available-chef.php"); 
		xmlHttp.onreadystatechange = function()
		{
			if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
			{
				displayAvailableChefs(JSON.parse(xmlHttp.response));
			}
		}
		xmlHttp.send(data);
	} else {
		alert("Select Time Slot");
	}
}
