<?php
include("../../config.php");
 
if(isset($_POST['name']) && isset($_POST['username'])) {
 
    $name = $_POST['name'];
    $username = $_POST['username'];
    $date = date("Y-m-d");
 
    $query = "SELECT id FROM users WHERE username='$username'";
    $row = $con->query($query);
    $data = $row->fetch();
    $userid=$data['id'];
           
 
    $query = "INSERT INTO playlist VALUES('', '$name', '$date', '$userid')";
    $con->exec($query);
 
}
else {
    echo "Name or username parameters not passed into file";
}
 
?>
