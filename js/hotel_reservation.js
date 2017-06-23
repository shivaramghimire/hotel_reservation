$(document).ready(function () {
        typeOfRoom = $('#typeOfRoom').val();
        if (typeOfRoom === "Suite") {
            rate = '1500';
        }
        else if (typeOfRoom === "Standard") {
            rate = '2300';
        }
        else if (typeOfRoom === "Dulex") {
            rate = '3500';
        }
        else {
            rate = '5000';
        }
        $("#rate").val(rate);


    $("#submit").click(function () {

        checkin = $('#checkin').val();
        checkout = $('#checkout').val();
        typeOfRoom = $('#typeOfRoom').val();
        numberOfRooms = $('#roomNo').val();

        //If non of the field is empty, send via ajax else do nothing and let html handel the empty field error
        if (checkin && checkout && typeOfRoom && rate && numberOfRooms) {
            $.ajax({
                type: 'POST',
                url: '../php/hotel_validate.php',
                data: {
                    checkin: checkin, checkout: checkout, typeOfRoom: typeOfRoom, rate: rate, roomNo: numberOfRooms
                },
                statusCode: {
                    404: function () {
                        alert("Page Not Found");
                    }
                },
                success: function (data) {
                    alert(data);
                    window.location.replace('../php/index.php');
                }
            });
            return false;
        } else {

        }
    });
});
