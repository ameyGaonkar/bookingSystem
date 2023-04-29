<?php
    require("dbConnect.php");

    $login = $con->prepare("SELECT firstName, email, user_type FROM user WHERE email=? AND password=?");
    $login->bindParam(1,$_POST['email']);
    $login->bindParam(2,$_POST['password']);
    $login->execute();

    $user = $login->fetch();

    if (!empty($user['firstName'])) { 
        session_start();
        $_SESSION['firstName'] = $user['firstName'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['userType'] = $user['user_type'];
        header('Location: ../chefDashboard.php');
    } else {
        header('Location: ../index.html');
    }
?>