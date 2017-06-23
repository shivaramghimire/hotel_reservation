<?php
require 'header.php';
$display = "";
$i=1;
?>
<br><br><br><br><br><br>
<?php
$mysqli = new mysqli("localhost", "root", "", "reservation");
$query = $mysqli->query("SELECT * FROM organization ORDER BY organization_location ASC");
if($query->num_rows){
    while($rows = $query->fetch_array(MYSQLI_ASSOC)){
        $organizationID = $rows['organizationID'];
        $name = strtoupper($rows['organization_name']);
        $organization_name = implode(" ", explode("_", $name));
        $address = $rows['organization_location'];
        $phone = $rows['phone'];

        $display .= "<table width='75%'>
            <tr>
                <td width='10%'>$i</td>
                <td width='30%'><b><a href='hotel_details.php?id=$name&organization_id=$organizationID'>$organization_name</a></b></td>
                <td width='40%'>$address</td>
                <td width='15%'>$phone</td>
            </tr>
        </table>";
        $i++;
    }
}
?>
<hr><center>
    <table width='75%'>
        <tr>
            <td width='10%'>ID</td>
            <td width='30%'>Name</td>
            <td width='40%'>Address</td>
            <td width='15%'>Phone</td>
        </tr>
    </table>
<hr>
    <center>
<?=$display?>