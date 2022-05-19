<?php
include("includes/includedFiles.php");

if(isset($_GET['id'])) {
	$artistId = $_GET['id'];
	if(isset($_GET['userLoggedIn'])) {
		$userLoggedIn = new User($con, $_GET['userLoggedIn']);
		$id = $userLoggedIn->getUserId();
	}
	else {

	header("Location: register.php");
	}
}
else {
	header("Location: index.php");
}

$artist = new Artist($con, $artistId);
?>

<div class="entityInfo borderBottom">

	<div class="centerSection">

		<div class="artistInfo">

			<h1 class="artistName"><?php echo $artist->getName(); ?></h1>
			<h3 class="artistDescription"><?php echo $artist->getDescription(); ?> </h3>

			<div class="headerButtons">
				<button class="button green" onclick="playFirstSong()">PLAY</button>
			</div>

		</div>

	</div>

</div>

<div class="tracklistContainer borderBottom">
	<h2>SONGS</h2>
	<ul class="tracklist">
		
		<?php
		$songIdArray = $artist->getSongIds();

		$i = 1;
		foreach($songIdArray as $songId) {

			if($i > 5) {
				break;
			}

			$albumSong = new Song($con, $songId);
			$albumArtist = $albumSong->getArtist();

			//taking song details
			$songquery = "SELECT * FROM songs WHERE id=$songId";
			$returnobj = $con->query($songquery);
			$songInfo = $returnobj->fetch();
			
			$charge = $songInfo['set_charge'];
			?>
				<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick="setTrack(<?php echo $albumSong->getId(); ?>, tempPlaylist, true)">
						<span class='trackNumber'><?php echo $i; ?></span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'><?php echo $albumSong->getTitle(); ?></span>
						<span class='artistName'><?php echo $albumArtist->getName(); ?></span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='songId' value="<?php echo $albumSong->getId(); ?>">
					</div>
					<?php
						if($charge == 1 && $id != $albumArtist->getId()){
							?>
								<div>
									<button class='btn buybtn' name='purchase' onclick="PurchaseSong(<?php echo $albumSong->getId(); ?>, <?php echo $userLoggedIn->getUserBalance(); ?>);">Purchase</button>
									<button class='btn liketbtn' name='purchase' onclick="LikeSong(<?php echo $albumSong->getId(); ?>)">Like</button>
									<button class='btn reportbtn' name='report' onclick="reportSong( <?php echo $userLoggedIn->getUserId(); ?>, <?php echo $albumSong->getId(); ?>);">Report</button>
								</div>
							<?php
						}
						else{
							?>
								<div>
									<button class='btn liketbtn' name='purchase' onclick="LikeSong(<?php echo $albumSong->getId(); ?>)">Like</button>
									<button class='btn reportbtn' name='report' onclick="reportSong( <?php echo $userLoggedIn->getUserId(); ?>, <?php echo $albumSong->getId(); ?>);">Report</button>
								</div>
							<?php
						}
					?>
					<div class='trackDuration'>
						<span class='duration'><?php echo $albumSong->getDuration(); ?></span>
					</div>

				</li>
			<?php

			$i = $i + 1;
		}

		?>

		<script>
			var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
			function PurchaseSong(song_id,amount){
                if(amount<30){
                    alert("You don't have enough money in your account to purchase the song");
                }
                else{
                    var play_name = window.prompt("Enter The Playlist Name Where You want Save That Song");
                    if(play_name!=null && play_name!=""){
                        location.assign("includes/handlers/purchase-handler.php?sid="+song_id+"&pname="+play_name);
                    }
                    else{
                        alert("You Haven't enter a valid name")
                    }
                }
            }
            function reportSong(userid,song_id){
				var message = prompt("Why do you want to report this song?");
				if(message != null && message != "") {
					location.assign("includes/handlers/report-handler.php?userid="+userid+"&songid="+song_id+"&msg="+message);
				}
				else{
					alert("Please tell us why do want to report this song")
				}
            }
		</script>

	</ul>
</div>


<div class="gridViewContainer">
	<h2>ALBUMS</h2>
	<?php
		$albumQuery = "SELECT * FROM albums WHERE artist_id='$artistId'";
		$data = $con->query($albumQuery);
			$table = $data->fetchAll();

		foreach($table as $row) {
			



			echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick='openPage(\"album.php?id=" . $row['id'] . "\")'>
						<img src='" . $row['artwork_path'] . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</span>

				</div>";



		}
	?>

</div>

<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>