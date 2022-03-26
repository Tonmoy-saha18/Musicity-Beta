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
	<div class="container">
		<h2>PASSWORD</h2>
		<input type="password" class="oldPassword" name="oldPassword" placeholder="Enter Current password">
		<input type="password" class="newPassword1" name="newPassword1" placeholder="Enter New password">
		<input type="password" class="newPassword2" name="newPassword2" placeholder="Confirm New password">
		<span class="message"></span>
		<button class="button" onclick="updatePassword('oldPassword', 'newPassword1', 'newPassword2')">SAVE</button>
	</div>

</div>