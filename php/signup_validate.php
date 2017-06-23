<?php

session_start();

class Signup {
    protected $loginID;
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $phone;
    protected $address;
    protected $password;
    protected $card_holder;
    protected $credit_card_number;
    protected $mysqli;

    function __construct() {
        $this->mysqli = new mysqli("localhost", "root", "", "reservation") or die($this->mysqli->error);
    }

    //Assigning the posted value
    public function setValue() {
        $this->firstName = $this->mysqli->real_escape_string($_POST['firstName']);
        $this->lastName = $this->mysqli->real_escape_string($_POST['lastName']);
        $this->email = $this->mysqli->real_escape_string($_POST['email']);
        $this->phone = $this->mysqli->real_escape_string($_POST['phone']);
        $this->address = $this->mysqli->real_escape_string($_POST['address']);
        $this->password = md5($this->mysqli->real_escape_string($_POST['password1']));
        $this->card_holder = $this->mysqli->real_escape_string($_POST['card_holder']);
        $this->credit_card_number = $this->mysqli->real_escape_string($_POST['credit_card_number']);
    }

    //Checks if email is already registered
    public function check() {

        $check = $this->mysqli->query("SELECT email FROM user_info WHERE email ='$this->email' LIMIT 1") or die(mysqli_error($this->mysqli));
        $count = $check->num_rows;
        if ($count === 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function insert() {
        $insert = $this->mysqli->query("INSERT INTO user_info(firstName, lastName, email, phone, address, password, card_holder, credit_card_number) VALUES ('$this->firstName', '$this->lastName', '$this->email', '$this->phone', '$this->address', '$this->password', '$this->card_holder', '$this->credit_card_number')") or die($this->mysqli->error);
        $select = $this->mysqli->query("SELECT loginID from user_info WHERE email = '$this->email' LIMIT 1");
        while($rows = $select->fetch_array(MYSQLI_ASSOC)){
            $this->loginID = $rows['loginID'];
            $insert1 = $this->mysqli->query("INSERT INTO services_used(loginID) VALUES ('$this->loginID')");
        }
        $_SESSION['email'] = $this->email;
    }

}

$object = new Signup();

if (isset($_POST['email'], $_POST['password1'], $_POST['phone'])) {
    $object->setValue();
    $result = $object->check();
    if ($result) {
        $object->insert();
        echo "Successfully signed up";
    } else {
        echo 'Email address already in use. Try logging in';
    }
} else {
    echo "ACCESS DENIED";
}
