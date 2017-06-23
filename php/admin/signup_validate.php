<?php
session_start();

$mysqli = new mysqli("localhost", "root", "", "reservation");
if(isset($_POST['userName'], $_POST['password1'])){
    $name = $mysqli->real_escape_string($_POST['organization_name']);
    $address = $mysqli->real_escape_string($_POST['address']);
    $phone = $mysqli->real_escape_string($_POST['phone']);
    $phone1 = $mysqli->real_escape_string($_POST['phone1']);
    $pan_no = $mysqli->real_escape_string($_POST['pan_no']);
    $userName = $mysqli->real_escape_string($_POST['userName']);
    $password = md5($mysqli->real_escape_string($_POST['password1']));
    $organization_name = implode("_", explode(" ", strtolower($name)));

    $query = $mysqli->query("SELECT * FROM admin_info WHERE userName='$userName'");
    $count = $query->num_rows;
    if($count>0){
        echo "Username already used.";
        exit;
    }

    $query2 = $mysqli->query("SELECT * FROM organization");
    $query1 = $mysqli->query("SELECT * FROM organization WHERE organization_name = '$organization_name'");
    $count1 = $query1->num_rows;
    $count2 = $query2->num_rows;
    $organizationID = $count2+1;
    if($count1>0){
        echo "Hotel name already registered. Try logging in";
        exit;
    }

    $insert = $mysqli->query("INSERT INTO organization(organizationID, organization_name, organization_location, phone, phone1, pan_no) VALUES('$organizationID', '$organization_name', '$address', '$phone', '$phone1', '$pan_no')") or die($mysqli->error);
    $insert1 = $mysqli->query("INSERT INTO admin_info(organizationID, userName, password) VALUES('$organizationID', '$userName', '$password')");
    $_SESSION['userName'] = $userName;
    $_SESSION['orgID'] = $organizationID;
    echo "Successfully signed up";
}

