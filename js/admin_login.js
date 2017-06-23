$(document).ready(function () {
    $("#submit").click(function () {
        userName = $.trim($("#userName").val());
        password = $.trim($("#password").val());
        if (userName !== "" && password !== "") {
            $.ajax({
                type: "POST",
                url: "../../php/admin/admin_validate.php",
                data: {userName: userName, password: password},
                success: function (data) {
                    alert(data);
                    if (data === "Successfully Logged In") {
                        window.location.replace("../admin/index.php");
                    }
                    else if (data === "Sign in failed. Try again"){
                        $("#userName").val('');
                        $("#password").val('');
                    }
                }
            });
            return false;
        }
    });
});