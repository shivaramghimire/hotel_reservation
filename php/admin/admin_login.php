<!DOCTYPE html>
<html>
    <head>
        <title>NEPALI TOURISTER | ADMIN</title>
        <meta charset='utf-8' />
        <link rel="stylesheet" href="../../css/style.css"/>
        <link rel="stylesheet" href="../../css/abcd.css"
              <link rel="stylesheet" href="../../css/admin.css"/>
    </head>
    <body>
        <div class="logo">
            <h1><a href="index.php">NEPALI<span>TOURISTER</span></a></h1>
        </div>
        <img src="../../images/pic5.jpg" width="100%" height="300px"/>
        <form method="post">
            <div id="try">

                <br/>
                <h2>ADMIN LOGIN</h2>
                <div id="heading">
                    <label for="text" >Username : </label><br/><br/><br/>
                    <label for="password" >Password : </label><br/><br/><br/><br/>
                    <a href="forgot_password.php">Forgot your password?</a><br/><br/><br/><br/>
                </div>

                <div id="field">
                    <input type="text" name="text" id="userName" autofocus required pattern="[a-zA-Z0-9._@]{3,}" placeholder="Your username" title="Please enter valid username"/><br/><br/>
                    <input type="password" name="password" id="password" required placeholder="Your Password"/><br/><br/>
                    <input id="submit" type="submit" value="Log in"/><br/><br/>
                </div>

                <br><br><br>
                <p id="login">
                    Don't have an account? &nbsp;&nbsp;&nbsp;&nbsp;<a id="signup_link" href="admin_signup.php">Sign Up</a></p>

            </div>
        </form>

        <script type="text/javascript" src="../../js/jquery-1.8.0.min.js"></script>
        <script type="text/javascript" src="../../js/admin_login.js"></script>
    </body>
</html>