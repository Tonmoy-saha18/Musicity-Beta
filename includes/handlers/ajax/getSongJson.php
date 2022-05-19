<?php
include("../../config.php");
if(isset($_POST['songId'])) {
 
    $songId = $_POST['songId'];
 
    $query = "SELECT * FROM songs WHERE id='$songId'";
    $returnobj=$con->query($query);
    $resultArray = $returnobj->fetchAll();
    echo json_encode($resultArray[0]);
}
 
 
?>