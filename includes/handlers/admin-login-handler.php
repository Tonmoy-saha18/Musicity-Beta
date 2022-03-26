<?php
    include("../config.php");
    if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
 
        $query = "SELECT * FROM admin WHERE username='$username' AND pasword='$password'";
        $returnobj = $con->query($query);
 
        if($returnobj->rowCount()==1){
            session_start();
            $_SESSION['adminLoggedIn'] = $username;
            ?>
                <script>location.assign("../../admin-view.php")</script>
            <?php
        }
        else{
            ?>
                <script>location.assign("../../admin-login.php")</script>
            <?php
        }
    }
?>
