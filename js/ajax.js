$(document).ready(function() {
    $("#locationButton").click(function() {
        var userID = $(this).attr('id');
        //alert($(this).attr('id'));
        $.ajax({
            type: "POST",
            url: 'location.php',
            data: {
                latitude : longitude,
                longitude : longitude
            }
        }).fail(function() {
            alert("AJAX query failed!");
        });
    });
});