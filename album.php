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