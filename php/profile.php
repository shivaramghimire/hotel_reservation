<?php
require 'header.php';
$email = $_SESSION['email'];
?>
<?php
$i=1;
$heading = "";
$display = "";

$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);

$select = $mysqli->query("SELECT * FROM user_info where email = '$email'");
while ($rows = $select->fetch_array(MYSQLI_ASSOC)) {
    $loginID = $rows['loginID'];
    $card_holder = $rows['card_holder'];
    $credit_card_number = $rows['credit_card_number'];
}

$heading .= "<table width='30%'>
                <tr>
                    <th width='50'>Email :</td>
                    <th width='50'>$email</td>
                </tr>
                 <tr>
                    <th width='50'>Card Holder :</td>
                    <th width='50'>$card_holder</td>
                </tr>
                 <tr>
                    <th width='50'>Card Number :</td>
                    <th width='50'>$credit_card_number</td>
                </tr>
            </table>";

$select1 = $mysqli->query("SELECT * FROM room_details WHERE loginID = '$loginID'") or die($mysqli->error);
$count = $select1->num_rows;
//Get all the hotels user has booked
if($count>0){
    while ($row = $select1->fetch_array(MYSQLI_ASSOC)) {
        $organizationID[$i] = $row['organizationID'];
        $query = $mysqli->query("SELECT * FROM organization WHERE organizationID='$organizationID[$i]'");
        while($xyz = $query->fetch_array(MYSQLI_ASSOC)){
            $organization_name[$i] = implode(" ", explode("_", strtoupper($xyz['organization_name'])));
        }
        $checkin[$i] = $row['checkin'];
        $checkout[$i] = $row['checkout'];
        $roomNo[$i] = $row['roomNo'];
        $roomID[$i] = $row['roomID'];
        $i++;
    }

    for($k=1; $k!=$i; $k++) {
        $select2 = $mysqli->query("SELECT * FROM room where roomID = '$roomID[$k]'");
        while ($rows = $select2->fetch_array(MYSQLI_ASSOC)) {
            $typeOfRoom[$k] = $rows['typeOfRoom'];
            $available[$k] = $rows['available'];
            $reserved[$k] = $rows['reserved'];
        }
    }
}else{
    $_SESSION['error'] = "true";
}

for($j=1; $j!=$i; $j++){
    if (isset($_SESSION['error'])) {
        unset($_SESSION['error']);
    } else {
        $display .= "<center>
            <table width='75%'>
                <th width='5%'>$j</td>
                <th width='22%'>$organization_name[$j]</td>
                <th width='14%'>$checkin[$j]</td>
                <th width='14%'>$checkout[$j]</td>
                <th width='10%'>$roomNo[$j]</td>
                <th width='14%'>$typeOfRoom[$j]</td>
                <th width='21%'><a href='profile.php?organizationID=$organizationID[$j]&checkin=$checkin[$j]&checkout=$checkout[$j]&typeOfRoom=$typeOfRoom[$j]&available=$available[$j]&reserved=$reserved[$j]&roomNo=$roomNo[$j]'>Cancel Reservation</a></td>
            </table></center>
        ";

    }
}
?>

<?php
//Cancel reservation
if(isset($_GET['roomNo'], $_GET['typeOfRoom'], $_GET['available'], $_GET['reserved'],$_GET['checkin'], $_GET['checkout'])){
    $organizationID = $mysqli->real_escape_string($_GET['organizationID']);
    $roomNo = $mysqli->real_escape_string($_GET['roomNo']);
    $typeOfRoom = $mysqli->real_escape_string($_GET['typeOfRoom']);
    $available = $mysqli->real_escape_string($_GET['available']);
    $reserved = $mysqli->real_escape_string($_GET['reserved']);
    $checkin = $mysqli->real_escape_string($_GET['checkin']);
    $checkout = $mysqli->real_escape_string($_GET['checkout']);

    $cancel = $mysqli->query("UPDATE room_details SET status = '0', loginID = '0', checkin=now(), checkout=now() WHERE roomNo = '$roomNo' AND organizationID='$organizationID'") or die($mysqli->error);
    $available++;
    $reserved--;
    $update = $mysqli->query("UPDATE room SET available='$available', reserved='$reserved' WHERE typeOfRoom = '$typeOfRoom' AND organizationID='$organizationID'")or die($mysqli->error);
    $query = $mysqli->query("UPDATE booking_details SET status='canceled', canceledDate=now() WHERE email='$email' && checkin='$checkin' && organizationID='$organizationID' && checkout='$checkout' && typeOfRoom='$typeOfRoom'")or die($mysqli->error);
    header('location: index.php');
}

?>

<br><br><br><br><br><br>
    <h2>Your Profile</h2>
    <?= $heading;?>
    <br><br><br><br><br><br>

<?php
if($count >0) {
   echo "<center ><hr>
        <table width = '75%' >
            <th width = '5%' > SN</td >
            <th width = '22%' > Hotel</td >
            <th width = '14%' > Checkin</td >
            <th width = '14%' > Checkout</td >
            <th width = '10%' > Room No </td >
            <th width = '14%' > Type Of Room </td >
            <th width = '21%' > Action</td >
        </table >
    </center >
<hr >";
}?>

<?= $display; ?>