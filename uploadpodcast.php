<?php
    //starting the session
    session_start();
    include("includes/config.php");
    // check whelter the user is logged in or not
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <link rel="shortcut icon" type="/image/png" href="assets/images/titleimage.png">
            <title>UploadPodcast</title>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="assets/css/uploadpodcast.css">
        </head>
        <body>
        <a href="index.php" style="cursor: pointer; text-decoration: none; background-color:transparent; color:white; margin:10px; padding:7px; position:fixed; border:2px solid green; border-radius:10px;"><i class="fas fa-backward"></i> Back </a>
            <div class='login'>
                <h2>Upload Podcast</h2>
                <form action="includes/handlers/UploadPodcastHandler.php" method="post" enctype="multipart/form-data">
                    <i class="fas fa-music"></i>
                    <input name='title' placeholder='Podcast Title' type='text' required>
                    <br>
                    <i class="fas fa-clock"></i>
                    <input name='duration' placeholder='Podcast Duration (mm:ss)' type='text' required>
                    <input name='file-path' placeholder='choosepodacast' type='file' required>
                    <!-- <input id='pw' name='password' placeholder='Password' type='password'>
                    <input name='email' placeholder='E-Mail Address' type='text'> -->
                    <div class='agree'>
                    </div>
                    <input class='animated' type='submit' value='Upload'>
                </form>
            </div>
        </body>
        </html>
        <?php
    }
    else{
        ?>
        <script>location.assign('login.php')</script>
        <?php
    }
?>