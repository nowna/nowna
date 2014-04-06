function getLocation()
{
    $('.intro').hide();

    if (navigator.geolocation)
    {
        console.log("geolocation is working!");
        navigator.geolocation.getCurrentPosition(showPosition);
    }
    else
    {
        console.log("No geolocation");
    }
}

function showPosition(position)
{
    console.log("post the position");
    console.log("Latitude: " + position.coords.latitude +
                "    Longitude: " + position.coords.longitude);

    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;

    var location = document.getElementById("location");
    location.innerHTML = latitude + ", " + longitude;

    $(document).ready(function() {
        $("#locationButton").click(function() {
            
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

}
