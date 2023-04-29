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
			<a class="side-nav-active" href="booking.html">Profile</a>
			<a href="#">Bookings</a>
		</div>

		<!-- Content Section -->
		<div class="content">
			<div class="current-location">User / <a href="booking.html">Book Chef</a></div>

			<!-- Booking Selectors -->
			<div class="wrapper">
				<form>
					<table cellpadding="30" cellspacing="30" width="80%">
						<tr>
							<td>
								<div class="input-group">
									<label for="">Select Date<span class="required">*</span></label>
									<input type="date" id="current-date" required autofocus>
								</div>
							</td>
							<td>
								<div class="input-group">
									<label for="">Select Slot<span class="required">*</span></label>
									<select required>
										<option value="" disabled selected>Select your time slot</option>
										<option>Customer</option>
										<option>Chef</option>
									</select>
								</div>
							</td>
							<td>
								<div class="input-group">
									<input type="button" value="Check Availability">
								</div>
							</td>
						</tr>
					</table>
				</form>
			</div>

			<!-- Chef's Available -->
			<div class="wrapper">
				sdjfhg
			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
	<script>
		document.getElementById("current-date").value = new Date().toISOString().slice(0, 10); 
	</script>
</body>
</html>