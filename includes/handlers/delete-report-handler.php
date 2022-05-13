<?php
    session_start();
    //include the database connection file
    include("../config.php");
    if(isset($_SESSION['adminLoggedIn']) && !empty($_SESSION['adminLoggedIn'])){
        //
        if(isset($_GET['reportid']) && !empty($_GET['reportid'])){
            $id = $_GET['reportid'];
            $query = "DELETE FROM reports WHERE id=$id";
            $con->exec($query);