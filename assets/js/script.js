var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var timer;

$(document).click(function (click) {
  var target = $(click.target);

  if (!target.hasClass("item") && !target.hasClass("optionsButton")) {
    hideOptionsMenu();
  }
});
$(document).on("change", "select.playlist", function () {
  var select = $(this);
  var playlistId = select.val();
  var songId = select.prev(".songId").val();

  $.post("includes/handlers/ajax/addToPlaylist.php", {
    playlistId: playlistId,
    songId: songId,
  }).done(function (error) {
    if (error != "") {
      alert(error);
      return;
    }

    hideOptionsMenu();
    select.val("");
  });
});
$(window).scroll(function () {
  hideOptionsMenu();
});

function deletePlaylist(playlistId) {
  var prompt = confirm("Are you sure you want to delete this playlist?");

  if (prompt == true) {
    $.post("includes/handlers/ajax/deletePlaylist.php", {
      playlistId: playlistId,
    }).done(function (error) {
      //   if (error != "") {
      //     alert(error);
      //     return;
      //   }

      //do something when ajax returns
      openPage("yourMusic.php");
    });
  }
}

function hideOptionsMenu() {
  var menu = $(".optionsMenu");
  if (menu.css("display") != "none") {
    menu.css("display", "none");
  }
}

function showOptionsMenu(button) {
  var songId = $(button).prevAll(".songId").val();
  var menu = $(".optionsMenu");
  var menuWidth = menu.width(); //The width of the menu
  menu.find(".songId").val(songId);

  var scrollTop = $(window).scrollTop(); //Distance from top of window to top of document
  var elementOffset = $(button).offset().top; //Distance from top of document

  var top = elementOffset - scrollTop;
  var left = $(button).position().left;

  menu.css({
    top: top + "px",
    left: left - menuWidth + "px",
    display: "inline",
  });
}

function openPage(url) {
  if (timer != null) {
    clearTimeout(timer);
  }
  if (url.indexOf("?") == -1) {
    url = url + "?";
  }

  var encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
  $("#mainContent").load(encodedUrl);
  $("body").scrollTop(0);
  history.pushState(null, null, url);
}

function logout() {
  $.post("includes/handlers/ajax/logout.php", function () {
    location.reload();
  });
}

function formatTime(seconds) {
  var time = Math.round(seconds);
  var minutes = Math.floor(time / 60); //Rounds down
  var seconds = time - minutes * 60;

  var extraZero = seconds < 10 ? "0" : "";

  return minutes + ":" + extraZero + seconds;
}

function createPlaylist() {
  var popup = prompt("Please enter the name of your playlist");

  if (popup != null) {
    $.post("includes/handlers/ajax/createPlaylist.php", {
      name: popup,
      username: userLoggedIn,
    }).done(function (error) {
      if (error != "") {
        alert(error);
        return;
      }

      //do something when ajax returns
      openPage("yourMusic.php");
    });
  }
}

function removeFromPlaylist(button, playlistId) {
  var songId = $(button).prevAll(".songId").val();

  $.post("includes/handlers/ajax/removeFromPlaylist.php", {
    playlistId: playlistId,
    songId: songId,
  }).done(function (error) {
    if (error != "") {
      alert(error);
      return;
    }

    //do something when ajax returns
    openPage("playlist.php?id=" + playlistId);
  });
}
function updateTimeProgressBar(audio) {
  $(".progressTime.current").text(formatTime(audio.currentTime));
  $(".progressTime.remaining").text(
    formatTime(audio.duration - audio.currentTime)
  );

  var progress = (audio.currentTime / audio.duration) * 100;
  $(".playbackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio) {
  var volume = audio.volume * 100;
  $(".volumeBar .progress").css("width", volume + "%");
}

function playFirstSong() {
  setTrack(tempPlaylist[0], tempPlaylist, true);
}
function updateEmail(emailClass) {
  var emailValue = $("." + emailClass).val();

  $.post("includes/handlers/ajax/updateEmail.php", {
    email: emailValue,
    username: userLoggedIn,
  }).done(function (response) {
    $("." + emailClass)
      .nextAll(".message")
      .text(response);
  });
}

function updateDescription(descriptionClass) {
  var dValue = $("." + descriptionClass).val();

  $.post("includes/handlers/ajax/updateDescription.php", {
    description: dValue,
    username: userLoggedIn,
  }).done(function (response) {
    $("." + descriptionClass)
      .nextAll(".message")
      .text(response);
  });
}

function updatePassword(
  oldPasswordClass,
  newPasswordClass1,
  newPasswordClass2
) {
  var oldPassword = $("." + oldPasswordClass).val();
  var newPassword1 = $("." + newPasswordClass1).val();
  var newPassword2 = $("." + newPasswordClass2).val();

  $.post("includes/handlers/ajax/updatePassword.php", {
    oldPassword: oldPassword,
    newPassword1: newPassword1,
    newPassword2: newPassword2,
    username: userLoggedIn,
  }).done(function (response) {
    $("." + oldPasswordClass)
      .nextAll(".message")
      .text(response);
  });
}

function Audio() {
  this.currentlyPlaying;
  this.audio = document.createElement("audio");
  this.audio.addEventListener("ended", function () {
    nextSong();
  });

  $("#nowPlayingBarContainer").on(
    "mousedown touchstart mousemove touchmove",
    function (e) {
      e.preventDefault();
    }
  );

  this.audio.addEventListener("canplay", function () {
    //'this' refers to the object that the event was called on
    var duration = formatTime(this.duration);
    $(".progressTime.remaining").text(duration);
  });

  this.audio.addEventListener("timeupdate", function () {
    if (this.duration) {
      updateTimeProgressBar(this);
    }
  });

  this.audio.addEventListener("volumechange", function () {
    updateVolumeProgressBar(this);
  });

  this.setTrack = function (path) {
    this.audio.src = path;
  };

  this.play = function () {
    this.audio.play();
  };

  this.pause = function () {
    this.audio.pause();
  };
  this.setTime = function (seconds) {
    this.audio.currentTime = seconds;
  };
}

function LikePodcast(podId) {
  $.post("includes/handlers/ajax/likePodcast.php", {
    podId: podId,
  }).done(function (error) {
    // if (error != "") {
    //   alert(error);
    //   return;
    // }

    //do something when ajax returns
    // openPage("phome.php");
    location.reload();
  });
}

function UnLikePodcast(podId) {
  $.post("includes/handlers/ajax/unlikePodcast.php", {
    podId: podId,
  }).done(function (error) {
    // if (error != "") {
    //   alert(error);
    //   return;
    // }

    //do something when ajax returns
    // openPage("phome.php");
    location.reload();
  });
}

function RatePodcast(poId) {
  var rating = prompt("How much would you like to give out 5?");
  if (Number(rating) < 0 || Number(rating) > 5) {
    alert("Rating should be between 0 to 5");
    return;
  }
  $.post("includes/handlers/ajax/ratePodcast.php", {
    podId: poId,
    rating: rating,
  }).done(function (error) {
    // if (error != "") {
    //   alert(error);
    //   return;
    // }

    //do something when ajax returns
    // openPage("phome.php");
    location.reload();
  });
}

function LikeSong(podId) {
  $.post("includes/handlers/ajax/likeSong.php", {
    podId: podId,
  }).done(function (error) {
    // if (error != "") {
    //   alert(error);
    //   return;
    // }
 
    //do something when ajax returns
    // openPage("album.php");
    location.reload();
  });
}

function UnLikeSong(podId) {
  $.post("includes/handlers/ajax/unlikeSong.php", {
    podId: podId,
  }).done(function (error) {
    // if (error != "") {
    //   alert(error);
    //   return;
    // }
 
    //do something when ajax returns
    // openPage("phome.php");
    location.reload();
  });
}


