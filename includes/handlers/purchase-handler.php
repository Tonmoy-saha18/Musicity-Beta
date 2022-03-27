<?php
    session_start();
    include("../config.php");
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        
    }
    else{
        ?>
            <script>location.assign('../../login.php')</script>
        <?php
    }
?>