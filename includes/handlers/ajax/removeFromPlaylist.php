<?php
include("../../config.php");

if(isset($_POST['playlistId']) && isset($_POST['songId'])) {
	$playlistId = $_POST['playlistId'];
	$songId = $_POST['songId'];

	$query = "DELETE FROM playlist_song WHERE playlist_id='$playlistId' AND song_id='$songId'";
	$con->exec($query);
}
else {
	echo "PlaylistId or songId was not passed into removeFromPlaylist.php";
}


?>