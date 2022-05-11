<?php  
include("includes/includedFiles.php"); 
if(isset($_GET['userLoggedIn'])) {
		$userLoggedIn = new User($con, $_GET['userLoggedIn']);
	}
	else {

	header("Location: register.php");
	}
?>
<h1 class="pageHeadingBig">You Might Also Like</h1>

<div class="gridViewContainer">

	<?php
		$id=$userLoggedIn->getUserId();
		$query = "SELECT a.id, a.artwork_path, a.title 
					FROM albums as a
					JOIN songs as s
						 on s.album_id=a.id 
					JOIN user_preference as u
					     on u.genre_id = s.genre_id
					WHERE u.user_id=$id
					GROUP BY a.id
					ORDER BY RAND() LIMIT 50";
		$album = $con->query($query);
		$data = $album->fetchAll();	
		 foreach($data AS $row){
			$img = $row['artwork_path'];
		 	echo "<div class='gridViewItem'>
					<a href='album.php?id=" . $row['id'] . "'>
						<img src='" . $img . "'>

						<div class='gridViewInfo'>"
							. $row['title'] .
						"</div>
					</span>

				</div>";
		 }
		?>
</div>