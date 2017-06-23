<?php
require 'header.php';
?>

<img src="../images/reservation.jpg" width="100%">
<?php
$display = "";
$i = 1;
$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);

$select = $mysqli->query("SELECT * FROM room") or die($mysqli->error);
while ($rows = $select->fetch_array(MYSQL_ASSOC)) {
    $organizationID = $rows['organizationID'];
    $roomID = $rows['roomID'];
    $typeOfRoom = $rows['typeOfRoom'];
    $rate = $rows['rate'];
    $description = $rows['description'];
    $available = $rows['available'];
    if ($available > 0) {
        $desc = "BOOK NOW";
    } else {
        $desc = "FULL";
    }
    $display .= "<center>
                    <table width = '50%'>
                        <tr>
                            <td width='20%'>
								<img src='../images/pic$i.jpg' width='300px'/>
							</td>
                            <td width = '40%'>
                               <h3> $i &nbsp;&nbsp;&nbsp; $typeOfRoom</h3>
                                Rate : $rate <br/><br/>
                                Description: $description <br/><br/>
                                Available : $available  <br/><br/>
								
                                <a href='user_room.php'>$desc</a><br/><br/>
                            </td>
							<br/>
                        </tr>
                    </table>
                </center>";
    $i++;
}
?>
<br/><br/>
<?= $display; ?>

