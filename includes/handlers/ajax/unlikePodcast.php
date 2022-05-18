<?php
include("../../config.php");
 
if(isset($_POST['podId'])) {
    $playlistId = $_POST['podId'];
 
    $likeQuery = "DELETE FROM likedpodcast WHERE pod_id=$playlistId";
    $con->exec($likeQuery);
 
}
else {
    echo "PodcastId was not passed into deletePlaylist.php";
}
 
 
?>