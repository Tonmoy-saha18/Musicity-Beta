<?php
    session_start();
    include("includes/config.php");
    // checkig whelther admin is logged in or not
    if(isset($_SESSION['adminLoggedIn']) && !empty($_SESSION['adminLoggedIn'])){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
            <link rel="shortcut icon" type="/image/png" href="assets/images/titleimage.png">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
            <link rel="stylesheet" href="assets/css/genrelist.css">
            <title>Genre-list</title>
        </head>
        <body>
            <nav class="navbar navbar-light bg-success" style="border-bottom:2px solid black; position:sticky; top:0; width:100%;">
                <div class="container-fluid">
                    <a class="" href="admin-view.php" style="text-decoration: none; color:black; font-weight:bold;"><i class="fas fa-backward"></i> Back</a>
                    <a class="navbar-brand mx-auto" style="text-decoration: none; color:black; font-weight:bold;"href="genrelist.php">Genre List</a>
                </div>
            </nav>
            <div class="table">
                <table>
                    <th>Genre Id</th>
                    <th>Genre Name</th>
                    <th>     </th>
                    <?php
                        $query = "SELECT * FROM genre";
                        $retrurnobj = $con->query($query);
                        $table = $retrurnobj->fetchAll();
                        foreach ($table as $data){
                            ?>
                            <tr>
                                <td><?php echo $data['id']; ?></td>
                                <td><?php echo $data['name']; ?></td>
                                <td><a class="del" href="includes/handlers/delete-genre-handler.php?id=<?php echo $data['id']; ?>">Delete</a> </td>
                            </tr>
                        <?php
                        }
                    ?>
                </table>
                <div class="buttoncontainer">
                    <button class="btn btn-primary p-2" onclick="GenreCreation();"><i class="fas fa-plus-square"></i> Add genre</button>
                </div>
                   
            </div>
            <script>
                function GenreCreation(){
                    var a = prompt("Enter the genre name:");
                    if(a === null || a===""){
                        alert("Genre name can't be null or empty")
                    }
                    else{
                        location.assign("includes/handlers/genrelist-hander.php?gname="+a);
                    }
                }
            </script>
           
        </body>
        </html>
        <?php
    }
    else{
        ?>
            <script>location.assign('admin-login.php')</script>
        <?php
    }
?>
