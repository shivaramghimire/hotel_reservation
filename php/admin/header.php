<?php
session_start();
$pid[2] = "";
$pid[3] = "";
//Checks if logged in
if (!isset($_SESSION['userName'])) {
    header('location: admin_login.php');
}
    $userName = $_SESSION['userName'];

$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);
$select = $mysqli->query("SELECT organizationID FROM admin_info WHERE userName='$userName'") or die($mysqli->error);
while($rows = $select->fetch_array(MYSQLI_ASSOC)){
    $organizationID = $rows['organizationID'];
}

$select1 = $mysqli->query("SELECT * FROM organization WHERE organizationID='$organizationID'") or die($mysqli->error);
while($row = $select1->fetch_array(MYSQLI_ASSOC)) {
    $organization_name = explode('_', strtoupper($row['organization_name']));

    $pid[0] = $organization_name[0];
    //$pid[1] = $organization_name[1];
    if (isset($organization_name[1])) {
        $pid[1] = $organization_name[1];
    }
    else { 
            $pid[1] ="";
    }
    if (isset($organization_name[2])) {
        $pid[2] = $organization_name[2];
    }
    if (isset($organization_name[3])) {
        $pid[3] = $organization_name[3];
    }
    $pid[1] = $pid[1] . " " . $pid[2] . " " . $pid[3];
    $organization_location = $row['organization_location'];
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?= $pid[0] . " " . $pid[1]?> </title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../../css/style.css"/>
        <link rel="stylesheet" href="../../css/abcd.css"
              <link rel="stylesheet" href="../../css/admin.css"/>
    </head>

    <body>

        <div class="container">	 			
            <div class="logo">
                <h1><a href="index.php"><?=$organization_name[0]?><span><?=$pid[1]?></span></a></h1>
            </div>				
            <div class="navigation">	
                <div>
                    <ul class="nav">
                        <li><a href="user_info.php">User Info</a></li>	
                        <li><a href="admin_room.php">Rooms</a></li> 
                        <li><a href="book_details.php">Reservation Details</a></li>
                        <li><a href="add_room.php">Add Room</a></li>
                       <!-- <li><a href="add_services.php">Add Services</a></li>-->
                        <li><a href="offers.php">Offers</a></li>
                        <li><a href="feedback.php">Feedback</a></li> 	 
                        <?php
                        if (isset($_SESSION['userName'])) {
                            echo "<li> <a href='../logout.php'>Logout</a> </li> ";
                        }
                        ?>
                    </ul>
                </div>			
            </div>	
        </div>