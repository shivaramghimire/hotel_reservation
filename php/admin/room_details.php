<?php
require 'header.php';
$organizationID = $_SESSION['orgID'];
?>

<?php
    $mysqli = new mysqli("localhost", "root", "", "reservation");
?>

<?php
    if(isset($_POST['submit'])){
        $roomID = $mysqli->real_escape_string($_POST['roomID']);
        $typeOfRoom = $mysqli->real_escape_string($_POST['typeOfRoom']);
        $rate = $mysqli->real_escape_string($_POST['rate']);
        $description = $mysqli->real_escape_string($_POST['description']);

        $check = $mysqli->query("SELECT * FROM room WHERE roomID='$roomID' AND organizationID='$organizationID'");
        if($check->num_rows){
            echo "<script>alert('RoomID already in use');</script>";
        }else{
            $insert = $mysqli->query("INSERT INTO room(organizationID, roomID, typeOfRoom, rate, description, available, reserved) VALUES('$organizationID', '$roomID', '$typeOfRoom', '$rate', '$description', 0, 0)");
            header('location: add_room.php');
        }
    }
?>


<br><br><br><br><br><br><br><br><br><br><br>
<form method="post" action="room_details.php">
    <table>
        <tr>
            <td width="40%">Room ID </td>
            <td><input type="number" name="roomID" min="1" max="10" placeholder="Room ID" title="Please Enter Between 1 & 10" required autofocus/></td>
        </tr>

        <tr>
            <td>Type Of Room </td>
            <td><input type="text" name="typeOfRoom" placeholder="Room Type" title="Please enter type of room" required/></td>
        </tr>

        <tr>
            <td>Rate </td>
            <td><input type="number" name="rate" min="1" max="10000" placeholder="Room Price" title="Please Enter Between 1 & 10000" required/></td>
        </tr>

        <tr>
            <td>Description </td>
            <td><textarea name="description" name="description" required cols="60" rows="10" placeholder="Description of the room"></textarea> </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" id="submit" name="submit" value="Save"></td>
        </tr>
    </table>
</form>