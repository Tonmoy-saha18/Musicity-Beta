<?php
session_start();
include("../../config.php");
 
if(isset($_POST['podId'])) {
    $playlistId = $_POST['podId'];
    //taking user id
    $username = $_SESSION['userLoggedIn'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $returnobj = $con->query($query);
    $user = $returnobj->fetchAll();
    foreach ($user as $us) {
        $user_id = $us['id'];
    }
    $likeQuery = "DELETE FROM likedsong WHERE song_id=$playlistId AND userid=$user_id";
    $con->exec($likeQuery);
 
}
else {
    echo "SongId was not passed into unlikeSong.php";
}
 
 
?>
