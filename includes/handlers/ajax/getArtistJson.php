<?php
include("../../config.php");
 
if(isset($_POST['albumId'])) {
    $albumId = $_POST['albumId'];
 
    $query = "SELECT concat(u.first_name, ' ', u.last_name) as name,u.id as id FROM users as u JOIN albums as a ON u.id = a.artist_id WHERE a.id='$albumId'";
    $returnobj=$con->query($query);
    $resultArray = $returnobj->fetchAll();
    echo json_encode($resultArray[0]);
}
?>