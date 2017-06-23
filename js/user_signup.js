$(document).ready(function () {
    $("#signup").click(function () {
        firstName = $.trim($('#firstName').val());
        lastName = $.trim($('#lastName').val());
        email = $.trim($('#email').val());
        phone = $.trim($('#phone').val());
        address = $.trim($('#address').val());
        password1 = $.trim($("#password1").val());
        password2 = $.trim($("#password2").val());
        card_holder = $.trim($("#card_holder").val());
        credit_card_number = $.trim($("#credit_card_number").val());

        if (firstName && lastName && email && phone && address && password1 && password2 && credit_card_number && card_holder) {
            if (password1 === password2) {
                $.ajax({
                    type: "POST",
                    url: "../php/signup_validate.php",
                    data: {firstName: firstName, lastName: lastName, email: email, phone: phone, address: address, password1: password1, card_holder: card_holder, credit_card_number: credit_card_number},
                    success: function (data) {
                        alert(data);
                        window.location.replace("../php/index.php");
                    }
                });
                return false;
            }
            else {
                $("span").html(" Password do not match").css('color','red');
                $("#password1").val("");
                $("#password2").val("");
            }
        }
        else {

        }
    });
});