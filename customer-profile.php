<?php
	session_start();
	if (!isset($_SESSION['email'])){
		header('Location: index.html');
	} 

	require("scripts/dbConnect.php");

	$user = $con->prepare('SELECT * FROM user WHERE user_id=?');
    $user->bindParam(1, $_SESSION['user_id']);
    $user->execute();
	$userDetails = $user->fetch(PDO::FETCH_ASSOC);
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
			<a  class="side-nav-active" href="customer-profile.php">Profile</a>
			<a href="booking.php">Book Now!</a>
			<a href="booking-history.php">Booking History</a>
		</div>

		<!-- Content Section -->
		<div class="content">
			<div class="current-location">User / <a href="customer-profile.php">My Profile</a></div>

			<!-- Booking Selectors -->
			<div class="wrapper">
                <div class="profile-form">
                    <form>
                        <h2>Update Profile Information</h2>
                        <div class="input-group">
                            <label for="">First Name<span class="required">*</span></label>
                            <input type="text" name="firstName" value="<?php echo $userDetails['firstName']; ?>" required autofocus>
                        </div>
                        <div class="input-group">
                            <label for="">Last Name</label>
                            <input type="text" name="lastName" value="<?php echo $userDetails['lastName']; ?>">
                        </div>
                        <div class="input-group">
                            <label for="">Email<span class="required">*</span></label>
                            <input type="email" name="email" value="<?php echo $userDetails['email']; ?>" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z0-9]{2,4}" title="Enter email in format axxxxx@xxx.xx" required>
                        </div>
                        <div class="input-group">
                            <label for="">User Type</label>
                            <input type="text" name="userType" value="<?php echo $userDetails['user_type']; ?>" disabled>
                        </div>
                        <div class="input-group">
                            <input type="button" value="Update Information" onclick="updateUserInformation(<?php echo $_SESSION['user_id']; ?>)">
                        </div>
                    </form>
                    <br><br><br>
                    <form>
                        <h2>Change Password</h2>
                        <div class="input-group">
                            <label for="">Current Password<span class="required">*</span></label>
                            <input id="current-password" type="password" name="current-password" placeholder="Enter your current password here." pattern=".{8,}" title="Length should be minimum 8 characters" required>
                        </div>
                        <div class="input-group">
                            <label for="">New Password<span class="required">*</span></label>
                            <input id="password" type="password" name="password" placeholder="Enter your new password here." pattern=".{8,}" title="Length should be minimum 8 characters" onkeyup="comparePassword()" required>
                        </div>
                        <div class="input-group">
                            <label for="">Confirm New Password<span class="required">*</span></label>
                            <input id="confirm-password" type="password" placeholder="Re-enter your new password here again." pattern=".{8,}" title="Length should be minimum 8 characters" onkeyup="comparePassword()" required>
                        </div>
                        <div class="input-group">
                            <input type="button" value="Change Password" id="sign-up-button" onclick="changeUserPassword(<?php echo $_SESSION['user_id']; ?>)" disabled>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>
	<script src="js/script.js"></script>
</body>
</html>