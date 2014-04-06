function getLocation()
{
    $('.intro').slideUp("slow");

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

    $.ajax({
        type: "POST",
        url: 'location.php',
        data: {
            latitude : latitude,
            longitude : longitude
        }
    })
    .done(function(data) {
        $('#tweet_box').html(data);
        $('#refreshButton').html('<button href="javascript:getLocation()" class="btn btn-small btn-default fa fa-refresh" id="tabHeader_1">Refresh</button>');
    }).fail(function() {
        $('#tweet_box').html('The ajax request failed or we ran out of requests!');
    });
}

function initialize() {
    var myLatitude = navigator.geolocation.coords.latitude;
    var myLongitude = navigator.geolocation.coords.longitude;

    var myLatLng = new google.maps.LatLng(myLatitude, myLongitude);
    //var theirLatlng = new google.maps.LatLng(myLatitude, myLongitude);

    var mapOptions = {
        zoom: 15,
        center: myLatLng,
        disableDefaultUI: true
    }

    var map = new google.maps.Map(document.getElementByClass('map-canvas'), mapOptions);

    var myMarker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: 'You'
    });

    //var theirMarker = new google.maps.Marker({
    //    position: theirLatlng,
    //    map: map,
    //    title: 'Them'
    //});
}