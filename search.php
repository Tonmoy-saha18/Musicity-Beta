<?php
include("includes/includedFiles.php");
 
if(isset($_GET['term'])) {
    $term = urldecode($_GET['term']);
    if(isset($_GET['userLoggedIn'])) {
        $userLoggedIn = new User($con, $_GET['userLoggedIn']);
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
                        <button class='btn buybtn' name='purchase' onclick='PurchaseSong(" . $albumSong->getId() . ", " . $userLoggedIn->getUserBalance() . ");'> Purchase</button>
                        <button class='btn reportbtn' name='report' onclick='reportSong( " . $userLoggedIn->getUserId() . ", " . $albumSong->getId() . " )'>Report</button>
                    </div>
                    <div class='trackDuration'>
                        <span class='duration'>" . $albumSong->getDuration() . "</span>
                    </div>
 
 
                </li>";
 
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
 
 
 
 
 
 
 
 
 

