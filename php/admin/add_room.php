<?php
require 'header.php';
$organizationID = $_SESSION['orgID'];
$display = "";
?>

<?php
$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);

//Gets the room description
$query = $mysqli->query("SELECT * FROM room WHERE organizationID='$organizationID'");
if($query->num_rows) {
    while ($row = $query->fetch_array(MYSQLI_ASSOC)) {
        $roomID = $row['roomID'];
        $typeOfRoom = $row['typeOfRoom'];
        $description = $row['description'];
        $rate = $row['rate'];
        $available = $row['available'];
        $reserved = $row['reserved'];
        $display .= "<center><table width='75%'>
            <tr>
                <td width='10%'>$roomID</td>
                <td width='16%'>$typeOfRoom</td>
                <td width='42%'>$description</td>
                <td width='10%'>$rate</td>
                <td width='11%'>$available</td>
                <td width='11%'>$reserved</td>
            </tr>
        </table></center>";
    }
}else{
    $display .= "No Room Description Yet";
}
?>


<?php
if (isset($_POST['submit'])) {

    $roomNo = $_POST['roomNo'];
    $floorNo = $_POST['floorNo'];
    $status = 0;
    $roomID = $_POST['roomID'];
    $loginID = 0;

    $check = $mysqli->query("SELECT * FROM room WHERE organizationID='$organizationID' AND roomID='$roomID'");
    if(($check->num_rows)==0){
        echo "<script> alert('No such room found under given roomID. Try adding room description first'); </script>";
        exit;
    }


//Inserts room and updates the database
    $insert = $mysqli->query("INSERT INTO room_details(organizationID, roomNo, floorNo, checkin, checkout, status, roomID, loginID) VALUES('$organizationID', '$roomNo', '$floorNo', now(), now(), '$status', '$roomID', '$loginID')") or die($mysqli->error);
    $select = $mysqli->query("SELECT available FROM room WHERE roomID = '$roomID' AND organizationID='$organizationID' LIMIT 1") or die($mysqli->error);

    while ($rows = $select->fetch_array(MYSQLI_ASSOC)) {
        $available = $rows['available'];
    }
    $available++;
    $update = $mysqli->query("UPDATE room SET available = '$available' WHERE roomID = '$roomID' AND organizationID='$organizationID'") or die($mysqli->error);
   header('location: add_room.php');
}
?>

<img src="../../images/reservation.jpg" width="100%"/>
<hr>
<center><table width='75%'>
        <tr>
            <td width='10%'>RoomID</td>
            <td width='16%'>Type Of Room</td>
            <td width='42%'>Description</td>
            <td width='10%'>Rate</td>
            <td width='11%'>Available</td>
            <td width='11%'>Reserved</td>
        </tr>
    </table></center>
<hr>
<?=$display;?>
<br><br><br>
<a href="room_details.php">Add Room Details</a>
<center>
    <br><br><br>
    <form method="post" action="add_room.php">
        <br/>
        <h2>ADD ROOMS</h2>
        <table width="50%">
            <tr>
                <td><label>Room No</label><br/><br/></td>
                <td><input name="roomNo" type="number" required/><br/><br/></td>
            </tr>
            <tr>
                <td><label>Floor No</label><br/><br/></td>
                <td><input name="floorNo" type="number" required/><br/><br>
            </tr>

            <tr>
                <td><label>Room ID</label></td>
                <td><input name="roomID" type="number" required/><br/><br/></td>
            </tr>

            <tr>
                <td><input type="submit" id="submit" name="submit" value="Submit"/></td>
            </tr>
        </table>

    </form>
</center>