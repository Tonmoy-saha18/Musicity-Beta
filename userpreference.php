<?php
    include("includes/classes/Account.php");
    // include("includes/handlers/userpreference.php");
    session_start();
    include("includes/config.php");
 
    if(isset($_SESSION['userpreferance']) && !empty($_SESSION['userpreferance'])){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shortcut icon" type="/image/png" href="assets/images/titleimage.png">
            <link rel="stylesheet" href="assets/css/userpreference.css">
            <title>User Preferance</title>
        </head>
        <body>
            <div class="maincontainer">
                    <h4>What type of music you want to listen?</h4>
                    <form action="includes/handlers/userpreference-handler.php" method="get" class="preferanceform">
                        <?php
                            $query = "SELECT * FROM genre";
                            $returnobj = $con->query($query);
                            $table = $returnobj->fetchAll();
                            foreach ($table as $gnr){
                                ?>
                                    <p>
                                        <input type="checkbox" id="<?php echo $gnr['name']; ?>" value="<?php echo $gnr['name']; ?>" name="userchoice[]">
                                        <label for="<?php echo $gnr['name']; ?>"> <?php echo $gnr['name']; ?></label>
                                    </p>
                                <?php
                            }
 
                        ?>
                        <button class='btn' name="submitButton">Submit</button>
                    </form>
            </div>
        </body>
        </html>
        <?php
    }
    else{
        ?>
            <script>location.assign('signup.php')</script>
        <?php
    }
?>