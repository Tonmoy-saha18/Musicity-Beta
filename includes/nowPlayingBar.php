<?php
$id=$userLoggedIn->getUserId();
$songQuery = "SELECT s.id
                    FROM songs as s  
                    JOIN user_preference as u
                         on u.genre_id = s.genre_id
                    WHERE u.user_id=$id
                    ORDER BY RAND() LIMIT 10";
$returnobj=$con->query($songQuery);
$data=$returnobj->fetchAll();
$resultArray=array_column($data, 'id');
$jsonArray = json_encode($resultArray);
?>
