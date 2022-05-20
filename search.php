<?php
include("includes/includedFiles.php");
 
if(isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
    if(isset($_GET['userLoggedIn'])) {
        $userLoggedIn = new User($con, $_GET['userLoggedIn']);
        $id = $userLoggedIn->getUserId();
    }
    else {
 
    header("Location: register.php");
    }
}
else {
    $term = "";
}
?>
 
<div class="searchContainer">
 
    <h4>Search for an artist, album or song</h4>
    <input type="text" id="searchInput"class="searchInput" value="<?php echo $term; ?>" placeholder="Start typing..." onfocus="this.value = this.value">
 
</div>
 
<script>
 
// $(".searchInput").focus();
 
$(function() {
 
    $(".searchInput").keyup(function() {
        clearTimeout(timer);
 
        timer = setTimeout(function() {
            var val = $(".searchInput").val();
            openPage("search.php?term=" + val);
        }, 250);
 
    })
 
})
function setCaretPosition(ctrl, pos) {
  // Modern browsers
  if (ctrl.setSelectionRange) {
    ctrl.focus();
    ctrl.setSelectionRange(pos, pos+1);
 
  // IE8 and below
  } else if (ctrl.createTextRange) {
    var range = ctrl.createTextRange();
    range.collapse(true);
    range.moveEnd('character', pos);
    range.moveStart('character', pos);
    range.select();
  }
}
var input = document.getElementById('searchInput');
setCaretPosition(input, input.value.length);
 
</script>
 
<?php if($term == "") exit(); ?>
 
<div class="tracklistContainer borderBottom">
    <h2>SONGS</h2>
    <ul class="tracklist">
       
        <?php
        $query = "SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10";
        $data= $con->query($query);
        $row= $data->fetchAll();
        $songsQuery=array_column($row, 'id');
        if(empty($songsQuery)) {
            echo "<span class='noResults'>No songs found matching " . $term . "</span>";
        }
       
 
        $i = 1;
        foreach($songsQuery as $songId) {
 
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
            var tempSongIds = '<?php echo json_encode($songsQuery); ?>';
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
                location.assign("includes/handlers/report-handler.php?userid="+userid+"&songid="+song_id);
            }
        </script>
 
    </ul>
</div>

<div class="artistsContainer borderBottom">
 
    <h2>ARTISTS</h2>
 
    <?php
    $query = "SELECT id FROM users WHERE CONCAT(first_name,' ',last_name) LIKE '$term%' LIMIT 10";
    $data= $con->query($query);
    $row= $data->fetchAll();
    $artistsQuery=array_column($row, 'id');
    if(empty($artistsQuery)) {
        echo "<span class='noResults'>No artists found matching " . $term . "</span>";
    }
 
    foreach($artistsQuery as $row) {
 
        $artistFound = new Artist($con, $row);
 
        echo "<div class='searchResultRow'>
                <div class='artistName'>
 
                    <span role='link' tabindex='0' onclick='openPage(\"artist.php?id=" . $artistFound->getId() ."\")'>
                    "
                    . $artistFound->getName() .
                    "
                    </span>
 
                </div>
 
            </div>";
 
    }
 
 
    ?>
 
 
</div>
 
 
<div class="gridViewContainer">
    <h2>ALBUMS</h2>
    <?php
       
 
        $albumQuery = "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10";
        $data = $con->query($albumQuery);
            $table = $data->fetchAll();
        if(empty($table)) {
        echo "<span class='noResults'>No Albums found matching " . $term . "</span>";
        }
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
<hr>
<div class="gridViewContainer">
    <h2>PODCASTS</h2>
    <div class="tracklistContainer">
        <ul class="tracklist">
            
            <?php
            $podcastquery = "SELECT * FROM podcasts WHERE title LIKE '$term%' LIMIT 10";
            $data= $con->query($podcastquery);
            $podcastArray= $data->fetchAll();
            $songsQuery=array_column($row, 'id');
            if(empty($songsQuery)) {
                echo "<span class='noResults'>No songs found matching " . $term . "</span>";
            }
            $query1 = "SELECT * FROM users WHERE id=$id";
            $returnobj = $con->query($query1);
            $table1 = $returnobj->fetch();
            $userid = $table1['id'];
            $amount = $table1['amount'];

            // foreach ($returnobj->fetchAll() as $table){
            //     $id = $table['id'];
            //     $amount = $table['amount'];
            // }
            $i = 1;
            foreach($podcastArray as $podId) {

                if($i > 5){
                    break;
                }
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
 
</div>
 
 
 
 
 
 
 
 
 

