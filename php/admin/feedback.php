<?php
require 'header.php';
$display = "";
$organizationID = $_SESSION['orgID'];
?>
<center><img src="../../images/1.jpg" width="100%" height="300px"/></center>

<?php
$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);
$query = $mysqli->query("SELECT * FROM feedback WHERE organizationID='$organizationID' ORDER BY sentDate DESC") or die($mysqli->error);
$count = $query->num_rows;
if ($count) {
    while ($rows = $query->fetch_array(MYSQLI_ASSOC)) {
        $feedbackID = $rows['feedbackID'];
        $email = $rows['email'];
        $feedback = $rows['feedback'];
        $date = $rows['sentDate'];

        $display .= "
				<table width=95%>
				<tr>
					<td width='5%'>$feedbackID</td>
					<td width='20%'>$email</td>
					<td width='60%'>$feedback</td>
					<center><td width='13%'>$date</td></center>
				</tr>
				</table><br><br>";
    }
} else {
    $display .= "No Feedbacks Yet";
}
?>

<center>

    <table width="95%">
        <tr>
            <?php
            if ($display != "No Feedbacks Yet") {
                echo "<hr><td width='5%'>ID</td>";
                echo "<td width='20%'>Email</td>";
                echo "<td width='60%'>Feedback</td>";
                echo "<center><td width='13%'>Date</td></center>";
            }
            ?>
        </tr>
    </table>
<?= $display; ?>
</center>
