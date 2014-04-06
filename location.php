<?php
require_once('config.php'); //contains $settings variable for the API
require_once('helper_functions.php');

if(isset($_POST['latitude']) && isset($_POST['longitude'])) {
  $url = "https://api.twitter.com/1.1/search/tweets.json";
  $requestMethod = "POST";

	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];

  $getfield = '?q=&geocode='.$latitude.','.$longitude.',10mi&result_type=recent';

  $twitter = new TwitterAPIExchange($twitterSettings);
  $resp = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
  $tjson = json_decode($resp, true);

  foreach ($tjson['statuses'] as $status) {
    echo '<div class="row">';
    echo '  <div class="col-sm-12 tweetwrapper">';
    echo '    <div class="pull-left">';
    echo '      <img src="'.$status['user']['profile_image_url'].'"';
    echo '           alt="'.$status['user']['screen_name'].'"';
    echo '           title="'.$status['user']['screen_name'].'"';
    echo '           class="img-responsive img-thumbnail" />';
    echo '      <span class="tweet" title="'.$status['user']['created_at'].'">';
    echo '        <a href="https://twitter.com/'.$status['user']['screen_name'].'">';
    echo '          @'.$status['user']['screen_name'];
    echo '        </a>';
    echo linkify_usernames($status['text']);
    echo '      </span>';
    echo '    </div>';
    echo '  </div>';
    echo '</div>';
  }
}
else {
	echo "<script>alert('Something went wrong with the AJAx request!')";
}

?>