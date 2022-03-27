<?php
    session_start();
    include("../config.php");
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        if(isset($_GET['sid']) && !empty($_GET['sid']) && isset($_GET['pname']) && !empty($_GET['pname'])){
            //taking user details from
            $user_name = $_SESSION['userLoggedIn'];
            $query = "SELECT * FROM users WHERE username='$user_name'";
            $return = $con->query($query);
            $user = $return->fetchAll();
            foreach($user as $table){
                $id = $table['id'];
                $amount = $table['amount'];
            }
            //taking the song_id and the playlist_name the user has passed in
            $song_id = $_GET['sid'];
            $playlistname = $_GET['pname'];
            $query = "SELECT * FROM playlist WHERE title='$playlistname'";
            $returnobj = $con->query($query);
            if($returnobj->rowCount() > 0){
                //it ensures that the playlist exist
                // now getting id of the playlist_name
                $table = $returnobj->fetchAll();
                foreach($table as $play){
                    $play_id = $play['id'];
                }

                //now checking the playlist play order
                $query = "SELECT * FROM playlist_song WHERE playlist_id='$play_id' ORDER BY playlist_order DESC LIMIT 1";
                $returnobj = $con->query($query);
                if($returnobj->rowCount() == 0){
                    //this means there is no song in that playlist
                    $order = 1;
                }
                else{
                    //this means the song esist in that playlist We have to increment the order
                    $table = $returnobj->fetchAll();
                    foreach($table as $play){
                        $order = $play['playlist_order'];
                    }
                    $order = $order + 1;
                }

                //checking whelter the song already exist in the playlist or not
                $query = "SELECT * FROM playlist_song as pls JOIN playlist as pl ON pls.playlist_id = pl.id WHERE pls.song_id = '$song_id' AND pl.owner_id=$id";
                $returnobj = $con->query($query);
                if($returnobj->rowCount()!=0){
                    //this means the song already exists so we will show a message to user that this song already exist and then take the user to the home page
                    ?>
                        <script>
                            setTimeout(() => {
                                alert("Song already exist in your playlist");
                            }, 500);
                            setTimeout(() => {
                                location.assign('../../index.php');
                            }, 500);
                        </script>
                    <?php

                }
                else{
                    

                }
            }
            else{
                //playlist doesn't exist so we will have to show the error to the users
                ?>
                    <script>
                        setTimeout(() => {
                            alert("The play list name you have given doesn't exist");
                        }, 1000);
                        setTimeout(() => {
                            location.assign('../../index.php');
                        }, 1000);
                    </script>
                <?php
            }
        }
        else{
            ?>
                <script>location.assign('../../index.php')</script>
            <?php
        }
    }
    else{
        ?>
            <script>location.assign('../../login.php')</script>
        <?php
    }
?>