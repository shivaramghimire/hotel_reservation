<?php
session_start();
if (!isset($_SESSION['userName'])) {
    header('location: admin_login.php');
}
    $userName = $_SESSION['userName'];

$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);
$select = $mysqli->query("SELECT organizationID FROM admin_info WHERE userName='$userName'") or die($mysqli->error);
?>

<!DOCTYPE html>
<html>
<head>
    <title> HOTEL LARK </title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="stylesheet" href="../../css/abcd.css"
    <link rel="stylesheet" href="../../css/admin.css"/>
</head>

<body>

<div class="container">
    <div class="logo">
        <h1><a href="index.php">HOTEL<span>LARK</span></a></h1>
    </div>
    <div class="navigation">
        <div>
            <ul class="nav">
                <li><a href="user_info.php">User Info</a></li>
                <li><a href="admin_room.php">Rooms</a></li>
                <li><a href="add_room.php">Add Room</a></li>
                <li><a href="add_services.php">Add Services</a></li>
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