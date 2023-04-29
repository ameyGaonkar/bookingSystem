<?php
    require("dbConnect.php");

    $login = $con->prepare("SELECT firstName, email, user_type FROM user WHERE email=? AND password=?");
    $login->bindParam(1,$_POST['email']);
    $login->bindParam(2,$_POST['password']);
    $login->execute();

    var_dump($login);

    // if ($insert->execute()) { 
    //     session_start();
    //     $_SESSION['firstName'] = $_POST['firstName'];
    //     $_SESSION['email'] = $_POST['email'];
    //     $_SESSION['userType'] = $_POST['userType'];
    //     header('Location: ../chefDashboard.php');
    // } else {
    //     header('Location: ../index.html');
    // }
?>