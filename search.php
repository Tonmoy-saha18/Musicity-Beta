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
 

 
 
 
 
 
 
 
 
 
 
 

