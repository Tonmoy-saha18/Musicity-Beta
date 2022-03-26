<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="/image/png" href="assets/images/titleimage.png">
    <link rel="stylesheet" href="assets/css/admin-login.css">
    <title>Admin Login-page</title>
</head>
<body>
    <div class="container">
        <form action="includes/handlers/admin-login-handler.php" method="post" class="inner-container">
            <h2 style="text-align: center;">Admin Login</h2>
            <p>
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username" placeholder="username" class="inp" placeholder>
            </p>
            <p>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" placeholder="password" class="inp" placeholder>
            </p>
            <button  class='btn' name="loginbtn">Login</button>
        </form>
    </div>
</body>
</html>
 
