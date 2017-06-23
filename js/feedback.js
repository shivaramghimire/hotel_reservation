$(document).ready(function() {
    //for refreshing page after 3 seconds
    number = 3;
    function countdown() {
        setTimeout(countdown, 1000);
        number--;
        if (number < 0) {
            window.location.replace('../php/feedback.php');
        }
    }

    $("#send").click(function() {
        email = $("#emailFrom").val();
        feedback = $.trim($("#feedback").val());
        selected_hotel = $.trim($('#selected_hotel').val());

        //If feedback is empty error message is displayed and refreshed
       if (feedback === "") {
            $("#feedback1").html("Cannot send an empty feedback.").css('color', 'red').fadeOut(3000);
            countdown();

        }
        else {
            $.ajax({
                type: 'POST',
                url: '../php/feedback_update.php',
                data: {email: email, feedback: feedback, selected_hotel: selected_hotel},
                success: function(data) {
                    alert("Thank you for your feedback. We highly appreciate it");
                    $("#feedback").val("");
                    window.location.replace('../php/feedback.php');
                }
            });
            return false;
        }
    });

    $("#cancel").click(function() {
        $("#feedback").val("");
    });
});
