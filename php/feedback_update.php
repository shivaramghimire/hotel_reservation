<?php


$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);

//Checks if email and feedback is posted
if (isset($_POST['email'], $_POST['feedback'])) {
    $email = $mysqli->real_escape_string($_POST['email']);
    $feedback = $mysqli->real_escape_string($_POST['feedback']);
    $name = $mysqli->real_escape_string($_POST['selected_hotel']);
    $selected_hotel = implode("_", (explode(' ', strtoupper($name))));
    $select = $mysqli->query("SELECT organizationID from organization where organization_name='$selected_hotel'") or die($mysqli->error);
    while($row = $select->fetch_array(MYSQLI_ASSOC)){
        $organizationID = $row['organizationID'];
    }
   $insert = $mysqli->query("INSERT INTO feedback(email, feedback, sentDate,organizationID) VALUES('$email', '$feedback', now(), '$organizationID')") or die($mysqli->error);
} else {

}