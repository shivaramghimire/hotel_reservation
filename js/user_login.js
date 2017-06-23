$(document).ready(function () {
    $("#submit").click(function () {
        email = $.trim($("#email").val());
        password = $.trim($("#password").val());
        if (email !== "" && password !== "") {
            $.ajax({
                type: "POST",
                url: '../php/user_validate.php',
                data: {email: email, password: password},
                success: function (data) {
                    alert(data);
                    if (data ===  "Successfully Logged In") {
                      window.location.replace("../php/index.php");
                    }
                }
            });
            return false;
        }
    });
});