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

		//taking user id details into variable userId
		$userId = $userLoggedIn->getUserId();

		$i = 1;
		foreach($songIdArray as $songId) {

			$albumSong = new Song($con, $songId['id']);
			$albumArtist = $albumSong->getArtist();
			$charge = $albumSong->getCharge();
			
			//now taking all details of that song
			$id = $songId['id'];
			$songquery = "SELECT * FROM songs WHERE id=$id";
			$returnobj = $con->query($songquery);
			$songInfo = $returnobj->fetch();

			//taking the permium details of that song
			$charge = $songInfo['set_charge'];
			$album_id = $songInfo['album_id'];

			//taking artist detils from album table
			$albumquery = "SELECT * FROM albums WHERE id=$album_id";
			$album = $con->query($albumquery)->fetch();
			$artistId = $album['artist_id'];
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
						if($charge == 1 && $userId != $artistId){
							?>
								<div>
									<button class='btn buybtn' name='purchase' onclick="PurchaseSong(<?php echo $albumSong->getId(); ?>, <?php echo $userLoggedIn->getUserBalance(); ?>);">Purchase</button>
									<button class='btn reportbtn' name='report' onclick="reportSong( <?php echo $userLoggedIn->getUserId(); ?>, <?php echo $albumSong->getId(); ?>);">Report</button>
								</div>
							<?php
						}
						else{
							?>
								<div>
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