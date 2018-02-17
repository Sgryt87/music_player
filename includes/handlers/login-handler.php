<?php

if (isset($_POST['loginButton'])) {

    $username = sanitizeFormUsername($_POST['loginUsername']);
    $password = sanitizeFormPassword($_POST['loginPassword']);

    $result = $account->login($username, $password);
    if ($result == true) {
        header('Location: index.php');
    }
}