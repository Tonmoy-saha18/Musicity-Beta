<?php 
include("includes/includedFiles.php"); 
if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
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
	$album = new Album($con, $albumId);
	$artist = $album->getArtist();
	$artistId = $artist->getId();
		

?>