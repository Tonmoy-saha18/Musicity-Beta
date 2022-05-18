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

<div class="tracklistContainer">
	<ul class="tracklist">
		
		<?php
        $query = "SELECT * FROM users WHERE username='$username'";
        $returnobj = $con->query($query);
        foreach ($returnobj as $table){
            $id = $table['id'];
            $amount = $table['amount'];
        }
        $query = "SELECT * FROM podcasts ORDER BY RAND() LIMIT 50";
        $returnobj = $con->query($query);
        $podcastArray = $returnobj->fetchAll();
		$i = 1;
		foreach($podcastArray as $podId) {
			$pId = $podId['id'];
			$checkquery = "SELECT * FROM likedpodcast WHERE pod_id=$pId AND user_id=$id";
			$table = $con->query($checkquery);
            ?>
            <li class='tracklistRow'>
                    <div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick=setTrack(<?php echo $podId['id']; ?>, tempPlaylist, true)>
						<span class='trackNumber'><?php echo $i; ?></span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'><?php echo $podId['title']; ?></span>
						<span class='artistName'><?php echo $_GET['userLoggedIn']; ?></span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='songId' value="<?php echo $podId['id']; ?>">
					</div>
					<?php
					if($table->rowCount()==1){
						?>
						<div>
							<button class='btn buybtn' name='purchase' onclick="Donate(<?php echo $podId['id']; ?>, <?php echo $amount; ?>)">Donate</button>
							<button class='btn reportbtn' name='purchase' onclick="UnLikePodcast(<?php echo $podId['id']; ?>)">UnLike</button>
						</div>
						<?php
					}
					else{
						?>
						<div>
							<button class='btn buybtn' name='purchase' onclick="Donate(<?php echo $podId['id']; ?>, <?php echo $amount; ?>)">Donate</button>
							<button class='btn reportbtn' name='purchase' onclick="LikePodcast(<?php echo $podId['id']; ?>)">Like</button>
						</div>
						<?php
					}
					?>
					<div class='trackDuration'>
						<span class='duration'><?php echo $podId['duration']; ?></span>
					</div>
            </li>
            <?php

			$i = $i + 1;
		}

		?>
        <script>
            function Donate(podcastid, amount){
                if(amount<20){
                    alert("You don't have enough money in your account");
                }
                else{
                    location.assign("includes/handlers/DonationHandler.php?id="+podcastid);
                }
            }
		</script>

	</ul>
</div>