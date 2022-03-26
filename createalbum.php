<?php
    session_start();
    // checking whelter the user is logged in or not
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" type="/image/png" href="assets/images/titleimage.png">
            <link rel="stylesheet" href="assets/css/createalbum.css">
            <title>Album Creation</title>
        </head>
        <body>
            <div class="maincontainer">
                <div class="innercontainer">
                    <h2>Create your album</h2>
                    <form action="includes/handlers/album-handler.php" method="post" class="formcontainer" enctype="multipart/form-data">
                        <p>
                            <label for="title">Album title:</label><br>
                            <input type="text" name="title" id="title" class="in" placeholder="Title Of Your Album" required>
                        </p>
                        <p>
                            <label for="album-picture">Select Image:</label><br>
                            <input type="file" name="album-picture" id="album-picture" required>
                        </p>
                        <button class="btn">Submit</button> <br>
                        <a href="index.php" style="cursor: pointer; text-decoration: none; background-color:transparent; color:black;padding:7px; position:fixed; display:block; margin-left:100px; margin-top:10px;"><< Back </a>
                    </form>
                </div>
            </div>
        </body>
        </html>
        <?php
    }
    else{
        ?>
            <script>location.assign("login.php")</script>
        <?php
    }
?>
