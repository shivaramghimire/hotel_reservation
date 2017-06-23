<?php
require 'header.php';
$organizationID = $_GET['organization_id'];
?>

<img src="../images/reservation.jpg" width="100%">
<?php
//For room types
$display = "";
$display1 = "";
$i = 1;
$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);

$select = $mysqli->query("SELECT * FROM room WHERE organizationID='$organizationID'") or die($mysqli->error);
while ($rows = $select->fetch_array(MYSQL_ASSOC)) {
    $roomID = $rows['roomID'];
    $typeOfRoom = $rows['typeOfRoom'];
    $rate = $rows['rate'];
    $description = $rows['description'];
    $available = $rows['available'];
    $reserved = $rows['reserved'];
   /* if ($available > 0) {
        $desc = "BOOK NOW";
    } else {
        $desc = "FULL";
    }*/
    $display .= "<center>
                    <table width = '50%'>
                        <tr>
                            <td width='20%'>
								<img src='../images/pic$i.jpg' width='300px'/>
							</td>
                            <td width = '40%'>
                               <h3> $i &nbsp;&nbsp;&nbsp; $typeOfRoom</h3>
                                Rate : $rate <br/><br/>
                                Description: $description <br/><br/>
                                Available : $available  <br/><br/>
                                Reserved : $reserved  <br/><br/>

                              <!--  <a href='user_room.php'></a><br/><br/> -->
                            </td>
							<br/>
                        </tr>
                    </table>
                </center>";
    $i++;
}
?>

<?php
//For room_details
$select = $mysqli->query("SELECT * FROM room_details WHERE organizationID='$organizationID'") or die($mysqli->error);
$count = $select->num_rows;
if ($count) {
    while ($rows = $select->fetch_array(MYSQL_ASSOC)) {
        $organizationID = $rows['organizationID'];
        $roomNo = $rows['roomNo'];
        $floorNo = $rows['floorNo'];
        $status = $rows['status'];
        $roomID = $rows['roomID'];
        if ($status == 0) {
            $check = "AVAILABLE";
            $action = "BOOK";
        } else {
            $check = "RESERVED";
            $action = "BOOKED";
        }


        $query = $mysqli->query("SELECT * FROM room WHERE roomID = '$roomID' AND organizationID='$organizationID' LIMIT 1");
        while ($xyz = $query->fetch_array(MYSQL_ASSOC)) {
            $typeOfRoom = $xyz['typeOfRoom'];
        }
        $display1 .= "<table width='95%'>
                    <tr>
                        <td width='12%'>$roomNo</td>
                        <td width='10%'>$floorNo</td>
                        <td width='15%'>$check</td>
                        <td width='15%'>$typeOfRoom</td>
                        <td width='12%'><a href='user_room.php?orgid=$organizationID&status=$status&roomNo=$roomNo&typeOfRoom=$typeOfRoom'> $action</td>
                    </tr>
                    </table>";
    }
}
?>

<?php
if (isset($_GET['status'])) {
    $id = $mysqli->real_escape_string($_GET['status']);
    if ($id == 0) {
        $organizationID = $_GET['orgid'];
        $roomNo = $_GET['roomNo'];
        $typeOfRoom = $_GET['typeOfRoom'];
        header("location: hotel_reservation.php?organizationID=$organizationID&roomNo=$roomNo&typeOfRoom=$typeOfRoom");
    } else {

    }
}
?>


<br/><br/>
<?= $display; ?>
<br/><br/>
<hr/>
<center>
    <table width="95%">
        <tr><b>
                <td width='12%'>Room No.</td>
                <td width='10%'>Floor No.</td>
                <td width='15%'>Status</td>
                <td width='15%'>Type</td>
                <td width='12%'>Action</td>
            </b> </tr>
    </table>
    <hr/>
    <?= $display1; ?>
</center>
<hr/>

