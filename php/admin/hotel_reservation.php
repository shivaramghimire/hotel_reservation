<?php
require 'header.php';
//Checks if user is logged in
if (!isset($_SESSION['userName'])) {
    header('location: admin_login.php');
    exit();
}
?>
<img src="../../images/reservation.jpg" width="100%" />

<form method="post">
    <fieldset id="try">
        <br/>
        <legend>Hotel Booking: </legend>

        <div id="heading">
            <label for="checkin">Check In Date : </label><br/><br/><br/>
            <label for="checkout">Check Out Date : </label><br/><br/><br/>
            <label for="typeOfRoom">Type Of Room : </label><br/><br/><br/>
            <label for="rate">Rate :</label><br/><br/><br/>
            <label for="numberOfRooms">No. of Rooms : </label><br/><br/><br/>
        </div>

        <div id="field">
            <input type="date" id="checkin" name="checkin" required min="<?php echo date('y:m:j'); ?>" title="Invalid check in date"/><p id="cinfeedback"></p><br />
            <input type="date" id="checkout" name="checkout" required min="<?php echo date('y:m:j'); ?>" title="Invaild checkout date"/><p id="coutfeedback"></p><br/>

            <select name="typeOfRoom" id="typeOfRoom" required title="Please select type of room">
                <option name=""></option>
                <option name="standard">Standard</option>
                <option name="Suite">Suite</option>
                <option name="dulex">Dulex</option>
                <option name="super_dulex">Super Dulex</option>
            </select><br/><br/><br />

            <input type="number" id="rate" disabled="disabled" min="800" max="2500"/><br/><br/><br/>
            <input type="number" id="numberOfRooms" name="numberOfRooms" required min="1" max="10" /><br/><br/><br />

        </div>

        <br/>
        <input id="submit" type="submit" value="Submit"/>

    </fieldset>

    <br/>

</form>

<script type="text/javascript" src="../../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../../js/admin_hotel_reservation.js"></script>
</body>
</html>
