<?php
	session_start();
	if (!isset($_SESSION['email'])){
		header('Location: index.html');
	} 

	require("scripts/dbConnect.php");

	$bookings = $con->prepare('SELECT user.firstName, booking.date, booking.time_slot, booking.status FROM booking INNER JOIN user ON booking.customer_id=? AND user.user_id=booking.chef_id;');
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
			<a href="#">Profile</a>
			<a href="booking.php">Book Now!</a>
			<a class="side-nav-active" href="booking-history.php">Booking History</a>
		</div>

		<!-- Content Section -->
		<div class="content">
			<div class="current-location">User / <a href="booking-history.php">My Bookings</a></div>

			<!-- Chef's Available -->
			<div class="wrapper">
				<table cellpadding="5" cellspacing="10" width="100%" style="text-align:center;">
					<tr>
						<th>#</th>
						<th>Chef Name</th>
						<th>Booked on</th>
						<th>Time Slot</th>
						<th>Status</th>
					</tr>
					<?php
						$counter = 0;
						foreach($bookingList as $row){
							$counter++;
							echo '<tr>';
							echo '<td>'.$counter.'</td>';
							echo '<td>'.$row['firstName'].'</td>';
							echo '<td>'.$row['date'].'</td>';
							echo '<td>'.$row['time_slot'].'</td>';
							echo '<td>'.$row['status'].'</td>';
							echo '</tr>';
						}
					?>
				</table>
			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
	<script>
		document.getElementById("booking-date").value = new Date().toISOString().slice(0, 10); 
	</script>
</body>
</html>