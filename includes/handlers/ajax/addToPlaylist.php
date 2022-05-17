<?php
include("../../config.php");


if(isset($_POST['playlistId']) && isset($_POST['songId'])) {
	$playlistId = $_POST['playlistId'];
	$songId = $_POST['songId'];

	$orderIdQuery = "SELECT MAX(playlist_order) + 1 as playlistOrder FROM playlist_song WHERE playlist_id='$playlistId'";
	$data  = $con->query($orderIdQuery);
	$row =  $data->fetch();
	$order = $row['playlistOrder'];

	$query = "INSERT INTO playlist_song VALUES('', '$order', '$songId', '$playlistId','' )";
	$con->exec($query);
}
else {
	echo "PlaylistId or songId was not passed into addToPlaylist.php";
}



?>