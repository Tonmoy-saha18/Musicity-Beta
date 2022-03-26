<?php
    //starting the session
    session_start();
    include("includes/config.php");
    // check whelter the user is logged in or not
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        ?>
        <?php
            $name = $_SESSION['userLoggedIn'];
            $query = "SELECT * FROM users WHERE username = '$name'";
            $returnobj = $con->query($query);
            $table = $returnobj->fetchAll();
            foreach($table AS $user){
                $artistid = $user['id'];
            }
            $query = "SELECT * FROM albums WHERE artist_id = '$artistid'";
            $returnobj = $con->query($query);
            if($returnobj->rowCount()>0){
                ?>
                    <!doctype html>
                    <html lang="en">
                    <head>
                        <!-- Required meta tags -->
                        <meta charset="utf-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
                        <link rel="shortcut icon" type="/image/png" href="assets/images/titleimage.png">
                        <!-- Bootstrap CSS -->
                        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
                        <link rel="stylesheet" href="assets/css/upload.css">
                        <title>Upload Your Music</title>
                    </head>
                    <body>
                        <div class="container-fluid background">
                            <a href="index.php" style="cursor: pointer; text-decoration: none; background-color:transparent; color:white; margin:10px; padding:7px; position:fixed; border:2px solid orangered; border-radius:10px;"><i class="fas fa-backward"></i> Back </a>
                           
                            <div class="inner-container">
                                <h2>Upload Your Song</h2>
                                <form action="includes/handlers/upload-handler.php" method="post" class="uploadform" enctype="multipart/form-data">
                                    <p>
                                        <label for="song-title"><i class="fas fa-music"></i> Song Title</label> <br>
                                        <input type="text" name="song-title" id="song-title" class="inp" required>
                                    </p>
                                    <p>
                                        <label for="song-duration"><i class="fas fa-clock"></i> Song Duration</label><br>
                                        <input type="text" id="song-duration" name="song-duration" class="inp" placeholder="mm:ss"required>
                                    </p>
                                    <p>
                                        <label for="song-file"><i class="fas fa-check-square"></i> Select Song</label><br>
                                        <input type="file" id="song-file" name="song-file" required>
                                    </p>
                                    <p>
                                        <label for="demo-file"><i class="fas fa-check-square"></i> Select Demo Song</label><br>
                                        <input type="file" id="demo-file" name="demo-file" required>
                                    </p>
                                    <p>
                                        <label for="album-name"><i class="fas fa-compact-disc"></i> Select Album</label><br>
                                        <select name="album-name" id="album-name" class="inp" required>
                                            <?php
                                                //taking the user id
                                                $name = $_SESSION['userLoggedIn'];
                                                $query = "SELECT * FROM users WHERE username = '$name'";
                                                $returnobj = $con->query($query);
                                                $table = $returnobj->fetchAll();
                                                foreach ($table as $user){
                                                    $user_id = $user['id'];
                                                }
 
                                                $album_query = "SELECT * from albums WHERE artist_id = '$user_id'";
                                                $returnobj = $con->query($album_query);
                                                $album_table = $returnobj->fetchAll();
 
                                                foreach ($album_table as $album){
                                                    $album_name = $album['title'];
                                                    ?>
                                                        <option style="color:black;" value="<?php echo $album_name?>"><?php echo $album_name?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </p>
                                    <p>
                                        <label for="genre-name"><i class="fas fa-guitar"></i> Select Genre</label><br>
                                        <select name="genre-name" id="genre-name" class="inp" required>
                                            <?php
                                                $genre_query = "SELECT * FROM genre";
                                                $returnobj = $con->query($genre_query);
                                                $genre_table = $returnobj->fetchAll();
 
                                                foreach ($genre_table as $genre){
                                                    $genre_name = $genre['name'];
                                                    ?>
                                                        <option style="color:black;" value="<?php echo $genre_name?>"><?php echo $genre_name?></option>
                                                    <?php
                                                }
                                            ?>
                                        </select>
                                    </p>
                                    <p>
                                        <label for="charge"><i class="fas fa-check-circle"></i> Do you want to charge that song?</label><br>
                                        <input type="radio" value="yes" id="charge" name="charge"> <label for="yes">Yes</label> <br>
                                        <input type="radio" value="no" id="charge" name="charge"> <label for="no">No</label> <br>
                                    </p>
                                    <button class="btn button" name="submit">Submit</button>
                                </form>
                            </div>
                        </div>
 
 
                        <!-- Option 2: Separate Popper and Bootstrap JS -->
                       
                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
                   
                    </body>
                    </html>
                <?php
            }
            else{
                ?>
                    <script>
                        setTimeout(() => {
                                alert("You don't Have any album. Create an album first to upload a song");
                        }, 500);
                        setTimeout(() => {
                            location.assign('createalbum.php')
                        }, 500)
                        // location.assign('createalbum.php')
                    </script>
                <?php
            }
        ?>
        <?php
    }
    else{
        ?>
            <script>location.assign('login.php')</script>
        <?php
    }
?>
 

