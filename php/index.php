<?php

require 'header.php';
?>

<script type="text/javascript">
<!--
	var image1=new Image()
        image1.src="bg1.jpg";
	var image2=new Image();
	image2.src="bg2.jpg";
        var image3=new Image();
	image3.src="bg3.jpg";
	var image4=new Image();
	image4.src="bg4.jpg";
    var image5=new Image();
    image5.src="bg5.jpg";
-->
</script>
						
	<img src="changeimage.jpg" name="slide" width="100%" height="600px" />
	<script type="text/javascript">
	<!--
	//variable that will increment through the images
            var step=1;
            function slideit()
							{
            //if browser does not support the image object, exit.
            if (!document.images)
            return;
		document.images.slide.src=eval("image"+step+".src");
		if (step<5)
		step++;
		else
		step=1;
		//call function "slideit()" every 8.0 seconds
	        setTimeout("slideit()",8000);
							}
                slideit();
							//-->
</script>

<h2>Nepal:</h2><p>One is the best destination site of the world with amazing beauty of nature with the likes of Himalayas,highest peak to the plain of terai is Nepal. Even with the loads of natural beauty due to tha lack of information and the facilities that would be available in the country,Tourists hesitate coming or even have no idea about the plaaces in Nepal. So this website is for the information about the popular places of our country Nepal with the information about them as climates,health precaution and the hotels available.</p>

<?php

class Free {

    protected $mysqli;
    protected $reserved;
    protected $available;

    public function __construct() {
        $this->mysqli = new mysqli("localhost", "root", "", "reservation") or die($this->mysqli->error);
        $hotel_details = $this->mysqli->query("SELECT * FROM room_details WHERE status=1") or die($this->mysqli->error);
        $hotel_count = $hotel_details->num_rows;
        if ($hotel_count>0) {
            while ($rows = $hotel_details->fetch_array(MYSQL_ASSOC)) {
                $organizationID = $rows['organizationID'];
                $checkin = $rows['checkin'];
                $checkout = $rows['checkout'];
                $roomID = $rows['roomID'];
                $roomNo = $rows['roomNo'];
                //echo date("Y-m-d") . "<br>";

                if (date("Y-m-d") > $checkout) {
                  $update1 = $this->mysqli->query("UPDATE room_details SET status=0, loginID=0 WHERE roomNo=$roomNo AND organizationID=$organizationID LIMIT 1") or die($this->mysqli->error);
                    $room = $this->mysqli->query("SELECT * FROM room WHERE roomID=$roomID AND organizationID=$organizationID") or die($this->mysqli->error);
                    while ($row = $room->fetch_array(MYSQL_ASSOC)) {
                        $this->reserved = $row['reserved'];
                        $this->available = $row['available'];
                    }
                    $this->available += 1;
                    $this->reserved -= 1;
                    $update = $this->mysqli->query("UPDATE room SET reserved = '$this->reserved', available = '$this->available' WHERE organizationID=$organizationID AND roomID=$roomID") or die($this->mysqli->error);
                } else {

                }
            }
        }else{

        }
    }

}

$obj = new Free();
?>
