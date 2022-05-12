<?php
    session_start();
    include("../config.php");//include the database connection file
    //checking whelter the user is logged in or not
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        if(isset($_GET['id'])){
            //taking the user id first
            $name = $_SESSION['userLoggedIn'];
            $query = "SELECT * FROM users WHERE username = '$name'";
            $returnobj = $con->query($query);
            $table = $returnobj->fetchAll();
            foreach($table AS $user){
                $userid = $user['id'];
                $user_amount = $user['amount'];
            }

            //taking the artist id
            $podid = $_GET['id'];
            $query = "SELECT * FROM podcasts WHERE id=$podid";
            $returnobj = $con->query($query);
            $table = $returnobj->fetchAll();
            foreach($table AS $artist){
                $artistid = $artist['artist_id'];
            }
        }
    }
    else{
        ?>
            <script>location.assign('../../register.php')</script>
        <?php
    }
?>