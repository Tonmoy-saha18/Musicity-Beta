<?php
    session_start();
    include("../config.php");//include the database connection file
    //checking whelter the user is logged in or not
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        if(isset($_POST['song-title']) && isset($_POST['song-duration']) && isset($_FILES['song-file']) &&
        isset($_FILES['demo-file']) && isset($_POST['album-name']) && isset($_POST['genre-name']) &&
        isset($_POST['charge'])){
            //taking the artist id first
            $name = $_SESSION['userLoggedIn'];
            $query = "SELECT * FROM users WHERE username = '$name'";
            $returnobj = $con->query($query);
            $table = $returnobj->fetchAll();
            foreach($table AS $user){
                $artistid = $user['id'];
            }
 
            //taking the value from user
            $title = $_POST['song-title'];
            $duration =$_POST['song-duration'];
           
            //taking the selected song file information
            $song = $_FILES['song-file'];
            $song_name = $song['name'];//taking the song name
            $from = $song['tmp_name'];//taking the temporal song path from server
            $song_to = "../../assets/music/$song_name"; //path where the song will be uploaded
            $song1 = "assets/music/$song_name";
 
            //taking the demo song data
            $demo = $_FILES['demo-file'];
            $demo_name = $demo['name']; //taking the demo song name
            $from_temp = $demo['tmp_name']; //takinh the temporary path from server
            $tem_to = "../../assets/music/demo/$demo_name"; //path where the demo song will be uploaded
            $tem1 = "assets/music/demo/$demo_name";
 
            //taking album name and calculate album id
            $album = $_POST['album-name'];
            $query = "SELECT * FROM albums WHERE artist_id=$artistid AND title='$album'";
            $returnobj = $con->query($query);
            $table = $returnobj->fetchAll();
            foreach($table AS $album){
                $album_id = $album['id'];
            }
 
            //taking genre name and calculate genre id
            $genre = $_POST['genre-name'];
            $query = "SELECT * FROM genre WHERE name='$genre'";
            $returnobj = $con->query($query);
            $table = $returnobj->fetchAll();
            foreach($table AS $genre){
                $genre_id = $genre['id'];
            }
 
            $set_charge = $_POST['charge'];
 
            //cheking the album order and set it by incrementing it
            $query = "SELECT * FROM songs as s JOIN albums a ON s.album_id=a.id
                    WHERE album_id = $album_id AND artist_id = $artistid ORDER BY album_order DESC LIMIT 1";
            $returnobj = $con->query($query);
            if($returnobj->rowCount()==0){
                //it means no song is upload in this album
                $album_order = 1;
            }
            else{
                //it means song is uploaded in this album so we will take last song and we will update the album order
                $table = $returnobj->fetchAll();
                foreach($table AS $album){
                    $album_order = $album['album_order'];
                    $album_order = $album_order + 1;
                }
            }
           
            if($set_charge == 'yes'){
                $insert_details = "INSERT INTO songs VALUES(NULL,'$title','$duration','$song1','$tem1',$album_order,0,1,$album_id,$artistid)";
                $con->exec($insert_details);
                move_uploaded_file( $from,$song_to);
                move_uploaded_file($from_temp,$tem_to);
            }
            else{
                $insert_details = "INSERT INTO songs VALUES(NULL,'$title','$duration','$song1','$tem1',$album_order,0,0,$album_id,$artistid)";
                $con->exec($insert_details);
                move_uploaded_file($from ,$song_to);
                move_uploaded_file($from_temp,$tem_to);
            }
            ?>
                <script>
                    setTimeout(() => {
                        alert('Song uploaded successfully')
                    }, 500);
 
                    setTimeout(() => {
                        location.assign('../../index.php')
                    }, 500)
                // location.assign('../../index.php')
               
                </script>
            <?php
        }
        else{
            ?>
                <script>location.assign('../../upload.php')</script>
            <?php
        }  
    }
    else{
        ?>
            <script>location.assign('../../register.php')</script>
        <?php
    }
?>