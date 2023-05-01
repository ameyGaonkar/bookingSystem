<?php
    session_start();
	if (!isset($_SESSION['email'])){
		header('Location: index.html');
	} 

    require("dbConnect.php");

    $changePass = $con->prepare("UPDATE user SET password=? WHERE user_id=? AND password=?");
    $changePass->bindParam(1, $_POST['password']);
    $changePass->bindParam(2, $_POST['user_id']);
    $changePass->bindParam(3, $_POST['current-password']);
    $changePass->execute();

    if ($changePass->rowCount() > 0) { 
        echo "Password Changed.";
    } else {
        echo "Operation Failed! Try Again.";
    }

?>