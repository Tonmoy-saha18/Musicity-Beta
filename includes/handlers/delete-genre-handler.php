<?php
    session_start();
    //include the database connection file
    include("../config.php");
    if(isset($_SESSION['adminLoggedIn']) && !empty($_SESSION['adminLoggedIn'])){
        //
        if(isset($_GET['id']) && !empty($_GET['id'])){
            $id = $_GET['id'];
            $query = "DELETE FROM genre WHERE id=$id";
            $con->exec($query);
 
            //after deleting the report succesfully it will again go to admin-view page
            ?>
                <script>
                    setTimeout(() => {
                        alert("Genre deleted from the database succesfully");
                    }, 500);
                    setTimeout(() => {
                        location.assign('../../genrelist.php');
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
