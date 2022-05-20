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
		$table1 = $returnobj->fetch();
		$userid = $table1['id'];

        // foreach ($returnobj->fetchAll() as $table){
        //     $id = $table['id'];
        //     $amount = $table['amount'];
        // }
        $query = "SELECT * FROM podcasts ORDER BY RAND() LIMIT 50";
        $returnobj = $con->query($query);
        $podcastArray = $returnobj->fetchAll();
		$i = 1;
		foreach($podcastArray as $podId) {
			$artistid = $podId['artist_id']; // taking artistid
			$pId = $podId['id']; //taking podcastid


			//now taking the whelther the podcast is liked or not
			$checkquery = "SELECT * FROM likedpodcast WHERE pod_id=$pId AND userid=$userid";
			$table = $con->query($checkquery);

			//Now taking the username 
			$userquery = "SELECT * FROM users WHERE id=$artistid";
			$usertable = $con->query($userquery);
			$obj = $usertable->fetch();
			$user = $obj['username'];
            ?>
            <li class='tracklistRow'>
                    <div class='trackCount'>
						<img class='play' src='assets/images/icons/play-white.png' onclick=setTrack(<?php echo $podId['id']; ?>, tempPlaylist, true)>
						<span class='trackNumber'><?php echo $i; ?></span>
					</div>


					<div class='trackInfo'>
						<span class='trackName'><?php echo $podId['title']; ?></span>
						<span class='artistName'><?php echo $user; ?></span>
					</div>

					<div class='trackOptions'>
						<input type='hidden' class='songId' value="<?php echo $podId['id']; ?>">
					</div>
					<?php
					if($table->rowCount()==1){
						?>
						<div>
							<button class='btn donate' name='purchase' onclick="Donate(<?php echo $podId['id']; ?>, <?php echo $amount; ?>)">Donate</button>
							<button class='btn unliketbtn' name='unlike' onclick="UnLikePodcast(<?php echo $podId['id']; ?>)">Unlike</button>
							<button class='btn ratebtn' name='rate' onclick="RatePodcast(<?php echo $podId['id']; ?>)">Rate</button>
						</div>
						<?php
					}
					else{
						?>
						<div>
							<button class='btn donate' name='purchase' onclick="Donate(<?php echo $podId['id']; ?>, <?php echo $amount; ?>)">Donate</button>
							<button class='btn liketbtn' name='like' onclick="LikePodcast(<?php echo $podId['id']; ?>)">Like</button>
							<button class='btn ratebtn' name='rate' onclick="RatePodcast(<?php echo $podId['id']; ?>)">Rate</button>
						</div>
						<?php
					}
					?>
					<div class='trackDuration'>
						<?php
							$id = $podId['id'];
							$ratingquery = "SELECT AVG(raing) AS rating, COUNT(*) AS num_people FROM ratepodcast WHERE pod_id =$id";
							$rating = $con->query($ratingquery);
							$rat = $rating->fetch();
							$rating = $rat['rating'];
							$people = $rat['num_people'];
							?>
								<span  class='rating'>Rating <?php echo sprintf('%0.2f', round($rating, 2)); ?>(<?php echo $people; ?>)</span>
							<?php
						?>
						<span class='duration'><?php echo $podId['duration']; ?></span>
					</div>
            </li>
            <?php

			$i = $i + 1;
		}

		?>
        <script>
            function Donate(podcastid, amount){
				var check = confirm("Are You Sure You Want to Donate 20 Taka?");

				if(check==true){
					if(amount<20){
                    	alert("You don't have enough money in your account");
                	}
					else{
                    	location.assign("includes/handlers/DonationHandler.php?id="+podcastid);
                	}
				}
            }
		</script>

	</ul>
</div>