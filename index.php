<?php
  require_once('config.php'); //contains $settings variable for the API
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Delius|Inconsolata:400,700">
    <link rel="stylesheet/less" href="/css/main.less" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/1.5.0/less.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="/js/geo.js"></script>
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
            <a class="navbar-brand" href="/">Nowna</a>
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
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h1 class="huge center">Discover events near you</h1>
              <h2 class="huge center pad10bot">based on Twitter.</h2>
              <button type="button" class="btn btn-default btn-lg" onclick="getLocation()">Show me what's happening NowNa!</button>
            </div>
          </div>
        </div>
      </div>

      <div class="container">
        <!-- Tweets go here -->
        <div class="row">
          <div class="col-sm-12 tweetwrapper">
            <img src="http://da.gd/image/73x73.png?text=x" alt="40x40" class="img-responsive img-thumbnail" />
            <span class="tweet">
              This is a tweet. foo bar baz buzz.
            </span>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 tweetwrapper">
            <img src="http://da.gd/image/73x73.png?text=x" alt="40x40" class="img-responsive img-thumbnail" />
            <span class="tweet">
              This is a tweet. foo bar baz buzz.
            </span>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 tweetwrapper">
            <img src="http://da.gd/image/73x73.png?text=x" alt="40x40" class="img-responsive img-thumbnail" />
            <span class="tweet">
              This is a tweet. foo bar baz buzz.
            </span>
          </div>
        </div>
        <!-- end tweets -->
      </div>

    <footer>
      <div class="container">
        &copy; 2014 The Nowna team
      </div>
    </footer>
</body>
</html>
