<?php
session_start();
$i = 1;
$k = 1;
$email = $_SESSION['email'];
$loginID = $_SESSION['loginID'];
$display[] = "";

$mysqli = new mysqli("localhost", "root", "", "reservation") or die($mysqli->error);

$select = $mysqli->query("SELECT * FROM room_details WHERE loginID='$loginID'");
$count = $select->num_rows;

if($count){
    while($rows = $select->fetch_array(MYSQLI_ASSOC)){
        $roomID[$i] = $rows['roomID'];
        $checkin[$i] = $rows['checkin'];
        $checkout[$i] = $rows['checkout'];
        $roomNo[$i] = $rows['roomNo'];
        $i++;
    }

    for($j=1; $j!=$i; $j++) {
        $select1 = $mysqli->query("SELECT * FROM room WHERE roomID='$roomID[$j]' LIMIT 1");
        while($row = $select1->fetch_array(MYSQLI_ASSOC)) {
            $rate[$k] = $row['rate'];
            $typeOfRoom[$k] = $row['typeOfRoom'];
            $k++;
        }
    }
}

for($x=1; $x!=$i; $x++){
    $cinarray[$x] = explode('-', $checkin[$x]);
    $coutarray[$x] = explode('-', $checkout[$x]);
    $daysdiff[$x] = $coutarray[$x][2] - $cinarray[$x][2];
    $monthdiff[$x] = $coutarray[$x][1] - $cinarray[$x][1];
    $yeardiff[$x] = $coutarray[$x][0] - $cinarray[$x][0];

    if($monthdiff[$x]>0){
        $daysdiff[$x] += $monthdiff[$x]*30 ;
    }

    if($yeardiff[$x]>0){
        $daysdiff[$x] += $yeardiff[$x] * 360;
    }

    if($daysdiff[$x]<0){

    }elseif($daysdiff[$x]==0){
        $daysdiff[$x] = 1;
    }
}

for($z=1; $z<$i; $z++){
    $display[] .= "
        <table>
            <tr>
                <td>$roomNo[$z]</td>
                <td>$typeOfRoom[$z]</td>
                <td>$checkin[$z]</td>
                <td>$checkout[$z]</td>
                <td>$rate[$z]</td>
                <td>$daysdiff[$z]</td>
                <td>" . $rate[$z]*$daysdiff[$z] . "</td>
            </tr>
        </table>
    ";
}
?>

<?php
for($a=1; $a!=$i; $a++){
    echo $display[$a];
}