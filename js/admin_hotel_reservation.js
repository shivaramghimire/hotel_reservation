$(document).ready(function () {

    $("#typeOfRoom").change(function () {
        typeOfRoom = $(this).val();
        if (typeOfRoom === "Suite") {
            rate = '1200';
        }
        else if (typeOfRoom === "Standard") {
            rate = '900';
        }
        else if (typeOfRoom === "Dulex") {
            rate = '1600';
        }
        else if (typeOfRoom === "Super Dulex") {
            rate = '2000';
        }
        else if (typeOfRoom === "") {
            rate = '';
        }
        $("#rate").val(rate);
    });


    $("#submit").click(function () {

        checkin = $('#checkin').val();
        checkout = $('#checkout').val();
        typeOfRoom = $('#typeOfRoom').val();
        numberOfRooms = $('#numberOfRooms').val();

        //If non of the field is empty, send via ajax else do nothing and let html handel the empty field error
        if (checkin && checkout && typeOfRoom && rate && numberOfRooms ) {
            $.ajax({
                type: 'POST',
                url: '../hotel_validate.php',
                data: {
                    checkin: checkin, checkout: checkout, typeOfRoom: typeOfRoom, rate: rate, numberOfRooms: numberOfRooms
                },
                statusCode: {
                    404: function () {
                        alert("Page Not Found");
                    }
                },
                success: function (data) {
                    alert(data);
                    window.location.replace('../admin/index.php');
                }
            });
            return false;

        } else {

        }
    });
});
 