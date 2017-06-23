$(document).ready(function () {
    $("#signup").click(function(){
        organization_name = $.trim($("#organization_name").val());
        address =  $.trim($("#address").val());
        phone =  $.trim($("#phone").val());
        phone1 =  $.trim($("#phone1").val());
        pan_no =  $.trim($("#pan_no").val());
        userName =  $.trim($("#userName").val());
        password1 = $.trim($("#password1").val());
        password2 =  $.trim($("#password2").val());
        if(phone1 == ""){
            phone1=1;
        }

        if(organization_name && address && phone && phone1 && pan_no && userName && password1 && password2){
            if(password1 == password2){
                $.ajax({
                    type: 'POST',
                    url: '../admin/signup_validate.php',
                    data: {
                        organization_name: organization_name, address: address, phone: phone, phone1: phone1, pan_no: pan_no, userName: userName, password1: password1
                    },
                    success: function(data){
                        if(data == "Username already used.") {
                            alert(data);
                            $("#userName").val("");
                        }else{
                            alert(data);
                            window.location.replace('../admin/index.php');
                        }
                    }
                });
                return false;
            }else{
                    $("span").html(" Password do not match").css('color','red');
                    $("#password1").val("");
                    $("#password2").val("");
            }
        }else{
        }
    });

});