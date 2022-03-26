<?php
include("includes/includedFiles.php");

if(isset($_GET['id'])) {
	$artistId = $_GET['id'];
	if(isset($_GET['userLoggedIn'])) {
		$userLoggedIn = new User($con, $_GET['userLoggedIn']);
	}
	else {

	header("Location: register.php");
	}
}
else {
	header("Location: index.php");
}

$artist = new Artist($con, $artistId);
?>


