function getLocation()
{
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
}