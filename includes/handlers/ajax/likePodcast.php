<?php
session_start();
include("../../config.php");
 
if(isset($_POST['podId'])) {
    $playlistId = $_POST['podId'];
 
    $username = $_SESSION['userLoggedIn'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $returnobj = $con->query($query);
    $user = $returnobj->fetchAll();
    foreach ($user as $us) {
        $user_id = $us['id'];
    }
 
    $likeQuery = "INSERT INTO likedpodcast VALUES(NULL, $playlistId, $user_id)";
    $con->exec($likeQuery);
 
}
else {
    echo "PodcastId was not passed into deletePlaylist.php";
}
 
 
?>
