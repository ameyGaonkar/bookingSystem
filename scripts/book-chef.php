<?php
    session_start();
	if (!isset($_SESSION['email'])){
		header('Location: index.html');
	} 

    require("dbConnect.php");
    $status = "Pending";

    $bookChef = $con->prepare("INSERT INTO booking (chef_id,customer_id,date,time_slot,status) VALUES (?,?,?,?,?)");
    $bookChef->bindParam(1, $_POST['chef_id']);
    $bookChef->bindParam(2, $_SESSION['user_id']);
    $bookChef->bindParam(3, $_POST['date']);
    $bookChef->bindParam(4, $_POST['time_slot']);
    $bookChef->bindParam(5, $status);

    if ($bookChef->execute()) { 
        echo "Booking Successful.";
    } else {
        echo "Booking Failed! Try Again.";
    }

?>