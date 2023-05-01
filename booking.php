<?php
	session_start();
	if (!isset($_SESSION['email'])){
		header('Location: index.html');
	} 
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Chef Booking</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
	<!-- Top - Navbar -->
	<div class="navbar">
		<span class="brand">Chef Booking</span>
		<span class="user-details">Hi <?php echo $_SESSION['firstName']; ?>! &nbsp; | &nbsp; <a href="scripts/logout.php"><i class="fa fa-power-off" aria-hidden="true"></i> Logout</a></span>
	</div>

	<!-- Container -->
	<div class="container">

		<!-- Side - Navbar -->
		<div class="side-nav">
			<a href="customer-profile.php">Profile</a>
			<a class="side-nav-active" href="booking.php">Book Now!</a>
			<a href="booking-history.php">Booking History</a>
		</div>

		<!-- Content Section -->
		<div class="content">
			<div class="current-location">User / <a href="booking.php">Book Chef</a></div>

			<!-- Booking Selectors -->
			<div class="wrapper">
				<table cellpadding="30" cellspacing="30" width="80%">
					<tr>
						<td>
							<div class="input-group">
								<label for="">Select Date<span class="required">*</span></label>
								<input type="date" id="booking-date" required autofocus>
							</div>
						</td>
						<td>
							<div class="input-group">
								<label for="">Select Slot<span class="required">*</span></label>
								<select id="booking-slot" required>
									<option value="" disabled selected>Select your time slot</option>
									<option value="9:00-11:00">9:00 - 11:00</option>
									<option value="11:00-13:00">11:00 - 13:00</option>
									<option value="14:00-16:00">14:00 - 16:00</option>
									<option value="16:00-18:00">16:00 - 18:00</option>
								</select>
							</div>
						</td>
						<td>
							<div class="input-group">
								<input type="submit" value="Check Availability" onclick="fetchDateAndTime()">
							</div>
						</td>
					</tr>
				</table>
			</div>

			<!-- Chef's Available -->
			<div id="display-available-chef" class="wrapper">
				<span class="no-cards-error">
					Sorry! No chef's available on date and time slot you've selected. <br> Please change your date & time selections.
				</span>
				<!-- <div class="chef-card">
					<div class="chef-name">Chef Amey</div>
					<div class="chef-email">amey@chef.com</div>
					<span class="chef-rating">4.9/5</span>
					<div class="card-action-container">
						<input type="button" value="Book This Chef!" onclick="bookThisChef()">
					</div>
				</div> -->
			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
	<script>
		document.getElementById("booking-date").value = new Date().toISOString().slice(0, 10); 
	</script>
</body>
</html>