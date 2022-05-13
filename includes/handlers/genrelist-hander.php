<?php
    session_start();
    include("../config.php");
    // checkig whelther admin is logged in or not
    if(isset($_SESSION['adminLoggedIn']) && !empty($_SESSION['adminLoggedIn'])){
        $genrename = $_GET['gname'];
        // checking whelther this genre exist or not
        $query = "SELECT * FROM genre WHERE name = '$genrename'";
        $returnobj = $con->query($query);
        if($returnobj->rowCount()>0){
            ?>
             <script>
                    setTimeout(() => {
                        alert("This genre already exists");
                    }, 500);
                    setTimeout(() => {
                        location.assign('../../genrelist.php');
                    }, 500);
            </script>
            <?php
        }
        else{
            $insertquery = "INSERT INTO genre VALUES(NULL,'$genrename')";
            $con->exec($insertquery);
            ?>
             <script>
                    setTimeout(() => {
                        alert("Genre created succesfully!");
                    }, 500);
                    setTimeout(() => {
                        location.assign('../../genrelist.php');
                    }, 500);
            </script>
            <?php
        }
    }
    else{
        ?>
        <script>
            location.assign("../../admin-login.php');
        </script>
        <?php
    }
   
?>
