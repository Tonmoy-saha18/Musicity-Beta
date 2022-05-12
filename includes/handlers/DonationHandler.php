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

            //Inserting donation details to donation table
            $query = "INSERT INTO donation Values(NULL, $userid, $podid, 20)";
            $con->exec($query);

            //updating user account
            $user_updateamount = $user_amount - 20;
            $query = "UPDATE users SET amount=$user_updateamount WHERE id=$userid";
            $con->exec($query);

            //taking artist amount
            $query = "SELECT * FROM users WHERE id=$artistid";
            $returnobj = $con->query($query);
            $table = $returnobj->fetchAll();
            foreach($table as $artist){
                $amount = $artist['amount'];
            }

            //updating artist amount 
            $amount = $amount + 20;
            $query = "UPDATE users SET amount=$amount WHERE id=$artistid";
            $con->exec($query);

            
        }
    }
    else{
        ?>
            <script>location.assign('../../register.php')</script>
        <?php
    }
?>