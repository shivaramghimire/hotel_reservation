<?php

session_start();

class ReservationValidation {

    protected $email;
    protected $booked_date;
    protected $checkin;
    protected $checkout;
    protected $typeOfRoom;
    protected $rate;
    protected $roomNo;
    protected $reserved;
    protected $available;
    protected $loginID;
    protected $organization_name;
    protected $organizationID;
    protected $mysqli;
    protected $name;

    function __construct() {
        $this->mysqli = new mysqli("localhost", "root", "", "reservation") or die($this->mysqli->error);
    }

    public function setValue() {
        //Setting Reservation Details
        if (isset($_SESSION['email'])) {
            $this->email = ($_SESSION['email']);
            $select = $this->mysqli->query("SELECT * FROM user_info WHERE email = '$this->email' LIMIT 1") or die($this->mysqli->error);
            while ($rows = $select->fetch_array(MYSQLI_ASSOC)) {
                $this->loginID = $rows['loginID'];
            }
        }

        $this->name = explode(" ", strtolower($_POST['organization_name']));
        $this->organization_name = implode("_", $this->name);

        $select1 = $this->mysqli->query("SELECT organizationID FROM organization WHERE organization_name='$this->organization_name'");
        while($row = $select1->fetch_array(MYSQLI_ASSOC)) {
            $this->organizationID = $row['organizationID'];
        }
        $this->checkin = ($_POST['checkin']);
        $this->checkout = ($_POST['checkout']);
        $this->typeOfRoom = $this->mysqli->real_escape_string($_POST['typeOfRoom']);
        $this->roomNo = $this->mysqli->real_escape_string($_POST['roomNo']);

    }

    public function InsertBookingDetails() {
        $insert = $this->mysqli->query("INSERT INTO booking_details(organizationID, email, roomNo, bookedDate, checkin, checkout, typeOfRoom, status) VALUES ('$this->organizationID', '$this->email', '$this->roomNo', now(), '$this->checkin', '$this->checkout', '$this->typeOfRoom', 'active')") or die($this->mysqli->error);

        $insert = $this->mysqli->query("UPDATE room_details SET checkout = '$this->checkout', checkin = '$this->checkin', status = '1', loginID = '$this->loginID' WHERE roomNo = '$this->roomNo' AND organizationID='$this->organizationID'")or die($this->mysqli->error);

        $this->available = $this->available - 1;
        $this->reserved = $this->reserved + 1;
        $update = $this->mysqli->query("UPDATE room SET reserved = '$this->reserved' , available = '$this->available' WHERE typeOfRoom = '$this->typeOfRoom'") or die($this->mysqli->error);
    }


    public function CheckForRoom() {
        $sql = $this->mysqli->query("SELECT * FROM room where typeOfRoom = '$this->typeOfRoom' AND organizationID='$this->organizationID' LIMIT 1") or die($this->mysqli->error);
        $count = $sql->num_rows;

        if ($count) {
            while ($rows = $sql->fetch_array(MYSQLI_ASSOC)) {
                $this->available = $rows['available'];
                $this->reserved = $rows['reserved'];
            }

            if ($this->available === "0" || $this->available < 0) {
                return 0;
            } else {
                return 1;
            }
        }
    }

}

$object = new ReservationValidation();
$object->setValue();

$check = $object->CheckForRoom();

if ($check === 1) {
    $object->InsertBookingDetails();
    echo "Successfully Reserved.";
} else {
    echo 'Sorry no room available under given room category';
}
?>
