<?php
ob_start();
session_start();
//x$timezone = date_default_timezone_get('America/Chicago');
$conn = mysqli_connect('localhost', 'root', 'root', 'music_player');
if (mysqli_connect_errno()) {
    echo 'Query Failed: ' . mysqli_connect_errno();
}