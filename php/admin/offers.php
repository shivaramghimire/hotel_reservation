<?php
require 'header.php';
$organizationID = $_SESSION['orgID'];
?>

<?php
if(isset($_POST['save'])){
	$start = $_POST['start'];
    $end = $_POST['end'];
    $details = $_POST['details'];

    $mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);

    $insert = $mysqli->query("INSERT INTO offers(organizationID, start, end, details) VALUES('$organizationID', '$start', '$end', '$details')");
}
?>

<img src="../../images/reservation.jpg" width="100%"/>
<center>
    <form method="post" action="offers.php">
        <br/>
        <h2>ADD OFFERS</h2>
        <table width="50%">
            <tr>
                <td><label>Start Date</label><br/><br/></td>
                <td><input name="start" type="date" required/><br/><br/></td>
            </tr>
			
			<tr>
                <td><label>End Date</label><br/><br/></td>
                <td><input name="end" type="date" required/><br/><br/></td>
            </tr>
            
			<tr>
                <td><label>Details</label><br/><br/></td>
                <td><input name="details" type="text" required/><br/><br/></td>
            </tr>

            <tr>
                <td><input type="submit" id="submit" name="save" value="Submit"/></td>
            </tr>
        </table>

    </form>
</center>