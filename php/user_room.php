<?php
$display = "";
$mysqli = new mysqli("localhost", "root", "", "reservation") or die($this->mysqli->error());

//Show all the rooms from all hotels
$select = $mysqli->query("SELECT * FROM room_details") or die($mysqli->error);
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

        //For getting information of each hotel
        $getname = $mysqli->query("SELECT * FROM organization WHERE organizationID='$organizationID' LIMIT 1");
        while($row = $getname->fetch_array(MYSQLI_ASSOC)){
            $address = $row['organization_location'];
            $name = $row['organization_name'];
            $organization_name = implode(" ", explode("_", strtoupper($name)));
        }

        $query = $mysqli->query("SELECT * FROM room WHERE roomID = '$roomID' AND organizationID='$organizationID' LIMIT 1");
        while ($xyz = $query->fetch_array(MYSQL_ASSOC)) {
            $typeOfRoom = $xyz['typeOfRoom'];
        }
            $display .= "<table width='95%'>
                    <tr>
                        <td width='18%'><b><a href='about_us.php?id=$name'>$organization_name</b></td>
                        <td width='17%'><b><a href='about_us.php'>$address</b></td>
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

<?php
require 'header.php';
?>
<br/><br/>
<hr/>
<center>
    <table width="95%">
        <tr><b>
            <td width='18%'>Hotel</td>
            <td width='17%'>Address</td>
            <td width='12%'>Room No.</td>
            <td width='10%'>Floor No.</td>
            <td width='15%'>Status</td>
            <td width='15%'>Type</td>
            <td width='12%'>Action</td>
       </b> </tr>
    </table>
    <hr/>
<?= $display; ?>
</center>
<hr/>