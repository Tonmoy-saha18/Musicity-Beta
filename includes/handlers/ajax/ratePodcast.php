<?php
session_start();
include("../../config.php");
 
if(isset($_POST['podId'])) {
    $podId = $_POST['podId'];
    $rating = $_POST['rating'];
 
    $username = $_SESSION['userLoggedIn'];
    $query = "SELECT * FROM users WHERE username='$username'";
    $returnobj = $con->query($query)->fetch();
    $id = $returnobj['id'];
 
    $ratequery = "SELECT * FROM ratepodcast WHERE pod_id=$podId AND user_id=$id";
    $table = $con->query($ratequery);
    if($table->rowCount() > 0){
        $update = "UPDATE ratepodcast SET raing=$rating WHERE pod_id=$podId AND user_id=$id";
        $con->exec($update);
    }
    else{
        $Insert = "INSERT INTO ratepodcast Values(NULL, $podId, $rating, $id)";
        $con->exec($Insert);
    }
 
}
else {
    echo "PodcastId was not passed into deletePlaylist.php";
}
 
 
?>
