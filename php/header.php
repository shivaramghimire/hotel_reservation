<?php
session_start();
$id[1] = "";
$id[2] = "";
$id[3] = "";
if(isset($_GET['id'])){
    $pid = explode("_", strtoupper($_GET['id']));
    $id[0] = $pid[0];
    if(isset($pid[1])){
        $id[1] = $pid[1];
    }
    if(isset($pid[2])){
        $id[2] = $pid[2];
    }
    if(isset($pid[3])){
        $id[3] = $pid[3];
    }
    $id[1] = $id[1] . " " . $id[2] . " " . $id[3];
}else{
    $id[0] = "Hotel";
    $id[1] = "Booking System";
}
?>

<?php
	//For Offers
	$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);
	$select = $mysqli->query("SELECT * FROM offers ORDER BY end ASC");
    $count = $select->num_rows;
    if($count) {
        $_SESSION['offer'] = "true";
        while ($rows = $select->fetch_array(MYSQLI_ASSOC)) {
            $end = $rows['end'];
            $current = date("Y-m-d");
            $times1 = explode('-', $end);
            $times2 = explode('-', $current);
            $remaining = $times1[2] - $times2[2];
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> <?=$id[0] ." ". $id[1]?> </title>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="../css/style.css"/>
        <link rel="stylesheet" href="../css/abcd.css"
              <link rel="stylesheet" href="../css/admin.css"/>
    </head>

    <body>

        <div class="container">	 			
            <div class="logo">
                <h1><a href="index.php"><?=$id[0]?><span><?= $id[1]?></span></a></h1>
            </div>				
            <div class="navigation">	
                <div>
                    <ul class="nav">
                        <?php
                        if (isset($_SESSION['email'])) {
                            echo "<li><a href='profile.php'>Profile</a></li>";
                        }
                        ?>
                       <!-- <li><a href="user_room.php">Rooms</a></li>

                        <li><a href="room_details.php">Room Details</a></li>-->

                        <li><a href="hotels.php">Hotels</a> </li>

                        <li><a href="famous_destination.php">Famous Destinations</a> </li>

                        <?php
                        if(isset($_SESSION['offer'])) {
                            if (date("Y-m-d") <= $end) {
                                echo "<li><a href='offers.php'>Offers</a></li>";
                            }
                        }
                        ?>

                       <!-- <li><a href="services.php">Services</a></li>-->
							
                        <li><a href="feedback.php">Feedback</a></li> 
                        <li><a href="about_us.php">About Us</a></li>
                        <?php
                        if (!isset($_SESSION['email'])) {
                            echo " <li><a href='user_login.php'>Login</a></li> ";
                            echo "<li><a href='./admin/admin_login.php'>Admin</a><li>";
                        }
                        ?>
<?php
if (isset($_SESSION['email'])) {
    echo "<li> <a href='logout.php'>Logout</a> </li> ";
}
?>
                    </ul>
                </div>			
            </div>	
        </div>