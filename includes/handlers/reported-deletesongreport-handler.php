<?php
    session_start();
    //include the database connection file
    include("../config.php");
    //checking whelter the admin is logged in or not
    if(isset($_SESSION['adminLoggedIn']) && !empty($_SESSION['adminLoggedIn'])){
        //
        
    }
    else{
        ?>
            <script>location.assign("../../admin-login.php")</script>
        <?php
    }
?>