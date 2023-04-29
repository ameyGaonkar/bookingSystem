<?php
    require("dbConnect.php");

    $chefs = $con->prepare('SELECT user_id,firstName,email FROM user WHERE NOT EXISTS (SELECT * FROM booking WHERE user.user_id = booking.chef_id AND date=? AND time_slot=?) AND user_type="chef"');
    $chefs->bindParam(1, $_POST['date']);
    $chefs->bindParam(2, $_POST['slot']);
    $chefs->execute();
    
    echo json_encode($chefs->fetchAll(PDO::FETCH_ASSOC));
    
    // SELECT user_id,firstName FROM user WHERE NOT EXISTS (SELECT * FROM booking WHERE user.user_id = booking.chef_id AND time_slot="11:00-12:00") AND user_type="chef";
?>