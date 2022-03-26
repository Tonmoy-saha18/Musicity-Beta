<?php
    session_start();
    include("includes/config.php");
    // checkig whelther admin is logged in or not
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
            <link rel="stylesheet" href="assets/css/song-list.css">
            <title>Song-list</title>
        </head>
        <body>
            <div class="fluid-container">
                <nav class="navbar navbar-light bg-success" style="border-bottom:2px solid black; position:sticky; top:0;   width:100%;">
                    <div class="container-fluid">
                        <a class="" href="admin-view.php" style="text-decoration: none; color:black; font-weight:bold;"><i class="fas fa-backward"></i> Back</a>
                        <a class="navbar-brand mx-auto" style="text-decoration: none; color:black; font-weight:bold;"href="song-list.php">Song List</a>
                    </div>
                </nav>
                <?php
                    $song_id = $_GET['sid'];
                    $query = "SELECT * FROM songs WHERE id=$song_id";
                    $returnobj = $con->query($query);
                    $table = $returnobj->fetchAll();
                    foreach ($table as $song){
                        ?>
                         <div class="song-list">
                            <div class="indiv">
                                <h5><?php echo $song['id']; ?></>
                                <h5><?php echo $song['title']; ?></h5><br>
                                <audio controls>
                                    <source src="<?php echo $song['song_path'];?>" type="audio/mp3">
                                </audio>
                            </div>
                        </div>
                        <?php
                    }
                ?>
            </div>
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