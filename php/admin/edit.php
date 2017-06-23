<?php
require 'header.php';
$organizationID = $_SESSION['orgID'];
?>

<?php
$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);

if (isset($_POST['save'])) {
    $loginID = $_SESSION['login'];
    $status = $_SESSION['stat'];
    $previous_roomNo = $_SESSION['previous_roomNo'];
    $previous_roomID = $_SESSION['previous_roomID'];

    $roomNo = $_POST['roomNo'];
    $floorNo = $_POST['floorNo'];
    $checkout = $_POST['checkout'];
    $checkin = $_POST['checkin'];
    $roomID = $_POST['roomID'];

    $update = $mysqli->query("UPDATE room_details SET roomNo='$roomNo', floorNo='$floorNo', checkin='$checkin', checkout='$checkout', roomID='$roomID' WHERE roomNo='$previous_roomNo' AND roomID='$previous_roomID' AND organizationID='$organizationID'") or die($mysqli->error);

    if($roomID != $previous_roomID){
        $query1 = $mysqli->query("SELECT * FROM room WHERE roomID = '$previous_roomID' AND organizationID='$organizationID' LIMIT 1") or die($mysqli->error);
        while($row = $query1->fetch_array(MYSQLI_ASSOC)){
            $available = $row['available'];
            $reserved = $row['reserved'];
            $available--;
            if($status==1) {
                $reserved--;
            }
        }
        $update = $mysqli->query("UPDATE room SET available='$available', reserved='$reserved' WHERE roomID='$previous_roomID' AND organizationID='$organizationID") or die($mysqli->error);

    }

    $select = $mysqli->query("SELECT * FROM room WHERE roomID = '$roomID' AND organizationID='$organizationID' LIMIT 1") or die($mysqli->error);
    while ($xyz = $select->fetch_array(MYSQLI_ASSOC)) {
        $available = $xyz['available'];
        $reserved = $xyz['reserved'];
        $available++;
        if($status==1){
            $reserved++;
        }
    }
    $update = $mysqli->query("UPDATE room SET available='$available', reserved='$reserved' WHERE roomID='roomID' AND organizationID='$organizationID'") or die($mysqli->error);

    unset($_SESSION['login']);
    unset($_SESSION['stat']);
    unset($_SESSION['previous_roomNo']);
    unset($_SESSION['previous_roomID']);
    header('location: admin_room.php');
}
?>

<img src="../../images/reservation.jpg" width="100%" />
<?php
if (isset($_GET['id'])) {
    $roomNo = $_GET['roomNo'];
    $floorNo = $_GET['floorNo'];
    $checkout = $_GET['checkout'];
    $checkin = $_GET['checkin'];
    $status = $_GET['status'];
    $roomID = $_GET['roomID'];
    $loginID = $_GET['loginID'];
    $_SESSION['login'] = $loginID;
    $_SESSION['previous_roomID'] = $roomID;
    $_SESSION['stat'] = $status;
    $_SESSION['previous_roomNo'] = $roomNo;
}
?>
<center>
    <form method="post" action="edit.php">
        <br/>
        <h2>EDIT</h2>
        <table width="50%">
            <tr>
                <td><label>Room No</label><br/><br/></td>
                <td><input name="roomNo" type="number" value="<?= $roomNo ?>" required/><br/><br/></td>
            </tr>
            <tr>
                <td><label>Floor No</label><br/><br/></td>
                <td><input name="floorNo" type="number" value="<?= $floorNo ?>" required/><br/><br>
            </tr>
            <tr>
                <td> <label>Checkin</label><br/><br/></td>
                <td><input name="checkin" type="date" value="<?= $checkin ?>"  required/><br/><br/></td>
            </tr>
            <tr>
                <td> <label>Checkout</label><br/><br/></td>
                <td> <input name="checkout" type="date" value="<?= $checkout ?>" required/><br/><br/></td>
            </tr>
            <tr>
                <td><label>Status</label><br/><br/></td>
                <td><input name="status" type="number" min="0" max="1" disabled="disabled" value="<?= $status ?>" required/><br/><br/></td>
            </tr>

            <tr>
                <td><label>Room ID</label></td>
                <td><input name="roomID" type="number" value="<?= $roomID ?>"  required/><br/><br/></td>
            </tr>
            <tr>
                <td> <label>Login ID</label><br/><br/></td>
                <td> <input name="loginID" type="number" disabled="disabled" value="<?= $loginID ?>"  required/><br/><br/></td>
            </tr>

            <tr>
                <td><input type="submit" id="submit" name="save" value="Save"/></td>
            </tr>
        </table>

    </form>
</center>