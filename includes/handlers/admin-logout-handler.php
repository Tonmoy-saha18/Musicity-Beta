<?php
    session_start();

    // Checking whelter the admin is logged in or not
    if(isset($_SESSION['adminLoggedIn']) && !empty($_SESSION['adminLoggedIn'])){
        unset($_SESSION['adminLoggedIn']); //delting the session stored  value

        // send it sign in page
        ?>
            <script>location.assign('../../admin-login.php')</script>
        <?php
    }
    else{
        // the user isn't logged in so it also take it to the login.php page
        ?>
            <script>location.assign('../../admin-login.php')</script>
        <?php
    }
?>