<?php
require 'header.php';
?>

<?php
$organizationID = $_GET['organizationID'];
$roomNo = $_GET['roomNo'];
$typeOfRoom = $_GET['typeOfRoom'];

$mysqli = new mysqli("localhost", "root", "", "reservation");
$select = $mysqli->query("SELECT organization_name FROM organization WHERE organizationID=$organizationID");
while($rows = $select->fetch_array(MYSQLI_ASSOC)){
    $organization_name = implode(" ", explode("_", strtoupper($rows['organization_name'])));
}
//Checks if user is logged in
if (!isset($_SESSION['email'])) {
    header('location: user_login.php');
    exit();
}
?>

<?php
    $query = $mysqli->query("SELECT * FROM room WHERE typeOfRoom='$typeOfRoom' AND organizationID='$organizationID' LIMIT 1");
    while($row=$query->fetch_array(MYSQLI_ASSOC)){
        $rate = $row['rate'];
    }
?>

<img src="../images/reservation.jpg" width="100%"/>

<form method="post">
    <fieldset id="try">
        <br/>
        <legend>Hotel Booking: </legend>

        <div id="heading">
            <label for="hotel">Hotel :</label><br/><br/>
            <label for="roomNo">Room No : </label><br/><br/><br/>
            <label for="checkin">Check In Date : </label><br/><br/><br/>
            <label for="checkout">Check Out Date : </label><br/><br/><br/>
            <label for="typeOfRoom">Type Of Room : </label><br/><br/><br/>
            <label for="rate">Rate :</label><br/><br/><br/>
        </div>


        <div id="field">
            <input type="name" id="hotel" name="hotel" disabled="disabled" value="<?= $organization_name ?>"/><br/><br/>
            <input type="number" id="roomNo" name="roomNo" disabled="disabled" value="<?= $roomNo ?>"/><br/><br/>
            <input type="date" id="checkin" name="checkin" required title="Invalid check in date"/><p id="cinfeedback"></p><br/>
            <input type="date" id="checkout" name="checkout" required title="Invaild checkout date"/><p id="coutfeedback"></p><br />

            <input type="text" id="typeOfRoom" name="typeOfRoom" required value="<?= $typeOfRoom ?>" disabled="disabled" />
            <br/><br/>

            <input type="number" id="rate" disabled="disabled" value="<?= $rate ?>" min="500" max="10000"/><br/><br/>
            <br/><br/>
        </div>

        <br/>
        <input id="submit" type="submit" value="Submit"/>

    </fieldset>

    <br/>

</form>

<?php
require 'footer.php';
?>
<script type="text/javascript" src="../js/reservation_hotel.js"></script>
</body>
</html>
