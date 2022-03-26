<?php
    session_start();
 
    // includes the database connection file
    include("../config.php");
   
    // taking the user details
    $user = $_SESSION['userLoggedIn'];
    $user_query = "SELECT * FROM users WHERE '$user' = username";
    $return_obj = $con->query($user_query);
    $main_users = $return_obj->fetchAll();
 
    // taking the user id by iterating this loop
    foreach($main_users AS $one_user){
        $userid = $one_user['id'];
    }