<?php
	session_start();
	if (!isset($_SESSION['email'])){
		header('Location: index.html');
	} 

	require("scripts/dbConnect.php");

	$bookings = $con->prepare('SELECT booking.booking_id, user.firstName, booking.date, booking.time_slot, booking.status FROM booking INNER JOIN user ON booking.chef_id=? AND user.user_id=booking.customer_id;');
    $bookings->bindParam(1, $_SESSION['user_id']);
    $bookings->execute();
	$bookingList = $bookings->fetchAll(PDO::FETCH_ASSOC);
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
			<a href="profile.php">Profile</a>
			<a class="side-nav-active" href="chefDashboard.php">Bookings</a>
		</div>

		<!-- Content Section -->
		<div class="content">
			<div class="current-location">User / <a href="chefDashboard.php">My Bookings</a></div>

			<!-- Booking Selectors -->
			<div class="wrapper">
				<table class="bookings-display-table" cellpadding="0" cellspacing="0" width="100%" style="text-align:center;">
					<tr>
						<th>#</th>
						<th>Customer Name</th>
						<th>Booked on</th>
						<th>Time Slot</th>
						<th>Status</th>
					</tr>
					<?php
						$counter = 0;
						foreach($bookingList as $row){
							$counter++;
							if ($row['status'] == "Approved"){
								echo '<tr class="row-success">';
							} else {
								echo '<tr>';
							}
							echo '<td>'.$counter.'.</td>';
							echo '<td>'.$row['firstName'].'</td>';
							echo '<td>'.$row['date'].'</td>';
							echo '<td>'.$row['time_slot'].'</td>';
							echo '<td><select onchange="changeBookingStatus('.$row['booking_id'].',this.value)">';
							if ($row['status'] == "Pending"){
								echo '<option value="'.$row['status'].'" selected>'.$row['status'].'</option>';
								echo '<option value="Approved">Approved</option>';
							} else if ($row['status'] == "Approved"){
								echo '<option value="'.$row['status'].'" selected>'.$row['status'].'</option>';
								echo '<option value="Pending">Pending</option>';
							}
							echo '</select></td>';
							echo '</tr>';
						}
					?>
				</table>
			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
</body>
</html>