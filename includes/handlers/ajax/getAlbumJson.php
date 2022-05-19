<?php
include("../../config.php");
 
if(isset($_POST['albumId'])) {
    $albumId = $_POST['albumId'];
 
    $query = "SELECT * FROM albums WHERE id='$albumId'";
    $returnobj=$con->query($query);
    $resultArray = $returnobj->fetchAll();
    echo json_encode($resultArray[0]);
}
?>