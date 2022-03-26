<?php
    session_start();
    // include the database connection file
    include("../config.php");
    // checking whelter the user is logged in or not
    if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
        $name = $_SESSION['userLoggedIn'];
        $userquery = "SELECT * FROM users WHERE '$name' = username";
        $returnobj = $con->query($userquery);
        $user = $returnobj->fetchAll();
        $date = date("Y-m-d H:i:s");
        $amount = $_POST['amount']; //money user wants to cash in/cash out from the account
        $type = $_POST['trtype'];
        $operator = $_POST['operator'];
        $account_number = $_POST['act_num'];
        foreach($user AS $onlyuser){
            $id = $onlyuser['id'];
            $amount2 = $onlyuser['amount']; //money user has in his account
        }
        if($type=="Cash in"){
            $details = "INSERT INTO transaction VALUES(NULL,'$date','$id',$amount,'$type','$operator','$account_number')";
            $con->exec($details);
            $updateamount = $amount + $amount2;
            // print_r($updateamount);
            $userupdate = "UPDATE users SET amount=$updateamount WHERE username='$name'";
            // print_r($userupdate);
            $con->exec($userupdate);
 
            ?>
                <script>
                    setTimeout(() =>{
                        alert('Your transaction is successful');
                    }, 500)
                    setTimeout(() =>{
                        location.assign("../../index.php")
                    }, 500)
                </script>
            <?php
        }
        else{
            if($amount2 >= $amount){ //checking whelter he has enough money in his account to cash out
                $details = "INSERT INTO transaction VALUES(NULL,'$date','$id',$amount,'$type','$operator','$account_number')";
                $con->exec($details);
                $updateamount = $amount2 - $amount;
                // print_r($updateamount);
                $userupdate = "UPDATE users SET amount=$updateamount WHERE username='$name'";
                // print_r($userupdate);
                $con->exec($userupdate);
                ?>
                    <script>
                        setTimeout(() =>{
                            alert('Your transaction is successful');
                        }, 500)
                        setTimeout(() =>{
                            location.assign("../../index.php")
                        }, 500)
                    </script>
                <?php
            }
            else{
                ?>
                    <script>
                        setTimeout(() => {
                            alert("You don't have enough money in your account");
                        }, 500);
                        setTimeout(() =>{
                            location.assign('../../transaction.php');
                        }, 500)
                    </script>
                <?php
               
            }
        }
    }
    else{
        ?>
            <script>location.assign("../../register.php")</script>
        <?php
    }
?>
 
 
