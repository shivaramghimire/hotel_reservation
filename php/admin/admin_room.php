<?php
require 'header.php';
$organizationID=$_SESSION['orgID'];
?>
<img src="../../images/2.jpg" width="100%" />
<?php
$display = "";
$mysqli = new mysqli("localhost", "root", "", "reservation") or die($this->mysqli->error());

$select = $mysqli->query("SELECT * FROM room_details WHERE organizationID=$organizationID") or die($mysqli->error);
$count = $select->num_rows;

if ($count) {
    while ($rows = $select->fetch_array(MYSQL_ASSOC)) {
        $roomNo = $rows['roomNo'];
        $floorNo = $rows['floorNo'];
        $checkout = $rows['checkout'];
        $checkin = $rows['checkin'];
        $status = $rows['status'];
        $roomID = $rows['roomID'];
        $loginID = $rows['loginID'];

        $display .= "<table width='75%'>
                    <tr>
                        <td width='10%'>$roomNo</td>
                        <td width='10%'>$floorNo</td>
                        <td width='15%'>$checkout</td>
                        <td width='15%'>$checkin</td>
                        <td width='10%'>$status</td>
                        <td width='10%'>$roomID</td>
                        <td width='10%'>$loginID</td>
						<td width='20%'><a href='edit.php?id=5&roomNo=$roomNo&floorNo=$floorNo&checkout=$checkout&checkin=$checkin&status=$status&roomID=$roomID&loginID=$loginID'>Edit</a> | <a href='admin_room.php?id=6&roomNo=$roomNo&roomID=$roomID'>Delete</a></td>
                    </tr>
                    </table>";
    }
}
?>
<?php
if (isset($_GET['id'])) {
    $id = $mysqli->real_escape_string($_GET['id']);
    $roomNo = $mysqli->real_escape_string($_GET['roomNo']);
    $roomID = $mysqli->real_escape_string($_GET['roomID']);
    if ($id == 5) {
        //EDIT
    } else if ($id == 6) {
        //DELETE

        $delete = $mysqli->query("DELETE FROM room_details WHERE roomNo='$roomNo' AND organizationID='$organizationID'") or die($mysqli->error);
        $select = $mysqli->query("SELECT available FROM room WHERE roomID = $roomID AND organizationID='$organizationID'") or die($mysqli->error);
        while ($rows = $select->fetch_array(MYSQLI_ASSOC)) {
            $available = $rows['available'];
        }
        $available--;
        $update = $mysqli->query("UPDATE room SET available = '$available' WHERE roomID= '$roomID'") or die($mysqli->error);
    } else {
        echo "ERROR";
    }
    	header('location: index.php');
}
?>

<br/><br/>
<center>
    <table width="75%">
        <tr>
            <td width='10%'>Room No.</td>
            <td width='10%'>Floor No.</td>
            <td width='15%'>Check Out</td>
            <td width='15%'>Check In</td>
            <td width='10%'>Status</td>
            <td width="10%">Room ID</td>
            <td width='10%'>Login ID</td>
            <td width="20%"></td>
        </tr>
    </table>
    <hr/>
<?= $display; ?>
</center>
<hr/>