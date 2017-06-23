$(document).ready(function () {
    typeOfRoom = $('#typeOfRoom').val();

    $("#submit").click(function () {
        organization_name = $('#hotel').val();
        checkin = $('#checkin').val();
        checkout = $('#checkout').val();
        typeOfRoom = $('#typeOfRoom').val();
        roomNo = $('#roomNo').val();

        //If non of the field is empty, send via ajax else do nothing and let html handel the empty field error
        if (checkin && checkout && typeOfRoom && rate && roomNo && organization_name) {
            $.ajax({
                type: 'POST',
                url: '../php/hotel_validate.php',
                data: {checkin: checkin, checkout: checkout, typeOfRoom: typeOfRoom, roomNo: roomNo, organization_name: organization_name},
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