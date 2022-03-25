<?php
	ob_start();

	$timezone = date_default_timezone_set("Asia/Dhaka");
	try{
		$con=new PDO('mysql:host=localhost:3306;dbname=musicity2;','root','');
		$con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $ex){
		?>
			<script>location.assign('register.php')</script>
		<?php
	}
?>