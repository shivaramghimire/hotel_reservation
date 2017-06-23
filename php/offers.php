<?php
	require 'header.php';
?>
<img src="../images/reservation.jpg" width="100%" />
<style>
    h2{
        color: blue;
    }
    p{
        color: red;
    }
</style>
<?php
	$display ="";
	$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);
	$select = $mysqli->query("SELECT * FROM offers ORDER BY end ASC");
	while($rows = $select->fetch_array(MYSQLI_ASSOC)){
        $organizationID = $rows['organizationID'];
		$offerID = $rows['offerID'];
		$start = $rows['start'];
		$end = $rows['end'];
		$details = $rows['details'];
		$current = date("Y-m-d");
		$times1 = explode('-', $end);
		$times2 = explode('-', $current);
		$remaining = $times1[2] - $times2[2];

        $name = $mysqli->query("SELECT * from organization WHERE organizationID='$organizationID'") or die($mysqli->error);
        while($row = $name->fetch_array(MYSQLI_ASSOC)){
            $organization_name = implode(" ", explode("_", strtoupper($row['organization_name'])));

        }
		if (date("Y-m-d") <= $end){ 
		$display .= "
			<table>
				<tr>
					<td width='40%'><img src='../images/abc.jpeg' width='80%' /></td>
					<td width='60%'>
					<h2>$organization_name</h2>
					<h3>Hurry Up Grab the Offer</h3>
					<h4>
						Deadline: $end<br/><br/>
						$details<br/><br/>
						<p>$remaining days remaining</p><br/>
					</h4>
					</td>
				</tr>
			</table>
		";
		}
	}
?>
<?= $display?>
