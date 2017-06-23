<?php
require 'header.php';

$display= "";
?>

<?php
$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);
$select = $mysqli->query("SELECT * FROM services");
while($rows = $select->fetch_array(MYSQL_ASSOC)){
    $serviceID = $rows['serviceID'];
    $serviceName = implode(" ", explode("_", strtoupper($rows['service_name'])));
    $rate = $rows['service_rate'];

    $display .= "<center>
    <table width='50%'>
        <tr>
            <td width='5%'>$serviceID</td>
            <td width='20%'>$serviceName</td>
            <td width='10%'>$rate</td>
            <td width='20%'><a href='services.php?id=$serviceID'>I require </a>&nbsp;&nbsp; | &nbsp;&nbsp; <a href='services.php?did=$serviceID'>I don't require </a></td>
        </tr>
    </table></center>
    ";
}
?>

<?php
    if(isset($_GET['id'])){
        if(!isset($_SESSION['email'])){
            header('location: user_login.php');
        }
        if(isset($_SESSION['loginID'])){
            $loginID = $_SESSION['loginID'];

            $id = $mysqli->real_escape_string($_GET['id']);
            $select = $mysqli->query("SELECT service_name from services where serviceID=$id limit 1");
            while($row = $select->fetch_array(MYSQLI_ASSOC)){
                $service = $row['service_name'];
            }
            $update = $mysqli->query("UPDATE services_used SET $service=1 WHERE loginID=$loginID");
            header('location:services.php');
        }else{
            header('location:user_login.php');
        }
    }
?>

<?php
if(isset($_GET['did'])){
   if(!isset($_SESSION['email'])){
        header('location: user_login.php');
    }
    if(isset($_SESSION['loginID'])){
        $loginID = $_SESSION['loginID'];

        $did = $mysqli->real_escape_string($_GET['did']);
        $select = $mysqli->query("SELECT service_name from services where serviceID=$did limit 1");
        while($row = $select->fetch_array(MYSQLI_ASSOC)){
            $service = $row['service_name'];
        }
        $update = $mysqli->query("UPDATE services_used SET $service=0 WHERE loginID=$loginID");
        header('location:services.php');
    }else{
        header('location:user_login.php');
    }
}
?>

    <hr>
    <center>
        <table width='50%'>
            <tr>
                <td width='5%'>ID</td>
                <td width='20%'>Service Name</td>
                <td width='10%'>&nbsp;&nbsp;&nbsp;&nbsp;Rate</td>
                <td width="25%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Choice</td>
            </tr>
        </table></center>
<hr>
<?= $display;?>