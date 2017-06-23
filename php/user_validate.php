<?php

session_start();

class UserValidate {

    public $email;
    public $loginID;
    protected $password;
    protected $result;
    protected $mysqli;

    function __construct() {
        $this->mysqli = mysqli_connect("localhost", "root", "", "reservation") or die($this->mysqli->error);
    }

    //Assigning posted value to variable
    public function setValue() {
        if (isset($_POST['email'], $_POST['password'])) {
            $this->email = $this->mysqli->real_escape_string($_POST['email']);
            $this->password = md5($this->mysqli->real_escape_string($_POST['password']));
        }
    }

    //Check if the email is present in database and password matches
    public function check() {
        $check = $this->mysqli->query("SELECT * FROM user_info WHERE email='$this->email' && password ='$this->password' LIMIT 1") or die($this->mysqli->error);
        $count = $check->num_rows;

        if ($count) {
            while($rows = $check->fetch_array(MYSQLI_ASSOC)){
                $this->loginID = $rows['loginID'];
                $_SESSION['loginID'] = $this->loginID;
            }
            $_SESSION['email'] = $this->email;
            $this->result .= "Successfully Logged In";
        } else {
            $this->result .= "Sign In error!! Please try again";
        }
    }

    public function returnResult() {
        echo $this->result;
    }

}

$object = new UserValidate();
$object->setValue();
$object->check();
$object->returnResult();
