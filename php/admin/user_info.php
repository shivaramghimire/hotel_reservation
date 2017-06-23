<?php
require 'header.php';
$organizationID = $_SESSION['orgID'];
?>
<img src="../../images/reservation.jpg" width="100%">
<?php 
$display = "";
$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);
$select = $mysqli->query("SELECT * FROM user_info ") or die($mysqli->error);
while($rows = $select->fetch_array(MYSQLI_ASSOC)) {
    $firstName = $rows['firstName'];
    $lastName = $rows['lastName'];
    $email = $rows['email'];
    $phone = $rows['phone'];
    $address = $rows['address'];
    $loginID = $rows['loginID'];
    $card_holder = $rows['card_holder'];
    $credit_card_number = $rows['credit_card_number'];

    $display .= "<center>
				<table width='100%'>
					<tr>
						<td width='3%'>$loginID</td>
						<td width='8%'>$firstName</td>
						<td width='8%'>$lastName</td>
						<td width='13%'>$email</td>
						<td width='7%'>$phone</td>
						<td width='9%'>$address</td>
						<td width='9%'>$card_holder</td>
						<td width='9%'>$credit_card_number</td>
					";

	$book = $mysqli->query("SELECT * FROM room_details WHERE loginID = '$loginID' AND organizationID='$organizationID' ORDER BY checkout ASC") or die($mysqli->error);
	$count = $book->num_rows;
	if($count){
		while($abc = $book->fetch_array(MYSQLI_ASSOC)){
			$roomNo = $abc['roomNo'];
			$roomID = $abc['roomID'];
			$checkin = $abc['checkin'];
			$checkout = $abc['checkout'];
			
			$display .= "
				<td width='5%'>$roomNo</td>
				<td width='5%'>$roomID</td>
				<td width='8%'>$checkin</td>
				<td width='8%'>$checkout</td>
				</tr></table>
			";
		}
	}else{
		$display .= "
				<td width='5%'>0</td>
				<td width='5%'>0</td>
				<td width='8%'>0</td>
				<td width='8%'>0</td>
				</tr></table></center><hr>
			";	
	}
}
?>
<center>
<hr />
<table width="100%">
	<tr>
		<td width='3%'>SN.</td>
		<td width='8%'>First Name</td>
		<td width='8%'>Last Name</td>
		<td width='13%'>Email</td>
		<td width='7%'>Phone</td>
		<td width='9%'>Address</td>
		<td width='9%'>Card Holder</td>
		<td width='9%'>Credit Card</td>
		<td width='5%'>Room No</td>
		<td width='5%'>Room ID</td>
		<td width='8%'>Checkin</td>
		<td width='8%'>Checkout</td>
	</tr>
</table>
<hr />

<?= $display?>
</center>