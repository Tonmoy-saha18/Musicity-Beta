<?php
    session_start();
    //include the database connection file
    include("../config.php");
    if(isset($_SESSION['adminLoggedIn']) && !empty($_SESSION['adminLoggedIn'])){
        //
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $songid = $_GET['id'];
            //Select album of that song
            $query = "SELECT * FROM songs WHERE id=$songid";
            $returnobj = $con->query($query);
            $table = $returnobj->fetch();
            $album_id = $table['album_id'];
 
            //Select artist id
            $query = "SELECT * FROM albums WHERE id=$album_id";
            $returnobj = $con->query($query);
            $table = $returnobj->fetch();
            $artist_id = $table['artist_id'];
 
            //Inserting the user in Banned Table
            $query = "INSERT INTO banned VALUES(NULL,$artist_id)";
            $con->exec($query);
 
            //now deleting all the reports
            $query = "DELETE FROM reports WHERE song_id=$songid";
            $con->exec($query);
 
            ?>
                <script>
                    setTimeout(() => {
                        alert("Member Banned Succesfully");
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
                        alert("Data does't passed correctly");
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
