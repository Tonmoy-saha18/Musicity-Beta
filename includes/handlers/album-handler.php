<?php
    session_start();
    include("../config.php"); // include the connection file here
    // checking whelter the user is logged in or not
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        if(isset($_POST['title']) && isset($_FILES['album-picture'])){
            //taking the users user_id which is known as artist_id
            $username = $_SESSION['userLoggedIn'];
            $query = "SELECT * FROM users WHERE username = '$username'";
            $returnobj = $con->query($query);
            $table = $returnobj->fetchAll();
            foreach($table as $user){
                $artist_id = $user['id'];
            }
            //checking the image is valid or not/the choosen file is image or not
            
                <?php
            }
            else{
                ?>
                    <script>location.assign('../../createalbum.php')</script>
                <?php
            }
 
        }
        else{
            ?>
                <script>location.assign('../../createalbum.php')</script>
            <?php
        }
    }
    else{
        ?>
            <script>location.assign('../../register.php')</script>
        <?php
    }
?>
 
 
