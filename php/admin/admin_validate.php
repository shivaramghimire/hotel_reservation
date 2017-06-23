<?php

//This page is for checking login of admin
session_start();

class AdminValidate {

    protected $userName;
    protected $password;
    protected $result;
    protected $organizationID;
    protected $mysqli;

    function __construct() {
        $this->mysqli = new mysqli("localhost", "root", "", "reservation") or die($this->mysqli->error);
    }

    public function setValue() {
        $this->userName = $this->mysqli->real_escape_string($_POST['userName']);
        $this->password = md5($this->mysqli->real_escape_string($_POST['password']));
    }

    public function check() {

        $check = $this->mysqli->query("SELECT * FROM admin_info WHERE userName = '$this->userName' && password = '$this->password' LIMIT 1") or die($this->mysqli->error);
        $count = $check->num_rows;

        if ($count) {
            while($row = $check->fetch_array(MYSQLI_ASSOC)){
                $this->organizationID = $row['organizationID'];
            }
            $_SESSION['userName'] = $this->userName;
            $_SESSION['orgID'] = $this->organizationID;
            $this->result = "Successfully Logged In";
        } else {
            $this->result = "Sign in failed. Try again";
        }
        echo $this->result;
    }

}

$object = new AdminValidate();
$object->setValue();
$object->check();

