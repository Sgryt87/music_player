<?php

class Account
{
    private $conn;
    private $errorArray;

    public function __construct($conn)
    {
        $this->conn = $conn;
        $this->errorArray = [];
    }

    public function getError($error)
    {
        if (!in_array($error, $this->errorArray)) {
            $error = '';
        }
        return "<span class='errorMessage'>$error</span>";
    }

    private function insertUserDetails($username, $firstname, $lastname, $email, $password)
    {
        $encPassword = password_hash($password, PASSWORD_BCRYPT, ['cost' > 12]);
        $profilePic = 'assets/images/profile_pics/user.png';
        $date = date('Y-m-d');

        $result = mysqli_query($this->conn, "INSERT INTO users VALUES (
                                                                        '',
                                                                        '$username',
                                                                        '$firstname',
                                                                        '$lastname',
                                                                        '$email',
                                                                        '$encPassword',
                                                                        '$date',
                                                                        '$profilePic'
                                                                        )");
        return $result;
    }

    public function register($username, $firstname, $lastname, $email, $email2, $password, $password2)
    {
        $this->validateUsername($username);
        $this->validateFirstname($firstname);
        $this->validateLastname($lastname);
        $this->validateEmails($email, $email2);
        $this->validatePassword($password, $password2);
        if (empty($this->errorArray)) {
            $this->insertUserDetails($username, $firstname, $lastname, $email, $password);
        } else {
            return false;
        }
    }

    private function validateUsername($username)
    {
        if (strlen($username) > 25 || strlen($username) < 3) {
            array_push($this->errorArray, constant::$usernameCharacters);
            return;
        }

        $checkUserNameQuery = mysqli_query($this->conn, "SELECT username FROM users WHERE username = '$username'");
        if (mysqli_num_rows($checkUserNameQuery) > 0) {
            array_push($this->errorArray, constant::$usernameTaken);
            return;
        }
    }

    private function validateFirstname($firstname)
    {
        if (strlen($firstname) > 25 || strlen($firstname) < 2) {
            array_push($this->errorArray, constant::$firstNameCharacters);
            return;
        }
    }

    private function validateLastname($lastname)
    {
        if (strlen($lastname) > 25 || strlen($lastname) < 2) {
            array_push($this->errorArray, constant::$lastNameCharacters);
            return;
        }
    }

    private function validateEmails($email, $email2)
    {
        if ($email != $email2) {
            array_push($this->errorArray, constant::$emailsDoNotMatch);
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, constant::$emailInvalid);
            return;
        }
        $checkEmailNameQuery = mysqli_query($this->conn, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($checkEmailNameQuery) > 0) {
            array_push($this->errorArray, constant::$emailTaken);
            return;
        }
    }

    private function validatePassword($password, $password2)
    {
        if ($password != $password2) {
            array_push($this->errorArray, constant::$passwordDoNotMatch);
            return;
        }
        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, constant::$passwordNotAlphanumeric);
            return;
        }
        if (strlen($password) > 25 || strlen($password) < 5) {
            array_push($this->errorArray, constant::$passwordCharacters);
            return;
        }
    }

    // LOGIN

    public function login($username, $password)
    {
        $login = mysqli_query($this->conn, "SELECT * FROM users WHERE username = '{$username}'"); // ERROR todo

        $row = mysqli_fetch_assoc($login);
        $user_db_name = $row['username'];
        $user_db_password = $row['password'];

        if ($user_db_name === $username && password_verify($password, $user_db_password)) {
            return true;
        } else {
            array_push($this->errorArray, constant::$loginFailed);
            return false;
        }
    }
}