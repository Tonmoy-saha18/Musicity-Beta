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
            $image_info = @getimagesize($_FILES['album-picture']['tmp_name']);
            //if the image file is valid it will insert the path into database and upload the file
            if($image_info){
                $title = $_POST['title'];
                $recieved_file = $_FILES['album-picture']; //recieving the file
                $image_name = $recieved_file['name']; //take the file name
                $from = $recieved_file['tmp_name']; // take the path where it temporaily store in database
                $to = "../../assets/images/artwork/$image_name";
                $f_to = "assets/images/artwork/$image_name";
 
                // inserting the details into albums table
                $insert_details = "INSERT INTO albums VALUES(NULL,'$title','$f_to',$artist_id)";
                $con->exec($insert_details);
 
                move_uploaded_file($from,$to);//moving the file to upload folder
                ?>
                    <script>
                    setTimeout(() => {
                        alert('Album created successfully')
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
 
 
