<?php
    session_start();
    include("../config.php");
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        if(isset($_GET['sid']) && !empty($_GET['sid']) && isset($_GET['pname']) && !empty($_GET['pname'])){
            
            }
            else{
                //playlist doesn't exist so we will have to show the error to the users
                ?>
                    
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