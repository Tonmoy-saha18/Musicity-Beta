<?php
$id=$userLoggedIn->getUserId();
$songQuery = "SELECT s.id
                    FROM songs as s  
                    JOIN user_preference as u
                         on u.genre_id = s.genre_id
                    WHERE u.user_id=$id
                    ORDER BY RAND() LIMIT 10";
$returnobj=$con->query($songQuery);
$data=$returnobj->fetchAll();
$resultArray=array_column($data, 'id');
$jsonArray = json_encode($resultArray);
?>
<script>
 
$(document).ready(function(){
    var newPlaylist = <?php echo $jsonArray ?>;
    audioElement = new Audio();
    setTrack(newPlaylist[0],newPlaylist,false);
    updateVolumeProgressBar(audioElement.audio);
 
    $(".playbackBar .progressBar").mousedown(function() {
        mouseDown = true;
    });
 
    $(".playbackBar .progressBar").mousemove(function(e) {
        if(mouseDown == true) {
            //Set time of song, depending on position of mouse
            timeFromOffset(e, this);
        }
    });
    $(".playbackBar .progressBar").mouseup(function(e) {
        timeFromOffset(e, this);
    });
 
    $(".volumeBar .progressBar").mousedown(function() {
        mouseDown = true;
    });
 
    $(".volumeBar .progressBar").mousemove(function(e) {
        if(mouseDown == true) {
 
            var percentage = e.offsetX / $(this).width();
 
            if(percentage >= 0 && percentage <= 1) {
                audioElement.audio.volume = percentage;
            }
        }
    });
 
    $(".volumeBar .progressBar").mouseup(function(e) {
        var percentage = e.offsetX / $(this).width();
 
        if(percentage >= 0 && percentage <= 1) {
            audioElement.audio.volume = percentage;
        }
    });
 
    $(document).mouseup(function() {
        mouseDown = false;
    });
 
});
function timeFromOffset(mouse, progressBar) {
    var percentage = mouse.offsetX / $(progressBar).width() * 100;
    var seconds = audioElement.audio.duration * (percentage / 100);
    audioElement.setTime(seconds);
}

</script>
<div id="nowPlayingBarContainer">
 
    <div id="nowPlayingBar">
 
        <div id="nowPlayingLeft">
            <div class="content">
                <span class="albumLink">
                    <img role="link" tabindex="0" src="" class="albumArtwork">
                </span>
 
                <div class="trackInfo">
 
                    <span class="trackName">
                        <span role="link" tabindex="0"></span>
                    </span>
 
                    <span class="artistName">
                        <span role="link" tabindex="0"></span>
                    </span>
 
                </div>
 
 
 
            </div>
        </div>
 
        <div id="nowPlayingCenter">
 
            <div class="content playerControls">
 
                <div class="buttons">
 
                    <button class="controlButton shuffle" title="Shuffle button" onclick="setShuffle()">
                        <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                    </button>
 
                    <button class="controlButton previous" title="Previous button" onclick="prevSong()">
                        <img src="assets/images/icons/previous.png" alt="Previous">
                    </button>
 
                    <button class="controlButton play" title="Play button" onclick="playSong()">
                        <img src="assets/images/icons/play.png" alt="Play">
                    </button>
 
                    <button class="controlButton pause" title="Pause button" style="display: none;" onclick="pauseSong()">
                        <img src="assets/images/icons/pause.png" alt="Pause">
                    </button>
 
                    <button class="controlButton next" title="Next button" onclick="nextSong()">
                        <img src="assets/images/icons/next.png" alt="Next">
                    </button>
 
                    <button class="controlButton repeat" title="Repeat button" onclick="setRepeat()">
                        <img src="assets/images/icons/repeat.png" alt="Repeat">
                    </button>
 
                </div>
 
 
                <div class="playbackBar">
 
                    <span class="progressTime current">0.00</span>
 
                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
 
                    <span class="progressTime remaining">0.00</span>
 
 
                </div>
 
 
            </div>
 
 
        </div>
 
        <div id="nowPlayingRight">
            <div class="volumeBar">
 
                <button class="controlButton volume" title="Volume button" onclick="setMute()">
                    <img src="assets/images/icons/volume.png" alt="Volume">
                </button>
 
                <div class="progressBar">
                    <div class="progressBarBg">
                        <div class="progress"></div>
                    </div>
                </div>
 
            </div>
        </div>
 
 
 
 
    </div>
 
</div>