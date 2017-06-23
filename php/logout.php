<?php
session_start();
if (isset($_SESSION['email'])){
    unset($_SESSION['email']);
}elseif(isset($_SESSION['userName'])) {
    unset($_SESSION['userName']);
    unset($_SESSION['organizationID']);
} else {
    echo "LOGIN SESSION NOT FOUND. TRY LOGGING IN";
}
header('location: index.php');
?>
