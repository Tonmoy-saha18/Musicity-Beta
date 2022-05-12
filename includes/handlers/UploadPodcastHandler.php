<?php
    session_start();
    include("../config.php");//include the database connection file
    //checking whelter the user is logged in or not
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        if(isset($_POST['title']) && isset($_POST['duration']) && isset($_FILES['file-path']){
            
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