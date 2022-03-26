<?php
    if(isset($_POST['loginButton'])) {
        //Login button was pressed
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];
   
        $result = $account->login($username, $password);
   
        if($result) {
            session_start();
            $_SESSION['userLoggedIn'] = $username;
            // header("Location: home.php");
            ?>
                <script>location.assign('home.php')</script>
            <?php
        }
   
    }
?>