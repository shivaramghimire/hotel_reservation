<?php
require 'header.php';

if (isset($_SESSION['email'])) {
    header('location: index.php');
}
?>
<img src="../images/reservation.jpg" width="100%" />

<br/><br/>

<form method="post">
    <div id="try">
        <h2>USER LOGIN</h2>
        <br/>
        <div id="heading">
            <label for="email" >Email : </label><br/><br/><br/>
            <label for="password" >Password : </label><br/><br/><br/><br/>
            <a href="forgot_password.php">Forgot your password?</a><br/><br/><br/><br/>
        </div>

        <div id="field">
            <input type="email" name="email" id="email" autofocus required pattern="[a-zA-Z0-9._]{3,}@[a-zA-Z]{3,}[.]{1}[a-zA-Z]{2,}" placeholder="Your email address" title="Please enter valid email address"/><br/><br/>
            <input type="password" name="password" id="password" required placeholder="Your Password"/><br/><br/>
            <input id="submit" type="submit" value="Log in"/><br/><br/>
        </div>

        <br/><br/><br/><br />
        <p id="login">
            Don't have an account? &nbsp;&nbsp;&nbsp;&nbsp;<a id="signup_link" href="user_signup.php">Sign Up</a></p>
    </div>

</form>


<br/><br/>

<?php
require 'footer.php';
?>

<script type="text/javascript" src="../js/user_login.js"></script>
</body>
