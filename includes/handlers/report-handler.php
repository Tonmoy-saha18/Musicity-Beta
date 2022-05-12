<?php
    session_start();
    include("../config.php");
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        if(isset($_GET['userid']) && !empty($_GET['userid']) && isset($_GET['songid']) && !empty($_GET['songid'])){
            
        }
        else{
            
        }
    }
    else{
        ?>
            <script>location.assign('../../register.php')</script>
        <?php
    }
?>

