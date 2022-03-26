<?php
    session_start();
    // checking whelter the user is logged in or not
    include("includes/config.php");
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        ?>
            <!doctype html>
            <html lang="en">
                <head>
                  <!-- Required meta tags -->
                  <meta charset="utf-8">
                  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
 
                  <!-- Bootstrap CSS -->
                  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
                  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
                  <link rel="shortcut icon" type="/image/png" href="assets/images/titleimage.png">
                  <link rel="stylesheet" href="assets/css/history.css">
 
                  <title>Transactions History</title>
                </head>
                <body>
                <nav class="navbar navbar-light bg-primary" style="border-bottom:2px solid gray; box-shadow:1px 5px aquamarine; position:sticky; top:0; width:100%;">
                  <div class="container-fluid">
                    <a class="" href="index.php" style="text-decoration: none; color:black; font-weight:bold;"><i class="fas fa-backward"></i> Back</a>
                    <a class="navbar-brand mx-auto" style="text-decoration: none; color:black; font-weight:bold;"href="history.php">Transaction History</a>
                  </div>
                </nav>
               
                  
                  </div>
 
 
                  <!-- Option 2: Separate Popper and Bootstrap JS -->
                 
                  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
                 
                </body>
            </html>
        <?php
    }
?>

