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
    // checking whter the button id pressed or not and the user selected input is empty or not
    if(isset($_GET['submitButton']) && !empty($_GET['userchoice'])){
        $details = $_GET['userchoice'];
 
        foreach($details AS $temp){
            // taking genre id from genere name
            $get_genreid = "SELECT * FROM genre WHERE name = '$temp'";
            $return_obj = $con->query($get_genreid);
            $genre = $return_obj->fetchAll();
 
            // taking all genre id by iterating this loop and insert the details into database
            foreach($genre AS $genreid){
                $prefer_id = $genreid['id'];
                $insert_details = "INSERT INTO user_preference VALUES($userid, $prefer_id)";
                $con->exec($insert_details);
            }
 
        }
        ?>
            <script>location.assign('../../index.php')</script>
        <?php
    }
    else{
        ?>
            <script>location.assign('../../userpreference.php')</script>
        <?php
    }
   
?>

