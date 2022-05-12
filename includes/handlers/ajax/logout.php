<?php
    session_start();

    // Checking whelter the admin is logged in or not
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        unset($_SESSION['userLoggedIn']); //deleting the session stored  value

        // send it sign in page
        ?>
            <script>location.assign('../../login.php')</script>
        <?php
    }
    else{
        // the user isn't logged in so it also take it to the login.php page
        ?>
            <script>location.assign('../../login.php')</script>
        <?php
    }
?>