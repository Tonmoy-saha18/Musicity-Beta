<?php
include("../../config.php");
 
if(isset($_POST['songId'])) {
    $songId = $_POST['songId'];
 
    $query = "UPDATE songs SET plays = plays + 1 WHERE id='$songId'";
    $con->exec($query);
}
?>