<?php


$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);

//Checks if email and feedback is posted
  /*  $email = $mysqli->real_escape_string($_POST['email']);
    $feedback = $mysqli->real_escape_string($_POST['feedback']);
    $selected_hotel = $mysqli->real_escape_string($_POST['selected_hotel']);*/
    $selected_hotel = "hotel_lark";
    $select = $mysqli->query("SELECT organizationID from organization where organization_name='$selected_hotel'") or die($mysqli->error);

    while($row = $select->fetch_array(MYSQLI_ASSOC)){
        print_r($row);
        $organizationID = $row['organizationID'];
    }
   // $insert = $mysqli->query("INSERT INTO feedback(email, feedback, sentDate,organizationID) VALUES('$email', '$feedback', now(), '$organizationID')") or die($mysqli->error);
