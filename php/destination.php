<style>


    .box{
        width:100%;
        height:500px;
    }
    h1 p{
        color:purple;
        alignment-adjust: center;
        text-align: center;
    }
    h2{
        color:brown;
    }
</style>
<?php require 'header.php' ?>
<br><br><br><br><br><br><br>
<?php
$mysqli = new mysqli("localhost", "root", "", "destination");

if (isset($_GET['destination_id'])) {
    $sid = $_GET['destination_id'];
    $_SESSION['destination_id'] = $sid;
    $info = $mysqli->query("select * from location where sno=$sid");
    ?>
    <?php
    while ($rows = $info->fetch_array(MYSQLI_ASSOC)) {
        $name = $rows['name'];
        $description = $rows['info'];
        $pic_id = $rows['pic'];
    }
    $_SESSION['location'] = $name;
    ?>
    <h1> <p> <?php echo $name; ?></h1> </p><?PHP } ?>
    <div class="box"><img src="../images/<?Php echo $pic_id ?> " width="100%" height="100%"></div>
<h2><?php echo $name ?></h2><p><?php echo $description ?></p><br><br><br>
<h3>Important tips!!
</h3>    
<li>
    <a href="hotel_on_area.php"> Hotels available</a>
</li>

<li>
    <a href="trip_plan.php">Trip Plan</a>
</li>

<li><a href='<?php echo $name ?>_health_tips.php'>Health tips (specially prescribed medicines)</a></li>