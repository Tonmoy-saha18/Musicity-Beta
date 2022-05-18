<?php
include("includes/includedFiles.php");
 
if(isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
    if(isset($_GET['userLoggedIn'])) {
        $userLoggedIn = new User($con, $_GET['userLoggedIn']);
    }
    else {
 
    header("Location: register.php");
    }
}
else {
    $term = "";
}
?>
 

 
 
 
 
 
 
 
 
 
 
 

