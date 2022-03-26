<?php
    include("includes/config.php");
    session_start();
   
    // checking whelter the user is logges in or not
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
             <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
            <link rel="stylesheet" href="assets/css/login.css">
            <link rel="stylesheet" href="assets/css/transaction.css">
            <title>Transaction page</title>
        </head>
        <body>
            <div class="container-fluid maincontainer">
                <a href="index.php" style="cursor: pointer; text-decoration: none; background-color:aqua; color:black; margin:30px; padding:8px; position:fixed; border:2px solid aqua; border-radius:10px; font-weight:bold;"><i class="fas fa-backward"></i> Back </a>
                <div class="innercontainer">
                        <p class='user'>
                            <?php
                                echo "<i class='fas fa-user'></i> Username: ".$_SESSION['userLoggedIn'];
                                $name = $_SESSION['userLoggedIn'];
                                $getdetails = "SELECT * FROM users WHERE username = '$name'";
                                $returnobj = $con->query($getdetails);
                                $user = $returnobj->fetchAll();
                                foreach($user AS $only_users){
                                    $amount = $only_users['amount'];
                                }
                                echo "<br><i class='fa fa-dollar-sign'></i> Current Amount: ".$amount;
                            ?>
                        </p>
                        <form action="includes/handlers/transaction-handler.php" method="post" class="formcontainer">
                            <p>
                                <label for="operator"><i class="fas fa-money-check-alt"></i> Select Operator</label>
                                <select style="background:transparent;border:0;outline:none;border-bottom:2px solid white;color:white;font-weight:400;" id="operator" name="operator" class="form-control">
                                    <option style="color:black;" value="Bkash">Bkash</option>
                                    <option style="color:black;" value="Rocket">Rocket</option>
                                    <option style="color:black;" value="Nagad">Nagad</option>
                                    <option style="color:black;" value="Paypal">Paypal</option>
                                    <option style="color:black;" value="Master card">Master card</option>
                                </select>
                            </p>
                            <p>
                                <label for="accountnum"><i class="fas fa-file-invoice"></i> Account Number</label>
                                <input type="text" name="act_num" id="amount" placeholder="Enter the account number" required>
                            </p>
                            <p>
                                <label for="amount"><i class="fas fa-coins"></i> Amount:</label><br>
                                <input type="text" name="amount" id="amount" placeholder="Enter the amount" required>
                            </p>
                            <p>
                                <label><i class="fas fa-hand-holding-usd"></i> Transaction type:</label>
                            </p>
                            <p>
                                <input type="radio" name="trtype" id="trtype" value="Cash in" required> <label for="trtype">Cash in</label>
                            </p>
                            <p>
                                <input type="radio" name="trtype" id="trtype" value="Withdraw" required> <label for="trtype">Withdraw</label>
                            </p>
                            <button class="btn" name="submit">Submit</button>
                           
                        </form>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
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
 
 
