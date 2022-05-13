<?php
include("../../config.php");
 
if(isset($_POST['playlistId'])) {
    $playlistId = $_POST['playlistId'];
 
    $playlistQuery = "DELETE FROM playlist WHERE id='$playlistId'";
    $con->exec($playlistQuery);
    $songsQuery = "DELETE FROM playlist_song WHERE playlist_id='$playlistId'";
    $con->exec($songsQuery);
}
else {
    echo "PlaylistId was not passed into deletePlaylist.php";
}
 
 
?>
 

