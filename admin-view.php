<?php
    session_start();
    include("includes/config.php");
    if(isset($_SESSION['adminLoggedIn']) && !empty($_SESSION['adminLoggedIn'])){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <link rel="shortcut icon" type="/image/png" href="assets/images/titleimage.png">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <link rel="stylesheet" href="assets/css/admin-view.css">
            <title>Admin View</title>
        </head>
        <body>
            <nav class="navbar navbar-light bg-success">
                <div class="container-fluid">
                    <a class="navbar-brand" href="admin-view.php" style="font-weight: 500">Musicity Admin</a>
                    <a class="navbar-brand" href="genrelist.php" style="font-weight: 500">Genre List</a>
                    <a class="navbar-brand" href="song-list.php" style="font-weight: 500">Song list</a>
                    <a class="navbar-brand" href="includes/handlers/admin-logout-handler.php" style="font-weight: 500;">Logout</a>
                </div>
            </nav>
        </body>
        </html>
        <?php
    }
    else{
        ?>
            <script>location.assign('admin-login.php')</script>
        <?php
    }
?>