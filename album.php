<?php 
include("includes/includedFiles.php"); 
if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
	if(isset($_GET['userLoggedIn'])) {
		$userLoggedIn = new User($con, $_GET['userLoggedIn']);
	}
	else {

	header("Location: register.php");
	}
}
else {

	header("Location: index.php");
}
	$album = new Album($con, $albumId);
	$artist = $album->getArtist();
	$artistId = $artist->getId();
		

?>
<div class="entityInfo">

    <div class="leftSection">
        <img src="<?php echo $album->getArtworkPath(); ?>">
    </div>

    <div class="rightSection">
        <h2><?php echo $album->getTitle(); ?></h2>
        <p role="link" tabindex="0" onclick="openPage('artist.php?id=<?php echo $artistId; ?>')">By <?php echo $artist->getName(); ?></p>
        <p><?php echo $album->getNumberOfSongs(); ?> songs</p>

    </div>

</div>

<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
		$songIdArray = $album->getSongIds();

		$i = 1;
		foreach($songIdArray as $songId) {

			$albumSong = new Song($con, $songId['id']);
			$albumArtist = $albumSong->getArtist();
			$charge = $albumSong->getCharge();
			
			echo "<li class='tracklistRow'>
					<div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick='setTrack(\"" . $albumSong->getId() . "\", tempPlaylist, true)'>
						<span class='trackNumber'>$i</span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'>" . $albumSong->getTitle() . "</span>
						<span class='artistName'>" . $albumArtist->getName() . "</span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='songId' value='" . $albumSong->getId() . "'>
					</div>
					<div>
						<button class='btn buybtn' name='purchase' onclick='PurchaseSong(" . $albumSong->getId() . ", " . $userLoggedIn->getUserBalance() . ");'>Purchase</button>
						<button class='btn reportbtn' name='report' onclick='reportSong( " . $userLoggedIn->getUserId() . ", " . $albumSong->getId() . " );'>Report</button>
					</div>
					<div class='trackDuration'>
						<span class='duration'>" . $albumSong->getDuration() . "</span>
					</div>


				</li>";

			$i = $i + 1;
		}

		?>
        <script>
			var tempSongIds = '<?php echo json_encode(array_column($songIdArray, 'id')) ?>';
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

<?php include("includes/footer.php"); ?>