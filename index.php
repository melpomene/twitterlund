<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Twitterlund</title>
	<meta name="author" content="Blekingska Hack day ">
	<link href="style.css" rel="stylesheet" type="text/css">
	<!-- Date: 2011-07-02 -->
</head>
<body>
	<div id="menycontainer">
		<div id="logga">
			<h1>Twittterlund</h1>
		</div>
		<ul id="meny">
			<li><a href="index.php" id="current">Flöde</a></li>
			<li><a href="om.php">Om</a></li>
		</ul>
	</div>
	<div id="content">
		<h1>Det här händer i Lund:</h1>
		<p>
			En fet feed!
<?php





try {

	//initialize a new curl resource
	$ch = curl_init();
	$search_query = "%23lund+OR+%40blekingska+OR+%40StudentiLund+OR+%40lundagard+OR+%40Krischansta+OR+%40LundsNation+OR+%40studentsangarna+OR+%40hallandsnation
	+OR+%40VStyret+OR+%40Teknologkaren+OR+%40radioaf+OR+%40Studentafton+OR+%40medfak_LU+OR+%40helsingkrona+OR+%40Studentteater+OR+%40Omkretsen+OR+%40Lundaspexarna";
	curl_setopt($ch, CURLOPT_URL, 'http://search.twitter.com/search.json?q='. $search_query . '&rpp=100');
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$content = curl_exec($ch);
	curl_close($ch);
	$content = json_decode($content, true);
	foreach($content["results"] as $tweet) {
		echo '<p class="tweet"><b>User:</b> '. $tweet["from_user"] . " <b>Tweet:</b>  "  . $tweet["text"] . '</p>';
	}
	

	if($content === FALSE) {
		//Content couldn't be retrieved... Do something
	} else {
		//Content was retrieved do something with it.
	}


} catch (Services_Twitter_Exception $e) {

    echo $e->getMessage();

}
			?>
		</p>
	</div>
</body>
</html>
