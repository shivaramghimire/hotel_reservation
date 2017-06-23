<?php
require 'header.php';
if (!isset($_SESSION['userName'])) {
    header('location: admin_login.php');
}
?>

<img src="../../images/1.jpg" width="100%" /><br />
<img src="../../images/g3.jpg" width="25%" /><img src="../../images/g5.jpg" width="25%" /><img src="../../images/g4.jpg" width="25%" /><img src="../../images/g6.jpg" width="25%" />