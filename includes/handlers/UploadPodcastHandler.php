<?php
    session_start();
    include("../config.php");//include the database connection file
    //checking whelter the user is logged in or not
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        //checking whelther all data is recieved or not.
        if(isset($_POST['title']) && isset($_POST['duration']) && isset($_FILES['file-path']){
            //taking the artist id first
            $name = $_SESSION['userLoggedIn'];
            $query = "SELECT * FROM users WHERE username = '$name'";
            $returnobj = $con->query($query);
            $table = $returnobj->fetchAll();
            foreach($table AS $user){
                $artistid = $user['id'];
            }

            //taking the value from user
            $title = $_POST['title'];
            $duration =$_POST['duration'];

            //taking podcast path
            //taking the selected podcast file information
            $podcast = $_FILES['file-path'];
            $podcast_name = $podcast['name'];//taking the podcast name
            $from = $podcast['tmp_name'];//taking the temporal podcast path from server
            $podcast_to = "../../assets/podcast/$podcast_name"; //path where the podcast will be uploaded
            $podcast_location = "assets/podcast/$podcast_name";
        }
            ?>
                <script>
                    setTimeout(() => {
                        alert('podcast uploaded successfully')
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