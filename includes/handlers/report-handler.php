<?php
    session_start();
    include("../config.php");
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        if(isset($_GET['userid']) && !empty($_GET['userid']) && isset($_GET['songid']) && !empty($_GET['songid'])){
            //taking the details
            $userid = $_GET['userid'];
            $song_id = $_GET['songid'];
            $date = date("Y-m-d H:i:s");
            $message = $_GET['msg'];
            echo $message;
 
            $query = "INSERT INTO reports VALUES(NULL,$userid,$song_id,'$date','$message')";
            $con->exec($query);
            ?>
                <script>
                    setTimeout(() => {
                        alert("Reported the song successfully");
                    }, 500);
                    setTimeout(() => {
                        location.assign('../../index.php');
                    }, 500);
                </script>
            <?php
        }
        else{
            ?>
                <script>
                    setTimeout(() => {
                        alert("Value doesn't passed properly");
                    }, 500);
                    setTimeout(() => {
                        location.assign('../../index.php');
                    }, 500);
                </script>
            <?php
        }
    }
    else{
        ?>
            <script>location.assign('../../register.php')</script>
        <?php
    }
?>

