<?php
include("includes/includedFiles.php");
?>

<div class="userDetails">

	<div class="container borderBottom">
		<h2>EMAIL</h2>
		<input type="text" class="email" name="email" placeholder="Email address..." value="<?php echo $userLoggedIn->getEmail(); ?>">
		<span class="message"></span>
		<button class="button" onclick="updateEmail('email')">SAVE</button>
	</div>
	<div class="container borderBottom">
		<h2>Description</h2>
		​<textarea class="description" rows="10" cols="130"><?php echo $userLoggedIn->getDescription(); ?></textarea>
		<span class="message"></span>
		<button class="button" onclick="updateDescription('description')">SAVE</button>
	</div>	
	

</div>