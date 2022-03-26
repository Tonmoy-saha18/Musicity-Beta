<?php
    session_start();
    include("includes/config.php");
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
            <link rel="stylesheet" href="assets/css/admin-view.css">
            <title>Admin View</title>
        </head>
        <body>
            <nav class="navbar navbar-light bg-success">
                <div class="container-fluid">
                    <a class="navbar-brand" href="admin-view.php" style="font-weight: 500">Musicity Admin</a>
                    <a class="navbar-brand" href="genrelist.php" style="font-weight: 500">Genre List</a>
                    <a class="navbar-brand" href="song-list.php" style="font-weight: 500">Song list</a>
                    <a class="navbar-brand" href="includes/handlers/admin-logout-handler.php" style="font-weight: 500;">Logout</a>
                </div>
            </nav>
            <div class="container-fluid table-container">
                <h3 style="margin-top:15px; text-align:center; padding:5px; border-bottom:2px solid gray; width:98%; margin-left:12px;"><i class="fas fa-bullhorn"></i> Reports List</h3>
                <table>
                    <tr>
                        <th>Report ID</th>
                        <th>DateTime of Report</th>
                        <th>Reporter ID</th>
                        <th>Reported Song Title</th>
                        <th>Reported Song ID</th>
                        <th>Reporter Message</th>
                        <th>Decissions</th>
                    </tr>
                    <?php
                        $query = "SELECT * FROM reports ORDER BY report_date DESC";
                        $returnobj = $con->query($query);
                        $table = $returnobj->fetchAll();
                        if($returnobj->rowCount()>0){
                            foreach($table as $report){
                                //taking the report details
                                $id = $report['id'];
                                $date = $report['report_date'];
                                $reporter_id = $report['user_id'];
                                $song_id = $report['song_id'];
                                $message = $report['message'];
                            
                                //taking the song title 
                                $query2 = "SELECT * FROM songs WHERE id=$song_id";
                                $returnobj2 = $con->query($query2);
                                $table2 = $returnobj2->fetchAll();
                                foreach($table2 as $song){
                                    $song_title = $song['title'];
                                }
                                ?>
                                    <tr>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $date; ?></td>
                                        <td><?php echo $reporter_id; ?></td>

                                        <td><button style="background-color:transparent; border:0px; font-weight:700; border-bottom:2px solid blue;" class="link" onMouseover="this.style.color='blue'" onMouseOut="this.style.color='black'" onclick="GetSong(<?php echo $song_id; ?>)"><?php echo $song_title; ?></button></td>

                                        <td><button style="background-color:transparent; border:0px; font-weight:700; border-bottom:2px solid blue;" class="link" onMouseover="this.style.color='blue'" onMouseOut="this.style.color='black'" onclick="GetSong(<?php echo $song_id; ?>)"><?php echo $song_id; ?></button></td>

                                        <td><?php echo $message; ?></td>

                                        <td><button class="btn-danger p-1 btn-sm" onclick="DeleteSongAndReport(<?php echo $song_id; ?>,<?php echo $id; ?>);"><i class="fas fa-trash-alt"></i> Delete Song</button> <button class="btn-success p-1 mx-2 btn-sm" onclick="DeleteReport(<?php echo $id; ?>)"><i class="fas fa-window-close"></i> Decline Reports</button></td>
                                    </tr>
                                <?php
                            }
                        }
                        else{
                            ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>No Report Found</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php
                        }
                    ?>
                
                </table>    

            </div>
    
            <script>
                function DeleteSongAndReport(songid,reportid){
                    var flag = confirm("Do you want to delete this song?")
                    if(flag){
                        location.assign('includes/handlers/reported-deletesongreport-handler.php?songid='+songid+"&reportid="+reportid);
                    }
                    else{
                        location.assign('admin-view.php');
                    }
                    // location.assign('includes/handlers/reported-deletesongreport-handler.php?songid='+songid+"&reportid="+reportid);
                }
                function DeleteReport(reportid){
                    var flag = confirm("Do you want to delete this report?")
                    if(flag){
                        location.assign('includes/handlers/delete-report-handler.php?reportid='+reportid);
                    }
                    else{
                        location.assign('admin-view.php');
                    }
                    // location.assign('includes/handlers/delete-report-handler.php?reportid='+reportid);
                }
                function GetSong(songid){
                    location.assign('admin-GetClickSong.php?sid='+songid);
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