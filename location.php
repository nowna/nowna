<?php

if(isset($_POST['latitude']) && isset($_POST['longitude'])) {
	$latitude = $_POST['latitude'];
	$longitude = $_POST['longitude'];
}
else {
	echo "<script>alert('Something went wrong with the AJAx request!')";
}

?>