<?php require 'header.php' ?>
<br><br><br><br><br>

<style>
    .pic{
        height:300px;
        width:300px;
        float:left;

    }
</style>

<?php
$mysqli = new mysqli("localhost", "root", "", "destination");
$info = $mysqli->query("select * from location");
?>


<body>
    <?php $i = 1 ?>
    <table>
        <?php 
            while ($rows = $info->fetch_array(MYSQLI_ASSOC)) { ?>

            <tr><td>     
                    <a href='destination.php?destination_id=<?=$rows['sno']?>'><img src="../images/c<?=$i?>.jpg" height="400px" width="800px"><br><?= $rows['name'] ?></a>
                   <?php if($i%2==0){?>
                        </tr><tr>
                   <?php }?>
                        <?php $i++; ?>
                    
 
                </td></tr><?php } ?>
    </table>


</body>