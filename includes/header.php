<?php
include "init.php";

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
<div id="mainContainer">
    <div id="topContainer">
        <?php include "includes/navBarContainer.php"; ?>
        <div id="mainViewContainer">
            <div id="mainContent">