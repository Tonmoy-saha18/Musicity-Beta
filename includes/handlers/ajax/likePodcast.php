<?php
session_start();
include("../../config.php");
 
if(isset($_POST['podId'])) {
    $playlistId = $_POST['podId'];
 
    $username = $_SESSION['userLoggedIn'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $returnobj = $con->query($query);
    $user = $returnobj->fetchAll();
    
 
}
else {
    echo "PodcastId was not passed into deletePlaylist.php";
}
 
 
?>
