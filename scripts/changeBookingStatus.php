<?php
    session_start();
	if (!isset($_SESSION['email'])){
		header('Location: index.html');
	} 

    require("dbConnect.php");

    $bookChef = $con->prepare("UPDATE booking SET status=? WHERE booking_id=?");
    $bookChef->bindParam(1, $_POST['status']);
    $bookChef->bindParam(2, $_POST['booking_id']);

    if ($bookChef->execute()) { 
        echo "Booking Status Updated.";
    } else {
        echo "Operation Failed! Try Again.";
    }

?>