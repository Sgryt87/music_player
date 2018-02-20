<?php
include "init.php";

global $con;
$account = new Account($con);

include "includes/handlers/register-handler.php";
include "includes/handlers/login-handler.php";

function getInputValue($name)
{
    if (isset($_POST[$name])) {
        echo $_POST[$name];
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Spotify!</title>
    <link rel="stylesheet" href="assets/css/register.css">
</head>
<body>

<div id="background">
    <div id="loginContainer">
        <div id="inputContainer">
            <form id="loginForm" action="register.php" method="POST">
                <h2>Login to your account</h2>
                <p>
                    <?php echo $account->getError(Constant::$loginFailed) ?>
                    <label for="loginUsername">Username</label>
                    <input id="loginUsername" name="loginUsername" type="text" placeholder="Username" required>
                </p>
                <p>
                    <label for="loginPassword">Password</label>
                    <input id="loginPassword" name="loginPassword" type="password" required placeholder="Password">
                </p>

                <button type="submit" name="loginButton">LOG IN</button>
                <div class="hasAccountText">
                    <a href="#"><span id="hideLogin">Don't have an account yet? Sign up here!</span></a>
                </div>
            </form>

            <form id="registerForm" action="register.php" method="POST">

                <h2>Create your free account</h2>
                <p>
                    <?php echo $account->getError(Constant::$usernameCharacters); ?>
                    <?php echo $account->getError(Constant::$usernameTaken); ?>
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" placeholder="Username"
                           value="<?php getInputValue('username') ?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constant::$firstNameCharacters); ?>
                    <label for="firstName">First Name</label>
                    <input id="firstName" name="firstName" type="text" placeholder="First Name"
                           value="<?php getInputValue('firstName') ?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constant::$lastNameCharacters); ?>
                    <label for="lastName">Last Name</label>
                    <input id="lastName" name="lastName" type="text" placeholder="Last Name"
                           value="<?php getInputValue('lastName') ?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constant::$emailsDoNotMatch); ?>
                    <?php echo $account->getError(Constant::$emailInvalid); ?>
                    <?php echo $account->getError(Constant::$emailTaken); ?>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" placeholder="Email"
                           value="<?php getInputValue('email') ?>"
                           required>
                </p>
                <p>
                    <label for="email2">Confirm Email</label>
                    <input id="email2" name="email2" type="text" placeholder="Confirm Email"
                           value="<?php getInputValue('email2') ?>" required>
                </p>
                <p>
                    <?php echo $account->getError(Constant::$passwordDoNotMatch); ?>
                    <?php echo $account->getError(Constant::$passwordNotAlphanumeric); ?>
                    <?php echo $account->getError(Constant::$passwordCharacters); ?>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Password"
                           value="<?php getInputValue('password') ?>" required>
                </p>
                <p>
                    <label for="password2">Confirm Password</label>
                    <input id="password2" name="password2" type="password" placeholder="Confirm Password" value="<?php
                    getInputValue('password2') ?>" required>
                </p>

                <button type="submit" name="registerButton">SIGN UP</button>
                <div class="hasAccountText">
                    <a href="#"><span id="hideRegister">Already have an account? Log in here!</span></a>
                </div>
            </form>
        </div>
        <div id="loginText">
            <h1>Get great music, right now!</h1>
            <h2>Listen to loads of songs for free</h2>
            <ul>
                <li><span style="color: #07d159;">&#9834;</span> Discover music you'll fall in love with</li>
                <li><span style="color: #07d159;">&#9834;</span> Create your own playlists</li>
                <li><span style="color: #07d159;">&#9834;</span> Follow artists to keep up to date</li>
            </ul>
        </div>
    </div>
</div>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/register.js"></script>
</body>
</html>