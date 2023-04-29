<?php

   require("dbConnect.php");

   $insert = $con->prepare("INSERT into user (firstName,lastName,email,user_type,password) VALUES (?,?,?,?,?)");
   $insert->bindParam(1, $_POST['firstName']);
   $insert->bindParam(2, $_POST['lastName']);
   $insert->bindParam(3, $_POST['email']);
   $insert->bindParam(4, $_POST['userType']);
   $insert->bindParam(5, $_POST['password']);

   if ($insert->execute()) { 
      session_start();
      $_SESSION['firstName'] = $_POST['firstName'];
      $_SESSION['email'] = $_POST['email'];
      $_SESSION['userType'] = $_POST['userType'];
      if($_SESSION['userType'] == 'chef'){
         header('Location: ../chefDashboard.php');
      } else {
         header('Location: ../booking.php');
      }
   } else {
      header('Location: ../sign-up.php');
   }

?>