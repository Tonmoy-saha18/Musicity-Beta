<?php
 
  include("includes/config.php");
  include("includes/classes/Account.php");
  include("includes/classes/Constants.php");
 
  $account = new Account($con);
 
  // include("includes/handlers/register-handler.php");
  include("includes/handlers/login-handler.php");
 
  function getInputValue($name) {
  if(isset($_POST[$name])) {
    echo $_POST[$name];
  }
}
 
?>
<!-- This is login page design -->
 
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/jpg" href="assets/images/titleimage.png">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login.css">
 
    <title>Login Musicity</title>
  </head>
  <body>
      <div class="container-fluid background">
          <div class="form-container">
              <h2>Musicity Login</h2>
            <form action="login.php" class="inner-container" method="POST">
                <p>
                    <label for="username"><i class="fas fa-user-circle"></i> Username </label><br>
                    <input type="text" placeholder="username" name="loginUsername" id="loginUsername" value="<?php getInputValue('loginUsername'); ?>" required>
                    <?php echo $account->getError(Constants::$loginFailed);  ?>
                </p>
                <p>
                    <label for="password"><i class="fas fa-lock"></i> Password </label><br>
                    <input type="password" placeholder="password" name="loginPassword" id="loginPassword" required>
                </p>
                <button class="btn loginbtn" name="loginButton">Log in</button>
                <p class="checker-section">Don't have any account?<a href="register.php"> Create one.</a></p>
              </form>
          </div>
      </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  </body>
</html>
