<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Spotify!</title>
</head>
<body>

<?php
include "includes/classes/Account.php";
$account = new Account();

include "includes/handlers/register-handler.php";
include "includes/handlers/login-handler.php";

?>
<div id="inputContainer">
    <form id="loginForm" action="register.php" method="POST">
        <h2>Login to your account</h2>
        <p>
            <label for="loginUsername">Username</label>
            <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required>
        </p>
        <p>
            <label for="loginPassword">Password</label>
            <input id="loginPassword" name="loginPassword" type="password" required placeholder="Password">
        </p>

        <button type="submit" name="loginButton">LOG IN</button>

    </form>

    <form id="registerForm" action="register.php" method="POST">

        <h2>Create your free account</h2>
        <p>
            <?php echo $account->getError('Your Username has to be between 3 and 25 characters'); ?>
            <label for="username">Username</label>
            <input id="username" name="username" type="text" placeholder="Username" required>
        </p>
        <p>
            <?php echo $account->getError('Your First Name has to be between 2 and 25 characters'); ?>
            <label for="firstName">First Name</label>
            <input id="firstName" name="firstName" type="text" placeholder="First Name" required>
        </p>
        <p>
            <?php echo $account->getError('Your Last Name has to be between 2 and 25 characters'); ?>
            <label for="lastName">Last Name</label>
            <input id="lastName" name="lastName" type="text" placeholder="Last Name" required>
        </p>
        <p>
            <?php echo $account->getError('Your emails don\'t match'); ?>
            <?php echo $account->getError('Email is invalid'); ?>
            <label for="email">Email</label>
            <input id="email" name="email" type="text" placeholder="Email" required>
        </p>
        <p>
            <label for="email2">Confirm Email</label>
            <input id="email2" name="email2" type="text" placeholder="Confirm Email" required>
        </p>
        <p>
            <?php echo $account->getError('Your passwords don\'t match'); ?>
            <?php echo $account->getError('Your password can only contain letters and numbers'); ?>
            <?php echo $account->getError('Your password has to be between 5 and 25 characters'); ?>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" required placeholder="Password">
        </p>
        <p>
            <label for="password2">Confirm Password</label>
            <input id="password2" name="password2" type="password" required placeholder="Confirm Password">
        </p>

        <button type="submit" name="registerButton">SIGN UP</button>

    </form>
</div>

</body>
</html>