<?php
    session_start();

    // Checking whelter the admin is logged in or not

    unset($_SESSION['userLoggedIn']); //deleting the session stored  value

    // send it sign in page
?>