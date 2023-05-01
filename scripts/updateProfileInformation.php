<?php
    session_start();
	if (!isset($_SESSION['email'])){
		header('Location: index.html');
	} 

    require("dbConnect.php");

    $bookChef = $con->prepare("UPDATE user SET firstName=?, lastName=?, email=? WHERE user_id=?");
    $bookChef->bindParam(1, $_POST['firstName']);
    $bookChef->bindParam(2, $_POST['lastName']);
    $bookChef->bindParam(3, $_POST['email']);
    $bookChef->bindParam(4, $_POST['user_id']);

    if ($bookChef->execute()) { 
        echo "Profile Updated.";
    } else {
        echo "Operation Failed! Try Again.";
    }

?>