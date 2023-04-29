<?php
    require("dbConnect.php");

    $login = $con->prepare("SELECT user_id, firstName, email, user_type FROM user WHERE email=? AND password=?");
    $login->bindParam(1,$_POST['email']);
    $login->bindParam(2,$_POST['password']);
    $login->execute();

    $user = $login->fetch();

    if (!empty($user['firstName'])) { 
        session_start();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['userType'] = $user['user_type'];
        if($_SESSION['userType'] == 'chef'){
            header('Location: ../chefDashboard.php');
        } else {
            header('Location: ../booking.php');
        }
    } else {
        header('Location: ../index.html');
    }
?>