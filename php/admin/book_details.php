<?php
require 'header.php';
$organizationID = $_SESSION['orgID'];
$display = "";
$i = 1;
?>

<?php

?>
<?php
        $mysqli = new mysqli("localhost", "root", "", "reservation");
        $query = $mysqli->query("SELECT * FROM booking_details WHERE organizationID='$organizationID'") or die($mysqli->error);
        $count = $query->num_rows;
        if ($count) {
                while ($rows = $query->fetch_array(MYSQL_ASSOC)) {
                    $email = $rows['email'];
                    $checkin = $rows['checkin'];
                    $checkout = $rows['checkout'];
                    $typeOfRoom = $rows['typeOfRoom'];
                    $roomNo = $rows['roomNo'];
                    $status = $rows['status'];
                    if($status=="canceled"){
                        $st=0;
                    }else{
                        $st=1;
                    }
                    $bookedDate = $rows['bookedDate'];
                    $canceledDate = $rows['canceledDate'];

                    $display .= "<table width='95%'>
                        <tr>
                            <td width='5'>$i</td>
                            <td width='15%'>$email</td>
                            <td width='9%'>$checkin</td>
                            <td width='9%'>$checkout</td>
                            <td width='13%'>$typeOfRoom</td>
                            <td width='10%'>$status</td>
                            <td width='10%'>$bookedDate</td>
                            <td width='10%'>$canceledDate</td>
                            <td width='19%'><a href='book_details.php?delid=$organizationID&roomNo=$roomNo&typeOfRoom=$typeOfRoom&status=$st'>Cancel</a></td></tr>
                    </table>";
                    $i++;
                }
        }else{
            $display .= "No Bookings Yet";
        }
?>

<?php
if(isset($_GET['delid'])){
    $organizationID = $mysqli->real_escape_string($_GET['delid']);
    $roomNo = $mysqli->real_escape_string($_GET['roomNo']);
    $typeOfRoom = $mysqli->real_escape_string($_GET['typeOfRoom']);
    $status = $mysqli->real_escape_string($_GET['status']);

    if($status!=0) {
        $cancel = $mysqli->query("UPDATE room_details SET status = '0', loginID = '0', checkin=now(), checkout=now() WHERE roomNo = '$roomNo' AND organizationID='$organizationID'") or die($mysqli->error);

        $select = $mysqli->query("SELECT * FROM room WHERE typeOfRoom='$typeOfRoom' AND organizationID='$organizationID'");
        while ($row = $select->fetch_array(MYSQLI_ASSOC)) {
            $available = $row['available'];
            $reserved = $row['reserved'];
        }
            $available++;
            $reserved--;

        $update = $mysqli->query("UPDATE room SET available='$available', reserved='$reserved' WHERE typeOfRoom = '$typeOfRoom' AND organizationID='$organizationID'") or die($mysqli->error);
        $query = $mysqli->query("UPDATE booking_details SET status='canceled', canceledDate=now() WHERE roomNo='$roomNo' && organizationID='$organizationID' && typeOfRoom='$typeOfRoom'") or die($mysqli->error);
        header('location: index.php');
    }
}

?>
<hr>
<center>
<table width="95%">
    <tr>
        <td width='5%'>S.N.</td>
        <td width='15%'>Email</td>
        <td width='9%'>Checkin</td>
        <td width='9%'>Checkout</td>
        <td width='13%'>Type Of Room</td>
        <td width='10%'>Status</td>
        <td width='10%'>Booked Date</td>
        <td width='10%'>Canceled Date</td>
        <td width='19%'>Action</td>
    </tr>
</table>
<hr>
<?=$display?>
</center>