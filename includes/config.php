<?php
ob_start();
//x$timezone = date_default_timezone_get('America/Chicago');
$con = mysqli_connect('localhost', 'root', 'root', 'music_player');
if (mysqli_connect_errno()) {
    echo 'Query Failed: ' . mysqli_connect_errno();
}