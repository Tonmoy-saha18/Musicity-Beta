<?php
    include("includes/classes/Account.php");
    // include("includes/handlers/userpreference.php");
    session_start();
    include("includes/config.php");
 
    if(isset($_SESSION['userpreferance']) && !empty($_SESSION['userpreferance'])){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" type="/image/png" href="assets/images/titleimage.png">
            <link rel="stylesheet" href="assets/css/userpreferance.css">
            <title>User Preferance</title>
        </head>
