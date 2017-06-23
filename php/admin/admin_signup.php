<!DOCTYPE html>
<html>
<head>
    <title> ADMIN | SIGNUP </title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="stylesheet" href="../../css/abcd.css"
    <link rel="stylesheet" href="../../css/admin.css"/>
</head>

<body>
<img src="../../images/a1.jpg" width="100%" height="350px">


<form method="post">
    <table width="80%">
        <tr><td><img align="left" src="../../images/a2.jpg" width="400px" />
                <img align="left" src="../../images/a4.jpg"  width="400px"/><br />
            </td>
            <td width="100%">
                <div id="arrange">
                    <br/>
                    <h2>SIGNUP FORM</h2><br />
                    <div id="heading">
                        <label for="organization_name">Hotel Name : </label><br/><br/><br/>
                        <label for="address">Address : </label><br/><br/><br/>
                        <label for="phone">Phone : </label><br/><br/><br/>
                        <label for="phone1">Phone : </label><br/><br/><br/>
                        <label for="pan_no" >Pan Number : </label><br/><br/><br/>
                        <label for="userName" >Username : </label><br/><br/><br />
                        <p><label for="password1" >Password : </label><br/><br/><br /></p>
                        <label for="password2" >Re-enter Password : </label><br/><br/><br/>
                    </div>

                    <div id="field">

                        <input type="text" name="organization_name" id="organization_name" required autofocus placeholder="Hotel Name" pattern="[a-zA-Z]{3,}" title="Please enter more than three letters"/><br/><br/>
                        <input type="text" name="address" id="address" required placeholder="Hotel Address" pattern="[a-zA-Z]{3,}" title="Please enter more than three letters"/><br/><br/>
                       <input type="tel" id="phone" name="phone" placeholder="Phone number" required pattern="[0-9]{7,10}" title="Please enter phone number correctly" /><br/><br/>
                        <input type="tel" id="phone1" name="phone1" placeholder="Additional phone number"  pattern="[0-9]{7,10}" title="Please enter phone number correctly" /><br/><br/>
                        <input type="number" id='pan_no' name="pan_no" required placeholder="Hotel Pan Number" min="1111111" pattern="[0-9]{3,}" title="Please enter a valid pan number"/><br/><br/>
                        <input type="text" id="userName" name="userName" required placeholder="Username" title="Enter valid username"/><br/><br/><br />

                        <input type="password" name="password1" id="password1" pattern="[a-zA-Z0-9.@_]{5,}" required placeholder="Your Password" title="Password should be greater than 5 characters and must contain characters and symbols .@_"/>&nbsp; &nbsp;
                        <span></span><br/><br/>

                        <input type="password" name="password2" id="password2" pattern="[a-zA-Z0-9.@_]{5,}" required placeholder="Your Password" title="Password should be greater than 5 characters and must contain characters and symbols .@_"/>&nbsp; &nbsp;
                        <span></span><br/><br/>

                    </div>

                    <input type="submit" id="signup" value="Sign Up"/>
                    <br/><br/>

                    <br/>
</form>
</div>
</center>

<br/><br/>
</td>
</td></tr>
</table>

<script type="text/javascript" src="../../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="../../js/admin_signup.js"></script>

</body>
