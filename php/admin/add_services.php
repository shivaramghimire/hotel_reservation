<?php
require 'header.php';
?>

<?php
if(isset($_POST['save'])){
    $service_name = implode("_", explode(" ", strtolower($_POST['service_name'])));
    $service_rate = $_POST['service_rate'];

    $mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);

    $insert = $mysqli->query("INSERT INTO services(service_name, service_rate) VALUES('$service_name', '$service_rate')");
    $alter = $mysqli->query("AlTER TABLE services_used ADD " . "$service_name boolean default 0") or die($mysqli->error);
}
?>

<img src="../../images/reservation.jpg" width="100%"/>
<center>
    <form method="post" action="add_services.php">
        <br/>
        <h2>ADD SERVICES</h2>
        <table width="50%">
            <tr>
                <td><label>Service Name</label><br/><br/></td>
                <td><input name="service_name" type="text" required/><br/><br/></td>
            </tr>

            <tr>
                <td><label>Service Rate</label><br/><br/></td>
                <td><input name="service_rate" type="number" min="0" max="1000" required/><br/><br/></td>
            </tr>


            <tr>
                <td><input type="submit" id="submit" name="save" value="Submit"/></td>
            </tr>
        </table>

    </form>
</center>