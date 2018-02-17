<?php

class Account
{
    private $con;
    private $errorArray;

    public function __construct($con)
    {
        $this->con = $con;
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

        $result = mysqli_query($this->con, "INSERT INTO users VALUES (
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
            array_push($this->errorArray, Constant::$usernameCharacters);
            return;
        }

        $checkUserNameQuery = mysqli_query($this->con, "SELECT username FROM users WHERE username = '$username'");
        if (mysqli_num_rows($checkUserNameQuery) > 0) {
            array_push($this->errorArray, Constant::$usernameTaken);
            return;
        }
    }

    private function validateFirstname($firstname)
    {
        if (strlen($firstname) > 25 || strlen($firstname) < 2) {
            array_push($this->errorArray, Constant::$firstNameCharacters);
            return;
        }
    }

    private function validateLastname($lastname)
    {
        if (strlen($lastname) > 25 || strlen($lastname) < 2) {
            array_push($this->errorArray, Constant::$lastNameCharacters);
            return;
        }
    }

    private function validateEmails($email, $email2)
    {
        if ($email != $email2) {
            array_push($this->errorArray, Constant::$emailsDoNotMatch);
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constant::$emailInvalid);
            return;
        }
        $checkEmailNameQuery = mysqli_query($this->con, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($checkEmailNameQuery) > 0) {
            array_push($this->errorArray, Constant::$emailTaken);
            return;
        }
    }

    private function validatePassword($password, $password2)
    {
        if ($password != $password2) {
            array_push($this->errorArray, Constant::$passwordDoNotMatch);
            return;
        }
        if (preg_match('/[^A-Za-z0-9]/', $password)) {
            array_push($this->errorArray, Constant::$passwordNotAlphanumeric);
            return;
        }
        if (strlen($password) > 25 || strlen($password) < 5) {
            array_push($this->errorArray, Constant::$passwordCharacters);
            return;
        }
    }

    // LOGIN

    public function login($username, $password)
    {
        echo $username . ' ' . $password;
        $login = mysqli_query($this->con, "SELECT * FROM users WHERE username = '$username'");
        if ($login) {
            echo 'yes';
        } else {
            'no';
        }
        $row = mysqli_fetch_assoc($login);
       echo $user_db_name = $row['username'];
        echo $user_db_password = $row['password'];

        var_dump($row);
        if ($user_db_name === $username && password_verify($user_db_password, $password)) {
            die();
            return true;
        } else {
            array_push($this->errorArray, Constant::$loginFailed);

            return false;
        }
    }
}