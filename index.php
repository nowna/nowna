<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.1.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700|Delius|Inconsolata:400,700" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link rel="stylesheet/less" href="css/main.less" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/1.5.0/less.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyC-8qQw6BCorqyWEkV5psNf9q2SvrpIf4Y&sensor=true"></script>
    <script src="js/functions.js"></script>
</head>
<body>
	<header>
      <nav class="navbar navbar-default" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
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
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <h1 class="huge center ts">Discover events near you</h1>
              <h2 class="huge center ts pad10bot">based on Twitter.</h2>
              <button type="button" class="btn btn-success btn-lg removeWhiteSpace" onclick="getLocation()" id="showButton">
                Show me what's happening NowNa &raquo;
              </button>
            </div>
          </div>
        </div>
      </div>
      <div id="tweetwrapper">
        <div id="tweet_box" class="container"></div>
      </div>
    </div>

    <footer>
      <div class="container">
        &copy; 2014 The NowNa team
      </div>
    </footer>
</body>
</html>
