<style>
    p{
        font-size: 30;
    }
</style>
<?php
require 'header.php';
$i=1;
$display ="";
?>
<br><br><br><br><br><br><br>
<?php
$mysqli = new mysqli("localhost","root","","reservation");
$address = $_SESSION['location'];

$query=$mysqli->query("SELECT * from organization where organization_location='$address'");
while($rows = $query->fetch_array(MYSQLI_ASSOC))
{
    $organizationID = $rows['organizationID'];
    $name = strtoupper($rows['organization_name']);
    $organization_name = implode(" ", explode("_", $name));
    $display .= "<table width='75%'>
            <tr>
                <td width='10%'>$i</td>
                <td width='30%'><b><a href='hotel_details.php?id=$name&organization_id=$organizationID'>$organization_name</a></b></td>
            </tr>
        </table>";
    $i++;
}
?>

<?=$display?>