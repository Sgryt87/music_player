<?php
include "includes/config.php";

//session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
    $userLogIn = $_SESSION['userLoggedIn'];
} else {
    header('Location: register.php');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Wellcome To Music Player!</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
</head>
<body>
<div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
        <div id="nowPlayingLeft">
            <div class="content">
                <span class="albumlink">
                    <img src="assets/images/artwork/sweet.jpg" alt="" class="albumArtwork">
                </span>
                <div class="trackInfo">
                    <span class="trackName">
                        <span>Happy Birthday</span>
                    </span>
                    <span class="artistName">
                        <span>Reece Kenney</span>
                    </span>
                </div>
            </div>
        </div>

        <div id="nowPlayingCenter">
            <div class="content playerControls">
                <div class="buttons">
                    <button class="controlButton shuffle" title="Shuffle button">
                        <i class="fa fa-random"></i>
                    </button>
                    <button class="controlButton previous" title="Previous button">
                        <i class="fa fa-step-backward"></i>
                    </button>
                    <button class="controlButton play" title="Play button">
                        <i class="fa fa-play-circle-o"></i>
                    </button>
                    <button class="controlButton pause" title="Pause button" style="display: none;">
                        <i class="fa fa-pause"></i>
                    </button>
                    <button class="controlButton forward" title="Next button">
                        <i class="fa fa-step-forward"></i>
                    </button>
                    <button class="controlButton repeat" title="Repeat button">
                        <i class="fa fa-repeat"></i>
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
                <button class="controlButton volume" title="Volume button">
                    <i class="fa fa-volume-up"></i>
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

</body>
</html>