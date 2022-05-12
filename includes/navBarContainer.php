<div id="navBarContainer">
	<nav class="navBar">

		<span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
			<img src="assets/images/titleimage.png">
		</span>

		<span class="useitem">User: <?php echo $_SESSION['userLoggedIn']?></span>

		<div class="group">

			<div class="navItem">
				<span role='link' tabindex='0' onclick='openPage("search.php")' class="navItemLink">
					Search
					<img src="assets/images/icons/search.png" class="icon" alt="Search">
				</span>
			</div>

		</div>

		<div class="group">
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('home.php')" class="navItemLink">Browse Songs</span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('phome.php')" class="navItemLink">Browse Podcasts</span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0" onclick="location.assign('createalbum.php')" class="navItemLink">Create Album</span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0"  onclick="location.assign('upload.php')" class="navItemLink">Upload Song</span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0"  onclick="location.assign('uploadpodcast.php')" class="navItemLink">Upload Podcast</span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Your Music</span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0" onclick="location.assign('transaction.php')" class="navItemLink">Transactions</span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0" onclick="location.assign('history.php')" class="navItemLink">Transactions History</span>
			</div>
			<div class="navItem">
				<span role="link" tabindex="0" onclick="location.assign('settings.php')" class="navItemLink">Your Profile</span>
			</div>
		</div>

	</nav>
</div>