<!-- This is the homepage of our project -->
<?php
  session_start();
  if(isset($_SESSION['userLoggedIn']) && !empty($_SESSION['userLoggedIn'])){
    ?>
    <script>location.assign('home.php')</script>
    <?php
  }
  else{
    ?>
      <!doctype html>
      <html lang="en">
        <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
          <link rel="shortcut icon" type="image/png" href="assets/images/titleimage.png">
          <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


          <!-- Bootstrap CSS -->
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
          <link rel="stylesheet" href="assets/css/homepage.css">
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
          <link rel="preconnect" href="https://fonts.gstatic.com">
          <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
          <title>Musicity</title>
        </head>
        <body>
          <div class="background">
            <nav class="navbar navbar-expand-lg navbar-light transparent navbar-container p-2">
              <a class="navbar-brand" href="index.php"><i class="fas fa-podcast"></i> Musicity</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#contact-us">About Us <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="register.php" target="__blank">Sign Up</a>
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="login.php" tabindex="-1" aria-disabled="true" target="__blank">Login</a>
                  </li>
                </ul>
              </div>
            </nav>
            <section class="banner-section container-fluid">
              <div class="row banner-row">
                <div class="col-md-9 m-auto text-center text-light banner-colum">
                  <h1 class="display-5">Music gives a soul to the universe</h1>
                  <h1 class="display-5">Wings to the mind</h1>
                  <h1 class="display-5">Flight to the imagination</h1>
                  <h1 class="display-5">And life to everything.</h1>
                  <a href="#" target="__blank"><button class="btnedit p-3">Watch A Demo Video</button></a>
                </div>
              </div>
            </section>
          </div>
          <div class="container-fluid p-4 footer-section" id="contact-us">
            <div class="row">
                <div class="col-md-6"><h3 class="text-light logo"><i class="fas fa-podcast"></i>Musicity</h3></div>
                <div class="col-md-6 iconlink">
                  <a href="https://www.facebook.com/tonmoy.saha.969" target="__blank"><button class="icon1"><i class="fab fa-facebook"></i></button></a>
                  <a href="https://www.instagram.com/tonmoy548/?fbclid=IwAR0hAjZxAO37dTstw75FQt72l81RWtL67yJqyjJ9I7Uw4tJ5JwcDJCwSVUw" target="__blank"><button class="icon"><i class="fab fa-instagram"></i></button></a>
                  <a href="https://www.linkedin.com/in/tonmoy-saha-299050199/" target="__blank"><button class="icon"><i class="fab fa-linkedin"></i></button></a>
                </div>
              </div>
        </div>
          <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
        </body>
      </html>
    <?php
  }
?>