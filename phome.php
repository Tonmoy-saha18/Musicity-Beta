<?php
    include("includes/includedFiles.php");

    if(isset($_GET['userLoggedIn'])) {
        $username = $_GET['userLoggedIn'];
		$userLoggedIn = new User($con, $_GET['userLoggedIn']);
	}
	else {
	    header("Location: register.php");
	}
?>
<h1 class="pageHeadingBig">You Might Also Like</h1>

