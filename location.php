<?php
require_once('config.php'); //contains $settings variable for the API
require_once('helper_functions.php');

if(isset($_POST['latitude']) && isset($_POST['longitude'])) {
  $url = "https://api.twitter.com/1.1/search/tweets.json";
  $requestMethod = "GET";

	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];

  $getfield = '?q=&geocode='.$latitude.','.$longitude.',1mi&result_type=recent';

  $twitter = new TwitterAPIExchange($twitterSettings);
  $resp = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
  $tjson = json_decode($resp, true);

  $val = 0;
  foreach ($tjson['statuses'] as $status) {
    if ($status['coordinates'] === null)
      next;
    $val++;
?>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
<div class="row tweetwrapper">
  <div class="col-sm-12">
    <div class="pull-left">
      <img src="<?php echo $status['user']['profile_image_url']; ?>"
        alt="<?php echo $status['user']['screen_name']; ?>"
        title="<?php echo $status['user']['screen_name']; ?>"
        class="img-responsive img-thumbnail avatar" />
      <span class="tweet" title="<?php echo $status['created_at']; ?>">
        <a href="https://twitter.com/<?php echo $status['user']['screen_name']; ?>">
          @<?php echo $status['user']['screen_name']; ?>
        </a>
        <?php echo linkify_usernames($status['text']);
          echo $status['coordinates'];
        ?>
      </span>
    </div>

    <script>
        //var myLatitude = navigator.geolocation.coords.latitude;
        //var myLongitude = navigator.geolocation.coords.longitude;

        var myLatLng = new google.maps.LatLng(latitude, longitude);
        //var theirLatlng = new google.maps.LatLng(myLatitude, myLongitude);

        var mapOptions = {
            zoom: 15,
            center: myLatLng,
            disableDefaultUI: true
        }

        var map<?php echo $val; ?> = new google.maps.Map(document.getElementById('map-canvas<?php echo $val; ?>'), mapOptions);

        //var myMarker<?php echo $val; ?> = new google.maps.Marker({
          //  position: myLatLng,
            //map: map<?php echo $val; ?>,
            //title: 'Marker'
        //});
        var myMarker<?php echo $val; ?> = new google.maps.Marker({
            position: myLatLng,
            map: map<?php echo $val; ?>,
            title: 'Marker<?php echo $val; ?>'
        });

        //var theirMarker = new google.maps.Marker({
        //    position: theirLatlng,
        //    map: map,
        //    title: 'Them'
        //});
    </script>

    <div id="map-canvas<?php echo $val ?>" class="map-canvas"></div>
   </div>
</div>

<?php
  }
}
else {
  echo "<script>alert('Something went wrong with the AJAX request!')</script>";
}
?>