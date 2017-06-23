<?php
require 'header.php';
?>
<img src="../images/h1.jpg" width="100%" height="350px">


<form method="post">
    <table width="80%">
        <tr><td><img align="left" src="../images/pic5.jpg" />
                <img align="left" src="../images/pic4.jpg" /><br />
            </td>
            <td width="100%">
                <div id="arrange">
                    <br/>
                    <h2>SIGNUP FORM</h2><br />
                    <div id="heading">
                        <label for="firstName">First Name : </label><br/><br/><br/>
                        <label for="lastName">Last Name : </label><br/><br/><br/>
                        <label for="email">Email : </label><br/><br/><br/>
                        <label for="phone">Phone : </label><br/><br/><br/>
                        <label for="address">Address : </label><br/><br/><br/>
                        <p><label for="password1" >Password : </label><br/><br/><br /></p>
                        <label for="password2" >Re-enter Password : </label><br/><br/><br/>
                        <label for="card_holder" >Card Holder : </label><br/><br/><br/>
                        <label for="credit_card_number" >Credit Card Number : </label>

                    </div>

                    <div id="field">

                        <input type="text" name="firstName" id="firstName" required autofocus placeholder="Your first Name" pattern="[a-zA-Z]{3,}" title="Please enter more than three letters"/><br/><br/>
                        <input type="text" name="lastName" id="lastName" required placeholder="Your last Name" pattern="[a-zA-Z]{3,}" title="Please enter more than three letters"/><br/><br/>
                        <input type="text" name="email" id="email" placeholder="Your email address" required title="Please enter a valid email address" /><br/><br/>
                        <input type="tel" id="phone" name="phone" placeholder="Your phone number" required pattern="[0-9]{7,10}" title="Please enter phone number correctly" /><br/><br/>
                        <input type="text" id='address' name="address" required placeholder="Your address" pattern="[a-zA-Z0-9]{3,}" title="Please enter a valid address"/><br/><br/>

                        <input type="password" name="password1" id="password1" pattern="[a-zA-Z0-9.@_]{5,}" required placeholder="Your Password" title="Password should be greater than 5 characters and must contain characters and symbols .@_"/>&nbsp; &nbsp;
                        <span></span><br/><br/>

                        <input type="password" name="password2" id="password2" pattern="[a-zA-Z0-9.@_]{5,}" required placeholder="Your Password" title="Password should be greater than 5 characters and must contain characters and symbols .@_"/>&nbsp; &nbsp;
                        <span></span><br/><br/>

                        <input type="text" name="card_holder" id="card_holder" required title="Please enter name of card holder" placeholder="Credit Card Holder"/><br/><br/>
                        <input type="number" name="credit_card_number" id="credit_card_number" required title="Please enter name of credit card number" placeholder="Credit Card Number"/><br/><br/>


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
    <?php
    require 'footer.php';
    ?>

    <script type="text/javascript" src="../js/user_signup.js"></script>

</body>
