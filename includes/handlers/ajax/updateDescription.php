<?php
include("../../config.php");

if(!isset($_POST['username'])) {
	echo "ERROR: Could not set username";
	exit();
}

if(isset($_POST['description']) && $_POST['description'] != "") {

	$username = $_POST['username'];
	$description = $_POST['description'];

	$updateQuery = "UPDATE users SET description = '$description' WHERE username='$username'";
	$con->exec($updateQuery);
	echo "Update successful";

}
else {
	echo "You must provide an email";
}

?>