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
               
                <div class="container">
                      <div class="row">
                        <div class="transaction col-5">
                          <h4><i class="fas fa-history"></i> Transaction History</h4>
                          <?php
                            $username = $_SESSION['userLoggedIn']; //taking the username
                            //taking the user id
                            $query = "SELECT * FROM users Where username = '$username'";
                            $userobj = $con->query($query);
                            $user = $userobj->fetch();
                            $userid = $user['id'];
 
                            //here we will take transaction table history of the user
                            $transactionquery = "SELECT * FROM transaction WHERE user_id = $userid";
                            $returnobj = $con->query($transactionquery);
                            $transaction = $returnobj->fetchAll();
                            ?>
                                <table class="t1">
                                    <thead>
                                        <tr>
                                          <th>Transaction ID</th>
                                          <th>Transaction Date</th>
                                          <th>Amount</th>
                                          <th> Transaction Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                        foreach ($transaction as $tr){
                                            ?>
                                                <tr>
                                                    <td> <?php echo $tr['id'];?> </td>
                                                    <td> <?php echo $tr['transaction_date'];?> </td>
                                                    <td> <?php echo $tr['amount'];?> </td>
                                                    <td><?php echo $tr['description'];?></td>
                                                </tr>
                                            <?php
                                        }
                                      ?>
                                    </tbody>
                                </table>
                            <?php
 
                          ?>
                        </div>
                        <div class="purchase col-5">
                          <h4 class="t2"> <i class="fas fa-history"></i> Purchase History</h4>
                          <?php
                            $username = $_SESSION['userLoggedIn']; //taking the username
                            //taking the user id
                            $query = "SELECT * FROM users Where username = '$username'";
                            $userobj = $con->query($query);
                            $user = $userobj->fetch();
                            $userid = $user['id'];
 
                            //here we will take song purchase history of the user
                            $transactionquery = "SELECT * FROM history WHERE user_id = $userid";
                            $returnobj = $con->query($transactionquery);
                            $transaction = $returnobj->fetchAll();
 
                            ?>
                                
                                
                                       
                            <?php
 
                          ?>
                        </div>
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
?>

