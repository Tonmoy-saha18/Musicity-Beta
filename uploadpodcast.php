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
            <link rel="shortcut icon" type="/image/png" href="assets/images/titleimage.png">
            <title>UploadPodcast</title>
            <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
            <link href='https://fonts.googleapis.com/css?family=Sofia' rel='stylesheet' type='text/css'>
            <link rel="stylesheet" href="assets/css/uploadpodcast.css">
        </head>
        <body>
        <div class='login'>
            <h2>Upload Podcast</h2>
            <form action="" method="post">
                <input name='username' placeholder='Username' type='text'>
                <input id='pw' name='password' placeholder='Password' type='password'>
                <input name='email' placeholder='E-Mail Address' type='text'>
                <div class='agree'>
                    <input id='agree' name='agree' type='checkbox'>
                    <label for='agree'></label>Accept rules and conditions
                </div>
                <input class='animated' type='submit' value='Register'>
            </form>
            <a class='forgot' href='#'>Already have an account?</a>
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