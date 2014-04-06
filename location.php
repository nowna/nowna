<?php
require_once('config.php'); //contains $settings variable for the API
require_once('helper_functions.php');

if(isset($_POST['latitude']) && isset($_POST['longitude'])) {
  $url = "https://api.twitter.com/1.1/search/tweets.json";
  $requestMethod = "GET";

	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];

  $getfield = '?q=&geocode='.$latitude.','.$longitude.',10mi&result_type=recent';

  $twitter = new TwitterAPIExchange($twitterSettings);
  $resp = $twitter->setGetfield($getfield)
    ->buildOauth($url, $requestMethod)
    ->performRequest();
  $tjson = json_decode($resp, true);

  foreach ($tjson['statuses'] as $status) {
    if ($status['coordinates'] === null)
      next;
?>

<div class="row">
   <div class="col-sm-12 tweetwrapper">
     <div class="pull-left">
       <img src="<?php echo $status['user']['profile_image_url']; ?>"
            alt="<?php echo $status['user']['screen_name']; ?>"
            title="<?php echo $status['user']['screen_name']; ?>"
            class="img-responsive img-thumbnail" />
       <span class="tweet" title="<?php echo $status['created_at']; ?>">
         <a href="https://twitter.com/<?php echo $status['user']['screen_name']; ?>">
           @<?php echo $status['user']['screen_name']; ?>
         </a>
         <?php echo linkify_usernames($status['text']); ?>
       </span>
     </div>
   </div>
</div>

<?php
  }
}
else {
	echo "<script>alert('Something went wrong with the AJAx request!')";
}
?>
