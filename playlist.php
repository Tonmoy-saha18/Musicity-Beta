<?php include("includes/includedFiles.php");
 
if(isset($_GET['id'])) {
    $playlistId = $_GET['id'];
}
else {
    header("Location: index.php");
}
 
$playlist = new Playlist($con, $playlistId);
$owner = new User($con, $playlist->getOwner());
?>
 

 
<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
    <div class="item" onclick="removeFromPlaylist(this, '<?php echo $playlistId; ?>')">Remove from Playlist</div>
</nav>
 
 
 
 
 
 
 
 
 
 

