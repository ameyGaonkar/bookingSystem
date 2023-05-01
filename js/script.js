
// Checking whether the entered password and confirm password matches and enable the submit button on success.
function comparePassword(){
	if (document.getElementById('confirm-password').value === document.getElementById('password').value)
	{
		document.getElementById("sign-up-button").disabled = false;
	} else {
		document.getElementById("sign-up-button").disabled = true;
	}
}


// Code to display list of available chefs depending on date & time slot selection
function displayAvailableChefs(chefs){
	if(chefs.length){
		var innerHTML = "";
		for (const chef of chefs) {
			innerHTML += '<div class="chef-card">';
			innerHTML += '<div class="chef-name">Chef '+chef.firstName+'</div>';
			innerHTML += '<div class="chef-email">'+chef.email+'</div>';
			innerHTML += '<span class="chef-rating">4.9/5</span>';
			innerHTML += '<div class="card-action-container">';
			innerHTML += '<input type="button" value="Book This Chef!" onclick="bookThisChef('+chef.user_id+')">';
			innerHTML += '</div>';
			innerHTML += '</div>';
		}
	} else {
		var innerHTML = '<span class="no-cards-error">Sorry! No chef\'s available on date and time slot you\'ve selected. <br> Please change your date & time selections.</span>';
	}
	document.getElementById("display-available-chef").innerHTML = innerHTML;
}


// Fetch available chefs for a particular date & time slot using AJAX
var date,time;

function fetchChefs(){
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



function fetchDateAndTime(){
	date = document.getElementById('booking-date').value;
	time = document.getElementById('booking-slot').value;

	fetchChefs();
}

// AJAX to book a chef
function bookThisChef(chef_id){
	var data = new FormData();
	data.append('date', date);
	data.append('time_slot', time);
	data.append('chef_id', chef_id);

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.open("POST", "scripts/book-chef.php"); 
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			if(xmlHttp.response == "Booking Successful."){
				fetchChefs();
			}
			alert(xmlHttp.response);
		}
	}
	xmlHttp.send(data);
}


// AJAX to change status of booking
function changeBookingStatus(bookingId,status){
	var data = new FormData();
	data.append('booking_id', bookingId);
	data.append('status', status);

	var xmlHttp = new XMLHttpRequest();
	xmlHttp.open("POST", "scripts/changeBookingStatus.php"); 
	xmlHttp.onreadystatechange = function()
	{
		if(xmlHttp.readyState == 4 && xmlHttp.status == 200)
		{
			alert(xmlHttp.response);
			location.reload();
		}
	}
	xmlHttp.send(data);
}
