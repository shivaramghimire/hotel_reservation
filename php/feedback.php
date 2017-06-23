<?php
require 'header.php';
$email = "";

$mysqli = new mysqli("localhost", "root", "", "reservation") or die($this->mysqli->error);
$query_show_hotel = $mysqli->query("SELECT organization_name from organization");

//Checks if user is logged in
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
}
?>     
<img src="../images/reservation.jpg" width="100%"/>
<style type="text/css">


    #left{
        float: left;
    }

    #right{
        float: right;
    }

    .button{
        width: 250px;
        margin-top: 30px;
        height: 50px;
        border-radius: 10px;
        font-size: larger;
        color: orangered;
        background-color: yellow;
    }

    img{
        margin-right: 30px;;
        margin-left: 30px;
    }

    #send{
        float:right;
    }

    h2{
        padding: 0px;
        margin: 0px;	
    }

</style>
<br><br><br><br><br>

<div class="wrapper">

    <div id="left">
        <table width="100%">
            <tr>
            <img src="../images/g2.jpg" width="450px" alt="1.jpg"/>
            </tr>
        </table>
    </div>

    <div id="left">
        <h2>CONTACT FORM</h2>
        <form method="post">
            <br/>

            <br/>
            <input type="email" value="info@nepalitourister.com.np"/><br/><br/>


            <select name="selected_hotel" id='selected_hotel'>

                <?php 
              
                 while ($rows = $query_show_hotel->fetch_array(MYSQLI_ASSOC)) {
                            $name = $rows['organization_name'];
                           $current_hotel_name = implode(" ", (explode('_', strtoupper($name))));
                    ?>
                     <option id="hotel_name" value="<?= $current_hotel_name ?>"><?= $current_hotel_name ?></option>
                    <?php } ?>
                 </select>
<br /><br />
            <input id="emailFrom" type="email" placeholder="Email" value= "<?php echo $email; ?>"/><br/><br/>

            <textarea id="feedback" cols="70" rows="8" placeholder="Message"></textarea><br/>
            <span id="feedback1"></span>
            <br/>
            <input class="button" id="send" type="button" value="&nbsp;&nbsp; Send &nbsp;&nbsp;"/>
        </form>
    </div>
    <br /><br /><br />


</div>
</body>

<br/>

<script type="text/javascript" src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../js/feedback.js"></script>

</body>
</html>