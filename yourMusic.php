<?php
include("includes/includedFiles.php");
?>
 
<div class="playlistsContainer">
 
    <div class="gridViewContainer">
        <h2>PLAYLISTS</h2>
 
        <div class="buttonItems">
            <button class="button green" onclick="createPlaylist()">NEW PLAYLIST</button>
        </div>
 
 
 
        <?php
            $username = $userLoggedIn->getUserId();
           
            $query = "SELECT * FROM playlist WHERE owner_id='$username'";
            $data= $con->query($query);
            $playlistsQuery= $data->fetchAll();
            if(empty($playlistsQuery) ) {
                echo "<span class='noResults'>You don't have any playlists yet.</span>";
            }
 
            foreach ($playlistsQuery as $row) {
 
                $playlist = new Playlist($con, $row);
 
                echo "<div class='gridViewItem' role='link' tabindex='0'
                            onclick='openPage(\"playlist.php?id=" . $playlist->getId() . "\")'>
 
                        <div class='playlistImage'>
                            <img src='assets/images/icons/playlist.png'>
                        </div>
                       
                        <div class='gridViewInfo'>"
                            . $playlist->getName() .
                        "</div>
 
                    </div>";
 
 
 
            }
        ?>
 
 
 
 
 
 
    </div>
 
</div>