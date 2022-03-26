<?php
    session_start();
    //include the database connection file
    include("../config.php");
    //checking whelter the admin is logged in or not
    if(isset($_SESSION['adminLoggedIn']) && !empty($_SESSION['adminLoggedIn'])){
        //
        if(isset($_GET['songid']) && !empty($_GET['songid']) && isset($_GET['reportid']) && !empty($_GET['reportid'])){
            $song_id = $_GET['songid'];
            $reportid = $_GET['reportid'];
            $query = "DELETE FROM songs WHERE id=$song_id";
            $con->exec($query);
            $query = "DELETE FROM reports WHERE id=$reportid OR song_id=$song_id";
            $con->exec($query);

            ?>
                <script>
                    setTimeout(() => {
                        alert("Song and reports deleted successfully");
                    }, 500);
                    setTimeout(() => {
                        location.assign('../../admin-view.php');
                    }, 500);
                </script>
            <?php
        }
        else{
            ?>
                <script>
                    setTimeout(() => {
                        alert("Values doesn't passed in correctly");
                    }, 500);
                    setTimeout(() => {
                        location.assign('../../admin-view.php');
                    }, 500);
                </script>
            <?php
        }
    }
    else{
        ?>
            <script>location.assign("../../admin-login.php")</script>
        <?php
    }
?>