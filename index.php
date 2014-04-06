<?php
require_once('config.php'); //contains $settings variable for the API
require_once('helper_functions.php');

$url = "https://api.twitter.com/1.1/search/tweets.json";
$requestMethod = "GET";
$getfield = '?q=&geocode=40.7484,73.9857,10mi&result_type=recent';

$twitter = new TwitterAPIExchange($twitterSettings);
$resp = $twitter->setGetfield($getfield)
          ->buildOauth($url, $requestMethod)
          ->performRequest();
$tjson = json_decode($resp, true);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Delius|Inconsolata:400,700">
    <link rel="stylesheet/less" href="css/main.less" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/1.5.0/less.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="js/geo.js"></script>
</head>
<body>
	<header>
      <nav class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar" />
              <span class="icon-bar" />
              <span class="icon-bar" />
            </button>
            <a class="navbar-brand" href="/">NowNa</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li id="location">
                Push Button for Location
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <div id="index">
      <div class="pad40 intro">
        <!-- <?php echo $resp; ?> -->
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h1 class="huge center ts">Discover events near you</h1>
              <h2 class="huge center ts pad10bot">based on Twitter.</h2>
              <button type="button" class="btn btn-success btn-lg" onclick="getLocation()">
                Show me what's happening NowNa &raquo;
              </button>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <!-- Tweets go here -->
        <?php
          foreach ($tjson['statuses'] as $status) {
        ?>
        <div class="row">
          <div class="col-sm-12 tweetwrapper">
            <div class="pull-left">
              <img src="<?php echo $status['user']['profile_image_url']; ?>"
                   alt="<?php echo $status['user']['screen_name']; ?>"
                   title="<?php echo $status['user']['screen_name']; ?>"
                   class="img-responsive img-thumbnail" />
              <span class="tweet" title="<?php echo $status['user']['created_at']; ?>">
                <a href="https://twitter.com/<?php echo $status['user']['screen_name']; ?>">
                  @<?php echo $status['user']['screen_name']; ?>
                </a>
                <?php echo linkify_usernames($status['text']); ?>
              </span>
            </div>
          </div>
        </div>
        <?php } ?>
        <!-- end tweets -->
      </div>

    <footer>
      <div class="container">
        &copy; 2014 The NowNa team
      </div>
    </footer>
</body>
</html>
